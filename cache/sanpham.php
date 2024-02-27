<?php


include('top-cache.php'); 

// Your regular PHP code goes here
error_reporting(0);
$conn = mysqli_connect('localhost', 'root', '', 'mobile', '3307') or die();
$sql = mysqli_query($conn, "SELECT * FROM $name");
$array = array();
if ($sql->num_rows > 0) {
    while ($rows = mysqli_fetch_assoc($sql)) {
        $array[] = $rows;
    }
}


file_put_contents($cachefile, json_encode($array)); // đẩy $array vào file ($cachefile)
echo "show sản phẩm khi file cache chưa có data";
$arr = file_get_contents($cachefile);
$array = json_decode($arr);
error_reporting(0);
$length = count($array);
for($index = 0 ; $index < $length ; $index ++){
    if($array[$index]->gia > 10000000){
        echo "<br/>";
        echo $array[$index]->tensp;
    }
}
include('bottom-cache.php');
?>