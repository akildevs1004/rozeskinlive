<?php
	function aenyo_get_config($option,$default='1'){
		$aenyo_settings = aenyo_global_settings();
		$query_string = aenyo_get_query_string();
		parse_str($query_string, $params);
		if(isset($params[$option]) && $params[$option]){
			return $params[$option];
		}else{
			$value = isset($aenyo_settings[$option]) ? $aenyo_settings[$option] : $default;
			return $value;
		}
	}
	function aenyo_get_query_string(){
		global $wp_rewrite;
		$request = remove_query_arg( 'paged' );
		$home_root = esc_url(home_url());
		$home_root = parse_url($home_root);
		$home_root = ( isset($home_root['path']) ) ? $home_root['path'] : '';
		$home_root = preg_quote( $home_root, '|' );
		$request = preg_replace('|^'. $home_root . '|i', '', $request);
		$request = preg_replace('|^/+|', '', $request);
		$request = preg_replace( "|$wp_rewrite->pagination_base/\d+/?$|", '', $request);
		$request = preg_replace( '|^' . preg_quote( $wp_rewrite->index, '|' ) . '|i', '', $request);
		$request = ltrim($request, '/');
		$qs_regex = '|\?.*?$|';
		preg_match( $qs_regex, $request, $qs_match );
		if ( !empty( $qs_match[0] ) ) {
			$query_string = $qs_match[0];
			$query_string = str_replace("?","",$query_string);
		} else {
			$query_string = '';
		}
		return 	$query_string;
	}
	function aenyo_global_settings(){
		global $aenyo_settings;
		return $aenyo_settings;
	}
	function aenyo_limit_verticalmenu(){
		global $aenyo_page_id;
		$vertical = new stdClass;
		$max_number_1530	= aenyo_get_config('max_number_1530',12);
		$vertical->max_number_1530 	= (get_post_meta( $aenyo_page_id, 'max_number_1530', true )) ? get_post_meta($aenyo_page_id, 'max_number_1530', true ) : $max_number_1530;
		
		$max_number_1200	= aenyo_get_config('max_number_1200',8);
		$vertical->max_number_1200  	= (get_post_meta( $aenyo_page_id, 'max_number_1200', true )) ? get_post_meta($aenyo_page_id, 'max_number_1200', true ) : $max_number_1200;
		
		$max_number_991		= aenyo_get_config('max_number_991',6);
		$vertical->max_number_991  	= (get_post_meta( $aenyo_page_id, 'max_number_991', true )) ? get_post_meta($aenyo_page_id, 'max_number_991', true ) : $max_number_991;
		
		return $vertical;
	}
	if ( ! function_exists( 'aenyo_popup_newsletter' ) ) {
		function aenyo_popup_newsletter() {
			$aenyo_settings = aenyo_global_settings();
			echo '<div id="newsletterpopup" class="bingo-modal newsletterpopup">';
			echo '<div class="newsletterpopup_overlay"></div>';
			echo '<div class="wp-newsletter">';
			echo '<div class="close-popup"><span class="close-wrap"><span class="close-line close-line1"></span><span class="close-line close-line2"></span></span></div>';
				if(isset($aenyo_settings['background_newsletter_img']['url']) && !empty($aenyo_settings['background_newsletter_img']['url'])){
					echo '<div class="image"> <img src='.esc_url($aenyo_settings['background_newsletter_img']['url']).' alt="'.esc_attr__( 'Image Newsletter','aenyo' ).'"></div>';
				}
				dynamic_sidebar('newsletter-popup-form');
			echo '</div>';
			echo '</div>';
		}
	}
	function aenyo_config_font(){
		$config_fonts = array();
		$text_fonts = array(
			'family_font_body',
			'family_font_custom',
			'h1-font',
			'h2-font',
			'h3-font',
			'h4-font',
			'h5-font',
			'h6-font',
			'class_font_custom'
		);
		foreach ($text_fonts as $text) {
			if(aenyo_get_config($text))
				$config_fonts[$text] = aenyo_get_config($text);
		}
		return $config_fonts;
	}
	function aenyo_get_class(){
		$class = new stdClass;
		$sidebar_left_expand 		= aenyo_get_config('sidebar_left_expand',3);
		$sidebar_left_expand_md 	= aenyo_get_config('sidebar_left_expand_md',3);
		$class->class_sidebar_left  = 'col-xl-'.$sidebar_left_expand.' col-lg-'.$sidebar_left_expand_md.' col-md-12 col-12';
		$sidebar_right_expand 		= aenyo_get_config('sidebar_right_expand',3);
		$sidebar_right_expand_md 	= aenyo_get_config('sidebar_right_expand_md',3);
		$class->class_sidebar_right  = 'col-xl-'.$sidebar_right_expand.' col-lg-'.$sidebar_right_expand_md.' col-md-12 col-12';
		$sidebar_blog = aenyo_blog_sidebar();
		if($sidebar_blog == 'left' && is_active_sidebar('sidebar-blog')){
			$blog_content_expand = 12- $sidebar_left_expand;
			$blog_content_expand_md = 12- $sidebar_left_expand_md;
		}elseif($sidebar_blog == 'right' && is_active_sidebar('sidebar-blog')){
			$blog_content_expand = 12- $sidebar_right_expand;
			$blog_content_expand_md = 12- $sidebar_right_expand_md;
		}else{
			$blog_content_expand = 12;
			$blog_content_expand_md = 12;
		}
		$class->class_blog_content  = 'col-xl-'.$blog_content_expand.' col-lg-'.$blog_content_expand_md.' col-md-12 col-12';		
		$post_single_layout = aenyo_post_sidebar();
		if($post_single_layout == 'sidebar' && is_active_sidebar('sidebar-blog')){
			$blog_single_expand = 12- $sidebar_left_expand;
			$blog_single_expand_md = 12- $sidebar_left_expand_md;
		}else{
			$blog_single_expand = 12;
			$blog_single_expand_md = 12;
		}
		$class->class_single_content  = 'col-xl-'.$blog_single_expand.' col-lg-'.$blog_single_expand_md.' col-md-12 col-12';		
		$category_style = aenyo_get_config('category_style','sidebar');
		if($category_style == 'sidebar' && is_active_sidebar('sidebar-product')){
			$product_content_expand = 12- $sidebar_left_expand;
			$product_content_expand_md = 12- $sidebar_left_expand_md;
		}else{
			$product_content_expand = 12;
			$product_content_expand_md = 12;
		}
		$class->class_product_content  = 'col-xl-'.$product_content_expand.' col-lg-'.$product_content_expand_md.' col-md-12 col-12';		
		$blog_col_large 	= 12/(aenyo_get_config('blog_col_large',3));
		$blog_col_medium = 12/(aenyo_get_config('blog_col_medium',3));
		$blog_col_sm 	= 12/(aenyo_get_config('blog_col_sm',3));
		$class->class_item_blog = 'col-xl-'.$blog_col_large.' col-lg-'.$blog_col_medium.' col-md-'.$blog_col_sm.' col-sm-12 col-12';
		return $class;
	}
	function aenyo_post_sidebar(){
		$post_single_layout = aenyo_get_config('post-single-layout','sidebar');
		return 	$post_single_layout;
	}
	function aenyo_blog_view(){
		$blog_view = aenyo_get_config('layout_blog','standar');
		return 	$blog_view;
	}
	function aenyo_blog_sidebar(){
		$sidebar 		= aenyo_get_config('sidebar_blog','left');
		return 	$sidebar;
	}	
	function aenyo_is_customize(){
		return isset($_POST['customized']) && ( isset($_POST['customize_messenger_chanel']) || isset($_POST['wp_customize']) );
	}	
	function aenyo_search_form( $form ) {
		$form = '<form role="search" method="get" id="searchform" class="search-from" action="' . esc_url(home_url( '/' )) . '" >
					<div class="container">
						<div class="form-content">
							<input type="text" value="' . esc_attr(get_search_query()) . '" name="s"  class="s" placeholder="' . esc_attr__( 'Search...', 'aenyo' ) . '" />
							<button id="searchsubmit" class="btn" type="submit">
								<i class="icon-search"></i>
								<span>' . esc_html__( 'Search', 'aenyo' ) . '</span>
							</button>
						</div>
					</div>
				  </form>';
		return $form;
	}
	add_filter( 'get_search_form', 'aenyo_search_form' );
	// Remove each style one by one
	add_filter( 'woocommerce_enqueue_styles', 'aenyo_jk_dequeue_styles' );
	function aenyo_jk_dequeue_styles( $enqueue_styles ) {
		unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
		unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
		unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
		return $enqueue_styles;
	}
	// Or just remove them all in one line
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );					
	function aenyo_woocommerce_breadcrumb( $args = array() ) {
		$args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
			'delimiter'   => '<span class="delimiter"></span>',
			'wrap_before' => '<div class="breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '>',
			'wrap_after'  => '</div>',
			'before'      => '',
			'after'       => '',
			'home'        => _x( 'Home', 'breadcrumb', 'aenyo' )
		) ) );
		$breadcrumbs = new WC_Breadcrumb();
		if ( $args['home'] ) {
			$breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
		}
		$args['breadcrumb'] = $breadcrumbs->generate();
		wc_get_template( 'global/breadcrumb.php', $args );
	}
	add_filter('woocommerce_add_to_cart_fragments', 'aenyo_woocommerce_header_add_to_cart_fragment');
	function aenyo_woocommerce_header_add_to_cart_fragment( $fragments )
	{
	    global $woocommerce;
	    ob_start(); 
	    get_template_part( 'woocommerce/minicart-ajax' );
	    $fragments['.mini-cart'] = ob_get_clean();
	    return $fragments;
	}
	function aenyo_display_view(){
		echo aenyo_grid_list();
    }
	function aenyo_grid_list(){
		$active_column_2 = $active_column_3 = $active_column_4 = $active_list = '';
		$product_col_large = aenyo_get_config('product_col_large',4);
		$category_view_mode = aenyo_category_view();
		$query_string = '?'.aenyo_get_query_string();
		$product_col_medium = 12 /(aenyo_get_config('product_col_medium',3));
		$product_col_sm 	= 12 /(aenyo_get_config('product_col_sm',1));
		$product_col_xs 	= 12 /(aenyo_get_config('product_col_xs',1));
		$class_item_product = 'col-lg-'.$product_col_medium.' col-md-'.$product_col_sm.' col-'.$product_col_xs;
		if($category_view_mode == 'grid'){
			$active_column_2 = ($product_col_large == 2 ) ? 'active' : '';
			$active_column_3 = ($product_col_large == 3 ) ? 'active' : '';
			$active_column_4 = ($product_col_large == 4 ) ? 'active' : '';			
		}else{
			$active_list = ($category_view_mode == 'list') ? 'active' : '';
		}
		$query_grid_string = add_query_arg( 'category-view-mode', 'grid', $query_string );
		$html = '<ul class="display hidden-sm hidden-xs">
				<li>
					<a data-col="col-xl-6 '.esc_attr($class_item_product).'" class="view-grid two '.esc_attr($active_column_2).'" href="'. add_query_arg('product_col_large', '2', $query_grid_string).'"><span></span><span></span></a>
				</li>
				<li>
					<a data-col="col-xl-4 '.esc_attr($class_item_product).'" class="view-grid three '.esc_attr($active_column_3).'" href="'. add_query_arg('product_col_large', '3', $query_grid_string).'"><span></span><span></span><span></span></a>
				</li>
				<li>
					<a data-col="col-xl-3 '.esc_attr($class_item_product).'" class="view-grid four '.esc_attr($active_column_4).'" href="'. add_query_arg('product_col_large', '4', $query_grid_string).'"><span></span><span></span><span></span><span></span></a>
				</li>
				<li>
					<a class="view-list '.esc_html($active_list).'" href="'. add_query_arg('category-view-mode', 'list', $query_string).'"><span></span><span></span><span></span></a>
				</li>
			</ul>';
		return $html;
	}
	function aenyo_category_view(){
		$id_category =  is_tax() ? get_queried_object()->term_id : 0;
		$category_view = get_term_meta( $id_category, 'category_view', true );
		if( $category_view &&  $id_category != 0 ){
			$category_view_mode = $category_view;
		}else{
			$category_view_mode 		= aenyo_get_config('category-view-mode','grid');	
		}
		return 	$category_view_mode;
	}	
	function aenyo_main_menu($id,$name,$layout = "") {
		global $aenyo_settings, $post;
		$show_cart = $show_wishlist = false;
		if ( isset($aenyo_settings['show_cart']) ) {
		$show_cart            = $aenyo_settings['show_cart'];
		}
		if ( isset($aenyo_settings['show_wishlist']) ) {
		$show_wishlist            = $aenyo_settings['show_wishlist'];
		}
		$vertical_header_text = (isset($aenyo_settings['vertical_header_text']) && $aenyo_settings['vertical_header_text']) ? $aenyo_settings['vertical_header_text'] : '';
		$page_menu = $menu_output = $menu_full_output = $menu_with_search_output = $menu_float_output = $menu_vert_output = "";
		$main_menu_args = array(
			'echo'            => false,
			'theme_location' => $name,
			'walker' => new aenyo_mega_menu_walker,
		);
		$menu_output .= '<nav id="'.$id.'" class="std-menu clearfix">'. "\n";
		if(function_exists('wp_nav_menu')) {
			if (has_nav_menu('main_navigation')) {
				$menu_output .= wp_nav_menu( $main_menu_args );
			}
			else {
				if(is_user_logged_in()){
					$menu_output .= '<div class="no-menu">'. esc_html__("Please assign a menu to the Main Menu in Appearance > Menus", 'aenyo').'</div>';
				}
			}
		}
		$menu_output .= '</nav>'. "\n";
		switch ($layout) {
			case 'full':
					$menu_full_output .= '<div class="container">'. "\n";
					$menu_full_output .= '<div class="row">'. "\n";
					$menu_full_output .= '<div class="menu-left">'. "\n";
					$menu_full_output .= $menu_output . "\n";
					$menu_full_output .= '</div>'. "\n";
					$menu_full_output .= '<div class="menu-right">'. "\n";
					$menu_full_output .= '</div>'. "\n";
					$menu_full_output .= '</div>'. "\n";
					$menu_full_output .= '</div>'. "\n";
					$menu_output = $menu_full_output;
				break;
			case 'float':
					$menu_float_output .= '<div class="float-menu">'. "\n";
					$menu_float_output .= $menu_output . "\n";
					$menu_float_output .= '</div>'. "\n";
					$menu_output = $menu_float_output;
				break;
			case 'float-2':
					$menu_float_output .= '<div class="float-menu container">'. "\n";
					$menu_float_output .= $menu_output . "\n";
					$menu_float_output .= '</div>'. "\n";
					$menu_output = $menu_float_output;
				break;				
			case 'vertical':
				$menu_vertical_output .= $menu_output . "\n";
				$menu_vertical_output .= '<div class="vertical-menu-bottom">'. "\n";
				if($vertical_header_text)
				$menu_vertical_output .= '<div class="copyright">'.do_shortcode(stripslashes($vertical_header_text)).'</div>'. "\n";
				$menu_vertical_output .= '</div>'. "\n";
				$menu_output = $menu_vertical_output;
				break;
		}	
		return $menu_output;
	}				
	add_action('admin_enqueue_scripts','aenyo_upload_scripts');	
	function aenyo_upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
    }		
	function aenyo_body_classes( $classes ) {
		if (is_single() || is_page() && !is_front_page()) {
			$classes[] = basename(get_permalink());
		}			
		$type_banner 					= 	aenyo_get_config('banners_effect');
		$product_layout_thumb 			= 	aenyo_get_config('layout-thumbs');
		$header_overlay					= 	aenyo_get_config('header-overlay');
		$single_background 				= 	aenyo_get_config('single_background','');
		$show_page_title_bg 			= 	aenyo_get_config('show_page_title_bg',false);
		$bg_default 					= 	isset($aenyo_settings['page_title_bg']['url']) ? $aenyo_settings['page_title_bg']['url'] : "";
		$post_single_layout 			=   aenyo_post_sidebar();
		$classes[] 						= 	$type_banner;		
		$direction 						= 	aenyo_get_direction(); 
		if($direction && $direction == 'rtl'){
			$classes[] = 'rtl';
		}
		if( $header_overlay == 'show' && $show_page_title_bg == 'show' && ( is_shop() || is_product_category())){
			$classes[] = 'shop-header_overlay';
		}
		if(  function_exists('is_product') && is_single() && is_product()){
			$classes[] = $product_layout_thumb;
		}
		if(is_single() && is_singular( 'post' )){
			$classes[] = 'single-post-'.$post_single_layout;
		}
		return $classes;
	}
	add_filter( 'body_class', 'aenyo_body_classes' );
	function aenyo_post_classes( $classes ) {
		if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
			$classes[] = 'has-post-thumbnail';
		}
		return $classes;
	}
	add_filter( 'post_class', 'aenyo_post_classes' );
	function aenyo_get_excerpt($limit = 45, $more_link = true, $more_style_block = false) {
		$aenyo_settings = aenyo_global_settings();
		if (!$limit) {
			$limit = 45;
		}
		if (has_excerpt()) {
			$content = get_the_excerpt();
		} else {
			$content = get_the_content();
		}
		if($content)
		{
			$check_readmore = false;
			$content = aenyo_strip_tags( apply_filters( 'the_content', $content ) );
			$content = explode(' ', $content, $limit);
			if (count($content) >= $limit) {
				$check_readmore = true;
				array_pop($content);
				$content = implode(" ",$content).'... ';
			} else {
				$content = implode(" ",$content);
			}
			$content = '<p class="post-excerpt">'.wp_kses($content,'social').'</p>';
			if ($more_link && $check_readmore) {
				if ($more_style_block) {
					$content .= ' <a class="read-more read-more-block" href="'.esc_url( apply_filters( 'the_permalink', get_permalink() ) ).'">'.esc_html__('Read More', 'aenyo').'</a>';
				} else {
					$content .= ' <a class="read-more" href="'.esc_url( apply_filters( 'the_permalink', get_permalink() ) ).'">'.esc_html__('Read More', 'aenyo').'</a>';
				}
			}
		}
		return $content;
	}
	function aenyo_strip_tags( $content ) {
		$content = str_replace( ']]>', ']]&gt;', $content );
		$content = preg_replace("/<script.*?\/script>/s", "", $content);
		$content = preg_replace("/<style.*?\/style>/s", "", $content);
		$content = strip_tags( $content );
		return $content;
	}
	if( !function_exists( 'aenyo_get_direction' ) ) :
	function aenyo_get_direction(){
		$direction = aenyo_get_config('direction','ltr');		
		if (isset($_COOKIE['aenyo_direction_cookie']))
			$direction = $_COOKIE['aenyo_direction_cookie'];
		if(isset($_GET['direction']) && $_GET['direction'])
			$direction = $_GET['direction'];
		return 	$direction;
	}
	endif;	
	function aenyo_get_entry_content_asset( $post_id ){
		$post = get_post( $post_id );
		$content = apply_filters ("the_content", $post->post_content);
		$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
		if ( ! empty( $video ) ) {
			$html = '';
			foreach ( $video as $video_html ) {
				$html .=   '<div class="video-wrapper">';
					$html .= $video_html;
				$html .= '</div>';
			}
			return $html;
		}
	}
	function aenyo_loading_overlay(){
		$aenyo_settings 		= aenyo_global_settings();
		$gif_loading 			= isset($aenyo_settings['gif_loading']['url']) && !empty($aenyo_settings['gif_loading']['url']);
		$gif_loading_width	 	= aenyo_get_config('gif_loading_width','');
		if(isset($aenyo_settings['show-loading-overlay']) && $aenyo_settings['show-loading-overlay'] ){ ?>
			<div class="loading-gif">
				<div id="loader-gif" <?php if($gif_loading){ ?> style="background:url('<?php echo esc_url($aenyo_settings['gif_loading']['url']); ?>') no-repeat;width:<?php echo esc_attr($gif_loading_width); ?>px;background-size: contain;background-position: center;"<?php } ?>>
				</div>
			</div>
		<?php }
	}
	function aenyo_header_logo(){
		$aenyo_settings = aenyo_global_settings();
		$sitelogo = (isset($aenyo_settings['sitelogo']['url']) && $aenyo_settings['sitelogo']['url']) ? $aenyo_settings['sitelogo']['url'] : "";
		$page_logo_url = get_post_meta( get_the_ID(), 'page_logo', true );
		$page_logo_url = ($page_logo_url) ? $page_logo_url : $sitelogo; ?>
		<div class="wpbingoLogo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php if($page_logo_url){ ?>
					<img src="<?php echo esc_url($page_logo_url); ?>" alt="<?php bloginfo('name'); ?>"/>
				<?php }else{
					$logo = get_template_directory_uri().'/images/logo/logo.png'; ?>
					<img src="<?php echo esc_attr( $logo ); ?>" alt="<?php bloginfo('name'); ?>"/>
				<?php } ?>
			</a>
		</div> 
	<?php }
	function aenyo_top_menu(){
		$aenyo_settings = aenyo_global_settings();
		echo '<div class="wpbingo-menu-wrapper">
			<div class="megamenu">
				<nav class="navbar-default">
					<div  class="bwp-navigation primary-navigation navbar-mega" data-text_close = "'.esc_html__('Close','aenyo').'">
						'.aenyo_main_menu( 'main-navigation','main_navigation', 'float' ).'
					</div>
				</nav> 
			</div>       
		</div>';
	}
	function aenyo_top_menu_left(){
		$aenyo_settings = aenyo_global_settings();
		echo '<div class="wpbingo-menu-wrapper">
			<div class="megamenu">
				<nav class="navbar-default">
					<div  class="bwp-navigation primary-navigation navbar-mega">
						'.aenyo_main_menu( 'menu-left','menu_left','float' ).'
					</div>
				</nav> 
			</div>       
		</div>';
	}	
	function aenyo_top_menu_right(){
		$aenyo_settings = aenyo_global_settings();
		echo '<div class="wpbingo-menu-wrapper">
			<div class="megamenu">
				<nav class="navbar-default">
					<div  class="bwp-navigation primary-navigation navbar-mega">
						'.aenyo_main_menu( 'menu-right','menu_right','float' ).'
					</div>
				</nav> 
			</div>       
		</div>';
	}
	function aenyo_menu_mostsearch(){
		$aenyo_settings = aenyo_global_settings();
		echo '<div class="wpbingo-menu-wrapper">
			<div class="megamenu">
				<nav class="navbar-default">
					<div  class="bwp-navigation primary-navigation navbar-mega" data-text_close = "'.esc_html__('Close','aenyo').'">
						'.aenyo_main_menu( 'content-mostsearch','content_mostsearch', 'float' ).'
					</div>
				</nav> 
			</div>       
		</div>';
	}

	function aenyo_navbar_vertical_menu(){
		echo '<div class="wpbingo-verticalmenu-mobile">
			<div class="navbar-header">
				<button type="button" id="show-verticalmenu"  class="navbar-toggle">
					<span>'. esc_html__("Vertical","aenyo") .'</span>
				</button>
			</div>
		</div>';
	}
	
	function aenyo_vertical_menu() {
		global $aenyo_settings;
		$menu_output = "";
		$vertical_menu_args = array(
			'echo'            => false,
			'theme_location' => 'vertical_menu',
			'walker' => new aenyo_mega_menu_walker,
		);	
		if(function_exists('wp_nav_menu')) {
			if (has_nav_menu('vertical_menu')) {
				$menu_output .=	'<h3 class="widget-title"><i class="icon-menu" aria-hidden="true"></i>'.esc_html__('ALL CATEGORIES','aenyo').'</h3>';
				$menu_output .='<div class="verticalmenu">
					<div  class="bwp-vertical-navigation primary-navigation navbar-mega">
						'.wp_nav_menu( $vertical_menu_args ).'
					</div> 
				</div>';
			}
		}
		
		return $menu_output;
	}
	
	function aenyo_dropdown_vertical_menu(){
		global $aenyo_page_id;
		$show_vertical_menu  = (get_post_meta( $aenyo_page_id, 'show_vertical_menu', true )) ? get_post_meta($aenyo_page_id, 'show_vertical_menu', true ) : 'accordion';
		return $show_vertical_menu;
	}	
	
	function aenyo_category_post(){
		global $post;
		$obj_category = new stdClass;
		$term_list = wp_get_post_terms($post->ID,'category',array('fields'=>'ids'));
		$cat_id = (int)$term_list[0];
		$category = get_term( $cat_id, 'category' );
		$obj_category->name = $category->name;
		$obj_category->cat_link = get_term_link ($cat_id, 'category');	
		return $obj_category;
	}
	function aenyo_copyright(){
		$aenyo_settings = aenyo_global_settings();?>
		<div class="bwp-copyright">
			<div class="container">		
			    <div class="row">
					<?php if(isset($aenyo_settings['footer-copyright']) && $aenyo_settings['footer-copyright']) : ?>		
						<div class="site-info col-sm-6 col-xs-12">
							<?php echo esc_html($aenyo_settings['footer-copyright']); ?>
						</div><!-- .site-info -->
					<?php else: ?>					
						<div class="site-info col-sm-6 col-xs-12">
							<?php echo esc_html__( 'Copyright 2023 ','aenyo'); ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__('aenyo', 'aenyo'); ?></a><?php echo esc_html__( '. All Rights Reserved.','aenyo'); ?>
						</div><!-- .site-info -->		
					<?php endif; ?>
					<?php if(isset($aenyo_settings['footer-payments']) && $aenyo_settings['footer-payments']) : ?>
						<div class="payment col-sm-6 col-xs-12">
							<a href="<?php echo isset($aenyo_settings['footer-payments-link']) ? esc_url($aenyo_settings['footer-payments-link']) : "#"; ?>">
								<img src="<?php echo isset($aenyo_settings['footer-payments-image']['url']) ? esc_url($aenyo_settings['footer-payments-image']['url']) : ""; ?>" alt="<?php echo isset($aenyo_settings['footer-payments-image-alt']) ? esc_attr($aenyo_settings['footer-payments-image-alt']) : ""; ?>" />
							</a>
						</div>		
					<?php endif; ?>	
				</div>
			</div>
		</div>	
		<?php	
	}
	function aenyo_render_footer($footer_style){
		$elementor_instance = Elementor\Plugin::instance();
		return $elementor_instance->frontend->get_builder_content_for_display( $footer_style );
	}
	if( !is_admin() ){
		add_filter( 'language_attributes', 'aenyo_direction', 20 );
		function aenyo_direction( $doctype = 'html' ){
	   		$direction = aenyo_get_direction();
	   		if ( ( function_exists( 'is_rtl' ) && is_rtl() ) || $direction == 'rtl' ){
	    		$attribute[] = 'direction="rtl"';
				$attribute[] = 'dir="rtl"';
	    		$attribute[] = 'class="rtl"';
	   		}
	   		( $direction === 'rtl' ) ? $lang = 'ar' : $lang = get_bloginfo('language');
	   		if ( $lang ) {
	   			if ( get_option('html_type') == 'text/html' || $doctype == 'html' )
	    			$attribute[] = "lang=\"$lang\"";
	   			if ( get_option('html_type') != 'text/html' || $doctype == 'xhtml' )
	    			$attribute[] = "xml:lang=\"$lang\"";
	   		}
	   		$aenyo_output = implode(' ', $attribute);
	   		return $aenyo_output;
		}
	}	
	function aenyo_comment( $comment, $args, $depth ) {
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
		?>
		<div class="media">
			<div class="media-left">
				<?php echo get_avatar( $comment, 70 ); ?>
			</div>
			<div class="media-body">
				<div class="comment-meta media-content commentmetadata">
					<div class="comment-author vcard">
					<?php printf( wp_kses_post( '<h2 class="media-heading">%s</h2>', 'aenyo' ), get_comment_author_link() ); ?>
					</div>
					<?php if ( '0' == $comment->comment_approved ) : ?>
					<em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'aenyo' ); ?></em>
					<?php endif; ?>
					<div class="media-silver">
						<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>" class="comment-date">
							<?php echo '<time datetime="' . get_comment_date( 'c' ) . '">' . get_comment_date() . ' ' . esc_attr__( 'at', 'aenyo'  ) . ' ' . get_comment_time() . '</time>'; ?>
						</a>
						<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div>
					<div id="div-comment-<?php comment_ID() ?>" class="comment-content">
						<div class="comment-text">
						<?php comment_text(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	function aenyo_prefix_kses_allowed_html($allowed_tags, $context) {
		switch($context) {
			case 'social': 
			$allowed_tags = array(
				'a' => array(
					'class' => array(),
					'href'  => array(),
					'rel'   => array(),
					'title' => array(),
				),
				'abbr' => array(
					'title' => array(),
				),
				'b' => array(),
				'blockquote' => array(
					'cite'  => array(),
				),
				'cite' => array(
					'title' => array(),
				),
				'code' => array(),
				'br' => array(),
				'del' => array(
					'datetime' => array(),
					'title' => array(),
				),
				'dd' => array(),
				'div' => array(
					'class' => array(),
					'title' => array(),
					'style' => array(),
					'data-title' => array(),
					'data-min' => array(),
					'data-max' => array(),
					'data-timeout' => array(),
					'data-id_product' => array(),
				),
				'dl' => array(),
				'dt' => array(),
				'em' => array(),
				'h1' => array(),
				'h2' => array(),
				'h3' => array(),
				'h4' => array(),
				'h5' => array(),
				'h6' => array(),
				'i' => array(
					'class'  => array(),
				),
				'img' => array(
					'alt'    => array(),
					'class'  => array(),
					'height' => array(),
					'src'    => array(),
					'width'  => array(),
				),
				'li' => array(
					'class' => array(),
				),
				'ol' => array(
					'class' => array(),
				),
				'p' => array(
					'class' => array(),
					'role'  => array(),
				),
				'q' => array(
					'cite' => array(),
					'title' => array(),
				),
				'span' => array(
					'class' => array(),
					'title' => array(),
					'style' => array(),
				),
				'strike' => array(),
				'strong' => array(),
				'ul' => array(
					'class' => array(),
				),
				'button' => array(
					'class' => array(),
					'type' => array(),
					'data-id' => array(),
				),
				'input' => array(
					'class' => array(),
					'type' => array(),
					'name' => array(),
					'value' => array(),
					'size' => array(),
					'aria-required' => array(),
					'aria-invalid' => array(),
					'placeholder' => array(),
				),
				'textarea' => array(
					'class' => array(),
					'cols' => array(),
					'rows' => array(),
					'aria-required' => array(),
					'aria-invalid' => array(),
					'placeholder' => array(),
				),
				'form' => array(
					'action' => array(),
					'method' => array(),
					'class' => array(),
					'novalidate' => array(),
					'data-status' => array(),
				),				
				'label' => array(),				
			);
			return $allowed_tags;
			default:
			return $allowed_tags;
		}
	}
	add_filter( 'wp_kses_allowed_html', 'aenyo_prefix_kses_allowed_html', 10, 2);
	if ( ! function_exists( 'wp_body_open' ) ) {
		function wp_body_open() {
			do_action( 'wp_body_open' );
		}
	}
	function aenyo_menu_mobile($vertical = false){
		$aenyo_settings = aenyo_global_settings();
		$cart_layout = aenyo_get_config('cart-layout','dropdown');
		$cart_style = aenyo_get_config('cart-style','light');
		$show_minicart = get_theme_mod('icon_cart_moble', true);
		if(get_theme_mod('header_moble_order')){
			$arr_mobile_order = explode("-", get_theme_mod('header_moble_order', ''));
		}else{
			$arr_mobile_order =  explode("-", "shop-account-search-wishlist");
		}
		if(get_theme_mod('header_moble_order_top')){
			$header_order_top   = get_theme_mod('header_moble_order_top', '');
			$arr_header_order_top = explode("-", get_theme_mod('header_moble_order_top', ''));
		}else{
			$header_order_top   = 'menu-logo-icon';
			$arr_header_order_top =  explode("-", "menu-logo-icon");
		}
	?>
	<div class="header-mobile">
		<div class="container">
			<div class="header-container <?php echo esc_attr($header_order_top) ?>">
				<?php foreach ($arr_header_order_top as $value) {
					switch ($value) {
						case 'menu': ?>
							<div class="navbar-header <?php echo get_theme_mod('menu_pos_moble', 'text-left'); ?>">
								<button type="button" id="show-megamenu"  class="navbar-toggle">
									<span><?php echo esc_html__('Menu','aenyo'); ?></span>
								</button>
							</div>
						<?php break;
						case 'logo': ?>
							<div class="header-logo-mobile <?php echo get_theme_mod('logo_pos_moble', 'text-center'); ?>">
								<?php aenyo_header_logo(); ?>
							</div>
						<?php break;
						case 'icon': ?>
							<div class="header-right <?php echo get_theme_mod('icon_pos_moble', 'text-right'); ?>">
								<?php if($vertical){?>
									<?php aenyo_navbar_vertical_menu(); ?>
								<?php } ?>
								<?php if($show_minicart && class_exists( 'WooCommerce' )){ ?>
									<div class="remove-cart-shadow"></div>
									<div class="aenyo-topcart aenyo-topcart-mobile <?php echo esc_attr($cart_layout); ?> <?php echo esc_attr($cart_style); ?>">
										<?php get_template_part( 'woocommerce/minicart-ajax' ); ?>
									</div>
								<?php } ?>
							</div>
						<?php break; default: ?>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
		<?php if(class_exists( 'WooCommerce' ) && get_theme_mod('header_moble_bottom', true)){ ?>
			<div class="header-mobile-fixed">
			<?php foreach ($arr_mobile_order as $value) { 
				switch ($value) { 
				case 'shop': ?>
					<div class="shop-page">
						<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">
							<i class="feather-grid"></i>
							<span><?php echo get_theme_mod('change_shop_title', 'Shop'); ?></span>
						</a>
					</div>
				<?php break;
				case 'account': ?>
					<div class="my-account">
						<div class="login-header">
							<a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>">
								<i class="feather-user"></i>
								<span><?php echo get_theme_mod('change_account_title', 'Account'); ?></span>
							</a>
						</div>
					</div>
				<?php break;
				case 'search': ?>
					<div class="search-box">
						<div class="search-toggle">
							<i class="feather-search"></i>
							<span><?php echo get_theme_mod('change_search_title', 'Search'); ?></span>
						</div>
					</div>
				<?php break;
				case 'wishlist': ?>
					<?php if( class_exists( 'WPCleverWoosw' )){ ?>
						<div class="wishlist-box">
							<a href="<?php echo WPcleverWoosw::get_url(); ?>">
								<i class="feather-heart">
									<span class="count-wishlist"><?php echo WPcleverWoosw::get_count(); ?></span>
								</i>
								<span><?php echo get_theme_mod('change_wishlist_title', 'Wishlist'); ?></span>
							</a>
						</div>
					<?php } ?>
				<?php break; default: ?>
					<div class="shop-page">
						<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">
							<i class="feather-grid"></i>
							<span><?php echo esc_html("Shop","aenyo")?></span>
						</a>
					</div>
					<div class="my-account">
						<div class="login-header">
							<a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>">
								<i class="feather-user"></i>
								<span><?php echo esc_html("Account","aenyo")?></span>
							</a>
						</div>
					</div>
					<div class="search-box">
						<div class="search-toggle">
							<i class="feather-search"></i>
							<span><?php echo esc_html("Search","aenyo")?></span>
						</div>
					</div>
					<?php if( class_exists( 'WPCleverWoosw' )){ ?>
						<div class="wishlist-box">
							<a href="<?php echo WPcleverWoosw::get_url(); ?>">
								<i class="feather-heart">
									<span class="count-wishlist"><?php echo WPcleverWoosw::get_count(); ?></span>
								</i>
								<span><?php echo esc_html("Wishlist","aenyo")?></span>
							</a>
						</div>
					<?php } ?>
				<?php } ?>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
	<?php }
	function aenyo_campbar(){
	$aenyo_settings = aenyo_global_settings();
	$show_campbar 			= aenyo_get_config('show-campbar',false);
	$img_campbar 			= isset($aenyo_settings['img-campbar']['url']) && !empty($aenyo_settings['img-campbar']['url']);
	$color_campbar 			= aenyo_get_config('color-background-campbar','000000');
	$color_content_campbar 	= aenyo_get_config('color-content-campbar','ffffff');
	$color_text_campbar 	= aenyo_get_config('color-text-campbar','ff0000');
	$content_campbar 		= aenyo_get_config('content-campbar','Summer sale discount');
	$link_campbar 			= aenyo_get_config('link-campbar','#');
	$content_marquee 		= aenyo_get_config('content-marquee',false);
	$text_campbar 		= aenyo_get_config('extra-text-campbar','off 60%');
	$number_marquee 		= aenyo_get_config('number-marquee', 10);
	if($show_campbar) {
	?>
	<div class="header-campbar hidden" style="<?php if($show_campbar){ ?>background-color:<?php echo esc_attr($color_campbar); ?>;<?php if($img_campbar){ ?>background:url('<?php echo esc_url($aenyo_settings['img-campbar']['url']); ?>')<?php } } ?>">
		<div class="content-campbar">
			<div class="content-text">
				<?php if( $content_marquee ){ ?>
					<div class="marquee_text_content">
						<ul>
							<?php for ($i = 1; $i <= $number_marquee; $i++) { ?>
								<li>
									<a style="<?php if($show_campbar){ ?>color:<?php echo esc_attr($color_content_campbar);?><?php } ?>" href="<?php echo esc_url($link_campbar); ?>">
										<?php echo esc_html($content_campbar); ?>
										<span style="<?php if($show_campbar){ ?>color:<?php echo esc_attr($color_text_campbar);?><?php } ?>"><?php echo esc_html($text_campbar); ?></span>
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				<?php }else{ ?>
					<a style="<?php if($show_campbar){ ?>color:<?php echo esc_attr($color_content_campbar);?><?php } ?>" href="<?php echo esc_url($link_campbar); ?>">
						<?php echo esc_html($content_campbar); ?>
						<span style="<?php if($show_campbar){ ?>color:<?php echo esc_attr($color_text_campbar);?><?php } ?>"><?php echo esc_html($text_campbar); ?></span>
					</a>
				<?php } ?>
			</div>
			<div class="close-campbar"></div>
		</div>
	</div>
	<?php } }
	function aenyo_login_form() { ?>
	<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
		<div class="form-login-register">
			<div class="overlay_form-login-register"></div>
			<div class="box-form-login">
				<div class="active-login"></div>
				<?php
					$aenyo_settings = aenyo_global_settings();
					if(isset($aenyo_settings['background_sign_in_img']['url']) && !empty($aenyo_settings['background_sign_in_img']['url'])):?>
						<div class="sign__in--img">
							<img src="<?php echo esc_url($aenyo_settings['background_sign_in_img']['url']); ?>" alt="<?php echo esc_attr__( "Image Sign In","aenyo" ); ?>">
							<h2 class="title-sign"><?php echo esc_html__("Sign in",'aenyo') ?></h2>
							<h2 class="title-register hidden"><?php echo esc_html__("Register",'aenyo') ?></h2>
						</div>
				<?php endif; ?>
				<div class="box-content">
					<div class="form-login active">
						<form data-login-ajax method="post" class="login">
							<div class="sign__in--content">
								<p class="status"></p>
								<div class="content">
									<?php do_action( 'woocommerce_login_form_start' ); ?>
									<div class="username">
										<input type="text" required="required" class="input-text" name="username" data-username placeholder="<?php echo esc_attr__("Name*",'aenyo') ?>" />
									</div>
									<div class="password">
										<input class="input-text" required="required" type="password" name="password" data-password placeholder="<?php echo esc_attr__("Password*",'aenyo') ?>" />
									</div>
									<div class="rememberme-lost">
										<div class="lost_password">
											<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php echo esc_html__( 'Lost your password?', 'aenyo' ); ?></a>
										</div>
									</div>
									<div class="button-login">
										<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
										<input type="submit" class="button" name="login" value="<?php echo esc_attr__( 'Sign in', 'aenyo' ); ?>" /> 
									</div>
									<div class="button-next-reregister" ><?php echo esc_html__("Create An Account",'aenyo') ?></div>
								</div>
								<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
							</div>
						</form>
					</div>
					<div class="form-register">
						<form method="post" class="register">
							<div class="sign__in--content">
								<div class="content">
									<?php do_action( 'woocommerce_register_form_start' ); ?>
									<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
										<div class="username">
											<input type="text" class="input-text" placeholder="<?php echo esc_attr__("Username",'aenyo') ?>" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
										</div>
									<?php endif; ?>
									<div class="email">
										<input type="email" class="input-text" placeholder="<?php echo esc_attr__("Email",'aenyo') ?>" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
									</div>
									<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
										<div class="password">
											<input type="password" class="input-text"  placeholder="<?php echo esc_attr__("Password",'aenyo') ?>" name="password" id="reg_password" />
										</div>
									<?php endif; ?>
									<!-- Spam Trap -->
									<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php echo esc_html__( 'Anti-spam', 'aenyo' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>
									<?php do_action( 'woocommerce_register_form' ); ?>
									<?php do_action( 'register_form' ); ?>
									<div class="button-register">
										<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
										<input type="submit" class="button" name="register" value="<?php echo esc_attr__( 'Register', 'aenyo' ); ?>" />
									</div>
									<?php do_action( 'woocommerce_register_form_end' ); ?>
									<div class="button-next-login" ><?php echo esc_html__("Already has an account",'aenyo') ?></div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php }
	function aenyo_config_header(){
		global $aenyo_page_id;
		$header = new stdClass;
		$aenyo_settings = aenyo_global_settings();
		$direction = aenyo_get_direction(); 
		$aenyo_page_id = get_the_ID();		
		$header_style = aenyo_get_config('header_style', '');
		$header->header_style  = (get_post_meta( $aenyo_page_id, 'page_header_style', true )) ? get_post_meta($aenyo_page_id, 'page_header_style', true ) : $header_style ;
		$header->enable_sticky_header = ( isset($aenyo_settings['enable-sticky-header']) && $aenyo_settings['enable-sticky-header'] ) ? ($aenyo_settings['enable-sticky-header']) : false;
		$header->show_minicart = (isset($aenyo_settings['show-minicart']) && $aenyo_settings['show-minicart']) ? ($aenyo_settings['show-minicart']) : false;
		$header->show_searchform = (isset($aenyo_settings['show-searchform']) && $aenyo_settings['show-searchform']) ? ($aenyo_settings['show-searchform']) : false;
		$header->background_page = get_post_meta( get_the_ID(), 'page_background', true );
		$header->checkout_page_style="";
		if( function_exists('is_checkout') && is_checkout() ){
			$header->checkout_page_style = aenyo_get_config('checkout_page_style','checkout-page-style-1');
		}
		return $header;
	}
?>