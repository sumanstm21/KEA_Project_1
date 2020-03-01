<?php

if($_GET['id'] != null){
require_once('header.php');
if(!empty($_POST)){
    // echo 'not empty';
    // print_r($_POST);
    // exit();
    $sData = file_get_contents('data.json');
$jData = json_decode($sData);

$sDataBought = file_get_contents('bought-ticket.json');
$jDataBought = json_decode($sDataBought);
// echo $_GET['id'];

foreach($jData as $index=>$flight){
    if($_GET['id'] == $index){
        $jBoughtFlight = new stdClass();

        $jBoughtFlight->flightId = $flight->flightId;
        $jBoughtFlight->companyName = $flight->companyName;
        $jBoughtFlight->fromCity = $flight->fromCity;
        $jBoughtFlight->toCity = $flight->toCity;
        $jBoughtFlight->departureTime = $flight->departureTime;
        $jBoughtFlight->arrivalTime = $flight->arrivalTime;
        $jBoughtFlight->price = $flight->price;
        $jBoughtFlight->currency = $flight->currency;
        // $jBoughtFlight->bookingCode = 'test';
        // $jBoughtFlight->lastName = 'test';
        $jBoughtFlight->bookingCode = $_POST["bookingCode"];
        $jBoughtFlight->lastName = $_POST["lastName"];
    }
}
array_push($jDataBought, $jBoughtFlight);
$sDataBought = json_encode($jDataBought, JSON_PRETTY_PRINT);
file_put_contents('bought-ticket.json', $sDataBought);
echo '<p>Your ticket has been saved.</p>';
echo '<p>Please save the following details for tracking your ticket.</p>';
echo '<p>Your Code: '.$_POST["bookingCode"].'</p>';
echo '<p>Last Name: '.$_POST["lastName"].'</p>';

}
?>

<form id="frmEmail" method="POST">
    <input type="hidden" name="bookingCode" value="<?= bin2hex(openssl_random_pseudo_bytes(10)) ?>">
    <input type="hidden" name="subject" value="Booking">
    <input type="hidden" name="message" value="confirmed">
    Last Name: <input type="text" name="lastName" placeholder="Last Name">
    <button onclick="sendMail()">Confirm</button>
</form>





<?php
} else{
    header('location: index.php');
    exit();
}
require_once('footer.php');