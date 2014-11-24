<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 10/11/14
 * Time: 16:58
 */

namespace Pesapal\Services;

use Pesapal\Entities\Order;
use Pesapal\Events\IframeGeneratedEvent;
use Pesapal\Dispatcher\Raise;
use OAuthRequest;
use Pesapal\Events\InvalidIframeRequest;
use Pesapal\Values\OauthCredentials;
use Pesapal\Services\SignedOauthRequest;

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
     * @var OauthCredentials
     */
    protected $oauthCredentials;
    protected $iframe_src;
    protected $iframe;
    /**
     * @var SignedOauthRequest
     */
    protected $signedOauthRequest;

    /**
     * @Inject
     * @param SignedOauthRequest $signedOauthRequest
     */
    public function setSignedOauthRequest(SignedOauthRequest $signedOauthRequest)
    {
        $this->signedOauthRequest = $signedOauthRequest;
    }


    /**
     * @param Order $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @Inject
     * @param OauthCredentials $oauthCredentials
     */
    public function setOauthCredentials($oauthCredentials)
    {
        $this->oauthCredentials = $oauthCredentials;
    }

    /**
     * @param Order $order
     */
    public function run(Order $order)
    {
        $this->xml = (new XMLGenerator())->getXMLFromOrder($order);
        $this->_postTransaction();
        $this->_formatRequest();
        $this->_validateIframe();

    }

    protected function _postTransaction()
    {

        $this->iframe_src=$this->signedOauthRequest->initialize()
            ->set_parameter("oauth_callback",$this->oauthCredentials->getCallBackUrl()
            )
            ->set_parameter("pesapal_request_data",$this->xml)
            ->getSigned();


    }

    protected function _formatRequest()
    {
        $format = '<iframe src="%s" width="%s" height="%s" scrolling="%s" frameBorder="%s"> <p>Unable to load the payment page</p> </iframe>';
        $this->iframe = sprintf(
            $format,
            $this->iframe_src,
            $this->oauthCredentials->getIframeDimensions()->getWidth(),
            $this->oauthCredentials->getIframeDimensions()->getHeight(),
            $this->oauthCredentials->getIframeDimensions()->getScrolling(),
            $this->oauthCredentials->getIframeDimensions()->getFrameBorder()
        );

    }

    protected function _validateIframe()
    {
        if (strpos($this->iframe, "Problem") !== false) {
            throw new InvalidIframeRequest($this->iframe);
        }
    }

    function getIframe(Order $order)
    {
        $this->run($order);
        $event = new IframeGeneratedEvent($this->iframe);
        $this->raise($event);

    }


}