<?php namespace Stripe\Api;

trait DisputesTrait {

    /**
     * Contacting your customer is always the best first step, but if that 
     * doesn't work, you can submit (text-only) evidence in order to help us 
     * resolve the dispute in your favor. You can do this in your dashboard, 
     * but if you prefer, you can use the API to submit evidence programmatically.
     *
     * @param  int     $chargeId
     * @param  string  $evidence
     * @return object
     */
    public function updateDispute($chargeId, $evidence = null)
    {
        $segments = "/charges/{$chargeId}/dispute";

        $attributes = array('evidence' => $evidence);

        return $this->createRequest($segments, "post", $attributes);
    }

    /**
     * Closing the dispute for a charge indicates that you do not have any 
     * evidence to submit and are essentially 'dismissing' the dispute, 
     * acknowledging it as lost.
     * 
     * The status of the dispute will change from under_review to lost. 
     * Closing a dispute is irreversible.
     *
     * @param  int  $chargeId
     * @return object
     */
    public function closeDispute($chargeId)
    {
        $segments = "/charges/{$chargeId}/dispute/close";

        return $this->createRequest($segments, "post");
    }

}