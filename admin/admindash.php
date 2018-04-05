<?php include("../session.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>sms</title>
</head>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<body>
	<div class="container">
	<h3><a href="../index.php">Back to Home</a></h3>
	<h3 align="right" style="margin-top: -35px;"><a href="logout.php">Logout</a></h3>
		<?php include_once("../header.php");
			include_once("../config.php");	 
			$sql = "select * from tbl_student";

			$run = mysqli_query($con, $sql);
			
		?>
		<h2 align="center"><a href="addstudent.php" class="form-control btn btn-info" >Add Student</a></h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Photo</th>
					<th>ID</th>
					<th>Name</th>
					<th>Class</th>
					<th>Roll NO.</th>
					<th>City</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php while($data = mysqli_fetch_assoc($run)){
				?>
				<tr>
					<td style="width: 150px;"><img src="../uploadimg/<?php echo $data['image'] ?>" style="width: 150px;"></td>
					<td><?php echo $data['sid'] ?></td>
					<td><?php echo $data['name'] ?></td>
					<td><?php echo $data['class'] ?></td>
					<td><?php echo $data['rollno'] ?></td>
					<td><?php echo $data['city'] ?></td>
					<td><?php echo $data['address'] ?></td>
					<td><div class="btn btn-success">
						<a style="color: white; text-decoration: none; " href="updatestudent.php">Update</a>
					</div> | <div class="btn btn-danger">
						<a style="color: white; text-decoration: none;" href="deletestudent.php">Delete</a>
						</div>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<h2 align="center"></h2>
		<h2 align="center"></h2>
	</div>
	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
