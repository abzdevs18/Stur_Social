<?php	
	if (isset($_POST['suggestionName'])) {
		include '../inc/conn_db.php';
		// search user db and store the result to array
		$query = "SELECT id,userName FROM users";
		$query_result = mysqli_query($conn, $query);
		$name = array();
		while ($row = mysqli_fetch_assoc($query_result)) {
			$name[] = $row['userName'];
		}

		$nameI = mysqli_real_escape_string($conn, $_POST['suggestionName']);
		$nameinput = ucwords(strtolower($nameI));
		// $query = "SELECT id,userName FROM users WHERE userName = '%$nameinput%'";
		// $query_result = mysqli_query($conn, $query);
		// Check the the array of users if the search value is equal to one of the users in the array
		if (!empty($nameinput)) {
			foreach ($name as $suggestName) {
				if (strpos($suggestName, $nameinput) !== false) {?>
					<div id="res_wrapper">
						<a href="<?php echo $suggestName; ?>" id="result">
							<span><?php echo $suggestName; ?></span>
						</a>
					</div>
			<?php	} else {

				}
			}
		}
	}
?>