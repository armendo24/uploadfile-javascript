<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn, "SET NAMES UTF8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "connecting!!";
}
?>