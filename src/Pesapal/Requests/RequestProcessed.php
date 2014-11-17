<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 18/11/14
 * Time: 00:16
 */

namespace Pesapal\Requests;

use BigName\EventDispatcher\Event;
use LiteCQRS\DomainObjectChanged;

class RequestProcessed implements Event
{
    protected $response;

    function __construct($response)
    {
        $this->response = $response;
    }


    function getResponse()
    {
        $this->response;
    }

    public function getName()
    {
        // TODO: Implement getName() method.
    }
}