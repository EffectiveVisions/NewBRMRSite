<!--************************************
            Footer Start
    *************************************-->
<footer id="tg-footer" class="tg-footer tg-haslayout">
    <div class="tg-fourcolumns">
        <div class="container">
            <div class="row">
                <?php if ( is_active_sidebar( 'footer-s1' ) ) { ?>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <div class="tg-footercolumn tg-widget tg-widgettext">
                        <?php dynamic_sidebar( 'footer-s1' ); ?>
                    </div>
                </div>
                <?php } if ( is_active_sidebar( 'footer-s2' ) ) { ?>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <div class="tg-footercolumn tg-widget tg-widgeteforanews">
                        <?php dynamic_sidebar( 'footer-s2' ); ?>
                    </div>
                </div>
                <?php } if ( is_active_sidebar( 'footer-s3' ) ) { ?>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <div class="tg-footercolumn tg-widget tg-widgetdestinations">
                        <?php dynamic_sidebar( 'footer-s3' ); ?>
                    </div>
                </div>
                <?php } if ( is_active_sidebar( 'footer-s4' ) ) { ?>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <div class="tg-footercolumn tg-widget tg-widgetnewsletter">
                        <?php dynamic_sidebar( 'footer-s4' ); ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php $footer_copyright = efora_option('footer_copyright');
    if(!empty($footer_copyright)){ ?>
    <div class="tg-footerbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p><?php echo esc_attr(efora_option('footer_copyright')); ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</footer>
<!--************************************
        Footer End
*************************************-->
</div>
<!--************************************
        Wrapper End
*************************************-->
<!--************************************
        Search Start
*************************************-->
<?php get_template_part('includes/search','overlay'); ?>
<!--************************************
        Search End
*************************************-->
<!--************************************
        Login Singup Start
*************************************-->
<?php get_template_part('includes/template','signin'); ?>
<!--************************************
        Login Singup End
*************************************-->
<?php wp_footer(); ?>
</body>

</html>