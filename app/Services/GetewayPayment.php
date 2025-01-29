<?php

namespace App\Services;

use App\Services\InterfaceService\GetewayPaymentInterface;
use GuzzleHttp\Client;

class GetewayPayment implements GetewayPaymentInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private string $email
    ) {}


    public function getEmail()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://sandbox.asaas.com/api/v3/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
            'headers' => [
                'Accept'     => 'application/json',
                'access_token'  => '$aact_MzkwODA2MWY2OGM3MWRlMDU2NWM3MzJlNzZmNGZhZGY6OmE4NGYxNDBhLWE5ZDQtNGJjOC1iMDAxLTE1YWJmNWI5Y2E2YTo6JGFhY2hfMTdlMDBmMjItOTU1NS00N2I2LWJiMDYtNTU4YWYzMDRmZWYy'
            ]
        ]);
        $res = $client->request('GET', 'customers?email=' . $this->email);
        $array = json_decode($res->getBody()->getContents(), true);
        dump($array['data']);
    }
}
