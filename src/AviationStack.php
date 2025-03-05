<?php

namespace Eaglewatch\Aviation;

use GuzzleHttp\Client;

class AviationStack
{
    private Client $client;
    public const FLIGHT = 'flights';
    public const ROUTE = 'routes';
    public const AIRPORT = 'airports';
    public const AIRLINE = 'airlines';
    public const AIRPLANE = 'airplanes';
    public const AIRCRAFT_TYPE = 'aircraft_types';
    public const TAX = 'taxes';
    public const CITY = 'cities';
    public const COUNTRY = 'countries';
    public const FLIGHT_TIMETABLE = 'timetable';
    public const FLIGHT_SCHEDULE = 'flightsFuture';

    private $defaultConfig = array("api_url" => "https://api.aviationstack.com/v1/");
    private $options = array();
    private $apiKey;

    public function __construct(string $api_key, array $options = [])
    {
        $this->options = array_merge($this->defaultConfig, $options);
        $this->apiKey = $api_key;
        $this->client = new Client([
            'base_uri' => $this->options['api_url'],
            'headers' => [
                'accept' => 'application/json'
            ],
        ]);
    }

    public function get(string $entity = self::FLIGHT, array $params = []): array
    {
        $params['access_key'] = $this->apiKey;
        $queryString = http_build_query($params);
        $url = "{$entity}?{$queryString}";
        $response = $this->client->request('GET', $url);
        return json_decode($response->getBody()->getContents(), true);
    }
}
