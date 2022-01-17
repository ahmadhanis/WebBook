<?php
include_once("dbconnect.php");
session_start();

if (isset($_SESSION['sessionid'])) {
    $useremail = $_SESSION['user_email'];
}else{
    $response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
    return;
}
if (isset($_GET['submit'])) {
    $bookid = $_GET['bookid'];
    $bookprice = $_GET['bookprice'];
    $sqlqty = "SELECT * FROM tbl_carts WHERE user_email = '$useremail' AND book_id = '$bookid'";
    $stmtsqlqty = $conn->prepare($sqlqty);
    $stmtsqlqty->execute();
    $resultsqlqty = $stmtsqlqty->setFetchMode(PDO::FETCH_ASSOC);
    $rowsqlqty = $stmtsqlqty->fetchAll();
    $bookcurqty = 0;
    foreach ($rowsqlqty as $books) {
        $bookcurqty = $books['cart_qty'] + $bookcurqty;
    }
    if ($_GET['submit'] == "add"){
        $cartqty = $bookcurqty + 1 ;
        $updatecart = "UPDATE `tbl_carts` SET `cart_qty`= '$cartqty' WHERE user_email = '$useremail' AND book_id = '$bookid'";
        $conn->exec($updatecart);
    }
    if ($_GET['submit'] == "remove"){
        if ($bookcurqty == 1){
            $updatecart = "DELETE FROM `tbl_carts` WHERE user_email = '$useremail' AND book_id = '$bookid'";
            $conn->exec($updatecart);
        }else{
            $cartqty = $bookcurqty - 1 ;
            $updatecart = "UPDATE `tbl_carts` SET `cart_qty`= '$cartqty' WHERE user_email = '$useremail' AND book_id = '$bookid'";
            $conn->exec($updatecart);    
        }
    }
}


$stmtqty = $conn->prepare("SELECT * FROM tbl_carts INNER JOIN tbl_books ON tbl_carts.book_id = tbl_books.book_id WHERE tbl_carts.user_email = '$useremail'");
$stmtqty->execute();
//$resultqty = $stmtqty->setFetchMode(PDO::FETCH_ASSOC);
$rowsqty = $stmtqty->fetchAll();
$totalpayable = 0;
foreach ($rowsqty as $carts) {
   $carttotal = $carts['cart_qty'] + $carttotal;
   $bookpr = $carts['book_price'] * $carts['cart_qty'];
   $totalpayable = $totalpayable + $bookpr;
}

$mycart = array();
$mycart['carttotal'] =$carttotal;
$mycart['bookid'] =$bookid;
$mycart['qty'] =$cartqty;
$mycart['bookprice'] = bcdiv($cartqty * $bookprice,1,2);
$mycart['totalpayable'] = bcdiv($totalpayable,1,2);


$response = array('status' => 'success', 'data' => $mycart);
sendJsonResponse($response);


function sendJsonResponse($sentArray)
{
    header('Content-Type: application/json');
    echo json_encode($sentArray);
}
?>