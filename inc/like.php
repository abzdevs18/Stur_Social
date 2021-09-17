<?php
	include 'conn_db.php';

	$p_id = $_REQUEST['p'];
	// $p_id = $_POST['post_id_i'];
	$query = mysqli_query($conn, "SELECT post_like FROM reactions WHERE post_id = '$p_id'");
	$r = mysqli_fetch_assoc($query);
	if ($r) {
		$like = $r['post_like'];
		$like = $like + 1;
		$r = "UPDATE `reactions` SET `post_like`= '$like' WHERE post_id = '$p_id'";
		$p_query = mysqli_query($conn,$r);
		if ($p_query) {
			header("Location: ../timeline.php?page=timeline");
		}
	}else{
		$like = 1;
		$r = "INSERT INTO `reactions`(`post_id`, `post_like`) VALUES ('$p_id','$like')";
		$p_query = mysqli_query($conn,$r);
		if ($p_query) {
			$query = mysqli_query($conn, "SELECT post_like,post_dislike FROM reactions WHERE post_id = '$p_id'");
			$result = mysqli_fetch_assoc($query);
			if ($result) {
			header("Location: ../timeline.php?page=timeline");
			}
		}
	}


