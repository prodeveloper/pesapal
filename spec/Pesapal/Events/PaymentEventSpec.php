<?php

namespace spec\Pesapal\Events;

use Pesapal\Entities\Order;
use Pesapal\Entities\Payment;
use Pesapal\Values\PaymentStatus;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Faker\Factory;

class PaymentEventSpec extends ObjectBehavior
{
    function let(){
        $faker= Factory::create();
        $order= new Order(
            $faker->randomNumber(),
            $faker->paragraph(),
            $faker->email,
            $faker->firstName,
            $faker->lastName,
            $faker->phoneNumber,
            uniqid("trans_"),
            'MERCHANT'


        );
        $status= new PaymentStatus("paid");
        $payment= new Payment($order,$status);
        $this->beConstructedWith($payment);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Pesapal\Events\PaymentEvent');
    }
}
