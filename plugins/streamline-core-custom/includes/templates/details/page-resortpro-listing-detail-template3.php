<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all resortpro listings by default.
 * You can override this template by creating your own "my_theme/template/page-resortpro-listing-detail.php" file
 *
 * @package    ResortPro
 * @since      v2.0
 */
?>

<div id="primary" class="content-area test3" ng-controller="PropertyController as pCtrl">
  <main id="main" class="site-main" role="main" ng-init="initializeData(<?php echo $property['id']; ?>);">

    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb  hidden-xs">
          <li><a href="/"><?php _e( 'Home', 'streamline-core' ) ?></a></li>
          <li><a href="/search-results"><?php _e( 'All Rentals', 'streamline-core' ) ?></a></li>
          <li><a href="/search-results?area_id=<?php echo $property['location_area_id'] ?>"><?php echo $property['location_area_name'] ?></a></li>
          <li class="active"><?php _e( $property['name'], 'streamline-core' ) ?></li>
        </ol>
        <h1 class="c-main-heading c-main-heading--mt-none"><?php _e( $property['name'], 'streamline-core' ) ?></h1>
      </div>

      <div class="col-md-8">
       
      </div>

      <div class="col-md-4">
        <?php if($property['rating_average'] > 0): ?>
          <div class="c-star-rating c-star-rating--large">
            <div class="c-star-rating__stars"
                 star-rating
                 rating-value="<?php echo $property['rating_average'] ?>"
                 data-max="5">
            </div>
            <?php
              $reviews_txt = ' ' . ($property['rating_count'] > 1) ? __( 'reviews', 'streamline-core' ) : __( 'review', 'streamline-core' );
            ?>
            <span class="c-star-rating__count">
              (<?php echo $property['rating_count'] ?> <?php echo $reviews_txt ?> )
            </span>
          </div>
        <?php endif;?>
      </div>

      <input type="hidden" value="<?php echo $property['id'] ?>" id="unit_id">
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="c-property-slider c-property-slider--partial-view ms-showcase2-template">
          <div class="c-property-slider__inner master-slider ms-skin-default" id="masterslider" data-slider-height="<?php echo $slider_height; ?>" data-slider-controls="<?php echo $options['property_slider_controls'] ?>">
            <?php if(count($property_gallery) > 0) : ?>
              <?php foreach ($property_gallery as $image): ?>
                <div class="ms-slide">
                  <img src="<?php ResortPro::assets_url('masterslider/blank.gif'); ?>" data-src="<?php echo $image['image_path'] ?>" alt="<?php echo $image['id'] ?>" />

                  <?php if($show_captions && is_string($image['description']) && !empty($image['description'])): ?>
                    <div class="ms-layer ms-caption">
                      <?php echo $image['description'] ?>
                    </div>
                  <?php endif; ?>

                  <img class="ms-thumb" src="<?php echo $image['miniature_path'] ?>" alt="<?php echo $image['description'] ?>" />

                  <a href="<?php echo $image['image_path'] ?>" class="ms-lightbox"
                     data-title="{[image.description]}" data-toggle="lightbox"
                     data-gallery="property-images"> <?php _e( 'lightbox', 'streamline-core' ) ?> </a>
                </div>
              <?php endforeach; ?>

            <?php else : ?>
              <div class="ms-slide">
                <img src="<?php ResortPro()->assets_url('masterslider/blank.gif'); ?>" data-src="<?php echo $property['default_image_path']; ?>" alt="<?php echo $property['name']; ?>" />

                <img class="ms-thumb" src="<?php echo $property['default_thumbnail_path'] ?>" alt="<?php echo wp_strip_all_tags( $property['short_description'], true ); ?>"/>

                <a href="<?php echo $property['default_image_path'] ?>" class="ms-lightbox"
                   data-title="<?php echo $property['location_name'] ?>" data-toggle="lightbox"
                   data-gallery="property-images"> <?php _e( 'lightbox', 'streamline-core' ) ?> </a>
              </div>
            <?php endif; ?>
          </div>
          <!-- .c-property-slider__inner -->

        </div>
        <!-- c-property-slider -->

        <ul class="c-list-group c-list-group--detail c-details-list list-group">
          <li class="c-list-group__item c-list-group__item--detail c-details-list__item list-group-item">
            <i class="fa fa-users" aria-hidden="true"></i> <?php _e( 'Sleeps:', 'streamline-core' ) ?>
            <strong><?php echo $property['max_occupants']; ?></strong>
          </li>
          <li class="c-list-group__item c-list-group__item--detail c-details-list__item list-group-item">
            <i class="fa fa-bed" aria-hidden="true"></i>
            <?php _e( 'Bedrooms:', 'streamline-core' ) ?>
            <strong><?php echo $property['bedrooms_number']; ?></strong>
          </li>
          <li class="c-list-group__item c-list-group__item--detail c-details-list__item list-group-item">
            <i class="fa fa-bath" aria-hidden="true"></i> <?php _e( 'Bathrooms:', 'streamline-core' ) ?>
            <strong><?php echo $property['bathrooms_number']; ?></strong>
          </li>
          <li class="c-list-group__item c-list-group__item--detail c-details-list__item list-group-item">
            <i class="fa fa-paw" aria-hidden="true"></i> <?php _e( 'Pets:', 'streamline-core' ) ?>
            <strong><?php echo $property['max_pets']; ?></strong>
          </li>
        </ul>
        <!-- /.c-details-list -->

        <?php if(!wp_is_mobile()): ?>
          <div class="desktop-cont">
            <ul id="property-detail-tabs" class="c-tabs nav nav-tabs" role="tablist">
              <li role="presentation" class="c-tabs__item active">
                <a href="#property-details-pane" aria-controls="property-details-pane"
                   data-toggle="tab"><?php _e( 'Details', 'streamline-core' ) ?></a>
              </li>
              <?php if (isset($options['unit_tab_amenities']) && $options['unit_tab_amenities'] == 1 &&  (isset($property['unit_amenities']['amenity']) && count($property['unit_amenities']['amenity']) > 0)): ?>
                <li class="c-tabs__item" role="presentation">
                  <a href="#property-amenities-pane" aria-contorls="property-amenities-pane"
                     data-toggle="tab"><?php _e( 'Amenities', 'streamline-core' ) ?></a>
                </li>
              <?php endif; ?>
              <?php if (isset($options['unit_tab_location']) && $options['unit_tab_location'] == 1 && (!empty($property['location_latitude']) && !empty($property['location_longitude']))): ?>
                <li class="c-tabs__item" role="presentation" ng-click="mapResize();">
                  <a href="#property-location-pane" aria-controls="property-location-pane"
                     data-toggle="tab"><?php _e( 'Location', 'streamline-core' ) ?></a>
                </li>
              <?php endif; ?>
              <?php if(isset($options['unit_tab_reviews']) && $options['unit_tab_reviews'] == 1): ?>
                <li class="c-tabs__item" role="presentation" ng-if="reviews.length > 0">
                  <a href="#property-reviews-pane" aria-controls="property-reviews-pane"
                     data-toggle="tab"><?php _e( 'Reviews', 'streamline-core' ) ?></a>
                </li>
              <?php endif; ?>
              <?php if(isset($options['unit_tab_rates']) && $options['unit_tab_rates'] == 1): ?>
                <li class="c-tabs__item" role="presentation">
                  <a href="#property-rates-pane" aria-controls="property-rates-pane"
                     data-toggle="tab"><?php _e( 'Rates', 'streamline-core' ) ?></a>
                </li>
              <?php endif; ?>
              <?php if(isset($options['unit_tab_room_details']) && $options['unit_tab_room_details'] == 1): ?>
                <li class="c-tabs__item" role="presentation">
                  <a href="#property-rooms-pane" aria-controls="property-rooms-pane"
                     data-toggle="tab"><?php _e( 'Room Details', 'streamline-core' ) ?></a>
                </li>
              <?php endif; ?>
              <?php if(isset($options['unit_tab_availability']) && $options['unit_tab_availability'] == 1): ?>
                <li class="c-tabs__item" role="presentation">
                  <a href="#property-availability-pane"
                     aria-controls="property-availability-pane" data-toggle="tab"><?php _e( 'Availability', 'streamline-core' ) ?></a>
                </li>
              <?php endif; ?>
              <?php if(isset($options['unit_tab_floorplan']) && $options['unit_tab_floorplan'] == 1 && (!empty($property['floor_plan_url']))): ?>
                <li class="c-tabs__item" role="presentation">
                  <a href="#property-floorplan-pane"
                     aria-controls="property-floorplan-pane" data-toggle="tab"><?php _e( 'Floor Plan', 'streamline-core' ) ?></a>
                </li>
              <?php endif; ?>
              <?php if(isset($options['unit_tab_virtualtour']) && $options['unit_tab_virtualtour'] == 1 && (!empty($property['virtual_tour_url']))): ?>
                <li class="c-tabs__item" role="presentation">
                  <a href="#property-virtualtour-pane"
                     aria-controls="property-virtualtour-pane" data-toggle="tab"><?php _e( 'Virtual Tour', 'streamline-core' ) ?></a>
                </li>
              <?php endif; ?>
            </ul>
            <!-- c-tabs -->

            <div class="c-tabs-content c-tabs-content--bordered tab-content">
              <div role="tabpanel" class="c-tabs-content__item tab-pane fade in active" id="property-details-pane">
                <div id="property-description">                  
                  <div class="property_description">
                    <?php
                    if (is_string($property['description'])) {
                      echo $property['description'];
                    }
                    ?>
                  </div>
                </div>
              </div>

              <?php if (isset($options['unit_tab_amenities']) && $options['unit_tab_amenities'] == 1 &&  (isset($property['unit_amenities']['amenity']) && count($property['unit_amenities']['amenity']) > 0)): ?>
                <div role="tabpanel" class="c-tabs-content__item tab-pane" id="property-amenities-pane">                  
                  <ul class="c-list-group list-group amenities clearfix">
                    <?php foreach ($property['unit_amenities']['amenity'] as $amenity): ?>
                    <li class="c-list-group__item c-list-group__item--col-3 list-group-item">
                      <?php echo $amenity['amenity_name']; ?>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                  <!-- /.c-list-group -->
                </div>
              <?php endif; ?>

              <?php if (isset($options['unit_tab_location']) && $options['unit_tab_location'] == 1 && (!empty($property['location_latitude']) && !empty($property['location_longitude']))): ?>
                <div role="tabpanel" class="c-tabs-content__item tab-pane" id="property-location-pane">
                  <div id="property-location">                    
                    <iframe src="<?php echo $iframe_url; ?>" style="width: 100%; height: 300px"></iframe>
                  </div>
                </div>
              <?php endif; ?>

              <div class="<?php echo $enabled_availability; ?> disabled_availability">?>
                <div id="property-availability-pane" role="tabpanel" class="c-tabs-content__item tab-pane" class="availability">                  
                  <?php do_action('streamline-insert-calendar', $property['id'] ); ?>
                </div>
              </div>

              <?php if(isset($options['unit_tab_reviews']) && $options['unit_tab_reviews'] == 1): ?>
                <div id="property-reviews-pane" role="tabpanel" class="c-tabs-content__item tab-pane" ng-init="getPropertyReviews(<?php echo $property['id']; ?>)">                  
                  <div id="property-reviews">
                    <div class="c-review row" ng-show="reviews.length > 0" ng-repeat="review in reviews">
                      <div class="col-sm-8">
                        <h3 class="c-review__title" ng-if="isString(review.title)" ng-bind="review.title"></h3>
                        <h3 class="c-review__title" ng-cloak ng-if="!isString(review.title)"><?php _e( 'Guest Review', 'streamline-core' ) ?></h3>
                        <div class="c-review__meta"><?php _e( 'by', 'streamline-core' ) ?> <span class="c-review__author" ng-bind="review.guest_name"></span> on <span class="c-review__date" ng-bind="review.creation_date"></span></div>
                        <div class="c-review__body" ng-bind-html="review.comments | trustedHtml"></div>
                      </div>
                      <div class="col-sm-4">
                        <div class="c-star-rating">
                          <div class="c-star-rating__stars" star-rating
                              rating-value="review.points" data-max="5"></div>
                        </div>
                      </div>
                    </div>
                    <div ng-show="!reviews.length > 0">
                      <p><?php _e( 'No reviews have been entered for this unit.', 'streamline-core' ) ?></p>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <div id="bookFromLightbox" ng-if="book_from_lightbox" style="display: none;">
                <h2 class="c-section-title c-unit-lightbox__header-item js-lightboxTitle"><?php _e( $property['name'], 'streamline-core' ) ?></h2>
                <div ng-if="book_from_lightbox && reviews.length > 0" ng-init="getPropertyReviews(<?php echo $property['id']; ?>)">
                  <div class="row">
                    <div class="col-md-12">
                      <h3 class="c-unit-lightbox__reviews-heading js-reviewsTitle"><?php _e( 'Reviews', 'streamline-core' ) ?></h3>
                      
                      <div id="lightboxReviews" class="c-unit-lightbox__reviews-inner">
                        <div class="c-review row-review" ng-repeat="review in reviews">
                          <div class="c-star-rating c-star-rating--lightbox">
                            <div class="c-star-rating__stars" star-rating rating-value="review.points" data-max="5"></div>
                          </div>
                          <h3 class="c-review__title" ng-if="isString(review.title)" ng-bind="review.title"></h3>
                          <h3 class="c-review__title" ng-if="!isString(review.title)"><?php _e( 'Guest Review', 'streamline-core' ) ?></h3>

                          <div class="c-review__meta"><?php _e( 'by', 'streamline-core' ) ?> <span class="c-review__author" ng-bind="review.guest_name"></span> on <span class="c-review__date" ng-bind="review.creation_date"></span></div>

                          <div class="c-review__body c-review__body--lightbox" ng-bind-html="review.comments | trustedHtml"></div>
                        </div>          
                      </div>
                      <!-- /#lightboxReviews -->
                      
                    </div>
                  </div>
                </div>
              </div>

              <?php if(isset($options['unit_tab_rates']) && $options['unit_tab_rates'] == 1): ?>
                <div id="property-rates-pane" role="tabpanel" class="c-tabs-content__item tab-pane" ng-init="getRatesDetails(<?php echo $property['id']; ?>)">                  
                  <div id="property-rates">
                    <div id="rates-details" class="table-responsive">
                      <table class="table table-striped table-bordered table-condensed table-hover" ng-if="rates_details.length >0">
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
                        <tr class="row-rate" ng-repeat="rate in rates_details">
                          <td ng-bind="rate.season_name"></td>
                          <td ng-bind="(rate.period_begin + ' - ' + rate.period_end)"></td>
                          <td ng-bind="rate.narrow_defined_days"></td>
                          <td class="text-center"><span ng-if="rate.daily_first_interval_price" ng-bind="calculateMarkup(rate.daily_first_interval_price) | currency"></span></td>
                          <td class="text-center"><span ng-if="rate.weekly_price" ng-bind="calculateMarkup(rate.weekly_price) | currency"></span></td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if(isset($options['unit_tab_room_details']) && $options['unit_tab_room_details'] == 1 && count($room_detail) > 0): ?>
                <div id="property-rooms-pane" role="tabpanel" class="c-tabs-content__item tab-pane">                  
                  <div id="room-details">
                    <?php do_action('streamline-insert-roomdetails', $room_detail); ?>
                  </div>
                </div>
              <?php endif; ?>

              <?php if(isset($options['unit_tab_floorplan']) && $options['unit_tab_floorplan'] == 1 && (!empty($property['floor_plan_url']))): ?>
                <div id="property-floorplan-pane" role="tabpanel" class="c-tabs-content__item tab-pane">                  
                  <div id="floor_plan">
                    <?php echo $property['floor_plan_url']; ?>
                  </div>
                </div>
              <?php endif; ?>
              <?php if(isset($options['unit_tab_virtualtour']) && $options['unit_tab_virtualtour'] == 1 && (!empty($property['virtual_tour_url']))): ?>
                <div id="property-virtualtour-pane" role="tabpanel" class="c-tabs-content__item tab-pane">                  
                  <div id="virtual_tour">
                    <?php echo $property['virtual_tour_url']; ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <!-- /.c-tabs-content -->
          </div>

        <?php else: ?>
          <div class="mobile-cont">
            <div class="c-accordion panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <?php if (is_string($property['description']) && !empty($property['description'])): ?>
              <div class="c-accordion__header panel panel-default">
                <div class="c-accordion__header-inner panel-heading" role="tab" id="headingOne">
                  <h4 class="c-accordion__heading panel-title">
                    <a role="button" data-toggle="collapse"
                       href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <?php _e( 'Details', 'streamline-core' ) ?>
                    </a>
                  </h4>
                </div>                
                <div id="collapseOne" class="c-accordion__body panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="c-accordion__body-inner panel-body">
                    <div class="property_description">
                      <?php echo $property['description']; ?>
                    </div>
                  </div>
                </div>                
              </div>
              <?php endif; ?>
              <?php if (isset($options['unit_tab_amenities']) && $options['unit_tab_amenities'] == 1 &&  (isset($property['unit_amenities']['amenity']) && count($property['unit_amenities']['amenity']) > 0)): ?>
                <div class="c-accordion__header panel panel-default">
                  <div class="c-accordion__header-inner panel-heading" role="tab" id="headingTwo">
                    <h4 class="c-accordion__heading panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse"
                         href="#collapseTwo" aria-expanded="false"
                         aria-controls="collapseTwo">
                        <?php _e( 'Amenities', 'streamline-core' ) ?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="c-accordion__body panel-collapse collapse" role="tabpanel"
                       aria-labelledby="headingTwo">
                    <div class="c-accordion__body-inner panel-body">
                      <ul class="c-list-group list-group amenities clearfix">
                        <?php
                        foreach ($property['unit_amenities']['amenity'] as $amenity) {
                          ?>
                          <li class="c-list-group__item c-list-group__item--col-2 list-group-item">
                            <?php echo $amenity['amenity_name']; ?>
                          </li>
                        <?php } ?>
                      </ul>
                      <!-- /.c-list-group -->
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              <?php if (isset($options['unit_tab_location']) && $options['unit_tab_location'] == 1 && (!empty($property['location_latitude']) && !empty($property['location_longitude']))): ?>
                <div class="c-accordion__header panel panel-default">
                  <div class="c-accordion__header-inner panel-heading" role="tab" id="headingThree">
                    <h4 class="c-accordion__heading panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse"
                         href="#collapseThree" aria-expanded="false"
                         aria-controls="collapseThree">
                        <?php _e( 'Location', 'streamline-core' ) ?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="c-accordion__body panel-collapse collapse" role="tabpanel"
                       aria-labelledby="headingThree">
                    <div class="c-accordion__body-inner panel-body">
                      <map
                        center="<?php echo "{$property['location_latitude']},{$property['location_longitude']}" ?>"
                        zoom="8" scrollwheel="false">
                        <marker
                          position="<?php echo "{$property['location_latitude']},{$property['location_longitude']}" ?>"
                          title="<?php echo $property['name'] ?>"></marker>
                      </map>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if(isset($options['unit_tab_reviews']) && $options['unit_tab_reviews'] == 1): ?>
                <div class="c-accordion__header panel panel-default" ng-init="getPropertyReviews(<?php echo $property['id']; ?>)" ng-if="reviews.length > 0">
                  <div class="c-accordion__header-inner panel-heading" role="tab" id="headingFour">
                    <h4 class="c-accordion__heading panel-title">
                      <a role="button" data-toggle="collapse"
                         href="#collapseReviews" aria-expanded="true" aria-controls="collapseReviews">
                        <?php _e( 'Reviews', 'streamline-core' ) ?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseReviews" class="c-accordion__body panel-collapse collapse" role="tabpanel"
                       aria-labelledby="headingFour">
                    <div class="c-accordion__body-inner panel-body">
                      <div class="c-review row" ng-repeat="review in reviews">
                        <div class="col-sm-8">
                          <h3 class="c-review__title" ng-if="isString(review.title)" ng-bind="review.title"></h3>
                          <h3 class="c-review__title" nng-if="!isString(review.title)"><?php _e( 'Guest Review', 'streamline-core' ) ?></h3>
                          <span class="c-review__meta"><?php _e( 'by', 'streamline-core' ) ?>
                            <span class="c-review__author" ng-bind="review.guest_name"></span>
                            <?php _e( 'on', 'streamline-core' ) ?>
                            <span class="c-review__date" ng-bind="review.creation_date"></span>
                          </span>
                          <div class="c-review__body" ng-bind="review.comments"></div>
                        </div>
                        <div class="col-sm-4">
                          <div class="c-star-rating">
                            <div class="c-star-rating__stars" star-rating rating-value="review.points" data-max="5"></div>
                          </div>
                        </div>
                      </div>
                      <div ng-show="!reviews.length > 0">
                        <?php _e( 'No reviews have been entered for this unit.', 'streamline-core' ) ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if(isset($options['unit_tab_availability']) && $options['unit_tab_availability'] == 1): ?>
                <div class="c-accordion__header panel panel-default">
                  <div class="c-accordion__header-inner panel-heading" role="tab" id="headingFive">
                    <h4 class="c-accordion__heading panel-title">
                      <a role="button" data-toggle="collapse"
                         href="#collapseAvailability" aria-expanded="true"
                         aria-controls="collapseAvailability">
                        <?php _e( 'Availability', 'streamline-core' ) ?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseAvailability" class="c-accordion__body panel-collapse collapse" role="tabpanel"
                       aria-labelledby="headingFive">
                    <div class="c-accordion__body-inner panel-body">
                      <?php do_action('streamline-insert-calendar', $property['id'] ); ?>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if(isset($options['unit_tab_rates']) && $options['unit_tab_rates'] == 1): ?>
                <div class="c-accordion__header panel panel-default">
                  <div class="c-accordion__header-inner panel-heading" role="tab" id="headingRates">
                    <h4 class="c-accordion__heading panel-title">
                      <a role="button" data-toggle="collapse"
                         href="#collapseRate" aria-expanded="true"
                         aria-controls="collapseRate">
                        <?php _e( 'Rates', 'streamline-core' ) ?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseRate" class="c-accordion__body panel-collapse collapse" role="tabpanel" aria-labelledby="headingRates">
                    <div class="c-accordion__body-inner panel-body table-responsive" ng-init="getRatesDetails(<?php echo $property['id']; ?>)">
                      <table class="table table-striped table-bordered table-condensed table-hover" ng-if="rates_details.length >0">
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
                        <tr class="row-rate" ng-repeat="rate in rates_details">
                          <td ng-bind="rate.season_name"></td>
                          <td ng-bind="rate.period_begin + ' - ' + rate.period_end"></td>
                          <td ng-bind="rate.narrow_defined_days"></td>
                          <td class="text-center"><span ng-if="rate.daily_first_interval_price" ng-bind="calculateMarkup(rate.daily_first_interval_price) | currency"></span></td>
                          <td class="text-center"><span ng-if="rate.weekly_price" ng-bind="calculateMarkup(rate.weekly_price) | currency"></span></td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if(isset($options['unit_tab_room_details']) && $options['unit_tab_room_details'] == 1): ?>
                <div class="c-accordion__header panel panel-default">
                  <div class="c-accordion__header-inner panel-heading" role="tab" id="headingRooms">
                    <h4 class="c-accordion__heading panel-title">
                      <a role="button" data-toggle="collapse"
                         href="#collapseRooms" aria-expanded="true"
                         aria-controls="collapseRooms">
                        <?php _e( 'Room Details', 'streamline-core' ) ?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseRooms" class="c-accordion__body panel-collapse collapse" role="tabpanel" aria-labelledby="headingRooms">
                    <div class="c-accordion__body-inner panel-body" ng-init="getRoomDetails(<?php echo $property['id']; ?>)">
                      <div id="room-details-mobile">
                        <table class="table table-striped table-hover table-condensed table-bordered" ng-if="room_details.length >0">
                          <thead>
                            <tr>
                              <th><?php _e( 'Room', 'streamline-core' ) ?></th>
                              <th><?php _e( 'Beds', 'streamline-core' ) ?></th>
                              <th><?php _e( 'Baths', 'streamline-core' ) ?></th>
                            </tr>
                          </thead>
                          <tbody>
                          <tr class="row-review" ng-repeat="room in room_details">
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
                              <span ng-if="!isArray(room.bathroom_details) && !isEmptyObject(room.bathroom_details)" ng-bind="room.bathroom_details"></span>
                              <span ng-if="isArray(room.bathroom_details)">
                                  <ul>
                                    <li ng-repeat="bd in room.bathroom_details" ng-bind="bd"></li>
                                  </ul>
                              </span>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if(isset($options['unit_tab_floorplan']) && $options['unit_tab_floorplan'] == 1 && (!empty($property['floor_plan_url']))): ?>
                <div class="c-accordion__header panel panel-default">
                  <div class="c-accordion__header-inner panel-heading" role="tab" id="headingFloor">
                    <h4 class="c-accordion__heading panel-title">
                      <a role="button" data-toggle="collapse"
                         href="#collapseFloorplan" aria-expanded="true"
                         aria-controls="collapseFloorplan">
                        <?php _e( 'Floor Plan', 'streamline-core' ) ?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseFloorplan" class="c-accordion__body panel-collapse collapse" role="tabpanel"
                       aria-labelledby="headingFloor">
                    <div class="c-accordion__body-inner panel-body">
                      <div id="floorplan-mobile">
                        <?php echo $property['floor_plan_url']; ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if(isset($options['unit_tab_virtualtour']) && $options['unit_tab_virtualtour'] == 1 && (!empty($property['virtual_tour_url']))): ?>
                <div class="c-accordion__header panel panel-default">
                  <div class="c-accordion__header-inner panel-heading" role="tab" id="headingTour">
                    <h4 class="c-accordion__heading panel-title">
                      <a role="button" data-toggle="collapse"
                         href="#collapseVirtualtour" aria-expanded="true"
                         aria-controls="collapseVirtualtour">
                        <?php _e( 'Virtual Tour', 'streamline-core' ) ?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseVirtualtour" class="c-accordion__body panel-collapse collapse" role="tabpanel" aria-labelledby="headingTour">
                    <div class="c-accordion__body-inner panel-body">
                      <div id="virtualtour-mobile">
                        <?php echo $property['virtual_tour_url']; ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <!-- /.c-accordion -->

          </div>
        <?php endif; ?>
      </div>

      <div id="resortpro-book-unit" class="c-sidebar c-sidebar--inquiry col-lg-4"
        ng-init="maxOccupants='<?php echo $max_children; ?>'; isDisabled=true; total_reservation=0; book.unit_id=<?php echo $property['id'] ?>;book.checkin='<?php echo $start_date; ?>';book.checkout='<?php echo $end_date ?>';book.occupants='<?php echo $occupants; ?>';book.occupants_small='<?php echo $occupants_small; ?>';book.pets='<?php echo $pets; ?>';getPreReservationPrice(book,<?php echo $res ?>)">

        <div class="c-sidebar__inner">
          <div class="c-sidebar__section c-sidebar__section--bordered inquiry right-side">
            <div class="alert alert-{[alert.type]} animate" ng-repeat="alert in alerts">
              <p ng-bind-html="alert.message | trustedHtml"></p>
            </div>

            <?php if(!empty($booknow_title)): ?>
              <h3 class="c-sidebar__heading text-center"><?php _e( $booknow_title, 'streamline-core' ) ?></h3>
            <?php endif; ?>

            <?php do_action('streamline-insert-booknow-widget', $property, $checkout_url, $hash, $nonce, $arrive_label, $depart_label, $adults_label, $children_label, $pets_label, $max_adults, $max_children, $max_pets, $min_stay, $checkin_days, $use_promo, $pbg_enabled); ?>

            <?php do_action('streamline-insert-share', $property['seo_page_name'], $property['id'], $start_date, $end_date, $occupants, $occupants_small, $pets ); ?>
          </div>
          <!-- /.c-sidebar__section -->

          <div class="c-sidebar__section--bordered inquiry right-side" id="inquiry_box">
            <?php if(!empty($inquiry_title)): ?>
              <h3 class="c-sidebar__heading c-sidebar__heading--inquiry text-center"><?php echo $inquiry_title; ?></h3>
            <?php endif; ?>

            <?php do_action('streamline-insert-inquiry', $property['location_name'], $property['id'], $max_adults, $max_children, $max_pets, $min_stay, $checkin_days, false, $start_date, $end_date, $occupants, $occupants_small, $pets, $inquiry_title); ?>
          </div>
          <!-- /.c-sidebar__section -->
          
        </div>
        <!-- /.c-sidebar__inner -->

      </div>
      <!-- /.c-sidebar -->

    </div>
  </main>
  <!-- /.site-main -->

  <?php do_action('streamline-insert-booknow', $property['location_name'], $property['id'], $max_adults, $max_children, $max_pets, $min_stay, $checkin_days, $nonce ); ?>

</div>
<!-- /.content-area -->
