<?php

class ApplicationFeesTraitTest extends BaseTest {

    public function testRetrieveApplicationFeeIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('id' => 'testApplicationFeeId'));

        $result = $this->stripeClient->retrieveApplicationFee('testApplicationFeeId');

        $this->assertEquals($result['id'], 'testApplicationFeeId');
    }

    public function testRefundApplicationFeeIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testApplicationFeeId'));

        $result = $this->stripeClient->refundApplicationFee('testApplicationFeeId');

        $this->assertEquals($result['id'], 'testApplicationFeeId');
    }

    public function testListAllApplicationFeesIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('object' => 'list'));

        $result = $this->stripeClient->retrieveAllApplicationFees();

        $this->assertEquals($result['object'], 'list');
    }

}