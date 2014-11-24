<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 18/11/14
 * Time: 01:29
 */

namespace Pesapal\Broadcasts;


use Pesapal\Listeners\IframeDispatcher;
use Pesapal\Events\IframeGeneratedEvent;
use Pesapal\Services\SingletonMake;
use Pesapal\Services\Dispatcher;

class IframeBroadcast
{
    use SingletonMake;

    function addListener($listener)
    {
        $listener = new IframeDispatcher($listener);
        Dispatcher::make()->addListener(IframeGeneratedEvent::class, $listener);
    }
} 