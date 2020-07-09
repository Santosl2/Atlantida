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
    <title>Atlântida Global - Pedidos Produtos</title>
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
                    data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="payments-products-area"
                                                                                  class="breadcrumb--active">Pedidos de pagamento sobre produtos</a></div>
        <!-- END: Breadcrumb -->

        <?php include(__DIR__ . "/includes/account_dropdown.php") ?>

    </div>
    <!-- END: Top Bar -->
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
    <div class="rounded-md px-5 py-4 mb-2 bg-theme-9 text-white" id="alert" style="display:none">Sucesso!</div>

        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">Usuário</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Quantidade de Produtos</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Valor Total</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Status</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                    if(Admin::getPaymentsProducts()->rowCount() > 0):
                        foreach(Admin::getPaymentsProducts() as $key => $value):
                ?>
            <tr>
           
                <td class="border-b">
                    <div class="font-medium whitespace-no-wrap"><?=$value['username'];?></div>
                    <div class="text-gray-600 text-xs whitespace-no-wrap"><?=$value['email'];?></div>
                </td>
                <td class="text-center border-b"><?=$value['produtosTotal'];?></td>
                <td class="text-center border-b">R$ <?= number_format(($value['total'] * $value['produtosTotal']) / $value['itens'],2);?></td>
                <td class="w-40 border-b">
                    <div class="flex items-center sm:justify-center"><?= $value['payStts'] ?? "Aguardando";?></div>
                </td>
                <?php if($value['payStts'] == "Aguardando" || !isset($value['payStts'])):?>
                <td class="border-b w-5" id="teste">
                    <div class="flex sm:justify-center items-center" id="fadeOutAfter">
                        <button class="button w-24 rounded-full mr-1 mb-2 bg-theme-9 text-white" id="submit" data-id="<?= $value['paymentId']?>" data-value='1'>Aceitar</button>
                        <button class="button w-24 rounded-full mr-1 mb-2 bg-theme-6 text-white" id="submit" data-id="<?= $value['paymentId']?>" data-value='2'>Recusar</button>
                    </div>
                </td>
                <?php endif;?>
               
            </tr>
            <?php endforeach;endif;?>
            </tbody>
        </table>
    </div>
    <!-- END: Datatable -->
</div>
</div>
<!-- END: Content -->
</div>
<?php include(__DIR__ . "/includes/footer.php") ?>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#submit', function(e) {
            $("#teste").fadeOut('fast');
           let id = $(this).data('id');
            let stts = $(this).data('value');
           var formData = new FormData();
           formData.append('id', id);
           formData.append('stts', stts);
            axios.post('./dist/ajax/aproveProducts.php', formData, optionsAxios)
            .then((response)=>{
                $("#alert").fadeIn();
                
                setTimeout(function(){
                    document.location.reload(true);
                }, 2000);
            });

        });
    });
    </script>
</body>
</html>