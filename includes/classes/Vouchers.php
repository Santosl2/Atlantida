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

    public static function canUseVoucher($code = null){
        global $dbh;

        if($code == null) return false;

        
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