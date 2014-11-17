<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 17/11/14
 * Time: 22:35
 */

namespace Pesapal\Dispatcher;
use Laracasts\Commander\Events\DispatchableTrait;
use Laracasts\Commander\Events\EventGenerator;

trait RequestDispatcher {
    use EventGenerator;
    use DispatchableTrait;
    function runRequest($request){
        $this->raise($request);
        $this->dispatchEventsFor($this);
    }
}