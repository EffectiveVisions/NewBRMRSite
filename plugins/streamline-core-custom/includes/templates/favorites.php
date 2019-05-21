<div id="primary" class="content-area" ng-controller="PropertyController as pCtrl">
	<div ng-init="loadFavorites();" class="row">
		
    <div ng-if="favoritesObj.length > 0">
      <div class="col-md-12 loading" ng-show="loading">
        <i class="fa fa-circle-o-notch fa-spin"></i> <?php _e('Loading...', 'streamline-core') ?>
      </div>      
      <div ng-repeat="property in favoritesObj">
        <?php include($template); ?>
      </div> 
    </div>		   
	</div>
  <div ng-if="favoritesObj.length == 0" ng-cloak>
    <div class="alert alert-danger">
      <p>
        <?php _e('Your favorite list is empty', 'streamline-core'); ?>
      </p>
    </div>
  </div>
  
  <div class="modal fade" id="myModal2" tabindex="-2" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <form method="post" name="resortpro_inquiry" novalidate>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="<?php _e('Close', 'streamline-core') ?>">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2"><?php _e('Property Inquiry', 'streamline-core') ?></h4>
          </div>

          <div class="modal-body">
            <input type="hidden" ng-model="inquiry.unit_id">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control"
                          name="inquiry_first_name"
                          id="inquiry_first_name"
                          placeholder="<?php _e('Name', 'streamline-core') ?>"
                          ng-required="true"
                          ng-model="inquiry.first_name"/>
                  <div ng-show="resortpro_inquiry.$submitted || resortpro_inquiry.inquiry_first_name.$touched">
                    <span class="error" ng-show="resortpro_inquiry.inquiry_first_name.$error.required" ng-bind="'<?php _e('First name is required.', 'streamline-core') ?>'"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control"
                          name="inquiry_last_name"
                          id="inquiry_last_name"
                          placeholder="<?php _e('Last Name', 'streamline-core') ?>"
                          ng-required="true"
                          ng-model="inquiry.last_name"/>
                  <div ng-show="resortpro_inquiry.$submitted || resortpro_inquiry.inquiry_last_name.$touched">
                    <span class="error" ng-show="resortpro_inquiry.inquiry_last_name.$error.required" ng-bind="'<?php _e('Last name is required.', 'streamline-core') ?>'"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control"
                          name="inquiry_email"
                          id="inquiry_email"
                          placeholder="<?php _e('Email', 'streamline-core') ?>"
                          ng-required="true"
                          ng-model="inquiry.email"/>

                  <div ng-show="resortpro_inquiry.$submitted || resortpro_inquiry.inquiry_email.$touched">
                    <span class="error" ng-show="resortpro_inquiry.inquiry_email.$error.required && resortpro_inquiry.inquiry_phone.$error.required" ng-bind="'<?php _e('Email or phone is required.', 'streamline-core') ?>'"></span>
                    <span class="error" ng-show="resortpro_inquiry.inquiry_email.$error.email" ng-bind="'<?php _e('This is not a valid email.', 'streamline-core') ?>'"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control"
                          name="inquiry_phone"
                          id="inquiry_phone"
                          placeholder="<?php _e('Phone', 'streamline-core') ?>"
                          ng-required="true"
                          ng-model="inquiry.phone"/>
                  <div ng-show="resortpro_inquiry.$submitted || resortpro_inquiry.inquiry_phone.$touched">
                    <span class="error" ng-show="resortpro_inquiry.inquiry_email.$error.required && resortpro_inquiry.inquiry_phone.$error.required" ng-bind="'<?php _e('Phone or email is required.', 'streamline-core') ?>'"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6 col-xs-6 col-sm-6">
                  <input type="text" class="form-control datepicker"
                          name="inquiry_startdate"
                          id="inquiry_startdate"
                          placeholder="<?php _e('Checkin', 'streamline-core') ?>"
                          data-bindpicker="#inquiry_enddate"
                          ng-required="true"
                          ng-model="inquiry.startDate"/>
                  <div ng-show="resortpro_inquiry.$submitted || resortpro_inquiry.inquiry_startdate.$touched">
                    <span class="error" ng-show="resortpro_inquiry.inquiry_startdate.$error.required" ng-bind="'<?php _e('Checkin is required.', 'streamline-core') ?>'"></span>
                  </div>
                </div>
                <div class="col-md-6 col-xs-6 col-sm-6">
                  <input type="text" class="form-control datepicker"
                          name="inquiry_enddate"
                          id="inquiry_enddate"
                          placeholder="<?php _e('Checkout', 'streamline-core') ?>"
                          ng-required="true"
                          ng-model="inquiry.endDate"/>

                  <div ng-show="resortpro_inquiry.$submitted || resortpro_inquiry.inquiry_enddate.$touched">
                    <span class="error" ng-show="resortpro_inquiry.inquiry_enddate.$error.required" ng-bind="'<?php _e('Checkout is required.', 'streamline-core') ?>'"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <label for="inquiry_occupants"><?php _e('Adults', 'streamline-core') ?></label>
                  <select class="form-control"
                          name="inquiry_occupants"
                          id="inquiry_occupants"
                          ng-model="inquiry.occupants">
                    <?php for ($i = 1; $i <= $max_occupants; $i++): ?>
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <label for="inquiry_occupants_small"><?php _e('Children', 'streamline-core') ?></label>
                  <select class="form-control"
                          name="inquiry_occupants_small"
                          id="inquiry_occupants_small"
                          ng-model="inquiry.occupantsSmall">
                    <?php for ($i = 1; $i <= $max_occupants_small; $i++): ?>
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <label for="inquiry_pets"><?php _e('Pets', 'streamline-core') ?></label>
                  <select class="form-control"
                          name="inquiry_pets"
                          id="inquiry_pets"
                          ng-model="inquiry.pets">
                    <?php for ($i = 1; $i <= $max_pets; $i++): ?>
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <textarea class="form-control"
                            name="inquiry_message"
                            id="inquiry_message"
                            placeholder="<?php _e('Question or Comment', 'streamline-core') ?>"
                            ng-model="inquiry.message"></textarea>
                </div>
              </div>
            </div>
            <div class="alert alert-{[alert.type]} animate" ng-repeat="alert in alerts">
              <div ng-bind-html="alert.message | trustedHtml"></div>
            </div>
          </div>

          <div class="modal-footer">
            <a type="button"
                class="btn btn-default"
                data-dismiss="modal"
                ng-click="resetInquiry(inquiry)">
              <?php _e('Close', 'streamline-core') ?>
            </a>
            <button type="submit"
                    id="resortpro_unit_submit"
                    ng-click="validateInquiry(inquiry, true)"
                    class="btn btn-success">
              <i class="glyphicon glyphicon-comment"></i> <?php _e('Send Inquiry', 'streamline-core') ?>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalFav" tabindex="-2" role="dialog" aria-labelledby="modalFavLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <form method="post" name="resortpro_save_fav" novalidate>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="<?php _e('Close', 'streamline-core') ?>">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="modalFavLabel"><?php _e('Save favorites', 'streamline-core') ?></h4>
          </div>

          <div class="modal-body">          
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control"
                          name="favorites_first_name"
                          id="favorites_first_name"
                          placeholder="<?php _e('Name', 'streamline-core') ?>"
                          ng-required="true"
                          ng-model="favorites.first_name"/>
                  <div ng-show="resortpro_save_fav.$submitted || resortpro_save_fav.inquiry_first_name.$touched">
                    <span class="error" ng-show="resortpro_save_fav.favorites_first_name.$error.required" ng-bind="'<?php _e('First name is required.', 'streamline-core') ?>'"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control"
                          name="favorites_last_name"
                          id="favorites_last_name"
                          placeholder="<?php _e('Last Name', 'streamline-core') ?>"
                          ng-required="true"
                          ng-model="favorites.last_name"/>
                  <div ng-show="resortpro_save_fav.$submitted || resortpro_save_fav.favorites_last_name.$touched">
                    <span class="error" ng-show="resortpro_save_fav.favorites_last_name.$error.required" ng-bind="'<?php _e('Last name is required.', 'streamline-core') ?>'"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control"
                          name="favorites_email"
                          id="favorites_email"
                          placeholder="<?php _e('Email', 'streamline-core') ?>"
                          ng-required="true"
                          ng-model="favorites.email"/>

                  <div ng-show="resortpro_save_fav.$submitted || resortpro_save_fav.favorites_email.$touched">
                    <span class="error" ng-show="resortpro_save_fav.favorites_email.$error.required && resortpro_save_fav.inquiry_phone.$error.required" ng-bind="'<?php _e('Email or phone is required.', 'streamline-core') ?>'"></span>
                    <span class="error" ng-show="resortpro_save_fav.favorites_email.$error.email" ng-bind="'<?php _e('This is not a valid email.', 'streamline-core') ?>'"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control"
                          name="favorites_phone"
                          id="favorites_phone"
                          placeholder="<?php _e('Phone', 'streamline-core') ?>"
                          ng-required="true"
                          ng-model="favorites.phone"/>
                  <div ng-show="resortpro_save_fav.$submitted || resortpro_save_fav.favorites_phone.$touched">
                    <span class="error" ng-show="resortpro_save_fav.favorites_email.$error.required && resortpro_save_fav.favorites_phone.$error.required" ng-bind="'<?php _e('Phone or email is required.', 'streamline-core') ?>'"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group" ng-init="favorites.startDate='<?php echo urldecode($_REQUEST['sd']); ?>';favorites.endDate='<?php echo urldecode($_REQUEST['ed']); ?>';favorites.message='';">
              <div class="row">
                <div class="col-md-6 col-xs-6 col-sm-6">
                  <div class="input-group">
                    <input type="text" class="form-control datepicker"
                            name="favorites_startdate"
                            id="favorites_startdate"
                            placeholder="<?php _e('Checkin', 'streamline-core') ?>"
                            data-bindpicker="#favorites_enddate"                        
                            ng-required="true"
                            ng-model="favorites.startDate"/>
                    <span class="input-group-btn"><a class="btn btn-primary btn-calendar-in" href="#"><i class="glyphicon glyphicon-calendar"></i> </a></span>
                  </div>
                  <div ng-show="resortpro_save_fav.$submitted || resortpro_save_fav.favorites_startdate.$touched">
                    <span class="error" ng-show="resortpro_save_fav.favorites_startdate.$error.required" ng-bind="'<?php _e('Checkin is required.', 'streamline-core') ?>'"></span>
                  </div>
                </div>
                <div class="col-md-6 col-xs-6 col-sm-6">
                  <div class="input-group">
                    <input type="text" class="form-control datepicker"
                            name="favorites_enddate"
                            id="favorites_enddate"
                            placeholder="<?php _e('Checkout', 'streamline-core') ?>"
                            ng-required="true"
                            ng-model="favorites.endDate"/>
                            <span class="input-group-btn"><a class="btn btn-primary btn-calendar-in" href="#"><i class="glyphicon glyphicon-calendar"></i> </a></span>
                  </div>

                  <div ng-show="resortpro_save_fav.$submitted || resortpro_save_fav.inquiry_enddate.$touched">
                    <span class="error" ng-show="resortpro_save_fav.inquiry_enddate.$error.required" ng-bind="'<?php _e('Checkout is required.', 'streamline-core') ?>'"></span>
                  </div>
                </div>
              </div>
            </div>          
            <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <textarea class="form-control"
                            name="favorites_message"
                            id="favorites_message"
                            placeholder="<?php _e('Question or Comment', 'streamline-core') ?>"
                            ng-model="favorites.message"></textarea>
                </div>
              </div>
            </div>
            <div class="alert alert-{[alert.type]} animate" ng-repeat="alert in alerts">
              <div ng-bind-html="alert.message | trustedHtml"></div>
            </div>
          </div>

          <div class="modal-footer">
            <a type="button"
                class="btn btn-default"
                data-dismiss="modal"
                ng-click="resetFavorites(favorites)">
              <?php _e('Close', 'streamline-core') ?>
            </a>
            <button type="button" id="resortpro_favorite_submit" ng-click="validateFavorites(favorites)" class="btn btn-primary">
              <i class="glyphicon glyphicon-cloud-upload"></i> <?php _e('Save favorites', 'streamline-core') ?>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>