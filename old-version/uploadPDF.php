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

$sql = "SELECT id, name, dob FROM `" . $_COOKIE['email'] . "`;";
$result = $conn->query($sql);

$conn->close();

if (isset($_POST['submit1'])){
  $files = array_filter($_FILES['upload']['name']); //something like that to be used before processing files.

  // Count # of uploaded files in array
  $total = count($_FILES['upload']['name']);

  // Loop through each file
  for( $i=0 ; $i < $total ; $i++ ) {

    //Get the temp file path
    $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

    //Make sure we have a file path
    if ($tmpFilePath != ""){
      //Setup our new file path
      $newFilePath = '../uploads/'.$_COOKIE['email'].'/PDF/'.$_FILES['upload']['name'][$i];

      //Upload the file into the temp dir
      if(move_uploaded_file($tmpFilePath, $newFilePath)) {

        //Handle other code here

      }
    }
  }
  // Check if the files are single files or multiple files within one file
  if(isset($_POST['single']) && $_POST['single'] == 'single'){
    $checkbox = "single";
  } else {
    $checkbox = "multi";
  }

  // Get the template the user wants
  $template = $_POST['templates'];

  // Create a text file for fullOCR.py to access
  $command = "echo ". $_COOKIE['email'] . " " . $checkbox . " " . $template . " > ../uploads/email.txt";

  // Execute the command
  $outPut = shell_exec($command);
} else if (isset($_POST['submit2'])) {
  $files = array_filter($_FILES['upload']['name']); //something like that to be used before processing files.

  // Count # of uploaded files in array
  $total = count($_FILES['upload']['name']);

  // Loop through each file
  for( $i=0 ; $i < $total ; $i++ ) {

    //Get the temp file path
    $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

    //Make sure we have a file path
    if ($tmpFilePath != ""){
      //Setup our new file path
      $newFilePath = '../uploads/'.$_COOKIE['email'].'/PDF_finished/'.$_FILES['upload']['name'][$i];
      $fileName = $_FILES['upload']['name'][$i];
      //Upload the file into the temp dir
      if(move_uploaded_file($tmpFilePath, $newFilePath)) {

        //Handle other code here

      }
    }
  }
  $email = $_COOKIE['email'];
  $reportTitle = $_POST['reportTitle'];
  $reportDate = $_POST['reportDate'];

  $value = $_POST['nameList'];
  foreach ($value as $v){
    $valueList = explode(" ", $v);
  }


  $counting = 0;
  foreach ($valueList as $insert) {
    if ($counting == 0) {
      $name .= $insert . ' ';
      $counting += 1;
    } else if ($counting == 1) {
      $name .= $insert;
      $counting += 1;
    } else {
      $dob = $insert;
    }
  }



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

  // If there is no account, insert user data into userData table
  $sqlInsert = "INSERT INTO Users (name, dob, report, date, filename, email) VALUES ('". $name."', '". $dob . "', '" . $reportTitle . "', '" . $reportDate . "', '" . $fileName ."', '" . $email . "')";


    if ($conn->query($sqlInsert) === TRUE) {

  } else {
      echo "Error updating record: " . $conn->error;
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

  <title>Smart Scanner</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
    #myInput {
    background-repeat: no-repeat; /* Do not repeat the icon image */

    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
  }

  #myUL {
    /* Remove default list styling */
    list-style-type: none;
    padding: 0;
    margin: 0;
  }


  #listDiv ul{height:200px;}
  #listDiv ul{overflow:hidden; overflow-y:scroll;}

  #myUL li span {
    border: 1px solid #ddd; /* Add a border to all links */
    margin-top: -1px; /* Prevent double borders */
    background-color: #f6f6f6; /* Grey background color */
    padding: 12px; /* Add some padding */
    text-decoration: none; /* Remove default text underline */
    font-size: 18px; /* Increase the font-size */
    color: black; /* Add a black text color */
    display: block; /* Make it into a block element to fill the whole list */
  }

  #myUL li span:hover:not(.header) {
    background-color: #eee; /* Add a hover effect to all links, except for headers */
  }

  </style>
  <script>
  function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
      span = li[i].getElementsByTagName("span")[0];
      txtValue = span.textContent || span.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }

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
      <li class="nav-item active">
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
          <h1 class="h3 mb-4 text-gray-800">Upload Files</h1>

          <!-- Card -->
          <div class="row">

            <!-- Left hand side -->
            <div class="col-sm-6">

              <!-- Start card info -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Sort your files using AI!</h6>
                </div>
                <div class="card-body">
                  <form name="form" method="post" action="" enctype="multipart/form-data">

                  <div class="form-group">
              			<div class="row">
              				<div class="col-md-12">
                      <input name="upload[]" type="file" multiple="multiple" />
                    </div>
              			</div>
                  </div>


                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="single" name="single" value="single">
                    <label class="form-check-label" for="single">Each document has its own file</label>
                  </div>

                  <!-- Material checked -->
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="multi" name="multi">
                    <label class="form-check-label" for="materialChecked">There are multiple documents within each file</label>
                  </div>

                  <hr>

                  <div class="form-group">
                       <div class="row">
                       <div class="col-md-12">
                         <select name="templates" class="browser-default custom-select">
                           <option selected>Select Template</option>
                           <option name="SSC" value="SSC">SSC xray/CT</option>
                           <option name="Hermitage" value="Hermitage">Hermitage xray/CT</option>
                           <option name="Netflix" value="Netflix">Netflix Invoice</option>
                         </select>
                       </div>
                        </div>
                      </div>

                       <div class="form-group text-center">
                         <button type="submit" name="submit1" value="submit1" class="btn btn-success btn-lg">Upload</button>
                       </div>
                     </form>
                </div>
              </div>
            </div>



            <div class="col-sm-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Upload files manually</h6>
                </div>
                <div class="card-body">
                    <form name="form" method="post" action="" enctype="multipart/form-data">
                  <div class="container">

                      <div class="form-group">
                  			<div class="row">
                  				<div class="col-md-12">
                          <input name="upload[]" type="file" multiple="multiple" />
                        </div>
                  			</div>
                      </div>

                      <div class="form-group">
                  			<div class="row">
                  				<div class="col-md-12">
                          <label for="reportTitle">Report Title:</label>
                          <input name="reportTitle" id="reportTitle" type="text" class="form-control"/>
                        </div>
                  			</div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                          <label for="report">Report Date: (format DD-MM-YYYY)</label>
                          <input name="reportDate" id="report" type="text" class="form-control"/>
                        </div>
                        </div>
                      </div>

                      <div class="form-group col-md-12">
                    <div class="row">
                      <label for="selectName">Select person:</label>
                  <input type="text" id="myInput" class="rounded form-control" onkeyup="myFunction()" placeholder="Search for names..">
                  </div>
                  <div id="listDiv">
                  <ul id="myUL">
                    <?php
                    $counter = 0;
                    foreach ($result as $r){
                      echo '
                      <div class="row">
                      <li style="width:100%"><span>'.$r['name'].'  -   '.$r['dob'].'
                      <input type="checkbox" name="nameList[]" value="' . $r['name'] . ' ' . $r['dob'] . '">
                      <input type="hidden" name="name" value="' . $r['name'] . '"></span>
                      </li>
                      </div>';
                    }
                     ?>

                  </ul>
                </div>
                <br>
                <div class="form-group text-center">
                  <button type="submit" name="submit2" value="submit2" class="btn btn-success btn-lg">Upload</button>
                </div>
              </div>

                <div class="row">

                  </div>
                  </form>

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

</body>

</html>
