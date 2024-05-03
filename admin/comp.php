<?php
include_once('../dbcon.php');
if(isset($_POST['create'])){

$cname=$_POST["cname"];
$sdate=$_POST["sdate"];
$edate=$_POST["edate"];
$description=$_POST["description"];

date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");
}
?>

<html>
<head>
<style>
.box{
padding-top:10px;
padding-bottom:169px;
  
height:400px;
display:none;
}
h1{
text-align:center;
}
input{
border:1px solid black;
}
input:focus{
border:none;
}
.box form{
   background: linear-gradient(to bottom, #00ffcc 0%, #ffff66 98%);
border:1px solid black;
height:400px;
width:600px;
margin-left:400px;
margin-top:100px;
display:cover;
}
.box input[type='submit']{ color:white; font-family:tahoma; font-weight:bold;  background-color:green;}
.box input[type='submit']:hover{ opacity:0.6;}
input[type='reset']{ color:white; font-family:tahoma; font-weight:bold; background-color:red;}
input[type='reset']:hover{ opacity:0.6;}
button{ background-color:white;width:100px;height:40px;border:none; font-family:tahoma; font-weight:bold;}
button:hover{transition:0.2; background-color:black; border:white solid 1px; color: white;}


.box2{display:none;}
p{
	font-weight:bold;
}

table{
	width:100%;
	
}
th{
	font-family:Tahoma;
	font-weight:bold;
	font-size:20px;
	text-align:center;
	
}
td{
	
	font-family:tahoma;
	font-size:18px;
	text-align:center;
	
}
.edit{
padding-left:10px;
padding-right:10px;
border: none;
outline:none;
height:40px;
width:100px;
color:white;
background:black;
font-size:18px;
font-family:tahoma;
font-weight:bold;
}
.edit:hover{
background-color:#FF5733;
color: black;
}
.delete{
padding-left:10px;
padding-right:10px;
border: none;
outline:none;
height:40px;
width:100px;
color:white;
background:red;
font-size:18px;
font-family:tahoma;
font-weight:bold;
}
.delete:hover,.change:hover{
	border: 3px solid red;
	background-color:white;
	color:red;
	

}

.change{
	background-color:red;
	border:3px solid red;
	color:white;
	font-family:tahoma;
font-weight:bold;

}

</style>
</head>
<body>

<script> function box() {

document.getElementById("box").style.display = "block";
document.getElementById("box1").style.display = "none";
document.getElementById("box2").style.display = "none";
}
function box1() {
document.getElementById("box1").style.display = "block";
document.getElementById("box").style.display = "none";
document.getElementById("box2").style.display = "none";
}
function box2() {
document.getElementById("box2").style.display = "block";

document.getElementById("box").style.display = "none";
document.getElementById("box1").style.display = "none";

}
 </script>
 <button onclick="box1()">view</button>
<button onclick="box()">Schedule</button>

<button onclick="box2()">Winner</button>
<hr>
<div class='box' id='box'>
<?php

if(isset($_POST['create'])){

if(strtotime($sdate) < strtotime($date)){
	echo '<p style="position:absolute;top:360px;left:538px;color:red;">enter a valid date</p>';
	
	}
elseif(strtotime($edate) < strtotime($date) or strtotime($edate) < strtotime($sdate)){
	echo '<p style="position:absolute;top:460px;left:538px;color:red;">enter a valid date</p>';
	
	}	
	

else{
	
	$query = "INSERT INTO competition (cname,description,sdate,edate) VALUES ('$cname','$description','$sdate','$edate')";
$retval = mysqli_query($con, $query);
if(! $retval ) { die('could not enter data:'.mysqli_error($con)); }
else{ 
echo'<p style="position:absolute;top:500px;left:50%;color:red;">created successfully</p>'; }
}}

?>

<form method='POST' action='comp.php'>

<h1>Schedule</h1>
<p style="position:absolute; top:220px;left:538px;">Competetion Name</p>
<input type='text' name='cname' required='' style="position:absolute; top:275px;left:530px;">

<p style="position:absolute; top:300px;left:538px;">Start Date</p>
<input type='date' name='sdate' required='' style="position:absolute; top:350px;left:532px;">

<p style="position:absolute; top:385px;left:538px;">End Date</p>
<input type='date' name='edate' required='' style="position:absolute; top:440px;left:532px;">

<p style="position:absolute; top:220px;left:738px;">Description</p>
<textarea name='description' style="position:absolute; top:275px;left:730px; height:100px;width:200px"></textarea>

<input type="submit" value='Create' name='create' style='position:absolute;left:768px;top:385px;height:50px;width:100px;'>

<input type="reset" value='Reset' style='position:absolute;left:768px;top:455px;height:50px;width:100px;'>

</form>

</div>

<div class='box1' id='box1'>
<?php
 $res=mysqli_query($con,"select * from competition order by cid desc");
 echo '<table>';
  echo '<th>Cid</th>';
  echo '<th>Cname</th>';
  echo '<th>Description</th>';
  echo '<th>Sdate</th>';
    echo '<th>Edate</th>';

  echo '<th>Status</th>';
  echo '<th>Winner</th>';
	echo '<th>Edit</th>';
	echo '<th>Delete</th>';
	
while($row=mysqli_fetch_array($res)){
	
	
	echo '<tr><td>',$row['cid'],'</td>';
	echo '<td>',$row['cname'],'</td>';
	echo '<td>',$row['description'],'</td>';
	echo '<td>',$row['sdate'],'</td>';
	echo '<td>',$row['edate'],'</td>';
	echo '<td>',$row['status'],'</td>';
	echo '<td>',$row['winner'],'</td>';
	
if(isset($_POST['delete'])){
	$dcid = $_POST['cid'];
	if(mysqli_query($con, "DELETE FROM competition WHERE cid='$dcid'"))
	{
			echo "<script>alert('Successfully Deleted');location='comp.php';</script>"; 

	}
}
	
	?>
	<td><form action="edit.php" method="POST"><input type="hidden" name="cid" value='<?php echo $row["cid"];?>'>

	<?php
	echo '<input type="submit" class="edit" value="Edit"></form></td>';
	?>
			<td><form action="comp.php" method="POST"><input type="hidden" name="cid" value='<?php echo $row["cid"];?>'>
	<?php
	echo '<input type="submit" class="delete" name="delete" value="Delete"></form></td>';


	echo '<tr>';

}
 echo '</table>';



?>
</div>

<div class='box2' id='box2'>
<table>
<?php
		 $res=mysqli_query($con,"select * from participatedimages");
			  echo '<tr>';
  echo '<th>Cid</th>';
  echo '<th>Cname</th>';
  echo '<th>Cimgid</th>';
    echo '<th>Name</th>';

  echo '<th>Artname</th>';
  echo '<th>ArtImg</th>';
	echo '<th>Date</th>';
	echo '<th>Mark</th>';

	
		  while($row=mysqli_fetch_array($res))
			  
		  {	
		   $res1=mysqli_query($con, "select * from competition ");
			$row1=mysqli_fetch_array($res1);
		  echo'<tr>';
			 echo'<td>'; echo $row["cid"]; echo'</td>'; 
			 echo'<td>'; echo $row1["cname"]; echo'</td>'; 
			 echo'<td>'; echo $row["imgid"]; echo'</td>'; 
			 echo'<td>'; echo $row["name"]; echo'</td>';
			 echo'<td>'; echo $row["artname"]; echo'</td>';

			 echo'<td>'; echo '<img src="data:image/jpeg;base64,'.base64_encode($row['artimg'] ).'" height="150" width="250"/>'; echo'</td>'; 
			 echo'<td>'; echo $row["date"]; echo'</td>'; 
			 echo'<td>'; ?> <form action='comp.php' method='POST'>
			 
			 <input type="hidden" name="cimgid" value= '<?php echo $row["imgid"];?>'>
			 <input type="text" name="mark" value='<?php echo $row["mark"];?>' style="width:35px;">
			 <br><br><input type='submit'  class='change' name='change' value='change' ></form>
			 
			 <?php echo'</td>'; 
			
			
			
		}
		
if(isset($_POST['change'])){
	
	$cimgid=$_POST['cimgid'];
	$mark=$_POST['mark'];
	if(mysqli_query($con, "UPDATE participatedimages SET mark='$mark' WHERE imgid=$cimgid")){
		
			echo '<script>alert("done");location="comp.php";box2();</script>';

	}

}

if (isset($_POST['verify'])) {
    $imgid = $_POST['imgid'];
	$res=mysqli_query($con,"select * from participatedimages where ");
    mysqli_query($con, "UPDATE arts SET status='approved' WHERE Imgid=$imgid");
    echo '<script>window.location="arts.php";</script>';
}
	

		 
		
?>
</table>

</div>
</body>
</html>
