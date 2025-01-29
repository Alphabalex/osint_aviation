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

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('aviationstack.api_url'),
            'headers' => [
                'accept' => 'application/json'
            ],
        ]);
    }

    public function get(string $entity = self::FLIGHT, array $params = []): array
    {
        $params['access_key'] = config('aviationstack.access_key');
        $queryString = http_build_query($params);
        $url = "{$entity}?{$queryString}";
        $response = $this->client->request('GET', $url);
        return json_decode($response->getBody()->getContents(), true);
    }
}
