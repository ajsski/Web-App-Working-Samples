<?php

echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '    <title>Read Database</title>';
echo '    <meta name="viewport" content="width=device-width, initial-scale=1">';
echo '    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">';
echo '    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>';
echo '    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>';
echo '    <link rel="stylesheet" href="./css/data_app.css">';
echo '</head>';
echo '<body>';
echo '<br/>';
echo '<h1 class="h1_title">Query and display database rows</h1> <hr/>';
echo '<div class="container" id="naving"> <!-- web navigation container -->';
echo '    <div class="row"><div class="col-sm-1"></div> <!-- left main grid column -->';
echo '        <div class="col-sm-10">';
echo '            <nav class="navbar navbar-expand-sm bg-light sticky-top">';
echo '                <div class="container-fluid">';
echo '                    <ul class="navbar-nav nav_list">';
echo '                        <li class="active"><a class="nav-link" href="index.php">App Home</a></li>';
echo '                        <li><a class="nav-link" href="get_input.php">GET Input</a></li>';
echo '                        <li><a class="nav-link" href="post_input.php">POST Input</a></li>';
echo '                        <li><a class="nav-link" href="php_info.php">PHP Info</a></li>';
echo '                        <li><a class="nav-link" href="read_db.php">Read Database</a></li>';
echo '                    </ul>';
echo '                </div></nav> </div><!-- end of sm 10 grid -->';
echo '        <div class="col-sm-1"></div> <!-- right main grid column -->';
echo '    </div> <!-- end div row  --> </div> <!-- end div container  -->';

echo '<div class="container" id="forming"> <!-- web form container -->';
echo '    <div class="row">';
echo '        <div class="col-sm-1"></div> <!-- left main grid column -->';
echo '        <div class="col-sm-10">';
echo '            <div class="container-fluid">';
echo '            <p>Database Contents: ' . '<br></p>';
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
    echo "Connected successfully";
    $select_db = "use my_xamp";
    $read_data = "select * from my_table;";
    if ($conn->query($select_db) === TRUE) {
        echo " The db was selected";
        //if ($conn->query($read_data) === TRUE) {
        echo " The read query was run";
        $result = $conn->query($read_data);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<br>". "id: " . $row["my_key"]. " - Words: " . $row["save_text"];
            }
        } else {
            echo "0 results";
        }
    } else {
        echo "Error: " . $read_data . "<br>" . $conn->error; }
}
echo '            </div></div><!-- end of sm 10 grid -->';
echo '        <div class="col-sm-1"></div> <!-- right main grid column -->';
echo '    </div> <!-- end div row  -->';
echo '</div> <!-- end div container  -->';

echo '<div class="container" id="form-options"> <!-- web form container -->';
echo '    <div class="row">';
echo '        <div class="col-1"></div> <!-- right main grid column -->';
echo '        <div class="col-3">';
echo '        <div class="container-fluid">';
echo '                <br/><p>Remove Item by Row ID</p>';
echo '                <form action="remove_by_id.php" id="remove_db_get" method="get">';
echo '                <input type="text" name="remove_text" id="remove_text" placeholder="Type number here..." rows="1" cols="10"></input>';
echo '                <button type="submit" class="btn btn-danger">Remove Item</button></form>';
echo '                </form>';
echo '            </div></div> <!-- right main grid column -->';
echo '        <div class="col-1"></div> <!-- right main grid column -->';
echo '        <div class="col-6"> <!-- end container-fluid -->';
echo '        <div class="container-fluid">';
echo '                <br/><p>Update Item by Row ID</p>';
echo '                <form action="update_by_id.php" id="update_db_get" method="get">';
echo '                <input type="text" name="update_key" id="update_key" placeholder="Key #" rows="1" cols="10"></input><br/>';
echo '                <textarea type="text" name="update_text" id="update_text" placeholder="Type replacement text..." rows="1" cols="30"></textarea>';
echo '                <button type="submit" class="btn btn-warning">Update Item</button></form>';
echo '               </form>';
echo '            </div> <!-- end container-fluid -->';
echo '        </div> <!-- right main grid column -->';
echo '        <div class="col-sm-1"></div> <!-- right main grid column -->';
echo '    </div> <!-- end div row  -->';
echo '</div> <!-- end div container  -->';

echo '</hr>';
echo '<div class="container" id="footing"> <!-- footer container 10 grid -->';
echo '    <div class="row"><div class="col-sm-1"></div> <!-- left main grid column -->';
echo '        <div class="col-sm-10">';
echo '            <footer><article><br/><hr/><p id="footer_here"><p id="footer_here">This xamp demo is free to use &copy; Clinton Garwood 2022 -' . date("Y") . '</p></article></footer>';
echo '        </div><!-- end of sm 10 grid -->';
echo '        <div class="col-sm-1"></div> <!-- right main grid column -->';
echo '    </div> <!-- end div row  --> </div> <!-- end div container  -->';

echo '</body>';
echo '</html>';
?>
