(function() {
  var directives = angular.module('resortpro.directives', []);

  directives.directive('ngAlt', function () {
    return {
      restrict: 'A',
      link: function (scope, elem, attrs) {
        if (attrs.ngAlt) {
          elem.on('load', function (event) {
            elem[0].setAttribute("alt", attrs.ngAlt);
          });
        }
      }
    };
  });

  directives.directive('errSrc', function () {
    return {
      link: function (scope, element, attrs) {
        scope.$watch(function () {
          return attrs['ngSrc'];
        }, function (value) {
          if (!value) {
            element.attr('src', attrs.errSrc);
          }
        });

        element.bind('error', function () {
          if (attrs.src != attrs.errSrc) {
            attrs.$set('src', attrs.errSrc);
          }
        });
      }
    }
  });

  directives.directive("calendar", function ($rootScope) {
    return {
      restrict: "A",
      require: "ngModel",
      scope: {
        showDays: '&',
        updateModalCheckin: '&'
      },
      link: function (scope, elem, attrs, pCtrl) {
        var options = {
          dateFormat: "mm/dd/yy",
          minDate: 0,
          numberOfMonths: $rootScope.bookingSettings.select_nr_months_calendar,
          showButtonPanel: false,
          onSelect: function (dateText) {

            scope.updateModalCheckin({date: dateText});
            pCtrl.$setViewValue(dateText);

            var myDateArr = dateText.split('/');
            var month = myDateArr[0] - 1;
            var day = myDateArr[1];
            var numDays = 0;
            var foundDay = false;
            jQuery('.availability-calendar .ui-datepicker-calendar td').each(function () {
              if (jQuery(this).attr('data-month') == month) {
                if (parseInt(jQuery(this).find('a').html()) > parseInt(day)) {
                  foundDay = true;
                  numDays++;
                } else if (foundDay) {
                  return false;
                }
              }
            });

            jQuery('#modal_checkin').val(dateText);
            jQuery('#myModal').modal();
            setTimeout(function () {
              add_tooltip();
            }, 500);
          },
          beforeShowDay: function (date) {
            return scope.showDays({date: date});
          },
          onChangeMonthYear: function (year, month, inst) {
            setTimeout(function () {
              add_tooltip();
            }, 500);
          }
        };

        // jqueryfy the element
        elem.datepicker(options);
      }
    }
  });
  
  directives.directive('scrollTo', function ($location, $anchorScroll) {
    return function(scope, element, attrs) {
    element.bind('click', function(event) {
            event.stopPropagation();
            scope.$on('$locationChangeStart', function(ev) {
              ev.preventDefault();
            });
            var location = attrs.scrollTo;
            $location.hash(location);
            $anchorScroll();
        });
    };
  });

  directives.directive('sdpicker', function () {
    return {
      restrict: 'A',
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        jQuery(function () {

          var checkin_days = 0;
          if(!isNaN(jQuery('#filter_start_date').data('checkin-days'))){
            checkin_days = jQuery('#filter_start_date').data('checkin-days');
          }

          var str_filterturndates = jQuery('#filter_start_date').data('filterturndates');
          var arr_filterturndates = [];
    
          if(typeof str_filterturndates == 'number'){      
            arr_filterturndates.push(str_filterturndates.toString());
          }else{      
            if(str_filterturndates && str_filterturndates.indexOf(",") > -1){        
              arr_filterturndates = str_filterturndates.split(',');
            }
          }

          element.datepicker({
            dateFormat: 'mm/dd/yy',
            minDate: "+"+checkin_days+"d",
            onSelect: function (date) {
              ngModelCtrl.$setViewValue(date);
              scope.$apply();
              var frm = new Date(date);
              nts = 1;
              if (!isNaN(jQuery('#filter_start_date').attr('data-min-stay'))) {
                nts = parseInt(jQuery('#filter_start_date').attr('data-min-stay'));
              }
              var the_year = frm.getFullYear();
              if (the_year < 2000) the_year = 2000 + the_year % 100;
              var to = new Date(the_year, frm.getMonth(), frm.getDate() + nts);
              jQuery('#filter_end_date').datepicker('option', 'minDate', to);

              setTimeout(function(){jQuery('#filter_end_date').datepicker('show')},0);

              scope.search.start_date = frm.format("mm/dd/yyyy");
              
              scope.clearProperties();
              scope.availabilitySearch(scope.search);
            },
            beforeShowDay: function(date) {
              var is_available = true;
              var class_day = 'available';              
              
              if(arr_filterturndates.length > 0 && jQuery.inArray( date.getUTCDay().toString(), arr_filterturndates) == -1){        
                is_available = false;
              }
              
              if(!is_available){
                class_day = 'booked';
              }   

              return [is_available, class_day];        
            }
          });
        });
      }
    }
  });

  directives.directive('edpicker', function () {
    return {
      restrict: 'A',
      minDate: "+1d",
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        jQuery(function () {
          var startdate = jQuery('#filter_start_date').val();
          var frm = new Date(startdate);

          var str_filterturndates = jQuery('#filter_start_date').data('filterturndates');
          var arr_filterturndates = [];
    
          if(str_filterturndates != '' && !isNaN(str_filterturndates)){      
            arr_filterturndates.push(str_filterturndates.toString());
          }else{      
            if(str_filterturndates && str_filterturndates.indexOf(",") > -1){        
              arr_filterturndates = str_filterturndates.split(',');
            }
          }

          element.datepicker({
            dateFormat: 'mm/dd/yy',
            minDate: frm,
            onSelect: function (date) {
              ngModelCtrl.$setViewValue(date);
              scope.$apply();
              var frm = new Date(date);
              var the_year = frm.getFullYear();
              if (the_year < 2000) the_year = 2000 + the_year % 100;
              var to = new Date(the_year, frm.getMonth(), frm.getDate());
              scope.search.end_date = to.format("mm/dd/yyyy");
              scope.clearProperties();
              scope.availabilitySearch(scope.search);
            },beforeShowDay: function(date) {
              var is_available = true;
              var class_day = 'available';              
              
              var start_date = jQuery('#filter_start_date').datepicker('getDate');
              if(start_date){
                if(arr_filterturndates.length > 0 && start_date.getUTCDay().toString() != date.getUTCDay().toString()){
                  is_available = false;
                  class_day = 'booked'
                }
              }else{
                if(arr_filterturndates.length > 0 && jQuery.inArray( date.getUTCDay().toString(), arr_filterturndates) == -1){
                  is_available = false;
                }
                
                if(!is_available){
                  class_day = 'booked';
                }
              }

              return [is_available, class_day];        
            }
          });
        });
      }
    }
  });


  directives.directive('bookcheckin', function ($rootScope) {
    return {
      restrict: 'A',
      scope: {
        showDays: '&',
        updatePrice: '&',
        updateCheckout: '&'
      },
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        jQuery(function () {

          var days = 0;
          var appendTimeout;
          var calendarTips = '<ul class="calendar-tips"><li class="cal-selectable"><span>Checkin Available</span></li><li class="cal-available"><span>Checkout Available</span></li><li class="cal-unavailable"><span>Not Available</span></li></ul>';
          function appendText(text) {
            clearTimeout(appendTimeout);
            appendTimeout= setTimeout(function() {
                jQuery('#ui-datepicker-div .ui-datepicker-calendar').after('<div>' + text + '</div>');
            }, 50);
          }

          if (!isNaN(jQuery('#book_start_date').attr('data-checkin-days'))) {
              days = jQuery('#book_start_date').attr('data-checkin-days');
          }
          element.datepicker({
            dateFormat: 'mm/dd/yy',
            minDate: "+"+days+"d",
            onSelect: function (date) {
              ngModelCtrl.$setViewValue(date);
              scope.$apply();
              var frm = new Date(date);
              nts = 1;
              if (!isNaN(jQuery('#book_start_date').attr('data-min-stay'))) {
                nts = jQuery('#book_start_date').attr('data-min-stay');
              }
              var the_year = frm.getFullYear();
              if (the_year < 2000) the_year = 2000 + the_year % 100;
              var to = new Date(the_year, frm.getMonth(), parseInt(frm.getDate()) + parseInt(nts));
              jQuery('#book_end_date').datepicker('option', 'minDate', to);
              scope.updateCheckout({date: to});
              //scope.updatePrice();
            },
            onClose: function(){
              setTimeout(function(){jQuery('#book_end_date').datepicker('show')},0);
            },
            beforeShowDay: function (date) {
              return scope.showDays({date: date});
            },
            beforeShow: function(){
              appendText(calendarTips);
            },
            onChangeMonthYear: function(){              
              appendText(calendarTips);
            }
          });
        });
      }
    }
  });

  directives.directive('bookcheckout', function ($rootScope) {
    return {
      restrict: 'A',
      scope: {
        showDays: '&',
        updatePrice: '&'
      },
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        jQuery(function () {
          var startdate = jQuery('#book_start_date').val();
          var frm = new Date(startdate);
          var appendTimeout;
          var calendarTips = '<ul class="calendar-tips"><li class="cal-available"><span>Checkin Available</span></li><li class="cal-selectable"><span>Checkout Available</span></li><li class="cal-unavailable"><span>Not Available</span></li><ul/>';
          function appendText(text) {
            clearTimeout(appendTimeout);
            appendTimeout= setTimeout(function() {
                jQuery('#ui-datepicker-div .ui-datepicker-calendar').after('<div>' + text + '</div>');
            }, 50);
          }
          element.datepicker({
            dateFormat: 'mm/dd/yy',
            minDate: frm,
            onSelect: function (date) {
              scope.$apply(function () {
                ngModelCtrl.$setViewValue(date);
              });
              scope.updatePrice();
            },
            beforeShowDay: function (date) {
              return scope.showDays({date: date});
            },
            beforeShow: function(){
              appendText(calendarTips);
            },
            onChangeMonthYear: function(){              
              appendText(calendarTips);
            }
          });
        });
      }
    }
  });

  directives.directive('sliderange', function ($rootScope) {
    return {
      restrict: 'A',
      scope: {
        showAvailability: '&',
        minPrice: '=',
        maxPrice: '='
      },
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        jQuery(function () {
          element.slider({
            range: true,
            min: scope.minPrice,
            max: scope.maxPrice,
            step: 10,
            values: [scope.minPrice, scope.maxPrice],
            slide: function (event, ui) {
              jQuery("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            },
            change: function (event, ui) {
              scope.showAvailability({minPrice: ui.values[0], maxPrice: ui.values[1]});
              scope.$apply();
            }
          });
          jQuery('#amount').val('$' + scope.minPrice + ' - $' + scope.maxPrice);
        });
      }
    }
  });

  directives.directive('bedroomrange', function ($rootScope) {
    return {
      restrict: 'A',
      scope: {
        showAvailability: '&',
        minBedroomsNumber: '=',
        maxBedroomsNumber: '='
      },
      // require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        jQuery(function () {
          element.slider({
            range: true,
            min: scope.minBedroomsNumber,
            max: scope.maxBedroomsNumber,
            step: 1,
            values: [scope.minBedroomsNumber, scope.maxBedroomsNumber],
            slide: function (event, ui) {
              jQuery("#streamlinecore_fw_bedrooms_number").val("Min Bed:" + ui.values[0] + " - Max Bed:" + ui.values[1]);
            },
            change: function (event, ui) {

              scope.showAvailability({minBedroomsNumber: ui.values[0], maxBedroomsNumber: ui.values[1]});
              scope.$apply();
              // console.dir(search);
              // console.dir(scope.search);
            }
          });
          jQuery('#streamlinecore_fw_bedrooms_number').val('Min Bed:' + scope.minBedroomsNumber + ' - Max Bed:' + scope.maxBedroomsNumber);
        });
      }
    }
  });

  directives.directive('adultsrange', function ($rootScope) {
    return {
      restrict: 'A',
      scope: {
        showAvailability: '&',
        minAdultsNumber: '=',
        maxAdultsNumber: '='
      },
      // require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        jQuery(function () {
          element.slider({
            range: true,
            min: scope.minAdultsNumber,
            max: scope.maxAdultsNumber,
            step: 1,
            values: [scope.minAdultsNumber, scope.maxAdultsNumber],
            slide: function (event, ui) {
              jQuery("#streamlinecore_fw_adults").val("Min Adults:" + ui.values[0] + " - Max Adults:" + ui.values[1]);
            },
            change: function (event, ui) {

              scope.showAvailability({minAdultsNumber: ui.values[0], maxAdultsNumber: ui.values[1]});
              scope.$apply();
              // console.dir(search);
              // console.dir(scope.search);
            }
          });
          jQuery('#streamlinecore_fw_adults').val('Min Adults:' + scope.minAdultsNumber + ' - Max Adults:' + scope.maxAdultsNumber);
        });
      }
    }
  });

  directives.directive('modalcheckin', function ($rootScope) {
    return {
      restrict: 'A',
      scope: {
        showDays: '&',
        updatePrice: '&'
      },
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        jQuery(function () {

          element.datepicker({
            dateFormat: 'mm/dd/yy',
            minDate: "+1d",
            onSelect: function (date) {
              ngModelCtrl.$setViewValue(date);
              scope.$apply();
              var frm = new Date(date);
              nts = 1;
              if (!isNaN(jQuery('#modal_end_date').attr('data-min-stay'))) {
                nts = jQuery('#modal_end_date').attr('data-min-stay');
              }

              var the_year = frm.getFullYear();
              if (the_year < 2000) the_year = 2000 + the_year % 100;
              var to = new Date(the_year, frm.getMonth(), parseInt(frm.getDate()) + parseInt(nts));

              jQuery('#modal_end_date').datepicker('option', 'minDate', to);

              scope.updatePrice();
            },
            beforeShowDay: function (date) {
              return scope.showDays({date: date});
            }
          });
        });
      }
    }
  });

  directives.directive('modalcheckout', function ($rootScope) {
    return {
      restrict: 'A',
      scope: {
        showDays: '&',
        updatePrice: '&'
      },
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        jQuery(function () {

          element.datepicker({
            dateFormat: 'mm/dd/yy',
            minDate: "+1d",
            onSelect: function (date) {
              ngModelCtrl.$setViewValue(date);
              scope.$apply();

              scope.updatePrice();
            },
            beforeShowDay: function (date) {
              return scope.showDays({date: date});
            }
          });
        });
      }
    }
  });

  directives.directive('starRating', function () {
    return {
      restrict: 'A',
      template: '<ul class="rating">\
                  <li ng-repeat="star in stars" ng-class="star">\
                  <i ng-if="star.filled" class="fa {[star.filled]}"></i></li>\
                </ul>',
      scope: {
        ratingValue: '=',
        max: '='
      },
      link: function (scope, elem, attrs) {
        scope.stars = [];
        for (var i = 0; i < scope.max; i++) {

          var star = "fa-star-o";
          if(i < scope.ratingValue){
            var modu = scope.ratingValue % 1;
            if(i+1 < scope.ratingValue){
              star = "fa-star";
            }else{
              if(modu != 0){
                if(modu <= 0.5){
                  star = "fa-star-o";
                }else{
                  star = "fa-star-half-o";
                }

              }else{
                star = "fa-star";
              }
            }

          }

          scope.stars.push({
            filled: star
          });
        }
      }
    }
  });

  directives.directive('checkRequired', function () {
    return {
      restrict: 'A',
      require: 'ngModel',
      link: function (scope, element, attrs, ngModel) {
        ngModel.$validators.checkRequired = function (modelValue, viewValue) {
         var value = modelValue || viewValue;
         var match = scope.$eval(attrs.ngTrueValue) || true;
         return value && match === value;
       };
      }
    }
  });
})();
