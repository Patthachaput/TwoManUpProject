<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Courses - Mentor Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.html">Mentor</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <?php
        include('header.php');
        ?>
        <a href="courses.html" class="get-started-btn">Login</a>
      </div>
      </header><!-- End Header -->
      <main id="main" data-aos="fade-in">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
          <div class="container">
            <h2>Book Class for Student</h2>
            <p>It is a form to add new schedule to the system to add schedule. Please enter start time, duration of course (hour) and schedule details.</p>
          </div>
          </div><!-- End Breadcrumbs -->
          <!-- ======= Courses Section ======= -->
          <section id="addCouse" class="addCouse">
            <div class="container justify-content-center align-items-center" data-aos="zoom-in" data-aos-delay="100">
              <!---------------form----------------->
              <h2>Add Couse [name of couse] For:</h2>
              <div class="card mb-3">
                <form action="booking_admin_db.php" role="form" method="post">
                  <div class="card-body" id="results">
                    <table class="table">
                      <?php
                        $schedule_id = $_GET['schedule_id'];
                        $sql = "SELECT * FROM users WHERE roll_id = 3";
                        $result = $conn->query($sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <tr>
                        <td><h5>Student Name:</h5></td>
                        <td style="text-align: center;"><?php echo $row['f_name']; ?> <?php echo $row['l_name']; ?></td>
                        <td><h5>Student ID:</h5></td>
                        <td style="text-align: center;"><?php echo $row['user_id']; ?></td>
                        <td>
                          <div class="form-check">
                            <center><input type="checkbox" id="btn-check-2-outlined" name="student_list[] " value="<?php echo $row['user_id']; ?>">
                          </div>
                        </td>
                      </tr>
                      <?php
                      }
                      ?>
                    </table>
                  </div>
                  <div class="card-footer bg-transparent">
                    <input type="submit" class="btn btn-success" value="book" name="booking_admin">
                    <input type="hidden" name="schedule_id" value="<?php echo $schedule_id; ?>">
                  </div>
                </form>
                <p style="color:green">
                  <?php
                    if(isset($_SESSION['admin_booking_success'])){
                      echo $_SESSION['admin_booking_success'];
                      unset($_SESSION['admin_booking_success']);
                    }
                  ?>
                </p>
              </div>
            </div> <!-- End Course Item-->
          </section><!-- End Courses Section -->
          </main><!-- End #main -->
            <!-- ======= Footer ======= -->
              <footer id="footer">
                <div class="container d-md-flex py-4">
                  <div class="me-md-auto text-center text-md-start">
                    <div class="copyright">
                      &copy; Copyright <strong><span>Mentor</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                      <!-- All the links in the footer should remain intact. -->
                      <!-- You can delete the links only if you purchased the pro version. -->
                      <!-- Licensing information: https://bootstrapmade.com/license/ -->
                      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
                      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                  </div>
                  <div class="social-links text-center text-md-right pt-3 pt-md-0">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                  </div>
                </div>
                </footer><!-- End Footer -->
                <div id="preloader"></div>
                <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
                <!-- Vendor JS Files -->
                <script src="../assets/vendor/aos/aos.js"></script>
                <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="../assets/vendor/php-email-form/validate.js"></script>
                <script src="../assets/vendor/purecounter/purecounter.js"></script>
                <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
                <!-- Template Main JS File -->
                <script src="../assets/js/main.js"></script>
                <script src="../assets/js/submit.js"></script>
              </body>
            </html>
