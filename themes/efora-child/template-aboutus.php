<?php
/**
 * Template Name: About Us
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
  $aboutus_heading = get_post_custom_values('heading',$page->ID);
  $company_history = get_post_custom_values('company_history',$page->ID);
  $years = get_post_custom_values('years',$page->ID);
  $employees  = get_post_custom_values('employees',$page->ID);
  $homeowners = get_post_custom_values('home_owners',$page->ID);
  $moreinformationheading = get_post_custom_values('more_information_heading',$page->ID);
  $moreinformation = get_post_custom_values('more_information',$page->ID);

  $address = get_post_custom_values('address',$page->ID);

  $email   = get_post_custom_values('email',$page->ID);

  $phoneno = get_post_custom_values('phone_no',$page->ID);

  $contactus_heading = get_post_custom_values('contact_us_heading',$page->ID);
  $contactus = get_post_custom_values('contact_us',$page->ID);

 ?>

 <style>
   .historyheading{
   	 text-align:center;
   }
</style>

 <section class="heading">
	<div  class="img d-flex align-items-center justify-content-center banner-title-bg" style="background-image:url('<?php echo $img; ?>');">
			<?php if($aboutus_heading[0] != '') { ?>
				<h1 class="text-white font-weight-semi-bold mb-0"><?php echo $aboutus_heading[0];?></h1>
			<?php } ?>
	</div>
</section>


<section class="companyhistory py-5">
   <div class="container">
   	  <div class="row">
   	  	<div class="col-md-12">
   	  		<?php echo $company_history[0]; ?>
   	  	</div>
   	  </div>
   	  <div class="row">
   	  	<div class="col-md-4 text-center mb-sm-0 mb-3">
   	  	  <?php if($years[0] != '') { ?>
            <h3 class="font-weight-bold color-blue mb-0"><?php echo $years[0] ?></h3>
            <h6 class="font-Nunito">YEARS</h6>
          <?php } ?>
   	  	</div>
   	  	<div class="col-md-4 text-center mb-sm-0 mb-3">
   	  	  <?php if($employees[0] != '') { ?>
   	  		<h3 class="font-weight-bold color-blue mb-0"><?php echo $employees[0] ?></h3>
   	  		<h6 class="font-Nunito">EMPLOYEES</h6>
          <?php } ?>
   	  	</div>
   	  	<div class="col-md-4 text-center">
   	  	  <?php if($homeowners[0] != '') { ?>
   	  		<h3 class="font-weight-bold color-blue mb-0"><?php echo $homeowners[0] ?></h3>
   	  		<h6 class="font-Nunito">HOMEOWNERS</h6>
   	  	  <?php } ?>
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
              <?php echo $email[0]; ?></h6>
            <?php } ?>
           </a>
         </div>
         <div class="col-md-4  col-12 pb-0 mb-0">
           <a href="tel:<?php echo $phoneno[0]; ?>" class="text-white">
            <i class="icon icon-telephone text-white mb-3 d-block"></i>
            <?php if(!empty($phoneno[0])){ ?>
            <h6 class="text-white font-weight-normal font-Nunito"><?php echo $phoneno[0]; ?></h6>
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



 <?php echo get_footer();?>

 <script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery(".menu-item-home").addClass("current-menu-item");
    });
 </script>