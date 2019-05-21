<!-- unit start -->
<div class="listing custom_search_results list_view_container test1">
    <div class="col-md-12 container_list_img">
        <div class="row">

            <div class="col-md-9 main_img">
                <div class="row">
                    <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                        <img ng-src="{[property.default_image_path]}" class="img-responsive"
                     alt="{[property.location_name]}"
                     err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"
                     style="width: 100%;"/>
                    </a>
                </div>
            </div>

            <div class="col-md-3 sc_img hidden-sm hidden-xs">
                <div class="row container_sc_images">
                    <div class="col-md-12 col-sm-4 col-xs-4 sm_img">
                        <div class="row">
                            <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                                <img class="img-lookup test img-responsive-height" ng-src="{[getImage(property.id, 1)]}" err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-4 col-xs-4 sm_img">
                        <div class="row">
                            <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                                <img class="img-lookup test img-responsive-height" ng-src="{[getImage(property.id, 2)]}" err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-4 col-xs-4 sm_img">
                        <div class="row">
                            <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                                <img class="img-lookup test img-responsive-height" ng-src="{[getImage(property.id, 3)]}" err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="col-md-12 bottom_unit_info">
        <div class="row">
            <div class="col-md-9 main_info">
                <!-- <div class="row"> -->
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="row">
                            <h3 class="listing-name row-space-top-1 text-truncate" ng-if="!(property.name == '' || property.name == 'Home')" class="listing-name row-space-top-1"
                            title="{[property.name]}">
                            {[property.name]}
                            </h3>
                            <div class="secondary_info_unit">
                                <span ng-if="property.bedrooms_number == 0"><strong><?php _e('Studio','streamline-core') ?></strong>,</span>
                                <span ng-if="property.bedrooms_number != 0"><strong>{[property.bedrooms_number]}</strong> <?php _e('Bedrooms','streamline-core') ?>,</span>
                                <span><strong>{[property.bathrooms_number]}</strong> <?php _e('Bathrooms','streamline-core') ?>,</span>
                                <span><strong>{[property.max_occupants]}</strong> <?php _e('Sleeps', 'streamline-core') ?></span>
                            </div>
                            <div class="rating">
                                <div class="star-rating" ng-if="property.rating_average > 0">
                                    <div style="display: inline-block" class="star-rating" star-rating rating-value="property.rating_average" data-max="5"></div>
                                    <span class="rating_number" style="display:inline-block; line-height: 29px; vertical-align: top">({[property.rating_count]})</span>
                                </div>

                                <div class="star-rating" ng-if="!property.rating_average">
                                    <span><?php _e('No rating available','streamline-core') ?></span>
                                </div>
                            </div> 
                            
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 right_info">
                        <div class="row">
<!--                             <a class="petFriendly list_view_pet" ng-if="property.max_pets > 0" style="font-size:1.5em" data-toggle="tooltip" data-placement="left" title="Pet friendly">
                                <i class="fa fa-paw"></i>
                            </a> -->
                            
                            <div class="list_view_price">
                                <span  ng-if="property.price > 0 || property.price_data.daily > 0 || property.price_data.weekly > 0 || property.price_data.monthly > 0">
                                    <div class="price_wrapper3" ng-if="!isSimplePricing(property)">
                                        <span class="h3 text-contrast price-amount" ng-bind="getTotalPrice(property,0)"></span>
                                       
                                    </div>
                                    <div class="price_wrapper3" ng-if="isSimplePricing(property)">
                                        
                                        <span class="h3 text-contrast price-amount" ng-bind="getSimplePrice(property.price_data,0)"></span>
                                        <span class="avrg-n">avg/night</span>
                                          <?php //if($use_favorites): ?>
                                            <a ng-if="!checkFavorites(property)" class="btn-fav" ng-click="addToFavorites(property)" data-toggle="tooltip" data-placement="bottom" title="Add to favorites">
                                                <i class="fa fa-heart"></i>
                                            </a>

                                            <a ng-if="checkFavorites(property)" class="btn-fav" ng-click="removeFromFavorites(property)" data-toggle="tooltip" data-placement="bottom" title="Remove from favorites">
                                                <i class="fa fa-heart faved"></i>
                                            </a>
                                         <?php //endif; ?>
                                        <span class="avrg-h">HOUSE ID #<span ng-bind="property.id"></span></span>
                                    </div>
                                </span>
                            </div>
                        </div> 
                    </div>
                <!-- </div> -->
            </div><!-- end main info -->

            <div class="col-md-3 buttons_area list_view_buttons">
                <div class="row">
                    <div class="col-xs-12" >
                        <a class="propertyButtons book"
                           ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
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
        </div>
    </div><!-- end bottom info -->
</div>
<!-- unit end list view container -->


