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

<div class="c-property-slider c-property-slider--wide  ms-showcase2-template">
  <div class="c-property-slider__inner master-slider ms-skin-default" id="masterslider3" data-slider-height="<?php echo $slider_height; ?>" data-slider-controls="<?php echo $options['property_slider_controls'] ?>">
    <?php if(count($property_gallery) > 0) : ?>
      <?php foreach ($property_gallery as $image): ?>
        <div class="ms-slide">
          <img src="<?php ResortPro::assets_url('masterslider/blank.gif'); ?>" data-src="<?php echo $image['image_path'] ?>" alt="<?php echo $image['id'] ?>"/>

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

<div id="contentarea">
  <div id="primary" class="container content-area" ng-controller="PropertyController as pCtrl">
    <main id="main" class="site-main content" role="main" ng-init="initializeData(<?php echo $property['id']; ?>);">
      <div class="row layout-5">
        <div class="col-lg-8 col-xs-12">
          <div class="row">
            <h1 class="c-main-heading c-main-heading--mv-none col-lg-12"><?php _e( $property['name'], 'streamline-core' ) ?></h1>

            <input type="hidden" value="<?php echo $property['id'] ?>" id="unit_id">
          </div>

          <ol class="breadcrumb breadcrumb--light">
            <li><a href="/"><?php _e( 'Home', 'streamline-core' ) ?></a></li>
            <li><a href="/search-results"><?php _e( 'All Rentals', 'streamline-core' ) ?></a></li>
            <li>
              <a href="/search-results?area_id=<?php echo $property['location_area_id'] ?>"><?php echo $property['location_area_name'] ?></a>
            </li>
            <li class="active"><?php _e( $property['name'], 'streamline-core' ) ?></li>
          </ol>
          <!-- /.breadcrumb -->

          <ul class="c-list-group c-list-group--detail c-details-list c-details-list--flat list-group">
            <li class="c-list-group__item c-list-group__item--detail c-details-list__item list-group-item">
              <i class="fa fa-user"></i>
              <?php _e( 'Sleeps:', 'streamline-core' ) ?>
              <?php echo $property['max_occupants']; ?>
            </li>
            <li class="c-list-group__item c-list-group__item--detail c-details-list__item list-group-item">
              <i class="fa fa-bed"></i>
              <?php _e( 'Bedrooms:', 'streamline-core' ) ?>
              <?php echo $property['bedrooms_number']; ?>
            </li>
            <li class="c-list-group__item c-list-group__item--detail c-details-list__item list-group-item">
              <i class="fa fa-bath"></i>
              <?php _e( 'Bathrooms:', 'streamline-core' ) ?>
              <?php echo $property['bathrooms_number']; ?>
            </li>
            <li class="c-list-group__item c-list-group__item--detail c-details-list__item list-group-item">
              <i class="fa fa-paw"></i>
              <?php _e( 'Pets:', 'streamline-core' ) ?>
              <?php echo $property['max_pets']; ?>
            </li>
          </ul>
          <!-- /.c-details-list -->

          <section class="o-section-wrapper row">
            <div class="col-xs-12">
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
            <section class="o-section-wrapper row">
              <div class="col-md-12">
                <h3 class="c-section-title"><?php _e( 'Amenities', 'streamline-core' ) ?></h3>
                <?php if (count($property['unit_amenities']['amenity']) > 0): ?>
                  <div id="property-amenities">
                    <div class="c-amenities-list c-expandable-text js-expandableText row">
                      <?php foreach ($property['unit_amenities']['amenity'] as $amenity): ?>
                      <div class="col-md-4 col-sm-6 col-xs-6">
                      <i class="fa fa-angle-right"></i> <?php echo $amenity['amenity_name']; ?>
                      </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            </section>
            <!-- /.o-section-wrapper -->
          <?php endif; ?>

          <?php if(isset($options['unit_tab_availability']) && $options['unit_tab_availability'] == 1): ?>
            <section class="o-section-wrapper row">
              <div class="col-md-12">
                <h3 class="c-section-title"><?php _e( 'Availability', 'streamline-core' ) ?></h3>
                <?php do_action('streamline-insert-calendar', $property['id'] ); ?>
              </div>
            </section>
            <!-- /.o-section-wrapper -->
          <?php endif; ?>

          <?php if (isset($options['unit_tab_location']) && $options['unit_tab_location'] == 1 && (!empty($property['location_latitude']) && !empty($property['location_longitude']))): ?>
            <section class="o-section-wrapper row">
              <div class="col-md-12">
                <h3 class="c-section-title"><?php _e( 'Location', 'streamline-core' ) ?></h3>
                <div id="property-location">
                  <iframe src="<?php echo $iframe_url; ?>" style="width: 100%; height: 300px"></iframe>
                </div>
              </div>
            </section>
            <!-- /.o-section-wrapper -->
          <?php endif; ?>
          
          <?php if(isset($options['unit_tab_reviews']) && $options['unit_tab_reviews'] == 1): ?>
            <section class="row" ng-init="getPropertyReviews(<?php echo $property['id']; ?>)" ng-show="reviews.length > 0">
              <div class="col-md-12">
                <h3 class="c-section-title"><?php _e( 'Reviews', 'streamline-core' ) ?></h3>
                <div id="property-reviews">
                  <div class="c-review row" ng-repeat="review in reviews">
                    <div class="col-sm-8">
                      <h3 class="c-review__title" ng-cloak ng-if="!isEmptyObject(review.title)" ng-bind="review.title"></h3>
                      <h3 class="c-review__title" ng-cloak ng-if="isEmptyObject(review.title)"><?php _e( 'Guest Review', 'streamline-core' ) ?></h3>
                      <div class="c-review__meta">by <span class="c-review__author" ng-bind="review.guest_name"></span> on <span class="c-review__date" ng-bind="review.creation_date"></span></div>

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

          <?php if(isset($options['unit_tab_room_details']) && $options['unit_tab_room_details'] == 1 && count($room_detail) > 0): ?>
            <section class="o-section-wrapper row">
              <div class="col-md-12">
                <h3 class="c-section-title"><?php _e( 'Room Details', 'streamline-core' ) ?></h3>
                <div class="c-property-table c-property-table--flat table-responsive">
                  <?php do_action('streamline-insert-roomdetails', $room_detail); ?>
                </div>
              </div>
            </section>
            <!-- /.o-section-wrapper -->
          <?php endif; ?>

          <?php if(isset($options['unit_tab_rates']) && $options['unit_tab_rates'] == 1): ?>
            <section class="o-section-wrapper row" ng-init="getRatesDetails(<?php echo $property['id']; ?>)">
              <div class="col-md-12">
                <h3 class="c-section-title"><?php _e( 'Rates', 'streamline-core' ) ?></h3>
                <div id="rates-details" class="c-property-table c-property-table--flat table-responsive">
                  <table class="table table-striped table-bordered table-condensed table-hover" ng-show="rates_details.length > 0">
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
                      <td><span ng-bind="rate.period_begin"></span> - <span ng-bind="rate.period_end"></span></td>
                      <td ng-bind="rate.narrow_defined_days"></td>
                      <td class="text-center"><span ng-if="rate.daily_first_interval_price" ng-bind="calculateMarkup(rate.daily_first_interval_price) | currency"></span></td>
                      <td class="text-center"><span ng-if="rate.weekly_price" ng-bind="calculateMarkup(rate.weekly_price) | currency"></span></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </section>
            <!-- /.o-section-wrapper -->
          <?php endif; ?>

          <?php if(isset($options['unit_tab_floorplan']) && $options['unit_tab_floorplan'] == 1 && (!empty($property['floor_plan_url']))): ?>
            <section class="o-section-wrapper row">
              <div class="col-md-12">
                <h3 class="c-section-title"><?php _e( 'Floor Plan', 'streamline-core' ) ?></h3>
                <div id="floor-plan">
                  <?php echo $property['floor_plan_url']; ?>
                </div>
              </div>
            </section>
            <!-- /.o-section-wrapper -->
          <?php endif; ?>

          <?php if(isset($options['unit_tab_virtualtour']) && $options['unit_tab_virtualtour'] == 1 && (!empty($property['virtual_tour_url']))): ?>
            <section class="o-section-wrapper row">
              <div class="col-md-12">
                <h3 class="section-title"><?php _e( 'Virtual Tour', 'streamline-core' ) ?></h3>
                <div id="floor-plan">
                  <?php echo $property['virtual_tour_url']; ?>
                </div>
              </div>
            </section>
            <!-- /.o-section-wrapper -->
          <?php endif; ?>

        </div>
        <div id="resortpro-book-unit" class="c-sidebar col-lg-4 col-xs-12"
            ng-init="maxOccupants='<?php echo $max_children; ?>'; isDisabled=true; total_reservation=0; book.unit_id=<?php echo $property['id'] ?>;book.checkin='<?php echo $start_date; ?>';book.checkout='<?php echo $end_date ?>';book.occupants='<?php echo $occupants; ?>';book.occupants_small='<?php echo $occupants_small; ?>';book.pets='<?php echo $pets; ?>';getPreReservationPrice(book,<?php echo $res ?>)">

          <div class="c-sidebar__inner c-sidebar__inner--bordered <?php echo $sticky_class ?>" <?php echo $sticky_spacing ?>>

            <?php if(!empty($booknow_title)): ?>
            <h3 class="c-sidebar__heading text-center"><?php _e( $booknow_title, 'streamline-core' ) ?></h3>
            <?php endif; ?>
            
            <div class="c-sidebar__section">
              <?php do_action('streamline-insert-booknow-widget', $property, $checkout_url, $hash, $nonce, $arrive_label, $depart_label, $adults_label, $children_label, $pets_label, $max_adults, $max_children, $max_pets, $min_stay, $checkin_days, $use_promo, $pbg_enabled); ?>

              <a type="button" href="#" data-toggle="modal" data-target="#myModal2" class="c-sidebar__inquiry-btn center-block text-center">
                <?php _e( $inquiry_title, 'streamline-core' ) ?>
              </a>
              
              <?php do_action('streamline-insert-share', $property['seo_page_name'], $property['id'], $start_date, $end_date, $occupants, $occupants_small, $pets ); ?>
            </div>
            <!-- /.c-sidebar__section -->

          </div>
        </div>
      </div>
    </main>
    <!-- .site-main -->
    
    <?php do_action('streamline-insert-inquiry', $property['location_name'], $property['id'], $max_adults, $max_children, $max_pets, $min_stay, $checkin_days, true, $start_date, $end_date, $occupants, $occupants_small, $pets, $inquiry_title ); ?>

    <?php do_action('streamline-insert-booknow', $property['location_name'], $property['id'], $max_adults, $max_children, $max_pets, $min_stay, $checkin_days, $nonce ); ?>
  </div>
</div>
<!-- .content-area -->
