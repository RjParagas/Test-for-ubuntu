<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM members where id=".$_GET['id'])->fetch_array();
	foreach($qry as $k =>$v){
		$$k = $v;
	}
}

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<p>Name: <b><?php echo ucwords($name) ?></b></p>
			<p>Gender: <b><?php echo ucwords($gender) ?></b></p>
			<p>Birthday: </i> <b><?php echo $birthday ?></b></p>
			<p>Age: </i> <b><?php echo $age ?></b></p>
			<p>Height(cm): </i> <b><?php echo $height ?></b></p>
			<p>Weight(kg): </i> <b><?php echo $weight ?></b></p>
			<p>BMI: </i> <b><?php 
			
				function bmi($weight,$height) {
				$bmi = ($weight/$height/$height)*10000;
				return $bmi;
				} 
				
				$bmi = bmi($weight,$height);
				if ($bmi <= 18.5) {
					$output = "Under Weight";
				} else if ($bmi > 18.5 AND $bmi<=24.9 ) {	
					$output = "Normal Weight";
				} else if ($bmi > 24.9 AND $bmi<=29.9) {
					$output = "Over Weight";
				} else if ($bmi > 30.0) {
					$output = "OBESE";
				}	
				echo number_format((float)$bmi, 2, '.', '').  " $output"?></b></p>
			<p>Email: </i> <b><?php echo $email ?></b></p>
			<p>Contact: </i> <b><?php echo $contact ?></b></p>
			<p>Address: </i> <b><?php echo $address ?></b></p>
		</div>
		<div class="col-md-8">
			<large><b>Membership Plan List</b></large>
			<table class="table table-condensed">
				<thead>
					<tr>
						<td>Plan</td>
						<td>Package</td>
						<td>Start</td>
						<td>End</td>
						<td>Status</td>
					</tr>
				</thead>
				<tbody>
					<?php 
						$pcount=0;
					$paid = $conn->query("SELECT r.*,pl.plan,pa.package FROM registration_info r inner join plans pl on pl.id = r.plan_id inner join packages pa on pa.id = r.package_id where r.member_id = $id ");
					while($row= $paid->fetch_assoc()):
						$pcount++;
					?>
					<tr>
						<td><p><?php echo $row['plan']?>day/s</p></td>
						<td><?php echo $row['package']?></td>
						<td><?php echo date("M d,Y",strtotime($row['start_date'])) ?></td>
						<td><?php echo date("M d,Y",strtotime($row['end_date'])) ?></td>
						<td>

							<?php if($row['status'] == 1): ?>
							<?php if(strtotime(date('Y-m-d')) <= strtotime($row['end_date'])): ?>
							<span class="badge badge-success">Active</span>
							<?php else: ?>
							<span class="badge badge-success">Active</span>
							<?php endif; ?>
							<?php else: ?>
							<span class="badge badge-secondary">Closed</span>
							<?php endif; ?>
						</td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal-footer display">
	<div class="row">
		<div class="col-md-12">
			<button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
<style>
	p{
		margin:unset;
	}
	#uni_modal .modal-footer{
		display: none;
	}
	#uni_modal .modal-footer.display {
		display: block;
	}
</style>
<script>
	
</script>