<?php namespace Stripe\Api;

trait InvoicesTrait {

    /**
     * If you need to invoice your customer outside the regular billing cycle, 
     * you can create an invoice that pulls in all pending invoice items, 
     * including prorations. The customer's billing cycle and regular 
     * subscription won't be affected.
     * 
     * Once you create the invoice, it'll be picked up and paid automatically, 
     * though you can choose to pay it right away.
     *
     * @param  string  $customerId
     * @param  array   $attributes
     * @return object
     */
    public function createInvoice($customerId, array $attributes = array())
    {
        $attributes = array('customer' => $customerId) + $attributes;

        return $this->createRequest("/invoices", "post", $attributes);
    }

    /**
     * Retrieves the invoice with the given ID.
     *
     * @param  int   $invoiceId
     * @return object
     */
    public function retrieveInvoice($invoiceId)
    {
        return $this->createRequest("/invoices/{$invoiceId}");
    }

    /**
     * Until an invoice is paid, it is marked as open (closed=false). If you'd 
     * like to stop Stripe from automatically attempting payment on an invoice 
     * or would simply like to close the invoice out as no longer owed by the 
     * customer, you can update the closed parameter.
     *
     * @param  int    $invoiceId
     * @param  array  $attributes
     * @return object
     */
    public function updateInvoice($invoiceId, array $attributes = array())
    {
        $segments = "/invoices/{$invoiceId}";

        return $this->createRequest($segments, "post", $attributes);
    }

    /**
     * You can list all invoices, or list the invoices for a specific customer. 
     * The invoices are returned sorted by creation date, with the most recently 
     * created invoices appearing first.
     *
     * @param  array   $attributes
     * @return object
     */
    public function retrieveAllInvoices(array $attributes = array())
    {
        return $this->createRequest("/invoices", "get", $attributes);
    }

    /**
     * At any time, you can view the upcoming invoice for a customer. 
     * This will show you all the charges that are pending, including 
     * subscription renewal charges, invoice item charges, etc. It will also 
     * show you any discount that is applicable to the customer.
     *
     * @param  int  $customerId
     * @param  int  $subscriptionId
     * @return object
     */
    public function retrieveCustomersUpcomingInvoice($customerId, $subscriptionId = '')
    {
        $attributes = array('customer' => $customerId, 'subscription' => $subscriptionId);

        return $this->createRequest("/invoices/upcoming", "get");
    }

    /**
     * Stripe automatically creates and then attempts to pay invoices for 
     * customers on subscriptions. We'll also retry unpaid invoices according 
     * to your retry settings. However, if you'd like to attempt to collect 
     * payment on an invoice out of the normal retry schedule or for some other 
     * reason, you can do so.
     *
     * @param  int  $invoiceId
     * @return object
     */
    public function payInvoice($invoiceId)
    {
        return $this->createRequest("/invoices/{$invoiceId}/pay", "post");
    }

}