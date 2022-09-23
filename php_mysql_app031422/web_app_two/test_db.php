<?php
$servername = "localhost";
$username = "reader";
$password = "reader";
$my_db = "my_xamp";

// Create connection
$conn = new mysqli($servername, $username, $password,$my_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
