<?php
$EmailId=$_POST['EmailId'];
$Password=$_POST['Password'];

$servername="localhost";
$username="root";
$password="no";
$database="hackathon";

$conn=new mysqli($servername,$username,$password,$database);
if($conn->connect_error){
	die('connection failed:' .$conn->connection_error);
}
else{
	
$reg = $conn->prepare("select * from registration where EmailId = ?");
	$reg->bind_param("s",$EmailId);
	$reg->execute();
	$reg_result = $reg->get_result();
	if($reg_result->num_rows > 0){
	$data = $reg_result->fetch_assoc();
	  if(!$data['Password']===$Password)
	echo"<h2>Invalid Email or password</h2>";
		
	}
	else{
	echo"<h2>Invalid Email or password</h2>";
}
}	
?>
<!DOCTYPE html>
<html>
<head>

<style>
ul {
  list-style-type: none;
  margin: 10;
  padding: 20;
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


* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
 </style></head>
<body>
<center><font size="10" color="#FF0000"><center>Blood Bank Management System</center></font></center>
<ul>
 <li> <a href="home.html">Home</a></li>
  <li><a href="blood_bank.php">Blood Bank List</a></li>
  <li><a href="donor_registration.php">Become A Donor</a></li>
  <li><a href="search_donor.php">Search Donor</a></li>
    <li><a href="can_cant.html">Who can/Can't Donate</a></li>
  <li style="float:right"><a href="feedback.php">Feedback</a>
</ul>


<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="banner1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="banner2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="banner3.png" style="width:100%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script> 
</body>
</html>