<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 12/11/14
 * Time: 17:47
 */

namespace Pesapal\Services;
use Pesapal\Events\PaymentEvent;
use Pesapal\Listeners\PaymentListener;
use Pesapal\Services\Dispatcher;
use Pesapal\Services\SingletonMake;

class PaymentBroadcast
{
    use SingletonMake;

    function addListener($listener)
    {
        $listener = new PaymentListener($listener);

        Dispatcher::make()->addListener(PaymentEvent::class, $listener);

    }
} 