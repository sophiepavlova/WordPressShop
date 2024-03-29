<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;
global $product;
?>

<?php get_header(); ?>

<!-- Breadcrumb Start -->
<!-- <div class="container-fluid">
        <div class="row px-xl-5"> -->
            <div class="col-12">
				<?php woocommerce_breadcrumb() ?>
            </div>
        <!-- </div>
    </div> -->
 <!-- Breadcrumb End -->
 
 <?php
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */?>
 
 <div class="container-fluid">
 	<?php
	do_action( 'woocommerce_before_single_product' ); 
	
	// return;
	if ( post_password_required() ) {
		echo get_the_password_form(); // WPCS: XSS ok.
		return;
	}
	?>
 </div>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'product-wrapr product-cart', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>
	<div class="col-lg-7 h-auto mb-30">
		<div class="h-100 bg-light p-30">	
			<div class="summary entry-summary">
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
				?>
			</div>
		</div>
	</div>
</div>

<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	
	do_action( 'woocommerce_after_single_product_summary' );
	// woocommerce_upsell_display();
	?>

	<?php get_footer(); ?>
	<?php return; ?>

	

	
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
