<?php

class CardsTraitTest extends BaseTest {

    public function testCreateCardIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testCardId'));

        $result = $this->stripeClient->createCard('testCustomerId', array());

        $this->assertEquals($result['id'], 'testCardId');
    }

    public function testRetrieveIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('id' => 'testCardId'));

        $result = $this->stripeClient->retrieveCard('customerId', 'testCardId');

        $this->assertEquals($result['id'], 'testCardId');
    }

    public function testUpdateCardIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testCardId'));

        $result = $this->stripeClient->updateCard('testCustomerId', 'testCardId', array());

        $this->assertEquals($result['id'], 'testCardId');
    }

    public function testDeleteCardIsSuccess()
    {
        $this->buildDeleteGuzzleMockRequest(array('id' => 'testCardId'));

        $result = $this->stripeClient->deleteCard('testCustomerId', 'testCardId');

        $this->assertEquals($result['id'], 'testCardId');
    }

    public function testRetrieveAllCards()
    {
        $this->buildGetGuzzleMockRequest(array('object' => 'list'));

        $result = $this->stripeClient->retrieveAllCards('testCustomerId');

        $this->assertEquals($result['object'], 'list');
    }

}