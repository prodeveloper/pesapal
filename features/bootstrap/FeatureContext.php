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
    use Pesapal\Dispatcher\RequestDispatcher;

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

        $bootstrap=new \Pesapal\Bootstrap();;
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
        $bootstrap->getCommandBus()->handle(new GenerateIframe($order));


    }
}
