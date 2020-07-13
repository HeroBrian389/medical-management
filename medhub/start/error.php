<?php
$servername = "localhost";
$username = "root";
$password = "Mintylucky9";
$dbname = "medhub";


$emailCookie = $_COOKIE['email'];
$dobCookie = $_COOKIE['dob'];
$firstNameCookie = $_COOKIE['firstName'];
$lastNameCookie = $_COOKIE['lastName'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['biometrics'])) {
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $bpm = $_POST['bpm'];
  $blood_pressure = $_POST['blood_pressure'];

  $sqlInsertBiometrics = "INSERT INTO `".$_COOKIE['email']."_STATIC_INFO` (weight, height, bpm, blood_pressure) VALUES ('". $weight."', '". $height . "', '" . $bpm . "', '" . $blood_pressure . "')";

    if ($conn->query($sqlInsertBiometrics) === TRUE) {

  } else {
      echo "Error updating record: " . $conn->error;
  }
}

if (isset($_POST['submit_basic'])) {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];

  $accessString = '';

  $access = $_POST['tagAccess'];
  $accessList = explode(",",$access);
  foreach ($accessList as $list) {
    $a = explode('"', $list);
    $name = $a[3];
    $str = '"' . $name . '",';
    $accessString .= $str;
  }

  $sqlInsertBasic = "INSERT INTO `".$_COOKIE['email']."_STATIC_INFO` (firstName, lastName, email, phone, password, basic_access) VALUES ('". $firstName."', '". $lastName . "', '" . $email . "', '" . $phone . "', '" . $password . "', '" . $accessString . "')";

    if ($conn->query($sqlInsertBasic) === TRUE) {

  } else {
      echo "Error updating record: " . $conn->error;
  }
}

if (isset($_POST['submit_address'])) {
  $address1 = $_POST['address1'];
  $address2 = $_POST['address2'];
  $county = $_POST['county'];

  $accessString = '';

  $access = $_POST['tagAccessAddress'];
  $accessList = explode(",",$access);
  foreach ($accessList as $list) {
    $a = explode('"', $list);
    $name = $a[3];
    $str = '"' . $name . '",';
    $accessString .= $str;
  }

  $sqlInsertAddress = "INSERT INTO `".$_COOKIE['email']."_STATIC_INFO` (address1, address2, county, address_access) VALUES ('". $address1."', '". $address2 . "', '" . $county . "', '" . $accessString . "')";

    if ($conn->query($sqlInsertAddress) === TRUE) {

  } else {
      echo "Error updating record: " . $conn->error;
  }
}

if (isset($_POST['submit_doctor'])) {
  $gp = $_POST['gp'];
  $refer = $_POST['refer'];

  $accessString = '';

  $access = $_POST['tagAccess'];
  $accessList = explode(",",$access);
  foreach ($accessList as $list) {
    $a = explode('"', $list);
    $name = $a[3];
    $str = '"' . $name . '",';
    $accessString .= $str;
  }

  $sqlInsertDoctor = "INSERT INTO `".$_COOKIE['email']."_STATIC_INFO` (GP, refer,doctor_access) VALUES ('". $gp."', '". $refer . "', '" . $accessString . "')";

    if ($conn->query($sqlInsertDoctor) === TRUE) {

  } else {
      echo "Error updating record: " . $conn->error;
  }
}

$sql = "SELECT * FROM `" . $_COOKIE['email'] . "_STATIC_INFO`;";

$result = $conn->query($sql);

$sql = "SELECT * FROM hospitalData;";
$tagList = $conn->query($sql);

foreach ($result as $row) {
  if (gettype($row['weight']) != "NULL") {
    $weightRow = $row['weight'];
  }
  if (gettype($row['height']) != "NULL") {
    $heightRow = $row['height'];
  }
  if (gettype($row['bpm']) != "NULL") {
    $bpmRow = $row['bpm'];
  }
  if (gettype($row['blood_pressure']) != "NULL") {
    $blood_pressureRow = $row['blood_pressure'];
  }
  if (gettype($row['firstName']) != "NULL") {
    $firstNameRow = $row['firstName'];
  }
  if (gettype($row['lastName']) != "NULL") {
    $lastNameRow = $row['lastName'];
  }
  if (gettype($row['email']) != "NULL") {
    $emailRow = $row['email'];
  }
  if (gettype($row['phone']) != "NULL") {
    $phoneRow = $row['phone'];
  }
  if (gettype($row['password']) != "NULL") {
    $passwordRow = $row['password'];
  }
  if (gettype($row['address1']) != "NULL") {
    $address1Row = $row['address1'];
  }
  if (gettype($row['address2']) != "NULL") {
    $address2Row = $row['address2'];
  }
  if (gettype($row['county']) != "NULL") {
    $countyRow = $row['county'];
  }
  if (gettype($row['GP']) != "NULL") {
    $gpRow = $row['GP'];
  }
  if (gettype($row['refer']) != "NULL") {
    $referRow = $row['refer'];
  }
  if (gettype($row['basic_access']) != "NULL") {
    $basic_accessRow = $row['basic_access'];
  }
  if (gettype($row['address_access']) != "NULL") {
    $address_accessRow = $row['address_access'];
  }
  if (gettype($row['doctor_access']) != "NULL") {
    $doctor_accessRow = $row['doctor_access'];
  }
  if (gettype($row['info_access']) != "NULL") {
    $blood_accessRow = $row['info_access'];
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Medhub</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

  <style>
  .embed-responsive-210by297 {
  padding-bottom: 160.42%;
  overflow: hidden;
  width:100%;
}
.scroll-div {
  overflow: scroll;
}

.customSuggestionsList > div{
  max-height: 200px;
  border: 2px solid pink;
  overflow: auto;
  font-size: 14px;
}
</style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-list"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Medhub</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Your info
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Profile</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Profile:</h6>
            <a class="collapse-item" href="">Medical history</a>
            <a class="collapse-item" href="">Social history</a>
            <a class="collapse-item" href="">Past procedures</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-clipboard"></i>
          <span>Reports</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Reports:</h6>
            <a class="collapse-item" href="reportUser.php">Your reports</a>
            <a class="collapse-item" href="scan.php">Upload reports</a>
            <a class="collapse-item" href="hospitalUser.php">Tagged reports</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Hospitals
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-list-ul"></i>
          <span>Manage</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage hospitals:</h6>
            <a class="collapse-item" href="hospital.php">Add hospitals</a>
            <a class="collapse-item" href="hospital.php">Remove hospitals</a>
            <a class="collapse-item" href="hospitalUser.php">Edit permissions</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-eye"></i>
          <span>View hospitals</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-lg-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-lg-inline-block form-inline mr-auto ml-md-3 my-2 my-md-3 mw-100 navbar-search">
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
            <li class="nav-item dropdown no-arrow d-lg-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-center p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
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


            <li class="nav-item my-auto mx-3 text-center">
              <a href="dashboard.php">
                <p class="text-muted my-auto">
                <i class="fas fa-home fa-fw mx-1 mx-auto"></i>
                <span class="mx-2 hide-nav-home small">Home</span>
              </p>
              </a>
            </li>

            <li class="nav-item my-auto mx-3 text-center">
              <a href="">
                <p class="text-muted my-auto">
                <i class="fas fa-hospital fa-fw mx-1"></i>
                <span class="mx-2 hide-nav-hospital small">Hospitals</span>
              </p>
              </a>
            </li>

            <li class="nav-item my-auto mx-3 text-center">
              <a href="">
                <p class="text-muted my-auto">
                <i class="fas fa-user fa-fw mx-1"></i>
                <span class="mx-2 hide-nav-patients small">Patients</span>
              </p>
              </a>
            </li>

            <li class="nav-item my-auto mx-3 text-center">
              <a href="">
                <p class="text-muted my-auto">
                <i class="fas fa-comment fa-fw mx-1"></i>
                <span class="mx-2 hide-nav-messaging small">Messaging</span>
              </p>
              </a>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1 text-muted">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">8/7/20</div>
                    Brian Kelleher uploaded a report
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">6/7/20</div>
                    Aylesbury clinic tagged you in a report
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">5/7/20</div>
                    Invoice outstanding for 30 days for patient <span class="font-weight-bold text-primary">Derek</span> for €290
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="">
                    <div class="text-truncate">Hi, I have a question about my appointment with Dr. Kelleher.</div>
                    <div class="small text-gray-500">Derek</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Can you send over the report?</div>
                    <div class="small text-gray-500">Aylesbury Clinic</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Don't charge next patient for consultation</div>
                    <div class="small text-gray-500">Brian Kelleher</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline btn btn-primary"><?php echo $firstNameRow . ' ' . $lastNameRow;  ?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


          <div class="row">
            <h1 class="display">This feature isn't available yet... <a href="javascript:history.back()">Go back</a></h1>
            <img src="assets/under_construction.svg" class="img-fluid">
          </div>

</div>
</div>

  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


</body>

</html>
