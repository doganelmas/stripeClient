<?php

class BalancesTraitTest extends BaseTest {

    public function testRetrieveBalanceIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('object' => 'balance'));

        $result = $this->stripeClient->retrieveBalance();

        $this->assertEquals($result['object'], 'balance');
    }

    public function testRetrieveBalanceTransaction()
    {
        $this->buildGetGuzzleMockRequest(array('id' => 'testBalanceTransactionId'));

        $result = $this->stripeClient->retrieveBalanceTransaction('testBalanceTransactionId');

        $this->assertEquals($result['id'], 'testBalanceTransactionId');
    }

    public function testRetrieveAllBalanceHistory()
    {
        $this->buildGetGuzzleMockRequest(array('object' => 'list'));

        $result = $this->stripeClient->retrieveAllBalanceHistory();

        $this->assertEquals($result['object'], 'list');
    }

}