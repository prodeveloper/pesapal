<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 20/11/14
 * Time: 21:16
 */

namespace Pesapal\Values;

use Pesapal\Config;
use OAuthConsumer;

/**
 * Class OauthCredentials
 * @package Pesapal\Values
 */
class OauthCredentials
{
    /**
     * @var OAuthConsumer
     */
    protected $consumer;
    /**
     * @var Config
     */
    protected $config;

    function __construct(Config $config)
    {
        $this->config = $config;
        $this->_setConsumer();
    }


    protected function _setConsumer()
    {
        $this->consumer = new OAuthConsumer(
            $this->config->getCredentials()->consumer_key,
            $this->config->getCredentials()->consumer_secret
        );
    }

    /**
     * @return OAuthConsumer
     */
    public function getConsumer()
    {
        return $this->consumer;
    }

    public function getCallBackUrl()
    {
        return $this->config->getCallbackUrl();
    }

    public function getSignatureMethod()
    {
        return new \OAuthSignatureMethod_HMAC_SHA1();
    }

    public function getToken(){
        return null;
    }
    public function getIframeDimensions(){
        return $this->config->getIframeDimensions();
    }
} 