<?php 

$page = $_SERVER['REQUEST_URI'] ?? $_SERVER['PHP_SELF'];



?>
<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img class="w-32" src="dist/images/logo.png">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="dashboard" class="menu">
                <div class="menu__icon"><i data-feather="home"></i></div>
                <div class="menu__title"> Dashboard</div>
            </a>
        </li>


        <?php 
        if(User::userData('payment_ok') == "1"):
        ?>
        <li>
            <a href="planos" class="menu">
                <div class="menu__icon"><i data-feather="inbox"></i></div>
                <div class="menu__title"> Planos</div>
            </a>
        </li>

        <?php endif;?>
    </ul>
</div>
<!-- END: Mobile Menu -->
<div class="flex">
    <!-- BEGIN: Side Menu -->
    <nav class="side-nav">
        <a href="" class="intro-x flex items-center pl-5 pt-4">
            <img src="dist/images/logo.png">
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="dashboard"
                    class="side-menu  <?= Site::strContains($page, 'dashboard') ? 'side-menu--active' : "";?>">
                    <div class="side-menu__icon"><i data-feather="home"></i></div>
                    <div class="side-menu__title"> Dashboard</div>
                </a>
            </li>

            <?php 
        if(User::userData('payment_ok') == "1"):
        ?>


            <li>
                <a href="planos" class="side-menu <?= Site::strContains($page, 'planos') ? 'side-menu--active' : "";?>">
                    <div class="side-menu__icon"><i data-feather="inbox"></i></div>
                    <div class="side-menu__title"> Planos</div>
                </a>
            </li>
            <?php endif;?>


            <?php 
             if(User::userData('plan') > 180):
            ?>
            <!--<li>
                <a href="produtos"
                    class="side-menu <?= Site::strContains($page, 'produtos') ? 'side-menu--active' : "";?>">
                    <div class="side-menu__icon"><i data-feather="inbox"></i></div>
                    <div class="side-menu__title"> Produtos</div>
                </a>
            </li>-->
            <?php endif;?>

        </ul>
    </nav>
    <!-- END: Side Menu -->