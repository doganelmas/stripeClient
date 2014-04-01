<?php

class CustomersTraitTest extends BaseTest {

    public function testCreateCustomerIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testCustomerId'));

        $result = $this->stripeClient->createCustomer(array('email' => 'test@example.com'));

        $this->assertEquals($result['id'], 'testCustomerId');
    }

    public function testRetrieveCustomerIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('id' => 'testCustomerId'));

        $result = $this->stripeClient->retrieveCustomer('testCustomerId');

        $this->assertEquals($result['id'], 'testCustomerId');
    }

    public function testUpdateCustomerIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testCustomerId'));

        $result = $this->stripeClient->updateCustomer('testCustomerId', array());

        $this->assertEquals($result['id'], 'testCustomerId');
    }

    public function testDeleteCustomerIsSuccess()
    {
        $this->buildDeleteGuzzleMockRequest(array('id' => 'testCustomerId'));

        $result = $this->stripeClient->deleteCustomer('testCustomerId');

        $this->assertEquals($result['id'], 'testCustomerId');
    }

    public function testRetrieveAllCustomerIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('object' => 'list'));

        $result = $this->stripeClient->retrieveAllCustomer();

        $this->assertEquals($result['object'], 'list');
    }

}