<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 24/11/14
 * Time: 15:13
 */

namespace Pesapal\Services;

use Pesapal\Values\IPNData;
use Pesapal\Values\OauthCredentials;
class OauthGetPaymentStatus
{
    /**
     * @var OauthCredentials
     */
    protected $oauthCredentials;
    protected $ipnData;

    /**
     * @Inject
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
} 