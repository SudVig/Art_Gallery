<html>
<head>
<style>
body{
background-color:white;
overflow:auto;
}
.cont{
background-color:black;
width:100%;
height:40px;
}
input[type='submit']{
padding-left:10px;
padding-right:10px;
border: none;
outline:none;
height:40px;
width:200px;
color:white;
background:black;
font-size:18px;
font-family:tahoma;
font-weight:bold;

}
input[type='submit']:hover{
background-color:#FF5733;
color: black;
}
p{
	color:black;
}
table{
	
	width:100%;
}
.heading
{
	font-weight:bold;
	font-size:20px;
	font-family:tahoma;
	text-align:center;
}
td{
	text-align:center;
	font-size:18px;
	font-family:tahoma;
}
iframe{
	width:100%;
	height:1000px;

}
</style>
</head>

<body>
<table>
<?php
include_once('../dbcon.php');
		 $res=mysqli_query($con,"select * from contactus order by date desc");
		 echo '<tr>';
		 echo '<td><p class="heading">Image id</p></td>';
		 echo '<td><p class="heading">Name</p></td>';
		 echo '<td><p class="heading">Description</p></td>';
		 echo '<td><p class="heading">Email</p></td>';
		 echo '<td><p class="heading">Date</p></td>';
		 echo '</tr>';
		 
		  while($row=mysqli_fetch_array($res))
		  {	
			
			
			echo'<tr>';
			 echo'<td>'; echo $row["Id"]; echo'</td>';  
			 echo'<td>'; echo $row["Name"]; echo'</td>';			 
			 echo'<td>'; echo $row["description"]; echo'</td>';
			 echo'<td>'; echo $row["Email"]; echo'</td>'; 
			 echo'<td>'; echo $row["Date"]; echo'</td>'; 
		}
	?>
	
</table>
</body>
</html>