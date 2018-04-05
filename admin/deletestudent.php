<?php include("../session.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>sms</title>
</head>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<body>
	<div class="container">
		<h3><a href="admindash.php">Back to Home</a></h3>
	<?php include_once('../header.php'); ?>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form action="deletestudent.php" method="post">
				<table class="table">
					<tr>
						<th>Roll No.</th>
						<td><input type="text" name="rollno" class="form-control" required=""></td>
						<th>Student Name</th>
						<td><input type="text" name="name" class="form-control"></td>
						<td><input type="submit" name="submit" class="btn btn-info" value="search" required=""></td>
					</tr>
				</table>
			</form>
		</div>
		<div class="col-md-2"></div>
		<table class="table table-bordered table-striped" style="background: lightgrey;">
			<tr style="text-align: center;">
				<td>Image</td>
				<td>Name</td>
				<td>Age</td>
				<td>Roll No.</td>
				<td>Address</td>
				<td>City</td>
				<td>Paret Contact No.</td>
				<td>Action</td>
			</tr>
			<?php 
		include('../config.php');
	if(isset($_POST['submit'])) {

	$rollno = $_POST['rollno'];
	$name = $_POST['name'];

	$sql = "select * from tbl_student where rollno = '$rollno' AND name LIKE '%$name%'";

	$run = mysqli_query($con, $sql);

	 $result = mysqli_num_rows($run);
		if ($result < 1) {
		?>
	<tr>
		<table class="table">
			<tr>
				<td><h4 align="center"><?php echo "No Recode Found"; ?></h4></td>
			</tr>
			
		</table>
	</tr>
		<?php
	}
	else{
		
		while($row = mysqli_fetch_assoc($run)) {
		?> 
		<tr style="text-align: center;">
			<td>
				<img src="../uploadimg/<?php echo $row['image']; ?>" style="    width: 150px;" >
			</td>
			<td><?php echo $row['name'] ?></td>
			<td><?php echo $row['age'] ?></td>
			<td><?php echo $row['rollno'] ?></td>
			<td><?php echo $row['address'] ?></td>
			<td><?php echo $row['city'] ?></td>
			<td><?php echo $row['pcont'] ?></td>
			<td><a href="deleteform.php?sid=<?php echo $row['sid']?>">Delete</a></td>
		</tr>
		<?php
		}
	}
	
}

?>
		</table>
	</div>
	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	</div>
</body>
</html>

