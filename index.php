<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>sms</title>
</head>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<body>
	<div class="container">
		<h3 align="right"><a href="adminlogin.php">Admin Login</a></h3>
		<?php include_once("header.php"); ?><!-- header data -->
		  <h4 align="center" style="color: grey;">Studen Details</h4>
		  <div class="row col-md-12">
		  	<div class="col-md-4"></div>
		  	<div class="col-md-4">
		  	<form action="index.php" method="post">
		  	<table class="table table-bordered">
			  	<tr>
			  		<th>Roll NO.</th>
			  		<td><input type="text" class="form-control" name="rollno"></td>
			  	</tr>
			  	<tr>
			  		<th>Std</th>
			  		<td>
			  		<select name="std" class="form-control" id="">
			  			<option value="">Select Class</option>	
			  			<option value="First Class">First Class</option>	
			  			<option value="Second Class">Second Class</option>	
			  			<option value="Third Class">Third Class</option>	
			  			<option value="Fourth Class">Fourth Class</option>	
			  			<option value="Fifth Class">Fifth Class</option>	
			  			<option value="Sixth Class">Sixth Class</option>
			  		</select>
			  		</td>
			  	</tr>
			  	<tr>
			  		<td colspan="2"><input type="submit" class="btn btn-info" value="show details" name="submit" style="float: right;"></td>
			  	</tr>
		  </table>
		</form>
		  	</div>
		  	<div class="col-md-4"></div>
		  </div>
		  	<div class="row">
		  		<div class="col-md-3"></div>
		  		<div class="col-md-6">
		  			<table class="table table-striped table-bordered">
		  				<?php if(isset($_POST['submit'])){ ?>
		  					<tr style="background: lightgray;">
		  					<th>Photo</th>
		  					<th colspan="2" >Details</th>
		  				</tr>
		  				<?php } ?>
		  				
		  			<?php 
	
					if (isset($_POST['submit'])) {
						include_once('config.php');
						 $rollno = $_POST['rollno'];
						 $std = $_POST['std'];

						$sql = "select * from tbl_student where class = '$std' AND rollno = '$rollno'";

						$run = mysqli_query($con, $sql);

						$row = mysqli_num_rows($run);
						
						if ($row < 1) {
							?>
							<h4 align="center">No Record Found</h4>
							<?php
						}
						else{
							while($row = mysqli_fetch_assoc($run)
						 ){

								?>
								<tr>
									<td rowspan="6" style="width: 150px;"><img src="uploadimg/<?php echo $row['image'] ?>" style="width: 150px;"></td>
								</tr>
								<tr>
									<th>Name:-</th>
									<td><?php echo $row['name'] ?></td>
								</tr>
								<tr>
									<th>Age:-</th>
									<td><?php echo $row['age'] ?></td>
								</tr>
								<tr>
									<th>Class:-</th>
									<td><?php echo $row['class'] ?></td>
								</tr>
								<tr>
									<th>Parent Contact No.:-</th>
									<td><?php echo $row['pcont'] ?></td>
								</tr>
								<tr>
									<th>Address:-</th>
									<td><?php echo $row['address'] ?></td>
								</tr>
								<?php
							}
						}
					}

					?>	
		  			</table>
		  		</div>
		  		<div class="col-md-3"></div>
		  	</div>
	</div>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.js"></script>
</body>
</html>
