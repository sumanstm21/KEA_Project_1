<?php
 require_once('header.php');
$sData = file_get_contents('data.json');
$jData = json_decode($sData);
$sFlightsDivs = '';
$matchFound = 0;
if( !empty($_GET['fromCity']) && !empty($_GET['toCity']) ){
  foreach($jData as $index=>$jFlight){
    $sDepartureDate = date("Y-M-d H:i", substr($jFlight->departureTime, 0, 10));
    $sArrivalDate = date("Y-M-d H:i", substr($jFlight->arrivalTime, 0, 10));
    if($jFlight->fromCity == $_GET['fromCity'] && $jFlight->toCity == $_GET['toCity'])
    {
      $matchFound = 1 ;
      // echo $sDepartureDate;
      $sFlightsDivs .= "
    <div id='flight'>
    <div id='flight-route'>
      <div class='row'>
        <div>
        $jFlight->flightId 
          <p>$jFlight->companyName</p>              
        </div>
        <div>
          From
          <p>$jFlight->fromCity</p>
        </div>
        <div>
          To
          <p>$jFlight->toCity</p>
        </div>
        <div>
        Departure Time
          <p>$sDepartureDate</p>
        </div>
        <div>
        Arrival Time
          <p>$jFlight->arrivalTime</p>
        </div>
      </div>
                  
    </div>
    <div id='flight-buy'>
      <div>
        $jFlight->price
        $jFlight->currency
      </div>
      <a href='Buy-ticket.php?id=$index'>Buy</a>
      <button id='$index' type='submit'>BUY</button>
    </div>
    </div>
  ";
    }
  }
  if($matchFound != 1){
    echo 'The FLight could not be found';
  }
} else {
  echo 'Please enter both city';

foreach($jData as $index=>$jFlight){
  $sDepartureDate = date("Y-M-d H:i", substr($jFlight->departureTime, 0, 10));
  $sArrivalDate = date("Y-M-d H:i", substr($jFlight->arrivalTime, 0, 10));
    $sFlightsDivs .= "
    <div id='flight'>
    <div id='flight-route'>
      <div class='row'>
        <div>
        $jFlight->flightId 
          <p>$jFlight->companyName</p>              
        </div>
        <div>
          From
          <p>$jFlight->fromCity</p>
        </div>
        <div>
          To
          <p>$jFlight->toCity</p>
        </div>
        <div>
        Departure Time
          <p>$sDepartureDate</p>
        </div>
        <div>
        Arrival Time
          <p>$sArrivalDate</p>
        </div>
      </div>
                  
    </div>
    <div id='flight-buy'>
      <div>
        $jFlight->price
        $jFlight->currency
      </div>
      <a href='buy-ticket.php?id=$index'>Buy</a>
    </div>
</div>
  ";
}
}
?>

<form action="index.php" method="GET">
  <input type="text" name="fromCity" placeholder="From city">
  <input type="text" name="toCity" placeholder="To city">
  <button type="submit">Search</button>
</form>

<div id="flights">  
    <?= $sFlightsDivs ?>
</div>










<?php
 require_once('footer.php');
?>
