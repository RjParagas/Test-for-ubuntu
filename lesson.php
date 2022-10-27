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
        <li class="active"  ><a href="#"> Lesson</a></li>
        <li><a href="shop.php"> Shop </a></li>
        <li ><a href="schedule_board.php"> Schedule</a></li>
        <li ><a href="trainer_list.php"> Trainer </a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h2>The Lesson: </h2>
      <h5>Description:</h5>
      <div class="fakeimg">
      Fitness is the condition of being physically fit and healthy and involves attributes that include, 
      but are not limited to mental acuity, cardiorespiratory endurance, muscular strength, muscular endurance, 
      body composition, and flexibility. While there is a standard definition for fitness, each individual can have their 
      own personal understanding of what fitness means. To some individuals, being fit means the ability 
      to complete a marathon or lift a lot of weight. To another, it could mean walking around the block without 
      becoming short of breath. Your definition of fitness will be influenced by your interests, physical abilities, and goals. 
      No matter what the definition, it is important for every individual to keep their personal definition of fitness 
      within a healthy framework This means you should have realistic expectations and maintain balance and moderation 
      in all aspects of life. Set small , attainable goals and avoid giving too much power to the numerical measurements 
      of fitness. This can help your journey to fitness seem much less daunting and much more enjoyable.
	  </div>
    <h3></h3>
      <h3>Visit us: </h3>

      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="https://www.youtube.com/results?search_query=fitness+exercise+">Youtube</a></li>
        <li class="active"><a href="https://www.youtube.com/channel/UCq7bR6RxqqOx8cptc1-0AVQ">Allblanc TV</a></li>
        <li class="active"><a href="https://www.youtube.com/channel/UCzZM2XyXAogNCgvxKHnOd0w">Eva Fitness</a></li>
		
      </ul>
      <hr class="hidden-sm hidden-md hidden-lg">
    </div>

    <div class="col-md-8">
				<div class="card">
					<div class="card-body">
                <table class="table table-striped">  

                <?php 
                include "db_connect.php";
                $sql = "SELECT * FROM videos ORDER BY id DESC";
                $res = mysqli_query($conn, $sql);

                if(mysqli_num_rows($res) > 0)  
                {  
                    while($row= mysqli_fetch_array($res))  
                    {  
                ?>  
                <tr>  
                    <th>  <?php echo $row['title'] ?> </th>  

                      
                </tr>  
                <tr><td >  <video width="500" height="300" margin="auto" src="assets/videos/<?=$row['name']?>" 
                              controls>
                            </video> </td></tr>
                <?php 
                }
                }else {
                echo "<h1>Empty</h1>";
                }
                ?>
                </table>
	</div>
</div>
</div>
<br>


</body>
</html>