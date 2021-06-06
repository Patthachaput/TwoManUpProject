<?php
  session_start();
  include('server.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Home - UpTogether</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <!-- ======= login ======= -->
    <div id="rl-page" class="rl-page d-flex justify-content-center align-items-center">
      <div class="col-sm-9 col-lg-5 alert alert-light" role="login" data-aos="zoom-in" data-aos-delay="100">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login" aria-selected="true">Login</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-register-tab" data-bs-toggle="pill" data-bs-target="#pills-register" type="button" role="tab" aria-controls="pills-register" aria-selected="false">Register</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="login tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
            <?php include 'login.php';?>
          </div>
          <div class="regis tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
            <?php include 'register.php';?>
          </div>
        </div>
        <p class="text-danger"><?php

        if(isset($_SESSION['error'])){
          $error = $_SESSION['error'];
          foreach ($error as $key => $value) {
            echo $value;
            echo "<br>";
          };
        }

        unset($_SESSION['error']);
        ?></p>

      </div>

      </div><!-- End login -->

      <!-- Vendor JS Files -->
      <script src="assets/vendor/aos/aos.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>
      <script src="assets/vendor/purecounter/purecounter.js"></script>
      <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>
    </body>
  </html>
