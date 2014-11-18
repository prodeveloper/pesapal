<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 10/11/14
 * Time: 16:58
 */

namespace Pesapal\Services;
use Pesapal\Config;
use Pesapal\Entities\Order;
use Pesapal\Events\IframeGeneratedEvent;
use Pesapal\Dispatcher\Raise;
use OAuthConsumer;

class OauthNegotiateForIframe
{
    use Raise;
    /**
     * @var Order
     */
    protected $order;
    protected $xml;
    protected $consumer;
    /**
     * @var Config
     */
    private $config;

    function __construct(Order $order, Config $config)
    {
        $this->order = $order;
        $this->xml= (new XMLGenerator())->getXMLFromOrder($order);
        $this->config = $config;
        $this->_setConsumer();
    }
    protected function _setConsumer(){
        $this->consumer=new OAuthConsumer(
            $this->config->getCredentials()->consumer_key,
            $this->config->getCredentials()->consumer_secret
        );
    }


    function getIframe()
    {


       $event=new IframeGeneratedEvent($this->xml);
        $this->raise($event);
    }
} 