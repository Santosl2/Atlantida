<?php 
require_once("../../includes/core.php");

if(!Site::ajaxRequest() || !User::isLogged()) die(header("HTTP/1.0 404 Not Found"));

usleep(700000);
$voucherCode = $_POST['code'] ?? null;
$data=[];
if($voucherCode != null):
    
    $voucherCode = filter_var($voucherCode, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    Vouchers::setVoucherCode($voucherCode);

    if(!Vouchers::canUseVoucher()):
        $data['type'] = "erro";
        $data['message'] = "Oops, não conseguimos encontrar o voucher digitado ou ele já foi usado.";
    elseif(!Vouchers::useVoucher()):
        $data['type'] = "erro";
        $data['message'] = "Ocorreu um erro ao tentar usar este voucher. Tente novamente mais tarde.".$voucherCode;
    else:
        $data['type'] = "success";
        $data['message'] = "OK";

        $queryDb = $dbh->prepare("UPDATE users SET plan = '180', payment_ok = '1' WHERE username = :username");
        $queryDb->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
        $queryDb->execute();
    endif;

    echo json_encode($data, JSON_UNESCAPED_UNICODE);


endif;


exit;
?>