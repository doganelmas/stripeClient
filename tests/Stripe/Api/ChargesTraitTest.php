<?php

class ChargesTraitTest extends BaseTest {

    public function testCreateChargeIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testChargeId'));

        $result = $this->stripeClient->createCharge(1000, 'try', array());

        $this->assertEquals($result['id'], 'testChargeId');
    }

    public function testRetrieveChargesIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('id' => 'testChargeId'));

        $result = $this->stripeClient->retrieveCharge('testChargeId');

        $this->assertEquals($result['id'], 'testChargeId');
    }

    public function testUpdateChargeIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testChargeId'));

        $result = $this->stripeClient->updateCharge('testChargeId', array());

        $this->assertEquals($result['id'], 'testChargeId');
    }

    public function testRefundChargeIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testChargeId'));

        $result = $this->stripeClient->refundCharge('testChargeId');

        $this->assertEquals($result['id'], 'testChargeId');
    }

    public function testCaptureChargeIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testChargeId'));

        $result = $this->stripeClient->captureCharge('testChargeId');

        $this->assertEquals($result['id'], 'testChargeId');
    }

    public function testRetrieveAllCharges()
    {
        $this->buildGetGuzzleMockRequest(array('object' => 'list'));

        $result = $this->stripeClient->retrieveAllCharges();

        $this->assertEquals($result['object'], 'list');
    }

}