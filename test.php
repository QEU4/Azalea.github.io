<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="external.css">
  <!-- Include jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Include Bootstrap JavaScript after jQuery -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 

    <style>
        p {
            margin: 30px;
        }

        .page1 {
            border-style: solid;
            border-radius: 15%;
            border-color: palevioletred;
            padding: 5%;
            margin:1% 10% 1% 10%;
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
            border: 3px solid pink;
            text-align: center;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        * {
            text-align: center;
        }

        footer {
    background-color: black;
    color: white;
    padding: 10px;
    text-align: center;
    }
    </style>

</head>

<body>
<br/>
    <div class="page1">
        <h1 style="text-align: center;">Questionnair Page</h1><!--the header-->
        <p style="text-align: center;">Dear customer, if you have any comments or suggestions regarding our online
            store, we
            will be very happy to know them by completing the questionnaire below, and be assured that your suggestions
            and
            comments will be a reference for us to provide better services.</p>
        <hr>

        <?php
$servername = "localhost";
$username = "root";
$password = "";

// Create a connection
$conn = mysqli_connect($servername, $username, $password);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    if (
        isset($_POST["name"]) && isset($_POST["recommendation"]) &&
        isset($_POST["feature"]) && isset($_POST["comments"]) && isset($_POST["rating"])
    ) {
        $name = test_input($_POST["name"]);
        $recommendation = test_input($_POST["recommendation"]);

        // Ensure $_POST["feature"] is an array
        $features = isset($_POST["feature"]) ? test_input(implode(", ", (array)$_POST["feature"])) : '';

        $comments = test_input($_POST["comments"]);
        $rating = test_input($_POST["rating"]);

        $databaseName = "azalea";
        mysqli_select_db($conn, $databaseName);

        // Check for errors in selecting the database
        if (mysqli_errno($conn)) {
            die("Error selecting database: " . mysqli_error($conn));
        }

        $sql = "insert into `questioner`(`name`, `recommendLevel`, `feature`, `recommendations`, `rate`) VALUES ('$name','$recommendation','$features','$comments','$rating')";

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

        <form id="questionnair_page" action="test.php" method="post"><!--form-->
            <!--text box for the name-->
            <p style="text-align: center;"><label style="font-weight:bold;">Name<input type="text" value="name"
                        name="name" /></label></p>

            <!--radio button to choose how much you recommend our electric shop-->
            <p style="text-align: center;">
                <label style="font-weight:bold;">How likely are you to recommend us?</label>
                <label> <input type="radio" name="recommendation" value="very-likely"> Very Likely</label>
                <label> <input type="radio" name="recommendation" value="likely"> Likely</label>
                <label> <input type="radio" name="recommendation" value="not-likely"> Not Likely</label>

            </p>
            <!--checkboxs to choose the features that you liked it in our electric shop-->
            <p style="text-align: center;"><label style="font-weight:bold">What features do you like?</label>
                <label> <input type="checkbox" name="feature" value="easy_use"> Easy to use </label>
                <lebal> <input type="checkbox" name="feature" value="diversity"> Diversity in products</lebal>
                <label> <input type="checkbox" name="feature" value="response"> Spead in rasponse </label>
                <label> <input type="checkbox" name="feature" value="quality"> High quality products </label>


            </p>


            <!--text area to write the opinnion and recommendations-->
            <p style="text-align: center;">
                <lebal style="font-weight: bold;">your recommendations and comments: </lebal>
            </p>
            <p style="text-align: center;"><textarea cols="30" rews="80%" name="comments">comments......</textarea>
            </p>

            <!--select menue to rate your experience-->
            <p style="text-align: center;">
                <label style="text-align: center; font-weight: bold;">Rate your experience:</label>
                <select id="rating" name="rating">
                    <option value="excellent">Excellent</option>
                    <option value="good">Good</option>
                    <option value="average">Average</option>
                    <option value="poor">Poor</option>
                </select>
            </p>
            <!--button for the submition-->

            <p style="text-align:center;"> <button class="buttonstyle" type="submit" name="submit"
                    onclick="validateForm()">Submit</button>
            <div id="errorMessages" class="error-message"></div>

        </form><!--form end-->

        <h1>Products that customers recommend to add to this online store</h1><!--header-->
        <h3>Please help us to know more about products that you recommend to add it to uor online shop and the colour of
            flowers you prefer more</h3>

        <form id="myform"><!--form start-->
            <label>Product Name:</label>
            <input type="text" id="Productname" name="Productname" /><!--textbox for the productname name-->

            <label>Flower colors you prefer:</label>
            <input type="text" id="color"
                name="color" /><!--text boxt for the new flowers colors that the recommend to add it to the shop -->

            <button type="button" onclick="addYourView()">Add your
                recommendations</button><!--button to add your recomends to the table-->
        </form><!--the end of the form-->

        <br/>
        <table style="margin:auto;"><!--create table object-->
            <thead>
                <tr>
                    <th>Product Name</th><!--the table headers-->
                    <th>flowers color you costumer prefer or want it to be available at the shop</th>
                </tr>
            </thead>
            <tbody id="mytable">
                <!-- Table body -->
            </tbody>
        </table>
        <br />

        <div style="text-align: center; margin: 0 1% 2% 5%;">
            <a href="index.html"
                style="border-style: solid; border-color: palevioletred; color: black; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 20px ;">Back
                to home page...</a>
        </div>
    </div>

    <br/>
    <footer>
    <p style="margin: 10px;">@ flowers Oman- Flowers and gifts muscat </p>
    </footer>


    <script>
        function validateForm() {
            // Reset error messages
            document.getElementById("errorMessages").innerHTML = "";

            // Validate Name (Textbox)
            var nameInput = document.getElementById("name");
            if (nameInput.value.trim() === "") {
                displayError("Name is required.");
                return;
            }

            // Validate Recommendation (Radio Buttons)
            var recommendationInputs = document.querySelectorAll('input[name="recommendation"]');
            if (!Array.from(recommendationInputs).some(input => input.checked)) {
                displayError("Please select a recommendation.");
                return;
            }

            // Validate Features (Checkbox)
            var featureInputs = document.querySelectorAll('input[name="feature"]:checked');
            if (featureInputs.length == 0) {
                displayError("Please select at least one feature.");
                return;
            }

            // Validate Comments (Textarea)
            var comments = document.getElementById("comments");
            if (comments.value.length < 10) {
                displayError("Please provide more detailed comments.");
                return;
            }

            // If all validations pass, submit the form (you can replace this with your actual submission logic)
            alert("Form submitted successfully!");
        }

        function displayError(message) {
            // Display error message
            var errorMessageDiv = document.getElementById("errorMessages");
            errorMessageDiv.innerHTML = message;
        }
    </script>

    <script><!--to use javascript-->
        function addYourView() {//addYourView function to add costumer recommends to the table-->
            // Get input values from the form
            var Productname = document.getElementById("Productname").value;
            var color = document.getElementById("color").value;

            // to create a new row
            var mytable = document.getElementById("mytable");
            var newRow = mytable.insertRow();

            //add the cells to the table
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);

            // Set the cells contant
            cell1.textContent = Productname;
            cell2.textContent = color;

            // Clear the input fields
            document.getElementById("Productname").value = "";
            document.getElementById("color").value = "";
        }
    </script>

<br/>
  <form method="post" action="QuestionerTable.php">
    <button class="btn btn-default" type="submit">
      <img src="setting.png" style="height: 20px; width: 20px; background-color: white;">
    </button>
  </form>
  <br/>
</body>

</html>