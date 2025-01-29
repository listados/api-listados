<?php

namespace App\Services;

use App\Services\InterfaceService\GetewayPaymentInterface;
use GuzzleHttp\Client;
use function dd;
use function json_decode;

class GetewayPayment implements GetewayPaymentInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private string $email,
        private float  $value,
        private string $dateLimit,
        private string $type
    ) {}


    public function getUserGeteway()
    {
        // Conexão com api
        $client = new Client([
            'base_uri' => env('GETEWAY_PAYMENT_API_URL'),
            'timeout'  => 2.0,
            'headers' => [
                'Accept'     => 'application/json',
                'access_token'  => env('GETEWAY_PAYMENT_ACCESS_TOKEN'),
                'Content-Type' => 'application/json',
            ]
        ]);
        $res = $client->request('GET', 'customers?email=' . $this->email);
        $array = json_decode($res->getBody()->getContents(), true);

        // Se não for vazio
        if(!empty($array['data']))
        {
            $resBilling = $client->request('POST', 'payments',[
                'form_params' => [
                    'customer' => $array['data'][0]['id'],
                    'billingType' => $this->type,
                    'email' => $this->email,
                    'value' => $this->value,
                    'dueDate' => $this->dateLimit
                ]
            ]);
            $returnBilling = json_decode($resBilling->getBody()->getContents(), true);
            return $returnBilling;
        }

    }
}
