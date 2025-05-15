<?php ///////////////HEADER 1
	$wp_customize->add_section('bwp-header_1', array(
		'title'          => 'Header 1',
		'panel' => 'header_settings_section',
	));
	
	//---- Top bar
	class Topbar_order_1 extends WP_Customize_Control{
		public $type = 'topbar_order_1';
		public function render_content(){ ?>
			<div class="filed-flex">
				<div class="bwp-cus-title"><?php echo esc_html__('1.TOP BAR','aenyo'); ?></div>
				<div class="filed-flex" style="margin-bottom:30px;">
					<div class="cus-label"><?php echo esc_html__('Show topbar','aenyo'); ?></div>
					<div class="switch-options">
						<input type="checkbox" value="<?php echo esc_attr($this->value('top_bar_1')); ?>" <?php $this->link('top_bar_1'); ?>>
						<label class="disable"></label>
					</div>
				</div>
				<div class="bwp-drop-control">
					<div class="bwp-drag-drop-container d-flex">
						<?php
						if( $this->value('topbar_order_1') ){
							$arr_value = explode("-", $this->value('topbar_order_1'));
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
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="social">
							<div class="drag-option">
								<div class="cus-label"><?php echo esc_html__('Show social','aenyo'); ?></div>
								<div class="switch-options">
									<input type="checkbox" value="<?php echo esc_attr($this->value('social_1')); ?>" <?php $this->link('social_1'); ?>>
									<label class="disable"></label>
								</div>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="topbar1">
							<div class="cus-label" style="margin-bottom:30px;"><?php echo esc_html__('Content','aenyo'); ?></div>
							<textarea type="text" value="<?php echo esc_attr($this->value('content_left_top_bar_1')); ?>" <?php $this->link('content_left_top_bar_1'); ?>></textarea>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="topbar2">
							<div class="cus-label" style="margin-bottom:30px;"><?php echo esc_html__('Content','aenyo'); ?></div>
							<textarea type="text" value="<?php echo esc_attr($this->value('content_center_top_bar_1')); ?>" <?php $this->link('content_center_top_bar_1'); ?>></textarea>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="topbar3">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Phone','aenyo'); ?></span>
								<input style="margin-top:10px;" type="text" value="<?php echo esc_attr($this->value('phone_topbar_1')); ?>" <?php $this->link('phone_topbar_1'); ?>>
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Email','aenyo'); ?></span>
								<input style="margin-top:10px;" type="text" value="<?php echo esc_attr($this->value('email_topbar_1')); ?>" <?php $this->link('email_topbar_1'); ?>>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
					</div>
					<div class="btn-add-drop-content">
						<?php
							$arr_choices = $this->choices;
							$arr_value = explode("-", $this->value('topbar_order_1'));
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
					<input class="bwp-drag-drop-input" type="hidden" <?php $this->link('topbar_order_1'); ?> value="<?php echo esc_attr( $this->value('topbar_order_1') ); ?>">
				</div>
			</div>
		<?php }
	}
	$wp_customize->add_setting( 'top_bar_1' , array(
		'default' => true, 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'topbar_order_1' , array(
		'default' => '', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'content_center_top_bar_1' , array(
		'default' => 'content topbar 3', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'content_left_top_bar_1' , array(
		'default' => 'Welcome to our store! Free shipping on orders £100 or more!', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'phone_topbar_1' , array(
		'default' => '0987653321',
		'sanitize_callback' => 'sanitize_html',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'email_topbar_1' , array(
		'default' => 'support@aenyo.com',
		'sanitize_callback' => 'sanitize_html',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'social_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_control( new Topbar_order_1( $wp_customize, 'topbar_order_1', array(
		'section' => 'bwp-header_1',
		'choices' => array(
			'topbar1' => 'topbar1',
			'topbar2' => 'topbar2',
			'topbar3' => 'topbar3',
			'social' => 'social',
		),
		'settings' => [
			'top_bar_1' => 'top_bar_1',
			'topbar_order_1' => 'topbar_order_1',
			'social_1' => 'social_1',
			'content_left_top_bar_1' => 'content_left_top_bar_1',
			'content_center_top_bar_1' => 'content_center_top_bar_1',
			'phone_topbar_1' => 'phone_topbar_1',
			'email_topbar_1' => 'email_topbar_1',
		],
	)));
	
	//---- background
	$wp_customize->add_setting( 'background_top_bar_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('background_top_bar_1', array(
		'label'   => esc_html__('Background','aenyo'),
		'section' => 'bwp-header_1',
		'type'    => 'color',
	));
	
	//---- color
	$wp_customize->add_setting( 'color_top_bar_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_top_bar_1', array(
		'label'   => esc_html__('Color','aenyo'),
		'section' => 'bwp-header_1',
		'type'    => 'color',
	));
	
	//---- color link
	$wp_customize->add_setting( 'color_link_top_bar_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_link_top_bar_1', array(
		'label'   => esc_html__('Color link','aenyo'),
		'section' => 'bwp-header_1',
		'type'    => 'color',
	));

	//---- color icon
	$wp_customize->add_setting( 'color_icon_top_bar_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_icon_top_bar_1', array(
		'label'   => esc_html__('Color Icon','aenyo'),
		'section' => 'bwp-header_1',
		'type'    => 'color',
	));
	
	//---- color hover
	$wp_customize->add_setting( 'color_hover_top_bar_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('color_hover_top_bar_1', array(
		'label'   => esc_html__('Color hover','aenyo'),
		'section' => 'bwp-header_1',
		'type'    => 'color',
	));
	
	//---- padding
	class Padding_topbar_1 extends WP_Customize_Control{
		public $type = 'padding_topbar_1';
		public function render_content(){ ?>
			<span class="customize-control-title"><?php echo esc_attr($this->label); ?></span>
			<table class="tg">
				<thead>
					<tr>
						<th><?php echo esc_html__('Top','aenyo'); ?></th>
						<th><?php echo esc_html__('Right','aenyo'); ?></th>
						<th><?php echo esc_html__('Bottom','aenyo'); ?></th>
						<th><?php echo esc_html__('Left','aenyo'); ?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_topbar_top_1')); ?>" <?php $this->link('padding_topbar_top_1'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_topbar_right_1')); ?>" <?php $this->link('padding_topbar_right_1'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_topbar_bottom_1')); ?>" <?php $this->link('padding_topbar_bottom_1'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_topbar_left_1')); ?>" <?php $this->link('padding_topbar_left_1'); ?> /></td>
						<td>px</td>
					</tr>
				</tbody>
			</table>
		<?php }
	}
	$wp_customize->add_setting('padding_topbar_top_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_topbar_right_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_topbar_bottom_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_topbar_left_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control(new Padding_topbar_1(
		$wp_customize,'padding_topbar_1',
		array(
			'label' => esc_html__('Padding topbar','aenyo'),
			'section' => 'bwp-header_1',
			'settings' => [
				'padding_topbar_top_1' => 'padding_topbar_top_1',
				'padding_topbar_right_1' => 'padding_topbar_right_1',
				'padding_topbar_bottom_1' => 'padding_topbar_bottom_1',
				'padding_topbar_left_1' => 'padding_topbar_left_1'
			],
			'type' => 'number'
		)
	));
	
	//---- logo
	class Header_order_1 extends WP_Customize_Control {
		public $type = 'header_order_1';
		public function render_content() {
			$fonts = get_custom_google_fonts();
			$fonts_arr = array();
			foreach ( $fonts as $font ) {
				$fonts_arr[ $font['family'] ] = $font['family'];
			}
			array_unshift($fonts_arr, 'Default');
			?>
			<div class="bwp-cus-title" style="margin-top:30px;"><?php echo esc_html__('2.HEADER MAIN','aenyo'); ?></div>
			<div class="filed-flex">
				<div class="bwp-drop-control">
					<div class="bwp-drag-drop-container d-flex">
						<?php
						if( $this->value('header_order_1') ){
							$arr_value = explode("-", $this->value('header_order_1'));
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
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="menu">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color menu','aenyo'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('menu_color_1')); ?>" <?php $this->link('menu_color_1'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size','aenyo'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('menu_size_1')); ?>" <?php $this->link('menu_size_1'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Menu position','aenyo'); ?></span>
								<select class="bwp-select" <?php $this->link('menu_pos_1'); ?>>
									<option value="menu-left"><?php echo esc_html__('Left','aenyo'); ?></option>
									<option value="menu-right"><?php echo esc_html__('Right','aenyo'); ?></option>
									<option value="menu-center"><?php echo esc_html__('Center','aenyo'); ?></option>
								</select>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="logo">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Logo size','aenyo'); ?></span>
								<input type="range" value="<?php echo esc_attr($this->value('width_logo_1')); ?>" name="points" min="0" max="500" <?php $this->link('width_logo_1'); ?>>
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Logo position','aenyo'); ?></span>
								<select class="bwp-select" <?php $this->link('logo_pos_1'); ?>>
									<option value="text-center"><?php echo esc_html__('Center','aenyo'); ?></option>
									<option value="text-left"><?php echo esc_html__('Left','aenyo'); ?></option>
									<option value="text-right"><?php echo esc_html__('Right','aenyo'); ?></option>
								</select>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="page_link">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color page link','aenyo'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('text_color_1')); ?>" <?php $this->link('text_color_1'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size','aenyo'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('text_size_1')); ?>" <?php $this->link('text_size_1'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font menu','aenyo'); ?></span>
								<select <?php $this->link('menu_font_1'); ?>>
									<?php foreach ( $fonts_arr as $font ) { ?>
										<option value="<?php echo esc_attr($font) ?>"><?php echo esc_html($font) ?></option>	
									<?php } ?>
								</select>
							</div>
							<div class="drag-option">
								<div class="cus-label"><?php echo esc_html__('Show cart','aenyo'); ?></div>
								<div class="switch-options">
									<input type="checkbox" value="<?php echo esc_attr($this->value('text_cart_1')); ?>" <?php $this->link('text_cart_1'); ?>>
									<label class="disable"></label>
								</div>
								<input style="margin-top:10px;" type="text" value="<?php echo esc_attr($this->value('content_text_cart')); ?>" <?php $this->link('content_text_cart'); ?>>
							</div>
							<div class="drag-option">
								<div class="cus-label"><?php echo esc_html__('Show search','aenyo'); ?></div>
								<div class="switch-options">
									<input type="checkbox" value="<?php echo esc_attr($this->value('text_search_1')); ?>" <?php $this->link('text_search_1'); ?>>
									<label class="disable"></label>
								</div>
								<input style="margin-top:10px;" type="text" value="<?php echo esc_attr($this->value('content_text_search')); ?>" <?php $this->link('content_text_search'); ?>>
							</div>
							<div class="drag-option">
								<div class="cus-label"><?php echo esc_html__('Show account','aenyo'); ?></div>
								<div class="switch-options">
									<input type="checkbox" value="<?php echo esc_attr($this->value('text_account_1')); ?>" <?php $this->link('text_account_1'); ?>>
									<label class="disable"></label>
								</div>
								<input style="margin-top:10px;" type="text" value="<?php echo esc_attr($this->value('content_text_account')); ?>" <?php $this->link('content_text_account'); ?>>
							</div>
							<div class="drag-option">
								<div class="cus-label"><?php echo esc_html__('Show wishlist','aenyo'); ?></div>
								<div class="switch-options">
									<input type="checkbox" value="<?php echo esc_attr($this->value('text_wishlist_1')); ?>" <?php $this->link('text_wishlist_1'); ?>>
									<label class="disable"></label>
								</div>
								<input style="margin-top:10px;" type="text" value="<?php echo esc_attr($this->value('content_text_wishlist')); ?>" <?php $this->link('content_text_wishlist'); ?>>
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Text position','aenyo'); ?></span>
								<select class="bwp-select" <?php $this->link('text_pos_1'); ?>>
									<option value="flex-center"><?php echo esc_html__('Center','aenyo'); ?></option>
									<option value="flex-left"><?php echo esc_html__('Left','aenyo'); ?></option>
									<option value="flex-right"><?php echo esc_html__('Right','aenyo'); ?></option>
								</select>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
					</div>
					<div class="btn-add-drop-content">
						<?php
							$arr_choices = $this->choices;
							$arr_value = explode("-", $this->value('header_order_1'));
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
					<input class="bwp-drag-drop-input" type="hidden" <?php $this->link('header_order_1'); ?> value="<?php echo esc_attr( $this->value('header_order_1') ); ?>">
				</div>
			</div>
		  <?php
		}
	}
	$wp_customize->add_setting( 'header_order_1', array(
		'default'           => 'menu-logo-page_link',
		'sanitize_callback' => 'sanitize_input',
	) );
	$wp_customize->add_setting( 'width_logo_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'logo_pos_1' , array(
		'default' => 'text-center',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'menu_color_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'menu_size_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'menu_pos_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'menu_font_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
	));
	//---- text color
	$wp_customize->add_setting( 'text_color_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'text_size_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'text_cart_1' , array(
		'default' => true,
		'sanitize_callback' => 'sanitize_input',
	));
	$wp_customize->add_setting( 'text_search_1' , array(
		'default' => true,
		'sanitize_callback' => 'sanitize_input',
	));
	$wp_customize->add_setting( 'text_wishlist_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input', 
	));
	$wp_customize->add_setting( 'text_account_1' , array(
		'default' => true,
		'sanitize_callback' => 'sanitize_input',
	));
	$wp_customize->add_setting( 'content_text_cart' , array(
		'default' => 'Cart', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'content_text_search' , array(
		'default' => 'Search', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'content_text_account' , array(
		'default' => 'Account', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'content_text_wishlist' , array(
		'default' => 'Wishlist', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'text_pos_1' , array(
		'default' => 'flex-right',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh' 
	));
	$wp_customize->add_control( new Header_order_1( $wp_customize, 'header_order_1', array(
		'section' => 'bwp-header_1',
		'choices' => array(
			'logo' => 'logo',
			'menu' => 'menu',
			'page_link' => 'page_link',
		),
		'settings' => [
			'header_order_1' => 'header_order_1',
			'width_logo_1' => 'width_logo_1',
			'logo_pos_1' => 'logo_pos_1',
			'menu_color_1' => 'menu_color_1',
			'menu_size_1' => 'menu_size_1',
			'menu_pos_1' => 'menu_pos_1',
			'menu_font_1' => 'menu_font_1',
			'text_color_1' => 'text_color_1',
			'text_size_1' => 'text_size_1',
			'text_cart_1' => 'text_cart_1',
			'text_search_1' => 'text_search_1',
			'text_wishlist_1' => 'text_wishlist_1',
			'text_account_1' => 'text_account_1',
			'content_text_cart' => 'content_text_cart',
			'content_text_search' => 'content_text_search',
			'content_text_account' => 'content_text_account',
			'content_text_wishlist' => 'content_text_wishlist',
			'text_pos_1' => 'text_pos_1'
		],
	)));
	//---- background
	$wp_customize->add_setting( 'header_color_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_control('header_color_1', array(
		'label'   => esc_html__('Background','aenyo'),
		'section' => 'bwp-header_1',
		'type'    => 'color',
	));
	
	//---- Hover color
	$wp_customize->add_setting( 'hover_color_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh', 
	));
	$wp_customize->add_control('hover_color_1', array(
		'label'   => esc_html__('Color hover','aenyo'),
		'section' => 'bwp-header_1',
		'type'    => 'color',
	));
	
	//---- padding
	class Padding_header_1 extends WP_Customize_Control{
		public $type = 'padding_1';
		public function render_content(){ ?>
			<span class="customize-control-title"><?php echo esc_attr($this->label); ?></span>
			<table class="tg">
				<thead>
					<tr>
						<th><?php echo esc_html__('Top','aenyo') ?></th>
						<th><?php echo esc_html__('Right','aenyo') ?></th>
						<th><?php echo esc_html__('Bottom','aenyo') ?></th>
						<th><?php echo esc_html__('Left','aenyo') ?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_top_1')); ?>" <?php $this->link('padding_top_1'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_right_1')); ?>" <?php $this->link('padding_right_1'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_bottom_1')); ?>" <?php $this->link('padding_bottom_1'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_left_1')); ?>" <?php $this->link('padding_left_1'); ?> /></td>
						<td>px</td>
					</tr>
				</tbody>
			</table>
		<?php }
	}
	$wp_customize->add_setting('padding_top_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_right_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_bottom_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_left_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control(new Padding_header_1(
		$wp_customize,'padding_1',
		array(
			'label' => esc_html__('Padding header','aenyo'),
			'section' => 'bwp-header_1',
			'settings' => [
				'padding_top_1' => 'padding_top_1',
				'padding_right_1' => 'padding_right_1',
				'padding_bottom_1' => 'padding_bottom_1',
				'padding_left_1' => 'padding_left_1'
			],
			'type' => 'number'
		)
	));