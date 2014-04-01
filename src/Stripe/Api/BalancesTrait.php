<?php namespace Stripe\Api;

trait BalancesTrait {

    /**
     * Retrieves the current account balance, based on the API key that was 
     * used to make the request.
     *
     * @return object
     */
    public function retrieveBalance()
    {
        return $this->createRequest('/balance');
    }

    /**
     * Retrieves the balance transaction with the given ID.
     *
     * @param  string  $transactionId
     * @return object
     */
    public function retrieveBalanceTransaction($transactionId)
    {
        $segments = "/balance/history/{$transactionId}";

        return $this->createRequest($segments);
    }

    /**
     * Returns a list of transactions that have contributed to the Stripe 
     * account balance (includes charges, refunds, transfers, and so on). 
     * The transactions are returned in sorted order, with the most recent 
     * transactions appearing first.
     *
     * @param  array $attributes
     * @return object
     */
    public function retrieveAllBalanceHistory(array $attributes = array())
    {
        return $this->createRequest("/balance/history", "get", $attributes);
    }

}