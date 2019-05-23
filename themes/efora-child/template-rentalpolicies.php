<?php
/**
 * Template Name: Rental Policies
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
   $rental_heading = get_post_custom_values('heading',$page->ID);
   $section_title  = get_post_custom_values('section_heading',$page->ID);
   $section_desc   = get_post_custom_values('section_content',$page->ID);

   $policies = get_field('policies',$page->ID);
 ?>

<section class="heading rental-policy-heading">
   <div class="img d-flex align-items-center justify-content-center banner-title-bg" style="background-image:url('<?php echo $img; ?>'); ">
   	<?php if($rental_heading[0] != '') { ?>
      <h1 class="text-white font-weight-semi-bold mb-0"><?php echo $rental_heading[0];?></h1>
   	<?php } ?>
   </div>
</section>

<section class="bg-light d-inline-block w-100">
	<div  class="container policysec position-relative">
		<div class="propertyinfo pt-md-5 pt-4 mt-2">
			<div class="row">
				<?php if($section_title[0] != '') { ?>
					<div  class="text-center w-100 d-inline-block px-3">
						<h2 class="text-blue font-weight-light-bold line-height-normal"><?php echo $section_title[0]; ?></h2>
					</div>
				<?php } ?>
			<?php if($section_desc[0] != '') { ?>
				<div class="pt-lg-3 pt-2 d-inline-block w-100 mb-lg-4 px-3">
					<p class="mb-0 font-15 font-Nunito text-center text-black"><?php echo $section_desc[0]; ?></p>
				</div>
			<?php } ?>
			</div>
		</div>
		<div class="policiesdetail   border-dotted mt-5 d-inline-block w-100 position-relative">
		  <?php if($policies) { $count = 1; ?>
		   <?php foreach ($policies as $rental_policies) { ?>
			<div  class="row pb-lg-4 pb-3 policy-inner-sec hidden-text position-relative">
				<div  class="col-lg-5 col-12 position-static  pb-lg-2">
					<div class="mr-lg-5 px-xl-4 px-lg-3">
	             		<h4 class="text-black font-weight-light-bold d-flex text-uppercase rental-policies-heding"><span class="mr-2"><?php echo $count; ?>.</span> <span><?php echo $rental_policies['name'] ?></span></h4>
	             	</div>
				</div>
				<div class="col-lg-7 col-12 pb-lg-2">
					<div class="font-Nunito font-15 text-black w-100 d-inline-block rental-policies-dis"><?php echo $rental_policies['description']?></div>
				</div>
			</div>

		     <?php $count++; } ?>
		   <?php } ?>
		</div>
	   <div class="text-center readmore my-lg-5 py-lg-4 d-inline-block w-100 mt-3 mb-4 pb-3">
			<div class="col-md-12">
				 <a class="btn btn-primary text-uppercase font-14 font-weight-light-bold custome-explore-btn  text-white readmorebtn readmorebtn-rental">Read More</a>
			</div>  
		</div>
	</div>
</section>


<script>
	jQuery(document).ready(function(){
        jQuery('.readmorebtn').click(function(){
        	 jQuery('.policy-inner-sec').toggleClass('hidden-text');
        	console.log(jQuery(this).text());
          if(jQuery(this).text()=="Read More"){
            jQuery(this).text("Less");
          }else{
          	jQuery('html, body').animate({scrollTop: "0px"}, 800);
            jQuery(this).text("Read More");

          }
        })
	});
</script>





 <?php echo get_footer();?>