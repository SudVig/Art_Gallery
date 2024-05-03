<html>
<head>
<style>
body{
	background-color:white;
	}
</style>
</head>
<body>

<?php
include_once('dbcon.php');
session_start();
$price=$_POST["price"];
$imgid=$_POST["imgid"];
$pusername=$_SESSION["username"];
$arttype=$_POST["arttype"];
$artname=$_POST["artname"];
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");

if(mysqli_query($con,"insert into orders (imgid,price,pusername,date,arttype,artname)values('$imgid','$price','$pusername','$date','$arttype','$artname')")){

		 mysqli_query($con,"UPDATE arts SET artstatus='sold' WHERE imgid=$imgid");
	echo "<script>alert('ORDER PLACED..');window.history.back();</script>"; 
}
?>
</body>
</html>
