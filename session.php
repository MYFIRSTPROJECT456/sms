<?php 

session_start();

if (isset($_SESSION['aid'])) {
	echo "";
}
else{
	header('location: ../adminlogin.php');
}

?>