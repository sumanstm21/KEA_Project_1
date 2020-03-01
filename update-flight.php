<?php 
require_once('header.php');
$sData = file_get_contents('data.json');
$jData = json_decode($sData);

    if(!empty($_POST)){
        // echo 'something to update';
        foreach($jData as $index=>$flight){
            if($_POST['id'] == $index){
                echo $flight->flightId.'<br/>';

                $flight->flightId = $_POST["flightId"];
                $flight->companyName = $_POST["companyName"];
                $flight->fromCity = $_POST["fromCity"];
                $flight->toCity = $_POST["toCity"];
                $flight->departureTime = $_POST["departureTime"];
                $flight->arrivalTime = $_POST["arrivalTime"];
                $flight->price = $_POST["price"];
                $flight->currency = $_POST["currency"];
            }
        }
        $sData = json_encode($jData, JSON_PRETTY_PRINT);
        file_put_contents('data.json', $sData);
        header("location: flights.php");
        exit();
    }

    if(isset($_GET["id"])){
        $sFlightId = $_GET["id"];
        $matchFound = false;
        foreach($jData as $index=>$flight){
            if($sFlightId == $index){
                ?>
                <form method="POST" action="update-flight.php">
                    <input name="id" type="hidden" value="<?= $index; ?>">
                    <input name="flightId" type="text" value="<?= $flight->flightId; ?>">
                    <input name="companyName" value="<?= $flight->companyName; ?>" type="text">
                    <input name="fromCity" value="<?= $flight->fromCity; ?>" type="text">
                    <input name="toCity" value="<?= $flight->toCity; ?>" type="text">
                    <input name="departureTime" value="<?= $flight->departureTime; ?>" type="text">
                    <input name="arrivalTime" value="<?= $flight->arrivalTime; ?>" type="text">
                    <input name="price" value="<?= $flight->price; ?>" type="text">
                    <input name="currency" value="<?= $flight->currency; ?>" type="text">
                    <button type="submit">Update</button>
                </form>
            <?php
            $matchFound = true;
            break;                
            }
        }   
        if($matchFound == false)
        {
            header("location: flights.php");
        }
    }
?>