<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE sampletable (
firstname VARCHAR(30) NOT NULL,
email VARCHAR(30),
pass VARCHAR(20)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table sampletable created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
