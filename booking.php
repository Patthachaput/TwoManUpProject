<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Courses - Mentor Bootstrap Template</title>
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
        <?php include('header.php'); ?>
        <!-- ======= Breadcrumbs ======= -->
        <?php
          $course = array();
          $schedule = array();
          $user_info = $_SESSION['username'];

          $user_id = $user_info['user_id'];

          if(isset($_GET['course_id'])){

            $course_id = $_GET['course_id'];

            $sql = "SELECT `subject`
                    FROM `courses`
                    WHERE course_id = '$course_id'";

            $result = $conn->query($sql);

            if($result->num_rows > 0){
              while ($row = $result->fetch_assoc()) {
                $course = $row;
              }
            }

            $sql = "SELECT * FROM schedule WHERE course_id = '$course_id'";

            $result = $conn->query($sql);
          }
        ?>
        <div class="breadcrumbs">
          <div class="container">
            <h2>Booking Couse</h2>
            <p>It is a form to add new courses to the system to add courses. Please enter the course name, instructor code, duration throughout the course (hour) and course details.</p>
          </div>
          </div><!-- End Breadcrumbs -->
          <!-- ======= Courses Section ======= -->
          <section id="addCouse" class="addCouse">
            <div class="container" data-aos="zoom-in" data-aos-delay="100">
                <br><h1>Booking Couse: <?php echo $course['subject']; ?></h1>

                <form action="booking_db.php" method="post">
                  <div class="list-group">
                    <label class="list-group-item active">
                      <h4>Couse Scchedule</h4>
                      <?php
                        while ($row = $result->fetch_assoc()) {
                          $schedule_id = $row['schedule_id'];
                          $hours = $row['hours'];
                          $start_time = $row['start_time'];

                          //Get number of student in the class
                          $sql = "SELECT COUNT(user_id)
                                  FROM booking_detail
                                  WHERE schedule_id = '$schedule_id'";

                          $result_count = $conn->query($sql);
                          $num_student; //current total sutdent in schedule
                          while ($count_row = $result_count->fetch_assoc()){
                            $num_student = $count_row;
                          }
                          $num_student = $num_student['COUNT(user_id)'];
                          //End get number of student in the class

                          //Check if user book already
                          $sql = "SELECT * FROM `booking_detail` WHERE user_id = '$user_id' AND schedule_id = '$schedule_id'";
                          $check_student = $conn->query($sql);
                          //End check if user book already

                        ?>
                      </label>
                        <label class="list-group-item">
                          <input class="form-check-input me-1" type="checkbox" value="<?php echo $row['schedule_id'];?>" name="schedule[]"
                          <?php
                            date_default_timezone_set('Asia/Bangkok');
                            $current_time = date_default_timezone_get();
                            $current_time = strtotime($current_time);
                            $out_of_time = FALSE;
                            $student_full = FALSE;
                            $student_book_already = FALSE;

                            if(mysqli_num_rows($check_student) > 0){
                              echo "disabled";
                              $student_book_already = TRUE;
                            }
                            elseif($current_time > strtotime($start_time)){
                              echo "disabled";
                              $out_of_time = TRUE;

                            }elseif($num_student == (int)$row['max_students']) {
                              echo "disabled";
                              $student_full = TRUE;
                            }
                          ?>
                          >
                          <!-- Display time and detail -->
                          <p style="color:<?php if($out_of_time or $student_full or $student_book_already):echo "red"; endif ?>"><?php echo date('Y-m-d h:i',strtotime($start_time));?> - <?php echo date('h:i',strtotime("+$hours hour", strtotime($row['start_time'])));?>
                          <strong>Topic</strong>: <?php echo $row['detail']; ?> <br>
                          <!-- End display time and detail -->

                          <!-- Check out of time -->
                          <strong style="text-decoration: underline;"><?php if($out_of_time):echo "Out of time"; endif ?></strong>
                          <!-- End check out of time -->

                          <!-- Check student full -->
                          <strong style="text-decoration: underline;"><?php if($student_full):echo "Class is full already"; endif ?></strong>
                          <!-- End check student full -->

                          <!-- Check student full -->
                          <strong style="text-decoration: underline;"><?php if($student_book_already):echo "You've already booked"; endif ?></strong>
                          <!-- End check student full -->

                          </p>
                        </label>
                      <?php
                        }
                      ?>
                      <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                      <input type="submit" name="booking_sm" value="Book" class="btn btn-success">
                      <p style="color:red">
                      <?php
                        if(isset($_SESSION['un_selected'])){
                          echo $_SESSION['un_selected'];
                          unset($_SESSION['un_selected']);
                        }
                      ?></p>
                      <p style="color:red">
                      <?php
                        if(isset($_SESSION['error_balance'])){
                          echo $_SESSION['error_balance'];
                          unset($_SESSION['error_balance']);
                        }
                      ?></p>
                      <p style="color:green">
                        <?php
                        if(isset($_SESSION['booking_success'])){
                          echo $_SESSION['booking_success'];
                          unset($_SESSION['booking_success']);
                        }
                        ?>
                      </p>
                  </div>
                </form>
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
