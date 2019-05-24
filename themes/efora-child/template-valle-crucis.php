<?php
/**
 * Template Name: Valle Crucis
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
$popular_places_heading = get_post_custom_values('valle_explore_heading',$page->ID);
$popular_places_subheading = get_post_custom_values('valle_explore_subheading',$page->ID);
$explore_images = get_field('explore_images',$page->ID);
$popular_places_desc = get_field('valle_popular_places_desc',$page->ID); ?>


<section ng-controller="PropertyController as pCtrl" ng-cloak class="position-relative home-banner-section boone-banner-section community-page">
  <?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false): ?>
	<div class="lazy slider home-banner mb-0 ">
		<?php echo do_shortcode("[wp_owl id='1067']"); ?>
	</div>
<?php endif; ?>
    <div class="inner-content-banner position-absolute w-100 px-3">
       	<div class="container position-relative">
         	<div class="row" data-aos="fade-down" >
            	<div class="col-md-12">
            		<h1 class="text-white text-center f-600 mb-0 banner-heading" style="text-transform: uppercase;"><?php echo $page->post_title; ?></h1>
                <?php if($page->post_content != '') { ?>
               		<p class="text-white text-center f-400 mb-0 banner-discription font-20 font-Nunito"><?php echo $page->post_content; ?></p>
                <?php } ?>
            	</div>
         	</div>
        </div>
    </div>
</section>

<section id="explore" ng-controller="PropertyController as pCtrl" class="trust-pilot my-md-5 my-3 py-4 valle-crucis-exp-sec">
	<div class="container-fluid px-0">
		<div class="row mx-md-0 ">
			<div class="col-md-12 align-center mb-4 pb-2">
				<h2 class="text-center font-weight-light-bold text-blue mb-0"><?php echo $popular_places_heading[0]; ?></h2>
				<p class="font-18 font-Nunito text-black text-center"><?php echo $popular_places_subheading[0]; ?></p>
			</div>
    </div>
		<div class="row position-relative img-bar-line  mx-md-0 mx-3 ">
				<?php $count =0; foreach($explore_images as $explore_image) { ?>
					<div class="col-md-3 col-sm-6 col-12 px-md-0  pl-md-0 pr-md-1 valle-crucis-exp-sec-mob">
				        <figure class="mb-0 blog-image position-relative overflow-h w-100"><img datasrc="<?php echo $explore_image['image']['url']; ?>" lazy-load class="object-fit h-100 w-100"  alt="" />
				        	<a id="<?php echo $count; ?>" class="galleryopen" href="javascript:void(0)">
				          		<div class="hoverlay-blog animated zoomIn align-items-center text-center w-100 h-100 justify-content-center">
				            	<div class="inner-text text-white z-index"><i class="icon icon-plus-circle"></i><span class="w-100 d-inline-block text-uppercase"><?php echo $explore_image['name']; ?></span></div>
				          </div>&nbsp;
				          </a>
				        </figure>
				    </div>
				<?php $count++; } ?>
			</div>
	</div>
</section>

<section class="position-relative text-center">
   <div class="container">
      <div class="row slider-places">
        <?php foreach($popular_places_desc as $popular_places) { ?>
        	<div class="col-md-12 py-md-2">
        		<h2 class="text-blue font-weight-light-bold"><?php echo $popular_places['title']; ?></h2>
            <div class="font-15 font-Nunito"><?php echo $popular_places['content']; ?></div>
        	</div>
        <?php } ?>
      </div>
   </div>
</section>

<section class="trust-pilot mt-md-5 mt-4 py-md-5 py-4 bg-light">
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

<section id="featured" class="featureProperty theme-bg-color py-md-5 py-4">
  <div class="container" ng-controller="PropertyController as pCtrl" ng-cloak>
     <div class="row">
         <div  class="col-12 py-sm-4 pt-4 pb-3 text-center">
            <h2 class="text-white mb-md-0 f-property-heading font-weight-light-bold">The Homes Are As Impressive As The Views</h2>
            <h3 class="text-white mb-md-0 f-property-discription font-Nunito font-18">Your dream mountain home is here. In the heart of the high country.</h3>
         </div>
      </div>
      <div class="row" ng-init="search.resort_area_id=6460;sortBy='random';availabilitySearch();limit = searchSettings.propertyPagination; loadBtn = true">
         <div  ng-repeat="property in propertiesObj| orderBy: customSorting : sort | filter: priceRange | filter: amenityFilter | filter: amenityFilterOr | filter: bedroomFilter | filter: locationFilter | filter: neighborhoodFilter | filter: viewNameFilter" class="col-lg-4 col-sm-6 p-xl-3 px-md-2 px-3 pt-3  d-inline-flex">
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

                       <li class="list-inline-item mr-xl-4 mr-lg-0 mr-md-2 mr-sm-0 mr-2 d-flex flex-wrap align-items-center"><i class="icon icon-slumber font-20  mb-xl-0"></i><span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text"> <?php _e( 'Sleeps', 'streamline-core' ) ?> {[property.max_occupants]}</span></li>
 
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
            <a ng-if="total_units > 0 && loadBtn && !propertiesObj.length<12" ng-click="loadMore();" class="btn btn-outline-dark text-uppercase btn-ouline-white properties font-weight-light-bold"><?php _e('Load More', 'streamline-core') ?></a>
         </div>
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
            <?php $count = 0; foreach($explore_images as $explore_image) { ?>
                
                 <div>
                    <h5 class="gallery-heading text-white text-uppercase font-weight-semi-bold"><?php echo $explore_image['name'] ?></h5>
                    <img err-src="<?php ResortPro::assets_url('images/dummy-image.jpg'); ?>" lazy-load datasrc="<?php echo $explore_image['image']['url']; ?>"  class="carouselimage setminreq" />
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
       jQuery(".topmenu").children("a").html("Discover Valle Crucis");
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
       jQuery('.slider4').slick({
         dots: false,
         speed: 500,
         slidesToShow:1,
         prevArrow: "<a class='slider-left-arrow' href='#'><span class='icon icon-angle-left'></span></a>",
         nextArrow: "<a class='slider-right-arrow' href='#'><span class='icon icon-angle-right'></span></a>",
       });
        jQuery('.slider-places').slick({
          dots: true,
          speed: 500,
          slidesToShow:1,
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
            breakpoint: 768,
            settings: {
              dots: true,
              speed: 500,  
              slidesToShow: 1,
              slidesToScroll: 1,
              adaptiveHeight:false
            }
          },
          {
            breakpoint: 480,
            settings: {
              dots: true,
              speed: 500,              
              slidesToShow: 1,
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