<?php namespace Stripe\Api;

trait TransfersTrait {

    /**
     * To send funds from your Stripe account to a third-party bank account, 
     * you create a new transfer object. Your Stripe balance must be able to 
     * cover the transfer amount, or you'll receive an "Insufficient Funds" error.
     * 
     * If your API key is in test mode, money won't actually be sent, though 
     * everything else will occur as if in live mode.
     *
     * @param  float   $amount
     * @param  string  $currency
     * @param  int     $recipientId
     * @param  array   $attributes
     * @return object
     */
    public function createTransfer($amount, $currency, $recipientId, 
                                    array $attributes = array())
    {
        $segments = "/transfers";

        $attributes = compact('amount', 'currency') + array('recipient' => $recipientId);

        return $this->createRequest($segments, "post", $attributes);
    }

    /**
     * Retrieves the details of an existing transfer. Supply the unique 
     * transfer ID from either a transfer creation request or the transfer list, 
     * and Stripe will return the corresponding transfer information.
     *
     * @param  int  $transferId
     * @return object
     */
    public function retrieveTransfer($transferId)
    {
        return $this->createRequest("/transfers/{$transferId}");
    }

    /**
     * Updates the specified transfer by setting the values of the parameters 
     * passed. Any parameters not provided will be left unchanged.
     * 
     * This request accepts only the description and metadata as arguments.
     *
     * @param  int    $transferId
     * @param  array  $attributes
     * @return object
     */
    public function updateTransfer($transferId, array $attributes = array())
    {
        $segments = "/transfers/{$transferId}";

        return $this->createRequest($segments, "post", $attributes);
    }

    /**
     * Cancels a transfer that has previously been created. Funds will be 
     * refunded to your available balance, and the fees you were originally 
     * charged on the transfer will be refunded. You may not cancel transfers 
     * that have already been paid out, or automatic Stripe transfers.
     *
     * @param  int  $transferId
     * @return object
     */
    public function cancelTransfer($transferId)
    {
        $segments = "/transfers/{$transferId}/cancel";

        return $this->createRequest($segments, "post");
    }

    /**
     * Returns a list of existing transfers sent to third-party bank accounts 
     * or that Stripe has sent you. The transfers are returned in sorted order, 
     * with the most recently created transfers appearing first.
     *
     * @param  array  $attributes
     * @return object
     */
    public function retrieveAllTransfers(array $attributes = array())
    {
        return $this->createRequest("/transfers", "get", $attributes);
    }

}