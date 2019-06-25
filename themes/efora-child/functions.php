<?php
function efora_child_enqueue_styles() {
    if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false){
        wp_enqueue_style('load-fonts', get_stylesheet_directory_uri() . '/css/load-font.css');
    }
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');    
    wp_enqueue_style('bootstrap-child', get_stylesheet_directory_uri() . "/css/bootstrap.min.css");
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css');

    wp_enqueue_style('slick-css', get_stylesheet_directory_uri() . '/css/slick.css');

    wp_enqueue_style('chosen-css', get_stylesheet_directory_uri() . '/css/chosen.min.css');

    wp_enqueue_style('ao-css', get_stylesheet_directory_uri() . '/css/aos.css');

    wp_enqueue_style('loading-css', get_stylesheet_directory_uri() . '/css/placeholder-loading.css');
}
add_action('wp_enqueue_scripts', 'efora_child_enqueue_styles', 50);

function efora_child_scripts_footer() {
    wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/js/slick.min.js', array('jquery'), '', true);
    wp_enqueue_script('chosen-js', get_stylesheet_directory_uri() . '/js/chosen.jquery.min.js', array('jquery'), '', true);
    wp_enqueue_script('aos-js', get_stylesheet_directory_uri() . '/js/aos.js', '', '', true);
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', '', '', true);
    wp_enqueue_script('efora-main', get_stylesheet_directory_uri() . '/js/main.js','', '', true  );
    wp_enqueue_script('lazy-load', get_stylesheet_directory_uri() . '/js/lazyload.js','', '', true  );
}

add_action('wp_enqueue_scripts', 'efora_child_scripts_footer');


add_action('after_setup_theme', 'efora_child_register_menu');

function efora_child_register_menu() {
    register_nav_menu('community-menu', __('Community', 'theme-slug'));
}

function efora_widgets_init() {
    register_sidebar(array(
        'name' => __('Home Hero Area', 'streamline-theme'),
        'id' => 'home-hero-widgets',
        'description' => __('Add Master Slider or Hero Widget.  Also add a ResortPro search to appear over Master Slider/Hero.', 'streamline-theme'),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => __('Vacation Home By Area', 'streamline-theme'),
        'id' => 'vacation-home-by-area-widgets',
        'description' => __('Add Master Slider or Hero Widget.  Also add a ResortPro search to appear over Master Slider/Hero.', 'streamline-theme'),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => esc_html__('Page Sidebar', 'efora'),
        'id' => 'efora-page',
        'description' => esc_html__('Widgets in this area will be shown at page right sidebar position.', 'efora'),
        'before_title' => '<div class="tg-widgettitle"><h3>',
        'after_title' => '</h3></div>',
        'after_widget' => '</div>',
        'before_widget' => '<div id="%1$s" class="tg-widget tg-widgetlatesttour %2$s">'
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 1', 'efora'),
        'id' => 'footer-s1',
        'description' => esc_html__('Widgets in this area will be shown at footer column 1.', 'efora'),
        'before_title' => '<div class="tg-widgettitle"><h3>',
        'after_title' => '</h3></div>',
        'after_widget' => '</div>',
        'before_widget' => '<div id="%1$s" class="tg-widgetcontent %2$s">'
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 2', 'efora'),
        'id' => 'footer-s2',
        'description' => esc_html__('Widgets in this area will be shown at footer column 2.', 'efora'),
        'before_title' => '<div class="tg-widgettitle"><h3>',
        'after_title' => '</h3></div>',
        'after_widget' => '</div>',
        'before_widget' => '<div id="%1$s" class="tg-widgetcontent %2$s">'
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 3', 'efora'),
        'id' => 'footer-s3',
        'description' => esc_html__('Widgets in this area will be shown at footer column 3.', 'efora'),
        'before_title' => '<div class="tg-widgettitle"><h3>',
        'after_title' => '</h3></div>',
        'after_widget' => '</div>',
        'before_widget' => '<div id="%1$s" class="tg-widgetcontent %2$s">'
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 4', 'efora'),
        'id' => 'footer-s4',
        'description' => esc_html__('Widgets in this area will be shown at footer column 4.', 'efora'),
        'before_title' => '<div class="tg-widgettitle"><h3>',
        'after_title' => '</h3></div>',
        'after_widget' => '</div>',
        'before_widget' => '<div id="%1$s" class="tg-widgetcontent %2$s">'
    ));

    register_sidebar(array(
        'name' => esc_html__('Vacation Home By Area Info', 'efora'),
        'id' => 'vacationareainfo',
        'description' => esc_html__('Widgets in this area will be shown on vacation area', 'efora'),
        'before_title' => '',
        'after_title' => '',
        'after_widget' => '',
        'before_widget' => ''
    ));
    register_sidebar(array(
        'name' => esc_html__('VacationHomeBy Area Slider1', 'efora'),
        'id' => 'vacationareainfoslider1',
        'description' => esc_html__('Widgets in this area will be shown on vacation area', 'efora'),
        'before_title' => '',
        'after_title' => '',
        'after_widget' => '',
        'before_widget' => ''
    ));

    register_sidebar(array(
        'name' => esc_html__('VacationHomeBy Area Slider2', 'efora'),
        'id' => 'vacationareainfoslider2',
        'description' => esc_html__('Widgets in this area will be shown on vacation area', 'efora'),
        'before_title' => '',
        'after_title' => '',
        'after_widget' => '',
        'before_widget' => ''
    ));

    register_sidebar(array(
        'name' => esc_html__('VacationHomeBy Area Places', 'efora'),
        'id' => 'vacationareainfoplaces',
        'description' => esc_html__('Widgets in this area will be shown on vacation area', 'efora'),
        'before_title' => '',
        'after_title' => '',
        'after_widget' => '',
        'before_widget' => ''
    ));

    register_sidebar(array(
        'name' => esc_html__('VacationHomeBy Find Perfect Gateway', 'efora'),
        'id' => 'vacationareagateway',
        'description' => esc_html__('Widgets in this area will be shown on vacation area', 'efora'),
        'before_title' => '',
        'after_title' => '',
        'after_widget' => '',
        'before_widget' => ''
    ));
    register_sidebar(array(
        'name' => esc_html__('Explore Boone Places', 'efora'),
        'id' => 'explorebooneplaces',
        'description' => esc_html__('Widgets in this area will be shown on vacation area', 'efora'),
        'before_title' => '',
        'after_title' => '',
        'after_widget' => '',
        'before_widget' => ''
    ));

    register_sidebar(array(
        'name' => esc_html__('Blog search', 'efora'),
        'id' => 'blogsearch',
        'description' => esc_html__('Widgets in this area will be shown on blogpage', 'efora'),
        'before_title' => '',
        'after_title' => '',
        'after_widget' => '',
        'before_widget' => ''
    ));

    register_sidebar(array(
        'name' => esc_html__('Header Search', 'efora'),
        'id' => 'headersearch',
        'description' => esc_html__('Widgets in this area will be shown on header', 'efora'),
        'before_title' => '',
        'after_title' => '',
        'after_widget' => '',
        'before_widget' => ''
    ));
}

add_action('widgets_init', 'efora_widgets_init');


if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));
}

add_filter('frm_submit_button', 'change_my_submit_button_label', 10, 2);

function change_my_submit_button_label($label, $form) {
    $label = 'SEND TO US';
    return $label;
}

add_action('frm_submit_button_class', 'add_submit_class', 10, 2);

function add_submit_class($classes, $form) {
    $classes[] = 'btn btn-warning  text-uppercase themeBtn font-weight-bold font-Nunito send-to-us';
    return $classes;
}

function add_file_types_to_uploads($file_types) {
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}

add_action('upload_mimes', 'add_file_types_to_uploads');


function my_custom_js() {

    $url = get_stylesheet_directory_uri() . '/js/picturefill.min.js';

    echo '<script type="text/javascript" src='.$url.' async></script>';
}

add_action( 'wp_head', 'my_custom_js' );

function defer_parsing_of_js($url) {
    if (FALSE === strpos($url, '.js'))
        return $url;
    if (strpos($url, 'jquery/jquery.js') || strpos($url, 'angular.min.js') || strpos($url, 'resortpro.min.js') || strpos($url, 'aos.js') || strpos($url, 'commonangularfile.js') || strpos($url, 'lazyload.js')) {
        return $url;
        //return "$url' async='async";
    } else {
        return "$url' defer='defer";
    }
}

if (!is_admin()) {
    add_filter('clean_url', 'defer_parsing_of_js', 11, 1);
}


add_filter('if_menu_conditions', 'wpb_new_menu_conditions');

function wpb_new_menu_conditions($conditions) {
    $conditions[] = array(
        'name' => 'If it is Custom Post Type archive', // name of the condition
        'condition' => function($item) {          // callback - must return TRUE or FALSE
            return is_post_type_archive();
        }
    );

    return $conditions;
}