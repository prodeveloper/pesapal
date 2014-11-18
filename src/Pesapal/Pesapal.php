<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 18/11/14
 * Time: 10:35
 */

namespace Pesapal;
use Pesapal\Config;
use Pesapal\Entities\Order;
use Pesapal\Requests\GenerateIframe;

class Pesapal
{
    /**
     * @var Config
     */
    protected $config;
    protected $bootstrap;
    protected static $instance;

    private function __construct(Config $config)
    {
        $this->config = $config;
        $this->bootstrap=new \Pesapal\Bootstrap();
        $this->bootstrap->addListeners($config);

    }

    static function make(Config $config)
    {
        if (!self::$instance) {
            self::$instance = new self($config);
        }
        return self::$instance;
    }


    function generateIframe(Order $order)
    {
        $this->bootstrap->getCommandBus()->handle(new GenerateIframe($order));
    }

    function ipn($data)
    {

    }


} 