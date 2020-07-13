<?php
$servername = "localhost";
$username = "root";
$password = "Mintylucky9";
$dbname = "medhub";

$emailCookie = $_COOKIE['hospitalEmail'];
$practiceName = $_COOKIE['practiceName'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM userData;";
$tagList = $conn->query($sql);

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

  $reportTitle = $_POST['reportTitle'];
  $reportDate = $_POST['reportDate'];

  $value = $_POST['nameList'];
  foreach ($value as $v){
    $valueList = explode(" ", $v);
  }


  $accessString = '';

  $access = $_POST['tagAccess'];
  $accessList = explode(",",$access);
  foreach ($accessList as $list) {
    $a = explode('"', $list);
    $nameDob = $a[3];
    $n = explode(" ", $nameDob);
    $accessString .= "'" .$n[3] . "', ";
  }
  echo $accessString;

  $servername = "localhost";
  $username = "root";
  $password = "Mintylucky9";
  $dbname = "medhub";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $uploadHospital = $firstNameCookie . ' ' . $lastNameCookie;
  echo $uploadHospital;


  // If there is no account, insert user data into userData table
  $sqlInsert = "INSERT INTO REPORTS (name, dob, email, access, title, date, filename, uploadDate, uploadTime, uploadHospital, type) VALUES ()";


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

#myInput {
background-repeat: no-repeat; /* Do not repeat the icon image */
border: 1px solid #ddd; /* Add a grey border */
}

#myUL {
/* Remove default list styling */
list-style-type: none;
padding: 0;
margin: 0;
}

.customSuggestionsList > div{
  max-height: 300px;
  border: 2px solid pink;
  overflow: auto;
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
            <a class="collapse-item" href="">Your reports</a>
            <a class="collapse-item" href="">Hospital reports</a>
            <a class="collapse-item" href="">Tagged reports</a>
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
                <span class="mr-2 d-none d-lg-inline btn btn-primary"><?php echo $practiceName;?></span>
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

          <h1 class="h3 mb-4 text-gray-800">Upload Files</h1>


          <!-- majority of stuff happens here-->
          <div class="row">

            <!-- Left hand side -->
            <div class="col-sm-12">

              <!-- Start card info -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="card-title font-weight-bold my-auto">Upload files using AI</h4>
                </div>
                <div class="card-body">
                  <form name="form" method="post" action="" enctype="multipart/form-data">
                    <div class="container-fluid">

                    <div class="form-group">
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="myInput" aria-describedby="myInput">
                          <label class="custom-file-label" for="myInput">Choose file</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="radioGroup">Choose the way your files are formatted</label>
                    <div id="radioGroup" class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="customRadio" value="single" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1">Each document has its own file</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="customRadio" multi="multi" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2">All of the documents are in one large file</label>
                      </div>
                    </div>

                  <hr>

                       <div class="form-group text-center">
                         <button type="submit" name="submit1" value="submit1" class="btn btn-primary btn-lg">Upload</button>
                       </div>
                     </form>
                   </div>
                </div>
              </div>
            </div>
          </div>

        <div class="row">
            <div class="col-sm-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="card-title font-weight-bold my-auto">Upload Files Manually</h4>
                  </div>
                <div class="card-body">
                    <form name="form" method="post" action="" enctype="multipart/form-data">
                  <div class="container-fluid">

                    <div class="form-group">
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="myInput" aria-describedby="myInput">
                          <label class="custom-file-label" for="myInput">Choose file</label>
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
            <div class="form-group">
              <div class="row">
                <div class="col-12">
                <label for="reportTitle">Grant access:</label>
                <div class="">
                  <input name='tagAccess' id="tagInput">
              </div>
              </div>
            </div>
                <hr>
                <div class="form-group d-flex justify-content-around">
                  <button type="submit" name="submit2" value="submit2" class="btn btn-primary btn-lg">Upload</button>
                </div>
              </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


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

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <script>

/* show file value after file select */
document.querySelector('.custom-file-input').addEventListener('change',function(e){
  var fileName = document.getElementById("myInput").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})

var input = document.getElementById('tagInput'),
    // init Tagify script on the above inputs
    tagify = new Tagify(input, {
        whitelist : [
          <?php
          foreach ($tagList as $tag) {
            echo '"' . $tag['firstName'] . ' ' . $tag['lastName'] . ' ' . $tag['dob'] . ' ' . $tag['email'] . '",';
          }
          ?>
        ],
        dropdown: {
            position: "manual",
            maxItems: Infinity,
            enabled: 0,
            classname: "customSuggestionsList"
        },
        enforceWhitelist: true
    })

    tagify.on("dropdown:show", onSuggestionsListUpdate)
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
        tagify.dropdown.show.call(tagify) // load the list
        tagify.DOM.scope.parentNode.appendChild(tagify.DOM.dropdown)
    }


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
