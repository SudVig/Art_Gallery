<?php
include_once('../dbcon.php');
session_start();
 $draw=mysqli_query($con,"select * from arts where arttype='drawings'");
?>
<html>
<head>
<style>
h1{
	color:#ff8533;
	text-align:center;
	
}
body{
	background-color:black;
}
td{
		background-color:white;
		padding:10px 10px;
	
}
.head{color:#ff8533;text-align:center;font-size:20px;font-weight:bold;font-family:tahoma;
}
.box{
	width:500px;
	height:250px;
	font-size:20px;
	text-align:center;
}
.box1{
	width:250px;
	height:250px;
	font-size:20px;
	text-align:center;
}
input[type="submit"]{
border: none;
outline:none;
height:40px;
width:125px;
color:#fff;
background:red;
font-size:18px;
border-radius:20px;
}
input[type="submit"]:hover{
cursor:pointer;
opacity:0.6;
}
table{width:100%; background:white;}
</style>
</head>
<body>
<h1>DRAWINGS</h1>

<table>
<th><p class='head'>Arts</p></th><th><p class='head'>Description</p></th><th><p class='head'>Price</p></th><th><p class='head'>Order</p></th>
<?php   
   while($row=mysqli_fetch_array($draw))
   {   if($row['Status']=='verified' and $row['Artstatus']=='unsold'){
     $p=$row['price'];
echo'<tr><td><img src="data:image/jpeg;base64,'.base64_encode($row['Artimg'] ).'" height="300" width="400"/></td>';
echo "<td class='box'><p>";echo $row['Description']; echo"</p></td>";
echo "<td class='box1'><p>";echo $row['Price']; echo "Rs</p></td>";
echo "<td class='box1'><p>";?>
<form action="../order.php" method="POST">
	<input type="hidden" name="price" value=<?php echo $row["Price"];?>>
	<input type="hidden" name="imgid" value=<?php echo $row["Imgid"];?>>
	<input type="hidden" name="artname" value=<?php echo $row["Artname"];?>>
	<input type="hidden" name="arttype" value=<?php echo $row["Arttype"],'>';
	if($_SESSION['username']!=$row['Name'])
	{ 
	echo '<input type ="submit" value ="order now"></form>';
	}
	else
	{echo"Its Your art! not sold</p></td>";}
	   }}
   
 ?></table></div>
</body>
</html>