<?php
/**
 * WooCommerce Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/single-product-image.php.
 */

defined('ABSPATH') || exit;

global $product;
?>
<div class="bg-light p-30 custom_tabs">
    <div class="nav nav-tabs mb-4">
        <?php if (get_the_content()) : ?>
            <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
        <?php endif; ?>

        
            <a class="nav-item nav-link text-dark <?php echo !get_the_content() ? 'active' : ''; ?>" data-toggle="tab" href="#tab-pane-2">Information</a>
      

        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (<?php echo $product->get_review_count(); ?>)</a>
    </div>
    <div class="tab-content">
        <?php if (get_the_content()) : ?>
            <div class="tab-pane fade show active" id="tab-pane-1">
                <h4 class="mb-3">Product Description</h4>
                <?php the_content(); ?>
            </div>
        <?php endif; ?>

        
            <div class="tab-pane fade <?php echo !get_the_content() ? 'show active' : ''; ?>" id="tab-pane-2">
                <h4 class="mb-3">Information</h4>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <?php wc_display_product_attributes($product); ?>
                        </ul>
                    </div>
                </div>
            </div>
        

        <div class="tab-pane fade" id="tab-pane-3">
            <?php
            $comments = get_comments(array(
                'post_type' => 'product',
                'post_id'   => get_the_ID(),
                'status'    => 'approve',
                'type'      => 'review',
            ));
            if ($comments) :
            ?>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mb-4"><?php echo count($comments); ?> review for "<?php echo get_the_title(); ?>"</h4>
                        <?php
                        foreach ($comments as $comment) :
                            $rating = get_comment_meta($comment->comment_ID, 'rating', true);
                        ?>
                            <div class="media mb-4">
                                <?php echo get_avatar($comment, 45); ?>
                                <div class="media-body">
                                    <h6><?php echo esc_html($comment->comment_author); ?><small> - <i><?php echo get_comment_date('d M Y', $comment); ?></i></small></h6>
                                    <div class="text-primary mb-2">
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            echo ($i <= $rating) ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>';
                                        }
                                        ?>
                                    </div>
                                    <p><?php echo esc_html($comment->comment_content); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-4">Leave a review</h4>
                        <small>Your email address will not be published. Required fields are marked *</small>
                        <div class="d-flex my-3">
                            <p class="mb-0 mr-2">Your Rating * :</p>
                            <div class="text-primary">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <form>
                            <div class="form-group">
                                <label for="message">Your Review *</label>
                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Your Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

