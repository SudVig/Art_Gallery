<?php

include_once('../dbcon.php');

session_start();

$name=$_SESSION["username"];
$a=0;

date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");

if(isset($_POST["upload"]))
{$res=mysql_query("select * from competition");
if($row=mysql_fetch_array($res))
{
	echo"VANTHRU";
}
}
?>

<html>
<head>
<style>
.box{
	background-color:#da0754;
	width:75%;
	
	position:absolute;
	margin-left:10%;
}
hr{
	background-color:white;
	padding:5px;
}
h1{
	color:white;
	text-align:center;
	
	font-weight:bold;
	font-family:tahoma;
	font-size:24px;
}
h3{
	color:Black;
	text-align:center;
	
	font-weight:bold;
	font-family:tahoma;
	font-size:18px;

	
	
	
}

body{
	background-color:white;
}

h2{
	color:white;
	margin-left:20px;
	font-weight:bold;
	font-family:tahoma;
	font-size:20px;
}
p{
	color:black;
	margin-left:20px;
	font-weight:bold;
	font-family:tahoma;
	font-size:18px;
}
.upload{
	background-color:white;
	color:black;
	border:none;
	font-family:tahoma;
	font-size:18px;
	width:120px;
	height:30px;
	border-radius:20px;
	margin-left:44%;
}
input[type='submit']{
	background-color:red;
	color:white;
	border:none;
	font-family:tahoma;
	font-size:18px;
	width:120px;
	height:30px;
	border-radius:20px;
	margin-left:30%;
}

input[type='submit']:hover,.upload:hover{
	
	background-color:black;
	color:white;
}
form{
	background-color:white;
	width:350px;
	height:160px;
	padding:20px;
	margin-left:33%;
	border-radius:20px;
	
}
table{
	width:75%;
	margin-left:12.5%;
	background-color:white;
	height:100%;
}
tr{
	background-color:red;
	width:100%;
}

</style>
</head>
<body>
<?php

date_default_timezone_set("Asia/Kolkata");
$date = strtotime(date("Y-m-d"));
 $res=mysql_query("select * from competition where status='on'");
 
echo '<table>';
while($row=mysql_fetch_array($res)){
	if(strtotime($row['edate'])<=$date){
echo '<td>';
echo '<h1>',$row['cname'],'<h1></td><tr>';
echo '<td><br><p>Starting Date :', $row['sdate'],'</p>';
echo '<p>Ending Date :', $row['edate'],'</p>';
echo '<p>Description :', $row['description'],'</p>';
echo '<br></td><tr>';

echo '<td><br>
		<form action="cupload.php" method="POST"  enctype="multipart/form-data">
			<h3>Upload The File (only .jpg,.png)</h3>
			<h3><input type="file" name="cart"required=""></h3>
			<br>
			<input type="submit" name="submit" value="Particiapate">';
			echo '</form></td><tr>';
	}
} 
echo '</table>';

?>

	

  </body>
    </html>