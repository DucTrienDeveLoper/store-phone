<?php
$conn = mysqli_connect('localhost', 'root', '', 'mobile', '3307') or die();
$sql = mysqli_query($conn, "SELECT idsp,tensp,gia FROM `sanpham`");
$array = array();
if ($sql->num_rows > 0) {
    while ($rows = mysqli_fetch_assoc($sql)) {
        $array[] = $rows;
    }
}



file_put_contents($cachefile, json_encode($array));


error_reporting(0);


fclose($cachefile);
ob_end_flush(); // Send the output to the browser
