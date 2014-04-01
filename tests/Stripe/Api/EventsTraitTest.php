<?php

class EventsTraitTest extends BaseTest {

    public function testRetrieveEventIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('id' => 'testEventId'));

        $result = $this->stripeClient->retrieveEvent('testEventId');

        $this->assertEquals($result['id'], 'testEventId');
    }

    public function testRetrieveAllEvents()
    {
        $this->buildGetGuzzleMockRequest(array('object' => 'event'));

        $result = $this->stripeClient->retrieveAllEvents();

        $this->assertEquals($result['object'], 'event');
    }

}