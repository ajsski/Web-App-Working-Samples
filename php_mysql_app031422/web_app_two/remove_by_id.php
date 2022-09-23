<?php

$get_data =  $_GET['remove_text'];
$str_data = strval($get_data);

$servername = "localhost";
$username = "reader";
$password = "reader";
$dbname = "my_xamp";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    $stmt = $conn->prepare("DELETE FROM my_table WHERE my_key=(?)");
    $stmt->bind_param("s", $str_data);
    $stmt->execute();
    echo "Connected successfully";
}
header("Location: ./read_db.php");

