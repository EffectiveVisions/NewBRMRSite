<?php global $efora_allowedtags; ?>
<!--************************************
            Header Start
    *************************************-->
<header id="tg-header" class="tg-header tg-haslayout">
    <div class="container-fluid">
        <div class="row">
            <div class="tg-topbar">
                <nav class="tg-infonav">
                    <ul>
                        <?php $header_phone = efora_option('header_phone');
                        if(!empty($header_phone)){ ?>
                        <li>
                            <i><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-01.png" alt=""></i>
                            <span><?php echo esc_attr(efora_option('header_phone')); ?></span>
                        </li>
                        <?php } $header_feature_txt = efora_option('header_feature_txt');
                        if(!empty($header_feature_txt)){ ?>
                        <li>
                            <i><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-02.png" alt=""></i>
                            <span><?php echo wp_kses(efora_option('header_feature_txt'),array('a' => array('href' => array (),'title' => array ()))); ?></span>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
                <div class="tg-addnavcartsearch">
                    <nav class="tg-addnav">
                        <ul>
                            <?php if ( has_nav_menu( 'top-bar-menu' ) ) {
                                wp_nav_menu(array('theme_location' => 'top-bar-menu', 'container' => '', 'depth' => 0, 'items_wrap' => '%3$s'));
                            } ?>
                        </ul>
                    </nav>
                    <nav class="tg-cartsearch">
                        <ul>
                            <?php if(efora_option('hide_head_cart') != 1){ ?>
                            <li>
                                <a class="picker" href="javascript:void(0);" data-admin-url="<?php echo admin_url( 'admin-ajax.php' ) ?>">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-03.png" alt="">
                                </a>
                                <div class="tg-cartitems">
                                    <div class="tg-cartlistitems">
                                        <h3><?php esc_attr_e('Shopping Cart','efora'); ?></h3>
                                        <div class="holder">
                                            <?php global $woocommerce;
                                            if ( function_exists('WC') && ! WC()->cart->is_empty() ) {
                                                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                                    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                                    $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                                                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                                        $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                                                        $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                                        $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                                        $product_cats = wp_get_post_terms( $product_id, 'product_cat' );
                                                        ?>
                                                        <div class="tg-cartitem">
                                                            <figure class="tg-itemimg">
                                                                <?php echo wp_kses($thumbnail,$efora_allowedtags); ?>
                                                            </figure>
                                                            <div class="tg-contentbox">
                                                                <div class="tg-producthead">
                                                                    <em>x <?php echo esc_attr($cart_item['quantity']); ?></em>
                                                                    <h4>
                                                                        <a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
                                                                            <?php echo esc_attr($product_name); ?>
                                                                            <?php if($_product->is_type('tour')){
                                                                                $terms = get_the_terms($product_id, 'tour_category');
                                                                                if(is_array($terms) && count($terms) > 0){ ?>
                                                                                    <span>
                                                                                <?php $y = 1;
                                                                                foreach($terms as $ter){
                                                                                    if($y == 1){
                                                                                        echo esc_attr($ter->name);
                                                                                    } else {
                                                                                        echo ', '.esc_attr($ter->name);
                                                                                    } $y++;
                                                                                } ?>
                                                                            </span>
                                                                                <?php }
                                                                            } elseif ( $product_cats && ! is_wp_error ( $product_cats ) ){
                                                                                $single_cat = array_shift( $product_cats ); ?>
                                                                                <span><?php echo esc_attr($single_cat->name); ?></span>
                                                                            <?php } ?>
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <span><?php echo wp_kses($product_price,array('ins' => array (),'del' => array ())); ?></span>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                } ?>
                                                <div class="tg-subtotal">
                                                    <?php if ( ! WC()->cart->is_empty() ) { ?>
                                                        <h2><?php esc_attr_e('Subtotal','efora'); ?></h2>
                                                        <span><?php echo WC()->cart->get_cart_subtotal(); ?></span>
                                                    <?php } ?>
                                                </div>
                                            <?php } else { ?>
                                                <p class="black"><?php esc_html_e( 'No products in the cart.', 'efora' ); ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php if(function_exists('wc_get_cart_url')){ ?>
                                        <div class="tg-btnarea">
                                            <a class="tg-btn" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><span><?php esc_attr_e('view cart','efora'); ?></span></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </li>
                            <?php }
                            if(efora_option('topSearch') != 1){ ?>
                                <li>
                                    <a href="#tg-search">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-04.png" alt="">
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="tg-navigationarea tg-headerfixed">
                <strong class="tg-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php $default_logo = efora_option('default_logo');
                        if(!empty($default_logo)){ ?>
                            <img src="<?php echo esc_url(efora_option('default_logo')); ?>" alt="<?php bloginfo('name'); ?>">
                        <?php } else{ ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
                        <?php } ?>
                    </a>
                </strong>
                <div class="tg-socialsignin">
                    <ul class="tg-socialicons d-flex align-items-center  flex-wrap">
                        <?php $facebook = efora_option('facebook');
                        if(!empty($facebook)){ ?>
                            <li><a href="<?php echo esc_url(efora_option('facebook')); ?>"><i class="icon-facebook-logo-outline"></i></a></li>
                        <?php } $instagrame = efora_option('instagram');
                        if(!empty($instagrame)){ ?>
                            <li><a href="<?php echo esc_url(efora_option('instagram')); ?>"><i class="icon-instagram-social-outlined-logo"></i></a></li>
                        <?php } $twitter = efora_option('twitter');
                        if(!empty($twitter)){ ?>
                            <li><a href="<?php echo esc_url(efora_option('twitter')); ?>"><i class="icon-twitter-social-outlined-logo"></i></a></li>
                        <?php } $linkedin = efora_option('linkedin');
                        if(!empty($linkedin)){ ?>
                        <li><a href="<?php echo esc_url(efora_option('linkedin')); ?>"><i class="icon-linkedin-social-outline-logotype"></i></a></li>
                        <?php } $pinterest = efora_option('pinterest');
                        if(!empty($pinterest)){ ?>
                            <li><a href="<?php echo esc_url(efora_option('pinterest')); ?>"><i class="icon-pinterest-outlined-logo"></i></a></li>
                        <?php } $youtube = efora_option('youtube');
                        if(!empty($youtube)){ ?>
                            <li><a href="<?php echo esc_url(efora_option('youtube')); ?>"><i class="icon-youtube-play-button-outlined-social-symbol"></i></a></li>
                        <?php } ?>
                    </ul>
                    <?php if(efora_option('topAccount') != 1){ ?>
                    <div class="tg-userbox">
                        <a id="tg-btnsignin" class="tg-btn" href="#tg-loginsingup"><span><?php esc_attr_e('sign in','efora'); ?></span></a>
                        <?php $current_user = wp_get_current_user();
                        if($current_user){ ?>
                        <div class="dropdown tg-dropdown">
                            <button class="tg-btndropdown" id="tg-dropdowndashboard" type="button" data-toggle="dropdown">
                                <?php echo get_avatar( $current_user->ID, 35 ); ?>
                                <span><?php echo esc_attr($current_user->user_login); ?></span>
                                <i class="fa fa-caret-down"></i>
                            </button>
                            <?php
                            // Dashboard
                            $myaccount_page_url = '';
                            $myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
                            if ( $myaccount_page_id ) {
                                $myaccount_page_url = get_permalink( $myaccount_page_id );
                            } // Edit Account
                            $editaccount_page_url = '';
                            if(function_exists('wc_customer_edit_account_url')){
                                $editaccount_page_url = wc_customer_edit_account_url();
                            } ?>
                            <ul class="dropdown-menu tg-dropdownusermenu" aria-labelledby="tg-dropdowndashboard">
                                <?php if(!empty($myaccount_page_url)){ ?>
                                    <li><a href="<?php echo esc_url($myaccount_page_url); ?>"><?php esc_attr_e('Dashboard','efora'); ?></a></li>
                                <?php } if(!empty($editaccount_page_url)){ ?>
                                    <li><a href="<?php echo esc_url($editaccount_page_url); ?>"><?php esc_attr_e('Edit Profile','efora'); ?></a></li>
                                <?php } ?>
                                <li><a href="<?php echo wp_logout_url( home_url('/') ); ?>"><?php esc_attr_e('Sign Out','efora'); ?></a></li>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
                <nav id="tg-nav" class="tg-nav">
                    <div class="navbar-header">
                        <a href="#menu" class="navbar-toggle collapsed">
                            <span class="sr-only"><?php esc_attr_e('Toggle navigation','efora'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                    </div>
                    <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                        <ul>
                            <?php if ( has_nav_menu( 'primary-menu' ) ) :
                                wp_nav_menu( array( 'theme_location' => 'primary-menu','container' => '','depth' => 2,'items_wrap' => '%3$s','walker' => new efora_Menu_With_Description()) );
                            else:
                                echo '<li><a>' . esc_html__( 'Define your primary menu.', 'efora' ) . '</a></li>';
                            endif; ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!--************************************
        Header End
*************************************-->