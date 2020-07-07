<?php 
if(!defined('ATLANTIDA_GLOBAL')) header("HTTP/1.0 403 Forbidden");

try {
    $dbh = new PDO("mysql:host=127.0.0.1:3306;dbname=projeto", "root", "");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
{
    die("Não foi possível se conectar ao servidor.");
}
?>