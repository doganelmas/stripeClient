<?php namespace Stripe\Api;

trait TokensTrait {

    /**
     * Creates a single use token that wraps the details of a credit card. This 
     * token can be used in place of a credit card dictionary with any API method. 
     * These tokens can only be used once: by creating a new charge object, or 
     * attaching them to a customer.
     *
     * @param  array  $attributes
     * @return object
     */
    public function createCardToken($number, $expMonth, $expYear, $cvc)
    {
        $attributes = compact('number', 'cvc');

        $attributes = array('exp_month' => $expMonth, 'exp_year' => $expYear) + $attributes;

        return $this->createRequest("/tokens", "post", $attributes);
    }

    /**
     * Creates a single use token that wraps the details of a bank account. 
     * This token can be used in place of a bank account dictionary with any API 
     * method. These tokens can only be used once: by attaching them to a 
     * recipient.
     *
     * @param  array  $attributes
     * @return object
     */
    public function createBankAccountToken($country, $routingNumber, $accountNumber)
    {
        $attributes = compact('country');

        $attributes += array('routing_number' => $routingNumber);

        $attributes += array('account_number' => $accountNumber);

        return $this->createRequest("/tokens", "post", $attributes);
    }

    /**
     * Retrieves the token with the given ID.
     *
     * @param  int  $tokenId
     * @return object
     */
    public function retrieveToken($tokenId)
    {
        return $this->createRequest("/tokens/{$tokenId}");
    }

}