<?php
/**
* The template for displaying pages
*
* This is the template that displays all resortpro listings by default.
* You can override this template by creating your own "my_theme/template/page-resortpro-listing-detail.php" file
*
* @package    ResortPro
* @since      v1.0
*/


?>

<div id="main-part" ng-controller="PropertyController as pCtrl" ng-init="initializeData(); propertyId=<?php echo $property['id']; ?>" >
   <!--Slider Part-->
   <div class="c-property-slider__inner master-slider ms-skin-default ms-lightbox-template property-single-slider-con" id="masterslider2" data-slider-width="2000" data-slider-height="800" data-slider-controls="<?php echo $options['property_slider_controls'] ?>">
       <?php if(count($property_gallery) > 0) : ?>
           <?php foreach ($property_gallery as $image): ?>
              <div class="ms-slide slider property-single-slider">
                 <img src="<?php ResortPro::assets_url('masterslider/blank.gif'); ?>" data-src="<?php echo $image['image_path'] ?>" alt="<?php echo $image['id'] ?>" />
                 <?php if($show_captions && is_string($image['description']) && !empty($image['description'])): ?>
                     <div class="ms-layer ms-caption">
                       <?php echo $image['description'] ?>
                     </div>
                 <?php endif; ?>
                 <img datasrc="<?php echo $image['image_path'] ?>" lazy-load class="ms-thumb" alt="<?php echo $image['description'] ?>" />
              </div>
           <?php endforeach; ?>
         <?php else : ?>
          <div class="ms-slide slider property-single-slider">
             <img src="<?php ResortPro()->assets_url('masterslider/blank.gif'); ?>"
              data-src="<?php echo $property['default_image_path']; ?>"
              alt="<?php echo $property['name']; ?>" />
              <img lazy-load datasrc="<?php echo $property['default_thumbnail_path'] ?>" class="ms-thumb" 
              alt="<?php echo wp_strip_all_tags( $property['short_description'], true ); ?>"/>
          </div>
       <?php endif; ?>
   </div>
   <!--End Slider Part -->

   <!--Filter Section -->
   <div class="position-relative d-inline-block w-100 filter overflow-h-pad">
    <section  class="filter-single-property-section   position-relative  animated slideOutRight z-index">
    <div class="toggle-filter-close d-xl-none d-md-block d-none"></div>
    <div id="book_now_mobile" class="filter-single-property side-custome-scroller px-2  px-sm-4 px-2 py-2 shadow ">
         <div class="row mx-0 px-2 px-sm-0 px-md-1">
            <h3 class="text-center w-100 display-4" style="font-family: 'arial', sans-serif;"><span class="font-weight-light-bold" >$<?php echo $property['price_data']['daily']; ?></span>&nbsp;<span class="text-uppercase display-5 text-muted">Avg/night</span></h3>
             <?php if ($property['rating_average'] > 0): ?>
              <div class="star-rating divider position-relative font-14 d-flex justify-content-center align-items-center w-100" scroll-to="reviews-title"  style="cursor:pointer">
                 <div class="star-rating  px-0 text-right col" star-rating rating-value=" <?php echo $property['rating_average'] ?>" data-max="5">
                 </div>
                 <span class="col px-0 text-blue text-capitalize font-weight-light-bold" >
                 <?php $reviews_txt = ($property['rating_count'] > 1) ? ' reviews' : ' review'; ?>  (
                 <?php echo $property['rating_count'] ?>
                 <?php echo $reviews_txt ?> )    
                 </span>
              </div>
              <?php endif; ?>
            <ul class="list-unstyled detailsaboutproperty detailsaboutproperty-filter mt-2 mb-4 w-100 d-flex justify-content-md-between justify-content-sm-center  px-3">
               <li class="list-inline-item d-inline-flex flex-wrap align-items-center">
                  <img datasrc="/wp-content/uploads/2019/04/bed.svg" lazy-load class="w-20" alt="bed-image">
                  <span class="text-color font-13 ml-2 font-Nunito font-weight-bold text"><?php echo $property['bedrooms_number']; ?> <?php _e( 'Beds', 'streamline-core' ) ?></span>
                </li>
               <li class="list-inline-item d-inline-flex flex-wrap align-items-center">
                  <img datasrc="/wp-content/uploads/2019/04/slumber.svg" lazy-load class="w-20" alt="slumber-image">
                  <span class="text-color font-13 ml-2 font-Nunito font-weight-bold text"> <?php _e( 'Sleeps', 'streamline-core' ) ?> <?php echo $property['max_occupants']; ?></span>
                </li>
              <li class="list-inline-item d-inline-flex flex-wrap align-items-center">
                  <img datasrc="/wp-content/uploads/2019/04/shower.svg" lazy-load class="w-20" alt="shower-image">
                  <span class="text-color font-13 ml-2 font-Nunito font-weight-bold text"><?php echo $property['bathrooms_number']; ?> <?php _e( 'Bathrooms', 'streamline-core' ) ?></span>
              </li>
            </ul>
            <div class="d-flex w-100 justify-content-center">
                <button class="btn text-uppercase text-blue font-14  btn-custom Photos btn-1 mr-2 photos"><?php _e( 'View Photos', 'streamline-core' ) ?></button>
                <?php if(isset($options['unit_tab_virtualtour']) && $options['unit_tab_virtualtour'] == 1 && (!empty($property['virtual_tour_url']))): ?>
                    <button class="btn theme-btn text-uppercase btn font-14 ml-md-auto  btn-custom ml-2 virtualtour"> <?php _e( '3D virtual Tour', 'streamline-core' ) ?></button>
                <?php endif; ?>
             </div>
            <div  ng-controller="CheckoutController as cCtrl" class="checkout-controller d-inline-block w-100 filtersearch">
               <div ng-init="maxOccupants='<?php echo $max_children; ?>'; isDisabled=true; total_reservation=0; book.unit_id=<?php echo $property['id'] ?>; book.occupants_small='<?php echo $occupants_small; ?>'; book.checkin='<?php echo $start_date; ?>';book.checkout='<?php echo $end_date ?>';hash='<?php echo $hash; ?>';referrer_url='<?php echo $checkout_url; ?>'; checkout.country='US';unit=<?php echo $property['id'] ?>;getPreReservationPrice2(book, 0)">
                <button class="bookvacation" style="display:none" ng-click="setNights()"></button>
                 <div ng-init="initCheckout()">
                      <div class="main_cnt_step_1 container_background">
                        <div class="guest_check">
                          <span><i class="fa fa-check"></i></span>
                          <span class="st_1">1. <?php _e('Dates & Guests','streamline-core') ?></span>
                        </div>
                        <div id="step0" class="panel-collapse" role="tabpanel">
                          <?php include($step_1); ?>
                        </div> 
                     </div> 
                     <div class="main_cnt_step_2 container_background">
                        <div class="guest_check">
                          <span><i class="fa fa-check"></i></span>
                          <span class="st_2">2. <?php _e('Your Details','streamline-core') ?></span>
                        </div>
                        <div id="step1" class="panel-collapse collapse" role="tabpanel">
                          <?php include($step_2); ?>
                        </div> 
                    </div>
                    <div class="main_cnt_step_3 container_background">
                        <div class="guest_check">
                          <span><i class="fa fa-check"></i></span>
                          <span class="st_3">3. <?php _e('Protect Your Investment','streamline-core') ?>
                          </span>
                        </div>
                        <div id="step2" class="panel-collapse collapse" role="tabpanel">
                          <?php include($step_3); ?>
                        </div> 
                    </div>
                    <div class="main_cnt_step_4 container_background">
                        <div class="guest_check">
                          <span><i class="fa fa-check"></i></span>
                          <span class="st_4">4. <?php _e('Secure Payments','streamline-core') ?></span>
                        </div>
                        <div id="step3" class="panel-collapse collapse" role="tabpanel">
                          <?php include($step_4); ?>
                        </div> 
                    </div> 
                 </div>
               </div>
            </div>
          </div>
       </div>
     </section>
     <!--End Filter Section -->


   <!--Property Detail Listing -->

   <div class="property-data-section position-relative ">
       <section id="propertymenu" class="property-deatail-section bg-white py-md-3 position-change-mob">
          <div class="container">
            <div class="row">

                <ul sticky class="list-inline-item m-md-0 m-sm-auto pl-md-0 px-3 d-flex flex-wrap custome-w-pro-page justify-content-md-between font-14 property-listing">
                  <li class="list-inline-item d-md-inline-block d-flex font-weight-light-bold justify-content-md-start justify-content-center"><a class="overview text-blue d-flex align-items-center" href="javascript:void(0)"><svg  class="mr-md-2 fill-icon-color" version="1.1" id="Capa_1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px"
   width="20px" height="20px" viewBox="0 0 460.298 460.297" style="enable-background:new 0 0 460.298 460.297;"
   xml:space="preserve">
  <g>
    <path d="M230.149,120.939L65.986,256.274c0,0.191-0.048,0.472-0.144,0.855c-0.094,0.38-0.144,0.656-0.144,0.852v137.041
      c0,4.948,1.809,9.236,5.426,12.847c3.616,3.613,7.898,5.431,12.847,5.431h109.63V303.664h73.097v109.64h109.629
      c4.948,0,9.236-1.814,12.847-5.435c3.617-3.607,5.432-7.898,5.432-12.847V257.981c0-0.76-0.104-1.334-0.288-1.707L230.149,120.939
      z"/>
    <path  d="M457.122,225.438L394.6,173.476V56.989c0-2.663-0.856-4.853-2.574-6.567c-1.704-1.712-3.894-2.568-6.563-2.568h-54.816
      c-2.666,0-4.855,0.856-6.57,2.568c-1.711,1.714-2.566,3.905-2.566,6.567v55.673l-69.662-58.245
      c-6.084-4.949-13.318-7.423-21.694-7.423c-8.375,0-15.608,2.474-21.698,7.423L3.172,225.438c-1.903,1.52-2.946,3.566-3.14,6.136
      c-0.193,2.568,0.472,4.811,1.997,6.713l17.701,21.128c1.525,1.712,3.521,2.759,5.996,3.142c2.285,0.192,4.57-0.476,6.855-1.998
      L230.149,95.817l197.57,164.741c1.526,1.328,3.521,1.991,5.996,1.991h0.858c2.471-0.376,4.463-1.43,5.996-3.138l17.703-21.125
      c1.522-1.906,2.189-4.145,1.991-6.716C460.068,229.007,459.021,226.961,457.122,225.438z"/>
</g>
</svg> <span class="d-md-block d-none">Overview</span></a></li>
                  <?php if (isset($options['unit_tab_amenities']) && $options['unit_tab_amenities'] == 1 &&  (count($property['unit_amenities']['amenity']) > 0)): ?>
                       <li class="list-inline-item d-md-inline-block d-flex font-weight-light-bold justify-content-md-start justify-content-center">
                        <a href="javascript:void(0)" class="text-blue amenities d-flex align-items-center">
                           <svg version="1.1" id="Capa_1" class="mr-md-2  fill-icon-color" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px"
                           viewBox="0 0 611.989 611.988" style="enable-background:new 0 0 611.989 611.988;"
                           xml:space="preserve">
                        <g>
                          <g id="Wi-Fi">
                            <g>
                              <path  d="M305.994,417.769c-30.85,0-55.887,25.037-55.887,55.887s25.038,55.887,55.887,55.887s55.887-25.037,55.887-55.887
                                S336.843,417.769,305.994,417.769z M605.436,222.369C530.697,133.434,421.549,82.446,305.994,82.446
                                S81.309,133.434,6.551,222.369c-9.93,11.811-8.402,29.434,3.428,39.363c5.234,4.396,11.587,6.558,17.939,6.558
                                c7.973,0,15.891-3.391,21.423-9.967c64.084-76.248,157.639-119.989,256.652-119.989c99.013,0,192.568,43.741,256.651,119.971
                                c5.533,6.576,13.45,9.967,21.424,9.967c6.353,0,12.724-2.143,17.958-6.558C613.837,251.802,615.366,234.161,605.436,222.369z
                                 M305.994,194.22c-82.545,0-160.489,36.419-213.879,99.926c-9.929,11.811-8.402,29.434,3.428,39.363
                                c5.234,4.396,11.605,6.558,17.958,6.558c7.973,0,15.891-3.391,21.405-9.967c42.716-50.838,105.086-79.993,171.089-79.993
                                c66.003,0,128.372,29.155,171.107,79.993c5.533,6.595,13.45,9.967,21.404,9.967c6.353,0,12.724-2.143,17.959-6.558
                                c11.829-9.929,13.356-27.57,3.428-39.363C466.483,230.64,388.539,194.22,305.994,194.22z M305.994,305.994
                                c-49.553,0-96.331,21.852-128.335,59.948c-9.93,11.811-8.402,29.434,3.428,39.363c5.234,4.396,11.605,6.557,17.958,6.557
                                c7.973,0,15.891-3.39,21.405-9.966c21.368-25.429,52.552-40.016,85.544-40.016s64.177,14.587,85.544,40.016
                                c5.533,6.595,13.45,9.966,21.405,9.966c6.353,0,12.724-2.142,17.958-6.557c11.83-9.93,13.357-27.553,3.428-39.363
                                C402.324,327.846,355.546,305.994,305.994,305.994z" />
                            </g>
                          </g>
                        </g>
                        </svg> <span class="d-md-block d-none"><?php _e( 'Amenities', 'streamline-core' ) ?></span>
                        </a>
                       </li>
                  <?php endif; ?>
                  <li class="list-inline-item d-md-inline-block d-flex font-weight-light-bold justify-content-md-start justify-content-center"><a href="javascript:void(0)" class="text-blue description  d-flex align-items-center"><svg version="1.1" class="mr-md-2  fill-icon-color" id="Capa_1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px"
   width="20px" height="20px" viewBox="0 0 438.533 438.533" style="enable-background:new 0 0 438.533 438.533;"
   xml:space="preserve">
  <g>
    <path  d="M396.283,130.188c-3.806-9.135-8.371-16.365-13.703-21.695l-89.078-89.081c-5.332-5.325-12.56-9.895-21.697-13.704
      C262.672,1.903,254.297,0,246.687,0H63.953C56.341,0,49.869,2.663,44.54,7.993c-5.33,5.327-7.994,11.799-7.994,19.414v383.719
      c0,7.617,2.664,14.089,7.994,19.417c5.33,5.325,11.801,7.991,19.414,7.991h310.633c7.611,0,14.079-2.666,19.407-7.991
      c5.328-5.332,7.994-11.8,7.994-19.417V155.313C401.991,147.699,400.088,139.323,396.283,130.188z M255.816,38.826
      c5.517,1.903,9.418,3.999,11.704,6.28l89.366,89.366c2.279,2.286,4.374,6.186,6.276,11.706H255.816V38.826z M365.449,401.991
      H73.089V36.545h146.178v118.771c0,7.614,2.662,14.084,7.992,19.414c5.332,5.327,11.8,7.994,19.417,7.994h118.773V401.991z"/>
    <path  d="M319.77,292.355h-201c-2.663,0-4.853,0.855-6.567,2.566c-1.709,1.711-2.568,3.901-2.568,6.563v18.274
      c0,2.67,0.856,4.859,2.568,6.57c1.715,1.711,3.905,2.567,6.567,2.567h201c2.663,0,4.854-0.856,6.564-2.567s2.566-3.9,2.566-6.57
      v-18.274c0-2.662-0.855-4.853-2.566-6.563C324.619,293.214,322.429,292.355,319.77,292.355z"/>
    <path  d="M112.202,221.831c-1.709,1.712-2.568,3.901-2.568,6.571v18.271c0,2.666,0.856,4.856,2.568,6.567
      c1.715,1.711,3.905,2.566,6.567,2.566h201c2.663,0,4.854-0.855,6.564-2.566s2.566-3.901,2.566-6.567v-18.271
      c0-2.663-0.855-4.854-2.566-6.571c-1.715-1.709-3.905-2.564-6.564-2.564h-201C116.107,219.267,113.917,220.122,112.202,221.831z"
      />
  </g>
</svg> <span class="d-md-block d-none">Description</span></a></li>
                  <li class="list-inline-item d-md-inline-block d-flex font-weight-light-bold justify-content-md-start justify-content-center"><a href="javascript:void(0)" class="text-blue rates d-flex align-items-center"><svg  class="mr-md-1  fill-icon-color" version="1.1" id="Capa_1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 484.184 484.184" class="text-blue" style="enable-background:new 0 0 484.184 484.184;"  width="18px" height="20px" xml:space="preserve">
<g>
  <path d="M309.43,219.944c-19-10.5-39.2-18.5-59.2-26.8c-11.6-4.8-22.7-10.4-32.5-18.2c-19.3-15.4-15.6-40.4,7-50.3
    c6.4-2.8,13.1-3.7,19.9-4.1c26.2-1.4,51.1,3.4,74.8,14.8c11.8,5.7,15.7,3.9,19.7-8.4c4.2-13,7.7-26.2,11.6-39.3
    c2.6-8.8-0.6-14.6-8.9-18.3c-15.2-6.7-30.8-11.5-47.2-14.1c-21.4-3.3-21.4-3.4-21.5-24.9c-0.1-30.3-0.1-30.3-30.5-30.3
    c-4.4,0-8.8-0.1-13.2,0c-14.2,0.4-16.6,2.9-17,17.2c-0.2,6.4,0,12.8-0.1,19.3c-0.1,19-0.2,18.7-18.4,25.3c-44,16-71.2,46-74.1,94
    c-2.6,42.5,19.6,71.2,54.5,92.1c21.5,12.9,45.3,20.5,68.1,30.6c8.9,3.9,17.4,8.4,24.8,14.6c21.9,18.1,17.9,48.2-8.1,59.6
    c-13.9,6.1-28.6,7.6-43.7,5.7c-23.3-2.9-45.6-9-66.6-19.9c-12.3-6.4-15.9-4.7-20.1,8.6c-3.6,11.5-6.8,23.1-10,34.7
    c-4.3,15.6-2.7,19.3,12.2,26.6c19,9.2,39.3,13.9,60,17.2c16.2,2.6,16.7,3.3,16.9,20.1c0.1,7.6,0.1,15.3,0.2,22.9
    c0.1,9.6,4.7,15.2,14.6,15.4c11.2,0.2,22.5,0.2,33.7-0.1c9.2-0.2,13.9-5.2,13.9-14.5c0-10.4,0.5-20.9,0.1-31.3
    c-0.5-10.6,4.1-16,14.3-18.8c23.5-6.4,43.5-19,58.9-37.8C386.33,329.544,370.03,253.444,309.43,219.944z" />
</g>
</svg> <span class="d-md-block d-none">Rates</span></a>
</li> 
                <?php if(isset($options['unit_tab_reviews']) && $options['unit_tab_reviews'] == 1): ?>
                 <li ng-if="reviews.length!=0" class="list-inline-item d-md-inline-block d-flex font-weight-light-bold justify-content-md-start justify-content-center justify-content-md-start justify-content-center">
                    <a  href="javascript:void(0)" class="text-blue reviews  d-flex align-items-center">
                      <i class="icon icon-star font-20 mr-md-2  fill-icon-color"></i> 
                      <span class="d-md-block d-none">Reviews</span>
                    </a>
                  </li>
                  <?php endif; ?>
                  <?php if(isset($options['unit_tab_availability']) && $options['unit_tab_availability'] == 1): ?>
                       <li class="list-inline-item d-md-inline-block d-flex font-weight-light-bold justify-content-md-start justify-content-center">
                        <a class="availabilitylink text-blue d-flex align-items-center" href="javascript:void(0)">
                         <svg   class="mr-md-2  fill-icon-color" version="1.1" id="Capa_1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px"
   width="20px" height="20px" viewBox="0 0 511.634 511.634" style="enable-background:new 0 0 511.634 511.634;"
   xml:space="preserve">
<g>
  <path d="M482.513,83.942c-7.225-7.233-15.797-10.85-25.694-10.85h-36.541v-27.41c0-12.56-4.477-23.315-13.422-32.261
    C397.906,4.475,387.157,0,374.591,0h-18.268c-12.565,0-23.318,4.475-32.264,13.422c-8.949,8.945-13.422,19.701-13.422,32.261v27.41
    h-109.63v-27.41c0-12.56-4.475-23.315-13.422-32.261C178.64,4.475,167.886,0,155.321,0H137.05
    c-12.562,0-23.317,4.475-32.264,13.422c-8.945,8.945-13.421,19.701-13.421,32.261v27.41H54.823c-9.9,0-18.464,3.617-25.697,10.85
    c-7.233,7.232-10.85,15.8-10.85,25.697v365.453c0,9.89,3.617,18.456,10.85,25.693c7.232,7.231,15.796,10.849,25.697,10.849h401.989
    c9.897,0,18.47-3.617,25.694-10.849c7.234-7.234,10.852-15.804,10.852-25.693V109.639
    C493.357,99.739,489.743,91.175,482.513,83.942z M137.047,475.088H54.823v-82.23h82.224V475.088z M137.047,374.59H54.823v-91.358
    h82.224V374.59z M137.047,264.951H54.823v-82.223h82.224V264.951z M130.627,134.333c-1.809-1.809-2.712-3.946-2.712-6.423V45.686
    c0-2.474,0.903-4.617,2.712-6.423c1.809-1.809,3.946-2.712,6.423-2.712h18.271c2.474,0,4.617,0.903,6.423,2.712
    c1.809,1.807,2.714,3.949,2.714,6.423v82.224c0,2.478-0.909,4.615-2.714,6.423c-1.807,1.809-3.946,2.712-6.423,2.712H137.05
    C134.576,137.046,132.436,136.142,130.627,134.333z M246.683,475.088h-91.365v-82.23h91.365V475.088z M246.683,374.59h-91.365
    v-91.358h91.365V374.59z M246.683,264.951h-91.365v-82.223h91.365V264.951z M356.323,475.088h-91.364v-82.23h91.364V475.088z
     M356.323,374.59h-91.364v-91.358h91.364V374.59z M356.323,264.951h-91.364v-82.223h91.364V264.951z M349.896,134.333
    c-1.807-1.809-2.707-3.946-2.707-6.423V45.686c0-2.474,0.9-4.617,2.707-6.423c1.808-1.809,3.949-2.712,6.427-2.712h18.268
    c2.478,0,4.617,0.903,6.427,2.712c1.808,1.807,2.707,3.949,2.707,6.423v82.224c0,2.478-0.903,4.615-2.707,6.423
    c-1.807,1.809-3.949,2.712-6.427,2.712h-18.268C353.846,137.046,351.697,136.142,349.896,134.333z M456.812,475.088h-82.228v-82.23
    h82.228V475.088z M456.812,374.59h-82.228v-91.358h82.228V374.59z M456.812,264.951h-82.228v-82.223h82.228V264.951z"/>
</g>
</svg> <span class="d-md-block d-none"><?php _e( 'Availability', 'streamline-core' ) ?></span>
                        </a>
                       </li>
                   <?php endif; ?>
                </ul>
            </div>
         </div>
       </section>
        <section id="detailsec"  class="abudent-sec">
            
          <div class="container">
             <div class="custome-w-pro-page position-relative">
               <div class="row">
                  <div class="mt-4 pt-2 w-100 px-lg-3 px-md-0 px-sm-3">
                   <div class="row mx-0 align-items-center">
                    <h3 class="text-blue mb-1 font-weight-semi-bold heading-26 order-sm-1 order-2 ">
                      <?php 
                         if (empty($property['name']) || $property['name'] == 'Home') {
                                echo $property['location_name'];
                            } else {
                                echo $property['name'];
                            } 
                      ?>
                    </h3>
                    <div class="ml-sm-auto my-sm-0 mb-3 mt-2  order-sm-2 order-1">
                     <a  href="javascript:history.go(-1)" class="btn theme-btn font-Nunito text-uppercase font-13 text-white position-relative font-weight-light-bold text-uppercase align-items-center backtosearch">Back To search results</a>
                     </div>
                      <a href="javascript:void(0)" class="d-none d-md-block d-xl-none toggle-filter">
                        <div class="mb-0 rounded ml-sm-3 ml-4 text-center theme-bg-color  filter-tool">
                            
                            <svg  class="" version="1.1" id="Capa_1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px"
                               viewBox="0 0 56 56" style="enable-background:new 0 0 56 56;" xml:space="preserve">
                            <g>
                              <path  d="M8,41.08V2c0-0.553-0.448-1-1-1S6,1.447,6,2v39.08C2.613,41.568,0,44.481,0,48c0,3.859,3.14,7,7,7s7-3.141,7-7
                                C14,44.481,11.387,41.568,8,41.08z M7,53c-2.757,0-5-2.243-5-5s2.243-5,5-5s5,2.243,5,5S9.757,53,7,53z" fill="#fff"/>
                              <path d="M29,20.695V2c0-0.553-0.448-1-1-1s-1,0.447-1,1v18.632c-3.602,0.396-6.414,3.456-6.414,7.161s2.812,6.765,6.414,7.161V54
                                c0,0.553,0.448,1,1,1s1-0.447,1-1V34.891c3.4-0.577,6-3.536,6-7.098S32.4,21.272,29,20.695z M27.793,33
                                c-2.871,0-5.207-2.336-5.207-5.207s2.335-5.207,5.207-5.207S33,24.922,33,27.793S30.664,33,27.793,33z" fill="#fff"/>
                              <path d="M56,8c0-3.859-3.14-7-7-7s-7,3.141-7,7c0,3.519,2.613,6.432,6,6.92V54c0,0.553,0.448,1,1,1s1-0.447,1-1V14.92
                                C53.387,14.432,56,11.519,56,8z M49,13c-2.757,0-5-2.243-5-5s2.243-5,5-5s5,2.243,5,5S51.757,13,49,13z" fill="#fff"/>
                            </g>
                            </svg>

                        </div>
                      </a>
                  </div>
                    <h6 class="f-14 pb-1 font-weight-semi-bold">
                      <a ng-click="deleteCookiesFilters()" href="/search-results?area_id=<?php echo $property['location_area_id'] ?>"><?php echo $property['location_area_name'] ?>   
                      </a>
                    </h6>
                  </div>
               </div>
               <?php if(isset($options['unit_tab_room_details']) && $options['unit_tab_room_details'] == 1): ?>
                  <div id="overview" class="Amenities-sec row px-sm-3 px-md-0">
                       <div class="col-12 px-lg-3 px-0">
                           <div class="amen-table-sec table-responsive-custom" ng-init="getRoomDetails(<?php echo $property['id']; ?>)">
                              <table class="table font-14 ">
                                  <thead>
                                    <tr>
                                      <th class="font-Nunito border-top border-bottom"><?php _e( 'Room', 'streamline-core' ) ?></th>
                                      <th class="font-Nunito border-top border-bottom"><?php _e( 'Beds', 'streamline-core' ) ?></th>
                                      <th class="font-Nunito border-top border-bottom"><?php _e( 'Baths', 'streamline-core' ) ?></th>
                                      <th class="font-Nunito border-top border-bottom"><?php _e( 'TVs', 'streamline-core' ) ?></th>
                                      <th class="font-Nunito border-top border-bottom"><?php _e( 'Comments', 'streamline-core' ) ?></th>
                                    </tr>
                                  </thead>
                                  <tbody class="">
                                    <tr ng-repeat="room in room_details">
                                      <td ng-bind="room.name"></td>
                                      <td>
                                        <span ng-if="!isArray(room.beds_details) && !isEmptyObject(room.beds_details)" ng-bind="room.beds_details"></span>
                                        <span ng-if="isArray(room.beds_details)">
                                          <ul>
                                            <li ng-repeat="bd in room.beds_details" ng-bind="bd"></li>
                                          </ul>
                                        </span>
                                      </td>
                                      <td>
                                        <span ng-if="!isArray(room.bathroom_details) && !isEmptyObject(room.bathroom_details)" ng-if="room.bathroom_details"></span>
                                        <span ng-if="isArray(room.bathroom_details)">
                                          <ul>
                                            <li ng-repeat="bd in room.bathroom_details" ng-bind="bd"></li>
                                          </ul>
                                        </span>
                                      </td>
                                      <td>
                                        <span ng-if="!isArray(room.television_details) && !isEmptyObject(room.television_details)" ng-bind="room.television_details"></span>
                                        <span ng-if="isArray(room.television_details)">
                                          <ul>
                                            <li ng-repeat="bd in room.television_details" ng-bind="bd"></li>
                                          </ul>
                                        </span>
                                      </td>
                                      <td style="width:250px"><span ng-if="!isEmptyObject(room.comments)" ng-bind="room.comments"></span></td>
                                    </tr>
                                  </tbody>
                              </table>
                           </div>
                       </div>
                        <?php if (isset($options['unit_tab_location']) && $options['unit_tab_location'] == 1 && (!empty($property['location_latitude']) && !empty($property['location_longitude']))): ?>
                          <div class="col-12 mt-3 px-lg-3 px-0">
                              <iframe lazy-load datasrc="https://maps.google.com/maps?q=<?php echo "{$property['location_latitude']},{$property['location_longitude']}" ?>&z=15&output=embed" src="" width="360" height="400" frameborder="0" style="border:0"></iframe>
                              
                          </div>
                      <?php endif; ?>
                  </div>
                <?php endif; ?>

                 <?php if(isset($options['unit_tab_reviews']) && $options['unit_tab_reviews'] == 1): ?>
                <div ng-if="reviews.length!=0" id="reviews" class="review-sec mt-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="review-head">
                        <h4 class="font-mons f-600 px-4 text-blue heading-26"><?php _e( 'Reviews','streamline-core' ) ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row m-0 shadow-bottom">
                    <div class="review-mein shadow-bottom px-3 d-block w-100">
                    <div  ng-init="getPropertyReviews(<?php echo $property['id']; ?>)" class="review-mein reviewcontent px-1 d-inline-block w-100">
                      <div ng-repeat="review in reviews" class="review-box mt-3 mb-4">
                        <h6 ng-cloak ng-if="review.title.length!=0" class=" font-mons f-600 f-16 mb-0">{[review.title]}</h6>
                        <h6 ng-cloak ng-if="review.title.length == 0" class=" font-mons f-600 f-16 mb-0"><?php _e( 'Guest Review', 'streamline-core' ) ?></h6>

                        <div class="review-kimb d-flex flex-wrap align-items-center featureProperty">
                          <div star-rating rating-value="review.points" data-max="5" class="star"></div>
                          <h5  class="f-14  mb-0 ml-sm-3 text-muted">By <span ng-bind="review.guest_name" class="guest-name" ng-bind="review.guest_name"></span>  on <span ng-bind="review.creation_date"></span></h5>
                        </div>
                          <p ng-bind-html="review.comments | trustedHtml" class="font-Nunito f-14 mb-0 mt-2 text-muted"></p>
                      </div>
                      
                       
                    </div>
                    <div class="ament-read text-center mb-5 read-more-review">
                        <a href="javascript:void(0)" class="btn theme-btn px-5 font-Nunito f-14 text-white position-relative font-weight-bold text-uppercase">
                          <span class="px-2">Read More</span>
                        </a>  
                      </div> 
                </div>

                </div>
              </div>
              <?php endif; ?>

               <?php if(isset($options['unit_tab_reviews']) && $options['unit_tab_reviews'] == 1): ?>
                   <!--<div id="latestreviews" class="latest-reviews bg-white mt-4" ng-init="getPropertyReviews(<?php echo $property['id']; ?>)">
                    <div class="row">
                      <div class="review-mein shadow-bottom px-md-4 px-3 mt-4 d-block w-100">
                        <div class="px-md-2 w-100 d-inline-block mb-3">
                        <h3 class="text-blue mb-3 font-weight-semi-bold heading-26"><?php _e( 'Latest Reviews', 'streamline-core' ) ?></h3>
                        <div class="review-box mt-2 mb-3" ng-repeat="review in reviews | limitTo : 3">
                          <h6 ng-cloak ng-if="review.title.length!=0" class=" f-600 text-uppercase font-16 mb-0">{[review.title]}</h6>
                          <h6 ng-cloak ng-if="review.title.length==0" class=" f-600 text-uppercase font-16 mb-0"><?php _e( 'Guest Review', 'streamline-core' ) ?></h6>
                          <div class="review-kimb d-flex flex-wrap align-items-center featureProperty">
                            <div star-rating rating-value="review.points" data-max="5" class="star d-inline-block"></div>
                            <h5  class="f-14  mb-0 ml-sm-3 text-muted">By <span ng-bind="review.guest_name" class="guest-name" ng-bind="review.guest_name"></span>  on <span ng-bind="review.creation_date"></span></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                </div>-->
               <?php endif; ?>

              
                <?php if (isset($options['unit_tab_amenities']) && $options['unit_tab_amenities'] == 1 &&  (count($property['unit_amenities']['amenity']) > 0)): ?>
                  <div id="amenities" class="ament-list mt-1 d-inline-block w-100  mt-4 pt-2 d-none">
                    <div class="row">
                      <?php
                        if($property['unit_amenities']['amenity']['amenity_name']){
                            ?>
                      <div class="col-12">
                           <?php echo $property['unit_amenities']['amenity']['amenity_name']; ?>
                      </div>
                      <?php } else { ?>
                      <?php 
                      foreach($property['unit_amenities']['amenity'] as $amenity) {?>
                      <div class="col-md-4 col-sm-6 col-6 px-0 px-sm-3">
                        <div class="ament-in">
                          <ul class="m-0 p-0">
                            <li class="d-flex align-items-center f-14 position-relative py-1">
                             <i class="icon icon-check check-color font-14 pr-2"></i>
                             <span class="checked-text font-14 font-Nunito font-weight-semi-bold text-black"><?php echo $amenity['amenity_name']; ?></span>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <?php  } } ?>
                    </div>
                  </div>
                 <?php endif; ?>

                  <div id="description" class="ament-description shadow-bottom mt-5 p-4">
                    <div class="description-content font-weight-light-bold font-14 font-Nunito font-weight-light-bold text-light-dark d-inline-block w-100">
                       <div class="custom_fields" ng-show="!isEmpty(custom_featured_field)" ng-init="getPropertyCustomFeatured(unit_id)">
                        <span ng-show="!isEmpty(custom_featured_field)"></span>
                       </div>
                      <div class="custom_fields" ng-show="!isEmpty(custom_special_field)" ng-init="getPropertyCustomSpecial(unit_id)">
                        <span ng-show="!isEmpty(custom_special_field)" ng-bind="custom_special_field"></span>
                      </div>
                      <div class="desccontent">
                         <?php if (is_string($property['description'])) {echo $property['description']; } ?>
                      </div>
                    </div>
                    <div class="ament-read text-center mb-4 pb-2">
                      <a href="javascript:void(0)" class="btn theme-btn px-5 font-Nunito f-14 text-white font-weight-bold text-uppercase r_more_description">
                        <span class="px-2">
                          <?php _e('Read More','streamline-core'); ?>
                        </span>
                      </a>
                    </div>
                  </div>


                   <div id="gallery" class="ament-gallery mt-5 pt-md-4">
                      <div  class="row mx-0 gallerycontent">
                         <?php
                         foreach ($property_gallery as $image):
                       ?>
                          <div class="col-sm-6 custom-padiing">
                               <figure class="mb-0 ament-gallery-img position-relative">
                                 <a href="javascript:void(0)" data-attr="<?php echo $image['id'] ?>"  class="ms-lightbox galleryopen" data-title="<?php echo $property['location_name'] ?>">
                                  <img datasrc="<?php echo $image['thumbnail_path'] ?>" lazy-load class="w-100" />
                                 </a>
                              </figure>
                          </div>
                         <?php
                          endforeach;
                        ?>
                   </div>
                   <div class="col-12 text-center position-relative gallery-btn">
                        <button class="btn theme-btn px-5 font-Nunito f-14 text-white position-relative font-weight-bold text-uppercase more_photos mt-4 cutome-btn-width-mob">
                          <span class="px-2">View All <?php echo count($property_gallery); ?> <?php  _e('Photos','streamline-core'); ?></span>

                        </button>

                  </div>
                  <span style="display:none;" class="count"><?php echo count($property_gallery); ?></span>

                   <div class="col-12 text-center position-relative d-md-none">
                        <button id="booknowbtn" class="btn theme-btn px-5 font-Nunito f-14 text-white position-relative font-weight-bold text-uppercase mt-4 text-uppercase cutome-btn-width-mob">
                          <span class="px-2">Book Now</span>
                        </button>
                  </div>

             </div>



          <?php if(isset($options['unit_tab_rates']) && $options['unit_tab_rates'] == 1): ?>
          <div id="rates" class="rates-sec mt-md-5 mt-3 pt-4">
            <div ng-if="rates_details.length > 0" class="row">
              <div class="col-md-12 px-sm-3 px-0">
                <div class="review-head">
                  <h4 class="font-mons f-600 px-2 text-blue heading-border pb-2 heading-26"><?php _e( 'Rates', 'streamline-core' ) ?></h4>
                </div>
                <div class="shadow-bottom d-inline-block w-100 px-md-5 px-3 mt-4">
                  <div  class="table-responsive-custom ratecontent">
                    <table class="table borderless hiderate font-14 font-Nunito  font-weight-light-bold mb-0">
                       <thead>
                         <tr>
                            <th><?php _e( 'Season', 'streamline-core' ) ?></th>
                            <th><?php _e( 'Period', 'streamline-core' ) ?></th>
                            <th><?php _e( 'Min. Stay', 'streamline-core' ) ?></th>
                            <th><?php _e( 'Nightly Rate', 'streamline-core' ) ?></th>
                            <th><?php _e( 'Weekly Rate', 'streamline-core' ) ?></th>
                          </tr>
                      </thead>
                      <tbody>
                       <tr ng-repeat="rate in rates_details">
                          <td class="text-left" ng-bind="rate.season_name"></td>
                          <td class="text-left" ng-bind="rate.period_begin + ' - ' + rate.period_end"></td>
                          <td class="text-left" ng-bind="rate.narrow_defined_days"></td>
                          <td class="text-left"><span ng-if="rate.daily_first_interval_price" ng-bind="calculateMarkup(rate.daily_first_interval_price) | currency"></span></td>
                          <td class="text-left"><span ng-if="rate.weekly_price" ng-bind="calculateMarkup(rate.weekly_price) | currency"></span></td>
                        </tr>
                       </tbody>
                    </table>
                    </div>
                  <div class="w-100 d-inline-block  text-center my-4 py-2">
                    <button class="more_rates btn theme-btn px-5 font-Nunito f-14 text-white position-relative font-weight-bold text-uppercase">
                    <span class="px-2"><?php _e('Load More','streamline-core'); ?></span>
                  </button>  
                  </div>

                  </div>

              </div>
            </div>
          </div>
          <?php endif; ?>

          <div id="availability" class="availability-sec pt-5 mt-5">
             <div class="row">
                <div class="col-md-12">
                   <div class="review-head">
                      <h5 class="font-mons f-600 px-sm-3 heading-26 text-dark mb-0 heading-26 text-center text-sm-left">Availability</h5>
                   </div>
                   <div class="shadow-bottom d-inline-block w-100 px-sm-3">
                      <div class="<?php echo $enabled_availability; ?> disabled_availability">
                        <a name="availability-title" class="anchor d-none"><?php _e( 'Availability', 'streamline-core' ) ?></a>
                        <div  class="unit_info_box availability_section">
                          <div class="col-xs-12">
                            <?php do_action('streamline-insert-calendar', $property['id'] ); ?>
                          </div>
                        </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>

            <?php if(isset($options['unit_tab_virtualtour']) && $options['unit_tab_virtualtour'] == 1 && (!empty($property['virtual_tour_url']))): ?>
             <div id="virtualtour" class="rates-sec mt-5 mb-3">
                 <div class="row">
                    <div class="col-12 px-sm-3 px-0 ">
                      
                       <div class="shadow-bottom d-inline-block w-100 px-4 pb-4 mt-3">
                           <h4 class="font-mons f-600 px-3 text-blue  pb-3 mb-1 heading-26"><?php _e( 'Video Tour', 'streamline-core' ) ?></h4>
                          <div class="unit_info_box virtualtour_section pb-0 border-0">
                      <div class="col-xs-12">
                        <?php echo $property['virtual_tour_url']; ?>
                      </div>
                    </div>
                       </div>
                    </div>
                 </div>
              </div>
             <?php endif; ?>
            
          </div>
       </section>
       <form method="post" id="form_thankyou" action="<?php echo get_permalink(get_page_by_slug('thank-you')) ?>">
        <input type="hidden" id="confirmation_id" name="confirmation_id" value="" />
        <input type="hidden" id="location_name" name="location_name" value="" />
        <input type="hidden" id="condo_type_name" name="condo_type_name" value="" />
        <input type="hidden" id="unit_name" name="unit_name" value="" />
        <input type="hidden" id="startdate" name="startdate" value="" />
        <input type="hidden" id="enddate" name="enddate" value="" />
        <input type="hidden" id="occupants" name="occupants" value="" />
        <input type="hidden" id="occupants_small" name="occupants_small" value="" />
        <input type="hidden" id="pets" name="pets" value="" />
        <input type="hidden" id="price_common" name="price_common" value="" />
        <input type="hidden" id="price_balance" name="price_balance" value="" />
        <input type="hidden" id="travelagent_name" name="travelagent_name" value="" />
        <input type="hidden" id="email" name="email" value="" />
        <input type="hidden" id="fname" name="fname" value = "" />
        <input type="hidden" id="lname" name= "lname" value= ""/>
        <input type="hidden" id="unit_id" name= "unit_id" value= ""/>
      </form>
   </div>
   <!--End Property Listing -->
   </div>
   <?php 
   do_action('streamline-insert-inquiry', $property['location_name'], $property['id'], $max_adults, $max_children, $max_pets, $min_stay, $checkin_days, true, $start_date, $end_date, $occupants, $occupants_small, $pets, $inquiry_title ); 
   ?>

   <?php do_action('streamline-insert-booknow',$property['location_name'], $property['id'],1,1,0,3,3,0); ?>
</div>
<!-- Modal -->



<div ng-controller="PropertyController as pCtrl" id="gallerymodal" class="modal fade gallery-modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content px-4 pb-4">
      <div class="modal-header pb-2 px-0">
        
        <h4 class="modal-title">
         <?php
          if (empty($property['name']) || $property['name'] == 'Home') {
              echo $property['location_name'];
          } else {
              echo $property['name'];
          }
        ?>
        </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body px-0 pb-0">
          <div class="your-class">
              <?php
                  foreach ($property_gallery as $key=>$image):
               ?>
             <div data-attr="<?php echo $image['id'] ?>">
                <img datasrc="<?php echo $image['image_path'] ?>" lazy-load class="carouselimage"/>
             </div>
           <?php
                 endforeach;
              ?>
      </div>
      </div>
    </div>
  </div>
</div>

<script>

jQuery(document).ready(function(){
  if (history.length == 1 || history.length == 0) {  
    jQuery(".backtosearch").hide();
  }
  
  jQuery("#booknowbtn").click(function(){
        jQuery('html, body').animate({
           scrollTop: jQuery("#book_now_mobile").offset().top-320
        });
  });
  var height = 200;
  jQuery('.description-content').css({"max-height":height+"px","overflow-y":"hidden"})
  jQuery('.toggle-filter').click(function () {
     jQuery(".filter-single-property-section").removeClass('slideOutRight');
     jQuery(".filter-single-property-section").addClass('left-slide slideInRight');
  });
  jQuery('.toggle-filter-close').click(function () {
      jQuery(".filter-single-property-section").removeClass('slideInRight').addClass('slideOutRight');
  });
  jQuery('.r_more_description').click(function(){
     if(jQuery(this).find('span').html() == "Less") {
        jQuery('.description-content').css({"max-height":height+"px", "overflow-y":"hidden"})
        jQuery(this).find('span').html("Read More");
        document.getElementById("description").scrollIntoView();
     }else{
        jQuery('.description-content').removeAttr("style")
        jQuery(this).find('span').html("Less");  
     }    
  });
  jQuery('.more_photos').click(function(){
      
     if(jQuery(this).find('span').html() == "Less") {
          jQuery('.gallerycontent').removeClass('view-all-img');
          jQuery(this).find('span').html("View All"+" "+ jQuery('.count').html()+" "+"Photos");
          document.getElementById("gallery").scrollIntoView();
         
     }else{
           jQuery('.gallerycontent').addClass('view-all-img');
           jQuery(this).find('span').html("Less");
          
     }
     
  })

  jQuery('.read-more-review').click(function(){
       if(jQuery(this).find('span').html() == "Less") {
          jQuery('.review-mein').find('.review-box').removeClass('d-block')
          jQuery(this).find('span').html("Read More");
           document.getElementById("reviews").scrollIntoView();
       }else{
           jQuery(this).find('span').html("Less");
           jQuery('.review-mein').find('.review-box').addClass('d-block')
          
       }
  });

  jQuery(document).on('click','.more_rates',function(){
      if(jQuery(this).find('span').html() == "Less") {
          jQuery('.rates-sec').find('table').addClass("hiderate");
          jQuery(this).find('span').html("Load More");
          document.getElementById("rates").scrollIntoView();
       }else{
           jQuery('.rates-sec').find('table').removeClass("hiderate");
           jQuery(this).find('span').html("Less");
         
       }
  });

  jQuery('.overview').click(function(){

     jQuery('html, body').animate({
        scrollTop: jQuery("#overview").offset().top-320
    });

      

  });

  jQuery('.amenities').click(function(){
     jQuery('html, body').animate({
        scrollTop: jQuery("#amenities").offset().top-200
    });
    
    
  })
  jQuery('.description').click(function(){
     jQuery('html, body').animate({
        scrollTop: jQuery("#description").offset().top-200
    });
       
  })
  jQuery('.rates').click(function(){
    jQuery('html, body').animate({
        scrollTop: jQuery("#rates").offset().top-150
    });
    
  });
  jQuery('.reviews').click(function(){
    jQuery('html, body').animate({
        scrollTop: jQuery("#reviews").offset().top-200
    });
    
    
  });

  jQuery('.availabilitylink').click(function(){
     jQuery('html, body').animate({
        scrollTop: jQuery("#availability").offset().top-150
    });
    
  });

  jQuery('.photos').click(function(){
     jQuery('html, body').animate({
        scrollTop: jQuery("#gallery").offset().top-150
    });
    
  });

  jQuery('.virtualtour').click(function(){
    jQuery('html, body').animate({
        scrollTop: jQuery("#virtualtour").offset().top-150
    });
  });

  jQuery('.galleryopen').click(function(){
      jQuery('#gallerymodal').appendTo("body").modal('show'); 
  })

  jQuery(document).on('click','.continue',function(){
      document.getElementById('book_now_mobile').scrollIntoView();
  });

  jQuery(document).on('click','.continue',function(){
      document.getElementById('book_now_mobile').scrollIntoView();
  });

  jQuery(document).on('click','.goback',function(){
      document.getElementById('book_now_mobile').scrollIntoView();
  });

  jQuery(document).on('click','#btn-checkout',function(){

        //jQuery('#paymentform')[0].reset();
  });

  jQuery(document).on('click','#makereservation',function(){
     jQuery('.bookvacation').trigger('click');
  })

  jQuery('input[name=card_cvv]').bind('keypress',function(e){  
          if(e.keyCode == '9' || e.keyCode == '16'){  
                return;  
           }  
           var code;  
           if (e.keyCode) code = e.keyCode;  
           else if (e.which) code = e.which;   
           if(e.which == 46)  
                return false;  
           if (code == 8 || code == 46)  
                return true;  
           if (code < 48 || code > 57)  
                return false;  
        }  
    ); 

  jQuery('input[name=card_number]').bind('keypress',function(e){  
          if(e.keyCode == '9' || e.keyCode == '16'){  
                return;  
           }  
           var code;  
           if (e.keyCode) code = e.keyCode;  
           else if (e.which) code = e.which;   
           if(e.which == 46)  
                return false;  
           if (code == 8 || code == 46)  
                return true;  
           if (code < 48 || code > 57)  
                return false;  
        }  
    ); 


  jQuery('input[name=phone]').bind('keypress',function(e){  
          if(e.keyCode == '9' || e.keyCode == '16'){  
                return;  
           }  
           var code;  
           if (e.keyCode) code = e.keyCode;  
           else if (e.which) code = e.which;   
           if(e.which == 46)  
                return false;  
           if (code == 8 || code == 46)  
                return true;  
           if (code < 48 || code > 57)  
                return false;  
        }  
    ); 

    jQuery('input[name=postal_code]').bind('keypress',function(e){  
          if(e.keyCode == '9' || e.keyCode == '16'){  
                return;  
           }  
           var code;  
           if (e.keyCode) code = e.keyCode;  
           else if (e.which) code = e.which;   
           if(e.which == 46)  
                return false;  
           if (code == 8 || code == 46)  
                return true;  
           if (code < 48 || code > 57)  
                return false;  
        }  
    );


    jQuery("#book_now_mobile").waypoint(function(direction){
        
         if(direction === 'down'){
           jQuery('#book_now_mobile').addClass("filter-fixed");
         }else{
            jQuery('#book_now_mobile').removeClass("filter-fixed");
         }
    },
    {
      offset: '10%'
    });

    jQuery("#propertymenu").waypoint(function(direction){
         if(direction === 'down'){
           jQuery('#propertymenu').addClass("header-fixed");
         }else{
            jQuery('#propertymenu').removeClass("header-fixed");
         }
    },
    {
      offset: '10%'
    });

    jQuery("#detailsec").waypoint(function(direction){
         if(direction === 'up'){
           jQuery('#propertymenu').removeClass("header-fixed");
            jQuery('#book_now_mobile').removeClass("filter-fixed");
         }
         if(direction === 'down'){
            jQuery('#propertymenu').addClass("header-fixed");
            jQuery('#book_now_mobile').addClass("filter-fixed");
         }
    });
    
  //     var waypoint3 = new Waypoint({
  //     element: document.getElementById('mainfooter'),
  //     handler: function(direction) {
  //       if(direction === 'down'){
  //          jQuery('#propertymenu').removeClass("header-fixed");
  //          jQuery('#book_now_mobile').removeClass("filter-fixed");
  //       }else{
  //         jQuery('#propertymenu').addClass("header-fixed");
  //          jQuery('#book_now_mobile').addClass("filter-fixed");
  //       }
        
  //     }
  //  })


  jQuery(window).scroll(function () {

    if ((jQuery(window).scrollTop() + jQuery(window).height()) < 3000) {

    } else if ((jQuery(window).scrollTop() + jQuery(window).height() + 400) >= jQuery(document).height()) {
        //jQuery('#propertymenu').removeClass("header-fixed");
        if (window.matchMedia('(max-width: 1679px)').matches) {
            jQuery('#book_now_mobile').removeClass("filter-fixed");
        }
        var top = jQuery('#main-part').height();
        var footer = jQuery("#mainfooter").height();
        var totallen = top - footer;
       
        if(jQuery('#virtualtour').length > 0){
           var padtop = totallen - 900
           if (window.matchMedia('(max-width: 1679px)').matches) {
               jQuery(".filter-single-property").css({"top":padtop+"px","height":"500px","overflow":"auto"});
            }
           
           //jQuery(".filter-single-property").addClass("tobottom");

        }else{
           var padtop   = totallen - 880
            if (window.matchMedia('(max-width: 1679px)').matches) {
               jQuery(".filter-single-property").css({"top":padtop+"px","height":"500px","overflow":"auto"});
            }
          
           //jQuery(".filter-single-property").addClass("tobottom");
        }
        
    } else {
        jQuery('#propertymenu').addClass("header-fixed");
        jQuery('#book_now_mobile').addClass("filter-fixed");
        jQuery(".filter-single-property").removeAttr("style");
    }
  });

});
</script>























