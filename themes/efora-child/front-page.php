<?php
/**
 * Template Name: Front-page
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
 $banner_heading = get_post_custom_values('home_page_banner_heading',$page->ID);

  $come_stay_heading = get_post_custom_values('come_stay_heading',$page->ID);

  $announcement_section  = get_post_custom_values('announcement_section',$page->ID);

  $blueridge_post   = get_post_custom_values('home_page_blue_ridge_post',$page->ID);
  
  require_once 'function.resize.php';

?>
<section class="position-relative home-banner-section home-main-sec">   
      <div ng-controller="PropertyController as pCtrl" datasrc="removeclass" lazy-load class="lazy slider home-banner mb-0">
        <span class="carouselpart d-none">
         <?php echo do_shortcode("[wp_owl id='211']"); ?>
        </span>
      </div>   
    <div class="inner-content-banner position-absolute w-100 px-3">
       <div class="container position-relative">
         <div class="row">
            <div class="col-md-12">
              <?php if($banner_heading[0]!=""){ ?>
               <h1 class="text-white text-center f-600 mb-sm-0  mb-1 banner-heading"><?php echo $banner_heading[0]; ?></h1> 
              <?php } ?>
            </div>
         </div>

         <div class="row">
                  <div class="col-md-12 col-lg-11 m-auto">
                    <div class="row">
                        <div class="col-12">
                          <a href="#" class="custom-tooltip-info">
                            <i class="icon icon-information-circle text-white font-24"></i>
                            <div class="custom-tooltip theme-bg-color text-white font-13 position-absolute px-3 py-2 z-index">All selections are optional. Just Click Search to browse all properties.</div>
                          </a>
                           <ul class="list-unstyled mb-0 pl-md-4 pr-md-4 mt-sm-3 text-center text-sm-left vacation-listing mb-2 mb-sm-0">
                              <li class="list-inline-item mr-sm-4 mr-0 active-item d-block d-sm-inline-block vacation-listing-item">
                               <a href="/" class="f-600 tabby text-uppercase font-13 text-white position-relative"> Vacation homes by date</a> 
                               </li>
                               <li class="list-inline-item d-block d-sm-inline-block vacation-listing-item mr-sm-4">
                                  <a href="/vacation-homes-by-area" class="f-600 tabby text-uppercase font-13 text-white position-relative">Vacation homes by Area</a>
                               </li>
                               <!--<li class="list-inline-item d-block d-sm-inline-block vacation-listing-item">
                                  <a href="javascript:void(0)" class="f-600 tabby text-uppercase font-13 text-white position-relative lookup">Lookup Homes by Name</a>
                               </li>--> 
                           </ul>
                        </div>
                        <div class="col-12 mt-2  propertyBanner homepagesearch py-3 rounded">
                            
                           <?php if ( is_active_sidebar( 'home-hero-widgets' ) ) { ?>
                                   <?php dynamic_sidebar( 'home-hero-widgets' ); ?>
                            <?php } ?>
                            
                        </div>
                      </div> 
                  </div>
               </div>

                <div ng-controller="PropertyController as pCtrl" class="trustpilot-rating w-100 mt-md-0 pt-md-0 mt-md-0 mt-sm-3 pt-4" >
                  <div class="d-flex flex-wrap justify-content-center  justify-content-md-start align-items-center" lazy-load datasrc="trustpilot">                    
                      <figure class="mb-0 rating-one d-none">
                          <div class="trustpilot-widget" data-locale="en-US" data-template-id="5419b637fa0340045cd0c936" data-businessunit-id="552521730000ff00057e9fd1" data-style-height="20px" data-style-width="100%" data-theme="dark">
                          </div>
                          <div class="trustpilot-widget" data-locale="en-US" data-template-id="5613c9cde69ddc09340c6beb" data-businessunit-id="552521730000ff00057e9fd1" data-style-height="100px" data-style-width="100%" data-theme="dark">
                          </div>
                        </figure>                       
                       <figure class="mb-0   rating-two mr-lg-4 pr-md-2 mr-lg-3 mr-md-4 mt-md-0 mt-2 ml-md-auto mt-md-3 pt-md-4 pl-md-0 pl-sm-4">
                          <div style="padding-bottom: 10px;" class="text-center"><a href="http://www.bbb.org/northwestern-north-carolina/business-reviews/vacation-rentals/blue-ridge-mountain-rentals-inc-in-blowing-rock-nc-4002074/#bbbonlineclick" target="_blank" rel="nofollow noopener"><img lazy-load style="border: 0;" datasrc="https://seal-nwnc.bbb.org/seals/blue-seal-200-65-bbb-4002074.png" alt="Blue Ridge Mountain Rentals, Inc. BBB Business Review" /></a></div>
                      </figure>                    
                  </div>
                </div>
             </div>
          </div>

</section>
<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false): ?>
<section class="rentalcompany position-relative text-center py-5 bg-gray">
   <div class="container">
      <div class="row">
         <div class="col-md-12 py-2">
            <figure class="mb-sm-0">
                  <?php $default_logo = efora_option('default_logo');
                  if(!empty($default_logo)){ ?>
                   <a href="<?php echo esc_url(home_url('/')); ?>" class="d-inline-block">
                      <img class="img-fluid" alt="logo" src="<?php echo esc_url(efora_option('default_logo')); ?>" alt="<?php bloginfo('name'); ?>">
                    </a>
                  <?php } else{ ?>
                  <a href="<?php echo esc_url(home_url('/')); ?>" class="d-inline-block">
                      <img class="img-fluid" alt="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
                   </a>
                  <?php } ?>
            </figure>
            <?php if($come_stay_heading[0]!=""){ ?>
               <p class="f-500 mt-sm-4 line-height-normal mb-0 text-black"><?php echo $come_stay_heading[0] ?></p>
            <?php } ?>
         </div>
      </div>
   </div>
</section>

<!--<section class="announcement-sec">
  <div class="container">
    <div class="row announcementDiscount text-center  py-sm-5 py-3">
        <?php if($announcement_section[0]!=""){ ?> 
         <div class="col-md-12 py-2">
             <?php echo $announcement_section[0] ?>
         </div>
         <?php } ?>
      </div>
    </div>
</section>-->

<section class="featureProperty theme-bg-color py-md-5 py-4 d-none">
  <div class="container" ng-controller="PropertyController as pCtrl" ng-cloak>
     <div class="row">
         <div data-aos="fade-down" data-aos-duration="500" class="col-12 py-sm-4 pt-4 pb-3 text-center">
            <h2 class="text-white mb-0 f-property-heading"> Properties Running Discounts and Specials</h2>
         </div>
      </div>
      <div class="row" ng-init="search.amenities_filter='129951';sortBy='random';availabilitySearch();">
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
            <a href="/search-results/?" class="btn btn-outline-dark text-uppercase btn-ouline-white properties font-weight-light-bold viewallhomepage">See All Properties Running Special</a>
         </div>
      </div>
  </div>
</section>

<section ng-controller="PropertyController as pCtrl" ng-cloak class="trust-pilot my-5">
   <div lazy-load datasrc="trustpilot1" class="container">
      <div class="row d-none trustpilotdtl">
         <div class="col-md-12">            
            <div class="trustpilot-widget" data-locale="en-US" data-template-id="539adbd6dec7e10e686debee" data-businessunit-id="552521730000ff00057e9fd1" data-style-height="80px" data-style-width="100%" data-stars="1,2,3,4,5" data-schema-type="Organization">
           </div>
            <div class="trustpilot-widget" data-locale="en-US" data-template-id="54ad5defc6454f065c28af8b" data-businessunit-id="552521730000ff00057e9fd1" data-style-height="220px" data-style-width="100%" data-theme="light" data-stars="1,2,3,4,5" data-schema-type="Organization">
            </div>          
         </div>
      </div>
   </div>
</section>
<section ng-controller="PropertyController as pCtrl" datasrc="replaceclass" lazy-load class="aboutussec py-5">
  <?php if($blueridge_post[0]!=""){ ?>
     <?php echo $blueridge_post[0] ?>
  <?php } ?>
</section>
<section class="blogSection py-5 bg-gray">
   <div ng-controller="PropertyController as pCtrl" ng-cloak  class="container">
       <div class="row my-md-5 py-2 mb-md-3">
        <?php
           $args = array( 'posts_per_page' => 3, 'offset'=> 1, 'category' => 312 );
           $myposts = get_posts( $args );
          foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
           <div data-aos="fade-down" data-aos-duration="500" class="col-lg-4  col-sm-6 col-12 pb-3 pb-sm-0 blog-container">
             <div class="blog transition h-100  bg-white d-flex flex-wrap">
                <figure class="mb-0 blog-image overflow-h w-100">
                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?> 
                 <img class="blogthumb" src="<?php echo $url ?>"/>
                </figure>
                 <div class="blogDetail px-4 pt-4  w-100">
                  <div class="d-flex flex-wrap align-items-center">
                    <i class="icon icon-small-calendar font-20 text-blue"></i>
                    <span class="ml-2 text-muted"><?php echo get_the_date('M j, Y'); ?></span>
                  </div>
                    <h6 class="font-weight-bold text-blue my-3 blog-heading text-truncate mb-2"><?php the_title(); ?></h6>
                    <p><?php echo wp_trim_words( get_the_content(), 18, '...' );?></p>
                 </div>
                 <div class="blogDetail px-4 pb-4 w-100 mt-auto">
                    <a href="<?php the_permalink(); ?>" class="font-weight-bold readMore"> READ MORE  </a> 
                 </div>
             </div>
           </div>
         <?php 
           endforeach; 
           wp_reset_postdata();
          ?>
          <div class="col-12 text-center mt-md-5 mt-4">
              <a href="/blogpage" class="btn btn-primary themeBtn text-uppercase font-weight-bold font-Nunito view-all">View All</a>
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
             <?php $address = get_post_custom_values("home_page_contact_address",$page->ID);
                        if(!empty($address[0])){ ?>
            <h6 class="text-white font-weight-normal font-Nunito"><?php echo $address[0]; ?></h6>
            
            <?php } ?>
         </div>
         <div class="col-md-4 col-12 pb-md-0 pb-5 mb-3 mb-md-0">
           <a class="text-white" href="mailto:<?php echo $email[0]; ?>">
            <i class="icon icon-email-outline-dark text-white mb-3 d-block"></i>
            <?php $email = get_post_custom_values("home_page_contact_email",$page->ID);
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
            <?php $phoneno = get_post_custom_values("home_page_contact_number",$page->ID);
              if(!empty($phoneno[0])){ ?>       
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
            <!--<map
                    center="34.866215,-84.326248"
                    zoom="8" scrollwheel="false" style="height:600px;">
                    <marker
                      position="34.866215,-84.326248"
                      title="Blueridge mountain rentals"></marker>
              </map>--> 

         </div>
         <div  class="col-md-6 p-lg-5 p-4 contact-form-home order-1 order-md-2">
         
            <?php if(is_active_sidebar('footer-s4')){ ?>
                 <?php dynamic_sidebar('footer-s4'); ?>
            <?php } ?>
         </div>
     </div>
 </div>
</section>
<script>
  function redirectToBlog(){
    window.location.href = "/blog"
  }

  jQuery(document).ready(function(){
      jQuery(".filter-count-btn").bind('touchend', function(e) {
           e.preventDefault(); 
           jQuery(this).click();
      });
      jQuery('input[name="pets"]').removeAttr("checked"); 
      document.getElementsByClassName("searchform")[0].reset();

      jQuery(".lookup").click(function(){
           jQuery("#tg-search").addClass("open");
      })

      jQuery(".amenity_item").each(function(){
          if(jQuery(this).children("input").val() == "121857" || jQuery(this).children("input").val() == "121865" || jQuery(this).children("input").val() == "416500"){ 
            if(jQuery(this).children("input").val() == "121857"){
                jQuery("input[value='121857'").after('<img class="ammenityicon"  src="/wp-content/uploads/2019/06/bath-tub.svg">');
            }

            if(jQuery(this).children("input").val() == "121865"){
               jQuery("input[value='121865'").after('<img class="ammenityicon w-18" src="/wp-content/uploads/2019/06/pawprint.svg">');
            }

            if(jQuery(this).children("input").val() == "416500"){
              jQuery("input[value='416500'").after('<img class="ammenityicon" src="/wp-content/uploads/2019/06/Mountain.svg">');
            }
            
            jQuery(this).children("input").css({"vertical-align":"middle","outline":"none"});
            jQuery(this).children("label").css({"display":"inline","color":"#fff","padding-left":"10px","font-size":"12px"});

          }else{
            jQuery(this).remove();
          }
      });
 });
</script>
<?php endif; ?>
<?php echo get_footer();?>
