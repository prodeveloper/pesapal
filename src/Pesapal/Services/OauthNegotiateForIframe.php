<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 10/11/14
 * Time: 16:58
 */

namespace Pesapal\Services;
use BigName\EventDispatcher\Dispatcher;
use LiteCQRS\DomainEventProvider;
use LiteCQRS\DomainObjectChanged;
use Pesapal\Events\IframeGeneratedEvent;
use Pesapal\Requests\RequestProcessed;
use Pesapal\Dispatcher\Raise;

class OauthNegotiateForIframe
{
    use Raise;
    function getIframe()
    {
       $event=new IframeGeneratedEvent("iframe");
        $this->raise($event);
    }
} 