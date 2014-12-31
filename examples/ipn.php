<?php
require_once __DIR__ . " /../vendor/autoload.php";
require_once "config.php";
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
ini_set('display_errors', 1);
$ipn_data= new \Pesapal\Values\IPNData('54a34da93590d','change','35478207-b54f-43d2-8508-1183e53b25df');
$pesapal=\Pesapal\Pesapal::make($config);
$pesapal->ipn($ipn_data);



function dd($item){
    var_dump($item);
    die();
}