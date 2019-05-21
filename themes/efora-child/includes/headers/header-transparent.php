<?php global $efora_allowedtags; ?>
<!--************************************
				Header Start
		*************************************-->
<header id="tg-header" class="tg-header tg-headervtwo tg-headerfixed tg-haslayout">
    <div class="container-fluid">
        <div class="row">
            <?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false): ?>
            <strong class="tg-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php $transparent_logo = efora_option('transparent_logo');
                    if(!empty($transparent_logo)){ ?>
                        <img src="<?php echo esc_url(efora_option('transparent_logo')); ?>" alt="<?php bloginfo('name'); ?>">
                    <?php } else{ ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo2.png" alt="<?php bloginfo('name'); ?>">
                    <?php } ?>
                </a>
            </strong>
        <?php endif; ?>
            <nav class="tg-infonav">
                <ul>
                    <?php $header_phone = efora_option('header_phone');
                    if(!empty($header_phone)){ ?>
                    <li>
                        <i>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-01.png" alt="">
                        </i>
                        <span><?php echo esc_attr(efora_option('header_phone')); ?></span>
                    </li>
                    <?php } if(efora_option('topAccount') != 1){ ?>
                    <li>
                        <?php $current_user = wp_get_current_user();
                        if(is_user_logged_in()){ ?>
                            <a id="tg-btnsignin" href="javascript:void(0);"><?php echo esc_attr($current_user->user_login); ?></a>
                        <?php } else{ ?>
                            <a id="tg-btnsignin" href="#tg-loginsingup"><?php esc_attr_e('sign in','efora'); ?></a>
                        <?php } ?>
                    </li>
                    <?php } if(efora_option('hide_head_cart') != 1){ ?>
                    <li>
                        <a class="picker" href="javascript:void(0);" data-admin-url="<?php echo admin_url( 'admin-ajax.php' ) ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-03.png" alt="">
                        </a>
                        <div class="tg-cartitems adj-img">
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
            <div class="tg-navigationarea">
                <div class="tg-navigationholder">
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
                    <ul class="tg-socialicons">
                        <?php $facebook = efora_option('facebook');
                        if(!empty($facebook)){ ?>
                            <li><a href="<?php echo esc_url(efora_option('facebook')); ?>"><i class="icon-facebook-logo-outline"></i></a></li>
                        <?php } $instagram = efora_option('instagram');
                        if(!empty($instagram)){ ?>
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
                </div>
            </div>
        </div>
    </div>
</header>
<!--************************************
        Header End
*************************************-->