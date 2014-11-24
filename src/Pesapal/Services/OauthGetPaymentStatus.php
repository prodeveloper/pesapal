<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 24/11/14
 * Time: 15:13
 */

namespace Pesapal\Services;

use Pesapal\Entities\Payment;
use Pesapal\Events\PaymentEvent;
use Pesapal\Values\IPNData;
use Pesapal\Values\OauthCredentials;
use Pesapal\Services\SignedOauthRequest;
use Guzzle\Http\Client;
use Pesapal\Values\DemoStatus;
class OauthGetPaymentStatus
{
    use \Pesapal\Dispatcher\Raise;
    /**
     * @var OauthCredentials
     */
    protected $oauthCredentials;
    /**
     * @var IPNData
     */
    protected $ipnData;
    /**
     * @var SignedOauthRequest
     */
    protected $signedOauthRequest;
    /**
     * @var DemoStatus
     */
    protected $demoStatus;

    /**
     * @param IPNData $ipnData
     */
    public function setIpnData($ipnData)
    {
        $this->ipnData = $ipnData;
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
    function run()
    {

        $request = $this->signedOauthRequest
            ->initialize($this->demoStatus->getQueryLink())
            ->set_parameter('pesapal_merchant_reference', $this->ipnData->getMerchantReference())
            ->set_parameter('pesapal_transaction_tracking_id', $this->ipnData->getTrackingId())
            ->getSigned();
        $payment= new Payment($this->ipnData,$this->getPaymentStatusFromPesapal($request));
        $event= new PaymentEvent($payment);
        $this->raise($event);

        $this->raise($event);

    }
    protected function getPaymentStatusFromPesapal($request){
        $client= new Client();
        $response=$client->get($request)->send();
        return $pesapal_response=str_replace("pesapal_response_data=","",$response->getBody());
    }

}