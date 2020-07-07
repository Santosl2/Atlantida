<?php 
REQUIRE_ONCE __DIR__ . "/includes/core.php";
Site::needLogin(true);
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
    <title>Atlântida Global - Área de Pagamento</title>
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
                        data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="produtos"
                                                                                      class="breadcrumb--active">Área de Pagamento</a></div>
            <!-- END: Breadcrumb -->

            <?php include(__DIR__ . "/includes/account_dropdown.php") ?>

        </div>
        <!-- END: Top Bar -->
        <!-- BEGIN: Pricing Layout -->
        <div class="rounded-md flex items-center px-5 py-4 mb-2 border border-theme-9 text-theme-9">
            <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> Total da compra R$<?= isset($_SESSION['amountPurchase']) ? number_format($_SESSION['amountPurchase'], 2) : "180,00";?> </div>
        <div class="intro-y box flex flex-col lg:flex-row mt-5 mb-5">
            <div class="intro-y flex-1 px-5 py-px">
            <form data-single="true" action="./file-upload" class="dropzone border-gray-200 border-dashed">
                <div class="payment_area">
                    <div> <label>Forma de pagamento</label>
                        <div class="flex items-center text-gray-700 mt-2"> <input type="radio" class="input border mr-2" id="vertical-radio-chris-evans" name="type" value="ted" checked> <label class="cursor-pointer select-none" for="vertical-radio-chris-evans">TED</label> </div>
                    </div>
                    <div class="w-full border-t border-gray-200 mt-5 mb-5"></div>
                    <div class="information_bank">
                        <div class="information_bank_header">
                            Informações Bancárias
                        </div>
                        <div class="information_bank_body">
                            <p><b>CNPJ</b> - 2323232/43242</p>
                            <p><b>Conta</b> - 000023</p>
                            <p><b>Digito</b> - 332</p>
                            <p><b>Nome</b> - ABDGHDJ</p>
                            <p><b>Tipo</b> - Corrente</p>
                        </div>
                    </div>
                    <div class="w-full border-t border-gray-200 mt-5 mb-5"></div>
                    <h4 class="text-xl font-medium leading-none mt-3">Anexe o comprovante de pagamento.</h4>
                    <div class="w-full border-t border-gray-200 mt-5 mb-5"></div>
                        <div class="fallback"> <input name="file" type="file" /> </div>
                        <div class="dz-message" data-dz-message>
                            <div class="text-lg font-medium">Solte o arquivo aqui ou clique para fazer o upload.</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END: Pricing Layout -->
        <button class="button w-24 mr-1 mb-2 bg-theme-1 text-white" ID="submit">Concluir</button> <button class="button w-24 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">Voltar</button>
    </div>
    <!-- END: Content -->
</div>
<?php include(__DIR__ . "/includes/footer.php") ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').on('click', function(e) {
            e.preventDefault();
             window.location.href = './dashboard';

                        
            });
        });
        </script>
</body>
</html>