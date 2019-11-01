<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<?php
$servername = "anitikaphp.c04ehxpsv4e3.us-east-2.rds.amazonaws.com";
$username = "root";
$password = "prajjwal1234";
$dbname = "ag2329";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM patron";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Name</th><th>Email</th><th>Id</th><th>Class</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["firstname"]. " ". $row["lastname"]. "</td><td>" . $row["email"]. "</td><td> " . $row["id"]. "</td><td> ". $row["class"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>

