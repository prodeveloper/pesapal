<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Pesapal\Requests\GenerateIframe;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{


    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @beforeSuite
     */
    public static  function bootstrapApplication(){
        require_once __DIR__ ."/../../vendor/autoload.php";
    }



    /**
     * @Given I have made my order
     */
    public function iHaveMadeMyOrder()
    {

    }



    /**
     * @Then I should get "<iframe src=:arg1><\/iframe>"
     */
    public function iShouldGetIframeSrcIframe($arg1)
    {


        $pesapal=\Pesapal\Pesapal::make($this->getConfig());
        $faker= Faker\Factory::create();
        $order= new Pesapal\Entities\Order(
            $faker->randomNumber(),
            $faker->paragraph(),
            $faker->email,
            $faker->firstName,
            $faker->lastName,
            $faker->phoneNumber,
            uniqid("trans_"),
            'MERCHANT'


        );
        $pesapal->generateIframe($order);


    }
    function getConfig(){
        $prophet=new Prophecy\Prophet();
        $iframe_listener=$prophet->prophesize('Pesapal\Contracts\IFrameListener');
        $ipn_listener=$prophet->prophesize('Pesapal\Contracts\PaymentListener');
        $faker=\Faker\Factory::create();
        $credentials= new \Pesapal\Values\Credentials($faker->word,$faker->word);
        $demoStatus= new \Pesapal\Values\DemoStatus(true);
        $iframe_listeners= [$iframe_listener->reveal()];
        $ipn_listeners=[$ipn_listener->reveal()];
        $callback_url="";
        $config= new \Pesapal\Config($credentials,$demoStatus,$iframe_listeners,$ipn_listeners,$callback_url);
        return $config;
    }
}
