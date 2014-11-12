<?php
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . " /../vendor/autoload.php";

function dd($item){
    var_dump($item);
    die();
}