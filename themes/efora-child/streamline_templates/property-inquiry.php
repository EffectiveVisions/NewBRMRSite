<div class="modal fade " id="myModal2" tabindex="-2" role="dialog" aria-labelledby="myModalLabel2">
  <form class="frm-property-inquiry new-enquary h-100" name="resortpro_inquiry" ng-init="inquiry.unit_id=<?php echo $unit_id ?>" novalidate>
   <input type="hidden" ng-model="inquiry.unit_id">
    <?php if($is_modal): ?>
  
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header p-2 d-flex flex-wrap align-items-center border-0">
          <h3 class="modal-title font-weight-semi-bold w-100" id="myModalLabel">
            <?php _e( $title, 'streamline-core' ) ?>
          </h3>
          <button type="button" class="close position-absolute " data-dismiss="modal" aria-label="<?php _e( 'Close', 'streamline-core' ) ?>">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
          <?php endif; ?>
          <div class="col-12 col-sm-6">
          <div class="form-group">
                <div class="inquiry_container_input container_input">
                  <?php if($gdpr_enabled && !empty($options['gdpr_first_name'])):?>
                  <a href="#" title="<?php echo $options['gdpr_first_name']; ?>" class="g_tooltip">
                    
                  </a>
                  <?php endif; ?>
                  <label for="inquiry_first_name" class="font-13 font-weight-semi-bold text-black">First Name</label>
                  <input type="text" class="form-control form-icon border-primary-color" name="inquiry_first_name" id="inquiry_first_name" placeholder="<?php _e( 'First Name*', 'streamline-core' ) ?>"
                    ng-required="true" ng-model="inquiry.first_name" />
                  
                </div>
                <div ng-show="resortpro_inquiry.$submitted">
                  <span class="error" ng-show="resortpro_inquiry.inquiry_first_name.$error.required" ng-bind="'<?php _e( 'First name is required.', 'streamline-core' ) ?>'"></span>
                </div>
            </div>
          </div>

          <div class="col-12 col-sm-6">
          <div class="form-group">
                <div class="inquiry_container_input container_input">
                  <?php if($gdpr_enabled && !empty($options['gdpr_last_name'])):?>
                  <a href="#" title="<?php echo $options['gdpr_last_name']; ?>" class="g_tooltip">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  <?php endif; ?>
                  <label for="inquiry_last_name" class="font-13 font-weight-semi-bold text-black">Last Name</label>
                  <input type="text" class="form-control form-icon border-primary-color" name="inquiry_last_name" id="inquiry_last_name" placeholder="<?php _e( 'Last Name*', 'streamline-core' ) ?>"
                    ng-required="true" ng-model="inquiry.last_name" />
                  
                </div>
                <div ng-show="resortpro_inquiry.$submitted">
                  <span class="error" ng-show="resortpro_inquiry.inquiry_last_name.$error.required" ng-bind="'<?php _e( 'Last name is required.', 'streamline-core' ) ?>'"></span>
                </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6">
          <div class="form-group">
                <div class="inquiry_container_input container_input">
                  <?php if($gdpr_enabled && !empty($options['gdpr_email'])):?>
                  <a href="#" title="<?php echo $options['gdpr_email']; ?>" class="g_tooltip">
                    
                  </a>
                  <?php endif; ?>
                  <label for="inquiry_email" class="font-13 font-weight-semi-bold text-black">Email</label>
                  <input type="email" class="form-control form-icon border-primary-color" name="inquiry_email" id="inquiry_email" placeholder="<?php _e( 'Email*', 'streamline-core' ) ?>"
                    ng-required="true" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" ng-model="inquiry.email" />
                  
                </div>
                <div ng-show="resortpro_inquiry.$submitted">
                  <span class="error" ng-show="resortpro_inquiry.inquiry_email.$error.required"
                    ng-bind="'<?php _e( 'Email is required.', 'streamline-core' ) ?>'"></span>
                  <span class="error" ng-show="resortpro_inquiry.inquiry_email.$error.pattern" ng-bind="'<?php _e( 'This is not a valid email.', 'streamline-core' ) ?>'"></span>
                </div>
              </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="form-group">
                <div class="inquiry_container_input container_input">
                  <?php if($gdpr_enabled && !empty($options['gdpr_phone_number'])):?>
                  <a href="#" title="<?php echo $options['gdpr_phone_number']; ?>" class="g_tooltip">
                    
                  </a>
                  <?php endif; ?>     
                  <label for="inquiry_phone" class="font-13 font-weight-semi-bold text-black">Phone No.</label>           
                  <input type="text" class="form-control form-icon border-primary-color" name="inquiry_phone"  
                    ng-pattern="/^-?\d*$/" id="inquiry_phone" placeholder="<?php _e( 'Phone*', 'streamline-core' ) ?>"
                    ng-model="inquiry.phone" ng-required="true" />
                 
                </div>
                <div ng-show="resortpro_inquiry.$submitted">
                  <span class="error" ng-show="resortpro_inquiry.inquiry_phone.$error.required"
                    ng-bind="'<?php _e( 'Phone no. is required.', 'streamline-core' ) ?>'">
                  </span>
                   <span class="error" ng-show="resortpro_inquiry.inquiry_phone.$error.pattern"
                    ng-bind="'<?php _e( 'Invalid Phone number', 'streamline-core' ) ?>'">
                  </span>
                </div>
            </div>
          </div>
          
          <div class="col-sm-6 col-12">
          <div class="form-group">
              <div class="w-100" ng-init="inquiry.startDate='<?php echo $start_date; ?>'">
                <div class="inquiry_container_input container_input">
                  <label for="inquiry_startdate" class="font-13 font-weight-semi-bold text-black">Checkin Date</label>  
                  <div class="input-calender-icon position-relative"> 
                    <input readonly type="text" autocomplete="off" class="form-control datepicker-single form-icon border-primary-color" data-bindpicker="#inquiry_enddate" name="inquiry_startdate" id="inquiry_startdate"
                      placeholder="<?php _e( 'Check In*', 'streamline-core' ) ?>" ng-required="true" ng-model="inquiry.startDate"
                    />
                  </div>
                  
                </div>
                <div ng-show="resortpro_inquiry.$submitted">
                  <span class="error" ng-show="resortpro_inquiry.inquiry_startdate.$error.required" ng-bind="'<?php _e( 'Checkin is required.', 'streamline-core' ) ?>'"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-12">
            <div class="form-group">
              <div class="w-100" ng-init="inquiry.endDate='<?php echo $end_date; ?>'">
                <div class="inquiry_container_input container_input">
                  <label for="inquiry_enddate" class="font-13 font-weight-semi-bold text-black">Checkout Date</label> 
                  <div class="input-calender-icon position-relative">
                  <input readonly type="text" autocomplete="off" class="form-control datepicker-single form-icon border-primary-color" name="inquiry_enddate" id="inquiry_enddate" placeholder="<?php _e( 'Check Out*', 'streamline-core' ) ?>"
                    ng-required="true" ng-model="inquiry.endDate" />
                  </div>
                  
                </div>
                <div ng-show="resortpro_inquiry.$submitted">
                  <span class="error" ng-show="resortpro_inquiry.inquiry_enddate.$error.required" ng-bind="'<?php _e( 'Checkout is required.', 'streamline-core' ) ?>'"></span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-sm-4 col-12">
          <div class="form-group">
              <div class="w-100" ng-init="inquiry.occupants='<?php echo $occupants; ?>'">
                <label for="inquiry_occupants" class="font-13 font-weight-semi-bold text-black">Adults</label>
                <div class="c-select-list form-control">
                  <select class="form-icon border-primary-color" name="inquiry_occupants" id="inquiry_occupants" ng-model="inquiry.occupants">
                    <option value="0">Select Adult</option>
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
            </div>
          </div>
          <div class="col-sm-4 col-12">
          <div class="form-group">
              <div class="w-100" ng-init="inquiry.occupantsSmall='<?php echo $occupants_small; ?>'">
                <label for="inquiry_occupants_small" class="font-13 font-weight-semi-bold text-black">Children</label>
                <div class="c-select-list form-control">
                  
                  <select class="form-icon border-primary-color" name="inquiry_occupants_small" id="inquiry_occupants_small" ng-model="inquiry.occupantsSmall">
                  <option value="0">Select Child</option>
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
            </div>
          </div>
          <div class="col-sm-4 col-12" ng-init="inquiry.pets='<?php echo $pets; ?>'">
            <div class="form-group">
             <label for="inquiry_pets" class="font-13 font-weight-semi-bold text-black">Pets</label>
            <div class="c-select-list form-control">
             
              <select class="form-icon border-primary-color" name="inquiry_pets" id="inquiry_pets" ng-model="inquiry.pets">
              <option value="0">Select Pets</option>

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
           

             
          <div class="col-12">
          <div class="form-group">
              <div class="w-100">
                <div class="inquiry_container_input container_input">
                  <label for="inquiry_message" class="font-13 font-weight-semi-bold text-black">Message</label>
                  <textarea class="form-control form-icon border-primary-color" name="inquiry_message" id="inquiry_message" placeholder="<?php _e( 'Question or Comment', 'streamline-core' ) ?>"
                    ng-model="inquiry.message"></textarea>
                  
                </div>
              </div>
            </div>
          </div>
          
          <!--<div class="alert alert-{[alert.type]} animate" ng-repeat="alert in alerts">
            <div ng-bind-html="alert.message | trustedHtml"></div>
          </div>-->
          <?php if($is_modal): ?>
        </div>
      </div>
        <div class="modal-footer">
            <button type="submit"
                    id="resortpro_unit_submit"
                    ng-click="validateInquiry(inquiry, true)"
                    class="btn btn-primary theme-btn font-14 text-uppercase  font-weight-light-bold mr-auto">
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