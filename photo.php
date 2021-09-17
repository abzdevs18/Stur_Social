<?php
 include 'home.php';
 if ($_SESSION['usrName']) {
 ?>
	<div class="friends_container">
		<div class="f_header_wrap">
			<span><i class="far fa-images" style="padding-right: 10px;"></i>Photos</span>
		</div>
		<div>
			<div class="i_prof_save" style="width: 100%;">
				<div style="background: linear-gradient(transparent 0%, black 100%);">
				</div>
				<?php
	 				include 'inc/conn_db.php';
					$id = $_SESSION['usrID'];
					$img = "SELECT * FROM user_user_photo WHERE user_id = '$id' ORDER BY img_up_time DESC";
					$img_query = mysqli_query($conn,$img);
					while($row = mysqli_fetch_assoc($img_query)){?>
						<img src="<?php echo 'inc/uploaded/'. $row['img_path'];?>">
					<?php
					}
				?>
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
<?php 

include 'footer.php';
	?>
