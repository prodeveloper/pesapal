<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 18/11/14
 * Time: 10:39
 */

namespace Pesapal;

use Assert\Assertion;
use Pesapal\Values\Credentials;
use Pesapal\Values\DemoStatus;
use Pesapal\Contracts\IFrameListener;

class Config
{
    /**
     * @var Credentials
     */
    protected $credentials;
    /**
     * @var DemoStatus
     */
    protected $demo;
    /**
     * @var DemoStatus
     */
    private $demoStatus;
    /**
     * @var array
     */
    private $iframe_listeners;
    /**
     * @var array
     */
    private $ipn_listeners;

    function __construct(
        Credentials $credentials,
        DemoStatus $demoStatus,
        array $iframe_listeners,
        array $ipn_listeners
    ) {
        $this->credentials = $credentials;
        $this->demoStatus = $demoStatus;
        $this->iframe_listeners = $iframe_listeners;
        $this->ipn_listeners = $ipn_listeners;
        $this->_validateIframeListeners();
    }

    protected function _validateIframeListeners()
    {

        foreach ($this->iframe_listeners as $iframe_listener) {

            Assertion::isInstanceOf($iframe_listener, IFrameListener::class);
        }
    }

} 