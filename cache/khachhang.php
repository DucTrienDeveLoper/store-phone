<?php
include("top-cache.php");
error_reporting(0);
$conn = mysqli_connect('localhost', 'root', '', 'mobile', '3307') or die();
$sql = mysqli_query($conn, "SELECT * FROM $name");
$array = array();
if ($sql->num_rows > 0) {
    while ($rows = mysqli_fetch_assoc($sql)) {
        $array[] = $rows;
    }
}
file_put_contents($cachefile, json_encode($array)); 
include("bottom-cache.php");
