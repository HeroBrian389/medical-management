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

if (isset($_POST['date'])) {
  $date = $_POST['date'];
} else {
  $date = date('d-m-Y');
}
$sql = "SELECT * FROM calendar WHERE email='" . $_COOKIE['email'] . "'AND date='" . $date . "';";

$result = $conn->query($sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Smart Scanner</title>

  <style>
  table {
    width: 100%;
  }
  table tr:nth-child(even) th {
    color: #ccc;
    font-weight: normal;
  }
  table th,
  table td {
    padding: 0.5rem 1rem;
  }
  table th {
    font-weight: normal;
    border-top: thin dotted #ccc;
    text-align: center;
  }

  table td {
    font-size: 0.8rem;
    font-weight: bold;
    line-height: 1.4;
    border-radius: 0.2rem;
    -webkit-transition: opacity 0.3s ease;
    transition: opacity 0.3s ease;
    border-top: thin dotted #ccc;
  }
  table td > span {
    font-size: 1em;
    font-weight: normal;
    color: white;
    display: block;
    width: 100%;
  }

  .stage-earth {
    background-color: #FFA726;
  }

  .stage-mercury {
    background-color: #9CCC65;
  }

  .stage-venus {
    background-color: #FF8A65;
  }

  .stage-mars {
    background-color: #B3E5FC;
  }

  .stage-jupiter {
    background-color: #81D4FA;
  }

  .stage-saturn {
    background-color: #26C6DA;
  }
  </style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Scanorama</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Actions
      </div>


      <!-- Nav Item - scan -->
      <li class="nav-item">
        <a class="nav-link" href="uploadPDF.php">
          <i class="fas fa-fw fa-camera"></i>
          <span>Scan Documents</span></a>
      </li>

      <!-- Nav Item - scan -->
      <li class="nav-item">
        <a class="nav-link" href="view.php">
          <i class="fas fa-fw fa-eye"></i>
          <span>View Documents</span></a>
      </li>

      <!-- Nav Item - scan -->
      <li class="nav-item">
        <a class="nav-link" href="users.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Manage users</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-calendar"></i>
          <span>View Calendar</span>
        </a>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Viewing modes</h6>
            <a class="collapse-item active" href="newScheduleDaily.php">Full View</a>
            <a class="collapse-item" href="newScheduleDailyList.php">List view</a>
            <a class="collapse-item" href="scheduleMonthly.php">Month View</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="scheduleItem.php">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Manage Calendar</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - scan -->

      <li class="nav-item">
        <a class="nav-link" href="tickets.php">
          <i class="fas fa-fw fa-ticket-alt"></i>
          <span>Manage Tickets</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="analytics.php">
          <i class="fas fa-fw fa-chart-bar" aria-hidden="true"></i>
          <span>Analytics</span></a>
      </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

              <!-- Start card info -->
              <!-- Card -->
              <div class="row">

                <!-- Left hand side -->
                <div class="col-sm-12">

                  <!-- Start card info -->
                  <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <div class="row">
                    <div class="col-sm-4">
                      <a href="scheduleItem.php">
                        <button class="btn btn-warning">Add item</button>
                      </a>
                    </div>
                    <div class="col-sm-4 text-center">
                      <h2>
                      <?php echo $date; ?>
                    </h2>
                    </div>
                <div class="col-sm-2">
                  <a href="newScheduleDaily.php">
                    <button class="btn btn-primary">
                    Daily
                  </button>
                </a>
                </div>

                <div class="col-sm-2">
                  <a href="scheduleMonthly.php">
                  <button class="btn btn-primary">
                    Monthly
                  </button>
                </a>
                </div>
              </div>
                </div>
                <div class="card-body">

                  <div class="row">
                    <div class="col-sm-6 text-center">
                      <a href="newScheduleDaily.php"><button type="button" class="btn btn-secondary">Full view</button></a>
                    </div>
                    <div class="col-sm-6 text-center">
                      <a href="newScheduleDailyList.php"><button type="button" class="btn btn-outline-secondary">List view</button></a>
                    </div>
                  </div>
                  <br>

                    <?php
                    $timeListStart = [];
                    $timeListEnd = [];
                    $timeListName = [];
                    $timeListType = [];
                    $typeList = [];
                    $patientName = [];
                    $patientDob = [];

                    foreach ($result as $row){
                      array_push($timeListStart,$row['start']);
                      array_push($timeListEnd,$row['end']);
                      array_push($timeListName,$row['name']);
                      array_push($typeList,$row['type']);
                      array_push($patientName,$row['patient']);
                      array_push($patientDob,$row['patientDob']);
                    }


                    // PHP program to sort array of dates

                    // user-defined comparison function
                    // based on timestamp
                    function compareByTimeStamp($time1, $time2)
                    {
                        if (strtotime($time1) < strtotime($time2))
                            return 1;
                        else if (strtotime($time1) > strtotime($time2))
                            return -1;
                        else
                            return 0;
                    }


                    function searchTime($selectedTime)
                    {
                      global $timeListStart, $timeListEnd, $timeListName, $patientDob, $patientName, $typeList;


                      if (in_array($selectedTime, $timeListStart)) {

                        $keyTime = array_search($selectedTime, $timeListStart);


                        $start = strtotime($timeListStart[$keyTime]);
                        $end = strtotime($timeListEnd[$keyTime]);
                        $min = ($end - $start) / 60;

                        $rowCount = $min / 15;

                        echo '<td style="background-color: #B3E5FC;" rowspan="' . $rowCount . '">' . $timeListName[$keyTime] . '</td>';

                        echo '<td style="background-color: #ffccff;" rowspan="' . $rowCount .'">' . $patientName[$keyTime] . '</td>';

                        echo '<td style="background-color: #ffccff;" rowspan="' . $rowCount .'">' . $patientDob[$keyTime] . '</td>';

                        if ($typeList[$keyTime] == 'consultation'){
                        echo '<td rowspan="' . $rowCount . '" style="background-color: #95d095;"><span>Consultation</span></td>';
                      } else if ($typeList[$keyTime] == 'surgery') {
                        echo '<td rowspan="' . $rowCount . '" style="background-color: #FF8A65;"><span>Surgery</span></td>';
                      } else {
                        echo '<td rowspan="' . $rowCount . '" style="background-color: #cc99ff;"><span>Physio</span></td>';
                      }

                      }
                    }

                    // sort array with given user-defined function
                    $copyListEnd = $timeListEnd;
                    usort($copyListEnd, "compareByTimeStamp");

                    $copyListStart = $timeListStart;
                    usort($copyListStart, "compareByTimeStamp");

                    $timeCounter = 0;
                    ?>

                    <table>
                      <thead>
                        <tr>
                          <th width="10%" scope="col">Time</th>
                          <td scope="col">Info</td>
                          <td scope="col">Patient Name</td>
                          <td scope="col">Patient Dob</td>
                          <td scope="col">Type</td>
                        </tr>
                      </thead>
                      <tbody>
                      <?php

                      $separatedStart = end($copyListStart);

                      $sepStart = explode(":",$separatedStart);

                      $startHour = $sepStart[0] -1;

                      $separatedEnd = $copyListEnd[0];
                      $sepEnd = explode(":", $separatedEnd);
                      $endHour = $sepEnd[0] +1;

                      for ($x = $startHour; $x < $endHour; $x++){
                        $arrayTimes = ["00", "15", "30", "45"];
                        foreach ($arrayTimes as $timesNow) {
                          echo '<tr>';
                          $combinedTime = $x . ':' . $timesNow;
                          echo '<th>' . $combinedTime . '</th>';


                          searchTime($combinedTime);

                          echo '</tr>';
                        }

                      }

                      ?>
                    </tbody>
                    </table>

              </div>
              </div>



        </div>
        <!-- /.container-fluid -->

      </div>

      <!-- End of Main Content -->


      <!-- End of Footer -->


    <!-- End of Content Wrapper -->


  <!-- End of Page Wrapper -->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
