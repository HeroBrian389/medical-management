<?php

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
if (isset($_POST['submitUser'])) {
  $userName = $_POST['userName'];
  $userDob = $_POST['userDob'];

  $sqlInsert = "INSERT INTO `" . $_COOKIE['email'] . "` (name, dob) VALUES ('". $userName."', '". $userDob . "')";

    if ($conn->query($sqlInsert) === TRUE) {

  } else {
      echo "Error updating record: " . $conn->error;
  }
}

$sql = "select * from Users WHERE email like 'mike@gmail.com' order by date DESC LIMIT 10;";
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

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <style>
  .embed-responsive-9by16 {
  padding-top: 35%;
  }
</style>

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
      <li class="nav-item active">
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



        </nav>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


          <!-- Card -->
          <div class="row">
            <!-- Center -->
            <div class="col-sm-12">

              <!-- Start card info -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View users</h6>
                </div>
                <div class="card-body">
                  <table id="tableID" class="table" width="100%">
                    <thead>
                      <tr>
                        <th width="25%"></th>
                        <th width="25%"></th>
                        <th width="25%"></th>
                        <th width="25%"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <?php
                      $counter = 0;
                      foreach ($result as $row){
                        echo '<td>
                        <div class="card rounded">
                          <div class="card-img-top mb-0 pb-0">
                            <div class="embed-responsive embed-responsive-9by16" style="height: 300px">
                              <iframe class="embed-responsive-item" src="../../uploads/mike@gmail.com/PDF_finished/' . $row['filename'] . '#toolbar=0&zoom=Scale&navpanes=0" height="90%"></iframe>
                            </div>
                          </div>
                          <div class="card-body mt-0 pt-0">
                            <p class="card-text my-0 py-0">
                              ' . $row['report'] . '
                            </p>
                            <p class="card-text">
                              ' . $row['date'] . '
                            </p>
                            <div class="card-footer text-center">
                              <p class="card-text my-0 py-0">
                                Select <input type="checkbox" aria-label="Checkbox for following text input">
                              <button class="btn btn-sm btn-outline-primary ml-1" data-toggle="modal" data-target="#expandPDF">
                                <i class="fas fa-expand ml-1 mx-auto"></i>
                              </button>
                              </p>
                            </div>
                            </div>
                          </div>
                        </div>
                        </td>';

                        if (($counter % 4) == 3) {
                          echo '</tr><tr>';
                        }
                        $counter += 1;
                      }
                      if (($counter % 4) == 0) {
                        echo '<td></td><td></td><td></td><td></td>';
                      } else if ($counter % 4 == 1) {
                        echo '<td></td><td></td><td></td>';
                      } else if ($counter % 4 == 2) {
                        echo '<td></td><td></td>';
                      } else  {
                        echo '<td></td>';
                      }
                        ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


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
      <script src="vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

      <script>
      $(document).ready(function () {
        //Pagination numbers
        $('#tableID').DataTable({
          "pagingType": "simple_numbers",
          "pageLength": 2
      } );
      });
      </script>

</body>

</html>
