<form name="formStep1" class="css-form" novalidate>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="row">
          <div class="form-group col-sm-12 container_input">
            <label><?php  _e('First Name',  'streamline-core'); ?>: </label>
            <?php if($options['enable_gdpr'] == 1 && !empty($options['gdpr_first_name'])):?>
            <a href="#" title="<?php echo $options['gdpr_first_name']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
            <?php endif; ?>
            <input type="text" name="fname"
                   placeholder="<?php	_e('First Name',	'streamline-core');	?>"
                   class="form-control"
                   ng-model="checkout.fname"
                   ng-change="validateStepOne(checkout)"
                   required>
            <div ng-show="formStep1.$submitted || formStep1.fname.$touched">
              <span class="error" ng-show="formStep1.fname.$error.required" ng-bind="'<?php	_e('First name is required.',	'streamline-core');	?>'"></span>
            </div>
          </div>
          <div class="form-group col-sm-12 container_input">
            <label><?php	_e('Last Name',	'streamline-core');	?>: </label>
            <?php if($options['enable_gdpr'] == 1 && !empty($options['gdpr_last_name'])):?>
            <a href="#" title="<?php echo $options['gdpr_last_name']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
            <?php endif; ?>
            <input type="text" name="lname" class="form-control"
                   placeholder="<?php	_e('Last Name',	'streamline-core');	?>"
                   ng-model="checkout.lname"
                   ng-change="validateStepOne(checkout)"
                   required>
            <div ng-show="formStep1.$submitted || formStep1.lname.$touched">
              <span class="error" ng-show="formStep1.lname.$error.required" ng-bind="'<?php	_e('Last name is required.',	'streamline-core');	?>'"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-12 container_input">
            <label><?php	_e('Email',	'streamline-core');	?>: </label>
            <?php if($options['enable_gdpr'] == 1 && !empty($options['gdpr_email'])):?>
            <a href="#" title="<?php echo $options['gdpr_email']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
            <?php endif; ?>
            <input type="email" name="email" class="form-control"
                   placeholder="<?php	_e('Email',	'streamline-core');	?>"
                   ng-model="checkout.email" required />
            <div ng-show="formStep1.$submitted || formStep1.email.$touched">
              <span class="error" ng-show="formStep1.email.$error.required" ng-bind="'<?php	_e('Tell us your email.',	'streamline-core');	?>'"></span>
              <span class="error" ng-show="formStep1.email.$error.email" ng-bind="'<?php	_e('This is not a valid email.',	'streamline-core');	?>'"></span>
            </div>
          </div>
          <div class="form-group col-sm-12 container_input">
            <label><?php	_e('Phone',	'streamline-core');	?>: </label>
            <?php if($options['enable_gdpr'] == 1 && !empty($options['gdpr_phone_number'])):?>
            <a href="#" title="<?php echo $options['gdpr_phone_number']; ?>" class="g_tooltip"><i class="fa fa-question-circle"></i></a>
            <?php endif; ?>
            <input type="phone" name="phone" class="form-control"
                   ng-pattern="/^-?\d*$/"
                   ng-model="checkout.phone"
                   required
                   placeholder="(###) ###-####" />
            <div ng-show="formStep1.$submitted || formStep1.phone.$touched">
              <span class="error" ng-show="formStep1.phone.$error.required" ng-bind="'<?php	_e('Phone is required.',	'streamline-core');	?>'"></span>
               <span class="error" ng-show="formStep1.phone.$error.pattern" ng-bind="'<?php _e('Invalid phone number.',  'streamline-core'); ?>'"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12 step_btn_area">
            <div class="col-md-4 col-sm-4 col-xs-4">
              <button type="button" class="btn secondary_button" ng-click="goToStepZero(false)">
                <i class="glyphicon glyphicon-arrow-left"></i> <?php  _e('Go Back', 'streamline-core')  ?>
              </button>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8">
              <button type="submit"
                      class="btn primary-button"
                      ng-click="goToStep2(false)">
                <?php	_e('Continue',	'streamline-core');	?>
                <i class="glyphicon glyphicon-arrow-right"></i>
              </button>
            </div>
            <?php	if	($pbg_enabled):	?>
              <div class="row">
                <div class="col-md-12">
                  <p>
                    <strong><?php	_e('or',	'streamline-core');	?> </strong><br />
                    <?php	_e('Pay only for your share',	'streamline-core');	?>
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
            <?php	endif;	?>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
