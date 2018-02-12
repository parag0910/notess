<?php
$host = 'localhost';
    $user = 'root';
    $password = 'root';
    $database = 'notes';

$conn=mysqli_connect("localhost","root","root","notes");
mysqli_select_db($conn,"notes");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>