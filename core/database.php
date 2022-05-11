<?php
include 'sql.php';
$host = "localhost";
$user = "root";
$password = "";
$dbname = "ToDoApp";

createDB($host, $user, $password, $dbname);

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Error Ocurred During Connection " . mysqli_connect_error());
}
