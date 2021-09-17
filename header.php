<?php
	session_start();
	error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Stur</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="icon" href="image/logo.ico">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="style/formStyle.css">
	<link rel="stylesheet" href="style/fa/css/all.css">
	<link rel="stylesheet" type="text/css" href="style/headerStyle.css">
	<link rel="stylesheet" type="text/css" href="style/chat.css">
	<script src="script/jquery.min.js"></script>
	<script src="script/post.js"></script>
	  <script>
	  	$(document).ready(function(){
	  		$("#searchField").keyup(function(){
	  			$('#search_result').show();
	  			var name = $("#searchField").val();

	  			$.post("script/search.php",{
	  				suggestionName: name
	  			}, function(data) {
	  				$('#search_result').html(data);
	  			});
	  		});
	  	});
	  </script>
</head>
<body>
	<header>
		<nav>
			<div class="headerLeft">
				<a href="index.php?page=timeline"><img src="image/logo.png"></a>
				<?php if (isset($_SESSION['usrName'])) {?>
				<a href="timeline.php?page=timeline"><span>Home</span></a>
				<?php
				}?>
				<div style="display: flex;flex-direction: column;">
						<div class="search">
							<!-- <img src="image/search.svg" class="customStyle"> -->
							<i class="fas fa-search customStyle"></i>
							<input type="text" name="query" placeholder="search subject/mentor" id="searchField">
						</div>
					<!-- <p id="search_result" style="width: 400px;height: 50px;background-color: #d6d6d6;margin-left: 5px;display: none;"></p> -->
					<div id="search_result" style="width: 400px;height: 50px;margin-left: 5px;display: none;">
						
					</div>					
				</div>
			</div>
			<?php
			//if $_SESSION['usrName'] is already created as session
			if (!isset($_SESSION['usrName'])) {?>
			<div class="headerRight">
				<a href="index.php"><span>Sign Up</span></a>
				<a href="login.php"><span>Login</span></a>
			</div>	
			<?php 
			}else{
				?>
			<div class="headerRight">
				<div class="h_icons" style="padding: 0px 10px;">
					<div style="margin: -5px 0px;padding: 0px 0px 10px;">
						<div style="text-align: center;">
							<a href="timeline.php?page=timeline" style="border: none;padding: 20px 4px;"><i class="far fa-bell h_icon"></i></a><br>
							<span style="font-size: 13px;">Notifications</span>
						</div>
					</div>
					<div class="h_icons" style="margin: -5px 0px;padding: 0px 5px 10px;cursor: pointer;">
						<div style="text-align: center;">
							<a href="friends.php?page=friends" style="border: none;padding: 20px 4px;"><i class="fas fa-users h_icon"></i></a><br>
							<span style="font-size: 13px;">Friends</span>
						</div>
					</div>
					<div class="chat h_icons" style="margin: -5px 0px;padding: 0px 5px 10px;">
						<div style="text-align: center;">
							<a href="message.php" style="border: none;padding: 20px 4px;"><i class="far fa-comments h_icon"></i></a><br>
							<span style="font-size: 13px;">Messaging</span>
						</div>
<!-- 						<div class="message_drp">
							Drop Down Messages
						</div> -->
					</div>
					<div style="display: flex;flex-direction: row;">
						<a href="timeline.php?page=timeline">
							<div class="h_prof_icon_img">

							<?php
							include 'inc/conn_db.php';
							$id = $_SESSION['usrID'];
							$img = "SELECT * FROM user_user_photo WHERE user_id = '$id' AND profile_photo = 1";
							$q_img = mysqli_query($conn,$img);
							$row = mysqli_fetch_assoc($q_img);
							if($row){?>
							<img src="<?php echo "inc/uploaded/".$row['img_path']; ?>">
							<?php 
								} else {?>
							<img src="image/default/user_default.png">
							<?php
								}
							
							?>

							</div>
						</a>
						<a href="timeline.php?page=timeline">
							<div style="display: flex;flex-direction: column;" class="p_name">
							<span><?php echo $_SESSION['usrName']; ?></span>
							<i>Philippines</i>
							</div>
						</a>
						<div class="log_out_drp">
							<a href="inc/log_out.php"><i class="fas fa-sign-out-alt"></i></a>
						</div>
					</div>
				</div>
			</div>
			<?php
				}
				?>
		</nav>
	</header>