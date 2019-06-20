<?php $class = get_body_class();  ?>

<nav id="menu">
    <ul>
      <!-- Search start -->
       <div class="mobile-nav-calender z-index col-12 mt-3">
            <div id="resortpro_search_widget-15" class="widget_resortpro_search_widget">
               <div class="search_widget">
                  <form method="post" class="form searchform searchformmobile ng-pristine ng-valid" action="<?php echo get_site_url()."/"."search-results"; ?>">
                     <input type="hidden" name="children_count" class="children_count_hidden"/>
                     <input type="hidden" name="adult_count" class="adult_count_hidden"/>
                     <input type="hidden" name="resortpro_search_nonce" value="cf316fbc2c">
                     <div class="row" id="search-widget-main-rowresortpro_search_widget-15" style="">
                        <div class="col-12" id="resortpro-search-checkin-block-idclass-homeless">
                           <div class="form-group has-feedback resortpro-search-checkin-block" id="resortpro-search-checkin-block-not1">
                            <label for="checkin">Check in</label>
                            
                            <input id="start_date_popup" data-min-stay="2" data-checkin-days="1" class="form-control datepicker-popup" type="text" name="start_date" readonly="readonly" placeholder="Check in">

                            <span class="glyphicon glyphicon-calendar form-control-feedback start-date-widget test"> 
                            </span>
                          </div>
                        </div>

                        <div class="col-12" id="resortpro-search-checkout-block-idclass-homeless">
                           <div class="form-group has-feedback resortpro-search-checkout-block" id="resortpro-search-checkout-block-not1">
                            <label for="checkout">Check Out</label>

                            <input id="end_date_popup" class="form-control datepicker-popup" type="text" name="end_date" readonly="readonly" placeholder="Check Out">

                            <span class="glyphicon glyphicon-calendar form-control-feedback end-date-widget"></span>
                          </div>
                        </div>

                        <div class="col-12" id="resortpro-search-guests-dropdown-block-idclass">
                           <div class="form-group  resortpro-search-guests-dropdown-block" id="resortpro-search-guests-dropdown-block">
                              <label for="guests_dropdown">Guest Dropdown</label>
                              <div class="c-guests-dropdown dropdown ng-scope" ng-controller="PlusMinusControler as pCtrl">
                                 <a class="c-guests-dropdown__btn btn  dropdown-toggle form-control" id="guestsDropdownBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                       <div class="c-guests-dropdown__btn-item c-guests-dropdown__btn-item--guests icon icon-user custome-search-user pl-0">&nbsp;</div>
                                       <div class="js-guestsOcLabel pl-0">&nbsp;</div>
                                       <span style="padding-left:10px;" class="position-relative font-Nunito font-14 total_count">
                                         
                                       </span>
                                       <span class="c-guests-dropdown__btn-label font-Nunito font-13 position-relative guest-label-mobile pl-2">
                                        &nbsp;
                                        Guest
                                       </span>
                                    </div>
                                    <div class="pets-available c-guests-dropdown__btn-group mt-0 ng-scope d-none" style="">
                                        <span class="petscount d-flex align-items-center font-Nunito font-13"><span class="font-16">,&nbsp;</span> 
                                         Pet
                                        </span>
                                    </div>
                                 </a>
                                 <div style="z-index:99; width:100%;" class="c-guests-dropdown__body dropdown-menu js-guestsDropdown" aria-labelledby="guestsDropdownBtn">
                                    <div class="c-guests-dropdown__body-inner py-3 dropdown-menu-index">
                                       <div class="c-guests-dropdown__row input-group-text-box w-100 d-flex align-items-center">
                                          <span class="font-14 font-weight-light-bold count_adults">
                                            
                                          </span>&nbsp;
                                          <span class="font-14 font-weight-light-bold text-capitalize font-14 font-weight-light-bold adults_label_mobile">Adult
                                          </span>
                                          <div class="btn-group-filter ml-auto d-flex">
                                               <div class="js-guestsOccBtn">
                                                 <button type="button" class="btn btn-outline-secondary filter-count-btn p-0 rounded-circle mr-3 decrease-adult" aria-label="Minus">
                                                <i class="icon icon-Minus font-12" aria-hidden="true"></i>
                                               </button>
                                             </div>
                                             <input class="form-control js-guestsOccupants pets_count ng-pristine ng-untouched ng-valid ng-empty count_adult_input" aria-label="Button Amounts" name="occ_adults" placeholder="0" readonly="">
                                             <div class="js-guestsOccBtn">
                                              <button type="button" class="btn btn-outline-secondary filter-count-btn p-0 rounded-circle increase-adult" aria-label="Plus">
                                                <i class="icon icon-plus font-12" aria-hidden="true">
                                                </i>
                                              </button>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="c-guests-dropdown__row input-group-text-box w-100 d-flex align-items-center">
                                          <span class="font-14 font-weight-light-bold count-children">
                                          </span>&nbsp;
                                          <span class="children-label-mobile font-14 font-weight-light-bold text-capitalize font-14 font-weight-light-bold">
                                            Child
                                          </span>
                                          <div class="btn-group-filter ml-auto d-flex">
                                             <div class="js-guestsOccBtn">
                                              <button type="button" class="btn btn-outline-secondary filter-count-btn p-0 rounded-circle mr-3 decrease-child" aria-label="Minus">
                                                <i class="icon icon-Minus font-12" aria-hidden="true">
                                                  
                                                </i>
                                              </button>
                                            </div>
                                             <input class="form-control js-guestsOccupants pets_count ng-pristine ng-untouched ng-valid ng-empty children_count_input" aria-label="Button Amounts" name="oc_children" placeholder="0" readonly="">
                                             <div class="js-guestsOccBtn">
                                              <button type="button" class="btn btn-outline-secondary filter-count-btn p-0 rounded-circle increase-child" aria-label="Plus">
                                                <i class="icon icon-plus font-12" aria-hidden="true">
                                                  
                                                </i>
                                              </button>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="c-guests-dropdown__row  input-group-text-box w-100 d-flex align-items-center">
                                          <span class="pets-label font-14 font-weight-light-bold text-capitalize">
                                            Pet
                                          </span>
                                          <div class="btn-group-filter ml-auto">
                                             <div class="custom-control custom-radio custom-control-inline align-items-center "> 

                                                <input type="radio" id="r4" class="custom-control-input pet-click" name="pets"> 

                                                <label class="custom-control-label yes font-13 font-weight-light-bold text-capitalize custome-size-radio-dot" for="r4">No
                                                </label>

                                            </div>
                                             <input class="form-control pets_count ng-pristine ng-untouched ng-valid ng-empty" aria-label="Button Amounts" name="oc_pets" placeholder="0" readonly="">
                                             <div class="custom-control custom-radio custom-control-inline align-items-center mr-0"> 

                                                <input type="radio" id="r3" class="custom-control-input pet-click" name="pets"> 

                                                <label class="custom-control-label no font-13 font-weight-light-bold text-capitalize custome-size-radio-dot" for="r3">
                                                  Yes
                                                </label>

                                             </div>
                                          </div>
                                       </div>
                                       <div class="c-guests-dropdown__row c-guests-dropdown__row--cta container-fluid mb-0">
                                          <div class="row">
                                             <div class="col-12">
                                                <button id="guestsDropClearBtn1" type="button" class="btn btn-primary themeBtn text-uppercase font-weight-bold font-Nunito float-right" aria-label="Reset">
                                                  Clear
                                                </button>
                                             </div>
                                            </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        
                        <div class="col-12" id="resortpro-search-submit-button-block-idclass-homeless">
                           <div class="form-group  resortpro-search-submit-button-block mb-0" id="resortpro-search-submit-button-block-not">
                            <button class="btn btn-primary  w-100 themeBtn text-uppercase font-weight-bold font-Nunito search-mobile" type="submit">
                              Search
                           </button>
                         </div>
                        </div>
                      </div>
                     </div>
                  </form>
               </div>
            </div>
        </div>
        <!-- Search end -->
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
    </ul>
</nav>