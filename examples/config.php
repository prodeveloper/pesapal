<?php
require_once "ShowIframe.php";
require_once "SendThankYouEmail.php";
$faker=\Faker\Factory::create();
$credentials= new \Pesapal\Values\Credentials("vGJc0pEFutjIuqcLdOpLTqudHTnxLuUW","Iab9FqF5I6ySN1+9fY6D8pq3MAc=");
$demoStatus= new \Pesapal\Values\DemoStatus(true);
$iframe_listeners= [new ShowIframe()];
$ipn_listeners=[new SendThankYouEmail()];
$iframeDimensions=new \Pesapal\Values\IframeDimensions(
    $height="620px",
    $width="500px",
    $autoscrolling="no",
    $iframeBorder=0
);
$callback_url="http://www.google.co.ke/";
$config= new \Pesapal\Config($credentials,$demoStatus,$iframeDimensions,$iframe_listeners,$ipn_listeners,$callback_url);