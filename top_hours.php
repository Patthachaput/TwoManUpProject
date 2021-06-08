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

        $sql = "SELECT * FROM courses ORDER BY max_hours DESC";

        $result = $conn->query($sql);

      ?>
      <h1>Top hours course</h1>
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
            ['<?php echo $row['subject']; ?>', <?php echo $row['max_hours']; ?>],
            <?php } ?>

          ]);
          var options = {
            title: 'Top highest hours courses',
            chartArea: {width: '50%'},
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
</html>
