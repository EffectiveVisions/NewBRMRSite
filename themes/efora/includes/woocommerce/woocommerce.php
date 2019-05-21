<?php
// Remove Default Wrapper
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
// Remove Page Title
function efora_woocommerce_show_page_title() {
    return false;
}
add_filter( 'woocommerce_show_page_title', 'efora_woocommerce_show_page_title' );
// Remove Product Sale Badge
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
// Shop Posts Per Page
function efora_woocommerce_shop_posts_per_page() {
    $number_products = efora_option('number_products');
    if(!empty($number_products)){
        $default_posts_per_page = efora_option('number_products');
    } else {
        $default_posts_per_page = get_option( 'posts_per_page' );
    }
    $products = $default_posts_per_page;
    return $products;
}
add_filter( 'loop_shop_per_page', 'efora_woocommerce_shop_posts_per_page' );
// Shop Thumbnail
function efora_woocommerce_shop_thumbnail() {
    GLOBAL $product;
    $id = get_the_ID();

}
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'efora_woocommerce_shop_thumbnail', 10 );
// Social Share
function efora_social_share(){
    GLOBAL $product;
    $id = get_the_ID(); ?>
    <div class="clearfix"></div>
    <ul class="tg-likeshare">
            <li class="tg-shareicon">
                <a href="javascript:void(0);"><i class="icon-share-button-outline"></i><span><?php esc_attr_e('share','efora'); ?></span></a>
                <ul class="tg-share">
                    <li><a href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&tw_p=tweetbutton&url=<?php the_permalink(); ?>&via=<?php bloginfo( 'name' ); ?>"><i class="icon-twitter"></i></a></li>
                    <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"><i class="icon-facebook"></i></a></li>
                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>&amp;title=<?php the_title(); ?>&amp;source=<?php bloginfo( 'name' ); ?>"><i class="icon-linkedin"></i></a></li>
                </ul>
            </li>
            <?php if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) { ?>
                <li>
                    <div class="show-wishlist">
                        <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                    </div>
                </li>
            <?php } ?>
        </ul>
<?php }
add_action( 'woocommerce_after_add_to_cart_button', 'efora_social_share', 10 );
// Remove Cart Cross Cells
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' , 10 );
// Remove the action 
remove_action( 'woocommerce_ajax_added_to_cart', 'action_woocommerce_ajax_added_to_cart', 10 );
// Default Other Shipping Form
//add_filter( 'woocommerce_ship_to_different_address_checked', '__return_true' );
// Remove Plugin Settings
function efora_woocommerce_remove_plugin_settings( $settings ) {
    foreach ( $settings as $key => $setting ) {
        $id = $setting['id'];
        if ( $id == 'image_options' || $id == 'shop_catalog_image_size' || $id == 'shop_single_image_size' || $id == 'shop_thumbnail_image_size' ) {
            unset( $settings[$key] );
        }
    }
    return $settings;
}
add_filter( 'woocommerce_product_settings', 'efora_woocommerce_remove_plugin_settings', 10 );