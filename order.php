<?php
include("connect.php");
$cname =  $_POST['name'];
$bname = $_POST['bookname'];
$mobile =  $_POST['mobile'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$quantity = $_POST['quantity'];
$cost = $_POST['fprice'];
global $bookid;

$query = "SELECT * FROM books WHERE b_name = '$bname'";
$result = mysqli_query($conn, $query);  
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $bookid = intval($row['bookid']);
    echo $bookid;
} 

$insert = "INSERT INTO customer(c_name,  b_name, mobile_no, email, c_address, city, quantity, cost) values('$cname','$bname',$mobile,'$email','$address','$city',$quantity,$cost)";
if (mysqli_query($conn, $insert)) {
    echo "<script>alert('Order Placed Successfully!')</script>";
    echo "<script>window.location.href='catalog.php'</script>";
} else {
    echo "Error: " . $insert . "<br>" . mysqli_error($conn);
}
?>