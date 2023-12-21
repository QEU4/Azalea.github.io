<!DOCTYPE html>
<html lang="en">

<head>
  <title>Azalea Gift Shop</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="external.css">
  <!-- Include jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Include Bootstrap JavaScript after jQuery -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 


  <style>
    *{
      text-align: center;
    }
    .dropdown-toggle {
          width: 100%;

        }

        .dropdown-menu {
          width: 100%;
          margin-bottom: 20px;
          text-align: center;
        }

        .dropdown {
          margin-bottom: 15px !important;
        }

    .cont {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 110vh;
      /* Adjust the height as needed */
    }

    .centered-image {
      width: 100%;
      height: 85%;
    }

    .navbar-nav li {
      text-align: left;
    }

    .center-content {
      text-align: left;
    }

    table {
      border-collapse: collapse;
      width: 50%;
      margin-top: 30px;
      text-align: center;
    }

    table,
    th,
    td {
      border: 3px solid palevioletred;
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
        <li class="active"><a href="onlineShop.php">Online Shop</a></li>
        <li><a href="occasions.html">Occasions</a></li>
        <li><a href="contactUs.php">Contact us</a></li>
      </ul>
      <form class="navbar-form navbar-right" action=#>
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

  <div class="container picture">
    <div class="centered">
      <h1 class="headings">Online Shop</h1>
    </div>
  </div>
  <hr>

  <h2 style="text-align: center;">List of Services</h2>

  <div style="padding: 50px;"><!-- list of shop services-->
    <h3>Welcome to Azalea gift shop, your go-to destination for all things floral and gifting. Our services include:
    </h3>
    <ul style="font-size: 18px;">
      <li>Fresh Floral Arrangements: Explore our exquisite collection of fresh flowers, handcrafted into stunning
        bouquets and arrangements for every occasion.</li>
      <li>Custom Floral Designs: Our skilled florists can create personalized, one-of-a-kind floral designs to suit your
        unique preferences and events.</li>
      <li>Event Planning: From weddings to corporate gatherings, our expert event planners can help you design and
        execute the perfect floral decor for your special occasions.</li>
      <li>Gift Selection: Discover a thoughtfully curated range of gifts, from charming trinkets to meaningful
        keepsakes, perfect for any celebration.</li>
      <li>Plant Care Guidance: Get tips and advice on how to care for your plants, ensuring they flourish and thrive.
      </li>
      <li>Timely Flower Delivery: We offer efficient flower delivery services, bringing your floral gifts to your loved
        ones' doorsteps.</li>
    </ul>
    <br />
    <h5 style="text-align: center;">Experience the beauty of flowers and the art of gifting at our shop. Let us help you
      make every moment memorable.</h5>
  </div>

  <div class="cont"><!-- the picture at the center-->
    <img src="onlineshop.jpg" class="centered-image">
  </div>



  <div class="row" style="margin: auto;">
    <div class="col-2"></div>
    <div class="col-8">
      

      <div class="dropdown" style="margin:auto;">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="true">
          Flowers
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a>Mixed Floral Box</a></li>
          <li><a>Pretty pastels</a></li>
          <li><a>Pink Oriental Lilly's</a></li>
          <li><a>White African Roses</a></li>
          <li><a>Just Pink Roses</a></li>
          <li><a>Pink African Roses Hand Bouquet</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="cart.html">Go to product list</a></li>
        </ul>
      </div>

      <div class="dropdown" style="margin:auto;">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="true">
          Chocolates
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a>Milk Chocolate</a></li>
          <li><a>White Chocolate</a></li>
          <li><a>Dark Chocolate</a></li>
          <li><a>Semisweet Chocolate</a></li>
          <li><a>Bittersweet Chocolate</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="cart.html">Go to product list</a></li>
        </ul>
      </div>

      <div class="dropdown" style="margin:auto;">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="true">
          Gifts for her
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a>Perfumes</a></li>
          <li><a>Makeup</a></li>
          <li><a>Soaps</a></li>
          <li><a>Special box</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="cart.html">GGo to product list</a></li>
        </ul>
      </div>

      <div class="dropdown" style="margin:auto;">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="true">
          Gifts for him
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a>Perfumes</a></li>
          <li><a>Soaps</a></li>
          <li><a>Watches</a></li>
          <li><a>Special box</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="cart.html">Go to product list</a></li>
        </ul>
      </div>
      <div class="col-2"></div>

    </div>
  </div>
  <hr>
  <h1>Customers views</h1><!--customer vies-->

  <?php

$servername = "localhost";
$username = "root";
$password = "";

// Create a connection
$conn = mysqli_connect($servername, $username, $password);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
 
if (isset($_POST["productName"]) && isset($_POST["quality"]) && isset($_POST["views"]) && isset($_POST["newProduct"])) {
    $productName = test_input($_POST["productName"]);
    $quality = test_input($_POST["quality"]);
    $views = test_input($_POST["views"]);
    $newProduct = test_input($_POST["newProduct"]);

    $databaseName = "azalea";
      mysqli_select_db($conn, $databaseName);

      // Check for errors in selecting the database
      if (mysqli_errno($conn)) {
        die("Error selecting database: " . mysqli_error($conn));
      }

    
    
    $sql = "insert into `dtb`(`ProductName`, `Quality`, `Viewpoint`, `NewProduct`) VALUES ('$productName', '$quality', '$views', '$newProduct')";
   

    try {
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<div style='text-align: center;' class='alert alert-success' role='alert'> Sent successfully </div>";
        } else {
            echo "<div style='text-align: center;' class='alert alert-danger' role='alert'> Something went wrong! </div>";
        }
    } catch (mysqli_sql_exception $e) {
        var_dump($e);
        exit;
    }
}

}
// Close the connection
mysqli_close($conn);

function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>



  <form id="myform" action="onlineShop.php" method="Post"><!--form start-->
    <label>Product Name:</label>
    <input type="text" id="Name" name="productName" /><!--textbox for the costumer product name-->

    <label>Quality/10:</label>
    <input type="number" id="Name" name="quality" /><!--textbox for the costumer product quality-->

    <label>Your Viewpoint:</label>
    <input type="text" id="views" name="views" /><!--text boxt for the costumers views-->

    <label>New Product ?</label>
    <input type="text" id="views" name="newProduct" /><!--text boxt for the costumers new product suggestion -->

 
    <input type="submit" value="submit">
    <br/>
    <br/>
    <button type="button" onclick="addYourView()">Add your opinion</button><!--button to add your view to the table-->
  </form><!--the end of the form-->
<br/>
  <div>
  <table style="margin: auto; "><!--create table object-->
    <thead>
      <tr>
        <th>Prouct Name</th><!--the table headers-->
        <th>costumer views</th>
      </tr>
    </thead>
    <tbody id="mytable">
      <!-- Table body -->
    </tbody>
  </table>
</div>

  <script><!--to use javascript-->
    function addYourView() {//addYourView function to add costumer views to the table
      // Get input values from the form
      var Name = document.getElementById("Name").value;
      var views = document.getElementById("views").value;

      // to create a new row
      var mytable = document.getElementById("mytable");
      var newRow = mytable.insertRow();

      //add the cells to the table
      var cell1 = newRow.insertCell(0);
      var cell2 = newRow.insertCell(1);

      // Set the cells contant
      cell1.textContent = Name;
      cell2.textContent = views;

      // Clear the input fields
      document.getElementById("Name").value = "";
      document.getElementById("views").value = "";
    }
  </script>
  <br/>
  <form method="post" action="onlnshpTable.php">
    <button class="btn btn-default" type="submit">
      <img src="setting.png" style="height: 20px; width: 20px; background-color: white;">
    </button>
  </form>
  <br/>


  <footer>
    <p>@ flowers Oman- Flowers and gifts muscat</p>
  </footer>

</body>

</html>