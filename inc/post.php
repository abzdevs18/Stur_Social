<?php
	include 'conn_db.php';
	session_start();

	if (isset($_POST['submit'])) {
		$usr_id = $_SESSION['usrID'];
		$post_description = mysqli_real_escape_string($conn,$_POST['p_details']);
		$post_audience = mysqli_real_escape_string($conn,$_POST['audience']);
		$post_date = Date('F j, Y');
		$post_timestamp = $_SERVER['REQUEST_TIME'];
		if (!empty($post_description)) {
			$post_query = mysqli_query($conn,"INSERT INTO `post`(`user_id`, `audience`, `post_description`, `post_date`, `post_timestamp`) VALUES ('$usr_id','$post_audience','$post_description','$post_date','$post_timestamp')");
			if ($post_query) {
				header("Location: /timeline.php");
			}else{
				header("Location: /timeline.php");
			}
		}else{
			header("Location: /timeline.php");
		}	
	}