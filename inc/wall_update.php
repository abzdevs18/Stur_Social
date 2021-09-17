<?php
include 'conn_db.php';
session_start();

$usr_id = $_SESSION['usrID'];

$target = "uploaded/wall/".basename($_FILES['b_photo']['name']);
$wall = $_FILES['b_photo']['name'];

$wall_timestamp = $_SERVER['REQUEST_TIME'];

if (move_uploaded_file($_FILES['b_photo']['tmp_name'], $target)) {
	$w_i_m = "SELECT * FROM wall_img WHERE user_id = '$usr_id' AND wall_use = '1'";
	$w_i_m_query = mysqli_query($conn,$w_i_m);
	$result = mysqli_num_rows($w_i_m_query);
	if ($result < 1) {
		$w_i = "INSERT INTO `wall_img`(`user_id`, `wall_use`, `wall_path`, `wall_up_time`) VALUES ('$usr_id', 1, '$wall', '$wall_timestamp')";
		$w_i_query = mysqli_query($conn,$w_i);
		if ($w_i_query) {
			header("Location: ../index.php");
			exit();
		}else{
			echo mysqli_error($conn);
		}
	}else{
		if ($rows = mysqli_fetch_assoc($w_i_m_query)) {
			$wall_path = $rows['wall_path'];

			$u_w_img = "UPDATE `wall_img` SET `wall_use` = 0 WHERE wall_path = '$wall_path'";
			$u_w_img_query = mysqli_query($conn,$u_w_img);
			if ($u_w_img_query) {
				$u_w_img_use = "INSERT INTO `wall_img`(`user_id`, `wall_use`, `wall_path`, `wall_up_time`) VALUES ('$usr_id', 1, '$wall', '$wall_timestamp')";
				$u_w_img_use_query = mysqli_query($conn,$u_w_img_use);
				if ($u_w_img_use_query) {
					header("Location: ../index.php");
					exit();
				}else {
					echo mysqli_error($conn);
				}
			}else {
				echo mysqli_error($conn);
			}
		}else {
			echo mysqli_error($conn);
		}
	}
} else {
    echo "Sorry, there was an error uploading your file.";
}