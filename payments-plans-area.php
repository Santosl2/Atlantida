<?php
REQUIRE_ONCE __DIR__ . "/includes/core.php";

if(User::userData('admin') == "false")
{
    header("LOCATION: ./dashboard");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Não espere o incentivo dos outros. O primeiro a acreditar nos seus sonhos Tem que ser você">
    <meta name="keywords" content="Bem estar, saúde, mercosul, valores, visão, missão">
    <meta name="author" content="LEFT4CODE, Eric Hahn">
    <title>Atlântida Global - Pedidos Planos</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="dist/css/app.css"/>
    <link rel="stylesheet" href="dist/css/style.css"/>
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="app">

<?php include(__DIR__ . "/includes/menu.php") ?>

<!-- BEGIN: Content -->
<div class="content">

    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb mr-auto hidden sm:flex"><a href="dashboard" class="">Dashboard</a> <i
                    data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="payments-plans-area"
                                                                                  class="breadcrumb--active">Pedidos de pagamento sobre planos</a></div>
        <!-- END: Breadcrumb -->

        <?php include(__DIR__ . "/includes/account_dropdown.php") ?>

    </div>
    <!-- END: Top Bar -->
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">Usuário</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Plano</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Valor do Plano</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Vouchers</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Comprovante</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Status</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="border-b">
                    <div class="font-medium whitespace-no-wrap">ericdchahn</div>
                    <div class="text-gray-600 text-xs whitespace-no-wrap">ericdchahn@gmail.com</div>
                </td>

                <?php 
                    if(Admin::getPaymentsPlan()->rowCount() > 0):
                        foreach(Admin::getPaymentsPlan() as $key => $value):
                ?>

                <td class="text-center border-b"><?=$value['planName'];?></td>
                <td class="text-center border-b">R$ <?= number_format($value['planValue'],2);?></td>
                <td class="text-center border-b"><?=$value['vouchers'];?></td>
                <td class="text-center border-b">
                    <center>
                        <a href="<?=$value['fileURL'];?>" target="_blank">
                            <img src="<?=$value['fileURL'];?>" width="60">
                        </a>
                    </center>
                </td>
                <td class="w-40 border-b">
                    <div class="flex items-center sm:justify-center">Aceito</div>
                </td>
                <td class="border-b w-5">
                    <div class="flex sm:justify-center items-center">
                        <button class="button w-24 rounded-full mr-1 mb-2 bg-theme-9 text-white">Aceitar</button>
                        <button class="button w-24 rounded-full mr-1 mb-2 bg-theme-6 text-white">Recusar</button>
                    </div>
                </td>
                        <?php endforeach;endif;?>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- END: Datatable -->
</div>
</div>
<!-- END: Content -->
</div>
<?php include(__DIR__ . "/includes/footer.php") ?>
</body>
</html>