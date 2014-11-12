<?php

namespace spec\Pesapal\Listeners;

use Pesapal\Events\IsAPaymentEvent;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Pesapal\Contracts\PaymentPromise;

class PaymentListenerSpec extends ObjectBehavior
{
    function let(PaymentPromise $promise)
    {

        $this->beConstructedWith($promise);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Pesapal\Listeners\PaymentListener');
    }

    function it_checks_status(IsAPaymentEvent $event)
    {
        $event->getStatus()->willReturn("paid");
        $this->isEventStatus($event, "paid")->shouldReturn(true);
    }

    function it_calls_paid_promise(IsAPaymentEvent $event, PaymentPromise $promise)
    {
        $event->getStatus()->willReturn("paid");
        $this->setPromise($promise);
        $this->handle($event);
        $promise->paid()->shouldBeCalled();
    }

    function it_calls_failed_promise(IsAPaymentEvent $event, PaymentPromise $promise){
        $event->getStatus()->willReturn("failed");
        $this->setPromise($promise);
        $this->handle($event);
        $promise->failed()->shouldBeCalled();
    }

    function it_calls_progress_promise(IsAPaymentEvent $event, PaymentPromise $promise){
        $event->getStatus()->willReturn("progress");
        $this->setPromise($promise);
        $this->handle($event);
        $promise->inProgress()->shouldBeCalled();
    }
}
