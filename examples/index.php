<?php
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . " /../vendor/autoload.php";
require_once "SendThankYouEmail.php";
use Pesapal\Events\PaymentEvent;
use Faker\Factory;
use Pesapal\Entities\Order;
use Pesapal\Services\PaymentBroadcast;
use Pesapal\Services\Dispatcher;
$faker= Factory::create();
$order= new Order(
    $faker->randomNumber(),
    $faker->paragraph(),
    $faker->email,
    $faker->firstName,
    $faker->lastName,
    $faker->phoneNumber,
    uniqid("trans_"),
    'MERCHANT'


);
//On client side
$listener= new SendThankYouEmail;
PaymentBroadcast::make()->addListener($listener);

//On engine
$payment=new Pesapal\Entities\Payment($order,"failed");
$event= new PaymentEvent($payment);
Pesapal\Services\Dispatcher::make()->dispatch($event);

function dd($item){
    var_dump($item);
    die();
}