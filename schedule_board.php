<?php 
$connect = mysqli_connect("localhost", "root", "", "gym_db");  
$sql = "SELECT * FROM schedules INNER JOIN members ON schedules.member_id = members.id";  
$result = mysqli_query($connect, $sql);  
 
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
    height: 500px;
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
        <li class="active"><a href="schedule_board.php"> Schedule</a></li>
        <li ><a href="trainer_list.php"> Trainer </a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h2>Attention</h2>
      <h5>Announcement</h5>
      <div class="fakeimg">
  			The list on the table are schedule for on site gym experience. Check for your name as well as the time and date.
        <br>
        <br>
        See you on FITNESS gym, Stay Safe, Strong and Healthy!
        <br>
        <br>
        Legend:
        <br>
        1 = Monday
        <br>
        2 = Tuesday
        <br>
        3 = Wednesday
        <br>
        4 = Thursday
        <br>
        5 = Friday      
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
						<b>List of Schedules for on site</b>
					</div>
					<div class="card-body"> 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                               <th> ID </th>  
                               <th> Name</th>  
                               <th> Day </th>  
                               <th> Until </th>  
                               <th> Time </th>  
                          </tr>  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["id"];?></td>  
                               <td><?php echo $row["firstname"]; ?> &nbsp; <?php echo $row["lastname"]; ?></td>  
                               <td><?php echo $row["dow"]; ?></td>  
                               <td><p>Starts on : </p><?php echo $row["date_from"]; ?> <p>End on  : </p><?php echo $row["date_to"]; ?></td>  
                               <td><p>Starts on :<?php echo $row["time_from"]; ?> <p>Until :<?php echo $row["time_to"]; ?></td>  
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div> 
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