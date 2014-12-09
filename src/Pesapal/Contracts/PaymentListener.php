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

    public function paid(Payment $IPNData);

    public function failed(Payment $IPNData);

    public function inProgress(Payment $IPNData);
} 