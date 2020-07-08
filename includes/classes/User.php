<?php 
if(!defined('ATLANTIDA_GLOBAL')) header("HTTP/1.0 403 Forbidden");

class User {
    private static $username, $password, $email, $cpf, $person, $complete_name, $security_key, $indicator;


    public static function isLogged()
    {
        return isset($_SESSION['username'], $_SESSION['email']);
    }


    public static function userData($data, $username = null){
        global $dbh;
        $username = $username == null ? $_SESSION['username'] : $username;
        try {
            $query = $dbh->prepare("SELECT * FROM users WHERE username = :username OR email = :username LIMIT 1");
            $query->bindParam(":username", $username);
            $query->execute();
        } catch(PDOException $e)
        {
           return false;
        }
            
        return $query->fetchAll(PDO::FETCH_ASSOC)[0][$data] ?? null;

    }

    public static function setVar($field, $value)
    {
        switch($field)
        {
            case "username":
                self::$username = $value;
            break;

            case "password":
                self::$password = $value;
            break;

            case "email":
                self::$email = $value;
            break;

            case "cpf":
                self::$cpf = $value;
            break;

            case "type_people":
                self::$person = $value;
            break;

            case "name_complete":
                self::$complete_name = $value;
            break;

            case "indicator_name":
                self::$indicator = $value;
            break;
            
            case "security_password":
                self::$security_key = $value;
            break;
            default: 
                // none
            break;
            

        }
        
    }

    public static function mailExists($mail = null)
    {
        global $dbh;
        if($mail == null) return false;

        
        try {
        $query = $dbh->prepare("SELECT id FROM users WHERE email = :email");
        $query->bindParam(":email", $mail);
        $query->execute();
        } catch(PDOException $e)
        {
           return false;
        }
        return $query->rowCount() > 0;
    }

    private static function getIndicator($name = null)
    {
        global $dbh;
        if($name == null) return 0;

        try {
            $query = $dbh->prepare("SELECT id FROM users WHERE username = :username OR email = :username");
            $query->bindParam(":username", $name);
            $query->execute();
        } catch(PDOException $e)
        {
           return false;
        }

        $getId = $query->fetchAll(PDO::FETCH_ASSOC)[0]['id'] ?? 0;

        return $getId;
    }

    public static function userExists($username = null)
    {
        global $dbh;

        if($username == null) return false;

        try {
            $query = $dbh->prepare("SELECT id FROM users WHERE username = :username");
            $query->bindParam(":username", $username);
            $query->execute();
        } catch(PDOException $e)
        {
            return false;
        }

        return $query->rowCount() > 0;
    }

    
    public static function getUserPaymentId($value = 180)
    {
        global $dbh;
        try 
        {
        $query = $dbh->prepare("SELECT `id` FROM `pedidos_pagamento` WHERE username = :username AND status = '0' AND planValue = :value ORDER by paymentDay DESC");
        $query->bindParam(":username", $_SESSION['username']);
        $query->bindParam(":value", $value, PDO::PARAM_INT);
        $query->execute();
        } catch(Exception $e)
        {
            return false;
        }

        return $query->fetchAll(PDO::FETCH_ASSOC)[0]['id'] ?? 0;
    }


    public static function updateUsed($used = 0){
        global $dbh;
        if(!self::isLogged()) return false;
        try {
            $query = $dbh->prepare("UPDATE users SET plan_used = :used WHERE username = :username");
            $query->bindParam(":used", $used);
            $query->bindParam(":username", $_SESSION['username']);
            $query->execute();
        } catch(PDOException $e){
            return false;
        }

        return true;
    }

    public static function loginUser(){
        $_SESSION['username'] = self::$username;
        $_SESSION['email'] = self::$email;
    }

    public static function registerUser(){
       global $dbh;

        if(empty(self::$username) || empty(self::$password) || empty(self::$complete_name) ||
        empty(self::$email) || empty(self::$cpf) || empty(self::$person) ||
        empty(self::$security_key)) return false;


        try {
            $query = $dbh->prepare("INSERT INTO `users`
            (`username`, `password`, `real_name`, 
            `email`, `cpf`, `person_type`, `security_code`, `indicator_id`) 
            VALUES (:username, :password, :rName, :email, :cpf, :pType, :sCode, :indId)");

            
            $encryptPassw = Site::encryptPassword(self::$password);
            $encryptSec = site::encryptPassword(self::$security_key);
            $indId = self::getIndicator(self::$indicator);
            
            $query->bindParam(":username", self::$username);
            $query->bindParam(":password", $encryptPassw);
            $query->bindParam(":rName", self::$complete_name);
            $query->bindParam(":email", self::$email);
            $query->bindParam(":cpf", self::$cpf);
            $query->bindParam(":pType", self::$person);
            $query->bindParam(":sCode",  $encryptSec);
            $query->bindParam(":indId", $indId);
            $query->execute();
        } catch(PDOException $e)
        {
            return false;
        }
       
        return true;
       
    }
}
?>