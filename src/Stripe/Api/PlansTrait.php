<?php namespace Stripe\Api;

trait PlansTrait {

    /**
     * You can create plans easily via the plan management page of the Stripe 
     * dashboard. Plan creation is also accessible via the API if you need to 
     * create plans on the fly.
     *
     * @param  string  $name
     * @param  int     $planId
     * @param  float   $amount
     * @param  string  $currency
     * @param  int     $interval
     * @return object
     */
    public function createPlan($name, $planId, $amount, $currency, 
                               $interval, array $attributes = array())
    {
        $segments = "/plans";

        $attributes = array('id' => $planId) + $attributes;

        $attributes = compact('name', 'amount', 'currency', 'interval') + $attributes;

        return $this->createRequest($segments, "post", $attributes);
    }

    /**
     * Retrieves the plan with the given ID.
     *
     * @param  int  $planId
     * @return object
     */
    public function retrievePlan($planId)
    {
        $segments = "/plans/{$planId}";

        return $this->createRequest($segments);
    }

    /**
     * Updates the name of a plan. Other plan details (price, interval, etc.) 
     * are, by design, not editable.
     *
     * @param  array  $attributes
     * @return object
     */
    public function updatePlan($planId, array $attributes = array())
    {
        return $this->createRequest("/plans/{$planId}", "post", $attributes);
    }

    /**
     * You can delete plans via the plan management page of the Stripe dashboard. 
     * However, deleting a plan does not affect any current subscribers to the 
     * plan; it merely means that new subscribers can't be added to that plan. 
     * You can also delete plans via the API.
     *
     * @param  int  $planId
     * @return object
     */
    public function deletePlan($planId)
    {
        return $this->createRequest("/plans/{$planId}", "delete");
    }

    /**
     * Returns a list of your plans.
     *
     * @param  array  $attributes
     * @return object
     */
    public function retrieveAllPlans(array $attributes = array())
    {
        return $this->createRequest("/plans");
    }

}