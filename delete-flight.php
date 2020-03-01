<?php
$flightId = $_GET["id"];
// echo $flightId;

$sData = file_get_contents('data.json');
// echo $sData;
$jData = json_decode($sData);
 print_r($jData);

foreach($jData as $index=>$flight){ // index key for the index of array
    if($flightId == $index){
        echo 'match found';
        array_splice($jData, $index, 1);
        break;
    }
}

$sData = json_encode($jData);
file_put_contents('data.json', $sData);



 header('Location: flights.php');