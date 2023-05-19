<?php
include("connect.php");

$bname = $_POST['bookname'];
$isbn = $_POST['isbn'];
$newquantity = $_POST['newstock'];

$newquantity = (int)$newquantity;
$update = "UPDATE books SET stock = stock + $newquantity where ISBN = $isbn";

if (mysqli_query($conn,$update) === TRUE)
{
    echo "<script>alert('Stock updated successfully!')</script>";
    echo "<script>window.location.href='stock.php'</script>";
} 
else
{
    echo "<script>alert('Error updating stock: ' . $conn->error;!')</script>";
    echo "<script>window.location.href='stock.php'</script>";
}

$conn->close();


?>