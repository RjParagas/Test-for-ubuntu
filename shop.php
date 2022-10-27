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
        <li class="active"><a href="shop.php"> Shop </a></li>
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
      <h2>The Shop: </h2>
      <h5>Description:</h5>
      <div class="fakeimg">
      If you’re a fitness pro, it can be easy to forget that some fitness equipment might intimidate or put-off 
      some of your clientele. While having heavy weights and the latest gadget is a must in staying ahead of your game, 
      using hardcore exercise machines fit for the Olympics could mean that your gym scares off beginners or seniors.
      <br>
      <br>
      Similarly, if your gym just has basic equipment that is only utilised by the less experienced or older, 
      the seriously dedicated gym-goers will simply pick another gym that is stacked with the latest and greatest gear. 
      To maximize profits and get more people through the door, a mix of equipment should be used to attract and keep customers.
      <br>
      <br>
    
      When picking the best equipment for newbies you should first ask what their goals might be, 
      in the same way that you might do with seniors. A person wanting to join the gym might aim to lose weight or maintain a 
      healthy physical appearance, which means they’re more likely to engage in cardio. Someone older might aim to undertake exercises 
      that will help them maintain muscle mass and a healthy heart. They are also likely to use equipment that is kinder on their joints.
      <br>
      To make sure you keep everyone happy (but without spending a wild amount on fitness equipment), 
      integrate these nine essential things for your gym or studio.  
	  </div>
    <h3></h3>
      <h3>Visit us: </h3>

      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="https://chrissports.com/">ChrisSports</a></li>
        <li class="active"><a href="https://shopee.ph/search?keyword=gym%20equipment&trackingId=searchhint-1618961966-a4cc1c54-a231-11eb-8389-b4969156ba4c">Shopee.ph</a></li>
        <li class="active"><a href="https://www.amazon.com/s?k=gym+equipment&crid=32I73SF3ACG6R&sprefix=gym+equi%2Caps%2C426&ref=nb_sb_ss_ts-doa-p_1_8">Amazon</a></li>
		
      </ul>
      <hr class="hidden-sm hidden-md hidden-lg">
    </div>
<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Equipment Info</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$prod = $conn->query("SELECT * FROM product_list order by id asc");
								while($row=$prod->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p>Equipment ID : <b><?php echo $row['sku'] ?></b></p>
									
										<p><small>NAME : <b><?php echo $row['name'] ?></b></small></p>
										<p><small>DESCRIPTION : <b><?php echo $row['description'] ?></b></small></p>
										<p><small>PRICE : <b><?php echo number_format($row['price'],2) ?></b></small></p>
									</td>
									<td class="text-center">

										<form action="payment_from.php" method="<?php echo $row['name'] ?>">
										<button class="btn btn-sm btn-success" type="submit">BUY</button>

                    </form>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
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
<script>

</script>
