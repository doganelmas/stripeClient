<?php

class TransfersTraitTest extends BaseTest {

    public function testCreateTransferIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testTransferId'));

        $result = $this->stripeClient->createTransfer(1000, 'usd', 'testRecipientId');

        $this->assertEquals($result['id'], 'testTransferId');
    }

    public function testRetrieveTransferIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('id' => 'testTransferId'));

        $result = $this->stripeClient->retrieveTransfer('testTransferId');

        $this->assertEquals($result['id'], 'testTransferId');
    }

    public function testUpdateTransferIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testTransferId'));

        $result = $this->stripeClient->updateTransfer('testTransferId', array());

        $this->assertEquals($result['id'], 'testTransferId');
    }

    public function testCancelTransferIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testTransferId'));

        $result = $this->stripeClient->cancelTransfer('testTransferId');

        $this->assertEquals($result['id'], 'testTransferId');
    }

    public function testRetrieveAllTransfers()
    {
        $this->buildGetGuzzleMockRequest(array('object' => 'list'));

        $result = $this->stripeClient->retrieveAllTransfers();

        $this->assertEquals($result['object'], 'list');
    }

}