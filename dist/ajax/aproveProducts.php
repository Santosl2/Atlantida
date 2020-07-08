<?php 
require_once("../../includes/core.php");

if(!Site::ajaxRequest() || !User::isLogged() || User::userData('admin') == "false") die(header("HTTP/1.0 404 Not Found"));

$planId = $_POST['id'] ?? 0;
$stts = $_POST['stts'] ?? 0;
$plan = $_POST['plan'] ?? 180;

if($planId > 0):
    if(Admin::updatePaymentProducts($planId, $stts)):
        User::setPlan($plan, Admin::paymentData("username", $planId));
    endif;

endif;

exit;

?>