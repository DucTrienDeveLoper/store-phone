<?php
function getSanPham($conn, $param_get)
{
    error_reporting(0);
    $param = array_map('intval', explode(',', $_GET[$param_get]));
    $param = implode(',', $param);

    $query = "SELECT iddungluong FROM luuluong WHERE dungluong IN ($param)";
    $result = mysqli_query($conn, $query);
    $array_param = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($array_param, $row['iddungluong']);
        }
    }
    $array_param = implode(',', $array_param);
    $query_return = " $param_get IN ($array_param)";
    return $query_return;
}

function getSanPhamByString($conn, $param_get)
{   
    $data = $_GET[$param_get];
    $param_Array = explode(',', $data); // ['iphone', 'samsung']
    $param = "'" . implode("','", $param_Array) . "'"; // 'iphone','samsung'
    $sql = mysqli_query($conn, "SELECT id FROM $param_get WHERE $param_get IN ($param) ");
    $array_paramstring = array(); 
    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
            array_push($array_paramstring,$row['id']);
        }
    }
    $array_paramstring = implode(',',$array_paramstring);
    $query_return = "$param_get IN ($array_paramstring)";
    return $query_return;
}

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'mobile', '3307');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_GET['ocung'])){
    $query_ocung = getSanPham($conn, 'ocung');
}
if(isset($_GET['dungluong'])){
    $query_dungluong = getSanPham($conn, 'dungluong');
}
if(isset($_GET['hang'])){
    $query_hang = getSanPhamByString($conn,'hang');
}
if(isset($_GET['nhucau'])){
    $query_nhucau = getSanPhamByString($conn,'nhucau');  
}
if(isset($_GET['ldt'])){
    $query_ldt = getSanPhamByString($conn,'ldt');
}


mysqli_close($conn);
