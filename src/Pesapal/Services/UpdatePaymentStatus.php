<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 24/11/14
 * Time: 15:49
 */

namespace Pesapal\Services;

use Pesapal\Container;
use Pesapal\Services\OauthGetPaymentStatus;
use Pesapal\Values\IPNData;

class UpdatePaymentStatus
{
    function doUpdate(IPNData $IPNData)
    {
        $negotiator = Container::make()->getContainer()->make(OauthGetPaymentStatus::class);
        $negotiator->setIpnData($IPNData);
        $negotiator->run();
    }
} 