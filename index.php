<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meeting Point</title>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
<style>
body {
    font-family: 'Lato';font-size: 22px;
}
.button {
  background-color: #006747; /* Bottle Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>
</head>
<body>
    <center>
    <?php

    // Read the JSON file
    $beaconJSON = file_get_contents('beacon.json');

    // Decode the JSON file
    $beacon = json_decode($beaconJSON,true);

    // Set the base url and append variables
    //$btn = <a href="#" class="button">Link Button</a>
    $link = '<a href="https://www.google.com/maps/dir/?api=1&destination=';
    $link .= $beacon["lat"];
    $link .= ",";
    $link .= $beacon["long"];
    $link .= '&travelmode=walking';

    $link .='" class="button">Get Directions</a>';

    // Attempt at date logic:
    $today = new DateTime();
    $time = $beacon["time"];
    $clock = explode(":", $time);
    $today->setTime($clock[0], $clock[1]);
    //$myTime = date('h:i', strtotime($date));
    $myTime = date_format($today, "g:i a");
    $datestring_for_js = $today->format('Y-m-d H:i:s');

    // Display data
    echo '<img src="lighthouse.png" alt="lighthouse">';
    echo"<br>";
    echo '<h2>Meeting Point</h2>';
    $place = "";
    $place .=$beacon["name"];
    $place .= " at ";
    $place .= $myTime; //$beacon["time"];
    echo $place;
    echo "<br>";
    echo '<p id="countdown"></p>';
    echo "<br>";
    echo $link;
    ?>
    </center>
</body>
<script type="text/javascript">
   // var myTime = new Date(<?php echo $today*1000; ?>);

// Set the date we're counting down to
var countDownDate = new Date("<?php echo $datestring_for_js; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  if (days>0 && distance>0){
  document.getElementById("countdown").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
  }
  else if (hours>0 && distance>0){
  document.getElementById("countdown").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";
  }
  else {
  document.getElementById("countdown").innerHTML = minutes + "m " + seconds + "s ";
  }

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "TIME HAS PASSED";
  }
}, 1000);
</script>

</html>
