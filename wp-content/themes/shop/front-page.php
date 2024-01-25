<?php get_header(); ?>

    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <!-- Main Banner with custom field repeater Start-->
                    <?php
                        if( have_rows('main_banner_repeater') ): // Loop through rows.
                    ?>
                     <?php $active = true; ?>
                    <?php while( have_rows('main_banner_repeater') ) : the_row(); ?>
                    <?php 
                            $mainBannerImage = get_sub_field('main_banner_image'); 
                            $mainBannerHeader = get_sub_field('main_banner_header');
                            $mainBannerText = get_sub_field('main_banner_text');
                           
                            ?>  
                           
                        <div class="carousel-item position-relative <?php echo $active ? 'active' : ''; ?>" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="<?php echo  $mainBannerImage;  ?>" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown"><?php echo $mainBannerHeader; ?></h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn"><?php echo $mainBannerText; ?></p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#"><?php _e("Shop now", "shop") ?></a>
                                </div>
                            </div>
                        </div>
                        <?php $active = false; ?>
                        <?php endwhile ?>
                        <?php endif ?>
                         <!-- Main Banner with custom field repeater End-->
                    </div>
                </div>
            </div>
             <!-- 📌 Two Smaller Banners with custom fields Starts-->
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="<?php echo  get_field('banner1_image', 'option')  ?>" alt="">
                    <div class="offer-text">
                    <?php $banner1SavePercents = get_field('banner1_save_percents', 'option'); ?>
            <?php if (!empty($banner1SavePercents)) : ?>
                <h6 class="text-white text-uppercase"><?php echo $banner1SavePercents; ?></h6>
            <?php endif; ?>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src="<?php echo get_field('banner2_image', 'option')  ?>" alt="">
                    <div class="offer-text">
                    <?php $banner2SavePercents = get_field('banner2_save_percents', 'option'); ?>
            <?php if (!empty($banner2SavePercents)) : ?>
                <h6 class="text-white text-uppercase"><?php echo $banner2SavePercents; ?></h6>
            <?php endif; ?>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
             <!-- Two Smaller Banners with custom fields End-->
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            
                <!-- 4 cards "What we do" section Start -->
                <?php
                        if( have_rows('what_we_do_cards_repeater') ): // Loop through rows.
                ?>
                    <?php while( have_rows('what_we_do_cards_repeater') ) : the_row(); ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                            <?php 
                            $cardIcon = get_sub_field('card_icon'); 
                            $cardText = get_sub_field('card_text');
                            ?>  
                            <h1 class="fa <?php echo $cardIcon ?> text-primary m-0 mr-3"></h1>
                            <h5 class="font-weight-semi-bold m-0"><?php echo $cardText ?></h5>  
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
              
                <!-- 4 cards "What we do" section End -->
                
                <!-- <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                        <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                        <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                    </div>
                 </div> -->
        </div>
    </div>
    <!-- Featured End -->

    <!-- Categories Start  -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <?php 
    //     // $cats = get_categories(array(
    //     //     'taxonomy' => 'product_cat'
    // ));
        // myPrintArray($cats);
        // var_dump($cats);
        
        ?>
        <?php echo do_shortcode('[product_categories hide_empty="0"]') ?>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="<?php echo  get_template_directory_uri();  ?>/img/cat-1.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Category Name</h6>
                            <small class="text-body">100 Products</small>
                        </div>
                    </div>
                </a>
            </div>
            
        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Products</span></h2>
        <div class="row px-xl-5">
            
            <?php echo do_shortcode('[featured_products limit="8"]') ?>
   
        </div>
        <!-- <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?php// echo  get_template_directory_uri();  ?>/img/product-1.jpg" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    
                     <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div> -->
                <!-- </div> -->
        <!-- </div>  -->
    </div>
    <!-- Products End -->


    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="<?php echo  get_field('banner1_image', 'option')  ?>" alt="">
                    <div class="offer-text">
                        <<?php $banner1SavePercents = get_field('banner1_save_percents', 'option'); ?>
            <?php if (!empty($banner1SavePercents)) : ?>
                <h6 class="text-white text-uppercase"><?php echo $banner1SavePercents; ?></h6>
            <?php endif; ?>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="<?php echo  get_field('banner2_image', 'option')  ?>" alt="">
                    <div class="offer-text">
                    <?php $banner1SavePercents = get_field('banner2_save_percents', 'option'); ?>
            <?php if (!empty($banner1SavePercents)) : ?>
                <h6 class="text-white text-uppercase"><?php echo $banner1SavePercents; ?></h6>
            <?php endif; ?>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Recent Products</span></h2>
        <div class="row px-xl-5">
        <?php echo do_shortcode('[recent_products limit="8"]') ?>
        </div>
    </div>
    <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="<?php echo  get_template_directory_uri();  ?>/img/vendor-1.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="<?php echo  get_template_directory_uri();  ?>/img/vendor-2.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="<?php echo  get_template_directory_uri();  ?>/img/vendor-3.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="<?php echo  get_template_directory_uri();  ?>/img/vendor-4.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="<?php echo  get_template_directory_uri();  ?>/img/vendor-5.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="<?php echo  get_template_directory_uri();  ?>/img/vendor-6.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="<?php echo  get_template_directory_uri();  ?>/img/vendor-7.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="<?php echo  get_template_directory_uri();  ?>/img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->

                      
    <!-- Footer Start -->
   <?php get_footer(); ?>