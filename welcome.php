<!DOCTYPE html>
<html lang="en">
<?php 
include('./db_connect.php');
ob_start();
if(!isset($_SESSION['system'])){
	// $system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	// foreach($system as $k => $v){
	// 	$_SESSION['system'][$k] = $v;
	// }
}
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gym Management System</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php");

?>

</head>
<style>
	
  * {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 80px;
  text-align: center;
  background: #1abc9c;
  color: white;
}

/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  background-color: #f1f1f1;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}
.fakeimg1 {
  background-color: #ffffff;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row {   
    flex-direction: column;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width: 100%;
  }
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
<body>
<div class="header">
  <h1>GYM online</h1>
  <p>Welcome to GYM online</p>
</div>

<div class="topnav">
  <a href="login.php">Home</a>
  <a href="#">Contact</a>
  <a onclick="document.getElementById('id01').style.display='block'"  style="float:right">Login</a>
  <a href="register.php" style="float:right">Register</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2>What We have?</h2>
      <h5>We offer different classes, routine, tips, product that suits the best on you.</h5>
      <div class="fakeimg" style="height:200px;">
      <img src="assets/img/yoga.png" alt=""style="height:172px; width:340px; ">
        <img src="assets/img/gymm.jpg" alt=""style="height:172px; width: 330px;">
        <img src="assets/img/gymmm.jpg" alt=""style="height:172px; width:340px;">
        <img src="assets/img/workout.jpg" alt=""style="height:172px; width: 340px;">
        </div>
      
    </div>
    <div class="card">
    <h2>Join Now!</h2>
    <h5>You can join and grab different classes, routine, tips, product that suits the best on you.</h5>
      <div class="fakeimg" style="height:200px;">
      <img src="assets/img/healthy.jpg" alt=""style="height:172px; width:340px;">
        <img src="assets/img/yoga.jpg" alt=""style="height:172px;  width: 330px;">
        <img src="assets/img/work.jpg" alt=""style="height:172px; width:340px;">
        <img src="assets/img/muscle.jpeg" alt=""style="height:172px; width:340px; ">
      </div>
      
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>About Developers</h2>
      <div class="fakeimg1" style="height:100px;">
      <img src="assets/img/juaneil.jpg" alt=""style="height: 100px;">
      <img src="assets/img/lim.jpg" alt=""style="height: 100px;">
      <img src="assets/img/jing.jpg" alt=""style="height: 100px;">
      <img src="assets/img/carl.jpg" alt=""style="height: 100px;">
      </div>
      <br>
      <p>The developer of this project are from BSIT-IT32S1</p>
    </div>
    <div class="card">
      <h3>Popular Exercise</h3>
      <div class="fakeimg1"><p>Yoga — is a mind and body practice. Various styles of yoga combine physical postures, breathing techniques, and meditation or relaxation. Yoga is an ancient practice that may have originated in India. It involves movement, meditation, and breathing techniques to promote mental and physical well-being.</p></div>     
      <div class="fakeimg1"><p>Strength training — also known as weight or resistance training — is physical activity designed to improve muscular fitness by exercising a specific muscle or muscle group against external resistance, including free-weights, weight machines, or your own body weight, according to the American Heart Association.</p></div>
      <div class="fakeimg1"><p>Zumba — is a fitness program that combines Latin and international music with dance moves. Zumba routines incorporate interval training — alternating fast and slow rhythms — to help improve cardiovascular fitness.</p></div>
      <div class="fakeimg1"><p>Dance — the movement of the body in a rhythmic way, usually to music and within a given space, for the purpose of expressing an idea or emotion, releasing energy, or simply taking delight in the movement itself.</p></div>
    </div>

  </div>
</div>

<div class="footer">
  <h2>Follow us on:<a href="#"> <img src="assets/img/facebook.png" alt="" style="height: 40px;"> </a><a href="#"> <img src="assets/img/instagram.png" alt="" style="height: 40px;"> </a></h2>
</div>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="session.php" method="get">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="assets/img/barbell.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>


</div>
</div>


</body>
<script>
  
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>	

</html>