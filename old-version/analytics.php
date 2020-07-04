<?php
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

if (isset($_POST['month'])){
  if ($_POST['month'] != '') {
    $inputMonth = $_POST['month'];
  } else {
    $inputMonth = date('n');
  }
} else {
  $inputMonth = date('n');
}

if ($inputMonth < 10) {
  $inputMonth1 = '0'.$inputMonth;
} else {
  $inputMonth1 = $inputMonth;
}

$inputYear = "2020";

/// get max number of days in the month
$maxDays = cal_days_in_month(CAL_GREGORIAN, $inputMonth, $inputYear);


for ($currentDate = 1; $currentDate <= $maxDays; $currentDate++) {
  if ($currentDate < 10) {
    $currentDate = '0' . $currentDate;
  }
  $sql = "SELECT * FROM calendar WHERE email='" . $_COOKIE['email'] . "' AND date='" . $currentDate . "-" . $inputMonth1 . "-" . $inputYear . "';";

  ${"result$currentDate"} = $conn->query($sql);
}

$conn->close();


$dbname = "scan_doc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$d_array = array('1'=>31, '2'=>28, '3'=>31, '4'=>30, '5'=>31, '6'=>30, '7'=>31, '8'=>31, '9'=>30, '10'=>31, '11'=>30, '12'=>31);

if (isset($_POST['monthStartPDF']) and isset($_POST['monthEndPDF'])) {
  if ($_POST['monthStartPDF'] != '') {
    $inputMonthStart = $_POST['monthStartPDF'];
    $inputMonthEnd = $_POST['monthEndPDF'];
  } else {
    $inputMonthStart = date('n') -1;
    $inputMonthEnd = date('n');
  }
} else {
  $inputMonthStart = date('n') -1;
  $inputMonthEnd = date('n');
}

if ($inputMonthStart < 10){
  $inputMonthStart1 = '0' . $inputMonthStart;
} else {
  $inputMonthStart1 = $inputMonthStart;
}

if ($inputMonthEnd < 10) {
  $inputMonthEnd1 = '0' . $inputMonthEnd;
} else {
  $inputMonthEnd1 = $inputMonthEnd;
}

$inputYear = "2020";

$monthRange = $inputMonthEnd - $inputMonthStart;

for ($monthNum = $inputMonthStart; $monthNum <= $inputMonthEnd; $monthNum++) {
  if ($monthNum < 10) {
    $monthNumInsert = '0'.$monthNum;
  }
  for ($currentDate = 1; $currentDate <= $d_array[$monthNum]; $currentDate++) {
    if ($currentDate < 10) {
      $currentDate = '0' . $currentDate;
    }

    $sql = "SELECT * FROM Users WHERE email='" . $_COOKIE['email'] . "' AND date='" . $currentDate . "-" . $monthNumInsert . "-" . $inputYear . "';";

    ${"resultPDF$currentDate$monthNumInsert"} = $conn->query($sql);
    //echo $currentDate.'-'.$monthNum.'<br>';
  }
}
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

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</script>
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
      <li class="nav-item active">
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

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Analytics</h1>

          <!-- Card -->
          <div class="row">

            <!-- Left hand side -->

            <div class="col-sm-12 col-md-12 col-xl-6">

              <!-- Start card info -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <form action="" method="post">
                  <div class="row">
                  <div class="col-sm-6 my-auto">
                  <h6 class="m-0 font-weight-bold text-primary">Number of appointments</h6>
                </div>
                <div class="col-sm-4">
                  <input class="form-control" type="text" name="month" placeholder="Month"/>
                </div>
                <div class="col-sm-2">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-search"> </i></button>
                </div>
              </div>
            </form>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                  <canvas height="410px" id="myAreaChart"></canvas>
                </div>
              </div>
                </div>
              </div>
            </div>


            <!-- Right hand side -->
            <div class="col-sm-12 col-md-12 col-xl-6">

              <!-- Start card info -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <form action="" method="post">
                  <div class="row">
                  <div class="col-sm-6 my-auto">
                  <h6 class="m-0 font-weight-bold text-primary">Breakdown of appointments</h6>
                </div>
                <div class="col-sm-4">
                  <input class="form-control" type="text" name="month" placeholder="Month"/>
                </div>
                <div class="col-sm-2">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-search"> </i></button>
                </div>
              </div>
            </form>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                  <canvas height="410px" id="bar-chart"></canvas>
                </div>
              </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12">

              <!-- Start card info -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <form action="" method="post">
                  <div class="row">
                  <div class="col-sm-4 my-auto">
                  <h6 class="m-0 font-weight-bold text-primary">Number of reports</h6>
                </div>
                <div class="col-sm-3">
                  <input class="form-control" type="text" name="monthStartPDF" placeholder="Start Month"/>
                </div>
                <div class="col-sm-3">
                  <input class="form-control" type="text" name="monthEndPDF" placeholder="End Month"/>
                </div>
                <div class="col-sm-2">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-search"> </i></button>
                </div>
              </div>
            </form>
                </div>
                <div class="card-body">
                  <canvas height="410px" id="myAreaChart1"></canvas>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [
      <?php
      for ($dayCount = 1; $dayCount <= $maxDays; $dayCount += 1) {
        echo '"' . $dayCount . '-' . $inputMonth . '-' . $inputYear . '",';
      }
       ?>
    ],
    datasets: [{
      label: "Appointments",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [
        <?php
        for ($i = 1; $i < $maxDays; $i++) {
          if ($i < 10) {
            $i = '0'.$i;
          }
          $counter = 0;
          foreach (${"result$i"} as $res) {
            $counter += 1;
          }
          echo $counter.',';
        }
         ?>
      ],
    },
    {
      data: [
        <?php
        for ($i = 1; $i < $maxDays; $i++) {
          if ($i < 10) {
            $i = '0'.$i;
          }
          $counter = 0;
          foreach (${"result$i"} as $res) {
            if ($res['type'] == "consultation") {
              $counter += 1;
            }
          }
          echo $counter.',';
        }
         ?>
      ],
      label: "Consultation",
      borderColor: "#8e5ea2",
      fill: false
    },
    {
      data: [
        <?php
        for ($i = 1; $i < $maxDays; $i++) {
          if ($i < 10) {
            $i = '0'.$i;
          }
          $counter = 0;
          foreach (${"result$i"} as $res) {
            if ($res['type'] == "physio") {
              $counter += 1;
            }
          }
          echo $counter.',';
        }
         ?>
      ],
      label: "Physio",
      borderColor: "#00ffff",
      fill: false
    },
    {
      data: [
        <?php
        for ($i = 1; $i < $maxDays; $i++) {
          if ($i < 10) {
            $i = '0'.$i;
          }
          $counter = 0;
          foreach (${"result$i"} as $res) {
            if ($res['type'] == "surgery") {
              $counter += 1;
            }
          }
          echo $counter.',';
        }
         ?>
      ],
      label: "Surgery",
      borderColor: "#ccff99",
      fill: false
    },
  ],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});


// Area Chart Example
var ctx = document.getElementById("myAreaChart1");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [
      <?php

      for ($monthNum = $inputMonthStart; $monthNum <= $inputMonthEnd; $monthNum++) {
        if ($monthNum < 10) {
          $monthNumInsert = '0'.$monthNum;
        }
        for ($currentDate = 1; $currentDate <= $d_array[$monthNum]; $currentDate++) {
          if ($currentDate < 10) {
            $currentDate = '0' . $currentDate;
          }
          echo '"' . $currentDate . '-' . $monthNumInsert . '-' . $inputYear . '",';
        }
      }
       ?>
    ],
    datasets: [{
      label: "PDF's scanned",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [
        <?php
        for ($monthNum1 = $inputMonthStart; $monthNum1 <= $inputMonthEnd; $monthNum1++) {
          if ($monthNum1 < 10) {
            $monthNumInsert1 = '0'.$monthNum1;
          } else {
            $monthNumInsert1 = $monthNum1;
          }
          for ($i = 1; $i < $d_array[$monthNum1]; $i++) {
            if ($i < 10) {
              $i = '0'.$i;
            }

            $counter = 0;

            foreach (${"resultPDF$i$monthNumInsert1"} as $res) {
              $counter += 1;
            }

            echo $counter.',';
          }
        }
         ?>
      ],
    },

  ],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});


// Bar chart
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Appointments", "Consultation", "Surgery", "Physio","New","Return"],
      datasets: [
        {
          label: "",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#ffff66"],
          data: [
            <?php
            for ($i = 1; $i < $maxDays; $i++) {
              if ($i < 10) {
                $i = '0'.$i;
              }
              foreach (${"result$i"} as $res) {
                $counterAppointments += 1;
                if ($res['type'] == "surgery") {
                  $counterSurgery += 1;
                } else if ($res['type'] == 'consultation') {
                  $counterConsultation += 1;
                } else if ($res['type'] == 'physio') {
                  $counterPhysio += 1;
                }

                if ($res['new'] == 1) {
                  $counterNew += 1;
                } else {
                  $counterReturn += 1;
                }
              }
            }
            echo $counterAppointments.','.$counterConsultation.','.$counterSurgery.','.$counterPhysio.','.$counterNew.','.$counterReturn;
             ?>
          ]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,

      scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    },
      legend: { display: false },
      title: {
        display: true,
        text: 'Number of appointments (07-2020)'
      }
    }
});
</script>

</body>

</html>
