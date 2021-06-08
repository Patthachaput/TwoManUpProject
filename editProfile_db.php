<?php
  session_start();
  include('server.php');

  $error = array();

  if (isset($_POST['edit'])){
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cf_password = mysqli_real_escape_string($conn, $_POST['cf_password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
    $l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $birthdate = $_POST['birthdate'];
    $phonnumber = mysqli_real_escape_string($conn, $_POST['tel']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $degree = mysqli_real_escape_string($conn, $_POST['degree']);
    $school = mysqli_real_escape_string($conn, $_POST['school']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);
    $user_id = $_POST['user_id'];


    // if(empty($password)){
    //   array_push($error, "Password is required");
    // }

    // if(empty($cf_password)){
    //   array_push($error, "Confirm password is required");
    // }

    // if($password != $cf_password){
    //   array_push($error, "Password not match");
    // }

    if(empty($email)){
      array_push($error, "Email is required");
    }

    if(empty($f_name)){
      array_push($error, "First name is required");
    }

    if(empty($l_name)){
      array_push($error, "First name is required");
    }

    if(empty($gender)){
      array_push($error, "Gender is required");
    }

    if(empty($birthdate)){
      array_push($error, "Birthdate is required");
    }

    if(empty($phonnumber)){
      array_push($error, "Phonenumber is required");
    }

    if(empty($address)){
      array_push($error, "Adress is required");
    }


    if(count($error) == 0){
      $insert_pass = md5($password);

      $sql = "UPDATE `users` SET `password`='$insert_pass',`email`='$email',
      `f_name`='$f_name',`l_name`='$l_name',`gender`='$gender',`birthday`='$birthdate',`tel_number`='$phonnumber',`address`='$address',
      `degree`='$degree',`school`='$school',`grade`='$grade' WHERE user_id = '$user_id'";

      $conn->query($sql);
      echo $user_id;
      header("location: editProfile.php?user_id=$user_id");
      $_SESSION['success_edit'] = "Edit profile Success";


    }else{
      echo $user_id;

        array_push($error, $conn->error);
        $_SESSION['error'] = $error;
        header("location: editProfile.php?user_id=$user_id");
      }
  }

?>
