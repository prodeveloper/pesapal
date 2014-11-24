<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 12/11/14
 * Time: 12:31
 */

namespace Pesapal\Entities;
use  Pesapal\Values\IPNData;
use Pesapal\Entities\Order;
class Payment {
    public $status;
    /**
     * @var IPNData
     */
    private $IPNData;

    function __construct(IPNData $IPNData, $status)
    {
        $this->status = $status;
        $this->IPNData = $IPNData;
    }

} 