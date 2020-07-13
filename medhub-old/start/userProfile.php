<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$county = $_POST['county'];
$gp = $_POST['gp'];
$refer = $_POST['refer'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

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
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
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
              <a href="">
                <p class="text-primary my-auto">
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
            <li class="nav-item dropdown no-arrow mx-1">
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
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
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
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
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
            <h1 class="display-4 ml-3">Your info</h1>

          </div>

          <div class="row">
            <div class="col-xs-4 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                  <div class="card shadow">
                    <div class="card-header">
                      <h4 class="card-title font-weight-bold my-auto">Biometrics</h4>
                    </div>
                    <div class="card-body">
                      <div class="row mb-3">
                        <div class="col-12">
                      <div class="card bg-light">
                        <div class="row my-1">

                          <div class="col-lg-4 col-md-12 col-sm-12 my-auto">
                            <div class="d-flex justify-content-center border-bottom-item">
                              <div class="p-1 my-auto">
                              <span class="fa-stack fa-md mr-1">
                                <i class="fa fa-circle text-orange fa-stack-2x icon-background"></i>
                                <i class="fa fa-fire text-white fa-stack-1x"></i>
                              </span>
                            </div>
                            <div class="p-1 my-auto">
                            <h4 class="font-weight-bold text-orange my-auto">Activity</h4>
                          </div>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12 border-left-item my-auto">
                          <div class="d-flex justify-content-center border-bottom-item">
                            <div class="p-1 my-auto">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle text-white fa-stack-2x icon-background"></i>
                              <i class="fa fa-running text-orange fa-stack-1x"></i>
                            </span>
                          </div>
                          <div class="p-1 my-auto">
                          <h4 class="font-weight-bold text-dark my-auto">15,432
                          <span class="small text-secondary">steps</span></h4>
                        </div>
                      </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12 border-left-item my-auto">
                          <div class="d-flex justify-content-center">
                            <div class="p-1 my-auto">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle text-white fa-stack-2x icon-background"></i>
                              <i class="fa fa-weight text-orange fa-stack-1x"></i>
                            </span>
                          </div>
                          <div class="p-1 my-auto">
                          <h4 class="font-weight-bold text-dark my-auto">82.3
                          <span class="small text-secondary mt-auto ml-1">kgs</span></h4>
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
                          <p class="card-text font-weight-bold">Steps</p>
                          <div class="chart-container">
                    <canvas id="line-chart"></canvas>
                  </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <p class="card-text font-weight-bold">Blood Pressure</p>
              <canvas id="line-chart1" style="height:100%"></canvas>
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
                  <div class="d-flex justify-content-center border-bottom-item">
                    <div class="p-1 my-auto">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle text-white fa-stack-2x icon-background"></i>
                      <i class="fa fa-tint text-orange fa-stack-1x"></i>
                    </span>
                  </div>
                  <div class="p-1 my-auto">
                  <h4 class="font-weight-bold text-dark my-auto">120/80
                  <span class="small text-secondary">mg</span></h4>
                </div>
              </div>
                </div>

              <div class="col-lg-4 col-md-12 col-sm-12 my-auto">
                <div class="d-flex justify-content-center border-left-item border-bottom-item">
                  <div class="p-1 my-auto">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle text-white fa-stack-2x icon-background"></i>
                    <i class="fa fa-heartbeat text-orange fa-stack-1x"></i>
                  </span>
                </div>
                <div class="p-1 my-auto">
                <h4 class="font-weight-bold text-dark my-auto">87
                <span class="small text-secondary">BPM</span></h4>
              </div>
            </div>
              </div>

            <div class="col-lg-4 col-md-12 col-sm-12 border-left-item my-auto">
              <div class="d-flex justify-content-center">
                <div class="p-1 my-auto">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle text-white fa-stack-2x icon-background"></i>
                  <i class="fa fa-arrows-alt-v text-orange fa-stack-1x"></i>
                </span>
              </div>
              <div class="p-1 my-auto">
              <h4 class="font-weight-bold text-dark my-auto">173
              <span class="small text-secondary">cm</span></h4>
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
            <div class="col-xs-8 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">

          <!-- majority of stuff happens here-->
          <div class="row">

            <!-- end left hand column -->

            <!-- center column -->
            <div class="col">

              <!-- first item -->
            <div class="card shadow mb-3">
              <div class="card-header d-flex justify-content-between">
                <h5 class="card-title font-weight-bold mb-0 my-auto">Basic Info</h5>
              </div>
              <div class="card-body">
                <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 mb-3">
              <form class="row" method="post" action="">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">First Name</label>
                        <input class="form-control" type="text" id="account-fn" value="Brian" name="firstName" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-ln">Last Name</label>
                        <input class="form-control" type="text" id="account-ln" value="Kelleher" name="lastName" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">E-mail Address</label>
                        <input class="form-control" type="email" id="account-email" value="briankelleher38@gmail.com" name="email" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-phone">Phone Number</label>
                        <input class="form-control" type="text" id="account-phone" value="+353 86 849 0405" name="phone" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-pass">New Password</label>
                        <input class="form-control" type="password" id="account-pass" name="password">
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

          <div class="col-xs-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card-header">
              Access
            </div>
            <ul class="list-group">
              <li class="list-group-item">Santry
                <span class="float-right">
                <i class="fas fa-ban fa-fw text-danger"></i>
              </span>
              </li>
              <li class="list-group-item">Neurospine
                <span class="float-right">
                <i class="fas fa-ban fa-fw text-danger"></i>
                </span>
              </li>
              <li class="list-group-item text-center">
                <a href="" class="text-success">
                Add new
                <i class="fas fa-plus ml-1"></i>
                </a>
              </li>

            </ul>
          </div>
        </div>

          </div>
          <!-- Content Row -->
          <!-- Content Row -->
        </div>

        <div class="card shadow mb-3">
          <div class="card-header d-flex justify-content-between">
            <h5 class="card-title font-weight-bold mb-0 my-auto">Address Info</h5>
          </div>
          <div class="card-body">
            <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 mb-3">
          <form class="row" method="post" action="">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="account-fn">Address 1</label>
                    <input class="form-control" type="text" id="account-fn" name="address1" value="38 Abington" required="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="account-ln">Address 2</label>
                    <input class="form-control" type="text" id="account-ln" name="address2" value="Malahide" required="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inlineFormCustomSelectPref">County</label>
                    <select name="county" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                      <option>Choose county</option>
                      <option value="Antrim">Antrim</option>
                      <option value="Armagh">Armagh</option>
                      <option value="Carlow">Carlow</option>
                      <option value="Clare">Clare</option>
                      <option value="Cork">Cork</option>
                      <option value="Derry">Derry</option>
                      <option value="Donegal">Donegal</option>
                      <option value="Down">Down</option>
                      <option selected value="Dublin">Dublin</option>
                      <option value="Fermanagh">Fermanagh</option>
                      <option value="Galway">Galway</option>
                      <option value="Kerry">Kerry</option>
                      <option value="Kildare">Kildare</option>
                      <option value="Kilkenny">Kilkenny</option>
                      <option value="Laois">Laois</option>
                      <option value="Leitrim">Leitrim</option>
                      <option value="Limerick">Limerick</option>
                      <option value="Longford">Longford</option>
                      <option value="Louth">Louth</option>
                      <option value="Mayo">Mayo</option>
                      <option value="Meath">Meath</option>
                      <option value="Monaghan">Monaghan</option>
                      <option value="Offaly">Offaly</option>
                      <option value="Roscommon">Roscommon</option>
                      <option value="Sligo">Sligo</option>
                      <option value="Tipperary">Tipperary</option>
                      <option value="Tyrone">Tyrone</option>
                      <option value="Waterford">Waterford</option>
                      <option value="Westmeath">Westmeath</option>
                      <option value="Wexford">Wexford</option>
                      <option value="Wicklow">Wicklow</option>
                    </select>
                </div>
            </div>

            <div class="col-12">
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <button class="btn btn-style-1 btn-primary" type="submit" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
                </div>
            </div>
        </form>
      </div>

      <div class="col-xs-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card-header">
          Access
        </div>
        <ul class="list-group">
          <li class="list-group-item">Santry
            <span class="float-right">
            <i class="fas fa-ban fa-fw text-danger"></i>
          </span>
          </li>
          <li class="list-group-item">Neurospine
            <span class="float-right">
            <i class="fas fa-ban fa-fw text-danger"></i>
            </span>
          </li>
          <li class="list-group-item text-center">
            <a href="" class="text-success">
            Add new
            <i class="fas fa-plus ml-1"></i>
            </a>
          </li>

        </ul>
      </div>
    </div>
      </div>
      <!-- Content Row -->
      <!-- Content Row -->
    </div>
        <!-- /.container-fluid -->

        <div class="card shadow mb-3">
          <div class="card-header d-flex justify-content-between">
            <h5 class="card-title font-weight-bold mb-0 my-auto">Doctor Info</h5>
          </div>
          <div class="card-body">
            <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 mb-3">

          <form class="row" method="post" action="">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="account-fn">GP</label>
                    <input class="form-control" type="text" id="account-fn" name="gp" value="Aogon Rooney" required="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="account-ln">Referring Doctor</label>
                    <input class="form-control" type="text" id="account-ln" name="refer" value="N/A" required="">
                </div>
            </div>

            <div class="col-12">
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <button class="btn btn-style-1 btn-primary" type="submit" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
                </div>
            </div>
        </form>
      </div>

      <div class="col-xs-3 col-lg-3 col-md-12 col-sm-12 col-12t">
        <div class="card-header">
          Access
        </div>
        <ul class="list-group">
          <li class="list-group-item">Santry
            <span class="float-right">
            <i class="fas fa-ban fa-fw text-danger"></i>
          </span>
          </li>
          <li class="list-group-item">Neurospine
            <span class="float-right">
            <i class="fas fa-ban fa-fw text-danger"></i>
            </span>
          </li>
          <li class="list-group-item text-center">
            <a href="" class="text-success">
            Add new
            <i class="fas fa-plus ml-1"></i>
            </a>
          </li>

        </ul>
      </div>
    </div>
      </div>
      <!-- Content Row -->
      <!-- Content Row -->
    </div>

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


<div class="card shadow mb-3">
  <div class="card-header d-flex justify-content-between">
    <h5 class="card-title font-weight-bold mb-0 my-auto">Bloods</h5>
  </div>
  <div class="card-body">
    <div class="row">
    <div class="col-lg-9 col-md-12 col-sm-12 mb-3">

  <form class="row mb-3">
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
</form>
</div>

<div class="col-xs-3 col-lg-3 col-md-12 col-sm-12 col-12t">
<div class="card-header">
  Access
</div>
<ul class="list-group">
  <li class="list-group-item">Santry
    <span class="float-right">
    <i class="fas fa-ban fa-fw text-danger"></i>
  </span>
  </li>
  <li class="list-group-item">Neurospine
    <span class="float-right">
    <i class="fas fa-ban fa-fw text-danger"></i>
    </span>
  </li>
  <li class="list-group-item text-center">
    <a href="" class="text-success">
    Add new
    <i class="fas fa-plus ml-1"></i>
    </a>
  </li>

</ul>
</div>
</div>
</div>
<!-- Content Row -->
<!-- Content Row -->
</div>

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
