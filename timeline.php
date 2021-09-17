<?php
	include 'home.php';
	?>
		<div class="home_content">
			<div class="about_container">
				<div style="background-color: #f3f3f3;position: sticky;top: -10px;">
					<div style="color: #222;padding: 15px;">
						<span style="font-weight: bold;font-size: 15px;">Profile Intro</span>
						<span style="float: right;font-size: 20px;margin-top: -5px;" class="dot_menu"><b>&#8230;</b></span>
					</div>	
					<hr> 
					<div class="h_b_f_m">
						<span class="b_f_m">About Me</span>
						<p style="padding: 10px 0 0px;color: #545454;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</p>
					</div>
					<div class="h_b_f_m">
						<span class="b_f_m">Favorite TV Shows</span>
						<p style="padding: 10px 0 0px;color: #545454;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
					</div>
					<div class="h_b_f_m">
						<span class="b_f_m">Favorite Music/Artist</span>
						<p style="padding: 10px 0 0px;color: #545454;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
					</div>
				</div>
				<div style="background-color: #f3f3f3;margin: 15px 0px;position:sticky;top: 345px;">
					<div style="color: #222;padding: 15px;">
						<span style="font-weight: bold;font-size: 15px;">Lates Videos</span>
						<span style="float: right;font-size: 20px;margin-top: -5px;"><b>&#8230;</b></span>
					</div>	
					<hr> 
					<div class="v_section">
						<video width="100%" style="margin: 5px 0px;" controls="false">
							<source src="videos/featureVids.mp4" type="video/mp4">
						</video>
					</div>
				</div>
				<div style="background-color: #f3f3f3;position: sticky;top: 580px;">
					<div style="color: #222;padding: 15px;">
						<span style="font-weight: bold;font-size: 15px;">Download</span>
					</div>
					<hr> 
					<div style="display: flex;flex-direction: row;" class="sidebar_menu">
						<a href="index.html"><p>Menu</p></a>
						<a href="#"><p>About</p></a>
						<a href="#"><p>Contact</p></a>			
						<a href="#"><p>Creator</p></a>
					</div>
				</div>
			</div>
			<div class="post_container">
				<!-- Comment Go here -->
				<?php
					include 'postForm.php';
					include 'comment_wrapper.php';
					?>
				<!-- Comment ends Here -->
			</div>
			<div class="feature_container">
				<div style="background-color: #f3f3f3;padding-bottom: 1px;">
					<div style="color: #222;padding: 15px;">
						<span style="font-weight: bold;font-size: 15px;">Lastest Photos</span>
						<span style="float: right;font-size: 20px;margin-top: -5px;"><b>&#8230;</b></span>
					</div>	
					<hr>
					<div style="width: 100%; margin-bottom: 15px;">
						<div class="f_image">
							<?php
	 							include 'inc/conn_db.php';
								$id = $_SESSION['usrID'];
								$img = "SELECT * FROM user_user_photo WHERE user_id = '$id' ORDER BY img_up_time DESC LIMIT 6";
								$img_query = mysqli_query($conn,$img);
								while($row = mysqli_fetch_assoc($img_query)){?>

							<img src="<?php echo 'inc/uploaded/'. $row['img_path'];?>">
							<?php
								}
							?>
						</div>
					</div>
				</div>
				<div style="background-color: #f3f3f3;margin: 15px 0px;">
					<div style="color: #222;padding: 15px;">
						<span style="font-weight: bold;font-size: 15px;">Friends</span>
						<span style="float: right;font-size: 20px;margin-top: -5px;"><b>&#8230;</b></span>
					</div>	
					<hr> 
					<div style="width: 100%; margin-bottom: 15px;">
						<div class="friends_prof">
							<div class="f_icon_prof">
								<img src="image/prof.jpg">
							</div>
							<div class="f_icon_prof">
								<img src="image/prof.jpg">
							</div>
							<div class="f_icon_prof">
								<img src="image/prof.jpg">
							</div>
							<div class="f_icon_prof">
								<img src="image/prof.jpg">
							</div>
							<div class="f_icon_prof">
								<img src="image/prof.jpg">
							</div>
							<div class="f_icon_prof">
								<img src="image/prof.jpg">
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
	</div>

</main>
<script src="script/post.js"></script>
</body>
</html>
<?php 
// include 'footer.php';
?>