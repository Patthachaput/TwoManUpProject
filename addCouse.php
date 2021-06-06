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
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.html">Mentor</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a class="active" href="courses.html">Courses</a></li>
            <li><a href="trainers.html">Tutor</a></li>
            <li><a href="pricing.html">Pricing</a></li>
            <li class="dropdown"><a href="#"><span>More</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Book Couse</a></li>
              <li><a href="#"></a>Your schedule</li>
              <li><a href="#">My hours</a></li>
              <li><a href="#">TopUp</a></li>
              <li><a href="#">Playment</a></li>
              <li><a href="#">Book History</a></li>
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
        <a href="courses.html" class="get-started-btn">Login</a>
      </div>
      </header><!-- End Header -->
      <main id="main" data-aos="fade-in">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
          <div class="container">
            <h2>Adding New Couse</h2>
            <p>It is a form to add new courses to the system to add courses. Please enter the course name, instructor code, duration throughout the course (hour) and course details.</p>
          </div>
          </div><!-- End Breadcrumbs -->
          <!-- ======= Courses Section ======= -->
          <section id="addCouse" class="addCouse">
            <div class="container d-flex justify-content-center align-items-center" data-aos="zoom-in" data-aos-delay="100">
              <div class="course-page">
                <br><h1>Adding New Couse</h1>
                <div class="course-content">
                  <!---------------form----------------->
                  <form action="" role="form" method="post">
                    <div class="form-group row g-3 mb-3">
                      <div class="col-6">
                        <div class="form-floating">
                          <input class="form-control" type="text" id="subject" name="subject" placeholder="Subject">
                          <label for="subject">Subject</label>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-floating">
                          <input class="form-control" type="text" id="tutorID" name="tutorID" placeholder="Tutor ID">
                          <label for="tutorID">Tutor ID</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-floating">
                          <input class="form-control" type="number" id="courseDuration" name="courseDuration" placeholder="Tutor ID">
                          <label for="courseDuration">Course Duration (hour)</label>
                          </div><!-- กูขอเปลี่ยนชื่อ maxHours เป็น courseDuration นะกูว่ามันสื่อความหมายมากกว่า-->
                        </div>
                        <div class="col-12">
                          <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave details here" id="courseDetails" name="courseDetails" style="height: 100px"></textarea>
                            <label for="courseDetails">Course Details</label>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group padding">
                            <div class="text-center"><button type="submit">Add Couse</button></div>
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