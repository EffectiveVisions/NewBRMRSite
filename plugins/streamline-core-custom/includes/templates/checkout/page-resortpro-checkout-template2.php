<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all resortpro listings by default.
 * You can override this template by creating your own "my_theme/template/page-resortpro-listings.php" file
 *
 * @package    StreamlineCore
 * @since      v2.1
 */
?>

  <div id="checkout-container-custom" class="checkout_custom container content-area" ng-controller="CheckoutController as cCtrl">
    <div class="row" ng-init="hash = '<?php echo $hash;?>';referrer_url='<?php echo $checkout_url;?>';unit_id='<?php echo $unit_id; ?>';location_id='<?php echo $location_id; ?>';condo_type_id='<?php echo $condo_type_id; ?>'">
      <main id="main" class="site-main" role="main" ng-init="initCheckout()">

        <?php if  (!$ssl_enabled):  ?>
          <div class="col-md-12">
            <div class="alert alert-danger">
              <?php _e('This form is being submitted insecurely. Please enable the setting on Settings -> Streamline Settings -> Checkout', 'streamline-core')  ?>
            </div>
          </div>
          <?php endif;  ?>
            <div class="col-md-12">
              <div class="alert alert-danger" ng-show="error" ng-cloak ng-bind="errorMessage">
              </div>
            </div>
            <?php
      if  ($online_bookings ==  0 && empty($hash))  {
        ?>
              <div class="col-md-12">
                <div class="alert alert-danger">
                  <p>
                    <?php _e('This unit is not availabile for online booking.', 'streamline-core'); ?>
                      <?php
              if  (!empty($options['phone'])):
                printf(__('Please call %s.',  'streamline-core'), esc_html($options['phone']));
              endif;
              ?>
                  </p>
                </div>
              </div>
              <?php }elseif ($min_days_error) {
        ?>
                <div class="col-sm-12">
                  <div class="alert alert-danger">
                    <?php esc_html_e($options['last_minute_message']);  ?>
                  </div>
                </div>
                <?php } elseif  ($future_days_error)  {
        ?>
                  <div class="col-sm-12">
                    <div class="alert alert-danger">
                      <?php esc_html_e($options['future_booking_message']); ?>
                    </div>
                  </div>
                  <?php } elseif  ($inquiry_only) { ?>
                  <div class="col-sm-12">
                    <div class="alert alert-danger">
                      <?php esc_html_e('This period is restricted.'); ?>
                    </div>
                  </div>
                  <?php
      } else  {
        ?>          
                    
                    <div ng-show="!error">

                      <div class="clearfix"></div>
                      <div class="container-progress-bar three_steps hidden-xs hidden-sm" ng-cloak ng-if="reservationDetails.optional_fees.length > 0">
                        <div class="col-md-3"></div>
                        <div class="col-md-1"></div>
                        <div class="col-md-7 dots_container">
                            <div class="dots_title">
                                <span class="col-md-3 r_info">
                                  <div><?php _e('Guest Info', 'streamline-core'); ?></div>
                                  <div class="circle c_progress">
                                      <span class="dot">
                                        <i class="fa fa-circle"></i>
                                      </span>
                                  </div>
                                </span>
                                <span class="col-md-3 r_protection">
                                  <div><?php _e('Protection', 'streamline-core'); ?></div>
                                  <div class="circle c_progress">
                                      <span class="dot">
                                        <i class="fa fa-circle"></i>
                                      </span>
                                  </div>
                                </span>
                                <span class="col-md-3 r_payment">
                                  <div><?php _e('Payment', 'streamline-core'); ?></div>
                                  <div class="circle c_progress">
                                      <span class="dot">
                                        <i class="fa fa-circle"></i>
                                      </span>
                                  </div>
                                </span>
                                <span class="col-md-3 r_confirmation">
                                  <div><?php _e('Confirmation', 'streamline-core'); ?></div>
                                  <div class="circle c_progress">
                                      <span class="dot">
                                        <i class="fa fa-circle"></i>
                                      </span>
                                  </div>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="clearfix"></div>
                        <div class="bar_area hidden-xs">
                            <div class="col-md-3 primary-button">
                                <h2>Reservation</h2>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-7">
                              <div class="progress">
                                  <div class="progress-bar primary-button" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="" style="width:0%">
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-1"></div>
                        </div>
                      </div>

                      <div class="container-progress-bar two_steps hidden-xs hidden-sm" ng-cloak ng-if="reservationDetails.optional_fees.length == 0">
                        <div class="col-md-3"></div>
                        <div class="col-md-1"></div>
                        <div class="col-md-7 dots_container">
                            <div class="dots_title">
                                <span class="col-md-4 r_info">
                                  <div><?php _e('Guest Info', 'streamline-core'); ?></div>
                                  <div class="circle c_progress">
                                      <span class="dot">
                                        <i class="fa fa-circle"></i>
                                      </span>
                                  </div>
                                </span>
                                <span class="col-md-4 r_payment">
                                  <div><?php _e('Payment', 'streamline-core'); ?></div>
                                  <div class="circle c_progress">
                                      <span class="dot">
                                        <i class="fa fa-circle"></i>
                                      </span>
                                  </div>
                                </span>
                                <span class="col-md-4 r_confirmation">
                                  <div><?php _e('Confirmation', 'streamline-core'); ?></div>
                                  <div class="circle c_progress">
                                      <span class="dot">
                                        <i class="fa fa-circle"></i>
                                      </span>
                                  </div>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="clearfix"></div>
                        <div class="bar_area hidden-xs">
                            <div class="col-md-3 primary-button">
                                <h2>Reservation</h2>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-7">
                              <div class="progress">
                                  <div class="progress-bar primary-button" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="" style="width:0%">
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-1"></div>
                        </div>
                      </div>

                      <div class="col-md-12 form-checkout-wrapper">
                        <div class="panel-group form-checkout" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-default">
                            <div class="panel-heading open heading_primary_color" role="tab" id="headingOne">
                              <span class="step">1</span>
                              <h4 class="panel-title">
                                <?php _e('Guest Information', 'streamline-core'); ?>
                              </h4>
                            </div>
                            <div id="step1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                              <div class="panel-body panel-step-1">
                                <form name="formStep1" class="css-form" novalidate>
                                  <div class="row">
                                    <div class="col-md-4 col-md-push-8 hidden-sm hidden-xs custom_checkout_sidebar">
                                      <img class="c_arrow" style="min-height: 260px;" src="<?php echo $this->assets_url ?>/images/triangle.svg" title="" alt="">
                                      <div class="c_step1_image">
                                        <div style="position:relative;">
                                          <img src="<?php echo $thumbnail ?>" style="width: 100%; margin:0" />
                                          <p style="margin:0; position:absolute; bottom:0; left: 0; right:0; padding:4px 8px; background: rgba(0,0,0,0.7);color:#fff;">
                                            <?php echo $unit_name; ?>
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-8 col-md-pull-4">
                                      <div class="form-group form_step_1">
                                        <div class="row">
                                          <div class="form-group col-sm-6">
                                            <label for="fname"><?php  _e('First Name:',  'streamline-core'); ?></label>
                                            <input type="text" id="fname" name="fname" placeholder="<?php  _e('First Name',  'streamline-core'); ?>" class="form-control form-icon" ng-model="checkout.fname"
                                              ng-change="validateStepOne(checkout)" required>
                                            <span class="icon-checkout icon-name"></span>
                                            <?php if($gdpr_enabled && !empty($options['gdpr_first_name'])):?>
                                            <a href="#" tabindex="-1" title="<?php echo $options['gdpr_first_name']; ?>" class="g_tooltip">
                                              <i class="fa fa-question-circle"></i>
                                            </a>
                                            <?php endif; ?>
                                            <div ng-show="formStep1.$submitted || formStep1.fname.$touched">
                                              <span class="error" ng-show="formStep1.fname.$error.required" ng-bind="'<?php _e('First name is required.', 'streamline-core'); ?>'"></span>
                                            </div>
                                          </div>
                                          <div class="form-group col-sm-6">
                                            <label for="lname"><?php  _e('Last Name:',  'streamline-core'); ?></label>
                                            <input type="text" id="lname" name="lname" class="form-control form-icon" placeholder="<?php _e('Last Name', 'streamline-core'); ?>" ng-model="checkout.lname" ng-change="validateStepOne(checkout)" required>
                                            <span class="icon-checkout icon-name"></span>
                                            <?php if($gdpr_enabled && !empty($options['gdpr_last_name'])):?>
                                            <a href="#" tabindex="-1" title="<?php echo $options['gdpr_last_name']; ?>" class="g_tooltip">
                                              <i class="fa fa-question-circle"></i>
                                            </a>
                                            <?php endif; ?>
                                            <div ng-show="formStep1.$submitted || formStep1.lname.$touched">
                                              <span class="error" ng-show="formStep1.lname.$error.required" ng-bind="'<?php _e('Last name is required.',  'streamline-core'); ?>'"></span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-sm-6">
                                            <label for="email"><?php  _e('Email:',  'streamline-core'); ?></label>
                                            <input type="email" id="email" name="email" class="form-control form-icon" placeholder="<?php  _e('Email', 'streamline-core'); ?>" ng-model="checkout.email"
                                              required />
                                            <span class="icon-checkout icon-email"></span>
                                            <?php if($gdpr_enabled && !empty($options['gdpr_email'])):?>
                                            <a href="#" tabindex="-1" title="<?php echo $options['gdpr_email']; ?>" class="g_tooltip">
                                              <i class="fa fa-question-circle"></i>
                                            </a>
                                            <?php endif; ?>
                                            <div ng-show="formStep1.$submitted || formStep1.email.$touched">
                                              <span class="error" ng-show="formStep1.email.$error.required" ng-bind="'<?php _e('Tell us your email.', 'streamline-core'); ?>'"></span>
                                              <span class="error" ng-show="formStep1.email.$error.email" ng-bind="'<?php  _e('This is not a valid email.',  'streamline-core'); ?>'"></span>
                                            </div>
                                          </div>
                                          <div class="form-group col-sm-6">
                                            <label for="phone"><?php  _e('Phone:',  'streamline-core'); ?></label>
                                            <input type="phone" id="phone" name="phone" class="form-control form-icon" ng-pattern="/^-?\d*$/" ng-model="checkout.phone" required placeholder="(###) ###-####" />
                                            <span class="icon-checkout icon-phone"></span>
                                            <?php if($gdpr_enabled && !empty($options['gdpr_phone_number'])):?>
                                            <a href="#" tabindex="-1" title="<?php echo $options['gdpr_phone_number']; ?>" class="g_tooltip">
                                              <i class="fa fa-question-circle"></i>
                                            </a>
                                            <?php endif; ?>
                                            <div ng-show="formStep1.$submitted || formStep1.phone.$touched">
                                              <span class="error" ng-show="formStep1.phone.$error.required" ng-bind="'<?php _e('Phone is required.',  'streamline-core'); ?>'"></span>
                                               <span class="error" ng-show="formStep1.phone.$error.pattern" ng-bind="'<?php _e('Invalid phone number.',  'streamline-core'); ?>'"></span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">                                            
                                            <button type="submit" class="btn btn-block btn-primary" ng-disabled="!reservationDetails.optional_fees" ng-click="goToStep2(false)">
                                              <?php _e('Continue',  'streamline-core'); ?>&nbsp;<i class="fa fa-arrow-right"></i>
                                            </button>                                            
                                            <?php if  ($pbg_enabled): ?>
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <p>
                                                    <strong><?php _e('or',  'streamline-core'); ?></strong>
                                                    <br />
                                                    <?php _e('Pay only for your share', 'streamline-core'); ?>
                                                  </p>
                                                  <button ng-click="goToStep2(true)" type="submit" class="btn btn-success">
                                                    <?php _e('Split the cost',  'streamline-core'); ?>
                                                      <span style="font-size:0.8em" ng-if="reservationDetails.total > 0" ng-bind="' - ' + ((reservationDetails.total / occupants) | currency:undefined:0) + ' per guest'">
                                                      </span>
                                                      <i class="glyphicon glyphicon-arrow-right"></i>
                                                  </button>
                                                </div>
                                              </div>
                                              <?php endif;  ?>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-default" ng-show="reservationDetails.optional_fees.length > 0">
                            <div class="panel-heading heading_primary_color" role="tab" id="headingTwo">
                              <span class="step">2</span>
                              <h4 class="panel-title">
                                <?php _e('Protect Your Investment', 'streamline-core'); ?>
                              </h4>
                            </div>
                            <div id="step2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body panel-step-2">
                                <div class="row flexbox-container">
                                  <div class="col-md-4 col-md-push-8 flex">
                                    <img class="c_arrow" style="min-height: 260px;" src="<?php echo $this->assets_url ?>/images/triangle.svg" title="" alt="">
                                    <div class="resortpro-reservation-details-mobile hidden-md hidden-lg ">
                                      <p>
                                        <?php _e('Total', 'streamline-core'); ?>
                                          <span class="mobile-price pull-right" ng-bind="reservationDetails.total | currency"></span>
                                      </p>
                                      <div class="row">
                                        <div class="col-xs-6 col-sm-4">
                                          <a class="btn-mobile-details" href="#mobile-details-2">See more details</a>
                                        </div>
                                        <div class="col-xs-6 col-sm-8 text-right">
                                          <span class="mobile-dates" ng-bind="startDate + ' - ' + endDate"></span>
                                        </div>
                                      </div>
                                      <div id="mobile-details-2" class="mobile-details" style="display:none" data-visible="false">
                                        <div class="row">
                                          <div class="col-xs-4 col-sm-4">
                                            <?php _e('Unit',  'streamline-core'); ?>
                                          </div>
                                          <div class="col-xs-8 col-sm-8 text-right">
                                            <?php echo $unit_name; ?>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-xs-4 col-sm-4">
                                            <?php _e('Room rent', 'streamline-core'); ?>
                                          </div>
                                          <div class="col-xs-8 col-sm-8 text-right" ng-bind="subTotal | currency"></div>
                                        </div>
                                        <div class="row">
                                          <div class="col-xs-4 col-sm-4">
                                            <?php _e('Taxes & Fees',  'streamline-core'); ?>
                                          </div>
                                          <div class="col-xs-8 col-sm-8 text-right" ng-bind="taxesAndFees | currency"></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="resortpro-reservation-details hidden-sm hidden-xs">
                                      <div class="details table-responsive">
                                        <table class="table table-condensed table-hover">
                                          <thead class="border-bottom-primary">
                                            <tr>
                                              <th colspan="2">
                                                <?php _e('Reservation Info',  'streamline-core'); ?>
                                              </th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td style="width:50%">
                                                <?php _e('Unit',  'streamline-core'); ?></td>
                                              <td class="text-right">
                                                <span>
                                                  <?php echo $unit_name; ?>
                                                </span>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <?php _e('Arrival Date',  'streamline-core'); ?></td>
                                              <td class="text-right">
                                                <span ng-bind="startDate"></span>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <?php _e('Departure Date',  'streamline-core'); ?></td>
                                              <td class="text-right">
                                                <span ng-bind="endDate"></span>
                                              </td>
                                            </tr>

                                            <tr>
                                              <td>
                                                <?php _e('Number of Nights',  'streamline-core'); ?></td>
                                              <td class="text-right" ng-if="!reservationDetails.reservation_days.date">
                                                <span ng-bind="reservationDetails.reservation_days.length"></span>
                                              </td>
                                              <td class="text-right" ng-if="reservationDetails.reservation_days.date">
                                                <span>1</span>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <?php _e('Price', 'streamline-core'); ?>
                                                  <a ng-show="!reservationDetails.reservation_days.date" href="#" class="btn-price-breakdown">
                                                    <i class="glyphicon glyphicon-menu-down"></i>
                                                  </a>
                                              </td>
                                              <td ng-if="!reservationDetails.extra > 0" class="text-right">
                                                <span ng-bind="subTotal | currency"></span>
                                              </td>
                                            </tr>
                                            <tr ng-repeat="res in reservationDetails.reservation_days" class="breakdown-days-hidden" data-visible="false">
                                              <td style="text-indent: 24px" ng-bind="res.date"></td>
                                              <td class="text-right">
                                                <span ng-bind="calculateMarkup((res.price + res.extra).toString()) | currency"></span>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <?php _e('Taxes &amp; Fees',  'streamline-core'); ?>
                                                  <a ng-show="!reservationDetails.reservation_days.date" href="#" class="btn-taxes-breakdown">
                                                    <i class="glyphicon glyphicon-menu-down"></i>
                                                  </a>
                                              </td>
                                              <td class="text-right">
                                                <span ng-bind="taxesAndFees | currency"></span>
                                              </td>
                                            </tr>
                                            <tr ng-repeat="reqFee in reservationDetails.required_fees" class="breakdown-taxes-hidden" data-visible="false">
                                              <td style="text-indent: 24px" ng-bind="reqFee.name"></td>
                                              <td class="text-right">
                                                <span ng-bind="reqFee.value | currency"></span>
                                              </td>
                                            </tr>
                                            <tr ng-repeat="reqFee in reservationDetails.taxes_details" class="breakdown-taxes-hidden" data-visible="false">
                                              <td style="text-indent: 24px" ng-bind="reqFee.name"></td>
                                              <td class="text-right">
                                                <span ng-bind="reqFee.value | currency"></span>
                                              </td>
                                            </tr>
                                            <tr ng-repeat="optFee in reservationDetails.optional_fees track by $index" ng-if="optFee.active == 1" class="breakdown-taxes-hidden"
                                              data-visible="false">
                                              <td style="text-indent: 24px" ng-bind="optFee.name"></td>
                                              <td class="text-right">
                                                <span ng-bind="optFee.value | currency"></span>
                                              </td>
                                            </tr>
                                            <tr ng-if="reservationDetails.coupon_discount > 0">
                                              <td>
                                                <?php _e('Discount',  'streamline-core'); ?></td>
                                              <td class="text-right">
                                                <span ng-bind="'(' + (reservationDetails.coupon_discount | currency) + ')'"></span>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <?php _e('Total', 'streamline-core'); ?></td>
                                              <td class="text-right">
                                                <span ng-bind="reservationDetails.total | currency"></span>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>

                                        <table ng-if="reservationDetails.security_deposits.security_deposit.length > 0 && chkDamageWaiverNo" class="table table-hover table-condensed">
                                          <thead>
                                            <tr>
                                              <th colspan="2">
                                                <?php _e('Security Deposits', 'streamline-core'); ?>
                                              </th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr ng-repeat="deposit in reservationDetails.security_deposits.security_deposit" ng-if="deposit.deposit_required > 0">
                                              <td ng-bind="deposit.description"></td>
                                              <td class="text-right">
                                                <span ng-bind="deposit.deposit_required | currency"></span>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-8 col-md-pull-4 flex">
                                    <div class="row flexbox-container">
                                      <div class="flex" ng-class="hasDamageProtection ? 'col-md-6' : 'col-md-12'" ng-show="hasTravelInsurance || hasCfar" style="display:flex">
                                        <div class="well well-insurance">
                                          <h3 class="travel-heading">
                                            <?php _e('Travel Insurance',  'streamline-core'); ?>
                                          </h3>                                        
                                          <p ng-show="hasTravelInsurance">
                                            <i class="text-success fa fa-lock"></i>
                                            <input type="checkbox" id="chk_travel_insurance" ng-model="chkTravelInsurance" ng-click="acceptTravelInsurance()" />
                                            <?php printf('<label for="chk_travel_insurance" style="color:green; font-weight:bold">%s</label> %s', __('PROTECT', 'streamline-core'), __('my travel investment with Travel Insurance for <strong>{[travelInsurance | currency]}</strong>. Coverage protects my vacation investment up to 100% for covered reasons like illness, injury, natural disasters, travel delays and more.',  'streamline-core'));  ?>
                                          </p>
                                          <p ng-show="hasCfar">

                                            <input type="checkbox" id="chk_cfar" ng-model="chkCfar" ng-click="acceptCfar()" />
                                            <?php printf('<label for="chk_cfar" style="color:green; font-weight:bold">%s</label> %s', __('PROTECT', 'streamline-core'), __('my travel investment with Cancel For Any Reason Travel Protection for <strong>{[cfar | currency]}</strong>. Coverage protects my vacation investment up to 100% for covered reasons like illness, natural disasters, travel delays and more. I can also cancel for a reason not listed in the policy and be eligible for a 75% reimbursement (this benefit must be used 3 days or more before check-in).',  'streamline-core'));  ?>
                                          </p>
                                          <p>
                                            <input type="checkbox" id="chk_reject_travel_insurance" ng-model="chkTravelInsuranceNo" ng-click="rejectTravelInsurance()"
                                            /><i class="text-danger fa fa-times-circle"></i> I
                                            <?php printf('<label for="chk_reject_travel_insurance" style="color:red; font-weight:bold">%s</label> %s',  __('DECLINE', 'streamline-core'), __('travel protection and risk losing or forfeiting all or part of my paid and future investment against this reservation.',  'streamline-core'));  ?>
                                          </p>
                                          <p ng-show="protectionError" class="error hidden-sm hidden-xs ng-invalid">
                                            <span ng-if="!(chkTravelInsurance || chkCfar || chkTravelInsuranceNo)" class="error" ng-bind="'<?php  _e('You must make a selection for travel insurance',  'streamline-core'); ?>'"></span>
                                          </p>
                                        </div>
                                      </div>

                                      <div class="flex" ng-class="(hasTravelInsurance || hasCfar) ? 'col-md-6' : 'col-md-12'" ng-show="hasDamageProtection" style="display:flex">
                                        <div class="well well-insurance">
                                          <h3 class="travel-heading">
                                            <?php _e('Damage Protection', 'streamline-core'); ?>
                                          </h3>                                          
                                          <p>

                                            <input type="checkbox" id="chk_damage_waiver" ng-model="chkDamageWaiver" ng-click="acceptDamageWaiver()" />
                                            <?php printf('<label for="chk_damage_waiver" style="color:green; font-weight:bold;">%s</label> %s', __('PROTECT', 'streamline-core'), __('my rental with accidental Rental Damage Protection for <strong>{[damageProtection | currency]}</strong>. Coverage includes any accidental damage to the property and it&rsquo;s contents for the duration of the rental period subject to the policy terms and conditions of rental.',  'streamline-core'));  ?>
                                          </p>
                                          <p>
                                            <input type="checkbox" id="chk_reject_damage_waiver" ng-click="rejectDamageWaiver()" ng-model="chkDamageWaiverNo" /> I
                                            <?php printf('<label for="chk_reject_damage_waiver" style="color:red; font-weight:bold">%s</label> %s %s',  __('DECLINE', 'streamline-core'), __('and will pay the security deposit of <strong>{[securityDeposit | currency]}</strong>',  'streamline-core'), __('and accept the risk of being responsible for any damage that may exceed my security deposit amount.', 'streamline-core'));  ?>
                                          </p>
                                          <p ng-show="protectionError" class="error hidden-sm hidden-xs ng-invalid">
                                            <span ng-if="!(chkDamageWaiver || chkDamageWaiverNo)" class="error" ng-bind="'<?php _e('You must make a selection for damage protection', 'streamline-core'); ?>'"></span>
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="optional_fees_wrapper" ng-if="reservationDetails.optional_fees.length > 0">
                                          <h3 class="travel-heading text-center" style="margin:0"><?php _e('Optional fees', 'streamline-core'); ?></h3>
                                          <div class="col-md-6 col-xs-12" ng-repeat="optFee in reservationDetails.optional_fees track by $index">
                                            <div class="row opt-fee-item">
                                              <div class="col-xs-12" ng-if="optFee.damage_waiver == 0 && optFee.travel_insurance == 0 && optFee.cfar == 0">
                                                <div class="row row-fee">                                                  
                                                  <div class="col-md-10 col-sm-9 col-xs-8">
                                                    <div class="opt-fee">
                                                      <input type="checkbox" id="optional-fee-{[optFee.id]}" class="optional_fee" value="{[optFee.id]}" ng-model="optionalFees[$index]"
                                                          ng-click="getPreReservation()" ng-checked="optFee.active == 1" />
                                                      <label class="opt-fee-name truncate" for="optional-fee-{[optFee.id]}" ng-bind="optFee.name" title="{[optFee.description]}"></label>
                                                      <span id="label-qty-{[optFee.id]}"></span>
                                                      <span class="opt-fee-price" ng-bind="optFee.value | currency"></span>
                                                      <!-- <p class="opt-fee-desc" ng-bind="optFee.description"></p> -->
                                                    </div>
                                                  </div>
                                                  <!-- <div class="col-md-2 col-sm-3 col-xs-4 text-right">
                                                    <span class="opt-fee-price" ng-bind="optFee.value | currency"></span>
                                                  </div> -->
                                                </div>
                                                <div class="row-border"></div>
                                              </div>
                                            </div>                                            
                                            <div style="display:none" ng-if="optFee.cfar == 1">
                                              <input type="checkbox" value="{[optFee.id]}" class="optional_fee" ng-model="chkCfarR.selectedOption" ng-change="toggleCfar(optFee.id)"
                                                    ng-checked="optFee.active == 1" />                                              
                                            </div>
                                            <div style="display:none" ng-if="optFee.damage_waiver == 1">
                                              <input type="checkbox" value="{[optFee.id]}" class="optional_fee" ng-model="chkDamageWaiverR.selectedOption" ng-change="toggleDamageWaiver(optFee.id)"
                                                    ng-checked="optFee.active == 1" />                                              
                                            </div>
                                            <div style="display:none" ng-if="optFee.travel_insurance == 1">
                                            <input type="checkbox" ng-model="chkTravelInsuranceR.selectedOption" value="{[optFee.id]}" class="optional_fee" ng-change="toggleTravelInsurance(optFee.id)"
                                                    ng-checked="optFee.active == 1" />                                             
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                        <div class="row" style="margin-top:10px">
                                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-sm-push-6 col-md-push-6 col-lg-push-6">
                                            <div class="form-group">
                                              <button type="button" id="btn-step-2" class="btn btn-block btn-primary" ng-click="goToStep3()">
                                                <?php _e('Continue',  'streamline-core')  ?>&nbsp;<i class="fa fa-arrow-right"></i>
                                              </button>                                            
                                            </div>                                            
                                          </div>
                                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-sm-pull-6 col-md-pull-6 col-lg-pull-6">                                            
                                            <button type="button" class="btn btn-block btn-secondary" ng-click="goToStepOne()">
                                              <i class="fa fa-arrow-left"></i>&nbsp;
                                              <?php _e('Go Back', 'streamline-core')  ?>
                                            </button>                                            
                                          </div>
                                        </div>                                        
                                        <div ng-show="protectionError" class="hidden-md hidden-lg ng-invalid">                                          
                                          <p class="error" ng-if="!(chkTravelInsurance || chkCfar || chkTravelInsuranceNo)" ng-show="hasTravelInsurance || hasCfar" ng-bind="'<?php _e('You must make a selection for travel insurance',  'streamline-core'); ?>'"></p>
                                          <p class="error" ng-if="!(chkDamageWaiver || chkDamageWaiverNo)" ng-show="hasDamageProtection" ng-bind="'<?php  _e('You must make a selection for damage protection', 'streamline-core'); ?>'"></p>                                          
                                        </div>                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading heading_primary_color" role="tab" id="headingThree" ng-if="reservationDetails.optional_fees.length > 0">
                              <span class="step">3</span>
                              <h4 class="panel-title">
                                <?php _e('Payment Information', 'streamline-core'); ?>
                              </h4>
                            </div>
                            <div class="panel-heading" role="tab" id="headingThree" ng-if="!reservationDetails.optional_fees.length > 0">
                              <span class="step">2</span>
                              <h4 class="panel-title">
                                <?php _e('Payment Information', 'streamline-core'); ?>
                              </h4>
                            </div>
                            <div id="step3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="panel-body panel-step-3">
                                <form name="formStep3" class="css-form" novalidate>
                                  <div class="row">
                                    <div class="col-md-4 col-md-push-8">
                                      <img class="c_arrow" style="min-height: 260px;" src="<?php echo $this->assets_url ?>/images/triangle.svg" title="" alt="">
                                      <div class="resortpro-reservation-details-mobile hidden-md hidden-lg">
                                        <p>
                                          <?php _e('Total', 'streamline-core'); ?>
                                            <span class="mobile-price pull-right" ng-bind="reservationDetails.total | currency"></span>
                                        </p>
                                        <div class="row">
                                          <div class="col-xs-6 col-sm-4">
                                            <a class="btn-mobile-details" href="#mobile-details-3">See more details</a>
                                          </div>
                                          <div class="col-xs-6 col-sm-8 text-right">
                                            <span class="mobile-dates" ng-bind="startDate + ' - ' + endDate"></span>
                                          </div>
                                        </div>
                                        <div id="mobile-details-3" class="mobile-details" style="display:none" data-visible="false">
                                          <div class="row mobile-general-info">
                                            <div class="col-xs-12 col-sm-12">
                                              <div class="row">
                                                <div class="col-xs-4 col-sm-4">
                                                  <?php _e('Unit',  'streamline-core'); ?>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 text-right">
                                                  <?php echo $unit_name; ?>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-xs-4 col-sm-4">
                                                  <?php _e('Room rent', 'streamline-core'); ?>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 text-right" ng-bind="subTotal | currency"></div>
                                              </div>
                                              <div class="row">
                                                <div class="col-xs-4 col-sm-4">
                                                  <?php _e('Taxes & Fees',  'streamline-core'); ?>
                                                </div>
                                                <div class="col-xs-8 col-sm-8 text-right" ng-bind="taxesAndFees | currency"></div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row mobile-security-deposits" ng-if="reservationDetails.security_deposits.security_deposit.length > 0 && chkDamageWaiverNo">
                                            <div class="col-xs-12 col-sm-12">
                                              <h3 class="mobile-title">
                                                <?php _e('Security Deposits', 'streamline-core'); ?>
                                              </h3>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="row" ng-repeat="deposit in reservationDetails.security_deposits.security_deposit" ng-if="deposit.deposit_required > 0">
                                                <div class="col-xs-8 col-sm-8">
                                                  <p ng-bind="deposit.description"></p>
                                                </div>
                                                <div class="col-xs-4 col-xs-4 text-right" ng-bind="deposit.deposit_required | currency"></div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row mobile-expected-charges" ng-if="reservationDetails.expected_charges.length > 0">
                                            <div class="col-xs-12 col-sm-12">
                                              <h3 class="mobile-title">
                                                <?php _e('Expected Charges',  'streamline-core'); ?>
                                              </h3>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="row" ng-repeat="charge in reservationDetails.expected_charges track by $index">
                                                <div class="col-xs-8 col-sm-8">
                                                  <p ng-bind="charge.description"></p>
                                                  <span ng-bind="charge.charge_date"></span>
                                                </div>
                                                <div class="col-xs-4 col-xs-4 text-right" ng-bind="charge.charge_value | currency"></div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="resortpro-reservation-details hidden-sm hidden-xs">
                                        <div class="details table-responsive">
                                          <table class="table table-hover table-condensed">
                                            <thead class="border-bottom-primary">
                                              <tr>
                                                <th colspan="2">
                                                  <?php _e('Reservation Info',  'streamline-core'); ?>
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td style="width:50%">
                                                  <?php _e('Unit',  'streamline-core'); ?></td>
                                                <td class="text-right">
                                                  <span>
                                                    <?php echo $unit_name; ?>
                                                  </span>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  <?php _e('Arrival Date',  'streamline-core'); ?></td>
                                                <td class="text-right">
                                                  <span ng-bind="startDate"></span>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  <?php _e('Departure Date',  'streamline-core'); ?></td>
                                                <td class="text-right">
                                                  <span ng-bind="endDate"></span>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  <?php _e('Number of Nights',  'streamline-core'); ?> </strong>
                                                </td>
                                                <td class="text-right">
                                                  <span ng-bind="reservationDetails.reservation_days.length"></span>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  <?php _e('Price', 'streamline-core'); ?>
                                                    <a ng-show="!reservationDetails.reservation_days.date" href="#" class="btn-price-breakdown">
                                                      <i class="glyphicon glyphicon-menu-down"></i>
                                                    </a>
                                                </td>
                                                <td class="text-right">
                                                  <span ng-bind="subTotal | currency"></span>
                                                </td>
                                              </tr>
                                              <tr ng-repeat="res in reservationDetails.reservation_days" class="breakdown-days-hidden" data-visible="false">
                                                <td style="text-indent: 24px" ng-bind="res.date"></td>
                                                <td class="text-right">
                                                  <span ng-bind="calculateMarkup((res.price + res.extra).toString()) | currency"></span>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  <?php _e('Taxes &amp; Fees',  'streamline-core'); ?>
                                                    <a ng-show="!reservationDetails.reservation_days.date" href="#" class="btn-taxes-breakdown">
                                                      <i class="glyphicon glyphicon-menu-down"></i>
                                                    </a>
                                                </td>
                                                <td class="text-right">
                                                  <span ng-bind="taxesAndFees | currency"></span>
                                                </td>
                                              </tr>
                                              <tr ng-repeat="tax in reservationDetails.taxes_details track by $index" class="breakdown-taxes-hidden" data-visible="false">
                                                <td style="text-indent: 24px" ng-bind="tax.name"></td>
                                                <td class="text-right">
                                                  <span ng-bind="tax.value | currency"></span>
                                                </td>
                                              </tr>
                                              <tr ng-repeat="reqFee in reservationDetails.required_fees" class="breakdown-taxes-hidden" data-visible="false">
                                                <td style="text-indent: 24px" ng-bind="reqFee.name"></td>
                                                <td class="text-right">
                                                  <span ng-bind="reqFee.value | currency"></span>
                                                </td>
                                              </tr>
                                              <tr ng-repeat="optFee in reservationDetails.optional_fees track by $index" ng-if="optFee.active == 1" class="breakdown-taxes-hidden"
                                                data-visible="false">
                                                <td style="text-indent: 24px" ng-bind="optFee.name"></td>
                                                <td class="text-right">
                                                  <span ng-bind="optFee.value | currency"></span>
                                                </td>
                                              </tr>
                                              <tr ng-if="reservationDetails.coupon_discount > 0">
                                                <td><?php _e('Discount',  'streamline-core'); ?></td>
                                                <td class="text-right">
                                                  <span ng-bind="'(' + (reservationDetails.coupon_discount | currency) + ')'"></span>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td><?php _e('Total', 'streamline-core'); ?></td>
                                                <td class="text-right" ng-bind="reservationDetails.total | currency"></td>
                                              </tr>

                                              <tr ng-if="reservationDetails.due_today > 0">
                                                <td><?php _e('Due Today', 'streamline-core'); ?></td>
                                                <td class="text-right" ng-bind="reservationDetails.due_today | currency"></td>
                                              </tr>
                                            </tbody>
                                          </table>

                                          <table ng-if="reservationDetails.security_deposits.security_deposit.length > 0 && chkDamageWaiverNo" class="table table-hover table-condensed">
                                            <thead>
                                              <tr>
                                                <th colspan="2">
                                                  <?php _e('Security Deposits', 'streamline-core'); ?>
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr ng-repeat="deposit in reservationDetails.security_deposits.security_deposit" ng-if="deposit.deposit_required > 0">
                                                <td ng-bind="deposit.description"></td>
                                                <td class="text-right" ng-bind="deposit.deposit_required | currency"></td>
                                              </tr>
                                            </tbody>
                                          </table>

                                          <table ng-if="reservationDetails.expected_charges.length > 0" class="table table-hover table-condensed table-expected-charges">
                                            <thead>
                                              <tr>
                                                <th colspan="3">
                                                  <?php _e('Expected Charges',  'streamline-core'); ?>
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <?php _e('Date',  'streamline-core'); ?>
                                                </td>
                                                <td>
                                                  <?php _e('Description', 'streamline-core'); ?>
                                                </td>
                                                <td>
                                                  <?php _e('Charge',  'streamline-core'); ?>
                                                </td>
                                              </tr>
                                              <tr ng-repeat="charge in reservationDetails.expected_charges track by $index">
                                                <td ng-bind="charge.charge_date"></td>
                                                <td ng-bind="charge.description"></td>
                                                <td class="text-right" ng-bind="charge.charge_value | currency"></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-8 col-md-pull-4">

                                      <div class="row">
                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <input type="text" name="address" class="form-control form-icon" placeholder="<?php _e('Address', 'streamline-core'); ?>" ng-model="checkout.address" required/>
                                            <span class="icon-checkout icon-marker"></span>
                                            <?php if($gdpr_enabled && !empty($options['gdpr_address'])):?>
                                            <a href="#" tabindex="-1" title="<?php echo $options['gdpr_address']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
                                            <?php endif; ?>
                                            <div ng-show="formStep3.$submitted || formStep3.address.$touched">
                                              <span class="error" ng-show="formStep3.address.$error.required" ng-bind="'<?php _e('Address is required.',  'streamline-core'); ?>'"></span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <input type="text" name="address2" class="form-control form-icon" ng-model="checkout.address2" placeholder="<?php _e('Address 2 (optional)',  'streamline-core'); ?>" />
                                            <span class="icon-checkout icon-marker"></span>
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <select ng-init="checkout.country = 'US'" ng-model="checkout.country" ng-change="getStates()" name="country" id="country"
                                              size="1" class="form-control required" ng-options="country.name as country.description for country in countries">
                                              <option value="">Country</option>
                                            </select>                                            
                                            <?php if($gdpr_enabled && !empty($options['gdpr_country'])):?>
                                            <a href="#" tabindex="-1" title="<?php echo $options['gdpr_country']; ?>" class="g_tooltip">
                                              <i class="fa fa-question-circle"></i>
                                            </a>
                                            <?php endif; ?>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <input type="text" name="city" class="form-control form-icon" placeholder="<?php  _e('City',  'streamline-core'); ?>" ng-model="checkout.city" required />
                                            <span class="icon-checkout icon-marker"></span>
                                            <?php if($gdpr_enabled && !empty($options['gdpr_city'])):?>
                                            <a href="#" tabindex="-1" title="<?php echo $options['gdpr_city']; ?>" class="g_tooltip">
                                              <i class="fa fa-question-circle"></i>
                                            </a>
                                            <?php endif; ?>
                                            <div ng-show="formStep3.$submitted || formStep3.city.$touched">
                                              <span class="error" ng-show="formStep3.city.$error.required" ng-bind="'<?php  _e('City is required.', 'streamline-core'); ?>'"></span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <input type="text" max-length="2" name="state" placeholder="<?php _e('State', 'streamline-core'); ?>" class="form-control" ng-if="!states.length" ng-model="checkout.state" required />
                                            <select name="state" class="form-control" ng-if="states.length" ng-model="checkout.state" required>
                                              <option value="">State</option>
                                              <option ng-repeat='state in states' value='{[state.name]}' ng-bind="state.description"></option>
                                            </select>                                            
                                            <?php if($gdpr_enabled && !empty($options['gdpr_state'])):?>
                                            <a href="#" tabindex="-1" title="<?php echo $options['gdpr_state']; ?>" class="g_tooltip">
                                              <i class="fa fa-question-circle"></i>
                                            </a>
                                            <?php endif; ?>
                                            <div ng-show="formStep3.$submitted || formStep3.state.$touched">
                                              <span class="error" ng-show="formStep3.state.$error.required" ng-bind="'<?php _e('State is required.',  'streamline-core'); ?>'"></span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <input type="text" name="postal_code" class="form-control form-icon" placeholder="<?php _e('Zip Code',  'streamline-core'); ?>" ng-model="checkout.postal_code" required />
                                            <span class="icon-checkout icon-marker"></span>
                                            <?php if($gdpr_enabled && !empty($options['gdpr_postal_code'])):?>
                                            <a href="#" tabindex="-1" title="<?php echo $options['gdpr_postal_code']; ?>" class="g_tooltip">
                                              <i class="fa fa-question-circle"></i>
                                            </a>
                                            <?php endif; ?>
                                            <div ng-show="formStep3.$submitted || formStep3.postal_code.$touched">
                                              <span class="error" ng-show="formStep3.postal_code.$error.required" ng-bind="'<?php _e('Postal Code is required.',  'streamline-core'); ?>'"></span>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="row" ng-if="!pbgEnabled" ng-init="checkout.card_type = ''">
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <select name="card_type" class="form-control" ng-model="checkout.card_type" required>
                                              <option value="">
                                                <?php _e('Payment Type',  'streamline-core')  ?>
                                              </option>
                                              <?php if  ((int)  $options['property_card_type_visa'] === 1)  : ?>
                                                <option value="1">
                                                  <?php _e('Visa',  'streamline-core'); ?>
                                                </option>
                                                <?php endif;  ?>
                                                  <?php if  ((int)  $options['property_card_type_master_card']  === 1)  : ?>
                                                    <option value="2">
                                                      <?php _e('MasterCard',  'streamline-core'); ?>
                                                    </option>
                                                    <?php endif;  ?>
                                                      <?php if  ((int)  $options['property_card_type_amex'] === 1)  : ?>
                                                        <option value="3">
                                                          <?php _e('American Express',  'streamline-core'); ?>
                                                        </option>
                                                        <?php endif;  ?>
                                                          <?php if  ((int)  $options['property_card_type_discover'] === 1)  : ?>
                                                            <option value="4">
                                                              <?php _e('Discover',  'streamline-core'); ?>
                                                            </option>
                                                            <?php endif;  ?>
                                                              <?php if  ((int)  $options['property_card_type_echeck'] === 1)  : ?>
                                                                <option value="5">
                                                                  <?php _e('E-check', 'streamline-core'); ?>
                                                                </option>
                                                                <?php endif;  ?>
                                            </select>
                                            <div ng-show="formStep3.$submitted || formStep3.card_type.$touched">
                                              <span class="error" ng-show="formStep3.card_type.$error.required" ng-bind="'<?php _e('Payment Type is required.', 'streamline-core'); ?>'"></span>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-sm-9">
                                          <div class="row" ng-if="checkout.card_type < 5">
                                            <div class="col-sm-5">
                                              <div class="form-group">
                                                <input type="text" class="form-control" name="card_number" ng-model="checkout.card_number" autocomplete="off" payments-validate="card"
                                                  payments-format="card" payments-type-model="type" ng-class="myForm.number.$card.type"
                                                  placeholder="<?php  _e('Card Number', 'streamline-core'); ?>" required/>
                                                <div ng-show="formStep3.$submitted || formStep3.card_number.$touched">
                                                  <span class="error" ng-show="formStep3.card_number.$error.required" ng-bind="'<?php _e('Card Number is required.',  'streamline-core'); ?>'"></span>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-sm-4">
                                              <div class="form-group">
                                                <input type="text" class="form-control" name="expiration_date" ng-model="checkout.expiration_date" class="form-control" payments-validate="expiry"
                                                  payments-format="expiry" placeholder="Exp. date (mm/yy)" required />
                                                <div ng-show="formStep3.$submitted || formStep3.expiration_date.$touched">
                                                  <span class="error" ng-show="formStep3.expiration_date.$error.required" ng-bind="'<?php _e('Expiration date is required.',  'streamline-core'); ?>'"></span>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-sm-3">
                                              <div class="form-group">
                                                <input type="text" name="card_cvv" placeholder="<?php _e('CVV', 'streamline-core'); ?>" class="form-control" ng-model="checkout.card_cvv"
                                                  payments-validate="cvc" payments-format="cvc" payments-type-model="type"
                                                  required />
                                                <div ng-show="formStep3.$submitted || formStep3.card_cvv.$touched">
                                                  <span class="error" ng-show="formStep3.card_cvv.$error.required" ng-bind="'<?php  _e('CVV is required.',  'streamline-core'); ?>'"></span>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row" ng-if="checkout.card_type == 5">
                                            <div class="col-sm-4">
                                              <div class="form-group">
                                                <input type="text" maxlength="16" name="bank_account_number" class="form-control" placeholder="<?php  _e('Bank Account Number', 'streamline-core'); ?>"
                                                  ng-model="checkout.bank_account_number" autocomplete="off" required>
                                                <div ng-show="formStep3.$submitted || formStep3.bank_account_number.$touched">
                                                  <span class="error" ng-show="formStep3.bank_account_number.$error.required" ng-bind="'<?php _e('Bank Account Number is required.',  'streamline-core'); ?>'"></span>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-sm-4">
                                              <div class="form-group">
                                                <input type="text" maxlength="18" name="bank_routing_number" class="form-control" placeholder="<?php  _e('Bank Routing Number', 'streamline-core'); ?>"
                                                  ng-model="checkout.bank_routing_number" autocomplete="off" required>
                                                <div ng-show="formStep3.$submitted || formStep3.bank_routing_number.$touched">
                                                  <span class="error" ng-show="formStep3.bank_routing_number.$error.required" ng-bind="'<?php _e('Routing number is required.', 'streamline-core'); ?>'"></span>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-sm-4">
                                              <div class="form-group">
                                                <input type="text" maxlength="100" name="bank_account_holder_name" class="form-control" placeholder="<?php  _e('Bank Account Holder Name',  'streamline-core'); ?>"
                                                  ng-model="checkout.bank_account_holder_name" autocomplete="off" required>
                                                <div ng-show="formStep3.$submitted || formStep3.bank_account_holder_name.$touched">
                                                  <span class="error" ng-show="formStep3.bank_account_holder_name.$error.required" ng-bind="'<?php  _e('Account Holder Name is required.',  'streamline-core'); ?>'"></span>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                      </div>

                                      <?php if  ($has_coupon || $notes_enabled):  ?>
                                        <div class="form-group">
                                          <div class="row">
                                            <?php if($has_coupon): ?>
                                            <div class="col-md-6" ng-if="!reservationDetails.coupon_discount > 0">
                                              <div class="input-group">
                                                <input type="text" class="form-control" placeholder="<?php  _e('Enter Promo Code',  'streamline-core'); ?>" ng-model="checkout.promo_code"
                                                />
                                                <span class="input-group-btn">
                                                  <button class="btn btn-primary" type="button" ng-click="getPreReservation()">
                                                    <i class="glyphicon glyphicon-ok"></i>
                                                    <?php _e('Redeem',  'streamline-core'); ?>
                                                  </button>
                                                </span>
                                              </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($notes_enabled): ?>
                                            <div class="col-md-6">
                                              <textarea name="notes" ng-model="checkout.notes" class="form-control" placeholder="Booking Comments"></textarea>
                                            </div>
                                            <?php endif; ?>
                                          </div>
                                        </div>
                                        <?php endif;  ?>

                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="checkbox">
                                                <label for="terms">
                                                  <input type="checkbox" id="terms" name="terms" ng-model="termsConditions" ng-true-value="1" check-required />
                                                  <?php printf(__('I agree to the %s Terms &amp; Conditions %s and %s Privacy Policy %s', 'streamline-core'), '<a href="#" data-toggle="modal" data-target="#myModal">',  '</a>', '<a href="#" data-toggle="modal" data-target="#modalPrivacy">', '</a>');  ?>
                                                </label>
                                              </div>
                                              <?php if($gdpr_enabled): ?>
                                              <div class="checkbox">
                                                <label for="newsletter">
                                                  <input type="checkbox" id="newsletter" name="newsletter" ng-model="newsletter" ng-true-value="1" />
                                                  <?php printf(__('I agree to receive promotions, newsletters and marketing materials', 'streamline-core'));  ?>
                                                </label>
                                              </div>
                                              <?php endif; ?>
                                              <div ng-show="formStep3.$submitted || formStep3.termsConditions.$touched">
                                                <span class="error" ng-show="!formStep3.terms.$valid" ng-bind="'<?php _e('You have not read the terms and conditions',  'streamline-core'); ?>'"></span>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="alert alert-{[alert.type]} animate" ng-repeat="alert in alerts">
                                                <div ng-bind-html="alert.message | trustedHtml"></div>
                                              </div>
                                              <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-sm-push-6 col-md-push-6 col-lg-push-6">
                                                  <div class="form-group">
                                                    <button id="btn-checkout" type="submit" class="btn btn-block btn-primary" ng-if="!pbgEnabled" ng-click="validateStep3(checkout)">
                                                      <?php _e('Complete my Booking', 'streamline-core'); ?>&nbsp;
                                                        <i class="glyphicon glyphicon-log-in"></i>
                                                    </button>
                                                  </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-sm-pull-6 col-md-pull-6 col-lg-pull-6">
                                                  <div class="form-group">
                                                    <button type="button" class="btn btn-block btn-secondary" ng-click="goToStepTwo()" ng-if="reservationDetails.optional_fees.length > 0">
                                                      <i class="fa fa-arrow-left"></i>&nbsp;
                                                      <?php _e('Go Back', 'streamline-core')  ?>
                                                    </button>
                                                    <button type="button" class="btn btn-block btn-secondary" ng-click="goToStepOne()" ng-if="!reservationDetails.optional_fees.length > 0">
                                                      <i class="fa fa-arrow-left"></i>&nbsp;
                                                      <?php _e('Go Back', 'streamline-core')  ?>
                                                    </button>
                                                  </div>
                                                </div>

                                              </div>
                                              <?php do_action('streamline-insert-paybygroup', $property_data['data']['default_image_path'], $str_checkin, $str_checkout,  $unit_id);  ?>
                                            </div>
                                          </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
      </main>
      </div>

       <div class="modal fade" id="myModal" ng-init="getTermsAndConditions()">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title"><?php _e('Terms &amp; Conditions',  'streamline-core'); ?></h4>
        </div>
        <div class="modal-body">
          <div ng-bind-html="terms"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php  _e('Close', 'streamline-core'); ?></button>          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <div class="modal fade" id="modalPrivacy" ng-init="getPrivacyPolicy()">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title"><?php _e('Privacy Policy',  'streamline-core'); ?></h4>
        </div>
        <div class="modal-body">
          <div class="policy_and_privacy" ng-bind-html="privacyPolicyHtml"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php  _e('Close', 'streamline-core'); ?></button>          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <div class="modal fade" id="modalAmenities">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title"><?php _e('Add Ons', 'streamline-core'); ?></h4>
        </div>
        <div class="modal-body">
          <div class="alert alert-info">
            <?php _e('Select item(s) and the quantity then press Add To Reservation', 'streamline-core'); ?>
          </div>
          <table cellspacing="0" cellpadding="0" border="0" class="table table-striped table-condensed table-bordered">
            <thead>
              <tr>
                <th><?php _e('Item Name / Description', 'streamline-core'); ?></th>
                <th><?php _e('Qty', 'streamline-core'); ?>.</th>
                <th><?php _e('Price', 'streamline-core'); ?></th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="amenity in amenities" ng-if="amenity.amenity_cost != '$0.00'">
              <td>
                <h3 style="margin:0">
                  <input type="checkbox" class="addOn" value="{[amenity.amenity_id]}"/>
                  <span ng-bind="amenity.amenity_name"></span>
                </h3>
                <p ng-if="!isEmptyObject(amenity.amenity_description)" ng-bind="amenity.amenity_description"></p>
              </td>
              <td class="text-center" style="width: 80px;">
                <input type="text" class="form-control text-right" id="qty-optional-fee-{[amenity.amenity_id]}" value="1"/>
              </td>
              <td class="text-right" style="width:80px;" ng-bind="amenity.amenity_cost"></td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal"><?php  echo  _x('Close', 'close modal window', 'streamline-core'); ?></button>
          <button type="button" class="btn btn-primary" ng-click="addToReservation()"><?php _e('Add to reservation',  'streamline-core'); ?>
          </button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div><!-- /.modal -->
    </div>
    <!-- .content-area -->

    <form method="post" id="form_thankyou" action="<?php  echo  get_permalink(get_page_by_slug('thank-you'))  ?>">
      <input type="hidden" id="confirmation_id" name="confirmation_id" value="" />
      <input type="hidden" id="location_name" name="location_name" value="" />
      <input type="hidden" id="condo_type_name" name="condo_type_name" value="" />
      <input type="hidden" id="unit_name" name="unit_name" value="" />
      <input type="hidden" id="startdate" name="startdate" value="" />
      <input type="hidden" id="enddate" name="enddate" value="" />
      <input type="hidden" id="occupants" name="occupants" value="" />
      <input type="hidden" id="occupants_small" name="occupants_small" value="" />
      <input type="hidden" id="pets" name="pets" value="" />
      <input type="hidden" id="price_common" name="price_common" value="" />
      <input type="hidden" id="price_balance" name="price_balance" value="" />
      <input type="hidden" id="travelagent_name" name="travelagent_name" value="" />
      <input type="hidden" id="email" name="email" value="" />
      <input type="hidden" id="fname" name="fname" value="" />
      <input type="hidden" id="lname" name="lname" value="" />
      <input type="hidden" id="unit_id" name="unit_id" value="" />
    </form>