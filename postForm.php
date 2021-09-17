<div class="post_wrap" style="/*position: sticky;*/top: 65px;z-index: 2;margin-top: -15px;">
	<div class="p_container">
		<form method="POST" action="inc/post.php" id="post_submit">
			<div class="p_profile_wrapper">
				<div style="display: flex;">
					
				<div class="p_profile">
					<div class="p_prof_icon">
							<!-- Photo in header navigation profile Image -->
								<?php
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
							<!-- End of the photo -->
					</div>
					<div class="p_prof_loc">
						<span style="font-size: 16px;"><?php echo $_SESSION['usrName'];?></span><br>
						<span><i style="font-size: 13px;">Philippines</i></span>
					</div>
				</div>
				<div class="audience_wrapper">
					<select class="select_audience" style="background: #f3f3f3 !important;" name="audience" id="audience">
						<option value="0">Private</option>
						<option value="1">Public</option>
					</select>
				</div>
				</div>
<!-- 				<style>
					#postContent[contenteditable=true]:empty:before{
					  content: attr(placeholder);
					  display: block;
					  color: #555;
					  outline: none;
					}
					#postContent {
						background-color: #f3f3f3 !important;
						outline: none;
						border-radius: 0px;
						border:none;
						font-size: 1.5em;
						color: #555;
					}
				</style> -->
				<div class="p_details">
					<!-- <p id="postContent" contenteditable="true" placeholder="Let us know your emotion <?php echo $_SESSION['usrName'];?>"></p> -->
					<input type="text" name="p_details" placeholder="Let us know your emotion <?php echo $_SESSION['usrName'];?>" maxlength="50">
				<input type="hidden" name="post_timeStamp">
		<!-- 		<div style="width: 100%;padding: 3px;">
					<div style="width: 10%;">
						<img src="#" id="photo_src" style="width: 100%;">
					</div>
				</div> -->
				</div>
				<hr style="width: 98%;margin: 0 auto;">
				<div class="submitPost">
<!-- 					<div style="display: flex;flex-direction: row;float: left;">
						<div class="p_icon" style="margin-left: 20px;">
							<i class="far fa-images" id="icon_photo"></i> 
							<input type="file" name="photo" id="photoUpload" style="width: 30px;overflow: hidden; position: relative;margin: -12px -35px;opacity: 0;cursor: pointer;">
						</div>
						<div class="p_icon">
							<i class="far fa-file-video"></i>
						</div>						
					</div> -->
					<div class="s_btn_post">
						<input type="submit" name="submit" value="Post">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- Study this part -->
<!-- <script>
	function readURL(input) {

	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	      $('#photo_src').attr('src', e.target.result);
	    }

	    reader.readAsDataURL(input.files[0]);
	  }
	}
	$("#photoUpload").change(function() {
	  readURL(this);
	});
</script> -->