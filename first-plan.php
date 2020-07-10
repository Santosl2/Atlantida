<?php
REQUIRE_ONCE __DIR__ . "/includes/core.php";
Site::needLogin(true);

if(User::userData('payment_ok') == "1")
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
    <title>Atlântida Global - Escolha de Planos</title>
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
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="dashboard" class="">Dashboard</a> <i
                    data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="planos"
                    class="breadcrumb--active">Escolha de Planos</a> </div>
            <!-- END: Breadcrumb -->

            <?php include(__DIR__ . "/includes/account_dropdown.php") ?>

        </div>
        <!-- END: Top Bar -->
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Compra de Pacotes
            </h2>
        </div>
        <!-- BEGIN: Pricing Layout -->
        <div class="intro-y box flex flex-col lg:flex-row mt-5">
            <div class="intro-y flex-1 px-5 py-16">
                <i data-feather="box" class="w-12 h-12 text-theme-1 mx-auto"></i>
                <div class="text-xl font-medium text-center mt-10">DDL</div>
                <div class="text-gray-700 text-center mt-5">
                    Indicação(R$) <span class="mx-1">•</span> 0 <br>
                    CDL's <span class="mx-1">•</span> 0 <br>
                    Pontos na Rede <span class="mx-1">•</span> 0 <br>
                    Binário <span class="mx-1">•</span> 0% <br>
                </div>
                <div class="text-gray-600 px-10 text-center mx-auto mt-2">
                    - Receba um Treinamento e Manual Passos para o Sucesso
                    <br>
                    - Compra com até 25% de desconto
                    <br>
                    - Loja Virtual Personalizada sem Mensalidade
                    <br>
                    - Possibilidade de Construir Equipe
                </div>
                <div class="flex justify-center">
                    <div class="relative text-5xl font-semibold mt-8 mx-auto"> <span
                            class="absolute text-2xl top-0 left-0 text-gray-500 -ml-8 mt-1">R$</span> 180,00 </div>
                </div>
                <button type="button" class="button button--lg block text-white bg-theme-1 rounded-full mx-auto mt-8"
                    data-value="1">SELECIONAR</button>

                <div class="flex justify-center">
                
                    <form method="POST" action="" id="voucher">
                        <input type="text" class="input border mt-2" id="code" style="margin-right: 5px"
                            placeholder="EX: DYUDWGDG32">
                        <button type="submit" class="button bg-theme-1 text-white mt-5" id="preloaderBtn" data-back="Usar Voucher">Usar
                            Voucher</button>
                    </form>
                </div>
                <br/>
                    <hr/>
                <br/>
                <div class="rounded-md px-5 py-4 mb-2 bg-theme-6 text-white" id="alert" style="display:none">Sucesso!</div>

            </div>
        </div>
        <!-- END: Pricing Layout -->

    </div>
    <!-- END: Content -->
    </div>
    <?php include(__DIR__ . "/includes/footer.php") ?>
    <script type="text/javascript">
    $(document).ready(function() {

        $(document).on('click', 'button[type=button]', function(){
            var planId = $(this).attr('data-value');
            const Form = new FormData();
            const planName = $(this).prev().prev().prev().prev().text().trim();
            
            Form.append("planId", planId);
            Form.append("planName", planName);
            axios.post('./dist/ajax/planSelect.php', Form, optionsAxios)
            .then((data)=>{
                window.location.href="./pagamento";
            });
        }); 

        $(document).on('submit', 'form#voucher', function(e) {
            e.preventDefault();
            var code = $("#code").val();

            var formData = new FormData();
            formData.append('code', code);

            axios.post('./dist/ajax/useVoucher.php', formData, optionsAxios)
                .then((response) => {
                    if (response.data.message == "OK"){

                        setTimeout(function(){
                            document.location.href = "./dashboard";
                        }, 2000);
                        
                        $("#alert").fadeIn().text("Seu plano foi ativo com sucesso!");
                        return;
                    } 

                    $("#alert").fadeIn().text(response.data.message);
                    $("#code").val("");
                });

        });
    });
    </script>
</body>

</html>