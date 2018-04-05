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
		<h3><a href="../index.php">Back to Home</a></h3>
		<?php include_once("../header.php"); ?>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="addstudent.php" method="post" enctype="multipart/form-data">
					<label for="name">Student Name</label>
					<input type="text" name="name" id="name" class="form-control" required=""><br>
					<label for="rollno">Roll No.</label>
					<input type="text" name="rollno" id="rollno" class="form-control" required=""><br>
					<label for="name">Class Name</label>
					<select name="std" class="form-control" id="">
			  			<option value="">Select Class</option>	
			  			<option value="First Class">First Class</option>	
			  			<option value="Second Class">Second Class</option>	
			  			<option value="Third Class">Third Class</option>	
			  			<option value="Fourth Class">Fourth Class</option>	
			  			<option value="Fifth Class">Fifth Class</option>	
			  			<option value="Sixth Class">Sixth Class</option>	
			  		</select><br>
					<label for="age">Age</label>
					<input type="text" name="age" id="age" class="form-control" required=""><br>
					<label for="address">Address</label><br>
					<textarea name="address" id="address" cols="42" rows="2" required=""></textarea><br>	
					<label for="city">City</label>
					<input type="text" name="city" id="city" class="form-control" required=""><br>
					<label for="pcont">Parent Contact Number</label>
					<input type="number" min="0" name="pcont" id="pcont" class="form-control" required=""><br>
					<label for="">Image</label>
					<input type="file" class="form-control" name="image" required=""><br>
					<input type="submit" name="submit" class="btn btn-success">
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>		
		
	</div>
	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php 

	if(isset($_POST['submit'])){
	include_once("../config.php");

	$name = $_POST['name'];
	$rollno = $_POST['rollno'];
	$std = $_POST['std'];
	$age = $_POST['age'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$pcont = $_POST['pcont'];
	$imgname = $_FILES['image']['name'];
	$tempname = $_FILES['image']['tmp_name'];
	$store = "../uploadimg/$imgname"; 

	$error = move_uploaded_file($tempname,$store);
	print_r($error);
	$sql = "INSERT INTO `tbl_student`(`name`, `rollno`, `age`, `class`, `address`, `city`, `pcont`, `image`) VALUES ('$name','$rollno','$age','$std','$address','$city','$pcont', '$imgname')";
	// echo $sql;
	$run = mysqli_query($con, $sql);
	if($run == true){
		?>
		<script>
			alert('Data Insert Successfully');
			window.location.href = 'admindash.php';
		</script>
		<?php
	}
	else{
	open('addstudent.php', '_self');
	}
	
}
?>