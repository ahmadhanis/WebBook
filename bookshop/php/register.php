<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home8/slumber6/public_html/PHPMailer/src/Exception.php';
require '/home8/slumber6/public_html/PHPMailer/src/PHPMailer.php';
require '/home8/slumber6/public_html/PHPMailer/src/SMTP.php';


if (isset($_POST['submit'])) {
    include_once("dbconnect.php");
    $email = $_POST["email"];
    $name =$_POST["name"];
    $phone =$_POST["phone"];
    $password = sha1($_POST["password"]);
    $otp = rand(10000,99999);
    echo $sqlregister = "INSERT INTO `tbl_users`(`user_email`, `user_password`, `user_otp`, `user_phone`, `user_name`) VALUES ('$email','$password','$otp')";
    try {
        $conn->exec($sqlregister);
        sendMail($email,$otp);
        echo "<script>alert('Success')</script>";
       echo "<script>window.location.replace('login.php')</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Failed')</script>";
        echo "<script>window.location.replace('register.php')</script>";
    }
}

function sendMail($email,$otp){
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;                                               //Disable verbose debug output
    $mail->isSMTP();                                                    //Send using SMTP
    $mail->Host       = 'mail.slumberjer.com';                          //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                           //Enable SMTP authentication
    $mail->Username   = '';  
    $mail->Password   = '';                                 //g(v!@D([]7UP$K7wty  /  T0MizfNmCddW
    $mail->SMTPSecure = 'tls';         
    $mail->Port       = 587;
    $from = "";
    $to = $email;
    $subject = 'MyBookDepository - Please verify your account';
    $message = "<h2>Welcome to MyBookDepository App</h2> <p>Thank you for registering your account with us. To complete your registration please click the following.<p>
    <p><button><a href ='https://slumberjer.com/mybookdepository/bookshop/php/verifyaccount.php?email=$email&otp=$otp'>Verify Here</a></button>";
    
    $mail->setFrom($from,"SlumberSoft");
    $mail->addAddress($to);                                             //Add a recipient
    
    //Content
    $mail->isHTML(true);                                                //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->send();
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
  <body>
    <!-- Sidebar (hidden by default) -->
    <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:20%;min-width:200px" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Close Menu</a>
        <a href="login.php" onclick="w3_close()" class="w3-bar-item w3-button">Login</a>
        <a href="register.php" onclick="w3_close()" class="w3-bar-item w3-button">Register</a>
        <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button">Books</a>
        <a href="mycart.php" onclick="w3_close()" class="w3-bar-item w3-button">Carts</a>
        <a href="mypayment.php" onclick="w3_close()" class="w3-bar-item w3-button">Payment</a>
        <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">Logout</a>
    </nav>
    <!-- Top menu -->
    <div class="w3-top">
      <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
        <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
        <div class="w3-center w3-padding-16">MyBookDepository</div>
      </div>
    </div>
    <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
      <div class="w3-row w3-card">
        <div class="w3-half w3-container">
          <img class="w3-image w3-center w3-padding" style="width:100%; height:100%;object-fit:cover;" src="../images/loginimage.png">
        </div>
        <div class="w3-half w3-container">
            <h4>Register New Account</h4>
          <form name="registerForm" class=""  action="register.php" method="post">
            <p>
              <label class="w3-text-blue">
                <b>Name</b>
              </label>
              <input class="w3-input w3-border w3-round" name="name" type="name" id="idname" required>
            </p>
            <p>
              <label class="w3-text-blue">
                <b>Phone</b>
              </label>
              <input class="w3-input w3-border w3-round" name="phone" type="phone" id="idphone" required>
            </p>
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
              <label class="w3-text-blue">
                <b>Reenter Password</b>
              </label>
              <input class="w3-input w3-border w3-round" name="passwordb" type="password" id="idpassb" required>
            </p>            
            <p>
              <button class="w3-btn w3-round w3-blue w3-block" name="submit">Register</button>
            </p>
            <p><a href="login.php" style="text-decoration:none;">Already registered? Login here.</a><br>
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