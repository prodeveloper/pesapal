<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 12/11/14
 * Time: 15:05
 */

namespace Pesapal\Events;


use BigName\EventDispatcher\Event;

abstract class IsAPaymentEvent implements Event {

    /**
     * @return Payment
     */
    abstract public function getPayment();

    abstract public function getStatus();
} 