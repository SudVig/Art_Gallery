<html>
<head>
<style>
h1
{
color:#ff8533;
text-align:center;
font_weight:bold;
font-family:tahoma;
}
body
{ 
	background-color:;
}
p
{
color:#ff8533;
font-size:22px;
font_weight:bold;
font-family:tahoma;
}
input[type=textarea]{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
 
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  color:#fff;
  background:#2196f3;
  font-size:18px;
  border-radius:20px;
}

input[type="submit"]:hover{
cursor:pointer;
background:#0097a7;
}
.cont
{
	background-color:white;
	position:absolute;
	top:20%;
	left:35%;
	height:530px;
	width:480px;
	border-radius:20px;
}
.cont1
{
	position:absolute;
	left:10%;

}

</style>
</head>
<body>
<div class="cont">
<h1>Contact Us</h1>
<hr>
<div class="cont1">

<form method='POST'>
<br>
		<p> Email</p>
		<input type ="Email" name = "email" required= " " autocomplete="off" maxlength="40">
	<br>
	<br>

		<p>Description</p>
		<textarea name="description" id="textarea" cols="45" rows="5"></textarea>
    <br>
	<br>
	<input type="submit" name='send' value="send">
	</form>
<?php
if(isset($_POST['send'])){
	include_once('dbcon.php');
	session_start();
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");

	$email=$_POST['email'];
	$description=$_POST['description'];
	$name=$_SESSION["username"];
	if(mysqli_query($con,"insert into contactus (Name,Email,description,Date) values ('$name','$email','$description','$date')"))
echo '<p>message sent, we will contact you soon</p>';
}
?>
  </div>
  </div>

</body>
</html>
