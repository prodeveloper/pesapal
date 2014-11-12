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
use Pesapal\Events\IsAPaymentEvent;
use Pesapal\Events\PaymentEvent;
use Pesapal\Contracts\PaymentPromise;
class PaymentListener implements  Listener
{
    protected $payment;
    protected $promise;

    function __construct(PaymentPromise $promise)
    {
        $this->promise = $promise;
    }

    /**
     * @param IsAPaymentEvent $event
     */
    public function handle(Event $event)
    {
        $this->whenSuccessfulPayment($event);
        $this->whenPaymentFailed($event);
        $this->whenProgressUpdate($event);

    }

    function whenSuccessfulPayment(IsAPaymentEvent $event){
        if($this->isEventStatus($event,"paid")){
            $this->promise->paid();
        }
    }
    function whenPaymentFailed(IsAPaymentEvent $event){
        if($this->isEventStatus($event,"failed")){
            $this->promise->failed();
        }
    }
    function whenProgressUpdate(IsAPaymentEvent $event){
        if($this->isEventStatus($event,"progress")){
            $this->promise->inProgress();
        }
    }
    function isEventStatus(IsAPaymentEvent $event,$status){
        return $event->getStatus()==$status;
    }



}