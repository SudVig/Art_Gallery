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

</style>
</head>

<body>
<table>
<?php
include_once('../dbcon.php');
session_start();
$username = $_SESSION["username"];

$res = mysqli_query($con, "SELECT * FROM orders WHERE pusername='$username' ORDER BY date");
echo '<tr>';
echo '<td><p class="heading">Image id</p></td>';
echo '<td><p class="heading">Art Name</p></td>';
echo '<td><p class="heading">Price</p></td>';
echo '<td><p class="heading">Art Type</p></td>';
echo '<td><p class="heading">Date</p></td>';
echo '<td><p class="heading">Deliver Status</p></td>';
echo '</tr>';

while ($row = mysqli_fetch_array($res)) {
	
    echo '<tr>';
    echo '<td>' . $row["Imgid"] . '</td>';
    echo '<td>' . $row["artname"] . '</td>';
    echo '<td>' . $row["price"] . '</td>';
    echo '<td>' . $row["Arttype"] . '</td>';
    echo '<td>' . $row["Date"] . '</td>';
    echo '<td>' . $row["Deliverstatus"] . '</td>';
    echo '</tr>';
}
?>
</table>
</body>
</html>
