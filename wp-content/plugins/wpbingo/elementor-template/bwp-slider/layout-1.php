<?php if ($settings['list_tab']) { ?>
    <?php 
		$class_col_lg = ($columns == 5) ? '2-4'  : (12/$columns);
		$class_col_md = ($columns1 == 5) ? '2-4'  : (12/$columns1);
		$class_col_sm = ($columns2 == 5) ? '2-4'  : (12/$columns2);
		$class_col_xs = ($columns3 == 5) ? '2-4'  : (12/$columns3);
		$attributes = 'col-xl-'.$class_col_lg .' col-lg-'.$class_col_md .' col-md-'.$class_col_sm .' col-'.$class_col_xs; 
		$j = 0;
	?>
    <div class="bwp-slider <?php echo esc_attr($layout); ?>">
        <div class="item">
            <div class="content-left">
                <?php if ($title1) : ?>
                    <div class="title-block">
                        <h2><?php echo wp_kses($title1, 'social'); ?></h2>
                    </div>
                <?php endif; ?>

                <?php foreach ($settings['list_tab'] as $item) : ?>
                    <?php
                    if (empty($item['category']) || empty($item['category'])) {
                        continue;
                    }
                    $term = get_term_by('slug', $item['category'], 'product_cat');
                    if ($term) {
                        $icon_category = get_term_meta($term->term_id, 'category_icon', true);
                        ?>
                        <div class="item-category">
                            <?php if ($item['category'] && $item['category']) : ?>
                                <h2 class="item-title">
                                    <a href="<?php echo get_term_link($term->term_id, 'product_cat'); ?>">
                                        <span><?php echo esc_html($term->name); ?></span>
                                    </a>
                                </h2>
                            <?php endif; ?>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
            <?php if ($item['image'] && $item['image']['url']) : ?>
                <div class="content-right align-image">
                    <?php foreach ($settings['list_tab'] as $item) : ?>
                        <?php
                        if (empty($item['category']) || empty($item['category'])) {
                            continue;
                        }
                        $term = get_term_by('slug', $item['category'], 'product_cat');
                        if ($term) {
                            $icon_category = get_term_meta($term->term_id, 'category_icon', true);
                            ?>
                            <div class="content-image">
                                <div class="item-category_image">
                                    <a href="<?php echo get_term_link($term->term_id, 'product_cat'); ?>">
                                        <img
                                            class="lazyload"
                                            src="<?php echo esc_url($item['image']['url']); ?>"
                                            alt="<?php echo esc_attr__('Image Slider', 'wpbingo'); ?>"
                                        >
                                    </a>
                                </div>
                            </div>
                        <?php } ?>

                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php } ?>
