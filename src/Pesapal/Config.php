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
use Pesapal\Contracts\PaymentListener;

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
    protected $demoStatus;
    /**
     * @var array
     */
    protected $iframe_listeners;
    /**
     * @var array
     */
    protected $ipn_listeners;

    /**
     * @param Credentials $credentials
     * @param DemoStatus $demoStatus
     * @param array $iframe_listeners
     * @param array $ipn_listeners
     */
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
        $this->_validateIpnListeners();
    }

    protected function _validateIframeListeners()
    {
        Assertion::notEmpty($this->iframe_listeners);
        foreach ($this->iframe_listeners as $iframe_listener) {
            Assertion::isInstanceOf($iframe_listener, IFrameListener::class);
        }
    }

    protected function _validateIpnListeners()
    {
        Assertion::notEmpty($this->ipn_listeners);
        foreach ($this->ipn_listeners as $ipn_listener) {
            Assertion::isInstanceOf($ipn_listener, PaymentListener::class);
        }
    }

    /**
     * @return Credentials
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * @return DemoStatus
     */
    public function getDemo()
    {
        return $this->demo;
    }

    /**
     * @return DemoStatus
     */
    public function getDemoStatus()
    {
        return $this->demoStatus;
    }

    /**
     * @return array
     */
    public function getIframeListeners()
    {
        return $this->iframe_listeners;
    }

    /**
     * @return array
     */
    public function getIpnListeners()
    {
        return $this->ipn_listeners;
    }


} 