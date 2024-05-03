<html>
<head>
<style>
.upd
{
	background-color:black;
	position:absolute;
	top:10%;
	left:30%;
	padding:70px 40px;
	border-radius:20px;
}

p
{
	color:#ff8533;
	font-size:15px;
	font-weight: bold;
}
input[type="submit"]{
border: none;
outline:none;
height:40px;
width:200px;
color:#fff;
background:blue;
font-size:18px;
border-radius:20px;
}
input[type="submit"]:hover{
	opacity:0.6;
}
input[type="file"]{ color:white;}
body
{
	background:white;
}

</style>
</head>
<body>
<?php
include_once('../dbcon.php');
session_start();
$name = $_SESSION["username"];
$a = 0;

if (isset($_POST["upload"])) {
    $price = $_POST['price'];
    $arttype = $_POST['arttype'];
    $description = $_POST['description'];
    $artname = $_FILES['art']['name'];
    $artimg = addslashes(file_get_contents($_FILES['art']['tmp_name']));
    if (mysqli_query($con, "INSERT INTO arts (name, artname, artimg, price, arttype, description) VALUES ('$name','$artname','$artimg','$price','$arttype','$description')")) {
        $a = 1;
    }
}
?>
<div class="upd">
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <p>Upload The File (only .jpg,.png)</p>
        <input type="file" name="art" required="">
        <p> Price</p>
        <input type="text" name="price" placeholder="Enter the art price" required="" autocomplete="off" maxlength="20">
        <p> Choose the art type</p>
        <select name="arttype" style="padding-left:10px;">
            <option value="photographs">Photographs</option>
            <option value="drawings">Drawings</option>
            <option value="paintings">Paintings</option>
        </select>
        <p>Description</p>
        <textarea name="description" cols="45" rows="5" required=""></textarea>
        <br>
        <br>
        <input type="submit" name="upload" value="upload">
    </form>

    <?php
    if ($a == 1 and isset($_POST["upload"])) {
        echo '<p style="color:#ff8533;">uploaded</p>';
    } elseif ($a == 0 and isset($_POST["upload"])) {
        echo '<p style="color#ff8533;">sorry your file is not uploaded</p>';
    }

    ?>
</div>
</body>
</html>
