##Pesapal PHP module

##Introduction
The application allows for integration with pesapal in a framework and database agnostic
way.

This is achieved by firing and dispatching payment events to the rest of your application.

The application is currently in heavy development.

##Installation

From the root of your application run

    composer require chencha/pesapal
    
This should install the package.

##Getting started

##Configurations

On start of application, several objects must be provided. The objects are listed below

###Credentials

This is a simple value object

    $credentials= new \Pesapal\Values\Credentials("<<consumer_key>>","<<consumer_secret>>");

###Demo Status

This object controls interaction with either the live or demo pesapal application. The object should be constructed with false when live and true when in demo mode

    $demoStatus= new \Pesapal\Values\DemoStatus(true);
    
###Iframe Dimensions

For iframe use, the dimensions should be provided. You can override any of the defaults

    $iframeDimensions=new \Pesapal\Values\IframeDimensions(
        $height="620px",
        $width="500px",
        $autoscrolling="no",
        $iframeBorder=0
    );
    
###Listeners

####Iframe Generated Event Listener

This class should listen for and act when a new Iframe is generated.

The listener must impliment

    \Pesapal\Contracts\IFrameListener

A sample listener is provided that simply echos out the iframe 

    <?php
    class ShowIframe implements \Pesapal\Contracts\IFrameListener {
    
    
        function show($iframe)
        {
            echo $iframe;
        }
    }

Listeners must be passed as an array eg

    $iframe_listeners= [new ShowIframe()];
    
####Change Payment Status Event Listener

This class should listen for and act when there is a change in payment status for an order

This will usually result from an IPN being sent out to your application from pesapal

The listener must impliment 

    \Pesapal\Contracts\PaymentListener

A sample listener would be as follows

    <?php
    
    class SendThankYouEmail implements \Pesapal\Contracts\PaymentListener {
    
        public function paid()
        {
            echo "Thank you for payment";
        }
    
        public function failed()
        {
            echo "Payment failed";
        }
    
        public function inProgress()
        {
            echo "Payment in progress";
        }
    }

Listeners must be passed as an array eg

    $ipn_listeners=[new SendThankYouEmail()];
    
###Callback URL

This is the url you wish the user to be redirected to once user has made their payment


##Bringing it all together

The final config file will consist of all the possible configurations and built as such

    $config= new \Pesapal\Config($credentials,$demoStatus,$iframeDimensions,$iframe_listeners,$ipn_listeners,$callback_url);
    
##Making an order

The essense of a payment module is to process an order so lets get to it. 

A pesapal order is provided as 

    $faker= Faker\Factory::create();
    $order= new Pesapal\Entities\Order(
        rand(10,1000),
        $faker->paragraph(),
        $faker->email,
        $faker->firstName,
        $faker->lastName,
        $faker->phoneNumber,
        uniqid("trans_"),
        'MERCHANT'
    
    
    );

You should replace the faked data with your own customers information

Once order is ready you send command to generate iframe for the order as

    $pesapal=\Pesapal\Pesapal::make($config);
    $pesapal->generateIframe($order);
    
When iframe is generated, all iframe listeners will have the show method on them called with the iframe.

##Setting up IPN

You must put the IPN class where you respond to the callback class previously provided

    $ipn_data= new \Pesapal\Values\IPNData($_GET['pesapal_merchant_reference'],$_GET['pesapal_notification_type'],$_GET['pesapal_transaction_tracking_id']);
    $pesapal=\Pesapal\Pesapal::make($config);
    $pesapal->ipn($ipn_data);

That's it, now when a new IPN comes in, the relevant method (paid, failed, inProgress) on all payment status listeners will be called.

##Examples

To see the code above in practise, please check out the example files