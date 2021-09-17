<?php
 include 'header.php';
 error_reporting(0);
 if ($_SESSION['usrName']) {
 ?>
<main>
	<div class="home_container">
		<!-- m is for message -->
		<div class="m_container">	
			<div class="m_r_s">
				<div class="top-chat">
					<div class="title-chat">
						<span>Stur Messages</span>
					</div>
					<div class="user_c_form">
						<i class="fas fa-search" id="search_icon"></i>
						<input type="text" name="searchUser" placeholder="search your recipient.. ">
					</div>
				</div>
				<div class="c_box_panel" id="dres">
				<?php
				include 'inc/conn_db.php';
				$user = $_SESSION['usrName'];
				$queryUser = "SELECT * FROM users WHERE userName != '$user'";
				$query = mysqli_query($conn,$queryUser);
				$id = $_REQUEST['user'];
				while ($rows = mysqli_fetch_assoc($query)) {
					$id_for_mg = $rows['id'];?>
				<a href="message.php?user=<?php echo $rows['id']; ?>">
					<!-- Below line of code very crucial in determining which user is click -->
					<?php $u_click_id = $_REQUEST['user']; ?>
					<!-- inline php script make a background change if requested user  is the same with the ID -->
					<div class="p_c_img_wrapper <?php if ($u_click_id == $rows['id']) {
						echo 'userActive';
					}?>">

					<!-- for user selected in chat box -->

						<div class="p_c_img">
							<!-- The user ICON in message BOX -->
							<!-- in this part style the icon to detemine if the user is online or not -->
						<?php
							include 'inc/conn_db.php';
							$id = $_SESSION['usrID'];
							$img = "SELECT * FROM user_user_photo WHERE user_id = $id_for_mg ORDER BY img_up_time DESC LIMIT 1";
							$q_img = mysqli_query($conn,$img);
							$row = mysqli_fetch_assoc($q_img);
							if($row){?>
							<img src="<?php echo "inc/uploaded/".$row['img_path']; ?>" style="<?php
								if ($rows['online'] == 1 ) {
								echo "border:3px solid #2c83b9;"; //this will create a circular green border in users icon
								}else {
// 									if the user is offline white color
									echo "border:3px solid #fff;";
// 									if mo log out see what will happen
								}
							?>">
							<?php 
								} else {?>
							
							<img src="image/default/user_default.png" style="<?php
								if ($rows['online'] == 1 ) {
								echo "border:2px solid #2c83b9;"; //this will create a circular green border in users icon
								}else {
// 									if the user is offline white color
									echo "border:2px solid #fff;";
// 									if mo log out see what will happen
								}
							?>">
							<?php
								}
							
							?>
						</div>
						<div class="p_c_name">
							<span class="u_name"><?php echo $rows['userName']; ?></span><br>
							<span class="l_name">Philippines</span>
							<p class="c_brief_description">
						cillum dolore eu fug
						cillum dolore eu fug</p>
						</div>
					</div>
				</a>
				<?php
				 }
				?>
				</div>
			</div>
			<div class="m_panel">
				<div style="width: 100%;position: relative;min-height: 100vh;">
					<div style=" width: 100%;padding: 15px;background-color: #f3f3f3;position: sticky;top: 55px;text-align: center;border-bottom: 1px solid #222;">
						<span style="color: #2f76a4;">Welcome</span>
					</div>
					<div style="margin-top: 30px;">
				<?php

					include 'chatFrame.php';

				 ?>
				 	</div>
				<form id="messageBox" method="POST" action="inc/send_receive.php" style="width: 70%;height: 30px;margin-left:-13px;position: fixed;bottom: 0;">
					<input type="text" name="message" placeholder="send a message..." >
					<input type="hidden" name="receiver" value="<?php echo $_REQUEST['user']; ?>">
					<input type="hidden" name="sender" value="<?php echo $_SESSION['usrID']; ?>">
					<input type="submit" name="send" value="send">
				</form> 

				</div>
			</div>
		</div>
	</div>
</main>
<?php
	}else {
		header("Location: index.php");
		exit();
	}
?>
<script>
	$(document).ready(function(){
		$('#usir').focus(function(){
			$(this).toggleClass("backGround");
		});
	});
</script>
