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
<div class="panel-body d-inline-block w-100">
   <div class="row mx-0">
      <!-- <div class="col-md-12"> -->
      <div ng-show="hasTravelInsurance || hasCfar">
         <p><?php _e('Travel Insurance',  'streamline-core'); ?>:
            (<?php  _e('Please make a selection below', 'streamline-core'); ?>)
         </p>
         <div ng-show="hasTravelInsurance" class="d-flex font-14 font-Nunito">
            <div class="check">
              <input type="checkbox"
               ng-model="chkTravelInsurance"
               ng-click="acceptTravelInsurance()" />
            </div>
               <div class="text ml-2">
                  <p> <?php printf('<span style="color:green">%s</span> %s',  __('PROTECT', 'streamline-core'), __('my travel investment with Travel Insurance for <strong>{[travelInsurance | currency]}</strong>. Coverage protects my vacation investment up to 100% for covered reasons like illness, injury, natural disasters, travel delays and more.',  'streamline-core'));  ?>
                </p>
         </div>
         </div>
         <div ng-show="hasCfar" class="d-flex font-14 font-Nunito">
          <div class="check">
            <input type="checkbox"
               ng-model="chkCfar"
               ng-click="acceptCfar()" />
          </div>
          <div class="ml-2">
            <p>
            <?php printf('<span style="color:green">%s</span> %s',  __('PROTECT', 'streamline-core'), __('my travel investment with Cancel For Any Reason Travel Protection for <strong>{[cfar | currency]}</strong>. Coverage protects my vacation investment up to 100% for covered reasons like illness, natural disasters, travel delays and more. I can also cancel for a reason not listed in the policy and be eligible for a 75% reimbursement (this benefit must be used 3 days or more before check-in).',  'streamline-core'));  ?>
            </p>
         </div>
         </div>
         <div class="d-flex font-14 font-Nunito align-items-start">
           <div class="check">
            <input type="checkbox"
               ng-model="chkTravelInsuranceNo"
               ng-click="rejectTravelInsurance()"/>
            </div>
            <div class="ml-2">
            <p>
            <?php printf('<span style="color:red">%s</span> %s',  __('DECLINE', 'streamline-core'), __('travel protection and risk losing or forfeiting all or part of my paid and future investment against this reservation.',  'streamline-core'));  ?>
            </p>
         </div>
         </div>
         <p ng-show="protectionError">
            <span ng-if="!(chkTravelInsurance || chkCfar || chkTravelInsuranceNo)" class="error" ng-bind="'<?php  _e('You must make a selection for travel insurance',  'streamline-core'); ?>'"></span>
         </p>
         <hr/>
      </div>
      <div ng-show="hasDamageProtection">
         <p>
            <?php _e('Damage Protection', 'streamline-core'); ?>:
            <strong ng-bind="damageProtection | currency"></strong>
            (<?php  _e('Please make a selection below', 'streamline-core'); ?>)
         </p>
         <div class="d-flex font-14 font-Nunito align-items-start">
           <div class="check">
            <input type="checkbox"
               ng-model="chkDamageWaiver"
               ng-click="acceptDamageWaiver()"/>
            </div>
            <div class="ml-2">
               <p>
               <?php printf('<span style="color:green">%s</span> %s',  __('PROTECT', 'streamline-core'), __('my rental with accidental Rental Damage Protection. Coverage includes any accidental damage to the property and it&rsquo;s contents for the duration of the rental period subject to the policy terms and conditions of rental.', 'streamline-core'));  ?>
               </p>
            </div>
         </div>
         <div class="d-flex font-14 font-Nunito align-items-start">
           <div class="check">
            <input type="checkbox"
               ng-click="rejectDamageWaiver()"
               ng-model="chkDamageWaiverNo"/>
            I
            </div>
            <div class="ml-2">
               <p>
            <?php printf('<span style="color:red">%s</span> %s %s', __('DECLINE', 'streamline-core'), __('and will pay the security deposit of {[securityDeposit | currency]}', 'streamline-core'), __('and accept the risk of being responsible for any damage that may exceed my security deposit amount.', 'streamline-core'));  ?>
            </p>
            </div>
         </div>
         <p ng-show="protectionError">
            <span ng-if="!(chkDamageWaiver || chkDamageWaiverNo)" class="error" ng-bind="'<?php _e('You must make a selection for damage protection', 'streamline-core'); ?>'"></span>
         </p>
      </div>
      <div class="form-group col-md-12 step_btn_area step-second-bottom">
         <div class="row">
            <div class="col-md-6 col-sm-4 col-xs-6 pl-0 pr-md-2 pr-0">
               <button type="button" class="btn btn-h-custome btn-block btn-h-custome  theme-btn  mt-3 font-14  text-uppercase py-0 btn-shadow inquiry padding0 goback" ng-click="goToStepOne()">
               <i class="glyphicon glyphicon-arrow-left"></i> <?php _e('Go Back', 'streamline-core')  ?>
               </button>
            </div>
            <div class="col-md-6 col-sm-8 col-xs-6 pr-0 pl-md-2 continue pl-0">
               <button id="btn-step3" type="button" class="btn primary-button   btn-warning mt-3 font-14 btn-h-custome btn-block  text-uppercase py-0 font-weight-light-bold btn-shadow " ng-click="goToStep3()">
               <?php  _e('Continue',  'streamline-core')  ?> <i class="glyphicon glyphicon-arrow-right"></i>
               </button>
            </div>
         </div>
      </div>
      <!-- </div> -->
   </div>
</div>