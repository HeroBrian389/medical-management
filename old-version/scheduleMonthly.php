<?php
if (!isset($_GET['y'])) {
  $y = date('Y');
  $m = date('n');

  $linkRedirect = 'scheduleMonthly.php?y='.$y.'&m='.$m;
  header("Location: ". $linkRedirect);
}

// Connect to the database
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
// Select all entries about calendar where the users email matches
$sql = "SELECT * FROM calendar WHERE email LIKE '" . $_COOKIE['email'] . "';";

// Retrieve results and close connection
// This data will be used later for manipulation
$result = $conn->query($sql);
$conn->close();

// Put all of the days of the week in a table for stuff - can't remember why
$days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

// Put all of the data from the mySql table into non associative arrays for
// easier manipulation and presentation

// List of time starting times
$timeListStart = [];

// List of time closing times
$timeListEnd = [];

// List of titles given to the appointments
$timeListName = [];

// Type of appointment - consultation or surgery
$timeListType = [];

// Type of appointment - consultation or surgery
$typeList = [];

// List of dates - eg 27/05/2020
$dateList = [];

// foreach loop to put all of the usable info from the associative mysql array
// into the lists/arrays described above
foreach ($result as $row){
  array_push($timeListStart,$row['start']);
  array_push($timeListEnd,$row['end']);
  array_push($timeListName,$row['name']);
  array_push($typeList,$row['type']);
  array_push($dateList, strtotime($row['date']));

}

// This is used to create the refernece point
// The program needs to work from the first of the month so it counts the number
// of days in a month then gets the first day of the month and counts acorss until
// it finds the first of the month. Once the first day has been found it starts
// printing numbers starting from 1 and ending on $maxDays

// Sample expression
$sampleExpression = "1 May 2020";

// Running count of how far back you want to go
$minusCount = 0;

// Current year
$year = date('Y');


// first date of the month
$date = "1";

// real expression
$expression = $date . ' ' . $month . ' ' . $year;

// first day given all of the other values
$firstDay = date('l', strtotime($expression));
$count = 0;

// get max number of days in the month
$maxDays = cal_days_in_month(CAL_GREGORIAN, $monthNum, $year);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Scanorama</title>

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
          <span>Manage Users</span></a>
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
            <a class="collapse-item" href="newScheduleDaily.php">Full View</a>
            <a class="collapse-item active" href="newScheduleDailyList.php">List view</a>
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
                        <?php echo date('d/m/Y'); ?>
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

                      <?php
                      $y = $_GET['y'] ?  $_GET['y'] : date('Y');
                      $m = $_GET['m'] ?  $_GET['m'] : date('m');

                      //display 5 next and 5 previous years of selected year
                      for ($i=$y-5; $i<=$y+5; $i++){
                          echo '<div class="col">
                          <a class="btn btn-outline-secondary" href="scheduleMonthly.php?y='.$i.'&m='.$m.'">'.$i.'</a>&nbsp&nbsp;
                          </div>';
                      }
                      echo "</div>
                      <br>
                      <div class='row'>";

                      //months array just like Jan,Feb,Mar,Apr in short format
                      $m_array = array('1'=>'January', '2'=>'February', '3'=>'March', '4'=>'April', '5'=>'May', '6'=>'June', '7'=>'July', '8'=>'August', '9'=>'September', '10'=>'October', '11'=>'November', '12'=>'December');
                      //display months
                      foreach ($m_array as $key=>$val){
                          echo '
                          <div class="col">
                          <a class="btn btn-outline-primary" href="scheduleMonthly.php?y='.$y.'&m='.$key.'">'.$val.'</a>&nbsp&nbsp;
                          </div>';
                      }
                      echo "</div>
                      <br>
                      <div class='row'>";

                      $d_array = array('1'=>31, '2'=>28, '3'=>31, '4'=>30, '5'=>31, '6'=>30, '7'=>31, '8'=>31, '9'=>30, '10'=>31, '11'=>30, '12'=>31);
                      $d_m = ($m==2 && $y%4==0)?29:$d_array[$m];
                      echo '
                      <form action="newScheduleDaily.php" method="post">
                      <table style="table-layout: fixed;" class="table table-bordered">';

                      //days array
                      $days_array = array('1'=>'Mon', '2'=>'Tue', '3'=>'Wed', '4'=>'Thu', '5'=>'Fri', '6'=>'Sat', '7'=>'Sun');
                      //display days
                      echo '<thead>
                        <tr>
                          <th scope="col">Monday</th>
                          <th scope="col">Tuesday</th>
                          <th scope="col">Wednesday</th>
                          <th scope="col">Thursday</th>
                          <th scope="col">Friday</th>
                          <th scope="col">Saturday</th>
                          <th scope="col">Sunday</th>
                        </tr>
                      </thead>
                      <tbody>';

                      $date = $y.'-'.$m.'-01';
                      //find start day of the month
                      $startday = array_search(date('D',strtotime($date)), $days_array);

                      echo '<tr>';
                      //daisplay month dates
                      for($i=1; $i<($d_m+$startday); $i++){
                          $day = ($i-$startday+1<=9)?'0'.($i-$startday+1):$i-$startday+1;

                          // Reset the consultation count every day
                          $consultationInstances = 0;

                          // Reset surgery count every day
                          $surgeryInstances = 0;

                          // Reset the physio instances every day
                          $physioInstances = 0;

                          if ($i<$startday) {
                            echo '<td></td>';
                            } else {
                              foreach($dateList as $dList) {

                                if ($dList == strtotime($day.'-'.$m.'-'.$y)) {

                                  $arrSearch = array_search($dList, $dateList);
                                  if ($arrSearchPlus > $arrSearch) {
                                    $arrSearchPlus += 1;
                                    }

                                  if ($testList == $dList) {
                                    $arrSearchPlus += 1;
                                    } else {
                                      $arrSearchPlus = 0;
                                      }

                                  // if statement to figure out what kind of appointment it is
                                  // adding functionality for consultation, physio and surgery
                                  if ($typeList[$arrSearchPlus] == 'consultation') {
                                    $consultationInstances += 1;

                                    } else if ($typeList[$arrSearchPlus] == 'surgery'){
                                      $surgeryInstances += 1;
                                      } else if ($typeList[$arrSearchPlus] == 'physio') {
                                        $physioInstances += 1;

                                        }
                                        $testList = $dList;
                                  }
                                }

                              // if the selected date is equal to the current date make the date blue
                              if (date('d-n-Y') == $day.'-'.$m.'-'.$y) {
                                echo '<td style="background-color:#e0fcff;" scope="col">
                                <div class="row">';

                                // create a col-sm-4 and align it center with my-auto class
                                // button is used to convey info to daily view calendar
                                echo '<div class="col-sm-4 my-auto">
                                <button type="submit" class="btn btn-outline-info" name="date" value="' . $day.'-0'.$m.'-'.$y . '">';
                                echo $day;
                                echo '</button>
                                </div>
                                <div class="col-sm my-auto">
                                <span class="text-success">' . $consultationInstances;
                                echo '</span></div>';
                                echo '<div class="col-sm my-auto">
                                <span class="text-danger">' . $surgeryInstances . '</span></div>
                                ';
                                echo '
                                <div class="col-sm my-auto">
                                <span class="text-primary">' . $physioInstances . '</span></div>
                                </div>
                                </div>
                                </td>';
                              } else {
                                echo '<td scope="col">
                                <div class="row">';

                                // create a col-sm-4 and align it center with my-auto class
                                // button is used to convey info to daily view calendar
                                echo '<div class="col-sm-4 my-auto">
                                <button type="submit" class="btn btn-outline-info" name="date" value="' . $day.'-0'.$m.'-'.$y . '">';
                                echo $day;
                                echo '</button>
                                </div>';

                                echo '<div class="col-sm my-auto">';
                                if ($consultationInstances > 0) {
                                  echo '<span class="text-success">' . $consultationInstances . '</span>';
                                }
                                echo '</div>';


                                echo '<div class="col-sm my-auto">';
                                if ($surgeryInstances > 0){
                                echo '<span class="text-danger">' . $surgeryInstances . '</span>';
                                }
                                echo '</div>';

                                echo '<div class="col-sm my-auto">';
                                if ($physioInstances > 0){
                                echo '<span class="text-primary">' . $physioInstances . '</span>';
                                }
                                echo '</div>
                                </div>
                                </td>';
                                }
                            }

                          echo ($i%7==0)?'</tr><tr>':'';
                      }
                      //calculate next & prev month
                      $next_y=(($m+1)>12)?($y+1):$y;
                      $next_m=(($m+1)>12)?1:($m+1);
                      $prev_y=(($m-1)<=0)?($y-1):$y;
                      $prev_m=(($m-1)<=0)?12:($m-1);
                      //daisplay next prev
                      ?>

                      <tr>
                        <td>
                          <div class="text-center">
                          <?php echo '<a class="btn btn-primary" href="scheduleMonthly.php?y='.$prev_y.'&m='.$prev_m.'">';
                          ?>
                            <i class="fas fa-arrow-left"></i>
                          </a>
                        </div>
                        </td>
                        <td colspan="5"></td>
                        <td>
                          <div class="text-center">
                          <?php
                          echo '<a class="btn btn-primary" href="scheduleMonthly.php?y='.$next_y.'&m='.$next_m.'">';
                          ?>
                          <i class="fas fa-arrow-right"></i>
                          </a>
                        </div>
                        </td>
                      </tr>
                      </tbody></table></form>

              </div>
              </div>


              </div>
              </div>
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
