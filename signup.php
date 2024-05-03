<?php
include_once('dbcon.php');
$username = $_POST['name'];
$email = $_POST['email'];
$phnno = $_POST['phnno'];
$address = $_POST['address'];
$type = $_POST['choice'];
$pass = $_POST['pass'];
$pass1 = $_POST['pass1'];
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");

$sql3="select count(*) from admin where username='$username';";
$retval3=mysqli_query($con,$sql3);
$an=mysqli_fetch_row($retval3);

$sql2="select count(*) from admin where email='$email';";
$retval2=mysqli_query($con,$sql2);
$ae=mysqli_fetch_row($retval2);

$sql="select count(*) from signup where name='$username';";
$retval=mysqli_query($con,$sql);
$n=mysqli_fetch_row($retval);

$sql1="select count(*) from signup where email='$email';";
$retval1=mysqli_query($con,$sql1);
$e=mysqli_fetch_row($retval1);

if (!preg_match("/^[a-zA-Z ]*$/",$username) ) {
echo "<script>alert('only letters and white space allowed in Name');window.location='signup.html';</script>";
}
elseif ($n[0]>0 or $an[0]>0) {
echo "<script>alert('Username already exist');window.location='signup.html';</script>";
}
elseif ($e[0]>0 or $ae[0]>0) {
echo "<script>alert('Email already exist');window.location='signup.html';</script>";
}
elseif(!preg_match('/^\d{10}$/', $phnno))
{
echo "<script>alert('Invalid Mobile Number!');window.location='signup.html';</script>";
}
elseif($pass!=$pass1)
{
echo "<script>alert('Password Not Match!');window.location='signup.html';</script>";
}
else{
	
if($type=="yes"){
$type="artist";
}
else{
$type="user";
}
$query = "INSERT INTO signup (name,email,type,address,phnno,pswd,date)VALUES('$username','$email','$type','$address','$phnno','$pass','$date')";
$retval = mysqli_query( $con,$query);
if(! $retval ) { die('could not enter data:'.mysqli_error()); }
else{ 
echo "<script>window.location='login.html';</script>"; }
}
mysqli_close($con);
?>