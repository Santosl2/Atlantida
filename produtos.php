<?php 
REQUIRE_ONCE __DIR__ . "/includes/core.php";
Site::needLogin(true);


if(User::userData('plan') <= 180 && User::userData('payment_ok') != "1"){
header("LOCATION: ./dashboard");
exit;
}
$plano = User::userData('plan') !== null && User::userData('plan') > 180 ? User::userData('plan') : $_SESSION['amountPurchase'];
$valuePlan = $plano - (@$config['plansVouchers'][$plano] * $config['voucherValue']);
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
    <title>Atlântida Global - Escolha dos Produtos</title>
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
                    data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="produtos"
                    class="breadcrumb--active">Escolha
                    dos Produtos</a></div>
            <!-- END: Breadcrumb -->

            <?php include(__DIR__ . "/includes/account_dropdown.php") ?>

        </div>
        <!-- END: Top Bar -->
        <!-- BEGIN: Pricing Layout -->
        <div class="rounded-md flex items-center px-5 py-4 mb-2 border border-theme-9 text-theme-9"> <i
                data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> Compra mínima no pacote <span id="actualPrice">
                R$<?= number_format($valuePlan, 2);?></span></div>
        <form method="POST" action="" id="submitFormPay">
            <div class="intro-y box flex flex-col lg:flex-row mt-5">
                <div class="intro-y flex-1 px-5 py-px">
                    <div class="select_products">
                        <div class="select_products_col_one">

                   
                           
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Fluxo Max - 500ml </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$149,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Imuno Vita - 500ml </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$149,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Digesplan B12 - 500ml </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$150,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Drenolin - 500ml </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$149,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Expecto Vita - 500ml </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$150,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Calm Femme - 330g </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$129,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Calmines Life - 500ml </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$160,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Melistsan Liquid - 500ml </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$198,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Melistsan Caps - 60caps </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$198,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Moderation Cap - 90caps </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$148,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Activ Fire Cap - 90caps </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$148,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Vita Plus - 60caps </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$148,00 </label>
                            </div>
                        </div>
                        <div class="select_products_col_two">
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Testost Max - 120caps </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$198,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Macrofoscal - 90caps </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$198,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Adek Vit - 60caps </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$158,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Ômega 3 - 120caps </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$119,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Iodosol Cap - 60caps </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$98,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Beauty Full - 60caps </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$144,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Red Cool Antiage - 300g </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$144,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Coffee Blend Cappuccino - 300g </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$120,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Moca Blend Mocaccino - 300g </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$128,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Black Coffee - 300g </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$128,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Fine Chocolat - 300g </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$128,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Juice Blend Frutas Vermelhas - 300g
                                    </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$128,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Juice Blend Frutas Cítricas - 300g
                                    </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$128,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Juice Blend Frutas Verdes - 300g </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$128,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Juice Blend Frutas Negras - 300g </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$128,00 </label>
                            </div>
                        </div>
                        <div class="select_products_col_three">
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Cereal Milk - Vegano - 300g </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$140,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Red Soup - Caldo Vermelho - 450g </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$128,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Green Soup - Caldo Verde - 450g </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$128,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Tea Blend Good Morning - 300g </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$128,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Tea Blend Good Afternoon - 300g </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$128,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Tea Blend Good Night - 300g </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$128,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Clorella Vita - 60caps </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$100,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Óleo de Coco - 1000mg </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$108,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Bio Hallitz da Global - 8ml </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$50,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Bálsamo da Amazônia Global </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$60,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Sabonete Íntimo - SIFC + 31 250ml </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$50,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Álcool Gel - Dr. Bactéria 30ml </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$5,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Oléo de Alho - 500mg </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$100,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Jarra </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$360,00 </label>
                            </div>
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Refil da Jarra </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$240,00 </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-md flex items-center px-5 py-4 mb-2 mt-5 border border-theme-1 text-theme-1"> <i
                    data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Total: R$<a id="calculate">0,00 </a> <a
                    id="onLimit"> | Valor muito baixo</a></div>
            <!-- END: Pricing Layout -->
            <button class="button w-24 mr-1 mb-2 bg-theme-1 text-white disabled" id="preloaderBtn" data-back="Próximo"
                disabled="disabled">Próximo</button> <button
                class="button w-24 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">Voltar</button>
        </form>
    </div>
    <!-- END: Content -->
    </div>
    <?php include(__DIR__ . "/includes/footer.php") ?>
    <script type="text/javascript">
    $(document).ready(function() {
        
        $('form#submitFormPay').on('submit', function(e) {
            e.preventDefault();
            let objectItens = [];
            const data = parseFloat($("#calculate").text().replace('R$', ''));

            var inputNmb = $('input[type=number]');
            
            inputNmb.each(function(e){
                var amount = $(this).val();
                if(amount > 0)
                {
                    var itemPrice = parseFloat($(this).parent().next()?.html().replace('R$', '').replace('Preço: ', ''));
                    var productName = $(this).parent().text().replace(" ", "");
                    var after = productName.indexOf("-");
                    if(after != -1){
                        var weight = productName.substring(after + 1);
                        productName = productName.substring(0, after);
                    }

                    objectItens.push({
                        "productName": productName.trim(),
                        "productWeight": weight ?? 0,
                        "productPrice": itemPrice,
                        "productAmount": amount
                    });
                    
                }
            });

            var formData = new FormData();
            formData.append('price', data);
            formData.append('products',JSON.stringify(objectItens));
            axios.post('./dist/ajax/sendPrice.php', formData, optionsAxios)
            .then((response)=>{
                    if(response.data.message == 'OK')
                        window.location.href = './pagamento';

                        
            });
        });
    });
    const formateNumb = (n) => {
        return new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        }).format(n);
    }
    $(document).on('change keyup', 'input[type=number]', function(e) {
        var key = e.keyCode || e.which;
        var div = $("#calculate");
        var calculate = parseFloat(div.html().replace('R$', ''));
        var limit = '<?=$valuePlan;?>'
        var data = $(this).data('last');
        var value = parseFloat($(this).val()) || 0;
        $(this).data('last', value);

        if (key == 37 || key == 39) return false;


        var price = parseFloat($(this).parent().next()?.html().replace('R$', '').replace('Preço: ', ''));
        // add later
        /*var limitMax = Math.abs(Math.floor(limit / price));
             $(this).attr('max', limitMax);
        */
        var add = (price * value) + calculate;

        // if(add == limit){
        if (add >= limit) {
            $("#onLimit")?.html(`| <b>Atingiu o limite de ${formateNumb(limit)}!</b>`);
            $("#preloaderBtn").removeClass('disabled').removeAttr('disabled')

        } /*else if (add > limit) {
            $("#onLimit")?.html(`| <b>Passou o limite de ${formateNumb(limit)}!</b>`);
            //$("#submitForm").addClass('disabled').prop('disabled', true);

        }*/
        if (data !== undefined) add -= (data * price)

        if (add < limit) {
            $("#onLimit")?.html("  | <b>Valor muito baixo!</b>");
            $("#preloaderBtn").addClass('disabled').prop('disabled', true);
        }

        div?.html(add);
    });
    </script>
    <style>
    .disabled {
        opacity: 0.5;
        cursor: not-allowed
    }
    </style>
</body>

</html>