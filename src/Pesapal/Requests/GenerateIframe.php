<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 10/11/14
 * Time: 16:23
 */

namespace Pesapal\Requests;
use Pesapal\Config;
use Pesapal\Entities\Order;
use LiteCQRS\DefaultCommand;

class GenerateIframe extends DefaultCommand
{
    public  $order;
    public $response;
    /**
     * @var Config
     */
    public $config;

    function __construct(Order $order, Config $config)
    {
        $this->order = $order;
        $this->config = $config;
    }
} 