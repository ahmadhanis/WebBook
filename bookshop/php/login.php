<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home8/slumber6/public_html/PHPMailer/src/Exception.php';
require '/home8/slumber6/public_html/PHPMailer/src/PHPMailer.php';
require '/home8/slumber6/public_html/PHPMailer/src/SMTP.php';

include 'dbconnect.php';

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $pass = sha1($_POST["password"]);
    $otp = '1';
    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE user_email = '$email' AND user_password = '$pass' AND user_otp='$otp'");
    $stmt->execute();
    $number_of_rows = $stmt->rowCount();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
    if ($number_of_rows  > 0) {
        foreach ($rows as $user)
        {
            $user_name = $user['user_name'];
            $user_phone = $user['user_phone'];
        }
        session_start();
        $_SESSION["sessionid"] = session_id();
        $_SESSION["user_email"] = $email;
        $_SESSION["user_name"] = $user_name;
        $_SESSION["user_phone"] = $user_phone;
        echo "<script>alert('Login Success');</script>";
        echo "<script> window.location.replace('index.php')</script>";
    }else{
         echo "<script>alert('Login Failed');</script>";
         echo "<script> window.location.replace('login.php')</script>";
    }
}
if (isset($_POST["reset"])) {
     $email = $_POST["email"];
    sendMail($email);
     echo "<script>alert('Check your email');</script>";
     echo "<script> window.location.replace('login.php')</script>";
}


function sendMail($email){
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;                                               //Disable verbose debug output
    $mail->isSMTP();                                                    //Send using SMTP
    $mail->Host       = '..com';                          //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                           //Enable SMTP authentication
    $mail->Username   = '@.com';  
    $mail->Password   = '';                                 //
    $mail->SMTPSecure = 'tls';         
    $mail->Port       = 587;
    $from = "";
    $to = $email;
    $subject = 'MyBookDepository - Reset password request';
    $message = "<h2>You have requested to reset your password App</h2> <p>Please click on the following link to reset your password. If your did not request for the reset. You can ignore this email<p>
    <p><button><a href ='https://slumberjer.com/mybookdepository/bookshop/php/verifyaccount.php?email=$email'>Verify Here</a></button>";
    
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
   <body onload="loadCookies()">
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
                     <button class="w3-btn w3-round w3-blue w3-block" name="submit" value="login">Login</button>
                  </p>
               </form>
               <p><a href="register.php" style="text-decoration:none;">Dont have an account. Create here.</a><br>
               <a href="" style="text-decoration:none;" onclick="document.getElementById('id01').style.display='block';return false;">Forgot your account. Click here.</a>
               </p>
            </div>
         </div>
      </div>
      <footer class="w3-row-padding w3-padding-32">
         <hr>
         </hr>
         <p class="w3-center">MyBookDepository&reg;</p>
      </footer>
      <div id="id01" class="w3-modal">
      <div class="w3-modal-content" style="width:50%">
         <header class="w3-container w3-blue">
            <span onclick="document.getElementById('id01').style.display='none'" 
               class="w3-button w3-display-topright">&times;</span>
            <h4>Email to reset password</h4>
         </header>
         <div class="w3-container w3-padding">
            <form action="login.php" method="post">
               <label><b>Email</b></label>
               <input class="w3-input w3-border w3-round" name="email" type="email" id="idemail" required>
               <p>
                  <button class="w3-btn w3-round w3-blue" name="reset">Submit</button>
               </p>
            </form>
         </div>
      </div>
   </body>
</html>