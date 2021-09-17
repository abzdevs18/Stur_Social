<?php
	include 'conn_db.php';
	session_start();

	if (isset($_POST['submit'])) {
		$parent_post = $_POST['postID']; //THe post where the comment is assign
		$usr_id = $_SESSION['usrID'];
		$comment_content = mysqli_real_escape_string($conn,$_POST['comment']);
		$p_id = mysqli_real_escape_string($conn,$_POST['parent_comment_id']);
		$post_date = Date('F j, Y');
		$post_timestamp = $_SERVER['REQUEST_TIME'];
		$p_query = mysqli_query($conn,"INSERT INTO `comments`(`parent_comment_id`,`user_id`,`post_id`, `comment_content`, `comment_date`, `comment_timestamp`) VALUES ('$p_id','$usr_id',$parent_post','$comment_content','$post_date','$post_timestamp')");
		if ($p_query) {
			header("Location: ../timeline.php?r=success");
			exit();
		}else{
			echo "Description" . mysqli_error($conn);
			header("Location: ../timeline.php?r=success");
			exit();
		}

	}