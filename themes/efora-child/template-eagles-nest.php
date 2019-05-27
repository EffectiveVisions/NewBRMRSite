<?php
/**
 * Template Name: Eagles Nest
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
$living_experience = get_field('en_living_experience',$page->ID);
$places_image = get_field('en_places_image',$page->ID);
$places_description = get_field('en_places_description',$page->ID);
$slider_places_image = get_field('en_slider_places_image',$page->ID); ?>



<section class="position-relative home-banner-section boone-banner-section community-page ">
  <?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false): ?>
  <div class="lazy slider home-banner mb-0 ">
    <?php echo do_shortcode("[wp_owl id='1086']"); ?>
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





<section id="featured" class="featureProperty bg-light py-md-5 py-4">
  <div class="container" ng-controller="PropertyController as pCtrl" ng-cloak>
     <div class="row">
         <div  class="col-12 pt-sm-4 pt-4 pb-3 text-center">
            <h2 class="text-blue mb-md-0 f-property-heading font-weight-light-bold">THE HOMES ARE AS IMPRESSIVE AS THE VIEWS</h2>
            <p class="text-black mb-md-0 f-property-discription font-Nunito font-18 col-xl-10 px-0 mx-auto">Your dream mountain home is here. In the heart of the High Country. Just minutes from Banner Elk, Boone, and the slopes of Beech Mountain.</p>
         </div>
      </div>
      <div class="row" ng-init="search.resort_area_id=12875;sortBy='random';availabilitySearch();limit = searchSettings.propertyPagination; loadBtn = true">
         <div data-aos="fade-down" data-aos-duration="500" ng-repeat="property in propertiesObj| orderBy: customSorting : sort | filter: priceRange | filter: amenityFilter | filter: amenityFilterOr | filter: bedroomFilter | filter: locationFilter | filter: neighborhoodFilter | filter: viewNameFilter" class="col-lg-4 col-sm-6 p-xl-3 px-md-2 px-3 pt-3  d-inline-flex">
          <div class="inner-div p-lg-1 d-inline-block w-100">
              <div class="property bg-white">
                 <div ng-click="go(property.seo_page_name)" class="propertyImage">
                    <img datasrc="{[property.default_thumbnail_path]}" lazy-load class="img-fluid" alt="" />
                 </div>
                 <div class="propertyDetail py-4 px-3">
                    <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}"><h6 ng-if="property.name.length>28" class="mb-0 text-blue f-600 pro-name-heading">{[property.name.substring(0,28)+"..."]}</h6>
                    <h6 ng-if="property.name.length<=28" class="mb-0 text-blue f-600 pro-name-heading">{[property.name]}</h6>
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
         <div class="col-md-12 text-center mt-5 mb-sm-4 mb-3">
            <a ng-if="total_units > 0 && loadBtn && !propertiesObj.length<12" ng-click="loadMore();" class="btn theme-btn read-more text-uppercase font-15  py-0 rounded-0
             properties font-weight-light-bold"><?php _e('Load More', 'streamline-core') ?></a>
         </div>
      </div>
  </div>
</section>

<section ng-controller="PropertyController as pCtrl" ng-cloak class="livingExperience theme-bg-color py-md-5 pt-5">
  <div class="inner-div d-inline-block w-100">
  <div class="container py-md-5">
      <?php $n=0; foreach($living_experience as $living_exp) { 
        if($n%2==0) { ?>
        <div class="feature-property-deatils-sec row">
          <div  class="col-sm-6 position-static order-1 px-0">
            <figure class="left-side-section image-one mb-0">
               <img datasrc="<?php echo $living_exp['image']['url']; ?>" lazy-load class="h-100 w-100 object-fit" alt="img">
            </figure>
          </div>
          <div class="col-sm-6 p-lg-5 p-md-4  order-2 ">
            <div class="inner-div p-md-4 mt-4 my-md-0 mb-sm-5">
              <h3 class="font-26 text-white"><?php echo $living_exp['title']; ?></h3>
              <div class="font-15 font-Nunito text-white livingExperience-discription"><?php echo $living_exp['content']; ?></div>
            </div>
          </div>
        </div>
        <?php } else { ?>
        <div class="feature-property-deatils-sec row">
           <div class="col-sm-6  p-lg-5 p-md-4 order-2 order-sm-1">
            <div class="inner-div p-md-4 mt-4 my-md-0 mb-sm-5">
               <h3 class="font-26 text-white"><?php echo $living_exp['title']; ?></h3>
               <div class="font-15 font-Nunito text-white livingExperience-discription"><?php echo $living_exp['content']; ?></div>
            </div>
          </div>
          <div class="col-sm-6 position-static order-1  order-sm-2   px-0">
            <figure class="left-side-section image-second mb-0 px-0">
              <img src="<?php echo $living_exp['image']['url']; ?>" class="h-100 w-100 object-fit" alt="img">
            </figure>
          </div>
        </div>
        <?php } ?>
      <?php $n++; } ?>
  </div>
</div>
</section>

<section class="trust-pilot mt-md-5 mt-3 py-3">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="trustpilot-widget" data-locale="en-US" data-template-id="539adbd6dec7e10e686debee" data-businessunit-id="552521730000ff00057e9fd1" data-style-height="80px" data-style-width="100%" data-stars="1,2,3,4,5" data-schema-type="Organization">
           </div>
            <div class="trustpilot-widget" data-locale="en-US" data-template-id="54ad5defc6454f065c28af8b" data-businessunit-id="552521730000ff00057e9fd1" data-style-height="220px" data-style-width="100%" data-theme="light" data-stars="1,2,3,4,5" data-schema-type="Organization">
            </div>
         </div>
      </div>
   </div>
</section>

<section id="explore" ng-controller="PropertyController as pCtrl" ng-cloak class="places eagles-nest py-md-5 py-sm-4 py-3 mb-4 mt-sm-0">
  <div class="container-fluid pt-2 bg-light">
    <div class="row pt-1">
    <?php $count = 0; foreach($places_image as $place_img) { ?>
      <div class="col-md-3 col-sm-4 col-12 custome-padding-gallery pb-1" >
        <figure class="mb-0 blog-image position-relative overflow-h w-100"><img class="object-fit h-100 w-100" datasrc="<?php echo $place_img['image']['url']; ?>" lazy-load alt="" />
        <a id="<?php echo $count; ?>" class="galleryopen" href="javascript:void(0)">
          <div class="hoverlay-blog animated zoomIn align-items-center text-center w-100 h-100 justify-content-center">
            <div class="inner-text text-white z-index"><i class="icon icon-plus-circle"></i><span class="w-100 d-inline-block text-uppercase"><?php echo $place_img['name']; ?></span></div>
          </div>&nbsp;
          </a>
        </figure>
      </div>
    <?php $count++; } ?>
    </div>
  </div>
</section>


<section class="placesDesc mb-md-5 mb-3">
  <div class="container">
    <div class="row">
      <?php foreach($places_description as $places_desc) { ?>
        <div class="col-sm-6 mb-sm-4  mb-3 border-box-div px-xl-4">
          <div class="inner-div w-100 h-100 position-relative custome-border-bottom d-inline-block">
            <h2 class="text-blue font-weight-light-bold"><?php echo $places_desc['title']; ?></h2>
            <div class="font-Nunito font-15 text-light-dark places-discription"><?php echo $places_desc['content']; ?></div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>  
</section>

<section ng-controller="PropertyController as pCtrl" ng-cloak class="sliderPlaces">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 px-0 slider-places">
        <?php foreach ($slider_places_image as $slider_places) { ?>
          <div class="" >
            <img lazy-load datasrc="<?php echo $slider_places['image']['url']; ?>" lazy-load>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<section ng-controller="PropertyController as pCtrl" class="map-img-sec mt-sm-5 mt-3 pt-1 pt-sm-0">
  <div class="container-fluid">
    <div class="row">
        <figure class="mb-0">
          <img datasrc="/wp-content/uploads/2019/03/en-map.jpg" lazy-load class="img-fluid" alt="img">
        </figure>
    </div>
  </div>
</section>

<div ng-controller="PropertyController as pCtrl" ng-cloak id="gallerymodal" class="modal fade gallery-modal gallery-vac " role="dialog">
  <div class="modal-dialog modal-lg  modal-dialog-centered">
    <div class="modal-content gallerycontent px-sm-4 px-3 pb-4">
      <div class="modal-header galleryheader pb-2 px-0 position-absolute">
        <button id="slick-popup-close" type="button" class="close close-search text-white" data-dismiss="modal"><i class="icon icon-plus close-popup d-block" style="transform: rotate(45deg);"></i></button>
      </div>
      <div class="modal-body px-0 pb-0">
          <div class="slider4">
            <?php $count = 0; foreach($places_image as $place_img) { ?>
                
                 <div>
                    <h5 class="gallery-heading text-white text-uppercase font-weight-semi-bold"><?php echo $place_img['name'] ?></h5>
                    <img lazy-load err-src="<?php ResortPro::assets_url('images/dummy-image.jpg'); ?>"  datasrc="<?php echo $place_img['image']['url']; ?>"  class="carouselimage setminreq" />
                 </div>
           <?php $count++; } ?>
          </div>
          <div class="image-slick-loader row mx-0 align-items-center justify-content-center" style="display: none;  position: absolute;top: 30vh; left: 25vw;">
            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
          </div>
      </div>
    </div>
  </div>
</div>

<?php echo get_footer();?>
<script>
   jQuery(document).ready(function(){

        jQuery(".topmenu").children("a").addClass("topmenulink");
        jQuery(".topmenu").children("a").html("Discover Eagle Nest");
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
        jQuery('.slider4').slick({
         dots: false,
         speed: 500,
         slidesToShow:1,
         prevArrow: "<a class='slider-left-arrow' href='#'><span class='icon icon-angle-left'></span></a>",
         nextArrow: "<a class='slider-right-arrow' href='#'><span class='icon icon-angle-right'></span></a>",
       });
        jQuery('.slider-places').slick({
          dots: false,
          slidesToShow:6,
          adaptiveHeight:false,
          arrows: false,
          infinite: true,
          autoplay: true,
          autoplaySpeed: 1500,

          //slidesToScroll: 1,
          responsive: [{
            breakpoint: 991,
            settings: {
              dots: false,             
              slidesToShow: 4,
              slidesToScroll: 1,
              adaptiveHeight:false
            }
          },
          {
            breakpoint: 767,
            settings: {
              dots: false, 
              slidesToShow: 3,
              slidesToScroll: 1,
              adaptiveHeight:false
            }
          },
          {
            breakpoint: 567,
            settings: {
              dots: false,             
              slidesToShow: 2,
              slidesToScroll: 1,
              adaptiveHeight:false
            }
          }]
          
        });
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