<?php 
require_once("./includes/core.php");

if(!Site::ajaxRequest()) die(header("HTTP/1.0 404 Not Found"));

if(isset($_FILES['file'], $_POST['type']))
{

    
    $type = Site::filter($_POST['type']) ?? 'ted';
    $time = time();
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $newName =  './comprovante/'.uniqid(rand(0, 500)) . '.'. $ext;

//    $payId = User::getUserPaymentId($_SESSION['amountPurchase']) ?? 0;
    $payId = $_SESSION['planPayId'];

    try {
        move_uploaded_file($_FILES['file']['tmp_name'], $newName);
        
        $query = $dbh->prepare("INSERT INTO `comprovante`(`fileURL`, `user`, `paymentType`, `published`, `paymentId`) VALUES (:file,:uid, :paymentType, :pub, :paym)");
        $query->bindParam(":file", $newName);
        $query->bindParam(":uid", $_SESSION['username']);
        $query->bindParam(":paymentType", $type);
        $query->bindParam(":pub", $time);
        $query->bindParam(":paym", $payId );
        $query->execute();

        if(isset($_SESSION['amountPurchase'], $_SESSION['userProducts']) && $_SESSION['amountPurchase'] > 0):
            foreach($_SESSION['userProducts'] as $key => $value):
                $queryUp = $dbh->prepare("UPDATE user_products SET 
                paymentId = :id WHERE produtName = :name AND username = :user");
                $queryUp->bindParam(":id", $payId,PDO::PARAM_INT);  
                $queryUp->bindParam(":name", $value->productName);  
                $queryUp->bindParam(":user", $_SESSION['username']);  
                $queryUp->execute();
            endforeach;
            unset($_SESSION['userProducts'], $_SESSION['planPayId']);
        endif;

    } catch(Exception $e)
    {
        echo $e;
    }
}
exit;
?>