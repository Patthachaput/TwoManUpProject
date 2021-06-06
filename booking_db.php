<?php
  include('server.php');
  session_start();
  $user_info = $_SESSION['username'];
  $user_id = $user_info['user_id'];

  $sql = "SELECT * FROM users WHERE user_id = $user_id";
  $result = $conn->query($sql);
  if(mysqli_num_rows($result) > 0){
    while ($row = $result->fetch_assoc()) {
      $user_info = $row;
    }
  }

  $balance = $user_info['hours_topup'] - $user_info['hours_spend'];

  if(isset($_POST['schedule'])){
    $book_list = $_POST['schedule'];
    $course_id = $_POST['course_id'];
    $total_hours = 0;

    if(count($book_list) == 0){
      //incase not select
      $_SESSION['un_selected'] = "You didn't select schedule";
      header("location: booking.php?course_id=$course_id");
    }else {
      foreach ($book_list as $key => $value){
        $sql = "SELECT * FROM `schedule` WHERE schedule_id = $value";
        $result = $conn->query($sql);

        if(mysqli_num_rows($result) > 0){
          while ($row = $result->fetch_assoc()) {
            $total_hours += $row['hours'];
          }
        }
      }

      if($balance < $total_hours){
        $_SESSION['error_balance'] = "You total hours is not enough. Pleas topup";
        header("location: booking.php?course_id=$course_id");
      }else{
        $sql = "SELECT * FROM booking_detail";
        $result = $conn->query($sql);

        if($result->num_rows == 0){
          foreach ($book_list as $key => $value) {
            //update booking
            $sql = "INSERT INTO `booking_detail`(`student_booking_id`, `schedule_id`, `user_id`, `book_by_user_id`)
            VALUES (1,'$value','$user_id','$user_id')";
            $conn->query($sql);
          }
          //update hours_spend
          $sql = "UPDATE users SET hours_spend = hours_spend + '$total_hours' WHERE user_id = '$user_id'";
          $conn->query($sql);

          $_SESSION['booking_success'] = "Book success";
          header("location: booking.php?course_id=$course_id");
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
          foreach ($book_list as $key => $value) {
            $sql = "INSERT INTO `booking_detail`(`student_booking_id`, `schedule_id`, `user_id`, `book_by_user_id`)
            VALUES ('$last_row','$value','$user_id','$user_id')";
            $conn->query($sql);
          }

          //update hours_spend
          $sql = "UPDATE users SET hours_spend = hours_spend + '$total_hours' WHERE user_id = '$user_id'";
          $conn->query($sql);

          $_SESSION['booking_success'] = "Book success";
          header("location: booking.php?course_id=$course_id");
        }
      }
    }
  }else{
    //incase not select
    $course_id = $_POST['course_id'];
    $_SESSION['un_selected'] = "You didn't select schedule";
    header("location: booking.php?course_id=$course_id");
  }
?>
