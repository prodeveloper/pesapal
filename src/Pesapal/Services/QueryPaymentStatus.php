<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 31/12/14
 * Time: 08:55
 */

namespace Pesapal\Services;
use Pesapal\Values\OauthCredentials;
use Guzzle\Http\Client;
use Pesapal\Values\DemoStatus;
class QueryPaymentStatus {
    use \Pesapal\Dispatcher\Raise;
    /**
     * @var OauthCredentials
     */
    protected $oauthCredentials;
    /**
     * @var SignedOauthRequest
     */
    protected $signedOauthRequest;
    /**
     * @var DemoStatus
     */
    protected $demoStatus;



    /**
     * @Inject
     * @param OauthCredentials $oauthCredentials
     */
    public function setOauthCredentials($oauthCredentials)
    {
        $this->oauthCredentials = $oauthCredentials;
    }

    /**
     * @Inject
     * @param SignedOauthRequest $signedOauthRequest
     */
    public function setSignedOauthRequest(SignedOauthRequest $signedOauthRequest)
    {
        $this->signedOauthRequest = $signedOauthRequest;
    }
    /**
     * @Inject
     * @param DemoStatus $demoStatus
     */
    public function setDemoStatus(DemoStatus $demoStatus)
    {
        $this->demoStatus = $demoStatus;
    }
    function run($merchant_reference)
    {
        $request = $this->_prepareOauthRequest($merchant_reference);
        return $this->getPaymentStatusFromPesapal($request);

    }
    protected function getPaymentStatusFromPesapal($request){
        $client= new Client();
        $response=$client->get($request)->send();
        return $pesapal_response=str_replace("pesapal_response_data=","",$response->getBody());
    }



    /**
     * @return \OAuthRequest
     */
    protected function _prepareOauthRequest($merchant_reference)
    {
        $request = $this->signedOauthRequest
            ->initialize($this->demoStatus->getQueryByRefLink())
            ->set_parameter('pesapal_merchant_reference', $merchant_reference)
            ->getSigned();
        return $request;
    }
}