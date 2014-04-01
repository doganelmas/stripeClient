<?php namespace Stripe\Api;

trait CouponsTrait {

    /**
     * You can create coupons easily via the coupon management page of the 
     * Stripe dashboard. Coupon creation is also accessible via the API if you 
     * need to create coupons on the fly.
     * 
     * A coupon has either a percent_off or an amount_off and currency. If you 
     * set an amount_off, that amount will be subtracted from any invoice's 
     * subtotal. For example, an invoice with a subtotal of $10 will have a 
     * final total of $0 if a coupon with an amount_off of 2000 is applied to it 
     * and an invoice with a subtotal of $30 will have a final total of $10 if a 
     * coupon with an amount_off of 2000 is applied to it.
     *
     * @param  int     $percentOff
     * @param  string  $duration
     * @param  string  $couponId
     * @param  array   $attributes
     * @return object
     */
    public function createCoupon($percentOff, $duration, $couponId, array $attributes = array())
    {
        return $this->createRequest("/coupons", "post", $attributes);
    }

    /**
     * Retrieves the coupon with the given ID.
     *
     * @param  int  $couponId
     * @return object
     */
    public function retrieveCoupon($couponId)
    {
        return $this->createRequest("/coupons/{$couponId}");
    }

    /**
     * You can delete coupons via the coupon management page of the Stripe 
     * dashboard. However, deleting a coupon does not affect any customers who 
     * have already applied the coupon; it means that new customers can't redeem 
     * the coupon. You can also delete coupons via the API.
     *
     * @param  int  $couponId
     * @return object
     */
    public function deleteCoupon($couponId)
    {
        return $this->createRequest("/coupons/{$couponId}", "delete");
    }

    /**
     * Returns a list of your coupons.
     *
     * @param  array  $attributes
     * @return object
     */
    public function retrieveAllCoupons(array $attributes = array())
    {
        return $this->createRequest("/coupons", "get", $attributes);
    }

}