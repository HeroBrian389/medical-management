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
      <li class="nav-item active">
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
            <a class="collapse-item" href="hospital.php">Tagged reports</a>
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
            <a class="collapse-item" href="">Add hospitals</a>
            <a class="collapse-item" href="">Remove hospitals</a>
            <a class="collapse-item" href="">Edit permissions</a>
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
                <span class="mr-2 d-none d-lg-inline btn btn-primary"><?php echo $_COOKIE['practiceName']; ?></span>
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

          <div class="row search-main-div" style="display: none">
            <div class="col-12">
              <form class="my-2 my-md-3 w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control border-secondary small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <h1 class="display-4">Your Reports</h1>

          <!-- majority of stuff happens here-->
          <div class="row">

              <!-- first item -->


                  <?php
                  foreach ($result as $row) {
                    echo '
                    <div class="col middle-wrapper"><div class="row">
                    <div class="col">
                      <div class="card shadow mb-3">
                        <div class="card-header py-1">
                          <div class="d-flex row-flex justify-content-between my-0">
                            <span class="p-2 float-left my-auto">
                              <a href="">
                          <h4 class="card-title font-weight-bold my-auto">
                            <button class="btn btn-outline-primary" role="button">';
                            echo $row['uploadHospital'];
                            echo '</button>
                          </h4>
                        </a>
                            </span>
                            <div class="p-2 float-right my-auto extra-detail-div">
                              <p class="card-text mb-0">';
                              echo $row['uploadUser'];
                              echo '</p>
                        </div>

                        <div class="p-2 my-auto extra-detail-button no-arrow" style="display: none">
                          <button class="text-primary btn" href="#" id="searchDropdown1" role="button" onclick="myFunction3()">
                            <i class="fas fa-caret-down"></i>
                          </button>
                        </div>
                        </div>
                          <!-- Dropdown - Messages -->
                          <div style="display:none" id="moreInfo" class="text-right">
                            <div class="my-auto">
                              <p class="card-text mb-0">';
                              echo $row['uploadUser'];
                              echo '</p>
                          <p class="card-text mb-0">';
                          echo $row['uploadTime'];
                          echo '</p>
                        </div>
                          </div>
                        </div>
                          <div class="card-body pt-3">
                              <div class="d-flex row-flex justify-content-between">
                                <table class="table table-bordered">
                                  <tbody>
                                    <tr>
                                      <td class="bg-light text-center my-auto font-weight-bold">';
                                      if ($row['type'] =="MRI") {
                                        $color = "warning";
                                      } else {
                                        $color = "success";
                                      }
                                        echo '<i class="fas fa-circle text-' . $color . ' mr-2"></i>';
                                        echo $row['type'];
                                        echo '</td>
                                          <td class="text-center my-auto">';
                                          echo $row['title'];
                                          echo '</td>
                                            <td class="text-center my-auto">';
                                            echo $row['date'];
                                            echo '</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                      <div class="d-flex justify-content-around mb-3">
                                        <button class="btn btn-outline-primary">
                                          Send
                                        <i class="fas fa-envelope ml-1"></i>
                                      </button>
                                            <button class="btn btn-outline-primary">
                                              Message
                                            <i class="fas fa-paper-plane ml-1"></i>
                                          </button>
                                          <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#expandPDF">Show PDF
                                          <i class="fas fa-expand ml-1"></i></button>
                                      <button class="btn btn-sm btn-outline-primary">Download PDF<i class="fas fa-download fa-fw mx-1"></i>
                                    </div>
                                <div class="card-footer text-center">';
                                echo $row['uploadDate'] . ' - ' . $row['uploadTime'];
                                echo '</div>
                                </div>
                              </div>
                            </div>
                            </div>
                            </div>
                  <div class="col-4">
                    <div class="card shadow mb-3" id="pdfDiv3">
                      <div class="card-body">
                    <div class="embed-responsive embed-responsive-210by297" style="height: 200px">
                      <iframe class="embed-responsive-item" src="assets/Thomas Mcgurk.pdf#toolbar=0&zoom=Scale&navpanes=0" height="300px"></iframe>
                    </div>
                    <p class="card-text">Thomas McGurk</p>
                  </div>
                  </div>
                  </div>';
                  }
                  ?>

      </div>

      <div class="row">
        <div class="col-8">
          <div class="card shadow mb-3">
            <div class="card-header my-0 py-1">
              <div class="d-flex row-flex justify-content-between my-0">
                <span class="p-2 float-left my-auto ">
                  <a href="">
              <h4 class="card-title font-weight-bold my-auto">
                <button class="btn btn-outline-primary" role="button">
                  Neurospine
              </button>
            </h4>
          </a>
              </span>
              <div class="p-2 float-right my-auto extra-detail-div">
                <p class="card-text mb-0">
                  Majella Reilly
                </p>
          </div>
          <div class="p-2 my-auto extra-detail-div">
            <p class="card-text mb-0">
              30/06/2020 - 13:45
            </p>
          </div>

          <div class="p-2 my-auto extra-detail-button no-arrow" style="display: none">
            <button class="text-primary btn" href="#" id="searchDropdown1" role="button" onclick="myFunction3()">
              <i class="fas fa-caret-down"></i>
            </button>
          </div>
          </div>
            <!-- Dropdown - Messages -->
            <div style="display:none" id="moreInfo" class="text-right">
              <div class="my-auto">
                <p class="card-text mb-0">
                  Majella Reilly
                </p>
            <p class="card-text mb-0">
              30/06/2020 - 13:45
            </p>
          </div>
            </div>
          </div>


            <div class="card-body pt-3">
                <div class="d-flex row-flex justify-content-between">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td class="bg-light text-center my-auto font-weight-bold">
                          <i class="fas fa-circle text-danger mr-2"></i>Bloods
                      </td>
                        <td class="text-center my-auto">Blood results</td>
                        <td class="text-center my-auto">02/07/2020</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-around mb-3">
                  <button class="btn btn-outline-primary">
                    Grant Access
                  <i class="fas fa-lock ml-1"></i>
                </button>
                      <button class="btn btn-outline-primary">
                        Message
                      <i class="fas fa-paper-plane ml-1"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#expandPDF">Show PDF
                    <i class="fas fa-expand ml-1"></i></button>
                <button class="btn btn-sm btn-outline-primary">Download PDF<i class="fas fa-download fa-fw mx-1"></i></button>
              </div>
          <div class="card-footer text-center">
            02/07/2020 - 19:40
          </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card shadow mb-3" id="pdfDiv3">
          <div class="card-body">
        <div class="embed-responsive embed-responsive-210by297" style="height: 200px">
          <iframe class="embed-responsive-item" src="assets/Thomas Mcgurk.pdf#toolbar=0&zoom=Scale" height="300px"></iframe>
        </div>
        <p class="card-text">Thomas McGurk</p>
      </div>
      </div>
      </div>
    </div>

    <div class="row">
      <div class="col-8">
          <div class="card shadow mb-3">
            <div class="card-header my-0 py-1">
              <div class="d-flex row-flex justify-content-between my-0">
                <span class="p-2 float-left my-auto ">
                  <a href="">
              <h4 class="card-title font-weight-bold my-auto">
                <button class="btn btn-outline-primary" role="button">
                  Neurospine
              </button>
            </h4>
          </a>
              </span>
              <div class="p-2 float-right my-auto extra-detail-div">
                <p class="card-text mb-0">
                  Brian O'Keeffe
                </p>
          </div>
          <div class="p-2 my-auto extra-detail-div">
            <p class="card-text mb-0">
              26/06/2020 - 13:45
            </p>
          </div>

          <div class="p-2 my-auto extra-detail-button no-arrow" style="display: none">
            <button class="text-primary btn" href="#" id="searchDropdown1" role="button" onclick="myFunction3()">
              <i class="fas fa-caret-down"></i>
            </button>
          </div>
          </div>
            <!-- Dropdown - Messages -->
            <div style="display:none" id="moreInfo" class="text-right">
              <div class="my-auto">
                <p class="card-text mb-0">
                  Brian O'Keeffe
                </p>
            <p class="card-text mb-0">
              26/06/2020 - 13:45
            </p>
          </div>
            </div>
          </div>

            <div class="card-body pt-3">
                <div class="d-flex row-flex justify-content-between">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td class="bg-light text-center my-auto font-weight-bold">
                          <i class="fas fa-circle text-success mr-2"></i>Referral
                      </td>
                        <td class="text-center my-auto">David Moorhouse</td>
                        <td class="text-center my-auto">24/06/2020</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-around mb-3">
                  <button class="btn btn-outline-primary">
                    Grant Access
                  <i class="fas fa-lock ml-1"></i>
                </button>
                      <button class="btn btn-outline-primary">
                        Message
                      <i class="fas fa-paper-plane ml-1"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#expandPDF">Show PDF
                    <i class="fas fa-expand ml-1"></i></button>
                <button class="btn btn-sm btn-outline-primary">Download PDF<i class="fas fa-download fa-fw mx-1"></i>
              </div>
          <div class="card-footer text-center">
            29/06/2020 - 12:43
          </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card shadow mb-3" id="pdfDiv3">
          <div class="card-body">
        <div class="embed-responsive embed-responsive-210by297" style="height: 200px">
          <iframe class="embed-responsive-item" src="assets/Thomas Mcgurk.pdf#toolbar=0&zoom=Scale" height="300px"></iframe>
        </div>
        <p class="card-text">Thomas McGurk</p>
      </div>
      </div>
      </div>
    </div>
          </div>

          <!--
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 info-div">
              <div class="card shadow">
                <div class="card-header mb-0">
                  <div class="d-flex">
                  <h4 class="card-title font-weight-bold mb-0 p-2 mr-auto">Neurospine</h4>
                  <i class="fas fa-comment-alt ml-3 fa-2x my-auto p-2"></i>
                </div>
                </div>
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-lg-2 col-md-1 text-center">
                      <i class="fas text-primary fa-user"></i>
                    </div>
                    <div class="col-lg-7 col-md-7 border rounded py-2">
                      <span class="text-wrap">Hello. asj asdf asd fas dfas dfasdf</span>
                    </div>
                    <div class="col-lg-3 col-md-4"></div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-lg-3 col-md-4"></div>
                      <div class="col-lg-7 col-md-7 border rounded py-2">
                        <span class="text-wrap">Hello bsodjfasldj asdf askld fa asdjfa sldjf asdf ask dfkas jdf</span>
                      </div>
                      <div class="col-lg-2 col-md-1 text-center">
                        <i class="fas text-danger fa-user"></i>
                      </div>
                    </div>
                </div>
              </div>

            </div>-->
          </div>



          <!-- Content Row -->


            </div>
          </div>

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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal" id="expandPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="embed-responsive embed-responsive-210by297" style="height: 80vh">
          <iframe class="embed-responsive-item" src="assets/Thomas Mcgurk.pdf#toolbar=0&zoom=Scale&navpanes=0" height="90%"></iframe>
        </div>
      </div>
      <div class="modal-footer">
            <p class="card-text float-left">Thomas McGurk</p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Share</button>
      </div>
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
