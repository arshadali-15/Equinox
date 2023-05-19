<?php
include("connect.php");

$book_name = $_POST["book_name"];
$author_name = $_POST["author_name"];
$publication = $_POST["publication"];
$edition = $_POST["edition"];
$isbn = $_POST["isbn"];
$price = $_POST["price"];
$stock = $_POST["stock"];
$image_path = "images/" . $_FILES["book_img"]["name"];

$sql = "INSERT INTO books (b_name, author, publication, b_edition, ISBN, price, stock, b_image)
VALUES ('$book_name', '$author_name', '$publication', '$edition', '$isbn', '$price', '$stock', '$image_path')";

if (mysqli_query($conn, $sql))
{
    echo "<script>alert('Book has been successfully uploaded!!')</script>";
    echo "<script>window.location.href='admin.html'</script>";
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Closing database connection
mysqli_close($conn);
?>