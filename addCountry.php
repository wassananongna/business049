<html>

<head>
    <title>User Registration11</title>
</head>

<body>
    <h1>Add Customer</h1>
    <form action="addCountry.php" method="POST">

        <label for="CountryCode">CountryCode:</label><br>
        <input type="text" id="CountryCode" name="CountryCode"><br><br>
        <label for="CountryName">CountryName:</label><br>
        <input type="text" id="CountryName" name="CountryName"><br><br>
        <input type="submit" value="Submit">
    </form>




</body>

</html>


<?php
if (isset($_POST['CountryCode']) && isset($_POST['CountryName'])) {
    echo "<br>" . $_POST['CountryCode'] . $_POST['CountryName'];

    require 'connect.php';

    $sql = "insert into Country values(:CountryCode, :CountryName ";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(' :CountryCode', $_POST['CountryCode']);
    $stmt->bindParam(' :CountryName', $_POST['CountryName']);
    if ($stmt->execute()):
        $message = 'Successfully add new customer';
    else:
        $message = 'fail to add new customer';
    endif;
    echo $message;
}
$conn = null;
?>