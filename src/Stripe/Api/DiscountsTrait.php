<?php namespace Stripe\Api;

trait DiscountsTrait {

    /**
     * Removes the currently applied discount on a customer.
     *
     * @param  int  $customerId
     * @return object
     */
    public function deleteCustomerDiscount($customerId)
    {
        $segments = "/customers/{$customerId}/discount";

        return $this->createRequest($segments, "delete");
    }

    /**
     * Deleting a Subscription Discount.
     *
     * @param  int  $customerId
     * @param  int  $subscriptionId
     * @return object
     */
    public function deleteSubscriptionDiscount($customerId, $subscriptionId)
    {
        $segments = "/customers/{$customerId}/Subscriptions/{$subscriptionId}/discount";

        return $this->createRequest($segments, "delete");
    }

}