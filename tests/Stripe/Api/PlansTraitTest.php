<?php

class PlansTraitTest extends BaseTest {

    public function testCreatePlanIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testPlanId'));

        $result = $this->stripeClient->createPlan('basic', 'testPlanId', 1000, 'usd', array());

        $this->assertEquals($result['id'], 'testPlanId');
    }

    public function testRetrievePlanIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('id' => 'testPlanId'));

        $result = $this->stripeClient->retrievePlan('testPlanId');

        $this->assertEquals($result['id'], 'testPlanId');
    }

    public function testUpdatePlanIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testPlanId'));

        $result = $this->stripeClient->updatePlan('testPlanId', array());

        $this->assertEquals($result['id'], 'testPlanId');
    }

    public function testDeletePlanIsSuccess()
    {
        $this->buildDeleteGuzzleMockRequest(array('id' => 'testPlanId'));

        $result = $this->stripeClient->deletePlan('testPlanId');

        $this->assertEquals($result['id'], 'testPlanId');
    }

    public function testRetrieveAllPlansIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('object' => 'list'));

        $result = $this->stripeClient->retrieveAllPlans();

        $this->assertEquals($result['object'], 'list');
    }

}