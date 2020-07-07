<?php 
require_once("../../includes/core.php");

if(!Site::ajaxRequest() || !User::isLogged()) die(header("HTTP/1.0 404 Not Found"));

usleep(300000);

$planId = $_POST['planId'] ?? 1;
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
} catch(PDOException $e)
{
    return $e;
}
exit(json_encode(['message' => 'OK']));
