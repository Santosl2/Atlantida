
<?php require_once('./includes/core.php');

$userRefer = filter_var($_GET['u'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH) ?? null;

?>
<!DOCTYPE html>
<html lang="pt-br">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="<?=$config['base_url'];?>dist/images/logo.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Não espere o incentivo dos outros. O primeiro a acreditar nos seus sonhos Tem que ser você">
    <meta name="keywords" content="Bem estar, saúde, mercosul, valores, visão, missão">
    <meta name="author" content="LEFT4CODE, Eric Hahn">
    <title>Registro - Atlântida Global</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="<?=$config['base_url'];?>dist/css/app.css"/>
    <link rel="stylesheet" href="<?=$config['base_url'];?>dist/css/style.css"/>
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body>

<div class="card_afiliate">
    <div class="card_afiliate_content">
        <div class="card_afiliate_content_logo">
            <img src="<?=$config['base_url'];?>dist/images/logo.png"/>
        </div>
        <div class="preloader"></div>
        <div class="card_afiliate_content_body">
        <div class="rounded-md px-5 py-4 mb-2 bg-theme-6 text-white" id="alert" style="display: none"></div>
            <form method="POST" action="" id="register">
                
                <label>Indicador (Deixe em branco caso não haver)</label>
                <input type="text" name="indicator_name" value="<?= $userRefer;?>" class="input w-full border mt-3" placeholder="">
                <div class="card_afiliate_content_body_col_one">
                    <h4 class="text-xl font-medium leading-none mt-4 mb-5">Criação da conta</h4>
                    <label>Usuário</label>
                    <input type="text" name="username" class="input w-full border mt-2 mb-5" placeholder="Digite seu usuário" required>
                    <label>E-mail</label>
                    <input type="email" name="email" class="input w-full border mt-2 mb-5" placeholder="Digite seu endereço de e-mail" required>
                    <label>Senha</label>
                    <input type="password" name="password" class="input w-full border mt-2 mb-5" placeholder="Digite sua senha" required>
                    <label>Repetir senha</label>
                    <input type="password" name="rep_password" class="input w-full border mt-2 mb-5" placeholder="Repita sua senha" required>
                </div>
                <div class="card_afiliate_content_body_col_two">
                    <h4 class="text-xl font-medium leading-none mt-4 mb-4">Informações pessoais</h4>
                    <div class="mb-5"> <label>Tipo de pessoa</label>
                        <div class="flex items-center text-gray-700 mt-2"> <input type="radio" class="input border mr-2" name="type_people" value="Fisica" checked> <label class="cursor-pointer select-none">Física</label> </div>
                        <div class="flex items-center text-gray-700 mt-1"> <input type="radio" class="input border mr-2" name="type_people" value="Juridica"> <label class="cursor-pointer select-none">Juridica</label> </div>
                    </div>
                    <label>Nome completo</label>
                    <input type="text" class="input w-full border mt-1 mb-5" placeholder="Digite seu nome completo" name="name_complete" required>
                    <label>CPF</label>
                    <input type="text" class="input w-full border mt-2 mb-5 cpf" placeholder="Digite seu cpf" name="cpf" required>
                    <label>Senha de segurança</label>
                    <input type="password" class="input w-full border mt-2 mb-5" placeholder="Digite sua senha de segurança" name="security_password" minlength="4" maxlength="12" required>
                    <label>Repetir senha de segurança</label>
                    <input type="password" class="input w-full border mt-2 mb-3" placeholder="Repita sua senha" name="security_rep_password" required>
                </div>
                <button type="submit" name="register_user" class="button w-24 mr-auto ml-auto mb-2 mt-3 bg-theme-9 text-white" id="preloaderBtn" data-back="Cadastrar">Cadastrar</button>
            </form>
        </div>
    </div>
</div>

<!-- BEGIN: JS Assets-->
<script src="<?=$config['base_url'];?>dist/js/app.js"></script>
<script src="<?=$config['base_url'];?>dist/js/axios.min.js"></script>
<script src="<?=$config['base_url'];?>dist/js/jquery-3.5.1.min.js"></script>
<script src="<?=$config['base_url'];?>dist/js/jquery.mask.js"></script>
<script src="<?=$config['base_url'];?>dist/js/scripts.js"></script>
<!-- END: JS Assets-->

<script type="text/javascript">
    $(document).ready(function()
    {
        $('form#register').on('submit', function(e)
        {
            e.preventDefault();
            const Form = new FormData($(this)[0]);
            $("#alert").fadeOut('fast').text("");
            axios.post('<?=$config['base_url'];?>dist/ajax/register.php', Form, optionsAxios)
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
                        window.location.href = '<?=$config['base_url'];?>first-plan';
                    }, 3000);   
                }

                
                $("#alert").text(data.data.message).fadeIn();;


            });
        })
    });

    $('.cpf').mask('000.000.000-00', {reverse: true});
</script>
</body>
</html>