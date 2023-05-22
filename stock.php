<?php
include("connect.php");
$query = "SELECT b_name, author, publication, b_edition, ISBN, price, stock, b_image FROM books";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Update Stock</title>
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

    <br><br><br><br><br>
    <form action="update_stock.php" method="get" class="no-style">
        <table border="5">
            <tr>
                <thead>
                    <th> Image </th>
                    <th> Book Name </th>
                    <th> Current Stock</th>
                    <th> Action </th>
                </thead>
            </tr>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td> <img src="<?php echo $data['b_image']; ?>"></td>

                            <td> <b><?php echo $data['b_name']; ?> </b></td>

                            <td> <b><?php echo $data['stock']; ?></b> </td>

                            <td><input type="button" name="<?php echo $data['b_name']; ?>" value="Change" style="display: inline-block;padding: 12px 20px;background-color: #d8f2f1;color: #201d1d;border-radius: 4px;text-decoration: none;transition: background-color 0.8s ease;" onclick="location.href='update_stock.php?book=<?php echo urlencode($data['b_name']); ?>&stock=<?php echo urlencode($data['stock']); ?>&isbn=<?php echo urlencode($data['ISBN']); ?>';"></td>
                        </tr>
                    <?php
                    }
                } else { ?>
                    <tr>
                        <td colspan="4">
                            <?php echo 'No records found'; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
    </form>
    <br><br>
    <footer>
        <p>&copy; 2023 Equinox Bookstore. All Rights Reserved.</p>
    </footer>

</body>

</html>