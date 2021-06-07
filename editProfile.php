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
    <?php include('header.php')?>
    <main id="main" data-aos="fade-in">
      <!-- ======= Breadcrumbs ======= -->
      <div class="breadcrumbs">
        <div class="container">
          <h2>Edit Profile</h2>
          <p>It is a form to add new courses to the system to add courses. Please enter the course name, instructor code, duration throughout the course (hour) and course details.</p>
        </div>
        </div><!-- End Breadcrumbs -->
        <!-- ======= Courses Section ======= -->
        <section id="addCouse" class="addCouse">
          <div class="container d-flex justify-content-center align-items-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="course-page">
              <br><h1>Edit Profile</h1>
              <div class="course-content">
                <?php
                  if(isset($_GET['user_id'])){
                    $user_id = $_GET['user_id'];
                    $sql = "SELECT * FROM users WHERE user_id = '$user_id'";

                    $user_profile = array();

                    $result = $conn->query($sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                      $user_profile = $row;
                    }
                  }
                ?>
                <!--------------form----------------->
                <h3>User Id: <?php echo $user_profile['user_id']; ?></h3>
                <form action="editProfile_db.php" role="form" method="post">
                  <div class="form-group row g-3 mb-3">
                    <div class="col-6">
                      <div class="form-floating">
                        <input class="form-control" type="text" id="fname" name="f_name" placeholder="First Name" value="<?php echo $user_profile['f_name']; ?>">
                        <label for="fname">First Name</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating">
                        <input class="form-control" type="text" id="lname" name="l_name" placeholder="Last Name" value="<?php echo $user_profile['l_name']; ?>">
                        <label for="lname">Last Name</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating">
                        <select class="form-select" id="gender" name="gender" aria-label="gender">
                          <option selected>Choose...</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="other">Other</option>
                        </select>
                        <label for="gender">Gender</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating">
                        <input class="form-control" type="date" id="birthDate" name="birthdate" min="1921-01-01" placeholder="Birth Date" value="<?php echo $user_profile['birthday']; ?>">
                        <label for="birthDate">Birth Date</label>
                      </div>
                    </div>
                    <div class="col-12">

                      <div class="form-floating">
                        <input class="form-control" type="text" id="address" name="address" value="" placeholder="Address" value="<?php echo $user_profile['address']; ?>">
                        <label for="address">Address</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating">
                        <input class="form-control" type="tel" id="phone" name="tel" value="" placeholder="xxx-xxx-xxxx" pattern="[0-9]{10}" value="<?php echo $user_profile['tel_number']; ?>">
                        <label for="phone">Phone</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating">
                        <input class="form-control" type="email" id="email" name="email" value="" placeholder="Email Address" value="<?php echo $user_profile['email']; ?>">
                        <label for="email">Email Address</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating">
                        <input class="form-control" type="password" id="password" name="password" value="" placeholder="Password">
                        <label for="password">Password</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating">
                        <input class="form-control" type="password" id="confirmPassword" value="" name="cf_password" placeholder="Password">
                        <label for="confirmPassword">Confirm Password</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating">
                        <input class="form-control" type="text" id="school" name="school" value="" placeholder="School" value="<?php echo $user_profile['birthday']; ?>">
                        <label for="school">School</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating">
                        <input class="form-control" type="text" id="degree" name="degree" value="" placeholder="Degree" <?php echo $user_profile['degree']; ?>>
                        <label for="degree">Degree</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating">
                        <input class="form-control" type="text" id="grade" name="grade" value="" placeholder="Grade" <?php echo $user_profile['grade']; ?>>
                        <label for="grade">Grade</label>
                      </div>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <div class="col-12">
                      <div class="form-floating">
                        <div class="form-group padding">
                          <div class="text-center"><button type="submit" name="edit">Edit</button></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
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

              <p class="text-success">
                <?php
                if(isset($_SESSION['success_edit'])){
                  echo $_SESSION['success_edit'];
                }
                ?>
              </p>

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
