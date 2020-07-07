<?php 
require_once("../../includes/core.php");

if(!Site::ajaxRequest() || !User::isLogged()) die(header("HTTP/1.0 404 Not Found"));

usleep(400000);
$data= [];
$price = $_POST['price'] ?? 0;

// Não deixa passar do limite //
//if($price >= User::userData('plan')) $price = User::userData('plan');
$produtos = $_POST['products'] ?? null;

if($produtos != null):
    $produtos = json_decode($produtos);
    
    try {

        foreach($produtos as $key => $value):

            if(!Produtos::addProduct($value->productName, "0", $value->productAmount, $value->productWeight))
                return false;
        endforeach;

    } catch(Exception $e)
    {
        return $e;
    }
endif;

if(User::updateUsed($price)):
    $data['message'] = 'OK';
endif;

$_SESSION['amountPurchase'] = $price;

echo json_encode($data, JSON_UNESCAPED_UNICODE);
exit;
?>