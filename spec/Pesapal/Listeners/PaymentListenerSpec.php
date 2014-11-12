<?php

namespace spec\Pesapal\Listeners;

use Pesapal\Events\IsAPaymentEvent;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Pesapal\Contracts\PaymentPromise;

class PaymentListenerSpec extends ObjectBehavior
{
    function let(PaymentPromise $promise){
        $this->beConstructedWith($promise);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Pesapal\Listeners\PaymentListener');
    }

    function it_checks_status(IsAPaymentEvent $event){
        $event->getStatus()->willReturn("paid");
        $this->isEventStatus($event,"paid")->shouldReturn(true);
    }
}
