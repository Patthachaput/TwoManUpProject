<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Top hours course</title>
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <?php
        include('server.php');

        $sql = "SELECT *, COUNT(billing_detail_id) FROM `billing_detail`
                INNER JOIN packages ON billing_detail.package_id = packages.package_id
                WHERE billing_detail.package_total > 0
                GROUP BY(billing_detail.package_id)
                ";

        $result = $conn->query($sql);

      ?>
      <h1>Top Selling packages</h1>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <div id="chart_div"></div>
    </div>
  </body>
  <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawBasic);

    function drawBasic() {

          var data = google.visualization.arrayToDataTable([
            ['City', 'course hour',],
            <?php while($row = $result->fetch_assoc()) {?>
            ['<?php echo $row['hours']; ?> hours', <?php echo $row['COUNT(billing_detail_id)']; ?>],
            <?php } ?>

          ]);
          var options = {
            title: 'Top highest selling packages',
            chartArea: {width: '50%'},
            hAxis: {
              title: 'Sell Volume',
              minValue: 0
            },
            vAxis: {
              title: 'Package'
            }
          };

          var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

          chart.draw(data, options);
    }
  </script>
</html>
