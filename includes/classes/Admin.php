<?php 
if(!defined('ATLANTIDA_GLOBAL')) header("HTTP/1.0 403 Forbidden");

class Admin {


    public static function paymentData($data, $id = 0){
        global $dbh;
        try {
            $query = $dbh->prepare("SELECT * FROM pedidos_pagamento WHERE id = :id");
            $query->bindParam(":id", $id, PDO::PARAM_INT);
            $query->execute();
        } catch(PDOException $e)
        {
           return false;
        }
            
        return $query->fetchAll(PDO::FETCH_ASSOC)[0][$data] ?? null;

    }
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
        $query = $dbh->prepare("UPDATE pedidos_pagamento SET status = :stts WHERE id = :id LIMIT 1" );
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
        FROM pedidos_pagamento p 
        INNER JOIN comprovante c 
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
        SUM(p.productAmount) AS produtosTotal 
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