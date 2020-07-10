<?php 
if(!defined('ATLANTIDA_GLOBAL')) header("HTTP/1.0 403 Forbidden");


class Site {
    public static function filter($value)
    {
        $value = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/","", $value);
        
        return $value;
    }

    public static function strContains($value, $contains)
    {

        $contains = strtolower($contains);
        return preg_match("/$contains/", strtolower($value));
    }

    public static function needLogin($val = false)
    {
        switch($val){
            case true:
                if(!User::isLogged()){
                    header("LOCATION: ./index");
                    exit;
                }
            break;

            case false: 
                if(User::isLogged()){
                    header("LOCATION: ./dashboard");
                    exit;
                }
            break;
            default:

        break;
        }
    }

    public static function ajaxRequest(){
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest";
    }

    public static function verifyPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }

    public static function encryptPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }    
}
?>