/**
 * jQuery functions
 */
(function ($) {
  // star ratings
  $.fn.stars = function () {
    return $(this).each(function () {
      // get the value
      var val = parseFloat($(this).html());
      // Make sure that the value is in 0 - 5 range, multiply to get width
      var size = Math.max(0, (Math.min(5, val))) * 16;
      // val = Math.round(val * 2) / 2;
      // Create stars holder
      var $span = $('<span />').width(size);
      // Replace the numerical value with stars
      $(this).html($span);
    })
  };

  $(document).ready(function () {

    if(jQuery('#contentarea').hasClass('container-fluid')){
      jQuery('.thumb').addClass('container-fluid-layout');
    }

    // checkout progress area
    jQuery('.r_info .dot i').removeClass('fa-circle');
    jQuery('.r_info .dot i').addClass('fa-check');
    jQuery('.r_info .circle').addClass('primary-button');
    jQuery('.three_steps .progress-bar').attr('style', 'width:33%');
    jQuery('.two_steps .progress-bar').attr('style', 'width:50%');


    $('.form-checkout-wrapper .panel-collapse').on('show.bs.collapse  ', function(){            
      $(this).parent().find('.panel-heading').addClass('open'); //add active state to button on open
    });

    $('.form-checkout-wrapper .panel-collapse').on('shown.bs.collapse  ', function(){
      if($( window ).width() < '767' ){
        var collapse =$(this).parent();
        var collapseId = collapse.context.id;
                  
        $('html, body').animate({
          scrollTop: collapse.offset().top
        }, 50);

        if (collapseId == 'step2'){        
          $('#step2 .resortpro-reservation-details-mobile').sticky({
            topSpacing: 0
          });
        }

        if (collapseId == 'step3'){        
          $('#step3 .resortpro-reservation-details-mobile').sticky({
            topSpacing: 0
          });
        }
                          
        $('#step2 .resortpro-reservation-details').sticky({
          topSpacing: 0,
          bottomSpacing: $( document ).height() - $('#btn-step-2').offset().top
        });
      }
    });
  
    $('.form-checkout-wrapper .panel-collapse').on('hide.bs.collapse ', function(){      
      if($( window ).width() < '767' ){
        $(this).parent().find('.panel-heading').removeClass('open'); //remove active state to button on close
        var collapse =$(this).parent();
        var collapseId = collapse.context.id;      
        if (collapseId == 'step2'){
          $('#step2 .resortpro-reservation-details-mobile').unstick();
        }
        if (collapseId == 'step3'){
          $('#step3 .resortpro-reservation-details-mobile').unstick();
        }
      }                              
    });


    offset = 0;
    if( $('body.admin-bar').length > 0 ) offset = 32;
    var topSpacingVal = offset + parseInt($('.map_sticky').attr('data-top-spacing'));
    var bottomSpacingVal = parseInt($('.map_sticky').attr('data-bottom-spacing'));

    jQuery('.map_sticky').sticky({topSpacing: topSpacingVal, bottomSpacing: bottomSpacingVal});

    if(jQuery().tooltip) {
      //run plugin dependent code
      $('body').tooltip({
        selector: '.btn-fav, .petFriendly, .js-btnFav, .js-petFriendly, .btn-cmp'
      });
    }

    // Form fields tooltips
    if($( window ).width() >= '768' ){
      $('.g_tooltip').tooltip({html: true, placement: "right"});
    }
    if($( window ).width() < '767' ){
      $('.g_tooltip').tooltip({html: true, placement: "top"});
    }
    $('.container_input input, .container_input select').click(
      function(e){
        $(this).siblings('.g_tooltip').tooltip('show');
      }
    );
    $('.container_input input, .container_input select').focusout(
      function(e){
        $(this).siblings('.g_tooltip').tooltip('hide');
      }
    );

    $('.btn-sort').click(function(){
      $('.btn-sort').removeClass('active');
      $(this).addClass('active');
    });

    $('span.rating').stars();

    var checkin_days = 0;
    if(!isNaN($('.datepicker').attr('data-checkin-days'))){
       checkin_days = $('.datepicker').attr('data-checkin-days');
    }

    var str_turndates = $('.datepicker').data('turndates');
    var arr_turndates = [];
    if(typeof str_turndates == 'number'){
      arr_turndates.push(str_turndates.toString());
    }else{
      if(str_turndates && str_turndates.indexOf(",") > -1){            
        arr_turndates = str_turndates.split(',');
      }
    }

    $('.datepicker').datepicker({
      minDate: "+"+checkin_days+"d",
      dateFormat: 'm/d/yy',
      beforeShowDay: function(date) {
        var is_available = true;
        var class_day = 'available';
        
        if($(this).attr('id') == 'search_start_date'){
          if(arr_turndates.length > 0 && $.inArray( date.getUTCDay().toString(), arr_turndates) == -1){
            is_available = false;
          }
          
          if(!is_available){
            class_day = 'booked';
          }                
        }

        if($(this).attr('id') == 'search_end_date'){
          var start_date = $('#search_start_date').datepicker('getDate');
          if(start_date){
            if(arr_turndates.length > 0 && start_date.getUTCDay().toString() != date.getUTCDay().toString()){
              is_available = false;
              class_day = 'booked'
            }
          }else{
            if(arr_turndates.length > 0 && $.inArray( date.getUTCDay().toString(), arr_turndates) == -1){
              is_available = false;
            }
            
            if(!is_available){
              class_day = 'booked';
            }
          }                         
        }
       
        return [is_available, class_day];        
      }
    });
    
    $('.datepicker-end').datepicker({
      minDate: "+2d",
      dateFormat: 'm/d/yy'
    });

    $(".datepicker").change(function () {
      var frm = new Date(jQuery(this).val());
      var the_year = frm.getFullYear();
      if (the_year < 2000) the_year = 2000 + the_year %100;
      var nts = 1;
      if ($('#resortpro_min_days').attr('value')) {
        $nts = parseInt(jQuery('#resortpro_min_days').attr('value'));
      }

      var endpicker = $(this).attr('data-bindpicker');

      if (!(!endpicker || endpicker.length === 0)) {
        $(endpicker).datepicker("option", "minDate", to);

        if ($(this).attr('data-min-stay')){
          nts = parseInt(jQuery(this).attr('data-min-stay'));
        }

        var to = new Date(the_year, frm.getMonth(), frm.getDate() + nts);

        $(endpicker).datepicker("option", "minDate", to);
        $(endpicker).val(to.format("mm/dd/yyyy"));                
        setTimeout(function(){$(endpicker).datepicker('show')},0);        
      }
    });


    // Calendar buttons functionality
    var calendarBtn = $('.js-calendarBtn');

    calendarBtn.on('click', function(event) {
      event.preventDefault();
      $(this).parents('.form-group').find('.hasDatepicker').focus();
    });


    // Range slider
    $('#slider-range').slider({
      range: true,
      min: 0,
      max: 500,
      values: [75, 300],
      slide: function (event, ui) {
        $('#amount').val('$' + ui.values[0] + ' - $' + ui.values[1]);
      }
    });

    $('#amount').val('$' + $('#slider-range').slider('values', 0) + ' - $' + $('#slider-range').slider('values', 1));

    $('#collapseFilters').on('shown.bs.collapse', function () {
      $('#btn-collapse span').html('Hide filters');
    });

    $('#collapseFilters').on('hidden.bs.collapse', function () {
      $('#btn-collapse span').html('Show more filters');
    });

    $('.btn-mobile-details').click(function(){
      var target = $(this).attr('href');      
      var is_mobile_visible = String($(target).data('visible'));
      
      if(is_mobile_visible == 'false'){
        $(target).css('display', 'block');
        $(target).data('visible', 'true');
        $(this).html('Hide details');
      }else{
        $(target).css('display', 'none');
        $(target).data('visible', 'false');
        $(this).html('See more details');
      }
      return false;
    });

    $('.btn-price-breakdown').click(function () {
      $('.breakdown-days-hidden').each(function () {

        if($(this).data('visible') == false){
          $(this).css('display', 'table-row');
          $(this).data('visible', true);

          $('.btn-price-breakdown span').html('Hide Breakdown');
          $('.btn-price-breakdown i').removeClass('glyphicon-menu-down').addClass('glyphicon-menu-up');
        } else {
          $(this).css('display', 'none');
          $(this).data('visible', false);

          $('.btn-price-breakdown span').html('View Breakdown');
          $('.btn-price-breakdown i').removeClass('glyphicon-menu-up').addClass('glyphicon-menu-down');
        }
      })
      return false;
    });

    $('.btn-taxes-breakdown').click(function () {

      $('.breakdown-taxes-hidden').each(function () {

        if ($(this).data('visible') == false) {
          $(this).css('display', 'table-row');
          $(this).data('visible', true);

          $('.btn-taxes-breakdown span').html('Hide Breakdown');
          $('.btn-taxes-breakdown i').removeClass('glyphicon-menu-down').addClass('glyphicon-menu-up');
        } else {
          $(this).css('display', 'none');
          $(this).data('visible', false);

          $('.btn-taxes-breakdown span').html('View Breakdown');
          $('.btn-taxes-breakdown i').removeClass('glyphicon-menu-up').addClass('glyphicon-menu-down');
        }
      })
      return false;
    });

    $('.btn-fees-breakdown').click(function () {

      $('.breakdown-fees-hidden').each(function () {

        if ($(this).data('visible') == false) {
          $(this).css('display', 'table-row');
          $(this).data('visible', true);

          $('.btn-fees-breakdown span').html('Hide Breakdown');
        } else {
          $(this).css('display', 'none');
          $(this).data('visible', false);

          $('.btn-fees-breakdown span').html('View Breakdown');
        }
      })
      return false;
    });

    var guestsDropdown = $('.js-guestsDropdown'),
            guestsDropdownBtn = $('#guestsDropdownBtn');
        guestsDropdownClose = $('#guestsDropCloseBtn');
        guestsDropdown.on('click', function(event) {
            event.stopPropagation()
        });
        guestsDropdownClose.click(function() {
            guestsDropdownBtn.dropdown('toggle')
        })


    // Guests dropdown
    var guestsOccupants = $('.js-guestsOccupants'),
        guestsOccLabel = $('.js-guestsOccLabel'),
        guestsBeds = $('.js-guestsBeds'),
        guestsBedsLabel = $('.js-guestsBedsLabel'),
        guestsOccBtn = guestsOccupants.siblings('.js-guestsOccBtn'),
        guestsBedsBtn = guestsBeds.siblings('.js-guestsBedsBtn'),
        guestsClearBtn = $('#guestsDropClearBtn'),
        guestsSum = 0;

    var guestsCount = function(item, itemLabel) {
      guestsSum = 0;

      item.each(function() {
        guestsSum += +$(this).val();
      });
      
      itemLabel.text(guestsSum);
    }

    guestsOccBtn.on('click', function() {
      guestsCount(guestsOccupants, guestsOccLabel);
    });

    guestsBedsBtn.on('click', function() {
      guestsCount(guestsBeds, guestsBedsLabel);
    });

    guestsClearBtn.on('click', function() {
      guestsCount(guestsOccupants, guestsOccLabel);
      guestsCount(guestsBeds, guestsBedsLabel);
    });



    // Compare bar sticky functionality
    var compareElem = $('.js-compareElem');

    if (compareElem.length) {
      $(window).scroll(function(){
        var	compareElemPosition = compareElem.offset(),
          compareElemHeight = compareElem.height(),
          compareBar = $('#compareBar'),
          compareBarSlideOffset = 10;
          compareElem = $('.js-compareElem');

        if ($(window).width() > 767) {

          if($(window).scrollTop() > (compareElemPosition.top + compareElemHeight + compareBarSlideOffset)){
            
            compareBar.addClass('is-sticky');
          } else {
            compareBar.removeClass('is-sticky');
          }
        }
      });
    }

  });
})(jQuery);

function add_tooltip() {
  jQuery('.available').tooltipster({
    interactive: true,
    multiple: true
  });
}

function run_waitMe(container, effect, message) {
  message = typeof message !== 'undefined' ? message : 'Please wait ...';
  effect = typeof effect !== 'undefined' ? effect : 'bounce';

  jQuery(container).waitMe({
    effect: effect,
    text: message,
    bg: 'rgba(255,255,255,0.7)',
    color: '#000',
    sizeW: '',
    sizeH: '',
    source: 'img.svg'
  });
}

function hide_waitMe(container) {
  jQuery(container).waitMe('hide');
}
