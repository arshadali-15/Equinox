<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>ADD/DELETE BOOKS</title>
    <style>
        h1 {
            position: relative;
            top: 13%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 3px solid rgb(79, 77, 77);
            padding: 2px;
            background-color: rgb(79, 77, 77);
            color: aliceblue;
        }

        form {
            top: 52%;
            display: flex;
            flex-direction: column;
        }

        form label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
            margin-right: 10px;
        }

        form input[type="text"],
        form input[type="number"],
        form input[type="file"] {
            width: 500px;
            padding: 5px;
            margin-bottom: 10px;
        }

        form input[type="submit"] {
            width: 120px;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="admin.html">Add Book</a></li>
                <li><a href="stock.php">Update Stock</a></li>
                <li><a href="delete_order.php">Current Orders</a></li>
                <li><a href="all.php">All Orders </a></li>
            </ul>
        </nav>
    </header>

    <form action="newstock.php" method="post">

        <h1>
            <center>Update Stock</center>
        </h1>

        <label>Book Name: </label><br>
        <?php
        $bookName = isset($_GET['book']) ? htmlspecialchars($_GET['book']) : '';
        echo '<input type="text" name="bookname" placeholder="Bookname" value="' . $bookName . '" readonly>';
        ?><br><br>

        <label>ISBN Code: </label><br>
        <?php
        $isbn = isset($_GET['isbn']) ? htmlspecialchars($_GET['isbn']) : '';
        echo '<input type="text" name="isbn" placeholder="ISBN CODE" value="' . $isbn . '" readonly>';
        ?><br><br>

        <label> Current Stock: </label><br>
        <?php
        $stock = isset($_GET['stock']) ? htmlspecialchars($_GET['stock']) : '';
        echo '<input type="text" name="stock" placeholder="Cr=urrent Stock" value="' . $stock . '" readonly>';
        ?><br><br>

        <label> Add/Delete Stock: </label><br>
        <input type="number" min="-<?php echo $stock; ?>" value="0" name="newstock"><br><br>

        <input type="submit" value="Finalize Changes">

    </form>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer>
        <p>&copy; 2023 Equinox Bookstore. All Rights Reserved.</p>
    </footer>
</body>

</html>