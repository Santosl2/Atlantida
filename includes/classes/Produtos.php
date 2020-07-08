<?php 
if(!defined('ATLANTIDA_GLOBAL')) header("HTTP/1.0 403 Forbidden");

class Produtos {

    public static function getAll()
    {
        global $dbh;
        try {
        $query = $dbh->prepare("SELECT * FROM produtos ORDER by id DESC");
        $query->execute();
        } catch(Exception $e)
        {
            return false;
        }

        return $query;
    }
    

    public static function addProduct($name = null, $value = null, $amount = null, $weight = 0){
        global $dbh;
        if($name == null || $value == null || $amount == null) return false;
        try {
            $query = $dbh->prepare("INSERT INTO `user_products`
            (`userName`, `status`, `produtName`, `produtValue`, `productAmount`, `productWeight`) 
            VALUES (:userName, '0', :pName, :pValue, :amount, :weight) ");
            $query->bindParam(":userName", $_SESSION['username'], PDO::PARAM_STR);
            $query->bindParam(":pName", $name, PDO::PARAM_STR);
            $query->bindParam(":pValue", $value, PDO::PARAM_INT);
            $query->bindParam(":amount", $amount, PDO::PARAM_INT);
            $query->bindParam(":weight", $weight, PDO::PARAM_INT);
            $query->execute();
        }   catch(Exception $e){
            return false;
        }

        return true;    

    }
}
?>