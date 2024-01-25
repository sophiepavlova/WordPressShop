<?php
// отключение дефолтных стилей woocommerce
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

remove_action('woocommerce_shop_loop_subcategory_title','woocommerce_template_loop_category_title', 10);
add_action('woocommerce_shop_loop_subcategory_title', function($category){
echo '<h6>' .esc_html($category->name). '</h6>';
if($category->count>0){
    echo '<small class="text-body">' . esc_html($category->count) . __(' Products', 'woostudy') . ' </small>';
}
}, 10);

remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close', 10);

remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', function(){
global $product;
echo '<a class="h6 text-decoration-none text-truncate" href="' .$product->get_permalink(). ' ">' .$product->get_title(). '</a>';
});
//price
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
add_action('woocommerce_after_shop_loop_item_title', function(){
    global $product;
echo "<div class='d-flex align-items-center'>";
    if ($product->is_on_sale()) {
        $regular_price = '<h6 class="text-muted ml-2"><del>' . wc_price($product->get_regular_price()) . '</del></h6>';
        $sale_price = '<h5>' . wc_price($product->get_price()) . '</h5>';
    } else {
        $regular_price = '';
        $sale_price = '<h5>' . wc_price($product->get_price()) . '</h5>';
    }
    echo  $sale_price . $regular_price ;
    echo "</div>";
});
// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// Rating 
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5); 
add_action('woocommerce_after_shop_loop_item_title', function(){
    global $product;
    echo '<div class="d-flex align-items-center justify-content-center mb-1">';
        woocommerce_template_loop_rating();
        if($product_rating=$product->get_rating_count()){
            echo '<small>';
            echo $product_rating;
            echo'</small>';
        }
    echo '</div>';
});

// обновление мини корзины
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) { // $fragments - это массив

    $fragments['.mini-cart-cnt'] = '<span class="badge text-secondary border border-secondary rounded-circle mini-cart-cnt">' . count(WC()->cart->get_cart()) . '</span>'; // добавляем в массив вот такой ключ: mini-cart-cnt и дальше нам нужно предать верстку, которая потом будет перерисована
    return $fragments;

});
// _____________________________________________________________________________________________
//🐸 Modifying the add to cart button 

// Remove the default add to cart button
//🪲
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

// Add your custom add to cart button and quantity input
// add_action('woocommerce_single_product_summary', 'custom_add_to_cart_button_and_quantity', 30);

function custom_add_to_cart_button_and_quantity() {
    global $product;
    
    // Check if the product is purchasable
    if ($product->is_purchasable()) {
        echo '<form class="d-flex align-items-center mb-4 pt-2 cart" action="' . esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())) . '" method="post" enctype="multipart/form-data">';
        echo '<div class="input-group quantity mr-3" style="width: 130px;">';
        
        // Quantity minus button
        echo '<button class="btn btn-primary btn-minus"><i class="fa fa-minus"></i></button>';
        
        // Quantity input
        woocommerce_quantity_input(array(
            'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
            'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
            'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(),
        ));
        
        // Quantity plus button
        echo '<button class="btn btn-primary btn-plus"><i class="fa fa-plus"></i></button>';
        
        echo '</div>';
        
        // Custom add to cart button
        echo '<button type="submit" name="add-to-cart" value="' . esc_attr($product->get_id()) . '" class="single_add_to_cart_button button alt btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>';
        
        echo '</form>';
    }
}

// THE END OF Modifying the add to cart button  🐸


//  Breadcrumbs new
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop','woocommerce_output_all_notices', 10);
remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash', 10);

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
add_action('woocommerce_after_single_product_summary', 'custom_output_product_data_tabs', 10);
function custom_output_product_data_tabs(){
    global $product;
    woocommerce_output_product_data_tabs();
}

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action('woocommerce_after_single_product_summary', 'custom_related_products', 30);

function custom_related_products(){
    global $product;
    echo "<div class='container-fluid py-5'>";
    echo "<h2 class='section-title position-relative text-uppercase mx-xl-5 mb-4'><span class='bg-secondary pr-3'>You May Also Like</span></h2>";
    woocommerce_output_related_products();
    echo "</div>";
    echo "</div>";
}

//Removing the filters from below the footer on the individual product page
add_action('template_redirect', function () { // хук template_redirect отрабатывет, когда переопределяется шаблон
    // применяем в тот случае, если is_product отрабатывает
    if (is_product()) {
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    }
});

add_filter('woocommerce_default_address_fields', function ($fields) {
    //unset($fields['address_2']);
    $fields['first_name']['required']=1;//0 if you need to remove required
    
    return $fields;
});