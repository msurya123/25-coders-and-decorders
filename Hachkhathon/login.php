<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="Update_Data.js"></script>
	
    
    <title>Login</title>
</head>
<body>

    <br>
    <div class="form_bg">
        <form name="form" method="POST" action="login.php" onsubmit="return validate()">
            <h2>Login</h2>
            <input type="email" name="EmailId" placeholder="Enter Your mail">
        
            <input type="password" name="Password" placeholder="Password">
        
            <input type="submit" name="submit" value="submit">
			<a href="registration.php">If you are new user?Register here</a>
        </form>
    </div>
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
if(isset($_GET['submit'])) {
$EmailId=$_GET['EmailId'];
$query=mysqli_query($db,"SELECT * FROM registration WHERE Email like '%$EmailId%'");
$row=mysqli_fetch_array($query)
if($row)
{
if($row[4]==$Password)
{
	echo"welcome";
}
else{
	echo"invalid password";
}
else
{
	echo"invalid user";
}
}
}
?>
	
		