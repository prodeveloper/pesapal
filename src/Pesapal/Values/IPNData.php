<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 24/11/14
 * Time: 15:14
 */

namespace Pesapal\Values;


class IPNData
{
    protected $notificationType;
    protected $trackingId;
    protected $merchantReference;

    function __construct($merchantReference, $notificationType, $trackingId)
    {
        $this->merchantReference = $merchantReference;
        $this->notificationType = $notificationType;
        $this->trackingId = $trackingId;
    }

    /**
     * @return mixed
     */
    public function getMerchantReference()
    {
        return $this->merchantReference;
    }

    /**
     * @return mixed
     */
    public function getNotificationType()
    {
        return $this->notificationType;
    }

    /**
     * @return mixed
     */
    public function getTrackingId()
    {
        return $this->trackingId;
    }


} 