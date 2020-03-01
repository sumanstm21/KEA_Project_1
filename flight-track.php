<?php
require_once('header.php');
$sFlightsDivs = '';
if($_POST){
    $sData = file_get_contents('bought-ticket.json');
    $jData = json_decode($sData);
    foreach($jData as $index=>$flight)
    {
        if($flight->bookingCode == $_POST['bookingCode'] && $flight->lastName == $_POST['lastName']){
            $sDepartureDate = date("Y-M-d H:i", substr($flight->departureTime, 0, 10));
            $sArrivalDate = date("Y-M-d H:i", substr($flight->arrivalTime, 0, 10));
            $sFlightsDivs = "
            <tr>
                <td> $flight->flightId </td>
                <td> $flight->companyName </td>
                <td> $flight->fromCity </td>
                <td> $flight->toCity </td>
                <td> $sDepartureDate </td>
                <td> $sArrivalDate </td>
                <td> $flight->price </td>
                <td> $flight->currency </td>
            </tr>";
        break;
        } else {
            $sFlightsDivs = 'The Booking of Flight doesnot exists';
        }
    }
}
?>

<form action="flight-track.php" method="post">
    <input type="text" name="bookingCode" placeholder="Booking Code">
    <input type="text" name="lastName"  placeholder="Last Name">
    <button type="submit">Track</button>
</form>

<table>
    <tr>
        <th>Flight Id</th>
        <th>Company Name</th>
        <th>From City</th>
        <th>To City</th>
        <th>Departure Time</th>
        <th>ArrivalTime</th>
        <th>Price</th>
        <th>Currency</th>
    </tr>
    <?= $sFlightsDivs ?>
</table>























<?php
require_once('footer.php');
?>