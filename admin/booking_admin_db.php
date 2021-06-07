<?php
  include('../server.php');
  session_start();

  if(isset($_POST['booking_admin'])){
    $student_list = $_POST['student_list'];
    $schedule_id = $_POST['schedule_id'];
    $user_id = $_SESSION['username']['user_id'];


    $sql = "SELECT * FROM booking_detail";
    $result = $conn->query($sql);

    if($result->num_rows == 0){
      foreach ($student_list as $key => $value) {
        $sql = "INSERT INTO `booking_detail`(`student_booking_id`, `schedule_id`, `user_id`, `book_by_user_id`)
        VALUES ('1','$schedule_id','$value','$user_id')";
        $conn->query($sql);
      }
    }else{
      $sql = "SELECT `student_booking_id` FROM booking_detail ORDER BY student_booking_id DESC LIMIT 1";
      $result = $conn->query($sql);

      $last_row; //get last number of row;

      if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
          $last_row = $row['student_booking_id'];
        }
      }
      $last_row+=1;
      foreach ($student_list as $key => $value) {
        $sql = "INSERT INTO `booking_detail`(`student_booking_id`, `schedule_id`, `user_id`, `book_by_user_id`)
        VALUES ('$last_row','$schedule_id','$value','$user_id')";
        $conn->query($sql);
      }
    }

    header("location: bookCouse_admin_st.php?schedule_id=$schedule_id");
    $_SESSION['admin_booking_success'] = "Booking Success";
  }

?>
