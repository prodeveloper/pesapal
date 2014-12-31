<?php
require_once __DIR__ . " /../vendor/autoload.php";
require_once "config.php";
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
ini_set('display_errors', 1);;
$pesapal=\Pesapal\Pesapal::make($config);
$merchant_ref='54a3';
$result=$pesapal->queryStatus($merchant_ref);
dd($result);