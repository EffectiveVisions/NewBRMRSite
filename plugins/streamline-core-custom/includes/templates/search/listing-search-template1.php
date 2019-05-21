<!-- layout 1 -->
<div id="unit-{[property.id]}" class="c-property-listings__item listing-1 col-sm-12 row-spac-2 col-md-4 col-sm-6 col-xs-12 grid-1"
      ng-mouseenter="highlightIcon(property.id)"
      ng-mouseleave="restoreIcon(property.id)">
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
    
        <div class="c-property__img">
          <span class="c-property__pet-icon js-petFriendly" ng-if="property.max_pets > 0" data-toggle="tooltip" data-placement="left" title="Pet friendly"><i class="fa fa-paw"></i></span>

          <?php if($use_favorites): ?>
            <a ng-if="!checkFavorites(property)" class="c-property__fav-btn js-btnFav" ng-click="addToFavorites(property)" data-toggle="tooltip" data-placement="right" title="Add to favorites">
            <i class="fa fa-heart-o"></i></a>

            <a ng-if="checkFavorites(property)" class="c-property__fav-btn js-btnFav" ng-click="removeFromFavorites(property)" data-toggle="tooltip" data-placement="right" title="Remove from favorites">
            <i class="fa fa-heart"></i></a>
          <?php endif; ?>

          <a class="c-property__img-link" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}" ng-click="addToRecents(property)">
            <img ng-src="{[property.default_thumbnail_path]}"
            err-src="<?php ResortPro::assets_url('images/dummy-image.jpg'); ?>"
            ng-alt="{[property.location_name]}"/>
          </a>
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
    
  </div>
  <!-- /.c-property -->
  
</div>
<!-- /.c-property-listings__item -->
