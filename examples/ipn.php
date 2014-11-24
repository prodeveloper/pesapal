<?php
require_once __DIR__ . " /../vendor/autoload.php";
require_once "config.php";
$ipn_data= new \Pesapal\Values\IPNData('20141121:432409396580','change','1508');
$pesapal=\Pesapal\Pesapal::make($config);
$pesapal->ipn($ipn_data);


function dd($item){
    var_dump($item);
    die();
}