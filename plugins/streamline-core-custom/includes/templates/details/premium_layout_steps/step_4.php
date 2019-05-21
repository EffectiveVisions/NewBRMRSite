<form name="formStep3" class="css-form" novalidate>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="row">
          <div class="col-md-12 container_input">
            <label><?php	_e('Address',	'streamline-core');	?>: </label>
            <?php if($options['enable_gdpr'] == 1 && !empty($options['gdpr_address'])):?>
            <a href="#" title="<?php echo $options['gdpr_address']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
            <?php endif; ?>
            <input type="text" name="address" class="form-control"
                   ng-model="checkout.address"
                   required/>
            <div ng-show="formStep3.$submitted || formStep3.address.$touched">
              <span class="error" ng-show="formStep3.address.$error.required"><?php	_e('Address is required.',	'streamline-core');	?></span>
            </div>
          </div>
          <div class="col-md-12 container_input">
            <label><?php	_e('Address',	'streamline-core');	?> 2: </label>
            <input type="text" name="address2" class="form-control"
                   ng-model="checkout.address2" placeholder="<?php	_e('Optional',	'streamline-core');	?>"/>
          </div>
          <div class="col-md-12 container_input">
            <label><?php _e('Country', 'streamline-core'); ?>: </label>
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
          <div class="col-sm-12">
            <label><?php	_e('City',	'streamline-core');	?>: </label>
            <input type="text" name="city" class="form-control"
                   ng-model="checkout.city"
                   required>
            <div ng-show="formStep3.$submitted || formStep3.city.$touched">
              <span class="error" ng-show="formStep3.city.$error.required" ng-bind="'<?php	_e('City is required.',	'streamline-core');	?>'"></span>
            </div>
          </div>

        </div>
        <div class="row">

          <div class="col-sm-12 container_input">
            <label><?php  _e('State', 'streamline-core'); ?>: </label>
            <?php if($options['enable_gdpr'] == 1 && !empty($options['gdpr_state'])):?>
            <a href="#" title="<?php echo $options['gdpr_state']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
            <?php endif; ?>
            <select name="state"
                    class="form-control"
                    ng-model="checkout.state" required>
              <option value="">Select state</option>
              <option ng-repeat='state in states' value='{[state.name]}' ng-bind="state.description"></option>
            </select>
            <div ng-show="formStep3.$submitted || formStep3.state.$touched">
              <span class="error" ng-show="formStep3.state.$error.required" ng-bind="'<?php _e('State is required.',  'streamline-core'); ?>'"></span>
            </div>
          </div>
          <div class="col-sm-12 container_input">
            <label><?php	_e('Postal Code',	'streamline-core');	?>: </label>
            <?php if($options['enable_gdpr'] == 1 && !empty($options['gdpr_postal_code'])):?>
            <a href="#" title="<?php echo $options['gdpr_postal_code']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
            <?php endif; ?>
            <input type="text" name="postal_code" class="form-control"
                   ng-model="checkout.postal_code" required>
            <div ng-show="formStep3.$submitted || formStep3.postal_code.$touched">
              <span class="error" ng-show="formStep3.postal_code.$error.required" ng-bind="'<?php	_e('Postal Code is required.',	'streamline-core');	?>'"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group" ng-if="!pbgEnabled" ng-init="checkout.card_type = ''">
        <div class="row">
        <div class="col-sm-12">
          <label><?php	_e('Payment Type:',	'streamline-core')	?> </label>
          <select name="card_type"
                  class="form-control"
                  ng-model="checkout.card_type"
                  required>
            <?php	if	((int)	$options['property_card_type_visa']	===	1)	:	?>
              <option value="1"><?php	_e('Visa',	'streamline-core');	?></option>
            <?php	endif;	?>
            <?php	if	((int)	$options['property_card_type_master_card']	===	1)	:	?>
              <option value="2"><?php	_e('MasterCard',	'streamline-core');	?></option>
            <?php	endif;	?>
            <?php	if	((int)	$options['property_card_type_amex']	===	1)	:	?>
              <option value="3"><?php	_e('American Express',	'streamline-core');	?></option>
            <?php	endif;	?>
            <?php	if	((int)	$options['property_card_type_discover']	===	1)	:	?>
              <option value="4"><?php	_e('Discover',	'streamline-core');	?></option>
            <?php	endif;	?>
            <?php	if	((int)	$options['property_card_type_echeck']	===	1)	:	?>
              <option value="5"><?php	_e('E-check',	'streamline-core');	?></option>
            <?php	endif;	?>
          </select>
          <div ng-show="formStep3.$submitted || formStep3.card_type.$touched">
            <span class="error" ng-show="formStep3.card_type.$error.required" ng-bind="'<?php	_e('Card Type is required.',	'streamline-core');	?>'"></span>
          </div>
        </div>
      </div>
        <div class="row" ng-if="checkout.card_type < 5">
        <div class="col-sm-12">
          <label><?php	_e('Card Number',	'streamline-core');	?>: </label>
          <input type="text" maxlength="16" name="card_number"
                 class="form-control"
                 placeholder="<?php	_e('No dashes or spaces',	'streamline-core');	?>"
                 ng-model="checkout.card_number"
                 autocomplete="off"
                 required>
          <div ng-show="formStep3.$submitted || formStep3.card_number.$touched">
            <span class="error" ng-show="formStep3.card_number.$error.required" ng-bind="'<?php	_e('Card Number is required.',	'streamline-core');	?>'"></span>
          </div>
        </div>
        <div class="col-sm-4">
          <label><?php	_e('Exp Month',	'streamline-core');	?>: </label>
          <select name="expire_month" class="form-control"
                  ng-model="checkout.expire_month"
                  required>
            <option value="01"><?php	_e('Jan',	'streamline-core');	?></option>
            <option value="02"><?php	_e('Feb',	'streamline-core');	?></option>
            <option value="03"><?php	_e('Mar',	'streamline-core');	?></option>
            <option value="04"><?php	_e('Apr',	'streamline-core');	?></option>
            <option value="05"><?php	_e('May',	'streamline-core');	?></option>
            <option value="06"><?php	_e('Jun',	'streamline-core');	?></option>
            <option value="07"><?php	_e('Jul',	'streamline-core');	?></option>
            <option value="08"><?php	_e('Aug',	'streamline-core');	?></option>
            <option value="09"><?php	_e('Sep',	'streamline-core');	?></option>
            <option value="10"><?php	_e('Oct',	'streamline-core');	?></option>
            <option value="11"><?php	_e('Nov',	'streamline-core');	?></option>
            <option value="12"><?php	_e('Dec',	'streamline-core');	?></option>
          </select>
          <div ng-show="formStep3.$submitted || formStep3.expire_month.$touched">
            <span class="error" ng-show="formStep3.expire_month.$error.required" ng-bind="'<?php	_e('Expiration month is required.',	'streamline-core');	?>'"></span>
          </div>
        </div>
        <div class="col-sm-4">
          <label><?php	_e('Exp Year',	'streamline-core');	?>: </label>
          <select name="expire_year" class="form-control"
                  ng-model="checkout.expire_year"
                  ng-options="year for year in years" required>
          </select>
          <div ng-show="formStep3.$submitted || formStep3.expire_year.$touched">
            <span class="error" ng-show="formStep3.expire_year.$error.required" ng-bind="'<?php	_e('Expiration year is required.',	'streamline-core');	?>'"></span>
          </div>
        </div>
        <div class="col-sm-4">
          <label><?php	_e('CVV',	'streamline-core');	?>: </label>
          <input type="text" maxlength="4" name="card_cvv"
                 class="form-control"
                 ng-model="checkout.card_cvv" required>
          <div ng-show="formStep3.$submitted || formStep3.card_cvv.$touched">
            <span class="error" ng-show="formStep3.card_cvv.$error.required" ng-bind="'<?php	_e('CVV is required.',	'streamline-core');	?>'"></span>
          </div>
        </div>
      </div>
        <div class="row" ng-if="checkout.card_type == 5">
        <div class="col-sm-12">
          <label><?php	_e('Bank Account Number',	'streamline-core');	?>: </label>
          <input type="text" maxlength="16" name="bank_account_number"
                 class="form-control"
                 placeholder="<?php	_e('Bank Account Number',	'streamline-core');	?>"
                 ng-model="checkout.bank_account_number"
                 autocomplete="off"
                 required>
          <div ng-show="formStep3.$submitted || formStep3.bank_account_number.$touched">
            <span class="error" ng-show="formStep3.bank_account_number.$error.required" ng-bind="'<?php	_e('Bank Account Number is required.',	'streamline-core');	?>'"></span>
          </div>
        </div>
        <div class="col-sm-12">
          <label><?php	_e('Bank Routing Number',	'streamline-core');	?>: </label>
          <input type="text" maxlength="18" name="bank_routing_number"
                 class="form-control"
                 placeholder="<?php	_e('Bank Routing Number',	'streamline-core');	?>"
                 ng-model="checkout.bank_routing_number"
                 autocomplete="off"
                 required>
          <div ng-show="formStep3.$submitted || formStep3.bank_routing_number.$touched">
            <span class="error" ng-show="formStep3.bank_routing_number.$error.required" ng-bind="'<?php	_e('Routing number is required.',	'streamline-core');	?>'"></span>
          </div>
        </div>
        <div class="col-sm-12">
          <label><?php	_e('Account Holder Name',	'streamline-core');	?>: </label>
          <input type="text" maxlength="100" name="bank_account_holder_name"
                 class="form-control"
                 placeholder="<?php	_e('Bank Account Holder Name',	'streamline-core');	?>"
                 ng-model="checkout.bank_account_holder_name"
                 autocomplete="off"
                 required>
          <div ng-show="formStep3.$submitted || formStep3.bank_account_holder_name.$touched">
            <span class="error" ng-show="formStep3.bank_account_holder_name.$error.required" ng-bind="'<?php	_e('Account Holder Name is required.',	'streamline-core');	?>'"></span>
          </div>
        </div>
      </div>
      </div>
      <div class="form-group">

      </div>
      <div class="form-group" ng-if="!pbgEnabled" ng-init="checkout.card_type = ''">
        <div class="row">


          <div class="col-sm-12">


          </div>

        </div>
      </div>
      <div class="ad_extras" ng-if="reservationDetails.optional_fees.length > 0">
                <span class="ch_info"><strong><?php _e('Additional Fees', 'streamline-core'); ?></span><span id="expand_extras">&nbsp;<i class="fa fa-plus"></i></strong></span><br>
                <table ng-if="reservationDetails.optional_fees.length > 0" class="table table-bordered table-striped table-hover table-condensed ad_extras_tx" style="display:none">
                    <tbody>
                          <tr ng-repeat="optFee in reservationDetails.optional_fees track by $index">

                            <td>
                                <div class="checkbox2">
                                    <strong><label ng-if="optFee.travel_insurance == 1">
                                        <input type="checkbox"
                                               ng-model="chkTravelInsuranceR.selectedOption"
                                               value="{[optFee.id]}"
                                               class="optional_fee"
                                               ng-change="toggleTravelInsurance(optFee.id)"
                                               ng-checked="optFee.active == 1"/>
                                        <span style="left: -2px;">&nbsp;</span>{[optFee.name ]}
                                    </label></strong>
                                    <strong><label ng-if="optFee.cfar == 1">
                                        <input type="checkbox"
                                               value="{[optFee.id]}"
                                               class="optional_fee"
                                               ng-model="chkCfarR.selectedOption"
                                               ng-change="toggleCfar(optFee.id)"
                                               ng-checked="optFee.active == 1"/>
                                        <span style="left: -2px;">&nbsp;</span>{[optFee.name ]}
                                    </label></strong>
                                    <strong><label ng-if="optFee.damage_waiver == 1">
                                        <input type="checkbox"
                                               value="{[optFee.id]}"
                                               class="optional_fee"
                                               ng-model="chkDamageWaiverR.selectedOption"
                                               ng-change="toggleDamageWaiver(optFee.id)"
                                               ng-checked="optFee.active == 1"/>
                                        <span style="left: -2px;">&nbsp;</span>{[optFee.name ]}
                                    </label></strong>
                                    <strong><label
                                        ng-if="optFee.damage_waiver == 0 && optFee.travel_insurance == 0 && optFee.cfar == 0">
                                        <input type="checkbox"
                                               id="optional-fee-{[optFee.id]}"
                                               class="optional_fee"
                                               value="{[optFee.id]}"
                                               ng-model="optionalFees[$index]"
                                               ng-click="getPreReservation()"
                                               ng-checked="optFee.active == 1"/>
                                        <span style="left: -2px;">&nbsp;</span>{[optFee.name ]}
                                    </label></strong>
                                </div>

                            </td>
                            <td class="text-right">
                                {[ optFee.value | currency ]}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

      <?php	if	($has_coupon || $notes_enabled):	?>
        <div class="form-group">
          <div class="row">
            <?php if($has_coupon): ?>
            <div class="col-md-6" ng-if="!reservationDetails.coupon_discount > 0">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="<?php	_e('Enter Promo Code',	'streamline-core');	?>" ng-model="checkout.promo_code" />
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button" ng-click="getPreReservation()">
                    <i class="glyphicon glyphicon-ok"></i>
                    <?php	_e('Redeem',	'streamline-core');	?>
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
      <?php	endif;	?>

      <div class="form-group">
        <div class="row">
          <div class="col-md-10">
            <div class="checkbox">
              <label for="terms">
                <input type="checkbox" name="terms" ng-model="termsConditions" ng-true-value="1" check-required />
                <?php printf(__('I agree to the %s Terms &amp; Conditions %s and %s Privacy Policy %s', 'streamline-core'), '<a href="#" data-toggle="modal" data-target="#TermsModal">',  '</a>', '<a href="#" data-toggle="modal" data-target="#modalPrivacy">', '</a>');  ?>
              </label>
            </div>
            <?php if($options['enable_gdpr'] == 1): ?>
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
              <div ng-bind-html="terms">
                
              </div>
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


      <div class="alert alert-{[alert.type]} animate" ng-repeat="alert in alerts">
        <div ng-bind-html="alert.message | trustedHtml"></div>
      </div>

      <div class="form-group col-md-12 step_btn_area">
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
              <button type="button" class="btn secondary_button"
                      ng-click="goToStepTwo()"
                      ng-if="reservationDetails.optional_fees.length > 0">
                <i class="glyphicon glyphicon-arrow-left"></i> <?php	_e('Go Back',	'streamline-core')	?>
              </button>
            </div>
           <!--  <button type="button" class="btn btn-default"
                    ng-click="goToStepOne()"
                    ng-if="!reservationDetails.optional_fees.length > 0">
              <i class="glyphicon glyphicon-arrow-left"></i> <?php	_e('Go Back',	'streamline-core')	?>
            </button> -->
            <div class="col-md-8 col-sm-8 col-xs-8">
              <button id="btn-checkout"
                      type="submit"
                      class="btn primary-button"
                      ng-if="!pbgEnabled"
                      ng-click="validateStep3(checkout)">
                <i class="glyphicon glyphicon-log-in"></i>
                <?php	_e('Complete my Booking',	'streamline-core');	?>
              </button>
            </div>
        </div>
      </div>
      <?php	do_action('streamline-insert-paybygroup',	$property_data['data']['default_image_path'],	$str_checkin,	$str_checkout,	$unit_id);	?>
      </div>
    </div>
  </div>
</form>
