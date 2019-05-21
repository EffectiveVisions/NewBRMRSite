<style type="text/css">
	/* Disable sticky header on this page */
	#header.fixed_menu{
		position: relative;
		transform: none !important;
	}
	#wrapper.fixed_menu {
	    padding-top: 0;
	}
</style>

<div id="primary" class="content-area compare page_compare" ng-controller="PropertyController as pCtrl">
	<div ng-init="loadCompare()" ng-if="readyToCompare() <= 1" class="row" ng-cloak>

		<div id="compareBar" class="compare-bar">
			<div class="container">
				<div class="row">
					<div ng-repeat="property in compareObj" >
						<div class="c-property-listings__item listing-1 col-sm-12 row-spac-2 grid-1 col-xs-12" ng-class="readyToCompare()==0 ? 'col-sm-4' : 'col-sm-6'" ng-mouseenter="highlightIcon(property.id)" ng-mouseleave="restoreIcon(property.id)">
					    <div class="c-property c-property--listing-1">
				        <div class="c-property__header">
									<h3 class="c-property__heading">
										<a class="u-truncate" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}" ng-bind="getUnitName(property)" ng-click="addToRecents(property)"></a>
									</h3>

									<span class="c-property__location u-truncate" ng-if="!isEmptyObject(property.location_area_id)" ng-bind="property.location_area_name"></span>

									<div class="c-star-rating" ng-if="property.rating_average > 0">
										<div class="c-star-rating__stars" star-rating rating-value="property.rating_average" data-max="5"></div>
										<span class="c-star-rating__count" ng-bind="'(' + (property.rating_count | pluralizeRating) + ')'"></span>
									</div>
									<div class="c-star-rating" ng-if="!property.rating_average > 0">
										<span class="c-star-rating__count"><?php _e( 'No reviews', 'streamline-core' ) ?></span>
									</div>
				        </div>
								<!-- /.c-property__header -->

								<div class="c-property__body">
									<ul class="c-property__details text-muted">
										<li class="c-property__details-item">
											<?php _e( 'Beds: <span ng-bind="property.bedrooms_number"></span> |', 'streamline-core' ) ?>
										</li>
										<li class="c-property__details-item">
											<?php _e( 'Baths: <span ng-bind="property.bathrooms_number"></span> |', 'streamline-core' ) ?>
										</li>
										<li class="c-property__details-item">
											<?php _e( 'Sleeps: <span ng-bind="property.max_occupants"></span>', 'streamline-core' ) ?>
										</li>
									</ul>
									<!-- /.c-property__details -->

									<div class="c-property__cost" ng-if="!isSimplePricing(property)">
										<del ng-if="property.coupon_discount > 0" ng-bind="getOldPrice(property,0)"></del>
										<span ng-bind="getTotalPrice(property,0)"></span>
										<small ng-bind="getTotalAppend(property)"></small>
									</div>
									<div class="c-property__cost" ng-if="isSimplePricing(property)">
										<small ng-bind="getPrependTex(property.price_data)"></small>
										<span ng-bind="getSimplePrice(property.price_data,0)"></span>
										<small ng-bind="getAppendTex(property.price_data)"></small>
									</div>

									<div ng-if="isString(property.restriction_message)">
										<p class="c-property__restriction-msg text-danger" ng-bind-html="property.restriction_message | trustedHtml"></p>
									</div>
								</div>
								<!-- c-property__body -->

								<div class="c-property__cta row">
									<div class="c-property__cta-item col-xs-6">
										<a class="c-property__cta-btn c-property__cta-btn--book"
												ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}" ng-click="addToRecents(property)">
											<?php _e( 'More Info', 'streamline-core' ) ?>
										</a>
									</div>

									<div class="c-property__cta-item col-xs-6">
										<a class="c-property__cta-btn c-property__cta-btn--inquiry u-truncate" href="#" ng-click="setUnitForInquiry(property.id)" data-toggle="modal" data-target="#myModal2">
											<?php _e( 'Property Inquiry', 'streamline-core' ) ?>
										</a>
									</div>
								</div>
								<!-- /.c-property-cta -->

					    </div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12 loading" ng-show="loading">
			<i class="fa fa-circle-o-notch fa-spin"></i> <?php _e('Loading...', 'streamline-core') ?>
		</div>

		<div class="clearfix js-compareElem">
			<div ng-repeat="property in compareObj" >
				<div class="c-property-listings__item listing-1 col-sm-12 row-spac-2 grid-1 col-xs-12" ng-class="readyToCompare()==0 ? 'col-sm-4' : 'col-sm-6'" ng-mouseenter="highlightIcon(property.id)" ng-mouseleave="restoreIcon(property.id)">
			    <div class="c-property c-property--listing-1">
		        <div class="c-property__header">
							<h3 class="c-property__heading">
								<a class="u-truncate" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}" ng-bind="getUnitName(property)" ng-click="addToRecents(property)"></a>
							</h3>

							<span class="c-property__location u-truncate" ng-if="!isEmptyObject(property.location_area_id)" ng-bind="property.location_area_name"></span>

							<div class="c-star-rating" ng-if="property.rating_average > 0">
								<div class="c-star-rating__stars" star-rating rating-value="property.rating_average" data-max="5"></div>
								<span class="c-star-rating__count rating-count" ng-bind="'(' + (property.rating_count | pluralizeRating) + ')'"></span>
							</div>
							<div class="c-star-rating star-rating" ng-if="!property.rating_average > 0">
							<span class="c-star-rating__count"><?php _e( 'No reviews', 'streamline-core' ) ?></span>
							</div>
		        </div>
						<!-- /.c-property__header -->

						<div class="c-property__img" ng-class="searchSettings.enable_slider_image == '1' ? 'c-property__img--carousel' : ''">
							<span class="c-property__pet-icon js-petFriendly" ng-if="property.max_pets > 0" data-toggle="tooltip" data-placement="left" title="Pet friendly"><i class="fa fa-paw"></i></span>

							<?php if($use_favorites): ?>
								<a ng-if="!checkFavorites(property)" class="c-property__fav-btn js-btnFav" ng-click="addToFavorites(property)" data-toggle="tooltip" data-placement="right" title="Add to favorites">
								<i class="fa fa-heart-o"></i></a>

								<a ng-if="checkFavorites(property)" class="c-property__fav-btn js-btnFav" ng-click="removeFromFavorites(property)" data-toggle="tooltip" data-placement="right" title="Remove from favorites">
								<i class="fa fa-heart"></i></a>
							<?php endif; ?>

							<?php if($use_compare): ?>
                <a ng-if="!checkCompare(property)" class="c-property__cmp-btn btn-cmp" ng-click="addToCompare(property)" data-togle="tooltip" data-placement="right" title="Add to Unit Compare" ng-sow="showCompare">
                  <i class="fa fa-balance-scale unmarked"></i>
                </a>

                <a ng-if="checkCompare(property)" class="c-property__cmp-btn btn-cmp marked" ng-click="removeFromCompare(property)" data-togle="tooltip" data-placement="right" title="Remove Unit from Compare" ng-sow="showCompare">
                  <i class="fa fa-balance-scale marked"></i>
                </a>
              <?php endif; ?>

							<a class="c-property__img-link"
									ng-if="searchSettings.enable_slider_image == '0'"
									ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}"
									ng-click="addToRecents(property)">
								<img ng-src="{[property.default_thumbnail_path]}"
								err-src="<?php ResortPro::assets_url('images/dummy-image.jpg'); ?>"
								ng-alt="{[property.location_name]}"/>
							</a>

              <div id="myCarousel-{[property.id]}" class="c-property__carousel carousel slide" data-ride="carousel" data-interval="false" ng-if="searchSettings.enable_slider_image == '1'">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#myCarousel-{[property.id]}" data-slide-to="0" class="active"></li>
									<li data-target="#myCarousel-{[property.id]}" data-slide-to="1"></li>
									<li data-target="#myCarousel-{[property.id]}" data-slide-to="2"></li>
									<li data-target="#myCarousel-{[property.id]}" data-slide-to="3"></li>
								</ol>

                <!-- Wrapper for slides -->
	              <div class="carousel-inner">
	                <div class="item active">
                    <a class="thumb" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}">
											<img class="img-lookup" ng-src="{[property.default_thumbnail_path]}" err-src="<?php ResortPro::assets_url('images/dummy-image.jpg'); ?>" ng-alt="{[property.location_name]}"/>
                    </a>
                </div>

	                <div class="item">
										<a class="thumb" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
											<img class="img-lookup img-responsive-height" ng-src="{[getImage(property.id, 1)]}" err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
                    </a>
	                </div>

	                <div class="item">
                    <a class="thumb" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                        <img class="img-lookup img-responsive-height" ng-src="{[getImage(property.id, 2)]}" err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
                    </a>
									</div>

									<div class="item">
                    <a class="thumb" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                        <img class="img-lookup img-responsive-height" ng-src="{[getImage(property.id, 3)]}" err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
                    </a>
									</div>
	              </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel-{[property.id]}" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel-{[property.id]}" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
						</div>
						<!-- /.c-property__img -->

						<div class="c-property__body">
							<ul class="c-property__details">
								<li class="c-property__details-item c-property__details-item--icon" data-toggle="tooltip" data-placement="left" title="Sleeps: {[property.max_occupants]}">
								<i class="fa fa-group"></i> <span ng-bind="property.max_occupants"></span>
								</li>
								<li class="c-property__details-item c-property__details-item--icon" data-toggle="tooltip" data-placement="left" title="Bedrooms: {[property.bedrooms_number]}">
								<i class="fa fa-hotel"></i> <span ng-bind="property.bedrooms_number"></span>
								</li>
								<li class="c-property__details-item c-property__details-item--icon" data-toggle="tooltip" data-placement="left" title="Bathrooms: {[property.bathrooms_number]}">
								<i class="fa fa-bath"></i> <span ng-bind="property.bathrooms_number"></span>
								</li>
							</ul>
							<div class="c-property__cost" ng-if="!isSimplePricing(property)">
								<del ng-if="property.coupon_discount > 0" ng-bind="getOldPrice(property,0)"></del>
								<span ng-bind="getTotalPrice(property,0)"></span>
								<small ng-bind="getTotalAppend(property)"></small>
							</div>
							<div class="c-property__cost" ng-if="isSimplePricing(property)">
								<small ng-bind="getPrependTex(property.price_data)"></small>
								<span ng-bind="getSimplePrice(property.price_data,0)"></span>
								<small ng-bind="getAppendTex(property.price_data)"></small>
							</div>

							<div ng-if="isString(property.restriction_message)">
								<p class="c-property__restriction-msg text-danger" ng-bind-html="property.restriction_message | trustedHtml"></p>
							</div>
						</div>
						<!-- c-property__body -->

						<div class="c-property__cta row">
							<div class="c-property__cta-item col-xs-6">
								<a class="c-property__cta-btn c-property__cta-btn--book"
										ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}" ng-click="addToRecents(property)">
									<?php _e( 'More Info', 'streamline-core' ) ?>
								</a>
							</div>

							<div class="c-property__cta-item col-xs-6">
								<a class="c-property__cta-btn c-property__cta-btn--inquiry u-truncate" href="#" ng-click="setUnitForInquiry(property.id)" data-toggle="modal" data-target="#myModal2">
									<?php _e( 'Property Inquiry', 'streamline-core' ) ?>
								</a>
							</div>
						</div>
						<!-- /.c-property-cta -->

			    </div>
				</div>
			</div>
		</div>

		<section class="o-section-wrapper comparison_box overview clearfix" ng-show="!loading">
			<h3 class="c-section-title col-xs-12"><?php _e( 'Property Overview', 'streamline-core' ) ?></h3>

			<div id="room-details" ng-repeat="property in compareObj">
				<div ng-class="readyToCompare()==0 ? 'col-sm-4' : 'col-sm-6'" class="col-xs-12" >
					<table class="table table-striped table-hover table-condensed table-bordered">
	       		<thead class="hidden-sm">
	       			<div class="propertyTitle col-xs-12 hidden-lg hidden-md hidden-sm">
								<a class="location_name truncate" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}" ng-bind="getUnitName(property)"></a>
	       			</div>
	       		</thead>

            <tbody>
							<tr class="propertyInfo">
								<th class="title">
									<?php _e( 'Beds', 'streamline-core' ) ?>
								</th>
								<td data-toggle="tooltip" data-placement="left" title="Bedrooms: {[property.bedrooms_number]}">
									<span ng-bind="property.bedrooms_number"></span>
								</td>
							</tr>

              <tr>
								<th class="title">
									<?php _e( 'Baths', 'streamline-core' ) ?>
								</th>
              	<td data-toggle="tooltip" data-placement="left" title="Bathrooms: {[property.bathrooms_number]}">
			            <span ng-bind="property.bathrooms_number"></span>
				        </td>
              </tr>

							<tr>
								<th class="title">
									<?php _e( 'Guests', 'streamline-core' ) ?>
								</th>
								<td data-toggle="tooltip" data-placement="left" title="Sleeps: {[property.max_occupants]}">
									<span ng-bind="property.max_occupants"></span>
								</td>
							</tr>

							<tr>
								<th class="title">
									<?php _e( 'Adults', 'streamline-core' ) ?>
								</th>
								<td class="propertyAdults" data-toggle="tooltip" data-placement="left" title="Adults: {[property.max_adults]}">
									<span ng-bind="property.max_adults"></span>
								</td>
							</tr>

							<tr>
								<th class="title">
									<?php _e( 'City', 'streamline-core' ) ?>
								</th>
								<td class="propertyCity" data-toggle="tooltip" data-placement="left" title="Bedrooms: {[property.city]}">
									<span ng-bind="property.city"></span>
								</td>
							</tr>

							<tr>
								<th class="title">
									<?php _e( 'Floor', 'streamline-core' ) ?>
								</th>
								<td class="propertyFloor" data-toggle="tooltip" data-placement="left" title="Floor: {[property.floor_name]}">
									<span ng-bind="property.floor_name"></span>
								</td>
							</tr>

							<tr>
								<th class="title">
									<?php _e( 'Location', 'streamline-core' ) ?>
								</th>
								<td class="propertyLocationName" data-toggle="tooltip" data-placement="left" title="Location: {[property.location_area_name]}">
									<span ng-bind="property.location_area_name"></span>
								</td>
							</tr>
							<tr>
								<th class="title">
									<?php _e( 'Pets', 'streamline-core' ) ?>
								</th>
								<td class="propertyPets">
									<span class="amenityYes" ng-if="property.max_pets > 0" data-toggle="tooltip" data-placement="left" title="Pet friendly"><i class="fa fa-paw"></i></span>
									<span class="amenityNo" ng-if="property.max_pets <= 0" data-toggle="tooltip" data-placement="left" title="Pet friendly">No</span>
								</td>
							</tr>

							<tr>
								<th class="title">
									<?php _e( 'Area', 'streamline-core' ) ?>
								</th>
								<td class="propertyAreaName" data-toggle="tooltip" data-placement="left" title="Area: {[property.resort_area_name]}">
									<span ng-bind="property.resort_area_name"></span>
								</td>
							</tr>

							<tr>
								<th class="title">
									<?php _e( 'Sale', 'streamline-core' ) ?>
								</th>
								<td class="propertyForSale" data-toggle="tooltip" data-placement="left" title="For Sale: {[property.sale_enabled]}">
									<span ng-bind="property.sale_enabled"></span>
								</td>
							</tr>

							<tr>
								<th class="title">
									<?php _e( 'Size', 'streamline-core' ) ?>
								</th>
								<td class="propertySize" data-toggle="tooltip" data-placement="left" title="Size: {[property.square_foots]}">
									<span ng-bind="property.square_foots"></span>
								</td>
							</tr>

							<tr>
								<th class="title">
									<?php _e( 'Price', 'streamline-core' ) ?>
								</th>
								<td ng-if="!isSimplePricing(property)">
									<span ng-if="property.coupon_discount > 0" ng-bind="getOldPrice(property,0)" class="old_price"></span>
									<span ng-bind="getTotalPrice(property,0)"></span>
									<span ng-bind="getTotalAppend(property)"></span>
								</td>
								<td ng-if="isSimplePricing(property)">
									<span ng-bind="getSimplePrice(property.price_data,0)"></span>
									<span class="h6" ng-bind="getAppendTex(property.price_data)"></span>
								</td>
							</tr>
            </tbody>
          </table>
	      </div>
      </div>
    </section>
    <!-- /.o-section-wrapper -->

		<section class="o-section-wrapper comparison_box amenities clearfix">
      <h3 class="c-section-title col-xs-12" ng-show="!loading"><?php _e( 'Amenities', 'streamline-core' ) ?></h3>

			<div ng-repeat="property in compareObj|limitTo:1" class="amenities no-padding compareAmenities">
				<div ng-class="readyToCompare()==0 ? 'col-sm-4' : 'col-sm-6'" class="col-xs-12" >
					<table class="table table-striped table-hover table-condensed table-bordered">
	         	<thead class="hidden-sm">
	       			<div class="propertyTitle col-xs-12 hidden-lg hidden-md hidden-sm">

	         		   <a class="location_name truncate" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}" ng-bind="getUnitName(property)"></a>
	         		</div>

	         	</thead>

            <tbody>
							<tr ng-repeat="amenities in property.compareAmenities|limitTo:1">
								<td class="title">
						    	<span class="title" ng-bind="amenities[0].name"></span>
								</td>
								<td  ng-if="amenities[1].prop1 == 1">
							 		<i class="fa fa-check amenityYes" aria-hidden="true"></i>
								</td>
								<td  ng-if="amenities[1].prop1 == 0">
									<i class="fa fa-ban amenityNo" aria-hidden="true"></i>
								</td>
							</tr>
						</tbody>
          </table>
				</div>

				<div ng-class="readyToCompare()==0 ? 'col-sm-4' : 'col-sm-6'" class="col-xs-12" >
					<table class="table table-striped table-hover table-condensed table-bordered">
	         	<thead class="hidden-sm">
	       			<div class="propertyTitle col-xs-12 hidden-lg hidden-md hidden-sm">
								<a class="location_name truncate" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}" ng-bind="getUnitName(compareObj[1])"></a>
							</div>
	         	</thead>

            <tbody>
							<tr ng-repeat="amenities in property.compareAmenities|limitTo:1">
								<td class="title">
						    	<span class="title" ng-bind="amenities[0].name"></span>
								</td>
								<td  ng-if="amenities[2].prop2 == 1">
							 		<i class="fa fa-check amenityYes" aria-hidden="true"></i>
								</td>
								<td  ng-if="amenities[2].prop2 == 0">
									<i class="fa fa-ban amenityNo" aria-hidden="true"></i>
								</td>
							</tr>
						</tbody>
          </table>
				</div>

				<div ng-if="readyToCompare()==0" class="col-sm-4 col-xs-12" >
					<table class="table table-striped table-hover table-condensed table-bordered">
	         	<thead class="hidden-sm">
	       			<div class="propertyTitle col-xs-12 hidden-lg hidden-md hidden-sm">
								<a class="location_name truncate" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}" ng-bind="getUnitName(compareObj[2])"></a>
	         		</div>
	         	</thead>

            <tbody>
							<tr ng-repeat="amenities in property.compareAmenities|limitTo:1">
								<td class="title">
						    	<span class="title" ng-bind="amenities[0].name"></span>
								</td>
								<td  ng-if="amenities[3].prop3 == 1">
							 		<i class="fa fa-check amenityYes" aria-hidden="true"></i>
								</td>
								<td  ng-if="amenities[3].prop3 == 0">
									<i class="fa fa-ban amenityNo" aria-hidden="true"></i>
								</td>
							</tr>
						</tbody>
          </table>
				</div>
			</div>
		</section>
    <!-- /.o-section-wrapper -->
	</div>

	<div ng-if="readyToCompare() > 1" ng-cloak>
	  <div class="alert alert-danger">
	    <p ng-bind="'Select '+readyToCompare() + ' more to Compare'"></p>
	  </div>
  </div>

	<!-- Inquiry -->
	<div class="modal fade test" id="myModal2" tabindex="-2" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <form method="post" name="resortpro_inquiry" class="frm-property-inquiry" novalidate>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="<?php _e('Close', 'streamline-core') ?>">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php _e('Property Inquiry', 'streamline-core') ?></h4>
          </div>

          <div class="modal-body">
            <input type="hidden" ng-model="inquiry.unit_id">
            <div class="form-group">
              <div class="row">
                <div class="col-xs-6">
									<div class="inquiry_container_input container_input">
										<?php if($gdpr_enabled && !empty($options['gdpr_first_name'])):?>
		                  <a href="#" title="<?php echo $options['gdpr_first_name']; ?>" class="g_tooltip">
		                    <i class="fa fa-question-circle"></i>
		                  </a>
	                  <?php endif; ?>
	                  <input type="text" class="form-control form-icon border-primary-color"
	                         name="inquiry_first_name"
	                         id="inquiry_first_name"
	                         placeholder="<?php _e('Name', 'streamline-core') ?>"
	                         ng-required="true"
	                         ng-model="inquiry.first_name"/>
										<i class="fa fa-user text-primary"></i>
									</div>
                  <div ng-show="resortpro_inquiry.$submitted || resortpro_inquiry.inquiry_first_name.$touched">
                    <span class="error" ng-show="resortpro_inquiry.inquiry_first_name.$error.required" ng-bind="'<?php _e('First name is required.', 'streamline-core') ?>'"></span>
                  </div>
                </div>

                <div class="col-xs-6">
									<div class="inquiry_container_input container_input">
										<?php if($gdpr_enabled && !empty($options['gdpr_last_name'])):?>
	                  <a href="#" title="<?php echo $options['gdpr_last_name']; ?>" class="g_tooltip">
	                    <i class="fa fa-question-circle"></i>
	                  </a>
	                  <?php endif; ?>
	                  <input type="text" class="form-control form-icon border-primary-color"
	                         name="inquiry_last_name"
	                         id="inquiry_last_name"
	                         placeholder="<?php _e('Last Name', 'streamline-core') ?>"
	                         ng-required="true"
	                         ng-model="inquiry.last_name"/>
										 <i class="fa fa-user text-primary"></i>
									 </div>
                  <div ng-show="resortpro_inquiry.$submitted || resortpro_inquiry.inquiry_last_name.$touched">
                    <span class="error" ng-show="resortpro_inquiry.inquiry_last_name.$error.required" ng-bind="'<?php _e('Last name is required.', 'streamline-core') ?>'"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-xs-6">
									<div class="inquiry_container_input container_input">
	                  <?php if($gdpr_enabled && !empty($options['gdpr_email'])):?>
	                  <a href="#" title="<?php echo $options['gdpr_email']; ?>" class="g_tooltip">
	                    <i class="fa fa-question-circle"></i>
	                  </a>
	                  <?php endif; ?>
	                  <input type="text" class="form-control form-icon border-primary-color"
	                         name="inquiry_email"
	                         id="inquiry_email"
	                         placeholder="<?php _e('Email', 'streamline-core') ?>"
	                         ng-required="true"
	                         ng-model="inquiry.email"/>
										<i class="fa fa-envelope text-primary"></i>
									</div>
                  <div ng-show="resortpro_inquiry.$submitted || resortpro_inquiry.inquiry_email.$touched">
                    <span class="error" ng-show="resortpro_inquiry.inquiry_email.$error.required && resortpro_inquiry.inquiry_phone.$error.required" ng-bind="'<?php _e('Email or phone is required.', 'streamline-core') ?>'"></span>
                    <span class="error" ng-show="resortpro_inquiry.inquiry_email.$error.email" ng-bind="'<?php _e('This is not a valid email.', 'streamline-core') ?>'"></span>
                  </div>
                </div>

                <div class="col-xs-6">
									<div class="inquiry_container_input container_input">
										<?php if($gdpr_enabled && !empty($options['gdpr_phone_number'])):?>
	                  <a href="#" title="<?php echo $options['gdpr_phone_number']; ?>" class="g_tooltip">
	                    <i class="fa fa-question-circle"></i>
	                  </a>
	                  <?php endif; ?>
	                  <input type="text" class="form-control form-icon border-primary-color"
	                         name="inquiry_phone"
	                         id="inquiry_phone"
	                         placeholder="<?php _e('Phone1', 'streamline-core') ?>"
	                         ng-required="true"
	                         ng-model="inquiry.phone"/>
										<i class="fa fa-phone text-primary"></i>
									</div>
                  <div ng-show="resortpro_inquiry.$submitted || resortpro_inquiry.inquiry_phone.$touched">
                    <span class="error" ng-show="resortpro_inquiry.inquiry_email.$error.required && resortpro_inquiry.inquiry_phone.$error.required" ng-bind="'<?php _e('Phone or email is required.', 'streamline-core') ?>'"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-xs-6" ng-init="inquiry.startDate='<?php echo $start_date; ?>'">
									<div class="inquiry_container_input container_input">
	                  <input type="text" class="form-control datepicker form-icon border-primary-color"
	                         name="inquiry_startdate"
	                         id="inquiry_startdate"
	                         placeholder="<?php _e('Checkin', 'streamline-core') ?>"
	                         data-bindpicker="#inquiry_enddate"
	                         ng-required="true"
	                         ng-model="inquiry.startDate"/>
										<i class="glyphicon glyphicon-calendar text-primary"></i>
									</div>
                  <div ng-show="resortpro_inquiry.$submitted || resortpro_inquiry.inquiry_startdate.$touched">
                    <span class="error" ng-show="resortpro_inquiry.inquiry_startdate.$error.required" ng-bind="'<?php _e('Checkin is required.', 'streamline-core') ?>'"></span>
                  </div>
                </div>

                <div class="col-xs-6" ng-init="inquiry.endDate='<?php echo $end_date; ?>'">
									<div class="inquiry_container_input container_input">
	                  <input type="text" autocomplete="off" class="form-control datepicker form-icon border-primary-color"
	                         name="inquiry_enddate"
	                         id="inquiry_enddate"
	                         placeholder="<?php _e('Checkout', 'streamline-core') ?>"
	                         ng-required="true"
	                         ng-model="inquiry.endDate"/>
										<i class="glyphicon glyphicon-calendar text-primary"></i>
									</div>
                  <div ng-show="resortpro_inquiry.$submitted || resortpro_inquiry.inquiry_enddate.$touched">
                    <span class="error" ng-show="resortpro_inquiry.inquiry_enddate.$error.required" ng-bind="'<?php _e('Checkout is required.', 'streamline-core') ?>'"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-xs-6" ng-init="inquiry.occupants='<?php echo $occupants; ?>'">
                  <div class="c-select-list form-control">
	                  <select class="form-icon border-primary-color"
	                          name="inquiry_occupants"
	                          id="inquiry_occupants"
	                          ng-model="inquiry.occupants">
											<option value="1"><?php _e( 'Adults', 'streamline-core' ) ?></option>
											<?php
		                    for ($i = 1; $i <= $max_occupants; $i++) {
		                      $label = ($i == 1) ? 'Adult' : 'Adults';
		                      echo "<option value=\"{$i}\">{$i} {$label}</option>";
		                    }
	                    ?>
	                  </select>
										<i class="fa fa-users text-primary"></i>
									</div>
									<!-- /.c-select-list -->
                </div>

                <div class="col-xs-6" ng-init="inquiry.occupantsSmall='<?php echo $occupants_small; ?>'">
									<div class="c-select-list form-control">
	                  <select class="form-icon border-primary-color"
	                          name="inquiry_occupants_small"
	                          id="inquiry_occupants_small"
	                          ng-model="inquiry.occupantsSmall">
										<option value="0"><?php _e( 'Children', 'streamline-core' ) ?></option>
	                    <?php
	                    for ($i = 1; $i <= $max_occupants_small; $i++) {
	                      $label = ($i == 1) ? 'Child' : 'Children';
	                      echo "<option value=\"{$i}\">{$i} {$label}</option>";
	                    }
	                    ?>
	                  </select>
										<i class="fa fa-child text-primary"></i>
									</div>
									<!-- /.c-select-list -->
                </div>

							</div>
						</div>

						<div class="form-group">
	            <div class="row">
                <div class="col-xs-12" ng-init="inquiry.pets='<?php echo $pets; ?>'">
                  <div class="c-select-list form-control">
	                  <select class="form-icon border-primary-color"
	                          name="inquiry_pets"
	                          id="inquiry_pets"
	                          ng-model="inquiry.pets">
											<option value="0"><?php _e( 'Pets', 'streamline-core' ) ?></option>
			                <?php
			                  for ($i = 1; $i <= $max_pets; $i++) {
			                    $label = ($i == 1) ? 'Pet' : 'Pets';
			                    echo "<option value=\"{$i}\">{$i} {$label}</option>";
			                  }
			                  ?>
	                  </select>
										<i class="fa fa-paw text-primary"></i>
									</div>
									<!-- /.c-select-list -->
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-xs-12">
									<div class="inquiry_container_input container_input">
										<textarea class="form-control form-icon border-primary-color" name="inquiry_message" id="inquiry_message" placeholder="<?php _e( 'Question or Comment', 'streamline-core' ) ?>"
											ng-model="inquiry.message"></textarea>
										<i class="fa fa-commenting text-primary"></i>
									</div>
                </div>
              </div>
            </div>

            <div class="alert alert-{[alert.type]} animate" ng-repeat="alert in alerts">
              <div ng-bind-html="alert.message | trustedHtml"></div>
            </div>
          </div>

          <div class="modal-footer">
            <a type="button"
               class="btn btn-default"
               data-dismiss="modal"
               ng-click="resetInquiry(inquiry)">
              <?php _e('Close', 'streamline-core') ?>
            </a>
            <button type="submit"
                    id="resortpro_unit_submit"
                    ng-click="validateInquiry(inquiry, true)"
                    class="btn btn-primary">
              <i class="glyphicon glyphicon-comment"></i> <?php _e('Send Inquiry', 'streamline-core') ?>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

