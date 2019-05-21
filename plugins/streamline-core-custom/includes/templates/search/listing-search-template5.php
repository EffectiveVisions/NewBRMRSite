
<div id="unit-{[property.id]}" class="grid_view_container listing-test">
    <div class="listing listing-5 c-property-listings__item col-sm-12 row-spac-2 col-md-4 col-sm-6 col-xs-12" ng-mouseenter="highlightIcon(property.id)" ng-mouseleave="restoreIcon(property.id)">
        <div class="unit_grid_container c-property c-property--thumbs-lg">
            <div class="panel-image listing-img c-property__img" ng-if="searchSettings.enable_slider_image == '0'">
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
                <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}"
                   class="c-property__img-link" ng-click="addToRecents(property)">
                    <img ng-src="{[property.default_thumbnail_path]}"
                             alt="{[property.location_name]}"
                             err-src="<?php ResortPro::assets_url('images/dummy-image.jpg'); ?>"/>
                </a>
            </div>


            <div class="panel-image listing-img slider_image_carousel" ng-if="searchSettings.enable_slider_image == '1'">
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
                                <img class="img-lookup img-responsive-height" ng-src="{[property.default_thumbnail_path]}" err-src="<?php ResortPro::assets_url('images/dummy-image.jpg'); ?>" ng-alt="{[property.location_name]}"/>
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

            <div class="panel-body panel-card-section">
                <div class="media">
                    <a class="text-normal"
                       ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}" ng-click="addToRecents(property)">
                        <h3 class="h5 listing-name text-truncate row-space-top-1"
                            title="{[getUnitName(property)]}" ng-bind="getUnitName(property)">
                        </h3>
                    </a>

                    <div class="clearfix"></div>

                    <div class="text-muted listing-location text-truncate">
                        <strong ng-if="property.bedrooms_number == 0" ><?php _e('Studio','streamline-core') ?></strong><span ng-if="property.bedrooms_number != 0" ><strong>{[property.bedrooms_number]}</strong> <?php _e( 'Beds', 'streamline-core' ) ?></span>, <strong>{[property.max_occupants]}</strong> <?php _e('Sleeps','streamline-core') ?>, <strong>{[property.bathrooms_number]}</strong> <?php _e('Baths','streamline-core') ?>
                    </div>
                    <p class="text-danger" ng-if="property.restriction_message" ng-bind-html="property.restriction_message | trustedHtml"></p>

                    <div class="rating grid">
                        <div class="star-rating" ng-if="property.rating_average > 0">
                            <div class="star-rating" star-rating rating-value="property.rating_average" data-max="5"></div>
                            <span class="star-rating-text" ng-bind="'(' + (property.rating_count | pluralizeRating) + ')'"></span>
                        </div>
                        <div class="star-rating" ng-if="!property.rating_average > 0">
                            <span><?php _e('No rating available','streamline-core') ?></span>
                        </div>
                    </div>
                    <div class="price_per_night">
                        <span ng-if="property.price > 0 || property.price_data.daily > 0 || property.price_data.weekly > 0 || property.price_data.monthly > 0">
                            <div class="price_wrapper3" ng-if="!isSimplePricing(property)">
                                <span class="h3 text-contrast price-amount" ng-bind="getTotalPrice(property,0)"></span>
                                <span class="h6 text-contrast" ng-bind="getTotalAppend(property)"></span>
                            </div>
                            <div class="price_wrapper3" ng-if="isSimplePricing(property)">
                                <span class="h6" ng-bind="getPrependTex(property.price_data)"></span>
                                <span class="h3 text-contrast price-amount" ng-bind="getSimplePrice(property.price_data,0)"></span>
                                <span class="h6" ng-bind="getAppendTex(property.price_data)"></span>
                            </div>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-12 buttons_area">
                 <div class="row">
                    <div class="col-xs-12" >
                        <a class="propertyButtons book"
                           ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets, property.sale_enabled)]}">
                            <?php _e( 'VIEW PROPERTY', 'streamline-core' ) ?>
                        </a>
                    </div>
                    <div class="col-xs-12" >
                        <a class="propertyButtons inquiry" href="#" ng-click="setUnitForInquiry(property.id)" data-toggle="modal" data-target="#myModal2">
                            <?php _e( 'MAKE AN INQUIRY', 'streamline-core' ) ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
<!--             <div class="house_id grid">HOUSE ID&nbsp;#{[property.id]}</div> -->

        </div>
    </div>
</div>
<!-- unit end grid view container -->
