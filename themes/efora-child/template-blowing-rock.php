<?php
/**
 * Template Name: Blowing Rock
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
$popular_places_heading = get_post_custom_values('popular_places_heading',$page->ID);
$popular_places_subheading = get_post_custom_values('popular_places_subheading',$page->ID);
$popular_places_content = get_post_custom_values('popular_places_content',$page->ID);
$explore_heading = get_post_custom_values('blowing_explore_heading',$page->ID);
$top_amenities = get_field('blowing_top_amenities',$page->ID); ?>


<section class="position-relative home-banner-section  boone-banner-section community-page" style="background: url('<?php echo $img; ?>')">
    <?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false): ?>
  <div class="lazy slider home-banner mb-0 ">
    <?php echo do_shortcode("[wp_owl id='1385']"); ?>
  </div>
<?php endif; ?>
  <div class="inner-content-banner position-absolute w-100 px-3">
     <div class="container position-relative">
       <div class="row">
          <div class="col-md-12">
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
          <h2 class="text-blue text-center font-weight-light-bold mb-0"><?php echo $popular_places_heading[0]; ?></h2>
          <p class="text-black text-center font-18 font-Nunito explore-disciption mb-sm-2 mb-0"><?php echo $popular_places_subheading[0]; ?></p>
         </div>
      </div>
      <?php echo $popular_places_content[0]; ?>  
    </div>
</section>

<section class="trust-pilot my-md-5 py-4">
   <div class="container">
      <div class="row">
         <div class="col-md-12 pt-2">
            <div class="trustpilot-widget" data-locale="en-US" data-template-id="539adbd6dec7e10e686debee" data-businessunit-id="552521730000ff00057e9fd1" data-style-height="80px" data-style-width="100%" data-stars="1,2,3,4,5" data-schema-type="Organization">
           </div>
            <div class="trustpilot-widget" data-locale="en-US" data-template-id="54ad5defc6454f065c28af8b" data-businessunit-id="552521730000ff00057e9fd1" data-style-height="220px" data-style-width="100%" data-theme="light" data-stars="1,2,3,4,5" data-schema-type="Organization">
            </div>
         </div>
      </div>
   </div>
</section>

<<section class="trust-pilot mt-md-5 mt-4 py-5 theme-bg-color">
  <div class="container py-md-5">
    <div class="row">
      <?php if($explore_heading[0] != '') { ?>
      <div class="col-md-12 align-center" data-aos="fade-down">
        <h2 class="text-center text-white font-weight-light-bold"><?php echo $explore_heading[0]; ?></h2>
      </div>
      <?php } ?>

      <?php if($top_amenities) { ?>
      <div class="col-12 col-lg-11  mx-auto pt-md-5 pt-3">
        <div class="slider1 pt-2 mt-3 slider-amenities">
        <?php foreach ($top_amenities as $amenities) { ?>
          <div class="">
            <div class="main-amt-container position-relative row mx-0 px-md-4">
              <div class="amt-image col-md-6">
                <figure class="amenities-slider-images mb-0">
                  <img src="<?php echo $amenities['image']['url']; ?>">
                </figure>
              </div>
              <div class="amenities-slider-data col-md-6 pl-md-5 px-lg-5">
                <h3 class="text-blue font-26 pl-2"><?php echo $amenities['title']; ?></h3>
                <div class="font-15 font-Nunito text-black pl-2 ammenties"><?php echo $amenities['content']; ?></div>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
      <?php } ?>

    </div>
  </div>
  <div class="py-xl-5 py-3">&nbsp;</div>
</section>

<section id="featured" class="featureProperty bg-gray py-md-5 py-4 ">
  <div class="container pt-4" ng-controller="PropertyController as pCtrl" ng-cloak>
     <div class="row">
         <div data-aos="fade-down" data-aos-duration="500" class="col-12 py-sm-4 pt-4 pb-3 mb-3 text-center">
             <h2 class="text-blue mb-md-0 f-property-heading font-weight-light-bold">The Homes Are As Impressive As The Views</h2>
            <p class="text-black mb-md-0 f-property-discription font-Nunito font-18">Your dream mountain home is here. In the heart of the High Country.</p>
         </div>
      </div>
      <div class="row" ng-init="search.resort_area_id=6458;sortBy='random';availabilitySearch(); limit = searchSettings.propertyPagination; loadBtn = true">
         <div data-aos="fade-down" data-aos-duration="500" ng-repeat="property in propertiesObj| orderBy: customSorting : sort | filter: priceRange | filter: amenityFilter | filter: amenityFilterOr | filter: bedroomFilter | filter: locationFilter | filter: neighborhoodFilter | filter: viewNameFilter" class="col-lg-4 col-sm-6 p-xl-3 px-md-2 px-3 pt-3  d-inline-flex">
          <div class="inner-div p-lg-1 d-inline-block w-100">
              <div class="property bg-white">
                 <div ng-click="go(property.seo_page_name)" class="propertyImage">
                    <img datasrc="{[property.default_thumbnail_path]}" lazy-load class="img-fluid" alt="" />
                 </div>
                 <div class="propertyDetail py-4 px-3">
                    <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}"><h6  class="mb-0 text-blue f-600 pro-name-heading">{[property.name]}</h6></a>
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
                       <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}"  class="btn btn-warning  text-uppercase w-100 font-13"><?php _e( 'CHECK AVAILABILITY', 'streamline-core' ) ?></a>
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
            <a ng-if="total_units > 0 && loadBtn && !propertiesObj.length<12" ng-click="loadMore();" class="btn theme-btn rounded-0 text-uppercase btn-ouline-white properties font-weight-light-bold"><?php _e('Load More', 'streamline-core') ?></a>
         </div>
      </div>
  </div>
</section>
<?php echo get_footer();?>
<script>
   jQuery(document).ready(function(){
       jQuery(".topmenu").children("a").addClass("topmenulink");
       jQuery(".topmenu").children("a").html("Discover Blowing Rock");
       jQuery(".featuredhomes").children("a").attr("href","javascript:void(0)");
       jQuery(".featuredhomes").children("a").addClass("featuredhomes");
       jQuery(document).on("click",".topmenulink",function(){
              jQuery('html, body').animate({
                   scrollTop: jQuery("#explore").offset().top-150
              },1000);
        });

        jQuery(document).on("click",".featuredhomes",function(){
            jQuery('html, body').animate({
                   scrollTop: jQuery("#featured").offset().top-150
              },1000);
        });
       jQuery('.slider-amenities').slick({
         dots: false,
         speed: 500,
         slidesToShow:1,
         adaptiveHeight:false,
         slidesToScroll: 1,
         responsive: [{
            breakpoint: 991,
            settings: {
              speed: 500,  
              slidesToShow: 1,
              slidesToScroll: 1,
              adaptiveHeight:false
            }
          }],
          responsive: [{
            breakpoint: 767,
            settings: {
              dots: true,
              arrows: false,
              speed: 500,  
              slidesToShow: 1,
              slidesToScroll: 1,
              adaptiveHeight:false
            }
          }]
       });

      
      jQuery('.mountain-discription').each(function(){
           jQuery(this).parents().append('<p style="display:none;" class="fulltext">'+jQuery(this).html()+'</p>')
           var shortText1 = jQuery.trim(jQuery(this).html()).substring(0, 200)
           .split(" ").slice(0, -1).join(" ") + "...";
           jQuery(this).html(shortText1);
      })

 

      jQuery('.btn-readmore').click(function(){
          if(jQuery(this).html()=="Read More"){
            var fulltext = jQuery(this).parents().find('.fulltext').html();
            jQuery(this).parents().find('.mountain-discription').html(fulltext);
            jQuery(this).html("Read Less")
          }else{
               var fulltext = jQuery.trim(jQuery(this).parents().find('.fulltext').html()).substring(0, 200)
           .split(" ").slice(0, -1).join(" ") + "..."; 
            jQuery(this).parents().find('.mountain-discription').html(fulltext);
            jQuery(this).html("Read More")
          }
          
      });

     });
</script>