<?php
include 'inc/conn_db.php';
$revId = $_REQUEST['user']; 
$currentUser = $_SESSION['usrID'];
$query = "SELECT * FROM tbl_msg WHERE (msg_sender = $currentUser AND msg_receiver = $revId) OR (msg_sender = $revId AND msg_receiver = $currentUser) ORDER BY msg_time ASC";
$resQuery = mysqli_query($conn, $query);
$result = mysqli_num_rows($resQuery);
if ($result > 0) {
	while ($rows = mysqli_fetch_assoc($resQuery)) {
		if($rows['msg_sender'] == $currentUser){?>
			<div style="display: block;clear: right;">
				<div class="c_s_panel_wrapper">
					<p style="font-size: 14px;"><?php echo $rows['msg_content'];?></p>
					<div class="c_s_p_img">
					<?php
						$img = "SELECT * FROM user_user_photo WHERE user_id = $currentUser ORDER BY img_up_time DESC LIMIT 1";
						$q_img = mysqli_query($conn,$img);
					while ($row = mysqli_fetch_assoc($q_img)) {?>
						<img src="<?php echo "inc/uploaded/".$row['img_path']; ?>" name="profile_img" id="profileImageContainer" alt="Profile Image">
						<?php 
						}
					?>
					</div>
				</div>
			</div>
		<?php 
			}else{
				?>
				<div style="display: block;clear: right;">
					<div class="c_r_panel_wrapper">
						<p style="font-size: 14px;"><?php echo $rows['msg_content']; ?></p>
						<div class="c_r_p_img">
						<?php
							$img = "SELECT * FROM user_user_photo WHERE user_id = $revId ORDER BY img_up_time DESC LIMIT 1";
							$q_img = mysqli_query($conn,$img);
							while ($row = mysqli_fetch_assoc($q_img)) {?>
							<img src="<?php echo "inc/uploaded/".$row['img_path']; ?>" name="profile_img" id="profileImageContainer" alt="Profile Image">
							<?php 
								}
							?>
						</div>
					</div>
				</div>	
			<?php
		}
	}
}