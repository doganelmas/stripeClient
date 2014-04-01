<?php namespace Stripe\Api;

trait InvoiceItemsTrait {

    /**
     * Adds an arbitrary charge or credit to the customer's upcoming invoice.
     *
     * @param  int    $customerId
     * @param  float  $amount
     * @param  string $currency
     * @return object
     */
    public function createInvoiceItem($customerId, $amount, $currency)
    {
        $segments = "/invoiceitems";

        $attributes = array('customer' => $customerId) + compact('amount', 'currency');

        return $this->createRequest($segments, "post", $attributes);
    }

    /**
     * Retrieves the invoice item with the given ID.
     *
     * @param  int  $invoiceItemId
     * @return object
     */
    public function retrieveInvoiceItem($invoiceItemId)
    {
        $segments = "/invoiceitems/{$invoiceItemId}";

        return $this->createRequest($segments);
    }

    /**
     * Updates the amount or description of an invoice item on an upcoming 
     * invoice. Updating an invoice item is only possible before the invoice 
     * it's attached to is closed.
     *
     * @param  int    $invoiceItemId
     * @param  array  $attributes
     * @return object
     */
    public function updateInvoiceItem($invoiceItemId, array $attributes = array())
    {
        $segments = "/invoiceitems/{$invoiceItemId}";

        return $this->createRequest($segments, "post", $attributes);
    }

    /**
     * Removes an invoice item from the upcoming invoice. Removing an invoice 
     * item is only possible before the invoice it's attached to is closed.
     *
     * @param  int  $invoiceItemId
     * @return object
     */
    public function deleteInvoiceItem($invoiceItemId)
    {
        $segments = "/invoiceitems/{$invoiceItemId}";

        return $this->createRequest($segments, "delete");
    }

    /**
     * Returns a list of your invoice items. Invoice Items are returned sorted 
     * by creation date, with the most recently created invoice items appearing 
     * first.
     *
     * @param  array  $attributes
     * @return object
     */
    public function retrieveAllInvoiceItems(array $attributes = array())
    {
        return $this->createRequest("/invoiceitems", "get", $attributes);
    }

}