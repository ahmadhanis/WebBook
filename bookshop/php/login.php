<?php
if (isset($_POST["submit"])) {
    include 'dbconnect.php';
    $email = $_POST["email"];
    $pass = sha1($_POST["password"]);
    $otp = '1';
    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE user_email = '$email' AND user_password = '$pass' AND user_otp='$otp'");
    $stmt->execute();
    $number_of_rows = $stmt->fetchColumn();
    if ($number_of_rows  > 0) {
        session_start();
        $_SESSION["sessionid"] = session_id();
        $_SESSION["user_email"] = $email;
        echo "<script>alert('Login Success');</script>";
        echo "<script> window.location.replace('index.php')</script>";
    }else{
         echo "<script>alert('Login Failed');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
  <title>Book Depo</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script src="../js/script.js"></script>
  <body onload="loadCookies()">
    <!-- Sidebar (hidden by default) -->
    <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
      <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Close Menu</a>
      <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button">Books</a>
      <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
    </nav>
    <!-- Top menu -->
    <div class="w3-top">
      <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
        <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
        <div class="w3-right w3-padding-16">Mail</div>
        <div class="w3-center w3-padding-16">MyBookDepository</div>
      </div>
    </div>
    <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
      <div class="w3-row w3-card">
        <div class="w3-half w3-center">
          <img class="w3-image w3-margin w3-center" style="height:100%;width:100%;max-width:340px" src="../images/loginimage.png">
        </div>
        <div class="w3-half w3-container">
            <h4>Login</h4>
          <form name="loginForm" class=""  action="login.php" method="post">
            <p>
              <label class="w3-text-blue">
                <b>Email</b>
              </label>
              <input class="w3-input w3-border w3-round" name="email" type="email" id="idemail" required>
            </p>
            <p>
              <label class="w3-text-blue">
                <b>Password</b>
              </label>
              <input class="w3-input w3-border w3-round" name="password" type="password" id="idpass" required>
            </p>
            <p>
              <input class="w3-check" type="checkbox" id="idremember" name="remember" onclick="rememberMe()">
              <label>Remember Me</label>
            </p>
            <p>
              <button class="w3-btn w3-round w3-blue w3-block" name="submit">Login</button>
            </p>
            <p><a href="register.php" style="text-decoration:none;">Dont have an account. Create here.</a><br>
            <a href="forgot.php" style="text-decoration:none;">Forgot your account. Click here.</a></p>
          </form>
        </div>
      </div>
    </div>
    <footer class="w3-row-padding w3-padding-32">
      <hr>
      </hr>
      <p class="w3-center">MyBookDepository&reg;</p>
    </footer>
  </body>
</html>