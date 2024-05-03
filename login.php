<?php
include_once('dbcon.php');
session_start();
$username = $_POST['name'];
$pass = $_POST['pass'];

$_SESSION["username"] = $username;

$sql = "SELECT COUNT(*) FROM admin WHERE username='$username' AND pswd='$pass';";
$retval = mysqli_query($con, $sql);
$admin = mysqli_fetch_row($retval);

$sql1 = "SELECT COUNT(*) FROM signup WHERE name='$username' AND pswd='$pass';";
$retval1 = mysqli_query($con, $sql1);
$user = mysqli_fetch_row($retval1);

if ($admin[0] == 1) {
    echo "<script>alert('WELCOME..');window.location='admin/admin.php';</script>";
} elseif ($user[0] == 1) {
    echo "<script>alert('WELCOME..');window.location='main.html';</script>";
} else {
    echo "<script>alert('Username or Password is not correct');window.location='login.html';</script>";
}
?>
