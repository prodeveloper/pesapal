<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 12/11/14
 * Time: 12:29
 */

namespace Pesapal\Events;

use BigName\EventDispatcher\Event;
use Pesapal\Entities\Payment;

class PaymentEvent extends IsAPaymentEvent
{
    /**
     * @var Payment
     */
    protected $payment;

    function __construct(Payment $payment)
    {
        $this->payment = $payment;

    }

    /**
     * @return Payment
     */
    public function getPayment()
    {
        return $this->payment;
    }
    public function getOrder(){
        return $this->payment->order;
    }

    public function getStatus()
    {
        return $this->payment->status;
    }

    public function getName()
    {
        return self::class;
    }
}