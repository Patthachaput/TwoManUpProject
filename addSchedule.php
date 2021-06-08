<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Add Schedule - UpTogether</title>
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
            <h2>Adding New Schedule</h2>
            <p>It is a form to add new schedule to the system to add schedule. Please enter start time, duration of course (hour) and schedule details.</p>
          </div>
          </div><!-- End Breadcrumbs -->
          <!-- ======= Courses Section ======= -->
          <section id="addCouse" class="addCouse">
            <?php
              $user_info = $_SESSION['username'];
              $user_id = $user_info['user_id'];
            ?>
            <div class="container d-flex justify-content-center align-items-center" data-aos="zoom-in" data-aos-delay="100">
              <div class="course-page">
                <br><h1>Adding New Schedule</h1>
                <div class="course-content">
                  <!---------------form----------------->
                  <form action="add_schedule_db.php" method="post">
                    <div class="form-group row g-3 mb-3">
                      <div class="col-6">
                        <div class="form-floating">
                          <input class="form-control" type="datetime-local" id="startTime" name="startTime" placeholder="startTime">
                          <label for="startTime">Start Time</label>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-floating">
                          <input class="form-control" type="number" id="hour" name="hour" placeholder="Duration (hour)" required>
                          <label for="hour">Duration (hour)</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-floating">
                          <select class="form-select" id="course" name="course_id" aria-label="gender">
                            <?php
                              $sql = "SELECT course_id, subject, max_hours FROM courses WHERE tutor_id = '$user_id'";
                              $result = $conn->query($sql);
                              if(mysqli_num_rows($result) > 0){
                                while ($row = $result->fetch_assoc()) { ?>
                                  <option value="<?php echo $row['course_id'];?>"><?php echo $row['subject'];?></option>
                            <?php }
                              }
                            ?>
                          </select>
                          <label for="gender">Course</label>
                        </div>
                      </div>
                        <div class="col-12">
                          <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave details here" id="classDetails" name="classDetails" style="height: 100px" required></textarea>
                            <label for="classDetails">Class Topic</label>
                          </div>
                        </div>
                        <div class="col-12">
                        <div class="form-floating">
                          <input class="form-control" type="number" id="maxStudent" name="maxStudent" placeholder="maxStudent" required>
                          <label for="maxStudent">Max Student</label>
                        </div>
                        <div class="col-12">
                          <p style="color:green">
                          <?php
                            if(isset($_SESSION['add_schedule'])){
                              echo $_SESSION['add_schedule'];
                              unset($_SESSION['add_schedule']);
                            }
                          ?>
                          </p>
                        </div>
                      </div>
                        <div class="col-12">
                          <div class="form-group padding">
                            <div class="text-center"><button type="submit" name = "add_schedule">Add Schedule</button></div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
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
                  <script src="assets/vendor/aos/aos.js"></script>
                  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                  <script src="assets/vendor/php-email-form/validate.js"></script>
                  <script src="assets/vendor/purecounter/purecounter.js"></script>
                  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
                  <!-- Template Main JS File -->
                  <script src="assets/js/main.js"></script>
                </body>
              </html>
