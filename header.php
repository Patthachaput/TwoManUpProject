<?php
  include('server.php');
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

    <h1 class="logo me-auto"><a href="index.php">UpTogether</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="active" href="index.php">Home</a></li>

        <?php if(isset($_SESSION['username'])){?>
          <li><a href="courses.php">Courses</a></li>
        <?php } ?>

        <?php if(isset($_SESSION['username'])){ ?>
            <?php if($_SESSION['username']['roll_id'] == 3){?>
              <li><a href="pricing.php">TopUp</a></li>
            <?php }?>
        <?php } ?>

        <?php if(isset($_SESSION['username'])){ ?>
            <?php if($_SESSION['username']['roll_id'] == 2){?>
              <li><a href="addCouse.php">Add course</a></li>
            <?php }?>
        <?php } ?>

        <li><a href="contact.php">Contact</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    <?php
      if(!isset($_SESSION['username'])){
        ?>
          <a href="rl-page.php" class="get-started-btn">Login</a>
        <?php
      }else{
        ?>
        <a style="margin-left:10px;" href="index.php?logout='1'" class="btn btn-danger">Logout</a>
        <?php }
    ?>
  </div>
</header><!-- End Header -->
