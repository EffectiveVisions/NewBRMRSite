<?php
/**
 * Template Name: Searchbyarea
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
$galleries = get_field('gallery',$page->ID);
$banner_heading =  get_post_custom_values('banner_heading',$page->ID);
$activitiesandlocationheading = get_post_custom_values('activities_and_popular_location_heading',$page->ID);
$activitiesandlocationdescription = get_post_custom_values('activities_and_popular_location_description',$page->ID);
$sliders1  = get_field('activities_and_popular_location_slider',$page->ID); 

$sliders2 = get_field('slider_2',$page->ID); 

$perfectgatewayheading = get_post_custom_values('perfect_gateway_heading',$page->ID);

$perfectgatewaydescription = get_post_custom_values('perfect_gateway_description',$page->ID);

$luxury_homes_section = get_post_custom_values('luxury_homes_section',$page->ID);

?>

<section class="position-relative home-banner-section home-main-sec">
  <div class="lazy slider home-banner search-area-home mb-0">
     <?php echo do_shortcode("[wp_owl id='839']"); ?>

  </div>
    <div class="inner-content-banner position-absolute w-100 px-3">
       <div class="container position-relative">
         <div class="row">
            <div class="col-md-12">
              <?php if($banner_heading[0]!=""){ ?>
                <?php echo $banner_heading[0]; ?>
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
                           <ul class="list-unstyled mb-0 pl-md-4 pr-md-4 mt-sm-3 text-center text-sm-left vacation-listing mb-4 mb-sm-0">
                              <li class="list-inline-item mr-sm-4 mr-0 d-block d-sm-inline-block vacation-listing-item">
                               <a href="/" class="f-600 tabby text-uppercase font-13 text-white position-relative"> Vacation homes by date</a> 
                               </li>
                                 <li class="list-inline-item active-item d-block d-sm-inline-block vacation-listing-item">
                                  <a href="/vacation-homes-by-area" class="f-600 tabby text-uppercase font-13 text-white position-relative">Vacation homes by Area</a>
                               </li> 
                           </ul>
                        </div>
                        <div class="col-12 mt-2  propertyBanner py-3 rounded searchbyarea-banner">
                            
                           <?php if ( is_active_sidebar( 'vacation-home-by-area-widgets' ) ) { ?>
                                   <?php dynamic_sidebar( 'vacation-home-by-area-widgets' ); ?>
                            <?php } ?>
                            
                        </div>
                      </div> 
                  </div>
               </div>

                <div class="trustpilot-rating w-100 mt-md-0 pt-md-0 mt-sm-3 pt-4">
                  <div class="d-flex flex-wrap justify-content-center  justify-content-md-start align-items-center">
                      <figure class="mb-0 rating-one">
                          <div class="trustpilot-widget" data-locale="en-US" data-template-id="5419b637fa0340045cd0c936" data-businessunit-id="552521730000ff00057e9fd1" data-style-height="20px" data-style-width="100%" data-theme="dark">
                          </div>
                          <div class="trustpilot-widget" data-locale="en-US" data-template-id="5613c9cde69ddc09340c6beb" data-businessunit-id="552521730000ff00057e9fd1" data-style-height="100px" data-style-width="100%" data-theme="dark">
                          </div>
                      </figure>
                       <figure class="mb-0   rating-two mr-lg-4 pr-md-2 mr-lg-3 mr-md-4 mt-md-0 mt-4 ml-md-auto mt-md-3 pt-md-4 pl-md-0 pl-sm-4">
                          <div style="padding-bottom: 10px;" class="text-center"><a href="http://www.bbb.org/northwestern-north-carolina/business-reviews/vacation-rentals/blue-ridge-mountain-rentals-inc-in-blowing-rock-nc-4002074/#bbbonlineclick" target="_blank" rel="nofollow noopener"><img style="border: 0;" src="https://seal-nwnc.bbb.org/seals/blue-seal-200-65-bbb-4002074.png" alt="Blue Ridge Mountain Rentals, Inc. BBB Business Review" /></a></div>
                      </figure>
                      </div>
                </div>

             </div>
          </div>

</section>

<section class="announcement-sec">
  <div class="container">
   
    </div>
</section>

<section class="places py-md-5 py-4 my-4 mt-sm-3">
  <?php /*if ( is_active_sidebar( 'vacationareainfoplaces' ) ) { ?>
    <?php dynamic_sidebar( 'vacationareainfoplaces' ); ?>
  <?php }*/ ?>          
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 align-center mb-sm-4 mb-3 pb-2">
          <h2 class="trust-pilot-heading text-center font-weight-light-bold text-blue mb-sm-0">
            EXPLORE, FIND REST, BE INSPIRED
          </h2>
      </div>
    </div>
    <div class="row">
     
      <?php $count = 0; foreach($galleries as $gallery) { ?>
      <div class="col-md-3 col-sm-4 col-12 custome-padding-gallery pb-1">
        <figure class="mb-0 blog-image position-relative overflow-h w-100">
          <img class="object-fit h-100 w-100" src="<?php echo $gallery['image']['sizes']['medium_large']; ?>" alt="" />
        <a id="<?php echo $count; ?>" class="galleryopen" href="javascript:void(0)">
          <div class="hoverlay-blog animated zoomIn align-items-center text-center w-100 h-100 justify-content-center">
            <div class="inner-text text-white z-index"><i class="icon icon-plus-circle"></i><span class="w-100 d-inline-block text-uppercase"><?php echo $gallery['text'] ?></span></div>
          </div>&nbsp;
          </a>
        </figure>
      </div>
    <?php $count++; } ?>
    </div>

    
  </div>
</section>

<section class="info py-lg-5 py-md-2 my-lg-5 mb-5 pt-4 pt-sm-0">
    <div class="container">
        <?php if($luxury_homes_section[0]!=""){ ?>
       
               <?php echo $luxury_homes_section[0] ?>
        
        <?php } ?>
    </div>
</section>

<section class="featureProperty theme-bg-color py-md-5 py-4 ">
  <div class="container" ng-controller="PropertyController as pCtrl" ng-cloak>
     <div class="row">
         <div data-aos="fade-down" data-aos-duration="3000" class="col-12 py-sm-4 pt-4 pb-3 text-center">
            <h2 class="text-white mb-0 f-property-heading">FEATURED PROPERTIES</h2>
         </div>
      </div>
      <div class="row" ng-init="search.amenities_filter='129951';sortBy='random';availabilitySearch();">
         <div data-aos="fade-down" data-aos-duration="500" ng-repeat="property in propertiesObj| orderBy: customSorting : sort | filter: priceRange | filter: amenityFilter | filter: amenityFilterOr | filter: bedroomFilter | filter: locationFilter | filter: neighborhoodFilter | filter: viewNameFilter | limitTo: 20" class="col-lg-4 col-sm-6 p-xl-3 px-md-2 px-3 pt-3  d-inline-flex">
          <div class="inner-div p-lg-1 d-inline-block w-100">
              <div class="property bg-white">
                 <div ng-click="go(property.seo_page_name)" class="propertyImage">
                    <img src="{[property.default_thumbnail_path]}" class="img-fluid" alt="" />
                 </div>
                 <div class="propertyDetail py-4 px-3">
                    <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}"><h6  class="mb-0 text-blue f-600 pro-name-heading">{[property.name]}</h6></a>
                     <div class="star-rating" ng-if="property.rating_average > 0">
                        <div class="star-rating" star-rating rating-value="property.rating_average" data-max="5"></div>
                        <span class="rating_number">({[property.rating_count]})</span>
                      </div>
                      <div class="star-rating no-rating font-13 text-black font-weight-light-bold" ng-if="!property.rating_average > 0">
                          <span>No rating available</span>
                      </div>
                    <ul class="list-unstyled detailsaboutproperty mt-2 mb-4 d-flex flex-md-wrap flex-sm-nowrap flex-wrap">
                       <li class="list-inline-item mr-xl-4 mr-lg-0 mr-md-2 mr-sm-0 mr-2  d-flex flex-wrap align-items-center">
                         <img src="http://blueridg.protacto.com/wp-content/uploads/2019/04/bed.svg" class="w-20" alt="bed-image">
                         <span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text">{[property.bedrooms_number]} <?php _e( 'Beds', 'streamline-core' ) ?></span></li>
                       
                       <li class="list-inline-item mr-xl-4 mr-lg-0 mr-md-2 mr-sm-0 mr-2 d-flex flex-wrap align-items-center">
                         <img src="http://blueridg.protacto.com/wp-content/uploads/2019/04/slumber.svg" class="w-20" alt="slumber-image">
                         <span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text"> <?php _e( 'Sleeps', 'streamline-core' ) ?> {[property.max_occupants]}</span></li>


                       <li class="list-inline-item d-flex flex-wrap align-items-center">
                         <img src="http://blueridg.protacto.com/wp-content/uploads/2019/04/shower.svg" class="w-20" alt="shower-image">
                         <span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text">{[property.bathrooms_number]} <?php _e( 'Bathrooms', 'streamline-core' ) ?></span></li>
                    </ul>

                   <h6 class="font-12 text-uppercase mb-3 night propertypackage"> <strong class="f-15">{[property.price_data.daily | currency]} </strong>avg/night</h6>
                       <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}"  class="btn btn-warning  text-uppercase w-100 font-13"><?php _e( 'CHECK AVAILABILITY', 'streamline-core' ) ?></a>
                 </div>
              </div>
          </div>
         </div>
         <div class="col-md-12 text-center mt-5 mb-4">
            <a href="/search-results/?" class="btn btn-outline-dark text-uppercase btn-ouline-white properties font-weight-light-bold">Search All properties</a>
         </div>
      </div>
  </div>
</section>

<section class="trust-pilot my-sm-5 mt-5 py-4">
    <div class="container">
       <div class="row">
          <div class="col-md-12 align-center mb-sm-5 mb-4 pb-2">
            <?php if($activitiesandlocationheading[0] != '') { ?>
             <h2 class="trust-pilot-heading text-center font-weight-light-bold text-blue mb-sm-0"><?php echo $activitiesandlocationheading[0] ?></h2>
             <?php } ?>
             <?php if($activitiesandlocationdescription[0] != '') { ?>
                <p class="font-18 font-Nunito text-black text-center">
                  <?php echo $activitiesandlocationdescription[0] ?>
                </p>
             <?php } ?>
          </div>
          <div class="col-md-12">
             <div class="slider1">
               <?php foreach($sliders1 as $sliders){ ?>
                  <div class="col-lg-3 col-sm-6 col-12">
                     <figure class="mb-0 blog-image overflow-h w-100">
                        <img class="h-100 w-100 object-fit" src="<?php echo $sliders['image']['url']; ?>" alt="slider-image" />
                        <figcaption class="figure-caption populer-caption px-xl-4 px-3 position-relative mx-1 ">
                           <div class="d-inline-block w-100 bg-white shadow-bottom p-xl-4 p-md-3 p-2">
                              <?php echo $sliders['description'] ?>
                              
                           </div>
                        </figcaption>
                     </figure>
                  </div>
                <?php } ?> 
                
             </div>
          </div>
       </div>
    </div>
</section>

<section class="centermode-slider mb-5">
    <div class="bg-white">
         <div class="slider2">
          <?php foreach($sliders2 as $sliders){ ?>
            <div class="slider-inner-container position-relative">
               <figure class="mb-0 rating-one"><img class="h-100 w-100 object-fit" src="<?php echo $sliders['image']['url']; ?>" alt="" /></figure>
               <div class="slider-text w-100 pl-md-5 px-3 row mx-0 align-items-end">
                  <div class="text d-inline-block w-100 z-index mb-sm-4 pb-2 custom-slider-data">
                    <?php echo $sliders["description"] ?>
                  </div>
               </div>
            </div>
           <?php } ?>
         </div>
    </div>        
</section>

<section  class="findtheperfect theme-bg-color py-5 mt-2 d-inline-block w-100">
  <div class="container pt-sm-5 pb-1">
   <div class="row">
      <div class="col-md-12 text-center ">
        <?php if($perfectgatewayheading[0]!=''){ ?>
           <h2 class="font-weight-light-bold text-white findtheperfect-heading"><?php echo $perfectgatewayheading[0] ?></h2>
         <?php } ?>
         <?php if($perfectgatewaydescription[0]!=''){ ?>
         <p class="font-Nunito font-18 text-white">
            <?php echo $perfectgatewaydescription[0]; ?>
         </p>
         <?php } ?>
      </div>
      <div class="col-md-12 text-center mt-3 pt-1 mb-sm-4"><a href="/search-results" class="btn btn-warning text-uppercase font-14 font-weight-light-bold custome-explore-btn text-color">Explore</a></div>
   </div>
   </div>
</section>



<div id="gallerymodal" class="modal fade gallery-modal gallery-vac " role="dialog">
  <div class="modal-dialog modal-lg  modal-dialog-centered">
    <div class="modal-content gallerycontent px-sm-4 px-3 pb-4">
      <div class="modal-header galleryheader pb-2 px-0 position-absolute">
        <button type="button" id="slick-popup-close" class="close close-search text-white" data-dismiss="modal"><i class="icon icon-plus close-popup d-block" style="transform: rotate(45deg);"></i></button>
      </div>
      <div class="modal-body px-0 pb-0">
          <div class="slider4">
            <?php $count = 0; foreach($galleries as $gallery) { ?>
                
                 <div>
                    <h5 class="gallery-heading text-white text-uppercase font-weight-semi-bold"><?php echo $gallery['text'] ?></h5>
                    <img  class="carouselimage" src="<?php echo $gallery['image']['sizes']['large']; ?>"/>
                 </div>
           <?php $count++; } ?>
          </div>

          <div class="image-slick-loader row mx-0 align-items-center justify-content-center" style="display: none; 	position: absolute;top: 30vh;	left: 25vw;">
            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
          </div>

      </div>
    </div>
  </div>
</div>

<?php echo get_footer();?>
<!-- here javscript code text -->
<script>
   jQuery(document).ready(function(){
    jQuery("#vacationarea").bind("paste", function(e){
      setTimeout(() => {
        var all =  document.querySelectorAll(".dropdown-menu li");
        if(all && all.length){
          for(var i=0; i< all.length; i++){
            all[i].style.display = "none";
          }
        }
        var arr =   document.querySelectorAll(".dropdown-menu li a strong")
        if(arr && arr.length){
          for(var i=0; i< arr.length; i++){
            arr[i].parentElement.parentElement.style.display = "block";
          }
        }
      }, 500);

    });


    jQuery(".filter-count-btn").bind('touchend', function(e) {
         e.preventDefault(); 
         jQuery(this).click();
    });

    jQuery('#resortpro-search-area-block-idclass-homeless').addClass("px-0");

      jQuery('#search-widget-main-rowresortpro_search_widget-16 .col-sm-6').addClass('custom-space');
      jQuery("#resortpro-search-guests-dropdown-block-idclass-homeless").addClass("custom-space");
       jQuery('.slider4').slick({
         dots: false,
         speed: 500,
         slidesToShow:1,
         prevArrow: "<a class='slider-left-arrow' href='#'><span class='icon icon-angle-left'></span></a>",
         nextArrow: "<a class='slider-right-arrow' href='#'><span class='icon icon-angle-right'></span></a>",
       });
       jQuery('.slider1').slick({
         dots: false,
         speed: 500,
         slidesToShow:3,
         slidesToScroll: 1,
         responsive: [
         {
            breakpoint: 991,
            settings: {
              arrows:true,
              dots: false,
              speed: 500,
              slidesToShow: 2,
              slidesToScroll: 2,
            }
          },
         {
            breakpoint: 767,
            settings: {
              arrows:true,
              dots: false,
              speed: 500,
              slidesToShow: 2,
              slidesToScroll: 2,
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows:true,
              dots: false,
              speed: 500,
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          }]
       });

        jQuery('.slider2').slick({
         dots: false,
         speed: 500,
         slidesToShow:1,
         adaptiveHeight:false,
         slidesToScroll: 1,
         centerMode:true,
         centerPadding:'80px',
         responsive: [{
            breakpoint: 767,
            settings: {
              dots: false,
              speed: 500,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1,
              slidesToScroll: 1,
              adaptiveHeight:false
            }
          },
          {
            breakpoint: 567,
            settings: {
              dots: false,
              speed: 500,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1,
              slidesToScroll: 1,
              adaptiveHeight:false
            }
          }]
       });


      var first = true;
      jQuery('.galleryopen').click(function () {
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

      // jQuery('.slider2').on('afterChange', function(event, slick, currentSlide, nextSlide){
      //     console.log(currentSlide);
      //     jQuery('.custom-slider-data').hide();
      //     jQuery('.custom-slider-data:eq('+nextSlide+')').show();
      // });

   });
</script>
