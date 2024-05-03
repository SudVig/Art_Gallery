<?php 
include_once('dbcon.php');
session_start();
$paint=mysqli_query($con, "select * from arts where arttype='paintings' ORDER BY imgid desc");
$draw=mysqli_query($con, "select * from arts where arttype='drawings' ORDER BY imgid desc");
$photo=mysqli_query($con, "select * from arts where arttype='photograph' ORDER BY imgid desc");
?>
<html>
<head>
<style>
body {
    background-color: white;
}

td {
    background-color: black;
    padding: 20px 20px;
}

a {
    color: white;
    text-decoration: none;
    padding: 12px 20px; 
    font-family: tahoma;
    background-color: red;
    border-radius: 20px;
}

a:hover {
    opacity: 0.6;
}

table {
    margin: 20px;
}

p {
    color: #ff8533;
    text-align: center;
    font-size: 24px;
}
</style>
</head>
<body>
<hr>
<p>PAINTINGS</p>
<table>
<hr>
<?php 
$i=0;
while ($i<5 and $row=mysqli_fetch_array($paint)) {
    if ($row['Status']=='verified' and $row['Artstatus']=='unsold') {
        echo '<td><img src="data:image/jpeg;base64,'.base64_encode($row['Artimg']).'" height="150" width="250"/><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="arts/paintings.php">Buy Now</a></td>';
        $i=$i+1;
    }
}
?>
</table>
<hr>
<p>DRAWINGS</p>
<table>
<hr>
<?php 
$i=0;
while ($i<5 and $row=mysqli_fetch_assoc($draw)) {
    if ($row['Status']=='verified' and $row['Artstatus']=='unsold') {
        echo '<td><img src="data:image/jpeg;base64,'.base64_encode($row['Artimg']).'" height="150" width="250"/><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="arts/drawings.php">Buy Now</a></td>';
        $i=$i+1;
    }
}
?>
</table>
<hr>
<p>PHOTOGRAPHS</p>
<table>
<hr>
<?php 
$i=0;

while ($i<5 and $row=mysqli_fetch_assoc($photo)) {
    if ($row['Status']=='verified' and $row['Artstatus']=='unsold') {
        echo '<td><img src="data:image/jpeg;base64,'.base64_encode($row['Artimg']).'" height="150" width="250"/><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="arts/photographs.php">Buy Now</a></td>';
        $i+=1;
    }
}
?>
</table>
<hr>
</body>
</html>
