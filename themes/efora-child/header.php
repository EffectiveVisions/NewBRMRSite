<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />          
    <?php wp_head(); ?>    
</head>
<body <?php body_class(); ?>>
 <div class="custome-loader row mx-0 align-items-center justify-content-center">
  <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
</div>   
<!--[if lt IE 8]>
<p class="browserupgrade"><?php esc_attr_e('You are using an outdated browser. Please upgrade your browser to improve your experience.','efora'); ?></p>
<![endif]-->
<?php if(efora_option('disableLoader') != 1){ ?>
<!--************************************
            Loader Start
*************************************-->

<div class="loader theme-loader">
    <div class="span">
        <?php $preloader = efora_option('preLoader');
        if(!empty($preloader)){ ?>
            <img src="<?php echo esc_url(efora_option('preLoader')); ?>" alt="<?php bloginfo('name'); ?>" />
        <?php } else{ ?>
            <div class="location_indicator"></div>
        <?php } ?>
    </div>
</div>

<!--************************************
            Loader End
*************************************-->
<?php } ?>
<!--************************************
        Mobile Menu Start
*************************************-->
<?php get_template_part('includes/headers/mobile','nav'); ?>
<!--************************************
        Mobile Menu End
*************************************-->
<!--************************************
        Wrapper Start
*************************************-->
<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
    <!-- Header/Menu Style -->
    <?php
    if(is_home() || is_tag() || is_404() || is_author() || is_date() || is_day() || is_year() || is_month() || is_time() || is_search() || is_attachment()){
        $header_menu_style = efora_option('header_menu_type');
    } else {
        $header_menu_style = efora_get_field('header_menu_style');
    }
    if($header_menu_style == 'transparent-menu'){
        get_template_part('includes/headers/header','transparent');
    } else {
        get_template_part('includes/headers/header','default');
    } ?>
    <!-- Banners -->
    <?php $banner_type = efora_get_field('banner_type');
if($banner_type == 'parallax-breadcrumb'){
    get_template_part('includes/banners/banner','parallax');
} elseif($banner_type == 'style-one'){
    get_template_part('includes/banners/banner-home','one');
} elseif($banner_type == 'style-two'){
    get_template_part('includes/banners/banner-home','two');
} elseif($banner_type == 'style-three'){
    get_template_part('includes/banners/banner-home','three');
} elseif($banner_type == 'style-four'){
    get_template_part('includes/banners/banner-home','four');
} elseif($banner_type == 'style-five'){
    get_template_part('includes/banners/banner-home','five');
} if ( get_header_image() ) : ?>
    <div class="clear clearfix"></div>
    <div id="site-header">
        <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo('name'); ?>">
    </div>
    <div class="clear clearfix"></div>
<?php endif; ?>

