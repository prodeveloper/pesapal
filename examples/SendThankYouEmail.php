<?php

/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 12/11/14
 * Time: 16:05
 */

class SendThankYouEmail implements \Pesapal\Contracts\PaymentListener {

    public function paid(\Pesapal\Entities\Payment $item)
    {
        echo "Thank you for payment " . $item->getIPNData()->getMerchantReference();
    }

    public function failed(\Pesapal\Entities\Payment $item)
    {
        echo "Payment failed " . $item->getIPNData()->getMerchantReference();
    }

    public function inProgress(\Pesapal\Entities\Payment $item)
    {
        echo "Payment in progress " . $item->getIPNData()->getMerchantReference();
    }

    public function invalid(\Pesapal\Entities\Payment $payment)
    {
        echo "Payment invalid " . $payment->getIPNData()->getMerchantReference();
    }
}