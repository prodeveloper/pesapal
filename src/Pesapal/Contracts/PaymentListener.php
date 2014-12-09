<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 12/11/14
 * Time: 13:57
 */

namespace Pesapal\Contracts;
use Pesapal\Entities\Payment;

interface PaymentListener
{

    public function paid(Payment $payment);

    public function failed(Payment $payment);

    public function invalid(Payment $payment);

    public function inProgress(Payment $payment);
} 