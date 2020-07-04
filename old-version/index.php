<?php
if(!isset($_COOKIE['email'])) {
    echo "Please log in <a href='login.php'>here</a>!";
} else {
  $servername = "localhost";
  $username = "root";
  $password = "Mintylucky9";
  $dbname = "scan_doc";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $email = $_COOKIE['email'];
  $sql = 'SELECT id, firstName, lastName, email FROM userData WHERE email LIKE "'.$email.'";';

  $result = $conn->query($sql);

  $sqlStatement = 'SELECT id, name, dob, report, date, filename, email FROM Users WHERE email LIKE "'.$email.'";';

  $scannedPDF = $conn->query($sqlStatement);

  $conn->close();

$latestArr = [];
  $counter = 0;
  foreach ($scannedPDF as $sPDF) {
    $counter += 1;
    array_push($latestArr, $sPDF['date']);
  }



    echo '<!DOCTYPE html>
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
          <li class="nav-item active">
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
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-calendar"></i>
              <span>View Calendar</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Viewing modes</h6>
                <a class="collapse-item" href="newScheduleDaily.php">Full view</a>
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


            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

              <!-- Page Heading -->
              <div class="mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

              </div>

              <!-- Content Row -->
              <div class="row">

                <div class="col-xl-4 col-sm-4 mb-4">
                          <a href="uploadPDF.php" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-camera"></i>
                            </span>
                            <span class="text">Scan documents</span>
                          </a>
                        </div>
                        <div class="col-xl-4 col-sm-4 mb-4">
                          <a href="view.php" class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-eye"></i>
                            </span>
                            <span class="text">View documents</span>
                          </a>
                        </div>
                        <div class="col-xl-4 col-sm-4 mb-4">
                          <a href="users.php" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-user"></i>
                            </span>
                            <span class="text">Manage users</span>
                          </a>
                        </div>
                        </div>


                <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-6 col-md-6 mb-4">
                  <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Most recent PDF date</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">';
                          function date_sort($a, $b) {
                            return strtotime($a) - strtotime($b);
                          }

                          usort($latestArr, "date_sort");
                          echo $latestArr[0];

                          echo '</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-6 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Number of PDF\'s scanned</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">' . $counter;

                          echo '</div>';?>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-sm-12 col-xl-12 text-center">
                  <a href="help.html" class="btn btn-warning">Help!!!</a>
                </div>


              </div>


              <!-- Content Row -->



                  </div>


            <!-- /.container-fluid -->

          </div>
          <!-- End of Main Content -->

          <!-- Footer -->
          <footer class="sticky-footer bg-white">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2019</span>
              </div>
            </div>
          </footer>
          <!-- End of Footer -->

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
              <a class="btn btn-primary" href="login.html">Logout</a>
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
      <script src="js/sb-admin-2.min.js"></script>

      <!-- Page level plugins -->
      <script src="vendor/chart.js/Chart.min.js"></script>

      <!-- Page level custom scripts -->';
      ?>
<script>
// Set new default font family and font color to mimic Bootstrap's default styling

window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
    axisY: {
        title: "Number of PDFs"
    },
    data: [
    {
        type: "area",
        dataPoints: [//array

        <?php
          $countPDF = 1;
          foreach ($latestArr as $l) {
          $expList = explode("-", $l);
          echo '{ x: new Date(' . $expList[2] . ',' . $expList[1] . ',' . $expList[0] .'), y: ' . $countPDF . '},';
          $countPDF += 1;
        }?>

        ]
    }
    ]
});

    chart.render();
}

</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
      <script src="js/demo/chart-pie-demo.js"></script>

    </body>

    </html>

  <?php } ?>
