<?php

class RecipientsTraitTest extends BaseTest {

    public function testCreateRecipientIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testRecipientId'));

        $result = $this->stripeClient->createRecipient('Erol Uysal', 'individual');

        $this->assertEquals($result['id'], 'testRecipientId');
    }

    public function testRetrieveRecipientIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('id' => 'testRecipientId'));

        $result = $this->stripeClient->retrieveRecipient('testRecipientId');

        $this->assertEquals($result['id'], 'testRecipientId');
    }

    public function testUpdateRecipientIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testRecipientId'));

        $result = $this->stripeClient->updateRecipient('testRecipientId', array());

        $this->assertEquals($result['id'], 'testRecipientId');
    }

    public function testDeleteRecipientIsSuccess()
    {
        $this->buildDeleteGuzzleMockRequest(array('id' => 'testRecipientId'));

        $result = $this->stripeClient->deleteRecipient('testRecipientId');

        $this->assertEquals($result['id'], 'testRecipientId');
    }

    public function testRetrieveAllRecipientsIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('id' => 'testRecipientId'));

        $result = $this->stripeClient->retrieveAllRecipients();

        $this->assertEquals($result['id'], 'testRecipientId');
    }

}