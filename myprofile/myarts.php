<html>
<head>
<style>
body{background-color:white;}
table{
width:100%;}
td{background-color:white;padding:18px 18px;font-size:18px;font-weight:bold;}
	p{color:white;}
	h1{color:white;}
.head{color:#ff8533;text-align:center;font-size:20px;font-weight:bold;font-family:tahoma;}
tr{color:back}
</style>
</head>
<body><?php
include_once('../dbcon.php');
session_start();
$username=$_SESSION["username"];

$res = mysqli_query($con, "select * from arts where name='$username'");
echo "<table>";
?>
<td><p class='head'>Arts</p></td><td><p class='head'>Art Name</p></td><td><p class='head'>Price</p></td><td><p class='head'>Description</p></td><td><p class='head'>Status</p></td><td><p class='head'>art type</p></td>
<?php   

while($row = mysqli_fetch_array($res))
{  
 
   echo "<tr>";	
   echo "<td>"; 
   echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Artimg'] ).'" height="150" width="250"/>';
   echo "</td>";
   echo'<td>';
   echo $row['Artname'];
   echo '</td>';
   echo '<td style="">';
   echo $row['Price'];
   echo '</td><td>';
   echo $row['Description'];
   echo '</td>';
   echo '</td><td>';
   echo $row['Status'];
   echo '</td>';
   echo '</td><td>';
   echo $row['Arttype'];
   echo '</td>';
   echo "</tr>";
}
echo "</table>";
?> 
</body>
</html>
