<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

defined('BASEPATH') or exit('No direct script access allowed');

class Envato
{
    public function validate_purchase($code)
    {
        $code = '6b195f92-5679-4cec-a533-613549d2cd2f';
        $client = new Client;
        $url = "https://api.envato.com/v3/market/author/sale";
        $body = (['code' => $code]);
        $token = get_custom_field_value(0, 'company_token', 'company');
        try {
            $response = $client->get($url, [
                'headers' => [
                    'authorization' => "Bearer {$token}",
                ],
                'query' => $body,
            ]);

            $purchase = json_decode($response->getBody());
            return [
                'successful' => true,
                'data'  => $purchase,
            ];
        } catch (RequestException $e) {
            return  [
                'successful' => false,
                'message'  => $e->getMessage(),
            ];
        }
    }
}
