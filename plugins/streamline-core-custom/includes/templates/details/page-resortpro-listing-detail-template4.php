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
<div id="primary" class="container content-area test4">
    <main id="main" class="site-main" role="main">
    	<?php if (is_active_sidebar('streamshare_search_area')): ?>
          <div class="row streamshare_search_widget">
            <?php dynamic_sidebar('streamshare_search_area'); ?>
          </div>
        <?php endif; ?>
        <br />
        <div class="row layout-4">
            <div class="breadcrumb_area">
                <div class="col-md-12">
                	<div class="row">
	                    <ol class="breadcrumb">
	                        <li><a href="/"><?php _e( 'Home', 'streamline-core' ) ?></a></li>
	                        <li><a href="/search-results"><?php _e( 'All Vacation Homes', 'streamline-core' ) ?></a></li>
	                        <li>
	                            <a href="/search-results?area_id=<?php echo $property['location_area_id'] ?>"><?php echo $property['location_area_name'] ?></a>
	                        </li><br/>
	                        <li class="active lst_list_itm h3">
	                            <?php
	                            if (empty($property['name']) || $property['name'] == 'Home') {
	                                echo $property['location_name'];
	                            } else {
	                                echo $property['name'];
	                            }
	                            ?>
	                        </li>
	                    </ol>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <input type="hidden" value="<?php echo $property['id'] ?>" id="unit_id">
            <ul class="nav nav-pills nav-justified">
		          <li role="presentation" class=""><a scroll-to="description-title" ><i class="fa fa-home"></i>&nbsp;<?php _e( 'Description', 'streamline-core' ) ?></a></li>

		          <?php if (isset($options['unit_tab_amenities']) && $options['unit_tab_amenities'] == 1 &&  (count($property['unit_amenities']['amenity']) > 0)): ?>
		            <li role="presentation" class=""><a scroll-to="amenities-title"><i class="fa fa-wifi"></i>&nbsp;<?php _e( 'Amenities', 'streamline-core' ) ?></a></li>
		          <?php endif; ?>

		          <?php if(isset($options['unit_tab_availability']) && $options['unit_tab_availability'] == 1): ?>
		            <li role="presentation" class=""><a scroll-to="availability-title"><i class="fa fa-calendar"></i>&nbsp;<?php _e( 'Availability', 'streamline-core' ) ?></a></li>
		          <?php endif; ?>

		          <li role="presentation" class=""><a scroll-to="photos-title"><i class="fa fa-camera"></i></i>&nbsp;<?php _e( 'Photos', 'streamline-core' ) ?></a></li>

		          <?php if (isset($options['unit_tab_location']) && $options['unit_tab_location'] == 1 && (!empty($property['location_latitude']) && !empty($property['location_longitude']))): ?>
		            <li role="presentation" class=""><a scroll-to="location-title"><i class="fa fa-map-marker"></i>&nbsp;<?php _e( 'Location', 'streamline-core' ) ?></a></li>
		          <?php endif; ?>

		          <?php if(isset($options['unit_tab_reviews']) && $options['unit_tab_reviews'] == 1): ?>
		            <li role="presentation" class="" ng-show="reviews.length > 0"><a scroll-to="reviews-title"><i class="fa fa-star"></i>&nbsp;<?php _e( 'Reviews', 'streamline-core' ) ?></a></li>
		          <?php endif; ?>

		          <?php if(isset($options['unit_tab_rates']) && $options['unit_tab_rates'] == 1): ?>
		            <li ng-if="rates_details.length > 0"  role="presentation" class=""><a scroll-to="rates-title"><i class="fa fa-usd"></i>&nbsp;<?php _e( 'Rates', 'streamline-core' ) ?></a></li>
		          <?php endif; ?>

		          <?php if(isset($options['unit_tab_room_details']) && $options['unit_tab_room_details'] == 1): ?>
		            <li role="presentation" class=""><a scroll-to="rooms-title"><i class="fa fa-tag"></i>&nbsp;<?php _e( 'Rooms Details', 'streamline-core' ) ?></a></li>
		          <?php endif; ?>

		          <?php if(isset($options['unit_tab_floorplan']) && $options['unit_tab_floorplan'] == 1 && (!empty($property['floor_plan_url']))): ?>
		            <li role="presentation" class=""><a scroll-to="floorplan-title"><i class="fa fa-low-vision"></i>&nbsp;<?php _e( 'Floor Plan', 'streamline-core' ) ?></a></li>
		          <?php endif; ?>

		          <?php if(isset($options['unit_tab_virtualtour']) && $options['unit_tab_virtualtour'] == 1 && (!empty($property['virtual_tour_url']))): ?>
		            <li role="presentation" class=""><a scroll-to="virtualtour-title"><i class="fa fa-eye"></i>&nbsp;<?php _e( 'Virtual Tour', 'streamline-core' ) ?></a></li>
		          <?php endif; ?>
		        </ul>
            <div class="col-lg-8 main_detail_content" ng-controller="PropertyController as pCtrl">
							<div class="row" ng-init="initializeData(); propertyId=<?php echo $property['id']; ?>">
							
							<div class="c-property-slider c-property-slider--layout-4 ms-showcase2-template">
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
									
	                <!-- begin description section -->
	                <a name="description-title" class="anchor"><?php _e( 'Description', 'streamline-core' ) ?></a>
	                <div class="unit_info_box">
	                    <div class="col-md-12">
	                        <h3 class="section-title" id=""><span><i class="fa fa-home"></i>&nbsp;<?php _e( 'Description', 'streamline-core' ) ?></span></h3>
	                        <div class="border_line"></div>
	                        <div class="property_description">
	                        	<h4 class="col-md-7"><div class="row"><?php echo $property['location_area_name'] ?></div></h4>
	                                <div class="unit-rating col-md-5 text-right">
										<?php if ($property['rating_average'] > 0): ?>
											<div class="row">
											  	<div class="star-rating text-right">
											    <div style="display: inline-block"
											         class="star-rating"
											         star-rating
											         rating-value="<?php echo $property['rating_average'] ?>"
											         data-max="5"></div>
											    <span style="display:inline-block; line-height: 31px; vertical-align: top">
											                <?php $reviews_txt = ($property['rating_count'] > 1) ? ' reviews' : ' review'; ?>
											      (<?php echo $property['rating_count'] ?> <?php echo $reviews_txt ?> )
											    </span>
										  		</div>
										  	</div>
										<?php endif; ?>
									</div>
	                            <div class="container_p_description">
	                                <ul class="col-md-8 pr_d_info">
	                                    <li><strong><?php echo $property['bedrooms_number']; ?></strong> Bedrooms,</li>
	                                    <li><strong><?php echo $property['bathrooms_number']; ?></strong> Bathrooms,</li>
	                                    <li><strong><?php echo $property['max_occupants']; ?></strong> Sleeps</li>
	                                </ul>
	                                <div class="col-md-4 d_house_id">House ID #<span id="unit_id"><?php echo $property['id']; ?></span></div>
	                                <div class="clearfix"></div>
	                                <div class="description_text">
		                                <?php
		                                if (is_string($property['description'])) {
		                                echo $property['description'];
		                                }
		                            	?>
	                            	</div>
	                            </div>
	                        </div>
	                        <button class="btn r_more_description secondary_button" ng-click="read_more()"><?php _e('Read More','streamline-core'); ?> &nbsp;&nbsp;<i class="fa fa-angle-down"></i></button>
	                    </div>
	                </div>
	                <div class="clearfix"></div>
	                <!-- end description -->
	                <!-- begin amenities -->
	                <?php if (isset($options['unit_tab_amenities']) && $options['unit_tab_amenities'] == 1 &&  (count($property['unit_amenities']['amenity']) > 0)): ?>
		                <a name="amenities-title" class="anchor"><?php _e( 'Amenities', 'streamline-core' ) ?></a>
		                <div class="unit_info_box">
		                    <div class="col-md-12">
		                        <h3 class="section-title"><span><i class="fa fa-wifi"></i>&nbsp;<?php _e( 'Amenities', 'streamline-core' ); ?></span></h3>
		                        <div class="border_line"></div>
		                        <div id="property-amenities">
		                            <div class="container_p_amenity">
		                                <div class="row">
		                                    <?php
		                                    if($property['unit_amenities']['amenity']['amenity_name']){
		                                        ?>
		                                        <div class="col-md-12">
		                                            <?php echo $property['unit_amenities']['amenity']['amenity_name']; ?>
		                                        </div>
		                                        <?php
		                                    }else{
		                                        foreach ($property['unit_amenities']['amenity'] as $amenity) {
		                                        ?>
		                                            <div class="col-lg-6 amenity_item">
		                                                <i class="fa fa-check-circle"></i><?php echo $amenity['amenity_name']; ?>
		                                            </div>
		                                        <?php }
		                                    }
		                                    ?>
		                                </div>
		                            </div>
		                            <button class="btn secondary_button r_more_amenity"><?php _e('Read More','streamline-core'); ?> &nbsp;&nbsp;<i class="fa fa-angle-down"></i></button>
		                        </div>
		                    </div>
		                </div>
		            <?php endif; ?>
		            <div class="clearfix"></div>
                	<!-- end amenities -->
                	<!-- start photos -->
                	<a name="photos-title" class="anchor"><?php _e( 'Photos', 'streamline-core' ) ?></a>
	                <div class="unit_info_box photos_section">
	                    <div class="col-md-12">
	                        <h3 class="section-title"><span><i class="fa fa-camera"></i>&nbsp;<?php _e( 'Photos', 'streamline-core' ); ?>&nbsp;(<?php echo count($property_gallery); ?>)</span></h3>
	                        <div class="border_line"></div>
	                         <div class="photos_container">
	                            <?php
	                                foreach ($property_gallery as $image):

	                            ?>
	                            <span class="col-md-6 col-sm-6 col-xs-6 photo_itm">
	                            	<span class="photo_itm_container">
	                                     <a href="<?php echo $image['image_path'] ?>" class="ms-lightbox"
	                                    data-title="<?php echo $property['location_name'] ?>" data-toggle="lightbox"
	                                data-gallery="<?php $property_gallery ?>"><img class="img-responsive-height" src="<?php echo $image['thumbnail_path'] ?>" ></a>
	                                </span>
	                            </span>
	                            <?php
	                                endforeach;
	                            ?>
	                        </div>
	                        <button class="btn secondary_button v_more_photos">View All <?php echo count($property_gallery); ?> <?php  _e('Photos','streamline-core'); ?> &nbsp;&nbsp;<i class="fa fa-angle-down"></i></button>
	                    </div>
	                </div>
	                <script type="text/javascript">
	                        jQuery('.v_more_photos').on('click', function(){
	                          if(jQuery('.photos_container .photo_itm:nth-child(5)').css('display') == 'block'){
	                          jQuery('.photos_container .photo_itm').css('display', 'none');
	                          jQuery('.photos_container .photo_itm:nth-child(1), .photos_container .photo_itm:nth-child(2), .photos_container .photo_itm:nth-child(3), .photos_container .photo_itm:nth-child(4)').css('display', 'block');
	                          jQuery(this).html('View All <?php echo count($property_gallery); ?> Photos&nbsp;&nbsp;<i class="fa fa-angle-down">');
	                          }else{
	                            jQuery('.photos_container .photo_itm').css('display', 'block');
	                            jQuery(this).html('View Less Photos &nbsp;&nbsp;<i class="fa fa-angle-up"></i>');
	                          }
	                        });
	                </script>
	                <div class="clearfix"></div>
	                <!-- end photos -->
                	<!-- begin calendar -->
	                <div class="<?php echo $enabled_availability; ?> disabled_availability">

			          <a name="availability-title" class="anchor"><?php _e( 'Availability', 'streamline-core' ) ?></a>
			          <div  class="unit_info_box availability_section">
			            <div class="col-md-12">
			              <h3 class="section-title"><span><i class="fa fa-calendar"></i>&nbsp;<?php _e( 'Availability', 'streamline-core' ) ?></span></h3>
			              <div class="border_line"></div>
			              <?php do_action('streamline-insert-calendar', $property['id'] ); ?>
			              <button class="btn secondary_button v_more_dates"><?php  _e('View More Dates','streamline-core'); ?> &nbsp;&nbsp;<i class="fa fa-angle-down"></i></button>
			            </div>

			          </div>
			        </div>
			        <div class="clearfix"></div>
        			<!-- end calendar -->
        			<!-- begin location -->
        			<?php if (isset($options['unit_tab_location']) && $options['unit_tab_location'] == 1 && (!empty($property['location_latitude']) && !empty($property['location_longitude']))): ?>
			          <a name="location-title" class="anchor"><?php _e( 'Location', 'streamline-core' ) ?></a>
			          <div class="unit_info_box location_section">
			            <div class="col-md-12">
			              <h3 class="section-title"><span><i class="fa fa-map-marker"></i>&nbsp;<?php _e( 'Location', 'streamline-core' ) ?></span></h3>
			              <div class="border_line"></div>
			              <div id="property-location">
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
			        <div class="clearfix"></div>
			        <!-- end location -->
			        <!-- begin reviews -->
			        <?php if(isset($options['unit_tab_reviews']) && $options['unit_tab_reviews'] == 1): ?>
			          <div ng-if="reviews.length > 0" class="reviews-content" ng-init="getPropertyReviews(<?php echo $property['id']; ?>)">
			            <a name="reviews-title" class="anchor"><?php _e( 'Reviews', 'streamline-core' ) ?></a>
			            <div class="unit_info_box reviews_section" >
			              <div class="col-md-12">
			                <h3 class="section-title"><span><i class="fa fa-star"></i>&nbsp;<?php _e( 'Reviews', 'streamline-core' ) ?></span></h3>
			                <div class="border_line"></div>
			                <div id="property-reviews">
			                  <div class="row row-review" ng-repeat="review in reviews">
			                    <div class="col-sm-8">
			                      <h3 ng-cloak ng-if="!isEmptyObject(review.title)">{[review.title]}</h3>
			                      <h3 ng-cloak ng-if="isEmptyObject(review.title)"><?php _e( 'Guest Review', 'streamline-core' ) ?></h3>

			                      <div class="by">by <span class="guest-name" ng-bind="review.guest_name"></span> on <span class="creation-date" ng-bind="review.creation_date"></span></div>

			                      <div class="review-details" ng-bind-html="review.comments | trustedHtml"></div>

			                    </div>
			                    <div class="col-sm-4">
			                      <div style="display: inline-block" class="star-rating text-right" star-rating
			                           rating-value="review.points" data-max="5"></div>
			                    </div>
			                  </div>
			                </div>
			              </div>
			            </div>
			          </div>
			        <?php endif; ?>
			        <div class="clearfix"></div>
							<!-- end reviews -->
							
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

			        <!-- begin rates -->
			        <?php if(isset($options['unit_tab_rates']) && $options['unit_tab_rates'] == 1): ?>
			          <div class="rates-content" ng-if="rates_details.length > 0">
			            <a name="rates-title" class="anchor"><?php _e( 'Rates', 'streamline-core' ) ?></a>
			            <div class="unit_info_box rates_section">
			              <div class="col-md-12">
			                <h3 class="section-title"><span><i class="fa fa-usd"></i>&nbsp;<?php _e( 'Rates', 'streamline-core' ) ?></span></h3>
			                <div class="border_line"></div>
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
			          </div>
			        <?php endif; ?>
			        <div clas="clearfix"></div>
			        <!-- end rates -->
			        <!-- begin room details -->
			        <?php if(isset($options['unit_tab_room_details']) && $options['unit_tab_room_details'] == 1): ?>
			          <div class="rooms-content" ng-init="getRoomDetails(<?php echo $property['id']; ?>)">
			            <a name="rooms-title" class="anchor"><?php _e( 'Rooms Details', 'streamline-core' ) ?></a>
			            <div class="unit_info_box room_details_section" ng-if="room_details.length > 0">
			              <div class="col-md-12">
			                <h3 class="section-title"><span><i class="fa fa-tag"></i>&nbsp;<?php _e( 'Room Details', 'streamline-core' ) ?></span></h3>
			                 <div class="border_line"></div>
			                <div id="room-details" class="table-responsive">

			                  <table class="table table-striped table-hover table-condensed table-bordered">
			                    <thead>
			                    <tr>
			                      <th><?php _e( 'Room', 'streamline-core' ) ?></th>
			                      <th><?php _e( 'Beds', 'streamline-core' ) ?></th>
			                      <th><?php _e( 'Baths', 'streamline-core' ) ?></th>
			                      <th><?php _e( 'TVs', 'streamline-core' ) ?></th>
			                      <th><?php _e( 'Comments', 'streamline-core' ) ?></th>
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
			            </div>
			          </div>
			        <?php endif; ?>
			        <!-- end room details -->
			        <!-- begin floor plan -->
			        <?php if(isset($options['unit_tab_floorplan']) && $options['unit_tab_floorplan'] == 1 && (!empty($property['floor_plan_url']))): ?>
			          <a name="floorplan-title" class="anchor"><?php _e( 'Floor Plan', 'streamline-core' ) ?></a>
			          <div class="unit_info_box floorplan_section" >
			            <div class="col-md-12">
			              <h3 class="section-title"><span><i class="fa fa-low-vision"></i>&nbsp;<?php _e( 'Floor Plan', 'streamline-core' ) ?></span></h3>
			              <div class="border_line"></div>
			              <?php echo $property['floor_plan_url']; ?>
			            </div>
			          </div>
			        <?php endif; ?>
			        <div class="clearfix"></div>
			        <!-- end floor plan -->
			        <!-- begin virtualtour plan -->
			        <?php if(isset($options['unit_tab_virtualtour']) && $options['unit_tab_virtualtour'] == 1 && (!empty($property['virtual_tour_url']))): ?>
			          <a name="virtualtour-title" class="anchor"><?php _e( 'Virtual Tour', 'streamline-core' ) ?></a>
			          <div class="unit_info_box virtualtour_section">
			            <div class="col-md-12">
			              <h3 class="section-title"><span><i class="fa fa-eye"></i>&nbsp;<?php _e( 'Virtual Tour', 'streamline-core' ) ?></span></h3>
			              <div class="border_line"></div>
			              <?php echo $property['virtual_tour_url']; ?>
			            </div>
			          </div>
			        <?php endif; ?>
			        <div class="clearfix"></div>
			        <!-- end virtual tour -->
                </div>
            </div><!-- end main_detail_content  -->

            <div class="col-lg-4" id="resortpro-book-unit" ng-controller="CheckoutController as cCtrl">
		        	<div ng-init="maxOccupants='<?php echo $max_children; ?>'; isDisabled=true; total_reservation=0; book.unit_id=<?php echo $property['id'] ?>;book.checkin='<?php echo $start_date; ?>';book.checkout='<?php echo $end_date ?>';hash='<?php echo $hash; ?>';referrer_url='<?php echo $checkout_url; ?>'; checkout.country='US';unit=<?php echo $property['id'] ?>;getPreReservationPrice2(book, 0)" >

                <div ng-init="initCheckout()">
                	<div ng-if="reservationDetails.total > 0" class="price_sticky price_table" <?php echo $sticky_spacing ?> ng-cloak>
                		  <table  class="table table-bordered table-striped table-hover table-condensed">
						    <tbody>
						    <tr>
						      <td>
						        <strong><?php	_e('Subtotal',	'streamline-core');	?> </strong>
						      </td>
						      <td ng-if="!reservationDetails.extra > 0" class="text-right"><span ng-bind="subTotal | currency"></span></td>
						    </tr>
						    <tr>
						      <td>
						        <strong><?php	_e('Taxes &amp; Fees',	'streamline-core');	?></strong>
						        <a class="btn-taxes-breakdown taxes_expand">
						          <i class="fa fa-plus"></i>
						        </a>
						      </td>
						      <td class="text-right"><span ng-bind="taxesAndFees | currency"></span>
						      </td>
						    </tr>

						    <tr ng-repeat="reqFee in reservationDetails.required_fees" class="breakdown-taxes-hidden" data-visible="false">
						      <td style="text-indent: 24px">
						        <span ng-bind="reqFee.name"></span>
						      </td>
						      <td class="text-right" ng-bind="reqFee.value | currency"></td>
						    </tr>

						    <tr ng-repeat="reqFee in reservationDetails.taxes_details" class="breakdown-taxes-hidden" data-visible="false">
						      <td style="text-indent: 24px"><span ng-bind="reqFee.name"></span></td>
						      <td class="text-right" ng-bind="reqFee.value | currency"></td>
						    </tr>

						    <tr ng-if="reservationDetails.coupon_discount > 0">
						      <td><span><?php	_e('Discount',	'streamline-core');	?>: </span></td>
						      <td class="text-right" ng-bind="'(' + (reservationDetails.coupon_discount | currency) + ')'"></td>
						    </tr>
						    <tr>
						      <td>
						        <strong class="total_price"><?php	_e('Total Price',	'streamline-core');	?>:</strong>
						      </td>
						      <td class="text-right step_1_total_price_value" ng-bind="reservationDetails.total | currency"></td>
						    </tr>
						    </tbody>
						  </table>
                	</div>
                  <div class="main_cnt_step_1 container_background">
                    <div class="guest_check">
                      <span><i class="fa fa-check"></i></span>
                      <span class="st_1">1. <?php _e('Dates & Guests','streamline-core') ?></span>
                    </div>
                    <div id="step0" class="panel-collapse collapse in" role="tabpanel">
                      <?php include($step_1); ?>
                    </div> <!-- end container step 1 -->
                  </div> <!-- end main_cnt_step 1 -->
                  <div class="main_cnt_step_2 container_background">
                    <div class="guest_check">
                      <span><i class="fa fa-check"></i></span>
                      <span class="st_2">2. <?php _e('Your Details','streamline-core') ?></span>
                    </div>
                    <div id="step1" class="panel-collapse collapse" role="tabpanel">
                      <?php include($step_2); ?>
                    </div> <!-- end container step 2 -->
                  </div> <!-- end main_cnt_step 2 -->
                  <div class="main_cnt_step_3 container_background">
                    <div class="guest_check">
                      <span><i class="fa fa-check"></i></span>
                      <span class="st_3">3. <?php _e('Protect Your Investment','streamline-core') ?></span>
                    </div>
                    <div id="step2" class="panel-collapse collapse" role="tabpanel">
                      <?php include($step_3); ?>
                    </div> <!-- end container step 3 -->
                  </div> <!-- end main_cnt_step 3 -->
                  <div class="main_cnt_step_4 container_background">
                    <div class="guest_check">
                      <span><i class="fa fa-check"></i></span>
                      <span class="st_4">4. <?php _e('Secure Payments','streamline-core') ?></span>
                    </div>
                    <div id="step3" class="panel-collapse collapse" role="tabpanel">
                      <?php include($step_4); ?>
                    </div> <!-- end container step 4 -->
                  </div> <!-- end main_cnt_step 4 -->
		         		</div>
		        </div>
		      </div><!-- end  resortpro-book-unit-->
		      <?php do_action('streamline-insert-inquiry', $property['location_name'], $property['id'], $max_adults, $max_children, $max_pets, $min_stay, $checkin_days, true, $start_date, $end_date, $occupants, $occupants_small, $pets, $inquiry_title ); ?>


        </div> <!-- end layout 4 -->
    </main>
   

</div>
<div class="clearfix"></div>
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
<button class="btn secondary_button to_top_btn"><?php _e('Back To Top','streamline-core') ?></button>
<script type="text/javascript">
var book_now_restrictions = JSON.parse('<?php echo json_encode($book_now_restrictions); ?>');
</script>