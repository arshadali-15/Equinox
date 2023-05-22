<?php
include("connect.php");
$query = "SELECT b_name,author,publication,b_edition,ISBN,price, stock, b_image FROM books";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Catalog</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="catalog.php?user=<?php echo urlencode($_GET['user']); ?>">Catalog</a></li>
                <li><a href="prevorders.php?user=<?php echo urlencode($_GET['user']); ?>">Order History</a></li>
            </ul>
        </nav>
    </header>
    <br><br><br><br><br>
    <form action="buy.php" method="get" class="no-style">
        <table border="5">
            <tr>
                <thead>
                    <th> Image </th>
                    <th> Book Name </th>
                    <th> Description </th>
                    <th> Price </th>
                    <th> Stock </th>
                    <th> Action </th>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0) {
                        while ($data = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td> <img src="<?php echo $data['b_image']; ?>"></td>

                                <td> <b><?php echo $data['b_name']; ?> </b></td>

                                <td> <b>Author:</b> <?php echo $data['author']; ?> <br> <b>Edition:</b> <?php echo $data['b_edition']; ?> <br> <b>Publication:</b> <?php echo $data['publication']; ?> <br> <b>ISBN Number: </b><?php echo $data['ISBN']; ?> </td>

                                <td> <?php echo $data['price']; ?></td>

                                <td> <?php echo $data['stock']; ?></td>

                                <td><input type="button" name="<?php echo $data['b_name']; ?>" value="BUY BOOK" onclick="location.href='buy.php?book=<?php echo urlencode($data['b_name']); ?>&price=<?php echo urlencode($data['price']); ?>&stock=<?php echo urlencode($data['stock']); ?>&user=<?php echo urlencode($_GET['user']); ?>&isbn=<?php echo urlencode($data['ISBN']); ?>';"></td>

                            </tr>
                        <?php
                        }
                    } else { ?>
                        <tr>
                            <td colspan="8">
                                <?php echo 'No records found'; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </tr>
            <tr>

            </tr>
        </table>
    </form>
    <footer>
        <p>&copy; 2023 Equinox Bookstore. All Rights Reserved.</p>
    </footer>
</body>

</html>