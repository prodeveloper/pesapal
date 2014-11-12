<?php
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
//On client side Bootstrap Code
$listener= new SendThankYouEmail;
PaymentBroadcast::make()->addListener($listener);






//On engine
$payment=new Pesapal\Entities\Payment($order,"failed");
$event= new PaymentEvent($payment);
Pesapal\Services\Dispatcher::make()->dispatch($event);
