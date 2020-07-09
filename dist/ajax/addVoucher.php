<?php 

header("Access-Control-Allow-Origin: *");
require_once("../../includes/core.php");

if(!Site::ajaxRequest() || !User::isLogged() || User::userData('admin') == "false") die(header("HTTP/1.0 404 Not Found"));

usleep(700000);

$voucherCode = $_POST['code'] ?? null;
if($voucherCode != null):
    $voucherCode = filter_var($voucherCode, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    Vouchers::setVoucherCode($voucherCode);

    if(!Vouchers::createVoucher()):
        exit(json_encode(['message' => "Erro ao tentar criar voucher."]));
    endif;

    exit(json_encode(['message' => "OK"]));

endif;

exit(json_encode(['message' => "Oops, digite um código válido."]))
?>