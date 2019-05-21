<div class="panel panel-info">
    <div class="panel-heading">
        <h4 class="panel-title"><?php _e('Layout', 'streamline-core') ?></h4>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label for="checkout_layout"
                       class="col-sm-2 control-label"><?php _e('Checkout Layout', 'streamline-core') ?></label>

                <div class="col-sm-10">
                    <select name="<?php echo StreamlineCore_Settings::get_option_name() ?>[checkout_layout]"
                            class="form-control">
                        <option
                            value="1"<?php if (isset($option_arr['checkout_layout']) && $option_arr['checkout_layout'] == '1') : ?> selected="selected"<?php endif; ?>><?php _e('Default Layout', 'streamline-core') ?></option>
                       
                        <option
                            value="2"<?php if (isset($option_arr['checkout_layout']) && $option_arr['checkout_layout'] == '2') : ?> selected="selected"<?php endif; ?>><?php _e('Custom Layout', 'streamline-core') ?></option>
                        
                    </select>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <h4 class="panel-title"><?php _e( 'General Options', 'streamline-core' ) ?></h4>
  </div>
  <div class="panel-body">
    <div class="form-horizontal">
      <div class="form-group">
        <label for="checkout_title" class="col-sm-2 control-label"><?php _e( 'Checkout title', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[checkout_title]" class="form-control" value="<?php echo ( isset( $option_arr['checkout_title'] ) ? esc_attr( $option_arr['checkout_title'] ) : '' ) ?>" />
        </div>
      </div>
      <div class="form-group">
        <label for="checkout_description" class="col-sm-2 control-label"><?php _e( 'Checkout description', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <textarea name="<?php echo StreamlineCore_Settings::get_option_name() ?>[checkout_description]" class="form-control" rows="10"><?php echo ( isset( $option_arr['checkout_description'] ) ? $option_arr['checkout_description'] : '' ) ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="checkout_notes" class="col-sm-2 control-label"><?php _e( 'Enable checkout notes', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[checkout_notes]" class="form-control" value="1"<?php if ( isset( $option_arr['checkout_notes'] ) && (int)$option_arr['checkout_notes'] == 1 ) : ?> checked="checked"<?php endif; ?> />
        </div>
      </div>
      <div class="form-group">
        <label for="checkout_use_ssl" class="col-sm-2 control-label"><?php _e( 'Force SSL in checkout page', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[checkout_use_ssl]" class="form-control" value="1"<?php if ( isset( $option_arr['checkout_use_ssl'] ) && (int)$option_arr['checkout_use_ssl'] == 1 ) : ?> checked="checked"<?php endif; ?> />
        </div>
      </div>

      <div class="form-group">
        <label for="checkout_create_leads" class="col-sm-2 control-label"><?php _e( 'Create Leads on Step 2', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[checkout_create_leads]" class="form-control" value="1"<?php if ( isset( $option_arr['checkout_create_leads'] ) && (int)$option_arr['checkout_create_leads'] == 1 ) : ?> checked="checked"<?php endif; ?> />
          <p class="help-block" style="display: inline;"><?php _e( 'Create leads when people go to Step 2. It will be converted into a reservation if the user completes the checkout.', 'streamline-core' ) ?></p>
        </div>
      </div>
      <div class="form-group">
        <label for="property_use_html" class="col-sm-2 control-label"><?php _e( 'Use add-ons', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[checkout_use_addons]" class="form-control" value="1"<?php if ( isset( $option_arr['checkout_use_addons'] ) && (int)$option_arr['checkout_use_addons'] == 1 ) : ?> checked="checked"<?php endif; ?> />
        </div>
      </div>
      <div class="form-group">
        <label for="property_use_html" class="col-sm-2 control-label"><?php _e( 'Enable StreamSign Contract', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[checkout_enable_streamsign]" class="form-control" value="1"<?php if ( isset( $option_arr['checkout_enable_streamsign'] ) && (int)$option_arr['checkout_enable_streamsign'] == 1 ) : ?> checked="checked"<?php endif; ?> />
        </div>
      </div>
      <div class="form-group">
        <label for="thankyou_content" class="col-sm-2 control-label"><?php _e( 'Thank You Content', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <textarea name="<?php echo StreamlineCore_Settings::get_option_name() ?>[thankyou_content]" class="form-control" rows="10"><?php echo ( isset( $option_arr['thankyou_content'] ) ? $option_arr['thankyou_content'] : '<table class="table table-bordered text-left bg-white w-100"><tr><td>' . __( 'Reservation', 'streamline-core' ) . '</td><td>%confirmation_id%</td></tr><tr><td>' . __( 'Property ID', 'streamline-core' ) . '</td><td>%unit_name%</td></tr><tr><td>' . __( 'Arrival', 'streamline-core' ) . '</td><td>%startdate%</td></tr><tr><td>' . __( 'Departure', 'streamline-core' ) . '</td><td>%enddate%</td></tr><tr><td>' . __( 'Guests', 'streamline-core' ) . '</td><td>%occupants%</td></tr><tr><td>' . __( 'Pets', 'streamline-core' ) . '</td><td>%pets%</td></tr><tr><td>' . __( 'Total Cost', 'streamline-core' ) . '</td><td><strong>%price_balance%</strong></td></tr></table>' ) ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="checkout_use_ssl" class="col-sm-2 control-label"><?php _e( 'Group expected charges', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[group_expected_charges]" class="form-control" value="1"<?php if ( isset( $option_arr['group_expected_charges'] ) && (int)$option_arr['group_expected_charges'] == 1 ) : ?> checked="checked"<?php endif; ?> />
        </div>
      </div>
    </div>
  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <h4 class="panel-title"><?php _e( 'Coupon Code', 'streamline-core' ) ?></h4>
  </div>
  <div class="panel-body">
    <div class="form-horizontal">
      <div class="form-group">
        <label for="property_use_html" class="col-sm-2 control-label"><?php _e( 'Show Coupon Code', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[property_show_coupon_code]" class="form-control" value="1" <?php if ( isset( $option_arr['property_show_coupon_code'] ) && (int)$option_arr['property_show_coupon_code'] == 1 ) : ?> checked="checked"<?php endif; ?> />
        </div>
      </div>
      <div class="form-group">
        <label for="property_coupon_description" class="col-sm-2 control-label"><?php _e( 'Coupon Description', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <textarea name="<?php echo StreamlineCore_Settings::get_option_name() ?>[property_coupon_description]" class="form-control" rows="10"><?php echo ( isset( $option_arr['property_coupon_description'] ) ? $option_arr['property_coupon_description'] : '' ) ?></textarea>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <h4 class="panel-title"><?php _e( 'Payment Types', 'streamline-core' ) ?></h4>
  </div>
  <div class="panel-body">
    <div class="form-horizontal">
      <div class="form-group">
        <label for="property_use_html" class="col-sm-2 control-label"><?php _e( 'Allowed Payment Types', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[property_card_type_visa]" class="form-control" value="1"<?php if ( isset( $option_arr['property_card_type_visa'] ) && (int)$option_arr['property_card_type_visa'] == 1 ) : ?> checked="checked"<?php endif; ?> />
              <?php _e( 'Visa', 'streamline-core' ) ?>
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[property_card_type_master_card]" class="form-control" value="1"<?php if ( isset( $option_arr['property_card_type_master_card'] ) && (int)$option_arr['property_card_type_master_card'] == 1 ) : ?> checked="checked"<?php endif; ?> />
              <?php _e( 'MasterCard', 'streamline-core' ) ?>
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[property_card_type_amex]" class="form-control" value="1"<?php if ( isset( $option_arr['property_card_type_amex'] ) && (int)$option_arr['property_card_type_amex'] == 1 ) : ?> checked="checked"<?php endif; ?> />
              <?php _e( 'American Express', 'streamline-core' ) ?>
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[property_card_type_discover]" class="form-control" value="1"<?php if ( isset( $option_arr['property_card_type_discover'] ) && (int)$option_arr['property_card_type_discover'] == 1 ) : ?> checked="checked"<?php endif; ?> />
              <?php _e( 'Discover', 'streamline-core' ) ?>
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[property_card_type_echeck]" class="form-control" value="1"<?php if ( isset( $option_arr['property_card_type_echeck'] ) && (int)$option_arr['property_card_type_echeck'] == 1 ) : ?> checked="checked"<?php endif; ?> />
              <?php _e( 'E-check', 'streamline-core' ) ?>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <h4 class="panel-title"><?php _e( 'PayByGroup Integration', 'streamline-core' ) ?></h4>
  </div>
  <div class="panel-body">
    <div class="form-horizontal">
      <div class="form-group">
        <label for="checkout_use_ssl" class="col-sm-2 control-label"><?php _e( 'Enable PayByGroup', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[enable_paybygroup]" class="form-control" value="1"<?php if ( isset( $option_arr['enable_paybygroup'] ) && (int)$option_arr['enable_paybygroup'] == 1 ) : ?> checked="checked"<?php endif; ?> />
        </div>
      </div>
      <div class="form-group">
        <label for="checkout_title" class="col-sm-2 control-label"><?php _e( 'PayByGroup Merchant Id', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[paybygroup_merchant_id]" class="form-control" value="<?php echo ( isset( $option_arr['paybygroup_merchant_id'] ) ? esc_attr( $option_arr['paybygroup_merchant_id'] ) : '' ) ?>" placeholder="<?php _e( 'Merchant Id supplied by PayByGroup needed to complete integration', 'streamline-core' ) ?>" />
        </div>
      </div>

    </div>
  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <h4 class="panel-title"><?php _e( 'GDPR Verbiage', 'streamline-core' ) ?></h4>
  </div>
  <div class="panel-body">
    <div class="form-horizontal">
      <div class="form-group">
        <label for="checkout_use_ssl" class="col-sm-2 control-label"><?php _e( 'Enable GDPR', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[enable_gdpr]" class="form-control" value="1"<?php if ( isset( $option_arr['enable_gdpr'] ) && (int)$option_arr['enable_gdpr'] == 1 ) : ?> checked="checked"<?php endif; ?> />
        </div>
      </div>
      <div class="form-group">
        <label for="checkout_title" class="col-sm-2 control-label"><?php _e( 'First Name', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[gdpr_first_name]" class="form-control" value="<?php echo ( isset( $option_arr['gdpr_first_name'] ) ? esc_attr( $option_arr['gdpr_first_name'] ) : 'First and last name will be used for personalized communication.' ) ?>" placeholder="<?php _e( 'First Name to show on GDPR tooltip', 'streamline-core' ) ?>" />
        </div>
      </div>
      <div class="form-group">
        <label for="checkout_title" class="col-sm-2 control-label"><?php _e( 'Last Name', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[gdpr_last_name]" class="form-control" value="<?php echo ( isset( $option_arr['gdpr_last_name'] ) ? esc_attr( $option_arr['gdpr_last_name'] ) : 'First and last name will be used for personalized communication.' ) ?>" placeholder="<?php _e( 'Last Name to show on GDPR tooltip', 'streamline-core' ) ?>" />
        </div>
      </div>
      <div class="form-group">
        <label for="checkout_title" class="col-sm-2 control-label"><?php _e( 'Phone Number', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[gdpr_phone_number]" class="form-control" value="<?php echo ( isset( $option_arr['gdpr_phone_number'] ) ? esc_attr( $option_arr['gdpr_phone_number'] ) : 'Your phone number may be used for communication purposes.' ) ?>" placeholder="<?php _e( 'Phone Number to show on GDPR tooltip', 'streamline-core' ) ?>" />
        </div>
      </div>
      <div class="form-group">
        <label for="checkout_title" class="col-sm-2 control-label"><?php _e( 'E-mail', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[gdpr_email]" class="form-control" value="<?php echo ( isset( $option_arr['gdpr_email'] ) ? esc_attr( $option_arr['gdpr_email'] ) : 'We will send email confirmation for your reservation.' ) ?>" placeholder="<?php _e( 'E-mail to show on GDPR tooltip', 'streamline-core' ) ?>" />
        </div>
      </div>
      <div class="form-group">
        <label for="checkout_title" class="col-sm-2 control-label"><?php _e( 'Address', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[gdpr_address]" class="form-control" value="<?php echo ( isset( $option_arr['gdpr_address'] ) ? esc_attr( $option_arr['gdpr_address'] ) : 'Your address will be used for credit card verification and possible mailing notifications related to your account.' ) ?>" placeholder="<?php _e( 'Address to show on GDPR tooltip', 'streamline-core' ) ?>" />
        </div>
      </div>
      <div class="form-group">
        <label for="checkout_title" class="col-sm-2 control-label"><?php _e( 'Country', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[gdpr_country]" class="form-control" value="<?php echo ( isset( $option_arr['gdpr_country'] ) ? esc_attr( $option_arr['gdpr_country'] ) : 'This will be used for credit card verification, for internal studies of where our clients come from and any mail that we need to send to a client.' ) ?>" placeholder="<?php _e( 'Country to show on GDPR tooltip', 'streamline-core' ) ?>" />
        </div>
      </div>
      <div class="form-group">
        <label for="checkout_title" class="col-sm-2 control-label"><?php _e( 'City', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[gdpr_city]" class="form-control" value="<?php echo ( isset( $option_arr['gdpr_city'] ) ? esc_attr( $option_arr['gdpr_city'] ) : 'This will be used for credit card verification, for internal studies of where our clients come from and any mail that we need to send to a client.' ) ?>" placeholder="<?php _e( 'City to show on GDPR tooltip', 'streamline-core' ) ?>" />
        </div>
      </div>
      <div class="form-group">
        <label for="checkout_title" class="col-sm-2 control-label"><?php _e( 'State', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[gdpr_state]" class="form-control" value="<?php echo ( isset( $option_arr['gdpr_state'] ) ? esc_attr( $option_arr['gdpr_state'] ) : 'This will be used for credit card verification, for internal studies of where our clients come from and any mail that we need to send to a client.' ) ?>" placeholder="<?php _e( 'State to show on GDPR tooltip', 'streamline-core' ) ?>" />
        </div>
      </div>
      <div class="form-group">
        <label for="checkout_title" class="col-sm-2 control-label"><?php _e( 'Postal Code', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[gdpr_postal_code]" class="form-control" value="<?php echo ( isset( $option_arr['gdpr_postal_code'] ) ? esc_attr( $option_arr['gdpr_postal_code'] ) : 'This will be used for credit card verification and any mail that we need to send to a client.' ) ?>" placeholder="<?php _e( 'Postal Code to show on GDPR tooltip', 'streamline-core' ) ?>" />
        </div>
      </div>
    </div>
  </div>
</div>