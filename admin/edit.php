<?php
include_once('../dbcon.php');
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");

$cid=$_POST['cid'];
$res=mysqli_query($con, "SELECT * FROM competition WHERE cid='$cid'");

echo '<table>';
$row=mysqli_fetch_array($res);
if(isset($_POST["update"])){
    $cid=$_POST['cid'];
    $cname=$_POST["cname"];
    $sdate=$_POST["sdate"];
    $edate=$_POST["edate"];
    $description=$_POST["description"];
    if(strtotime($edate) < strtotime($date) or strtotime($edate) < strtotime($sdate)){
        echo '<p style="position:absolute;top:460px;left:538px;color:red;">enter a valid date</p>';
        
    }    
    elseif(mysqli_query($con, "UPDATE competition SET cname='$cname', sdate='$sdate', edate='$edate', description='$description' WHERE cid=$cid")) {
        echo '<script>alert("done");location="comp.php";</script>';
    }
}
?>

<html>
<head>
<style>
.box{
padding-top:10px;
padding-bottom:169px;
  
height:400px;

}
.heading{
font-family:Tahoma;
font-weight:bold;
font-size:24px;
text-align:center;
position:absolute;
top:20%;
left:44%}
input{
border:1px solid black;
}
input:focus{
border:none;
}
form{
   background: linear-gradient(to bottom, #00ffcc 0%, #ffff66 98%);
border:1px solid black;
height:400px;
width:600px;
margin-left:400px;
margin-top:100px;
display:cover;
}
input[type='submit']{ color:white; font-family:tahoma; font-weight:bold;  background-color:green;}
input[type='submit']:hover{ opacity:0.6;}
.back{
    
text-decoration:none;
text-align:center;
color:white; 
font-family:tahoma; 
font-weight:bold;
 background-color:red;}
.back:hover{ opacity:0.5;}
button{ background-color:white;width:100px;height:40px;border:none; font-family:tahoma; font-weight:bold;}
button:hover{transition:0.2; background-color:black; border:white solid 1px; color: white;}

p{
    font-weight:bold;
}

</style>
<head>
<body>

<div class="box">
<script>
function back(){
    alert(hi);
}
</script>

<form method='POST' action='edit.php'>
<p class="heading">Edit<p>
<p style="position:absolute; top:220px;left:538px;">Competition Name</p>
<input type='text'  value='<?php echo $row["cname"];?>' name='cname' required='' style="position:absolute; top:275px;left:530px;">
                         <input type="hidden" name="cid" value= '<?php echo $cid;?>'>

<p style="position:absolute; top:300px;left:538px;">Start Date</p>
<input type='date' name='sdate' required='' value='<?php echo $row["sdate"];?>' style="position:absolute; top:350px;left:532px;">

<p style="position:absolute; top:385px;left:538px;">End Date</p>
<input type='date' name='edate' value='<?php echo $row["edate"];?>' required='' style="position:absolute; top:440px;left:532px;">

<p style="position:absolute; top:220px;left:738px;">Description</p>
<textarea name='description' style="position:absolute; top:275px;left:730px; height:100px;width:200px"><?php echo $row["description"];?></textarea>

<input type="submit" value='Update' name='update' style='position:absolute;left:768px;top:385px;height:50px;width:100px;'>
<a href="comp.php" style='position:absolute;left:768px;top:455px;width:55px;padding-left:23px;padding-right:23px; padding-bottom:10px;padding-top:10px;' class="back">Back</a>

</div>
</form>
</body>
</html>
