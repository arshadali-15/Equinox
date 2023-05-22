<?php
include("connect.php");
$cname =  $_POST['name'];
$bname = $_POST['bookname'];
$mobile =  $_POST['mobile'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$quantity = (int)$_POST['quantity'];
$cost = $_POST['fprice'];
$key = $_GET['user'];
date_default_timezone_set("Asia/Calcutta");
$date = date('Y-m-d');
$isbn = $_GET['isbn'];
global $bookid;

$query = "SELECT * FROM books WHERE b_name = '$bname'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $bookid = intval($row['bookid']);
    echo $bookid;
}

$insert = "INSERT INTO customer(userkey, time, c_name, b_name, mobile_no, email, c_address, city, quantity, cost) values($key,'$date','$cname','$bname',$mobile,'$email','$address','$city',$quantity,$cost)";

$insert2 = "INSERT INTO customer_backup(userkey, time, c_name, b_name, mobile_no, email, c_address, city, quantity, cost) values($key,'$date','$cname','$bname',$mobile,'$email','$address','$city',$quantity,$cost)";

$update1 = "UPDATE books SET stock = stock - $quantity where ISBN = '$isbn'";

if (mysqli_query($conn, $insert) && mysqli_query($conn, $update1) && mysqli_query($conn, $insert2)) {
    echo "<script>alert('Order Placed Successfully!')</script>";
    echo "<script>window.location.href='catalog.php?user=$key'</script>";
} else {
    echo "Error: " . $insert . "<br>" . mysqli_error($conn);
}
