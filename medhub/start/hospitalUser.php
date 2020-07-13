<?php
$servername = "localhost";
$username = "root";
$password = "Mintylucky9";
$dbname = "medhub";

$emailCookie = $_COOKIE['hospitalEmail'];
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
  $practiceName = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['passwordInput'];
  $website = $_POST['website'];

  $sqlInsertBasic = "INSERT INTO `".$emailCookie."_STATIC_INFO_HOSPITAL` (name, email, phone, password, website) VALUES ('". $practiceName . "', '" . $email . "', '" . $phone . "', '" . $password . "', '" . $website . "')";

    if ($conn->query($sqlInsertBasic) === TRUE) {

  } else {
      echo "Error updating record: " . $conn->error;
  }

  if ($password != "") {
    $sqlInsertPass = "UPDATE hospitalData SET password = '" . $password ."' WHERE email LIKE '" . $emailCookie . "';";
    $conn->query($sqlInsertPass);
  }
}

if (isset($_POST['submit_description'])) {
  $description = $_POST['description'];
  $locationInfo = $_POST['location'];
  $type = $_POST['type'];

  $accessString = '';

  $access = $_POST['tagAccess'];

  $accessList = explode(",",$access);
  foreach ($accessList as $list) {
    $a = explode('"', $list);
    $name = $a[3];
    $str = '"' . $name . '",';
    $accessString .= $str;
  }

  $sqlInsertAddress = "INSERT INTO `".$emailCookie."_STATIC_INFO_HOSPITAL` (description, location, type, doctors) VALUES ('" . $description . "', '" . $locationInfo . "', '" . $type . "', '" . $accessString . "')";

    if ($conn->query($sqlInsertAddress) === TRUE) {

  } else {
      echo "Error updating record: " . $conn->error;
  }
}


$sql = "SELECT * FROM `" . $emailCookie . "_STATIC_INFO_HOSPITAL`;";

$result = $conn->query($sql);

$sql = "SELECT * FROM userData;";
$tagList = $conn->query($sql);

foreach ($result as $row) {
  if (gettype($row['name']) != "NULL") {
    $practiceNameRow = $row['name'];
  }
  if (gettype($row['email']) != "NULL") {
    $emailRow = $row['email'];
  }
  if (gettype($row['phone']) != "NULL") {
    $phoneRow = $row['phone'];
  }
  if (gettype($row['description']) != "NULL") {
    $descriptionRow = $row['description'];
  }
  if (gettype($row['location']) != "NULL") {
    $locationRow = $row['location'];
  }
  if (gettype($row['type']) != "NULL") {
    $typeRow = $row['type'];
  }
  if (gettype($row['website']) != "NULL") {
    $websiteRow = $row['website'];
  }
  if (gettype($row['password']) != "NULL") {
    $passwordRow = $row['password'];
  }
  if (gettype($row['doctors']) != "NULL") {
    $doctorsRow = $row['doctors'];
  }
}

$sqlInsert = "UPDATE hospitalData SET name = '" . $practiceNameRow . "',  email = '" . $emailRow . "', type = '" . $typeRow ."', location = '" . $locationRow . "', phone = '" . $phoneRow . "', description = '" . $descriptionRow . "', doctors ='" . $doctorsRow . "' WHERE email LIKE '" . $emailCookie . "';";
$conn->query($sqlInsert);

$sql = "SELECT * FROM physicians";
$physicianResults = $conn->query($sql);
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

.tags-look .tagify__dropdown__item{
  display: inline-block;
  border-radius: 3px;
  padding: .3em .5em;
  border: 1px solid #CCC;
  background: #F3F3F3;
  margin: .2em;
  font-size: .85em;
  color: black;
  transition: 0s;
}

.tags-look .tagify__dropdown__item--active{
  color: black;
}

.tags-look .tagify__dropdown__item:hover{
  background: lightyellow;
  border-color: gold;
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
          
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
          <!-- majority of stuff happens here-->
          <div class="row">
            <!-- center column -->
            <div class="col">
              <!-- first item -->
            <div class="card shadow mb-3">
              <div class="card-header d-flex justify-content-between">
                <h5 class="card-title font-weight-bold mb-0 my-auto">Basic Info</h5>
              </div>
              <div class="card-body">
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
              <form class="row" method="post" action="">
                <div class="col-6">
                    <div class="form-group">
                        <label for="account-fn">Practice Name</label>
                        <?php echo '<input class="form-control" type="text" id="account-fn" name="name" value="' . $practiceNameRow .'">';?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="account-fn">Website</label>
                        <?php echo '<input class="form-control" type="text" id="account-fn" name="website" value="' . $websiteRow .'">';?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">E-mail Address</label>
                        <?php echo '<input class="form-control" type="email" id="account-email" name="email" value="' . $emailRow .'">';?>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-phone">Phone Number</label>
                        <?php echo '<input class="form-control" type="text" id="account-phone" name="phone" value="' . $phoneRow .'">';?>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-pass">New Password</label>
                        <?php echo '<input class="form-control" type="password" id="account-pass" name="passwordInput">';?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-confirm-pass">Confirm Password</label>
                        <input class="form-control" type="password" id="account-confirm-pass">
                    </div>
                </div>
                <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
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

        <div class="card shadow mb-3">
          <div class="card-header d-flex justify-content-between">
            <h5 class="card-title font-weight-bold mb-0 my-auto">Description Info</h5>
          </div>
          <div class="card-body">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
          <form class="row" method="post" action="">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="account-fn">Description</label>
                    <textarea name="description" class="form-control" rows="4"><?php echo $descriptionRow ?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="account-ln">Location</label>
                    <?php echo '<input class="form-control" type="text" id="account-ln" name="location" value="' . $locationRow .'">';?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inlineFormCustomSelectPref">Type</label>
                    <?php echo '<input class="form-control" type="text" id="account-ln" name="type" value="' . $typeRow .'">';?>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="tagInputBasic">Medical professionals</label>
                    <input name='tagAccess' id="tagInputBasic" placeholder="Type your own or choose from suggested">
                </div>
            </div>

            <div class="col-12">
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <button class="btn btn-style-1 btn-primary" name="submit_description" type="submit" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
                </div>
            </div>
        </form>
      </div>

      </div>
    </div>
      </div>
      <!-- Content Row -->
      <!-- Content Row -->
    </div>
        <!-- /.container-fluid -->

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
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <script>
  var input = document.getElementById('tagInputBasic'),
    // init Tagify script on the above inputs
    tagify = new Tagify(input, {
      whitelist: [
        <?php
        foreach ($physicianResults as $row) {
          echo '"' . $row['name'] . '",';
        }
        ?>
      ],
      maxTags: 10,
      dropdown: {
        maxItems: 20,           // <- mixumum allowed rendered suggestions
        classname: "tags-look", // <- custom classname for this dropdown, so it could be targeted
        enabled: 0,             // <- show suggestions on focus
        closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
      }
    })

    tagify.addTags([
      <?php
      echo $doctorsRow;
      ?>
    ])


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
