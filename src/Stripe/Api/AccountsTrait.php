<?php namespace Stripe\Api;

trait AccountsTrait {

    /**
     * Retrieves the details of the account, based on the API key that was used 
     * to make the request.
     *
     * @return object
     */
    public function retrieveAccountDetails()
    {
        $segments = "/account";

        return $this->createRequest($segments);
    }

}