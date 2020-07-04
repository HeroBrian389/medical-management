
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

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

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

      <li class="nav-item active">
        <a class="nav-link" href="schedule.php">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Calendar</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - scan -->
      <li class="nav-item">
        <a class="nav-link" href="tickets.php">
          <i class="fas fa-fw fa-ticket-alt"></i>
          <span>Manage Tickets</span></a>
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
                  <h6 class="m-0 font-weight-bold text-primary">Scheduling</h6><button class="btn btn-primary">Monthly</button>
                </div>
                <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <?php
                      $calendarDateMonday = date("d/m/Y", strtotime("this week monday"));
                      $calendarDateTuesday = date("d/m/Y", strtotime("this week tuesday"));
                      $calendarDateWednesday = date("d/m/Y", strtotime("this week wednesday"));
                      $calendarDateThursday = date("d/m/Y", strtotime("this week thursday"));
                      $calendarDateFriday = date("d/m/Y", strtotime("this week friday"));
                      $calendarDateSaturday = date("d/m/Y", strtotime("this week saturday"));
                      $calendarDateSunday = date("d/m/Y", strtotime("this week sunday"));

                      if (date('l') == "Monday") {
                        echo '<th style="background-color: #e0fcff;" scope="col">Monday<br>' . $calendarDateMonday . '</th>';
                      } else {
                        echo '<th scope="col">Monday<br>' . $calendarDateMonday . '</th>';
                      }

                      if (date('l') == "Tuesday") {
                        echo '<th style="background-color: #e0fcff;" scope="col">Tuesday <br>' . $calendarDateTuesday . '</th>';
                      } else {
                        echo '<th scope="col">Tuesday<br>' . $calendarDateTuesday . '</th>';
                      }

                      if (date('l') == "Wednesday") {
                        echo '<th style="background-color: #e0fcff;" scope="col">Wednesday<br>' . $calendarDateWednesday . '</th>';
                      } else {
                        echo '<th scope="col">Wednesday<br>' . $calendarDateWednesday . '</th>';
                      }

                      if (date('l') == "Thursday") {
                        echo '<th style="background-color: #e0fcff;" scope="col">Thursday<br>' . $calendarDateThursday . '</th>';
                      } else {
                        echo '<th scope="col">Thursday<br>' . $calendarDateThursday . '</th>';
                      }

                      if (date('l') == "Friday") {
                        echo '<th style="background-color: #e0fcff;" scope="col">Friday<br>' . $calendarDateFriday . '</th>';
                      } else {
                        echo '<th scope="col">Friday<br>' . $calendarDateFriday . '</th>';
                      }

                      if (date('l') == "Saturday") {
                        echo '<th style="background-color: #e0fcff;" scope="col">Saturday<br>' . $calendarDateSaturday . '</th>';
                      } else {
                        echo '<th scope="col">Saturday<br>' . $calendarDateSaturday . '</th>';
                      }

                      if (date('l') == "Sunday") {
                        echo '<th style="background-color: #e0fcff;" scope="col">Sunday<br>' . $calendarDateSunday . '</th>';
                      } else {
                        echo '<th scope="col">Sunday<br>' . $calendarDateSunday . '</th>';
                      }
                       ?>

                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    for ($x = 8; $x < 18; $x++){
                      echo '<tr>';
                    echo '<th scope="row">' . $x . ':00</th>';

                    if (date('l') == "Monday") {
                      echo '<th style="background-color: #e0fcff;color: red;">4</th>';
                    } else {
                      echo '<th style="color: red;">4</th>';
                    }

                    if (date('l') == "Tuesday") {
                      echo '<th style="background-color: #e0fcff;color: red;">4</th>';
                    } else {
                      echo '<th style="color: red;">4</th>';
                    }

                    if (date('l') == "Wednesday") {
                      echo '<th style="background-color: #e0fcff;color: red;">4</th>';
                    } else {
                      echo '<th style="color: red;">4</th>';
                    }

                    if (date('l') == "Thursday") {
                      echo '<th style="background-color: #e0fcff;color: red;">4</th>';
                    } else {
                      echo '<th style="color: red;">4</th>';
                    }

                    if (date('l') == "Friday") {
                      echo '<th style="background-color: #e0fcff;color: red;">4</th>';
                    } else {
                      echo '<th style="color: red;">4</th>';
                    }

                    if (date('l') == "Saturday") {
                      echo '<th style="background-color: #e0fcff;color: red;">4</th>';
                    } else {
                      echo '<th style="color: red;">4</th>';
                    }

                    if (date('l') == "Sunday") {
                      echo '<th style="background-color: #e0fcff;color: red;">4</th>';
                    } else {
                      echo '<th style="color: red;">4</th>';
                    }

                    echo '</tr>';
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
