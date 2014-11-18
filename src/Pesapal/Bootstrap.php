<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 17/11/14
 * Time: 22:58
 */

namespace Pesapal;

use LiteCQRS\Bus\InMemoryEventMessageBus;
use LiteCQRS\Bus\DirectCommandBus;
use Pesapal\Requests\GenerateIframe;
use Pesapal\Services\Dispatcher;
use Pesapal\Broadcasts\PaymentBroadcast;
use Pesapal\Broadcasts\IframeBroadcast;

/**
 * Simpleton class to startup application
 * Class Bootstrap
 * @package Pesapal
 */
class Bootstrap
{
    protected $identityMap;
    /**
     * @var DirectCommandBus
     */
    protected $commandBus;
    /**
     * @var InMemoryEventMessageBus
     */
    protected $messageBus;

    protected static $bootstrap;

    function __construct()
    {
        if (!isset(self::$bootstrap)) {
            $this->run();
            self::$bootstrap = $this;
        }
        return self::$bootstrap;
    }

    protected function run()
    {
        $this->commandBus = new DirectCommandBus();
        $this->registerNativeBindings();

    }

    /**
     * @return DirectCommandBus
     */
    public function getCommandBus()
    {
        return $this->commandBus;
    }

    /**
     *
     */
    public function getMessageBus()
    {
        return new Dispatcher();
    }

    protected function registerNativeBindings()
    {
        $service = new \Pesapal\Services\IframeGenerator();
        $this->getCommandBus()->register(GenerateIframe::class, $service);
    }

    function addPaymentListeners(array $listeners)
    {
        foreach ($listeners as $listener) {
            PaymentBroadcast::make()->addListener($listener);
        }
    }
    function addIframeListeners(array $listeners){
        foreach ($listeners as $listener) {
            IframeBroadcast::make()->addListener($listener);
        }
    }
    function addListeners(Config $config){
        $this->addIframeListeners($config->getIframeListeners());
        $this->addPaymentListeners($config->getIpnListeners());
    }


} 