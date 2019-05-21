<!-- layout 9 -->
<div class="c-property-listings__item listing-9 col-xs-12 col-sm-6 col-lg-4" ng-mouseenter="highlightIcon(property.id)" ng-mouseleave="restoreIcon(property.id)">

  <div class="c-property c-property--avangarde">
    <div class="c-property__img">
      <span class="c-property__pet-icon js-petFriendly" ng-if="property.max_pets > 0" data-toggle="tooltip" data-placement="left" title="Pet friendly"><i class="fa fa-paw"></i></span>

      <?php if($use_favorites): ?>
        <a ng-if="!checkFavorites(property)" class="c-property__fav-btn js-btnFav" ng-click="addToFavorites(property)" data-toggle="tooltip" data-placement="right" title="Add to favorites">
          <i class="fa fa-heart-o"></i>
        </a>

        <a ng-if="checkFavorites(property)" class="c-property__fav-btn js-btnFav" ng-click="removeFromFavorites(property)" data-toggle="tooltip" data-placement="right" title="Remove from favorites">
          <i class="fa fa-heart"></i>
        </a>
      <?php endif; ?>

      <a class="c-property__img-link" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}" ng-click="addToRecents(property)">
          <img ng-src="{[property.default_thumbnail_path]}"
          ng-alt="{[property.location_name]}"
          err-src="<?php ResortPro::assets_url('images/dummy-image.jpg'); ?>"/>
      </a>

      <div ng-if="property.price > 0 || property.price_data.daily > 0 || property.price_data.weekly > 0 || property.price_data.monthly > 0">

        <div class="c-property__cost c-property__cost--overlay" ng-if="!isSimplePricing(property)">
          <del ng-if="property.coupon_discount > 0" ng-bind="getOldPrice(property,0)" class="old_price"></del>
          <span ng-bind="getTotalPrice(property,0)"></span>
          <small ng-bind="getTotalAppend(property)"></small>
        </div>
        <div class="c-property__cost c-property__cost--overlay" ng-if="isSimplePricing(property)">
          <small ng-bind="getPrependTex(property.price_data)"></small>
          <span ng-bind="getSimplePrice(property.price_data,0)"></span>
          <small ng-bind="getAppendTex(property.price_data)"></small>
        </div>
      </div>
    </div>
    <!-- /.c-property__img -->
    
    <div class="c-property__body">
			<h3 class="c-property__heading" title="{[getUnitName(property)]}">
				<a class="u-truncate"
				ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}" ng-bind="getUnitName(property)" ng-click="addToRecents(property)">
				</a>
      </h3>
      
      <ul class="c-property__details text-muted pull-left">
				<li class="c-property__details-item">
					<?php _e( 'Beds: <span ng-bind="property.bedrooms_number"></span> /', 'streamline-core' ) ?>
				</li>
				<li class="c-property__details-item">
					<?php _e( 'Baths: <span ng-bind="property.bathrooms_number"></span> |', 'streamline-core' ) ?>
				</li>
			</ul>
			<!-- /.c-property__details -->

			<a ng-if="!isEmptyObject(property.location_area_id)"
				class="c-property__location u-truncate"
				ng-href="/search-results?location_area_id={[property.location_area_id]}" ng-bind="property.location_area_name" ng-click="addToRecents(property)">
			</a>

			<div class="c-star-rating" ng-if="property.rating_average > 0">
				<div class="c-star-rating__stars" star-rating rating-value="property.rating_average" data-max="5"></div>
				<span class="c-star-rating__count text-muted" ng-bind="'(' + (property.rating_count | pluralizeRating) + ')'"></span>
			</div>
			<div class="c-star-rating" ng-if="!property.rating_average > 0">
				<span class="c-star-rating__count text-muted"><?php _e( 'No reviews', 'streamline-core' ) ?></span>
      </div>
      
      <p class="c-property__restriction-msg text-danger" ng-if="property.restriction_message" ng-bind-html="property.restriction_message | trustedHtml"></p>
		</div>
		<!-- c-property__body -->
		
  </div>
  <!-- /.c-property -->
  
</div>
<!-- /.c-property-listings__item -->
