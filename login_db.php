<?php
  include('server.php');
  session_start();

  $error = array();
  $user_info = array();

  if(isset($_POST['login_user'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  }

  if(empty($email)){
    array_push($error, "Email is required");
  }

  if(empty($password)){
    array_push($error, "Password is required");
  }

  if(count($error) == 0){
    $dc_password = md5($password);
    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$dc_password'";

    $result = mysqli_query($conn, $login_query);

    if(mysqli_num_rows($result) == 1){
      while($row = mysqli_fetch_array($result)){
        $user_info = $row;
      }
      $_SESSION['username'] = $user_info;
      $_SESSION['success'] = "You are now loged in";
      header('location: index.php');
    }else{
      array_push($error, "Incorect username or password");
      $_SESSION['error'] = $error;
      header('location: rl-page.php');
    }
  }else{
    $_SESSION['error'] = $error;
    header('location: rl-page.php');
  }

?>
