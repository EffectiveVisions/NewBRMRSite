<?php get_header();
global $efora_allowedtags;
?>
    <!--************************************
            Main Start
    *************************************-->
    <main id="tg-main" class="tg-main tg-haslayout">
        <div class="tg-404error">
            <div class="container">
                <div class="row">
                    <div class="tg-404errorcontent">
                        <?php $error_404 = efora_option('error_404');
                        if(!empty($error_404)){
                            echo wp_kses(efora_option('error_404'),$efora_allowedtags);
                        } else{ ?>
                            <h1><?php esc_attr_e('404','efora'); ?></h1>
                            <h2><?php esc_attr_e('Page not Found','efora'); ?></h2>
                            <div class="tg-description">
                                <p><?php esc_attr_e('Sorry but the page that you are looking for does not exist...','efora'); ?></p>
                            </div>
                            <a class="tg-btn" href="<?php echo esc_url(home_url('/')); ?>"><span><?php esc_attr_e('go back to home','efora'); ?></span></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--************************************
            Main End
    *************************************-->
<?php get_footer(); ?>