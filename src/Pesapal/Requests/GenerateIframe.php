<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 10/11/14
 * Time: 16:23
 */

namespace Pesapal\Requests;

use Pesapal\Order;

class GenerateIframe
{
    protected $order;

    function __construct(Order $order)
    {
        $this->order = $order;
    }
} 