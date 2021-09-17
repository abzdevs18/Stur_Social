<?php
	include 'conn_db.php';

	$p_id = $_REQUEST['p'];
	$query = mysqli_query($conn, "SELECT post_dislike FROM reactions WHERE post_id = '$p_id'");
	$r = mysqli_fetch_assoc($query);
	if ($r) {
		$dis_like = $r['post_dislike'];
		$dis_like = $dis_like + 1;
		$r = "UPDATE `reactions` SET `post_dislike`= '$dis_like' WHERE post_id = '$p_id'";
		$p_query = mysqli_query($conn,$r);
		if ($p_query) {
			header("Location: ../timeline.php?page=timeline");
		}
	}else{
		$dis_like = 1;
		$r = "INSERT INTO `reactions`(`post_id`, `post_dislike`) VALUES ('$p_id','$dis_like')";
		$p_query = mysqli_query($conn,$r);
		if ($p_query) {
			header("Location: ../timeline.php?page=timeline");
		}
	}


