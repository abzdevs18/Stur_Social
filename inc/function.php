<?php
	function send_message($usr,$msg,$rcvr,$conn){
		$send_timestamp = $_SERVER['REQUEST_TIME'];
		$id  = $rcvr;
		$query = "INSERT INTO tbl_msg (`msg_receiver`, `msg_sender`, `msg_content`, `msg_time`) VALUES ('$rcvr', '$usr','$msg','$send_timestamp')";

		$query_statement = mysqli_query($conn,$query);
		if ($query_statement) {
			// after submit form redirect to the same person ID
			header("Location: ../message.php?user=" . $id); 
			exit();
		}else{
			echo mysqli_error($conn);
		}
	}