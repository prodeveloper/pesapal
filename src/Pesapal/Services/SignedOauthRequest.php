<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 24/11/14
 * Time: 15:20
 */

namespace Pesapal\Services;

use OAuthRequest;
use Pesapal\Values\OauthCredentials;

class SignedOauthRequest
{
    /**
     * @var OAuthRequest
     */
    protected $request;
    /**
     * @var OauthCredentials
     */
    protected $oauthCredentials;

    function __construct()
    {
    }

    /**
     * @Inject
     * @param OauthCredentials $oauthCredentials
     */
    public function setOauthCredentials($oauthCredentials)
    {
        $this->oauthCredentials = $oauthCredentials;
    }

    function initialize($link)
    {
        $this->request = OAuthRequest::from_consumer_and_token(
            $this->oauthCredentials->getConsumer(),
            $this->oauthCredentials->getToken(),
            "GET",
            $link
        );
        return $this;
    }

    function set_parameter($name, $value)
    {
        $this->request->set_parameter($name, $value);
        return $this;
    }

    function getSigned()
    {
        $this->request->sign_request(
            $this->oauthCredentials->getSignatureMethod(),
            $this->oauthCredentials->getConsumer(),
            $this->oauthCredentials->getToken()
        );
        return $this->request;
    }

} 