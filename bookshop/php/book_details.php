<?php
include_once ("dbconnect.php");
$bookid = $_GET['bookid'];
$sqlquery = "SELECT * FROM tbl_books WHERE book_id = $bookid";
$stmt = $conn->prepare($sqlquery);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

foreach ($rows as $books)
{
    $bookid = $books['book_id'];
    $book_title = $books['book_title'];
    $book_author = $books['book_author'];
    $book_isbn = $books['book_isbn'];
    $book_price = $books['book_price'];
    $book_description = $books['book_description'];
    $book_pub = $books['book_pub'];
    $book_lang = $books['book_lang'];
    $book_qty = $books['book_qty'];
    $book_date = date_format(date_create($books['book_date']), 'd/m/y h:i A');
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
    <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Close Menu</a>
        <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button">Books</a>
        <a href="mycart.php" onclick="w3_close()" class="w3-bar-item w3-button">Carts</a>
        <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">Payment</a>
        <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
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
            <img class="w3-image w3-margin w3-center" style="height:100%;width:100%;max-width:330px" src="../images/books/<?php echo $book_isbn?>.jpg">
        </div>
        <div class="w3-half w3-container">
            <?php 
            echo "<h3 class='w3-center'><b>$book_title</h3></b>
            <p>by (author) $book_author<br>Langguage $book_lang<br>ISBN $book_isbn<br>Publisher $book_pub<p>
            <p>Description<br>$book_description</p>
            <p>Quantity available<br>$book_qty</p>
            <p style='font-size:160%;'>RM $book_price</p>
            <p> <a href='index.php?bookid=$bookid' class='w3-btn w3-blue w3-round'>Add to Cart</a><p><br>
            <p>Date added<br>$book_date</p>
            ";
            
            ?>
        </div>
        </div>
    </div>
    </div>
    <footer class="w3-row-padding w3-padding-32">
        <p class="w3-center">MyBookDepository&reg;</p>
    </footer>
   

</body>

</html>
