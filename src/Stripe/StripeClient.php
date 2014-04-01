<?php namespace Stripe;

use GuzzleHttp\Client as GuzzleClient;

class StripeClient {

    use Api\PlansTrait;
    use Api\CardsTrait;
    use Api\TokensTrait;
    use Api\EventsTrait;
    use Api\ChargesTrait;
    use Api\CouponsTrait;
    use Api\AccountsTrait;
    use Api\BalancesTrait;
    use Api\DisputesTrait;
    use Api\InvoicesTrait;
    use Api\TransfersTrait;
    use Api\DiscountsTrait;
    use Api\CustomersTrait;
    use Api\RecipientsTrait;
    use Api\InvoiceItemsTrait;
    use Api\SubscriptionsTrait;
    use Api\ApplicationFeesTrait;

    /**
     * GuzzleHttp\Client instance.
     *
     * @var GuzzleHttp\Client
     */
    protected $guzzle;

    /**
     * The api key of the Stripe API.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * The api version of the Stripe API.
     *
     * @var string
     */
    protected $apiVersion = 'v1';

    /**
     * Create a new StripeClient instance.
     *
     * @param  GuzzleHttp\Client  $guzzle
     * @param  string  $apiKey
     * @return Stripe\StripeClient
     */
    public function __construct(GuzzleClient $guzzle, $apiKey)
    {
        $this->guzzle = $guzzle;
        $this->apiKey = $apiKey;
    }

    /**
     * Generate API Request Url for given method.
     *
     * @param  string  $method
     * @return string
     */
    public function getApiUrl($method)
    {
        $method = ltrim($method, '/');

        return sprintf('https://api.stripe.com/%s/%s', $this->apiVersion, $method);
    }

    /**
     * Generate API Basic Authentication and other attributes array.
     *
     * @param  array  $attributes
     * @return array
     */
    public function mergeWith(array $attributes = array())
    {
        return array('auth' => array($this->apiKey, ''), 'body' => $attributes);
    }

    /**
     * Create a new request given parameters.
     *
     * @param  string  $requestUrl
     * @param  string  $requestMethod
     * @param  array   $attributes
     * @return object
     */
    public function createRequest($requestUrl, $requestMethod = 'get', array $attributes = array())
    {
        return $this->guzzle->{$requestMethod}(
            $this->getApiUrl($requestUrl), $this->mergeWith($attributes))->json();
    }

}