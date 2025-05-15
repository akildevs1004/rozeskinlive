<?php
/***** Active Plugin ********/
add_action( 'tgmpa_register', 'aenyo_register_required_plugins' );
function aenyo_register_required_plugins() {
    $plugins = array(
		array(
            'name'               => esc_html__('Woocommerce', 'aenyo'), 
            'slug'               => 'woocommerce', 
            'required'           => true
        ),
		array(
            'name'      		 => esc_html__('Elementor', 'aenyo'),
            'slug'     			 => 'elementor',
            'required' 			 => true
        ),
		array(
            'name'               => esc_html__('Wpbingo Core', 'aenyo'), 
            'slug'               => 'wpbingo', 
            'source'             => get_template_directory() . '/plugins/wpbingo.zip',
            'required'           => true, 
        ),
        array(
            'name'               => esc_html__('Revolution Slider', 'aenyo'), 
            'slug'               => 'revslider', 
            'source'             => get_template_directory() . '/plugins/revslider.zip',
            'required'           => false, 
        ),		
		array(
            'name'               => esc_html__('Redux Framework', 'aenyo'), 
            'slug'               => 'redux-framework', 
            'required'           => true
        ),			
		array(
            'name'      		 => esc_html__('Contact Form 7', 'aenyo'),
            'slug'     			 => 'contact-form-7',
            'required' 			 => false
        ),	
		array(
            'name'     			 => esc_html__('WPC Smart Wishlist for WooCommerce', 'aenyo'),
            'slug'      		 => 'woo-smart-wishlist',
            'required' 			 => false
        ),		
		array(
            'name'     			 => esc_html__('WooCommerce Variation Swatches', 'aenyo'),
            'slug'      		 => 'variation-swatches-for-woocommerce',
            'required' 			 => false
        ),
    );
    $config = array();
    tgmpa( $plugins, $config );
}