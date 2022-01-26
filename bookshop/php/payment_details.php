<?php
include_once ("dbconnect.php");
session_start();
if (isset($_SESSION['sessionid']))
{
    $useremail = $_SESSION['user_email'];
    $user_name = $_SESSION['user_name'];
    $user_phone = $_SESSION['user_phone'];
}else{
    echo "<script>alert('Please login or register')</script>";
    echo "<script> window.location.replace('login.php')</script>";
}

$receiptid = $_GET['receipt'];
$sqlquery = "SELECT * FROM tbl_orders INNER JOIN tbl_books ON tbl_orders.order_bookid = tbl_books.book_id WHERE tbl_orders.order_receiptid = '$receiptid'";
$stmt = $conn->prepare($sqlquery);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

function subString($str)
{
    if (strlen($str) > 15)
    {
        return $substr = substr($str, 0, 15) . '...';
    }
    else
    {
        return $str;
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
            <hr>
        </div>
    </div>
    
    <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
      
      <div class="w3-grid-template">
          
          <?php 
            $totalpaid = 0.0;
           foreach ($rows as $details)
            {
                $bookid = $details['book_id'];
                $book_title = subString($details['book_title']);
                $book_author = $details['book_author'];
                $order_qty = $details['order_qty'];
                $order_paid = $details['order_paid'];
                $order_status = $details['order_status'];
                $totalpaid = ($order_paid * $order_qty) + $totalpaid;
                $book_isbn = $details['book_isbn'];
                $order_date = date_format(date_create($details['order_date']), 'd/m/y h:i A');
               echo "<div class='w3-center w3-padding-small'><div class = 'w3-card w3-round-large'>
                    <div class='w3-padding-small'><a href='book_details.php?bookid=$bookid'><img class='w3-container w3-image' 
                    src=../images/books/$book_isbn.jpg onerror=this.onerror=null;this.src='../images/books/default.jpg'></a></div>
                    <b>$book_title</b><br>$book_author<br>RM $order_paid<br> $order_qty unit<br></div></div>";
             }
             
             $totalpaid = number_format($totalpaid, 2, '.', '');
            echo "</div><br><hr><div class='w3-container w3-left'><h4>Your Order</h4><p>Order ID: $receiptid<br>Name: $user_name <br>Phone: $user_phone<br>Total Paid: RM $totalpaid<br>Status: $order_status<br>Date Order: $order_date<p></div>";
            ?>
    </div>
    
    <footer class="w3-row-padding w3-padding-32">
        <hr>
        <p class="w3-center">MyBookDepository&reg;</p>
    </footer>
   

</body>

</html>
