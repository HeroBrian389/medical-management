<?php
if (isset($_POST['submit'])){
  $firstName = $_POST['first_name'];
  $lastName = $_POST['last_name'];
  $email = $_POST['email'];
  $password1 = $_POST['password'];

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

  // See if any data exists on the user
  $sql = "SELECT firstName FROM userData WHERE email LIKE '". $email."';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
          echo 'You already have an account<br><a href="login.php">Login here!<?a/>';
      } else {
        // If there is no account, insert user data into userData table
        $sqlInsert = "INSERT INTO userData (firstName, lastName, email, userPassword) VALUES ('". $firstName."', '". $lastName . "', '" . $email . "', '" . $password1 . "')";

        // create cookies for the email address to access later
          $cookie_name = 'email';
          $cookie_value = $email;
          setcookie($cookie_name, $cookie_value, time() + 86400, "/"); // 86400 = 1 day

          if ($conn->query($sqlInsert) === TRUE) {

        } else {
            echo "Error updating record: " . $conn->error;
        }
        $command = "mkdir ../uploads/".$email."; mkdir ../uploads/".$email."/T/ ; mkdir ../uploads/".$email."/T_finished/ ; mkdir ../uploads/".$email."/PDF/ ; mkdir ../uploads/".$email."/PDF_finished/ ;";
        exec($command);


        // See if any data exists on the user
        $sqlCreate = "CREATE TABLE `". $email."` (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL, dob VARCHAR(255), address VARCHAR(255), gp VARCHAR(255), phone VARCHAR(255), email VARCHAR(255));";
        if ($conn->query($sqlCreate) === TRUE) {
          header('Location: index.php');
          exit;
        }
      }

  $conn->close();
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

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.html">Smart Scanner</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
      </li>

    </ul>

  </div>
  </nav>
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form action="" method="post" class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="first_name" type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First name">
                  </div>
                  <div class="col-sm-6">
                    <input name="last_name" type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Last name">
                  </div>
                </div>
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  </div>
                </div>
                <button value="submit" name="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
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

</body>

</html>
