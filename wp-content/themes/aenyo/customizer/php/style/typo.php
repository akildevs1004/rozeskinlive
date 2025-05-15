<?php ///////////////TYPO
	$wp_customize->add_section( 'bwp-typo' , array(
		'title'          => 'Wpbingo typo',
		'priority' => 1,
	));
	$fonts = get_custom_google_fonts();
    $choices = array();
    foreach ( $fonts as $font ) {
        $choices[ $font['family'] ] = $font['family'];
    }
	array_unshift($choices, 'Default');
	//---- font base
	class Api_key extends WP_Customize_Control{
		public $type = 'api_key';
		public function render_content(){ ?>
			<div class="bwp-cus-title"><?php echo esc_html__('1.FONT BASE','aenyo') ?></div>
		<?php }
	}
	$wp_customize->add_setting( 'api_key' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_control(new Api_key($wp_customize,'api_key',array(
			'section' => 'bwp-typo',
			'settings' => [
				'api_key' => 'api_key',
			],
		)
	));
	
	$wp_customize->add_setting( 'font_size_body', array(
        'default' => '',
        'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_input',
    ));
    $wp_customize->add_control( 'font_size_body', array(
        'type' => 'number',
        'section' => 'bwp-typo',
        'label' => 'Font size base',
    ));
	
    $wp_customize->add_setting( 'font_family_base', array(
        'default' => '',
		'sanitize_callback' => 'sanitize_input',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'font_family_base', array(
        'type' => 'select',
        'section' => 'bwp-typo',
        'label' => 'Select font base',
        'choices' => $choices,
    ));
	
	//---- font heading
	class Font_title2 extends WP_Customize_Control{
		public $type = 'font_title2';
		public function render_content(){ ?>
			<div class="bwp-cus-title" style="margin-top:40px;"><?php echo esc_html__('2.FONT HEADING','aenyo') ?></div>
		<?php }
	}
	$wp_customize->add_setting( 'font_title2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_control(new Font_title2($wp_customize,'font_title2',array(
			'section' => 'bwp-typo',
			'settings' => [
				'font_title2' => 'font_title2',
			],
		)
	));
	
	$wp_customize->add_setting( 'font_size_heading', array(
        'default' => '',
        'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_input',
    ));
    $wp_customize->add_control( 'font_size_heading', array(
        'type' => 'number',
        'section' => 'bwp-typo',
        'label' => 'Font size heading',
    ));
	
    $wp_customize->add_setting( 'font_family_heading', array(
        'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'font_family_heading', array(
        'type' => 'select',
        'section' => 'bwp-typo',
        'label' => 'Select font heading',
        'choices' => $choices,
    ));