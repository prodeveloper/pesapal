<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 18/11/14
 * Time: 02:07
 */

class SayThankYou implements \Pesapal\Contracts\IFrameListener {

    function show($iframe)
    {

        echo "Thank you";
    }
}