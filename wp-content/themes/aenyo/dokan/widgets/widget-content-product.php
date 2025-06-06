<?php
/**
 * Dokan Widget Content Product Template
 *
 * @since 2.4
 *
 * @package dokan
 */

$img_kses = apply_filters( 'dokan_product_image_attributes', array(
    'img' => array(
        'alt'    => array(),
        'class'  => array(),
        'height' => array(),
        'src'    => array(),
        'width'  => array(),
    ),
) );

?>

<?php if ( $r->have_posts() ) : ?>
    <ul class="dokan-bestselling-product-widget product_list_widget">
    <?php while ( $r->have_posts() ): $r->the_post() ?>
        <?php global $product; ?>
        <li>
			<div class="thumbnail-content">
				<a href="<?php echo esc_url( get_permalink( dokan_get_prop( $product, 'id' ) ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
					<?php echo wp_kses( $product->get_image(), $img_kses ); ?>
				</a>
			</div>
			<div class="box-content">
				<a class="product-title" href="<?php echo esc_url( get_permalink( dokan_get_prop( $product, 'id' ) ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
					<?php echo esc_html( $product->get_title() ); ?>
				</a>
				 <!-- For WC < 3.0.0  backward compatibility  -->
				<?php if ( version_compare( WC_VERSION, '2.7', '>' ) ) : ?>
					<?php if ( ! empty( $show_rating ) ) echo wc_get_rating_html( $product->get_average_rating() ); // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?>
				<?php else: ?>
					<?php if ( ! empty( $show_rating ) ) echo wp_kses($product->get_rating_html(),'social');  // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?>
				<?php endif ?>

				<?php echo wp_kses($product->get_price_html(),'social'); // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?>
			</div>
        </li>
        <?php endwhile; ?>
    </ul>
<?php else: ?>
    <p><?php esc_html_e( 'No products found', 'aenyo' ); ?></p>
<?php endif; ?>
