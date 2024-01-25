<?php
 add_action('widgets_init','shop_widgets_init');

 function shop_widgets_init(){
    register_sidebar( array(
		'name'          => __( 'Quick Shop Widget Area', 'shop' ),
        'id'            => 'quick-shop-widget-area',
        'description'   => __( 'Add widgets for the Quick Shop section here.', 'shop' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="text-secondary text-uppercase mb-4">',
        'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'My Account Widget Area', 'shop' ),
        'id'            => 'my-account-widget-area',
        'description'   => __( 'Add widgets for the Quick Shop section here.', 'shop' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="text-secondary text-uppercase mb-4">',
        'after_title'   => '</h5>',
	) );

    // register_sidebar( array(
	// 	'name'          => "Categories widget",
	// 	'id'            => "categories-widget",
	// 	'description'   => 'add widget to the blog sidebar',
	// 	'class'         => '',
	// 	'before_widget' => '<div class="sidebar-widget category">',
	// 	'after_widget'  => "</div>\n",
	// 	'before_title'  => '<h5 class="mb-3">',
	// 	'after_title'   => "</h5>\n",
	// 	'before_sidebar' => '', // WP 5.6
	// 	'after_sidebar'  => '', // WP 5.6
	// ) );

    // register_sidebar( array(
	// 	'name'          => "Tags widget",
	// 	'id'            => "tags-widget",
	// 	'description'   => 'add widget to the blog sidebar',
	// 	'class'         => '',
	// 	'before_widget' => '<div class="sidebar-widget tag">',
	// 	'after_widget'  => "</div>\n",
	// 	'before_title'  => '',
	// 	'after_title'   => "",
	// 	'before_sidebar' => '', // WP 5.6
	// 	'after_sidebar'  => '', // WP 5.6
	// ) );
    // // For the copyrights widget
    // register_sidebar( array(
    //     'name'          => 'Footer Widget copyrights',
    //     'id'            => 'footer-widget-copyrights',
    //     'description'   => 'adds a widget with the copyrights in the footer.',
    //     'before_widget' => '',
    //     'after_widget'  => "</div>\n",
    //     'before_title'  => '',
    //     'after_title'   => '',
    // ) );
    // // For the left column in the footer
    // register_sidebar( array(
	// 	'name'          => "Footer widget what we do",
	// 	'id'            => "footer-widget-our-mission",
	// 	'description'   => 'add widget to the footer with the mission statement',
	// 	'class'         => '',
	// 	'before_widget' => '<div class="footer-widget footer-link">',
	// 	'after_widget'  => "</div>\n",
	// 	'before_title'  => '',
	// 	'after_title'   => "",
	// 	'before_sidebar' => '', // WP 5.6
	// 	'after_sidebar'  => '', // WP 5.6
	// ) );
    // // For the Информация menu in the footer
    // register_sidebar( array(
	// 	'name'          => "Footer widget for the Information menu",
	// 	'id'            => "footer-widget-infromation-menu",
	// 	'description'   => 'add widget to the footer with the information menu',
	// 	'class'         => '',
	// 	'before_widget' => '<div class="footer-widget footer-link">',
	// 	'after_widget'  => "</div>\n",
	// 	'before_title'  => '',
	// 	'after_title'   => '',
	// 	'before_sidebar' => '', // WP 5.6
	// 	'after_sidebar'  => '', // WP 5.6
	// ) );
    // // For the Links menu in the footer
    // register_sidebar( array(
	// 	'name'          => "Footer widget for the Links menu",
	// 	'id'            => "footer-widget-links-menu",
	// 	'description'   => 'add widget to the footer with the links menu',
	// 	'class'         => '',
	// 	'before_widget' => '<div class="footer-widget footer-link">',
	// 	'after_widget'  => "</div>\n",
	// 	'before_title'  => '',
	// 	'after_title'   => '',
	// 	'before_sidebar' => '', // WP 5.6
	// 	'after_sidebar'  => '', // WP 5.6
	// ) );
}
 ?>