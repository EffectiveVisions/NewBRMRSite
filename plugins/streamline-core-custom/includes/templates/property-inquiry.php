<div class="modal fade" id="myModal2" tabindex="-2" role="dialog" aria-labelledby="myModalLabel2">
  <form class="frm-property-inquiry new-enquary" name="resortpro_inquiry" ng-init="inquiry.unit_id=<?php echo $unit_id ?>" novalidate>
   <input type="hidden" ng-model="inquiry.unit_id">
    <?php if($is_modal): ?>
  
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="<?php _e( 'Close', 'streamline-core' ) ?>">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title text-primary" id="myModalLabel">
            <?php _e( $title, 'streamline-core' ) ?>
          </h4>
        </div>
        <div class="modal-body">

          <?php endif; ?>
          <div class="form-group">
            <div class="row">
              <div class="col-xs-12">
                <div class="inquiry_container_input container_input">
                  <?php if($gdpr_enabled && !empty($options['gdpr_first_name'])):?>
                  <a href="#" title="<?php echo $options['gdpr_first_name']; ?>" class="g_tooltip">
                    
                  </a>
                  <?php endif; ?>
                  <input type="text" class="form-control form-icon border-primary-color" name="inquiry_first_name" id="inquiry_first_name" placeholder="<?php _e( 'Name*', 'streamline-core' ) ?>"
                    ng-required="true" ng-model="inquiry.first_name" />
                  
                </div>
                <div ng-show="resortpro_inquiry.$submitted">
                  <span class="error" ng-show="resortpro_inquiry.inquiry_first_name.$error.required" ng-bind="'<?php _e( 'First name is required.', 'streamline-core' ) ?>'"></span>
                </div>
              </div>
            </div>
          </div>
              <div class="form-group">
            <div class="row">
              <div class="col-xs-12">
                <div class="inquiry_container_input container_input">
                  <?php if($gdpr_enabled && !empty($options['gdpr_last_name'])):?>
                  <a href="#" title="<?php echo $options['gdpr_last_name']; ?>" class="g_tooltip">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  <?php endif; ?>
                  <input type="text" class="form-control form-icon border-primary-color" name="inquiry_last_name" id="inquiry_last_name" placeholder="<?php _e( 'Last Name*', 'streamline-core' ) ?>"
                    ng-required="true" ng-model="inquiry.last_name" />
                  
                </div>
                <div ng-show="resortpro_inquiry.$submitted">
                  <span class="error" ng-show="resortpro_inquiry.inquiry_last_name.$error.required" ng-bind="'<?php _e( 'Last name is required.', 'streamline-core' ) ?>'"></span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="row">
              <div class="col-xs-12">
                <div class="inquiry_container_input container_input">
                  <?php if($gdpr_enabled && !empty($options['gdpr_email'])):?>
                  <a href="#" title="<?php echo $options['gdpr_email']; ?>" class="g_tooltip">
                    
                  </a>
                  <?php endif; ?>
                  <input type="email" class="form-control form-icon border-primary-color" name="inquiry_email" id="inquiry_email" placeholder="<?php _e( 'Email*', 'streamline-core' ) ?>"
                    ng-required="true" ng-model="inquiry.email" />
                  
                </div>
                <div ng-show="resortpro_inquiry.$submitted">
                  <span class="error" ng-show="resortpro_inquiry.inquiry_email.$error.required && resortpro_inquiry.inquiry_phone.$error.required"
                    ng-bind="'<?php _e( 'Email or phone is required.', 'streamline-core' ) ?>'"></span>
                  <span class="error" ng-show="resortpro_inquiry.inquiry_email.$error.email" ng-bind="'<?php _e( 'This is not a valid email.', 'streamline-core' ) ?>'"></span>
                </div>
              </div>
              </div>
              </div>
              <div class="form-group">
            <div class="row">
              <div class="col-xs-12">
                <div class="inquiry_container_input container_input">
                  <?php if($gdpr_enabled && !empty($options['gdpr_phone_number'])):?>
                  <a href="#" title="<?php echo $options['gdpr_phone_number']; ?>" class="g_tooltip">
                    
                  </a>
                  <?php endif; ?>                
                  <input type="text" class="form-control form-icon border-primary-color" name="inquiry_phone"  
                    ng-pattern="/^-?\d*$/" id="inquiry_phone" placeholder="<?php _e( 'Phone*', 'streamline-core' ) ?>"
                    ng-model="inquiry.phone" ng-required="true" />
                 
                </div>
                <div ng-show="resortpro_inquiry.$submitted">
                  <span class="error" ng-show="resortpro_inquiry.inquiry_email.$error.required && resortpro_inquiry.inquiry_phone.$error.required"
                    ng-bind="'<?php _e( 'Phone or email is required.', 'streamline-core' ) ?>'">
                  </span>
                   <span class="error" ng-show="resortpro_inquiry.inquiry_phone.$error.pattern"
                    ng-bind="'<?php _e( 'Invalid Phone number', 'streamline-core' ) ?>'">
                  </span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="row">
              <div class="col-xs-6" ng-init="inquiry.startDate='<?php echo $start_date; ?>'">
                <div class="inquiry_container_input container_input">
                  <input readonly type="text" autocomplete="off" class="form-control datepicker form-icon border-primary-color" data-bindpicker="#inquiry_enddate" name="inquiry_startdate" id="inquiry_startdate"
                      placeholder="<?php _e( 'Checkin*', 'streamline-core' ) ?>" ng-required="true" ng-model="inquiry.startDate"
                    />
                  
                </div>
                <div ng-show="resortpro_inquiry.$submitted">
                  <span class="error" ng-show="resortpro_inquiry.inquiry_startdate.$error.required" ng-bind="'<?php _e( 'Checkin is required.', 'streamline-core' ) ?>'"></span>
                </div>
              </div>
              <div class="col-xs-6" ng-init="inquiry.endDate='<?php echo $end_date; ?>'">
                <div class="inquiry_container_input container_input">
                  <input readonly type="text" autocomplete="off" class="form-control datepicker form-icon border-primary-color" name="inquiry_enddate" id="inquiry_enddate" placeholder="<?php _e( 'Checkout*', 'streamline-core' ) ?>"
                    ng-required="true" ng-model="inquiry.endDate" />
                  
                </div>
                <div ng-show="resortpro_inquiry.$submitted">
                  <span class="error" ng-show="resortpro_inquiry.inquiry_enddate.$error.required" ng-bind="'<?php _e( 'Checkout is required.', 'streamline-core' ) ?>'"></span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="row">
              <div class="col-xs-4" ng-init="inquiry.occupants='<?php echo $occupants; ?>'">
                 <label for="inquiry_occupants">Adults</label>
                <div class="c-select-list form-control">
                  <select class="form-icon border-primary-color" name="inquiry_occupants" id="inquiry_occupants" ng-model="inquiry.occupants">
                  
                    <?php
                    for ($i = 1; $i <= $max_adults; $i++) { 
                      $label = ($i == 1) ? 'Adult' : 'Adults';
                      echo "<option value=\"{$i}\">{$i} {$label}</option>";
                    }
                    ?>
                  </select>
                  
                </div>
                <!-- /.c-select-list -->
              </div>

              <div class="col-xs-4" ng-init="inquiry.occupantsSmall='<?php echo $occupants_small; ?>'">
                <label for="inquiry_occupants_small">Children</label>
                <div class="c-select-list form-control">
                  
                  <select class="form-icon border-primary-color" name="inquiry_occupants_small" id="inquiry_occupants_small" ng-model="inquiry.occupantsSmall">
                  
                    <?php
                    for ($i = 1; $i <= $max_guests; $i++) {
                      $label = ($i == 1) ? 'Child' : 'Children';
                      echo "<option value=\"{$i}\">{$i} {$label}</option>";
                    }
                    ?>
                  </select>
                </div>
                  <!-- /.c-select-list -->
              </div>
               <div class="col-xs-4" ng-init="inquiry.pets='<?php echo $pets; ?>'">
                 <label for="inquiry_pets">Pets</label>
                <div class="c-select-list form-control">
                 
                  <select class="form-icon border-primary-color" name="inquiry_pets" id="inquiry_pets" ng-model="inquiry.pets">
                   
                    <?php
                      for ($i = 1; $i <= $max_pets; $i++) {
                        $label = ($i == 1) ? 'Pet' : 'Pets';
                        echo "<option value=\"{$i}\">{$i} {$label}</option>";
                      }
                      ?>
                  </select>
                  
                </div>
                <!-- /.c-select-list -->
              </div>
            </div>
          </div>

             
          
          <div class="form-group">
            <div class="row">
              <div class="col-xs-12">
                <div class="inquiry_container_input container_input">
                  <textarea class="form-control form-icon border-primary-color" name="inquiry_message" id="inquiry_message" placeholder="<?php _e( 'Question or Comment', 'streamline-core' ) ?>"
                    ng-model="inquiry.message"></textarea>
                  
                </div>
              </div>
            </div>
          </div>
          
          <div class="alert alert-{[alert.type]} animate" ng-repeat="alert in alerts">
            <div ng-bind-html="alert.message | trustedHtml"></div>
          </div>
          <?php if($is_modal): ?>
        </div>
        <div class="modal-footer">
            <button type="submit"
                    id="resortpro_unit_submit"
                    ng-click="validateInquiry(inquiry, true)"
                    class="btn btn-primary">
              <i class="glyphicon glyphicon-comment"></i> <?php _e('Send Inquiry', 'streamline-core') ?>
            </button>
          </div>
        <!-- modal-body -->
      </div>
      <!-- modal-content -->
    </div>
    <!-- modal dialog -->
  
  <?php else: ?>
  <div class="form-group">
    <button type="submit"
            id="resortpro_unit_submit"
            ng-click="validateInquiry(inquiry, true)"
            class="btn btn-block btn-primary">
      <i class="glyphicon glyphicon-comment"></i> <?php _e('Send Inquiry', 'streamline-core') ?>
    </button>
  </div>
  
  <?php endif; ?>
</form>
</div>