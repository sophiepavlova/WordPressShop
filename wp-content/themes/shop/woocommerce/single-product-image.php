<?php
/*
 * WooCommerce Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/single-product-image.php.
 */

defined('ABSPATH') || exit;

global $product;

// Get the featured image (Product Image)
$featured_image_id = get_post_thumbnail_id($product->get_id());

// Get gallery image IDs excluding the featured image
$attachment_ids = array_diff($product->get_gallery_image_ids(), array($featured_image_id));

if ($featured_image_id) {
    $featured_image_url = wp_get_attachment_image_url($featured_image_id, 'full');
    ?>
    <div class="col-lg-5 mb-30">
        <div id="product-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner bg-light">
                <div class="carousel-item active">
                    <img class="w-100 h-100" src="<?php echo esc_url($featured_image_url); ?>" alt="Image">
                </div>
                <?php
                $active = false; // Variable to set subsequent items as not active
                foreach ($attachment_ids as $attachment_id) :
                    $image_url = wp_get_attachment_image_url($attachment_id, 'full');
                    ?>
                    <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                        <img class="w-100 h-100" src="<?php echo esc_url($image_url); ?>" alt="Image">
                    </div>
                    <?php
                    $active = false; // Set active to false for subsequent items
                endforeach;
                ?>
            </div>
            <?php if ($attachment_ids) : ?>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <?php
}
