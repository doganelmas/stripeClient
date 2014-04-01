<?php namespace Stripe\Api;

trait SubscriptionsTrait {

    /**
     * Creates a new subscription on an existing customer.
     *
     * @param  int    $customerId
     * @param  mixed  $plan
     * @param  array  $attributes
     * @return object
     */
    public function createSubscription($customerId, $plan, array $attributes = array())
    {
        $segments = "/customers/{$customerId}/subscriptions";

        return $this->createRequest($segments, "post", $attributes);
    }

    /**
     * By default, you can see the 10 most recent active subscriptions stored 
     * on a customer directly on the customer object, but you can also retrieve 
     * details about a specific active subscription for a customer.
     *
     * @param  int  $customerId
     * @param  int  $subscriptionId
     * @return object
     */
    public function retrieveSubscription($customerId, $subscriptionId)
    {
        $segments = "/customers/{$customerId}/subscriptions/{$subscriptionId}";

        return $this->createRequest($segments);
    }

    /**
     * Updates an existing subscription on a customer to match the specified 
     * parameters. When changing plans or quantities, we will optionally prorate 
     * the price we charge next month to make up for any price changes.
     *
     * @param  int    $customerId
     * @param  int    $subscriptionId
     * @param  array  $attributes
     * @return object
     */
    public function updateSubscription($customerId, $subscriptionId, 
                                        array $attributes = array())
    {
        $segments = "/customers/{$customerId}/subscriptions/{$subscriptionId}";

        return $this->createRequest($segments, "post", $attributes);
    }

    /**
     * Cancels a customer's subscription. If you set the at_period_end parameter 
     * to true, the subscription will remain active until the end of the period,
     * at which point it will be cancelled and not renewed. By default, the 
     * subscription is terminated immediately. In either case, the customer will 
     * not be charged again for the subscription. Note, however, that any pending 
     * invoice items that you've created will still be charged for at the end of 
     * the period unless manually deleted. If you've set the subscription to 
     * cancel at period end, any pending prorations will also be left in place 
     * and collected at the end of the period, but if the subscription is set 
     * to cancel immediately, pending prorations will be removed.
     * 
     * By default, all unpaid invoices for the customer will be closed upon 
     * subscription cancellation. We do this in order to prevent unexpected 
     * payment retries once the customer has canceled a subscription. However, 
     * you can reopen the invoices manually after subscription cancellation to 
     * have us proceed with automatic retries, or you could even re-attempt 
     * payment yourself on all unpaid invoices before allowing the customer to 
     * cancel the subscription at all.
     *
     * @param  int  $customerId
     * @param  int  $subscriptionId
     * @param  int  $atPeriodEnd
     * @return object
     */
    public function cancelSubscription($customerId, $subscriptionId, $atPeriodEnd = null)
    {
        $segments = "/customers/{$customerId}/subscriptions/{$subscriptionId}";

        $attributes = array('at_period_end' => $atPeriodEnd);

        return $this->createRequest($segments, "delete", $attributes);
    }

    /**
     * You can see a list of the customer's active subscriptions. Note that the 
     * 10 most recent active subscriptions are always available by default on 
     * the customer object. If you need more than those 10, you can use the 
     * limit and starting_after parameters to page through additional 
     * subscriptions.
     *
     * @param  int  $customerId
     * @param  int  $subscriptionId
     * @return object
     */
    public function retrieveAllSubscriptions($customerId)
    {
        return $this->createRequest("/customers/{$customerId}/subscriptions");
    }

}