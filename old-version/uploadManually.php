<?php
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
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Smart Scanner</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style type="text/css">
	body{
		color: #fff;
		background: #f4623a;
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 41px;
		background: #f2f2f2;
		box-shadow: none !important;
		border: none;
	}
	.form-control:focus{
		background: #e2e2e2;
	}
    .form-control, .btn{
        border-radius: 3px;
    }
	.signup-form{
		width: 390px;
		margin: 30px auto;
	}
	.signup-form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form h2 {
		color: #333;
		font-weight: bold;
        margin-top: 0;
    }
    .signup-form hr {
        margin: 0 -30px 20px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}
    .signup-form .btn{
        font-size: 16px;
        font-weight: bold;
		background: #3598dc;
		border: none;
		min-width: 140px;
    }
	.signup-form .btn:hover, .signup-form .btn:focus{
		background: #2389cd !important;
        outline: none;
	}
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
	.signup-form a:hover{
		text-decoration: none;
	}
	.signup-form a{
		color: #3598dc;
		text-decoration: none;
	}
	.signup-form a:hover{
		text-decoration: underline;
	}
    .signup-form .hint-text {
		padding-bottom: 15px;
		text-align: center;
    }


    #myProgress {
      width: 100%;
      background-color: #ddd;
    }

    #myBar {
      width: 1%;
      height: 30px;
      background-color: #4CAF50;
    }
    #content{
        display:none;
    }

</style>
</head>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="index.html">Smart Scanner</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="drop.php">Scan</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </li>
  </ul>
  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>
</nav>
<body>


  <div class="signup-form">

      <h2>Click to upload file!</h2>
  		<hr>
      <div class="form-group">

        <div id="myProgress">
          <div id="myBar"></div>
        </div>

        <br>
        <div class="form-group">
        <button onclick="move()">Upload now!</button>
      </div>
        <div class="form-group" id="content">
          <p color="black">Go to files <a color="black" href="../uploads/search.php"><span color="black">here!</span></a></p>
        </div>

      </div>
    </div>



<script>
function move() {
  var elem = document.getElementById("myBar");
  var width = 1;
  var id = setInterval(frame, 100);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
      document.getElementById('content').style.display='block';
    } else {
      width++;
      elem.style.width = width + '%';
    }
  }
}
</script>

</body>

</html>
