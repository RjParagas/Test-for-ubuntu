<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
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
header("location:index.php?page=home");

?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:#59b6ec61;
		display: flex;
		align-items: center;
		background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>);
	    background-repeat: no-repeat;
	    background-size: cover;
	}
	#login-right .card{
		margin: auto;
		z-index: 1
	}
	.logo {
    margin: auto;
    font-size: 8rem;
    background: white;
    padding: .5em 0.7em;
    border-radius: 50% 50%;
    color: #000000b3;
    z-index: 10;
}
div#login-right::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: calc(100%);
    height: calc(100%);
    background: #000000e0;
}
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
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}

.upper{
    background-image: url("assets/img/healthy.jpg");
    background-repeat:no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-color: #cccccc;
    height: 500px;
    position: relative;
}
.text{
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
  
}
</style>
<body>
    <ul>
        <li><a class="active" href="#home">GYM</a></li>
        <li><a href="login.php">Home</a></li>
        <li><a href="#contact.php">Contact Us</a></li>
    </ul>

    <div class="upper">
        <div class ="text">
          <h1 style="text-align: center;">
            <font style="font-size: 62px; font-weight: bold; font-family:Helvetica;">Connect Us with</font>
          </h1>
          <p style="text-align: center;">
          Follow us on
          <a href="https://www.facebook.com/"><img src="assets/img/facebook.png" alt="facebook"> Facebook</a>
          <a href="https://www.instagram.com/"><img src="assets/img/instagram.png" alt="insta"> Instagram</a>
          </p>
          </div>
        </div>
    <div>

<main id="main" class=" bg-dark">
  		<div id="login-left">
  		<div class="w3-content" style="max-width:1200px">
  <img class="mySlides" src="assets/img/workout.jpg" style="width:100%;display:none">
  <img class="mySlides" src="assets/img/gymmm.jpg" style="width:100%;">
  <img class="mySlides" src="assets/img/healthy.jpg" style="width:100%;display:none">

  <div class="w3-row-padding w3-section">
    <div class="w3-col s4">
      <img class="demo w3-opacity w3-hover-opacity-off" src="assets/img/workout.jpg" style="width:100%;cursor:pointer" >
    </div>
    <div class="w3-col s4">
      <img class="demo w3-opacity w3-hover-opacity-off" src="assets/img/gymmm.jpg" style="width:100%;cursor:pointer">
    </div>
    <div class="w3-col s4">
      <img class="demo w3-opacity w3-hover-opacity-off" src="assets/img/healthy.jpg" style="width:100%;cursor:pointer">
    </div>
  </div>
</div>



  		</div>
<div class="row">
  		<div id="login-right">
  			<div class="card col-md-8">
  				<div class="card-body">
  						
  					<form id="login-form" >
					  
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button class="btn-md btn-block btn-wave col-md-5 btn-primary">Login</button></center>
  					</form>
  				</div>
  			</div>
  		</div>
  	</div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
end

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
  setTimeout(showSlides, 2000); 
}

</script>	

</html>