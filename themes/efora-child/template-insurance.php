<?php
/**
 * Template Name: Insurance
 * The template for displaying pages
 *
 * This is the template that displays all resortpro listings by default.
 * 
 *
 * @package    ResortPro
 * @since      v1.0
 */ ?>

 <?php get_header(); 
     $page = get_page(get_the_ID());
   $img = get_the_post_thumbnail_url($page->ID,'full'); 
   $insurance_heading = get_post_custom_values('heading',$page->ID);
   $trip_insurance_title  = get_post_custom_values('trip_insurance_heading',$page->ID);
   $trip_insurance_desc   = get_post_custom_values('trip_insurance_description',$page->ID);
   $trip_insurance_image  = get_field('trip_insurance_image',$page->ID);
   $damage_protection_title = get_post_custom_values('damage_protection_heading',$page->ID);

   $damage_protection_desc = get_post_custom_values('damage_protection_description',$page->ID);

   $damage_protection_image = get_field('damage_protection_image',$page->ID);

   $moreinformationheading = get_post_custom_values('more_information_heading',$page->ID);
  $moreinformation = get_post_custom_values('more_information_description',$page->ID);

  $address = get_post_custom_values('address',$page->ID);

  $email   = get_post_custom_values('email',$page->ID);

  $phoneno = get_post_custom_values('phone_no',$page->ID);

  $contactus_heading = get_post_custom_values('contact_us_heading',$page->ID);
   


 ?>

<section class="heading insurance-heading">
  <div class="img d-flex align-items-center justify-content-center banner-title-bg" style="background-image: url('<?php echo $img; ?>');">
    <h1 class="text-white font-weight-semi-bold mb-0"><?php echo $insurance_heading[0];?></h1>
  </div>
</section>

<section class="insurancedetail py-lg-5 pt-5 pb-4 mt-lg-4 mb-lg-5 mb-3">
	<div class="container">
		<div class="row">
	        <div class="col-lg-6 col-12 order-lg-2 order-1">
		        <?php if($trip_insurance_image['url'] != '') { ?>
		          <figure class="w-100 insurance-img mb-0 pl-lg-2">
		            <img src="<?php echo $trip_insurance_image['url'] ?>"  class="w-100 h-100 object-fit" alt="img"/>
		          </figure>
		        <?php } ?>
	        </div>
			<div class="col-lg-6  col-12 order-lg-1 order-2 mt-lg-0 mt-4">
			  <?php if($trip_insurance_title[0] != '') { ?>
				<h2 class="font-weight-light-bold text-blue"><?php echo $trip_insurance_title[0] ?></h2>
			  <?php } ?>
			  <?php if($trip_insurance_desc[0] != '') { ?>
				  <div class="trip_insurance_desc font-Nunito font-15 font-weight-semi-bold pr-lg-4">
				  	  <?php echo $trip_insurance_desc[0] ?>
				  </div>
			  <?php } ?>
			  <div class="readmoretrip mt-lg-5 mt-3">
			  	  <a target="_blank" href="http://trippreserver.com/mountain-trip.html" class="btn btn-primary text-uppercase font-14 font-weight-light-bold insurance-read-more py-0 readmoretripbtn mt-3">Read More</a>
			  </div>
			</div>
		</div>
		<div class="row mt-5 pt-3">
			<div class="col-lg-6 col-12">
				<?php if($damage_protection_image['url'] != '') { ?>
					<figure class="w-100 insurance-img mb-0 pr-lg-4">
						<img src="<?php echo $damage_protection_image['url'] ?>" class="w-100 h-100 object-fit" alt="img"/>
					</figure>
				<?php } ?>
			</div>
			<div class="col-lg-6 col-12  pl-lg-4 mt-lg-0 mt-4">
			   <?php if($damage_protection_title[0] != '') { ?>
				<h2 class="font-weight-light-bold text-blue"><?php echo $damage_protection_title[0] ?></h2>
			  <?php } ?>
				<?php if($damage_protection_desc[0]){ ?>
				 <div class="trip_insurance_desc font-Nunito font-15 font-weight-semi-bold pr-lg-4">
				 	 <?php echo $damage_protection_desc[0] ?>
				 </div>
				<?php  } ?>
			</div>
		</div>
	</div>
</section>





<section class="contactus  theme-bg-color py-md-5 py-4">
  <div class="container py-3">
          <div class="row text-center">
         <div class="col-lg-10 col-md-12 pb-md-5 pb-4 mb-3 m-auto">
           <?php if($moreinformationheading[0] != ''){ ?>
              <h2 class="text-white font-weight-light-bold"><?php echo $moreinformationheading[0] ?></h2>
           <?php } ?>
           <?php if($moreinformation[0] != ''){ ?>
              <h6 class="text-white font-18"><?php echo $moreinformation[0] ?></h6>
           <?php } ?>
         </div>
      </div>
        <div class="row text-center footer-contact mt-2">
         <div class="col-md-4 col-12 pb-md-0 pb-5 mb-3 mb-md-0">
             <i class="icon icon-location-mark text-white mb-3 d-block"></i>
             
            <?php if(!empty($address[0])){ ?>
            <h6 class="text-white font-weight-normal font-Nunito"><?php echo $address[0]; ?></h6>
            <?php } ?>
         </div>
         <div class="col-md-4 col-12 pb-md-0 pb-5 mb-3 mb-md-0">
           <a class="text-white" href="mailto:<?php echo $email[0]; ?>">
            <i class="icon icon-email-outline-dark text-white mb-3 d-block"></i>
            <?php if(!empty($email[0])){ ?>
            <h6 class="text-white font-weight-normal font-Nunito">
               <?php echo $email[0]; ?>
            </h6>
            <?php } ?>
           </a>
           
         </div>
         <div class="col-md-4  col-12 pb-0 mb-0">
          <a href="tel:1-800-237-7975" class="text-white">
            <i class="icon icon-telephone text-white mb-3 d-block"></i>
            <?php if(!empty($phoneno[0])){ ?>
            <h6 class="font-weight-normal font-Nunito text-white"><?php echo $phoneno[0]; ?></a></h6>
            <?php } ?>
          </a>
         </div>
      </div>
  </div>
</section>

<section id="contactus" class="requestForm requestForm-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="iinner-div w-100  bg-white shadow-sm requestForm-container d-inline-block pt-5 pb-md-2 pb-sm-4 pb-1">
            <div class="text-sm-center px-3 px-sm-0 w-100 d-inline-block">
              <h4 class="font-weight-semi-bold mb-sm-4 mb-3 text-center always-head pb-lg-3">
                <?php if($contactus_heading[0]){ ?><?php echo $contactus_heading[0] ?> <?php } ?>
              </h4>
            </div>
            <div class="requestform-form mt-0">
              <?php echo do_shortcode('[formidable id="10"]'); ?>
            </div>
              </div>
      </div>
    </div>
  </div>
</section>



 <?php get_footer(); ?>

 <script>
    jQuery(document).ready(function(){
       jQuery(".menu-item-home").addClass("current-menu-item");
    });
 </script>