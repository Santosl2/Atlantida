<?php
require __DIR__ . "/includes/core.php";

Site::needLogin(false);
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
    <title>Login - Atlântida Global</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    <div class="preloader"></div>
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <div class="my-auto">
                    <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                        src="dist/images/logo.png">
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Área de Login
                    </h2>
                    <div class="rounded-md px-5 py-4 mb-2 bg-theme-6 text-white" id="alert" style="display: none"></div>

                    <form method="POST" action="">
                        <div class="intro-x mt-8">
                            <input type="text" class="intro-x login__input input input--lg border border-gray-300 block"
                                name="username" placeholder="Endereço de e-mail" required>
                            <input type="password" name="password"
                                class="intro-x login__input input input--lg border border-gray-300 block mt-4"
                                placeholder="Senha" required>
                        </div>
                        <!--                <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">-->
                        <!--                    <a href="">Esqueceu a senha?</a>-->
                        <!--                </div>-->
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="button w-full xl:w-32 text-white bg-theme-9 xl:mr-3" id="preloaderBtn" data-back="Entrar">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    <!-- BEGIN: JS Assets-->
    <script src="dist/js/jquery-3.5.1.min.js"></script>
    <script src="dist/js/axios.min.js"></script>
    <script src="dist/js/scripts.js"></script>
    <script src="dist/js/app.js"></script>
    <script type="text/javascript">
    $(document).ready(function()
    {
        $('form').on('submit', function(e)
        {
            e.preventDefault();
            const Form = new FormData($(this)[0]);
            $("#alert").fadeOut('fast').text("");
            axios.post('./dist/ajax/login.php', Form, optionsAxios)
            .then((data)=>{

                if(data.data.type == "error")
                {
                    if($("#alert").hasClass("bg-theme-9"))
                    {
                        $("#alert").removeClass('bg-theme-9').addClass('bg-theme-6');
                    }
                } else {
                    if($("#alert").hasClass("bg-theme-6"))
                    {
                        $("#alert").removeClass('bg-theme-6').addClass('bg-theme-9');
                    }

                    setTimeout(function(){
                        window.location.href = './planos';
                    }, 3000);   
                }

                
                $("#alert").text(data.data.message).fadeIn();


            });
        })
    });
    </script>
    <!-- END: JS Assets-->
</body>

</html>