<?php
	include 'conn_db.php';
	session_start();
	// here in logout just change the 0 into 1
	$user = $_SESSION['usrName'];
	// 0 means the user is not online
	$offline = mysqli_query($conn, "UPDATE users SET online = 0 WHERE userName = '$user'");
	// if the above is successful
	if ($offline) {
		session_unset();
		session_destroy();
		header("Location: ../index.php");
		exit();
	}
// let's hope mo run sya hahah