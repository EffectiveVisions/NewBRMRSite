<div class="panel panel-info">
  <div class="panel-heading">
    <h4 class="panel-title"><?php _e( 'General', 'streamline-core' ) ?></h4>
  </div>
  <div class="panel-body">
    <div class="form-horizontal">
      <div class="form-group">
        <label for="endpoint" class="col-sm-2 control-label"><?php _e( 'End Point', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[endpoint]" class="form-control" placeholder="<?php _e( 'Api EndPoint', 'streamline-core' ) ?>" value="<?php echo ( isset( $option_arr['endpoint'] ) ? esc_attr( $option_arr['endpoint'] ) : '' ) ?>" />
        </div>
      </div>
      <div class="form-group">
        <label for="id" class="col-sm-2 control-label"><?php _e( 'Company Code', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[id]" class="form-control" placeholder="<?php _e( 'Company Id', 'streamline-core' ) ?>" value="<?php echo ( isset( $option_arr['id'] ) ? esc_attr( $option_arr['id'] ) : '' ) ?>" />
        </div>
      </div>
      <div class="form-group">
        <label for="token_key" class="col-sm-2 control-label"><?php _e( 'Token Key', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[token_key]" class="form-control" placeholder="<?php _e( 'Token Key', 'streamline-core' ) ?>" value="<?php echo ( isset( $option_arr['token_key'] ) ? esc_attr( $option_arr['token_key'] ) : '' ) ?>" />
        </div>
      </div>
      <div class="form-group">
        <label for="token_secret" class="col-sm-2 control-label"><?php _e( 'Token Secret', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[token_secret]" class="form-control" placeholder="<?php _e( 'Token Secret', 'streamline-core' ) ?>" value="<?php echo ( isset( $option_arr['token_secret'] ) ? esc_attr( $option_arr['token_secret'] ) : '' ) ?>" />
        </div>
      </div>
      <div class="form-group">
        <label for="phone" class="col-sm-2 control-label"><?php _e( 'Phone', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="phone" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[phone]" class="form-control" placeholder="<?php _e( 'Phone', 'streamline-core' ) ?>" value="<?php echo ( isset( $option_arr['phone'] ) ? esc_attr( $option_arr['phone'] ) : '' ) ?>" />
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[use_room_type_logic]" value="1"<?php if ( isset( $option_arr['use_room_type_logic'] ) && (int)$option_arr['use_room_type_logic'] == 1 ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Room type logic', 'streamline-core' ) ?>
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[use_favorites]" value="1"<?php if ( isset( $option_arr['use_favorites'] ) && (int)$option_arr['use_favorites'] == 1 ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Enable Favorites', 'streamline-core' ) ?>
            </label>
          </div>
        </div>
      </div>
	  <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[use_recent_units]" value="1"<?php if ( isset( $option_arr['use_recent_units'] ) && (int)$option_arr['use_recent_units'] == 1 ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Use Recent Units', 'streamline-core' ) ?>
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[use_yielding]" value="1"<?php if ( isset( $option_arr['use_yielding'] ) && (int)$option_arr['use_yielding'] == 1 ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Use Yielding (must be enabled in backend)', 'streamline-core' ) ?>
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[include_enabled_optional_fees]" value="1"<?php if ( isset( $option_arr['include_enabled_optional_fees'] ) && (int)$option_arr['include_enabled_optional_fees'] == 1 ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Include enabled optional fees', 'streamline-core' ) ?>
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[use_compare]" value="1"<?php if ( isset( $option_arr['use_compare'] ) && (int)$option_arr['use_compare'] == 1 ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Enable Compare Units', 'streamline-core' ) ?>
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[enable_plus_minus]" value="1"<?php if ( isset( $option_arr['enable_plus_minus'] ) && (int)$option_arr['enable_plus_minus'] == 1 ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Enable Plus Minus Logic', 'streamline-core' ) ?>
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[enable_save_unit_place]" value="1"<?php if ( isset( $option_arr['enable_save_unit_place'] ) && (int)$option_arr['enable_save_unit_place'] == 1 ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Enable Save Unit Place', 'streamline-core' ) ?>
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="id" class="col-sm-2 control-label"><?php _e( 'Google Maps Api Key', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[google-maps-api]" class="form-control" placeholder="<?php _e( 'Google Maps Api Key', 'streamline-core' ) ?>" value="<?php echo ( isset( $option_arr['google-maps-api'] ) ? esc_attr( $option_arr['google-maps-api'] ) : '' ) ?>" />
        </div>
      </div>
      <div class="form-group">
        <label for="id" class="col-sm-2 control-label"><?php _e( 'Rate Mark up %', 'streamline-core' ) ?></label>
        <div class="col-sm-10">
          <input type="text" name="<?php echo StreamlineCore_Settings::get_option_name() ?>[rate_markup]" class="form-control" placeholder="<?php _e( 'Rate Mark up %', 'streamline-core' ) ?>" value="<?php echo ( isset( $option_arr['rate_markup'] ) ? esc_attr( $option_arr['rate_markup'] ) : '' ) ?>" />
        </div>
      </div>
    </div>
  </div>
</div>
