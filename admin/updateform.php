<?php 
include("../session.php");
include_once("../config.php");
 $id = $_GET['sid'];

	$sql1 = "select * from tbl_student where sid = '$id'";

	$run1 = mysqli_query($con, $sql1);

	$data1 = mysqli_fetch_assoc($run1);

	$qry = "select class from tbl_student";

	$runqry = mysqli_query($con, $qry);
 ?>
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
				<form action="updateform.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="sid" id="name" value="<?php echo $data1['sid'] ?>" class="form-control" required="">
					<label for="name">Student Name</label>
					<input type="text" name="name" id="name" value="<?php echo $data1['name'] ?>" class="form-control" required=""><br>
					<label for="rollno">Roll No.</label>
					<input type="text" name="rollno" id="rollno" value="<?php echo $data1['rollno'] ?>" class="form-control" required=""><br>
					<label for="name">Class Name</label>
					
					<select name="std" class="form-control" id="">
						<?php while($row = mysqli_fetch_assoc($runqry)){ 
							
						?>
			  			<option value="<?php $row['class'] ?>"><?php echo $row['class'] ?></option>	
			  			<?php } ?>	
			  		</select>
			  		<br>
					<label for="age">Age</label>
					<input type="text" name="age" id="age" value="<?php echo $data1['age'] ?>" class="form-control" required=""><br>
					<label for="address">Address</label><br>
					<textarea name="address" id="address" cols="42" rows="2" class="form-control" required=""><?php echo $data1['address'] ?></textarea><br>	
					<label for="city">City</label>
					<input type="text" name="city" id="city" value="<?php echo $data1['city'] ?>" class="form-control" required=""><br>
					<label for="pcont">Parent Contact Number</label>
					<input type="number" min="0" name="pcont" id="pcont" value="<?php echo $data1['pcont'] ?>" class="form-control" required=""><br>
					<label for="">Image</label>
					<input type="file" class="form-control" name="image" required=""><br>
					<input type="submit" name="submit" class="btn btn-success" value="update">
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
	$id1 = $_POST['sid'];
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
	$sql = "UPDATE `tbl_student` SET `name`='$name',`rollno`='$rollno',`class`='$std',`age`='$age',`address`='$address',`city`='$city',`pcont`='$pcont',`image`='$imgname' WHERE `sid`='$id1'";
	$run = mysqli_query($con, $sql);
	if($run == true){
		?>
		<script>
			alert('Data Updated Successfully');
			window.location.href = 'admindash.php';
		</script>
		<?php
		
	}
	else{
	open('updateform.php', '_self');
	}
	
}



?>