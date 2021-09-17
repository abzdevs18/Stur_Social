<?php
	include 'home.php';
	?>
	<div class="friends_container" style="margin-top: 20px;">
		<div class="f_header_wrap">
			<span><i class="fas fa-user-alt" style="padding-right: 10px;"></i>About</span>
		</div>
		<div>
<!-- 
Firstname
Lastname
Email
Gender
Birth-Day
Motto
 -->
			<div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laboru</p>
			</div>
		</div>
	</div>
<!--
*
*
* Photos
*
*
-->	
	<div class="friends_container">
		<div class="f_header_wrap">
			<span><i class="far fa-images" style="padding-right: 10px;"></i>Photos</span>
		</div>
		<div>
			<div class="i_prof_save" style="">
				<div style="background: linear-gradient(transparent 0%, black 100%);">
				</div>
				<img src="image/prof.jpg">
			</div>
		</div>
	</div>
<!--
*
*
* Friends
*
*
-->
	<div class="friends_container" style="margin-top: 20px;">
		<div class="f_header_wrap">

			<span><i class="fas fa-user-friends" style="padding-right: 10px;"></i>Friends</span>
			
		</div>
		<div>
			<div class="f_prof">
				<div class="f_prof_img">
					<img src="image/prof.jpg">
				</div>
				<div class="f_prof_name" style="display: flex;flex-direction: column;color: #222; padding: 35px 20px;">
					<span>Clint Anthony E. Abueva</span>
					<i id="f_num_count">0 friends</i>
				</div>
				<div style="padding: 35px 20px;right: 0;">
					<button style="width: 100px;height: 25px;"><i class="fas fa-check" style="margin-right: 10px;"></i>Friends</button>
				</div>
			</div>
		</div>
	</div>
<!--
*
*
* Videos
*
*
-->
	<div class="friends_container">
		<div class="f_header_wrap">
			<span><i class="far fa-file-video" style="padding-right: 10px;"></i>Videos</span>
		</div>
		<div>
			<div class="i_prof_save">
				<div style="padding: 3px;border: 1px solid #999;">
					<i class="far fa-times-circle" id="v_del"></i>

					<div>
						<video width="100%" height="100%" controls>
							<source src="videos/featureVids.mp4" type="video/mp4">
						</video>
					</div>
					<div style="color: #222;text-align: center;display: flex;flex-direction: column;padding: 10px 0;">
						<b>Lorem ipsum dolor sit</b>
						<span style="font-size: 13px;font-style: italic;"><?php echo Date('F j, Y'); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
	include 'footer.php';
	?>