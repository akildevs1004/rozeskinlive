<?php if($settings['list_tab']){ ?>
	<?php $j = 0; ?>
	<div class="bwp-slider <?php echo esc_attr($layout); ?>">
		<?php if($title1) { ?>
			<div class="title-block">
				<h2><?php echo wp_kses($title1,'social'); ?></h2>
			</div>
		<?php } ?>
		<div class="slick-carousel slick-carousel-center"  data-centerMode="true" data-nav="<?php echo esc_attr($show_nav);?>" data-dots="<?php echo esc_attr($show_pag);?>" data-columns4="<?php echo esc_attr($columns4); ?>" data-columns3="<?php echo esc_attr($columns3); ?>" data-columns2="<?php echo esc_attr($columns2); ?>" data-columns1="<?php echo esc_attr($columns1); ?>" data-columns="<?php echo esc_attr($columns); ?>" >
			<?php foreach ($settings['list_tab'] as $item){ ?>
				<div class="item <?php echo esc_attr($attributes); ?>">
					<div class="item-content">
						<div class="content-image<?php if ($image_hover) { ?> elementor-animation-<?php echo esc_attr($image_hover); } ?>">
							<?php if( $item['image'] && $item['image']['url'] ){ ?>
								<a href="<?php echo wp_kses_post($item['link_slider']); ?>">
									<img class="fade-in lazyload" src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr__('Image Slider','wpbingo'); ?>">
								</a>
							<?php } ?>
						</div>
						<div class="item-info <?php echo esc_html($item['horizontal_align']); ?> <?php echo esc_html($item['vertical_align']); ?> <?php echo esc_html($item['text_align']); ?>">
							<div class="content">
								<?php if( $item['title_slider'] && $item['title_slider'] ){ ?>
									<h2 class="title-slider"><span><?php echo wp_kses($item['title_slider'],'social'); ?></span></h2>
								<?php } ?>
								<?php if( $item['button_slider'] && $item['button_slider'] ){ ?>
									<a class="button-slider" href="<?php echo wp_kses_post($item['link_slider']); ?>"><span><?php echo wp_kses($item['button_slider'],'social'); ?></span></a>						
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
<?php }?>