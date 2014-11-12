<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 12/11/14
 * Time: 13:26
 */

namespace Pesapal\Values;
use Pesapal\Events\InvalidPaymentStatus;

class PaymentStatus
{
    protected $status;
    protected $valid_status = ['paid', 'pending', 'failed'];

    function __construct($status)
    {
        $this->_validateStatus($status);
        $this->status = $status;
    }

    function __toString()
    {
        return $this->status;
    }

    /**
     * @param $status
     * @throws InvalidPaymentStatus
     */
    protected function _validateStatus($status)
    {
        if (array_search($status, $this->valid_status) === false) {
            throw new InvalidPaymentStatus($status);
        }
    }
} 