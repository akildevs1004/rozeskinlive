<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/result-count.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.7.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $wp_query;
?>
<div class="woocommerce-result-count hidden-md hidden-sm hidden-xs">
	<?php
	$paged    = max( 1, $wp_query->get( 'paged' ) );
	$per_page = $wp_query->get( 'posts_per_page' );
	$total    = $wp_query->found_posts;
	$first    = ( $per_page * $paged ) - $per_page + 1;
	$last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );
	if ( 1 === $total ) {
		_e( 'Showing the single result', 'aenyo' );
	} elseif ( $total <= $per_page || -1 === $per_page ) {
		printf( __( 'Showing all %d results', 'aenyo' ), $total );
	} else {
		printf( _x( 'Showing %1$d&ndash;%2$d of %3$d item(s)', '%1$d = first, %2$d = last, %3$d = total', 'aenyo' ), $first, $last, $total );
	}
	?>
</div>