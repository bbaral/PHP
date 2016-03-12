<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
<body xmlns:width="http://www.w3.org/1999/xhtml" xmlns:margin="http://www.w3.org/1999/xhtml"
      xmlns="http://www.w3.org/1999/html">
<div id="wrapper">
    <div id="header">
        <h1><em>Your Database</em></h1>
        </div>
    <style>
        table, th, td {
            border: 2px solid #0e28a4;
            top: 30%;
            left: 50%;
            transform: translateX(0%) translateY(-10%);
        }
        table {
            width: 230%;
            border-collapse: collapse;
        }
        th{
            background-color: #e40712;
            color: white;
        }
        h3{
            position: absolute;
            top: 12%;
            left: 50%;
            transform: translateX(-50%) translateY(-100%);
        }
    </style>
        <div id="section" style="background-color:transparent; color: white">
            <h3>You are logged in as employee</h3>
            <table align="left" border="100%">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Certificate</th>
                    <th>Course Name</th>
                </tr>
        </div>
    <div id="footer">
        Copyright@1%-CPI310
        <br>Design by Bikram Baral</br>
    </div>
</div>

<?php
//this is a view query for the employee
//after employee sign in. It simply direct here and be able to make some changes
echo '<link href="style.css" rel="stylesheet">';

$DB_Server = "localhost";
$DB_User = "root";
$DB_pass = "";
$DB_name = "CPI310";

// Create connection
$conn = new mysqli($DB_Server, $DB_User, $DB_pass, $DB_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT Employee_username, first_name, last_name, Employee_email, certificate, Course_name FROM Employee";
$result = $conn->query($sql);
$queryresult='';
//check to see if there is data or not
//if there is a data, while loop graps it and display in tables
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Employee_username"]. "</td><td>" . $row["first_name"]. "</td>
        <td>" . $row["last_name"]. "</td><td>" . $row["Employee_email"]. "</td><td>" . $row["certificate"]. "</td><td>" . $row["Course_name"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
</body>
</head>
</html>