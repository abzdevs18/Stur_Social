<?php
 include 'home.php';
 ?>
	<div class="friends_container">
		<div class="f_header_wrap">
			<span><i class="far fa-file-video" style="padding-right: 10px;"></i>Videos</span>
		</div>
		<div>
			<div class="i_prof_save">
				<div class="v_list" style="padding: 3px;border: 1px solid #999;width: calc((100% / 4) - 4px);overflow: hidden;">
					<i class="far fa-times-circle" id="v_del" title="delete video"></i>

					<div style="">
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