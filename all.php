<?php
include("connect.php");
$user = $_GET['user'];
$query = "SELECT order_id, time, c_name, b_name, mobile_no, email, c_address, city,quantity,cost FROM customer_backup";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Previous Orders</title>

</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="admin.html">Add Book</a></li>
                <li><a href="stock.php">Update Stock</a></li>
                <li><a href="delete_order.php">Current Orders </a></li>
                <li><a href="all.php">All Orders </a></li>
            </ul>
        </nav>
    </header>

    <br><br>
    <form class="no-style">
        <table border="5">
            <tr>
                <thead>
                    <th> Order ID </th>
                    <th> Customer Name</th>
                    <th> Order Summary </th>
                    <th> Shipping Details</th>
                    <th> Order Status </th>
                </thead>
            </tr>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td> <b>#BKO<?php echo $data['order_id']; ?></b></td>

                            <td> <b><?php echo $data['c_name']; ?> </b></td>

                            <td> <b>Book Name: </b><?php echo $data['b_name']; ?><br> <b>Quantity:</b> <?php echo $data['quantity']; ?><br> <b>Payment:</b> Rs.<?php echo $data['cost']; ?><br><b>Ordered on: </b><?php echo $data['time']; ?> </td>

                            <td><b>Mobile No.:</b> <?php echo $data['mobile_no']; ?><br> <b>E-mail:</b> <?php echo $data['email']; ?><br> <b>Address: </b> <?php echo $data['c_address']; ?><br><b> City: </b> <?php echo $data['city']; ?><br> </td>

                            <td>
                                <?php date_default_timezone_set("Asia/Calcutta");
                                $curr_date = date('Y-m-d');
                                $difference = strtotime($curr_date) - strtotime($data['time']);
                                $dif = round($difference / 86400);
                                if ($dif > 2) {
                                    echo "<b> Order Delivered</b>";
                                } else {
                                    echo "<b> Order To Be Delivered</b>";
                                }    ?>
                            </td>
                        </tr>
                    <?php
                    }
                } else { ?>
                    <tr>
                        <td colspan="5">
                            <?php echo '<h1 align="center">No  Orders</h1>'; ?>
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