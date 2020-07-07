<?php 
if(!defined('ATLANTIDA_GLOBAL')) header("HTTP/1.0 403 Forbidden");

class Produtos {

    public static function getAll()
    {
        global $dbh;

        $query = $dbh->prepare("SELECT * FROM produtos ORDER by id DESC");
        $query->execute();

        return $query;
    }
}
?>