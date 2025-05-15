<?php
	$wp_customize->add_section('bwp-icon_on_hover', array(
		'title'          => 'Wpbingo Product card',
		'priority' => 3,
	));
	
	//---- button
	$wp_customize->add_setting( 'color_button_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('color_button_1', array(
		'label'   => esc_html__('Color button','aenyo'),
		'section' => 'bwp-icon_on_hover',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'background_button_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('background_button_1', array(
		'label'   => esc_html__('Background button','aenyo'),
		'section' => 'bwp-icon_on_hover',
		'type'    => 'color',
	));
	
	//---- title
	$wp_customize->add_setting( 'color_title_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_title_1', array(
		'label'   => esc_html__('Color title','aenyo'),
		'section' => 'bwp-icon_on_hover',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'size_title_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('size_title_1', array(
		'label'   => esc_html__('Font size title','aenyo'),
		'section' => 'bwp-icon_on_hover',
		'type'    => 'number',
	));
	
	//---- price
	$wp_customize->add_setting( 'color_price_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_price_1', array(
		'label'   => esc_html__('Color price','aenyo'),
		'section' => 'bwp-icon_on_hover',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'color_price_sale_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_price_sale_1', array(
		'label'   => esc_html__('Color price sale','aenyo'),
		'section' => 'bwp-icon_on_hover',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'size_price_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('size_price_1', array(
		'label'   => esc_html__('Font size price','aenyo'),
		'section' => 'bwp-icon_on_hover',
		'type'    => 'number',
	));
	
	//---- label sale
	$wp_customize->add_setting( 'color_sale_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_sale_1', array(
		'label'   => esc_html__('Color label sale','aenyo'),
		'section' => 'bwp-icon_on_hover',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'background_sale_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('background_sale_1', array(
		'label'   => esc_html__('Background label sale','aenyo'),
		'section' => 'bwp-icon_on_hover',
		'type'    => 'color',
	));
	
	//---- label hot
	$wp_customize->add_setting( 'color_hot_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_hot_1', array(
		'label'   => esc_html__('Color label hot','aenyo'),
		'section' => 'bwp-icon_on_hover',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'background_hot_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('background_hot_1', array(
		'label'   => esc_html__('Background label hot','aenyo'),
		'section' => 'bwp-icon_on_hover',
		'type'    => 'color',
	));