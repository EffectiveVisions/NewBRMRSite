<?php // Styling Options
function efora_styling_typography() {
    $so = '';
    $heading_h1 = efora_option("heading_h1");
    $heading_h2 = efora_option("heading_h2");
    $heading_h3 = efora_option("heading_h3");
    $heading_h4 = efora_option("heading_h4");
    $heading_h5 = efora_option("heading_h5");
    $heading_h6 = efora_option("heading_h6");

    $d_menu_color = efora_option("d_menu_color");
    $t_menu_color = efora_option("t_menu_color");

    if(!empty($heading_h1)){
        $so .= "h1 {color: {$heading_h1};}";
    } if(!empty($heading_h2)){
        $so .= "h2 {color: {$heading_h2};}";
    } if(!empty($heading_h3)){
        $so .= "h3 {color: {$heading_h3};}";
    } if(!empty($heading_h4)){
        $so .= "h4 {color: {$heading_h4};}";
    } if(!empty($heading_h5)){
        $so .= "h5 {color: {$heading_h5};}";
    } if(!empty($heading_h6)){
        $so .= "h6 { color: {$heading_h6};}";
    }

    if(!empty($d_menu_color)){
        $so .= ".tg-navigation ul li a {color: {$d_menu_color};}";
    } if(!empty($t_menu_color)){
        $so .= ".tg-headervtwo .tg-navigation > ul > li > a {color: {$t_menu_color};}";
    }

    $default_y_color = efora_option("default_y_color");
    $default_o_color = efora_option("default_o_color");
    $body_color = efora_option("body_color");

    if(!empty($default_y_color)){
        $so .= ".tg-infonav ul li span a, .tg-socialsignin .tg-btn:hover, .tg-widgettext .tg-widgetcontent > a, .tg-footercolumn .tg-widgetcontent ul li a:hover, .tg-footercolumn .tg-widgetcontent ul li a:hover:before, .tg-headervtwo .tg-navigation ul li a:hover, .tg-headervtwo .tg-navigation ul li.current-menu-item > a, .tg-trendingtrip figcaption .tg-pricearea h4, .tg-totaltours, .tg-btnviewall, .tg-search .tg-destinations li a em, .tg-addnav ul li:hover a, .tg-breadcrumb li:hover a { color: {$default_y_color} !important;}";
        $so .= ".tg-socialsignin .tg-btn, .tg-navigation ul li a:before, .tg-btnvtwo:before, .tg-themetabsvtwo .tg-themetabnav li a:before, .tg-btnaddtocart, .tg-btndropdown, .tg-topdestination figure .tg-btnviewall:before, .tg-availhead, .navbar-header, .tg-btnroundprev:hover, .tg-btnroundnext:hover { background: {$default_y_color} !important;}";
        $so .= "blockquote, .tg-btnroundprev:hover, .tg-btnroundnext:hover { border-color: {$default_y_color} !important;}";
    }
    if(!empty($default_o_color)){
        $so .= "a, p a, p a:hover, a:hover, a:focus, a:active, .tg-stars span:after, .tg-btn:hover, .tg-featuretitle h2 span, .tg-populartourtitle h3 a:hover, .tg-pricearea h4, .tg-destinations li a:hover h3, .tg-guidecontenthead h4:hover a, .tg-bgdark .tg-destinations li a em, .tg-panel h4:hover, .tg-panel h4.active, .tg-contactinfoicon, .tg-contactinfoicon i, .tg-dropdownusermenu li a:hover, .tg-newcontent .tg-pricearea h4, .tg-widget.tg-widgetcatagories ul li:hover a, .tg-widget.tg-widgetcatagories ul li:hover:before, .tg-formicon i, .tg-bookingtabs .tg-themetabnav li:hover a span, .tg-bookingtabs .tg-themetabnav li.active a span, .tg-liststyle li:before, .tg-btnedit, .tg-widgetpersonprice ul li .tg-totalpayment em, .tg-widgetdashboard ul li:hover a, .tg-widgetdashboard ul li:hover a i, .tg-widgetdashboard ul li.selected a, .tg-widgetdashboard ul li.selected i, .tg-subtotal span, .tg-reply:hover, .tg-prevpost a:hover h2, .tg-nextpost a:hover h2, .tg-socialicons li a:hover i, .location_indicator:before,
         .tg-totalprice.order-total .woocommerce-Price-amount.amount ,.tg-totalprice.order-total .woocommerce-Price-amount.amount span,.woocommerce-info::before,
          .tg-btn:hover span,.tg-product.tgProduct .tg-pricearea .woocommerce-Price-amount,.tg-product.tgProduct .tg-pricearea del span{ color: {$default_o_color} !important;}";
        $so .= ".woocommerce input.button.tg-btn, .woocommerce-message .woocommerce-Button.button, .woocommerce-Message .woocommerce-Button.button,.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
         .woocommerce .shipping-calculator-form button.button, .woocommerce .return-to-shop a.button,.tg-btn, .tg-descount, .tg-formnewsletter button, .tg-locationname, .tg-btnplay, .tg-findtourvfour, .tg-btntoggleform, .tg-pagination ul li.tg-active a, .tg-pagination ul li a:hover, .tg-select .dropdown-menu>.active>a, .tg-select .dropdown-menu>.active>a:focus, .tg-select .dropdown-menu>.active>a:hover, .tg-select .dropdown-menu.inner li a:hover, .tg-bookingtabs .tg-themetabnav li:hover a:before, .tg-bookingtabs .tg-themetabnav li.active a:before, .tg-couponapply .form-group .tg-btn:hover, .tg-widgetpersonprice ul li .tg-btn, .tg-dashboardcontent table tr .tg-btnview:hover, .tg-fulltourdetail .tg-totalprice .tg-totalpayment, .tg-imgholder .tg-btn:hover, .tg-btnarea .tg-btn, .tg-pkgplanfoot .tg-btn:hover, .tg-btnaddtocart:hover, .tg-formleavecomment .tg-btn,
          .woocommerce input.button,.tg-formsubscribe .form-group input[type='submit'],
           .tg-pagination ul li span { background: {$default_o_color} !important;}";
        $so .= ".woocommerce-info,input:focus, .select select:focus, .form-control:focus, .tg-reply:hover { border-color: {$default_o_color} !important;}";
        $so .= ".woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
        .woocommerce #payment #place_order, .woocommerce-page #payment #place_order,.tg-btn,.tg-btn:hover,
         .tg-select .bootstrap-select.btn-group .dropdown-menu.inner li.active span,.tg-select .bootstrap-select.btn-group .dropdown-menu.inner li:hover a,
         .tg-formbookingdetail .tg-btn:hover,.tg-formbookingdetail .tg-btn:hover span,.tg-btnplay,.tg-dashboardcontent table tr .tg-btnview:hover,
          .woocommerce .wishlist_table td.product-add-to-cart a:hover,.tg-pagination ul li a:hover,.tg-formlogin .tg-btn:hover,.tg-formlogin .tg-btn:hover span,
           .tg-pagination ul li.tg-active a {color: #fff !important;}";
    }
    if(!empty($body_color)){
        $so .= "body,p { color: {$body_color} !important;}";
    }

    $footer_default_bg = efora_option("footer_default_bg");
    $footer_default_color = efora_option("footer_default_color");

    if(!empty($footer_default_bg)){
        $so .= ".tg-footer { background: {$footer_default_bg} !important;}";
    } if(!empty($footer_default_color)){
        $so .= ".tg-footer,.tg-footercolumn .tg-widgettitle h3,.tg-footer p, .tg-footer a{ color: {$footer_default_color} !important; }";
    }

    $links_normal = efora_option("links_normal");
    $links_hover = efora_option("links_hover");

    if(!empty($links_normal)){
        $so .= "a { color: {$links_normal};}";
    } if(!empty($links_hover)){
        $so .= "a:hover,a:focus { color: {$links_hover};}";
    }

    // Typography
    $heading_font = efora_option("headings_font_face");
    $heading_weight = efora_option("headings_font_weight");
    $meta_font = efora_option("meta_font_face");
    $meta_weight = efora_option("meta_font_weight");
    $body_font = efora_option("body_font_face");
    $body_weight = efora_option("body_font_weight");

    $body_size = intval(efora_option("body_font_size"));
    $h1_size = intval(efora_option("h1_font_size"));
    $h2_size = intval(efora_option("h2_font_size"));
    $h3_size = intval(efora_option("h3_font_size"));
    $h4_size = intval(efora_option("h4_font_size"));
    $h5_size = intval(efora_option("h5_font_size"));
    $h6_size = intval(efora_option("h6_font_size"));
    $menu_size = intval(efora_option("menu_font_size"));
    if(!empty($heading_font)){
        $so .= "h1,h2,h3 {
            font-family: {$heading_font} !important;
            font-weight: {$heading_weight} !important;
        }";
    } if(!empty($meta_font)){
        $so .= "h4,h5,h6,footer h5,.heading-side-bar h4 {
            font-family: {$meta_font};
            font-weight: {$meta_weight};
        }";
    } if(!empty($body_font)){
        $so .= "html,body,p,.tg-navigation ul li,.tg-headervtwo .tg-navigation > ul > li,.mm-listview, .mm-listview>li {
            font-family: {$body_font} !important;
            font-weight: {$body_weight};
        }";
    }

    if(!empty($body_size)){
        $so .= "body,p {
            font-size: {$body_size}px;
        }";
    } if(!empty($h1_size)){
        $so .= "h1 {
            font-size: {$h1_size}px;
        }";
    } if(!empty($h2_size)){
        $so .= "h2 {
            font-size: {$h2_size}px;
        }";
    } if(!empty($h3_size)){
        $so .= "h3 {
            font-size: {$h3_size}px;
        }";
    } if(!empty($h4_size)){
        $so .= "h4 {
            font-size: {$h4_size}px;
        }";
    } if(!empty($h5_size)){
        $so .= "h5 {
            font-size: {$h5_size}px;
        }";
    } if(!empty($h6_size)){
        $so .= "h6 {
            font-size: {$h6_size}px;
        }";
    }

    if(!empty($menu_size)){
        $so .= ".tg-navigation ul li,.tg-headervtwo .tg-navigation > ul > li,.mm-listview, .mm-listview>li {
            font-size: {$menu_size}px;
        }";
    }
    return $so;
}
// Adding Theme Options Styles
function efora_theme_options_css(){
    $custom_css = '';
    if(is_404()){
        $bg_404 = efora_option('background404');
        if(!empty($bg_404)){
            $custom_css .= '.tg-404errorpage { background: url('.esc_url(efora_option('background404')).') no-repeat center center fixed; }';
        }
    }
    return $custom_css;
}
function efora_theme_options_styles() {
    $custom_css = '';
    $custom_css .= efora_styling_typography();
    $custom_css .= efora_theme_options_css();
    wp_add_inline_style( 'efora-root-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'efora_theme_options_styles' );
// Theme Options JS
function efora_theme_options_js(){
    $custom_js = efora_option("custom_js");
    return $custom_js;
}
// Coming Soon JS
function efora_coming_soon_js(){
    $coming_js = '';
    $launch_date = efora_get_field('launch_date_coming');
    if(is_page_template('page-template-coming.php') && !empty($launch_date)){
        $coming_js .= "jQuery('#tg-cscounter').countdown('".efora_get_field('launch_date_coming')."', function(event) {"; // Year/Month/Day
		$coming_js .= "var jQuerythis = jQuery(this).html(event.strftime('";
		$coming_js .= '<div class="tg-counterholder"><span>%-D</span><span>'.esc_attr__('days','efora').'</span></div>';
        $coming_js .= '<div class="tg-counterholder"><span>%H</span><span>'.esc_attr__('hours','efora').'</span></div>';
		$coming_js .= '<div class="tg-counterholder"><span>%M</span><span>'.esc_attr__('mins','efora').'</span></div>';
		$coming_js .= '<div class="tg-counterholder"><span>%S</span><span>'.esc_attr__('secs','efora').'</span></div>';
		$coming_js .= "'));";
		$coming_js .= "});";
    }
    return $coming_js;
}
function efora_theme_all_custom_scripts() {
    $custom_js = '';
    $custom_js .= efora_theme_options_js();
    $custom_js .= efora_coming_soon_js();
    wp_add_inline_script( 'efora-custom-scripts', $custom_js );
}
add_action( 'wp_enqueue_scripts', 'efora_theme_all_custom_scripts' );