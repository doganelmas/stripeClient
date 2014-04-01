<?php namespace Stripe\Api;

trait CustomersTrait {

    /**
     * Creates a new customer object.
     *
     * @param  array  $attributes
     * @return object
     */
    public function createCustomer(array $attributes = array())
    {
        return $this->createRequest("/customers", "post", $attributes);
    }

    /**
     * Retrieves the details of an existing customer. You need only supply the 
     * unique customer identifier that was returned upon customer creation.
     *
     * @param  int  $customerId
     * @return object
     */
    public function retrieveCustomer($customerId)
    {
        return $this->createRequest("/customers/{$customerId}");
    }

    /**
     * Updates the specified customer by setting the values of the parameters 
     * passed. Any parameters not provided will be left unchanged. For example, 
     * if you pass the card parameter, that becomes the customer's active card 
     * to be used for all charges in the future. When you update a customer to a
     * new valid card, the last unpaid invoice (if one exists) will be retried 
     * automatically.
     *
     * @param  int    $customerId
     * @param  array  $attributes
     * @return object
     */
    public function updateCustomer($customerId, array $attributes = array())
    {
        return $this->createRequest("/customers/{$customerId}", "post", $attributes);
    }

    /**
     * Permanently deletes a customer. It cannot be undone. Also immediately 
     * cancels any active subscription on the customer.
     *
     * @param  int  $customerId
     * @return object
     */
    public function deleteCustomer($customerId)
    {
        return $this->createRequest("/customers/{$customerId}", "delete");
    }

    /**
     * Returns a list of your customers. The customers are returned sorted by 
     * creation date, with the most recently created customers appearing first.
     *
     * @param  array  $attributes
     * @return object
     */
    public function retrieveAllCustomer(array $attributes = array())
    {
        return $this->createRequest("/customers", "get", $attributes);
    }

}