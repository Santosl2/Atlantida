<?php 
if(!defined('ATLANTIDA_GLOBAL')) header("HTTP/1.0 403 Forbidden");

spl_autoload_register(function($file){
    $file = dirname(__FILE__) . "/classes/{$file}.php";
    if(file_exists($file)) require_once($file);
});

?>