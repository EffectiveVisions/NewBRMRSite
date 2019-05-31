<!-- unit start -->
<div class="inner-div listing custom_search_results list_view_container test w-100 mx-0 custome-shadow-1 border-0 py-md-3 px-0 pt-3 pb-4 ">
        <div class="row mx-0">
            <div class="col-lg-9 col-md-8 col-12">
                    <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}" class="w-100">
                        <figure class="container_list_img overflow-h">
                            <img datasrc="{[property.default_image_path]}" lazy-load class=" w-100 object-fit h-100" 
                         alt="{[property.location_name]}"
                         err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"
                           />
                        </figure>
                    </a>
            </div>

            <div class="col-lg-3 col-md-4 pl-0 sc_img d-none d-md-block">
                <div class="row  container_list_img overflow-h">
                    <div class="col-md-12 col-sm-4 col-xs-4 sm_img">
                            <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                                <img ng-src="{[getImage(property.id, 1)]}" class="img-lookup img-responsive-height" err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
                            </a>
                    </div>
                    <div class="col-md-12 col-sm-4 col-xs-4 sm_img">
                            <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                                <img ng-src="{[getImage(property.id, 2)]}" class="img-lookup img-responsive-height"  err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
                            </a>
                    </div>
                    <div class="col-md-12 col-sm-4 col-xs-4 sm_img">
                            <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                                <img ng-src="{[getImage(property.id, 3)]}" class="img-lookup img-responsive-height" err-src="<?php ResortPro()->assets_url('images/dummy-image.jpg'); ?>"/>
                            </a>
                    </div>
              </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="bottom_unit_info ">
        <div class="row mx-0">
            <div class="col-12 main_info px-md-3 px-0">
                <!-- <div class="row"> -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-8 col-12">
                                <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}" class="w-100">
                                    <h6 class="listing-name row-space-top-1 text-truncate w-100 text-truncate d-block mb-0 text-blue f-600 mt-3" ng-if="!(property.name == '' || property.name == 'Home')" class="listing-name row-space-top-1"
                                title="{[property.name]}">
                                {[property.name]}
                                </h6>
                                </a>
                                <div class="rating d-inline-block w-100 ">
                                        <div class="star-rating" ng-if="property.rating_average > 0">
                                            <div style="display: inline-block" class="star-rating" star-rating rating-value="property.rating_average" data-max="5"></div>
                                            <span class="rating_number font-13" style="display:inline-block; line-height: 29px; vertical-align: top">({[property.rating_count]})</span>
                                        </div>

                                        <div class="star-rating font-13" ng-if="!property.rating_average">
                                            <span><?php _e('No rating available','streamline-core') ?></span>
                                        </div>
                                </div> 
                                <div class="secondary_info_unit w-100 d-flex  mt-1">
                                    <div class="mr-xl-4 mr-2 d-flex flex-wrap align-items-center">
                                        <img datasrc="/wp-content/uploads/2019/04/bed.svg" lazy-load class="w-20" alt="bed-image">
                                        <span ng-if="property.bedrooms_number == 0"><strong><?php _e('Studio','streamline-core') ?></strong></span>
                                        <span class="text-color font-Nunito font-weight-bold font-13 ml-sm-2 ml-1 text-text" ng-if="property.bedrooms_number != 0">{[property.bedrooms_number]} <?php _e('Bedrooms','streamline-core') ?></span>
                                     </div>
                                     <div class="mr-xl-4 mr-2 d-flex flex-wrap align-items-center">
                                          <img datasrc="/wp-content/uploads/2019/04/slumber.svg" lazy-load class="w-20" alt="slumber-image">
                                        <span class="text-color font-Nunito font-weight-bold font-13 ml-sm-2 ml-1 text-text">{[property.bathrooms_number]} <?php _e('Bathrooms','streamline-core') ?></span>
                                    </div>
                                    <div class="mr-xl-4  d-flex flex-wrap align-items-center">
                                          <img datasrc="/wp-content/uploads/2019/04/shower.svg" lazy-load class="w-20" alt="shower-image">
                                        <span class="text-color font-Nunito font-weight-bold font-13 ml-sm-2 ml-1 text-text"><?php _e('Sleeps', 'streamline-core') ?> {[property.max_occupants]} </span>
                                    </div>
                                </div>
                             


                                    <div class="list_view_price">
                                        <span  ng-if="property.price > 0 || property.price_data.daily > 0 || property.price_data.weekly > 0 || property.price_data.monthly > 0">
                                            <div class="price_wrapper3" ng-if="!isSimplePricing(property)">
                                                <span class="h3 text-contrast price-amount" ng-bind="getTotalPrice(property,0)"></span>
                                               
                                            </div>
                                            <div class="price_wrapper3" ng-if="isSimplePricing(property)">
                                                <h6 class="font-15 text-uppercase mb-md-3 night propertypackage">
                                                <strong class="font-18 text-contrast price-amount" ng-bind="getSimplePrice(property.price_data,0)"></strong>
                                                <span class="avrg-n">avg/night</span>
                                                </h6>
                                            </div>
                                        </span>
                                    </div>

                            </div>
                            <div class="col-md-4 col-12">
                                <div class="inner   justify-content-md-end d-flex flex-wrap w-100">
                                
                                    
                                    <div class="list_view_price">
                                        <span  ng-if="property.price > 0 || property.price_data.daily > 0 || property.price_data.weekly > 0 || property.price_data.monthly > 0">
                                            
                                            <div class=" font-13 d-flex flex-wrap align-items-center">    
                                               
                                                  <?php //if($use_favorites): ?>
                                                 
                                                 <?php //endif; ?>
                                                <span class="avrg-h ml-2"><span ng-bind="property.location_area_name"></span></span>
                                            </div>
                                        </span>
                                    </div>

                                     <div class="w-100 d-inline-block buttons_area list_view_buttons mt-2">
                                            <div class="row mx-0">
                                                <div class="col-md-12 px-0  d-inline-md-block text-md-right" >
                                                    <a class="propertyButtons book  btn btn-primary  mt-md-2 text-uppercase font-13 py-2 text-black"
                                                       ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                                                        <?php _e( 'CHECK AVAILABILITY', 'streamline-core' ) ?>
                                                    </a>
                                                </div>
                                                <div class="col-md-12  px-0 d-inline-md-block text-md-right" >
                                                    <a class="propertyButtons inquiry btn theme-btn text-uppercase font-13 mt-md-3 py-2 ml-sm-3 makeanenquiry mt-2 mt-sm-0" href="javascript:void(0)" ng-click="setUnitForInquiry(property.id)">
                                                        <?php _e( 'MAKE AN INQUIRY', 'streamline-core' ) ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                <!-- </div> -->
            </div><!-- end main info -->

           
        </div>
    </div><!-- end bottom info -->
</div>
<!-- unit end list view container -->


