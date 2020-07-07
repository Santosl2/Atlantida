<?php 
REQUIRE_ONCE __DIR__ . "/includes/core.php";
Site::needLogin(true);


if(User::userData('plan') <= 180 && User::userData('payment_ok') != "1"){
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
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="dashboard" class="">Dashboard</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="planos" class="breadcrumb--active">Escolha de Planos</a> </div>
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
                    <div class="intro-y border-b border-t lg:border-b-0 lg:border-t-0 border-gray-200 flex-1 p-5 lg:border-l lg:border-r border-gray-200 py-16">
                        <i data-feather="box" class="w-12 h-12 text-theme-1 mx-auto" style="color: #cd7f32;"></i>
                        <div class="text-xl font-medium text-center mt-10">BRONZE</div>
                        <div class="text-gray-700 text-center mt-5">
                            Indicação(R$) <span class="mx-1">•</span> 72,00 <br>
                            CDL's <span class="mx-1">•</span> 4 <br>
                            Pontos na Rede <span class="mx-1">•</span> 80 <br>
                            Binário <span class="mx-1">•</span> 40% <br>
                        </div>
                        <div class="text-gray-600 px-10 text-center mx-auto mt-2" style="margin-top: 30px;margin-bottom: 35px;">
                            <span class="mx-1">•</span> 1 Voucher + produtos a escolher
                        </div>
                            <div class="flex justify-center">
                            <div class="relative text-5xl font-semibold mt-8 mx-auto"> <span class="absolute text-2xl top-0 left-0 text-gray-500 -ml-8 mt-1">R$</span> 720,00 </div>
                        </div>
                        <button type="button" class="button button--lg block text-white bg-theme-1 rounded-full mx-auto mt-8" style="background-color: #cd7f32;" data-value="2">SELECIONAR</button>
                    </div>
                    <div class="intro-y flex-1 px-5 py-16">
                        <i data-feather="box" class="w-12 h-12 text-theme-1 mx-auto" style="color: #c0c0c0;"></i>
                        <div class="text-xl font-medium text-center mt-10">PRATA</div>
                        <div class="text-gray-700 text-center mt-5">
                            Indicação(R$) <span class="mx-1">•</span> 162,00 <br>
                            CDL's <span class="mx-1">•</span> 9 <br>
                            Pontos na Rede <span class="mx-1">•</span> 200 <br>
                            Binário <span class="mx-1">•</span> 60% <br>
                        </div>
                        <div class="text-gray-600 px-10 text-center mx-auto mt-2" style="margin-top: 30px;margin-bottom: 35px;">
                            <span class="mx-1">•</span> 2 Vouchers + produtos a escolher
                        </div>
                        <div class="flex justify-center">
                            <div class="relative text-5xl font-semibold mt-8 mx-auto"> <span class="absolute text-2xl top-0 left-0 text-gray-500 -ml-8 mt-1">R$</span> 1.620,00 </div>
                        </div>
                        <button type="button" class="button button--lg block text-white bg-theme-1 rounded-full mx-auto mt-8" style="background-color: silver;" data-value="3">SELECIONAR</button>
                    </div>
                </div>
                <!-- END: Pricing Layout -->
                <!-- BEGIN: Pricing Layout -->
                <div class="intro-y box flex flex-col lg:flex-row mt-5">
                    <div class="intro-y flex-1 px-5 py-16">
                        <i data-feather="box" class="w-12 h-12 text-theme-1 mx-auto" style="color: #ffd700;"></i>
                        <div class="text-xl font-medium text-center mt-10">OURO</div>
                        <div class="text-gray-700 text-center mt-5">
                            Indicação(R$) <span class="mx-1">•</span> 342,00 <br>
                            CDL's <span class="mx-1">•</span> 19 <br>
                            Pontos na Rede <span class="mx-1">•</span> 400 <br>
                            Binário <span class="mx-1">•</span> 80% <br>
                        </div>
                        <div class="text-gray-600 px-10 text-center mx-auto mt-2" style="margin-top: 30px;margin-bottom: 35px;">
                            <span class="mx-1">•</span> 4 Vouchers + produtos a escolher
                        </div>
                        <div class="flex justify-center">
                            <div class="relative text-5xl font-semibold mt-8 mx-auto"> <span class="absolute text-2xl top-0 left-0 text-gray-500 -ml-8 mt-1">R$</span> 3.420,00 </div>
                        </div>
                        <button type="button" class="button button--lg block text-white bg-theme-1 rounded-full mx-auto mt-8" style="background-color: #ffd700;" data-value="4">SELECIONAR</button>
                    </div>
                    <div class="intro-y border-b border-t lg:border-b-0 lg:border-t-0 border-gray-200 flex-1 px-5 lg:border-l lg:border-r border-gray-200 py-16">
                        <i data-feather="box" class="w-12 h-12 text-theme-1 mx-auto" style="color: #800000;"></i>
                        <div class="text-xl font-medium text-center mt-10">IMPERADOR</div>
                        <div class="text-gray-700 text-center mt-5">
                            Indicação(R$) <span class="mx-1">•</span> 4.860,00 <br>
                            CDL's <span class="mx-1">•</span> 270 <br>
                            Pontos na Rede <span class="mx-1">•</span> 4500 <br>
                            Binário <span class="mx-1">•</span> 80% <br>
                        </div>
                        <div class="text-gray-600 px-10 text-center mx-auto mt-2" style="margin-top: 30px;margin-bottom: 10px;">
                            <span class="mx-1">•</span> 45 Vouchers + produtos a escolher
                            <br>
                            <span class="mx-1">•</span> Este plano possui +2% extra sobre o faturamento semanal
                        </div>
                        <div class="flex justify-center">
                            <div class="relative text-5xl font-semibold mt-8 mx-auto"> <span class="absolute text-2xl top-0 left-0 text-gray-500 -ml-8 mt-1">R$</span> 48.600,00 </div>
                        </div>
                        <button type="button" class="button button--lg block text-white bg-theme-1 rounded-full mx-auto mt-8" style="background-color: #800000;" data-value="5">SELECIONAR</button>
                    </div>
                </div>
                <!-- END: Pricing Layout -->
            </div>
            <!-- END: Content -->
        </div>
    <?php include(__DIR__ . "/includes/footer.php") ?>
    <script type="text/javascript">
     $(document).ready(function()
    {
        $(document).on('click', 'button[type=button]', function(){
            var planId = $(this).attr('data-value');
            const Form = new FormData();
            Form.append("planId", planId);
            axios.post('./dist/ajax/planSelect.php', Form, optionsAxios)
            .then((data)=>{
                window.location.href="./produtos";
            });
        }); 
    } );  
    </script>
    </body>
</html>