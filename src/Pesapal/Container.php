<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 20/11/14
 * Time: 20:17
 */

namespace Pesapal;

use DI\ContainerBuilder;
use Pesapal\Config;
use Pesapal\Services\SingletonMake;
use Interop\Container\ContainerInterface;
use Pesapal\Values\Credentials;
use Pesapal\Values\OauthCredentials;

/**
 * Class Container
 * @package Pesapal
 *
 * @method static \Pesapal\Container make()
 */
class Container
{
    /**
     * @var \DI\Container
     */
    protected $container;
    protected $config;
    protected $bootstrap;
    protected $commandbus;
    /**
     * @var OauthCredentials
     */
    protected $oauthCredentials;


    use SingletonMake;

    /**
     * @return \DI\Container
     */
    public function getContainer()
    {
        return $this->container;

    }
    function run(){
        $builder = new \DI\ContainerBuilder();
        $this->container = $builder->build();
    }
    /**
     * @param Config
     */
    function setConfig(Config $config)
    {
        $this->container->set('config',$config);
    }
    /**
     * @param Config
     */
    public function setBootstrap(Config $config)
    {
        $this->bootstrap=new \Pesapal\Bootstrap();
        $this->bootstrap->addListeners($config);
        $this->container->set("bootstrap",$this->bootstrap);
        $this->container->set('commandBus',$this->bootstrap->getCommandBus());
    }
    /**
     * @param Config $config
     */
    public function setOauthCredentials(Config $config)
    {
        $this->oauthCredentials = new OauthCredentials($config);
        $this->container->set(OauthCredentials::class,$this->oauthCredentials);
    }


} 