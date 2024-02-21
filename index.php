<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "mobile", "3307") or die();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM billday WHERE status = 2";
if (isset($_SESSION['USER_NAME'])) {
    $Username = $_SESSION['USER_NAME'];
    echo $Username;
}
require "inc/header.php";
// require "account/login.php";
require_once __DIR__ . "/connect/libraries.php";
require_once __DIR__ . "/templates/user.php";
?>


