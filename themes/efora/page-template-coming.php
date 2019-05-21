<?php
/*
 * Template Name: Coming Soon
 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-image="<?php echo esc_url(efora_get_field('background_image_coming')); ?>">
<!--[if lt IE 8]>
<p class="browserupgrade"><?php esc_attr_e('You are using an outdated browser. Please upgrade your browser to improve your experience.','efora'); ?></p>
<![endif]-->
<!--************************************
            Loader Start
*************************************-->
<div class="loader">
    <div class="span">
        <div class="location_indicator"></div>
    </div>
</div>
<!--************************************
            Loader End
*************************************-->
<!--************************************
        Wrapper Start
*************************************-->
<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
    <!--************************************
            Main Start
    *************************************-->
    <main id="tg-main" class="tg-main tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-xs-offset-0 col-sm-12 col-sm-offset-0 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                    <div class="tg-comingsooncontent">
                        <?php $main_heading_coming = efora_get_field('main_heading_coming');
                        if(!empty($main_heading_coming)){ ?>
                            <h2><?php echo esc_attr(efora_get_field('main_heading_coming')); ?></h2>
                        <?php } $launch_date_coming = efora_get_field('launch_date_coming');
                        if(!empty($launch_date_coming)){ ?>
                            <div id="tg-cscounter" class="tg-cscounter"></div>
                        <?php } $form_heading_coming = efora_get_field('form_heading_coming');
                        if(!empty($form_heading_coming)){ ?>
                            <div class="tg-description">
                                <p><?php echo esc_attr(efora_get_field('form_heading_coming')); ?></p>
                            </div>
                        <?php } $form_shortcode_coming = efora_get_field('form_shortcode_coming');
                        if(!empty($form_shortcode_coming)){ ?>
                            <div class="tg-formtheme tg-formsubscribe">
                                <div class="form-group">
                                    <?php echo do_shortcode(efora_get_field('form_shortcode_coming')); ?>
                                </div>
                            </div>
                        <?php } ?>
                        <ul class="tg-socialicons">
                            <?php $facebook_coming = efora_get_field('facebook_coming');
                            if(!empty($facebook_coming)){ ?>
                                <li>
                                    <a href="<?php echo esc_url(efora_get_field('facebook_coming')); ?>">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/iconw-05.png" alt="">
                                    </a>
                                </li>
                            <?php } $instagram_coming = efora_get_field('instagram_coming');
                            if(!empty($instagram_coming)){ ?>
                                <li>
                                    <a href="<?php echo esc_url(efora_get_field('instagram_coming')); ?>">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/iconw-06.png" alt="">
                                    </a>
                                </li>
                            <?php } $twitter_coming = efora_get_field('twitter_coming');
                            if(!empty($twitter_coming)){ ?>
                                <li>
                                    <a href="<?php echo esc_url(efora_get_field('twitter_coming')); ?>">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/iconw-07.png" alt="">
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--************************************
            Main End
    *************************************-->

</div>
<!--************************************
        Wrapper End
*************************************-->
<?php wp_footer(); ?>
</body>
</html>