<?php
	include 'home.php';
	include 'inc/conn_db.php';
	if ($_SESSION['usrName']) {
	$currentUser = $_SESSION['usrID']; //So that the current user will not be included in list
	$friends = mysqli_query($conn,"SELECT * FROM users WHERE id != '$currentUser'");?>

	<div class="friends_container" style="margin-top: 20px;">
		<div class="f_header_wrap">

			<span><i class="fas fa-user-friends" style="padding-right: 10px;"></i>Friends</span>
			
		</div>
		<div>
		<?php while ($rows = mysqli_fetch_assoc($friends)) {
			$id = $rows['id'];?>
			<div class="f_prof">
				<div class="f_prof_img">
					<?php
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
					<!-- <img src="image/prof.jpg"> -->
				</div>
				<div class="f_prof_name" style="display: flex;flex-direction: column;color: #222; padding: 35px 20px;">
					<span style="display: block;width: 50px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;"><?php echo $rows['userName']; ?></span>
					<i id="f_num_count">0 friends</i>
				</div>
				<div style="padding: 35px 20px;right: 0;">
					<button style="width: 100px;height: 25px;">Friends</button>
					<button style="width: 100px;height: 25px;">Message</button>
				</div>
			</div>
		 <?php
		}
		?>	
		</div>
	</div>	
	<?php
		}else {
			header("Location: index.php");
			exit();
		}
	?>

</main>
<?php 
include 'footer.php';
?>