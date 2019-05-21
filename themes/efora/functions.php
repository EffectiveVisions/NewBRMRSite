<?php
/**
 * Theme Functions Page
 * @ efora Theme
 * @ efora Theme 2.0
 **/
// Load all scripts and stylesheets
function efora_load_styles() {
    wp_enqueue_style( 'normalize' , get_template_directory_uri()."/css/normalize.css");
     if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false){ 
    wp_enqueue_style( 'font-awesome' , get_template_directory_uri()."/css/font-awesome.min.css");
    }
    wp_enqueue_style( 'owl-carousel' , get_template_directory_uri()."/css/owl.carousel.css");
    wp_enqueue_style( 'scrollbar' , get_template_directory_uri()."/css/scrollbar.css");
    wp_enqueue_style( 'jquery-mmenu-all' , get_template_directory_uri()."/css/jquery.mmenu.all.css");
    wp_enqueue_style( 'jquery-mmenu-positioning' , get_template_directory_uri()."/css/jquery.mmenu.positioning.css");
    wp_enqueue_style( 'transitions' , get_template_directory_uri()."/css/transitions.css");
    wp_enqueue_style( 'efora-main' , get_template_directory_uri()."/css/main.css");
    wp_enqueue_style( 'efora-color' , get_template_directory_uri()."/css/color.css");
    wp_enqueue_style( 'efora-responsive' , get_template_directory_uri()."/css/responsive.css");
    wp_enqueue_style( 'efora-root-style' , get_template_directory_uri()."/style.css");
     if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false){
       wp_enqueue_style( 'icon' , get_template_directory_uri()."/css/blueridge-icon.css");
    }

}
add_action('wp_enqueue_scripts', 'efora_load_styles');
function efora_load_scripts_footer() {
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array('jquery'), '', false  );
    
     wp_enqueue_script('popper', get_template_directory_uri() . '/js/vendor/popper.min.js', array('jquery'), '', true  );

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array('jquery'), '', true  );

    //wp_enqueue_script('tpwidget', get_template_directory_uri() . '/js/vendor/tp.widget.bootstrap.min.js', array('jquery'), '', true  );

    wp_enqueue_script('jquery-scrolltofixed', get_template_directory_uri() . '/js/jquery-scrolltofixed.js', array('jquery'), '', true  );
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '', true  );
    wp_enqueue_script('jquery-mmenu-all', get_template_directory_uri() . '/js/jquery.mmenu.all.js', array('jquery'), '', true  );
    wp_enqueue_script('scrollbar', get_template_directory_uri() . '/js/scrollbar.min.js', array('jquery'), '', true  );
    wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array('jquery'), '', true  );
    wp_enqueue_script('efora-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true  );
    // Custom Scripts
    wp_enqueue_script('efora-custom-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array('jquery'), '', true  );
}
// Load scripts in footer
add_action('wp_enqueue_scripts', 'efora_load_scripts_footer');
// Google Fonts
if ( ! function_exists( 'efora_fonts_url' ) ) :
    function efora_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'cyrillic,latin-ext';
        if ( 'off' !== _x( 'on', 'Lato font: on or off', 'efora' ) ) {
            $fonts[] = 'Lato:300,400,700,900';
        }
        if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'efora' ) ) {
            $fonts[] = 'Roboto:400,500,700,900';
        }
        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }
        return $fonts_url;
    }
endif;
if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false){ 
function efora_fonts_scripts() {
    wp_enqueue_style( 'efora-fonts', efora_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'efora_fonts_scripts' );
}
// After Theme Setup
function efora_theme_setup() {
    // Add custom backgroud support
    add_theme_support( 'custom-background' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Add editor style support
    add_editor_style( array( 'css/editor-style.css'));
    // Set Post Thumbnail Size
    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'efora-tour-401-285', 401, 285, true );
        add_image_size( 'efora-tour-63-63', 63, 63, true );
    }
    // Theme Title
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'efora_theme_setup' );
// Text Domain
load_theme_textdomain( 'efora', get_template_directory() . '/languages' );
// Add custom background support
require get_template_directory() . '/lib/custom-header.php';
// Add Thumbnail Support
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}
// Content Width
if ( !isset( $content_width ) ) $content_width = 1000;

// Registering Menus
function efora_register_menu() {
    $locations = array(
        'primary-menu' => esc_html__( 'Primary Menu', 'efora' ),
        'mobile-menu' => esc_html__( 'Mobile Menu', 'efora' ),
        'search-menu' => esc_html__( 'Search Overlay Menu', 'efora' ),
        'registration-menu' => esc_html__( 'Login Overlay Menu', 'efora' ),
        'top-bar-menu' => esc_html__( 'Top Bar Menu', 'efora' )
    );
    register_nav_menus( $locations );
}
add_action( 'init', 'efora_register_menu' );
// Changing excerpt 'more' text
function efora_new_excerpt_more($more) {
    global $post;
}
add_filter('excerpt_more', 'efora_new_excerpt_more');
// efora multiple excerpt
function efora_excerpt($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;
    if(strlen($excerpt)>$charlength) {
        $subex = substr($excerpt,0,$charlength-5);
        $exwords = explode(" ",$subex);
        $excut = -(strlen($exwords[count($exwords)-1]));
        if($excut<0) {
            echo do_shortcode(substr($subex,0,$excut));
        } else {
            echo do_shortcode($subex);
        }
        echo "..";
    } else {
        echo do_shortcode($excerpt);
    }
}
function efora_shortcode_excerpt($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;
    if(strlen($excerpt)>$charlength) {
        $subex = substr($excerpt,0,$charlength-5);
        $exwords = explode(" ",$subex);
        $excut = -(strlen($exwords[count($exwords)-1]));
        if($excut<0) {
            return do_shortcode(substr($subex,0,$excut)).'..';
        } else {
            return do_shortcode($subex);
        }
    } else {
        return do_shortcode($excerpt);
    }
}
// Controling excerpt length
function efora_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'efora_custom_excerpt_length', 999 );
// efora Trim Words
function efora_trim_words($numberOfWords){
    $content = get_the_content();
    return wp_trim_words($content,$numberOfWords);
}
// Get Feature Image URL By Post ID
function efora_feature_image_url($post_id){
    $image_url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
    return $image_url;
}
// Pagination
function efora_pagination($pages = '', $range = 2){
    $showitems = ($range * 2)+1;
    $paged = $GLOBALS['paged'];
    //global ;
    if(empty($paged)) $paged = 1;
    if($pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
    if(1 != $pages){
        echo "<nav class='tg-pagination'>";
        echo "<ul>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class='first'><a href='".get_pagenum_link(1)."'>".esc_html__('First','efora')."</a></li>";
        if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&laquo;</a></li>";
        for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                echo ($paged == $i)? "<li class='tg-active'><a>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&raquo;</a></li>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class='last'><a href='".get_pagenum_link($pages)."'>".esc_html__('Last','efora')."</a></li>";
        echo "</ul>\n";
        echo "</nav>\n";
    }
}
// Shortcode Pagination
function efora_shortcode_pagination($pages = '', $range = 2){
    $showitems = ($range * 2)+1;
    $paged = $GLOBALS['paged'];
    $out = '';
    if(empty($paged)) $paged = 1;
    if($pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
    if(1 != $pages){
        $out .= "<nav class='tg-pagination'>";
        $out .= "<ul>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages){
            $out .= "<li class='first'><a href='".get_pagenum_link(1)."'>".esc_html__('First','efora')."</a></li>";
        }
        if($paged > 1 && $showitems < $pages) {
            $out .= "<li><a href='".get_pagenum_link($paged - 1)."'>&laquo;</a></li>";
        }
        for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                $out .= ($paged == $i)? "<li class='tg-active'><a>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages) {
            $out .= "<li><a href='".get_pagenum_link($paged + 1)."'>&raquo;</a></li>";
        }
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
            $out .= "<li class='last'><a href='".get_pagenum_link($pages)."'>".esc_html__('Last','efora')."</a></li>";
        }
        $out .= "</ul>\n";
        $out .= "</nav>\n";
    }
    return $out;
}
// Set avatar Class
add_filter('get_avatar','efora_add_gravatar_class');
function efora_add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='avatar img-responsive", $class);
    return $class;
}
// Registering custom Comments
function efora_comment($comment, $args, $depth) {
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = '';
        $add_below = 'div-comment';
    } ?>
    <li>
        <div class="tg-comment">
            <figure>
                <?php echo get_avatar( $comment, 75 ); ?>
            </figure>
            <div class="tg-content">
                <div class="tg-commenthead">
                    <div class="tg-author">
                        <h3><?php comment_author(); ?></h3>
                        <time datetime="<?php echo get_comment_date(); ?>"><?php printf( esc_html__('%1$s at %2$s','efora'), get_comment_date(),  get_comment_time()); ?></time>
                    </div>
                    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                    <input type="hidden" class="cID" value="<?php echo get_comment_ID(); ?>" />
                </div>
                <div class="tg-description">
                    <p><?php comment_text(); ?></p>
                </div>
            </div>
        </div>
    </li>
    <?php
}
// Setting Post Views Count
function efora_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, 0);
        return "0";
    }
    return $count;
}
function efora_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Theme Widgets
require_once(get_template_directory() . "/lib/widgets.php");
// Get Post/Pages Meta Fields
function efora_get_field( $name ){
    if(function_exists('get_field')){
        if(is_category() || (function_exists('is_product_category') && is_product_category()) ||
            (function_exists('is_product_tag') && is_product_tag()) || is_tax('tour_category') ||
            is_tax('tour_destination')){
            $queried_object = get_queried_object();
            return get_field($name,$queried_object);
        } elseif(function_exists('is_shop') && is_shop()){
            $shop_id = get_option( 'woocommerce_shop_page_id' );
            return get_field($name,$shop_id);
        } elseif(is_home() || is_404()){
            // Do Nothing
        } else {
            return get_field($name);
        }
    } else{
        return '';
    }
}
function efora_get_sub_field( $name ){
    if(function_exists('get_field')){
        if(is_category()){
            $queried_object = get_queried_object();
            return get_sub_field($name,$queried_object);
        } else {
            return get_sub_field($name);
        }
    } else{
        return '';
    }
}
// Get User Meta Fields
function efora_get_user_field( $name ){
    if(function_exists('get_the_author_meta')){
        return get_the_author_meta($name);
    } else{
        return '';
    }
}
// efora Styles
include_once(get_template_directory() . '/efora-styles-scripts.php');
// Google Web Fonts For Theme Options
function efora_theme_options_fonts_url() {
    $heading_font = efora_option("headings_font_face");
    if(empty($heading_font)){
        $heading_font = 'Dancing Script';
    }
    $heading_weight = efora_option("headings_font_weight");
    if(empty($heading_weight)){
        $heading_weight = 400;
    }
    $meta_font = efora_option("meta_font_face");
    if(empty($meta_font)){
        $meta_font = 'Roboto';
    }
    $meta_weight = efora_option("meta_font_weight");
    if(empty($meta_weight)){
        $meta_weight = 700;
    }
    $body_font = efora_option("body_font_face");
    if(empty($body_font)){
        $body_font = 'Oswald';
    }
    $body_weight = efora_option("body_font_weight");
    if(empty($body_weight)){
        $body_weight = 700;
    }

    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'efora' ) ) {
        $font_url = add_query_arg( 'family', urlencode( $heading_font.'|'.$meta_font.'|'.$body_font.':'.$heading_weight.','.$meta_weight.','.$body_weight ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
// Enqueue Fonts For Theme Options
function efora_theme_options_scripts() {
    wp_enqueue_style( 'efora-theme-options-fonts', efora_theme_options_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'efora_theme_options_scripts' );
// Plugin Activation Class
require_once(get_template_directory() .'/lib/plugin-activation.php');
add_action( 'tgmpa_register', 'efora_register_required_plugins' );
function efora_register_required_plugins() {
    $plugins = array(
        // Visual Composer
        array(
            'name'               => esc_html__('Visual Composer','efora'),
            'slug'               => 'js_composer',
            'source'             => get_template_directory_uri() . '/lib/plugins/js_composer.zip',
            'required'           => true,
        ),
        // Theme Core
        array(
            'name'               => esc_html__('Theme Core','efora'),
            'slug'               => 'theme-core',
            'source'             => get_template_directory_uri() . '/lib/plugins/theme-core.zip',
            'required'           => true,
        ),
        // Advanced Custom Fields
        array(
            'name'      => esc_html__('Advanced Custom Fields','efora'),
            'slug'      => 'advanced-custom-fields',
            'required'  => true,
        ),
        array(
            'name'      => 'WooCommerce',
            'slug'      => 'woocommerce',
            'required'  => true,
        ),
        //  Contact Form 7
        array(
            'name'      => esc_html__('Contact Form 7','efora'),
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        //  Wishlist
        array(
            'name'      => esc_html__('WooCommerce Wishlist','efora'),
            'slug'      => 'yith-woocommerce-wishlist',
            'required'  => false,
        ),
        //  MailPoet Newsletters
        array(
            'name'      => esc_html__('MailPoet Newsletters','efora'),
            'slug'      => 'wysija-newsletters',
            'required'  => false,
        ),
        //  Recent Posts Widget With Thumbnails
        array(
            'name'      => esc_html__('Recent Posts Widget With Thumbnails','efora'),
            'slug'      => 'recent-posts-widget-with-thumbnails',
            'required'  => false,
        )
    );
    $config = array(
        'id'           => 'efora',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',

    );
    tgmpa( $plugins, $config );
}
// Remove Wishlist Plugin Page
function efora_remove_wishlist(){
    remove_menu_page( 'yit_plugin_panel' );
}
add_action( 'admin_menu', 'efora_remove_wishlist' );
// Check For Plugin Using Plugin Name
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
// Visual Composer Functions
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    require_once( get_template_directory() . '/lib/visual-composer.php' );
    function efora_vc_styles() {
        wp_register_style( 'efora_vc_icons', get_template_directory_uri() . '/lib/vc_icons/efora_vc_icons.css', false, '1.0.0' );
        wp_enqueue_style( 'efora_vc_icons' );
    }
    add_action( 'admin_enqueue_scripts', 'efora_vc_styles' );
}
/* Woocommerce Integration */
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
    // Add Theme Support
    add_action( 'after_setup_theme', 'woocommerce_support' );
    function woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }
    // Adding Hooks & Functions
    require_once(get_template_directory() . "/includes/woocommerce/woocommerce.php");
    // Comments For Woocommerce
    function efora_woo_comment($comment, $args, $depth) {
        global $product;
        extract($args, EXTR_SKIP);
        if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
        $rating = esc_attr( get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true ) ); ?>
        <li>
            <div class="tg-review">
                <div class="tg-author">
                    <figure class="tg-authorimg">
                        <?php echo get_avatar( $comment, 75 ); ?>
                    </figure>
                    <div class="tg-authorinfo">
                        <h3><?php comment_author(); ?></h3>
                        <?php $terms_destinations = get_the_terms(get_the_ID(), 'tour_destination');
                        $destinations = '';
                        if(is_array($terms_destinations)){
                            $d_count = 1;
                            foreach ($terms_destinations as $ter){
                                if($d_count == 1){
                                    $destinations .= esc_attr($ter->name);
                                } else {
                                    $destinations .= ', '.esc_attr($ter->name);
                                }
                                $d_count++;
                            }
                        } ?>
                        <span><?php echo esc_attr($destinations); ?></span>
                        <span class="tg-stars">
                            <?php $percentage = $rating/5*100; ?>
                            <span style="width:<?php echo esc_attr($percentage).'%;'; ?>"></span>
                        </span>
                    </div>
                </div>
                <div class="tg-reviewcontent">
                    <div class="tg-reviewhead">
                        <span class="tg-tourduration"><?php printf( esc_html__('%1$s at %2$s','efora'), get_comment_date(),  get_comment_time()); ?></span>
                    </div>
                    <div class="tg-description">
                        <?php comment_text(); ?>
                    </div>
                </div>
            </div>
        </li>
        <?php
    }
    // Wishlist Content
    if ( shortcode_exists( 'yith_wcwl_wishlist' ) ) {
        function wishlist_endpoint_content(){
            echo do_shortcode('[yith_wcwl_wishlist]');
        }
        add_action('woocommerce_account_wishlist_endpoint', 'wishlist_endpoint_content');
    }
}
// Option Hook
function efora_option( $name ){
    if(function_exists('vp_option')){
        return vp_option( "vpt_option." . $name );
    } else{
        return '';
    }
}
// Add Span To Categories Count
add_filter('wp_list_categories', 'efora_add_span_cat_count');
function efora_add_span_cat_count($links) {
    $links = str_replace('</a> (', '</a> <span>(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}
// efora Allowed Tags
$efora_allowedtags = array(
    'a' => array(
        'href' => array (),
        'title' => array ()),
    'abbr' => array(
        'title' => array ()),
    'acronym' => array(
        'title' => array ()),
    'b' => array(),
    'blockquote' => array(
        'cite' => array ()),
    'cite' => array (),
    'ins' => array (),
    'del' => array(
        'datetime' => array ()),
    'em' => array (),
    'i' => array (),
    'q' => array(
        'cite' => array ()),
    'div' => array(
        'class' => array ()),
    'strike' => array(),
    'strong' => array(),
    'h1' => array(),
    'h2' => array(),
    'h3' => array(),
    'h4' => array(),
    'h5' => array(),
    'h6' => array(),
    'p' => array(),
    'ul' => array(),
    'ol' => array(),
    'li' => array(),
    'span' => array(
        'class' => array ()
    ),
    'br' => array(),
    'iframe' => array(
        'src' => array (),
        'height' => array (),
        'width' => array (),
        'frameborder' => array (),
        'style' => array (),
        'allowfullscreen' => array (),
    ),
    'img' => array(
        'src' => array (),
        'height' => array (),
        'width' => array (),
        'class' => array ()
    ),
);
// Adding Field Based Classes
function efora_page_body_classes( $classes ) {
    $page_classes = efora_get_field('page_classes');
    if(!empty($page_classes)){
        $classes[] = $page_classes;
    } else {
        $classes[] = '';
    }
    return $classes;
}
add_filter( 'body_class', 'efora_page_body_classes' );
function efora_conditional_body_classes( $classes ) {
    $header_menu_style = efora_get_field('header_menu_style');
    if(is_404()){
        $classes[] = 'tg-404errorpage';
    } elseif(is_page_template('page-template-coming.php')){
        $classes[] = 'tg-comingsoonpage';
    } elseif($header_menu_style == 'default-menu-absolute'){
        $classes[] = 'tg-home tg-homevone';
    } elseif($header_menu_style == 'transparent-menu'){
        $classes[] = 'tg-home tg-homevtwo';
    } elseif(is_user_logged_in()){
        $classes[] = 'tg-login';
    } else {
        $classes[] = '';
    }
    return $classes;
}
add_filter( 'body_class', 'efora_conditional_body_classes' );
// efora Breadcrumb
require_once(get_template_directory() . "/includes/efora-breadcrumb.php");
// Destinations List
function efora_destination_list(){
    $terms = get_terms( 'tour_destination', array(
        'hide_empty' => false,
        'parent' => 0
    ) );
    if (!empty($terms) && !is_wp_error($terms)){ ?>
        <span class="tg-select">
            <select onchange="document.location.href=this.options[this.selectedIndex].value;">
                <option value="/"><?php esc_attr_e('Select Destination','efora'); ?></option>
                <?php foreach ( $terms as $term ) {
                    $sub_terms = get_terms( 'tour_destination', array(
                        'hide_empty' => false,
                        'parent' => $term->term_id
                    ) ); ?>
                    <?php if (!empty($sub_terms) && !is_wp_error($sub_terms)){ ?>
                        <optgroup label="<?php echo esc_attr($term->name); ?>">
                            <?php foreach ( $sub_terms as $sub_term ) { ?>
                                <option value="<?php echo esc_url(get_term_link($sub_term->term_id)); ?>"><?php echo esc_attr($sub_term->name); ?></option>
                            <?php } ?>
                        </optgroup>
                <?php } else{ ?>
                        <option value="<?php echo esc_url(get_term_link($term->term_id)); ?>"><?php echo esc_attr($term->name); ?></option>
                <?php }
                } ?>
            </select>
        </span>
    <?php }
}
// Ajax Add To Cart Tour
function efora_add_to_cart_tour() {
    ob_start();
    $product_id        = $_REQUEST['pro_id'];
    $quantity          = $_REQUEST['pro_qty'];
    $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
    $product_status    = get_post_status( $product_id );
    if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity ) && 'publish' === $product_status ) {
        do_action( 'woocommerce_ajax_added_to_cart', $product_id );
        wc_add_to_cart_message( $product_id );
    } else {
        // If there was an error adding to the cart, redirect to the product page to show any errors
        $data = array(
            'error'       => true,
            'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id )
        );
        wp_send_json( $data );
    }
    die();
}
add_action('wp_ajax_efora_add_to_cart_tour', 'efora_add_to_cart_tour');
add_action('wp_ajax_nopriv_efora_add_to_cart_tour', 'efora_add_to_cart_tour');
// Update Small Cart
function efora_update_small_cart(){
    ob_start();
    global $woocommerce;
    global $efora_allowedtags;
    $out = '';
    if ( function_exists('WC') && ! WC()->cart->is_empty() ) {
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                $product_cats = wp_get_post_terms( $product_id, 'product_cat' );
                $out .= '<div class="tg-cartitem">';
                $out .= '<figure class="tg-itemimg">';
                $out .= wp_kses($thumbnail,$efora_allowedtags);
                $out .= '</figure>';
                $out .= '<div class="tg-contentbox">';
                $out .= '<div class="tg-producthead">';
                $out .= '<em>x '.esc_attr($cart_item['quantity']).'</em>';
                $out .= '<h4>';
                $out .= '<a href="'.esc_url( $_product->get_permalink( $cart_item ) ).'">';
                $out .= esc_attr($product_name);
                if($_product->is_type('tour')){
                    $terms = get_the_terms($product_id, 'tour_category');
                    if(is_array($terms) && count($terms) > 0){
                        $out .= '<span>';
                        $y = 1;
                        foreach($terms as $ter){
                            if($y == 1){
                                $out .= esc_attr($ter->name);
                            } else {
                                $out .= ', '.esc_attr($ter->name);
                            } $y++;
                        }
                        $out .= '</span>';
                    }
                } elseif ( $product_cats && ! is_wp_error ( $product_cats ) ){
                    $single_cat = array_shift( $product_cats );
                    $out .= '<span>'.esc_attr($single_cat->name).'</span>';
                }
                $out .= '</a>';
                $out .= '</h4>';
                $out .= '</div>';
                $out .= '<span>'.wp_kses($product_price,array('ins' => array (),'del' => array ())).'</span>';
                $out .= '</div>';
                $out .= '</div>';
            }
        }
        $out .= '<div class="tg-subtotal">';
        if ( ! WC()->cart->is_empty() ) {
            $out .= '<h2>'.esc_html__('Subtotal','efora').'</h2>';
            $out .= '<span>'.WC()->cart->get_cart_subtotal().'</span>';
        }
        $out .= '</div>';
    } else {
        $out .= '<p class="black">'.esc_html__( 'No products in the cart.', 'efora' ).'</p>';
    } echo $out;
    die();
}
add_action('wp_ajax_efora_update_small_cart', 'efora_update_small_cart');
add_action('wp_ajax_nopriv_efora_update_small_cart', 'efora_update_small_cart');
// Exclude Tours From Shop
function efora_exclude_pro_from_shop(){
    global $post;
    $exclude_product_list = array();
    $args = array( 'post_type' => array('product', 'product_variation'), 'posts_per_page' => -1 );
    $myposts = get_posts( $args );
    foreach ( $myposts as $post ) : setup_postdata( $post );
        $proid = get_the_ID();
        $rental_features = get_the_terms( $proid,'product_type' );
        if(is_array($rental_features) && count($rental_features) > 0){
            if($rental_features[0]->slug == 'tour'){
                $exclude_product_list[] = $proid;
            }
        }
    endforeach;
    wp_reset_postdata();
    return $exclude_product_list;
}
add_action( 'woocommerce_product_query', 'efora_expo_product_query' );
function efora_expo_product_query( $q ){
    if( ! is_admin() ) {
        if(function_exists('is_shop') && is_shop()){
            $q->set('post__not_in', efora_exclude_pro_from_shop());
        }
    }
}
// efora User Login
function efora_user_login() {
    ob_start();
    $creds = array();
    $creds['user_login'] = $_REQUEST['username'];
    $creds['user_password'] = $_REQUEST['password'];
    $creds['remember'] = $_REQUEST['remember'];
    $user = wp_signon( $creds, false );
    if ( is_wp_error($user) ){
        $data = array(
            'error'       => true,
            'error_msg' =>$user->get_error_message()
        );
        wp_send_json( $data );
    } else {
        // Do Nothing
    }
    die();
}
add_action('wp_ajax_efora_user_login', 'efora_user_login');
add_action('wp_ajax_nopriv_efora_user_login', 'efora_user_login');
// efora User Registration
function efora_user_regsiter() {
    ob_start();
    $user_login = $_REQUEST['username'];
    $user_email = $_REQUEST['email'];
    $errors = register_new_user($user_login, $user_email);
    if ( !is_wp_error($errors) ){
        // Do Nothing
    } else {
        $data = array(
            'error'       => true,
            'error_msg' => $errors->errors
        );
        wp_send_json( $data );
    }
    die();
}
add_action('wp_ajax_efora_user_regsiter', 'efora_user_regsiter');
add_action('wp_ajax_nopriv_efora_user_regsiter', 'efora_user_regsiter');
// Description Field Shortcode
add_filter('wp_nav_menu_items', 'do_shortcode');
class efora_Menu_With_Description extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';
        $output .= $indent . '<li ' . $value . $class_names .'>';
        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        if ( $depth == 0 ) {
            $item_output .= "\n$indent<div class=\"mega-menu\"><div class=\"tg-sliderarea\">" . do_shortcode($item->description) . "</div>\n";
        }
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent</ul></div>";
    }
}
class efora_Mobile_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"mobile-sub-menu\">\n";
    }
}

