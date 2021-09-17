<?php
	include 'conn_db.php';
	session_start();

 if (isset($_POST['send'])) {
 	$user = $_POST['sender'];
 	$msg = mysqli_real_escape_string($conn,$_POST['message']);
 	$rcvr = $_POST['receiver'];
		
	$send_timestamp = $_SERVER['REQUEST_TIME'];
	$query = "INSERT INTO tbl_msg (`msg_receiver`, `msg_sender`, `msg_content`, `msg_time`) VALUES ('$rcvr', '$user','$msg','$send_timestamp')";

	$query_statement = mysqli_query($conn,$query);
	if ($query_statement) {
		// after submit form redirect to the same person ID
		header("Location: ../message.php?user=" . $rcvr); 
		exit();
	}else{
		echo mysqli_error($conn);
	}

 }