<?php
  include('server.php');
  session_start();

  $user_info = $_SESSION['username'];
  $user_id = $user_info['user_id'];

  $error = array();
  if(isset($_POST['add_course'])){
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $detail = mysqli_real_escape_string($conn, $_POST['detail']);
    $max_hours = $_POST['max-hour'];

    if(empty($subject)){
      array_push($error, "subject is required");
    }

    if(empty($detail)){
      array_push($error, "detail is required");
    }

    if(empty($max_hours)){
      array_push($error, "hour is required");
    }

    if(count($error) == 0){
      $sql = "INSERT INTO `courses`(`subject`, `tutor_id`, `max_hours`, `course_detail`, `create_by_user_id`, `open`)
      VALUES ('$subject', '$user_id', '$max_hours', '$detail', '$user_id', 1)";

      if($conn->query($sql) === TRUE){
        $_SESSION['add_course'] = "Add course success";
        header('location: addCouse.php');
      }
    }
  }

?>
