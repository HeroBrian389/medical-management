<?php
$servername = "localhost";
$username = "root";
$password = "Mintylucky9";
$dbname = "medhub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $sql = "SELECT * FROM hospitalData WHERE name LIKE '%" . $search . "%'";
} else {
  $sql = "SELECT * FROM hospitalData;";
}

$result = $conn->query($sql);

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

  <style>
  .embed-responsive-210by297 {
  padding-bottom: 160.42%;
  overflow: hidden;
  width:100%;
}
.scroll-div {
  overflow: scroll;
}
</style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-list"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Medhub</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
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
      <li class="nav-item">
        <a class="nav-link" href="
        <?php
        if (isset($_COOKIE['firstName'])){
          echo "userProfile.php";
        } else {
          echo "hospitalUser.php";
        }
        ?>
        ">
          <i class="fas fa-fw fa-cog"></i>
          <span>Profile</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="error.php">
          <i class="fas fa-fw fa-clipboard"></i>
          <span>Reports</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Hospitals
      </div>


      <li class="nav-item">
        <a class="nav-link" href="error.php">
          <i class="fas fa-fw fa-list-ul"></i>
          <span>Manage</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item active">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-eye"></i>
          <span>View</span></a>
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
              <a href="
              <?php
              if (isset($_COOKIE['firstName'])){
                echo "userProfile.php";
              } else {
                echo "hospitalUser.php";
              }
              ?>
              ">
                <p class="text-muted my-auto">
                <i class="fas fa-home fa-fw mx-1 mx-auto"></i>
                <span class="mx-2 hide-nav-home small">Home</span>
              </p>
              </a>
            </li>

            <li class="nav-item my-auto mx-3 text-center">
              <a href="">
                <p class="text-primary my-auto">
                <i class="fas fa-hospital fa-fw mx-1"></i>
                <span class="mx-2 hide-nav-hospital small">Hospitals</span>
              </p>
              </a>
            </li>

            <li class="nav-item my-auto mx-3 text-center">
              <a href="patientSearch.php">
                <p class="text-muted my-auto">
                <i class="fas fa-user fa-fw mx-1"></i>
                <span class="mx-2 hide-nav-patients small">Patients</span>
              </p>
              </a>
            </li>

            <li class="nav-item my-auto mx-3 text-center">
              <a href="error.php">
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
                <span class="mr-2 d-none d-lg-inline btn btn-primary">Brian Kelleher</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="
                <?php
                if (isset($_COOKIE['firstName'])){
                  echo "userProfile.php";
                } else {
                  echo "hospitalUser.php";
                }
                ?>
                ">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="
                <?php
                if (isset($_COOKIE['firstName'])){
                  echo "userProfile.php";
                } else {
                  echo "hospitalUser.php";
                }
                ?>
                ">
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


          <!-- majority of stuff happens here-->
          <div class="row">
              <div class="col">
                <h1 class="display-5">Hospital Search</h1>
                <form class="my-2 navbar-search" method="get" action="">
                  <div class="input-group">
                    <input type="text" class="form-control border-secondary small" name="search" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" >
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>

              <!-- first item -->
              <ul class="list-group list-group-flush">

                <?php
                foreach ($result as $row) {
                  echo '<li class="list-group-item bg-light">
                <div class="card shadow">
                    <div class="d-flex row-flex justify-content-around my-0">
                      <span class="p-2 float-left my-auto">
                        <a href="">
                    <h4 class="card-title mb-0">
                        ' . $row['name'] . '
                  </h4>
                </a>
                    </span>
                    <div class="p-2 float-right my-auto">
                      <p class="card-text mb-0">
                        Speciality: <span class="text-primary">' . $row['type'] . '</span>
                  </p>
                </div>
                </div>
                  <div class="card-body pt-3">
                  <div class="row">
                  <div class="col-6">
                  <h6 class="card-subtitle text-muted">
                  Description:
                  </h6>
                        <p class="card-text text-dark">
                          ' . $row['description'] . '
                          </p>
                          </div>
                          <div class="col-6">
                          <h6 class="card-subtitle text-muted mb-1">
                          Doctors:
                          </h6>
                          <ul class="list-group">';
                            $doctorList = explode(",", $row['doctors']);
                            $docCount = count($doctorList);
                            $docCount = $docCount -1;
                            for ($x = 0; $x < $docCount; $x++) {
                              $d = $doctorList[$x];
                              $d = str_replace('"', "", $d);
                              echo '<li class="list-group-item py-1">
                              <div class="d-flex justify-content-between">' . $d . '<a class="text-primary"><i class="fas fa-question"></i></a></div></li>';
                            }
                          echo '</ul>
                          </div>
                          </div>
                      </div>
                <div class="card-footer text-center">
                  <div class="row">
                  <div class="col text-center">
                    <span class="mx-1">
                  Page
                </span>
                  <button class="btn btn-outline-primary">
                  <i class="fas fa-home my-auto"></i>
                </button>
              </div>
              <div class="col text-center">
                <span class="mx-1">
              Grant
            </span>
              <button class="btn btn-outline-primary">
              <i class="fas fa-lock my-auto"></i>
            </button>
          </div>
              <div class="col text-center">
                <span class="mx-1">
                Message
              </span>
              <a href="error.php">
                  <button class="btn btn-outline-primary">
                  <i class="fas fa-paper-plane my-auto "></i>
                </button>
                </a>
              </div>
                </div>
                </div>
              </div>
              </li>';
                }
                ?>

      </ul>
          </div>

                      <!-- left hand column
                      <div class="col-xl-4 col-lg-5 d-md-none d-lg-block">
                        <div class="sticky-text">
                        <div class="card mb-3 shadow">
                          <div class="card-body text-dark text-justify">
                          <h4 class="font-weight-bold"><u>Popular Clinicians</u></h4>

                        <hr>

                          <div class="card-header">
                            Suggested
                          </div>
                          <ul class="list-group">
                            <li class="list-group-item">David Moorhouse
                              <span class="float-right">

                              <i class="fas fa-edit fa-fw text-primary"></i>
                            </span>
                            </li>
                            <li class="list-group-item">Neurospine
                              <span class="float-right">
                                <i class="fas fa-check text-success"></i>
                              <i class="fas fa-edit fa-fw text-primary ml-3"></i>
                              </span>
                            </li>
                            <li class="list-group-item">Aylesbury Clinic
                              <span class="float-right">
                                <i class="fas fa-check text-warning"></i>
                              <i class="fas fa-edit fa-fw text-primary ml-3"></i>
                            </span>
                            </li>
                            <li class="list-group-item">Poynton Clinic
                              <span class="float-right">
                                <i class="fas fa-check text-danger"></i>
                              <i class="fas fa-edit fa-fw text-primary ml-3"></i>
                            </span>
                            </li>
                          </ul>
                        </div>
                        </div>
                      </div>
                    </div>
                      end left hand column -->
          </div>
          <!-- Content Row -->


          <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

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
          <form action="login.php" method="post">
          <button value="logout" class="btn btn-primary">Logout</a>
        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
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
  function myFunction() {
  var x = document.getElementById("pdfDiv");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFunction1() {
var x = document.getElementById("pdfDiv1");
if (x.style.display === "none") {
  x.style.display = "block";
} else {
  x.style.display = "none";
}
}

function myFunction3() {
var x = document.getElementById("moreInfo");
if (x.style.display === "none") {
  x.style.display = "block";
} else {
  x.style.display = "none";
}
}
</script>
</body>

</html>
