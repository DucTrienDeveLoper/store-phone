<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "mobile", "3307") or die();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$Username = mysqli_real_escape_string($conn, $_POST['username']);
$Password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = mysqli_query($conn, "select * from admin where username = '$Username' && password ='$Password' ");
$num = mysqli_num_rows($sql);
global $num;
if ($num > 0) {
    $row = mysqli_fetch_assoc($sql);
    $_SESSION['USER_ID'] = $row['id'];
    $_SESSION['USER_NAME'] = $row['username'];
    ?>
    <script>
        location.href = 'http://localhost/cuahangdienthoai/shoppingphp/frontendPHP/';
    </script>
    <?php
    // echo "found";
}

$sqlAccount = mysqli_query($conn, "select * from account where username = '$Username' && password = '$Password' ");
$nums = mysqli_num_rows($sqlAccount);
global $nums;
if ($nums > 0) {
    $rows = mysqli_fetch_assoc($sqlAccount);
    $_SESSION['USER_ID'] = $rows['id'];
    $_SESSION['USERNAME'] = $rows['username'];
?>
    <script>
        location.href = 'http://localhost/cuahangdienthoai/shoppingphp/';
    </script>
<?php
} else {
?>
    <script>
        var alert = confirm("<?php echo "sai thông tin đăng nhập"; ?>");
        if (alert == 1) {
            location.href = 'http://localhost/cuahangdienthoai/shoppingphp/frontendPHP/login.php';
        } else {
            location.href = 'http://localhost/cuahangdienthoai/shoppingphp/frontendPHP/login.php';
        }
    </script>
<?php
}

?>