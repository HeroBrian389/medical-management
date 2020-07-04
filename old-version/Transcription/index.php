<?php
$target_dir = "";
$target_file = $target_dir . "audio.m4a";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $success = True;
  } else {
    $sucess = False;
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

  <title>BCE</title>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

  <!-- Custom fonts for this template
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">



</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div style="padding-top: 80px" id="content">


        <!-- Begin Page Content -->
        <div class="container">


          <!-- Content Row -->
          <div class="row">
            <div class="col-xl-5 col-sm-12">

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Drop audio file</h6>
              </div>
              <div class="card-body">
                <div class="signup-form">

                    <form action="" name="form" enctype="multipart/form-data" method="post">
                		      <div class="form-group text-center">
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <button name="submit" type="submit" class="btn btn-primary btn-lg">Upload!</button>
                            <?php
                            if (isset($_POST['submit'])) {
                              echo "<hr>";
                              if ($success == True) {
                                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                              } else {
                                echo "Sorry, there was an error uploading your file.";
                              }
                            }
                             ?>
                        </div>
                    </form>
                </div>

              </div>
            </div>
          </div>

          <div class="col-xl-2 col-sm-12">
            <img class="card-img-top" src="arrow.svg"/>
          </div>

            <div class="col-xl-5 col-sm-12">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Word document</h6>
                </div>
                <div class="card-body">
                  <p>Download your word document <a href="demo.docx" download>here</a></p>
                  <p class="mb-0"></p>
                </div>
              </div>
          </div>

          </div>

          <!-- Content Row -->


            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->


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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>


</body>

</html>
