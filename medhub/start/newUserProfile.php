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
    echo ("Connection failed: " . $conn->connect_error);
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
          <button id="sidebarToggleTop" class="btn btn-link d-xs-none rounded-circle mr-3">
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


            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mx-0 px-1">
          <!-- majority of stuff happens here-->

              <!-- first item -->
            <div class="card shadow mb-3">
              <div class="card-header d-flex justify-content-between">
                <h5 class="card-title font-weight-bold mb-0 my-auto">Basic Info <i class="fas fa-notes-medical ml-1"></i></h5>
              </div>
              <div class="card-body">
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
              <form class="row" method="post" action="">
                <div class="col-12">
                    <div class="form-group">
                        <label for="account-fn">First Name</label>
                        <?php echo '<input class="form-control" type="text" id="account-fn" name="firstName" value="' . $firstNameRow .'">';?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="account-ln">Last Name</label>
                        <?php echo '<input class="form-control" type="text" id="account-ln" name="lastName" value="' . $lastNameRow .'">';?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="account-email">E-mail Address</label>
                        <?php echo '<input class="form-control" type="email" id="account-email" name="email" value="' . $emailRow .'">';?>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="account-phone">Phone Number</label>
                        <?php echo '<input class="form-control" type="text" id="account-phone" name="phone" value="' . $phoneRow .'">';?>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="account-pass">New Password</label>
                        <input class="form-control" type="password" id="account-pass" name="password">

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="account-confirm-pass">Confirm Password</label>
                        <input class="form-control" type="password" id="account-confirm-pass">
                    </div>
                </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="account-fn">Address 1</label>
                    <?php echo '<input class="form-control" type="text" id="account-fn" name="address1" value="' . $address1Row .'">';?>
                </div>
            </div>
            <div class="col-lg-12 col-xl-12">
                <div class="form-group">
                    <label for="account-ln">Address 2</label>
                    <?php echo '<input class="form-control" type="text" id="account-ln" name="address2" value="' . $address2Row .'">';?>
                </div>
            </div>
            <div class="col-lg-12 col-lg-6">
                <div class="form-group">
                    <label for="inlineFormCustomSelectPref">County</label>
                    <?php echo '<input class="form-control" type="text" id="account-ln" name="county" value="' . $countyRow .'">';?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="account-fn">GP</label>
                    <?php echo '<input class="form-control" type="text" id="account-fn" name="gp" value="' . $gpRow .'">';?>

                </div>
            </div>
      <div class="col-12">
          <hr class="mt-2 mb-3">
          <div class="text-center">
              <button class="btn btn-style-1 btn-primary" name="submit_basic" type="submit" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
          </div>
      </div>
      </form>
    </div>
  </div>
      </div>

          <!-- Content Row -->
          <!-- Content Row -->
        </div>
      </div>

        <!-- /.container-fluid -->
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mx-0 px-1">
        <div class="card shadow mb-3">
          <div class="card-header d-flex justify-content-between">
            <h5 class="card-title font-weight-bold mb-0 my-auto">Current diagnosis <i class="fas fa-comment-medical ml-1"></i></h5>
          </div>
          <div class="card-body pb-0">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

          <form class="row" method="post" action="">


            <div class="col-12">
                <hr class="mt-2">
                <div class="text-center">
                    <button class="btn btn-style-1 btn-primary" name="submit_doctor" type="submit" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
                </div>
            </div>
      </div>


    </div>
      </div>
      </form>
      <!-- Content Row -->
      <!-- Content Row -->
    </div>

    <div class="card shadow mb-3">
      <div class="card-header d-flex justify-content-between">
        <h5 class="card-title font-weight-bold mb-0 my-auto">Appointments <i class="fas fa-calendar-check ml-1"></i></h5>
      </div>
      <div class="card-body pb-0">
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

      <form class="row mb-3" method="post" action="">

        <div class="col-12">
            <hr class="mt-2 mb-3">
            <div class="text-center">
                <button class="btn btn-style-1 btn-danger" type="submit" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
            </div>
        </div>
    </div>
    </div>
    </div>
    </form>
    <!-- Content Row -->
    <!-- Content Row -->
    </div>

    <div class="card shadow">
      <div class="card-header d-flex justify-content-between">
        <h5 class="card-title font-weight-bold mb-0 my-auto">Past medical history <i class="fas fa-file text-danger ml-1"></i></h5>

      </div>
      <div class="card-body mx-1 px-1">
        <form method="post" action="">
        <div class="card mb-3">
          <div class="card-header font-weight-bold">Surgical <i class="fas fa-hospital ml-1 text-danger"></i></div>
          <div class="row mb-0 pb-0 mt-1">
            <div class="col-12 text-truncate">
              <span class="mx-3">
              Lumbar Microdiscemptomy
            </span>
          </div>
          <div class="col-12 text-truncate">
            <span class="mx-3 small text-muted">
            14-06-2020 <i class="fas fa-question ml-1"></i>
          </span>
        </div>
          </div>
          <div class="row mb-0 pb-0 mt-1">
            <div class="col-12 text-truncate">
              <span class="mx-3">
              Lumbar Microdiscemptomy
            </span>
          </div>
          <div class="col-12 text-truncate">
            <span class="mx-3 small text-muted">
            14-06-2020 <i class="fas fa-question ml-1"></i>
          </span>
        </div>
      </div>
          </div>

        <div class="card mb-3">
          <div class="card-header font-weight-bold">Physio <i class="fas fa-running ml-1 text-danger"></i></div>
          <div class="row mb-0 pb-0 mt-1">
            <div class="col-12 text-truncate">
              <span class="mx-3">
              Lumbar Microdiscemptomy
            </span>
          </div>
          <div class="col-12 text-truncate">
            <span class="mx-3 small text-muted">
            14-06-2020 <i class="fas fa-question ml-1"></i>
          </span>
        </div>
          </div>
          <div class="row mb-0 pb-0 mt-1">
            <div class="col-12 text-truncate">
              <span class="mx-3">
              Lumbar Microdiscemptomy
            </span>
          </div>
          <div class="col-12 text-truncate">
            <span class="mx-3 small text-muted">
            14-06-2020 <i class="fas fa-question ml-1"></i>
          </span>
        </div>
          </div>
        </div>

        <div class="card mb-3">
          <div class="card-header font-weight-bold">Medication <i class="fas fa-capsules ml-1 text-danger"></i></div>
          <div class="row mb-0 pb-0 mt-1">
            <div class="col-12 text-truncate">
              <span class="mx-3">
              Lumbar Microdiscemptomy
            </span>
          </div>
          <div class="col-12 text-truncate">
            <span class="mx-3 small text-muted">
            14-06-2020 <i class="fas fa-question ml-1"></i>
          </span>
        </div>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-3">


        <div class="col-12">
            <hr class="mt-2 mb-3">
            <div class="text-center">
                <button class="btn btn-style-1 btn-danger" type="submit" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
            </div>
        </div>
        </form>
    </div>
    </div>
    </div>

    <!-- Content Row -->
    <!-- Content Row -->
    </div>
  </div>

  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mx-0 px-1">
        <div class="card shadow">
          <form action="" method="post">
          <div class="card-header">
            <div class="d-flex justify-content-center">
            <h5 class="card-title font-weight-bold my-auto mr-auto">Biometrics <i class="fas fa-chart-pie ml-1"></i></h5>

          </div>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-12">

                  <div class="d-flex justify-content-center">
                    <div class="p-1 my-auto">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle text-light fa-stack-2x icon-background"></i>
                      <i class="fa fa-running text-orange fa-stack-1x"></i>
                    </span>
                  </div>
                  <div class="p-1 my-auto">
                  <h4 class="font-weight-bold text-dark my-auto">15,432
                  <span class="small text-secondary">steps</span></h4>
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <div class="p-1 my-auto">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle text-light fa-stack-2x icon-background"></i>
                  <i class="fa fa-weight text-orange fa-stack-1x"></i>
                </span>
              </div>
              <div class="p-1 my-auto">
              <h4 class="font-weight-bold text-dark my-auto d-flex">
                <?php echo '<input class="form-control my-auto" type="text" name="weight" style="width: 60px;" value="' . $weightRow .'">';?>
              <span class="small text-secondary my-auto ml-1">kgs</span></h4>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="p-1 my-auto">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle text-light fa-stack-2x icon-background"></i>
              <i class="fa fa-arrows-alt-v text-orange fa-stack-1x"></i>
            </span>
          </div>
          <div class="p-1 my-auto">
          <h4 class="font-weight-bold text-dark my-auto d-flex">
            <?php echo '<input class="form-control my-auto" type="text" name="height" style="width: 100px" value="' . $heightRow .'">';?>
          <span class="small text-secondary my-auto ml-1">cm</span></h4>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <div class="p-1 my-auto">
        <span class="fa-stack fa-lg">
          <i class="fa fa-circle text-light fa-stack-2x icon-background"></i>
          <i class="fa fa-tint text-orange fa-stack-1x"></i>
        </span>
      </div>
      <div class="p-1 my-auto">
      <h4 class="font-weight-bold text-dark my-auto d-flex">
        <?php echo '<input class="form-control my-auto" type="text" name="blood_pressure" style="width: 100px" value="' . $blood_pressureRow .'">';?>
      <span class="small text-secondary my-auto ml-1">mg</span></h4>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    <div class="p-1 my-auto">
    <span class="fa-stack fa-lg">
      <i class="fa fa-circle text-light fa-stack-2x icon-background"></i>
      <i class="fa fa-heartbeat text-orange fa-stack-1x"></i>
    </span>
  </div>
  <div class="p-1 my-auto">
  <h4 class="font-weight-bold text-dark my-auto d-flex">
    <?php echo '<input class="form-control my-auto" type="text" name="bpm" style="width: 100px" value="' . $bpmRow .'">';?>
  <span class="small text-secondary my-auto ml-1">bpm</span></h4>
</div>
</div>
      </div>
    </div>

  <div class="card mb-3">
    <div class="card-body">
      <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
      <p class="card-text font-weight-bold">Steps</p>
      <div class="chart-container">
          <canvas id="line-chart"></canvas>
        </div>
        </div>

        <!--<div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <p class="card-text font-weight-bold">Blood Pressure</p>
    <canvas id="line-chart1" style="height:100%"></canvas>
  </div>-->
  </div>
</div>
</div>
<div class="text-center">
      <button name="biometrics" class="btn btn-orange">Update Profile</button>
  </div>
  </div>
  </div>
</form>
</div>

  <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 mb-3 mx-0 px-1">
    <div class="row">
      <div class="col-12">
  <div class="card shadow mb-3">
    <div class="card-header d-flex justify-content-between">
      <h5 class="card-title font-weight-bold mb-0 my-auto">Access <i class="fas fa-lock text-danger ml-1"></i></h5>
    </div>
    <div class="card-body">
      <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

    <form method="post" action="">
      <div class="card mb-3">
        <div class="card-header">
          Biometrics <i class="fas fa-chart-pie ml-1"></i>
        </div>
      <div class="form-group">
        <input name='tagAccess' id="tagInputBlood" placeholder="Search for practice...">
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">
        Basic info <i class="fas fa-notes-medical ml-1"></i>
      </div>
    <div class="form-group">
      <input name='tagAccess' id="tagInputDoctor" placeholder="Search for practice...">
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-header">
      Current diagnosis <i class="fas fa-comment-medical ml-1"></i>
    </div>
  <div class="form-group">
    <input name='tagAccess' id="tagInputBasic" placeholder="Search for practice...">
  </div>
  </div>

  <div class="card mb-3">
    <div class="card-header">
      Past medical history <i class="fas fa-file ml-1"></i>
    </div>
  <div class="form-group">
    <input name='tagAccessAddress' id="tagInputAddress" placeholder="Search for practice...">
  </div>
  </div>

  <div class="card mb-3">
    <div class="card-header">
      Appointments <i class="fas fa-calendar-check ml-1"></i>
    </div>
  <div class="form-group">
    <input name='tagAccessAddress' id="tagInputAppointments" placeholder="Search for practice...">
  </div>
  </div>


      <div class="col-12">
          <hr class="mt-2 mb-3">
          <div class="text-center">
              <button class="btn btn-style-1 btn-danger" type="submit" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
          </div>
      </div>
  </div>
  </div>
  </div>
  </form>
  <!-- Content Row -->
  <!-- Content Row -->
  </div>
  </div>
</div>
    <!--
    <div class="col-xs-2 col-lg-2 col-md-4 col-sm-12 col-12 mb-3">
    <div class="card shadow mb-3">
      <div class="card-header">
        <h4 class="card-title font-weight-bold my-auto">Index Info</h4>
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-12">
        <div class="card bg-light">
          <div class="row my-1">
            <div class="col-lg-4 col-md-12 col-sm-12 my-auto">
              <div class="d-flex justify-content-center border-bottom-item py-1">
                <div class="p-1 my-auto">
                <span class="fa-stack fa-md mr-1">
                  <i class="fa fa-circle text-orange fa-stack-2x icon-background"></i>
                  <i class="fa fa-wrench text-white fa-stack-1x"></i>
                </span>
              </div>
              <div class="p-1 my-auto">
              <h4 class="font-weight-bold text-orange my-auto">Orthotoolkit</h4>
            </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-12 col-sm-12 border-left-item my-auto">
            <div class="d-flex justify-content-center border-bottom-item py-1">
              <div class="p-1 my-auto">
                <div class="form-group my-auto">
                  <div class="input-group">
                    <input class="form-control" id="ndi" type="ndi" name="ndi" placeholder="NDI index*" value="19/50" required="required" data-validation-required-message="Please enter your NDI index. /50" />
                    <p class="help-block text-danger"></p>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <a class="text-orange" target="_blank" href="https://www.orthotoolkit.com/ndi/">
                        NDI
                      </a>
                    </div>
                    </div>
                  </div>
                </div>
            </div>

        </div>
          </div>

          <div class="col-lg-4 col-md-12 col-sm-12 border-left-item my-1">
            <div class="d-flex justify-content-center py-1">
              <div class="p-1 my-auto">
                <div class="form-group my-auto">
                  <div class="input-group">
                    <input class="form-control" id="odi" type="odi" name="odi" placeholder="ODI index*" value="23/50" required="required" data-validation-required-message="Please enter your ODI index. /50" />
                    <p class="help-block text-danger"></p>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <a class="text-orange" target="_blank" href="https://www.orthotoolkit.com/oswestry/">
                        ODI
                      </a>
                    </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        <div class="row mb-3">
          <div class="col-12">
          <div class="card">
            <div class="card-body">
            <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <p class="card-text font-weight-bold">NDI Index</p>
            <div class="chart-container">
      <canvas id="line-chart2"></canvas>
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
      <p class="card-text font-weight-bold">ODI Index</p>
<canvas id="line-chart3" style="height:100%"></canvas>
</div>
</div>
  </div>
</div>
</div>
</div>

<div class="row mb-3">
<div class="col-12">
<div class="card bg-light">
<div class="row my-1">
  <div class="col-lg-4 col-md-12 col-sm-12 my-auto">
    <div class="d-flex justify-content-center border-bottom-item py-1">
      <div class="p-1 my-auto text-center">
        <div class="form-group mb-0">
          <div class="input-group">
            <input class="form-control" id="molbpdq" type="molbpdq" name="molbpdq" placeholder="ODI index*" value="23/50" required="required" data-validation-required-message="Please enter your ODI index. /50" />
            <p class="help-block text-danger"></p>
            <div class="input-group-append">
              <div class="input-group-text">
                <a class="text-orange" target="_blank" href="https://www.orthotoolkit.com/molbpdq/">
                 MOLBPDQ
              </a>
            </div>
            </div>
          </div>
        </div>
  </div>
</div>
  </div>

  <div class="col-lg-4 col-md-12 col-sm-12 border-left-item my-auto">
    <div class="d-flex justify-content-center border-bottom-item py-1">
      <div class="p-1 my-auto text-center">
        <div class="form-group mb-0">
          <div class="input-group">
            <input class="form-control" id="odi" type="odi" name="odi" placeholder="ODI index*" value="23/50" required="required" data-validation-required-message="Please enter your ODI index. /50" />
            <p class="help-block text-danger"></p>
            <div class="input-group-append">
              <div class="input-group-text">
                <a class="text-orange" target="_blank" href="https://www.orthotoolkit.com/roland-morris/">
                RMDQ
              </a>
            </div>
            </div>
          </div>
        </div>
  </div>
  </div>
  </div>

  <div class="col-lg-4 col-md-12 col-sm-12 border-left-item my-auto">
    <div class="d-flex justify-content-center py-1">
      <div class="p-1 my-auto text-center">
        <div class="form-group mb-0">
          <div class="input-group">
            <input class="form-control" id="odi" type="odi" name="odi" placeholder="ODI index*" value="23/50" required="required" data-validation-required-message="Please enter your ODI index. /50" />
            <p class="help-block text-danger"></p>
            <div class="input-group-append">
              <div class="input-group-text">
                <a class="text-orange" target="_blank" href="https://www.orthotoolkit.com/srs-22/">
                SRS-22 Index
              </a>
            </div>
            </div>
          </div>
        </div>
  </div>
  </div>
  </div>
</div>

      </div>
    </div>
  </div>
  <hr>
  <button class="btn btn-orange">Update Profile</button>
  </div>
</div>
</div>


<div class="col-xs-2 col-lg-2 col-md-4 col-sm-12 col-12 mb-3">
<div class="card shadow mb-3">
  <div class="card-header d-flex justify-content-between">
    <h5 class="card-title font-weight-bold mb-0 my-auto">Bloods</h5>
  </div>
  <div class="card-body">
    <div class="row">
    <div class="col-lg-9 col-md-12 col-sm-12 mb-3">

  <form class="row mb-3" method="post" action="">
    <div class="col-md-6">
      <div class="card">
          <div class="card-header">
            <h6 class="font-weight-bold">Red Blood Cells</h6>
          </div>
          <div class="card-body">
          <div class="d-flex justify-content-center">
            <i class="fas fa-tint text-danger mx-3 my-auto"></i>
            <input style="width:80px" class="form-control text-center" id="red" type="red" name="red" placeholder="Count" value="4.6" required="required" data-validation-required-message="Please enter your ODI index. /50" />
            <span class="small text-secondary my-auto mx-2">/ cm<sup>3</sup></span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="card">
          <div class="card-header">
            <h6 class="font-weight-bold">White Blood Cells</h6>
          </div>
          <div class="card-body">
          <div class="d-flex justify-content-center">
            <i class="fas fa-tint text-cream mx-3 my-auto"></i>
            <input style="width:80px" class="form-control text-center" id="red" type="red" name="red" placeholder="Count" value="5600" required="required" data-validation-required-message="Please enter your ODI index. /50" />
            <span class="small text-secondary my-auto mx-2">/ mm<sup>3</sup></span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 mb-3">
      <div class="card">
          <div class="card-header">
            <h6 class="font-weight-bold">Haemoglobin</h6>
          </div>
          <div class="card-body">
          <div class="d-flex justify-content-center">
            <i class="fas fa-heartbeat text-danger mx-3 my-auto"></i>
            <input style="width:80px" class="form-control text-center" id="red" type="red" name="red" placeholder="Count" value="140" required="required" data-validation-required-message="Please enter your ODI index. /50" />
            <span class="small text-secondary my-auto mx-2">/ L<sup></sup></span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 mb-3">
      <div class="card">
          <div class="card-header">
            <h6 class="font-weight-bold">Neutrophils</h6>
          </div>
          <div class="card-body">
          <div class="d-flex justify-content-center">
            <i class="fas fa-biohazard text-danger mx-3 my-auto"></i>
            <input style="width:80px" class="form-control text-center" id="red" type="red" name="red" placeholder="Count" value="4500" required="required" data-validation-required-message="Please enter your ODI index. /50" />
            <span class="small text-secondary my-auto mx-2">/ mm<sup>3</sup></span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 mb-3">
      <div class="card">
          <div class="card-header">
            <h6 class="font-weight-bold">Lymphocytes</h6>
          </div>
          <div class="card-body">
          <div class="d-flex justify-content-center">
            <i class="fas fa-capsules text-danger mx-3 my-auto"></i>
            <input style="width:80px" class="form-control text-center" id="red" type="red" name="red" placeholder="Count" value="2300" required="required" data-validation-required-message="Please enter your ODI index. /50" />
            <span class="small text-secondary my-auto mx-2">/ mm<sup>3</sup></span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 mb-3">
      <div class="card">
          <div class="card-header">
            <h6 class="font-weight-bold">Platelets</h6>
          </div>
          <div class="card-body">
          <div class="d-flex justify-content-center">
            <i class="fas fa-bacteria text-danger mx-3 my-auto"></i>
            <input style="width:80px" class="form-control text-center" id="red" type="red" name="red" placeholder="Count" value="330" required="required" data-validation-required-message="Please enter your ODI index. /50" />
            <span class="small text-secondary my-auto mx-2">/ L<sup></sup></span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
        <hr class="mt-2 mb-3">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <button class="btn btn-style-1 btn-danger" type="submit" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
        </div>
    </div>
</div>
</div>
</div>
</form>

</div>
</div>-->






</div>

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->
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

  <script>
var input = document.getElementById('tagInputBasic'),
    // init Tagify script on the above inputs
    tagifyBasic = new Tagify(input, {
        whitelist : [
          <?php
          foreach ($tagList as $tag) {
            echo '"' . $tag['name'] . '",';
          }
          ?>
        ],
        dropdown: {
            position: "manual",
            maxItems: Infinity,
            enabled: 0,
            classname: "customSuggestionsList"
        },
        enforceWhitelist: false
    })

    tagifyBasic.addTags([
      <?php
      echo $basic_accessRow;
      ?>
    ])

    tagifyBasic.on("dropdown:show", onSuggestionsListUpdateBasic)
          .on("dropdown:hide", onSuggestionsListHideBasic)
          .on('dropdown:scroll', onDropdownScrollBasic)

    renderSuggestionsListBasic()

    // ES2015 argument destructuring
    function onSuggestionsListUpdateBasic({ detail:suggestionsElm }){
        console.log(  suggestionsElm  )
    }

    function onSuggestionsListHideBasic(){
        console.log("hide dropdown")
    }

    function onDropdownScrollBasic(e){
        console.log(e.detail)
      }

    // https://developer.mozilla.org/en-US/docs/Web/API/Element/insertAdjacentElement
    function renderSuggestionsListBasic(){
        tagifyBasic.dropdown.show.call(tagifyBasic) // load the list
        tagifyBasic.DOM.scope.parentNode.appendChild(tagifyBasic.DOM.dropdown)
    }



var inputAddress = document.getElementById('tagInputAddress'),
    // init Tagify script on the above inputs
    tagifyAddress = new Tagify(inputAddress, {
        whitelist : [
          <?php
          foreach ($tagList as $tag) {
            echo '"' . $tag['name'] . '",';
          }
          ?>
        ],
        dropdown: {
            position: "manual",
            maxItems: Infinity,
            enabled: 0,
            classname: "customSuggestionsList"
        },
        enforceWhitelist: false
    })

    tagifyAddress.addTags([
      <?php
      echo $address_accessRow;
      ?>
    ])

    tagifyAddress.on("dropdown:show", onSuggestionsListUpdateAddress)
          .on("dropdown:hide", onSuggestionsListHideAddress)
          .on('dropdown:scroll', onDropdownScrollAddress)

    renderSuggestionsListAddress()

    // ES2015 argument destructuring
    function onSuggestionsListUpdateAddress({ detail:suggestionsElm }){
        console.log(  suggestionsElm  )
    }

    function onSuggestionsListHideAddress(){
        console.log("hide dropdown")
    }

    function onDropdownScrollAddress(e){
        console.log(e.detail)
      }

    // https://developer.mozilla.org/en-US/docs/Web/API/Element/insertAdjacentElement
    function renderSuggestionsListAddress(){
        tagifyAddress.dropdown.show.call(tagifyAddress) // load the list
        tagifyAddress.DOM.scope.parentNode.appendChild(tagifyAddress.DOM.dropdown)
    }




var inputDoctor = document.getElementById('tagInputDoctor'),
  // init Tagify script on the above inputs
  tagifyDoctor = new Tagify(inputDoctor, {
      whitelist : [
        <?php
        foreach ($tagList as $tag) {
          echo '"' . $tag['name'] . '",';
        }
        ?>
      ],
      dropdown: {
          position: "manual",
          maxItems: Infinity,
          enabled: 0,
          classname: "customSuggestionsList"
      },
      enforceWhitelist: false
  })

  tagifyDoctor.addTags([
    <?php
    echo $doctor_accessRow;
    ?>
  ])

  tagifyDoctor.on("dropdown:show", onSuggestionsListUpdateDoctor)
        .on("dropdown:hide", onSuggestionsListHideDoctor)
        .on('dropdown:scroll', onDropdownScrollDoctor)

  renderSuggestionsListDoctor()

  // ES2015 argument destructuring
  function onSuggestionsListUpdateDoctor({ detail:suggestionsElm }){
      console.log(  suggestionsElm  )
  }

  function onSuggestionsListHideDoctor(){
      console.log("hide dropdown")
  }

  function onDropdownScrollDoctor(e){
      console.log(e.detail)
    }

  // https://developer.mozilla.org/en-US/docs/Web/API/Element/insertAdjacentElement
  function renderSuggestionsListDoctor(){
      tagifyDoctor.dropdown.show.call(tagifyDoctor) // load the list
      tagifyDoctor.DOM.scope.parentNode.appendChild(tagifyDoctor.DOM.dropdown)
  }


  var input = document.getElementById('tagInputBlood'),
      // init Tagify script on the above inputs
      tagifyBlood = new Tagify(input, {
          whitelist : [
            <?php
            foreach ($tagList as $tag) {
              echo '"' . $tag['name'] . '",';
            }
            ?>
          ],
          dropdown: {
              position: "manual",
              maxItems: Infinity,
              enabled: 0,
              classname: "customSuggestionsList"
          },
          enforceWhitelist: false
      })

      tagifyBlood.addTags([
        <?php
        echo $blood_accessRow;
        ?>
      ])

      tagifyBlood.on("dropdown:show", onSuggestionsListUpdate)
            .on("dropdown:hide", onSuggestionsListHide)
            .on('dropdown:scroll', onDropdownScroll)

      renderSuggestionsList()

      // ES2015 argument destructuring
      function onSuggestionsListUpdate({ detail:suggestionsElm }){
          console.log(  suggestionsElm  )
      }

      function onSuggestionsListHide(){
          console.log("hide dropdown")
      }

      function onDropdownScroll(e){
          console.log(e.detail)
        }

      // https://developer.mozilla.org/en-US/docs/Web/API/Element/insertAdjacentElement
      function renderSuggestionsList(){
          tagifyBlood.dropdown.show.call(tagifyBlood) // load the list
          tagifyBlood.DOM.scope.parentNode.appendChild(tagifyBlood.DOM.dropdown)
      }


var inputAppointments = document.getElementById('tagInputAppointments'),
    // init Tagify script on the above inputs
    tagifyAppointments = new Tagify(inputAppointments, {
        whitelist : [
          <?php
          foreach ($tagList as $tag) {
            echo '"' . $tag['name'] . '",';
          }
          ?>
        ],
        dropdown: {
            position: "manual",
            maxItems: Infinity,
            enabled: 0,
            classname: "customSuggestionsList"
        },
        enforceWhitelist: false
    })

    tagifyAppointments.addTags([
      <?php
      echo $blood_accessRow;
      ?>
    ])

    tagifyAppointments.on("dropdown:show", onSuggestionsListUpdateAppointments)
          .on("dropdown:hide", onSuggestionsListHideAppointments)
          .on('dropdown:scroll', onDropdownScrollAppointments)

    renderSuggestionsListAppointments()

    // ES2015 argument destructuring
    function onSuggestionsListUpdateAppointments({ detail:suggestionsElm }){
        console.log(  suggestionsElm  )
    }

    function onSuggestionsListHideAppointments(){
        console.log("hide dropdown")
    }

    function onDropdownScrollAppointments(e){
        console.log(e.detail)
      }

    // https://developer.mozilla.org/en-US/docs/Web/API/Element/insertAdjacentElement
    function renderSuggestionsListAppointments(){
        tagifyAppointments.dropdown.show.call(tagifyAppointments) // load the list
        tagifyAppointments.DOM.scope.parentNode.appendChild(tagifyAppointments.DOM.dropdown)
    }

  var chartColors = {
  red: 'rgb(255, 99, 132)',
  orange: 'rgb(255, 159, 64)',
  yellow: 'rgb(255, 205, 86)',
  green: 'rgb(75, 192, 192)',
  blue: 'rgb(54, 162, 235)',
  purple: 'rgb(153, 102, 255)',
  grey: 'rgb(231,233,237)',
  white: 'rgb(255, 255, 255, 255)',
};

new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ["8 AM","12 PM","4 PM","8 PM"],
    datasets: [
      {
        data: [450,0,500,350],
        label: "Lower",
        borderColor: chartColors.orange,
        fill: false,
      },
    ]
  },
  options: {
    legend: {
      display: false,
    },
    scales: {
        xAxes: [{
            gridLines: {
                display:false
            }
        }],
        yAxes: [{
            gridLines: {
                display:false
            },
            ticks: {
              beginAtZero: true,
            }
        }]
    }

}});

new Chart(document.getElementById("line-chart1"), {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "April"],
    datasets: [
      {
        data: [60,90,70,80],
        label: "Lower",
        borderColor: chartColors.yellow,
        fill: true,
        backgroundColor: chartColors.white,
      },
      {
        data: [86,114,106,110],
        label: "Upper",
        borderColor: chartColors.red,
        fill: true,
        backgroundColor: chartColors.orange,

      },
      {
      },
    ]
  },
  options: {
    legend: {
      display: false,
    },
    scales: {
        xAxes: [{
            gridLines: {
                display:false
            }
        }],
        yAxes: [{
            gridLines: {
                display:false
            }
        }]
    }
  }
});


new Chart(document.getElementById("line-chart2"), {
  type: 'line',
  data: {
    labels: ["Jan", "Mar", "Jun", "Sep"],
    datasets: [
      {
        data: [38,23,44,42],
        label: "Lower",
        borderColor: chartColors.orange,
        fill: false,
      },
    ]
  },
  options: {
    legend: {
      display: false,
    },
    scales: {
        xAxes: [{
            gridLines: {
                display:false
            }
        }],
        yAxes: [{
            gridLines: {
                display:false
            },
            ticks: {
              beginAtZero: true,
            }
        }]
    }

}});

new Chart(document.getElementById("line-chart3"), {
  type: 'line',
  data: {
    labels: ["Jan", "Mar", "Jun", "Sep"],
    datasets: [
      {
        data: [19,23,6,42],
        label: "Lower",
        borderColor: chartColors.orange,
        fill: false,
      },
    ]
  },
  options: {
    legend: {
      display: false,
    },
    scales: {
        xAxes: [{
            gridLines: {
                display:false
            }
        }],
        yAxes: [{
            gridLines: {
                display:false
            },
            ticks: {
              beginAtZero: true,
            }
        }]
    }
}});
</script>

</body>

</html>
