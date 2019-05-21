
  <div class="panel-body">
    <div class="row">

      <!-- <div class="col-md-12"> -->
        <div ng-show="hasTravelInsurance || hasCfar">
          <p><?php	_e('Travel Insurance',	'streamline-core');	?>:

            (<?php	_e('Please make a selection below',	'streamline-core');	?>)
          </p>

          <p ng-show="hasTravelInsurance">
            <input type="checkbox"
                   ng-model="chkTravelInsurance"
                   ng-click="acceptTravelInsurance()" />

            <?php	printf('<span style="color:green">%s</span> %s',	__('PROTECT',	'streamline-core'),	__('my travel investment with Travel Insurance for <strong>{[travelInsurance | currency]}</strong>. Coverage protects my vacation investment up to 100% for covered reasons like illness, injury, natural disasters, travel delays and more.',	'streamline-core'));	?>
          </p>

          <p ng-show="hasCfar">
            <input type="checkbox"
                   ng-model="chkCfar"
                   ng-click="acceptCfar()" />

            <?php	printf('<span style="color:green">%s</span> %s',	__('PROTECT',	'streamline-core'),	__('my travel investment with Cancel For Any Reason Travel Protection for <strong>{[cfar | currency]}</strong>. Coverage protects my vacation investment up to 100% for covered reasons like illness, natural disasters, travel delays and more. I can also cancel for a reason not listed in the policy and be eligible for a 75% reimbursement (this benefit must be used 3 days or more before check-in).',	'streamline-core'));	?>
          </p>

          <p>
            <input type="checkbox"
                   ng-model="chkTravelInsuranceNo"
                   ng-click="rejectTravelInsurance()"/>
            I
            <?php	printf('<span style="color:red">%s</span> %s',	__('DECLINE',	'streamline-core'),	__('travel protection and risk losing or forfeiting all or part of my paid and future investment against this reservation.',	'streamline-core'));	?>
          </p>
          <p ng-show="protectionError">
            <span ng-if="!(chkTravelInsurance || chkCfar || chkTravelInsuranceNo)" class="error" ng-bind="'<?php	_e('You must make a selection for travel insurance',	'streamline-core');	?>'"></span>
          </p>
          <hr/>
        </div>

        <div ng-show="hasDamageProtection">
          <p>
            <?php	_e('Damage Protection',	'streamline-core');	?>:
            <strong ng-bind="damageProtection | currency"></strong>
            (<?php	_e('Please make a selection below',	'streamline-core');	?>)
          </p>
          <p>
            <input type="checkbox"
                   ng-model="chkDamageWaiver"
                   ng-click="acceptDamageWaiver()"/>
            <?php	printf('<span style="color:green">%s</span> %s',	__('PROTECT',	'streamline-core'),	__('my rental with accidental Rental Damage Protection. Coverage includes any accidental damage to the property and it&rsquo;s contents for the duration of the rental period subject to the policy terms and conditions of rental.',	'streamline-core'));	?>
          </p>
          <p>
            <input type="checkbox"
                   ng-click="rejectDamageWaiver()"
                   ng-model="chkDamageWaiverNo"/>
            I
            <?php	printf('<span style="color:red">%s</span> %s %s',	__('DECLINE',	'streamline-core'),	__('and will pay the security deposit of {[securityDeposit | currency]}',	'streamline-core'),	__('and accept the risk of being responsible for any damage that may exceed my security deposit amount.',	'streamline-core'));	?>
          </p>
          <p ng-show="protectionError">
            <span ng-if="!(chkDamageWaiver || chkDamageWaiverNo)" class="error" ng-bind="'<?php	_e('You must make a selection for damage protection',	'streamline-core');	?>'"></span>
          </p>
        </div>

        <div class="form-group col-md-12 step_btn_area">
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
              <button type="button" class="btn secondary_button" ng-click="goToStepOne()">
                <i class="glyphicon glyphicon-arrow-left"></i> <?php	_e('Go Back',	'streamline-core')	?>
              </button>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8">
              <button type="button" class="btn primary-button" ng-click="goToStep3()">
                <?php	_e('Continue',	'streamline-core')	?> <i class="glyphicon glyphicon-arrow-right"></i>
              </button>
            </div>
          </div>
        </div>
      <!-- </div> -->
    </div>
  </div>
