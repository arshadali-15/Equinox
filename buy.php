<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style1.css">
  <title>Buy</title>

  <style>
    h1 {
      position: relative;
      left: 50%;
      transform: translate(-50%, -50%);
      border: 2px solid rgb(79, 77, 77);
      padding: 1px;
      background-color: rgb(79, 77, 77);
      color: aliceblue;
    }

    form {
      top: 75%;
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
        <li><a href="catalog.php?user=<?php echo urlencode($_GET['user']); ?>">Catalog</a></li>
        <li><a href="prevorders.php?user=<?php echo urlencode($_GET['user']); ?>">Order History</a></li>
      </ul>
    </nav>
  </header>

  <?php include('connect.php');
  $user = $_GET['user'];
  $select = "SELECT * FROM users WHERE userkey = $user";
  $result = mysqli_query($conn, $select);
  $data = mysqli_fetch_assoc($result);
  ?>


  <form name="myForm" action="order.php?user=<?php echo urlencode($_GET['user']); ?>&isbn=<?php echo urlencode($_GET['isbn']); ?>" onsubmit="return buyvalidation()" method="post">
    <h1><b>
        <center>Checkout</center>
      </b></h1>


    <label>Book Name:</label><br>
    <?php
    $bookName = isset($_GET['book']) ? htmlspecialchars($_GET['book']) : '';
    echo '<input type="text" name="bookname" placeholder="Bookname" value="' . $bookName . '" readonly>';
    ?><br>

    <label>Unit Price:</label><br>
    <?php
    $price = isset($_GET['price']) ? htmlspecialchars($_GET['price']) : '';
    echo '<input type="number" name="price" placeholder="Price" value="' . $price . '" id="price" readonly>';
    ?><br>

    <label>Quantity:</label><br>
    <?php
    $stock = isset($_GET['stock']) ? intval($_GET['stock']) : 0;
    ?>
    <input type="number" name="quantity" placeholder="Quantity" min="1" max="<?php echo $stock; ?>" id="quantity" required><br>

    <label>Final Price:</label><br>
    <input type="text" id="result" name="fprice" placeholder="Final Price" readonly><br>

    <label>Your Name:</label><br>
    <input type="text" name="name" placeholder="Name" value="<?php echo $data['u_name']; ?>" required><br>

    <label>E-mail:</label><br>
    <input type="email" name="email" placeholder="E-mail" value="<?php echo $data['email']; ?>" required><br>

    <label>Mobile Number:</label><br>
    <input type="tel" pattern="[0-9]{10}" maxlength="10" minlength="10" name="mobile" placeholder="Mobile Number" value="<?php echo $data['mobile']; ?>" required><br>

    <label>Address:</label><br>
    <input type="text" name="address" placeholder="Address" value="<?php echo $data['u_address']; ?>" required><br>

    <label>City:</label><br>
    <input type="text" name="city" placeholder="City" value="<?php echo $data['u_city']; ?>" required><br>

    <input type="submit" style="margin-left:30%;">


  </form>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>




  <script>
    function buyvalidation() {
      let emailAddress = document.forms["myForm"]["email"].value;
      var atSymbol = emailAddress.indexOf("@");
      var dotSymbol = emailAddress.lastIndexOf(".");
      var spaceSymbol = emailAddress.indexOf(" ");

      if ((atSymbol != -1) &&
        (atSymbol != 0) &&
        (dotSymbol != -1) &&
        (dotSymbol != 0) &&
        (dotSymbol > atSymbol + 1) &&
        (emailAddress.length > dotSymbol + 1) &&
        (spaceSymbol == -1)) {
        return true;
      } else {
        alert("Email address is not valid.");
        return false;
      }


      let custname = document.forms["myForm"]["name"].value;
      if (custname == "") {
        alert("Fill your name");
        return false;
      }
    }

    window.onload = function() {
      var urlParams = new URLSearchParams(window.location.search);
      var bookName = urlParams.get('b_name');

      // Auto-fill the Book Name input field
      document.getElementById('bookname').value = bookName;
    };

    var num1 = document.getElementById("price");
    var num2 = document.getElementById("quantity");
    var result = document.getElementById("result");

    num2.addEventListener("input", multiply);

    function multiply() {
      var value1 = parseInt(price.value);
      var value2 = parseInt(quantity.value);

      result.value = value1 * value2;
    }
  </script>
  <br><br><BR><BR><BR><BR><BR><BR><BR><BR><BR><br><br><BR><BR><BR><BR><BR><BR><BR><BR><BR><br><br><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
  <BR><BR><BR><BR><BR>
  <footer>
    <p>&copy; 2023 Equinox Bookstore. All Rights Reserved.</p>
  </footer>
</body>

</html>