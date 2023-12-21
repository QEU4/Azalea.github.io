<!DOCTYPE html>
<html lang="en">

<head>
  <title>Azalea Gift Shop</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="external.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    table,
    th,
    td {
      border: 3px solid pink;
      text-align: center;
    }

    th,
    td {
      padding: 10px;
      text-align: center;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <img src="logo.jpeg" style="height: 50px; width: 50px;">
      </div>
      <ul class="nav navbar-nav">
        <li><a href="index.html">Home</a></li>
        <li><a href="AboutUs.html">About us</a></li>
        <li><a href="onlineShop.html">Online Shop</a></li>
        <li><a href="occasions.html">Occasions</a></li>
        <li class="active"><a href="contactUs.php">Contact us</a></li>
      </ul>
      <form class="navbar-form navbar-right" action="#">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" name="search">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
        <button class="btn btn-default" type="submit" formaction="cart.html">
          <img src="cart.png" style="height: 20px; width: 20px; background-color: white;">
        </button>
      </form>
    </div>
  </nav>

  <?php

  
  $servername = "localhost";
  $username = "root";
  $password = "";

  $conn = mysqli_connect($servername, $username, $password);

  //for connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  } else {

    $databaseName = "azalea";
    mysqli_select_db($conn, $databaseName);

    // Check for errors in selecting the database
    if (mysqli_errno($conn)) {
      die("Error selecting database: " . mysqli_error($conn));
    }

    $sql = "select id, ProductName,Quality, Viewpoint, NewProduct from dtb;";

    try {
      $result = $conn->query($sql);
      //$result = mysqli_query($conn, $sql); 
  
    } catch (mysqli_sql_exception $e) {
      var_dump($e);
      exit;
    }

  }


  ?>

  <table border style="margin: auto; margin-top:10%;">
    <thead>
      <tr>
        <th>id</th>
        <th>product name </th>
        <th>Quality</th>
        <th>view point</th>
        <th>new product</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
              <td>" . $row["id"] . "</td>
              <td>" . $row["ProductName"] . "</td>
              <td>" . $row["Quality"] . "</td>
              <td>" . $row["Viewpoint"] . "</td>
              <td>" . $row["NewProduct"] . "</td>
              <td><a href='onlnshpDelete.php?id=" . $row["id"] . "'>delete</a></td>
              </tr>";
        }
      } else {
        echo "0 results";
      }

      ?>
    </tbody>
  </table>

  <div style="text-align: center; border:black 3px; margin-top: 20px;">
    <a style="color: hsl(340, 57%, 64%);" href="onlineShop.php">Back to online shop page</a>
  </div>

</body>

</html>