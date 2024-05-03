<?php

include_once('../dbcon.php');

session_start();
$username= $_SESSION["username"];
$sql='select * from signup';
$retval= mysqli_query($con,$sql);
$a=0;
while($row=mysqli_fetch_array($retval))
{
	if($row['Name']==$username and $row['Type']=='artist'){
		$a+=1;
	}
}
echo $a;
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");

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
th{
	background-color:black;
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
	background-color:white;
	color:red;
	border:none;
	font-family:tahoma;
	font-size:18px;
	width:120px;
	height:30px;
	border-radius:20px;
	margin-left:27%;
}

input[type='submit']:hover,.upload:hover{
	
	background-color:black;
	color:white;
}
form{
	margin-left:23%;
	
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
.info{
	color:white;
	font-size:20px;
	font-family:tahoma;
	font-weight:bold;
	margin-left:27%;
}
.info1{
color:white;
	font-size:20px;
	font-family:tahoma;
	font-weight:bold;
	margin-left:25%;
}
</style>
</head>
<body>
<?php

date_default_timezone_set("Asia/Kolkata");
$date = strtotime(date("Y-m-d"));
 $res=mysqli_query($con,"select * from competition where status='on' ORDER BY sdate DESC");
 
echo '<table>';
while($row=mysqli_fetch_array($res)){



echo '<tr><th>';
echo '<h1>'," ",$row['cname'],'<h1></th><tr>';
echo '<td><br><p>Starting Date :', $row['sdate'],'</p>';
echo '<p>Ending Date :', $row['edate'],'</p>';
echo '<p>Description :', $row['description'],'</p>';
echo '<br>';

echo '<br>';?>

		<form action="cupload.php" method="POST"  enctype="multipart/form-data">
						 <input type="hidden" name="cid" value= '<?php echo $row["cid"];?>'>

		<?php if($a==1 and strtotime($row['edate'])>=$date and strtotime($row['sdate'])<=$date){ ?>
			<input type="submit" name="submit" value="Particiapate">
			
		<?php	}
		elseif (strtotime($row['sdate'])>$date){ 
		echo '<p class="info">Coming Soon</p>';
		}
		elseif (strtotime($row['edate'])<$date){ 
		echo '<p class="info1">Competition Ended</p>';
		}
echo '</td></form><tr>';
} 
echo '</table>';

?>

	

  </body>
    </html>