<!--************************************
            Footer Start
    *************************************-->

    <footer ng-controller="PropertyController as pCtrl" id="mainfooter">
    <div class="footer1 mt-5 mb-4 pb-2 pt-sm-5 pt-1">
       <div class="container">
          <div class="row">
             <?php if ( is_active_sidebar( 'footer-s1' ) ) { ?>
                 <div class="col-md-12 col-lg-6 border-right pb-lg-5 pb-3 pt-1 mb-lg-0 mb-2">
                    <?php dynamic_sidebar( 'footer-s1' ); ?>
                 </div>
               <?php }if ( is_active_sidebar( 'footer-s2' ) ) { ?>
                 <div class="col-md-12 col-lg-6 pl-lg-4 pb-lg-5 pb-2 pt-4">
                    <?php dynamic_sidebar( 'footer-s2' ); ?>
                 </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="footer2 bg-black text-center py-3">
       <div class="container">
          <div class="row">
             <div class="col-md-12">
              <?php $footer_copyright = get_field("footer_copyright_text","option");
                  if(!empty($footer_copyright)){ ?>
                       <p class="f-14 mb-0 text-white mb-0 font-Nunito">
                          <?php echo $footer_copyright; ?>
                       </p>
                <?php } ?>
            </div>
          </div>
       </div>
    </div>
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
