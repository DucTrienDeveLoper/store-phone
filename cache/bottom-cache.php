<?php
$conn = mysqli_connect('localhost', 'root', '', 'mobile', '3307') or die();
$sql = mysqli_query($conn, "SELECT idsp,tensp,gia FROM `sanpham`");
$array = array();
if ($sql->num_rows > 0) {
    while ($rows = mysqli_fetch_assoc($sql)) {
        $array[] = $rows;
    }
}


// function themsanpham($id, $ten, $gia)
// {
//     global $array;
//     $arrays = array(
//         'id' => $id,
//         'ten' => $ten,
//         'gia' => $gia
//     );
//     $array[] = $arrays;
//     // var_dump($array);
// }
// // var_dump($array);
// if (count($array) > 0) {
//     foreach ($array as $arrays) {
//         $id = $arrays['idsp'];
//         $ten = $arrays['tensp'];
//         $gia = $arrays['gia'];
//         themsanpham($id, $ten, $gia);
//     }
// }
// echo "hello world";
file_put_contents($cachefile, json_encode($array));


error_reporting(0);
// $cached = fopen($cachefile, 'w+');


fclose($cachefile);
ob_end_flush(); // Send the output to the browser
