;
(function () {

  var app = angular.module('resortpro.services', []);

  app.service('streamlineService', function (rpapi, $q) {

    this.getPreReservationPrice = function(params){
      return rpapi.getWithParams('GetPreReservationPrice', params).then(function(response){
        return response.data;
      }, function(error){
        return error;
      });
    };

    this.getReservationPrice = function(params){
      return rpapi.getWithParams('GetReservationPrice', params).then(function(response){
        return response.data;
      }, function(error){
        return error;
      });
    };

    this.getReservationInfo = function(confirmation_id){
      return rpapi.getWithParams('GetReservationPrice', { 'confirmation_id' : confirmation_id})
      .then(function(response){
        return response.data;
      }, function(error){
        return error;
      });
    };

    this.verifyPropertyAvailability = function(startdate, enddate, unit_id, occupants, occupants_small, pets, use_room_type){
      return rpapi.getWithParams('VerifyPropertyAvailability', {
        'unit_id': unit_id,
        'startdate': startdate,
        'enddate': enddate,
        'occupants': occupants,
        'occupants_small' : occupants_small,
        'pets' : pets,
        'use_room_type_logic' : use_room_type
      }).then(function(response){
        return response.data;
      }, function(error){
        return error;
      });
    };

    this.getPropertyInfo = function(unit_id){
      return rpapi.getWithParams('GetPropertyInfo', {
        'unit_id': unit_id
      })
      .then(function (obj) {

        var response = obj.data;
        return response;

      }, function(error){
        return error;
      });
    }

    this.getPropertyRoomsDetailsRawData = function(unit_id){
      return rpapi.getWithParams('GetPropertyRoomsDetailsRawData', {
        'unit_id': unit_id
      })
      .then(function (obj) {
        var result = [];
        var response = obj.data.data;

        if(response){
          if(response.roomsdetails.name){
            result.push(response.roomsdetails);
          }else{
            result = response.roomsdetails;
          }
        }
        return result;
      }, function(error){
        return error;
      });
    };

    this.getPropertyRatesRawData = function(unit_id, use_yielding){
      return rpapi.getWithParams('GetPropertyRatesRawData', {
        'unit_id': unit_id,
        'use_yielding' : use_yielding
      })
      .then(function (obj) {
        var result = [];
        var response = obj.data.data;

        if(response){
          if(response.rates.period_begin){
            result.push(response.rates);
          }else{
            result = response.rates;
          }
        }
        return result;
      }, function(error){
        return error;
      });
    };

    this.getPropertyFeedbacks = function(unit_id){
      return rpapi.getWithParams('GetPropertyFeedbacks', {
        'unit_id': unit_id
      })
      .then(function (obj) {
        var result = [];
        var response = obj.data.data;

        if(response){
          if(response.feedbacks.guest_name){
            result.push(response.feedbacks);
          }else{
            result = response.feedbacks;
          }
        }
        return result;
      }, function(error){
        return error;
      });
    };

    this.getPropertyAvailabilityCalendarRawData = function(unit_id){
      return rpapi.getWithParams('GetPropertyAvailabilityCalendarRawData', {
        'unit_id': unit_id
      })
      .then(function (obj) {
        var result = [];
        var response = obj.data.data;

        if(response){
          if(response.blocked_period.startdate){
            result.push(response.blocked_period);
          }else{
            result = response.blocked_period;
          }
        }
        return result;
      }, function(error){
        return error;
      });
    };

    this.makeReservation = function(params){
      return rpapi.getWithParams('MakeReservation', params)
      .then(function (obj) {
        var result = [];
        var response = obj.data;
        return response;
      }, function(error){
        return error;
      });
    };
  });

  app.factory('beforeUnload', function ($rootScope, $window) {
    // Events are broadcast outside the Scope Lifecycle

    $window.onbeforeunload = function (e) {
      var confirmation = {};
      var event = $rootScope.$broadcast('onBeforeUnload', confirmation);
      if (event.defaultPrevented) {
        return confirmation.message;
      }
    };

    $window.onunload = function () {
      $rootScope.$broadcast('onUnload');
    };

    return {};
  }).run(function (beforeUnload) {
    // Must invoke the service at least once
  });

})();
