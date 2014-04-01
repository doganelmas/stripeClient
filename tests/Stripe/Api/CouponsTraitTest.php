<?php

class CouponsTraitTest extends BaseTest {

    public function testCreateCouponIsSuccess()
    {
        $this->buildPostGuzzleMockRequest(array('id' => 'testCouponId'));

        $result = $this->stripeClient->createCoupon(23, 1000, 'ABCDEF');

        $this->assertEquals($result['id'], 'testCouponId');
    }

    public function testRetrieveCouponIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('id' => 'testCouponId'));

        $result = $this->stripeClient->retrieveCoupon('testCouponId');

        $this->assertEquals($result['id'], 'testCouponId');
    }

    public function testDeleteCouponIsSuccess()
    {
        $this->buildDeleteGuzzleMockRequest(array('id' => 'testCouponId'));

        $result = $this->stripeClient->deleteCoupon('testCouponId');

        $this->assertEquals($result['id'], 'testCouponId');
    }

    public function testRetrieveAllCouponsIsSuccess()
    {
        $this->buildGetGuzzleMockRequest(array('object' => 'list'));

        $result = $this->stripeClient->retrieveAllCoupons();

        $this->assertEquals($result['object'], 'list');
    }

}