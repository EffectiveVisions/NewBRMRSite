<?php $class = get_body_class();  ?>

<nav id="menu">
    <ul>
    	<a class="closemenu"><i class="icon icon-plus d-block"  aria-hidden="true" style="transform: rotate(45deg);"></i></a>
    	<?php if($class[1] != "page-template-template-boone" && $class[1] != "page-template-template-blowing-rock" && $class[1] != "page-template-template-valle-crucis" && $class[1] != "page-template-template-townof-seven-devils" && $class[1] != "page-template-template-eagles-nest"&& $class[1] != "page-template-template-banner-elk"
                       ) {  ?>
        <?php if ( has_nav_menu( 'mobile-menu' ) ) :
            wp_nav_menu( array( 'theme_location' => 'mobile-menu','container' => '','depth' => 3,'items_wrap' => '%3$s', 'walker' => new efora_Mobile_Nav_Menu()) );
        else:
            echo '<li><a>' . esc_html__( 'Define your mobile menu.', 'efora' ) . '</a></li>';
        endif; ?>
       <?php } else {   ?>
         
         <?php if ( has_nav_menu( 'mobile-menu' ) ) :
            wp_nav_menu( array( 'theme_location' => 'community-menu','container' => '','depth' => 3,'items_wrap' => '%3$s', 'walker' => new efora_Mobile_Nav_Menu()) );

            echo '<li><a href="https://new.blueridgerentals.com/search-results/">' . esc_html__( 'Find your gateway', 'efora' ) . '</a></li>';
        else:
            echo '<li><a>' . esc_html__( 'Define your mobile menu.', 'efora' ) . '</a></li>';
        endif; ?>

       <?php } ?>

       <!-- Search start -->

       <div class="mobile-nav-calender z-index col-12 mt-3">
         <h6><small class="text-uppercase font-weight-bold">Search Property</small></h6>

            <div id="resortpro_search_widget-15" class="widget_resortpro_search_widget">
               <div class="search_widget">
                  <form ng-submit="updateSearch($event)" method="post" class="form searchform ng-pristine ng-valid" action="http://blueridge.com/search-results/">
                     <input type="hidden" name="resortpro_search_nonce" value="cf316fbc2c">
                     <div class="row" id="search-widget-main-rowresortpro_search_widget-15" style="">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-3" id="resortpro-search-checkin-block-idclass-homeless">
                           <div class="form-group has-feedback resortpro-search-checkin-block" id="resortpro-search-checkin-block-not">
                            <label for="checkin">Check in</label>
                            
                            <input ng-model="search.start_date" id="start_date_popup" data-min-stay="2" data-checkin-days="1" class="form-control datepicker-popup" type="text" name="start_date" readonly="readonly" placeholder="Check in">

                            <span class="glyphicon glyphicon-calendar form-control-feedback start-date-widget test"> 
                            </span>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-3" id="resortpro-search-checkout-block-idclass-homeless">
                           <div class="form-group has-feedback resortpro-search-checkout-block" id="resortpro-search-checkout-block-not">
                            <label for="checkout">Check Out</label>

                            <input ng-model="search.end_date" id="end_date_popup" class="form-control datepicker-popup" type="text" name="end_date" readonly="readonly" placeholder="Check Out">

                            <span class="glyphicon glyphicon-calendar form-control-feedback end-date-widget"></span>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-2" id="resortpro-search-guests-dropdown-block-idclass">
                           <div class="form-group  resortpro-search-guests-dropdown-block" id="resortpro-search-guests-dropdown-block">
                              <label for="guests_dropdown">Guest Dropdown</label>
                              <div class="c-guests-dropdown dropdown ng-scope" ng-controller="PlusMinusControler as pCtrl">
                                 <a class="c-guests-dropdown__btn btn  dropdown-toggle form-control" id="guestsDropdownBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                       <div class="c-guests-dropdown__btn-item c-guests-dropdown__btn-item--guests icon icon-user custome-search-user pl-0">&nbsp;</div>
                                       <div class="js-guestsOccLabel pl-0">&nbsp;</div>
                                       <span class="guests-sum position-relative font-Nunito font-14"></span>
                                       <span class="c-guests-dropdown__btn-label guests-sum-label font-Nunito font-13 position-relative guest-top-label pl-2">&nbsp;Guest</span>
                                    </div>
                                    <div ng-if="search.pets == 1" class="c-guests-dropdown__btn-group mt-0 ng-scope" style="">
                                        <span class="petscount d-flex align-items-center font-Nunito font-13"><span class="font-16">,&nbsp;</span> Pet</span>
                                    </div>
                                    <!-- ngIf: search.pets == 1 -->
                                 </a>
                                 <div class="c-guests-dropdown__body dropdown-menu js-guestsDropdown" aria-labelledby="guestsDropdownBtn">
                                    <div class="c-guests-dropdown__body-inner py-3 dropdown-menu-index">
                                       <div class="c-guests-dropdown__row input-group-text-box w-100 d-flex align-items-center">
                                          <span ng-bind="search.occupants" class="font-14 font-weight-light-bold adultscount ng-binding"></span>&nbsp;<span class="font-14 font-weight-light-bold text-capitalize font-14 font-weight-light-bold adults_label">Adult</span>
                                          <div class="btn-group-filter ml-auto d-flex">
                                             <div class="js-guestsOccBtn"><button type="button" class="btn btn-outline-secondary filter-count-btn p-0 rounded-circle mr-3" aria-label="Minus" ng-click="minus(1, &quot;search.occupants&quot;)"><i class="icon icon-Minus font-12" aria-hidden="true"></i></button></div>
                                             <input class="form-control js-guestsOccupants pets_count ng-pristine ng-untouched ng-valid ng-empty" aria-label="Button Amounts" name="occ_adults" ng-init="search.occupants=''" ng-model="search.occupants" placeholder="0" readonly="">
                                             <div class="js-guestsOccBtn"><button type="button" class="btn btn-outline-secondary filter-count-btn p-0 rounded-circle" aria-label="Plus" ng-click="plus(10, &quot;search.occupants&quot;)"><i class="icon icon-plus font-12" aria-hidden="true"></i></button></div>
                                          </div>
                                       </div>
                                       <div class="c-guests-dropdown__row input-group-text-box w-100 d-flex align-items-center">
                                          <span ng-bind="search.occupants_small" class="font-14 font-weight-light-bold children-count ng-binding"></span>&nbsp;<span class="children-label font-14 font-weight-light-bold text-capitalize font-14 font-weight-light-bold">Child</span>
                                          <div class="btn-group-filter ml-auto d-flex">
                                             <div class="js-guestsOccBtn"><button type="button" class="btn btn-outline-secondary filter-count-btn p-0 rounded-circle mr-3" aria-label="Minus" ng-click="minus(0, &quot;search.occupants_small&quot;)"><i class="icon icon-Minus font-12" aria-hidden="true"></i></button></div>
                                             <input class="form-control js-guestsOccupants pets_count ng-pristine ng-untouched ng-valid ng-empty" aria-label="Button Amounts" name="occ_children" ng-init="search.occupants_small=''" ng-model="search.occupants_small" placeholder="0" readonly="">
                                             <div class="js-guestsOccBtn"><button type="button" class="btn btn-outline-secondary filter-count-btn p-0 rounded-circle" aria-label="Plus" ng-click="plus(10, &quot;search.occupants_small&quot;)"><i class="icon icon-plus font-12" aria-hidden="true"></i></button></div>
                                          </div>
                                       </div>
                                       <div class="c-guests-dropdown__row  input-group-text-box w-100 d-flex align-items-center">
                                          &nbsp;<span class="pets-label font-14 font-weight-light-bold text-capitalize">Pet</span>
                                          <div class="btn-group-filter ml-auto">
                                             <div class="custom-control custom-radio custom-control-inline align-items-center "> 

                                                <input type="radio" id="r4" class="custom-control-input" name="pets" ng-click="minus(0, &quot;search.pets&quot;)"> 

                                                <label class="custom-control-label yes font-13 font-weight-light-bold text-capitalize custome-size-radio-dot" for="r4">No
                                                </label>

                                            </div>
                                             <input class="form-control pets_count ng-pristine ng-untouched ng-valid ng-empty" aria-label="Button Amounts" name="occ_pets" ng-init="search.pets=''" ng-model="search.pets" placeholder="0" readonly="">
                                             <div class="custom-control custom-radio custom-control-inline align-items-center mr-0"> 

                                                <input type="radio" id="r3" class="custom-control-input" name="pets" ng-click="plus(10, &quot;search.pets&quot;)"> 

                                                <label class="custom-control-label no font-13 font-weight-light-bold text-capitalize custome-size-radio-dot" for="r3">Yes</label>

                                             </div>
                                          </div>
                                       </div>
                                       <div class="c-guests-dropdown__row c-guests-dropdown__row--cta container-fluid mb-0">
                                          <div class="row">
                                             <div class="col-12">
                                                <button id="guestsDropClearBtn1" type="button" class="btn btn-primary themeBtn text-uppercase font-weight-bold font-Nunito float-right" aria-label="Reset" ng-click="resetGuests();">Clear</button>
                                             </div>
                                            </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-12" id="resortpro-search-submit-button-block-idclass-homeless">
                           <div class="form-group  resortpro-search-submit-button-block mb-0" id="resortpro-search-submit-button-block-not"><button class="btn btn-warning  w-100 themeBtn text-uppercase font-weight-bold font-Nunito" type="submit">Search</button></div>
                        </div>
                     </div>
                     <input class="sortfilter ng-pristine ng-untouched ng-valid ng-empty" ng-model="sortbyvalue" type="hidden" name="resortpro_sw_filter" value="">
                  </form>
               </div>
            </div>
        </div>
        <!-- Search end -->
    </ul>
</nav>