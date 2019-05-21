 <form action="#" method="post" name="resortpro_form_checkout">
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
	  <div class="col-md-6">
	    <div class="form-group">
	      <label><?php echo _e($arrive_label ,'streamline-core') ?></label>
	       <input type="text" ng-model="book.checkin" id="book_start_date" name="book_start_date" class="form-control" show-days="renderCalendarNew(date, true, 'checkin')" update-price="getPreReservationPrice2(book,1)" update-checkout="setCheckoutDate(date)" bookcheckin readonly="readonly" placeholder="Check-in" data-min-stay="<?php echo $min_stay ?>" data-checkin-days="<?php echo $checkin_days ?>" />
	             <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
	    </div>
	  </div>
	  <div class="col-md-6">
	    <div class="form-group">
	      <label><?php echo _e($depart_label ,'streamline-core') ?></label>
	      <input type="text" ng-model="book.checkout" id="book_end_date" name="book_end_date" class="form-control" placeholder="Check-out" show-days="renderCalendarNew(date, true, 'checkout');" update-price="getPreReservationPrice2(book,1);" bookcheckout readonly="readonly" />
	             <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
	    </div>
	  </div>
	  <div class="col-md-6">
	    <div class="form-group" ng-init="book.occupants='<?php echo $occupants; ?>'">
	      <label for="book_occupants"><?php echo _e('Number of Guests' ,'streamline-core') ?></label>
	      <select
	        id="select_adults"
	        ng-model="book.occupants"
	        ng-change="getPreReservationPrice(book,1);"
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

	  		<?php if ($max_pets == 0): ?>
			<div class="col-md-6">
				<div class="form-group no-pet-message">
					<i class="fa fa-paw" aria-hidden="true"></i>  Not Pet Friendly
				
				</div>
			</div>
			<?php endif; ?>
			<div class="col-md-6 pets_container" style="display: block;">
				<?php if ($max_pets > 0): ?>

				      <div class="form-group" ng-init="book.pets='<?php echo $pets; ?>'">
				        <label for="pets"><?php echo _e($pets_label ,'streamline-core') ?></label>
				        <select
				          id="pets"
				          name="book_pets"
				          class="form-control"
				          ng-model="book.pets"
				          ng-change="getPreReservationPrice(book,1);">
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
	   <div class="col-md-12" ng-if="!reservationDetails.coupon_discount > 0">
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
	</div>

	<div class="error">
        <div class="adult_error" style="display:none"><?php _e('Please select number of Adults', 'streamline-core') ?></div>
        <div class="date_error" style="display:none"><?php _e('Please select your Date Arrival', 'streamline-core') ?></div>
        <div class="book_now_restrictions alert alert-danger" style="display:none"></div>
    </div>

	<div class="form-group">
	  <?php if(!(is_numeric($property['online_bookings']) && $property['online_bookings'] == 0)): ?>
	    <a  ng-click="goToStepTwoA()" ng-disabled="isDisabled" class="btn primary-button btn-lg btn-block" id="btn-step1">
	     <!--  <i class="glyphicon glyphicon-check"></i> --> <?php _e( 'Book Your Vacation', 'streamline-core' ) ?>
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

	  <button type="button" href="#" ng-click="requestMoreInfo()" class="btn btn-lg btn-block secondary_button propertyButtons inquiry">
	   <!--  <i class="glyphicon glyphicon-comment"></i> --> <?php _e( 'Request More Info', 'streamline-core' ) ?>
	  </button>
	</div>
</form>
<!-- <div class="view_breakdown_days" ng-if="reservationDetails.total > 0" ng-cloak>
	<table  class="table table-bordered table-striped table-hover table-condensed">
	    <tbody>
	    <tr>
	      <td>
	        <strong><?php	_e('View Breakdown',	'streamline-core');	?> </strong>
	        <a ng-show="!reservationDetails.reservation_days.date"
	           class="btn-price-breakdown subtotal_expand">
	          <i class="fa fa-plus"></i>
	        </a> 
	      </td>
	      <td ng-if="!reservationDetails.extra > 0" class="text-right"><span ng-bind="subTotal | currency"></span></td>
	    </tr>
	   

	    <tr ng-repeat="res in reservationDetails.reservation_days" class="breakdown-days-hidden" data-visible="false">
	      <td style="text-indent: 24px"><span ng-bind="res.date"></span></td>
	      <td class="text-right"><span ng-bind="calculateMarkup((res.price + res.extra).toString()) | currency"></span></td>
	    </tr>
	    
	    </tbody>
	  </table>	


</div> -->
<div class="col-xs-12 card_rating_area">
	<div class="cards_area pull-right" style=" margin-bottom: 5px;">
		<span>
			<img src="<?php echo site_url(); ?>/wp-content/uploads/2017/01/cards.png" width=170 alt="title">
		</span>
	</div>

	<div class="unit-rating" style="">
		<?php if ($property['rating_average'] > 0): ?>
			<div class="star-rating" scroll-to="reviews-title"  style="cursor:pointer">
				<div style="display: inline-block" class="star-rating" star-rating rating-value=" <?php echo $property['rating_average'] ?>" data-max="5">
				</div>
				<span style="display:inline-block; line-height: 31px; vertical-align: top">
						<?php $reviews_txt = ($property['rating_count'] > 1) ? ' reviews' : ' review'; ?>  (
									
						<?php echo $property['rating_count'] ?>
						<?php echo $reviews_txt ?> )    
								
				</span>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php do_action('streamline-insert-share', $property['seo_page_name'], $property['id'], $start_date, $end_date, $occupants, $occupants_small, $pets ); ?>



