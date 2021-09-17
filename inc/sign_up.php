<?php 
	include 'conn_db.php';
	session_start();
	
	if (isset($_POST['submit'])) {
		
		$userPosition = mysqli_real_escape_string($conn,$_POST['position']);
		$userN = mysqli_real_escape_string($conn,$_POST['name']);
		// make the input text into lower case and convert each first letter of word uppercase
		$userName = ucwords(strtolower($userN));
		$userL = mysqli_real_escape_string($conn,$_POST['lastname']);
		$userLastname = ucwords(strtolower($userL));
		
		$userEmail = mysqli_real_escape_string($conn,$_POST['email']);
		$userPassword = mysqli_real_escape_string($conn,$_POST['password']);

		$userGender = mysqli_real_escape_string($conn,$_POST['gender']);

		$b_day = $_POST['birth_month'] .$_POST['birth_day'] .$_POST['birth_year'];
		$userBirthday = mysqli_real_escape_string($conn,$b_day);


		if (!empty($userName) || !empty($userLastname) || !empty($userEmail) || !empty($userPassword)) {
			if (preg_match("/^[a-zA-Z ]*$/", $userName) && preg_match("/^[a-zA-Z ]*$/", $userLastname)) {
				if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/', $userPassword)) {
					// (?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20}
					//make sure password is alphaNumeric
					header("Location: /index.php?password=not_alphaNum");
					exit();

				}else{
					//encrypt password
					$passEncrypt = password_hash($userPassword, PASSWORD_ARGON2I);

					if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
							header("Location: /index.php?error=email");
							exit();
					}else{
						$emailCheck = "SELECT `email` FROM users WHERE email = '$userEmail'";

						$result = mysqli_query($conn, $emailCheck);
						$resultcheck = mysqli_num_rows($result);

						if ($resultcheck > 0) {
							header("Location: /index.php?user=exist");
							exit();
						}else{
							$sql = "INSERT INTO `users`(`userPosition`, `userName`, `userLastName`, `email`, `password`, `userGender`, `birth_details`,`online`) VALUES ('$userPosition','$userName','$userLastname','$userEmail','$passEncrypt','$userGender','$userBirthday',1);";
							$query = mysqli_query($conn,$sql);
							if ($query) {
								$display = mysqli_query($conn,"SELECT `id`,`userName` FROM users WHERE  userName = '$userName'");
								$row = mysqli_fetch_assoc($display);

								if ($display) {

									// first get the userName of the user

									$user = $row['userName'];
									// update the value in online column
									$online = mysqli_query($conn, "UPDATE users SET online = 1 WHERE userName = '$user'");
									// if the above is successful
									if ($online) {
										//create session
										$_SESSION['usrName'] = $row['userName'];
										$_SESSION['usrID'] = $row['id'];
										header("Location: /index.php");
										exit();
									}
								}			//LETS try it	
							}else{
								echo "insert failed";
							}
						}
					}
				}
			}else{
				//if user name is invalid

							header("Location: /index.php?name=onlyLettersAllowed");
							exit();
			}
		}else{
			//make sure fill out everything

							header("Location: /index.php?user=mistSomething");
							exit();
		}

	}