/****************************
*
*	Alert service set up to push alerts.
*
***************************/
;
(function () {
	var app = angular.module('resortpro.services');

	app.service('Alert', function($rootScope, $timeout) {

		$rootScope.alerts = [];

		this.clear = function(){
			$rootScope.alerts = [];
		}
		this.add = function(type, message) {
			var alert = {
				'type': type, 
				'message': message,
				'timestamp' : Date.now()
			};
	
			$rootScope.alerts.push(alert);			
		};

		//default messages to use.  these can be pulled when you set your alert
		this.errorType = 'danger',
		this.errorMessage = 'Sorry, there was an error while processing your request.';

		this.successType = 'success',
		this.successMessage = 'Saved successfully.';

		this.infoType = 'info',
		this.successMessage = 'Sent successfully.';
	});

})();
