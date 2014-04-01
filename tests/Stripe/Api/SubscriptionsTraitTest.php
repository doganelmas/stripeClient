<?php

class SubscriptionsTraitTest extends BaseTest {

    public function testCreateSubscriptionIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testSubscriptionId'));

        $result = $this->stripeClient->createSubscription('testCustomerId', 'testPlanName', array());

        $this->assertEquals($result['id'], 'testSubscriptionId');
    }

    public function testRetrieveSubscriptionIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('id' => 'testSubscriptionId'));

        $result = $this->stripeClient->retrieveSubscription('testCustomerId', 'testSubscriptionId');

        $this->assertEquals($result['id'], 'testSubscriptionId');
    }

    public function testUpdateSubscriptionIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testSubscriptionId'));

        $result = $this->stripeClient->updateSubscription('testCustomerId', 'testSubscriptionId', array());

        $this->assertEquals($result['id'], 'testSubscriptionId');
    }

    public function testCancelSubscriptionIsSuccess()
    {
        $this->buildDeleteGuzzleMockRequest(array('id' => 'testSubscriptionId'));

        $result = $this->stripeClient->cancelSubscription('testCustomerId', 'testSubscriptionId');

        $this->assertEquals($result['id'], 'testSubscriptionId');
    }

    public function testRetrieveAllSubscriptionsIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('object' => 'list'));

        $result = $this->stripeClient->retrieveAllSubscriptions('testCustomerId');

        $this->assertEquals($result['object'], 'list');
    }

}