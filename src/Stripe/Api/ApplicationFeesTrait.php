<?php namespace Stripe\Api;

trait ApplicationFeesTrait {

    /**
     * Retrieves the details of an application fee that your account has 
     * collected. The same information is returned when refunding the 
     * application fee.
     *
     * @param  int  $applicationFeeId
     * @return object
     */
    public function retrieveApplicationFee($applicationFeeId)
    {
        $segments = "application_fees/{$applicationFeeId}";

        return $this->createRequest($segments);
    }

    /**
     * Refunds an application fee that has previously been collected but not yet 
     * refunded. Funds will be refunded to the Stripe account that the fee was 
     * originally collected from.
     * 
     * You can optionally refund only part of an application fee. You can do so 
     * as many times as you wish until the entire fee has been refunded.
     * 
     * Once entirely refunded, an application fee can't be refunded again. 
     * This method will return an error when called on an already-refunded 
     * application fee, or when trying to refund more money than is left on an 
     * application fee.
     *
     * @param  int  $applicationFeeId
     * @param  int  $amount
     * @return object
     */
    public function refundApplicationFee($applicationFeeId, $amount = null)
    {
        $segments = "/application_fees/{$applicationFeeId}/refund";

        $attributes = array('amount' => $amount);

        return $this->createRequest($segments, "post", $attributes);
    }

    /**
     * Returns a list of application fees you've previously collected. 
     * The application fees are returned in sorted order, with the most recent 
     * fees appearing first.
     * 
     * To retrieve application fees associated with a specific charge, you 
     * should filter by that charge ID.
     *
     * @param  array  $attributes
     * @return object
     */
    public function retrieveAllApplicationFees(array $attributes = array())
    {
        $segments = "/application_fees";

        return $this->createRequest($segments, "get", $attributes);
    }

}