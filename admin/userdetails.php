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

tr:hover{background-color:#8A33FF;}
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

$res = mysqli_query($con, "SELECT * FROM signup");
echo '<tr>';
echo '<td><p class="heading">Id</p></td>';
echo '<td><p class="heading">Name</p></td>';
echo '<td><p class="heading">Email</p></td>';
echo '<td><p class="heading">Password</p></td>';
echo '<td><p class="heading">Phone Number</p></td>';
echo '<td><p class="heading">Address</p></td>';
echo '<td><p class="heading">User Type</p></td>';
echo '<td><p class="heading">Date</p></td>';
echo '</tr>';

while ($row = mysqli_fetch_assoc($res)) {
    echo '<tr>';
    echo '<td>' . $row["Id"] . '</td>';
    echo '<td>' . $row["Name"] . '</td>';
    echo '<td>' . $row["Email"] . '</td>';
    echo '<td>' . $row["Pswd"] . '</td>';
    echo '<td>' . $row["Phnno"] . '</td>';
    echo '<td>' . $row["Address"] . '</td>';
    echo '<td>' . $row["Type"] . '</td>';
    echo '<td>' . $row["Date"] . '</td>';
    echo '</tr>';
}

mysqli_close($con);
?>

</table>
</body>
</html>