<?php
if ( ! function_exists( 'aenyo_paging_nav' ) ) :
function aenyo_paging_nav() {
	global $wp_query, $wp_rewrite;
	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}
	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );
	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}
	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
	// Set up paginated links.
	$pagination = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $wp_query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => esc_html__( 'Previous', 'aenyo' ),
		'next_text' => esc_html__( 'Next', 'aenyo' ),
		'type'      => 'list'
	) );
	if ( $pagination ) :
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'aenyo' ); ?></h1>
		<div class="pagination loop-pagination">
			<?php echo wp_kses($pagination,'social'); ?>
		</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;
if ( ! function_exists( 'aenyo_post_nav' ) ) :
function aenyo_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<div class="prevNextArticle box">
		<div class="previousArticle">
			<?php previous_post_link( '%link', '<div class="hoverExtend active"><span>'.esc_html__('Previous','aenyo').'</span></div><h2 class="title">%title</h2>' ); ?>
		</div>
		<div class="nextArticle">
			<?php next_post_link( '%link', '<div class="hoverExtend active"><span>'.esc_html__('Next','aenyo').'</span></div><h2 class="title">%title</h2>' ); ?>
		</div>
	</div><!-- Previous / next article -->
	<?php
}
endif;
if ( ! function_exists( 'aenyo_post_related' ) ) :
function aenyo_post_related() {
	global $post;
	$tags = wp_get_post_tags($post->ID);
	if ($tags) { ?>
				<?php $first_tag = $tags[0]->term_id;
				$limit = aenyo_get_config('related-limit',2);
				$args = array(
					'tag__in' => array($first_tag),
					'post__not_in' => array($post->ID),
					'posts_per_page'=> $limit,
					'ignore_sticky_posts'=> 1
				);
				$query = new WP_Query($args);				
				$columns 	= aenyo_get_config('related_col_large',2);
				$columns1 = aenyo_get_config('related_col_medium',2);
				$columns2 	= aenyo_get_config('related_col_sm',2);	
				if( $query->have_posts() ) { ?>
				<div class="post-related">
					<div class="container">
						<div class="title-block"><h2><?php echo esc_html__('Keep reading...','aenyo'); ?></h2></div>
						<div class="content-related slick-carousel" data-slidestoscroll="true" data-columns4="1" data-columns3="1" data-columns2="<?php echo esc_attr($columns2); ?>" data-columns1="<?php echo esc_attr($columns1); ?>" data-columns="<?php echo esc_attr($columns); ?>">				
							<?php while ($query->have_posts()) : $query->the_post(); ?>
							<div id="post-<?php esc_attr(the_ID()); ?>" <?php post_class( 'post-grid' ); ?>>
								<div class="entry-post">
									<?php if ( get_the_post_thumbnail() ){?>
										<div class="entry-thumb single-thumb">
											<a class="post-thumbnail" href="<?php echo esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>">
												<?php
													if( has_post_thumbnail() ) :
														the_post_thumbnail( 'thumbnail', array( 'alt' => get_the_title() ) );
													else :
														echo '<img src="' . esc_url( get_template_directory_uri() . '/images/placeholder.jpg' ) . '" alt="' . the_title_attribute() . '">';
													endif;
												?>
											</a>
											<?php if( bwp_category_post()){ ?>
												<div class="post-categories">
													<a href="<?php echo esc_url(bwp_category_post()->cat_link);?>"><span><?php echo esc_html(bwp_category_post()->name); ?></span></a>
												</div>
											<?php } ?>
										</div>
									<?php } ?>
									<div class="post-content">
										<?php echo aenyo_time_link_2(); ?>
										<?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
											<span class="sticky-post<?php if ( get_the_post_thumbnail() ){?> have-thumbnail<?php } ?>"><?php echo esc_html__( 'Featured', 'aenyo' ) ?></span>
										<?php } ?>
										<h3 class="entry-title"><a href="<?php echo esc_url(the_permalink()) ?>"><?php echo the_title(); ?></a></h3>
										<?php
											if (aenyo_get_config('blog-excerpt')) {
												echo aenyo_get_excerpt( aenyo_get_config('list-blog-excerpt-length',70), true);
											}
										?>
									</div>
								</div>	
							</div><!-- #post-## -->
							<?php endwhile; ?>
						</div>
					</div>
				</div>					
		<?php } wp_reset_postdata(); ?>
	<?php }
}
endif;	
function aenyo_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'aenyo_category_count' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );
		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );
		set_transient( 'aenyo_category_count', $all_the_cool_cats );
	}
	if ( 1 !== (int) $all_the_cool_cats ) {
		return true;
	} else {
		return false;
	}
}
function aenyo_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'aenyo_category_count' );
}
add_action( 'edit_category', 'aenyo_category_transient_flusher' );
add_action( 'save_post',     'aenyo_category_transient_flusher' );
if ( ! function_exists( 'aenyo_post_thumbnail' ) ) :
function aenyo_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}
	if ( is_singular() ) : ?>
		<div class="post-thumbnail">
		<?php the_post_thumbnail( 'aenyo-full-width' ); ?>
		</div>
	<?php else : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'aenyo-full-width' ); ?>
		</a>
	<?php endif; // End is_singular()
}
endif;
if ( ! function_exists( 'aenyo_single_posted_on' ) ) :
function aenyo_single_posted_on() { 
	global $aenyo_settings,$post; ?>
	<div class="entry-meta">
		<!-- Categories -->
		<?php $categories_list = get_the_category_list( __( ', ', 'aenyo' ) );
		if ( $categories_list ) : ?>
			<span class="cat-links">
				<span><?php echo esc_html__('', 'aenyo'); ?></span>
				<?php echo wp_kses( $categories_list,'social' ); ?>
			</span>
		<?php endif; ?>
		<!-- End if categories. -->
	</div>			
<?php }
endif;
if ( ! function_exists( 'aenyo_single_posted_on_2' ) ) :
function aenyo_single_posted_on_2(){
	global $aenyo_settings,$post;?>
	<?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
		<span class="sticky-post"><?php echo esc_html__( 'Featured', 'aenyo' ) ?></span>
	<?php } ?>
	<?php if (aenyo_get_config('archives-author')) { ?>
		<div class="entry-author">
			<span><i class="wpb-icon-user"></i><?php echo esc_html__( 'By: ', 'aenyo' ) ?></span><span class="entry-meta-link"><?php echo the_author_posts_link(); ?></span>
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
					<?php echo esc_attr($comment_count) .'<span>'. esc_html__(' Comment', 'aenyo').'</span>'; ?>
				<?php }else{ ?>
					<?php echo esc_attr($comment_count) .'<span>'. esc_html__(' Comments', 'aenyo').'</span>'; ?>
				<?php } ?>
			<?php }else{ ?>
				<?php echo esc_attr($comment_count) .'<span>'. esc_html__(' Comments', 'aenyo').'</span>'; ?>
			<?php } ?>
		</a>
	</div>
<?php }
endif;
if ( ! function_exists( 'aenyo_single_author' ) ) :
function aenyo_single_author(){
	global $aenyo_settings,$post;
	$user_description = get_user_meta( get_the_author_meta( 'ID' ), 'description', true ); ?>
	<?php if ( aenyo_get_config('archives-author',true) && $user_description ) { ?>
		<div class="entry-meta-author">
			<div class="author-avatar">
				<span class="author-image"><?php echo get_avatar( get_the_author_meta( 'ID' ), 100); ?> </span>
			</div>
			<div class="author-info">
				<span class="author-link"><?php the_author_posts_link(); ?></span>
				<span class="author-description"><?php the_author_meta('description'); ?></span>
			</div>
		</div>	
	<?php } ?>
<?php }
endif;
if ( ! function_exists( 'aenyo_posted_on' ) ) :
function aenyo_posted_on() { 
	global $aenyo_settings,$post; ?>
	<div class="entry-meta">
		<div class="post-date">
			<?php echo aenyo_time_link(); ?>
		</div>
	</div>			
<?php }
endif;
if ( ! function_exists( 'aenyo_posted_on_2' ) ) :
function aenyo_posted_on_2() { 
	global $aenyo_settings,$post; ?>	
	<div class="entry-date">
		<?php echo aenyo_time_link_2(); ?>
	</div>
<?php }
endif;
if ( ! function_exists( 'aenyo_entry_footer' ) ) :
	function aenyo_entry_footer() {
		edit_post_link(
			sprintf(
				wp_kses(
					__( 'Edit <span class="screen-reader-text">%s</span>', 'aenyo' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;
if ( ! function_exists( 'aenyo_time_link' ) ) :
	function aenyo_time_link() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s"><span class="day">%2$s</span><span class="month">%3$s</span></time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s"><span class="day">%2$s</span><span class="month">%3$s</span></time><time class="updated" datetime="%6$s"><span class="day">%2$s</span><span class="month">%3$s</span></time>';
		}
		$time_string = sprintf(
			$time_string,
			get_the_date( DATE_W3C ),
			get_the_date('j'),
			get_the_date('M'),
			get_the_date('Y'),
			get_the_date('g:i a'),
			get_the_modified_date( DATE_W3C ),
			get_the_modified_date()
		);
		return sprintf(
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
	}
endif;
if ( ! function_exists( 'aenyo_time_link_2' ) ) :
	function aenyo_time_link_2() {
		$time_string = '<time class="published updated" datetime="%1$s">%7$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="published" datetime="%1$s">%7$s</time><time class="updated" datetime="%6$s">%7$s</time>';
		}
		$time_string = sprintf(
			$time_string,
			get_the_date( DATE_W3C ),
			get_the_date('j'),
			get_the_date('M'),
			get_the_date('Y'),
			get_the_date('g:i a'),
			get_the_modified_date( DATE_W3C ),
			get_the_modified_date()
		);
		return sprintf(
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
	}
endif;
function aenyo_get_page_title(){
	global $aenyo_settings;
	$enable_breadcrumb = aenyo_get_config('breadcrumb',true);
	$show_page_title = aenyo_get_config('show_page_title',true);
	$enable_title = aenyo_get_config('page_title',true);
	$show_page_title_bg = aenyo_get_config('show_page_title_bg',true);
	$show_subcategories = aenyo_get_config('show-subcategories','show');
	$subcategories_style = aenyo_get_config('style-subcategories','image_categories');
	$color = aenyo_get_config('color_contet','dark');
	$bg_default ='';
	if($show_page_title_bg){
		$bg_default = isset($aenyo_settings['page_title_bg']['url']) ? $aenyo_settings['page_title_bg']['url'] : "";
		if( function_exists('is_product_category') && is_product_category()){
			$current_category = get_queried_object();
			$category_bg_breadcrumb = get_term_meta( $current_category->term_id, 'category_bg_breadcrumb', true );
			$bg = !empty($category_bg_breadcrumb) ? $category_bg_breadcrumb : $bg_default;
		}else{
			$bg = $bg_default;
		}
	}
	$class_empty = (empty($bg)) ? " empty-image" : ""; ?>
	<?php if( !is_single() ): ?>
		<?php if($show_page_title) { ?>
			<div data-bg_default ="<?php echo esc_attr($bg_default); ?>" class="page-title bwp-title<?php echo esc_attr($class_empty); ?> <?php echo esc_attr($color); ?>" <?php echo (!empty($bg) ? ' style="background-image:url(' .esc_url($bg). ');"' : ''); ?>>
				<div class="container" >	
				<?php if($enable_title): ?>
					<?php aenyo_page_title(); ?>
				<?php endif;
				if($enable_breadcrumb): ?>
					<?php
						if(function_exists('is_woocommerce') && is_woocommerce()){
							if (class_exists("WCV_Vendors") && WCV_Vendors::is_vendor_page()){
								get_template_part( 'breadcrumb');
							}else{
								aenyo_woocommerce_breadcrumb();
							}
						}else{
							get_template_part( 'breadcrumb');
						}		
					?>			
				<?php endif; ?>
				<?php if( apply_filters( 'aenyo_custom_category', $html = '' ) && ($show_subcategories =='show') && ($subcategories_style !='image_categories2') && function_exists('is_woocommerce') && is_woocommerce() ){ ?>
					<?php
						$sub_col_large 		= aenyo_get_config('sub_col_large',6);
						$sub_col_medium 	= aenyo_get_config('sub_col_medium',4);
						$sub_col_sm 		= aenyo_get_config('sub_col_sm',3);
						$sub_col_xs 		= aenyo_get_config('sub_col_xs',1);
					?>
					<div class="woocommerce-product-subcategorie-content">
						<div class="subcategorie-content">
							<ul class="woocommerce-product-subcategories slick-carousel <?php echo esc_attr($subcategories_style) ?>" data-nav="true" data-columns4="<?php echo esc_attr($sub_col_xs); ?>" data-columns3="<?php echo esc_attr($sub_col_xs); ?>" data-columns2="<?php echo esc_attr($sub_col_sm); ?>" data-columns1="<?php echo esc_attr($sub_col_medium); ?>" data-columns="<?php echo esc_attr($sub_col_large); ?>">
								<?php echo (apply_filters( 'aenyo_custom_category', $html = '' )); ?>
							</ul>
						</div>
					</div>
				<?php } ?>
				</div>
			</div><!-- .container -->
		<?php }else{ ?>
			<div class="page-title bwp-title no-pagetitle"></div>
		<?php } ?>
	<?php else : ?>
		<?php if($show_page_title) { ?>
			<div class="breadcrumb-noheading">
				<div class="container">
				<?php if(function_exists('is_woocommerce') && is_woocommerce()){
					if (class_exists("WCV_Vendors") && WCV_Vendors::is_vendor_page()){
						get_template_part( 'breadcrumb');
					}else{
						aenyo_woocommerce_breadcrumb();
					}
				}else{
					get_template_part( 'breadcrumb');
				} ?>
				</div>
			</div>	
		<?php }else{ ?>
			<div class="page-title bwp-title no-pagetitle"></div>
		<?php } ?>
	<?php endif; ?>
<?php }
function aenyo_page_title() {
	global $post; ?>
	<div class="content-title-heading">
		<span class="back-to-shop"><?php echo apply_filters( 'woocommerce_page_title', esc_html__('Shop', 'aenyo') ); ?></span>
		<h1 class="text-title-heading">
			<?php						
			if( is_category() ) :
				single_cat_title();
			elseif (class_exists("WCV_Vendors") && WCV_Vendors::is_vendor_page()) :
				$vendor_shop 		= urldecode( get_query_var( 'vendor_shop' ) );
				$vendor_id   		= WCV_Vendors::get_vendor_id( $vendor_shop );
				$shop_name 			= WCV_Vendors::get_vendor_shop_name( stripslashes( $vendor_id ) );
			echo esc_html($shop_name);
			elseif (class_exists("WeDevs_Dokan") && dokan()->vendor->get( get_query_var( 'author' ) ) && get_query_var( 'author' ) != 0 ) :
				$store_user    = dokan()->vendor->get( get_query_var( 'author' ) );
				$shop_name 			= $store_user->get_shop_name();
				echo esc_html($shop_name);							
			elseif ( is_tax() ) :
				single_tag_title();	
			elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
				esc_html_e( 'Galleries', 'aenyo' );
			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				esc_html_e( 'Images', 'aenyo' );
			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				esc_html_e( 'Videos', 'aenyo' );
			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				esc_html_e( 'Quotes', 'aenyo' );
			elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
				esc_html_e( 'Audios', 'aenyo' );
			elseif ( is_archive() && is_author() ) :
				esc_html_e( 'Posts by " ', 'aenyo' ) . the_author() . esc_html_e(' " ','aenyo');
			elseif ( function_exists('is_shop') && is_shop() ) :							
				esc_html_e( 'Shop', 'aenyo' );
			elseif ( is_archive() && !is_search()) :						
				the_archive_title();
			elseif ( is_search() ) :
				printf( esc_html__( 'Search for: %s', 'aenyo' ), get_search_query() );
			elseif ( is_404() ) :
				esc_html_e( '404 Error', 'aenyo' );
			elseif ( is_singular( 'knowledge' ) ) :
				esc_html_e( 'Knowledge Base', 'aenyo' );
			elseif ( is_home() ) :
				esc_html_e( 'Blogs', 'aenyo' );
			else :
				echo get_the_title();
			endif;
			?>
		</h1>
	</div><!-- Page Title -->
<?php }
?>