<?php

$get_key =  $_GET['update_key'];
$get_data =  $_GET['update_text'];
$str_key = strval($get_key);
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
    $stmt = $conn->prepare("UPDATE my_table SET save_text = (?) WHERE my_key = (?)");
    $stmt->bind_param("ss", $str_data, $str_key);
    $stmt->execute();
    echo "Connected successfully";
}
header("Location: ./read_db.php");

