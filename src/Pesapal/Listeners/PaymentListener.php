<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 12/11/14
 * Time: 11:49
 */

namespace Pesapal\Listeners;
use BigName\EventDispatcher\Event;
use BigName\EventDispatcher\Listener;
use Pesapal\Events\PaymentEvent;
use Pesapal\Contracts\PaymentPromise;
class PaymentListener implements  Listener
{
    protected $payment;
    protected $promise;
    /**
     * @var PaymentEvent
     */
    protected $event;

    function __construct(PaymentPromise $promise)
    {
        $this->promise = $promise;
    }

    /**
     * @param PaymentEvent $event
     */
    public function handle(Event $event)
    {
        $this->event=$event;
        return $this;


    }

    function whenSuccessfullPayment(){

    }
    function whenPaymentFailed(){

    }
    function whenProgressUpdate(PaymentEvent $event){

    }
    function isEventStatus($status){
        return $this->_getPaymentStatus($this->event) ==$status;
    }
    /**
     * @param Event $event
     * @return mixed
     */
    protected function _getPaymentStatus(Event $event)
    {
        return $event->getPayment()->status;
    }


}