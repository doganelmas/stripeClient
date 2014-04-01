<?php require(__DIR__.'/vendor/autoload.php');

$guzzle = new GuzzleHttp\Client;

$stripe = new Stripe\StripeClient($guzzle, 'sk_test_lTgven7S54afshldQT0PxO9o');

/*var_dump($stripe->createCharge('1000', 'usd', array(
    'card' => array(
        'number'    => '4242424242424242',
        'exp_month' => 12,
        'exp_year'  => 2015
    )
)));*/

try
{
    var_dump($stripe->retrieveCharge('ch_10Yx2OcgB4BOOiqorBbJxc'));    
}
catch (Exception $e)
{
    echo var_dump($e->getMessage());
}

// var_dump($stripe->getAllCharges(array('created' => '1396267326')));