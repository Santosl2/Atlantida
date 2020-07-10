<?php 
if(!defined('ATLANTIDA_GLOBAL')) header("HTTP/1.0 403 Forbidden");

class Admin {
    
    public static function updatePaymentProducts($id = 0, $status = 0)
    {
        if($id == 0) return false;
        global $dbh;
        try {
        $query = $dbh->prepare("UPDATE user_products SET status = :stts WHERE paymentId = :id");
        $query->bindParam(":stts", $status);
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $query->execute();
        } catch(Exception $e)
        {
            return false;
        }

        return true;
    }

    
    public static function updatePayment($id = 0, $status = 0)
    {
        if($id == 0) return false;
        global $dbh;
        try {
        $query = $dbh->prepare("UPDATE planos_pagamento SET status = :stts WHERE id = :id LIMIT 1" );
        $query->bindParam(":stts", $status);
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $query->execute();
        } catch(Exception $e)
        {
            return false;
        }

        return true;
    }
    
    

    public static function getPaymentsPlan()
    {
        global $dbh;
        try {
        $query = $dbh->prepare("SELECT 
        CASE p.status WHEN 0 THEN 'Aguardando' 
        WHEN '1' THEN 'Aprovado' 
        WHEN '2' THEN 'Recusado' 
        END payStts, 
        u.email, p.*, c.fileURL 
        FROM planos_pagamento p 
        LEFT OUTER JOIN comprovante c 
        ON c.paymentId = p.id 
        INNER JOIN users u ON u.username = p.username 
        ORDER by p.id DESC LIMIT 100");
        $query->execute();
        } catch(Exception $e)
        {
            return false;
        }

        return $query;
    }
    

    public static function getPaymentsProducts()
    {
        global $dbh;
        try {
        $query = $dbh->prepare("SELECT p.paymentId, u.username,u.email, 
        CASE p.status WHEN 0 THEN 'Aguardando' 
        WHEN '1' THEN 'Aprovado' 
        WHEN '2' THEN 'Recusado' 
        END payStts,
        SUM(p.produtValue) AS total, 
        SUM(p.productAmount) AS produtosTotal,
        COUNT(*) AS itens
        FROM user_products p 
        INNER JOIN users u 
        ON u.username = p.username GROUP by p.paymentId");
        $query->execute();
        } catch(Exception $e)
        {
            return false;
        }

        return $query;
    } 
}
?>