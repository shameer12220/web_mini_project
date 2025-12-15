<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "expense_tracker";

$conn = new mysqli($server, $user, $pass, $database);
if ($conn->connect_error) {
    die("Connection failed");
}
?>
