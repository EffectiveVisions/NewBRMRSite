<?php $options = StreamlineCore_Settings::get_options(); ?>
<form action="<?php echo $checkout_url ?>" method="post" name="resortpro_form_checkout" id="resortpro_form_checkout" class="c-book-form <?php if(isset($options['unit_layout']) && $options['unit_layout'] == 5) {echo 'c-book-form--bordered';} ?>" novalidate>
  <input type="hidden" name="resortpro_book_unit" value="<?php echo $nonce; ?>"/>
  <input type="hidden" name="book_unit" value="<?php echo $property['id'] ?>"/>
  <?php if(!empty($hash)): ?>
    <input type="hidden" name="hash" value="<?php echo $hash; ?>" />
  <?php endif; ?>

  <div class="c-book-form__widget booknow-widget">
    <?php if(isset($options['unit_layout']) && $options['unit_layout'] == 5) : ?>
      <?php if($property['price_data']['daily']) : ?>
        <div class="c-book-form__widget-price" ng-if="!res == 1 && !total_reservation > 0" ng-cloak>
          <strong class="c-book-form__widget-total">$<?php echo number_format($property['price_data']['daily'], 0, '.', ','); ?></strong>
          <span class="c-book-form__widget-text"><?php _e('per night', 'streamline-core') ?></span>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <div class="c-book-form__widget-price price" ng-if="res == 1 && total_reservation > 0" ng-cloak>
      <strong class="c-book-form__widget-total total_text" ng-bind="total_reservation | currency:undefined:0"></strong>
      <span class="c-book-form__widget-text concluding_text"><?php _e( 'including taxes and fees', 'streamline-core' ) ?></span>
    </div>
    <div class="alert alert-{[alert.type]} animate alert-dismissible" role="alert" ng-repeat="alert in alerts track by $index">
      <button type="button" class="close" data-dismiss="alert" aria-label="<?php _e( 'Close', 'streamline-core' ) ?>"><span
      aria-hidden="true">&times;</span></button>
      <div ng-bind-html="alert.message | trustedHtml"></div>
    </div>
  </div>
  <!-- /.c-book-form__widget -->

  <div class="c-book-form__fields row">
    <div class="col-xs-6">
      <div class="form-group">
        <label><?php _e( $arrive_label, 'streamline-core' ) ?></label>
        <div class="c-input-group input-group">
          <input type="text" ng-model="book.checkin" id="book_start_date" name="book_start_date" class="form-control" show-days="renderCalendarNew(date, true, 'checkin')" update-price="getPreReservationPrice(book,1)" update-checkout="setCheckoutDate(date)" bookcheckin readonly="readonly" data-min-stay="<?php echo $min_stay ?>" data-checkin-days="<?php echo $checkin_days ?>" />
          <span class="c-input-group__btn input-group-btn">
            <a class="btn btn-default btn-calendar-in js-calendarBtn" href="#">
              <i class="glyphicon glyphicon-calendar"></i> 
            </a>
          </span>
        </div>
      </div>
    </div>
    <div class="col-xs-6">
      <div class="form-group">
        <label><?php _e( $depart_label, 'streamline-core' ) ?></label>    
        <div class="c-input-group input-group">
          <input type="text" ng-model="book.checkout" id="book_end_date" name="book_end_date" class="form-control" show-days="renderCalendarNew(date, true, 'checkout');" update-price="getPreReservationPrice(book,1);" bookcheckout readonly="readonly" />
          <span class="c-input-group__btn input-group-btn">
            <a class="btn btn-default btn-calendar-out js-calendarBtn" href="#">
              <i class="glyphicon glyphicon-calendar"></i> 
            </a>
          </span>
        </div>
      </div>
    </div>
    <div class="col-xs-6">
      <div class="form-group">
        <label for="book_occupants"><?php _e( $adults_label, 'streamline-core' ) ?></label>
        <div class="c-select-list form-control">
          <select ng-model="book.occupants" ng-change="getPreReservationPrice(book,1);" name="book_occupants" id="book_occupants">
            <option value=""><?php _e( 'Select ' . $adults_label, 'streamline-core' ) ?></option> 
            <?php for ($i = 1; $i <= $max_adults; $i++): ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>    
          </select>
        </div> 
        <!-- /.c-select-list --> 
      </div>
      <span class="text-danger" id="book_occupants_error" style="display:none; font-size: 0.8em;">
        <?php _e( $adults_label . ' field is required.', 'streamline-core' ) ?>
      </span>
    </div>
    <?php if ($max_children > 0): ?>
    <div class="col-xs-6">
      <div class="form-group">
        <label for="book_occupants_small"><?php _e( $children_label, 'streamline-core' ) ?></label>
        <div class="c-select-list form-control">
          <select name="book_occupants_small" ng-model="book.occupants_small" ng-change="getPreReservationPrice(book,1);">
            <option value=""><?php _e( 'Select ' . $children_label, 'streamline-core' ) ?></option> 
            <?php for ($i = 0; $i <= $max_children; $i++): ?>          
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
          </select>
        </div>
        <!-- /.c-select-list -->

      </div>
    </div>
    <?php endif; ?>
    <?php if ($max_pets > 0): 
      $class_pets = ($max_children == 0) ? 'col-md-6' : 'col-md-12';
      ?>
    <div class="<?php echo $class_pets; ?>">
      <div class="form-group">
        <label for="book_pets"><?php _e( $pets_label, 'streamline-core' ) ?></label>
        <div class="c-select-list form-control">
          <select
            name="book_pets"
            ng-model="book.pets"
            ng-change="getPreReservationPrice(book,1);">
            <option value=""><?php _e( 'Select ' . $pets_label, 'streamline-core' ) ?></option>
            <?php for ($i = 0; $i <= $max_pets; $i++): ?>          
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
          </select>
        </div>
        <!-- /.c-select-list -->
      </div>
    </div>
    <?php endif; ?>

    <?php if($use_promo): ?>
    <div class="col-md-12" ng-if="!coupon_discount > 0">
      <div class="form-group">
        <div class="input-group">
          <input type="text" name="book_coupon_code" class="form-control" placeholder="Enter Promo Code" ng-model="book.coupon_code" />
          <span class="input-group-btn"><a class="btn btn-primary" ng-click="getPreReservationPrice(book,1)"><i class="glyphicon glyphicon-ok"></i> 
            <?php _e( 'Redeem', 'streamline-core' ) ?></a>
          </span>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
  
  <table ng-show="res == 1 && total_reservation > 0"
    class="table table-stripped table-bordered table-condensed">
    <tr>
      <td><?php _e( 'Subtotal', 'streamline-core' ) ?>
        <a ng-show="!reservationDetails.reservation_days.date" href="#" class="btn btn-default btn-xs btn-price-breakdown pull-right">
          <i class="glyphicon glyphicon-menu-down"></i>
          <small><?php _e('View Details', 'streamline-core'); ?></small>
        </a>
      </td>
      <td class="text-right"><span ng-bind="subTotal | currency:undefined:2"></span></td>
    </tr>
    <tr ng-if="days" ng-repeat="day in reservation_days" class="breakdown-days-hidden" data-visible="false">
      <td><small class="indent" ng-bind="day.date"></small></td>
      <td class="text-right" ng-bind="calculateMarkup(day.price.toString()) | currency:undefined:2"></td>
    </tr>
    <tr ng-if="!days" class="breakdown-days-hidden" data-visible="false">
      <td><small class="indent" ng-bind="reservation_days.date"></small></td>
      <td class="text-right"><span ng-bind="subTotal | currency:undefined:2"></span></td>
    </tr>
    <tr ng-if="coupon_discount > 0">
      <td><?php _e( 'Discount', 'streamline-core' ) ?></td>
      <td class="text-right"><span ng-bind="'('+(coupon_discount | currency:undefined:2)+')'"></span></td>
    </tr>
    <tr>
      <td><?php _e( 'Taxes and fees', 'streamline-core' ) ?>
        <a href="#" class="btn btn-default btn-xs btn-taxes-breakdown pull-right">
          <i class="glyphicon glyphicon-menu-down"></i>
          <small><?php _e('View Details', 'streamline-core'); ?></small>
        </a>
      </td>
      <td class="text-right"><span ng-bind="taxes | currency:undefined:2"></span></td>
    </tr>
    <tr ng-if="!required_fees.value" ng-repeat="reqFee in required_fees" class="breakdown-taxes-hidden" data-visible="false">
      <td><small class="indent" ng-bind="reqFee.name"></small></td>
      <td class="text-right" ng-bind="reqFee.value | currency"></td>
    </tr>
    <tr ng-if="required_fees.value" class="breakdown-taxes-hidden" data-visible="false">
      <td><small class="indent" ng-bind="required_fees.name"></small></td>
      <td class="text-right" ng-bind="required_fees.value | currency"></td>
    </tr>    
    <tr ng-repeat="optFee in optional_fees" ng-if="!optional_fees.value && optFee.active == 1"  class="breakdown-taxes-hidden" data-visible="false">
      <td><small class="indent" ng-bind="optFee.name"></small></td>
      <td class="text-right" ng-bind="optFee.value | currency"></td>
    </tr>
    <tr ng-if="optional_fees.value && optional_fees.active == 1" class="breakdown-taxes-hidden" data-visible="false">
      <td><small class="indent" ng-bind="optional_fees.name"></small></td>
      <td class="text-right" ng-bind="optional_fees.value | currency"></td>
    </tr>
    <tr ng-if="!taxes_details.value" ng-repeat="reqFee in taxes_details" class="breakdown-taxes-hidden" data-visible="false">
      <td><small class="indent" ng-bind="reqFee.name"></small></td>
      <td class="text-right"  ng-bind="reqFee.value | currency"></td>
    </tr>
    <tr ng-if="taxes_details.value" class="breakdown-taxes-hidden" data-visible="false">
      <td><small class="indent" ng-bind="taxes_details.name"></small></td>
      <td class="text-right"  ng-bind="taxes_details.value | currency"></td>
    </tr>
    <tr style="border-top:solid 2px #333">
      <td><?php _e( 'Total', 'streamline-core' ) ?></td>
      <td class="text-right"  ng-bind="total_reservation | currency"></td>
    </tr>
  </table>
  <div class="form-group">
    
    <?php if(!(is_numeric($property['online_bookings']) && $property['online_bookings'] == 0)): ?>
      <?php if(isset($options['unit_layout']) && $options['unit_layout'] == 5) : ?>
        <button ng-disabled="isDisabled" id="resortpro_unit_submit" type="submit" class="c-book-form__submit-btn btn btn-lg btn-primary btn-block">
          <?php _e( 'Book Now', 'streamline-core' ) ?>
        </button>
      <?php else : ?>
        <button ng-disabled="isDisabled" id="resortpro_unit_submit" type="submit" class="c-book-form__submit-btn btn btn-lg btn-block btn-success">
        <i class="glyphicon glyphicon-check"></i> <?php _e( 'Book Now', 'streamline-core' ) ?>
      </button>
      <?php endif; ?>
    <?php endif; ?>
    
    <?php if($pbg_enabled): ?>
    <div class="row" style="margin-bottom: 16px">
      <div class="col-md-12">
        <p>
          <strong><?php _e( 'Or', 'streamline-core' ) ?> </strong><br />
          <?php _e( 'Pay only for your share', 'streamline-core' ) ?>
          
        </p>
        <div class="pbg_info"
          data-purchase-image-url="<?php echo $property['default_image_path']; ?>"
          data-purchase-start-date="{[book.checkin]}"
          data-purchase-end-date="{[book.checkout]}"
          data-adults="{[book.occupants]}"
          data-purchase-inventory-id="<?php echo $property['id'] ?>">
          <button type="button" ng-disabled="isDisabled" class="btn btn-block btn-lg btn-success"><?php _e( 'Split the cost', 'streamline-core' ) ?>  
            <span style="font-size:0.8em" ng-if="total_reservation > 0" ng-bind="' - ' + ((total_reservation / book.occupants) | currency:undefined:0) + ' per guest'"></span> 
          </button>
        </div>
      </div>
    </div>
    <?php endif; ?>
    
  </div>
</form>
<!-- /.c-book-form -->