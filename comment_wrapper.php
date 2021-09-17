<?php
	include 'inc/conn_db.php';
	if ($_SESSION['usrName']) {

	$usr_id = $_SESSION['usrID'];
	$p_list = mysqli_query($conn,"SELECT * FROM post WHERE user_id = $usr_id OR audience = 1 ORDER BY post_timestamp DESC");
		// CONDITION: show comments which ID is equal to current user_id
		//			  And the audience is public('1')
	while ($rows = mysqli_fetch_assoc($p_list)) {
			$post_id = $rows['post_id'];
			$usr_id = $rows['user_id'];?>
				<div class="post_wrap">
					<div class="p_owner" style="display: flex;flex-direction: row;">
						<div class="prof_image">

							<?php
							include 'inc/conn_db.php';
							$id = $_SESSION['usrID'];
							$img = "SELECT * FROM user_user_photo WHERE user_id = '$usr_id' AND profile_photo = 1";
							$q_img = mysqli_query($conn,$img);
							$row = mysqli_fetch_assoc($q_img);
							if($row){?>
							<img src="<?php echo "inc/uploaded/".$row['img_path']; ?>">
							<?php 
								} else {?>
							<img src="image/default/user_default.png">
							<?php
								}   
							//responsible for small green circle icon STATUS notification
							$status = mysqli_query($conn,"SELECT online FROM users WHERE id = '$usr_id'");
							$result_status = mysqli_fetch_assoc($status);
							if ($result_status['online'] == 1) {?>
								<div style="width: 15px;height: 15px;background-color: #42b72a;border: 2px solid #f2f3f5;border-radius: 50%;position: absolute;margin: -20px 35px;">
								</div>
							<?php 
							}
							// END HERE STATUS notification
							?>
						</div>
						<div style="display: flex;flex-direction: column;color: #222;margin: 20px 0;">
							<!-- show user in here. -->
							<?php showUser($conn,$usr_id); ?>
							<!-- End of showing users -->
							<span style="font-size: 12px;font-style: italic;"><?php echo $rows['post_date']; ?></span>
						</div>
						<div style="float: right;position: absolute;display: inline;right: 0;margin: 10px;">
							<span style="font-size: 20px; color: #222;font-weight: bold;"><b>&#8230;</b></span>
						</div>
					</div>
					<div class="p_content" style="text-align: center;font-size: 50px;">
						<p style="padding: 80px;background-color: #325777;color: #fff;border-radius: 5px;"><?php echo $rows['post_description'];?></p>
					</div>
					<hr style="width: 90%;margin:0 auto;">
					<div class="p_reactions">
						<div style="padding: 10px;margin-left: 5%;width: 100%;">
							<div style="width: 80%;">
								<!-- Reaction to the POST, script start from here -->
								<a href="inc/like.php?p=<?php echo $post_id; ?>"><i class="fas fa-thumbs-up" id="r_icons" title="Likes"></i></a>
								<?php 
								$query = mysqli_query($conn, "SELECT post_like,post_dislike FROM reactions WHERE post_id = '$post_id'");
								$r = mysqli_fetch_assoc($query);
								?>
								<span style="font-size: 14px;margin: 0 10px 0 5px;" id="like"><?php echo $r['post_like']; ?></span>

								<a href="inc/dislike.php?p=<?php echo $post_id; ?>"><i class="fas fa-thumbs-down" id="r_icons" title="Unlike"></i></a>
								<span style="font-size: 14px;margin: 0 10px 0 5px;"><?php echo $r['post_dislike']; ?></span><br>
								<!-- The length between like and dislike -->
								<?php
									$length = $r['post_dislike'] + $r['post_like'];

								?>
								<progress value="<?php echo $r['post_like']; ?>" max="<?php echo $length; ?>" style="height: 4px;width: 85%;background-color: #222;border-radius: 15px;"></progress>
								<!-- Reaction ends here -->
							</div>
						</div>
						<div class="r_c_s" title="Comments" onclick=" showComment(<?php echo $rows['post_id'];?>)">
							<i class="far fa-comments" id="r_c_s"></i>
							<span>Comment</span>
							<!-- <button onclick="myFunction()">Comment</button> -->
						</div>
						<div class="r_c_s" title="Share">
							<i class="far fa-share-square" id="r_c_s"></i>
							<span>Share</span>
							
						</div>
					</div>
					<hr style="width: 90%;margin:0 auto;">
					<div class="wrap_comment" id="<?php echo $rows['post_id'];?>" style="display: none;">
						<!-- use the previous query ($p_list) to save load time -->

						<?php show_comments($conn,$post_id,$usr_id) ?>

						<!-- Deafault Comment field -->

					</div>
					<form class="f_r_comment" method="POST" action="inc/comment.php">
						<div class="h_prof_icon_img" style="margin: 5px 0px;">

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
						<div class="r_comment_">
							<input type="text" name="comment" placeholder="Comment on this post...<?php echo $post_id; ?>" style="border-radius: 30px !important;padding: 5px 12px;margin-top: 5px;">
							<input type="hidden" name="postID" value="<?php echo $post_id;?>">
							<input type="hidden" name="parent_comment_id" value="0">
						</div>
						<input type="submit" name="submit" style="display: none;">
					</form>
				</div>
<?php
	}
}else {
	header("Location: index.php");
	exit();
}
?>

<?php
/*
*
* The show_comments() will only show the root comment
*	Use in line 91
*/

function show_comments($conn,$post_id,$usr_id){

	$comment_list = mysqli_query($conn,"SELECT * FROM comments WHERE post_id = $post_id AND parent_comment_id = 0 ORDER BY comment_timestamp DESC");

	while ($rows = mysqli_fetch_assoc($comment_list)) {
		$comment_id = $rows['comment_id'];
		$parent_comment = $rows['parent_comment_id'];?>

 		<div class="previous_r_comment" style="padding-bottom: 0px;">
			<div class="h_prof_icon_img" style="margin: 0px 4px 5px 0px">

							<?php
							include 'inc/conn_db.php';
							// $id = $_SESSION['usrID'];
							$img = "SELECT * FROM user_user_photo WHERE user_id = '$usr_id' AND profile_photo = 1";
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
			<div class="previous_r_comment_details" style="width: 100%;padding: 5px 0px;">
				<div class="comment_style_prof_com">
					<b style="padding-right: 5px;"><?php echo $_SESSION['usrName'];?></b>
					<p style="font-size: 15px;"><?php echo $rows['comment_content']; ?></p>
				</div>
				<!-- <hr style="margin-top: 5px;"> -->
				<div style="width: 100%;display: flex;flex-direction: row;padding: 5px 0px;padding: 5px 0px 0px;" class="c_r_reactions">
					<span title="parent_comment_id"><?php echo $rows['parent_comment_id'];?></span>
					<span class="l_d" title="comment_id"><?php echo $comment_id;?></span>
					<span style="margin-left: 10px;" id="comment_span" onclick="showComment(<?php echo $comment_id;?>);">Reply</span>
				</div>
			</div>	
		</div>
		<!-- Put here the form for Replying the comment. -->
		<div id="<?php echo $comment_id;?>" style="display: none;">
		<?php reply_comments($conn,$comment_id)?> 
			
		<form class="f_r_comment" method="POST" action="inc/comment.php">
			<div class="h_prof_icon_img" style="margin: 5px 0px 5px 40px;">

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
			<div class="r_comment_">
				<input type="text" name="comment" placeholder="Reply on this comment...<?php echo $comment_id;?>" style="border-radius: 30px !important;padding: 5px 12px;margin-top: 5px;">
				<input type="hidden" name="postID" value="<?php echo $post_id;?>">
				<input type="hidden" name="parent_comment_id" value="<?php echo $comment_id;?>">
			</div>
			<input type="submit" name="submit" style="display: none;">
		</form>
		</div>

<?php 	
	}
}?>

<?php
/*
*
* The reply_comments() will only show the reply of the root comments. Add the function to show_comments() to show both comment and reply
* use in line 180
*/
function reply_comments($conn,$comment_id, $paddingLeft=0){
	
	$comment_list = mysqli_query($conn,"SELECT * FROM comments WHERE parent_comment_id = $comment_id ORDER BY comment_timestamp DESC");

	while ($rows = mysqli_fetch_assoc($comment_list)) {
		$reply_parent_comment = $rows['parent_comment_id'];
		$comment_id = $rows['comment_id'];
	if ($reply_parent_comment == 0) {
		$paddingLeft = 0;
	}else {
		$paddingLeft = 35;
	}
		?>

	  	<div class="previous_r_comment" style="padding-left: <?php echo $paddingLeft.'px;';?>" >
			<div class="h_prof_icon_img" style="margin: 0px 4px 0px 0px;border-left: 2px solid red;padding-left: 5px;">
				<img src="image/prof.jpg">
			</div>
			<div class="previous_r_comment_details" style="width: 100%;padding: 5px 0px;">
				<div class="comment_style_prof_com">
					<b style="padding-right: 5px;"><?php echo $_SESSION['usrName'];?></b>
					<p style="font-size: 15px;"><?php echo $rows['comment_content']; ?></p>
				</div>
				<div style="width: 100%;display: flex;flex-direction: row;padding: 5px 0px;" class="c_r_reactions">
					<span><?php echo $comment_id;?></span>
					<span class="l_d">Dislike</span>
					<!-- <span style="margin-left: 10px;" id="comment_span" onclick="showReply(<?php echo $reply_parent_comment;?>);">Reply</span> -->
				</div>
			</div>	
		</div>
<?php
	}
}
?>
<?php 
// We create this function to query the users table to show the name of the user who post in the website
// Use in line 42
 function showUser($conn,$usr_id){
 	$name = mysqli_query($conn,"SELECT userName FROM users WHERE id = $usr_id");
 	$row = mysqli_fetch_assoc($name);?>
	<span id="p_author_prof" style="font-size: 13px;font-weight: bold;"><?php echo $row['userName'];?></span>
 <?php
}

?>
<!-- 
show or hide the comments of certain post.
The parameters will serve to which form should show -->
<script>
	function showReply(comID){
		var reply_form = document.getElementById(comID);

		if(reply_form.style.display == 'none'){
			reply_form.style.display = 'flex';
		}else {
			reply_form.style.display = 'none';
		}
	}
	// Use in onClick event in line 76
		function showComment(postID){
		var reply_form = document.getElementById(postID);

		if(reply_form.style.display == 'none'){
			reply_form.style.display = 'block';
		}else {
			reply_form.style.display = 'none';
		}
	}
</script>