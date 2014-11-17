<?php
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . " /../vendor/autoload.php";
require_once "ShowIframe.php";
use Pesapal\Requests\GenerateIframe;
use Pesapal\Broadcasts\IframeBroadcast;
$bootstrap=new \Pesapal\Bootstrap();;
$faker= Faker\Factory::create();
$order= new Pesapal\Entities\Order(
    $faker->randomNumber(),
    $faker->paragraph(),
    $faker->email,
    $faker->firstName,
    $faker->lastName,
    $faker->phoneNumber,
    uniqid("trans_"),
    'MERCHANT'


);
$listener=new ShowIframe();

IframeBroadcast::make()->addListener($listener);

$bootstrap->getCommandBus()->handle(new GenerateIframe($order));




function dd($item){
    var_dump($item);
    die();
}