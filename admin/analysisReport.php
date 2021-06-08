<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Analysis Report - UpTogether</title>
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
    <main id="main" data-aos="fade-in">
      <!-- ======= Breadcrumbs ======= -->
      <div class="breadcrumbs">
        <div class="container">
          <h2>Analysis Report</h2>
        </div>
        </div><!-- End Breadcrumbs -->
        <!-- ======= Courses Section ======= -->
        <section id="addCouse" class="addCouse">
          <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <div class="course-page">
              <div class="course-content">
                <h1>Top hours course</h1>
                <?php
                include('server.php');
                $sql = "SELECT * FROM courses ORDER BY max_hours DESC";
                $result = $conn->query($sql);
                ?>
                <?php
                include('server.php');
                $sql1 = "SELECT *, COUNT(billing_detail_id) FROM `billing_detail`
                INNER JOIN packages ON billing_detail.package_id = packages.package_id
                WHERE billing_detail.package_total > 0
                GROUP BY(billing_detail.package_id)";
                $result1 = $conn->query($sql1);
                ?>
                <div id="chart_div"></div>
              </div>
            
            <div class="course-content">
              <h1>Top Selling packages</h1>
              <?php
              include('server.php');
              $sql = "SELECT * FROM courses ORDER BY max_hours DESC";
              $result = $conn->query($sql);
              ?>
              <?php
              include('server.php');
              $sql1 = "SELECT *, COUNT(billing_detail_id) FROM `billing_detail`
              INNER JOIN packages ON billing_detail.package_id = packages.package_id
              WHERE billing_detail.package_total > 0
              GROUP BY(billing_detail.package_id)";
              $result1 = $conn->query($sql1);
              ?>
              <div id="chart_div1"></div>
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
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              <script type="text/javascript">
              google.charts.load('current', {packages: ['corechart', 'bar']});
              google.charts.setOnLoadCallback(drawBasic);
              function drawBasic() {
              
                var data = google.visualization.arrayToDataTable([
                  ['Couse name', 'course hour', { role: 'style' }],
                  <?php while($row = $result->fetch_assoc()) {?>
                  ['<?php echo $row['subject']; ?>', <?php echo $row['max_hours']; ?>, 'color: #a1edf0; opacity: 0.4'],
                  <?php } ?>
                ]);
                
                var options = {
                  title: 'Top highest hours courses',
                  chartArea: {width: '60%'},
                  legend: { position: 'none'},
                  hAxis: {
                  title: 'Max hours',
                  minValue: 0
                },
                
                vAxis: {
                  title: 'Courses'
                  }
                };
                
                var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                chart.draw(data, options);
              }
              </script>
              <script type="text/javascript">
              google.charts.setOnLoadCallback(drawBasic1);
              function drawBasic1() {
                var data = google.visualization.arrayToDataTable([
                  ['Couse Name', 'course hour', { role: 'style' }],
                  <?php while($row1 = $result1->fetch_assoc()) {?>
                  ['<?php echo $row1['hours']; ?> hours', <?php echo $row1['COUNT(billing_detail_id)']; ?>,
                  'color: #a1edf0; opacity: 0.4'],
                  <?php } ?>
                ]);
                var options = {
                  title: 'Top highest selling packages',
                  legend: { position: 'none'},
                  chartArea: {width: '60%'},
                  hAxis: {
                  title: 'Sell Volume',
                  minValue: 0
                },
                  vAxis: {
                  title: 'Package'
                  }
                };
                var chart = new google.visualization.BarChart(document.getElementById('chart_div1'));
                chart.draw(data, options);
              }
              </script>
            </body>
          </html>