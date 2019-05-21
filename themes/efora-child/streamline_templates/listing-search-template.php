  <div class="inner-div d-inline-block w-100">
      <div class="property bg-white">
         <div class="propertyImage">
            <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}" class="position-absolute h-100 w-100">
               <img datasrc="{[property.default_thumbnail_path]}" lazy-load class="w-100 h-100 object-fit" alt="{[property.location_name]}" err-src="<?php ResortPro::assets_url('images/dummy-image.jpg'); ?>">
            </a>
         </div>
         <div class="propertyDetail py-4 px-3">
             
              <div class="d-lg-flex">
                <a ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}" class="media-photo media-cover" ng-mouseenter="highlightIcon(property.id)"
                       ng-mouseleave="restoreIcon(property.id)">
                       <h6 title="{[property.title]}" ng-if="(property.name == '' || property.name == 'Home')" class="mb-0 text-blue f-600 text-truncate">{[property.location_name]}</h6>
					    <p class="mb-0 text-uppercase ml-auto font-Nunito" style="font-size: 11px;">{[property.location_area_name]}</p>

                        <h6 title="{[property.title]}" ng-if="!(property.name == '' || property.name == 'Home')" class="mb-0 text-blue f-600 text-truncate"> {[property.name]}</h6>
                </a>
              </div>

               <div class="rating grid">
                    <div class="star-rating" ng-if="property.rating_average > 0">
                        <div style="display: inline-block" class="star-rating" star-rating rating-value="property.rating_average" data-max="5"></div>
                        <span class="rating_number" style="display:inline-block; line-height: 29px; vertical-align: top">({[property.rating_count]})</span>
                    </div>
                    <div class="star-rating font-13 text-black font-weight-light-bold no-rating" ng-if="!property.rating_average > 0">
                        <span><?php _e( 'No rating available', 'streamline-core' ) ?></span>
                    </div>
                </div>
                <ul class="list-unstyled detailsaboutproperty mt-2 mb-4 d-flex flex-md-wrap flex-sm-nowrap flex-wrap">
                   <li class="list-inline-item mr-xl-4 mr-lg-0 mr-md-2 mr-sm-0 mr-2  d-flex flex-wrap align-items-center">
                          <img datasrc="/wp-content/uploads/2019/04/bed.svg" lazy-load class="w-20" alt="bed-image">
                        <span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text">{[property.bedrooms_number]} <?php _e( 'Beds', 'streamline-core' ) ?>
                        </span>
                   </li>
                   <li class="list-inline-item mr-xl-4 mr-lg-0 mr-md-2 mr-sm-0 mr-2 d-flex flex-wrap align-items-center">
                         <img datasrc="/wp-content/uploads/2019/04/slumber.svg" lazy-load class="w-20" alt="slumber-image">
                         <span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text">
                             <?php _e( 'Sleeps', 'streamline-core' ) ?> {[property.max_occupants]}
                         </span>
                   </li>
                   <li class="list-inline-item d-flex flex-wrap align-items-center">
                           <img datasrc="/wp-content/uploads/2019/04/shower.svg" lazy-load class="w-20" alt="shower-image">
                        <span class="text-color font-Nunito font-weight-bold font-13 ml-2 text-text">
                           {[property.bathrooms_number]} <?php _e( 'Bathrooms', 'streamline-core' ) ?>
                        </span>
                   </li>
                </ul>
               <h6 class="font-12 text-uppercase mb-3 night propertypackage"> <strong class="f-15">${[property.price_data.daily]}</strong> avg/night</h6>
               <a class="btn btn-warning  text-uppercase w-100 font-13"
                           ng-href="{[goToProperty(property.seo_page_name, search.start_date, search.end_date, search.occupants, search.occupants_small, search.pets)]}">
                            <?php _e( 'CHECK AVAILABILITY', 'streamline-core' ) ?>
                </a>

                <a class="btn theme-btn mt-2 text-uppercase w-100 font-13 makeanenquiry" 
                href="javascript:void(0)" 
                ng-click="setUnitForInquiry(property.id)">
                     <?php _e( 'MAKE AN INQUIRY', 'streamline-core' ) ?>
                </a>
         </div>
      </div>
  </div>

  

