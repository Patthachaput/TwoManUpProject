<h1>Login</h1>
<form action="login_db.php" role="form" method="post">
  <div id="top">
    <div class="form-group mb-3">
      <i class="ri-user-3-line"></i>
      <input type="email" class="form-control" placeholder="email" required="required" name="email">
    </div>
    <div class="form-group mb-4">
      <i class="ri-lock-2-line"></i>
      <input type="password" class="form-control" placeholder="Password" required="required" name="password">
    </div>

    <div class="form-group">
      <div class="text-center"><button type="submit" name = "login_user"> Login </button></div>
    </div>
  </div>
</form>
<p><a href="#">Forgot Password?</a></p>
