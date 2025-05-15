<?php  
	if( $category == '' ){
		return ;
	}
	if(isset($columns) && isset($columns1) && isset($columns2) && isset($columns3)){
		$class_col_lg = ($columns == 5) ? '2-4'  : (12/$columns);
		$class_col_md = ($columns1 == 5) ? '2-4'  : (12/$columns1);
		$class_col_sm = ($columns2 == 5) ? '2-4'  : (12/$columns2);
		$class_col_xs = ($columns3 == 5) ? '2-4'  : (12/$columns3);
		$attributes = 'col-xl-'.$class_col_lg .' col-lg-'.$class_col_md .' col-md-'.$class_col_sm .' col-'.$class_col_xs;
	}else{
		$attributes = '';
	}

	$item_row = (isset($item_row) && $item_row) ? $item_row : 1;
	if( !is_array( $category ) ){
		$category = explode( ',', $category );
	}
	$widget_id = isset( $widget_id ) ? $widget_id : 'category_slide_'.rand().time(); 
?>
<div id="<?php echo $widget_id; ?>" class="bwp-woo-categories <?php echo esc_attr($layout); ?>">
		<?php if( $title1) : ?>
			<h3 class="bwp-categories-title title"><?php echo esc_html( $title1 ); ?></h3>
		<?php endif; ?>
		<?php if( isset($subtitle) && $subtitle) : ?>
			<div class="bwp-categories-subtitle">					
				<?php echo ($subtitle); ?>							
			</div>	
		<?php endif;?>
		<div class="content-category row">
			<?php
				foreach( $category as $j => $cat ){
					$term = get_term_by('slug', $cat, 'product_cat');
					if($term) :
						$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
						$thumbnail_id1 = get_term_meta( $term->term_id, 'thumbnail_id1', true );
						$thumb = wp_get_attachment_url( $thumbnail_id );
						if(!$thumb)
							$thumb = wc_placeholder_img_src();
						
						$thumb1 = $thumbnail_id1;
						if(!$thumb1)
							$thumb1 = wc_placeholder_img_src();
						?>
						<?php if( ( $j % $item_row ) == 0 ) { ?>
						<?php } ?>
							<div class="item-product-cat-content <?php echo esc_attr($attributes); ?>">
								<div class="product-cat-content-info">
									<div class="info content-reveal">
										<h2 class="item-name">
											<a class="link" href="<?php echo get_term_link( $term->term_id, 'product_cat' ); ?>">
												<span><?php echo esc_html( $term->name ); ?></span>
											</a>
										</h2>
										<div class="images">
											<?php if(isset($show_thumbnail) && $show_thumbnail) : ?>
												<?php if($thumb) : ?>
													<img class="image-reveal" src="<?php echo esc_url($thumb); ?>"/>
												<?php endif ; ?>
											<?php endif;?>
											<?php if(isset($show_thumbnail1) && $show_thumbnail1) : ?>
												<img class="image-reveal" src="<?php echo esc_url($thumb1); ?>"/>
											<?php endif;?>
										</div>
									</div>
								</div>
							</div>
						<?php if( ( $j+1 ) % $item_row == 0 || ( $j+1 ) == count($category) ){?>
						<?php  } ?>
					<?php endif; ?>		
			<?php } ?>
		</div>
	</div>