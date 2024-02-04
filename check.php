<?php
// Database connection parameters

// Create connection
$conn = mysqli_connect("localhost", "root", "", "mobile", "3307") or die();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];
error_reporting(0);
if(strlen($password) < 8 || strlen($password) > 16){
    echo "sai quy định password từ 8 tới 16 ký tự". $conn->error;
    $conn->close();
    die();
}
if(strlen($username) < 8 || strlen($username) > 16){
    echo "sai quy định username từ 8 tới 16 ký tự".$conn->error;
    $conn->close();
    die();
}


// SQL to insert data into database
$check = mysqli_query($conn,"SELECT username FROM `admin`WHERE username = '$username'");
if($num = mysqli_num_rows($check)> 0){
    echo "tài khoản đã tồn tại";
    $conn->close();
    die();
}else{
$sql = "INSERT INTO `admin`(`username`, `password`) VALUES ('$username','$password')";

// Execute SQL query
error_reporting(0);
if ($conn->query($sql) === TRUE) {
    echo "đã tạo tài khoản thành công";
} else {
    echo "Lỗi: ". $conn->error;
}
}

// Close database connection
$conn->close();


?>
