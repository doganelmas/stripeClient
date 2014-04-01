<?php namespace Stripe\Api;

trait RecipientsTrait {

    /**
     * Creates a new recipient object and verifies both the recipient identity 
     * and bank account information.
     *
     * @param  string  $name
     * @param  string  $type
     * @param  array   $attributes
     * @return object
     */
    public function createRecipient($name, $type, array $attributes = array())
    {
        $segments = "/recipients";

        $attributes = compact('name', 'type') + $attributes;

        return $this->createRequest($segments, "post", $attributes);
    }

    /**
     * Retrieves the details of an existing recipient. You need only supply the 
     * unique recipient identifier that was returned upon recipient creation.
     *
     * @param  string  $recipientId
     * @return object
     */
    public function retrieveRecipient($recipientId)
    {
        return $this->createRequest("recipients/{$recipientId}");
    }

    /**
     * Updates the specified recipient by setting the values of the parameters 
     * passed. Any parameters not provided will be left unchanged.
     * 
     * If you update the name or tax ID, the identity verification will 
     * automatically be rerun. If you update the bank account, the bank account 
     * validation will automatically be rerun.
     *
     * @param  int    $recipientId
     * @param  array  $attributes
     * @return object
     */
    public function updateRecipient($recipientId, array $attributes = array())
    {
        return $this->createRequest("/recipients/{$recipientId}", "post", $attributes);
    }

    /**
     * Permanently deletes a recipient. It cannot be undone.
     *
     * @param  int  $recipientId
     * @return object
     */
    public function deleteRecipient($recipientId)
    {
        return $this->createRequest("/recipients/{$recipientId}", "delete");
    }

    /**
     * Returns a list of your recipients. The recipients are returned sorted by 
     * creation date, with the most recently created recipient appearing first.
     *
     * @param  array  $attributes
     * @return object
     */
    public function retrieveAllRecipients(array $attributes = array())
    {
        return $this->createRequest("/recipients", "get", $attributes);
    }

}