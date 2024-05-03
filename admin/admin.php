<html>
<head>
<style>
body{
background-color:white;
overflow:hidden;

}
.cont{
background-color:black;
width:100%;
height:30px;
padding:8px;
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

.cont a{
	color: white;
text-decoration: none;
font-family:tahoma;
font-size:20px;
padding:10px;
padding-left:50px;
}
.cont a:hover{
	opacity:0.6;
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
	height:675px;
	}

</style>
</head>
<body>
<div class="cont">

	<a href='arts.php' target='frm' > Arts</a>
	<a href='userdetails.php' target='frm' > User Details</a>
	<a href='orderdetails.php' target='frm' > Order Details</a>
	<a href='query.php' target='frm' > Queries</a>
	<a href='comp.php' target='frm' >Competition	<a>
	<a href='../login.html' style="margin-left:550px;"  >Sign Out	<a>

</div>
<iframe name="frm" src="arts.php"></iframe>
</body>
</html>