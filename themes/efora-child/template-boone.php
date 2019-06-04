<?php
/**
 * Template Name: Boone
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
//$img = wp_get_attachment_image_url(get_post_thumbnail_id( $page->ID,'full' ));
$img = get_the_post_thumbnail_url($page->ID,'full');
$boone_place_heading = get_post_custom_values('boone_place_heading',$page->ID);
$boone_place_subheading = get_post_custom_values('boone_place_subheading',$page->ID);
$boone_view_content = get_post_custom_values('boone_view_content',$page->ID);
$town_heading = get_post_custom_values('boone_heading',$page->ID);
$town_desc = get_field('town_description',$page->ID); ?>


<section class="position-relative boone-banner-section  home-banner-section  d-inline-block w-100 community-page" style="background: url('<?php echo $img; ?>');">
    <?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false): ?>
  <div class="lazy slider home-banner mb-0 ">
    <?php echo do_shortcode("[wp_owl id='1386']"); ?>
  </div>
<?php endif; ?>
  <div class="inner-content-banner position-absolute w-100 px-3">
     <div class="container position-relative">
       <div class="row">
          <div class="col-md-12 ">
             <h1 class="text-white text-center f-600 mb-0 banner-heading" style="text-transform: uppercase; "><?php echo $page->post_title; ?></h1>
             <?php if($page->post_content != '') { ?>
              <p class="text-white text-center f-400 mb-0 banner-discription font-20 font-Nunito"><?php echo $page->post_content; ?></p>
             <?php } ?>

          </div>
       </div>
      </div>
    </div>
</section>

<section id="explore" class="trust-pilot my-md-5 my-3 populer-destination pt-4">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
          <h2 class="text-blue text-center font-weight-light-bold mb-0"><?php echo $boone_place_heading[0]; ?></h2>
          <p class="text-black text-center font-18 font-Nunito explore-disciption mb-sm-2 mb-0"><?php echo $boone_place_subheading[0]; ?></p>
         </div>
      </div>
      <?php echo $boone_view_content[0]; ?>  
    </div>
</section>




<section class="trust-pilot  d-inline-block w-100">
  <div class="container">
    <div class="row">
      <?php if($town_heading[0] != '') { ?>      
        <div class="col-md-12 align-center mb-md-4 mt-2 mt-md-0" >
          <h2 class="text-blue font-weight-light-bold  text-md-lect text-center"><?php echo $town_heading[0]; ?></h2>
        </div>
      <?php } ?>

      <?php if($town_desc) { ?> 
      <div class="col-md-12" >
        <div class="slider-town boon-silck-slider">
        <?php foreach ($town_desc as $desc) { ?>
          <div class="boone-space">
            <?php echo $desc['content']; ?>
          </div>
        <?php } ?>
        </div>
      </div>
      <?php } ?>

    </div>
  </div>
</section>


<section class="trust-pilot mt-5 py-md-5 py-4 bg-light">
   <div class="container py-md-4">
      <div class="row">
         <div class="col-md-12 pt-md-2 pt-3 pb-4">
            <div class="trustpilot-widget" data-locale="en-US" data-template-id="539adbd6dec7e10e686debee" data-businessunit-id="552521730000ff00057e9fd1" data-style-height="80px" data-style-width="100%" data-stars="1,2,3,4,5" data-schema-type="Organization">
           </div>
            <div class="trustpilot-widget" data-locale="en-US" data-template-id="54ad5defc6454f065c28af8b" data-businessunit-id="552521730000ff00057e9fd1" data-style-height="220px" data-style-width="100%" data-theme="light" data-stars="1,2,3,4,5" data-schema-type="Organization">
            </div>
         </div>
      </div>
   </div>
</section>

<section id="featured" class="featureProperty theme-bg-color py-md-5 py-4 d-none">
  <div class="container" ng-controller="PropertyController as pCtrl" ng-cloak>
     <div class="row">
         <div  class="col-12 py-sm-4 pt-4 pb-3 text-center">
            <h2 class="text-white mb-md-0 f-property-heading font-weight-light-bold">The Homes Are As Impressive As The Views</h2>
            <p class="text-white mb-md-0 f-property-discription font-Nunito font-18">Your dream mountain home is here. In the heart of the high country.</p>
         </div>
      </div>
      <div class="row" ng-init="search.resort_area_id=6459;sortBy='random';availabilitySearch(); limit = searchSettings.propertyPagination; loadBtn = true">
         <div data-aos="fade-down" data-aos-duration="500" ng-repeat="property in propertiesObj| orderBy: customSorting : sort | filter: priceRange | filter: amenityFilter | filter: amenityFilterOr | filter: bedroomFilter | filter: locationFilter | filter: neighborhoodFilter | filter: viewNameFilter" class="col-lg-4 col-sm-6 p-xl-3 px-md-2 px-3 pt-3  d-inline-flex">
          <div class="inner-div p-lg-1 d-inline-block w-100">
              <div class="property bg-white d-none">
                 <div ng-click="go(property.seo_page_name)" class="propertyImage">
                    <img imageonload ng-src="{[property.default_thumbnail_path]}" class="img-fluid" alt="" />
                 </div>
                 <div class="propertyDetail py-4 px-3">
                    <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">

                    <h6 class="mb-0 text-blue f-600 pro-name-heading text-truncate">{[property.name]}</h6>
                    </a>
                     <div class="star-rating" ng-if="property.rating_average > 0">
                        <div class="star-rating" star-rating rating-value="property.rating_average" data-max="5"></div>
                        <span class="rating_number">({[property.rating_count]})</span>
                      </div>
                      <div class="star-rating" ng-if="!property.rating_average > 0">
                          <span>No rating available</span>
                      </div>
                    <ul class="list-unstyled detailsaboutproperty mt-2 mb-4 d-flex flex-md-wrap flex-sm-nowrap flex-wrap">
                        <li class="list-inline-item mr-xl-4 mr-lg-0 mr-md-2 mr-sm-0 mr-2  d-flex flex-wrap align-items-center"><i class="icon icon-bed font-20 mb-xl-0"></i><span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text ng-binding">{[property.bedrooms_number]} <?php _e( 'Beds', 'streamline-core' ) ?></span></li>

                       <li class="list-inline-item mr-xl-4 mr-lg-0 mr-md-2 mr-sm-0 mr-2 d-flex flex-wrap align-items-center"><i class="icon icon-slumber font-20  mb-xl-0"></i><span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text"><?php _e( 'Sleeps', 'streamline-core' ) ?> {[property.max_occupants]} </span></li>
 
                       <li class="list-inline-item d-flex flex-wrap align-items-center"><i class="icon icon-shower font-20  mb-xl-0"></i><span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text ng-binding">{[property.bathrooms_number]} <?php _e( 'Bathrooms', 'streamline-core' ) ?></span></li>
                    </ul>



                   <h6 class="font-12 text-uppercase mb-3 night propertypackage"> <strong class="f-15">{[property.price_data.daily | currency]} </strong>avg/night</h6>
                       <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}"  class="btn btn-primary  text-uppercase w-100 font-13"><?php _e( 'CHECK AVAILABILITY', 'streamline-core' ) ?></a>
                 </div>
              </div>
          </div>
         </div>
         <div class="col-md-12 text-center">
                <!-- <i ng-if="loadMoreShow == 'true'" class="fa fa-circle-o-notch fa-spin fa-2x fa-fw"></i> -->
                <div ng-if="loadMoreShow == 'true'" class="cards-loader-cutome">
                    <div class="lds-ellipsis">
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>
                </div>
                          
          </div>
         <div class="col-md-12 text-center mt-5 mb-4">
            <a ng-if="total_units > 0 && loadBtn && !propertiesObj.length<12" ng-click="showAll();" class="btn btn-outline-dark text-uppercase btn-ouline-white properties font-weight-light-bold showall"><?php _e('View All', 'streamline-core') ?></a>
         </div>
      </div>
  </div>
</section>
<?php echo get_footer();?>
<script>
   jQuery(document).ready(function(){
       jQuery(".topmenu").children("a").addClass("topmenulink");
       jQuery(".topmenu").children("a").html("Discover Boone");
        jQuery(".featuredhomes").children("a").attr("href","javascript:void(0)");
       jQuery(".featuredhomes").children("a").addClass("featuredhomes");
       jQuery(document).on("click",".topmenulink",function(){
              jQuery('html, body').animate({
                   scrollTop: jQuery("#explore").offset().top-150
              },1500);
        });

        jQuery(document).on("click",".featuredhomes",function(){
            jQuery('html, body').animate({
                   scrollTop: jQuery("#featured").offset().top-150
              },1500);
        });
       jQuery('.slider-town').slick({
         dots: true,
         speed: 500,
         slidesToShow:2,
         adaptiveHeight:false,
         slidesToScroll: 1,
         arrows: false,
        customPaging : function(slider, i) {
        var thumb = jQuery(slider.$slides[i]).data();
        if(thumb.slickIndex < 10) {
          var index = parseInt(thumb.slickIndex) + parseInt(1);
          var num = "0"+index;
        } else {
          var num = parseInt(thumb.slickIndex) + parseInt(1);
        }
        return '<a class="custom-paging" href="javascript:void(0)">'+num+'</a>';
        },
        responsive: [{
          breakpoint: 991,
          settings: {
            dots: true,
            speed: 500,  
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight:false,
          }
        }]  

       });
   });
</script>