<?php
  include('../server.php');
  session_start();


  if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: index.php');
  }
?>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="home-admin.php">UpTogether</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="active" href="home-admin.php">Home</a></li>
        <li><a  href="allStudent.php">Student List</a></li>
        <li><a  href="allTutor.php">Tutor List</a></li>
        <li><a  href="allSchedule.php">Schedule List</a></li>
        <li><a  href="allCouses.php">Course List</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
  </div>
</header><!-- End Header -->
