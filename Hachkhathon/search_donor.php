<!DOCTYPE html>
<html>
<head><style>
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
	background: ocher
	;
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
<body>
<center><font size="10" color="red">Blood Bank Management System</font></center>
<ul>
 <li> <a href="home.html">Home</a></li>
  <li><a href="blood_bank.php">Blood Bank List</a></li>
  <li><a href="donor_registration.php">Become A Donor</a></li>
  <li><a href="search_donor.php">Search Donor</a></li>
    <li><a href="can_cant.html">Who can/Can't Donate</a></li>
  <li style="float:right"><a href="feedback.php">Feedback</a>
</ul>

<center><h1> Search for Donor </h1></center>
<?php
$self = $_SERVER['PHP_SELF'];
?>
<form action="search_donor.php" method="GET">
Enter BloodGroup : <input type="text" name="bldgp" />
<input type="hidden" name="search" />
<input type="submit" value = "Search" />
</form>
<?php
if(isset($_GET['search'])) {
$dbh=mysqli_connect("localhost","root","no","hackathon")or die(mysql_error());
$bgp=$_GET['bldgp'];
echo "<p>Searching for $bgp...</p>";
$query=mysqli_query($dbh,"SELECT * FROM donor_registration WHERE blood_group like '%$bgp%'");
if(mysqli_num_rows($query) > 0) {
?>
<table border="1" style="border-collapse:collapse; color:#404040">
<tr>
<th>donarname</th>
<th>blood_group</th>
<th>mobile_number</th>
<th>address</th>
</tr>
<?php
while ($row=mysqli_fetch_array($query))
{
echo "<tr> <td>$row[1]</td> <td>$row[2]</td> <td>$row[4]</td> <td>$row[5]</td> </tr>";
}
} else
echo "<p><b> No matches found... </b></p>";
mysqli_free_result($query);
mysqli_close($dbh);
}
?>
</table>
</body>
</html>