<?php

class DisputesTraitTest extends BaseTest {

    public function testUpdateDisputeIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('evidence' => 'test evidence message.'));

        $result = $this->stripeClient->updateDispute('testChargeId', 'test evidence message.');

        $this->assertEquals($result['evidence'], 'test evidence message.');
    }

    public function testCloseDisputeIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('object' => 'dispute'));

        $result = $this->stripeClient->closeDispute('testChargeId');

        $this->assertEquals($result['object'], 'dispute');
    }

}