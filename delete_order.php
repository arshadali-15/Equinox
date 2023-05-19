<?php
include("connect.php");

if (isset($_GET['delete_order'])) {
    $order_id = $_GET['delete_order'];
    $del = "DELETE FROM customer WHERE order_id = $order_id";
    mysqli_query($conn, $del);
    header("Location: admin.html");
}

$query = "SELECT order_id, c_name, b_name, mobile_no, email, c_address, city,quantity,cost FROM customer";
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
    
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="admin.html">Add Book</a></li>
                <li><a href="stock.php">Update Stock</a></li>  
                <li><a href="delete_order.php"> Orders </a></li>              
            </ul>
        </nav>
    </header>

    <br><br><br><br>
    <form class="no-style">
        <table border="5">
            <tr>
                <thead>
                    <th> Order ID </th>
                    <th> Customer Name </th>
                    <th> Order Details </th>
                    <th> Customer Details</th>
                    <th> Delete </th>
                </thead>
            </tr>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td> <b><?php echo $data['order_id']; ?></b></td>

                            <td> <b><?php echo $data['c_name']; ?> </b></td>

                            <td> <b>Book Name: </b><?php echo $data['b_name']; ?><br> <b>Quantity:</b>  <?php echo $data['quantity']; ?><br> <b>Payment:</b>  Rs.<?php echo $data['cost']; ?><br> </td>

                            <td><b>Mobile No.:</b>  <?php echo $data['mobile_no']; ?><br> <b>E-mail:</b>  <?php echo $data['email']; ?><br> <b>Address: </b> <?php echo $data['c_address']; ?><br><b> City: </b> <?php echo $data['city']; ?><br> </td>

                            <td><form method="get" class="no-style" action="delete_order.php"><button type="submit" name="delete_order" value="<?php echo $data['order_id']; ?>">Order Delivered</button></form></td>
                        </tr>
                    <?php
                    }
                } else { ?>
                    <tr>
                        <td colspan="5">
                            <?php echo '<h1 align="center">No records found</h1>'; ?>
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