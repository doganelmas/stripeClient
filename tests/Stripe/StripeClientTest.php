<?php

use Mockery as m;

class StripeClientTest extends PHPUnit_Framework_TestCase {

    /**
     * StripeClientTest is Setup method.
     *
     * @return void
     */
    protected function setUp()
    {
        $guzzleMock = $this->guzzleMock = m::mock('GuzzleHttp\Client');

        $this->stripeClient = new Stripe\StripeClient($guzzleMock, 'apiKey');
    }

    public function testApiUrlCorrectIsSuccess()
    {
        $myUrl = 'https://api.stripe.com/v1/plans';

        $createdUrl = $this->stripeClient->getApiUrl('plans');

        $this->assertEquals($myUrl, $createdUrl);
    }

    public function testApiUrlCorrectIsFail()
    {
        $myUrl = 'https://api.stripe.com/v1/plans';

        $createdUrl = $this->stripeClient->getApiUrl('/plans/created');

        $this->assertNotEquals($myUrl, $createdUrl);
    }

    public function testMergeWithAttributesCorrectIsSuccess()
    {
        $myAttributes = array(
            'auth' => array('apiKey', ''),
            'body' => array('name' => 'value')
        );

        $createdAttributes = $this->stripeClient->mergeWith(array('name' => 'value'));

        $this->assertEquals($myAttributes, $createdAttributes);
    }

    protected function tearDown()
    {
        m::close();
    }

}