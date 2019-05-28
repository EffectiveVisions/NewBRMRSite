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
            <td ng-if="chkTravelInsuranceR.selectedOption == 1" class="text-right step_1_total_price_value" ng-bind="reservationDetails.total + travelInsurance | currency"></td>
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
<div class="d-inline-block w-100">
   <form name="formStep3" id="paymentform" class="css-form" novalidate>
      <div class="row">
         <div class="col-md-12">
            <div class="clearfix"></div>
            <div class="cards_area col-xs-12">
               <span class="ch_info">Credit Card Details</span>
               <span><img class="pull-right" style="margin-top: 0; max-width: 50%;" src="/wp-content/uploads/2017/04/AwpPftrU4l17AAAAAElFTkSuQmCC.png" alt="title"></span> 
            </div>
            <div class="CardChargeUnderstand d-flex align-items-start w-100 my-3">
               <div class="check">
                  <input type="checkbox" name="CardChargeUnderstand" ng-model="CardChargeUnderstand" ng-true-value="1" check-required>     
               </div>
               <div class="label font-13 text-black ml-2 font-weight-light-bold">
                    <?php printf( __( 'I understand that my credit card information will be securely held and not charged until Blue Ridge Mountain Rentals verbally confirms the reservation and has received my signed rental agreement. ',  'streamline-core')); ?>
                <label class="font-13 font-weight-light-bold text-black" style="padding-left: 0;"></label>
               </div>
            </div>
            <div ng-show="formStep3.$submitted || formStep3.CardChargeUnderstand.$touched">
               <span id="creditaccepterr" class="error" ng-show="!formStep3.CardChargeUnderstand.$valid" ng-bind="'<?php _e('You must agree that you understand your credit card information will be securely held and not charged until Blue Ridge Mountain Rentals verbally confirms the reservation and has received my signed rental agreement.', 'streamline-core'); ?>'">
               </span>
            </div>
            <div class="clearfix"></div>
            <div class="" ng-init="checkout.card_type = ''">
               <div class="row">
                  <div class="col-sm-12 form-group">
                     <label class="font-13 font-weight-semi-bold text-black"><?php  _e('Payment Type:', 'streamline-core')  ?><sup style=" font-size:14px;">*</sup></label>
                     <select name="card_type"
                        class="form-control"
                        ng-model="checkout.card_type"
                        required>
                        <option value="">Select Card Type</option>
                        <?php  if  ((int)  $options['property_card_type_visa'] === 1)  : ?>
                        <option value="1"><?php  _e('Visa',  'streamline-core'); ?></option>
                        <?php  endif;  ?>
                        <?php  if  ((int)  $options['property_card_type_master_card']  === 1)  : ?>
                        <option value="2"><?php  _e('MasterCard',  'streamline-core'); ?></option>
                        <?php  endif;  ?>
                        <?php  if  ((int)  $options['property_card_type_amex'] === 1)  : ?>
                        <option value="3"><?php  _e('American Express',  'streamline-core'); ?></option>
                        <?php  endif;  ?>
                        <?php  if  ((int)  $options['property_card_type_discover'] === 1)  : ?>
                        <option value="4"><?php  _e('Discover',  'streamline-core'); ?></option>
                        <?php  endif;  ?>
                        <?php  if  ((int)  $options['property_card_type_echeck'] === 1)  : ?>
                        <option value="5"><?php  _e('E-check', 'streamline-core'); ?></option>
                        <?php  endif;  ?>
                     </select>
                     <div ng-show="formStep3.$submitted || formStep3.card_type.$touched">
                        <span id="cardtypeerr" class="error" ng-show="formStep3.card_type.$error.required" ng-bind="'<?php  _e('Card Type is required.',  'streamline-core'); ?>'"></span>
                     </div>
                  </div>
               </div>
               <div class="row" ng-if="checkout.card_type < 5">
                  <div class="col-sm-12 form-group">
                     <label class="font-13 font-weight-semi-bold text-black"><?php  _e('Card Number', 'streamline-core'); ?>: <sup style=" font-size:14px;">*</sup> </label>
                     <input type="text" maxlength="16" name="card_number"
                        class="form-control cardnumber"
                        placeholder="<?php _e('No dashes or spaces', 'streamline-core'); ?>"
                        ng-model="checkout.card_number"
                        autocomplete="off"
                        required>
                     <div ng-show="formStep3.$submitted || formStep3.card_number.$touched">
                        <span id="cardnumerr" class="error" ng-show="formStep3.card_number.$error.required" ng-bind="'<?php  _e('Card Number is required.',  'streamline-core'); ?>'"></span>
                     </div>
                  </div>
                  <div class="col-sm-6 form-group pr-md-2">
                     <label class="font-13 font-weight-semi-bold text-black"><?php  _e('Exp Month', 'streamline-core'); ?>: <sup style=" font-size:14px;">*</sup></label>
                     <select name="expire_month" class="form-control month"
                        ng-model="checkout.expire_month"
                        required>
                        <option value=""><?php _e('Select Month', 'streamline-core'); ?></option>
                        <option value="01"><?php _e('Jan', 'streamline-core'); ?></option>
                        <option value="02"><?php _e('Feb', 'streamline-core'); ?></option>
                        <option value="03"><?php _e('Mar', 'streamline-core'); ?></option>
                        <option value="04"><?php _e('Apr', 'streamline-core'); ?></option>
                        <option value="05"><?php _e('May', 'streamline-core'); ?></option>
                        <option value="06"><?php _e('Jun', 'streamline-core'); ?></option>
                        <option value="07"><?php _e('Jul', 'streamline-core'); ?></option>
                        <option value="08"><?php _e('Aug', 'streamline-core'); ?></option>
                        <option value="09"><?php _e('Sep', 'streamline-core'); ?></option>
                        <option value="10"><?php _e('Oct', 'streamline-core'); ?></option>
                        <option value="11"><?php _e('Nov', 'streamline-core'); ?></option>
                        <option value="12"><?php _e('Dec', 'streamline-core'); ?></option>
                     </select>
                     <div ng-show="formStep3.$submitted || formStep3.expire_month.$touched">
                        <span id="cardmontherr" class="error" ng-show="formStep3.expire_month.$error.required" ng-bind="'<?php _e('Expiration month is required.', 'streamline-core'); ?>'"></span>
                     </div>
                  </div>
                  <div class="col-sm-6 form-group pl-md-2">
                     <label class="font-13 font-weight-semi-bold text-black"><?php  _e('Exp Year',  'streamline-core'); ?>: <sup style=" font-size:14px;">*</sup></label>
                     <select name="expire_year" class="form-control year"
                        ng-model="checkout.expire_year"
                        ng-options="year for year in years" required>
                        <option value="">Select Year</option>
                     </select>
                     <div ng-show="formStep3.$submitted || formStep3.expire_year.$touched">
                        <span id="cardyearerr" class="error" ng-show="formStep3.expire_year.$error.required" ng-bind="'<?php  _e('Expiration year is required.',  'streamline-core'); ?>'"></span>
                     </div>
                  </div>
                  <div class="col-sm-6 form-group">
                     <label class="font-13 font-weight-semi-bold text-black"><?php  _e('CVV', 'streamline-core'); ?>: <sup style=" font-size:14px;">*</sup></label>
                     <input type="text" maxlength="4" name="card_cvv"
                        class="form-control cvv"
                        ng-model="checkout.card_cvv" required>
                     <div ng-show="formStep3.$submitted || formStep3.card_cvv.$touched">
                        <span id="cardcvverr" class="error" ng-show="formStep3.card_cvv.$error.required" ng-bind="'<?php _e('CVV is required.',  'streamline-core'); ?>'"></span>
                     </div>
                  </div>
               </div>
               <div class="row" ng-if="checkout.card_type == 5">
                  <div class="col-sm-12">
                     <label class="font-13 font-weight-semi-bold text-black"><?php  _e('Bank Account Number', 'streamline-core'); ?>: </label>
                     <input type="text" maxlength="16" name="bank_account_number"
                        class="form-control"
                        placeholder="<?php _e('Bank Account Number', 'streamline-core'); ?>"
                        ng-model="checkout.bank_account_number"
                        autocomplete="off"
                        required>
                     <div ng-show="formStep3.$submitted || formStep3.bank_account_number.$touched">
                        <span id="bankaccerr" class="error" ng-show="formStep3.bank_account_number.$error.required" ng-bind="'<?php  _e('Bank Account Number is required.',  'streamline-core'); ?>'"></span>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <label class="font-13 font-weight-semi-bold text-black"><?php  _e('Bank Routing Number', 'streamline-core'); ?>: </label>
                     <input type="text" maxlength="18" name="bank_routing_number"
                        class="form-control"
                        placeholder="<?php _e('Bank Routing Number', 'streamline-core'); ?>"
                        ng-model="checkout.bank_routing_number"
                        autocomplete="off"
                        required>
                     <div ng-show="formStep3.$submitted || formStep3.bank_routing_number.$touched">
                        <span class="error" ng-show="formStep3.bank_routing_number.$error.required" ng-bind="'<?php  _e('Routing number is required.', 'streamline-core'); ?>'"></span>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <label class="font-13 font-weight-semi-bold text-black"><?php  _e('Account Holder Name', 'streamline-core'); ?>: </label>
                     <input type="text" maxlength="100" name="bank_account_holder_name"
                        class="form-control"
                        placeholder="<?php _e('Bank Account Holder Name',  'streamline-core'); ?>"
                        ng-model="checkout.bank_account_holder_name"
                        autocomplete="off"
                        required>
                     <div ng-show="formStep3.$submitted || formStep3.bank_account_holder_name.$touched">
                        <span class="error" ng-show="formStep3.bank_account_holder_name.$error.required" ng-bind="'<?php _e('Account Holder Name is required.',  'streamline-core'); ?>'"></span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="form-group" ng-if="!pbgEnabled" ng-init="checkout.card_type = ''">
               <div class="row">
                  <div class="col-sm-12">
                  </div>
               </div>
            </div>
            <?php  if  ($has_coupon || $notes_enabled):  ?>
            <div class="form-group">
               <div class="row">
                  <?php if($has_coupon): ?>
                  <div class="col-md-6" ng-if="!reservationDetails.coupon_discount > 0">
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="<?php _e('Enter Promo Code',  'streamline-core'); ?>" ng-model="checkout.promo_code" />
                        <span class="input-group-btn">
                        <button class="btn btn-primary" type="button" ng-click="getPreReservation()">
                        <i class="glyphicon glyphicon-ok"></i>
                        <?php  _e('Redeem',  'streamline-core'); ?>
                        </button>
                        </span>
                     </div>
                  </div>
                  <?php endif; ?>
                  <?php if($notes_enabled): ?>
                  <div class="col-md-6">
                     <textarea name="notes" ng-model="checkout.notes" class="form-control" placeholder="<?php _e('Booking Comments','streamline-core') ?>"></textarea>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
            <?php  endif;  ?>
            <p class="font-14 font-Nunito">When you click "Complete My Booking" your rental agreement will be emailed to you to sign electronically and return to us within 24 hours. One of our agents will follow up with you to finalize your reservation and confirm the your credit card information before processing your initial payment.</p>
            <div class="modal-body" style="overflow-y: scroll;max-height: 200px;">
               <div class="font-14 font-Nunito">
                  <p style="color:Black;"><?php echo get_post_field('post_content', 516);?></p>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-10">
                     <div class="checkbox d-flex w-100 mt-4">
                      <div class="check">
                        <input type="checkbox" name="terms" ng-model="termsConditions" ng-true-value="1" check-required />
                     </div>
                     <div class="text">
                        <label class="font-13 font-weight-light-bold text-black ml-2" for="terms"><?php printf(__('I agree to the %s Terms &amp; Conditions %s and %s Privacy Policy %s', 'streamline-core'), '<a href="#" data-toggle="modal" data-target="#TermsModal">',  '</a>', '<a href="#" data-toggle="modal" data-target="#modalPrivacy">', '</a>');  ?>
                        </label>
                     </div>
                     </div>
                     <?php if($options['enable_gdpr'] == 1): ?>
                     <div class="checkbox">
                        <label class="font-13 font-weight-semi-bold text-black" for="newsletter">
                        <input type="checkbox" id="newsletter" name="newsletter" ng-model="newsletter" ng-true-value="1" />
                        <?php printf(__('I agree to receive promotions, newsletters and marketing materials', 'streamline-core'));  ?>
                        </label>
                     </div>
                     <?php endif; ?>
                     <div ng-show="formStep3.$submitted || formStep3.termsConditions.$touched">
                        <span id="termerr" class="error" ng-show="!formStep3.terms.$valid" ng-bind="'<?php _e('You have not read the terms and conditions',  'streamline-core'); ?>'"></span>                                 
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal fade" id="TermsModal" ng-init="getTermsAndConditions()">
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
            </div>
            <!-- /.modal -->
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
            </div>
            <!-- /.modal -->
            <div class="alert alert-{[alert.type]} animate" ng-repeat="alert in alerts">
               <div ng-bind-html="alert.message | trustedHtml"></div>
            </div>
            <div class="form-group col-md-12 step_btn_area last-step-bottom">
               <div class="row">
                  <div class="col-12 px-0">
                     <button type="button" class="btn secondary_button inquiry padding0 theme-btn font-14 btn-block text-uppercase py-0 font-weight-light-bold btn-shadow   btn-h-custome goback"
                        ng-click="goToStepTwo()"
                        ng-if="reservationDetails.optional_fees.length > 0">
                     <i class="glyphicon glyphicon-arrow-left"></i> <?php  _e('Go Back', 'streamline-core')  ?>
                     </button>
                  </div>
                  <div class="col-12 px-0">
                     <button id="btn-checkout" type="submit" ng-click="validateStep3(checkout)" class="complete_book btn btn-h-custome btn-warning  mt-3 font-14 btn-block text-uppercase py-0 btn-shadow  btn-h-custome ">
                     <?php _e('COMPLETE MY BOOKING', 'streamline-core'); ?>
                     </button>
                  </div>
               </div>
               <div class="row font-Nunito font-14 mt-3">
                  <p class="mb-0">If you have questions and prefer to speak with an agent before booking the reservation, please click here:</p>        
                  <a class="inquiry" ref="#" data-toggle="modal" data-target="#myModal2">Request More Information</a>
                  <a class="inquiry" ref="#" data-toggle="modal" data-target="#myModal2" href="tel:1-800-237-7975">&nbsp; or call us 1-800-237-7975 </a>
                  <!-- <h6 class="my-4 text-white font-14 thanks-message">
                         Thank you for choosing Blue Ridge Mountain Rentals! 
                  </h6> -->
               </div>
            </div>
         </div>
      </div>
   </form>
</div>
