<?php 
if(!defined('ATLANTIDA_GLOBAL')) header("HTTP/1.0 403 Forbidden");

class Vouchers{
    private static $voucherCode;
    private static $voucherValue = 180;

    
    public static function setVoucherCode($voucher)
    {
        self::$voucherCode = $voucher;
    }

    public static function setVoucherValue($voucher)
    {
        self::$voucherValue = $voucher;
    }

    public static function voucherId()
    {
        global $dbh;

        if(self::$voucherCode == null) return true;

        try {
            $query = $dbh->prepare("SELECT 
            id FROM vouchers 
            WHERE voucherCode LIKE BINARY :code");
            $query->bindParam(":code", self::$voucherCode, PDO::PARAM_STR);
            $query->execute();
        }
        catch(PDOException $e)
        {
            return false;
        }

         return $query->fetchAll(PDO::FETCH_ASSOC)[0]['id'] ?? false;

    }

    public static function useVoucher(){
        global $dbh;

        if(!self::canUseVoucher()) return false;
        $tmp = time();
        try {
            $query = $dbh->prepare("UPDATE vouchers SET status = '2' WHERE voucherCode LIKE BINARY :code");
            $query->bindParam(":code", self::$voucherCode, PDO::PARAM_STR);
            $query->execute();

            $id = self::voucherId();
            $queUse = $dbh->prepare('INSERT INTO 
            vouchers_logs 
            VALUES (:user, :id, :usedt)');
            $queUse->bindParam(":user", $_SESSION['username'], PDO::PARAM_STR);
            $queUse->bindParam(":id", $id, PDO::PARAM_INT);
            $queUse->bindParam(":usedt", $tmp, PDO::PARAM_INT);
            $queUse->execute();
        }
        catch(PDOException $e)
        {
            return false;
        }

        return true;

    }

    public static function canUseVoucher(){
        global $dbh;

        if(self::$voucherCode == null) return false;

        try {
            $query = $dbh->prepare("SELECT id FROM vouchers 
            WHERE status = '1' AND voucherCode LIKE BINARY :code ");
            $query->bindParam(":code", self::$voucherCode, PDO::PARAM_STR);
            $query->execute();
        }
        catch(PDOException $e)
        {
            return false;
        }

         return $query->rowCount() > 0;
    }

    public static function getAllVouchers()
    {
        global $dbh;
        try {
        $query = $dbh->prepare("SELECT
        CASE v.status WHEN 1 THEN 'Ativo' WHEN 2 THEN 'Resgatado' END status, 
        u.email,v.voucherCode, v.voucherValue, l.username
        FROM vouchers v 
        LEFT OUTER JOIN vouchers_logs l ON l.voucherId = v.id 
        LEFT OUTER JOIN users u ON l.username = u.username ORDER by v.id DESC");
            $query->execute();
        } catch(PDOException $e){
            return false;
        }

        return $query;
    }    

    public static function createVoucher(){
        global $dbh;
        $tmp = time();

        if(self::canUseVoucher(self::$voucherCode)) return false;

        try {
            $query =  $dbh->prepare("INSERT INTO 
            `vouchers`(
            `voucherCode`, 
            `addedTime`, 
            `voucherValue`, 
            `status`
            ) 
            VALUES (:code, :time, :value, '1')");
            $query->bindParam(":code", self::$voucherCode, PDO::PARAM_STR);
            $query->bindParam(":time", $tmp, PDO::PARAM_INT);
            $query->bindParam(":value", self::$voucherValue, PDO::PARAM_INT);
            $query->execute();
        } catch(PDOException $e)
        {
            return false;
        }

        return true;

    }
}
?>