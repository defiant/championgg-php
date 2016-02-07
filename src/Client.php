<?php namespace Championgg;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\RequestException;

class Client implements ClientInterface
{
    public $apiKey;
    protected $client;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;

        $this->client = new Guzzle([
            'base_uri' => 'http://api.champion.gg/',
        ]);
    }

    public function get($uri, $options = [])
    {
        $queryString = [
            'api_key' => $this->apiKey
        ];

        if($options){
            $queryString = array_merge($queryString, $options);
        }

        $params = [
            'query' => $queryString
        ];

        return $this->request('GET', $uri, $params);
    }

    public function request($method, $uri, $params = [])
    {
        try{
            $response = $this->client->request($method, $uri, $params);
        }catch (RequestException $e){
            throw new \Exception($e->getMessage());
        }

        return json_decode($response->getBody(), true);
    }
}