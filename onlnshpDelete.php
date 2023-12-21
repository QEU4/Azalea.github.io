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
$url = "onlnshpDelete.php?id=" . $id;

$servername = "localhost";
$username = "root";
$password = "";


$conn = mysqli_connect($servername, $username, $password);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {

    $databaseName = "azalea";
    mysqli_select_db($conn, $databaseName);


    if (isset($_POST["productName"]) && isset($_POST["quality"]) && isset($_POST["views"]) && isset($_POST["newProduct"])) {
        echo "test";

        $sql1 = "delete from `dtb` where `id`= '$id' ";

        try {
            $result = mysqli_query($conn, $sql1);
            echo "<script type='text/javascript'> 
     window.location.href='onlnshpTable.php' 
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

    $sql = "select id, ProductName,Quality, Viewpoint, NewProduct from dtb where id =" . $id;

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
            <label style="color:#ff9999">product name </label>
            <div style="padding:0px 10px 0px 10px;">
                <input disabled type="text" style="width:100%" value="<?php echo $row["ProductName"] ?>" />
                <input type="hidden" name="productName" value="<?php echo $row["ProductName"] ?>" />
            </div>

        </div>

        <br />

        <div style="margin:20px 0px 20px 0px;">
            <label style="color:#ff9999"> Quality </label>
            <div style="padding:0px 10px 0px 10px;">
                <input disabled type="text" style="width:100%" value="<?php echo $row["Quality"] ?>" />
                <input type="hidden" name="quality" value="<?php echo $row["Quality"] ?>" />
            </div>

        </div>

        <br />

        <div style="margin:20px 0px 20px 0px;">
            <label style="color:#ff9999"> Your Viewpoint </label>
            <div style="padding:0px 10px 0px 10px;">
                <input disabled type="text" style="width:100%" value="<?php echo $row["Viewpoint"] ?>" />
                <input type="hidden" name="views" value="<?php echo $row["Viewpoint"] ?>" />
            </div>

        </div>

        <br />

        <div style="margin:20px 0px 20px 0px;">
            <label style="color:#ff9999"> new product </label>
            <div style="padding:0px 10px 0px 10px;">
                <input disabled type="text" style="width:100%; height: 50px;" value="<?php echo $row["NewProduct"] ?>" />
                <input type="hidden" name="newProduct" value="<?php echo $row["NewProduct"] ?>" />
            </div>

        </div>

        <br />

        <div>
            <input class="bottonstyle" type="submit" value="delete" />
        </div>

        <br />

    </form>
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