<?php

use Mockery as m;

require(__DIR__.'/../StripeClientTest.php');

class BaseTest extends StripeClientTest {

    protected function buildGuzzleMockRequest($method, $return)
    {
        $this->guzzleMock->shouldReceive($method)->withAnyArgs()
            ->andReturn($q = m::mock('stdClass'));

        $q->shouldReceive('json')->andReturn($return);
    }

    protected function buildGuzzleRequest($method, $return)
    {
        $this->buildGuzzleMockRequest($method, $return);
    }

    protected function buildGetGuzzleMockRequest($return)
    {
        $this->buildGuzzleRequest('get', $return);
    }

    protected function buildPostGuzzleMockRequest($return)
    {
        $this->buildGuzzleRequest('post', $return);
    }

    protected function buildDeleteGuzzleMockRequest($return)
    {
        $this->buildGuzzleRequest('delete', $return);
    }

}