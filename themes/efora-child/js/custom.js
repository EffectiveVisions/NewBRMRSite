AOS.init();
jQuery(window).load(function () {

   setTimeout(function () {
      if (navigator.userAgent.indexOf("Speed Insights") == -1) {
         var js = ["/wp-content/themes/efora-child/js/tp.widget.bootstrap.min.js"];
         var $head = jQuery("head");
         for (var i = 0; i < js.length; i++) {
            $head.append("<script defer='true' src=\"" + js[i] + "\"></scr" + "ipt>");
         }
      }
   }, 6000)

   if (jQuery('.frm_error_style')[0] || jQuery('.frm_message')[0]) {
      setTimeout(function () {
         jQuery('html, body').animate({
            scrollTop: jQuery("#contactus").offset().top - 150
         });
      }, 500);
   }
});

jQuery(document).ready(function () {
   jQuery('.custome-loader').fadeOut("slow");
   jQuery('.selectsearch').find('.c-select-list').removeClass('form-control');

   jQuery("body").delegate(".datepicker-popup", "focusin", function () {
      console.log(this)
      if (jQuery(this).attr("id") == "end_date_popup") {

         if (jQuery("#start_date_popup").val() != "") {
            jQuery(this).datepicker('setDate', null);
            var myDate = new Date(jQuery("#start_date_popup").val());
            myDate.setDate(myDate.getDate() + 1);
            jQuery(this).datepicker({
               minDate: myDate,
               onSelect: function (selectedDate) {
                  //jQuery("#search_end_date_single").val("");
                  //jQuery("#search_start_date_single").val("");

               }
            });
            jQuery("#end_date_popup").val("");

         } else {

            jQuery(this).datepicker('setDate', null);
            jQuery("#end_date_popup").val("");
            myDate = new Date();
            myDate.setDate(myDate.getDate() + 1);
            jQuery(this).datepicker({
               minDate: myDate,
               onSelect: function (selectedDate) {
                  //jQuery("#search_end_date_single").val("");
                  //jQuery("#search_start_date_single").val("");
               }
            });
            jQuery(this).datepicker("refresh");
         }
      } else {

         // var input = jQuery('#end_date_popup');
         // input.val('');
         // input.trigger('input');
         // input.trigger('change');
         myDate = new Date();
         
         myDate.setDate(myDate.getDate() + 1);
         jQuery(this).datepicker({
            minDate: myDate,
            onSelect: function (selectedDate) {
               myDate = new Date(selectedDate);
               myDate.setDate(myDate.getDate() + 1);
               jQuery('#end_date_popup').datepicker('option', 'minDate', myDate);
               //jQuery("#search_end_date_single").val("");
               //jQuery("#search_start_date_single").val("");
            }
         });
         jQuery(this).datepicker("refresh");
      }
      jQuery("body").append(jQuery("#ui-datepicker-div"));
   });

   jQuery(".mainmenu").css({ "background": "#005a9a", "margin-top": "15px" })
   jQuery(".mainmenu").css({ "color": "#fff" })
   jQuery(".community").css({ "padding-left": "20px" });
   jQuery(".community").css({ "background": "rgb(237, 241, 243)" });
   jQuery(".mainmenu").children("a").css({ "color": "#fff", "font-weight": "bold" });

   jQuery(".increase-child").on("click", function () {
      var child_count = jQuery.trim(jQuery(".count-children").html());
      if (child_count == "") {
         jQuery(".count-children").html("1");
      } else {
         var orgcount = parseInt(jQuery(".count-children").html())
         if (orgcount < 10) {
            var count = parseInt(jQuery(".count-children").html()) + 1;
            jQuery(".count-children").html(count);
         }
      }
      var check_count = jQuery.trim(jQuery(".count-children").html());
      if (parseInt(check_count) > 1) {
         jQuery(".children-label-mobile").html("Children");
      } else {
         jQuery(".children-label-mobile").html("Child");
      }
      jQuery(".children_count_hidden").val(jQuery.trim(jQuery(".count-children").html()))
      var adult_count = jQuery.trim(jQuery(".count_adults").html());
      var child_count = jQuery.trim(jQuery(".count-children").html());
      if (adult_count != "" && child_count != "") {
         var total_count = parseInt(adult_count) + parseInt(child_count);

         if (total_count > 1) {
            jQuery(".guest-label-mobile").html("Guests");

         } else {
            jQuery(".guest-label-mobile").html("Guest");
         }
         jQuery(".total_count").html(total_count);
      } else if (adult_count != "") {
         var total_count = parseInt(adult_count);
         if (total_count > 1) {
            jQuery(".guest-label-mobile").html("Guests");
         } else {
            jQuery(".guest-label-mobile").html("Guest");
         }
         jQuery(".total_count").html(total_count);
      } else if (child_count != "") {
         var total_count = parseInt(child_count);
         if (total_count > 1) {
            jQuery(".guest-label-mobile").html("Guests");
         } else {
            jQuery(".guest-label-mobile").html("Guest");
         }
         jQuery(".total_count").html(child_count);
      } else {
         jQuery(".total_count").html("");
         jQuery(".guest-top-label").html("Guest");
      }
   });

   jQuery(".decrease-child").on("click", function () {
      var child_count = jQuery.trim(jQuery(".count-children").html());
      if (parseInt(child_count) >= 1) {
         jQuery(".children-label-mobile").html("Children");
      } else {
         jQuery(".children-label-mobile").html("Child");
      }
      if (child_count != "") {
         var count = parseInt(jQuery.trim(jQuery(".count-children").html()));
         if (count <= 1) {
            jQuery(".count-children").html("");
         } else {
            var orgcount = parseInt(jQuery.trim(jQuery(".count-children").html())) - 1
            jQuery(".count-children").html(orgcount);
         }
      }

      var check_count = jQuery.trim(jQuery(".count-children").html());
      if (parseInt(check_count) > 1) {
         jQuery(".children-label-mobile").html("Children");
      } else {
         jQuery(".children-label-mobile").html("Child");
      }
      jQuery(".children_count_hidden").val(jQuery.trim(jQuery(".count-children").html()))

      var adult_count = jQuery.trim(jQuery(".count_adults").html());
      var child_count = jQuery.trim(jQuery(".count-children").html());
      if (adult_count != "" && child_count != "") {
         var total_count = parseInt(adult_count) + parseInt(child_count);
         if (total_count > 1) {
            jQuery(".guest-label-mobile").html("Guests");
         } else {
            jQuery(".guest-label-mobile").html("Guest");
         }
         jQuery(".total_count").html(total_count);
      } else if (adult_count != "") {
         var total_count = parseInt(adult_count);
         if (total_count > 1) {
            jQuery(".guest-label-mobile").html("Guests");
         } else {
            jQuery(".guest-label-mobile").html("Guest");
         }
         jQuery(".total_count").html(total_count);
      } else if (child_count != "") {
         var total_count = parseInt(child_count);
         if (total_count > 1) {
            jQuery(".guest-label-mobile").html("Guests");
         } else {
            jQuery(".guest-label-mobile").html("Guest");
         }
         jQuery(".total_count").html(child_count);
      } else {
         jQuery(".total_count").html("");
         jQuery(".guest-top-label").html("Guest");
      }

   });

   jQuery(".increase-adult").on("click", function () {
      var adult_count = jQuery.trim(jQuery(".count_adults").html());
      if (adult_count == "") {
         jQuery(".count_adults").html("1");
      } else {
         var orgcount = parseInt(jQuery(".count_adults").html())
         if (orgcount < 10) {
            var count = parseInt(jQuery(".count_adults").html()) + 1;
            jQuery(".count_adults").html(count);
         }
      }
      var check_count = jQuery.trim(jQuery(".count_adults").html());
      if (parseInt(check_count) > 1) {
         jQuery(".adults_label_mobile").html("Adults");
      } else {
         jQuery(".adults_label_mobile").html("Adult");
      }

      jQuery(".adult_count_hidden").val(jQuery.trim(jQuery(".count_adults").html()));

      var adult_count = jQuery.trim(jQuery(".count_adults").html());
      var child_count = jQuery.trim(jQuery(".count-children").html());
      if (adult_count != "" && child_count != "") {
         var total_count = parseInt(adult_count) + parseInt(child_count);
         if (total_count > 1) {
            jQuery(".guest-label-mobile").html("Guests");
         } else {
            jQuery(".guest-label-mobile").html("Guest");
         }
         jQuery(".total_count").html(total_count);
      } else if (adult_count != "") {
         var total_count = parseInt(adult_count);
         if (total_count > 1) {
            jQuery(".guest-label-mobile").html("Guests");
         } else {
            jQuery(".guest-label-mobile").html("Guest");
         }
         jQuery(".total_count").html(total_count);
      } else if (child_count != "") {
         var total_count = parseInt(child_count);
         if (total_count > 1) {
            jQuery(".guest-label-mobile").html("Guests");
         } else {
            jQuery(".guest-label-mobile").html("Guest");
         }
         jQuery(".total_count").html(child_count);
      } else {
         jQuery(".total_count").html("");
         jQuery(".guest-top-label").html("Guest");
      }

   });

   jQuery(".decrease-adult").on("click", function () {
      var adult_count = jQuery.trim(jQuery(".count_adults").html());
      if (parseInt(adult_count) >= 1) {
         jQuery(".adults_label_mobile").html("Adults");
      } else {
         jQuery(".adults_label_mobile").html("Adult");
      }
      if (adult_count != "") {
         var count = parseInt(jQuery.trim(jQuery(".count_adults").html()));
         if (count <= 1) {
            jQuery(".count_adults").html("");
         } else {
            var orgcount = parseInt(jQuery.trim(jQuery(".count_adults").html())) - 1
            jQuery(".count_adults").html(orgcount);
         }
      }

      var check_count = jQuery.trim(jQuery(".count_adults").html());
      if (parseInt(check_count) > 1) {
         jQuery(".adults_label_mobile").html("Adults");
      } else {
         jQuery(".adults_label_mobile").html("Adult");
      }
      jQuery(".adult_count_hidden").val(jQuery.trim(jQuery(".count_adults").html()));

      var adult_count = jQuery.trim(jQuery(".count_adults").html());
      var child_count = jQuery.trim(jQuery(".count-children").html());
      if (adult_count != "" && child_count != "") {
         var total_count = parseInt(adult_count) + parseInt(child_count);
         if (total_count > 1) {
            jQuery(".guest-label-mobile").html("Guests");
         } else {
            jQuery(".guest-label-mobile").html("Guest");
         }
         jQuery(".total_count").html(total_count);
      } else if (adult_count != "") {
         var total_count = parseInt(adult_count);
         if (total_count > 1) {
            jQuery(".guest-label-mobile").html("Guests");
         } else {
            jQuery(".guest-label-mobile").html("Guest");
         }
         jQuery(".total_count").html(total_count);
      } else if (child_count != "") {
         var total_count = parseInt(child_count);
         if (total_count > 1) {
            jQuery(".guest-label-mobile").html("Guests");
         } else {
            jQuery(".guest-label-mobile").html("Guest");
         }
         jQuery(".total_count").html(child_count);
      } else {
         jQuery(".total_count").html("");
         jQuery(".guest-top-label").html("Guest");
      }
   });

   jQuery(".pet-click").on("click", function () {
      if (jQuery(this).attr("id") == "r3") {
         jQuery(".pets-available").removeClass("d-none");
      }

      if (jQuery(this).attr("id") == "r4") {
         jQuery(".pets-available").addClass("d-none");
      }
   });

   jQuery(".search-mobile").click(function (e) {

      e.preventDefault();

      var url = jQuery(".searchformmobile").attr("action") + "?";

      var adult = jQuery(".adult_count_hidden").val();
      var child = jQuery(".children_count_hidden").val();

      if (jQuery(".pets-available").hasClass("d-none")) {
         var pet = 0;
      } else {
         var pet = 1;
      }

      if (jQuery("#start_date_popup").val() != "" && jQuery("#end_date_popup").val() != "") {
         url = url + '&sd=' + jQuery("#start_date_popup").val() + '' + '&ed=' + jQuery("#end_date_popup").val() + ''
      }

      if (adult != "") {
         url = url + '&oc=' + adult + ''
      }
      if (child != "") {
         url = url + '&ch=' + child + ''
      }
      if (pet != 0) {
         url = url + '&pets=' + pet + ''
      }

      window.location.href = url;
   });

   jQuery("#guestsDropClearBtn1").on("click", function () {
      jQuery(".count-children").html("");
      jQuery(".count_adults").html("");
      jQuery(".count_adult_input").val("");
      jQuery(".children_count_input").val("");
      jQuery(".pet-click").prop('checked', false);
      jQuery(".pets-available").addClass("d-none");
      jQuery(".total_count").html("");
      jQuery(".guest-label-mobile").html("Guest");
   });

   jQuery('#start_date_popup').on('touchstart', function () {
      jQuery(this).focus();
   });
   // jQuery('#start_date_popup').on('focusout', function () {
   //    jQuery('#end_date_popup').focus();
   // });

   jQuery('#end_date_popup').on('touchstart', function () {
      jQuery(this).focus();
   });


});
