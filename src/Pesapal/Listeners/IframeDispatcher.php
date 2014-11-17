<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 18/11/14
 * Time: 01:25
 */

namespace Pesapal\Listeners;


use BigName\EventDispatcher\Event;
use BigName\EventDispatcher\Listener;
use Pesapal\Contracts\IFrameListener;
use Pesapal\Events\IframeGeneratedEvent;

class IframeDispatcher implements Listener
{
    /**
     * @var IFrameListener
     */
    protected $promise;

    function __construct(IFrameListener $promise)
    {
        $this->promise = $promise;
    }

    /**
     * @param IframeGeneratedEvent $event
     */
    public function handle(Event $event)
    {
        $this->promise->show($event->getIframe());
    }
}