<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 18/11/14
 * Time: 01:20
 */

namespace Pesapal\Events;


use BigName\EventDispatcher\Event;

class IframeGeneratedEvent implements Event {
    protected $iframe;


    function __construct($iframe)
    {
        $this->iframe = $iframe;
    }
    /**
     * @return mixed
     */
    public function getIframe()
    {
        return $this->iframe;
    }


    public function getName()
    {
        return self::class;
    }
}