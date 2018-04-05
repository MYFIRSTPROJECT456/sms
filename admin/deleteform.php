<?php 
$id = $_GET['sid'];
echo $id;
include("../session.php");
include("../config.php");

$sql = "delete from tbl_student where sid = '$id'";

$run = mysqli_query($con, $sql);

if ($run == ture) {
	?>
	<script>
		alert("Data Deleted Successfully");
		window.location.href = "admindash.php";
	</script>
	<?php
}
else{
	echo "Delete Unsuccessfully";
}

?>