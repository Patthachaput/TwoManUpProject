<?php
  include('server.php');
  session_start();

  $packages = array();
  $buy_packages = array();

  $user_info = $_SESSION['username'];
  $user_id = $user_info['user_id'];

  if(isset($_POST['buy_pk'])){
    $sql = "SELECT * FROM packages";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
      while ($row = $result->fetch_assoc()) {
        array_push($packages, $row);
      }
    }
  }

  foreach ($packages as $key => $value) {
    array_push($buy_packages,array("package_id" => $value['package_id'], "package_total" => $_POST[$value['package_id']], "package_hours" => $value['hours']));
  }

  //add billing

  $sql = "SELECT * FROM billing_detail";
  $result = $conn->query($sql);

  if($result->num_rows == 0){
    foreach ($buy_packages as $key => $value) {
      $package_id = $value['package_id'];
      $package_total = $value['package_total'];

      $sql = "INSERT INTO `billing_detail`(`billing_id`, `package_id`, `user_id`, `bill_by_user_id`, `package_total`)
      VALUES (1,'$package_id','$user_id','$user_id','$package_total')";

      $conn->query($sql);
    }
  }else {
    $sql = "SELECT `billing_id` FROM billing_detail ORDER BY billing_id DESC LIMIT 1";
    $result = $conn->query($sql);

    $last_row; //get last number of row;

    if($result->num_rows > 0){
      while ($row = $result->fetch_assoc()) {
        $last_row = $row['billing_id'];
      }
    }
    $total_hours = 0;

    $last_row = $last_row +1;
    foreach ($buy_packages as $key => $value) {
      $package_id = $value['package_id'];
      $package_total = $value['package_total'];
      $package_hour = $value['package_hours'];

      $total_hours = $total_hours + ((int)$package_total * (int)$package_hour);
      $sql = "INSERT INTO `billing_detail`(`billing_id`, `package_id`, `user_id`, `bill_by_user_id`, `package_total`)
      VALUES ($last_row,'$package_id','$user_id','$user_id','$package_total')";

      $conn->query($sql);
    }
  }

  $sql = "UPDATE users SET hours_topup = hours_topup + '$total_hours' WHERE user_id = '$user_id'";
  $conn->query($sql);

  $_SESSION['buy_success'] = "Buy packages success fully";
  header('location: pricing.php');
?>
