<?php
require_once "ShowIframe.php";
require_once "SendThankYouEmail.php";
$faker=\Faker\Factory::create();
$credentials= new \Pesapal\Values\Credentials($faker->word,$faker->word);
$demoStatus= new \Pesapal\Values\DemoStatus(true);
$iframe_listeners= [new ShowIframe()];
$ipn_listeners=[new SendThankYouEmail()];

$config= new \Pesapal\Config($credentials,$demoStatus,$iframe_listeners,$ipn_listeners);