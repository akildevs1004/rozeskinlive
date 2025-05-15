<?php ///////////////COLOR
	$wp_customize->add_section( 'bwp-color' , array(
		'title'          => 'Wpbingo Color',
		'priority' => 1,
	));
	
	//---- gray dark
	$wp_customize->add_setting( 'gray_dark' , array(
		'default' => '#252525',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('gray_dark', array(
		'label'   => esc_html__('Gray dark','aenyo'),
		'section' => 'bwp-color',
		'type'    => 'color',
	));
	
	//---- theme color
	$wp_customize->add_setting( 'theme_color' , array(
		'default' => '#DB7137',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('theme_color', array(
		'label'   => esc_html__('Theme color','aenyo'),
		'section' => 'bwp-color',
		'type'    => 'color',
	));
	
	//---- text color
	$wp_customize->add_setting( 'text_color' , array(
		'default' => '#828282',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('text_color', array(
		'label'   => esc_html__('Text color','aenyo'),
		'section' => 'bwp-color',
		'type'    => 'color',
	));
	
	//---- button color
	$wp_customize->add_setting( 'button_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('button_color', array(
		'label'   => esc_html__('Button color','aenyo'),
		'section' => 'bwp-color',
		'type'    => 'color',
	));
	
	//---- border color
	$wp_customize->add_setting( 'border_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('border_color', array(
		'label'   => esc_html__('Border color','aenyo'),
		'section' => 'bwp-color',
		'type'    => 'color',
	));