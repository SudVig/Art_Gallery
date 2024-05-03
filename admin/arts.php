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

$res = mysqli_query($con, "SELECT * FROM arts ORDER BY status");
echo '<tr>';
echo '<td><p class="heading">Image id</p></td>';
echo '<td><p class="heading">Artist Name</p></td>';
echo '<td><p class="heading">Art Name</p></td>';
echo '<td><p class="heading">Arts</p></td>';
echo '<td><p class="heading">Price</p></td>';
echo '<td><p class="heading">Art Type</p></td>';
echo '<td><p class="heading">Description</p></td>';
echo '<td><p class="heading">Status</p></td>';
echo '<td><p class="heading">Art Status</p></td>';
echo '<td><p class="heading">Verify</p></td>';
echo '</tr>';

while ($row = mysqli_fetch_assoc($res)) {
    echo '<tr>';
    echo '<td>'; echo $row["Imgid"]; echo '</td>';
    echo '<td>'; echo $row["Name"]; echo '</td>';
    echo '<td>'; echo $row["Artname"]; echo '</td>';
    echo '<td>'; echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Artimg']) . '" height="150" width="250"/>'; echo '</td>';
    echo '<td>'; echo $row["Price"]; echo '</td>';
    echo '<td>'; echo $row["Arttype"]; echo '</td>';
    echo '<td>'; echo $row["Description"]; echo '</td>';
    echo '<td>'; echo $row["Status"]; echo '</td>';
    echo '<td>'; echo $row["Artstatus"]; echo '</td>';
    ?>
    <form action="arts.php" method="POST">
        <input type="hidden" name="imgid" value=<?php echo $row["Imgid"]; ?>>
        <?php
        echo '<td>'; echo '<input type="submit" name="verify" value="Verify Images"></form>'; echo '</td>';
    echo '</tr>';
}

if (isset($_POST['verify'])) {
    $imgid = $_POST['imgid'];
    mysqli_query($con, "UPDATE arts SET Status='verified' WHERE Imgid=$imgid");
    echo '<script>window.location="arts.php";</script>';
}
?>
</table>
</body>
</html>
