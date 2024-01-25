<?php
add_action('after_setup_theme', 'shop_setup_theme');
function shop_setup_theme(){
    add_theme_support('post-thumbnails'); // активируем картинки к постам
}

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    )); 
}

?>