<?php
include_once('../dbcon.php');
session_start();
$username= $_SESSION["username"];

date_default_timezone_set("Asia/Kolkata");
$date = date("y-m-d");

if(isset($_POST["upload"]))
{ 


$cid=$_POST['cid'];
$name=$_SESSION['username'];
$artname= $_FILES['art']['name'];
$artimg = addslashes(file_get_contents($_FILES['art']['tmp_name']));
	if(mysqli_query($con,"insert into participatedimages (cid,name,Artname,artimg,date) values ('$cid','$name','$artname','$artimg','$date')"))
	{ 
	echo "<script>alert('Thankyou For Participating');window.location='competition.php';</script>"; 
	}
	else{
		
	echo "<script>alert('Sorry! Try again');location='competition.php';</script>"; 
	
	}
}


?>
<html>
<head>
<style>
.upd,.box
{
	background-color:white;
	position:absolute;
	top:30%;
	left:30%;
	padding:70px 40px;
	border-radius:20px;
}

p
{
	color:red;
	font-size:15px;
	font-weight: bold;
	font-family:tahoma;
}
input[type="submit"]{
border: none;
outline:none;
height:40px;
width:200px;
color:#fff;
background:blue;
font-size:18px;
border-radius:20px;
}
input[type="submit"]:hover{
	opacity:0.6;
}
input[type="file"]{ color:black;}
body
{
	background:red;
}

</style>
</head>
<body>
<?php if(isset($_POST["submit"])){
	
echo '
<div class="upd" id="upd">

<form action="cupload.php" method="POST"  enctype="multipart/form-data">
			<p>Upload The File (only .jpg,.png)</p>
			<input type="file" name="art"required="">';?>
<input type="hidden"	name="cid" value="<?php echo $_POST['cid'];?>">
<?php echo '<input type="submit" name="upload" value="upload">
</form>';}?>
	</div>
</body>

</html>