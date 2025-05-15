<?php
	$j = 0;
?>
<?php if($query->have_posts()):?>
<div class="bwp-recent-post <?php echo esc_attr($layout); ?>">
 <div class="block">
 	<?php if(isset($title1) && $title1) { ?>
	<div class="title-block">
		<h2><?php echo esc_html($title1); ?></h2>
		<?php if($description) { ?>
		<div class="page-description"><?php echo esc_html($description); ?></div>
		<?php } ?>  
	</div>
	<?php } ?>
	<div class="block_content navigation-show <?php echo esc_attr($navigation_style); ?>">
		<div id="<?php echo esc_attr($tag_id); ?>" class="slick-carousel" data-slidestoscroll="true" data-dots="<?php echo esc_attr($show_pag);?>" data-nav="<?php echo esc_attr($show_nav);?>" data-columns4="<?php echo $columns4; ?>" data-columns3="<?php echo $columns3; ?>" data-columns2="<?php echo $columns2; ?>" data-columns1="<?php echo $columns1; ?>" data-columns="<?php echo $columns; ?>">
			<?php while($query->have_posts()):$query->the_post(); ?>
			<!-- Wrapper for slides -->
			<?php if( ( $j % $item_row ) == 0 && $item_row !=1) { ?>
				<div class="item">
				<?php } ?>
					<div <?php post_class( 'post-grid' ); ?>>	
						<div class="post-inner">
							<div class="post-image">
								<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
								<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail( 'post-thumbnail', array( 'class' => 'fade-in lazyload' ), array( 'alt' => get_the_title() ) );
									} else {
										echo '<img class="fade-in lazyload" src="' . esc_url( get_template_directory_uri() . '/images/placeholder.jpg' ) . '" alt="' . get_the_title() . '">';
									}
								?>
								</a>
								<div class="day-cmt">
									<?php wpbingo_posted_on2(); ?>
								</div>
							</div>
							<div class="post-content">
								<div class="content-post">
									<?php if(isset($show_categories) && $show_categories) : ?>
										<?php if( bwp_category_post()){ ?>
											<div class="post-categories">
												<a href="<?php echo esc_url(bwp_category_post()->cat_link);?>"><?php echo esc_html(bwp_category_post()->name); ?></a>
											</div>
										<?php } ?>
									<?php endif;?>
									<h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
									<?php if(isset($show_content_meta) && $show_content_meta) : ?>
										<div class="entry-by entry-meta">
											<?php if (aenyo_get_config('archives-author')) { ?>
												<div class="entry-author">
													<span class="entry-meta-link"><i class="wpb-icon-user"></i><?php echo esc_html__("By : ","wpbingo"); ?><?php echo the_author_posts_link(); ?></span>
												</div>
											<?php } ?>
											<div class="comments-link">
												<i class="wpb-icon-chat"></i>
												<a href="<?php echo esc_attr('#respond'); ?>" >
													<?php 
													$comment_count =  wp_count_comments(get_the_ID())->total_comments;
													if($comment_count > 0) {
													?>
														<?php if($comment_count == 1){?>
															<?php echo esc_attr($comment_count) .'<span>'. esc_html__(' Comment', 'wpbingo').'</span>'; ?>
														<?php }else{ ?>
															<?php echo esc_attr($comment_count) .'<span>'. esc_html__(' Comments', 'wpbingo').'</span>'; ?>
														<?php } ?>
													<?php }else{ ?>
														<?php echo esc_attr($comment_count) .'<span>'. esc_html__(' Comments', 'wpbingo').'</span>'; ?>
													<?php } ?>
												</a>
											</div>
										</div>
									<?php endif;?>
									<?php if(isset($show_excerpt) && $show_excerpt) : ?>
										<?php echo wpbingo_get_excerpt( $length, false ); ?>
									<?php endif;?>
									<?php if(isset($show_button) && $show_button) : ?>
										<div class="btn-read-more"><a class="read-more" href="<?php the_permalink() ?>"><?php echo esc_html__("See More","wpbingo") ?></a></div>
									<?php endif;?>
								</div>
							</div>
						</div>
					</div><!-- #post-## -->
				<?php if( ($j % $item_row == 1 || $j == $post_count) && $item_row !=1  ){?> 
				</div>
				<?php  } $j++;?>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
 </div>
</div>
<?php endif;?>