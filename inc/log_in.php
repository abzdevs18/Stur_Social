<?php
	session_start();
	if (isset($_POST['submit'])) {
		include 'conn_db.php';

		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$userPass = mysqli_real_escape_string($conn, $_POST['password']);
		$check = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
		$result = mysqli_num_rows($check);
		if ($result < 1) {
			//User doesn't match to any names in the satabasse;
			header("Location: /index.php?user=doesn't_Match");
			exit();
		}else{
			if ($row = mysqli_fetch_assoc($check)) {
				$hashed = password_verify($userPass,$row['password']);
				if ($hashed == false) {
					header("Location: /index.php?password=Failed");
					exit();
				}else {
					// in login the are the same same process
					$user = $row['userName'];
									// update the value in online column
					$online = mysqli_query($conn, "UPDATE users SET online = 1 WHERE userName = '$user'");
									// if the above is successful
					if ($online) {
						$_SESSION['usrName'] = $row['userName'];
						$_SESSION['usrID'] = $row['id'];
						header("Location: /timeline.php?password=sucess");
						exit();
						// save
					}

				}
			}
		}

	}