<?php
if (isset($_POST['submit'])) {
  if (isset($_POST['name'])){
  $name = $_POST['name'];
}

shell_exec('mkdir scheduling/"' . $name . '"');
$destination = $name.'/';

  $email = $_POST['email'];
  $telephone = $_POST['telephone'];

  // Download files
  $files = array_filter($_FILES['referral']['name']); //something like that to be used before processing files.

  // Count # of uploaded files in array
  $total = count($_FILES['referral']['name']);

  // Loop through each file
  for( $i=0 ; $i < $total ; $i++ ) {

    //Get the temp file path
    $tmpFilePath = $_FILES['referral']['tmp_name'][$i];

    //Make sure we have a file path
    if ($tmpFilePath != ""){
      //Setup our new file path
      $newFilePath = $destination . $_FILES['referral']['name'][$i];

      //Upload the file into the temp dir
      if(move_uploaded_file($tmpFilePath, $newFilePath)) {
      }
    }
  }

  // Download files
  $files = array_filter($_FILES['mri']['name']); //something like that to be used before processing files.

  // Count # of uploaded files in array
  $total = count($_FILES['mri']['name']);

  // Loop through each file
  for( $i=0 ; $i < $total ; $i++ ) {

    //Get the temp file path
    $tmpFilePath = $_FILES['mri']['tmp_name'][$i];

    //Make sure we have a file path
    if ($tmpFilePath != ""){
      //Setup our new file path
      $newFilePath = $destination . $_FILES['mri']['name'][$i];

      //Upload the file into the temp dir
      if(move_uploaded_file($tmpFilePath, $newFilePath)) {

      }
    }
  }



if (isset($_POST['customRadio1'])){
  $surgeon = $_POST['surgeons'];
  $type = 1;
} else if (isset($_POST['customRadio2'])){
  $type = 2;
  $surgeon = '';
} else {
  $type = 3;
  $surgeon = '';
}

$to = "briankelleher38@gmail.com";
$subject = "Appointment - " . $name;
$txt = "manage.php \n" . $name." - name \n" . $email . " - email \n" . $telephone . " - telephone \n" . $type . " - type of appointment \n" . $surgeon . " - surgeon of preferance";
$headers = "From: churchlane@neurospine.ie" . "\r\n";

mail($to,$subject,$txt,$headers);

// Current date and time
date_default_timezone_set('Europe/Dublin');
$date = date('d/m/Y');
$time = date('H:i:s');

$status = 'Unresolved';

$assigned = '';

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
// If there is no account, insert user data into userData table
$sqlInsert = "INSERT INTO appointments (name,email,telephone,type,surgeon,date,time,assigned,status) VALUES ('". $name."', '". $email . "', '" . $telephone . "', '" . $type . "', '" . $surgeon . "', '". $date . "', '". $time . "', '". $assigned . "', '". $status . "')";

// Upload the info to the database
if ($conn->query($sqlInsert) === TRUE) {

} else {
  echo "Error updating record: " . $conn->error; // Or print out an error
}

$conn->close();

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Neurospine</title>
        <link rel="icon" type="image/x-icon" href="scheduling/assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="scheduling/css/styles.css" rel="stylesheet" />

        <style>
        .hideClass {
          position: relative;
          overflow: hidden;
        }
        .hideInput {
          position: absolute;
          font-size: 50px;
          opacity: 0;
          right: 0;
          top: 0;
        }
        </style>

    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">
                  <img src="scheduling/assets/img/logos/neurospine.png" alt="" />
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  Menu
                  <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services"><span style="color: black;">Services</span></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#testimonials"><span style="color: black;">Testimonials</span></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about"><span style="color: black;">About</span></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team"><span style="color: black;">Team</span></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact"><span style="color: black;">Contact</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>



        <!-- Clients
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/envato.jpg" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/designmodo.jpg" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/themeforest.jpg" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/creative-market.jpg" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Make an appointment</h2>
                    <h3 class="section-subheading text-muted">Remeber to upload your MRI and referral letter if you have one.</h3>
                </div>
                <form action="" name="sentMessage" enctype="multipart/form-data" method="post">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                                <input class="form-control" id="email" name="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="phone" type="tel" name="telephone" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number." />
                                <p class="help-block text-danger"></p>
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-stretch mb-5">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <div style="height:auto" class="custom-file">
                              <input name="mri[]" type="file" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Upload MRI</label>
                            </div>
                              <p class="help-block text-danger"></p>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <div class="form-group">
                              <div style="height:auto" class="custom-file">
                                <input name="referral[]" type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Upload Referral</label>
                              </div>
                                <p class="help-block text-danger"></p>
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="row align-items-stretch mb-5">
                        <div class="col-sm-4">
                            <div class="form-group">
                              <div class="card">
                                <div class="card-body">
                                  <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="customRadio1" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1"><span style="color: black;">Appointment with surgeon of choice:</span></label>
                                  </div>
                                  <select name="surgeons" class="custom-select">
                                    <option selected>Select surgeon</option>
                                    <option value="mk">Michael Kelleher - estimated wait time: 88 days</option>
                                    <option value="ef">Eoin Fenton - estimated wait time: 42 days</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                              <div class="card">
                                <div class="card-body">
                                  <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="customRadio2" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2"><span style="color: black;"></span>Fastest appointment possible with any surgeon.</label>
                                  </div>

                                </div>
                              </div>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                              <div class="card">
                                <div class="card-body">
                                  <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio3" name="customRadio3" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio3"><span style="color: black;">Soonest cancellation.</span></label>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success btn-xl text-uppercase" name="submit" type="submit">Make appointment</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © Neurospine.ie 2020</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a><a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a><a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right"><a class="mr-3" href="#!">Privacy Policy</a><a href="#!">Terms of Use</a></div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals--><!-- Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/01-full.jpg" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Threads</li>
                                        <li>Category: Illustration</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fas fa-times mr-1"></i>Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 2-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/02-full.jpg" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Explore</li>
                                        <li>Category: Graphic Design</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fas fa-times mr-1"></i>Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 3-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/03-full.jpg" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Finish</li>
                                        <li>Category: Identity</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fas fa-times mr-1"></i>Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 4-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/04-full.jpg" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Lines</li>
                                        <li>Category: Branding</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fas fa-times mr-1"></i>Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 5-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/05-full.jpg" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Southwest</li>
                                        <li>Category: Website Design</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fas fa-times mr-1"></i>Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 6-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/06-full.jpg" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Window</li>
                                        <li>Category: Photography</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fas fa-times mr-1"></i>Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        </script>
    </body>
</html>
