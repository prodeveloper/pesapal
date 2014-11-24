<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 12/11/14
 * Time: 11:54
 */

namespace Pesapal\Commands;

use Pesapal\Entities\Order;
use Pesapal\OrderListener;

class PlaceOrder
{
    /**
     * @var Order
     */
    public  $order;
    /**
     * @var OrderListener
     */
    public $order_listener;

    function __construct(Order $order, OrderListener $order_listener)
    {
        $this->order = $order;
        $this->order_listener = $order_listener;
    }
} 