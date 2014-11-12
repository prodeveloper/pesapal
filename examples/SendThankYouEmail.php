<?php

/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 12/11/14
 * Time: 16:05
 */

class SendThankYouEmail implements \Pesapal\Contracts\PaymentListener {

    public function paid()
    {
        echo "Thank you for payment";
    }

    public function failed()
    {
        echo "Payment failed";
    }

    public function inProgress()
    {
        echo "Payment in progress";
    }
}