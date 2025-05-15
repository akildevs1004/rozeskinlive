<?php ///////////////HEADER 3
	$wp_customize->add_section('bwp-header_4', array(
		'title'          => 'Header 4',
		'panel' => 'header_settings_section',
	));
	
	//---- Top bar
	class Topbar_order_4 extends WP_Customize_Control{
		public $type = 'topbar_order_4';
		public function render_content(){ ?>
			<div class="filed-flex">
				<div class="bwp-cus-title"><?php echo esc_html__('1.TOP BAR','aenyo'); ?></div>
				<div class="filed-flex" style="margin-bottom:30px;">
					<div class="cus-label"><?php echo esc_html__('Show topbar','aenyo'); ?></div>
					<div class="switch-options">
						<input type="checkbox" value="<?php echo esc_attr($this->value('top_bar_4')); ?>" <?php $this->link('top_bar_4'); ?>>
						<label class="disable"></label>
					</div>
				</div>
				<div class="bwp-drop-control">
					<div class="bwp-drag-drop-container d-flex">
						<?php
						if( $this->value('topbar_order_4') ){
							$arr_value = explode("-", $this->value('topbar_order_4'));
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
									<input type="checkbox" value="<?php echo esc_attr($this->value('social_4')); ?>" <?php $this->link('social_4'); ?>>
									<label class="disable"></label>
								</div>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="topbar1">
							<div class="cus-label" style="margin-bottom:30px;"><?php echo esc_html__('Content','aenyo'); ?></div>
							<textarea type="text" value="<?php echo esc_attr($this->value('content_left_top_bar_4')); ?>" <?php $this->link('content_left_top_bar_4'); ?>></textarea>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="topbar2">
							<div class="cus-label" style="margin-bottom:30px;"><?php echo esc_html__('Content','aenyo'); ?></div>
							<textarea type="text" value="<?php echo esc_attr($this->value('content_center_top_bar_4')); ?>" <?php $this->link('content_center_top_bar_4'); ?>></textarea>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="topbar3">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Phone','aenyo'); ?></span>
								<input style="margin-top:10px;" type="text" value="<?php echo esc_attr($this->value('phone_topbar_4')); ?>" <?php $this->link('phone_topbar_4'); ?>>
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Email','aenyo'); ?></span>
								<input style="margin-top:10px;" type="text" value="<?php echo esc_attr($this->value('email_topbar_4')); ?>" <?php $this->link('email_topbar_4'); ?>>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
					</div>
					<div class="btn-add-drop-content">
						<?php
							$arr_choices = $this->choices;
							$arr_value = explode("-", $this->value('topbar_order_4'));
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
					<input class="bwp-drag-drop-input" type="hidden" <?php $this->link('topbar_order_4'); ?> value="<?php echo esc_attr( $this->value('topbar_order_4') ); ?>">
				</div>
			</div>
		<?php }
	}
	$wp_customize->add_setting( 'top_bar_4' , array(
		'default' => true, 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'topbar_order_4' , array(
		'default' => '', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'content_center_top_bar_4' , array(
		'default' => 'content topbar 3', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'content_left_top_bar_4' , array(
		'default' => 'Welcome to our store! Free shipping on orders £100 or more!', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'phone_topbar_4' , array(
		'default' => '0987653321',
		'sanitize_callback' => 'sanitize_html',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'email_topbar_4' , array(
		'default' => 'support@aenyo.com',
		'sanitize_callback' => 'sanitize_html',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'social_4' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_control( new Topbar_order_4( $wp_customize, 'topbar_order_4', array(
		'section' => 'bwp-header_4',
		'choices' => array(
			'topbar1' => 'topbar1',
			'topbar2' => 'topbar2',
			'topbar3' => 'topbar3',
			'social' => 'social',
		),
		'settings' => [
			'top_bar_4' => 'top_bar_4',
			'topbar_order_4' => 'topbar_order_4',
			'social_4' => 'social_4',
			'content_left_top_bar_4' => 'content_left_top_bar_4',
			'content_center_top_bar_4' => 'content_center_top_bar_4',
			'phone_topbar_4' => 'phone_topbar_4',
			'email_topbar_4' => 'email_topbar_4',
		],
	)));
	
	//---- background
	$wp_customize->add_setting( 'background_top_bar_4' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('background_top_bar_4', array(
		'label'   => esc_html__('Background','aenyo'),
		'section' => 'bwp-header_4',
		'type'    => 'color',
	));
	
	//---- color
	$wp_customize->add_setting( 'color_top_bar_4' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_top_bar_4', array(
		'label'   => esc_html__('Color','aenyo'),
		'section' => 'bwp-header_4',
		'type'    => 'color',
	));
	
	//---- color link
	$wp_customize->add_setting( 'color_link_top_bar_4' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_link_top_bar_4', array(
		'label'   => esc_html__('Color link','aenyo'),
		'section' => 'bwp-header_4',
		'type'    => 'color',
	));

	//---- color icon
	$wp_customize->add_setting( 'color_icon_top_bar_4' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_icon_top_bar_4', array(
		'label'   => esc_html__('Color Icon','aenyo'),
		'section' => 'bwp-header_4',
		'type'    => 'color',
	));
	
	//---- color hover
	$wp_customize->add_setting( 'color_hover_top_bar_4' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('color_hover_top_bar_4', array(
		'label'   => esc_html__('Color hover','aenyo'),
		'section' => 'bwp-header_4',
		'type'    => 'color',
	));
	
	//---- padding
	class Padding_topbar_4 extends WP_Customize_Control{
		public $type = 'padding_topbar_4';
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
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_topbar_top_4')); ?>" <?php $this->link('padding_topbar_top_4'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_topbar_right_4')); ?>" <?php $this->link('padding_topbar_right_4'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_topbar_bottom_4')); ?>" <?php $this->link('padding_topbar_bottom_4'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_topbar_left_4')); ?>" <?php $this->link('padding_topbar_left_4'); ?> /></td>
						<td>px</td>
					</tr>
				</tbody>
			</table>
		<?php }
	}
	$wp_customize->add_setting('padding_topbar_top_4', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_topbar_right_4', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_topbar_bottom_4', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_topbar_left_4', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control(new Padding_topbar_4(
		$wp_customize,'padding_topbar_4',
		array(
			'label' => esc_html__('Padding topbar','aenyo'),
			'section' => 'bwp-header_4',
			'settings' => [
				'padding_topbar_top_4' => 'padding_topbar_top_4',
				'padding_topbar_right_4' => 'padding_topbar_right_4',
				'padding_topbar_bottom_4' => 'padding_topbar_bottom_4',
				'padding_topbar_left_4' => 'padding_topbar_left_4'
			],
			'type' => 'number'
		)
	));
	
	//---- logo
	class Header_order_4 extends WP_Customize_Control {
		public $type = 'header_order_4';
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
						if( $this->value('header_order_4') ){
							$arr_value = explode("-", $this->value('header_order_4'));
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
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('menu_color_4')); ?>" <?php $this->link('menu_color_4'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size','aenyo'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('menu_size_4')); ?>" <?php $this->link('menu_size_4'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Menu position','aenyo'); ?></span>
								<select class="bwp-select" <?php $this->link('menu_pos_4'); ?>>
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
								<input type="range" value="<?php echo esc_attr($this->value('width_logo_4')); ?>" name="points" min="0" max="500" <?php $this->link('width_logo_4'); ?>>
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Logo position','aenyo'); ?></span>
								<select class="bwp-select" <?php $this->link('logo_pos_4'); ?>>
									<option value="text-center"><?php echo esc_html__('Center','aenyo'); ?></option>
									<option value="text-left"><?php echo esc_html__('Left','aenyo'); ?></option>
									<option value="text-right"><?php echo esc_html__('Right','aenyo'); ?></option>
								</select>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="icons">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color icon','aenyo'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('icon_color_4')); ?>" <?php $this->link('icon_color_4'); ?> />
							</div>
							<div class="drag-option">
								<div class="cus-label"><?php echo esc_html__('Show icon cart','aenyo'); ?></div>
								<div class="switch-options">
									<input type="checkbox" value="<?php echo esc_attr($this->value('icon_cart_4')); ?>" <?php $this->link('icon_cart_4'); ?>>
									<label class="disable"></label>
								</div>
							</div>
							<div class="drag-option">
								<div class="cus-label"><?php echo esc_html__('Show icon search','aenyo'); ?></div>
								<div class="switch-options">
									<input type="checkbox" value="<?php echo esc_attr($this->value('icon_search_4')); ?>" <?php $this->link('icon_search_4'); ?>>
									<label class="disable"></label>
								</div>
							</div>
							<div class="drag-option">
								<div class="cus-label"><?php echo esc_html__('Show icon account','aenyo'); ?></div>
								<div class="switch-options">
									<input type="checkbox" value="<?php echo esc_attr($this->value('icon_account_4')); ?>" <?php $this->link('icon_account_4'); ?>>
									<label class="disable"></label>
								</div>
							</div>
							<div class="drag-option">
								<div class="cus-label"><?php echo esc_html__('Show icon wishlist','aenyo'); ?></div>
								<div class="switch-options">
									<input type="checkbox" value="<?php echo esc_attr($this->value('icon_wishlist_4')); ?>" <?php $this->link('icon_wishlist_4'); ?>>
									<label class="disable"></label>
								</div>
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Icon position','aenyo'); ?></span>
								<select class="bwp-select" <?php $this->link('icon_pos_4'); ?>>
									<option value="text-left"><?php echo esc_html__('Left','aenyo'); ?></option>
									<option value="text-right"><?php echo esc_html__('Right','aenyo'); ?></option>
									<option value="text-center"><?php echo esc_html__('Center','aenyo'); ?></option>
								</select>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','aenyo'); ?></button></div>
						</div>
					</div>
					<div class="btn-add-drop-content">
						<?php
							$arr_choices = $this->choices;
							$arr_value = explode("-", $this->value('header_order_4'));
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
					<input class="bwp-drag-drop-input" type="hidden" <?php $this->link('header_order_4'); ?> value="<?php echo esc_attr( $this->value('header_order_4') ); ?>">
				</div>
			</div>
		  <?php
		}
	}
	$wp_customize->add_setting( 'header_order_4', array(
		'default'           => 'menu-logo-icons',
		'sanitize_callback' => 'sanitize_input',
	) );
	$wp_customize->add_setting( 'width_logo_4' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'logo_pos_4' , array(
		'default' => 'text-center',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'menu_color_4' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'menu_size_4' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'menu_pos_4' , array(
		'default' => 'menu-left',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	//---- icon color
	$wp_customize->add_setting( 'icon_color_4' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'icon_cart_4' , array(
		'default' => true,
		'sanitize_callback' => 'sanitize_input',
	));
	$wp_customize->add_setting( 'icon_search_4' , array(
		'default' => true,
		'sanitize_callback' => 'sanitize_input',
	));
	$wp_customize->add_setting( 'icon_wishlist_4' , array(
		'default' => true,
		'sanitize_callback' => 'sanitize_input', 
	));
	$wp_customize->add_setting( 'icon_account_4' , array(
		'default' => true,
		'sanitize_callback' => 'sanitize_input',
	));
	$wp_customize->add_setting( 'icon_pos_4' , array(
		'default' => 'text-right',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage' 
	));
	$wp_customize->add_control( new Header_order_4( $wp_customize, 'header_order_4', array(
		'section' => 'bwp-header_4',
		'choices' => array(
			'logo' => 'logo',
			'menu' => 'menu',
			'icons' => 'icons',
		),
		'settings' => [
			'header_order_4' => 'header_order_4',
			'width_logo_4' => 'width_logo_4',
			'logo_pos_4' => 'logo_pos_4',
			'menu_color_4' => 'menu_color_4',
			'menu_size_4' => 'menu_size_4',
			'menu_pos_4' => 'menu_pos_4',
			'icon_color_4' => 'icon_color_4',
			'icon_cart_4' => 'icon_cart_4',
			'icon_search_4' => 'icon_search_4',
			'icon_wishlist_4' => 'icon_wishlist_4',
			'icon_account_4' => 'icon_account_4',
			'icon_pos_4' => 'icon_pos_4',
		],
	)));
	//---- background
	$wp_customize->add_setting( 'header_color_4' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_control('header_color_4', array(
		'label'   => esc_html__('Background','aenyo'),
		'section' => 'bwp-header_4',
		'type'    => 'color',
	));
	
	//---- Hover color
	$wp_customize->add_setting( 'hover_color_4' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh', 
	));
	$wp_customize->add_control('hover_color_4', array(
		'label'   => esc_html__('Color hover','aenyo'),
		'section' => 'bwp-header_4',
		'type'    => 'color',
	));
	
	//---- padding
	class Padding_header_4 extends WP_Customize_Control{
		public $type = 'padding_4';
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
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_top_4')); ?>" <?php $this->link('padding_top_4'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_right_4')); ?>" <?php $this->link('padding_right_4'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_bottom_4')); ?>" <?php $this->link('padding_bottom_4'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_left_4')); ?>" <?php $this->link('padding_left_4'); ?> /></td>
						<td>px</td>
					</tr>
				</tbody>
			</table>
		<?php }
	}
	$wp_customize->add_setting('padding_top_4', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_right_4', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_bottom_4', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_left_4', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control(new Padding_header_4(
		$wp_customize,'padding_4',
		array(
			'label' => esc_html__('Padding header','aenyo'),
			'section' => 'bwp-header_4',
			'settings' => [
				'padding_top_4' => 'padding_top_4',
				'padding_right_4' => 'padding_right_4',
				'padding_bottom_4' => 'padding_bottom_4',
				'padding_left_4' => 'padding_left_4'
			],
			'type' => 'number'
		)
	));