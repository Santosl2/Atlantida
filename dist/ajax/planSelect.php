<?php 
require_once("../../includes/core.php");

if(!Site::ajaxRequest() || !User::isLogged()) die(header("HTTP/1.0 404 Not Found"));

usleep(300000);

$planId = $_POST['planId'] ?? 1;
$name = $_POST['planName'] ?? "DDL"; 

$plans = [
    1 => 180,
    2 => 720,
    3 => 1620,
    4 => 3420,
    5 => 48600
];

$planValue = $plans[$planId] ?? $plans[2];
$voucher = $config['plansVouchers'][$planValue] ?? 0;

try {
    
    $queryPag = $dbh->prepare("
    INSERT INTO `planos_pagamento`
    (`planName`, `planValue`, `vouchers`, `username`, `status`, `paymentDay`) 
    VALUES (:name, :value, :voucher, :username, '0', :temp)");
    $queryPag->bindParam(":name", $name);
    $queryPag->bindParam(":value", $planValue, PDO::PARAM_INT);
    $queryPag->bindParam(":voucher", $voucher, PDO::PARAM_INT);
    $queryPag->bindParam(":username", $_SESSION['username']);
    $queryPag->bindParam(":temp", $tempo, PDO::PARAM_INT);
    $queryPag->execute();
    $_SESSION['planPayId'] = $dbh->lastInsertId();
    // Alterar plano (?)
    
  
    

} catch(PDOException $e)
{
    echo $e;
}
$_SESSION['amountPurchase'] = $planValue;
exit(json_encode(['message' => 'OK']));
