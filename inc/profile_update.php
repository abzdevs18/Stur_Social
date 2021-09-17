<?php
	include 'conn_db.php';
	session_start();

	// $imageSrc = $_POST['img'];
	$usr_id = $_SESSION['usrID'];

	$target = "uploaded/".basename($_FILES['photo']['name']);
	$image = $_FILES['photo']['name'];

	$post_timestamp = $_SERVER['REQUEST_TIME'];
if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target)) {

		$i_m = "SELECT * FROM user_user_photo WHERE user_id = '$usr_id' AND profile_photo = '1'";
		$i_m_query = mysqli_query($conn, $i_m);
		$result = mysqli_num_rows($i_m_query);
		if ($result < 1) {
			// $queryImage = "INSERT INTO `user_user_photo`(`user_id`, `img_path`, `img_Up_time`) VALUES ('$usr_id','$image','$post_timestamp')";
			// $queryUpdate = mysqli_query($conn,$queryImage);
			// if ($queryUpdate) {
			// 	header("Location: /stur/index.php");
			// 	exit();
			// }else {
			// 	echo mysqli_error($conn);
			// }

			$queryImage = "INSERT INTO `user_user_photo`(`user_id`, `profile_photo`, `img_path`, `img_Up_time`) VALUES ('$usr_id', 1,'$image','$post_timestamp')";
			$queryUpdate = mysqli_query($conn,$queryImage);
			if ($queryUpdate) {
				header("Location: ../index.php");
				exit();
			}else {
				echo mysqli_error($conn);
			}
		}else {
			// $u_p = "UPDATE user_user_photo SET img_path = $image WHERE user_id = $usr_id";
			// $u_p_query = mysqli_query($conn, $u_p);
			// if ($u_p_query) {
			// 	header("Location: /stur/index.php");
			// 	exit();
			// }else {
			// 	echo mysqli_error($conn);
			// }
			if ($rows = mysqli_fetch_assoc($i_m_query)) {
				$img_path = $rows['img_path'];
				// Don't remove the photo from the DB. just update the value of profile_photo into 0
				$u_p = "UPDATE user_user_photo SET profile_photo = 0 WHERE img_path = '$img_path'";
				$u_p_query = mysqli_query($conn, $u_p);
				if ($u_p_query) {
					// Serve us the update command for the profile_photo
					$queryImage = "INSERT INTO `user_user_photo`(`user_id`, `profile_photo`, `img_path`, `img_Up_time`) VALUES ('$usr_id', 1,'$image','$post_timestamp')";
					$queryUpdate = mysqli_query($conn,$queryImage);
					if ($queryUpdate) {
						header("Location: ../index.php");
						exit();
					}else {
						echo mysqli_error($conn);
					}
				}else {
					echo "$img_path <br> $image <br>".mysqli_error($conn);
				}
			}
		}
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

