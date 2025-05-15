<?php ///////////////HEADER MOBILE
	$wp_customize->add_section('bwp-menu_mobile', array(
		'title'          => 'Menu mobile',
		'panel' => 'header_settings_section',
	));
	
	//---- HEADER TOP
	class Topbar_mobile extends WP_Customize_Control{
		public $type = 'topbar_mobile';
		public function render_content(){ ?>
			<div class="bwp-cus-title"><?php echo esc_html__('1.HEADER TOP','aenyo') ?></div>
			<div class="filed-flex">
				<div class="cus-label"><?php echo esc_html__('Show topbar in mobile','aenyo') ?></div>
				<div class="switch-options">
					<input type="checkbox" value="<?php echo esc_attr($this->value('topbar_mobile')); ?>" <?php $this->link('topbar_mobile'); ?>>
					<label class="disable"></label>
				</div>
			</div>
		<?php }
	}
	
	$wp_customize->add_setting( 'topbar_mobile' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_control(new Topbar_mobile($wp_customize,'topbar_mobile',array(
			'section' => 'bwp-menu_mobile',
			'settings' => [
				'topbar_mobile' => 'topbar_mobile',
			],
		)
	));
	
	//---- background top
	$wp_customize->add_setting( 'background_menu_top' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('background_menu_top', array(
		'label'   => esc_html__('Background','aenyo'),
		'section' => 'bwp-menu_mobile',
		'type'    => 'color',
	));
	
	//---- Color top
	$wp_customize->add_setting( 'color_menu_top' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_menu_top', array(
		'label'   => esc_html__('Color','aenyo'),
		'section' => 'bwp-menu_mobile',
		'type'    => 'color',
	));
	
	//---- HEADER BOTTOM
	class Header_moble_bottom extends WP_Customize_Control{
		public $type = 'header_moble_bottom';
		public function render_content(){ ?>
			<div class="filed-flex">
				<div class="bwp-cus-title" style="margin-top:40px;"><?php echo esc_html__('2.HEADER BOTTOM','aenyo') ?></div>
				<div class="filed-flex" style="margin-bottom:20px;">
					<div class="cus-label"><?php echo esc_html__('Show menu bottom','aenyo') ?></div>
					<div class="switch-options">
						<input type="checkbox" value="<?php echo esc_attr($this->value('header_moble_bottom')); ?>" <?php $this->link('header_moble_bottom'); ?>>
						<label class="disable"></label>
					</div>
				</div>
				<div class="bwp-drop-control">
					<div class="bwp-drag-drop-container d-flex">
						<?php
						if( $this->value('header_moble_order') ){
							$arr_value = explode("-", $this->value('header_moble_order'));
							foreach ($arr_value as $value) { ?>
								<div class="bwp-drag-drop-items bwp-drag-drop-toggle" data-value="<?php echo esc_attr( $value ); ?>">
									<div class="bwp-drag-drop-item">
										<?php echo esc_html( $value ); ?>
										<div class="icon-show"><i class="feather-chevron-down"></i></div>
									</div>
								</div>
							<?php }
						}else{ ?>
							<div class="bwp-drag-drop-empty"><div class="bwp-drag-drop-item"><?php echo esc_html__('default content','aenyo') ?></div></div>
						<?php } ?>
					</div>
					<div class="bwp-drag-dropdown_content">
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="shop">
							<input style="margin-top:10px;" type="text" value="<?php echo esc_attr($this->value('change_shop_title')); ?>" <?php $this->link('change_shop_title'); ?>>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="account">
							<input style="margin-top:10px;" type="text" value="<?php echo esc_attr($this->value('change_account_title')); ?>" <?php $this->link('change_account_title'); ?>>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="search">
							<input style="margin-top:10px;" type="text" value="<?php echo esc_attr($this->value('change_search_title')); ?>" <?php $this->link('change_search_title'); ?>>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="wishlist">
							<input style="margin-top:10px;" type="text" value="<?php echo esc_attr($this->value('change_wishlist_title')); ?>" <?php $this->link('change_wishlist_title'); ?>>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
					</div>
					<div class="btn-add-drop-content">
						<?php
							$arr_choices = $this->choices;
							$arr_value = explode("-", $this->value('header_moble_order'));
							$different_values = array_merge(array_diff($arr_choices, $arr_value)); 
						?>
						<button class="add-drop-content<?php if(!$different_values){ ?> disabled<?php } ?>" <?php if(!$different_values){ ?> disabled="disabled"<?php } ?>><?php echo esc_html__('Add item','aenyo'); ?></button>
						<div class="add-drop-content-container">
							<?php foreach ($different_values as $value) { ?>
								<div class="add-drop-content-item" data-value="<?php echo esc_attr( $value ); ?>">
									<div class="icon-add"><i class="feather-plus"></i></div>
									<?php echo esc_html( $value ); ?>
								</div>
							<?php } ?>
						</div>
					</div>
					<input class="bwp-drag-drop-input" type="hidden" <?php $this->link('header_moble_order'); ?> value="<?php echo esc_attr( $this->value('header_moble_order') ); ?>">
				</div>
			</div>
		<?php }
	}
	
	$wp_customize->add_setting( 'header_moble_bottom' , array(
		'default' => true,
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'header_moble_order' , array(
		'default' => 'shop-account-search-wishlist',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'change_shop_title' , array(
		'default' => 'Shop', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'change_account_title' , array(
		'default' => 'Account', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'change_search_title' , array(
		'default' => 'Search', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'change_wishlist_title' , array(
		'default' => 'Wishlist', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new Header_moble_bottom( $wp_customize, 'header_moble_bottom', array(
		'section' => 'bwp-menu_mobile',
		'choices' => array(
			'shop' => 'shop',
			'account' => 'account',
			'search' => 'search',
			'wishlist' => 'wishlist',
		),
		'settings' => [
			'header_moble_bottom' => 'header_moble_bottom',
			'header_moble_order' => 'header_moble_order',
			'change_shop_title' => 'change_shop_title',
			'change_account_title' => 'change_account_title',
			'change_search_title' => 'change_search_title',
			'change_wishlist_title' => 'change_wishlist_title',
		],
	)));
	
	//---- background bottom
	$wp_customize->add_setting( 'background_menu_bottom' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('background_menu_bottom', array(
		'label'   => esc_html__('Background','aenyo'),
		'section' => 'bwp-menu_mobile',
		'type'    => 'color',
	));
	
	//---- Color bottom
	$wp_customize->add_setting( 'color_menu_bottom' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_menu_bottom', array(
		'label'   => esc_html__('Color','aenyo'),
		'section' => 'bwp-menu_mobile',
		'type'    => 'color',
	));
	
	//---- MENU MOBILE
	class Header_moble_menu extends WP_Customize_Control{
		public function enqueue(){
			wp_enqueue_style( 'custom_controls_css', get_template_directory_uri().'/customizer/css/custom_controls.css');
		}
		public $type = 'header_moble_menu';
		public function render_content(){ ?>
			<div class="bwp-cus-title" style="margin-top:40px;"><?php echo esc_html__('3.MENU MOBILE','aenyo') ?></div>
		<?php }
	}
	
	$wp_customize->add_setting( 'header_moble_menu' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_control(new Header_moble_menu($wp_customize,'header_moble_menu',array(
			'section' => 'bwp-menu_mobile',
			'settings' => [
				'header_moble_menu' => 'header_moble_menu',
			],
		)
	));

	//---- show login
	class Header_login_moble extends WP_Customize_Control{
		public function enqueue(){
			wp_enqueue_style( 'custom_controls_css', get_template_directory_uri().'/customizer/css/custom_controls.css');
		}
		public $type = 'header_login_moble';
		public function render_content(){ ?>
			<div class="filed-flex">
				<div class="cus-label"><?php echo esc_html__('Show login or register','aenyo') ?></div>
				<div class="switch-options">
					<input type="checkbox" value="<?php echo esc_attr($this->value('header_login_moble')); ?>" <?php $this->link('header_login_moble'); ?>>
					<label class="disable"></label>
				</div>
			</div>
			<div class="filed-flex">
				<input style="margin-top:10px;" type="text" value="<?php echo esc_attr($this->value('change_text')); ?>" <?php $this->link('change_text'); ?>>
			</div>
		<?php }
	}
	
	$wp_customize->add_setting( 'header_login_moble' , array(
		'default' => true,
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'change_text' , array(
		'default' => 'Login or Register',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_control(new Header_login_moble($wp_customize,'header_login_moble',array(
			'section' => 'bwp-menu_mobile',
			'settings' => [
				'header_login_moble' => 'header_login_moble',
				'change_text' => 'change_text',
			],
		)
	));
	
	//---- background menu
	$wp_customize->add_setting( 'background_menu_mobile' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('background_menu_mobile', array(
		'label'   => esc_html__('Background','aenyo'),
		'section' => 'bwp-menu_mobile',
		'type'    => 'color',
	));
	
	//---- Color menu
	$wp_customize->add_setting( 'color_menu_mobile' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_menu_mobile', array(
		'label'   => esc_html__('Color','aenyo'),
		'section' => 'bwp-menu_mobile',
		'type'    => 'color',
	));
	
	//---- Color menu hover
	$wp_customize->add_setting( 'color_menu_mobile_hover' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('color_menu_mobile_hover', array(
		'label'   => esc_html__('Color hover','aenyo'),
		'section' => 'bwp-menu_mobile',
		'type'    => 'color',
	));