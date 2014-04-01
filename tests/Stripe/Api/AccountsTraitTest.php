<?php

require(__DIR__.'/BaseTest.php');

class AccountsTraitTest extends BaseTest {

    public function testRetrieveAccountDetailsIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('id' => 'testAccountId'));

        $result = $this->stripeClient->retrieveAccountDetails();

        $this->assertEquals($result['id'], 'testAccountId');
    }

}