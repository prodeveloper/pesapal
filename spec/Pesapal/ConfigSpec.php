<?php

namespace spec\Pesapal;

use Pesapal\Contracts\PaymentListener;
use Pesapal\Values\Credentials;
use Pesapal\Values\DemoStatus;
use Pesapal\Contracts\IFrameListener;
use Assert\AssertionFailedException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConfigSpec extends ObjectBehavior
{
    protected $credentials;

    function it_is_initializable(
        $credentials,
        $demoStatus,
        IFrameListener $IFrameListener,
        PaymentListener $paymentListener
    ) {
        $credentials->beAdoubleOf(Credentials::class);
        $demoStatus->beAdoubleOf(DemoStatus::class);
        $iframe_listeners = [$IFrameListener];
        $ipn_listeners = [$paymentListener];
        $this->beConstructedWith($credentials, $demoStatus, $iframe_listeners, $ipn_listeners);

    }

    function it_does_not_initialize_with_invalid_iframe($credentials, $demoStatus, PaymentListener $paymentListener)
    {
        $credentials->beAdoubleOf(Credentials::class);
        $demoStatus->beAdoubleOf(DemoStatus::class);
        $iframe_listeners = [$paymentListener];
        $ipn_listeners = [$paymentListener];
        $this->shouldThrow(AssertionFailedException::class)->during('__construct',
            [$credentials, $demoStatus, $iframe_listeners, $ipn_listeners]);
    }
    function it_does_not_initialize_with_invalid_payment($credentials, $demoStatus, IFrameListener $IFrameListener)
    {
        $credentials->beAdoubleOf(Credentials::class);
        $demoStatus->beAdoubleOf(DemoStatus::class);
        $iframe_listeners = [$IFrameListener];
        $ipn_listeners = [];
        $this->shouldThrow(AssertionFailedException::class)->during('__construct',
            [$credentials, $demoStatus, $iframe_listeners, $ipn_listeners]);
    }


}
