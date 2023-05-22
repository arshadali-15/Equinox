<?php
include("connect.php");
$username =  $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$mobile =  $_POST['mobile'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];

$insert = "INSERT INTO users(u_name, password, mobile, email, user_id, u_address, u_city) values('$name','$password',$mobile,'$email','$username','$address','$city')";
if (mysqli_query($conn, $insert)) {
    $select = "SELECT userkey from users where user_id = '$username'";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($result);
    $key = $row['userkey'];
    echo "<script>alert('User Registered Successfully!')</script>";
    echo "<script>window.location.href='catalog.php?user=$key'</script>";
} else {
    echo "Error: " . $insert . "<br>" . mysqli_error($conn);
}
