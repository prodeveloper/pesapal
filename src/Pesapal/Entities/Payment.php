<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 12/11/14
 * Time: 12:31
 */

namespace Pesapal\Entities;

use Pesapal\Entities\Order;
class Payment {
public $order;
    public $status;

    function __construct($order, $status)
    {
        $this->order = $order;
        $this->status = $status;
    }

} 