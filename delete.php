<html>

<head>
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

<?php


$id = $_GET['id'];
$url = "delete.php?id=" . $id;
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


    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"]) && isset($_POST["subject"])) {
        echo "test";

        $sql1 = "delete from `contact` where `id`= '$id' ";

        try {
            $result = mysqli_query($conn, $sql1);
            echo "<script type='text/javascript'> 
     window.location.href='users.php' 
     </script> ";
        } catch (mysqli_sql_exception $e) {
            var_dump($e);
            exit;
        }


    }


    // Check for errors in selecting the database
    if (mysqli_errno($conn)) {
        die("Error selecting database: " . mysqli_error($conn));
    }

    $sql = "select id, name,email, message, subject from contact where id =" . $id;

    try {
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

    } catch (mysqli_sql_exception $e) {
        var_dump($e);
        exit;
    }

}

mysqli_close($conn);
?>
<div style="text-align: center; margin: 5%;">
    <form style="border:1px solid black;width: 50%;margin:auto" method="POST" action="<?php echo $url; ?>">
        <div style="margin:20px 0px 20px 0px;">
            <label style="color:#ff9999">Name </label>
            <div style="padding:0px 10px 0px 10px;">
                <input disabled type="text" style="width:100%" value="<?php echo $row["name"] ?>" />
                <input type="hidden" name="name" value="<?php echo $row["name"] ?>" />
            </div>

        </div>

        <br />

        <div style="margin:20px 0px 20px 0px;">
            <label style="color:#ff9999"> Email </label>
            <div style="padding:0px 10px 0px 10px;">
                <input disabled type="text" style="width:100%" value="<?php echo $row["email"] ?>" />
                <input type="hidden" name="email" value="<?php echo $row["email"] ?>" />
            </div>

        </div>

        <br />

        <div style="margin:20px 0px 20px 0px;">
            <label style="color:#ff9999"> Subject </label>
            <div style="padding:0px 10px 0px 10px;">
                <input disabled type="text" style="width:100%" value="<?php echo $row["subject"] ?>" />
                <input type="hidden" name="subject" value="<?php echo $row["subject"] ?>" />
            </div>

        </div>

        <br />

        <div style="margin:20px 0px 20px 0px;">
            <label style="color:#ff9999"> Write your MESSAGE here </label>
            <div style="padding:0px 10px 0px 10px;">
                <input disabled type="text" style="width:100%; height: 50px;" value="<?php echo $row["message"] ?>" />
                <input type="hidden" name="message" value="<?php echo $row["message"] ?>" />
            </div>

        </div>

        <br />

        <div>
            <input class="bottonstyle" type="submit" value="delete" />
        </div>

        <br />

    </form>

    <br />
    <a style="color:#ff9999; font-size: 18px;" href="users.php">cancel</a>
</div>

</html>

<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>