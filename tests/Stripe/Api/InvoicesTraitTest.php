<?php

class InvoicesTraitTest extends BaseTest {

    public function testCreateInvoiceIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testInvoiceId'));

        $result = $this->stripeClient->createInvoice('testInvoiceId');

        $this->assertEquals($result['id'], 'testInvoiceId');
    }

    public function testRetrieveInvoiceIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('id' => 'testInvoiceId'));

        $result = $this->stripeClient->retrieveInvoice('testInvoiceId');

        $this->assertEquals($result['id'], 'testInvoiceId');
    }

    public function testUpdateInvoiceIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testInvoiceId'));

        $result = $this->stripeClient->updateInvoice('testInvoiceId', array());

        $this->assertEquals($result['id'], 'testInvoiceId');
    }

    public function testRetrieveAllInvoices()
    {
        $this->buildGetGuzzleMockRequest(array('object' => 'list'));

        $result = $this->stripeClient->retrieveAllInvoices();

        $this->assertEquals($result['object'], 'list');
    }

    public function testRetrieveCustomersUpcomingInvoice()
    {
        $this->buildGetGuzzleMockRequest(array('object' => 'list'));

        $result = $this->stripeClient->retrieveCustomersUpcomingInvoice('testCustomerId', 'testSubscriptionId');

        $this->assertEquals($result['object'], 'list');
    }

    public function testPayInvoiceIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('object' => 'list'));

        $result = $this->stripeClient->payInvoice('testInvoiceId');

        $this->assertEquals($result['object'], 'list');
    }

}