<?php 
require_once("../../includes/core.php");

if(!Site::ajaxRequest() || !User::isLogged() || User::userData('admin') == "false") die(header("HTTP/1.0 404 Not Found"));

$planId = $_POST['id'] ?? 0;
$stts = $_POST['stts'] ?? 0;

if($planId > 0):
    if(Admin::updatePayment($planId, $stts)):
        User::setActive(Produtos::paymentData("username", $planId), Produtos::paymentData("planValue", $planId));
    endif;

endif;

exit;

?>