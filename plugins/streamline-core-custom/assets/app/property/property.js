/****************************
 *
 * Property funcitons.  Only add functions related to products here
 *
 ***************************/
(function () {
  var app = angular.module('resortpro.property', ['resortpro.services', 'resortpro.filters', 'resortpro.directives', 'ngCookies', 'infinite-scroll']);

  var mod = angular.module('infinite-scroll', []);
  mod.directive('infiniteScroll', [
    '$rootScope', '$window', '$timeout',
    function ($rootScope, $window, $timeout) {
      return {
        link: function (scope, elem, attrs) {
          var checkWhenEnabled, handler, scrollDistance, scrollEnabled;
          $window = angular.element($window);
          scrollDistance = 0;
          if (attrs.infiniteScrollDistance != null) {
            scope.$watch(attrs.infiniteScrollDistance, function (value) {
              return scrollDistance = parseInt(value, 10);
            });
          }
          scrollEnabled = true;
          checkWhenEnabled = false;
          if (attrs.infiniteScrollDisabled != null) {
            scope.$watch(attrs.infiniteScrollDisabled, function (value) {
              scrollEnabled = !value;
              if (scrollEnabled && checkWhenEnabled) {
                checkWhenEnabled = false;
                return handler();
              }
            });
          }
          handler = function () {
            if (scope.enableInfinitiScroll) {
              var elementBottom, remaining, shouldScroll, windowBottom;
              windowBottom = $window.height() + $window.scrollTop();
              elementBottom = elem.offset().top + elem.height();
              remaining = elementBottom - windowBottom;
              shouldScroll = remaining <= $window.height() * scrollDistance;
              if (shouldScroll && scrollEnabled) {
                if ($rootScope.$$phase) {
                  return scope.$eval(attrs.infiniteScroll);
                } else {
                  return scope.$apply(attrs.infiniteScroll);
                }
              } else if (shouldScroll) {
                return checkWhenEnabled = true;
              }
            }
          };
          $window.on('scroll', handler);
          scope.$on('$destroy', function () {
            return $window.off('scroll', handler);
          });
          return $timeout((function () {
            if (attrs.infiniteScrollImmediateCheck) {
              if (scope.$eval(attrs.infiniteScrollImmediateCheck)) {
                return handler();
              }
            } else {
              return handler();
            }
          }), 0);
        }
      };
    }
  ]);

  app.controller("PlusMinusControler", ["$scope", function($scope) {

        $scope.plus = function(max, type) {

          if (type == 'search.occupants') {
              if ($scope.search.occupants == max) {} else {
                  $scope.search.occupants++
              }
          }
          if (type == 'inquiry_occupants') {
              $scope.inquiry.occTotal = parseInt($scope.inquiry.occupantsSmall) + parseInt($scope.inquiry.occupants);
              if ($scope.inquiry.occTotal == max) {} else {
                  $scope.inquiry.occupants++
              }
          }
          if (type == 'modal_occupants') {
              $scope.occTotal = parseInt($scope.modal_occupants_small) + parseInt($scope.modal_occupants);
              if ($scope.occTotal == max) {} else {
                  $scope.modal_occupants++
              }
          }
          if (type == 'inquiry_occupants_small') {
              $scope.inquiry.occTotal = parseInt($scope.inquiry.occupantsSmall) + parseInt($scope.inquiry.occupants);
              if ($scope.inquiry.occTotal == max) {} else {
                  $scope.inquiry.occupantsSmall++
              }
          }
          if (type == 'search.occupants_small') {
              if ($scope.search.occupants_small == max) {} else {
                  $scope.search.occupants_small++
              }
          }
          if (type == 'modal_occupants_small') {
              $scope.occTotal = parseInt($scope.modal_occupants_small) + parseInt($scope.modal_occupants);
              if ($scope.occTotal == max) {} else {
                  $scope.modal_occupants_small++
              }
          }
          if (type == 'search.pets') {
              if ($scope.search.pets == max) {} else {
                  $scope.search.pets++
              }
          }
          if (type == 'modal_pets') {
              if ($scope.modal_pets == max) {} else {
                  $scope.modal_pets++
              }
          }
          if (type == 'inquiry_pets') {
              if ($scope.inquiry.pets == max) {} else {
                  $scope.inquiry.pets++
              }
          }
          if (type == 'search.num_bedrooms') {
              if ($scope.search.num_bedrooms == max) {

              }
              // else if ($scope.search.num_bedrooms === '') {
              //     $scope.search.num_bedrooms = 0
              // }
               else {
                  $scope.search.num_bedrooms++
              }
          }
      }
      $scope.minus = function(min, type) {
          if (type == 'search.occupants') {
              if ($scope.search.occupants == min) {
                  $scope.search.occupants = null
              } else if ($scope.search.occupants == 0 || $scope.search.occupants == null) {} else {
                  $scope.search.occupants--
              }
          }
          if (type == 'inquiry_occupants') {
              if ($scope.inquiry.occupants == min) {} else if ($scope.inquiry.occupants == 0) {} else {
                  $scope.inquiry.occupants--
              }
          }
          if (type == 'modal_occupants') {
              if ($scope.modal_occupants == min) {} else if ($scope.modal_occupants == 0) {} else {
                  $scope.modal_occupants--
              }
          }
          if (type == 'inquiry_occupants_small') {
              if ($scope.inquiry.occupantsSmall == min) {} else if ($scope.inquiry.occupantsSmall == 0) {} else {
                  $scope.inquiry.occupantsSmall--
              }
          }
          if (type == 'search.occupants_small') {
              if ($scope.search.occupants_small == min) {
                  $scope.search.occupants_small = null
              } else if ($scope.search.occupants_small == 0 || $scope.search.occupants_small == null) {} else {
                  $scope.search.occupants_small--
              }
          }
          if (type == 'modal_occupants_small') {
              if ($scope.modal_occupants_small == min) {} else if ($scope.modal_occupants_small == 0) {} else {
                  $scope.modal_occupants_small--
              }
          }
          if (type == 'search.pets') {
              if ($scope.search.pets == min) {
                  $scope.search.pets = null
              } else if ($scope.search.pets == 0 || $scope.search.pets == null) {} else {
                  $scope.search.pets--
              }
          }
          if (type == 'modal_pets') {
              if ($scope.modal_pets == min) {} else if ($scope.modal_pets == 0) {} else {
                  $scope.modal_pets--
              }
          }
          if (type == 'inquiry_pets') {
              if ($scope.inquiry.pets == min) {} else if ($scope.inquiry.pets == 0) {} else {
                  $scope.inquiry.pets--
              }
          }
          if (type == 'search.num_bedrooms') {
              if ($scope.search.num_bedrooms == min) {
                  $scope.search.num_bedrooms = ''
              } else if ($scope.search.num_bedrooms == 0 || $scope.search.num_bedrooms == null) {} else {
                  $scope.search.num_bedrooms--
              }
          }
      }
      $scope.resetGuests = function() {
          $scope.search.occupants = '0';
          $scope.search.occupants_small = '0';
          $scope.search.pets = '0';
          $scope.search.num_bedrooms = '0';
      }
      $scope.closeGuests = function() {
          $scope.class = "hide.bs.dropdown"
      }
  }]);

  app.controller('PropertyController', ['$scope', '$rootScope', '$sce', '$http', '$window', '$filter', 'Alert', 'rpapi', 'rpuri', '$cookies', '$templateCache', '$location',
    function ($scope, $rootScope, $sce, $http, $window, $filter, Alert, rpapi, rpuri, $cookies, $templateCache, $location) {
      $rootScope.properties = {};
      $rootScope.propList = {};
      $rootScope.rates_details = [];
      $rootScope.amenities = [];
      $rootScope.rates2 = [];
      $rootScope.calendar = [];
      $rootScope.calendar2 = {};
      $rootScope.groups = [];
      $scope.loading = true;
      $scope.foundUnits = true;
      $scope.minPrice = 0;
      $scope.maxPrice = 500;
      $scope.maxOccupants = 0;
      $scope.autoZoom = 0;
      $scope.bedroomsNumber = '';
      $scope.neighborhood = '';
      $scope.viewname = '';
      $scope.locationAreaId = '';
      $scope.mapEnabled = false;
      $scope.mapSearch = false;
      $scope.inquiryOnly = false;
      $scope.showMoreButton = true;
      $scope.startDate = $filter('date')(rpuri.getQueryStringParam('sd'), 'MM/dd/yyyy');
      $scope.endDate = $filter('date')(rpuri.getQueryStringParam('ed'), 'MM/dd/yyyy');
      $scope.occupants = rpuri.getQueryStringParam('oc');
      $scope.plusLogic = 0;
      $scope.isFitBounds = false;
      $scope.skipUnits = '';

      $scope.showDays = true;
      $scope.modal_total_reservation = 0;
      $scope.total_pages = 0;
      $scope.total_units = 0;
      $scope.daysDiff = 0;
      $scope.method = '';
      $scope.wishlist = [];
      $scope.foundCalendarBooking = false;
      $scope.maxCalendarDate = null;
      $scope.isAvailabilitySearch = false;
      $scope.currentPage = 1;
      $scope.enableInfinitiScroll = false;

      var map;
      var markerList = {};
      var arrMarkers = [];
      var infowindow;
      var marker;
      var bounds;

      $scope.isString = function(val, allowEmpty){
        if(angular.isString(val)){
          if(allowEmpty){
            return true;
          }else{
            if(val != ''){
              return true;
            }
          }
          
        }
        return false;
      }

      $scope.checkString = function(val, allowEmpty){
        if(angular.isString(val)){
          if(allowEmpty){
            return true;
          }else{
            if(val != ''){
              return true;
            }
          }
          
        }
        return false;
      }

      $scope.checkNumber = function(val, allowZero){
        if(angular.isNumber(val)){
          if(allowZero){
            return true;
          }else{
            if(val > 0){
              return true;
            }
          }
        }else{
          if(val && val !== null) {
            if(val.length > 0) {
              if (!isNaN(val)) {
                return true;
              }
            }
          }
        }

        return false
      }

      $scope.isNumber = function(val, allowZero){
        if(angular.isNumber(val)){
          if(allowZero){
            return true;
          }else{
            if(val > 0){
              return true;
            }
          }
        }else{
          if(val && val !== null) {
            if(val.length > 0) {
              if (!isNaN(val)) {
                return true;
              }
            }
          }
        }

        return false
      }

      $scope.isArray = angular.isArray;

      

      if($rootScope.searchSettings.enable_save_unit_place == 1){
        var pagination_search_number = $rootScope.searchSettings.propertyPagination;
        
        var cookiePageObj = jQuery($cookies.get("sl_current_page"));

          jQuery('.filter-widget input, .filter-widget select').on('click', function(){
            $scope.deleteCookiesFilters();
            $cookies.remove("sl_current_page", {
                path: "/"
            });
          });

        if(cookiePageObj.selector != ''){
          pagination_search_number = cookiePageObj.selector * pagination_search_number;
        }else{
          pagination_search_number = $rootScope.searchSettings.propertyPagination;
        }
        // if(cookiePageObj.selector == 1){
        //   $rootScope.searchSettings.propertyPagination = 1 * $rootScope.searchSettings.propertyPagination;
        // }

      }

      $scope.initializeData = function () {
        $scope.initializeMap();
      };

      // will return list of properties.  pass type to determine results
      $scope.initializeMap = function () {
        $scope.mapSearchEnabled = true;
        $scope.mapEnabled = true;

        $scope.$on('mapInitialized', function (evt, evtMap) {
          map = evtMap;
          bounds = map.getBounds();
        });
      };

      $scope.toggleMapSearch = function(){
        if($scope.mapSearchEnabled == false){
          $scope.mapSearchEnabled = true;
        }else{
          $scope.mapSearchEnabled = false;
        }
      }

      $scope.goToProperty = function (seo_page_name, sd, ed, adults, children, pets, sale, bedrooms_number, home_type, area, neighborhood, location_resort, view, group_type){
        
        var url = $rootScope.propertyUrl + seo_page_name;
        if ( "1" == $rootScope.useHTML ) url = url + '.html';
        var query_string = '';

        if (sd != undefined && sd != '')
          query_string += 'sd=' + encodeURIComponent(sd) + '&';

        if (ed != undefined && ed != '')
          query_string += 'ed=' + encodeURIComponent(ed) + '&';

        if (adults != undefined && adults != '')
          query_string += 'oc=' + encodeURIComponent(adults) + '&';

        if (children != undefined && children != '')
          query_string += 'ch=' + encodeURIComponent(children) + '&';

        if (pets != undefined && pets != '')
          query_string += 'pets=' + encodeURIComponent(pets) + '&';

        if (sale != undefined && sale == 'yes')
          query_string += 'sale=1';

        if (bedrooms_number != undefined && bedrooms_number != '')
          query_string += 'beds=' + encodeURIComponent(bedrooms_number) + '&';

        if (home_type != undefined && home_type != '')
          query_string += 'property_type_id=' + encodeURIComponent(home_type) + '&';

        if (area != undefined && area != '')
          query_string += 'area_id=' + encodeURIComponent(area) + '&';

        if (neighborhood != undefined && neighborhood != '')
          query_string += 'neighborhood_area_id=' + encodeURIComponent(neighborhood) + '&';

        if (location_resort != undefined && location_resort != '')
          query_string += 'resort_area_id=' + encodeURIComponent(location_resort) + '&';

        if (view != undefined && view != '')
          query_string += 'view_name=' + encodeURIComponent(view) + '&';

        if (group_type != undefined && group_type != '')
          query_string += 'group_id=' + encodeURIComponent(group_type) + '&';

        if (query_string != '')
          url += '?' + query_string.replace(/&+$/,'');

        return encodeURI(url);
      }

      $scope.checkSorting = function(){

        if ($scope.sortBy == 'occupants') {
          $scope.sort = true;
        }
        if ($scope.sortBy == 'occupants_low') {
          $scope.sort = false;
        }
        if ($scope.sortBy == 'price') {
          $scope.sort = true;
        }
        if ($scope.sortBy == 'price_low') {
          $scope.sort = false;
        }
        if ($scope.sortBy == 'pets') {
          $scope.sort = true;
        }
        if ($scope.sortBy == 'name') {
          $scope.sort = false;
        }
        if ($scope.sortBy == 'bedrooms_number') {
          $scope.sort = true;
        }
        if ($scope.sortBy == 'bedrooms_number_low') {
          $scope.sort = false;
        }

      }

     //  $scope.$watch('sortBy', function () {
     //    run_waitMe('.listings_wrapper_box', 'bounce', 'Updating Results');
     //     setTimeout(function () {
     //        hide_waitMe('.listings_wrapper_box');
     //      }, 2500);
	    // });

      $scope.customSorting = function(property){

        if($scope.sortBy == 'occupants' || $scope.sortBy == 'occupants_low'){
          return property.max_occupants;
        }else if($scope.sortBy == 'bedrooms_number' || $scope.sortBy == 'bedrooms_number_low'){
          return property.bedrooms_number;
        }else if($scope.sortBy == 'bathrooms_number'){
          return property.bathrooms_number;
        }else if($scope.sortBy == 'name'){
          return property.location_name;
        }else if($scope.sortBy == 'area'){
          return property.square_foots;
        }else if($scope.sortBy == 'view'){
          return property.view_name;
        }else if($scope.sortBy == 'price_low' || $scope.sortBy == 'price'){
          if($scope.method != 'GetPropertyAvailabilityWithRatesWordPress'){
            return property.price_data.daily;
          }else{
            return property.total;
          }
        }else if($scope.sortBy == 'pets'){
          return property.max_pets;
        }else{
          return [];
        }
      }

      

      $scope.getUnitName = function(unit){ 
        if($scope.isString(unit.web_name) && unit.web_name != ''){
          return unit.web_name;
        }else{
          if($scope.isString(unit.location_name) && (unit.name == '' || unit.name == 'Home')){
            return unit.location_name;
          }else{
            return unit.name;
          }
        }        
      }

      $scope.getUnitPrice = function(unit){

      }

      $scope.calculateMarkup = function(strPrice){

        var price = strPrice;
        if(typeof strPrice == 'string'){
          price = parseFloat(strPrice.replace('$','').replace(',',''));
        }

        if($rootScope.rateMarkup > 0){
          var pct = 1 + (parseFloat($rootScope.rateMarkup) / 100);
          price = price * pct;
        }

        return price;
      }

      $scope.disableMapSearch = function(){
        $scope.mapSearchEnabled = false;
        $scope.availabilitySearch($scope.search);
      }

      $scope.clearProperties = function () {
        $rootScope.propList = [];
        $rootScope.properties = [];
      };

      $scope.isEmptyString = function(obj){
        return !(obj != undefined && obj != '');
      }

      $scope.isEmptyObject = function (obj) {
        return angular.equals({}, obj) || obj == null;
      };

      $scope.isString = function(item) {
        return angular.isString(item);
      }

      $scope.loadMarkers = function(properties, setBounds){
        if($scope.mapEnabled){

          angular.forEach(properties, function (property) {

            if (!isNaN(property.location_latitude) && !isNaN(property.location_longitude)) {
              var marker = {
                id: property.id,
                name: property.location_name,
                latitude: property.location_latitude,
                longitude: property.location_longitude,
                image: property.default_thumbnail_path,
                beds: property.bedrooms_number,
                baths: property.bathrooms_number,
                guests: property.max_occupants,
                seo_page_name: property.seo_page_name
              };

              if($scope.method == 'GetPropertyAvailabilityWithRatesWordPress'){
                marker['price'] = property.total;
              }else{
                marker['price'] = property.price_data;
              }

              // this looks nasty, we need to find a better way of waiting for map
              if (map != undefined) {
                var latLong = new google.maps.LatLng (property.location_latitude,property.location_longitude);
                bounds.extend(latLong);
                $scope.loadMarker(marker);
              } else {

                setTimeout(function () {
                  if (map != undefined) {
                    var latLong = new google.maps.LatLng (property.location_latitude,property.location_longitude);
                    bounds.extend(latLong);
                    $scope.loadMarker(marker);
                  }
                }, 2000);
              }
            }
          });

          if (map != undefined && setBounds) {
            $scope.isFitBounds = true;
            map.fitBounds(bounds);
            map.setCenter(bounds.getCenter());
            $scope.isFitBounds = false;
          }
        }
      }

      $scope.deleteCookiesFilters = function() {             
        // $cookies.remove("sl_current_page", {
        //     path: "/"
        // });
        $cookies.remove("unit_id", {
            path: "/"
        });
      }

      $scope.savePagination = function(){
        var savePagination = $cookies.getObject('sl_current_page');
      }
      $scope.saveUnitId = function(){
        var saveUnitId = $cookies.getObject('unit_id');
      }

      $scope.loadMore = function(){
        var size = $rootScope.searchSettings.propertyPagination;
       
        $scope.currentPage++;

        $scope.limit += $rootScope.searchSettings.propertyPagination;

        

        var params = $scope.getParams();
        $scope.searchProperties(params, size, $scope.currentPage, false);

        if($rootScope.searchSettings.enable_save_unit_place == 1){
          var cookiePageObj = jQuery($cookies.get("sl_current_page"));
          if(cookiePageObj.selector != ''){
            $cookies.putObject("sl_current_page", (parseInt(cookiePageObj.selector)) + 1, {
              path: "/"
            });
          }else{
            $cookies.putObject("sl_current_page", $scope.currentPage, {
              path: "/"
            });
          }
        }
      }

      if($rootScope.searchSettings.enable_save_unit_place == 1){
        jQuery(document).on('click', '.listing', function(){
           // e.preventDefault();
           
           var the_unit_link = jQuery(this).attr('id').split('-');
           var the_unit_id = the_unit_link.pop();
           $cookies.putObject("unit_id", the_unit_id, {
              path: "/"
          });
        });
      }

      if($rootScope.searchSettings.enable_save_unit_place == 0){
        $scope.deleteCookiesFilters();
        // $cookies.remove("sl_current_page", {
        //     path: "/"
        // });
      }

      $scope.prepareMarker = function (property, marker) {
        var ne = map.getBounds().getNorthEast();
        var sw = map.getBounds().getSouthWest();

        if (property.location_latitude >= sw.lat() && property.location_latitude <= ne.lat() && property.location_longitude >= sw.lng() && property.location_longitude <= ne.lng()) {
          $scope.loadMarker(marker);
        }
      }

      $scope.getPropertyInfo = function () {
        rpapi.getWithParams('GetPropertyInfo', {'unit_id': $scope.propertyId}).success(function (obj) {
          $scope.property = obj.data;
          $scope.latitude = obj.data.latitude;
          $scope.longitude = obj.data.longitude;

          $scope.$on('mapInitialized', function (evt, evtMap) {
            map = evtMap;
            var myLatlng = {lat: obj.data.latitude, lng: obj.data.longitude};
            map.setCenter(myLatlng);
          });
        });
      };

      $scope.getPropertyImages = function (unit_id) {
        rpapi.getWithParams('GetPropertyGalleryImages', {'unit_id': unit_id}).success(function (obj) {
          $scope.images = obj.data.image;
        });
      };

      $scope.setAmenityFilter = function(amenityId){

        run_waitMe('.listings_wrapper_box', 'bounce', 'Updating Results');
         setTimeout(function(){
            hide_waitMe('.listings_wrapper_box');
          }, 500);

        if($scope.amenity[amenityId]){
          $rootScope.amenities.push(amenityId);
        }else{
          var index = $rootScope.amenities.indexOf(amenityId);
          if(index > -1){
            $rootScope.amenities.splice(index,1);
          }
        }

        // amenities
        searchParam = $location.search();
        if($rootScope.amenities.length)  {
          searchParam['amenities'] = $rootScope.amenities.join(",");
        } else {
          searchParam['amenities'] = null;
        }

        $location.search(searchParam);
      };

      $scope.setAmenityFilterOr = function(amenityId,group){

        run_waitMe('.listings_wrapper_box', 'bounce', 'Updating Results');
         setTimeout(function(){
            hide_waitMe('.listings_wrapper_box');
          }, 500);

          var amenityFound = false;
          if(!$rootScope.groups.length > 0){

            var gitem = {
              name: group,
              amenities: [amenityId]
            };

           $rootScope.groups.push(gitem);

         }else{
            var removeFromArray = false;
            var indexToRemove = 0;
            angular.forEach($rootScope.groups, function (amenity,key) {

                if($scope.amenityOr[amenityId]){
                  if(amenity.name == group){
                    amenityFound = true;
                    amenity.amenities.push(amenityId);
                  }
                }else{
                  if(amenity.name == group){
                    amenityFound = true;
                    var index = amenity.amenities.indexOf(amenityId);
                    if(index > -1){
                      amenity.amenities.splice(index,1);
                    }

                    if(amenity.amenities.length == 0){
                        removeFromArray = true;
                        indexToRemove = key;
                    }
                  }
                }
            });

            if(!amenityFound){
                var gitem = {
                  name: group,
                  amenities: [amenityId]
                };

                $rootScope.groups.push(gitem);
            }

            if(removeFromArray){
              $rootScope.groups.splice(indexToRemove,1);
            }
         }

        // Amenities
        searchParam = $location.search();
        if(typeof searchParam['amenities'] == 'undefined'){
          amenities = [];
        } else {
          amenities = searchParam['amenities'].split(",");
        }

        amenityIdValue = $scope.amenityOr[amenityId];
        amenityIdPosition = amenities.indexOf(amenityId + "");
         
        if (amenityIdValue == false && amenityIdPosition > -1) {
          amenities.splice(amenityIdPosition, 1);
        }else{
          amenities.push(amenityIdValue);
        }

        if(amenities.length)  {
          searchParam['amenities'] = amenities.join(",");
        } else {
          searchParam['amenities'] = null;
        }

        $location.search(searchParam);
      };

      $scope.amenityFilter = function(item){
        console.log("Streamline");
        console.log(item);
        var totalAmenities = $rootScope.amenities.length;
        var i = 0;
        angular.forEach($rootScope.amenities, function (aId) {

            angular.forEach(item.unit_amenities.amenity, function(uaId){

              if (aId == uaId.amenity_id){
                i++;
              }
            });
        });

        if(totalAmenities == i){
          return true;
        }else{
          return false;
        }

      }

      $scope.amenityFilterOr = function(item){
        var result = true;
        if($rootScope.groups.length > 0){
            result = false;
        }

        var totalGroups = $rootScope.groups.length;
        var groupsFound = 0;
        angular.forEach($rootScope.groups, function (group) {
            var keepGoing = true;
            angular.forEach(group.amenities, function(amenity){
                angular.forEach(item.unit_amenities.amenity, function(ua){
                    if(keepGoing) {
                      if(ua.amenity_id == amenity){
                        groupsFound++;
                        keepGoing = false;
                      }
                    }
                });
            });

        });

        return (totalGroups == groupsFound);

      }

      $scope.getPropertyAmenities = function () {
        rpapi.getWithParams('GetPropertyAmenities', {
          'unit_id': $scope.propertyId
        }).success(function (obj) {
          $scope.amenities = obj.data.amenity;
        });
      };

      $scope.getLocations = function () {
        rpapi.get('GetLocationAreasList').success(function (obj) {
          $scope.locations = obj.data.location_area;
        });
      };

      $scope.getPropertyReviews = function (unit_id) {
        if (!unit_id) {
          unit_id = $scope.propertyId;
        }
        rpapi.getWithParams('GetPropertyFeedbacks', {
          'unit_id': unit_id,
          'order_by': 'newest_first'
        }).success(function (obj) {
          if (obj.data.feedbacks.guest_name) {
            var reviewsArray = [];
            reviewsArray.push(obj.data.feedbacks);
            $scope.reviews = reviewsArray;
          } else {
            $scope.reviews = obj.data.feedbacks;
          }
        });
      };

      $scope.getPreReservationPrice = function (booking, res) {
        if (booking.checkin && booking.checkout) {

          var checkin = new Date(booking.checkin);
          var checkout = new Date(booking.checkout);
          var oneDay = 24*60*60*1000;
          var stayLength = Math.round(Math.abs((checkin.getTime() - checkout.getTime())/(oneDay)));

          run_waitMe('#resortpro-book-unit', 'bounce', 'Updating Price...');
          Alert.clear();

          var totalOccupants = parseInt(booking.occupants) + parseInt(booking.occupants_small);
          if(parseInt($scope.maxOccupants) > 0 && (parseInt(booking.occupants) + parseInt(booking.occupants_small)) > parseInt($scope.maxOccupants)){
              Alert.add(Alert.errorType, 'You have selected a total of ' + totalOccupants + ' guests which exceeds the maximum occupancy of ' + $scope.maxOccupants + ' of this property. Please adjust your selection.');
              hide_waitMe('#resortpro-book-unit');
              $scope.isDisabled = true;
              return false;
          }
              
          rpapi.getWithParams('VerifyPropertyAvailability', {
            'unit_id': booking.unit_id,
            'startdate': booking.checkin,
            'enddate': booking.checkout,
            'occupants': booking.occupants,
            'occupants_small' : booking.occupants_small,
            'pets' : booking.pets,
            'use_room_type_logic' : parseInt($rootScope.roomTypeLogic)
          }).success(function (obj) {
            if (obj.status) {
              $scope.reservation_days = [];
              $scope.total_reservation = 0;
              $scope.first_day_price = 0;
              $scope.rent = 0;
              $scope.taxes = 0;

              var errorMsg = obj.status.description;
              if(obj.status.code == 'E0031' && $rootScope.searchSettings.restrictionMsg != ''){
                errorMsg = $rootScope.searchSettings.restrictionMsg;
              }

              Alert.add(Alert.errorType, errorMsg);
              hide_waitMe('#resortpro-book-unit');
              $scope.isDisabled = true;
            } else {
              if($rootScope.bookingSettings.inquiryOnlyFrom && $rootScope.bookingSettings.inquiryOnlyTo){
                var inquiryOnlyFrom = new Date($rootScope.bookingSettings.inquiryOnlyFrom);
                var inquiryOnlyTo = new Date($rootScope.bookingSettings.inquiryOnlyTo);

                if(!(checkout.getTime() <= inquiryOnlyFrom.getTime() || checkin.getTime() >= inquiryOnlyTo.getTime())){
                  Alert.add(Alert.errorType, 'These dates are Inquiry Only, please send us a inquiry using the form below');
                  hide_waitMe('#resortpro-book-unit');
                  $scope.isDisabled = true;              
                  return false;
                }
              }

              var maxLengthStay = $rootScope.bookingSettings.maxLengthStay;
              if(maxLengthStay > 0 && stayLength > maxLengthStay){
                Alert.add(Alert.errorType, 'the max stay is on.');
                hide_waitMe('#resortpro-book-unit');
                $scope.isDisabled = true;
                return false;
              }

              var params = {
                'unit_id': booking.unit_id,
                'startdate': booking.checkin,
                'enddate': booking.checkout,
                'occupants': booking.occupants,
                'occupants_small' : booking.occupants_small,
                'pets' : booking.pets,
                'coupon_code' : booking.coupon_code
              }

              if($rootScope.includeEnabledOptional === 1){
                params['optional_default_enabled'] = 'yes';
              }

              $scope.isDisabled = false;
              rpapi.getWithParams('GetPreReservationPrice', params).success(function (obj) {
                if (obj.data != undefined) {
                  var total_fees = 0;
                  var total_taxes = 0;
                  if(obj.data.required_fees.id){
                    total_fees = obj.data.required_fees.value;
                  }else{
                    angular.forEach(obj.data.required_fees, function (fee, i) {
                      total_fees += fee.value;
                    });
                  }
                  if(obj.data.taxes_details.id){
                    total_taxes = obj.data.taxes_details.value;
                  }else{
                    angular.forEach(obj.data.taxes_details, function (fee, i) {
                      total_taxes += fee.value;
                    });
                  }

                  $scope.total_reservation = obj.data.total;
                  $scope.total_fees = total_fees;
                  $scope.total_taxes = total_taxes;
                  $scope.rent = obj.data.price;

                  $scope.subTotal = $scope.calculateMarkup((obj.data.price + obj.data.coupon_discount).toString());
                  var dif = $scope.subTotal - obj.data.coupon_discount - obj.data.price;
                  $scope.taxes = obj.data.taxes - dif;

                  $scope.coupon_discount = obj.data.coupon_discount;
                  $scope.reservation_days = obj.data.reservation_days;
                  $scope.security_deposits = obj.data.security_deposits;
                  $scope.first_day_price = obj.data.first_day_price;
                  $scope.required_fees = obj.data.required_fees;
                  $scope.optional_fees = obj.data.optional_fees;
                  $scope.taxes_details = obj.data.taxes_details;
                  $scope.due_today = obj.data.due_today;
                  $scope.res = res;

                  if (obj.data.reservation_days.date != undefined) {
                    $scope.days = false;
                  } else {
                    $scope.days = true;
                  }

                  hide_waitMe('#resortpro-book-unit');
                }
              });
            }
          });
        }
      };

      $scope.getParams = function () {
        var search = $scope.search;
        var params = {};

        if (search && search.sort_by) {
          params.sort_by = search.sort_by;
        } else {
          params.sort_by = $scope.sortBy;
        }

        params.use_room_type_logic = parseInt($rootScope.roomTypeLogic);
        params.extra_charges = 1;

        if ($rootScope.searchSettings.disableMinimalDays) {
          params.disable_minimal_days = $rootScope.searchSettings.disableMinimalDays;
        }

        if ($rootScope.searchSettings.propertyDeleteUnits) {
          params.skip_units = $rootScope.searchSettings.propertyDeleteUnits;
        }

        if ($rootScope.searchSettings.locationAreas != '') {
          params.location_areas_id_filter = $rootScope.searchSettings.locationAreas;
        }

        if ($scope.checkNumber($rootScope.searchSettings.locationId, false)) {
          params.location_id = $rootScope.searchSettings.locationId;
        }

        if ($scope.checkNumber($rootScope.searchSettings.resortAreaId,false)) {
          params.resort_area_id = $rootScope.searchSettings.resortAreaId;
        }

        if ($scope.checkNumber($rootScope.searchSettings.neighborhoodId,false)) {
          params.neighborhood_area_id = $rootScope.searchSettings.neighborhoodId;
        }

        if ($rootScope.searchSettings.additionalVariables == 1) {
          params.additional_variables = 1;
        }

        if ($rootScope.searchSettings.extraCharges == 1) {
          params.extra_charges = 1;
        }

        if (parseInt($rootScope.searchSettings.skipAmenities) === 1) {
          params.use_description = 'no';
          params.use_amenities = 'no';
        }

        if (search) {
          if($scope.checkNumber(search.occupants, false)){
            params.occupants = parseInt(search.occupants);            
            $location.search('oc', params.occupants);
          } else {            
            $location.search('oc', null);
          }

          if (search.start_date && search.end_date) {
            params.startdate = search.start_date;
            params.enddate = search.end_date;
            $location.search('sd', search.start_date);
            $location.search('ed', search.end_date);
          }

          if ($scope.checkNumber(search.occupants_small, false)) {
            params.occupants_small = parseInt(search.occupants_small);
            $location.search('ch', params.occupants_small);
          } else {
            $location.search('ch', null);
          }
          
          if ($scope.checkNumber(search.pets, false)) {
            params.pets = parseInt(search.pets);
            $location.search('pets', params.pets);
          } else {
            $location.search('pets', null);
          }

          if ($scope.checkNumber(search.min_pets, false)){
            params.min_pets = parseInt(search.min_pets);
            $location.search('min_pets', parseInt(search.min_pets));
          } else {
            $location.search('min_pets', null);
          }

          if ($scope.checkNumber(search.location_id, false)) {
            params.location_id = parseInt(search.location_id);
          }

          //TODO: Amenities history
          if ($scope.checkString(search.amenities_filter, false)) {
            params.amenities_filter = search.amenities_filter;
          }

          //Widget models                    
          if ($scope.checkNumber(search.location_area_id, false)) {
            params.location_area_id = parseInt(search.location_area_id);
            $location.search('location_area_id', params.location_area_id);
          } else {
            $location.search('location_area_id', null);
            delete params.location_area_id;
          }

          if ($scope.checkNumber(search.lodging_type_id, false)) {
            params.lodging_type_id = parseInt(search.lodging_type_id);
            $location.search('lodging_type_id', params.lodging_type_id);
          } else {
            $location.search('lodging_type_id', null);
            delete params.lodging_type_id;
          }

          if (search.num_bedrooms != 'undefined' && search.num_bedrooms >= 0 && search.num_bedrooms !== '') {
            if ($scope.plusLogic === 1) {
              params.min_bedrooms_number = parseInt(search.num_bedrooms);
              $location.search('beds', parseInt(search.num_bedrooms));
            } else {
              if (search.num_bedrooms == null) {
                $location.search('beds', null);
              } else {
                params.bedrooms_number = parseInt(search.num_bedrooms);
                $location.search('beds', parseInt(search.num_bedrooms));
              }
            }
          } else {
            $location.search('beds', null);
          }

          if ($scope.checkNumber(search.resort_area_id, false)) {
            params.resort_area_id = parseInt(search.resort_area_id);
            $location.search('resort_area_id', params.resort_area_id);
          } else {
            delete params.resort_area_id;
            $location.search('resort_area_id', null);
          }

          if ($scope.checkNumber(search.location, false)) {
            params.location_id = parseInt(search.location);
            $location.search('location_id', params.location_id);
          } else {
            $location.search('location_id', null);
          }

          if ($scope.checkNumber(search.neighborhood_area_id, false)) {
            params.neighborhood_area_id = parseInt(search.neighborhood_area_id);
            $location.search('neighborhood_area_id', params.neighborhood_area_id);
          } else {
            delete params.neighborhood_area_id;
            $location.search('neighborhood_area_id', null);
          }

          if ($scope.checkNumber(search.home_type_id, false)) {
            params.home_type_id = parseInt(search.home_type_id);
            $location.search('home_type_id', params.home_type_id);
          } else {
            delete params.home_type_id;
            $location.search('home_type_id', null);
          }

          if ($scope.checkString(search.view_name, false)) {
            params.view_name = search.view_name;
            $location.search('view_name', params.view_name);
          } else {
            delete params.view_name;
            $location.search('view_name', null);
          }

          if ($scope.checkNumber(search.condo_type_id, false)) {
            params.condo_type_id = parseInt(search.condo_type_id);
            $location.search('condo_type_id', params.condo_type_id);
          } else {
            delete params.condo_type_id;
            $location.search('condo_type_id', null);
          }

          if ($scope.checkNumber(search.group_type, false)) {
            params.condo_type_group_id = parseInt(search.group_type);
            $location.search('group_id', params.condo_type_group_id);            
          }else{
            delete params.condo_type_group_id;
            $location.search('group_id', null);
          }

          //begin shortcode filters
          if (!$scope.isEmptyString(search.adults) && search.adults > 0) {
            params.adults = parseInt(search.adults);
          }

          if (!$scope.isEmptyString(search.min_occupants) && search.min_occupants > 0) {
            params.min_occupants = parseInt(search.min_occupants);
          }

          if (!$scope.isEmptyString(search.min_adults) && search.min_adults > 0) {
            params.min_occupants = parseInt(search.min_adults);
          }

          if (!$scope.isEmptyString(search.min_pets) && search.min_pets > 0) {
            params.min_occupants = parseInt(search.min_pets);
          }

          if (!$scope.isEmptyString(search.bedrooms_number) && search.bedrooms_number > 0) {
            params.bedrooms_number = parseInt(search.bedrooms_number);
          }

          if (!$scope.isEmptyString(search.min_bedrooms_number) && search.min_bedrooms_number > 0) {
            params.min_bedrooms_number = parseInt(search.min_bedrooms_number);
          }

          if (!$scope.isEmptyString(search.bathrooms_number) && search.bathrooms_number > 0) {
            params.bathrooms_number = parseInt(search.bathrooms_number);
          }

          if (!$scope.isEmptyString(search.min_bathrooms_number) && search.min_bathrooms_number > 0) {
            params.min_bathrooms_number = parseInt(search.min_bathrooms_number);
          }

          if (!$scope.isEmptyString(search.neighborhood_area_id_filter)) {
            params.neighborhood_area_id_filter = search.neighborhood_area_id_filter;
          }

          if (!$scope.isEmptyString(search.condo_type_group_id_filter)) {
            params.condo_type_group_id_filter = search.condo_type_group_id_filter;
          }

          if (!$scope.isEmptyString(search.condo_type_id_filter)) {
            params.condo_type_id_filter = search.condo_type_id_filter;
          }

          if (!$scope.isEmptyString(search.home_type_id_filter)) {
            params.home_type_id_filter = search.home_type_id_filter;
          }

          if (!$scope.isEmptyString(search.neighborhood_area_id_filter)) {
            params.neighborhood_area_id_filter = search.neighborhood_area_id_filter;
          }

          if (!$scope.isEmptyString(search.location_id_filter)) {
            params.location_id_filter = search.location_id_filter;
          }

          if (!$scope.isEmptyString(search.location_areas_id_filter)) {
            params.location_areas_id_filter = search.location_areas_id_filter;
          }

          if (!$scope.isEmptyString(search.resort_area_id_filter)) {
            params.resort_area_id_filter = search.resort_area_id_filter;
          }

          if (!$scope.isEmptyString(search.location_area_name)) {
            params.location_area_name = search.location_area_name;
          }

          // if (!$scope.isEmptyString(search.unit_name)) {
          //   params.unit_name = search.unit_name;
          // }

          if ($scope.checkString(search.unit_name, false)) {
              params.unit_name = search.unit_name;
          }

          if (!$scope.isEmptyString(search.location_type_name)) {
            params.location_type_name = search.location_type_name;
          }

          if (!$scope.isEmptyString(search.condo_type_group_name)) {
            params.condo_type_group_name = search.condo_type_group_name;
          }
          //end shortcode filters                               
        }

        $scope.amenities = [];
        angular.forEach($scope.selectedAmenities, function (item) {
          if (item != false) {
            $scope.amenities.push(item);
          }
        });

        if ($scope.amenities.length > 0) {
          var amenities = $scope.amenities.join();
          params.amenities_filter = amenities;
        }

        if ($scope.mapSearchEnabled && angular.isNumber($scope.latNE)) {
          params.latNe = $scope.latNE;
          params.longNe = $scope.longNE;
          params.latSw = $scope.latSW;
          params.longSw = $scope.longSW;
        }

        if($scope.skipUnits != ''){
          params.skip_units = $scope.skipUnits;          
        }

        return params;
      }
      jQuery('.col-md-4.search-sidebar #sticky-wrapper').removeClass('sticky-wrapper');
      $scope.requestPropertyList = function (method) {
        $scope.availabilitySearch();
      }

      $scope.availabilitySearch = function (search, map_search) {
       

        var cookiePageObject = jQuery($cookies.get("sl_current_page"));
        if($rootScope.searchSettings.enable_save_unit_place == 1 && cookiePageObject.selector !=''){
           size = pagination_search_number;
        }else{
           size = $rootScope.searchSettings.propertyPagination;
        }
        properties = $rootScope.propList;
        $scope.noResults = false;
        $scope.currentPage = 1;
        if (!$scope.limit) {
          $scope.limit = size;
        }

        map_search = typeof map_search !== 'undefined' ? map_search : false;
        $scope.mapSearch = map_search;

        $scope.loading = true;
        var params = $scope.getParams();

        params.page_number = $scope.currentPage;

        params.page_results_number = size;
        // console.log('availabilitySearch');
        // $scope.total_units = 0;

        angular.forEach(arrMarkers, function (item, i) {
          item.setMap(null);
        });

        arrMarkers = [];

        $scope.searchProperties(params, size, 1, true);
      };
      
      $scope.searchProperties = function (params, size, page, clearUnits) {

        console.log(params);

        params.page_number = page;
        params.page_results_number = size;
       
        method = $rootScope.searchSettings.searchMethod;

        if (!(params.startdate == '' || params.startdate == undefined) && !(params.enddate == '' || params.enddate == undefined)) {
          var oneDay = 24 * 60 * 60 * 1000;
          var checkin = new Date(params.startdate);
          var checkout = new Date(params.enddate);

          var diffDays = Math.round(Math.abs((checkin.getTime() - checkout.getTime()) / (oneDay)));
          $scope.daysDiff = diffDays;
          if (diffDays > $rootScope.searchSettings.maxSearchDays) {
            method = 'GetPropertyAvailabilitySimple';
          }

        } else {
          method = 'GetPropertyListWordPress';
        }

        $scope.method = method;
        // run_waitMe('.listings_wrapper_box');
        run_waitMe('.listings_wrapper_box', 'roundBounce','Searching The Best Places For You...');
        $scope.enableInfinitiScroll = false;
        rpapi.getWithParams(method, params).success(function (obj) {

          jQuery('.col-md-4.search-sidebar #sticky-wrapper').addClass('sticky-wrapper');

          if($rootScope.searchSettings.enable_save_unit_place == 1){
            // scroll to clicked unit
              var cookieunitobj = $cookies.getObject("unit_id");
              var sl_cookie_unit = '#unit-' + cookieunitobj;
           
              setTimeout(function(){
                offset = 0;
                if( jQuery('body.admin-bar').length > 0 ) offset = 32;
                
                jQuery(document).ready(function(){
                  if(typeof cookieunitobj != 'undefined'){
                    jQuery("html, body").animate({
                      scrollTop: jQuery(sl_cookie_unit).offset().top + 0
                    }, "slow");
                    $scope.deleteCookiesFilters();
                    return false;
                  }
                });
              },50); 
            // ================= //
          }
          var cookiePageObject = jQuery($cookies.get("sl_current_page"));
          hide_waitMe('.listings_wrapper_box');
          if (clearUnits) {
            $rootScope.propertiesObj = [];
            $rootScope.properties = [];
            // $scope.total_units = 0;
            if(params.skip_units){
              $scope.skipUnits = params.skip_units;
            }else{
              $scope.skipUnits = '';
            }
            if($rootScope.searchSettings.enable_save_unit_place == 1 && cookiePageObject.selector !=''){
               $scope.limit = pagination_search_number;
            }else{
               $scope.limit = $rootScope.searchSettings.propertyPagination;
            }
            
          }

          if (!obj.status && obj.data.available_properties && obj.data.available_properties.pagination.total_units > 0) {
            if (obj.data.available_properties.pagination.total_pages > $scope.currentPage) {
              $scope.enableInfinitiScroll = true;
            }
            if (clearUnits) {
              //we change pagination number only when its a new search (clearUnits is true)
              $scope.total_units = obj.data.available_properties.pagination.total_units;
            }

            $scope.foundUnits = true;
            var tempProperties = [];

            if (method == 'GetPropertyAvailabilitySimple' || method == 'GetPropertyListWordPress') {
              tempProperties = obj.data.property;
            } else {
              tempProperties = obj.data.available_properties.property;
            }

            if ($rootScope.properties.length > 0) {
              $rootScope.properties = $rootScope.properties.concat(tempProperties);
            } else {
              $rootScope.properties = tempProperties;
            }
            
            $rootScope.propertiesObj = Object.keys($rootScope.properties).map(function (key) {
              return $rootScope.properties[key];
            });

            if (params.sort_by == 'random') {
              angular.forEach(tempProperties, function (property) {
                if ($scope.skipUnits == '') {
                  $scope.skipUnits = property.id;
                } else {
                  $scope.skipUnits += ',' + property.id;
                }
              });
            }

            $scope.loadMarkers(tempProperties, false);
          } else {
            $scope.noResults = true;
          }
        });

        $scope.loading = false;
      }

      $scope.paymentLogin = function (login) {
                
        var data = {
          action: 'streamlinecore-payment-login',
          confirmation_id: login.confirmation_id,
          zip_code: login.zip_code,
          nonce: login.nonce
        }
        run_waitMe('#login-payment-form');
        $http({
          method: 'POST',
          headers: {
            'Content-type': 'application/json'
          },
          url: streamlinecoreConfig.ajaxUrl,
          params: data
        }).then(function successCallback(response) {
          hide_waitMe('#login-payment-form');
          if(response.data.success){                        
            jQuery('#hash').val(response.data.data.hash);
            jQuery('#form_payment_login').submit();
          }else{
            Alert.add(Alert.errorType, 'Confirmation number or zip code incorrect.');
          }
          
        }, function errorCallback(response) {
          Alert.add(Alert.errorType, 'Cant send email');
        });
      }

      $scope.shareWithFriends = function(){

        if($scope.frmShare.$valid){
          var link = $scope.goToProperty($scope.share.seo_page_name,$scope.share.start_date,$scope.share.end_date,$scope.share.occupants,$scope.share.occupants_small,$scope.share.pets);

          var message = $scope.share.message;

          var data = {
            action : 'streamlinecore-share-with-friends',
            fnames : $scope.share.fnames,
            femails : $scope.share.femails,
            name: $scope.share.name,
            email: $scope.share.email,
            msg: message,
            slug: $scope.share.seo_page_name,
            link: link,
            nonce: $scope.share.nonce
          }
          $http({
            method: 'POST',
            headers: {
             'Content-type': 'application/json'
            },
            url: streamlinecoreConfig.ajaxUrl,
            params: data
          }).then(function successCallback(response) {

              if(response.data.success){
                Alert.add(Alert.successType, response.data.data.message);

                setTimeout(function () {
                      jQuery('#modalShare').modal('hide');
                    }, 3000);
              }else{
                Alert.add(Alert.errorType, response.data.data.message);
              }
            }, function errorCallback(response) {
              Alert.add(Alert.errorType, 'Cant send email');
            });
        }
        return false;
      };

      $scope.filterByPrice = function (minPrice, maxPrice) {
        $scope.priceRangeEnabled = true;
        $scope.minPrice = minPrice;
        $scope.maxPrice = maxPrice;
      };

      $scope.filterByBedroom = function (minBedroom, maxBedroom) {
        $scope.BedroomsRangeEnabled = true;
        $scope.minBedroom = minBedroom;
        $scope.maxBedroom = maxBedroom;
      };

      $scope.bedroomFilter = function (item) {
        var result = true;
        if($scope.bedroomsNumber.indexOf('-') !== -1){
             var beds = $scope.bedroomsNumber.split('-');
             if(item.bedrooms_number >= beds[0] && item.bedrooms_number <= beds[1]){
                return true;
             }else{
                return false;
             }
        }else{
            if (parseInt($scope.bedroomsNumber) > 0) {

                if (item.bedrooms_number == $scope.bedroomsNumber) {
                    result = true;
                } else {
                    result = false;
                }
            }
        }

        return result;
      };

      $scope.locationFilter = function (item) {
        var result = true;

        if ($scope.locationAreaId > 0) {
          if (item.location_area_id == $scope.locationAreaId) {
            result = true;
          } else {
            result = false;
          }
        }

        return result;
      };

      $scope.neighborhoodFilter = function (item) {
        var result = true;
        if ($scope.neighborhood != '') {

          if (item.neighborhood_name == $scope.neighborhood) {
            result = true;
          } else {
            result = false;
          }
        }

        return result;
      };

      $scope.viewNameFilter = function (item) {
        var result = true;
        if ($scope.viewname != '') {

          if (item.view_name == $scope.viewname) {
            result = true;
          } else {
            result = false;
          }
        }

        return result;
      };

      $scope.priceRange = function (item) {
        $scope.amenities = [];

        angular.forEach($scope.selected, function (amenity) {
          if (amenity != false) {
            $scope.amenities.push(item);
          }
        });

        var result = true;

        if ($scope.priceRangeEnabled) {
          if (item.price_data.daily >= $scope.minPrice && item.price_data.daily <= $scope.maxPrice) {
            result = true;
          } else {
            result = false;
          }
        }

        return result;
      }

      $scope.resetSearch = function(){
        $scope.search.occupants = '';
        $scope.search.end_date = '';
        $scope.search.start_date = '';
        $scope.search.home_type = '';
        $scope.search.group_type = '';
        $scope.search.bedroom_type = '';
        $scope.search.viewname = '';
        $scope.search.area = '';
        $scope.search.location_resort = '';
        $scope.search.neighborhood_id = '';
        $scope.search.location = '';
        $scope.search.num_bedrooms = '';
        $scope.search.occupants_small = '';
        $scope.search.pets = '';
        jQuery('.ui-slider-range').css('left', '0');
        jQuery('.ui-slider-range').css('width', '100%');
        jQuery('.resortpro-search-price .ui-slider-handle').first().css('left', '0');
        jQuery('.resortpro-search-price .ui-slider-handle').last().css('right', '0');
        jQuery('.resortpro-search-price .ui-slider-handle').last().css('left', 'auto');
        $scope.minPrice = 100;
        $scope.maxPrice = '';
            window.setTimeout(function () {
            $scope.availabilitySearch('');
            $scope.filterByPrice(0, 5000);
            $scope.priceRangeEnabled = false;
            $scope.priceRange()
        }, 100)
        $location.search({'': null});
        jQuery('.amenity_group input').removeAttr('checked');
      }

      jQuery( document ).ready(function() {
        jQuery('.view_type_menu li').on('click', function () {
            jQuery(this).parents('ol').find('li').removeClass('selected_view');
            jQuery(this).addClass('selected_view');
        });
      });

      $scope.availableProperties = function (id) {
        if ($scope.results.length >= 0) {
          if ($.inArray(id, $scope.results) >= 0) {
            return true;
          } else {
            return false;
          }
        } else {
          return true;
        }
      };

      $scope.getRoomDetails = function (unit_id) {
        $scope.room_details = [];
        if(!unit_id){
          unit_id = $scope.propertyId;
        }
        rpapi.getWithParams('GetPropertyRoomsDetailsRawData', {
          'unit_id': unit_id
        })
        .success(function (obj) {
          if(obj.data.roomsdetails){
            if(obj.data.roomsdetails.name){
              var results = [];
              results.push(obj.data.roomsdetails);
              $scope.room_details = results;
            }else{
              $scope.room_details = obj.data.roomsdetails;
            }
          }
        });
      };

      $scope.getRatesDetails = function (unit_id) {

        if($rootScope.rates_details.length == 0){

          var params = {
            unit_id : unit_id
          };

          if($rootScope.yielding == '1')
            params['use_yielding'] = 'yes';

          rpapi.getWithParams('GetPropertyRatesRawData', params)
          .success(function (obj) {
            if(obj.data.rates.period_begin){
              var results = [];
              results.push(obj.data.rates);
              $rootScope.rates_details = results;
            }else{
              $rootScope.rates_details = obj.data.rates;
            }

            jQuery('.availability-calendar').datepicker('refresh');
            add_tooltip();
          });
        }
      };

      $scope.getCalendarData = function (unit_id) {

        rpapi.getWithParams('GetPropertyAvailabilityCalendarRawData', {
          'unit_id': unit_id
        })
        .success(function (obj) {

          if(obj.data.blocked_period.startdate){
            var results = [];
            results.push(obj.data.blocked_period);
            $rootScope.calendar = results;
          }else{
            $rootScope.calendar = obj.data.blocked_period;
          }

          add_tooltip();
          $scope.getRatesDetails(unit_id);
          jQuery('.availability-calendar').datepicker('refresh');
        });

      };

      $scope.getCalendarDataNew = function (unit_id) {

        var use_room_type = 'no';
        if($rootScope.roomTypeLogic == '1'){
          use_room_type = 'yes';
        }
          
        rpapi.getWithParams('GetPropertyAvailabilityRawData', {
          'unit_id': unit_id,
          'use_room_type_logic': use_room_type
        })
        .success(function (obj) {
          if(obj.data){
            $rootScope.calendar2 = obj.data;
          }
          add_tooltip();
          $scope.getRatesDetails(unit_id);
          jQuery('.availability-calendar').datepicker('refresh');
        });

      };

      $scope.getPropertyRatesAndStay = function (unit_id) {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd<10) {
          dd='0'+dd
        }

        if(mm<10) {
          mm='0'+mm
        }

        today = mm+'/'+dd+'/'+yyyy;

        var d = new Date();
        d.setFullYear(yyyy+1);
        dd = d.getDate();
        mm = d.getMonth()+1;
        yyyy = d.getFullYear();

        var next_year = mm+'/'+dd+'/'+yyyy;


        var params = {
          'unit_id': unit_id,
          'startdate': today,
          'enddate': next_year
        };

        if($rootScope.roomTypeLogic == '1')
          params['use_room_type_logic'] = 'yes';

        rpapi.getWithParams('GetPropertyRates', params).success(function (obj) {
          if(obj.data.season){
            $rootScope.rates.push(obj.data);
          }else{
            angular.forEach(obj.data, function (rate, index) {
              $rootScope.rates.push(rate);
            });
          }
          jQuery('.availability-calendar').datepicker('refresh');
          add_tooltip();
        });
      };

      $scope.renderCalendar = function (date, checkout) {

        var title = '';
        var booked = false;
        var strClass = 'available';

        angular.forEach($rootScope.rates_details, function(rateObj, index){
          var periodBegin = new Date(rateObj.period_begin);
          var periodEnd = new Date(rateObj.period_end);
          if(date >= periodBegin && date <= periodEnd){

            var daysMapping = {
              'Sunday' : 0,
              'Monday' : 1,
              'Tuesday' : 2,
              'Wednesday' : 3,
              'Thursday' : 4,
              'Friday' : 5,
              'Saturday' : 6,
            }

            if(rateObj.daily_first_interval){
              var arrInterval = rateObj.daily_first_interval.split('-');

              title = rateObj.daily_first_interval_price;
              if(arrInterval.length > 1){
                  var firstInt = daysMapping[arrInterval[0]];
                  var secondInt = daysMapping[arrInterval[1]];
                  if(secondInt > firstInt){
                    if(date.getDay() >= firstInt && date.getDay() <= secondInt){
                      title = rateObj.daily_first_interval_price;
                    }else{
                      title = rateObj.daily_second_interval_price;
                    }
                  }else{
                    if(date.getDay() < firstInt && date.getDay() > secondInt){
                      title = rateObj.daily_second_interval_price;
                    }else{
                      title = rateObj.daily_first_interval_price;
                    }
                  }
              }else{
                title = rateObj.daily_first_interval_price;
              }  
            }else{
              title = rateObj.season_name;
            }
            
          }
        });

        angular.forEach($rootScope.calendar, function(calObj, index){
          var use_slash = false;
          var startdate = new Date(calObj.startdate);
          var enddate = new Date(calObj.enddate);

          if($rootScope.slash == '1')
            use_slash = true;

          if(use_slash){

            //slash logic
            enddate.setTime(enddate.getTime() + 1 * 86400000);
            if(!checkout){
              if(date >= startdate && date <= enddate){
                booked = true;
                strClass = 'booked';
                if(date.getTime() === startdate.getTime()){

                  if($rootScope.calendar[index-1]){
                      var previousdate = new Date($rootScope.calendar[index-1].enddate);
                      previousdate.setTime(previousdate.getTime() + 1 * 86400000);
                      if(previousdate.getTime() !== startdate.getTime()){
                        booked = true;
                        strClass = 'slashl';
                      }
                  }else{
                    booked = true;
                    strClass = 'slashl';
                  }


                }
                else if(date.getTime() === enddate.getTime()){
                  booked = false;
                  strClass = 'slashr';
                }
              }
            }else{
              if(date.getTime() === startdate.getTime()){

                if($rootScope.calendar[index-1]){
                    var previousdate = new Date($rootScope.calendar[index-1].enddate);
                    previousdate.setTime(previousdate.getTime() + 1 * 86400000);
                    if(previousdate.getTime() !== startdate.getTime()){
                      booked = false;
                      strClass = 'slashl';
                    }else{
                      booked = false;
                      strClass = 'booked';
                    }
                }else{
                  booked = false;
                  strClass = 'slashl';
                }
              }
              if(date > startdate && date <= enddate){
                booked = true;
                strClass = 'booked';

                if($scope.book.checkin){
                  checkin = new Date($scope.book.checkin);
                  if(date > checkin){
                    $scope.maxCalendarDate = date;
                  }
                }
              }
            }
          }else{
            //normal logic
            if(!checkout){
              if(date >= startdate && date <= enddate){
                booked = true;
                strClass = 'booked';
              }
            }else{
              if(date.getTime() === startdate.getTime()){
                booked = false;
                strClass = 'available';
              }
              if(date > startdate && date <= enddate){
                booked = true;
                strClass = 'booked';
              }
            }
          }
        });

        if($rootScope.hideTooltips == 1){
          title = '';
        }

        return [!booked, strClass, title];
      }

      $scope.renderCalendarNew = function (date, restriction, action) {
        
        if($rootScope.calendar2.range){          
          var str_price = '';
          var start_date = new Date($rootScope.calendar2.range.beginDate);
          var end_date = new Date($rootScope.calendar2.range.endDate);
                    
          angular.forEach($rootScope.rates_details, function(rateObj){
            var periodBegin = new Date(rateObj.period_begin);
            var periodEnd = new Date(rateObj.period_end);
            if(date >= periodBegin && date <= periodEnd){
  
              var daysMapping = {
                'Sunday' : 0,
                'Monday' : 1,
                'Tuesday' : 2,
                'Wednesday' : 3,
                'Thursday' : 4,
                'Friday' : 5,
                'Saturday' : 6,
              }
  
              if(rateObj.daily_first_interval){
                var arrInterval = rateObj.daily_first_interval.split('-');
  
                str_price = rateObj.daily_first_interval_price;
                if(arrInterval.length > 1){
                    var firstInt = daysMapping[arrInterval[0]];
                    var secondInt = daysMapping[arrInterval[1]];
                    if(secondInt > firstInt){
                      if(date.getDay() >= firstInt && date.getDay() <= secondInt){
                        str_price = rateObj.daily_first_interval_price;
                      }else{
                        str_price = rateObj.daily_second_interval_price;
                      }
                    }else{
                      if(date.getDay() < firstInt && date.getDay() > secondInt){
                        str_price = rateObj.daily_second_interval_price;
                      }else{
                        str_price = rateObj.daily_first_interval_price;
                      }
                    }
                }else{
                  str_price = rateObj.daily_first_interval_price;
                }  
              }else{
                str_price = rateObj.season_name;
              }
              
            }
          });

          var loop = new Date(start_date);
          var i = 0;
          
          while(loop <= end_date){                    
                                            
            if(date.toDateString() == loop.toDateString()){
              
              var prev_available = $rootScope.calendar2.availability.substring(i-1, i);
              
              var available = $rootScope.calendar2.availability.substring(i, i+1);
              var change_over = $rootScope.calendar2.changeOver.substring(i, i+1);
              
              if(available == 'Y'){
                var is_available = true;
                if(restriction && action=='checkin' && (change_over == 'X' || change_over == 'O')){                  
                  is_available = false;
                }else if(restriction && action=='checkout' && (change_over == 'X' || change_over == 'I')){                
                  is_available = false;
                }else if(!restriction){                  
                  is_available = false;
                }

                var class_available = (prev_available == 'N') ? 'slash-end available' : 'available';                
                return [is_available, class_available, str_price];
              }else{
                var class_available = (prev_available == 'Y') ? 'slash-start available' : 'booked';
                var is_available = false;
                if(prev_available == 'Y' && action == 'checkout'){
                  is_available = true;
                  class_available = 'slash-start available';
                }
                return [is_available, class_available, str_price];
              }
            }
            var current_date = loop.setDate(loop.getDate() + 1);
            loop = new Date(current_date);
            i++;
          }
        }
        return [false, 'booked', ''];
      };

      $scope.myShowDaysFunction = function (date) {

        var res = $scope.renderCalendar(date, false);
        return res;
      }

      $scope.myShowDaysFunctionCheckout = function (date) {
        var res = $scope.renderCalendar(date, true);
        return res;
      }

      $scope.dragEnd = function (search) {
        if ($scope.mapSearchEnabled && !$scope.isFitBounds) {
          var ne = map.getBounds().getNorthEast();
          var sw = map.getBounds().getSouthWest();

          $scope.latNE = ne.lat();
          $scope.longNE = ne.lng();

          $scope.latSW = sw.lat();
          $scope.longSW = sw.lng();

          $scope.availabilitySearch($scope.search, true);
        }
      };

      $scope.isSimplePricing = function(property){
        return (!property.price) ? true : false;
      }

      $scope.getTotalPrice = function(property, decimals){
        var price = 'N/A';
        if($rootScope.searchSettings.searchMethod == 'GetPropertyAvailabilityWithRatesWordPress'){
          if($rootScope.searchSettings.priceDisplay == 'price' && property.price > 0){
            price = $filter('currency')(property.price,undefined,decimals);
          }else{
            price = $filter('currency')(property.total,undefined,decimals);
          }
        }

        return price;
      }

      $scope.getOldPrice = function(property, decimals){
        var price = 'N/A';
        if($rootScope.searchSettings.searchMethod == 'GetPropertyAvailabilityWithRatesWordPress'){
          if($rootScope.searchSettings.priceDisplay == 'price' && property.price > 0){
            var total = property.price + property.coupon_discount;
            price = $filter('currency')(total,undefined,decimals);
          }else{
            var total = property.total + property.coupon_discount;
            price = $filter('currency')(total,undefined,decimals);
          }
        }
        return price;
      }

      $scope.getReservationPrice = function(property){
        var price = 0;
        if($rootScope.searchSettings.searchMethod == 'GetPropertyAvailabilityWithRatesWordPress'){
          if($rootScope.searchSettings.priceDisplay == 'price' && property.price > 0){
            price = property.price;
          }else{
            price = property.total;
          }
        }

        return price;
      }

      $scope.getTotalAppend = function(property){
        if($rootScope.searchSettings.priceDisplay == 'price' && property.total && property.total > 0){
          return 'excluding taxes & fees';
        }else{
          return 'including taxes & fees';
        }
      }

      $scope.getSimplePrice = function(price_data, decimals){
        var priceText = 'N/A';

        var diffDays = 0;
        if($scope.search){
          var oneDay = 24*60*60*1000;
          var checkin = new Date($scope.search.start_date);
          var checkout = new Date($scope.search.end_date);
          diffDays = Math.round(Math.abs((checkin.getTime() - checkout.getTime())/(oneDay)));
        }

        if($rootScope.searchSettings.useDailyPricing == 1 && price_data.daily && price_data.daily > 0){
          var dailyPrice = price_data.daily;
          if(diffDays >= 7 && diffDays < 30 && price_data.weekly > 0){
            dailyPrice = price_data.weekly / 7;
          }
          if(diffDays >= 30 && price_data.monthly > 0){
            dailyPrice = price_data.monthly / 30;
          }
          priceText = $filter('currency')(dailyPrice,undefined,decimals);
        }else if($rootScope.searchSettings.useWeeklyPricing == 1 && price_data.weekly && price_data.weekly > 0){
          priceText = $filter('currency')(price_data.weekly,undefined,decimals);
        }else if($rootScope.searchSettings.useMonthlyPricing == 1 && price_data.monthly && price_data.monthly > 0){
          priceText = $filter('currency')(price_data.monthly,undefined,decimals);
        }

        return priceText;
      }

      $scope.getDailyPrice = function(price_data){
        var price = 0;
        var diffDays = 0;
        if($scope.search){
          var oneDay = 24*60*60*1000;
          var checkin = new Date($scope.search.start_date);
          var checkout = new Date($scope.search.end_date);
          diffDays = Math.round(Math.abs((checkin.getTime() - checkout.getTime())/(oneDay)));
        }

        if($rootScope.searchSettings.useDailyPricing == 1 && price_data.daily && price_data.daily > 0){
          var dailyPrice = price_data.daily;
          if(diffDays >= 7 && diffDays < 30 && price_data.weekly > 0){
            dailyPrice = price_data.weekly / 7;
          }
          if(diffDays >= 30 && price_data.monthly > 0){
            dailyPrice = price_data.monthly / 30;
          }
          price = dailyPrice;
        }else if($rootScope.searchSettings.useWeeklyPricing == 1 && price_data.weekly && price_data.weekly > 0){
          price = price_data.weekly;
        }else if($rootScope.searchSettings.useMonthlyPricing == 1 && price_data.monthly && price_data.monthly > 0){
          price = price_data.monthly;
        }

        return price;
      }

      $scope.getPrependTex = function(price_data){
        var prependText = '';

        if($rootScope.searchSettings.useDailyPricing == 1 && price_data.daily && price_data.daily > 0){
          prependText = $rootScope.searchSettings.dailyPrepend;
        }else if($rootScope.searchSettings.useWeeklyPricing == 1 && price_data.weekly && price_data.weekly > 0){
          prependText = $rootScope.searchSettings.weeklyPrepend;
        }else if($rootScope.searchSettings.useMonthlyPricing == 1 && price_data.monthly && price_data.monthly > 0){
          prependText = $rootScope.searchSettings.monthlyPrepend;
        }

        return prependText;
      }

      $scope.getAppendTex = function(price_data){
        var appendText = '';

        if($rootScope.searchSettings.useDailyPricing == 1 && price_data.daily && price_data.daily > 0){
          appendText = $rootScope.searchSettings.dailyAppend;
        }else if($rootScope.searchSettings.useWeeklyPricing == 1 && price_data.weekly && price_data.weekly > 0){
          appendText = $rootScope.searchSettings.weeklyAppend;
        }else if($rootScope.searchSettings.useMonthlyPricing == 1 && price_data.monthly && price_data.monthly > 0){
          appendText = $rootScope.searchSettings.monthlyAppend;
        }

        return appendText;
      }

      $scope.loadMarker = function (markerData) {

        var myLatlng = new google.maps.LatLng(markerData.latitude, markerData.longitude);

        var price = '';

        if($scope.method == 'GetPropertyAvailabilityWithRatesWordPress'){
          price = $filter('currency')(markerData.price,undefined,0);
        }else{
          var price = 'N/A';
          if($rootScope.searchSettings.useDailyPricing == 1 && markerData.price.daily && markerData.price.daily > 0){
            price = $filter('currency')(markerData.price.daily,undefined,0);
          }else if($rootScope.searchSettings.useWeeklyPricing == 1 && markerData.price.weekly && markerData.price.weekly > 0){
            price = $filter('currency')(markerData.price.weekly, undefined,0);
          }else if($rootScope.searchSettings.useMonthlyPricing == 1 && markerData.price.monthly && markerData.price.monthly > 0){
            price = $filter('currency')(markerData.price.monthly, undefined,0);
          }
        }
        var pin = $templateCache.get('pin.html');
        pin = pin.replace('%price%', price);
        var marker = new RichMarker({
          id: markerData.id,
          map: map,
          title: markerData.name,
          position: myLatlng,
          shadow: 'none',
          content: pin
        });

        infowindow = new google.maps.InfoWindow();

        var start_date = '';
        var end_date = '';
        var occupants = '';
        var occupants_small = '';
        var pets = '';
        if($scope.search){
          start_date = $scope.search.start_date;
          end_date = $scope.search.end_date;
          occupants = $scope.search.occupants;
          occupants_small = $scope.search.occupants_small;
          pets = $scope.search.pets;
        }
        var url = $scope.goToProperty(markerData.seo_page_name, start_date, end_date, occupants, occupants_small, pets);

        google.maps.event.addListener(marker, 'click', (function (marker) {

          return function () {
            var content = $templateCache.get('marker.html');
            content = content.replace(/%name%/g, markerData.name);
            content = content.replace(/%url%/g, url);
            content = content.replace(/%image%/g, markerData.image);
            content = content.replace(/%beds%/g, markerData.beds);
            content = content.replace(/%baths%/g, markerData.baths);
            content = content.replace(/%guests%/g, markerData.guests);
            infowindow.setContent(content);
            infowindow.open(map, marker);
          }
        })(marker));
        arrMarkers.push(marker);
      };

      $scope.normalIcon = function () {
        return {
          url: 'http://1.bp.blogspot.com/_GZzKwf6g1o8/S6xwK6CSghI/AAAAAAAAA98/_iA3r4Ehclk/s1600/marker-green.png'
        };
      };

      $scope.highlightedIcon = function () {
        return {
          url: 'http://steeplemedia.com/images/markers/markerGreen.png'
        };
      };

      $scope.highlightIcon = function (unit_id) {        
        angular.forEach(arrMarkers, function (item) {
          if (item.id == unit_id) {
            if(item.getContent()){
              item.setContent(item.getContent().replace('arrow_box', 'arrow_box_hover'));
            }            
          }
        });
      };

      $scope.restoreIcon = function (unit_id) {
        angular.forEach(arrMarkers, function (item) {
          if (item.id == unit_id) {
            if(item.getContent()){
              item.setContent(item.getContent().replace('arrow_box_hover', 'arrow_box'));
            }
          }
        });
      };

      $scope.setModalCheckin = function (date) {
        $scope.modal_checkin = date;
      };

      $scope.resetCalendarPopup = function(){
        $scope.showDays = true;
        $scope.modal_total_reservation = 0;
        $scope.modal_nights = '';
      }

      $scope.setNights = function(){

        var frm = new Date($scope.modal_checkin);


        nts = parseInt($scope.modal_nights);
        var the_year = frm.getFullYear();
        if (the_year < 2000) the_year = 2000 + the_year % 100;
        var to = new Date(the_year, frm.getMonth(), frm.getDate() + nts);

        $scope.modal_checkout = to.format("mm/dd/yyyy");
        var booking = {
          checkin  : frm.format("mm/dd/yyyy"),
          checkout : to.format("mm/dd/yyyy"),
          unit_id : $scope.book.unit_id,
          occupants : 1,
          occupants_small : 0,
          pets: 0
        };

        jQuery('#modal_end_date').datepicker('option', 'minDate', frm);

        $scope.modal_checkin = frm.format("mm/dd/yyyy");
        $scope.modal_checkout = to.format("mm/dd/yyyy");
        $scope.updatePricePopupCalendar();

      }

      $scope.updatePricePopupCalendar = function(){
        //run_waitMe('#resortpro-book-unit form', 'bounce', 'Updating Price...');
        run_waitMe('#myModal .modal-content', 'bounce');
        Alert.clear();

        rpapi.getWithParams('VerifyPropertyAvailability', {
          'unit_id': $scope.book.unit_id,
          'startdate': $scope.modal_checkin,
          'enddate': $scope.modal_checkout,
          'occupants': $scope.modal_occupants,
          'occupants_small' : $scope.modal_occupants_small,
          'pets' : $scope.modal_pets
        }).success(function (obj) {
          if (obj.status) {
            $scope.reservation_days = [];
            $scope.total_reservation = 0;
            $scope.first_day_price = 0;
            $scope.rent = 0;
            $scope.taxes = 0;
            Alert.add(Alert.errorType, obj.status.description);
            hide_waitMe('#myModal .modal-content');
          } else {

            rpapi.getWithParams('GetPreReservationPrice', {
              'unit_id': $scope.book.unit_id,
              'startdate': $scope.modal_checkin,
              'enddate': $scope.modal_checkout,
              'occupants': $scope.modal_occupants,
              'occupants_small' : $scope.modal_occupants_small,
              'pets' : $scope.modal_pets
            }).success(function (obj) {
              if (obj.data != undefined) {

                $scope.showDays = false;


                $scope.modal_total_reservation = obj.data.total;
                $scope.modal_rent = obj.data.price;
                $scope.modal_taxes = obj.data.taxes;
                $scope.modal_coupon_discount = obj.data.coupon_discount;
                $scope.modal_reservation_days = obj.data.reservation_days;
                $scope.modal_security_deposits = obj.data.security_deposits;
                $scope.modal_first_day_price = obj.data.first_day_price;
                $scope.modal_required_fees = obj.data.required_fees;
                $scope.modal_taxes_details = obj.data.taxes_details;


                if (obj.data.reservation_days.date != undefined) {
                  $scope.modal_days = false;
                } else {
                  $scope.modal_days = true;
                }

                hide_waitMe('#myModal .modal-content');
              }
            });
          }
        });
      }

      $scope.setCheckoutDate = function (date) {
        if($scope.book.checkout){
          $scope.book.checkout = date.format("mm/dd/yyyy");
        }
      };

      $scope.resetInquiry = function (inquiry) {
        $scope.inquiry.unit_id = 0;
        $scope.inquiry.startDate = '';
        $scope.inquiry.endDate = '';
        $scope.inquiry.email = '';
        $scope.inquiry.occupants = '';
        $scope.inquiry.occupantsSmall = '';
        $scope.inquiry.first_name = '';
        $scope.inquiry.last_name = '';
        $scope.inquiry.phone = '';
        $scope.inquiry.message = '';
        $scope.resortpro_inquiry.$setPristine();
        $scope.resortpro_inquiry.$setUntouched();
        $scope.alerts = [];
      };

      $scope.resetFavorites = function (favorites) {
        $scope.favorites.unit_id = 0;
        $scope.favorites.startDate = '';
        $scope.favorites.endDate = '';
        $scope.favorites.email = '';
        $scope.favorites.occupants = '';
        $scope.favorites.occupantsSmall = '';
        $scope.favorites.first_name = '';
        $scope.favorites.last_name = '';
        $scope.favorites.phone = '';
        $scope.favorites.message = '';
        $scope.resortpro_save_fav.$setPristine();
        $scope.resortpro_save_fav.$setUntouched();
      };

      $scope.setUnitForInquiry = function (unit_id) {
        if (typeof $scope.inquiry == 'undefined') {
          $scope.inquiry = {};
        }
        $scope.inquiry.unit_id = unit_id;
      }
     
      $scope.validateFavorites = function(favorites){
        
        var error = false;
        if(($scope.resortpro_save_fav.favorites_email.$error.required && $scope.resortpro_save_fav.favorites_phone.$error.required)){
          error = true;
        }

        if($scope.resortpro_save_fav.favorites_first_name.$error.required ||
          $scope.resortpro_save_fav.favorites_last_name.$error.required ||
          $scope.resortpro_save_fav.favorites_startdate.$error.required ||
          $scope.resortpro_save_fav.favorites_enddate.$error.required){
          error = true;
        }

        if(!error){
          $scope.saveFavorites(favorites);
        }
      }

      $scope.validateInquiry = function(inquiry, popup){

        var error = false;
        if(($scope.resortpro_inquiry.inquiry_email.$error.required && $scope.resortpro_inquiry.inquiry_phone.$error.required)){
          error = true;
        }

        if($scope.resortpro_inquiry.inquiry_first_name.$error.required ||
          $scope.resortpro_inquiry.inquiry_last_name.$error.required ||
          $scope.resortpro_inquiry.inquiry_startdate.$error.required ||
          $scope.resortpro_inquiry.inquiry_enddate.$error.required){
          error = true;
        }

        if(!error){
          $scope.propertyInquiry(inquiry, popup);
        }
      }

      $scope.loadFavorites = function(){
        $scope.loading = true;
        var fav_ids = $cookies.getObject('streamline-favorites');
        if(fav_ids){
          var params = {
            include_units : fav_ids.join()
          };
  
          rpapi.getWithParams('GetPropertyListWordPress', params).success(function (obj) {
            $scope.loading = false;
  
            if(obj.data.property.id){
              $scope.favoritesObj = [];
              $scope.favoritesObj.push(obj.data.property);
            }else{
              $scope.favoritesObj = Object.keys(obj.data.property).map(function(key) {
                return obj.data.property[key];
              });
            }
          });
        }else{
          $scope.favoritesObj = [];
        }
        
      }

      $scope.checkFavorites = function(property){
        var favorites = $cookies.getObject('streamline-favorites');
        var found = false;
        if(favorites){
          angular.forEach(favorites, function(value, key) {
            if(property.id == value){
              found = true;
            }
          });
        }

        return found;
      }

      $scope.removeFromFavorites = function(property){
        if(confirm('Are you sure you want to remove unit ' + property.name)){
          var favorites = $cookies.getObject('streamline-favorites');
          if(favorites){

            angular.forEach(favorites, function(value, key) {
              if(property.id == value){
                favorites.splice(key, 1);              
              }            
            });

            angular.forEach($scope.favoritesObj, function(prop, key) {
              if(property.id == prop.id){              
                $scope.favoritesObj.splice(key, 1);              
              }            
            });

            if(favorites.length == 0){
              $cookies.remove('streamline-favorites', { path : '/'});
              $scope.wishlist = [];
            }else{
              $scope.wishlist = favorites;

              $cookies.putObject('streamline-favorites', favorites, { path : '/'});
            }
          }
        }
        
      }

      $scope.addToFavorites = function(property){

        var favorites = $cookies.getObject('streamline-favorites');
        if(favorites){
          var foundUnit = false;
          angular.forEach(favorites, function(value, key) {
            if(property.id == value){
              foundUnit = true;
            }
          });
          favorites.push(property.id);
        }else{
          favorites = [];
          favorites.push(property.id);
        }

        var now = new Date();
        now.setDate(now.getDate() + 30);

        $scope.wishlist = favorites;
        $cookies.putObject('streamline-favorites', favorites, { path : '/', expires : now});
      }

      $scope.changeToListView = function () {
        jQuery('.listings_wrapper_box').hide();
        jQuery('.map-container-wrapper').hide();
        jQuery('.list-container-wrapper').show();
        jQuery('.show_list_name').show();
        jQuery('.show_grid_name').hide();
        jQuery('.show_map_name').hide();
        jQuery('.streamline-pagination-wrapper').show();
      }
      $scope.changeToGridView = function () {
        jQuery('.listings_wrapper_box').show();
        jQuery('.list-container-wrapper').hide();
        jQuery('.map-container-wrapper').hide();
        jQuery('.show_list_name').hide();
        jQuery('.show_map_name').hide();
        jQuery('.show_grid_name').show();
        jQuery('.streamline-pagination-wrapper').show();
      }
      $scope.changeToMapView = function () {
        jQuery('.map-container-wrapper').show();
        jQuery('.listings_wrapper_box').hide();
        jQuery('.list-container-wrapper').hide();
        jQuery('.show_list_name').hide();
        jQuery('.show_grid_name').hide();
        jQuery('.show_map_name').show();
        jQuery('.streamline-pagination-wrapper').hide();
        google.maps.event.trigger(mapp, 'resize');
      }
	  
	    $scope.loadRecents = function(){
        $scope.load = true;
        var recent_ids = $cookies.getObject('streamline-recents');

        var params = {
          include_units : recent_ids.join()
        };

        rpapi.getWithParams('GetPropertyListWordPress', params).success(function (obj) {
          $scope.load = false;

          if(obj.data.property){
            if(obj.data.property.id){
              $scope.recentsObj = [];
              $scope.recentsObj.push(obj.data.property);
            }else{
              $scope.recentsObj = Object.keys(obj.data.property).map(function(key) {
                return obj.data.property[key];
              });
            }
          }          
        });
      }

      // $scope.inqProps = function(property){
      //   $scope.inqMaxOccs = property.max_occupants;
      //   $scope.inqMaxPets = property.max_pets;
      // }

      // $scope.$watch('search.occupants', function() {
      //   $scope.availabilitySearch($scope.search);
      // });

      // $scope.$watch('search.occupants_small', function() {
      //   $scope.availabilitySearch($scope.search);
      // });

      // $scope.$watch('search.pets', function() {
      //   $scope.availabilitySearch($scope.search);
      // });

      // $scope.$watch('search.num_bedrooms', function() {
      //   $scope.availabilitySearch($scope.search);
      // });

      // $scope.plusAdultsInquiry = function(max, value) {
      //   if ($scope.inquiry.occupants == null)
      //       $scope.inquiry.occupants = value;

      //   if ($scope.inquiry.occupants == $scope.inqMaxOccs) {
      //       //do nothing
      //   } else {
      //       $scope.inquiry.occupants++;
      //   }
      // }

      // $scope.plusChildrenInquiry = function(max, value) {
      //   if ($scope.inquiry.occupantsSmall == null)
      //       $scope.inquiry.occupantsSmall = value;

      //   if ($scope.inquiry.occupantsSmall == $scope.inqMaxOccs) {
      //       //do nothing
      //   } else {
      //       $scope.inquiry.occupantsSmall++;
      //   }
      // }

      // $scope.plusPetsInquiry = function(max, value) {
      //   if ($scope.inquiry.pets == null)
      //       $scope.inquiry.pets = value;

      //   if ($scope.inquiry.pets == $scope.inqMaxPets) {
      //       //do nothing
      //   } else {
      //       $scope.inquiry.pets++;
      //   }
      // }


      // $scope.plus = function(max, type) {

      //   if (type == 'search.occupants') {
      //     if ($scope.search.occupants == max) {
      //       //do nothing
      //     } else {
      //       $scope.search.occupants++;
      //     }
      //     console.log($scope.search.occupants);
      //   }

      //   if (type == 'inquiry_occupants') {
      //     $scope.inquiry.occTotal = parseInt($scope.inquiry.occupantsSmall) + parseInt($scope.inquiry.occupants);
      //     if ($scope.inquiry.occTotal == max) {
      //       //do nothing
      //     } else {
      //       $scope.inquiry.occupants++;
      //     }
      //   }

      //   if (type == 'modal_occupants') {
      //     $scope.occTotal = parseInt($scope.modal_occupants_small) + parseInt($scope.modal_occupants);
      //     if ($scope.occTotal == max) {
      //       //do nothing
      //     } else {
      //       $scope.modal_occupants++;
      //     }
      //   }

      //   if (type == 'inquiry_occupants_small') {
      //     $scope.inquiry.occTotal = parseInt($scope.inquiry.occupantsSmall) + parseInt($scope.inquiry.occupants);
      //     if ($scope.inquiry.occTotal == max) {
      //       //do nothing
      //     } else {
      //       $scope.inquiry.occupantsSmall++;
      //     }
      //   }

      //   if (type == 'search.occupants_small') {
      //     if ($scope.search.occupants_small == max) {
      //       //do nothing
      //     } else {
      //       $scope.search.occupants_small++;
      //     }
      //   }

      //   if (type == 'modal_occupants_small') {
      //     $scope.occTotal = parseInt($scope.modal_occupants_small) + parseInt($scope.modal_occupants);
      //     if ($scope.occTotal == max) {
      //       //do nothing
      //     } else {
      //       $scope.modal_occupants_small++;
      //     }
      //   }

      //    if (type == 'search.pets'){
      //     if ($scope.search.pets == max) {
      //       //do nothing
      //     } else {
      //       $scope.search.pets++;
      //     }
      //   }

      //   if (type == 'modal_pets') {
      //     if ($scope.modal_pets == max) {
      //       //do nothing
      //     } else {
      //       $scope.modal_pets++;
      //     }
      //   }

      //   if (type == 'inquiry_pets') {
      //     if ($scope.inquiry.pets == max) {
      //       //do nothing
      //     } else {
      //       $scope.inquiry.pets++;
      //     }
      //   }

      //   if (type == 'search.num_bedrooms') {

      //     if ($scope.search.num_bedrooms == max) {
      //       //do nothing
      //     } else if($scope.search.num_bedrooms === '') {
      //         $scope.search.num_bedrooms = 0;
      //     } else {
      //       $scope.search.num_bedrooms++;
      //     }
      //   }
      // }

      // $scope.minus = function(min, type) {

      //   if (type == 'search.occupants') {
      //     if ($scope.search.occupants == min) {
      //       $scope.search.occupants = null;
      //     } else if($scope.search.occupants == 0 || $scope.search.occupants == null) {
      //       //do nothing
      //     } else {
      //       $scope.search.occupants--;
      //     }
      //   }

      //   if (type == 'inquiry_occupants') {
      //     if ($scope.inquiry.occupants == min) {
      //       //do nothing
      //     } else if($scope.inquiry.occupants == 0) {
      //       //do nothing
      //     } else {
      //       $scope.inquiry.occupants--;
      //     }
      //   }

      //   if (type == 'modal_occupants') {
      //     if ($scope.modal_occupants == min) {
      //       //do nothing
      //     } else if($scope.modal_occupants == 0) {
      //       //do nothing
      //     } else {
      //       $scope.modal_occupants--;
      //     }
      //   }

      //   if (type == 'inquiry_occupants_small') {
      //     if ($scope.inquiry.occupantsSmall == min) {
      //       //do nothing
      //     } else if($scope.inquiry.occupantsSmall == 0) {
      //       //do nothing
      //     } else {
      //       $scope.inquiry.occupantsSmall--;
      //     }
      //   }

      //   if (type == 'search.occupants_small') {
      //     if ($scope.search.occupants_small == min) {
      //       $scope.search.occupants_small = null;
      //     } else if($scope.search.occupants_small == 0 || $scope.search.occupants_small == null) {
      //       //do nothing
      //     } else {
      //       $scope.search.occupants_small--;
      //     }
      //   }

      //   if (type == 'modal_occupants_small') {
      //     if ($scope.modal_occupants_small == min) {
      //       //do nothing
      //     } else if($scope.modal_occupants_small == 0) {
      //       //do nothing
      //     } else {
      //       $scope.modal_occupants_small--;
      //     }
      //   }

      //   if (type == 'search.pets') {
      //     if ($scope.search.pets == min) {
      //       $scope.search.pets = null;
      //     } else if($scope.search.pets == 0 || $scope.search.pets == null) {
      //       //do nothing
      //     } else {
      //       $scope.search.pets--;
      //     }
      //   }

      //   if (type == 'modal_pets') {
      //     if ($scope.modal_pets == min) {
      //       //do nothing
      //     } else if($scope.modal_pets == 0) {
      //       //do nothing
      //     } else {
      //       $scope.modal_pets--;
      //     }
      //   }

      //   if (type == 'inquiry_pets') {
      //     if ($scope.inquiry.pets == min) {
      //       //do nothing
      //     } else if($scope.inquiry.pets == 0) {
      //       //do nothing
      //     } else {
      //       $scope.inquiry.pets--;
      //     }
      //   }

      //   if (type == 'search.num_bedrooms') {
      //     if ($scope.search.num_bedrooms == min) {
      //       $scope.search.num_bedrooms = '';
      //     } else if($scope.search.num_bedrooms == 0 || $scope.search.num_bedrooms == null) {
      //       //do nothing
      //     } else {
      //       $scope.search.num_bedrooms--;
      //     }
      //   }
      // }

      // $scope.resetGuests = function() {
      //     $scope.search.occupants = '0';
      //     $scope.search.occupants_small = '0';
      //     $scope.search.pets = '0';
      //     $scope.search.num_bedrooms = '0';
      // }

      // $scope.closeGuests = function() {
      //   $scope.class = "hide.bs.dropdown";
      // }

	  
	    $scope.addToRecents = function(property){

        var recents = $cookies.getObject('streamline-recents');
        if(recents){
          var foundUnit = false;
          angular.forEach(recents, function(value, key) {
            if(property.id == value){
              foundUnit = true;
            }
          });
          if (!foundUnit) {
              recents.unshift(property.id);
            }
          if(recents.length > 3) {
            recents.pop();
          }
        }else{
          recents = [];
          recents.push(property.id);
        }

        var now = new Date();
        now.setDate(now.getDate() + 30);

        $scope.recentProp = recents;
        $cookies.putObject('streamline-recents', recents, {
          path: '/',
          expires: now
        });

      }

      $scope.propertyInquiry = function (inquiry, popup) {

        run_waitMe('#myModal2 .modal-dialog, #inquiry_box', 'bounce', 'Please wait, sending inquiry...');
        setTimeout(function () {

          var params = {
            unit_id: inquiry.unit_id,
            not_blocked_request: 'yes',
            startdate: inquiry.startDate,
            enddate: inquiry.endDate,
            occupants: inquiry.occupants,
            occupants_small: inquiry.occupantsSmall,
            first_name: inquiry.first_name,
            last_name: inquiry.last_name,
            email: inquiry.email,
            mobile_phone: inquiry.phone,
            extra_notes: inquiry.message,
            pets: inquiry.pets,
            disable_minimal_days: 'yes'
          };

          if($rootScope.bookingSettings.hearedAboutId && $rootScope.bookingSettings.hearedAboutId > 0){
            params['hear_about_id'] = $rootScope.bookingSettings.hearedAboutId;
          }

          rpapi.getWithParams('MakeReservation', params).success(function (obj) {
            hide_waitMe('#myModal2 .modal-dialog, #inquiry_box');
            if (obj.status) {
              Alert.add(Alert.errorType, obj.status.description);
            } else {
              $scope.resetInquiry();
              if($rootScope.bookingSettings && $rootScope.bookingSettings.inquiryThankUrl != ''){
               $window.location.href = $rootScope.bookingSettings.inquiryThankUrl
              } else {                
                Alert.add(Alert.successType, $rootScope.bookingSettings.inquiryThankMsg);
                alert($rootScope.bookingSettings.inquiryThankMsg)
                jQuery('#resortpro_btn_inquiry').prop('disabled', true);
                if(popup){
                  jQuery('#myModal2').modal('hide');
                }
              }
            }
          });
        }, 500);

        return false;
      }

      $scope.saveFavorites = function (favorites) {

        run_waitMe('#modalFav .modal-dialog, #inquiry_box', 'bounce', 'Please wait, saving favorites...');
        setTimeout(function () {
          
          var unit_id = 0;
          var str_favorites = '';
          angular.forEach($scope.favoritesObj, function(prop, key) {
            if(unit_id == 0){
              unit_id = prop.id;              
            }
            str_favorites += prop.name + ',\n\r';
          });

          var params = {
            unit_id: unit_id,
            not_blocked_request: 'yes',
            startdate: favorites.startDate,
            enddate: favorites.endDate,
            occupants: 1,
            occupants_small: 0,
            first_name: favorites.first_name,
            last_name: favorites.last_name,
            email: favorites.email,
            favorites: favorites.phone,
            extra_notes: "Comments: " + favorites.message + ". Favorite Units: \n\r" + str_favorites,
            pets: 0,
            disable_minimal_days: 'yes'
          };
                    
          rpapi.getWithParams('MakeReservation', params).success(function (obj) {
            hide_waitMe('#modalFav .modal-dialog, #inquiry_box');
            if (obj.status) {
              Alert.add(Alert.errorType, obj.status.description);
            } else {
              $scope.resetFavorites();
              
              Alert.add(Alert.successType, 'Favorites saved successfully');
              
              setTimeout(function () {
                jQuery('#modalFav').modal('hide');
              }, 3000);
            }
          });
          
        }, 500);

        return false;
      }

      $scope.loadCompare = function() {
            $scope.loading = true;
            var compare_ids = $cookies.getObject("streamline-compare-units");
            if (compare_ids) {
                var params = {
                    include_units: compare_ids.join(),
                    additional_variables: 1,
                };
                var cmp_amenity = {};
                rpapi.getWithParams("GetPropertyListWordPress", params).success(function(obj) {
                    $scope.loading = false;
                    angular.forEach(obj.data.property, function(value, property) {
                        if (value.unit_amenities !== null) {
                            angular.forEach(value.unit_amenities.amenity, function(amenity, key) {
                                if ($scope.compareAmenities != "undefined" && amenity.amenity_show_on_website == "yes") {
                                    if (property === 0) {
                                        cmp_amenity[amenity.amenity_name] = [{
                                            name: amenity.amenity_name
                                        }, {
                                            prop1: 1
                                        }, {
                                            prop2: 0
                                        }, {
                                            prop3: 0
                                        }]
                                    }
                                    if (property !== 0) {
                                        if (amenity.amenity_name in cmp_amenity) {
                                            if (property === 1) {
                                                cmp_amenity[amenity.amenity_name][2].prop2 = 1
                                            } else {
                                                cmp_amenity[amenity.amenity_name][3].prop3 = 1
                                            }
                                        } else {
                                            if (property === 1) {
                                                cmp_amenity[amenity.amenity_name] = [{
                                                    name: amenity.amenity_name
                                                }, {
                                                    prop1: 0
                                                }, {
                                                    prop2: 1
                                                }, {
                                                    prop3: 0
                                                }]
                                            } else {
                                                cmp_amenity[amenity.amenity_name] = [{
                                                    name: amenity.amenity_name
                                                }, {
                                                    prop1: 0
                                                }, {
                                                    prop2: 0
                                                }, {
                                                    prop3: 1
                                                }]
                                            }
                                        }
                                    }
                                }
                            });
                        }
                    });
                    if (obj.data.property.id) {
                        $scope.compareObj = [];
                        $scope.compareObj.push(obj.data.property)
                    } else {
                        $scope.compareObj = Object.keys(obj.data.property).map(function(key) {
                            obj.data.property[key].compareAmenities = cmp_amenity;
                            return obj.data.property[key]
                        })
                    }
                })
            } else {
                return false
            }
        };
        $scope.checkCompare = function(property) {
            var compare = $cookies.getObject("streamline-compare-units");
            var found = false;
            if (compare) {
                angular.forEach(compare, function(value, key) {
                    if (property.id == value) {
                        found = true
                    }
                })
            }
            return found
        };
        $scope.removeFromCompare = function(property) {
            var compare = $cookies.getObject("streamline-compare-units");
            if (compare) {
                angular.forEach(compare, function(value, key) {
                    if (property.id == value) {
                        compare.splice(key, 1)
                    }
                });
                if (compare.length == 0) {
                    $cookies.remove("streamline-compare-units", {
                        path: "/"
                    })
                } else {
                    $cookies.putObject("streamline-compare-units", compare, {
                        path: "/"
                    })
                }
            }
            if (window.location.pathname == "/compare/") {
                if (compare.length == 2) {
                    $window.location.href = "/compare"
                }
                if (compare.length == 1) {
                    $window.location.href = "/search-results"
                }
            }
        };
        $scope.addToCompare = function(property) {
            var compare = $cookies.getObject("streamline-compare-units");
            if (compare) {
                var foundUnit = false;
                angular.forEach(compare, function(value, key) {
                    if (property.id == value) {
                        foundUnit = true
                    }
                    if (compare.length >= 3) {
                        compare.splice(key, 1)
                    }
                });
                compare.push(property.id)
            } else {
                compare = [];
                compare.push(property.id)
            }
            var now = new Date;
            now.setDate(now.getDate() + 30);
            $cookies.putObject("streamline-compare-units", compare, {
                path: "/",
                expires: now
            });
            if (compare.length == 3) {
                $window.location.href = "/compare"
            }
        };
        $scope.readyToCompare = function(property) {
            var compare = $cookies.getObject("streamline-compare-units");
            var comparing = 3;
            if (compare) {
                if (compare.length == 1) comparing = 2;
                if (compare.length == 2) comparing = 1;
                if (compare.length == 3) {
                    comparing = 0
                }
            }
            return comparing
        };
        $scope.clearCompare = function(property) {
            $cookies.remove("streamline-compare-units", {
                path: "/"
            })
        };

        $scope.isMobile = function(){
            if(window.innerWidth <= 600 && window.innerHeight <= 900) {
                return true;
            } else {
                return false;
            }
        }

        $scope.$watch($scope.isMobile, function () {
        }, true);

        angular.element($window).bind('orientationchange', function () {
            $scope.$apply();
        });

    }
  ]);
})();
