<?php

$flightId = $_POST["flightId"];
$companyName = $_POST["companyName"];
$fromCity = $_POST["fromCity"];
$toCity = $_POST["toCity"];
$departureTime = $_POST["departureTime"];
$arrivalTime = $_POST["arrivalTime"];
$price = $_POST["price"];
$currency = $_POST["currency"];

$sData = file_get_contents('data.json');
echo $sData; 
$jData = json_decode($sData);
$jFlight = new stdClass();

$jFlight->flightId = $flightId;
$jFlight->companyName = $companyName;
$jFlight->fromCity = $fromCity;
$jFlight->toCity = $toCity;
$jFlight->departureTime = $departureTime;
$jFlight->arrivalTime = $arrivalTime;
$jFlight->price = $price;
$jFlight->currency = $currency;

// Adding to array
 array_push($jData, $jFlight);

// Write to file
$sData = json_encode($jData, JSON_PRETTY_PRINT);
echo $sData;


// Save city to file
file_put_contents('data.json', $sData);




// Redirect
header('Location: flights.php');













/*
blueprint for json file
{
    "cities":[]
}

*/