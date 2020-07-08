<?php 
require_once("../../includes/core.php");

if(!Site::ajaxRequest() || !User::isLogged()) die(header("HTTP/1.0 404 Not Found"));

$planId = $_POST['id'] ?? 0;
$stts = $_POST['stts'] ?? 0;

if($planId > 0):
    if(Admin::updatePayment($planId, $stts)):
        User::setActive(Admin::paymentData("username", $planId));
    endif;

endif;

exit;

?>