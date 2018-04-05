<?php 
session_start(); 
if (isset($_SESSION['aid'])) {
	header("location: admin/admindash.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>sms</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	
	<h3><a href="index.php">Back to Home</a></h3>
	<?php include_once("header.php"); ?>

		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form action="adminlogin.php" method="post">
						<table class="table">
							<label for="name">Username</label>
							<input type="text" id="name" name="name" class="form-control" required=""><br>
							<label for="pass">Password</label>
							<input type="password" id="pass" name="pass" class="form-control" required="">
								<h3 align="center">
									<input type="submit" name="submit" value="submit" class="btn btn-success"> 
								</h3>
						</table>
					</form>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>			
		
	</div>
</body>
</html>

<?php 
	
	if (isset($_POST['submit'])) {
		include_once("config.php");

		$name = $_POST['name'];
		$pass = $_POST['pass'];

		$sql = "select * from tbl_admin where username = '$name' AND password = '$pass'";

		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_row($result);
		if ($row < 1) {
			?>
			<tr>
				<h3 align="center" style="margin-top: 0px; color: red;"><td><?php echo "Wrong Credentials";?></td></h3>
			</tr>
			
			<?php
			
		}
		else{
			$id = $row[0];
			
			$_SESSION['aid'] = $id;
			
			header('location:admin/admindash.php');
		}
	}

?>