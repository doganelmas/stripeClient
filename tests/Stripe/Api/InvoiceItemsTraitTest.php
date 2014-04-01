<?php

class InvoiceItemsTraitTest extends BaseTest {

    public function testCreateInvoiceItemsIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testInvoiceId'));

        $result = $this->stripeClient->createInvoiceItem('testCustomerId', 1000, 'usd');

        $this->assertEquals($result['id'], 'testInvoiceId');
    }

    public function testRetrieveInvoiceItemIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('id' => 'testInvoiceId'));

        $result = $this->stripeClient->retrieveInvoiceItem('testInvoiceId');

        $this->assertEquals($result['id'], 'testInvoiceId');
    }

    public function testUpdateInvoiceItemIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testInvoiceId'));

        $result = $this->stripeClient->updateInvoiceItem('testInvoiceId', array());

        $this->assertEquals($result['id'], 'testInvoiceId');
    }

    public function testDeleteInvoiceItemIsSuccess()
    {
        $this->buildDeleteGuzzleMockRequest(array('id' => 'testInvoiceId'));

        $result = $this->stripeClient->deleteInvoiceItem('testInvoiceId');

        $this->assertEquals($result['id'], 'testInvoiceId');
    }

    public function testRetrieveAllInvoiceItems()
    {
        $this->buildGetGuzzleMockRequest(array('object' => 'list'));

        $result = $this->stripeClient->retrieveAllInvoiceItems();

        $this->assertEquals($result['object'], 'list');
    }

}