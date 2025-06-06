<?php
	$class_col_lg = ($columns == 5) ? '2-4'  : (12/$columns);
	$class_col_md = ($columns1 == 5) ? '2-4'  : (12/$columns1);
	$class_col_sm = ($columns2 == 5) ? '2-4'  : (12/$columns2);
	$class_col_xs = ($columns3 == 5) ? '2-4'  : (12/$columns3);
	$attributes = 'col-xl-'.$class_col_lg .' col-lg-'.$class_col_md .' col-md-'.$class_col_sm .' col-'.$class_col_xs;
	$classes = array('post-grid',$attributes);
	if($category){				
		$args = array(
			'post_type' => 'post',
			'category_name' => $category, 
			'posts_per_page' => $limit
		);
	}else{
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $limit
		);				
	}
	$query = new WP_Query($args);
	$post_count = $query->post_count;	
	$j = 1;	
?>
<?php if($query->have_posts()):?>
<div class="bwp-recent-post sidebar">
 <div class="block">
 	<?php if(isset($title1) && $title1) { ?>
		<h2 class="widget-title"><?php echo esc_html($title1); ?></h2>
	<?php } ?>
  <div class="block_content">
   <div id="<?php echo esc_attr($tag_id); ?>" class="row">
		<?php while($query->have_posts()):$query->the_post(); ?>
		<!-- Wrapper for slides -->
		<?php	if( ( $j % $item_row ) == 0 && $item_row !=1) { ?>
		<div class="item">
		<?php } ?>
			<div  <?php post_class( $classes ); ?>>
				<div class="item">
					<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
						<?php
							if( has_post_thumbnail() ) :
								the_post_thumbnail( 'aenyo-blog-sidebar', array( 'alt' => get_the_title() ) );
							else :
								echo '<img src="' . esc_url( get_template_directory_uri() . '/images/placeholder.jpg' ) . '" alt="' . get_the_title() . '">';
							endif;
						?>
					</a>
					<div class="post-content">
						<?php wpbingo_posted_on2(); ?>
						<h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2> 	 
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