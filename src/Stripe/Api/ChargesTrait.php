<?php namespace Stripe\Api;

trait ChargesTrait {

    /**
     * To charge a credit card, you create a new charge object. If your API key 
     * is in test mode, the supplied card won't actually be charged, though 
     * everything else will occur as if in live mode. (Stripe assumes that the 
     * charge would have completed successfully).
     *
     * @param  float   $amount
     * @param  string  $currency
     * @param  array   $attributes
     * @return array
     */
    public function createCharge($amount, $currency, array $attributes = array())
    {
        $attributes = compact('amount', 'currency') + $attributes;

        return $this->createRequest("/charges", "post", $attributes);
    }

    /**
     * Retrieves the details of a charge that has previously been created. 
     * Supply the unique charge ID that was returned from your previous request, 
     * and Stripe will return the corresponding charge information. The same 
     * information is returned when creating or refunding the charge.
     *
     * @param  int   $chargeId
     * @return array
     */
    public function retrieveCharge($chargeId)
    {
        return $this->createRequest("/charges/{$chargeId}");
    }

    /**
     * Updates the specified charge by setting the values of the parameters 
     * passed. Any parameters not provided will be left unchanged. This request 
     * accepts only the description and metadata as arguments.
     *
     * @param  int    $chargeId
     * @param  array  $attributes
     * @return array
     */
    public function updateCharge($chargeId, array $attributes = array())
    {
        $segments = "/charges/{$chargeId}";

        return $this->createRequest($segments, "post", $attributes);
    }

    /**
     * Refunds a charge that has previously been created but not yet refunded. 
     * Funds will be refunded to the credit or debit card that was originally 
     * charged. The fees you were originally charged are also refunded.
     *
     * You can optionally refund only part of a charge. You can do so as many 
     * times as you wish until the entire charge has been refunded.
     *
     * Once entirely refunded, a charge can't be refunded again. This method 
     * will return an error when called on an already-refunded charge, or when 
     * trying to refund more money than is left on a charge.
     *
     * @param  int    $chargeId
     * @param  array  $attributes
     * @return array
     */
    public function refundCharge($chargeId, array $attributes = array())
    {
        $segments = "/charges/{$chargeId}/refund";

        return $this->createRequest($segments, "post", $attributes);
    }

    /**
     * Capture the payment of an existing, uncaptured, charge. This is the 
     * second half of the two-step payment flow, where first you created a 
     * charge with the capture option set to false.
     * 
     * Uncaptured payments expire exactly seven days after they are created. 
     * If they are not captured by that point in time, they will be marked as 
     * refunded and will no longer be capturable.
     *
     * @param  int    $chargeId
     * @param  array  $attributes
     * @return array
     */
    public function captureCharge($chargeId, array $attributes = array())
    {
        $segments = "/charges/{$chargeId}/capture";

        return $this->createRequest($segments, "post", $attributes);
    }

    /**
     * Returns a list of charges you've previously created. The charges are 
     * returned in sorted order, with the most recent charges appearing first.
     *
     * @param  array  $attributes
     * @return mixed
     */
    public function retrieveAllCharges(array $attributes = array())
    {
        return $this->createRequest("/charges", "get", $attributes);
    }

}