<?php namespace Stripe\Api;

trait EventsTrait {

    /**
     * Retrieves the details of an event. Supply the unique identifier of the 
     * event, which you might have received in a webhook.
     *
     * @param   int  $eventId
     * @return  object
     */
    public function retrieveEvent($eventId)
    {
        return $this->createRequest("/events/{$eventId}");
    }

    /**
     * List events, going back up to 30 days.
     *
     * @param  array  $attributes
     * @return object
     */
    public function retrieveAllEvents(array $attributes = array())
    {
        return $this->createRequest("/events", "get", $attributes);
    }

}