<!-- listing 4 -->
<div id="unit-{[property.id]}" class="c-property-listings__item listing-4 col-xs-12" ng-mouseenter="highlightIcon(property.id)" ng-mouseleave="restoreIcon(property.id)">
  <div class="c-property c-property--thumbs-md">
    <div class="row">
      <div class="col-md-6">
        <div class="hidden-md hidden-lg">
          <h3 class="c-property__heading" ng-bind="getUnitName(property)"></h3>
          <h4 class="c-property__location"><span ng-bind="property.location_area_name"></span></h4>
        </div>
        <div class="c-property__img" ng-if="searchSettings.enable_slider_image == '0'">
          <span class="c-property__pet-icon js-petFriendly" ng-if="property.max_pets > 0" data-toggle="tooltip" data-placement="right" title="Pet friendly"><i class="fa fa-paw"></i></span>

          <a class="c-property__img-link" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}" ng-click="addToRecents(property)">
            <img ng-src="{[property.default_image_path]}"
                  ng-alt="{[property.location_name]}"
                  err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
          </a>
        </div>
        <!-- /.c-property__img -->

        <div id="myCarousel-{[property.id]}" class="carousel slide" data-ride="carousel" data-interval="false" ng-if="searchSettings.enable_slider_image == '1'">
          <!-- Indicators -->
          <ol class="carousel-indicators">
              <li data-target="#myCarousel-{[property.id]}" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel-{[property.id]}" data-slide-to="1"></li>
              <li data-target="#myCarousel-{[property.id]}" data-slide-to="2"></li>
              <li data-target="#myCarousel-{[property.id]}" data-slide-to="3"></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
              <span class="c-property__pet-icon js-petFriendly" ng-if="property.max_pets > 0" data-toggle="tooltip" data-placement="right" title="Pet friendly"><i class="fa fa-paw"></i></span>
              <div class="item active">
                  <a class="thumb" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}">
                      <img class="img-lookup test4 img-responsive-height" ng-src="{[property.default_thumbnail_path]}" err-src="<?php ResortPro::assets_url('images/dummy-image.jpg'); ?>" ng-alt="{[property.location_name]}"/>
                  </a>
              </div>

              <div class="item">
                  <a class="thumb" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                      <img class="img-lookup test4 img-responsive-height" ng-src="{[getImage(property.id, 1)]}" err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
                  </a>
              </div>
          
              <div class="item">
                  <a class="thumb" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                      <img class="img-lookup test4 img-responsive-height" ng-src="{[getImage(property.id, 2)]}" err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
                  </a>
              </div>

              <div class="item">
                  <a class="thumb" ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                      <img class="img-lookup test4 img-responsive-height" ng-src="{[getImage(property.id, 3)]}" err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
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

        
        <div class="c-property__cta row">
          <div class="c-property__cta-item col-xs-6">
            <a class="c-property__cta-btn c-property__cta-btn--book"
                ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}" ng-click="addToRecents(property)">
              <?php _e( 'More Info', 'streamline-core' ) ?>
            </a>
          </div>
          
          <div class="c-property__cta-item col-xs-6">
            <a class="c-property__cta-btn c-property__cta-btn--inquiry" href="#" ng-click="setUnitForInquiry(property.id)" data-toggle="modal" data-target="#myModal2">
              <?php _e( 'Property Inquiry', 'streamline-core' ) ?>
            </a>
          </div>
        </div>
        <!-- /.c-property-cta -->

        <p class="text-danger" ng-if="property.restriction_message" ng-bind-html="property.restriction_message | trustedHtml"></p>
      </div>
      
      <div class="col-md-6">
        <div class="c-property__body">
          <div class="row">
            <div class="col-md-8">
              <div class="hidden-sm hidden-xs">
                <h3 class="c-property__heading" ng-bind="getUnitName(property)"></h3>
                <h4 class="c-property__location"><span ng-bind="property.location_area_name"></span></h4>
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="c-property__cost c-property__cost--boxed" ng-if="!isSimplePricing(property)">
                <del ng-if="property.coupon_discount > 0" ng-bind="getOldPrice(property,0)" class="old_price"></del>
                <span ng-bind="getTotalPrice(property,0)"></span><br />
                <small ng-bind="getTotalAppend(property)"></small>
              </div>

              <div class="c-property__cost c-property__cost--boxed" ng-if="isSimplePricing(property)">
                <small ng-bind="getPrependTex(property.price_data)"></small>
                <span class="c-property__cost-sum" ng-bind="getSimplePrice(property.price_data,0)"></span>
                <span ng-bind="getAppendTex(property.price_data)"></span>
              </div>
            </div>
          </div>
          
          <div class="c-star-rating" ng-if="property.rating_average > 0">
            <div class="c-star-rating__stars" star-rating rating-value="property.rating_average" data-max="5"></div>
            <span class="c-star-rating__count" ng-bind="property.rating_count | pluralizeRating"></span>
          </div>
          <div class="c-star-rating" ng-if="!property.rating_average > 0">
            <span class="c-star-rating__count"><?php _e( 'No rating available', 'streamline-core' ) ?></span>
          </div>
          
          <?php if($use_favorites): ?>
            <a ng-if="!checkFavorites(property)" class="c-property__fav-btn js-btnFav btn-fav" ng-click="addToFavorites(property)" data-toggle="tooltip" data-placement="right" title="Add to favorites"><i class="fa fa-heart-o"></i></a>

            <a ng-if="checkFavorites(property)" class="c-property__fav-btn js-btnFav btn-fav" ng-click="removeFromFavorites(property)" data-toggle="tooltip" data-placement="right" title="Remove from favorites"><i class="fa fa-heart"></i></a>
          <?php endif; ?>

          <ul class="c-property__details c-property__flex-item">
            <li class="c-property__details-item">
              <?php _e( 'Beds:', 'streamline-core' ) ?> <strong ng-bind="property.bedrooms_number"></strong>
            </li>
            <li class="c-property__details-item">
              <?php _e( 'Baths:', 'streamline-core' ) ?> <strong ng-bind="property.bathrooms_number"></strong>
            </li>
            <li class="c-property__details-item">
              <?php _e( 'Sleeps:', 'streamline-core' ) ?> <strong ng-bind="property.max_occupants"></strong>
            </li>
          </ul>
          <!-- /.c-property__details -->
          
          <p ng-if="!isEmptyObject(property.short_description)" ng-bind-html="property.short_description | trustedHtml"></p>
        </div>
        <!-- /.c-property__body -->
      
      </div>
    </div>
  </div>
  <!-- /.c-property -->

</div>
<!-- /.c-property-listings__item -->
