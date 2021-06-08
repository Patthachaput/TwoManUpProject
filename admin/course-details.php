<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Courses-details - UpTogether</title>
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
    <?php include('header.php')?>
    <main id="main">
      <!-- ======= Breadcrumbs ======= -->
      <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
          <h2>Course Details</h2>
        </div>
        </div><!-- End Breadcrumbs -->
        <!-- ======= Cource Details Section ======= -->
        <section id="course-details" class="course-details">
          <div class="container" data-aos="fade-up">
            <div class="row">
              <div class="col-lg-8">
                <h3>
                <?php
                if(isset($_GET['course_id'])){
                $course_id = $_GET['course_id'];
                $sql = "SELECT
                courses.subject,
                courses.max_hours,
                courses.open,
                      courses.course_detail,
                users.f_name,
                users.l_name,
                users.user_id
                FROM courses
                JOIN users
                ON courses.tutor_id = users.user_id
                WHERE courses.course_id = '$course_id'";
                $this_couse = array();
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                $this_couse = $row;
                }
                }
                echo $this_couse['subject'];
                ?>
                </h3>
                <p>
                  <?php echo $this_couse['course_detail']; ?>
                </p>
              </div>
              <div class="col-lg-4">
                <div class="course-info d-flex justify-content-between align-items-center">
                  <h5>Tutor</h5>
                  <p><?php echo $this_couse['f_name'];?> <?php echo $this_couse['l_name'];?></p>
                </div>
                <div class="course-info d-flex justify-content-between align-items-center">
                  <h5>Course status</h5>
                  <p><?php
                    if($this_couse['open']){
                    echo "open";
                    }else{
                    echo "close";
                    }
                  ?></p>
                </div>
                <div class="course-info d-flex justify-content-between align-items-center">
                  <h5>Max Hours(Dulation)</h5>
                  <p><?php echo $this_couse['max_hours']; ?></p>
                </div>
              </div>
            </div>
          </div>
          </section><!-- End Cource Details Section -->
          </main><!-- End #main -->
          <!-- ======= Footer ======= -->
          <div class="container d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
              <div class="copyright">
                &copy; Copyright <strong><span>Uptogather</span></strong>. All Rights Reserved
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