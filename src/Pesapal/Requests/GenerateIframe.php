<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 10/11/14
 * Time: 16:23
 */

namespace Pesapal\Requests;
use Pesapal\Config;
use Pesapal\Entities\Order;
use LiteCQRS\DefaultCommand;

class GenerateIframe extends DefaultCommand
{
    public  $order;
    public $response;

    function __construct(Order $order)
    {
        $this->order = $order;
    }
} 