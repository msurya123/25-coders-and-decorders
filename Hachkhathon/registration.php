<!DOCTYPE html>
<html>
<head>
 <title>Registration Form</title>
 <link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">
	function validate(){
	        var Name= document.form.Name.value;
			var EmailId = document.form.EmailId.value;
			var Password = document.form.Password.value;
			var ConfPass = document.form.ConfPass.value;
		
		
		let email = new RegExp("^[A-Z0-9a-z._%+-]+@[A-Z0-9a-z.-]+.[A-Za-z0-9]$");
		let pass = new RegExp("([A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]*");
		if( Name == "" || Name == null ) {
            alert( "Please enter your Name!" );
			return false;
         }
		if( !email.test(EmailId)) {
            alert( "Please provide a valid Email!" );
            return false;
         }
		 if( !pass.test(Password)){
			alert( "Password should be alphanumeric" );
            return false;
		 }
		 if( Password != ConfPass ) {
            alert( "Password don't match with confirmation password!" );
            return false;
         }
	}
</script>

</head>
<body>

	<br>
    <div class="form_bg">
       <form name="form" method="POST" action="registration.php" onsubmit="return validate()">
		<h1>Registration Form</h1>
       	<input name="Name" type="text" placeholder="Name">
       	<input name="EmailId" type="email" placeholder="Email Id">


        <input name="Password" type="Password" placeholder="Password">
       	<input name="ConfPass" type="Password" placeholder="Confirm Password">
       	<input type="submit" name="submit" value="submit">
<a href="Login.php">If you are already register?Login</a>
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

if(isset($_POST['submit']))
{
$Name=$_POST['Name'];
$EmailId=$_POST['EmailId'];
$Password=$_POST['Password'];

	$sql="insert into registration (Name,Email,Password) values ('$Name','$EmailId','$Password')";
	$ret=mysqli_query($db,$sql);
	//$num=mysqli_affected_rows($ret);
	if($ret)
	echo"You are registered" ;
?>
<html><a href="home.html">home</a></html>
<?php	
}
?>