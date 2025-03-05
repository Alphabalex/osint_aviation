<?php
require __DIR__ . '/../vendor/autoload.php';
use Eaglewatch\Aviation\AviationStack;

$params = [
    'iataCode' => 'JFK',
    'type' => 'departure',
];
$request = new AviationStack("enter api key here");
$data = $request->get(AviationStack::FLIGHT_TIMETABLE, $params);
print_r($data);
