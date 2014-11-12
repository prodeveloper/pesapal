<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 12/11/14
 * Time: 15:05
 */

namespace Pesapal\Events;


interface IsAPaymentEvent {

    /**
     * @return Payment
     */
    public function getPayment();

    public function getStatus();
} 