<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all resortpro listings by default.
 * You can override this template by creating your own "my_theme/template/page-resortpro-listings.php" file
 *
 * @package    ResortPro
 * @since      v1.0
 */
?>
	<?php if(isset($reservation_info['confirmation_id'])): ?>
	<?php if($reservation_info['price_balance'] > 0): ?>
	<div id="payment-wrapper">
		<div id="addPaymentForm" ng-controller="CheckoutController as cCtrl" class="form-checkout">
			<form name="formStep3" id="step3b" class="css-form" novalidate ng-init="checkout.confirmation_id='<?php echo $reservation_info['confirmation_id']; ?>'; checkout.price_balance='<?php echo $reservation_info['price_balance']; ?>'; unit='<?php echo $reservation_info['unit_id']; ?>'">
				<input type="hidden" name="confirmation_id" ng-model="checkout.confirmation_id" value="" />
				<input type="hidden" name="price_balance" ng-model="checkout.price_balance" value="" />
				<div class="add-payment-top">
					<div class="well sticky" data-top-spacing="0" data-bottom-spacing="0">

						<div class="row add-payment-reservation">
							<div class="col-md-12 text-center">
								<h3 class="text-primary">
									<?php _e('Reservation Details', 'streamline-core'); ?>
								</h3>
								<p>
									<strong>
										<?php _e('Confirmation #', 'streamline-core'); ?>
									</strong>:
									<span class="text-primary">
										<?php echo $reservation_info['confirmation_id'] ?>
									</span>
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<strong>
										<i class="fa fa-user"></i>
										<?php _e('Name', 'streamline-core'); ?>:</strong>
									<span class="text-primary">
										<?php echo "{$reservation_info['first_name']} {$reservation_info['last_name']}" ?>
									</span>
								</div>
								<div class="form-group">
									<strong>
										<i class="fa fa-calendar"></i>
										<?php _e('Travel Dates', 'streamline-core'); ?>:</strong>
									<span class="text-primary">
										<?php echo "{$reservation_price['startdate']} - {$reservation_price['enddate']}" ?>
									</span>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<strong>
										<i class="fa fa-home"></i>
										<?php _e('Unit', 'streamline-core'); ?>:</strong>
									<span class="text-primary">
										<?php echo $reservation_info['location_name'] ?>
									</span>
								</div>
								<div class="form-group">
									<strong>
										<i class="fa fa-usd"></i>
										<?php _e('Due today', 'streamline-core'); ?>:</strong>
									<span class="text-primary">
										<?php echo number_format($reservation_price['due_today'], 2, '.', ','); ?>
									</span>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<strong>
										<i class="fa fa-users"></i>
										<?php _e('Guests', 'streamline-core'); ?>:</strong>
									<span class="text-primary">
										<?php echo $reservation_price['occupants'] + $reservation_price['occupants_small'] ?>
									</span>
								</div>
								<div class="form-group">
									<strong>
										<i class="fa fa-moon-o"></i>
										<?php _e('Total nights', 'streamline-core'); ?>:</strong>
									<span class="text-primary">
										<?php echo count($reservation_price['reservation_days']) ?>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="add-payment-body form-checkout">
					<div class="row">
						<div class="col-md-4 col-md-push-8">
							<div class="resortpro-reservation-details">
								<div class="details table-responsive">
									<table class="table table-hover table-condensed">
										<thead>
											<tr>
												<th colspan="2">
													<?php	_e('Reservation Info',	'streamline-core');	?>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<?php	_e('Price',	'streamline-core');	?>												
													<a href="#" class="btn-price-breakdown">
														<i class="glyphicon glyphicon-menu-down"></i>													
													</a>
												</td>
												<td class="text-right">
													<span>$<?php echo number_format($reservation_price['price'],2); ?></span>
												</td>
											</tr>
											<?php foreach($reservation_price['reservation_days'] as $res_days): ?>
											<tr class="breakdown-days-hidden" data-visible="false">
												<td class="fee_name">
													<?php echo $res_days['date']; ?>												
												</td>
												<td class="text-right">
													<span>$<?php echo number_format($res_days['price'],2); ?></span>
												</td>
											</tr>
											<?php endforeach; ?>
											<tr>
												<td>
													<?php	_e('Taxes',	'streamline-core');	?>												
													<a href="#" class="btn-taxes-breakdown">
														<i class="glyphicon glyphicon-menu-down"></i>													
													</a>
												</td>
												<td class="text-right">
													<span>$<?php echo number_format($total_taxes,2); ?></span>
												</td>
											</tr>
											<?php foreach($reservation_price['taxes_details'] as $tax_detail): ?>
											<tr class="breakdown-taxes-hidden" data-visible="false">
												<td class="fee_name">
													<?php echo $tax_detail['name']; ?>												
												</td>
												<td class="text-right">
													<span>$<?php echo number_format($tax_detail['value'],2); ?></span>
												</td>
											</tr>
											<?php endforeach; ?>
											<tr>
												<td>
													<?php	_e('Fees',	'streamline-core');	?>												
													<a href="#" class="btn-fees-breakdown">
														<i class="glyphicon glyphicon-menu-down"></i>													
													</a>
												</td>
												<td class="text-right">
													<span>$<?php echo number_format($taxes_fees,2); ?></span>
												</td>
											</tr>
											<?php foreach($reservation_price['required_fees'] as $req_fee): ?>
											<tr class="breakdown-fees-hidden" data-visible="false">
												<td class="fee_name">												
													<?php echo $req_fee['name']; ?>												
												</td>
												<td class="text-right">
													<span>$<?php echo number_format($req_fee['value'],2); ?></span>
												</td>
											</tr>
											<?php endforeach; ?>
											<?php foreach($reservation_price['optional_fees'] as $opt_fee): ?>
											<?php if($opt_fee['active'] == '1'): ?>
											<tr class="breakdown-fees-hidden" data-visible="false">
												<td class="fee_name">												
													<?php echo $opt_fee['name']; ?>												
												</td>
												<td class="text-right">
													<span>$<?php echo number_format($opt_fee['value'],2); ?></span>
												</td>
											</tr>
											<?php endif; ?>
											<?php endforeach; ?>
											<?php if($reservation_price['coupon_discount'] > 0): ?>
											<tr>
												<td>												
													<?php	_e('Discount',	'streamline-core');	?>:
												</td>
												<td class="text-right">
													<span>($<?php echo number_format($reservation_price['coupon_discount'], 2); ?>)</span>
												</td>
											</tr>
											<?php endif; ?>
											<tr>
												<td>												
													<?php	_e('Total',	'streamline-core');	?>:
												</td>
												<td class="text-right">
													<span>$<?php echo number_format($reservation_price['total'],2); ?></span>
												</td>
											</tr>
											<tr>
												<td>												
													<?php	_e('Due Today',	'streamline-core');	?>:
												</td>
												<td class="text-right">
													<span>$<?php echo number_format($reservation_price['due_today'],2); ?></span>
												</td>
											</tr>
										</tbody>
									</table>
									<table ng-if="reservationDetails.security_deposits.security_deposit.length > 0 && chkDamageWaiverNo" class="table table-bordered table-striped table-hover table-condensed">
										<thead>
											<tr>
												<th colspan="2">
													<?php	_e('Security Deposits',	'streamline-core');	?>
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
									<table ng-if="reservationDetails.expected_charges.length > 0" class="table table-bordered table-striped table-hover table-condensed">
										<thead>
											<tr>
												<th colspan="3">
													<?php	_e('Expected Charges',	'streamline-core');	?>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th>
													<?php	_e('Date',	'streamline-core');	?>
												</th>
												<th>
													<?php	_e('Description',	'streamline-core');	?>
												</th>
												<th>
													<?php	_e('Charge',	'streamline-core');	?>
												</th>
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
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<input ng-model="checkout.fname" type="text" name="fname" class="form-control" placeholder="<?php	_e('First Name',	'streamline-core');	?>" required/>
										<div ng-show="formStep3.$submitted || formStep3.fname.$touched">
											<span class="error" ng-show="formStep3.fname.$error.required"><?php	_e('First name is required.',	'streamline-core');	?></span>
										</div>
									</div>
									<div class="col-sm-4">
										<input type="text" name="lname" class="form-control" ng-model="checkout.lname" placeholder="<?php	_e('Last Name',	'streamline-core');	?>"
											required />
										<div ng-show="formStep3.$submitted || formStep3.lname.$touched">
											<span class="error" ng-show="formStep3.lname.$error.required">
												<?php	_e('Last name is required.',	'streamline-core');	?>
											</span>
										</div>
									</div>
									<div class="col-sm-4">
										<input type="text" name="email" class="form-control" ng-model="checkout.email" placeholder="<?php	_e('Email',	'streamline-core');	?>"
											required />
										<div ng-show="formStep3.$submitted || formStep3.email.$touched">
											<span class="error" ng-show="formStep3.email.$error.required">
												<?php	_e('Email is required.',	'streamline-core');	?>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<input type="text" name="address" class="form-control" placeholder="<?php	_e('Address',	'streamline-core');	?>" ng-model="checkout.address"
											required/>
										<div ng-show="formStep3.$submitted || formStep3.address.$touched">
											<span class="error" ng-show="formStep3.address.$error.required">
												<?php	_e('Address is required.',	'streamline-core');	?>
											</span>
										</div>
									</div>
									<div class="col-sm-4">
										<input type="text" name="address2" class="form-control" ng-model="checkout.address2" placeholder="<?php	_e('Address 2 (optional)',	'streamline-core');	?>"
										/>
									</div>
									<div class="col-sm-4" ng-init="getCountries();">
										<select ng-init="checkout.country = 'US'" ng-model="checkout.country" ng-change="getStates()" name="country" id="country"
											size="1" class="form-control required" ng-options="country.name as country.description for country in countries">
											<option value="">Country</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-5">
										<input type="text" name="city" class="form-control" placeholder="<?php	_e('City',	'streamline-core');	?>" ng-model="checkout.city"
											required>
										<div ng-show="formStep3.$submitted || formStep3.city.$touched">
											<span class="error" ng-show="formStep3.city.$error.required" ng-bind="'<?php	_e('City is required.',	'streamline-core');	?>'"></span>
										</div>
									</div>
									<div class="col-sm-4" ng-init="getStates();">
										<input type="text" max-length="2" name="state" placeholder="<?php	_e('State',	'streamline-core');	?>" class="form-control"
											ng-if="!states.length" ng-model="checkout.state" required>

										<select name="state" class="form-control" ng-if="states.length" ng-model="checkout.state" required>
											<option value="">State</option>
											<option ng-repeat='state in states' value='{[state.name]}' ng-bind="state.description"></option>
										</select>
										<div ng-show="formStep3.$submitted || formStep3.state.$touched">
											<span class="error" ng-show="formStep3.state.$error.required" ng-bind="'<?php	_e('State is required.',	'streamline-core');	?>'"></span>
										</div>

									</div>
									<div class="col-sm-3">
										<input type="text" name="postal_code" class="form-control" placeholder="<?php	_e('Zip Code',	'streamline-core');	?>" ng-model="checkout.postal_code"
											required>
										<div ng-show="formStep3.$submitted || formStep3.postal_code.$touched">
											<span class="error" ng-show="formStep3.postal_code.$error.required" ng-bind="'<?php	_e('Postal Code is required.',	'streamline-core');	?>'"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group" ng-if="!pbgEnabled" ng-init="checkout.card_type = ''">
								<div class="row">
									<div class="col-sm-3">

										<select ng-model="checkout.card_type" name="card_type" class="form-control" required ng-init="checkout.card_type=''">
											<option value="">
												<?php	_e('Payment Type',	'streamline-core')	?>
											</option>
											<?php	if	((int)	$options['property_card_type_visa']	===	1)	:	?>
												<option value="1">
													<?php	_e('Visa',	'streamline-core');	?>
												</option>
												<?php	endif;	?>
													<?php	if	((int)	$options['property_card_type_master_card']	===	1)	:	?>
														<option value="2">
															<?php	_e('MasterCard',	'streamline-core');	?>
														</option>
														<?php	endif;	?>
															<?php	if	((int)	$options['property_card_type_amex']	===	1)	:	?>
																<option value="3">
																	<?php	_e('American Express',	'streamline-core');	?>
																</option>
																<?php	endif;	?>
																	<?php	if	((int)	$options['property_card_type_discover']	===	1)	:	?>
																		<option value="4">
																			<?php	_e('Discover',	'streamline-core');	?>
																		</option>
																		<?php	endif;	?>
																			<?php	if	((int)	$options['property_card_type_echeck']	===	1)	:	?>
																				<option value="5">
																					<?php	_e('E-check',	'streamline-core');	?>
																				</option>
																				<?php	endif;	?>
										</select>
										<div ng-show="formStep3.$submitted || formStep3.card_type.$touched">
											<span class="error" ng-show="formStep3.card_type.$error.required" ng-bind="'<?php	_e('Card Type is required.',	'streamline-core');	?>'"></span>
										</div>
									</div>

									<div class="col-sm-9">
										<div class="row" ng-if="checkout.card_type < 5">
											<div class="col-sm-5">
												<input type="text" class="form-control" name="card_number" ng-model="checkout.card_number" autocomplete="off" payments-validate="card"
													payments-format="card" payments-type-model="type" ng-class="myForm.number.$card.type" placeholder="<?php	_e('Card Number',	'streamline-core');	?>"
													required/>
												<div ng-show="formStep3.$submitted || formStep3.card_number.$touched">
													<span class="error" ng-show="formStep3.card_number.$error.required" ng-bind="'<?php	_e('Card Number is required.',	'streamline-core');	?>'"></span>
												</div>
											</div>
											<div class="col-sm-4">
												<input type="text" class="form-control" name="expiration_date" ng-model="checkout.expiration_date" class="form-control" payments-validate="expiry"
													payments-format="expiry" placeholder="Exp. date (mm/yy)" required />
												<div ng-show="formStep3.$submitted || formStep3.expiration_date.$touched">
													<span class="error" ng-show="formStep3.expiration_date.$error.required" ng-bind="'<?php	_e('Expiration date is required.',	'streamline-core');	?>'"></span>
												</div>
											</div>
											<div class="col-sm-3">
												<input type="text" name="card_cvv" placeholder="<?php	_e('CVV',	'streamline-core');	?>" class="form-control" ng-model="checkout.card_cvv"
													payments-validate="cvc" payments-format="cvc" payments-type-model="type" required />
												<div ng-show="formStep3.$submitted || formStep3.card_cvv.$touched">
													<span class="error" ng-show="formStep3.card_cvv.$error.required" ng-bind="'<?php	_e('CVV is required.',	'streamline-core');	?>'"></span>
												</div>
											</div>
										</div>
										<div class="row" ng-if="checkout.card_type == 5">
											<div class="col-sm-4">
												<input type="text" maxlength="16" name="bank_account_number" class="form-control" placeholder="<?php	_e('Bank Account Number',	'streamline-core');	?>"
													ng-model="checkout.bank_account_number" autocomplete="off" required>
												<div ng-show="formStep3.$submitted || formStep3.bank_account_number.$touched">
													<span class="error" ng-show="formStep3.bank_account_number.$error.required" ng-bind="'<?php	_e('Bank Account Number is required.',	'streamline-core');	?>'"></span>
												</div>
											</div>
											<div class="col-sm-4">
												<input type="text" maxlength="18" name="bank_routing_number" class="form-control" placeholder="<?php	_e('Bank Routing Number',	'streamline-core');	?>"
													ng-model="checkout.bank_routing_number" autocomplete="off" required>
												<div ng-show="formStep3.$submitted || formStep3.bank_routing_number.$touched">
													<span class="error" ng-show="formStep3.bank_routing_number.$error.required" ng-bind="'<?php	_e('Routing number is required.',	'streamline-core');	?>'"></span>
												</div>
											</div>
											<div class="col-sm-4">
												<input type="text" maxlength="100" name="bank_account_holder_name" class="form-control" placeholder="<?php	_e('Bank Account Holder Name',	'streamline-core');	?>"
													ng-model="checkout.bank_account_holder_name" autocomplete="off" required>
												<div ng-show="formStep3.$submitted || formStep3.bank_account_holder_name.$touched">
													<span class="error" ng-show="formStep3.bank_account_holder_name.$error.required" ng-bind="'<?php	_e('Account Holder Name is required.',	'streamline-core');	?>'"></span>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							<?php	if	($has_coupon):	?>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="<?php	_e('Enter Promo Code',	'streamline-core');	?>" ng-model="checkout.promo_code"
												/>
												<span class="input-group-btn">
													<button class="btn btn-primary" type="button" ng-click="getPreReservation()">
														<i class="glyphicon glyphicon-ok"></i>
														<?php	_e('Redeem',	'streamline-core');	?>
													</button>
												</span>
											</div>
										</div>
									</div>
								</div>
								<?php	endif;	?>
								<div class="form-group">
									<div class="input-group">
										<input type="number" name="payment_amount" class="form-control" placeholder="<?php	_e('Amount to pay',	'streamline-core');	?>" ng-model="checkout.payment_amount" required>
										<span class="input-group-btn">
											<button class="btn btn-success" id="btn-checkout" type="submit" ng-click="validatePaymentForm(checkout)">
												<i class="fa fa-usd"></i>
												<?php	_e('Make Payment',	'streamline-core');	?>
											</button>
										</span>
									</div>
									<div ng-show="formStep3.$submitted || formStep3.payment_amount.$touched">
										<span class="error" ng-show="formStep3.payment_amount.$error.required" ng-bind="'<?php	_e('Amount is required.',	'streamline-core');	?>'"></span>
									</div>
									<!-- /input-group -->
								</div>
								
									<div class="form-group" ng-init="getTermsAndConditions();">
										<div class="row">
											<div class="col-md-10">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="terms" ng-model="termsConditions" ng-true-value="1" check-required />
														<?php	printf(__('I agree to the %s Terms &amp; Conditions %s',	'streamline-core'),	'<a href="#" data-toggle="modal" data-target="#myModal">',	'</a>');	?>
													</label>
												</div>
												<div ng-show="formStep3.$submitted || formStep3.terms.$touched">
													<span class="error" ng-show="!formStep3.terms.$valid" ng-bind="'<?php	_e('You have not read the terms and conditions',	'streamline-core');	?>'"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="alert alert-{[alert.type]} animate" ng-repeat="alert in alerts">
										<div ng-bind-html="alert.message | trustedHtml"></div>
									</div>
									
						</div>
					</div>
				</div>
			</form>
			<div class="modal fade" id="myModal">
				<div class="modal-dialog">
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
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</div>
	</div>
	<!-- /#addPaymentForm -->
	<?php else: ?>
	<div class="alert alert-success">
		<p>This reservation has been fully paid.</p>
	</div>
	<?php endif; ?>
	<?php else: ?>
	<div class="alert alert-warning">
		<p>We are sorry but we couldn't find the reservation.</p>
	</div>
	<?php endif; ?>