/****************************
 *
 * Checkout funcitons.  Only add functions related to checkout here
 *
 ***************************/
(function () {
  var app = angular.module('resortpro.checkout', ['resortpro.services', 'resortpro.filters', 'resortpro.directives', 'ngCookies']);

  app.controller('CheckoutController', ['$scope', '$rootScope', '$sce', '$http', '$window', '$filter', '$location', 'Alert', 'rpapi', 'rpuri', '$cookies',
    function ($scope, $rootScope, $sce, $http, $window, $filter, $location, Alert, rpapi, rpuri, $cookies) {
      $scope.error = false;
      $scope.startDate = $filter('date')(rpuri.getQueryStringParam('sd'), 'MM/dd/yyyy');
      $scope.endDate = $filter('date')(rpuri.getQueryStringParam('ed'), 'MM/dd/yyyy');
      $scope.unit = rpuri.getQueryStringParam('unit');
      $scope.occupants = rpuri.getQueryStringParam('oc');
      $scope.occupants_small = rpuri.getQueryStringParam('os');
      $scope.pets = rpuri.getQueryStringParam('pets');
      $scope.amenities = [];
      $scope.hasAddOns = false;
      $scope.hasTravelInsurance = false;
      $scope.hasDamageProtection = false;
      $scope.hasCfar = false;
      $scope.protectionError = false;
      $scope.confirmationId = 0;
      $scope.referrer_url = '';
      $scope.pbgEnabled = false;
      $scope.optionalItems = '';
      $scope.cookieCheckout = {};
      $scope.cookieConfirmation = {};

      // load year drop down
      var year = new Date().getFullYear();
      var range = [];
      range.push(year);

      for (var i = 1; i < 10; i++) {
        range.push(year + i);
      }

      $scope.years = range;
      $scope.stepOneDisabled = true;
      $scope.stepTwoDisabled = true;
      //$scope.chkTravelInsuranceR = false;
      $scope.chkTravelInsurance = false;
      $scope.chkCfar = false;
      $scope.chkTravelInsuranceR = {selectedOption: false};
      $scope.chkDamageWaiverR = {selectedOption: false};
      $scope.chkCfarR = {selectedOption: false};
      $scope.validateStepOne = function (checkout) {
        if (checkout) {
          if (checkout.fname && checkout.lname && checkout.email && checkout.phone) {
            $scope.stepOneDisabled = false;
          } else {
            $scope.stepOneDisabled = true;
          }
        }
      }

      $scope.createCheckoutCookie = function(){
        var now = new Date();
        now.setDate(now.getDate() + 30);

        if($scope.checkout.fname){
          $scope.cookieCheckout['fname'] = $scope.checkout.fname;
        }
        if($scope.checkout.lname){
          $scope.cookieCheckout['lname'] = $scope.checkout.lname;
        }
        if($scope.checkout.email){
          $scope.cookieCheckout['email'] = $scope.checkout.email;
        }
        if($scope.checkout.phone){
          $scope.cookieCheckout['phone'] = $scope.checkout.phone;
        }

        var res = $cookies.putObject('streamline-checkout-cookie', $scope.cookieCheckout, { path : '/', expires : now});
      }

      $scope.validateStepTwo = function () {
        var travelOk = true;
        var damageOk = true;

        if (($scope.hasTravelInsurance || $scope.hasCfar) && !($scope.chkCfar || $scope.chkTravelInsurance || $scope.chkTravelInsuranceNo)) {
          travelOk = false;
        }

        if (($scope.hasDamageProtection && !($scope.chkDamageWaiver || $scope.chkDamageWaiverNo))) {
          damageOk = false;          
        }

        if (travelOk && damageOk) {
          $scope.stepTwoDisabled = false;
        } else {

          $scope.stepTwoDisabled = true;
        }

        $scope.getPreReservation();
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

      $scope.toggleCfar = function (feeId) {

        if ($scope.chkCfarR.selectedOption) {
          $scope.chkCfar = true;
          $scope.chkTravelInsuranceNo = false;
          $scope.chkTravelInsurance = false;
          $scope.chkTravelInsuranceR.selectedOption = false;

        } else {
          $scope.chkCfar = false;
        }

        setTimeout(function () {
          $scope.validateStepTwo();
        }, 100);
      }

      $scope.toggleTravelInsurance = function (feeId) {
        if ($scope.chkTravelInsuranceR.selectedOption) {
          $scope.chkTravelInsurance = true;
          $scope.chkCfar = false;
          $scope.chkCfarR.selectedOption = false;
          $scope.chkTravelInsuranceNo = false;
        } else {
          $scope.chkTravelInsurance = false;
        }

        setTimeout(function () {
          $scope.validateStepTwo();
        }, 100);
      }

      $scope.acceptCfar = function () {

        if ($scope.chkCfar) {
          $scope.chkTravelInsurance = false;
          $scope.chkTravelInsuranceNo = false;
          $scope.chkCfarR.selectedOption = true;
          $scope.chkTravelInsuranceR.selectedOption = false;
        } else {

          $scope.chkCfarR.selectedOption = false;
        }

        setTimeout(function () {
          $scope.validateStepTwo();
        }, 100);
      }

      $scope.acceptTravelInsurance = function () {

        if ($scope.chkTravelInsurance) {
          $scope.chkCfar = false;
          $scope.chkTravelInsuranceNo = false;
          $scope.chkTravelInsuranceR.selectedOption = true;
          $scope.chkCfarR.selectedOption = false;
        } else {
          $scope.chkTravelInsuranceR.selectedOption = false;
        }

        setTimeout(function () {
          $scope.validateStepTwo();
        }, 100);
      }

      $scope.rejectTravelInsurance = function () {
        if ($scope.chkTravelInsuranceNo) {
          $scope.chkTravelInsurance = false;
          $scope.chkTravelInsuranceR.selectedOption = false;

          $scope.chkCfar = false;
          $scope.chkCfarR.selectedOption = false;
        }

        setTimeout(function () {
          $scope.validateStepTwo();
        }, 100);
      }

      $scope.getAmenitiesWithRates = function () {
        // params = {};
        // params.startdate = $scope.startDate;
        // params.enddate = $scope.endDate;
        // params.unit_id = $scope.unit;
        //
        // if ($scope.unit && $scope.startDate && $scope.endDate && $scope.occupants) {
        //   rpapi.getWithParams('GetPropertyAmenitiesWithRates', params).success(function (obj) {
        //     if (obj.data.amenity_addon) {
        //       $scope.hasAddOns = true;
        //       if (obj.data.amenity_addon.amenity_id && obj.data.amenity_addon.amenity_cost != '$0.00') {
        //         var amenitiesArray = [];
        //         amenitiesArray.push(obj.data.amenity_addon);
        //         $scope.amenities = amenitiesArray;
        //       } else {
        //         angular.forEach(obj.data.amenity_addon, function (value, key) {
        //           if(value.amenity_cost != '$0.00'){
        //             $scope.amenities.push(value);
        //           }
        //         });
        //       }
        //     }
        //   });
        // }
      }

      $scope.addToReservation = function () {
        var foundAddon = false;
        jQuery(".addOn:checked").each(function (index) {
          if (jQuery(this).prop('checked')) {
            foundAddon = true;
            jQuery('#optional-fee-' + jQuery(this).val()).prop('checked', true);

            var qty = parseInt(jQuery('#qty-optional-fee-' + jQuery(this).val()).val());
            if(!isNaN(qty)){
              jQuery('#label-qty-' + jQuery(this).val()).html(' x ' + jQuery('#qty-optional-fee-' + jQuery(this).val()).val());
            }else{
              jQuery('#label-qty-' + jQuery(this).val()).html('');
            }
          }
        });
        if(foundAddon){
          $scope.getPreReservation();
          jQuery('#modalAmenities').modal('hide')
        }else{
          alert('You have not selected any add-ons.');
          return false;
        }

      }

      $scope.toggleDamageWaiver = function (feeId) {
        if ($scope.chkDamageWaiverR.selectedOption) {
          $scope.chkDamageWaiver = true;
          $scope.chkDamageWaiverNo = false;
        } else {
          $scope.chkDamageWaiver = false;
        }

        setTimeout(function () {
          $scope.validateStepTwo();
        }, 100);
      }

      $scope.acceptDamageWaiver = function () {
        if ($scope.chkDamageWaiver) {
          $scope.chkDamageWaiverNo = false;
          $scope.chkDamageWaiverR.selectedOption = true;
        } else {
          $scope.chkDamageWaiverR.selectedOption = false;
        }

        setTimeout(function () {
          $scope.validateStepTwo();
        }, 100);
      }

      $scope.goToStepTwoA = function(){
        // console.log(jQuery('#btn-step1').attr('disabled').length);
        if( typeof jQuery('#btn-step1').attr('disabled') == 'undefined'){
          jQuery('#step0').collapse('hide');
          jQuery('#step1').collapse('show');
          jQuery('#step2').collapse('hide');
          jQuery('#step3').collapse('hide');
        }
        

        // if(jQuery('#book_start_date').val()=='' && jQuery('#select_adults').val() ==0){
        //   jQuery('.error .date_error').show();
        //   jQuery('.error .adult_error').show();
        //   setTimeout(function() { jQuery(".error .date_error").hide(); }, 3000);
        //   setTimeout(function() { jQuery(".error .adult_error").hide(); }, 3000);
        // }else if(jQuery('#book_start_date').val()=='' && jQuery('#select_adults').val() !=0){
        //   jQuery('.error .date_error').show();
        //   setTimeout(function() { jQuery(".error .date_error").hide(); }, 3000);
        // }else if(jQuery('#book_start_date').val()!='' && jQuery('#select_adults').val() ==0){
        //   jQuery('.error .adult_error').show();
        //   setTimeout(function() { jQuery(".error .adult_error").hide(); }, 3000);
        // }else{
        //   jQuery('#step0').collapse('hide');;
        //   jQuery('#step1').collapse('show');;
        // }
        // jQuery('.sticky').unstick();
        //jQuery('.sticky').contents().unwrap();
        //jQuery(document).scrollTop(0);
        // return false;
      };

      $scope.rejectDamageWaiver = function () {
        if ($scope.chkDamageWaiverNo) {
          $scope.chkDamageWaiver = false;
          $scope.chkDamageWaiverR.selectedOption = false;
        }

        setTimeout(function () {
          $scope.validateStepTwo();
        }, 100);
      }

      $scope.goToStepOne = function(){
          jQuery('#step2').collapse('hide');
          jQuery('#step1').collapse('show');
          jQuery('#step3').collapse('hide');
          if($rootScope.checkout_layout_option == '2'){
            if($scope.reservationDetails.optional_fees.length > 0){
              jQuery('.progress-bar').attr('style', 'width:33%');
              jQuery('.r_protection .dot i').removeClass('fa-check');
              jQuery('.r_protection .dot i').addClass('fa-circle');
              jQuery('.r_protection .circle').removeClass('primary-button');
              jQuery('.r_payment .circle').removeClass('primary-button');
              jQuery('.r_payment .dot i').removeClass('fa-check');
              jQuery('.r_payment .dot i').addClass('fa-circle');
            }else{
              jQuery('.r_payment .circle').removeClass('primary-button');
              jQuery('.r_payment .dot i').removeClass('fa-check');
              jQuery('.r_payment .dot i').addClass('fa-circle');
              jQuery('.progress-bar').attr('style', 'width:50%');
            }
             
          }
      };

      $scope.goToStepZero = function(){
          jQuery('#step0').collapse('show');
          jQuery('#step1').collapse('hide');
          jQuery('#step2').collapse('hide');
          jQuery('#step3').collapse('hide');
      };

      $scope.goToStep2 = function(isPbg){

        $scope.pbgEnabled = isPbg;
        $scope.createCheckoutCookie();

        if($scope.formStep1.$valid){
          if(!$scope.hash && $rootScope.checkoutSettings && $rootScope.checkoutSettings.createLeads == 1 && !$scope.confirmationId > 0){
            //create lead
            var params = {
              not_blocked_request: 'yes',
              startdate: $scope.startDate,
              enddate: $scope.endDate,
              occupants: $scope.occupants,
              occupants_small: $scope.occupants_small,
              first_name: $scope.checkout.fname,
              last_name: $scope.checkout.lname,
              email: $scope.checkout.email,
              mobile_phone: $scope.checkout.phone,
              pets: $scope.pets,
              disable_minimal_days: 'yes'
            };

            if($rootScope.bookingSettings && $rootScope.bookingSettings.hearedAboutId > 0)
              params['hear_about_id'] = $rootScope.bookingSettings.hearedAboutId;

            if($scope.referrer_url != '')
              params['referrer_url'] = $scope.referrer_url;

            if($rootScope.roomTypeLogic == 1){
              params['use_room_type_logic'] = 1;
              params['condo_type_id'] = $scope.checkout.condo_type_id;
              params['location_id'] = $scope.checkout.location_id;
            }else{
              params['unit_id'] = $scope.unit;
            }

            params['flags'] = [{flag_id : 2027}];

            rpapi.getWithParams('MakeReservation', params).success(function (obj) {
              if (obj.status) {
                Alert.add(Alert.errorType, obj.status.description);
              } else {
                $scope.confirmationId = obj.data.reservation.confirmation_id;

                $scope.cookieConfirmation['confirmation_id'] = obj.data.reservation.confirmation_id;
                var now = new Date();
                now.setDate(now.getDate() + 10);

                $cookies.putObject('streamline-confirmation-cookie', $scope.cookieConfirmation, { path : '/', expires : now});
              }
            });
          }

          if($scope.reservationDetails.optional_fees.length > 0){
            $scope.goToStepTwo();
            if($rootScope.checkout_layout_option == '2'){
              jQuery('.progress-bar').attr('style', 'width:66%');
              jQuery('.r_protection .dot i').removeClass('fa-circle');
              jQuery('.r_protection .dot i').addClass('fa-check');
              jQuery('.r_protection .circle').addClass('primary-button');
            }
          }else{
            $scope.goToStepThree(true);
            if($rootScope.checkout_layout_option == '2'){
              // jQuery('.r_protection').hide();
              // jQuery('.r_info').removeClass('col-md-3');
              // jQuery('.r_payment').removeClass('col-md-3');
              // jQuery('.r_confirmation').removeClass('col-md-3');
              // jQuery('.r_info').addClass('col-md-4');
              // jQuery('.r_payment').addClass('col-md-4');
              // jQuery('.r_confirmation').addClass('col-md-4');
              jQuery('.progress-bar').attr('style', 'width:100%');
              jQuery('.r_protection .dot i').removeClass('fa-circle');
              jQuery('.r_protection .dot i').addClass('fa-check');
              jQuery('.r_protection .circle').addClass('primary-button');
            }
          }
          
        }
        $scope.getStates();
      }

      $scope.goToStepTwo = function () {
        if($rootScope.checkout_layout_option == '2'){
          setTimeout(function(){
            jQuery('#step2').collapse('show');
            jQuery('#step1').collapse('hide');
            jQuery('#step3').collapse('hide');
            jQuery('.progress-bar').attr('style', 'width:66%');
            jQuery('.r_payment .dot i').addClass('fa-circle');
            jQuery('.r_payment .dot i').removeClass('fa-check');
            jQuery('.r_payment .circle').removeClass('primary-button');
            jQuery('.r_confirmation .dot i').addClass('fa-circle');
            jQuery('.r_confirmation .dot i').removeClass('fa-check');
            jQuery('.r_confirmation .circle').removeClass('primary-button');

          },500); 
        }else{
          jQuery('#step2').collapse('show');
          jQuery('#step1').collapse('hide');
          jQuery('#step3').collapse('hide');
        }
        
        

        if ($scope.amenities.length > 0 && $rootScope.checkoutSettings.useAddOns == 1) {
          jQuery('#modalAmenities').modal();
        }
      }

      $scope.goToStep3 = function(){
        if(!$scope.stepTwoDisabled){

          $scope.protectionError = false;
          $scope.goToStepThree($scope.chkDamageWaiverNo);

          if($scope.pbgEnabled){
            PBG.onReady();
          }
          
        }else{
          $scope.protectionError = true;
        }
      }

      $scope.goToStepThree = function (damageWaiverNo) {
        jQuery('.progress-bar').attr('style', 'width:99%');
        jQuery('.r_payment .dot i').removeClass('fa-circle');
        jQuery('.r_payment .dot i').addClass('fa-check');
        jQuery('.r_payment .circle').addClass('primary-button');
        $scope.chkDamageWaiverNo = damageWaiverNo;
        if($rootScope.checkout_layout_option == '2'){
          setTimeout(function(){
            jQuery('#step3').collapse('show');
            jQuery('#step2').collapse('hide');
            jQuery('#step1').collapse('hide');
          },500); 
        }else{
          jQuery('#step3').collapse('show');
          jQuery('#step2').collapse('hide');
          jQuery('#step1').collapse('hide');
        }
      }

      $scope.validateStep3 = function(checkout){
        if($scope.formStep3.$valid){
          $scope.processCheckout(checkout);
          jQuery('.r_confirmation .dot i').removeClass('fa-circle');
          jQuery('.r_confirmation .dot i').addClass('fa-check');
          jQuery('.r_confirmation .circle').addClass('primary-button');
        }
      };

      $scope.validatePaymentForm = function(checkout){

        if($scope.formStep3.$valid){
          if(parseFloat($scope.checkout.price_balance) < parseFloat($scope.checkout.payment_amount)){
            alert("Please enter payment amount lower than the price balance");
            return false;
          }
          run_waitMe('#step3', 'bounce', 'Processing your request');
          var params = {
            first_name: checkout.fname,
            last_name: checkout.lname,
            email: checkout.email,
            address: checkout.address,
            address2: checkout.address2,
            city: checkout.city,
            zip: checkout.postal_code,
            state_name: checkout.state,
            country_name: checkout.country,
            confirmation_id : checkout.confirmation_id,
            payment_amount: checkout.payment_amount
          };

          if(checkout.card_type < 5){
            var exp_date = checkout.expiration_date.split("/");
            params['payment_type_id'] = 1;
            params['credit_card_type_id'] = checkout.card_type;
            params['credit_card_number'] = checkout.card_number;
            params['credit_card_expiration_month'] = exp_date[0];
            params['credit_card_expiration_year'] = exp_date[1];
            params['credit_card_cid'] = checkout.card_cvv;
          }else{
            params['payment_type_id'] = 33; //echeck
            params['bank_account_number'] = checkout.bank_account_number;
            params['bank_routing_number'] = checkout.bank_routing_number;
            params['bank_account_holder_name'] = checkout.bank_account_holder_name;
          }

          rpapi.getWithParams('AddReservationPayment', params).success(function (obj) {
            hide_waitMe('#step3');

            if (obj.data.message) {
              Alert.add(Alert.infoType, obj.data.message);
            } else{
              Alert.add(Alert.errorType, 'Unknown error ocurred.');
            }
          });
        }
      };

      $scope.initCheckout = function () {
        // first check if unit is available for posted dates        
        if ($scope.hash) {
          var params = {
            hash: $scope.hash,
            return_payments: 'yes'
          };

          rpapi.getWithParams('GetReservationPrice', params).success(function (obj) {
            var res_price = obj.data;

            if(res_price.optional_fees.id){
              resultData = [];
              resultData.push(res_price.optional_fees);
              res_price.optional_fees = resultData;
            }

            var arr_amenities = [];
            if(res_price.optional_fees.length > 0){
              angular.forEach(res_price.optional_fees, function (optional_fee, i) {
                if(optional_fee.travel_insurance == 0 && optional_fee.cfar == 0 && optional_fee.damage_waiver == 0){
                  arr_amenities.push({
                    'amenity_cost' : $filter('currency')(optional_fee.value,undefined,2),
                    'amenity_id' : optional_fee.id,
                    'amenity_thumbnail' : null,
                    'amenity_name' : optional_fee.name,
                    'amenity_description' : optional_fee.description
                  });
                }
              });
            }

            if($scope.amenities.length == 0){
              $scope.amenities = arr_amenities;
            }

            if(res_price.required_fees.id){
              resultData = [];
              resultData.push(res_price.required_fees);
              res_price.required_fees = resultData;
            }

            if(res_price.taxes_details.id){
              resultData = [];
              resultData.push(res_price.taxes_details);
              res_price.taxes_details = resultData;
            }

            if (res_price.security_deposits && res_price.security_deposits.security_deposit.ledger_id) {
              resultData = [];
              resultData.push(res_price.security_deposits.security_deposit);
              res_price.security_deposits.security_deposit = resultData;
              $scope.chkDamageWaiverNo = true;
            }

            var total_taxes = 0;
            angular.forEach(res_price.taxes_details, function (value, key) {
              total_taxes += value.value;
            });
            angular.forEach(res_price.required_fees, function (value, key) {
              total_taxes += value.value;
            });
            angular.forEach(res_price.optional_fees, function (value, key) {
              if (value.damage_waiver == 1) {
                $scope.hasDamageProtection = true;
                $scope.damageProtection = value.value;
              }

              if (value.travel_insurance == 1) {
                $scope.hasTravelInsurance = true;
                $scope.travelInsurance = value.value;
              }

              if(value.cfar == 1){
                $scope.hasCfar = true;
                $scope.cfar = value.value;
              }

              if (!$scope.hasDamageProtection && !$scope.hasTravelInsurance) {
                $scope.stepTwoDisabled = false;
              }
            });
            
            angular.forEach(res_price.security_deposits, function (value, key) {
              $scope.securityDeposit = value.value;
            });

            $scope.subTotal = $scope.calculateMarkup((obj.data.price + obj.data.coupon_discount).toString());
            var dif = $scope.subTotal - obj.data.coupon_discount - obj.data.price;
            $scope.taxesAndFees = total_taxes - dif;

            if (res_price.reservation_id) {
              rpapi.getWithParams('GetReservationInfo', params).success(function (obj) {
                var res_info = obj.data.reservation;

                $scope.unit = res_info.unit_id;

                var params = {
                  startdate : res_info.startdate,
                  enddate : res_info.enddate,
                  occupants : res_info.occupants,
                  use_room_type_logic : parseInt($rootScope.roomTypeLogic),
                  page_number : 1,
                  page_results_number : 1000
                };

                if(parseInt($rootScope.roomTypeLogic) != 1){
                  params['unit_id'] = res_info.unit_id;
                }else{
                  params['condo_type_id'] = res_info.condo_type_id;
                  params['location_id'] = res_info.location_id;
                }

                rpapi.getWithParams('GetPropertyAvailability', params).success(function (obj) {

                  if (obj.status) {
                    $scope.error = true;
                    $scope.errorMessage = obj.status.description;
                    return false;
                  } else {
                    var result = obj.data.available_properties;
                    if (result.pagination.total_units == 0) {
                      $scope.error = true;
                      $scope.errorMessage = 'Sorry, this property is not available during the selected dates.';
                      return false;
                    }
                  }
                }).error(function () {
                  $scope.error = true;
                  $scope.errorMessage = Alert.errorMessage;
                  return false;
                });

                $scope.checkout = {
                  fname : res_info.first_name,
                  lname : res_info.last_name,
                  email : res_info.email,
                  phone : $scope.isEmptyObject(res_info.phone) ? '' : res_info.phone,
                  unit  : res_info.unit_id,
                  promo_code : $scope.isEmptyObject(res_info.coupon_code) ? '' : res_info.coupon_code
                };

                if($scope.startDate == '' || $scope.startDate == undefined)
                  $scope.startDate = res_info.startdate;

                if($scope.endDate == '' || $scope.endDate == undefined)
                  $scope.endDate = res_info.enddate;

                if($scope.occupants == '' || $scope.occupants == undefined)
                  $scope.occupants = res_info.occupants;

                if($scope.occupants_small == '' || $scope.occupants_small == undefined)
                  $scope.occupants_small = res_info.occupants_small;

                if($scope.pets == '' || $scope.pets == undefined)
                  $scope.pets = res_info.pets;

                $scope.reservationDetails = res_price;
                $scope.reservationDetails.location_name = res_price.unit_name;

                if(parseInt($rootScope.roomTypeLogic) == 1){                  
                  $scope.unit_name = res_price.condo_type_name;
                }

                $scope.checkout.address = res_info.address1;
                $scope.stepOneDisabled = false;

                $scope.getCountries();
                $scope.getStates();
              });
            }
          });
        } else {
          var checkout_cookie = $cookies.getObject('streamline-checkout-cookie');
          var confirmation_cookie = $cookies.getObject('streamline-confirmation-cookie');

          if(checkout_cookie){
            $scope.checkout = {};
            if(checkout_cookie['fname']){
              $scope.checkout.fname = checkout_cookie['fname'];
            }
            if(checkout_cookie['lname']){
              $scope.checkout.lname = checkout_cookie['lname'];
            }
            if(checkout_cookie['email']){
              $scope.checkout.email = checkout_cookie['email'];
            }
            if(checkout_cookie['phone']){
              $scope.checkout.phone = checkout_cookie['phone'];
            }
          }

          if(confirmation_cookie){
            rpapi.getWithParams('GetReservationInfo', {'confirmation_id': confirmation_cookie['confirmation_id']}).success(function (obj) {
              if(obj.data){
                if(obj.data.reservation.unit_id == $scope.unit && obj.data.reservation.startdate == $scope.startDate && obj.data.reservation.enddate == $scope.endDate){
                  $scope.confirmationId = confirmation_cookie['confirmation_id'];
                }
              }              
            });            
          }

          var params = {
            startdate : $scope.startDate,
            enddate : $scope.endDate,
            occupants : $scope.occupants,
            page_number : 1,
            page_results_number : 1000,
            use_room_type_logic : parseInt($rootScope.roomTypeLogic)
          };

          
          if(parseInt($rootScope.roomTypeLogic) != 1){
            params['unit_id'] = $scope.unit_id;
          }else{
            params['condo_type_id'] = $scope.condo_type_id;
            params['location_id'] = $scope.location_id;
          }

          if ($scope.unit && $scope.startDate && $scope.endDate && $scope.occupants) {
            rpapi.getWithParams('GetPropertyAvailability', params).success(function (obj) {

              if (obj.status) {
                $scope.error = true;
                $scope.errorMessage = obj.status.description;
              } else {
                var result = obj.data.available_properties;
                if (result.pagination.total_units == 0) {
                  $scope.error = true;
                  $scope.errorMessage = 'Sorry, this property is not available during the selected dates.';
                } else {
                  $scope.getPreReservation(1);                  
                  $scope.getCountries();
                  $scope.getStates();
                }
              }
            }).error(function () {
              $scope.error = true;
              $scope.errorMessage = Alert.errorMessage;
            });
          } else {
            $scope.error = true;
            $scope.errorMessage = Alert.errorMessage;
          }
          
        }
      };

      $scope.isEmptyObject = function (obj) {
        return angular.equals({}, obj);
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

      $scope.getPreReservationPrice2 = function (booking, res) {
        if (booking.checkin && booking.checkout) {
          $scope.startDate = booking.checkin;
          $scope.endDate = booking.checkout;
          $scope.occupants = booking.occupants;
          $scope.unit = booking.unit_id;
          $scope.occupants_small = booking.occupants_small;
          $scope.pets = booking.pets;

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
              jQuery('.sticky-wrapper').hide();
              jQuery('.price_sticky').hide();
              jQuery('.view_breakdown_days').hide();
              Alert.add(Alert.errorType, errorMsg);
              hide_waitMe('#resortpro-book-unit form');
              
              $scope.isDisabled = true;
            } else {
                jQuery('.sticky-wrapper').show();
                jQuery('.price_sticky').show();
              jQuery('.view_breakdown_days').show();
                Alert.clear();
              $scope.isDisabled = false;
              if($rootScope.bookingSettings.inquiryOnlyFrom && $rootScope.bookingSettings.inquiryOnlyTo){
                var inquiryOnlyFrom = new Date($rootScope.bookingSettings.inquiryOnlyFrom);
                var inquiryOnlyTo = new Date($rootScope.bookingSettings.inquiryOnlyTo);

                if(!(checkout.getTime() <= inquiryOnlyFrom.getTime() || checkin.getTime() >= inquiryOnlyTo.getTime())){
                  Alert.add(Alert.errorType, 'These dates are Inquiry Only, please send us a inquiry using the form below');
                  hide_waitMe('#resortpro-book-unit form');
                  $scope.isDisabled = true;              
                  return false;
                }
              }

              var maxLengthStay = $rootScope.bookingSettings.maxLengthStay;
              if(maxLengthStay > 0 && stayLength > maxLengthStay){
                Alert.add(Alert.errorType, 'the max stay is on.');
                hide_waitMe('#resortpro-book-unit form');
                $scope.isDisabled = true;
                return false;
              }

              $scope.isDisabled = false;
            }
          });

          $scope.getPreReservation();
        }
      };

      $scope.setCheckoutDate = function (date) {
        if($scope.book.checkout){
          $scope.book.checkout = date.format("mm/dd/yyyy");
        }
      };

      $scope.getPreReservation = function (use_default) {
        use_default = use_default || 0;
        var params = {
          startdate: $scope.startDate,
          enddate: $scope.endDate,
          occupants: $scope.occupants,
          unit_id: $scope.unit,          
          return_payments : 'yes'
        };

        if($scope.pets){
          params['pets'] = $scope.pets;
        }

        if($scope.occupants_small){
          params['occupants_small'] = $scope.occupants_small;
        }

        if(use_default == 1 && $rootScope.includeEnabledOptional === 1){
          params['optional_default_enabled'] = 'yes';
        }
        
        var method = 'GetPreReservationPrice';

        if($scope.checkout && $scope.checkout.promo_code != '')
          params['coupon_code'] = $scope.checkout.promo_code;

        var arr_fees = [];
        $scope.optionalItems == '';
        jQuery(".optional_fee:checked").each(function (index) {
          if (jQuery(this).prop('checked')) {

            var qty = parseInt(jQuery('#qty-optional-fee-' + jQuery(this).val()).val());

            if(!isNaN(qty)){
              params['optional_fee_' + jQuery(this).val()] = qty;
            }else{
              params['optional_fee_' + jQuery(this).val()] = 'yes';
            }

            arr_fees.push(jQuery(this).val());
          }
        });

        $scope.optionalItems = arr_fees.join(',');

        if ($scope.hash !== '') {
          params['hash'] = $scope.hash;
          method = 'GetReservationPrice';
        }

        run_waitMe('.form-checkout-wrapper', 'bounce', 'Updating Information...');
        run_waitMe('#step0', 'bounce', 'Updating Price');

        rpapi.getWithParams(method, params).success(function (obj) {
          hide_waitMe('.form-checkout-wrapper');
          hide_waitMe('#step0');
          var arr_amenities = [];
          if (obj.data.optional_fees.id) {
            resultData = [];
            resultData.push(obj.data.optional_fees);
            obj.data.optional_fees = resultData;
           
          }

          if($scope.amenities.length == 0){
            if(obj.data.optional_fees.length > 0){
              angular.forEach(obj.data.optional_fees, function (optional_fee, i) {
                if(optional_fee.active == 1){
                  total_optional_fees += optional_fee.value;
                }
                if(optional_fee.travel_insurance == 0 && optional_fee.cfar == 0 && optional_fee.damage_waiver == 0){
                  arr_amenities.push({
                    'amenity_cost' : $filter('currency')(optional_fee.value,undefined,2),
                    'amenity_id' : optional_fee.id,
                    'amenity_thumbnail' : null,
                    'amenity_name' : optional_fee.name,
                    'amenity_description' : optional_fee.description
                  });
                }
              });
            }

            $scope.amenities = arr_amenities;
          }

          if (obj.data.required_fees.id) {
            resultData = [];
            resultData.push(obj.data.required_fees);
            obj.data.required_fees = resultData;
          }

          if (obj.data.taxes_details.id) {
            resultData = [];
            resultData.push(obj.data.taxes_details);
            obj.data.taxes_details = resultData;
          }

          if (obj.data.security_deposits && obj.data.security_deposits.security_deposit.ledger_id) {
            resultData = [];
            resultData.push(obj.data.security_deposits.security_deposit);
            obj.data.security_deposits.security_deposit = resultData;
          }

          var total_fees = 0;
          var total_taxes = 0;
          var total_optional_fees = 0;
          angular.forEach(obj.data.optional_fees, function (optional_fee, i) {
            if(optional_fee.active == 1){
              total_optional_fees += optional_fee.value;
            }
          });

          angular.forEach(obj.data.required_fees, function (fee, i) {
            total_fees += fee.value;
          });

          angular.forEach(obj.data.taxes_details, function (fee, i) {
            total_taxes += fee.value;
          });

          $scope.subTotal = $scope.calculateMarkup((obj.data.price + obj.data.coupon_discount).toString());

          var dif = $scope.subTotal - obj.data.coupon_discount - obj.data.price;

          $scope.totalFees = total_fees;
          $scope.totalTaxes = total_taxes;

          $scope.taxesAndFees = total_taxes + total_fees + total_optional_fees - dif;

          $scope.totalPrice = obj.data.total;

          if(arr_fees.length > 0)
            params['optional_fee'] = arr_fees.join();

          params.use_room_type_logic = parseInt($rootScope.roomTypeLogic);

          if(obj.data.expected_charges && obj.data.expected_charges.type_id){
            resultData = [];
            resultData.push(obj.data.expected_charges);
            obj.data.expected_charges = resultData;
          }
          if($rootScope.checkoutSettings.groupExpectedCharges === 1 && obj.data.expected_charges.length > 1){ //TODO Use a setting
            var grouped_charges = [];
            angular.forEach(obj.data.expected_charges, function(charge, i){
              var found_charge = false;
              angular.forEach(grouped_charges , function(grouped_charge, i){
                if(grouped_charge.charge_date == charge.charge_date){
                  found_charge = true;
                  grouped_charge.charge_value += charge.charge_value;
                  grouped_charge.description = 'Payment Schedule';
                }
              });
              if(!found_charge){
                grouped_charges.push(charge);
              }
            });
            obj.data.expected_charges = grouped_charges;
          }

          $scope.reservationDetails = obj.data;

          angular.forEach(obj.data.optional_fees, function (value, key) {
            if (value.damage_waiver == 1) {
              $scope.hasDamageProtection = true;
              $scope.damageProtection = value.value;
            }

            if (value.travel_insurance == 1) {
              $scope.hasTravelInsurance = true;
              $scope.travelInsurance = value.value;
            }

            if(value.cfar == 1){
              $scope.hasCfar = true;
              $scope.cfar = value.value;
            }
          });

          if (!$scope.hasDamageProtection && !$scope.hasTravelInsurance && !$scope.hasCfar) {
            $scope.stepTwoDisabled = false;
          }

          var totalDeposits = 0;
          if(obj.data.security_deposits){
            angular.forEach(obj.data.security_deposits.security_deposit, function (value, key) {
              totalDeposits += value.deposit_required;
            });
          }

          $scope.securityDeposit = totalDeposits;
        });
      };

      $scope.getTermsAndConditions = function () {

        if($scope.unit > 0){
          var params = {
            trigger_id: 18,
            unit_id: $scope.unit
          };

          rpapi.getWithParams('GetPropertyDocumentHtml', params).success(function (obj) {
            if (obj.data && !jQuery.isEmptyObject(obj.data.document_html_code)) {
              $scope.terms = $sce.trustAsHtml(obj.data.document_html_code);
            } else {
              $scope.terms = '';
            }
          });
        }
      };

      $scope.getPrivacyPolicy = function () {

        if($scope.unit > 0){
          var params = {
            trigger_id: 389            
          };

          rpapi.getWithParams('GetCompanyDocumentHtml', params).success(function (obj) {
            if (obj.data && !jQuery.isEmptyObject(obj.data.document_html_code)) {
              $scope.privacyPolicyHtml = $sce.trustAsHtml(obj.data.document_html_code);
            } else {
              $scope.privacyPolicyHtml = '';
            }
          });
        }
      };

      $scope.getCountries = function(){
        rpapi.getWpActionWithParams('streamlinecore-get-countries', null).success(function(obj){
          $scope.countries = obj.data.countries;
        });
      };

      $scope.getStates = function(){
        var country = ($scope.checkout.country && $scope.checkout.country != '') ?  $scope.checkout.country : 'US';
        var params = {
          country_name : country
        }

        rpapi.getWpActionWithParams('streamlinecore-get-states', params).success(function(obj){
          $scope.states = obj.data.states;
        });
      };

      $scope.processCheckout = function (checkout) {
        run_waitMe('#step3', 'bounce', 'Processing your request');
        var params = {
          pricing_model: 0,
          startdate: $scope.startDate,
          enddate: $scope.endDate,
          occupants: $scope.occupants,
          occupants_small: $scope.occupants_small,
          first_name: checkout.fname,
          last_name: checkout.lname,
          email: checkout.email,
          phone: checkout.phone,
          mobile_phone: checkout.phone,
          address: checkout.address,
          address2: checkout.address2,
          city: checkout.city,
          zip: checkout.postal_code,
          state_name: checkout.state,
          country_name: checkout.country
        };

        if($rootScope.checkoutSettings.createStreamSign == 1){
          params['streamsign_thankyou_url'] = location.protocol+'//'+location.host+'/thank-you/';
          params['streamsign_redirect'] = 'yes';
        }

        if(checkout.notes){
          params['client_comments'] = checkout.notes;
        }

        if(checkout.card_type < 5){
          var exp_month, exp_year;
          if(checkout.expiration_date){
            var exp_date = checkout.expiration_date.split("/");
            exp_month = exp_date[0];
            exp_year = exp_date[1];
          }else{
            exp_month = checkout.expire_month;
            exp_year = checkout.expire_year;
          }
          
          params['credit_card_type_id'] = checkout.card_type;
          params['credit_card_number'] = checkout.card_number;
          params['credit_card_expiration_month'] = exp_month;
          params['credit_card_expiration_year'] = exp_year;
          params['credit_card_cid'] = checkout.card_cvv;
        }else{
          params['payment_type_id'] = 33; //echeck
          params['bank_account_number'] = checkout.bank_account_number;
          params['bank_routing_number'] = checkout.bank_routing_number;
          params['bank_account_holder_name'] = checkout.bank_account_holder_name;
        }

        jQuery.ajax({
          url: 'https://api.ipdata.co',
          global: false,
          type: 'GET',
          data: {},
          async: false, //blocks window close
          success: function(data) {
            params['ip'] = data.ip;
            params['ip_location'] = data.country_name;
          }
        });

        params['time_stamp'] = Math.floor(Date.now() / 1000);

        if(typeof jQuery('.policy_and_privacy').html() != 'undefined'){
          params['privacy_policy'] = jQuery('.policy_and_privacy').html();
        }else{
          params['privacy_policy'] = '';
        }

        if(jQuery('#newsletter').is(":checked")){
          params['opt_in_marketing'] = 'yes';
        }else{
          params['opt_in_marketing'] = 'no';
        }

        if($rootScope.doNotVerifyZip == 1){
          params['do_not_verify_zip_code'] = 1;
        }

        if($rootScope.roomTypeLogic == 1){
          params['use_room_type_logic'] = 1;
          params['condo_type_id'] = $scope.checkout.condo_type_id;
          params['location_id'] = $scope.checkout.location_id;
        }else{
          params['unit_id'] = $scope.unit;
        }

        if($rootScope.bookingSettings){
          if($rootScope.bookingSettings.hearedAboutId > 0){
            params['hear_about_id'] = $rootScope.bookingSettings.hearedAboutId;
          }

          if($rootScope.bookingSettings.blockedRequest == 1){
            params['status_id'] = 10;
          }            
        }

        if($scope.checkout && $scope.checkout.promo_code != ''){
          params['coupon_code'] = $scope.checkout.promo_code;
        }
          
        if($scope.pets && $scope.pets > 0){
          params['pets'] = $scope.pets;
        }
          
        if($scope.hash != ''){
          params['hash'] = $scope.hash;
        }
          
        if($scope.referrer_url != ''){
          params['referrer_url'] = $scope.referrer_url;
        }
                  
        if($scope.confirmationId > 0){
          params['confirmation_id'] = $scope.confirmationId;        
        }
          
        var amenity_addons = [];
        jQuery(".optional_fee:checked").each(function (index) {
          if (jQuery(this).prop('checked')) {

            var qty = parseInt(jQuery('#qty-optional-fee-' + jQuery(this).val()).val());
            if(!isNaN(qty)){
              var amenity_addon = {
                amenity_id : jQuery(this).val(),
                amenity_quantity : qty
              };
              amenity_addons.push(amenity_addon);
            }else{
              params['optional_fee_' + jQuery(this).val()] = 'yes';
            }
          }
        });

        if(amenity_addons.length > 0){
          params['amenity_addon'] = amenity_addons;
        }

        rpapi.getWithParams('MakeReservation', params).success(function (obj) {
        
          hide_waitMe('#step3');

          if (obj.status) {
            Alert.add(Alert.errorType, obj.status.description);
          } else {
            jQuery('#btn-checkout').attr('disabled', 'disabled');
            
            var res = obj.data.reservation;

            jQuery('#confirmation_id').val(res.confirmation_id);
            jQuery('#location_name').val(res.location_name);
            jQuery('#condo_type_name').val(res.condo_type_name);
            jQuery('#unit_name').val(res.unit_name);
            jQuery('#startdate').val(res.startdate);
            jQuery('#enddate').val(res.enddate);
            jQuery('#occupants').val(res.occupants);
            jQuery('#occupants_small').val(res.occupants_small);
            jQuery('#pets').val(res.pets);
            jQuery('#price_common').val(res.price_common);
            jQuery('#price_balance').val(res.price_balance);
            jQuery('#travelagent_name').val(res.travelagent_name);
            jQuery('#unit_name').val(res.unit_name);
            
            var now = new Date();
            now.setDate(now.getDate() - 10);
            $cookies.putObject('streamline-confirmation-cookie', null, { path : '/', expires : now});
            $cookies.remove('streamline-confirmation-cookie');

            rpapi.getWithParams('GetReservationInfo', {'confirmation_id': res.confirmation_id}).success(function (obj) {
              var res_info = obj.data.reservation;

              jQuery('#email').val(res_info.email);
              jQuery('#fname').val(res_info.first_name);
              jQuery('#lname').val(res_info.last_name);
              jQuery('#unit_id').val(res_info.unit_id);
              
              if(res.streamsign_url && res.streamsign_url != ''){
                window.location.href = res.streamsign_url;
              }else{
                jQuery('#form_thankyou').submit();
              }
              
            });
          }
        });
      };

      $scope.getPropertyInfo = function () {
        rpapi.getWithParams('GetPropertyInfo', {'unit_id': $scope.unit}).success(function (obj) {
          $scope.property = obj.data;

          if($scope.checkout){
            $scope.checkout.country = 'US';
            $scope.checkout.condo_type_id = obj.data.condo_type_id;
            $scope.checkout.location_id = obj.data.location_id;

            if(parseInt($rootScope.roomTypeLogic) == 1){                
              $scope.unit_name = obj.data.condo_type_name;
            }else{              
              if(obj.data.web_name && obj.data.name != ''){
                $scope.unit_name = obj.data.web_name;              
              }else if(obj.data.name == 'Home'){                
                $scope.unit_name = obj.data.location_name;
              }else{
                $scope.unit_name = obj.data.name;
              }
            }
          }
        });
      };
    }
  ]);
})();
