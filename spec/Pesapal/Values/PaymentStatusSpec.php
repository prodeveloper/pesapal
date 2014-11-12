<?php

namespace spec\Pesapal\Values;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PaymentStatusSpec extends ObjectBehavior
{
    function let(){
        $this->beConstructedWith("paid");
    }
    function it_is_initializable()
    {

        $this->shouldHaveType('Pesapal\Values\PaymentStatus');
    }
    function it_should_return_when_valid_status(){
        $this->__toString()->shouldReturn("paid");

    }

}
