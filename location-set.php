<?php
// define variables and set to empty values
$lat = $long = $appt =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Security Check
  $storedHash = file_get_contents('pwh.txt');
  $given = test_input($_POST["pw"]);
  $pwh = hash('sha256', $given);
  if ($pwh == $storedHash){
      // Security Testing for XSS
      $lat = test_input($_POST["lat"]);
      $long = test_input($_POST["long"]);
      $appt = test_input($_POST["appt"]);
      $name = test_input($_POST["name"]);
      // Define the beacon - this can be combined with above, I'm sure...
      $beacon = new stdClass(); // this initializes the object?
      $beacon->lat = $lat;
      $beacon->long = $long;
      $beacon->time = $appt;
      $beacon->name = $name;

      $beaconJSON = json_encode($beacon);

      // Write the file
        $myfile = fopen("beacon.json", "w") or die("Unable to open file!");
        fwrite($myfile, $beaconJSON);
        fclose($myfile);

        echo "Location set successfully - hopefully!";

    } else {echo "Password is incorrect";}
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>