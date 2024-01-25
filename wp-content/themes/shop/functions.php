<?php
if (!defined('VERSION')) {
    // Replace the version number of the theme on each release.
    define('VERSION', '1.0.0');
}
require_once("inc/register-post-type.php");
require_once("inc/theme-options.php");
require_once("inc/widgets/widgets.php");
require_once("inc/class-shop_menu_categories.php");
require_once("inc/class-shop_top_menu.php");
require_once("inc/class-shop_navbar_menu.php");
require_once("inc/woocommerce-hooks.php");

add_action('wp_enqueue_scripts','shop_styleandscript');
add_action('after_setup_theme', 'shop_setup');
add_action('wp_head', function () {
    echo '<link rel="preconnect" href="https://fonts.gstatic.com">';
}, 5);

// add_action('widgets_init','shop_widgets_init');

function shop_setup(){
    register_nav_menus(array(
        "header"=>__("Header Menu", "shop"),
        "quick_shop"=>"Quick Shop",
        "my_account"=>"My Account",
        'menu-1' => __('Top Menu', 'shop'), // функция локализации (нам нужно вернуть перевод строки, исп. _)
        'menu-2' => __('Categories Menu', 'shop'),
        'menu-3' => __('Navbar Menu', 'shop'),
    ));

    add_theme_support('woocommerce');
    add_theme_support('post-thumbnails'); // активируем картинки к постам
    load_theme_textdomain('shop', get_template_directory() . '/languages'); // наши переводы
}

function woostudy_widgets_init()
{
    register_sidebar(
        array(
            'name' => 'Sidebar',
            'id' => 'sidebar-1',
            'description' => 'Add widgets here.',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'after_title'   => "</h5>\n",
        )
    );
}

add_action('widgets_init', 'woostudy_widgets_init');

// For the image in the single-product page
function custom_product_image_template() {
    wc_get_template('single-product-image.php');
}

add_action('woocommerce_before_single_product_summary', 'custom_product_image_template', 20);


// function shop_widgets_init(){
//     register_sidebar( array(
// 		'name'          => "Blog sidebar text widget",
// 		'id'            => "blog-sidebar-text-widget",
// 		'description'   => 'add widget to the blog sidebar',
// 		'class'         => '',
// 		'before_widget' => '<div class="sidebar-widget about-bar">',
// 		'after_widget'  => "</div>\n",
// 		'before_title'  => '<h5 class="mb-3">',
// 		'after_title'   => "</h5>\n",
// 		'before_sidebar' => '', // WP 5.6
// 		'after_sidebar'  => '', // WP 5.6
// 	) );

//     }

//🐸 Modifying the add to cart button


function shop_styleandscript(){

wp_enqueue_style('fonts-googleapis', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap', '', VERSION);
wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css', '', VERSION);
wp_enqueue_style('animate-css', get_template_directory_uri() . '/lib/animate/animate.min.css', '', VERSION);
wp_enqueue_style('owl-carusel', get_template_directory_uri() . '/lib/owlcarousel/assets/owl.carousel.min.css', '', VERSION);
wp_enqueue_style('style-css', get_template_directory_uri() . '/css/style.css', '', VERSION);
wp_enqueue_style('custom-css', get_template_directory_uri() . '/css/custom.css', '', VERSION);
wp_enqueue_style('custom-style-css', get_template_directory_uri() . '/custom_styles.css', '', VERSION);
}
wp_enqueue_style('main-style', get_stylesheet_uri(), '', VERSION);


wp_enqueue_script('jquery'); // подключаем встроенную библиотеку jquery

wp_enqueue_script('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js' ,array('jquery'), VERSION, true);
wp_enqueue_script('easing', get_template_directory_uri() . '/lib/easing/easing.min.js', '', VERSION, true);
wp_enqueue_script('carusel', get_template_directory_uri() . '/lib/owlcarousel/owl.carousel.min.js', '', VERSION, true);
wp_enqueue_script('mail-validation', get_template_directory_uri() . '/mail/jqBootstrapValidation.min.js', '', VERSION);
wp_enqueue_script('mail-contact', get_template_directory_uri() . '/mail/contact.js', '', VERSION, true);
wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', '', VERSION, true);
wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', '', VERSION, true);

/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &nbsp;/&nbsp; ',
            'wrap_before' => '<nav class="breadcrumb bg-light mb-30">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}
?>

<?php function myPrintArray($data){
         echo '<pre>'. print_r($data,1 ). '</pre>'; 
    }
?>