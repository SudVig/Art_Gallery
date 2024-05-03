<html>
<head>
<style>
.explore
{
margin-top:0px;	
}
body{
background-color:black;
overflow:scroll;
}
.details
{
	height:650px;
	width:400px;
	background-color:white;
	position:absolute;
	left:12px;
	top:445px;
	
}
.display
{
	height:650px;
	width:calc(100% - 430px);
	background-color:white;
	position:absolute;
	left:420px;
	top:445px;
}
.user
{
	width:200px;
	height:200px;
	position:absolute;
	top:50px;
	left:100px;
}
.atdetails
{
	position:absolute;
	top:275px;
	left:20px;
	font-size:18px;
	font-weight:bold;
	font-family:tahoma;
}

a{
color: white;
text-decoration: none;
padding:12px 20px; 
font-family:tahoma;
}
a:hover {
opacity: 0.6;
}
::-webkit-scrollbar{display:none;}

</style>
</head>
<body>

<img class="explore" src="img/img2.jpg" width="100%" height="400px" alt="explore">
<?php
include_once('dbcon.php');
session_start();

$username = $_SESSION["username"];

$result = mysqli_query($con, "SELECT * FROM signup WHERE name='$username'");
$row = mysqli_fetch_assoc($result);


if ($row['Type'] == "artist") {
?>
    <a href='myprofile/myarts.php' target="frm1" style="position:absolute;top:405px;left:calc(70% - 625px);" > My Arts</a>
    <a href='myprofile/upload.php' target="frm1" style="position:absolute;top:405px;left:calc(70% - 395px);" > Upload</a>
    <a href='myprofile/myorder.php' target="frm1" style="position:absolute;top:405px;left:calc(70% - 295px);" > My Order</a>

<?php
} else {
    echo '<a href="myprofile/myorder.php" target="frm1" style="position:absolute;top:405px;left:calc(70% - 625px);" > My Order</a>';
}
?>  
<a href='main.html' style="position:absolute;top:405px;right:calc(100% - 90px);"> Home</a>
<a href='login.html' style="position:absolute;top:405px;left:calc(100% - 120px);">SignOut</a>    
<div class="details">

    <img class="user" src="user.png" alt="explore">
    <div class="atdetails">
        <p>NAME : <?php echo $_SESSION["username"]; ?> </p>
        <p>EMAIL : <?php echo $row['Email']; ?></p>
        <p>TYPE : <?php echo $row['Type']; ?></p>
        <p>PHN NO. : <?php echo $row['Phnno']; ?></p>
        <p>ADDRESS : <?php echo $row['Address']; ?></p>
    </div>
</div>
</div>
<iframe name="frm1" src="myprofile/myorder.php" style="border:none;height:650px;width:calc(100% - 430px);position:absolute;left:420px;top:445px;overflow:hidden;" ></iframe></body>
</html>
