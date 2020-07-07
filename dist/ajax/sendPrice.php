<?php 
require_once("../../includes/core.php");

if(!Site::ajaxRequest() || !User::isLogged()) die(header("HTTP/1.0 404 Not Found"));

usleep(400000);
$data= [];
$price = $_POST['price'] ?? 0;

// Não deixa passar do limite //
//if($price >= User::userData('plan')) $price = User::userData('plan');

if(User::updateUsed($price)){
    $data['message'] = 'OK';
}
$_SESSION['amountPurchase'] = $price;

echo json_encode($data, JSON_UNESCAPED_UNICODE);
exit;
?>