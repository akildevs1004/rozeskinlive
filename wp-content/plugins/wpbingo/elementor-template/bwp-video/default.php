<div class="bwp-widget-video <?php echo esc_attr($layout); ?>">
	<?php  if($image): ?>
	<div class="bg-video">		
		<div class="video-wrapper videos">
			<div class="bwp-image">
				<div class="videoThumb">
					<img class="img-responsive" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr__("Image Video","wpbingo"); ?>" />
				</div>
			</div>
		</div>
	</div>
	<?php endif;?>
	<div class="content">
		<?php
			$has_link = $link ? true : false;
			if ($has_link):
				$youtube_id = aenyo_get_youtube_video_id($link);
				$vimeo_id = aenyo_get_vimeo_video_id($link);
				$url_video = $youtube_id ? "https://www.youtube.com/embed/" . esc_attr($youtube_id) : ($vimeo_id ? "https://player.vimeo.com/video/" . esc_attr($vimeo_id) : "#");
			?>
			<div class="bwp-video modal" data-src="<?php echo esc_attr($url_video); ?>">
				<div class="button-video">
					<i class="icon-play-video icon" aria-hidden="true"></i>
				</div>
			</div>
			<div class="content-video modal fade" id="myModal">
				<div class="remove-show-modal"></div>
				<div class="modal-dialog modal-dialog-centered">
					<div class="close-video"></div>
					<iframe id="video" src="<?php echo esc_attr($url_video); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
