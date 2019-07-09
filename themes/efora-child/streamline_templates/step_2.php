<form name="formStep1" class="css-form" novalidate>
   <div class="row">
      <div class="col-md-12">
         <div ng-if="reservationDetails.total > 0 && alerts.length==0" class="price_sticky price_table" <?php echo $sticky_spacing ?> ng-cloak>
            <table  class="table table-bordered table-striped table-hover table-condensed">
               <tbody>
                  <tr>
                     <td>
                        <i class="fa fa-moon-o" aria-hidden="true"></i>{[reservationDetails.reservation_days[0].price | currency:undefined:0 ]} x {[reservationDetails.reservation_days.length ]} Nights
                     </td>
                     <!--                  <td>
                        <strong><?php _e('Subtotal',  'streamline-core'); ?> </strong>
                        </td> -->
                     <td ng-if="!reservationDetails.extra > 0" class="text-right"><span ng-bind="subTotal | currency"></span></td>
                  </tr>
                  <tr id="discount_text" ng-if="reservationDetails.coupon_discount > 0">
                     <td><span><i class="fa fa-tag" aria-hidden="true"></i><?php _e('Discount Applied',  'streamline-core'); ?>: </span></td>
                     <td class="text-right" ng-bind="'-' + (reservationDetails.coupon_discount | currency)"></td>
                  </tr>
                  <tr>
                     <td>
                        <strong><?php _e('Taxes &amp; Fees',  'streamline-core'); ?></strong>
                        <a ng-click="toggleTax()" class="show_tax">
                        <i ng-if="toggledown" class="fa fa-chevron-circle-down"></i>
                        <i ng-if="toggleup" class="fa fa-chevron-circle-up"></i>
                        </a>
                     </td>
                     <td class="text-right"><span ng-bind="taxesAndFees | currency"></span>
                     </td>
                  </tr>
                  <tr ng-repeat="reqFee in reservationDetails.required_fees" class="breakdown-taxes-hidden" data-visible="false">
                     <td style="text-indent: 24px">
                        <span ng-bind="reqFee.name"></span>
                     </td>
                     <td class="text-right" ng-bind="reqFee.value | currency"></td>
                  </tr>
                  <tr ng-repeat="reqFee in reservationDetails.taxes_details" class="breakdown-taxes-hidden" data-visible="false">
                     <td style="text-indent: 24px"><span ng-bind="reqFee.name"></span></td>
                     <td class="text-right" ng-bind="reqFee.value | currency"></td>
                  </tr>
                  <tr ng-if="chkTravelInsuranceR.selectedOption"  class="breakdown-taxes-hidden" data-visible="false">
                     <td style="text-indent: 24px">
                        <span> Travel Insurance:</span>
                     </td>
                     <td class="text-right" ng-bind="travelInsurance | currency"></td>
                  </tr>
                  <tr>
                     <td>
                        <strong class="total_price"><?php _e('Total Price', 'streamline-core'); ?>:</strong>
                     </td>
                     <td ng-if="chkTravelInsuranceR.selectedOption == 1" class="text-right step_1_total_price_value" ng-bind="reservationDetails.total | currency"></td>
                     <td ng-if="chkTravelInsuranceR.selectedOption == 0" class="text-right step_1_total_price_value" ng-bind="reservationDetails.total | currency"></td>
                  </tr>
                  <tr class="border-after-price">
                     <td></td>
                     <td></td>
                  </tr>
                  <tr>
                     <td>
                        <i id="book_now_Due" class="fa fa-credit-card" aria-hidden="true">
                        <strong class="total_price_due"><?php  _e('Total Due Today', 'streamline-core'); ?>:</strong>
                        </i>
                     </td>
                    	<td ng-if="chkTravelInsuranceR.selectedOption == 1" class="text-right step_1_total_price_due" ng-bind="calculateMarkup((travelInsurance + subTotal / 2).toString()) | currency"></td>
		<td ng-if="chkTravelInsuranceR.selectedOption == 0" class="text-right step_1_total_price_due" ng-bind="calculateMarkup((subTotal / 2).toString()) | currency"></td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="form-group">
            <div class="row">
               <div class="form-group col-sm-6 container_input pr-md-2">
                  <label class="font-13 font-weight-semi-bold text-black"><?php  _e('First Name',  'streamline-core'); ?>:<sup style=" font-size:14px;">*</sup> </label>
                  <?php if($options['enable_gdpr'] == 1 && !empty($options['gdpr_first_name'])):?>
                  <a href="#" title="<?php echo $options['gdpr_first_name']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
                  <?php endif; ?>
                  <input type="text" maxlength="20" name="fname"
                     placeholder="<?php _e('First Name',  'streamline-core'); ?>"
                     class="form-control"
                     ng-model="checkout.fname"
                     ng-change="validateStepOne(checkout)"
                     required>
                  <div ng-show="formStep1.$submitted || formStep1.fname.$touched">
                     <span id="firname" class="error" ng-show="formStep1.fname.$error.required" ng-bind="'<?php  _e('First name is required.', 'streamline-core'); ?>'"></span>
                  </div>
               </div>
               <div class="form-group col-sm-6 container_input pl-md-2">
                  <label class="font-13 font-weight-semi-bold text-black"><?php  _e('Last Name', 'streamline-core'); ?>:<sup style="font-size:14px;">*</sup></label>
                  <?php if($options['enable_gdpr'] == 1 && !empty($options['gdpr_last_name'])):?>
                  <a href="#" title="<?php echo $options['gdpr_last_name']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
                  <?php endif; ?>
                  <input maxlength="20" type="text" name="lname" class="form-control"
                     placeholder="<?php _e('Last Name', 'streamline-core'); ?>"
                     ng-model="checkout.lname"
                     ng-change="validateStepOne(checkout)"
                     required>
                  <div ng-show="formStep1.$submitted || formStep1.lname.$touched">
                     <span id="lname" class="error" ng-show="formStep1.lname.$error.required" ng-bind="'<?php  _e('Last name is required.',  'streamline-core'); ?>'"></span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="form-group col-sm-12 container_input">
                  <label class="font-13 font-weight-semi-bold text-black"><?php  _e('Email', 'streamline-core'); ?>:<sup style="font-size:14px;">*</sup></label>
                  <?php if($options['enable_gdpr'] == 1 && !empty($options['gdpr_email'])):?>
                  <a href="#" title="<?php echo $options['gdpr_email']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
                  <?php endif; ?>
                  <input type="email" name="email" class="form-control"
                     placeholder="<?php _e('Where to send your booking confirmation', 'streamline-core'); ?>"
                     ng-model="checkout.email" required />
                  <div ng-show="formStep1.$submitted || formStep1.email.$touched">
                     <span id="emailerr" class="error" ng-show="formStep1.email.$error.required" ng-bind="'<?php  _e('Tell us your email.', 'streamline-core'); ?>'"></span>
                     <span id="emailerr1" class="error" ng-show="formStep1.email.$error.email" ng-bind="'<?php _e('This is not a valid email.',  'streamline-core'); ?>'"></span>
                  </div>
               </div>
               <div class="form-group col-sm-12 container_input">
                  <label class="font-13 font-weight-semi-bold text-black"><?php  _e('Mobile phone number', 'streamline-core'); ?>:<sup style="font-size:14px;">*</sup></label>
                  <?php if($options['enable_gdpr'] == 1 && !empty($options['gdpr_phone_number'])):?>
                  <a href="#" title="<?php echo $options['gdpr_phone_number']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
                  <?php endif; ?>
                  <input type="phone" name="phone" class="form-control"
                     ng-model="checkout.phone"
                     ng-pattern="/^-?\d*$/"
                     ng-maxlength="15"
                     ng-minlength="10"
                     required
                     placeholder="To get in touch with you" />
                  <div ng-show="formStep1.$submitted || formStep1.phone.$touched">
                     <span id="phoneerror1" class="error" ng-show="formStep1.phone.$error.required" ng-bind="'<?php  _e('Phone is required.',  'streamline-core'); ?>'"></span>
                     <span id="phoneerror2" class="error" ng-show="formStep1.phone.$error.pattern" ng-bind="'<?php _e('Invalid phone number.',  'streamline-core'); ?>'"></span>
                     <span id="phoneerror3" class="error" ng-show="formStep1.phone.$error['maxlength']" ng-bind="'<?php _e('Invalid phone number. max length is 15.',  'streamline-core'); ?>'"></span>
                     <span id="phoneerror4" class="error" ng-show="formStep1.phone.$error['minlength']" ng-bind="'<?php _e('Invalid phone number. min length is 10.',  'streamline-core'); ?>'"></span>

                  </div>
               </div>
               <div class="clearfix"></div>
               <div class="form-group col-sm-12 container_input">
                  <label class="font-13 font-weight-semi-bold text-black"><?php  _e('Address', 'streamline-core'); ?>:<sup style="font-size:14px;">*</sup> </label>
                  <?php if($options['enable_gdpr'] == 1 && !empty($options['gdpr_address'])):?>
                  <a href="#" title="<?php echo $options['gdpr_address']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
                  <?php endif; ?>
                  <input type="text" name="address" class="form-control"
                     ng-model="checkout.address"
                     required/>
                  <div ng-show="formStep1.$submitted || formStep1.address.$touched">
                     <span id="addrerror" class="error" ng-show="formStep1.address.$error.required"><?php _e('Address is required.',  'streamline-core'); ?></span>
                  </div>
               </div>
               <div class="form-group col-sm-12 container_input">
                  <label class="font-13 font-weight-semi-bold text-black"><?php  _e('Address', 'streamline-core'); ?> 2: </label>
                  <input type="text" name="address2" class="form-control"
                         ng-model="checkout.address2" placeholder="<?php  _e('Optional',  'streamline-core'); ?>"/>
                  </div>
               <div class="form-group col-sm-12 container_input">
                  <label class="font-13 font-weight-semi-bold text-black"><?php _e('Country', 'streamline-core'); ?>:<sup style="font-size:14px;">*</sup> </label>
                  <?php if($options['enable_gdpr'] == 1 && !empty($options['gdpr_country'])):?>
                  <a href="#" title="<?php echo $options['gdpr_country']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
                  <?php endif; ?>
                  <select ng-init="checkout.country = 'US'" name="country" id="country" class="form-control required" size="1" ng-model="checkout.country" ng-change="getStates()">
                  <?php foreach ($country_list as $country_name){
                     if($country_name['name'] == $default_country){
                        echo('<option selected="selected" value='.$country_name['name'].'>'.$country_name['description'].'</option>');
                     }else{
                        echo('<option value='.$country_name['name'].'>'.$country_name['description'].'</option>');
                     }
                     } ?>
                  </select>
               </div>
               <div class="col-md-6 cst_padd form-group pr-md-2">
                  <label class="font-13 font-weight-semi-bold text-black"><?php  _e('City',  'streamline-core'); ?>:<sup style="font-size:14px;">*</sup> </label>
                  <input type="text" name="city" class="form-control"
                     ng-model="checkout.city"
                     required>
                  <div ng-show="formStep1.$submitted || formStep1.city.$touched">
                     <span class="error" ng-show="formStep1.city.$error.required" ng-bind="'<?php  _e('City is required.', 'streamline-core'); ?>'"></span>
                  </div>
               </div>
               
               <div class="col-sm-6 container_input form-group pl-md-2">
                  <label class="font-13 font-weight-semi-bold text-black"><?php  _e('Zip/Postal Code', 'streamline-core'); ?>:<sup style="font-size:14px;">*</sup> </label>
                  <?php if($options['enable_gdpr'] == 1 && !empty($options['gdpr_postal_code'])):?>
                  <a href="#" title="<?php echo $options['gdpr_postal_code']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
                  <?php endif; ?>
                  <input ng-model="checkout.postal_code" ng-pattern="/^-?\d*$/" type="text" name="postal_code" class="form-control"
                     ng-model="checkout.postal_code"  
                     ng-maxlength="6" ng-minlength="5" required>
                  <div ng-show="formStep1.$submitted || formStep1.postal_code.$touched">
                     <span class="error" ng-show="formStep1.postal_code.$error.required" ng-bind="'<?php _e('Postal Code is required.',  'streamline-core'); ?>'"></span>
                     <span class="error" ng-show="formStep1.postal_code.$error.pattern" ng-bind="'<?php _e('Invalid postal code.',  'streamline-core'); ?>'"></span>
                     <span class="error" ng-show="formStep1.postal_code.$error['maxlength']" ng-bind="'<?php _e('Invalid postal code. max length is 6.',  'streamline-core'); ?>'"></span>
                     <span class="error" ng-show="formStep1.postal_code.$error['minlength']" ng-bind="'<?php _e('Invalid postal code. min length is 6.',  'streamline-core'); ?>'"></span>
                  </div>
               </div>
               <div class="col-12 container_input form-group">
                  <label class="font-13 font-weight-semi-bold text-black"><?php  _e('State', 'streamline-core'); ?>:<sup style="font-size:14px;">*</sup> </label>
                  <?php if($options['enable_gdpr'] == 1 && !empty($options['gdpr_state'])):?>
                  <a href="#" title="<?php echo $options['gdpr_state']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
                  <?php endif; ?>
                  <select name="state"
                     class="form-control"
                     ng-model="checkout.state" required>
                     <option value="">Select state</option>
                     <option ng-repeat='state in states' value='{[state.name]}' ng-bind="state.description"></option>
                  </select>
                  <div ng-show="formStep1.$submitted || formStep1.state.$touched">
                     <span class="error" ng-show="formStep1.state.$error.required" ng-bind="'<?php _e('State is required.',  'streamline-core'); ?>'"></span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-12 step_btn_area step-second-bottom d-flex flex-wrap">
                  <div class="col-md-6 col-sm-4 col-xs-6 pl-0 pr-0 pr-md-2">
                     <button id="#btn-back-step2" type="button" class="btn btn-h-custome btn-block btn-h-custome  theme-btn  mt-3 font-14  text-uppercase py-0 btn-shadow primary-button inquiry padding0 goback" ng-click="goToStepZero(false)">
                     <i class="glyphicon glyphicon-arrow-left"></i> <?php  _e('Go Back', 'streamline-core')  ?>
                     </button>
                  </div>
                  <div class="col-md-6 col-sm-8 col-xs-6 pl-0 pr-0 pl-md-2">
                     <button id="btn-step2" type="submit"
                        class="continue btn primary-button   btn-primary mt-3 font-14 btn-h-custome btn-block  text-uppercase py-0 font-weight-light-bold btn-shadow "
                        ng-click="goToStep2(true)">
                     <?php  _e('Continue',  'streamline-core'); ?>
                     <i class="glyphicon glyphicon-arrow-right"></i>
                     </button>
                  </div>
                  <?php if  ($pbg_enabled): ?>
                  <div class="row">
                     <div class="col-md-12">
                        <p>
                           <strong><?php  _e('or',  'streamline-core'); ?> </strong><br />
                           <?php  _e('Pay only for your share', 'streamline-core'); ?>
                        </p>
                        <div class="form-group col-md-12">
                           <button ng-click="goToStep2(true)" type="submit" class="btn btn-success">
                           <?php _e('Split the cost',  'streamline-core'); ?>
                           <span style="font-size:0.8em"
                              ng-if="reservationDetails.total > 0"
                              ng-bind="' - ' + ((reservationDetails.total / occupants) | currency:undefined:0) + ' per guest'">
                           </span>
                           <i class="glyphicon glyphicon-arrow-right"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <?php endif;  ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>