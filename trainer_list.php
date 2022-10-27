<?php 
	include('db_connect.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>The FITNESS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #ffffff;
    di
  }
  .jumbotron{
    background: #1abc9c;
  color: white;
  }
  </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
<h1>FITNESS</h1>
  <p>Welcome to FITNESS</p>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Gym Online</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="user_home.php">Home</a></li>
        <li><a href="lesson.php"> Lesson</a></li>
        <li><a href="shop.php"> Shop </a></li>
        <li><a href="schedule_board.php"> Schedule</a></li>
        <li class="active"><a href="trainer_list.php"> Trainer </a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h2>Trainer</h2>
      <h5>Inquiry:</h5>
      <div class="fakeimg">
  			You Contact freely the trainers on the list to inquire and ask questions. 
	  </div>
      <h3>Connect and Contact us on</h3>

      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#">Facebook</a></li>
        <li class="active"><a href="#">Instagram</a></li>
		<li class="active"><a href="#">Viber</a></li>
      </ul>
      <hr class="hidden-sm hidden-md hidden-lg">
    </div>
    <div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<b>List of Trainers</b>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Information</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$trainer = $conn->query("SELECT * FROM trainers order by id asc");
								while($row=$trainer->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p><i class="fa fa-user"></i> <b><?php echo $row['name'] ?></b></p>
										<p><small><i class="fa fa-at"></i> <b><?php echo $row['email'] ?></b></small></p>
										<p><small><i class="fa fa-phone-square-alt"></i> <b><?php echo $row['contact'] ?></b></small></p>
										<p><small><i class="fa fa-money-bill"></i> <b><?php echo number_format($row['rate'],2) ?></b></small></p>
										
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
  </div>
</div>
<br>
<div class="jumbotron text-center" style="margin-bottom:0">
  <h2>Follow us on:<a href="#"> <img src="assets/img/facebook.png" alt="" style="height: 40px;"> </a><a href="#"> <img src="assets/img/instagram.png" alt="" style="height: 40px;"> </a></h2>
</div>

</body>
</html>