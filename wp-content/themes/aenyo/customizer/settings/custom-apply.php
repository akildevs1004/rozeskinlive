<?php
function aenyo_customize_css() {  ?>
	<?php if(get_theme_mod('font_family_base', '') && get_theme_mod('font_family_base', '') != 'Default' ) { ?>
	<link href="https://fonts.googleapis.com/css2?family=<?php echo get_theme_mod('font_family_base', '') ?>:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<?php } ?>
	<?php if(get_theme_mod('font_family_heading', '') && get_theme_mod('font_family_heading', '') != 'Default' ) { ?>
	<link href="https://fonts.googleapis.com/css2?family=<?php echo get_theme_mod('font_family_heading', '') ?>:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<?php } ?>
	<style type="text/css">
		<?php if( get_theme_mod('gray_dark', '') || get_theme_mod('theme_color', '') || get_theme_mod('text_color', '') || get_theme_mod('button_color', '') || get_theme_mod('border_color', '') || get_theme_mod('font_family_base', '') || get_theme_mod('font_family_heading', '') || get_theme_mod('font_size_heading', '') || get_theme_mod('font_size_body', '') ) { ?>
			/* $opacity-to-hex: (
				0: '00',
				0.05: '0C',
				0.1: '19',
				0.15: '26',
				0.2: '33',
				0.25: '3F',
				0.3: '4C',
				0.35: '59',
				0.4: '66',
				0.45: '72',
				0.5: '7F',
				0.55: '8C',
				0.6: '99',
				0.65: 'A5',
				0.7: 'B2',
				0.75: 'BF',
				0.8: 'CC',
				0.85: 'D8',
				0.9: 'E5',
				0.95: 'F2',
				1: 'FF'
			); */
			:root {
				<?php if(get_theme_mod('gray_dark', '')) { ?>
					--gray-dark:<?php echo get_theme_mod('gray_dark', ''); ?>;
					--gray-dark-10:<?php echo get_theme_mod('gray_dark', ''); ?>19;
					--gray-dark-15:<?php echo get_theme_mod('gray_dark', ''); ?>26;
					--gray-dark-25:<?php echo get_theme_mod('gray_dark', ''); ?>3f;
					--gray-dark-50:<?php echo get_theme_mod('gray_dark', ''); ?>7f;
					--gray-dark-75:<?php echo get_theme_mod('gray_dark', ''); ?>bf;
				<?php } ?>
				<?php if(get_theme_mod('theme_color', '')) { ?>
					--theme-color:<?php echo get_theme_mod('theme_color', ''); ?>;
					--theme-color-25:<?php echo get_theme_mod('theme_color', ''); ?>3f;
					--theme-color-50:<?php echo get_theme_mod('theme_color', ''); ?>7f;
					--theme-color-75:<?php echo get_theme_mod('theme_color', ''); ?>bf;
				<?php } ?>
				<?php if(get_theme_mod('text_color', '')) { ?>
					--text-color:<?php echo get_theme_mod('text_color', ''); ?>;
					--text-color-25:<?php echo get_theme_mod('text_color', ''); ?>3f;
					--text-color-50:<?php echo get_theme_mod('text_color', ''); ?>7f;
					--text-color-75:<?php echo get_theme_mod('text_color', ''); ?>bf;
				<?php } ?>
				<?php if(get_theme_mod('button_color', '')) { ?>
					--button-color:<?php echo get_theme_mod('button_color', ''); ?>;
					--button-color-25:<?php echo get_theme_mod('button_color', ''); ?>3f;
					--button-color-50:<?php echo get_theme_mod('button_color', ''); ?>7f;
					--button-color-60:<?php echo get_theme_mod('button_color', ''); ?>99;
					--button-color-75:<?php echo get_theme_mod('button_color', ''); ?>bf;
				<?php } ?>
				<?php if(get_theme_mod('border_color', '')) { ?>
					--border-color:<?php echo get_theme_mod('border_color', ''); ?>;
					--border-color-25:<?php echo get_theme_mod('border_color', ''); ?>3f;
					--border-color-50:<?php echo get_theme_mod('border_color', ''); ?>7f;
					--border-color-75:<?php echo get_theme_mod('border_color', ''); ?>bf;
				<?php } ?>
				<?php if(get_theme_mod('font_family_base', '')) { ?>
					--font-family-base:<?php echo get_theme_mod('font_family_base', ''); ?>;
				<?php } ?>
				<?php if(get_theme_mod('font_family_heading', '')) { ?>
					--font-family-heading:<?php echo get_theme_mod('font_family_heading', ''); ?>;
				<?php } ?>
				<?php if(get_theme_mod('font_size_body', '')) { ?>
					--font-size-body:<?php echo get_theme_mod('font_size_body', ''); ?>px;
				<?php } ?>
				<?php if(get_theme_mod('font_size_heading', '')) { ?>
					--font-size-heading:<?php echo get_theme_mod('font_size_heading', ''); ?>px;
				<?php } ?>
			}
		<?php } ?>
		<?php 
			include( get_template_directory() . '/customizer/apply/header.php' );
			include( get_template_directory() . '/customizer/apply/product-card.php' );
			include( get_template_directory() . '/customizer/apply/product-single.php' );
		?>
	</style> <?php 
} 
add_action( 'wp_head', 'aenyo_customize_css');