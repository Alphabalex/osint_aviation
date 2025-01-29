<?php
require __DIR__ . '/../vendor/autoload.php';
use Eaglewatch\Aviation\AviationStack;

$params = [
    'iataCode' => 'JFK',
    'type' => 'departure',
];
$request = new AviationStack();
$data = $request->get(AviationStack::FLIGHT_TIMETABLE, $params);
print_r($data);
