<?php 
if(!session_start()) session_start();
if(!defined('ATLANTIDA_GLOBAL')) define('ATLANTIDA_GLOBAL', true);

$tempo = time();
setlocale(LC_TIME, "pt_BR", "pt_BR.utf-8", "pt_BR.utf-8", "portuguese");
date_default_timezone_set("America/Sao_Paulo");

require_once("Settings.php");
require_once("classes/Database.php");
require_once("Autoload.php");
?>