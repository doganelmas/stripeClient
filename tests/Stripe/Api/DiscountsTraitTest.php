<?php

class DiscountsTraitTest extends BaseTest {

    public function testDeleteCustomerDiscountIsSuccess()
    {
        $this->buildDeleteGuzzleMockRequest(array('id' => 'testDiscountId'));

        $result = $this->stripeClient->deleteCustomerDiscount('testCusomterId');

        $this->assertEquals($result['id'], 'testDiscountId');
    }

    public function testDeleteSubscriptionDiscountIsSuccess()
    {
        $this->buildDeleteGuzzleMockRequest(array('id' => 'testDiscountId'));

        $result = $this->stripeClient->deleteSubscriptionDiscount('testCusomterId', 'testSubscriptionId');

        $this->assertEquals($result['id'], 'testDiscountId');
    }

}