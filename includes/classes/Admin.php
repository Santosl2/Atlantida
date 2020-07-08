<?php 
if(!defined('ATLANTIDA_GLOBAL')) header("HTTP/1.0 403 Forbidden");

class Admin {

    public static function getPaymentsPlan()
    {
        global $dbh;
        try {
        $query = $dbh->prepare("SELECT p.*, c.fileURL FROM pedidos_pagamento p INNER JOIN comprovante c ON c.paymentId = p.id ORDER by p.id DESC LIMIT 100");
        $query->execute();
        } catch(Exception $e)
        {
            return false;
        }

        return $query;
    }
    

    
    }
?>