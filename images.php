<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			
				<div class="card">
					<div class="card-header">
						    Trainer Form
				  	</div>
					<div class="card-body">
							<form  action="index.php?page=upload" method="post"  
                                enctype="multipart/form-data">
                            <input type="file" name="file" />
                            <input type="submit" value="UPLOAD" name="upload" />

                            </form>

                            <?php

                            include ('db_connect.php');
                                if (isset($_POST['upload'])){
                                    $name = $_FILES['file']['name'];
                                    $tmp = $_FILES['file']['tmp_name'];
                                    move_uploaded_file($tmp,"assets/img/" . $name);
                                    $sql = "INSERT INTO images (name) VALUES ('$name')";
                                    $res =  mysqli_query($conn, $sql);

                                if ($res == 1){
                                    echo "<br><h6> image inserted successfully </h6>";
                                }
                            }
                        ?>
					</div>
				</div>
			
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
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
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
                                $sql = "SELECT * FROM images ORDER BY id DESC";
                                $res = mysqli_query($conn, $sql);
                       
                                if (mysqli_num_rows($res) > 0) {
                                    while ($img = mysqli_fetch_assoc($res)) { 
                                ?>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
                                        <image width="500" height="300" src="assets/img/<?=$img['name']?>" 
	        	                            controls>
	                                    </image>
									</td>
                                    
									<td class="text-center">
										<button class="btn btn-md btn-outline-danger delete_image" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php 
	                             }
		                        }else {
		 	                        echo "<h1>Empty</h1>";
		                        }
		                        ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin:unset;
	}
</style>
<script>
function _reset(){
		$('#manage-video').get(0).reset()
		$('#manage-video input,#manage-video textarea').val('')
	}
	$('#manage-video').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_video',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_video').click(function(){
		start_load()
		var cat = $('#manage-trainer')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='email']").val($(this).attr('data-email'))
		cat.find("[name='contact']").val($(this).attr('data-contact'))
		cat.find("[name='rate']").val($(this).attr('data-rate'))
		end_load()
	})
	$('.delete_video').click(function(){
		_conf("Are you sure to delete this Video?","delete_video",[$(this).attr('data-id')])
	})
	function delete_video($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_video',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	$('table').dataTable()
</script>