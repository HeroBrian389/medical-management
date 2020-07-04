<?php
$servername = "localhost";
$username = "root";
$password = "Mintylucky9";
$dbname = "neurospine";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$inputMonth = "6";
$inputMonth1 = "0" . $inputMonth;

$inputYear = "2020";

/// get max number of days in the month
$maxDays = cal_days_in_month(CAL_GREGORIAN, $inputMonth, $inputYear);


for ($currentDate = 1; $currentDate <= $maxDays; $currentDate++) {
  if ($currentDate < 10) {
    $currentDate = '0' . $currentDate;
  }
  $sql = "SELECT * FROM calendar WHERE email='" . $_COOKIE['email'] . "' AND date='" . $currentDate . "-" . $inputMonth1 . "-" . $inputYear . "';";

  ${"result$currentDate"} = $conn->query($sql);
  }


$conn->close();

foreach ($result07 as $ro){
  echo $ro['date'];
}
?>
