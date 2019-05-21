<?php
// Legacy Update
function efora_visual_composer_legacy_update() {
    if ( defined( 'WPB_VC_VERSION' ) && version_compare( WPB_VC_VERSION, '4.3.5', '<' ) ) {
        do_action( 'vc_before_init' );
    }
}
add_action( 'admin_init', 'efora_visual_composer_legacy_update' );

/* Set Visual Composer */
// Removes tabs such as the "Design Options" from the Visual Composer Settings & page and disables automatic updates.
function efora_visual_composer_set_as_theme() {
    vc_set_as_theme( true );
}
add_action( 'vc_before_init', 'efora_visual_composer_set_as_theme' );
// Remove Default Shortcodes
if ( ! function_exists( 'efora_visual_composer_remove_default_shortcodes' ) ) {
    function efora_visual_composer_remove_default_shortcodes() {
        vc_remove_element( 'vc_pinterest' );
        vc_remove_element( 'vc_toggle' );
        vc_remove_element( 'vc_gallery' );
        vc_remove_element( 'vc_images_carousel' );
        vc_remove_element( 'vc_tabs' );
        vc_remove_element( 'vc_tour' );
        vc_remove_element( 'vc_accordion' );
        vc_remove_element( 'vc_posts_grid' );
        vc_remove_element( 'vc_carousel' );
        vc_remove_element( 'vc_posts_slider' );
        vc_remove_element( 'vc_widget_sidebar' );
        vc_remove_element( 'vc_button' );
        vc_remove_element( 'vc_cta_button' );
        vc_remove_element( 'vc_gmaps' );
        vc_remove_element( 'vc_raw_js' );
        vc_remove_element( 'vc_flickr' );
        vc_remove_element( 'vc_wp_search' );
        vc_remove_element( 'vc_wp_meta' );
        vc_remove_element( 'vc_wp_recentcomments' );
        vc_remove_element( 'vc_wp_calendar' );
        vc_remove_element( 'vc_wp_pages' );
        vc_remove_element( 'vc_wp_tagcloud' );
        vc_remove_element( 'vc_wp_custommenu' );
        vc_remove_element( 'vc_wp_posts' );
        vc_remove_element( 'vc_wp_links' );
        vc_remove_element( 'vc_wp_categories' );
        vc_remove_element( 'vc_wp_archives' );
        vc_remove_element( 'vc_wp_rss' );
        vc_remove_element( 'vc_button2' );
        vc_remove_element( 'vc_cta_button2' );
        vc_remove_element( 'vc_tta_tabs' );
        vc_remove_element( 'vc_tta_tour' );
        vc_remove_element( 'vc_tta_accordion' );
        vc_remove_element( 'vc_tta_pageable' );
        vc_remove_element( 'vc_cta' );
        vc_remove_element( 'vc_round_chart' );
        vc_remove_element( 'vc_line_chart' );
        vc_remove_element( 'vc_basic_grid' );
        vc_remove_element( 'vc_masonry_grid' );
        vc_remove_element( 'vc_acf' );
        vc_remove_element( 'vc_section' );
    }
    add_action( 'vc_before_init', 'efora_visual_composer_remove_default_shortcodes' );
}
// Remove Default Templates
if ( ! function_exists( 'efora_visual_composer_remove_default_templates' ) ) {
    function efora_visual_composer_remove_default_templates( $data ) {
        return array();
    }
    add_filter( 'vc_load_default_templates', 'efora_visual_composer_remove_default_templates' );
}
// Remove Meta Boxes
if ( ! function_exists( 'efora_visual_composer_remove_meta_boxes' ) ) {
    function efora_visual_composer_remove_meta_boxes() {
        if ( is_admin() ) {
            foreach ( get_post_types() as $post_type ) {
                remove_meta_box( 'vc_teaser',  $post_type, 'side' );
            }
        }
    }
    add_action( 'do_meta_boxes', 'efora_visual_composer_remove_meta_boxes' );
}
// Disable Frontend Editor
if ( function_exists( 'vc_disable_frontend' ) ) {
    vc_disable_frontend();
}
// Map Shortcodes
if ( ! function_exists( 'efora_visual_composer_map_shortcodes' ) ) {
    function efora_visual_composer_map_shortcodes() {
        $animations = array(
            'Select' => '',
            'bounce' => 'bounce',
            'bounceIn'     => 'bounceIn',
            'flash'     => 'flash',
            'pulse'     => 'pulse',
            'rubberBand'     => 'rubberBand',
            'shake'     => 'shake',
            'swing'     => 'swing',
            'tada'     => 'tada',
            'wobble'     => 'wobble',
            'jello'     => 'jello',
            'fadeIn'     => 'fadeIn',
            'fadeInDown'     => 'fadeInDown',
            'fadeInDownBig'     => 'fadeInDownBig',
            'fadeInLeft'     => 'fadeInLeft',
            'fadeInLeftBig'     => 'fadeInLeftBig',
            'fadeInRight'     => 'fadeInRight',
            'fadeInRightBig'     => 'fadeInRightBig',
            'fadeInUp'     => 'fadeInUp',
            'fadeInUpBig'     => 'fadeInUpBig',
            'fadeOut'     => 'fadeOut',
            'fadeOutDown'     => 'fadeOutDown',
            'fadeOutDownBig'     => 'fadeOutDownBig',
            'fadeOutLeft'     => 'fadeOutLeft',
            'fadeOutLeftBig'     => 'fadeOutLeftBig',
            'fadeOutRight'     => 'fadeOutRight',
            'fadeOutRightBig'     => 'fadeOutRightBig',
            'fadeOutUp'     => 'fadeOutUp',
            'fadeOutUpBig'     => 'fadeOutUpBig',
            'slideInUp'     => 'slideInUp',
            'slideInDown'     => 'slideInDown',
            'slideInLeft'     => 'slideInLeft',
            'slideInRight'     => 'slideInRight',
            'zoomIn'     => 'zoomIn',
            'zoomInDown'     => 'zoomInDown',
            'zoomInLeft'     => 'zoomInLeft',
            'zoomInRight'     => 'zoomInRight',
            'zoomInUp'     => 'zoomInUp',
        );
        // All Posts Array
        global $post;
        $args = array(
            'posts_per_page'   => -1,
            'post_type'        => 'post',
            'order'            => 'DESC',
            'orderby'        => 'ID',
            'post_status'      => 'publish'
        );
        $vcposts = new WP_Query( $args );
        $vcpostsarray = array();
        $count = 1;
        while ( $vcposts->have_posts() ) : $vcposts->the_post();
            $title = esc_attr(get_the_title());
            $vcpostsarray['<span class="none">'.$count.': </span>'.$title] = get_the_ID();
            $count++;
        endwhile;
        wp_reset_postdata();
        // All Categories Array
        $vcategories = get_categories(array('hide_empty' => false));
        $vccatsarray = array();
        if(is_array($vcategories)){
            $count = 1;
            foreach($vcategories as $cat){
                $vccatsarray['<span class="none">'.$count.': </span>'.$cat->cat_name] = $cat->cat_ID;
                $count++;
            }
        }
        // Container
        vc_map(
            array(
                'base'            => 'container',
                'name'            => esc_html__( 'Container', 'efora' ),
                'weight'          => 1,
                'class'           => 'container',
                'icon'            => 'efora_vc_container',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Include a container in your content', 'efora' ),
                'as_parent'       => array( 'only' => 'destination_un_order_lists,add_to_cart_url,product_page,product_categories,product_category,product_attribute,top_rated_products,best_selling_products,sale_products,add_to_cart,products,product,featured_products,recent_products,woocommerce_my_account,woocommerce_order_tracking,woocommerce_cart,woocommerce_checkout,efora_toggles,destinations_tabs,blog_posts,video_box,destination_lists,pop_destinations_carousel,tren_tour_grid,guides_carousel,discount_cta_box,destinations_carousel,theme_button,title_block,pop_tour_carousel,feature_txt_box,destination_box,efora_faq,pricing_table,tour_listing,vc_zigzag,vc_raw_html,rev_slider,rev_slider_vc,vc_video,toggle_services_box,facts,vc_single_image,simple_img_slides,pricing_table,simple_heading,testimonials,counter_box,vc_column_text,vc_separator,vc_text_separator,vc_message,vc_facebook,vc_tweetmeme,vc_googleplus,vc_progress_bar,vc_pie,contact-form-7,vc_wp_text,vc_custom_heading,vc_empty_space,vc_icon,vc_btn,vc_media_grid,vc_masonry_media_grid,vc_row'),
                'content_element' => true,
                'js_view'         => 'VcColumnView',
                'params'          => array(
                    array(
                        'param_name'  => 'class',
                        'heading'     => esc_html__( 'Class', 'efora' ),
                        'description' => esc_html__( '(Optional) Enter a unique class/classes.', 'efora' ),
                        'type'        => 'textfield'
                    )
                )
            )
        );
        // Listings
        vc_map(
            array(
                'base'            => 'tour_listing',
                'name'            => esc_html__( 'Tour Listings', 'efora' ),
                'class'           => '',
                'icon'            => 'efora_vc_portfolio',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Add tour listings to your content.', 'efora' ),
                'params'          => array(
                    // Display Style
                    array(
                        'param_name'  => 'display_style',
                        'heading'     => esc_html__( 'Display Style', 'efora' ),
                        'description' => esc_html__( 'Set listing display style.', 'efora' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            '3 Columns (Outer Meta)' => '3-col-outer-meta',
                            '4 Columns (Outer Meta)' => '4-col-outer-meta',
                            '3 Columns (Inner Meta)' => '3-col-inner-meta',
                            '2 Columns (Inner Meta Only)' => '2-col-inner-meta-only',
                            'Single Row (Side Info)' => 'single-row-side-info',
                            'Single Row (Below Info)' => 'single-row-below-info'
                        ),
                        'admin_label' => true
                    ),
                    // Tour Categories
                    array(
                        'param_name'  => 'tour_categories',
                        'heading'     => esc_html__( 'Tour Categories ID', 'efora' ),
                        'description' => esc_html__( 'Enter tour category ID separating by single comma else all will be displayed.', 'efora' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Number Of Tours To display
                    array(
                        'param_name'  => 'number_of_tours',
                        'heading'     => esc_html__( 'Number Of Tours To Display', 'efora' ),
                        'description' => esc_html__( 'Number of listing items to display.', 'efora' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'efora' ),
                        'description' => esc_html__( 'Display order for listing items.', 'efora' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        'admin_label' => true
                    ),
                )
            )
        );
        // Pricing Table
        vc_map(
            array(
                'base'            => 'pricing_table',
                'name'            => esc_html__( 'Pricing Table', 'efora' ),
                'class'           => '',
                'icon'            => 'efora_vc_pricing_table',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Add pricing to your content. ', 'efora' ),
                'params'          => array(
                    // Heading
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Heading', 'efora' ),
                        'description' => esc_html__( 'Input list heading.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Price Amount
                    array(
                        'param_name'  => 'price_amnt',
                        'heading'     => esc_html__( 'Price Amount', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Currency Symbol
                    array(
                        'param_name'  => 'currency',
                        'heading'     => esc_html__( 'Currency Symbol', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Button Text
                    array(
                        'param_name'  => 'btn_txt',
                        'heading'     => esc_html__( 'Button Text', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Button Link
                    array(
                        'param_name'  => 'btn_link',
                        'heading'     => esc_html__( 'Button Link', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Description
                    array(
                        'param_name'  => 'content',
                        'heading'     => esc_html__( 'Description', 'efora' ),
                        'description' => esc_html__( 'For default layout use un-ordered list style with class name "tg-pkgplanoptions". ', 'efora' ),
                        'type'        => 'textarea_html'
                    )
                )
            )
        );
        // FAQ's
        vc_map(
            array(
                'base'            => 'efora_faq',
                'name'            => esc_html__( 'FAQs', 'efora' ),
                'class'           => '',
                'icon'            => '',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Add FAQs to your content.', 'efora' ),
                'params'          => array(
                    // Number Of FAQ
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of FAQ', 'efora' ),
                        'description' => esc_html__( 'Only numeric values, default is 6.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'efora' ),
                        'description' => esc_html__( 'Set FAQ display order.', 'efora' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        "admin_label"	=> true
                    )
                )
            )
        );
        // Destinations Box
        vc_map(
            array(
                'base'            => 'destination_box',
                'name'            => esc_html__( 'Destination Box', 'efora' ),
                'class'           => '',
                'icon'            => '',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Add destination box to your content.', 'efora' ),
                'params'          => array(
                    // Heading
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Heading', 'efora' ),
                        'description' => esc_html__( 'Input heading text.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Caption
                    array(
                        'param_name'  => 'caption',
                        'heading'     => esc_html__( 'Caption', 'efora' ),
                        'description' => esc_html__( 'Input caption text.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Link URL
                    array(
                        'param_name'  => 'link_url',
                        'heading'     => esc_html__( 'Link URL', 'efora' ),
                        'description' => esc_html__( 'Input complete link URL.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Image
                    array(
                        'param_name'  => 'background_img',
                        'heading'     => esc_html__( 'Background Image', 'efora' ),
                        'description' => esc_html__( 'You need to upload the image else nothing will be displayed.', 'efora' ),
                        'type'        => 'attach_image'
                    ),
                    // Title Size
                    array(
                        'param_name'  => 'title_size',
                        'heading'     => esc_html__( 'Title Size', 'efora' ),
                        'description' => esc_html__( 'Set to choose title size.', 'efora' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Normal' => '',
                            'Large'     => 'tg-tourdestinationbigbox'
                        ),
                        "admin_label"	=> true
                    )
                )
            )
        );
        // Feature Text Box
        vc_map(
            array(
                'base'            => 'feature_txt_box',
                'name'            => esc_html__( 'Feature Text Box', 'efora' ),
                'class'           => '',
                'icon'            => '',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Add feature text box to your content.', 'efora' ),
                'params'          => array(
                    // Heading
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Heading', 'efora' ),
                        'description' => esc_html__( 'Input heading text.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Number Value
                    array(
                        'param_name'  => 'number_value',
                        'heading'     => esc_html__( 'Number Value', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Description
                    array(
                        'param_name'  => 'description',
                        'heading'     => esc_html__( 'Description', 'efora' ),
                        'type'        => 'textarea'
                    ),
                    // Text Alignment
                    array(
                        'param_name'  => 'txt_algin',
                        'heading'     => esc_html__( 'Text Alignment', 'efora' ),
                        'description' => esc_html__( 'Set text alignment.', 'efora' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Left' => 'text-left',
                            'Center'     => 'text-center'
                        ),
                        "admin_label"	=> true
                    ),
                    // Display Style
                    array(
                        'param_name'  => 'style',
                        'heading'     => esc_html__( 'Display Style', 'efora' ),
                        'description' => esc_html__( 'Set display style.', 'efora' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Dark' => 'dark',
                            'White'     => 'white'
                        ),
                        "admin_label"	=> true
                    )
                )
            )
        );
        // Popular Tour Carousel
        vc_map(
            array(
                'base'            => 'pop_tour_carousel',
                'name'            => esc_html__( 'Popular Tour Carousel', 'efora' ),
                'class'           => '',
                'icon'            => 'efora_vc_slider',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Add tours carousel to your content. ', 'efora' ),
                'params'          => array(
                    // Heading
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Heading', 'efora' ),
                        'description' => esc_html__( 'Input heading text.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // All Tour Text
                    array(
                        'param_name'  => 'all_tour_txt',
                        'heading'     => esc_html__( 'All Tour Text', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // All Tour Link
                    array(
                        'param_name'  => 'all_tour_link',
                        'heading'     => esc_html__( 'All Tour Link', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Number
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of Tours', 'efora' ),
                        'description' => esc_html__( 'Only numeric values, default is 5.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Display Style
                    array(
                        'param_name'  => 'style',
                        'heading'     => esc_html__( 'Display Style', 'efora' ),
                        'description' => esc_html__( 'Set display style.', 'efora' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Dark' => 'darko',
                            'Light'     => 'tg-parallax'
                        ),
                        "admin_label"	=> true
                    )
                )
            )
        );
        // Title Block
        vc_map(
            array(
                'base'            => 'title_block',
                'name'            => esc_html__( 'Title Block', 'efora' ),
                'class'           => '',
                'icon'            => 'efora_vc_heading',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Add simple title block to your content.', 'efora' ),
                'params'          => array(
                    // Heading Text
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Heading', 'efora' ),
                        'description' => esc_html__( 'Input heading text.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label" => true
                    ),
                    // Small Caption
                    array(
                        'param_name'  => 'small_caption',
                        'heading'     => esc_html__( 'Small Caption', 'efora' ),
                        'description' => esc_html__( 'Input small caption text here.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label" => true
                    ),
                    // Color
                    array(
                        'param_name'  => 'head_color',
                        'heading'     => esc_html__( 'Heading Color', 'efora' ),
                        'description' => esc_html__( 'Choose your heading text color.', 'efora' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Dark' => '',
                            'White'     => 'white'
                        ),
                        'admin_label' => true
                    ),
                    // Text Alignment
                    array(
                        'param_name'  => 'txt_alignment',
                        'heading'     => esc_html__( 'Text Alignment', 'efora' ),
                        'description' => esc_html__( 'Choose your text alignment.', 'efora' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Left' => '',
                            'Center'     => 'center'
                        ),
                        'admin_label' => true
                    ),
                )
            )
        );
        // Theme Button
        vc_map(
            array(
                'base'            => 'theme_button',
                'name'            => esc_html__( 'Theme Button', 'efora' ),
                'class'           => '',
                'icon'            => 'efora_vc_buttons',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Add button to your content. ', 'efora' ),
                'params'          => array(
                    // Button Text
                    array(
                        'param_name'  => 'btn_txt',
                        'heading'     => esc_html__( 'Button Text', 'efora' ),
                        'description' => esc_html__( 'Input button text.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Button Link
                    array(
                        'param_name'  => 'btn_link',
                        'heading'     => esc_html__( 'Button Link', 'efora' ),
                        'description' => esc_html__( 'Input button link.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    )
                )
            )
        );
        // Destinations Carousel
        vc_map(
            array(
                'base'            => 'destinations_carousel',
                'name'            => esc_html__( 'Destinations Carousel', 'efora' ),
                'class'           => '',
                'icon'            => 'efora_vc_slider',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Add destination carousel to your content. ', 'efora' ),
                'params'          => array(
                    // Destination ID's
                    array(
                        'param_name'  => 'ids',
                        'heading'     => esc_html__( 'Destination IDs', 'efora' ),
                        'description' => esc_html__( 'Edit your destination and look into top browser; tag_ID is destination id. Separate by single comma, leave empty for all.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Display Style
                    array(
                        'param_name'  => 'style',
                        'heading'     => esc_html__( 'Column Style', 'efora' ),
                        'description' => esc_html__( 'Set column display style.', 'efora' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Dual Tours' => 'dual',
                            'Simple'     => ''
                        ),
                        "admin_label"	=> true
                    ),
                    // Overlay Style
                    array(
                        'param_name'  => 'overlay_style',
                        'heading'     => esc_html__( 'Overlay Style', 'efora' ),
                        'description' => esc_html__( 'Set overlay display style.', 'efora' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Small Info' => 'small-info',
                            'Title + Nummber Of Tours'     => 'tnot'
                        ),
                        "admin_label"	=> true
                    )
                )
            )
        );
        // Popular Destinations Carousel
        vc_map(
            array(
                'base'            => 'pop_destinations_carousel',
                'name'            => esc_html__( 'Popular Destinations Carousel', 'efora' ),
                'class'           => '',
                'icon'            => 'efora_vc_slider',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Add popular destination carousel to your content. ', 'efora' ),
                'params'          => array(
                    // Destination ID's
                    array(
                        'param_name'  => 'ids',
                        'heading'     => esc_html__( 'Destination IDs', 'efora' ),
                        'description' => esc_html__( 'Edit your destination and look into top browser; tag_ID is destination id. Separate by single comma, leave empty for all.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    )
                )
            )
        );
        // Destination List
        vc_map( array(
            "name" => esc_html__("Destination List With Icons", "efora"),
            "base" => "destination_lists",
            'icon'  => '',
            "content_element" => true,
            'as_parent'       => array( 'only' => 'destination_list' ),
            'category'        => esc_html__( 'efora', 'efora' ),
            "show_settings_on_create" => false,
            "js_view" => 'VcColumnView',
            'description'     => esc_html__( 'Add destination lists with icons to your content.', 'efora' ),
        ) );
        vc_map( array(
            "name" => esc_html__("Destination List", "efora"),
            "base" => "destination_list",
            'as_child'       => array( 'only' => 'destination_lists' ),
            "content_element" => true,
            "params" => array(
                // Heading
                array(
                    'param_name'  => 'heading',
                    'heading'     => esc_html__( 'Heading', 'efora' ),
                    'description' => esc_html__( 'Input toggle heading.', 'efora' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Caption
                array(
                    'param_name'  => 'caption',
                    'heading'     => esc_html__( 'Caption', 'efora' ),
                    'description' => esc_html__( 'Input small info text.', 'efora' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Link
                array(
                    'param_name'  => 'link',
                    'heading'     => esc_html__( 'Link', 'efora' ),
                    'description' => esc_html__( 'Input complete URL.', 'efora' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Icon
                array(
                    'param_name'  => 'image',
                    'heading'     => esc_html__( 'Icon', 'efora' ),
                    'type'        => 'attach_image'
                )

            )
        ) );
        // Destination Un-ordered List
        vc_map( array(
            "name" => esc_html__("Destination Un-ordered List", "efora"),
            "base" => "destination_un_order_lists",
            'icon'  => '',
            "content_element" => true,
            'category'        => esc_html__( 'efora', 'efora' ),
            "show_settings_on_create" => false,
            "js_view" => 'VcColumnView',
            'description'     => esc_html__( 'Add destination un-ordered list to your content.', 'efora' ),
        ) );
        // Destinations Tabs
        vc_map(
            array(
                'base'            => 'destinations_tabs',
                'name'            => esc_html__( 'Destinations Tabs', 'efora' ),
                'class'           => '',
                'icon'            => 'efora_vc_slider',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Add destination tabs to your content. ', 'efora' ),
                'params'          => array(
                    // Destination ID's
                    array(
                        'param_name'  => 'ids',
                        'heading'     => esc_html__( 'Destination IDs', 'efora' ),
                        'description' => esc_html__( 'Edit your destination and look into top browser; tag_ID is destination id. Separate by single comma, leave empty for all.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    )
                )
            )
        );
        // Discount Box
        vc_map(
            array(
                'base'            => 'discount_cta_box',
                'name'            => esc_html__( 'CTA Discount Box', 'efora' ),
                'class'           => '',
                'icon'            => '',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Add discount box to your content. ', 'efora' ),
                'params'          => array(
                    // Heading
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Heading', 'efora' ),
                        'description' => esc_html__( 'Input main heading text.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Small Caption
                    array(
                        'param_name'  => 'small_caption',
                        'heading'     => esc_html__( 'Small Caption', 'efora' ),
                        'description' => esc_html__( 'Input small caption text.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Button Text
                    array(
                        'param_name'  => 'btn_txt',
                        'heading'     => esc_html__( 'Button Text', 'efora' ),
                        'description' => esc_html__( 'Input button text.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Button Link
                    array(
                        'param_name'  => 'btn_link',
                        'heading'     => esc_html__( 'Button Link', 'efora' ),
                        'description' => esc_html__( 'Input button link.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    )
                )
            )
        );
        // Guides Carousel
        vc_map(
            array(
                'base'            => 'guides_carousel',
                'name'            => esc_html__( 'Guides Carousel', 'efora' ),
                'class'           => '',
                'icon'            => 'efora_vc_slider',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Add guides carousel to your content. ', 'efora' ),
                'params'          => array(
                    // Number Of Guides
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of Guides', 'efora' ),
                        'description' => esc_html__( 'Only numeric values, default is 5.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'efora' ),
                        'description' => esc_html__( 'Set Guides display order.', 'efora' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        "admin_label"	=> true
                    )
                )
            )
        );
        // Trending Tours Grid
        vc_map(
            array(
                'base'            => 'tren_tour_grid',
                'name'            => esc_html__( 'Trending Tours Grid', 'efora' ),
                'class'           => '',
                'icon'            => 'efora_vc_slider',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Add trending tours grid to your content. ', 'efora' ),
                'params'          => array(
                    // Number
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of Tours', 'efora' ),
                        'description' => esc_html__( 'Only numeric values, default is 6.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    )
                )
            )
        );
        // Video Box Carousel
        vc_map(
            array(
                'base'            => 'video_box',
                'name'            => esc_html__( 'Video Box', 'efora' ),
                'class'           => '',
                'icon'            => '',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Add video box with parallax background to your content. ', 'efora' ),
                'params'          => array(
                    // Video Link
                    array(
                        'param_name'  => 'link',
                        'heading'     => esc_html__( 'Video Link', 'efora' ),
                        'description' => esc_html__( 'Input youtube video link.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Video Placeholder
                    array(
                        'param_name'  => 'vid_placeholder',
                        'heading'     => esc_html__( 'Video Placeholder', 'efora' ),
                        'type'        => 'attach_image'
                    )
                )
            )
        );
        // Blog Posts
        vc_map(
            array(
                'base'            => 'blog_posts',
                'name'            => esc_html__( 'Blog Posts', 'efora' ),
                'class'           => '',
                'icon'            => 'efora_vc_blog',
                'category'        => esc_html__( 'efora', 'efora' ),
                'description'     => esc_html__( 'Use to insert blog posts to your content.', 'efora' ),
                'params'          => array(                    
                    // Number Of Posts
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of Posts', 'efora' ),
                        'description' => esc_html__( 'Only numeric values.', 'efora' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Category ID's
                    array(
                        'param_name'  => 'cat_id',
                        'heading'     => esc_html__( 'Categories', 'efora' ),
                        'description' => esc_html__( 'Select categories to display posts from.', 'efora' ),
                        'value'       => $vccatsarray,
                        'type'        => 'checkbox',
                        "admin_label"	=> true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'efora' ),
                        'description' => esc_html__( 'Set posts display order.', 'efora' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        "admin_label"	=> true
                    )
                )
            )
        );
        // Toggles
        vc_map( array(
            "name" => esc_html__("Toggles", "efora"),
            "base" => "efora_toggles",
            'icon'  => '',
            "content_element" => true,
            'as_parent'       => array( 'only' => 'efora_toggle' ),
            'category'        => esc_html__( 'efora', 'efora' ),
            "show_settings_on_create" => false,
            "js_view" => 'VcColumnView',
            'description'     => esc_html__( 'Add toggles to your content.', 'efora' ),
        ) );
        vc_map( array(
            "name" => esc_html__("Toggle Item", "efora"),
            "base" => "efora_toggle",
            'as_child'       => array( 'only' => 'efora_toggles' ),
            "content_element" => true,
            "params" => array(
                // Heading
                array(
                    'param_name'  => 'heading',
                    'heading'     => esc_html__( 'Heading', 'efora' ),
                    'description' => esc_html__( 'Input toggle heading.', 'efora' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Description
                array(
                    'param_name'  => 'content',
                    'heading'     => esc_html__( 'Description', 'efora' ),
                    'description' => esc_html__( 'Input description text.', 'efora' ),
                    'type'        => 'textarea_html'
                )

            )
        ) );
    }
    add_action( 'vc_before_init', 'efora_visual_composer_map_shortcodes' );
    // Extend container class (parents).
    if(class_exists('WPBakeryShortCodesContainer')){
        class WPBakeryShortCode_Container extends WPBakeryShortCodesContainer { }
        class WPBakeryShortCode_Destination_lists extends WPBakeryShortCodesContainer { }
        class WPBakeryShortCode_efora_toggles extends WPBakeryShortCodesContainer { }
    }
    // Extend shortcode class (children).
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_Tour_listing extends WPBakeryShortCode { }
        class WPBakeryShortCode_Pricing_table extends WPBakeryShortCode { }
        class WPBakeryShortCode_efora_faq extends WPBakeryShortCode { }
        class WPBakeryShortCode_Destination_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Feature_txt_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Pop_tour_carousel extends WPBakeryShortCode { }
        class WPBakeryShortCode_Title_block extends WPBakeryShortCode { }
        class WPBakeryShortCode_Theme_button extends WPBakeryShortCode { }
        class WPBakeryShortCode_Destinations_carousel extends WPBakeryShortCode { }
        class WPBakeryShortCode_Discount_cta_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Guides_carousel extends WPBakeryShortCode { }
        class WPBakeryShortCode_Tren_tour_grid extends WPBakeryShortCode { }
        class WPBakeryShortCode_Pop_destinations_carousel extends WPBakeryShortCode { }
        class WPBakeryShortCode_Video_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Blog_posts extends WPBakeryShortCode { }
        class WPBakeryShortCode_Destinations_tabs extends WPBakeryShortCode { }
        class WPBakeryShortCode_Destination_un_order_lists extends WPBakeryShortCode { }
    }

}

// Update Existing Elements
if ( ! function_exists( 'efora_visual_composer_update_existing_shortcodes' ) ) {
    function efora_visual_composer_update_existing_shortcodes() {
    }
    add_action( 'admin_init', 'efora_visual_composer_update_existing_shortcodes' );
}
// Incremental ID Counter for Templates
if ( ! function_exists( 'efora_visual_composer_templates_id_increment' ) ) {
    function efora_visual_composer_templates_id_increment() {
        static $count = 0; $count++;
        return $count;
    }
}