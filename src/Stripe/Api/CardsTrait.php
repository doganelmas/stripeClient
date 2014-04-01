<?php namespace Stripe\Api;

trait CardsTrait {

    /**
     * When you create a new credit card, you must specify a customer.
     * Creating a new credit card will not change the customer's existing 
     * default credit card; you should update the customer with a new 
     * default_card for that. If the customer has no default credit card, the 
     * added credit card will become the default.
     *
     * @param  int    $customerId
     * @param  array  $card
     * @return object
     */
    public function createCard($customerId, array $card = array())
    {
        $segments = "/customers/{$customerId}/cards";

        return $this->createRequest($segments, "post", $card);
    }

    /**
     * By default, you can see the 10 most recent cards stored on a customer 
     * directly on the customer object, but you can also retrieve details about 
     * a specific card stored on the customer.
     *
     * @param  int  $cardId
     * @return object
     */
    public function retrieveCard($customerId, $cardId)
    {
        $segments = "/customers/{$customerId}/cards/{$cardId}";

        return $this->createRequest($segments);
    }

    /**
     * If you need to update only some card details, like the billing address or 
     * expiration date, you can do so without having to re-enter the full card 
     * details.
     * 
     * When you update a card, Stripe will automatically validate the card.
     *
     * @param  int    $customerId
     * @param  int    $cardId
     * @param  array  $attributes
     * @return object
     */
    public function updateCard($customerId, $cardId, array $attributes = array())
    {
        $segments = "/customers/{$customerId}/cards/{$cardId}";

        return $this->createRequest($segments, "post", $attributes);
    }

    /**
     * You can delete cards from a customer. If you delete a card that is 
     * currently a customer's default, the most recently added card will be 
     * used as the new default. If you delete the customer's last remaining 
     * card, the default_card attribute on the customer will become null.
     * 
     * Note that you may want to prevent customers on paid subscriptions from 
     * deleting all cards on file so that there is at least one default card 
     * for the next invoice payment attempt.
     *
     * @param  int  $customerId
     * @param  int  $cardId
     * @return object
     */
    public function deleteCard($customerId, $cardId)
    {
        $segments = "/customers/{$customerId}/cards/{$cardId}";

        return $this->createRequest($segments, "delete");
    }

    /**
     * You can see a list of the customer's cards. Note that the 10 most recent 
     * cards are always available by default on the customer object. If you 
     * need more than those 10, you can use the limit and starting_after 
     * parameters to page through additional cards.
     *
     * @param  int    $customerId
     * @param  array  $attributes
     * @return object
     */
    public function retrieveAllCards($customerId, array $attributes = array())
    {
        $segments = "/customers/{$customerId}/cards";

        return $this->createRequest($segments, "get", $attributes);
    }

}