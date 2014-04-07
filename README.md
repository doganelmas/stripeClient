phpStripeClient
===============

#### Create Charge

    <?php
    
    require(__DIR__.'/vendor/autoload.php');
    
    $guzzle = new GuzzleHttp\Client;
    
    $stripe = new Stripe\StripeClient($guzzle, 'secretKeyIsHere');
    
    $stripe->createCharge('1000', 'usd', array(
        'card' => array(
            'number'    => '4242424242424242',
            'exp_month' => 12,
            'exp_year'  => 2015
        )
    ))
    
#### Retrieve exist charge

    $charge = $stripe->retrieveCharge('chargeIdIsHere');
