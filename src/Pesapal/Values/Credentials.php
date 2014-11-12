<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 10/11/14
 * Time: 16:30
 */
namespace Pesapal\Values;
class Credentials
{
    public $consumer_key;
    public $consumer_secret;

    function __construct($consumer_key, $consumer_secret)
    {
        $this->consumer_key = $consumer_key;
        $this->consumer_secret = $consumer_secret;
    }
} 