<?php
/**
 * Template Name: Discount
 * The template for displaying pages
 *
 * This is the template that displays all resortpro listings by default.
 * 
 *
 * @package    ResortPro
 * @since      v1.0
 */ ?>

 <?php 

    echo get_header(); 

    $page                 = get_page(get_the_ID());

	$img                  = get_the_post_thumbnail_url($page->ID,'full');

	$discountheader       = get_post_custom_values('discount_header',$page->ID); 
	$discountsubheader    = get_post_custom_values('discount_subheader',$page->ID);
	$specialpackageheader =  get_post_custom_values('special_package_header',$page->ID);
	$our_gallery_header   =  get_post_custom_values('our_gallery_header',$page->ID);
	$featured_properties_header = get_post_custom_values('featured_properties_header',$page->ID);
	$your_dream_home_text = get_post_custom_values('your_dream_home_text',$page->ID);
	$your_dream_home_subtext = get_post_custom_values('your_dream_home_sub_text',$page->ID);
	$contact_us_heading     = get_post_custom_values('contact_us_heading',$page->ID);
    $address               = get_post_custom_values('address',$page->ID);
    $email                 = get_post_custom_values('email',$page->ID);
    $phoneno               = get_post_custom_values('phone_no',$page->ID);

 ?>


   <section class="heading rental-policy-heading">
	   <div class="img d-flex flex-wrap align-items-center justify-content-center py-5" style="background-image:url('<?php echo $img; ?>'); background-size:cover;">
	   	

	   	<div class="py-md-5 my-md-5">
	   	<?php if($discountheader[0] != '') { ?>
	      <h1 class="text-white font-weight-semi-bold mb-0 w-100 text-center"><?php echo $discountheader[0];?></h1>
	   	<?php } ?>
	    <?php if($discountsubheader[0] != '') { ?>
	      <p class="text-white w-100 text-center h4 font-weight-normal"><?php echo $discountsubheader[0] ?></p>
	   	<?php } ?>
	   </div>
	   
	   </div>
   </section>



   <section class="blogSection gallerySection py-3 d-none discount-gallery" ng-controller="PropertyController as pCtrl">
        <div class="row">
	         <div class="col-12 py-sm-4 pt-4 pb-3 text-center">
	            <h2 style="color:#0061a3;" class="mb-0 f-property-heading"> Featured Properties Gallery </h2>
	         </div>
	    </div>

       <div class="row pt-1 m-0">
		   


		   <div class="col-md-3">
		      
		         
		       
		            <div class="col-12 custome-padding-gallery h-50 px-0">
		               <figure class="blog-image position-relative overflow-h w-100 d-none h-100 m-0 pb-2">
		                  <img imageonloadgallery class="object-fit h-100 w-100" ng-src="{[propertiesObj[0].default_thumbnail_path]}" alt=""> 
		                  <a id="0" class="galleryopen" href="javascript:void(0)">
		                     <div class="hoverlay-blog animated zoomIn align-items-center text-center w-100 h-100 justify-content-center">
		                        <div class="inner-text text-white z-index"><i class="icon icon-plus-circle"></i><span class="w-100 d-inline-block text-uppercase">{[propertiesObj[0].name]}</span></div>
		                     </div>
		                     
		                  </a>
		               </figure>
		            </div>
		            <div class="col-12 custome-padding-gallery h-50 px-0">
		               <figure class="blog-image position-relative overflow-h w-100 d-none h-100 m-0 pt-2" >
		                  <img imageonloadgallery class="object-fit h-100 w-100"  ng-src="{[propertiesObj[1].default_thumbnail_path]}" alt=""> 
		                  <a id="1" class="galleryopen" href="javascript:void(0)">
		                     <div class="hoverlay-blog animated zoomIn align-items-center text-center w-100 h-100 justify-content-center">
		                        <div class="inner-text text-white z-index"><i class="icon icon-plus-circle"></i><span class="w-100 d-inline-block text-uppercase">{[propertiesObj[1].name]}</span></div>
		                     </div>
		                     
		                  </a>
		               </figure>
		            </div>
		         

		         

		      
		   
		   </div>



		   <div class="col-md-5 px-md-2 pt-space">
		            <div class="col-12 custome-padding-gallery p-0 h-100 ">
		               <figure class="blog-image position-relative overflow-h w-100 d-none h-100 m-0">
		                  <img imageonloadgallery class="object-fit h-100 w-100" ng-src="{[propertiesObj[2].default_thumbnail_path]}" alt=""> 
		                  <a id="2" class="galleryopen" href="javascript:void(0)">
		                     <div class="hoverlay-blog animated zoomIn align-items-center text-center w-100 h-100 justify-content-center">
		                        <div class="inner-text text-white z-index"><i class="icon icon-plus-circle"></i><span class="w-100 d-inline-block text-uppercase">{[propertiesObj[2].name]}</span></div>
		                     </div>
		                    
		                  </a>
		               </figure>
		            </div>
		    </div>


		   

		   


		   <div class="col-md-4 px-md-2 pt-space">
		      <div class="row height-100">
		         <div class="col-12 custome-padding-gallery pb-0 h-50 mb-md-0 mb-3 ">
		            <figure class="blog-image position-relative overflow-h w-100 d-none h-100 m-0 pb-md-2 ">
		               <img imageonloadgallery class="object-fit h-100 w-100" ng-src="{[propertiesObj[3].default_thumbnail_path]}" alt=""> 
		               <a id="3" class="galleryopen" href="javascript:void(0)">
		                  <div class="hoverlay-blog animated zoomIn align-items-center text-center w-100 h-100 justify-content-center">
		                     <div class="inner-text text-white z-index"><i class="icon icon-plus-circle"></i><span class="w-100 d-inline-block text-uppercase">{[propertiesObj[3].name]}</span></div>
		                  </div>
		                  
		               </a>
		            </figure>
		         </div>
		         <div class="col-12 custome-padding-gallery p-0 h-50 ">
		            <div class="row h-100" style="margin-right: 0; margin-left: 0;" >
		               <div class="col-sm-6 custome-padding-gallery h-100 pr-md-2 m-0 pt-md-2 mb-md-0 mb-3 ">
		                  <figure class="blog-image position-relative overflow-h w-100 d-none m-0 h-100">
		                     <img imageonloadgallery  class="object-fit h-100 w-100" ng-src="{[propertiesObj[4].default_thumbnail_path]}" alt=""> 
		                     <a id="4" class="galleryopen" href="javascript:void(0)">
		                        <div class="hoverlay-blog animated zoomIn align-items-center text-center w-100 h-100 justify-content-center">
		                           <div class="inner-text text-white z-index"><i class="icon icon-plus-circle"></i><span class="w-100 d-inline-block text-uppercase">{[propertiesObj[4].name]}</span></div>
		                        </div>
		                       
		                     </a>
		                  </figure>
		               </div>
		               <div class="col-sm-6 custome-padding-gallery h-100 pl-md-2 mb-md-0 mb-3">
		                  <figure class="blog-image position-relative overflow-h w-100 d-none m-0 pt-md-2 h-100">
		                     <img imageonloadgallery class="object-fit h-100 w-100" ng-src="{[propertiesObj[5].default_thumbnail_path]}" alt=""> 
		                     <a id="5" class="galleryopen" href="javascript:void(0)">
		                        <div class="hoverlay-blog animated zoomIn align-items-center text-center w-100 h-100 justify-content-center">
		                           <div class="inner-text text-white z-index"><i class="icon icon-plus-circle"></i><span class="w-100 d-inline-block text-uppercase">{[propertiesObj[5].name]}</span></div>
		                        </div>
		                       
		                     </a>
		                  </figure>
		               </div>
		            </div>
		         </div>
		      </div>
		   </div>


		</div>
   </section>

   <section class="featureProperty theme-bg-color py-md-5 py-4 d-none">
	  <div class="container" ng-controller="PropertyController as pCtrl" ng-cloak>
	     <div class="row">
	         <div data-aos="fade-down" data-aos-duration="500" class="col-12 py-sm-4 pt-4 pb-3 text-center">
	            <a href="/search-results"><h2 style="color:#0061a3;" class="mb-0 f-property-heading"> Featured Properties Gallery </h2></a>
	         </div>
	      </div>
	      <div class="row" ng-init="search.amenities_filter='129950';sortBy='random';availabilitySearch();">
	         <div data-aos="fade-up" data-aos-duration="500" ng-repeat="property in propertiesObj| orderBy: customSorting : sort | filter: priceRange | filter: amenityFilter | filter: amenityFilterOr | filter: bedroomFilter | filter: locationFilter | filter: neighborhoodFilter | filter: viewNameFilter | limitTo: 12" class="col-lg-4 col-sm-6 p-xl-3 px-md-2 px-3 pt-3  d-inline-flex">
	          <div class="inner-div p-lg-1 d-inline-block w-100">
	              <div class="property bg-white d-none">
	                 <div ng-click="go(property.seo_page_name)" class="propertyImage">
	                    <img ng-src="{[property.default_thumbnail_path]}" class="img-fluid propertythumb" alt="Featured Product" imageonload />
	                 </div>
	                 <div class="propertyDetail py-4 px-3">
	                    <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}"><h6 class="mb-0 text-blue f-600 pro-name-heading text-truncate">{[property.name]}</h6></a>
	                     <div class="star-rating" ng-if="property.rating_average > 0">
	                        <div class="star-rating" star-rating rating-value="property.rating_average" data-max="5"></div>
	                        <span class="rating_number">({[property.rating_count]})</span>
	                      </div>
	                      <div class="star-rating no-rating font-13 text-black font-weight-light-bold" ng-if="!property.rating_average > 0">
	                          <span>No rating available</span>
	                      </div>
	                    <ul class="list-unstyled detailsaboutproperty mt-2 mb-4 d-flex flex-md-wrap flex-sm-nowrap flex-wrap">
	                       <li class="list-inline-item mr-xl-4 mr-lg-0 mr-md-2 mr-sm-0 mr-2  d-flex flex-wrap align-items-center">
	                        <img src="/wp-content/uploads/2019/04/bed.svg"  class="w-20" alt="bed-image">
	                        <span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text">{[property.bedrooms_number]} <?php _e( 'Beds', 'streamline-core' ) ?></span></li>
	                       <li class="list-inline-item mr-xl-4 mr-lg-0 mr-md-2 mr-sm-0 mr-2 d-flex flex-wrap align-items-center">
	                         <img src="/wp-content/uploads/2019/04/slumber.svg" class="w-20" alt="slumber-image">
	                         <span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text"> <?php _e( 'Sleeps', 'streamline-core' ) ?> {[property.max_occupants]}</span></li>
	                       <li class="list-inline-item d-flex flex-wrap align-items-center">
	                         <img src="/wp-content/uploads/2019/04/shower.svg" class="w-20" alt="shower-image">
	                         <span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text">{[property.bathrooms_number]} <?php _e( 'Bathrooms', 'streamline-core' ) ?></span></li>
	                    </ul>
	                   <h6 class="font-12 text-uppercase mb-3 night propertypackage"> <strong class="f-15">{[property.price_data.daily | currency]} </strong>avg/night</h6>
	                       <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}"  class="btn btn-primary  text-uppercase w-100 font-13"><?php _e( 'CHECK AVAILABILITY', 'streamline-core' ) ?></a>
	                 </div>
	              </div>
	          </div>
	         </div>
	         <div  class="col-md-12 text-center mt-5 mb-4">
	            <a href="/search-results/?" class="btn btn-outline-dark text-uppercase btn-ouline-white properties font-weight-light-bold viewallhomepage">See All Properties Running Specials</a>
	         </div>
	      </div>
	  </div>
   </section>

   <section class="rentalcompany position-relative text-center py-5 bg-gray">
   <div class="container">
      <div class="row">
         <div class="col-md-12 py-2">
            <?php if($your_dream_home_text[0]!=""){ ?>
               <p class="mt-sm-4 mb-0 text-black"><?php echo $your_dream_home_text[0] ?></p>
            <?php } ?>
            <?php if($your_dream_home_subtext[0]!=""){ ?>
               <h2 class="f-500 mt-sm-4 line-height-normal mb-0 text-black"><?php echo $your_dream_home_subtext[0] ?></h2>
            <?php } ?>
         </div>
          <div  class="col-md-12 text-center mt-5 mb-4">
	            <a href="/search-results/?" class="btn btn-primary text-uppercase btn-ouline-white properties font-weight-light-bold viewallhomepage">Book Now</a>
	      </div>
      </div>
   </div>
</section>

   <section id="contactsec" class="contactus theme-bg-color py-md-5 py-3 home-contact-sec">
      <div class="container pt-4">
      <div class="row text-center">
         <div class="col-12 pb-md-5 pb-4 mb-3">
            <h2 class="text-white f-600">Contact Us</h2>
         </div>
      </div>
        <div class="row text-center footer-contact mt-2">
         <div class="col-md-4 col-12 pb-md-0 pb-5 mb-3 mb-md-0">
             <i class="icon icon-location-mark text-white mb-3 d-block"></i>
             <?php 
                   if(!empty($address[0])){ ?>
            <h6 class="text-white font-weight-normal font-Nunito"><?php echo $address[0]; ?></h6>
            <?php } ?>
         </div>
         <div class="col-md-4 col-12 pb-md-0 pb-5 mb-3 mb-md-0">
           <a class="text-white" href="mailto:<?php echo $email[0]; ?>">
            <i class="icon icon-email-outline-dark text-white mb-3 d-block"></i>
            <?php 
            if(!empty($email[0])){ ?>
           
              <h6 class="text-white font-weight-normal font-Nunito">
                <?php echo $email[0]; ?>
              </h6>
           
            <?php } ?>
             </a>
           
         </div>
         <div class="col-md-4  col-12 pb-md-0 pb-5 mb-3 mb-md-0">
           <a href="tel:<?php echo $phoneno[0]; ?>" class="text-white">
            <i class="icon icon-telephone text-white mb-3 d-block"></i>
            <?php if(!empty($phoneno[0])){ ?>
                       
            <h6 class="font-weight-normal font-Nunito text-white"><?php echo $phoneno[0]; ?></h6>
            
            <?php } ?>
            </a>
           
         </div>
      </div>
   </div>
</section>

<section ng-controller="PropertyController as pCtrl" id="contactus"   class="contactForm mt-md-0 mt-4 home-contact-form">
   <div  class="container">
      <div   class="row bg-white  contact-form-detail map">
         <div class="col-md-6 pl-0 pr-0 shadow-right order-2 order-md-1">        
             <iframe src="https://maps.google.com/maps?q=Blue%20Ridge%20Mountain%20Rentals&t=&z=15&ie=UTF8&iwloc=&output=embed" src="" width="360" height="600" frameborder="0" style="border:0"></iframe>
            
         </div>
         <div  class="col-md-6 p-lg-5 p-4 contact-form-home order-1 order-md-2">
            <?php if ( is_active_sidebar( 'footer-s4' ) ) { ?>
                 <?php dynamic_sidebar( 'footer-s4' ); ?>
            <?php } ?>
         </div>
      </div>
    </div>
</section>


<div ng-controller="PropertyController as pCtrl" ng-cloak  id="gallerymodal" class="modal fade gallery-modal gallery-vac " role="dialog">
  <div class="modal-dialog modal-lg  modal-dialog-centered">
    <div class="modal-content gallerycontent px-sm-4 px-3 pb-4">
      <div class="modal-header galleryheader pb-2 px-0 position-absolute">
        <button type="button" id="slick-popup-close" class="close close-search text-white " data-dismiss="modal"><i class="icon icon-plus close-popup d-block" style="transform: rotate(45deg);"></i></button>
      </div>
      <div class="modal-body px-0 pb-0">
          <div class="slider4"> 
             <div ng-repeat="property in propertiesObj| orderBy: customSorting : sort | filter: priceRange | filter: amenityFilter | filter: amenityFilterOr | filter: bedroomFilter | filter: locationFilter | filter: neighborhoodFilter | filter: viewNameFilter">
                <h5 class="gallery-heading text-white text-uppercase font-weight-semi-bold">{[property.name]}</h5>
                <img err-src="<?php ResortPro::assets_url('images/dummy-image.jpg'); ?>" ng-src="{[property.default_thumbnail_path]}"  class="carouselimage setminreq" />
             </div>
          </div>
          <div class="image-slick-loader row mx-0 align-items-center justify-content-center" style="display: none;  position: absolute;top: 30vh; left: 25vw;">
            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
          </div>
      </div>
    </div>
  </div>
</div>
   
 <?php get_footer();?>

 <script>
   jQuery(document).ready(function(){
   	  setTimeout(function(){
          jQuery('.slider4').slick({
	         dots: false,
	         speed: 500,
	         slidesToShow:1,
	         prevArrow: "<a class='slider-left-arrow' href='#'><span class='icon icon-angle-left'></span></a>",
	         nextArrow: "<a class='slider-right-arrow' href='#'><span class='icon icon-angle-right'></span></a>",
           });
   	    },8000)

        var first = true;
        jQuery('.galleryopen').click(function(){
          var number = parseInt(jQuery(this).attr("id"));
          jQuery('#gallerymodal').appendTo("body").modal('show');
          jQuery('.slider4').slick('slickGoTo', number);
          if (first == true) {
              jQuery('#slick-popup-close').css("display","none");
              jQuery('.slider4')[0].style['visibility'] = "hidden";
              jQuery('.image-slick-loader')[0].style['display'] = "block";

              setTimeout(() => {
                  jQuery('#slick-popup-close').css("display","block");
                  jQuery('.slider4')[0].style['visibility'] = "unset";
                  jQuery('.image-slick-loader')[0].style['display'] = "none";
              }, 1000);

              first = false
          } 
      })
   });

 </script>