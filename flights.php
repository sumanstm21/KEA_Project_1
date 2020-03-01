<?php
$sProjectTitle= 'FLights';
require_once('header.php');
if(empty($_SESSION['email'])){
    header('location: index.php');
    exit();
}
$sData = file_get_contents('data.json');
$jData = json_decode($sData);
?>

<div class="form">
<p>Create FLights Here</p>
    <form action="save-flight.php" method="POST">
        <input name="flightId" placeholder="Flight id" type="text">
        <input name="companyName" placeholder="Company Name" type="text">
        <input name="fromCity" placeholder="From City" type="text">
        <input name="toCity" placeholder="To City" type="text">
        <input name="departureTime" placeholder="Departure Time" type="text">
        <input name="arrivalTime" placeholder="Arrival Time" type="text">
        <input name="price" placeholder="Price" type="text">
        <input name="currency" placeholder="Currency" type="text">
        <button type="submit">Save</button>
    </form>
</div>

<table>
<th>No</th>
<th>Flight Id</th>
<th>Company Name</th>
<th>From City</th>
<th>To City</th>
<th>Departure Time</th>
<th>ArrivalTime</th>
<th>Price</th>
<th>Currency</th>
<?php
foreach($jData as $index=>$flight){
    // echo $flight->flightId.$index.'<br/>';
    $sDepartureDate = date("Y-M-d H:i", substr($flight->departureTime, 0, 10));
    $sArrivalDate = date("Y-M-d H:i", substr($flight->arrivalTime, 0, 10));
    echo "
    <tr>
        <td> $index </td>
        <td> $flight->flightId </td>
        <td> $flight->companyName </td>
        <td> $flight->fromCity </td>
        <td> $flight->toCity </td>
        <td> $sDepartureDate </td>
        <td> $sArrivalDate </td>
        <td> $flight->price </td>
        <td> $flight->currency </td>
        <td><a href='delete-flight.php?id=$index'>Delete</a>
        <td><a href='update-flight.php?id=$index'>Update</a>
    </tr>
    
         ";
}
?>
</table>








<?php
require_once('footer.php');
?>
