<?php
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . " /../vendor/autoload.php";
require_once "sample_order.php";
require_once "config.php";

$pesapal=\Pesapal\Pesapal::make($config);
$pesapal->generateIframe($order);





function dd($item){
    var_dump($item);
    die();
}