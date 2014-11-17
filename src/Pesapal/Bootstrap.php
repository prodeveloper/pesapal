<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 17/11/14
 * Time: 22:58
 */

namespace Pesapal;
use LiteCQRS\Bus\EventMessageHandlerFactory;
use LiteCQRS\Bus\InMemoryEventMessageBus;
use LiteCQRS\Bus\SimpleIdentityMap;
use LiteCQRS\Bus\IdentityMap\EventProviderQueue;
use LiteCQRS\Bus\DirectCommandBus;
use Pesapal\Requests\GenerateIframe;

/**
 * Simpleton class to startup application
 * Class Bootstrap
 * @package Pesapal
 */
class Bootstrap {
    protected $identityMap;
    /**
     * @var DirectCommandBus
     */
    protected $commandBus;
    protected static $bootstrap;

    function __construct()
    {
        if(!isset(self::$bootstrap)){
            $this->run();
            self::$bootstrap=$this;
        }
        return self::$bootstrap;
    }

    protected function run(){
        $messageBus=new InMemoryEventMessageBus();
        $this->commandBus=new DirectCommandBus();
        $this->registerNativeBindings();

    }
    /**
     * @return DirectCommandBus
     */
    public function getCommandBus()
    {
        return $this->commandBus;
    }
    protected function registerNativeBindings(){
        $service= new \Pesapal\Services\IframeGenerator();
        $this->getCommandBus()->register(GenerateIframe::class,$service);
    }

} 