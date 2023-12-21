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

  //1
  $servername = "localhost";
  $username = "root";
  $password = "";

  //2
  $conn = mysqli_connect($servername, $username, $password);

  //3
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  } else {

    $databaseName = "azalea";
    mysqli_select_db($conn, $databaseName);

    // Check for errors in selecting the database
    if (mysqli_errno($conn)) {
      die("Error selecting database: " . mysqli_error($conn));
    }

    $sql = "select id, name,email, message, subject from contact;";

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
        <th>name</th>
        <th>email</th>
        <th>message</th>
        <th>subject</th>
        <th>Edit</th>
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
              <td>" . $row["name"] . "</td>
              <td>" . $row["email"] . "</td>
              <td>" . $row["message"] . "</td>
              <td>" . $row["subject"] . "</td>
              <td><a href='edit.php?id=" . $row["id"] . "'>Edit</a></td>
              <td><a href='delete.php?id=" . $row["id"] . "'>delete</a></td>
              </tr>";
        }
      } else {
        echo "0 results";
      }

      ?>
    </tbody>
  </table>

  <div style="text-align: center; border:black 3px; margin-top: 20px;">
    <a style="color: hsl(340, 57%, 64%);" href="contactUs.php">create new</a>
    <br />
    <a style="color: hsl(340, 57%, 64%);" href="contactUs.php">Back to contact page</a>
  </div>

  <hr>

  <p style="text-align: center; color: hsl(340, 57%, 64%);">Search for information based on id number:- </p>
  <form action="users.php" method="POST">
    <div class="input-group" style="margin: 3%;">
      <input type="text" class="form-control" placeholder="Search based on id number" name="search">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit">
          <i class="glyphicon glyphicon-search"></i>
        </button>
      </div>
    </div>
  </form>

  <?php

  if (isset($_POST["search"])) {
    $id = test_input($_POST["search"]);
    $sqll = "select `name`, `email`, `message`, `subject` from contact where `id` = '$id' ";
    $result = $conn->query($sqll);
    $rowForSearch = $result->fetch_assoc();
    if ($rowForSearch) {
      echo "<table border style='margin: auto;'>
            <tr>
              <td>" . "id: " . $id . "</td>
              <td>" . "name: " . $rowForSearch["name"] . "</td>
              <td>" . "email: " . $rowForSearch["email"] . "</td>
              <td>" . "message: " . $rowForSearch["message"] . "</td>
              <td>" . "subject: " . $rowForSearch["subject"] . "</td>
            </tr>
          <table/>
          <br/>
          <hr>";

    } else {
      echo "<p style= 'color:hsl(340, 57%, 64%); text-align: center;'> id number is not found!!</p>" . "<br/><hr>";
    }

  }
  mysqli_close($conn);
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

  <footer>
    <p>@ flowers Oman- Flowers and gifts muscat </p>
  </footer>

</body>

</html>