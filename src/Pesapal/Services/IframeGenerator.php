<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 17/11/14
 * Time: 23:34
 */

namespace Pesapal\Services;

use Pesapal\Requests\GenerateIframe;
use Pesapal\Services\OauthNegotiateForIframe;
class IframeGenerator
{
    function generateIframe(GenerateIframe $command)
    {
        (new OauthNegotiateForIframe($command->order,$command->config))->getIframe();
    }
} 