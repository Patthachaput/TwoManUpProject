<?php
  session_start();
  include('server.php');

  $error = array();

  if (isset($_POST['reg_user'])){
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cf_password = mysqli_real_escape_string($conn, $_POST['cf_password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
    $l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $birthdate = $_POST['birthdate'];
    $role = $_POST['role'];
    $phonnumber = mysqli_real_escape_string($conn, $_POST['tel']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $degree = mysqli_real_escape_string($conn, $_POST['degree']);
    $school = mysqli_real_escape_string($conn, $_POST['school']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);

    echo $birthdate;

    if(empty($password)){
      array_push($error, "Password is required");
    }

    if(empty($cf_password)){
      array_push($error, "Confirm password is required");
    }

    if($password != $cf_password){
      array_push($error, "Password not match");
    }

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

    if(empty($role)){
      array_push($error, "Role is required");
    }

    $user_check_query = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($conn, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if($result){
      if($result['email'] === $email){
        array_push($error, "Error email is already exist");
      }
    }

    if(count($error) == 0){
      $insert_pass = md5($password);
      $role_id;
      if($role == "Student"){
        $role_id = 3;
      }else if($role == "Tutor"){
        $role_id = 2;
      }

      $sql = "INSERT INTO users (password, email, roll, roll_id, f_name, l_name, gender, birthday, tel_number, address, degree, school, grade)
      VALUES ('$insert_pass', '$email', '$role', $role_id, '$f_name', '$l_name', '$gender', '$birthdate', '$phonnumber', '$address', '$degree', '$school', '$grade')";

      if ($conn->query($sql) === TRUE) {

        $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$insert_pass'";

        $result = mysqli_query($conn, $login_query);

        if(mysqli_num_rows($result) == 1){
          while($row = mysqli_fetch_array($result)){
            $user_info = $row;
          }
          $_SESSION['username'] = $user_info;
          header('location: index.php');
        }else{
          array_push($error, $conn->error);
          $_SESSION['error'] = $error;
          header('location: rl-page.php');
        }
      }
      else{
        array_push($error, $conn->error);
        $_SESSION['error'] = $error;
        header('location: rl-page.php');
      }
  }else {
    $_SESSION['error'] = $error;
    header('location: rl-page.php');
  }
}
?>
