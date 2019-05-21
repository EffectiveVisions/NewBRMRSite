<?php
/**
 * Template Name: Privacy Policies
 * The template for displaying pages
 *
 * This is the template that displays all resortpro listings by default.
 * You can override this template by creating your own "my_theme/template/front-page.php" file
 *
 * @package    ResortPro
 * @since      v1.0
 */ ?>

 <?php echo get_header(); 
        $page = get_page(get_the_ID());
       $img = get_the_post_thumbnail_url($page->ID,'full'); 
      $heading = get_the_title( $page->ID );
 ?>


<section class="heading privacy-policy-heading">
   <div class="img d-flex align-items-center justify-content-center banner-title-bg" style="background-image:url('<?php echo $img; ?>'); ">
   	<?php if($heading != '') { ?>
      <h1 class="text-white font-weight-semi-bold mb-0"><?php echo $heading;?></h1>
    <?php } ?>
   </div>
</section>


<section class="policydescription mt-md-5 mt-4 pt-md-1  pt-2 text-center text-lg-left mobile-font">
     <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

             <?php the_content(); ?>

         <?php endwhile; ?>

      <?php endif; ?>
</section>


 <?php echo get_footer();?>



 
