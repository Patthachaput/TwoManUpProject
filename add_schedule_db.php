<?php
  session_start();
  include('server.php');

  $user_info = $_SESSION['username'];
  $user_id = $user_info['user_id'];

  if(isset($_POST['add_schedule'])){
    $start_time = $_POST['startTime'];
    $hours = $_POST['hour'];
    $course_id = $_POST['course_id'];
    $detail = mysqli_real_escape_string($conn, $_POST['classDetails']);
    $max_students = $_POST['maxStudent'];

    $sql = "INSERT INTO `schedule`(`start_time`, `hours`, `tutor_id`, `course_id`, `max_students`, `add_by_uer_id`, `detail`)
    VALUES ('$start_time','$hours','$user_id','$course_id','$max_students','$user_id','$detail')";

    if($conn->query($sql) === TRUE){
      $_SESSION['add_schedule'] = "Add schedule success";
      header('location: addSchedule.php');
    }
  }
?>
