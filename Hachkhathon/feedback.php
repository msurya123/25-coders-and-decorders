<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #004512;
}

.active {
  background-color: #4CAF50;
}

* { margin: 0px; padding: 0px; }
body {
	font-size: 120%;
	background: #F8F8FF;
}
.header {
	width: 40%;
	margin: 50px auto 0px;
	color: white;
	background: #5F9EA0;
	text-align: center;
	border: 1px solid #B0C4DE;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
}
form, .content {
	width: 40%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background: ;
	border-radius: 0px 0px 10px 10px;
}
.input-group {
	margin: 10px 0px 10px 0px;
}
.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
}
.input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
#user_type {
	height: 40px;
	width: 98%;
	padding: 5px 10px;
	background: white;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #5F9EA0;
	border: none;
	border-radius: 5px;
}
.error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
}
.success {
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	margin-bottom: 20px;
}
.profile_info img {
	display: inline-block; 
	width: 50px; 
	height: 50px; 
	margin: 5px;
	float: left;
}
.profile_info div {
	display: inline-block; 
	margin: 5px;
}
.profile_info:after {
	content: "";
	display: block;
	clear: both;
}

</style>

</head>
<center><font size="10" color="red">Blood Bank Management System</font></center>
<ul>
 <li> <a href="home.html">Home</a></li>
  <li><a href="blood_bank.php">Blood Bank List</a></li>
  <li><a href="donor_registration.php">Become A Donor</a></li>
  <li><a href="search_donor.php">Search Donor</a></li>
    <li><a href="can_cant.html">Who can/Can't Donate</a></li>
  <li style="float:right"><a href="feedback.php">Feedback</a>
</ul>

<body>
<center>
	<h1> Feedback Form</h1>
</center>
<form method="POST" action="feedback.php">
	<table><tr>
			<td>Name:</td>
			<td ><input type="text" name="Name"></td>
		</tr>
		
		<tr>
			<td> Email:</td>
			<td ><input type="text" name="email" ></td>
		</tr>
		<tr>
			<td> Feedback:</td>
			<td ><input type="text" name="fed"></td>
		<tr>
			<td> Submit:</td>
			<td ><input type="submit" name="sbt" ></td>
		</tr>
	</table>
	
</form>
</body>
</html>

<?php
$db=mysqli_connect("localhost","root","no","hackathon");
if(!$db)
{
	die("Database not connected".mysqli_connect_error());
}
else
{
	echo "";
}

if(isset($_POST['sbt']))
{
$name=$_POST['Name'];
$mail=$_POST['email'];
$fed=$_POST['fed'];

if (empty($name)||empty($mail)||empty($fed))
 {
	echo"You cannot leave fields empty";
}
	else
	{
	$sql="insert into feedback(name,email,feedback) values ('$name','$mail','$fed')";
	$ret=mysqli_query($db,$sql);
	//$num=mysqli_affected_rows($ret);
	if($ret)
	echo"feedback given";
	}
}
?>