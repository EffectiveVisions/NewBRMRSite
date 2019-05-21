<!-- layout 2 -->
<div id="unit-{[property.id]}" class="c-property-listings__item listing-2 col-xs-12 col-sm-6 col-lg-4" ng-mouseenter="highlightIcon(property.id)" ng-mouseleave="restoreIcon(property.id)">

  <div class="c-property c-property--listing-2">
    <div class="c-property__img" ng-if="searchSettings.enable_slider_image == '0'">
      <span class="c-property__pet-icon js-petFriendly" ng-if="property.max_pets > 0" data-toggle="tooltip" data-placement="left" title="Pet friendly"><i class="fa fa-paw"></i></span>

      <?php if($use_favorites): ?>
        <a ng-if="!checkFavorites(property)" class="c-property__fav-btn js-btnFav" ng-click="addToFavorites(property)" data-toggle="tooltip" data-placement="right" title="Add to favorites">
          <i class="fa fa-heart-o"></i>
        </a>

        <a ng-if="checkFavorites(property)" class="c-property__fav-btn js-btnFav" ng-click="removeFromFavorites(property)" data-toggle="tooltip" data-placement="right" title="Remove from favorites">
          <i class="fa fa-heart"></i>
        </a>
      <?php endif; ?>
      <?php if($use_compare): ?>
        <a ng-if="!checkCompare(property)" class="c-property__cmp-btn btn-cmp" ng-click="addToCompare(property)" data-toggle="tooltip" data-placement="right" title="Add to Unit Compare" ng-sow="showCompare">
          <i class="fa fa-balance-scale unmarked"></i>
        </a>

        <a ng-if="checkCompare(property)" class="c-property__cmp-btn btn-cmp marked" ng-click="removeFromCompare(property)" data-toggle="tooltip" data-placement="right" title="Remove Unit from Compare" ng-sow="showCompare">
          <i class="fa fa-balance-scale marked"></i>
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

    <div class="c-property c-property--listing-2 listing-img slider_image_carousel_listing_2" ng-if="searchSettings.enable_slider_image == '1'">

        <a class="petFriendly" ng-if="property.max_pets > 0" style="font-size:1.5em" data-toggle="tooltip" data-placement="left" title="Pet friendly">
            <i class="fa fa-paw"></i>
        </a>

        <?php if($use_favorites): ?>
        <a ng-if="!checkFavorites(property)" class="btn-fav" ng-click="addToFavorites(property)" data-toggle="tooltip" data-placement="right" title="Add to favorites">
            <i class="fa fa-heart-o"></i>
        </a>

        <a ng-if="checkFavorites(property)" class="btn-fav" ng-click="removeFromFavorites(property)" data-toggle="tooltip" data-placement="right" title="Remove from favorites">
            <i class="fa fa-heart"></i>
        </a>
        <?php endif; ?>

        <div id="myCarousel-{[property.id]}" class="carousel slide" data-ride="carousel" data-interval="false">
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
                        <img class="img-lookup test2 img-responsive-height" ng-src="{[property.default_thumbnail_path]}" err-src="<?php ResortPro::assets_url('images/dummy-image.jpg'); ?>" ng-alt="{[property.location_name]}"/>
                    </a>
                </div>

                <div class="item">
                    <a class="thumb" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                        <img class="img-lookup test2 img-responsive-height" ng-src="{[getImage(property.id, 1)]}" err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
                    </a>
                </div>
            
                <div class="item">
                    <a class="thumb" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                        <img class="img-lookup test2 img-responsive-height" ng-src="{[getImage(property.id, 2)]}" err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
                    </a>
                </div>

                <div class="item">
                    <a class="thumb" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                        <img class="img-lookup test2 img-responsive-height" ng-src="{[getImage(property.id, 3)]}" err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
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

    
    <div class="c-property__body">
      <h3 class="c-property__heading" title="{[getUnitName(property)]}">
        <a class="u-truncate"
        ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}" ng-bind="getUnitName(property)" ng-click="addToRecents(property)">
        </a>
      </h3>

      <a ng-if="!isEmptyObject(property.location_area_id)"
        class="c-property__location u-truncate"
        ng-href="/search-results?location_area_id={[property.location_area_id]}" ng-bind="property.location_area_name" ng-click="addToRecents(property)">
      </a>

      <p class="c-property__restriction-msg text-danger" ng-if="property.restriction_message" ng-bind-html="property.restriction_message | trustedHtml"></p>

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

      <div class="c-star-rating" ng-if="property.rating_average > 0">
        <div class="c-star-rating__stars" star-rating rating-value="property.rating_average" data-max="5"></div>
        <span class="c-star-rating__count text-muted" ng-bind="'(' + (property.rating_count | pluralizeRating) + ')'"></span>
      </div>
      <div class="c-star-rating" ng-if="!property.rating_average > 0">
        <span class="c-star-rating__count text-muted"><?php _e( 'No reviews', 'streamline-core' ) ?></span>
      </div>
    </div>
    <!-- c-property__body -->
    
  </div>
  <!-- /.c-property -->
  
</div>
<!-- /.c-property-listings__item -->
