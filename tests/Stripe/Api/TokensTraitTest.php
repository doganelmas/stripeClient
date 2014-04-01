<?php

class TokensTraitTest extends BaseTest {

    public function testCreateCardTokenIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testTokenId'));

        $result = $this->stripeClient->createCardToken(4242424242424242, 12, 2015, 123);

        $this->assertEquals($result['id'], 'testTokenId');
    }

    public function testCreateBankAccountIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testBankAccountId'));

        $result = $this->stripeClient->createBankAccountToken('tr', '1111', '1111');

        $this->assertEquals($result['id'], 'testBankAccountId');
    }

}