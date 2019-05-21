/****************************
 *
 * Base API methods.  Should only return the promise and for basic functions
 *
 ***************************/
;
(function () {

  var app = angular.module('resortpro.services');

  app.factory('rpapi', function($http, $rootScope) {
    return {
      get: function(method) {

        var request = {};
        var params = {};
        var use_tokens = false;

        if($rootScope.companyCode){
          params.company_code = $rootScope.companyCode;          
        }else{
          use_tokens = true;
        }

        request.methodName = method;
        request.params = params;

        var _obj = JSON.stringify(request);

        $http.defaults.useXDomain = true;

        if(use_tokens){
          var data = {
            'action' : 'streamlinecore-api-request',
            'params' : request
          };

          return $http({
            method: 'POST',
            headers: {
             'Content-type': 'application/json'
            },
            url: streamlinecoreConfig.ajaxUrl,
            params: data
          });
        }else{
          return $http.post($rootScope.APIServer, JSON.stringify(request));
        }
      },
      getWithParams: function(method, params) {

        var request = {};
        var use_tokens = false;

        request.methodName = method;
        
        
        if($rootScope.companyCode){
          params.company_code = $rootScope.companyCode;          
        }else{
          use_tokens = true;
        }

        request.params = params;

        var _obj = JSON.stringify(request);

        $http.defaults.useXDomain = true;
        delete $http.defaults.headers.common['X-Requested-With'];
        
        if(use_tokens){
          var data = {
            'action' : 'streamlinecore-api-request',
            'params' : request
          };

          return $http({
            method: 'POST',
            headers: {
             'Content-type': 'application/json'
            },
            url: streamlinecoreConfig.ajaxUrl,
            params: data
          });
        }else{
          return $http.post($rootScope.APIServer, JSON.stringify(request));
        }
      },
      getWpActionWithParams: function(action, params){
        var data = {
          'action' : action
        };
        for(var propertyName in params) {
         data[propertyName] = params[propertyName];
        }
        return $http({
          method: 'POST',
          headers: {
            'Content-type': 'application/json'
          },
          url: streamlinecoreConfig.ajaxUrl,
          params: data
        });
      }
    }
  });

  app.factory('rpuri', function($http, $rootScope) {
    return {
      getQueryStringParam: function(sParam) {
        var sPageUrl = window.location.search.substring(1);
        var sURLVariables = sPageUrl.split('&');

        for (var i = 0; i < sURLVariables.length; i++) {
          var sParameterName = sURLVariables[i].split('=');
          if (sParameterName[0] == sParam) {
            return sParameterName[1];
          }
        }
      }
    }
  });
})();
