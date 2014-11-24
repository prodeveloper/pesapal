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
use Pesapal\Values\IframeDimensions;

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
    protected $iframeListeners;
    /**
     * @var array
     */
    protected $ipnListeners;
    protected $callbackUrl;
    /**
     * @var IframeDimensions
     */
    protected $iframeDimensions;

    /**
     * @param Credentials $credentials
     * @param DemoStatus $demoStatus
     * @param array $iframe_listeners
     * @param array $ipn_listeners
     */
    function __construct(
        Credentials $credentials,
        DemoStatus $demoStatus,
        IframeDimensions $iframeDimensions,
        array $iframe_listeners,
        array $ipn_listeners,
        $callback_url
    ) {
        $this->credentials = $credentials;
        $this->demoStatus = $demoStatus;
        $this->iframeListeners = $iframe_listeners;
        $this->ipnListeners = $ipn_listeners;
        $this->_validateIframeListeners();
        $this->_validateIpnListeners();
        $this->callbackUrl = $callback_url;
        $this->iframeDimensions = $iframeDimensions;
    }

    protected function _validateIframeListeners()
    {
        Assertion::notEmpty($this->iframeListeners);
        foreach ($this->iframeListeners as $iframe_listener) {
            Assertion::isInstanceOf($iframe_listener, IFrameListener::class);
        }
    }

    protected function _validateIpnListeners()
    {
        Assertion::notEmpty($this->ipnListeners);
        foreach ($this->ipnListeners as $ipn_listener) {
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

        return $this->demoStatus;
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
        return $this->iframeListeners;
    }

    /**
     * @return array
     */
    public function getIpnListeners()
    {
        return $this->ipnListeners;
    }

    /**
     * @return mixed
     */
    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }
    /**
     * @return IframeDimensions $iframeDimensions
     */
    public function getIframeDimensions()
    {
        return $this->iframeDimensions;
    }


}