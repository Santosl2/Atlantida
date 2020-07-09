<?php
REQUIRE_ONCE __DIR__ . "/includes/core.php";

Site::needLogin(true);

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
    <title>Atlântida Global - Vouchers</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="dist/css/app.css" />
    <link rel="stylesheet" href="dist/css/style.css" />
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
                    data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="vouchers"
                    class="breadcrumb--active">Área de Vouchers</a></div>
            <!-- END: Breadcrumb -->

            <?php include(__DIR__ . "/includes/account_dropdown.php") ?>

        </div>
        <!-- END: Top Bar -->
        <h4 class="text-xl font-medium leading-none mt-3">Lista de Voucher's</h4>
        <!-- BEGIN: Datatable -->
        <div class="intro-y datatable-wrapper box p-5 mt-5">
            <div class="rounded-md px-5 py-4 mb-2 bg-theme-9 text-white" id="alert" style="display:none">Sucesso!</div>

            <table class="table table-report table-report--bordered display datatable w-full">
                <thead>
                    <tr>
                        <th class="border-b-2 whitespace-no-wrap">Usuário</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Código Voucher</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Valor do Voucher</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(Vouchers::getAllVouchers()->rowCount() > 0):
                        foreach(Vouchers::getAllVouchers()->fetchAll(PDO::FETCH_ASSOC) as $key => $value): 
                ?>
                    <tr>
                        <td class="border-b">
                            <div class="font-medium whitespace-no-wrap"><?=$value['username'] ?? "Indefinido";?></div>
                            <div class="text-gray-600 text-xs whitespace-no-wrap"><?=$value['email'] ?? "Indefinido";?>
                            </div>
                        </td>
                        <td class="text-center border-b"><?=$value['voucherCode'];?></td>
                        <td class="text-center border-b">R$<?=number_format($value['voucherValue'],2);?></td>
                        <td class="w-40 border-b">
                            <div class="flex items-center sm:justify-center"><?=$value['status'];?></div>
                        </td>
                    </tr>
                    <?php endforeach;endif;?>

                </tbody>
            </table>
        </div>
        <br>
        <!-- END: Datatable -->
        <h4 class="text-xl font-medium leading-none mt-3">Cadastrar novo Voucher</h4>
        <br>
        <div>
            <label>Código do Voucher</label>
            <form method="POST" action="" id="">
                <input type="text" id="voucher" class="input w-full border mt-2" placeholder="EX: GDYWHEWU5436"
                    required>
                <button type="submit" class="button bg-theme-1 text-white mt-5" id="preloaderBtn"
                    data-back="Cadastrar">Cadastrar</button>
            </form>
        </div>

    </div>
    </div>
    <!-- END: Content -->
    </div>
    <?php include(__DIR__ . "/includes/footer.php") ?>
    <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('submit', 'form', function(e) {
            e.preventDefault();
            var code = $("#voucher").val();
            var formData = new FormData();
            formData.append('code', code);
            axios.post('./dist/ajax/addVoucher.php', formData, optionsAxios)
                .then((response) => {
                    if(response.data.message == "OK")
                    document.location.reload(true);
                    $("#alert").text(response.data.message);

                    

                    $("#alert").fadeIn();
                });

        });
    });
    </script>
</body>

</html>