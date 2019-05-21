<div id="payment-login-wrapper">
  <div id="login-payment-form" ng-controller="PropertyController as pCtrl">
    <div class="row" ng-init="login.nonce='<?php echo wp_create_nonce( 'payment-login' ); ?>';">
      <div class="col-md-6 col-md-push-3">
        <form method="post" action="<?php echo $payment_url; ?>" id="form_payment_login">
          <input type="hidden" ng-model="login.nonce" name="nonce" />
          <input type="hidden" ng-model="login.hash" name="hash" id="hash" />
          <div class="form-group">
            <label for="confirmation_id">Confirmation #</label>
            <input type="text" class="form-control" ng-model="login.confirmation_id" name="confirmation_id" id="confirmation_id" placeholder="Enter confirmation #">
          </div>
          
          <div class="form-group">
            <label for="zip_code">Zip Code</label>
            <input type="text" class="form-control" ng-model="login.zip_code" name="zip_code" id="zip_code" placeholder="Enter Zip code">
          </div>
          <button type="button" class="btn btn-primary" id="btn-payment-login" ng-click="paymentLogin(login)">Submit</button>
          <div class="alert alert-{[alert.type]} animate" ng-repeat="alert in alerts">
            <div ng-bind-html="alert.message | trustedHtml"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>