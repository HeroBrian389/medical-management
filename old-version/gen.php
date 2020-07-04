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
  $randList = ['consultation', 'surgery', 'physio'];

    for ($i = 0; $i < 250; $i++) {
      $randTypeNum = mt_rand(0,2);
      $randType = $randList[$randTypeNum];

      $randDateNum = mt_rand(1,31);
      if ($randDateNum < 10) {
        $randDateNum = '0'.$randDateNum;
      }

      $randNewOrReturn = mt_rand(0,1);

      // If there is no account, insert user data into userData table
      $sqlInsert = "INSERT INTO calendar (name, start, end, type, day, date, email, patient, patientDob, new) VALUES ('MRI', '12:00', '12:45', '" . $randType . "', 'Tuesday', '" . $randDateNum . "-05-2020', 'mike@gmail.com', 'BrianKelleher', '12/09/03', $randNewOrReturn)";
      echo $sqlInsert."<br>";
      if ($conn->query($sqlInsert) === TRUE) {

    } else {
        echo "Error updating record: " . $conn->error;
    }
    }

?>
