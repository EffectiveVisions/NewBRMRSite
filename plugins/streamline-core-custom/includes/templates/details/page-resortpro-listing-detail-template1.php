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

<div id="primary" class="content-area test1" ng-controller="PropertyController as pCtrl">
  <main id="main" class="site-main" role="main" ng-init="propertyId=<?php echo $property['id']; ?>;initializeData();">
    <div class="row layout-1">
      <div class="col-md-12 hidden-xs">
        <ol class="breadcrumb">
          <li><a href="/"><?php _e( 'Home', 'streamline-core' ) ?></a></li>
          <li><a href="/search-results"><?php _e( 'All Rentals', 'streamline-core' ) ?></a></li>
          <li><a href="/search-results?area_id=<?php echo $property['location_area_id'] ?>"><?php echo $property['location_area_name'] ?></a></li>
          <li class="active"><?php _e( $property['name'], 'streamline-core' ) ?></li>
        </ol>
      </div>
      <h1 class="c-main-heading c-main-heading--mt-none col-lg-12"><?php _e( $property['name'], 'streamline-core' ) ?></h1>

      <input type="hidden" value="<?php echo $property['id'] ?>" id="unit_id">

      <div class="col-lg-8">
    
      <ul class="nav nav-pills nav-pills-mobile visible-xs test">
  
        <li role="presentation"><a href="#description-title"><?php _e( 'Description Template 1', 'streamline-core' ) ?></a></li>

        <?php if(isset($options['unit_tab_availability']) && $options['unit_tab_availability'] == 1): ?>
          <li role="presentation"><a href="#availability-title"><?php _e( 'Availability', 'streamline-core' ) ?></a></li>
        <?php endif; ?>
        
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            More <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <?php if (isset($options['unit_tab_amenities']) && $options['unit_tab_amenities'] == 1 &&  (isset($property['unit_amenities']['amenity']) && count($property['unit_amenities']['amenity']) > 0)): ?>
              <li role="presentation"><a href="#amenities-title"><?php _e( 'Amenities', 'streamline-core' ) ?></a></li>
            <?php endif; ?>
            <?php if (isset($options['unit_tab_location']) && $options['unit_tab_location'] == 1 && (!empty($property['location_latitude']) && !empty($property['location_longitude']))): ?>
              <li role="presentation"><a href="#location-title"><?php _e( 'Location', 'streamline-core' ) ?></a></li>
            <?php endif; ?>

            <?php if(isset($options['unit_tab_reviews']) && $options['unit_tab_reviews'] == 1): ?>
              <li role="presentation" ng-show="reviews.length > 0"><a href="#reviews-title"><?php _e( 'Reviews', 'streamline-core' ) ?></a></li>
            <?php endif; ?>

            <?php if(isset($options['unit_tab_rates']) && $options['unit_tab_rates'] == 1): ?>
              <li role="presentation"><a href="#rates-title"><?php _e( 'Rates', 'streamline-core' ) ?></a></li>
            <?php endif; ?>

            <?php if(isset($options['unit_tab_room_details']) && $options['unit_tab_room_details'] == 1): ?>
              <li role="presentation"><a href="#rooms-title"><?php _e( 'Rooms Details', 'streamline-core' ) ?></a></li>
            <?php endif; ?>

            <?php if(isset($options['unit_tab_floorplan']) && $options['unit_tab_floorplan'] == 1 && (!empty($property['floor_plan_url']))): ?>
              <li role="presentation"><a href="#floorplan-title"><?php _e( 'Floor Plan', 'streamline-core' ) ?></a></li>
            <?php endif; ?>

            <?php if(isset($options['unit_tab_virtualtour']) && $options['unit_tab_virtualtour'] == 1 && (!empty($property['virtual_tour_url']))): ?>
              <li role="presentation"><a href="#virtualtour-title"><?php _e( 'Virtual Tour', 'streamline-core' ) ?></a></li>
            <?php endif; ?>
          </ul>
        </li>
      </ul>

        
        <ul class="c-detail-tabs c-detail-tabs--layout-1 nav nav-pills nav-justified hidden-xs">
          <li role="presentation" class="c-detail-tabs__item"><a class="u-truncate" href="#description-title"><?php _e( 'Description', 'streamline-core' ) ?></a></li>

          <?php if (isset($options['unit_tab_amenities']) && $options['unit_tab_amenities'] == 1 &&  (isset($property['unit_amenities']['amenity']) && count($property['unit_amenities']['amenity']) > 0)): ?>
            <li role="presentation" class="c-detail-tabs__item"><a class="u-truncate" href="#amenities-title"><?php _e( 'Amenities', 'streamline-core' ) ?></a></li>
          <?php endif; ?>

          <?php if(isset($options['unit_tab_availability']) && $options['unit_tab_availability'] == 1): ?>
            <li role="presentation" class="c-detail-tabs__item"><a class="u-truncate" href="#availability-title"><?php _e( 'Availability', 'streamline-core' ) ?></a></li>
          <?php endif; ?>

          <?php if (isset($options['unit_tab_location']) && $options['unit_tab_location'] == 1 && (!empty($property['location_latitude']) && !empty($property['location_longitude']))): ?>
            <li role="presentation" class="c-detail-tabs__item"><a class="u-truncate" href="#location-title"><?php _e( 'Location', 'streamline-core' ) ?></a></li>
          <?php endif; ?>

          <?php if(isset($options['unit_tab_reviews']) && $options['unit_tab_reviews'] == 1): ?>
            <li role="presentation" class="c-detail-tabs__item" ng-show="reviews.length > 0"><a class="u-truncate" href="#reviews-title"><?php _e( 'Reviews', 'streamline-core' ) ?></a></li>
          <?php endif; ?>

          <?php if(isset($options['unit_tab_rates']) && $options['unit_tab_rates'] == 1): ?>
            <li role="presentation" class="c-detail-tabs__item"><a class="u-truncate" href="#rates-title"><?php _e( 'Rates', 'streamline-core' ) ?></a></li>
          <?php endif; ?>

          <?php if(isset($options['unit_tab_room_details']) && $options['unit_tab_room_details'] == 1): ?>
            <li role="presentation" class="c-detail-tabs__item"><a class="u-truncate" href="#rooms-title"><?php _e( 'Rooms Details', 'streamline-core' ) ?></a></li>
          <?php endif; ?>

          <?php if(isset($options['unit_tab_floorplan']) && $options['unit_tab_floorplan'] == 1 && (!empty($property['floor_plan_url']))): ?>
            <li role="presentation" class="c-detail-tabs__item"><a class="u-truncate" href="#floorplan-title"><?php _e( 'Floor Plan', 'streamline-core' ) ?></a></li>
          <?php endif; ?>

          <?php if(isset($options['unit_tab_virtualtour']) && $options['unit_tab_virtualtour'] == 1 && (!empty($property['virtual_tour_url']))): ?>
            <li role="presentation" class="c-detail-tabs__item"><a class="u-truncate" href="#virtualtour-title"><?php _e( 'Virtual Tour', 'streamline-core' ) ?></a></li>
          <?php endif; ?>
        </ul>
        <!-- /.c-detail-tabs -->

        <div class="c-property-slider c-property-slider--layout-1 ms-showcase2-template">
          <div class="c-property-slider__inner master-slider ms-skin-default ms-lightbox-template" id="masterslider2" data-slider-height="<?php echo $slider_height; ?>" data-slider-controls="<?php echo $options['property_slider_controls'] ?>">
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
                <img src="<?php ResortPro()->assets_url('masterslider/blank.gif'); ?>"
                     data-src="<?php echo $property['default_image_path']; ?>"
                     alt="<?php echo $property['name']; ?>" />

                <img class="ms-thumb" src="<?php echo $property['default_thumbnail_path'] ?>"
                     alt="<?php echo wp_strip_all_tags( $property['short_description'], true ); ?>"/>

                <a href="<?php echo $property['default_image_path'] ?>" class="ms-lightbox"
                   data-title="<?php echo $property['location_name'] ?>" data-toggle="lightbox"
                   data-gallery="property-images"> <?php _e( 'lightbox', 'streamline-core' ) ?> </a>
              </div>
            <?php endif; ?>

          </div>
          <!-- .c-property-slider__inner -->

        </div>
        <!-- /.c-property-slider -->

        <span id="description-title" class="c-anchor"></span>
        <section class="o-section-wrapper row">
          <div class="col-md-12">
            <h3 class="c-section-title c-section-title--bordered"><?php _e( 'Description', 'streamline-core' ) ?></h3>
            <div class="property_description">
              <?php
              if (is_string($property['description'])) {
                echo $property['description'];
              }
              ?>
            </div>
          </div>
        </section>
        <!-- /.o-section-wrapper -->

        <?php if (isset($options['unit_tab_amenities']) && $options['unit_tab_amenities'] == 1 &&  (isset($property['unit_amenities']['amenity']) && count($property['unit_amenities']['amenity']) > 0)): ?>
          <span id="amenities-title" class="c-anchor"></span>
          <section class="o-section-wrapper row">
            <div class="col-md-12">
              <h3 class="c-section-title c-section-title--bordered"><?php _e( 'Amenities', 'streamline-core' ) ?></h3>
              <div id="property-amenities">
                <div class="row">
                  <?php foreach ($property['unit_amenities']['amenity'] as $amenity): ?>
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    <i class="fa fa-check"></i> <?php _e( $amenity['amenity_name']); ?>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </section>
          <!-- /.o-section-wrapper -->
        <?php endif; ?>

        <div class="<?php echo $enabled_availability; ?> disabled_availability">
          <span id="availability-title" class="c-anchor"></span>
          <section class="o-section-wrapper row">
            <div class="col-md-12">
              <h3 class="c-section-title c-section-title--bordered"><?php _e( 'Availability', 'streamline-core' ) ?></h3>
              <?php do_action('streamline-insert-calendar', $property['id'] ); ?>
            </div>
          </section>
          <!-- /.o-section-wrapper -->
        </div>

        <?php if (isset($options['unit_tab_location']) && $options['unit_tab_location'] == 1 && (!empty($property['location_latitude']) && !empty($property['location_longitude']))): ?>
          <span id="location-title" class="c-anchor"></span>
          <section class="o-section-wrapper row">
            <div class="col-md-12">
              <h3 class="c-section-title c-section-title--bordered"><?php _e( 'Location', 'streamline-core' ) ?></h3>
              <div id="property-location">
                <iframe src="<?php echo $iframe_url; ?>" style="width: 100%; height: 300px"></iframe>                
              </div>
            </div>
          </section>
          <!-- /.o-section-wrapper -->
        <?php endif; ?>

        <?php if(isset($options['unit_tab_reviews']) && $options['unit_tab_reviews'] == 1): ?>
          <span id="reviews-title" class="c-anchor"></span>
          <section class="o-section-wrapper" ng-init="getPropertyReviews(<?php echo $property['id']; ?>)">
            <div class="row" ng-if="reviews.length > 0">
              <div class="col-md-12">
                <h3 class="c-section-title c-section-title--bordered"><?php _e( 'Reviews', 'streamline-core' ) ?></h3>
                <div id="property-reviews">
                  <div class="c-review row" ng-repeat="review in reviews">
                    <div class="col-sm-8">
                      <h3 class="c-review__title" ng-if="isString(review.title)" ng-bind="review.title"></h3>
                      <h3 class="c-review__title" ng-if="!isString(review.title)"><?php _e( 'Guest Review', 'streamline-core' ) ?></h3>

                      <div class="c-review__meta"><?php _e( 'by', 'streamline-core' ) ?> <span class="c-review__author" ng-bind="review.guest_name"></span> on <span class="c-review__date" ng-bind="review.creation_date"></span></div>

                      <div class="c-review__body" ng-bind-html="review.comments | trustedHtml"></div>
                    </div>

                    <div class="col-sm-4">
                      <div class="c-star-rating">
                        <div class="c-star-rating__stars" star-rating rating-value="review.points" data-max="5"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- /.o-section-wrapper -->
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
          <span id="rates-title" class="c-anchor"></span>
          <section class="o-section-wrapper">
            <div class="row" ng-if="rates_details.length > 0">
              <div class="col-md-12">
                <h3 class="c-section-title c-section-title--bordered"><?php _e( 'Rates', 'streamline-core' ) ?></h3>
                <div id="rates-details" class="table-responsive">
                  <table class="table table-striped table-bordered table-condensed table-hover">
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
          </section>
          <!-- /.o-section-wrapper -->
        <?php endif; ?>

        <?php if(isset($options['unit_tab_room_details']) && $options['unit_tab_room_details'] == 1 && count($room_detail) > 0): ?>
          <span id="rooms-title" class="c-anchor"></span>
          <section class="o-section-wrapper row">
            <div class="col-md-12">
              <h3 class="c-section-title c-section-title--bordered"><?php _e( 'Room Details', 'streamline-core' ) ?></h3>
              <div id="rooms-details" class="table-responsive">
                <?php do_action('streamline-insert-roomdetails', $room_detail); ?>
              </div>
            </div>
          </section>
          <!-- /.o-section-wrapper -->
        <?php endif; ?>

        <?php if(isset($options['unit_tab_floorplan']) && $options['unit_tab_floorplan'] == 1 && (!empty($property['floor_plan_url']))): ?>
          <span id="floorplan-title" class="c-anchor"></span>
          <section class="o-section-wrapper row">
            <div class="col-md-12">
              <h3 class="c-section-title c-section-title--bordered"><?php _e( 'Floor Plan', 'streamline-core' ) ?></h3>
              <?php echo $property['floor_plan_url']; ?>
            </div>
          </section>
          <!-- /.o-section-wrapper -->
        <?php endif; ?>

        <?php if(isset($options['unit_tab_virtualtour']) && $options['unit_tab_virtualtour'] == 1 && (!empty($property['virtual_tour_url']))): ?>
          <span id="virtualtour-title" class="c-anchor"></span>
          <section class="o-section-wrapper row">
            <div class="col-md-12">
              <h3 class="c-section-title c-section-title--bordered"><?php _e( 'Virtual Tour', 'streamline-core' ) ?></h3>
              <?php echo $property['virtual_tour_url']; ?>
            </div>
          </section>
          <!-- /.o-section-wrapper -->
        <?php endif; ?>
      </div>

      <div id="resortpro-book-unit" class="c-sidebar col-lg-4"
        ng-init="maxOccupants='<?php echo $max_children; ?>'; isDisabled=true; total_reservation=0; book.unit_id=<?php echo $property['id'] ?>;book.checkin='<?php echo $start_date; ?>';book.checkout='<?php echo $end_date ?>';book.occupants='<?php echo $occupants; ?>';book.occupants_small='<?php echo $occupants_small; ?>';book.pets='<?php echo $pets; ?>';getPreReservationPrice(book,<?php echo $res ?>)">

        <div class="c-sidebar__inner c-sidebar__inner--bordered <?php echo $sticky_class ?>" <?php echo $sticky_spacing ?>>

          <?php if(!empty($booknow_title)): ?>
          <h3 class="c-sidebar__heading text-center"><?php _e( $booknow_title, 'streamline-core' ) ?></h3>
          <?php endif; ?>

          <div class="c-sidebar__section">
            <?php do_action('streamline-insert-booknow-widget', $property, $checkout_url, $hash, $nonce, $arrive_label, $depart_label, $adults_label, $children_label, $pets_label, $max_adults, $max_children, $max_pets, $min_stay, $checkin_days, $use_promo, $pbg_enabled); ?>

            <div class="form-group">
              <button type="button" href="#" data-toggle="modal" data-target="#myModal2" class="c-sidebar__inquiry-btn btn btn-lg btn-block btn-primary">
                <i class="glyphicon glyphicon-comment"></i> <?php _e( $inquiry_title, 'streamline-core' ) ?>
              </button>
            </div>
            
            <?php do_action('streamline-insert-share', $property['seo_page_name'], $property['id'], $start_date, $end_date, $occupants, $occupants_small, $pets ); ?>
          </div>
          <!-- /.c-sidebar__section -->

          <div class="c-sidebar__section">
            <?php if ($property['rating_average'] > 0): ?>
              <div class="c-star-rating c-star-rating--sidebar">
                <div class="c-star-rating__stars" star-rating rating-value="<?php echo $property['rating_average'] ?>" data-max="5"></div>
                <span class="c-star-rating__count">
                  <?php $reviews_txt = ($property['rating_count'] > 1) ? ' reviews' : ' review'; ?>
                  (<?php echo $property['rating_count'] ?> <?php _e( $reviews_txt, 'streamline-core' ) ?>)
                </span>
              </div>
            <?php endif; ?>

            <ul class="c-list-group c-details-list c-details-list--sidebar list-group">
              <li class="c-list-group__item c-details-list__item list-group-item"><?php _e( 'Sleeps:', 'streamline-core' ) ?>
                <span class="pull-right"><strong><?php echo $property['max_occupants']; ?></strong></span>
              </li>
              <li class="c-list-group__item c-details-list__item list-group-item"><?php _e( 'Bedrooms:', 'streamline-core' ) ?>
                <span class="pull-right"><strong><?php echo $property['bedrooms_number']; ?></strong></span>
              </li>
              <li class="c-list-group__item c-details-list__item list-group-item"><?php _e( 'Bathrooms:', 'streamline-core' ) ?>
                <span class="pull-right"><strong><?php echo $property['bathrooms_number']; ?></strong></span>
              </li>
              <li class="c-list-group__item c-details-list__item list-group-item"><?php _e( 'Pets:', 'streamline-core' ) ?>
                <span class="pull-right"><strong><?php echo $property['max_pets']; ?></strong></span>
              </li>
            </ul>
          </div>
          <!-- /.c-sidebar__section -->
          
        </div>
      </div>
      <!-- /.c-sidebar -->
      
    </div>
  </main>
  <!-- /.site-main -->

  <?php do_action('streamline-insert-inquiry', $property['location_name'], $property['id'], $max_adults, $max_children, $max_pets, $min_stay, $checkin_days, true, $start_date, $end_date, $occupants, $occupants_small, $pets, $inquiry_title ); ?>
  <?php do_action('streamline-insert-booknow', $property['location_name'], $property['id'], $max_adults, $max_children, $max_pets, $min_stay, $checkin_days, $nonce ); ?>
</div>
