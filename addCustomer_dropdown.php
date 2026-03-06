<html>

<head>
    <title>User Registration11</title>
</head>

<body>
    <h1>Add Customer</h1>
    <form action="addcustomer.php" method="POST">

        <label for="CustomerID">CustomerID:</label><br>
        <input type="text" id="CustomerID" name="CustomerID"><br><br>
        <label for="Name">Name:</label><br>
        <input type="text" id="Name" name="Name"><br><br>
        <label for="Birthdate">Birthdate:</label><br>
        <input type="Date" id="Birthdate" name="Birthdate"><br><br>
        <label for="Email">Email:</label><br>
        <input type="text" id="Email" name="Email"><br><br>
        <select name="countryCode">
            <option value="AT">ออสเตรีย</option>
            <option value="AU">Australia</option>
            <option value="BD">บังคลาเทศ</option>
            <option value="CN">China</option>
            <option value="FI">Finland</option>
            <option value="GL">Greenland</option>
            <option value="ID">อินเดีย</option>
            <option value="IT">อิตาลี</option>
            <option value="JP">Japan</option>
            <option value="MY">มาเลเชีย</option>
            <option value="PH">ฟิลิปปินส์</option>
            <option value="PK">ปากีสถาน</option>
            <option value="RS">รัสเซีย</option>
            <option value="SG">Singapore</option>
            <option value="TH">ไทย</option>
        </select><br><br>
        <label for="OutstandingDebt">OutstandingDebt:<br>
            <input type="text" id="OutstandingDebt" name="OutstandingDebt"><br><br>
            <input type="submit" value="Submit">
    </form>




</body>

</html>


<?php
if (isset($_POST['CustomerID']) && isset($_POST['Name'])) :
    echo "<br>" . $_POST['CustomerID'] . $_POST['Name'] . $_POST['Birthdate'] . $_POST['Email'] .
        $_POST['CountryCode'] . $_POST['OutstandingDebt'];

    require 'connect.php';

    $sql = "insert into customer values(:CustomerID, :Name, :Birthdate, :Email,
        :CountryCode, :OutstandingDebt)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CustomerID', $_POST['CustomerID']);
    $stmt->bindParam(':Name', $_POST['Name']);
    $stmt->bindParam(':Birthdate', $_POST['Birthdate']);
    $stmt->bindParam(':Email', $_POST['Email']);
    $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
    $stmt->bindParam(':OutstandingDebt', $_POST['OutstandingDebt']);

    if ($stmt->execute()):
        $message = 'Successfully add new customer';
    else:
        $message = 'fail to add new customer';
    endif;
    echo $message;

    $conn = null;
endif;
?>