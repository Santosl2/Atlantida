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

$planValue = $plans[$planId] ?? $plans[1];

try {
    $query = $dbh->prepare("UPDATE users SET plan = :plan WHERE username = :username");
    $query->bindParam(":plan", $planValue);
    $query->bindParam(":username", $_SESSION['username']);
    $query->execute();

    // Inserir pedidos pagamento

    $query = $dbh->prepare("
    INSERT INTO `pedidos_pagamento`
    (`planName`, `planValue`, `vouchers`, `username`, `status`) 
    VALUES (:name, :value, :voucher, :username, '0')");
    $query->bindParam(":name", $name);
    $query->bindParam(":value", $planValue);
    $query->bindParam(":voucher", $config['plansVouchers'][$planValue]);
    $query->bindParam(":username", $_SESSION['username']);
    $query->execute();


} catch(PDOException $e)
{
    return $e;
}
exit(json_encode(['message' => 'OK']));
