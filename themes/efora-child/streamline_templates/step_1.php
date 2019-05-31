<form action="#" method="post" class="test" name="resortpro_form_checkout">
   <input type="hidden" name="resortpro_book_unit" value="<?php echo $nonce; ?>"/>
   <input type="hidden" name="book_unit" value="<?php echo $property['id'] ?>"/>
   <?php if(!empty($hash)): ?>
   <input type="hidden" name="hash" value="<?php echo $hash; ?>" />
   <?php endif; ?>
   <div>
      <div class="alert alert-{[alert.type]} animate alert-dismissible" role="alert" ng-repeat="alert in alerts" ng-cloak>
         <button type="button" class="close" data-dismiss="alert" aria-label="<?php _e( 'Close', 'streamline-core' ) ?>"><span
            aria-hidden="true">&times;</span></button>
         <div ng-bind-html="alert.message | trustedHtml"></div>
      </div>
   </div>
   <div class="row">
       <div class="col-md-12">
         <div class="form-group mb-0">
               <label class="font-13 font-weight-semi-bold text-black">Dates</label>
         </div>
      </div>
      <div class="col-md-6 pr-md-2">
         <div class="form-group mb-2 pb-1 ">
            <label class="d-none"><?php echo _e($arrive_label ,'streamline-core') ?></label>
            <div class=" input-calender-icon position-relative">
            <input type="hidden" class="datepicker" data-checkin-days="<?php echo $checkin_days ?>"/> 
            <input type="text" ng-model="book.checkin" id="book_start_date" name="book_start_date" class="form-control rouned" show-days="renderCalendarNew(date, true, 'checkin')" update-price="getPreReservationPrice2(book,1)" update-checkout="setCheckoutDate(date)" bookcheckin readonly="readonly" placeholder="Check In*" data-min-stay="<?php echo $min_stay ?>" data-checkin-days="<?php echo $checkin_days ?>" />
            </div>
            <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
         </div>
      </div>
      <div class="col-md-6 pl-md-2">
         <div class="form-group mb-2 pb-1 pt-2 pt-sm-0">
            <label class="d-none"><?php echo _e($depart_label ,'streamline-core') ?></label>
            <div class=" input-calender-icon position-relative">
            <input type="text" ng-model="book.checkout" id="book_end_date" name="book_end_date" class="form-control rouned" placeholder="Check Out*" show-days="renderCalendarNew(date, true, 'checkout');" update-price="getPreReservationPrice2(book,1);" bookcheckout readonly="readonly" />
            </div>
            <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
         </div>
      </div>
            <div class="col-md-6 pr-md-2">
         <div class="form-group mb-2 pb-1" ng-init="book.occupants='<?php echo $occupants; ?>'">
            <label for="book_occupants" class="font-13 font-weight-semi-bold text-black"><?php echo _e('Number of Adults' ,'streamline-core') ?></label>
            
            <select
               id="select_adults"
               ng-model="book.occupants"
               ng-change="getPreReservationPrice2(book,1);"
               name="book_occupants"
               class="form-control">
            <?php
               for ($i = 1; $i <= $max_adults; $i++) {
                 echo "<option value=\"{$i}\">{$i}</option>";
               }
               ?>
            </select>
         </div>
      </div>
      <?php if ($max_children > 0): ?>
       <div class="col-md-6">
         <div class="form-group">
           <label class="font-13 font-weight-semi-bold text-black" for="book_occupants_small"><?php _e( 'Number of Children', 'streamline-core' ) ?></label>
             <select name="book_occupants_small" class="form-control" ng-model="book.occupants_small" ng-change="getPreReservationPrice2(book,1);">
               <option value=""><?php _e( 'Select ' . $children_label, 'streamline-core' ) ?></option> 
               <?php for ($i = 0; $i <= $max_children; $i++): ?>          
               <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
               <?php endfor; ?>
             </select>
           <!-- /.c-select-list -->
         </div>
       </div>
      <?php endif; ?>
      <?php if ($max_pets == 0): ?>
      <div class="col-md-6" ng-init="book.pets='<?php echo $max_pets; ?>'">
         <label class="w-100 d-inline-block">&nbsp;</label>
         <div class="form-group mb-2 pb-1 no-pet-message">
            <i class="fa fa-paw" aria-hidden="true"></i>  Not Pet Friendly
         </div>
      </div>
      <?php endif; ?>
      <div class="col-md-6 pets_container" style="display: block;" >
         <?php if ($max_pets > 0): ?>
         <div class="form-group mb-2 pb-1" ng-init="book.pets='<?php echo $pets; ?>'">
            <label for="pets" class="font-13 font-weight-semi-bold text-black"><?php echo _e($pets_label ,'streamline-core') ?></label>
               <select
                  id="pets"
                  name="book_pets"
                  class="form-control"
                  ng-model="book.pets"
                  ng-change="getPreReservationPrice2(book,1);">
               <?php
                  for ($i = 0; $i <= $max_pets; $i++) {
                    echo "<option value=\"{$i}\">{$i}</option>";
                  }
                  ?>
               </select>
         </div>
         <?php endif; ?>
      </div>
      <?php if($use_promo): ?>
      <div class="col-md-12 coupon_code" ng-if="!reservationDetails.coupon_discount > 0">
         <div class="input-group redeem-promo-code">
            <input ng-change="checkCode()" type="text" class="form-control" placeholder="<?php	_e('Enter Promo Code',	'streamline-core');	?>" ng-model="checkout.promo_code" />
            <span class="input-group-btn">
            <button ng-disabled="isCodeDisabled" class="btn btn-primary" type="button" ng-click="redeemCode()">
            <i class="glyphicon glyphicon-ok"></i>
            <?php	_e('Redeem',	'streamline-core');	?>
            </button>
            </span>
         </div>
      </div>
      <?php endif; ?>
   </div>
   <div ng-if="reservationDetails.total > 0 && alerts.length==0" class="price_sticky price_table" <?php echo $sticky_spacing ?> ng-cloak>
      <table  class="table table-bordered table-striped table-hover table-condensed">
         <tbody>
            <tr>
               <td>
                  <i class="fa fa-moon-o" aria-hidden="true"></i>{[reservationDetails.reservation_days[0].price | currency:undefined:0 ]} x {[reservationDetails.reservation_days.length ]} Nights
               </td>
               <!-- 						      <td>
                  <strong><?php	_e('Subtotal',	'streamline-core');	?> </strong>
                  </td> -->
               <td ng-if="!reservationDetails.extra > 0" class="text-right"><span ng-bind="subTotal | currency"></span></td>
            </tr>
            <tr id="discount_text" ng-if="reservationDetails.coupon_discount > 0">
               <td><span><i class="fa fa-tag" aria-hidden="true"></i><?php	_e('Discount Applied',	'streamline-core');	?>: </span></td>
               <td class="text-right" ng-bind="'-' + (reservationDetails.coupon_discount | currency)"></td>
            </tr>
            <tr>
               <td>
                  <strong><?php	_e('Taxes &amp; Fees',	'streamline-core');	?></strong>
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
                  <strong class="total_price"><?php	_e('Total Price',	'streamline-core');	?>:</strong>
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
                  <strong class="total_price_due"><?php	_e('Total Due Today',	'streamline-core');	?>:</strong>
                  </i>
               </td>
              
			   	<td ng-if="chkTravelInsuranceR.selectedOption == 1" class="text-right step_1_total_price_due" ng-bind="calculateMarkup((travelInsurance + subTotal / 2).toString()) | currency"></td>
		<td ng-if="chkTravelInsuranceR.selectedOption == 0" class="text-right step_1_total_price_due" ng-bind="calculateMarkup((subTotal / 2).toString()) | currency"></td>
            </tr>
            <tr>
               <td colspan="2">
                  <p class="rent_text"><?php	_e('50% of the rent will be due after signing the rental agreement for reservations made more than 15 days in advance.',	'streamline-core');	?></p>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
   <div class="error">
      <div class="adult_error" style="display:none"><?php _e('Please select number of Adults', 'streamline-core') ?></div>
      <div class="date_error" style="display:none"><?php _e('Please select your Date Arrival', 'streamline-core') ?></div>
      <div class="book_now_restrictions alert alert-danger" style="display:none"></div>
   </div>
   <div class="form-group bottom_btnn">
      <?php if(!(is_numeric($property['online_bookings']) && $property['online_bookings'] == 0)): ?>
         <a  ng-click="goToStepTwoA()" ng-disabled="isDisabled" class="btn btn-h-custome btn-primary  mt-3 font-14 btn-block text-uppercase py-0 btn-shadow continue text-white" id="btn-step1">
            <?php _e( 'Book Your Vacation', 'streamline-core' ) ?>
         </a>
      <?php endif; ?>
      <?php if($pbg_enabled): ?>
      <div class="row" style="margin-bottom: 16px">
         <div class="col-md-12">
            <p>
               <strong><?php _e('Or','streamline-core') ?> </strong><br />
               <?php _e('Pay only for your share','streamline-core') ?>
            </p>
            <div class="pbg_info"
               data-purchase-image-url="<?php echo $property['default_image_path']; ?>"
               data-purchase-start-date="{[book.checkin]}"
               data-purchase-end-date="{[book.checkout]}"
               data-adults="{[book.occupants]}"
               data-purchase-inventory-id="<?php echo $property['id'] ?>">
               <button type="button" ng-disabled="isDisabled" class="btn btn-block btn-lg btn-success"><?php _e('Split the cost','streamline-core') ?> <span style="font-size:0.8em" ng-if="total_reservation > 0" ng-bind="' - ' + ((total_reservation / book.occupants) | currency:undefined:0) + ' per guest'"></span> </button>
            </div>
         </div>
      </div>
      <?php endif; ?>
      <button type="button" href="#" ng-click="requestMoreInfo()" class="btn theme-btn mt-4 font-14 btn-block text-uppercase py-0 font-weight-light-bold btn-shadow  propertyButtons inquiry btn-h-custome ">
          <?php _e( 'Request More Info', 'streamline-core' ) ?>
      </button>
   </div>
</form>


<?php do_action('streamline-insert-share', $property['seo_page_name'], $property['id'], $start_date, $end_date, $occupants, $occupants_small, $pets ); ?>