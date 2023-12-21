<!DOCTYPE html>
<html lang="en">

<head>
  <title>Azalea Gift Shop</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="external.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    form {
      text-align: center;
    }

    .bottonstyle {
      width: 150px;
      border-radius: 20px;
      border: none;
      background: pink;
      color: white;
      font-weight: bold;
      margin-bottom: 20px;
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
        <li><a href="onlineShop.php">Online Shop</a></li>
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

  <div class="container">
    <div class="centered">
      <h1 class="headings">Contact us</h1>
    </div>
  </div>
  <hr>

  <div style="padding: 0% 5% 3% 5%; text-align: center;">
    <h4>Call Us</h4>
    <p>if you have any questions about our services or about our website please use the email form, or call us on</p>
    <p>+968 3456 9876 and +968 2399 8768</p>
    <h4>Find Us:</h4>
    <p>Our Office , Muscat</p>
  </div>
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

    //this is to check if the submit button clicked or not 
    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"]) && isset($_POST["subject"])) {
      $name = test_input($_POST["name"]);
      $email = test_input($_POST["email"]);
      $message = test_input($_POST["message"]);
      $subject = test_input($_POST["subject"]);

      $databaseName = "azalea";
      mysqli_select_db($conn, $databaseName);

      // Check for errors in selecting the database
      if (mysqli_errno($conn)) {
        die("Error selecting database: " . mysqli_error($conn));
      }

      //inserting
      $sql = "insert into `contact`(`name`, `email`, `message`, `subject`) values ('$name','$email','$message', '$subject');";

      try {
        $result = mysqli_query($conn, $sql);
        if ($result) {
          echo "<div style='text-align: center;' class='alert alert-success' role='alert'>
                send successfully
              </div>";
        } else {
          echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>
                somthing wen wrong!
              </div>";
        }
      } catch (mysqli_sql_exception $e) {
        var_dump($e);
        exit;
      }

    }
    mysqli_close($conn);
  }

  class contactUs
  {
    private $name;
    private $email;
    private $subject;
    private $message;

    public function __construct($name, $email, $subject, $message)
    {
      $this->name = $name;
      $this->email = $email;
      $this->subject = $subject;
      $this->message = $message;
    }

    // Getter methods
    public function getName()
    {
      return $this->name;
    }

    public function getEmail()
    {
      return $this->email;
    }

    public function getSubject()
    {
      return $this->subject;
    }

    public function getMessage()
    {
      return $this->message;
    }
  }

  //we can use this function to display the array we created but for this project its not needed only to complete the requirement :)
  function displayReviews($messageArray)
  {
    echo '<table border="3" style="padding:5px; margin:5px; margin-left: auto; margin-right: auto; ">';
    echo '<tr><th>name</th><th>email</th><th>subject</th><th>message</th></tr>';

    foreach ($messageArray as $review) {
      echo '<tr>';
      echo '<td>' . $review->getName() . '</td>';
      echo '<td>' . $review->getEmail() . '</td>';
      echo '<td>' . $review->getSubject() . '</td>';
      echo '<td>' . $review->getMessage() . '</td>';
      echo '</tr>';
    }

    echo '</table>';
  }

  //this function is to remove any unneeded characters from the user input
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>


  <div style="text-align: center;">
    <form style="border:1px solid black;width: 50%;margin:auto" action="contactUs.php" method="post">
      <div style="margin:20px 0px 20px 0px;">
        <label style="color:#ff9999">Name </label>
        <div style="padding:0px 10px 0px 10px;">
          <input type="text" name="name" style="width:100%" />
        </div>

      </div>

      <br />

      <div style="margin:20px 0px 20px 0px;">
        <label style="color:#ff9999"> Email </label>
        <div style="padding:0px 10px 0px 10px;">
          <input type="text" name="email" style="width:100%" />
        </div>

      </div>

      <br />

      <div style="margin:20px 0px 20px 0px;">
        <label style="color:#ff9999"> Subject </label>
        <div style="padding:0px 10px 0px 10px;">
          <input type="text" name="subject" style="width:100%" />
        </div>

      </div>

      <br />

      <div style="margin:20px 0px 20px 0px;">
        <label style="color:#ff9999"> Write your MESSAGE here </label>
        <div style="padding:0px 10px 0px 10px;">
          <input type="text" name="message" style="width:100%; height: 50px;" />
        </div>

      </div>

      <br />

      <div>
        <input class="bottonstyle" type="submit" value="send" />
      </div>

    </form>
  </div>

  <br />
  <form method="post" action="users.php">
    <button class="btn btn-default" type="submit">
      <img src="setting.png" style="height: 20px; width: 20px; background-color: white;">
    </button>
  </form>

  <br />

  <footer>
    <p>@ flowers Oman- Flowers and gifts muscat </p>
  </footer>

</body>

</html>