<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'mobile', '3307');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get 'ocung' from GET request and sanitize it
$ocung = array_map('intval', explode(',', $_GET['ocung']));
$ocung = implode(',', $ocung);
var_dump($ocung);

// Query to get 'iddungluong' from 'luuluong'
$sql = "SELECT iddungluong FROM luuluong WHERE dungluong IN ($ocung)";
$result = mysqli_query($conn, $sql);

$array_data = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($array_data, $row['iddungluong']);
    }
}
$array_data = implode(',', $array_data);

// Query to get 'sanpham' from 'sanpham'
$query = "SELECT tensp AS sanpham FROM sanpham WHERE ocung IN ($array_data) ORDER BY hang";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['sanpham'] . "<br>";
    }
}

$ram = array_map('intval', explode(',', $_GET['ram']));
$ram = implode(',', $ram);
var_dump($ram);

$query = "SELECT iddungluong FROM luuluong WHERE dungluong IN ($ram)";
$result = mysqli_query($conn,$query);
$array_ram = array();
if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_assoc($result)){
        array_push($array_ram,$row['iddungluong']);
    }
}
$array_ram = implode(',',$array_ram);
// echo $array_ram;
$query = "SELECT tensp AS sanpham FROM sanpham WHERE dungluong IN ($array_ram) ORDER BY hang";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['sanpham'] . "<br>";
    }
}



mysqli_close($conn);
?>
