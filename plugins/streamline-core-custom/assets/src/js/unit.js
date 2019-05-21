/**
 * Plugin script for when display a single property.
 *
 * Note: this script depends streamlinecoreConfig (ajaxUrl) being enqueued by WordPress
 *
 * [TODO] this script makes masterslider.js throw the following error:
 *        "Uncaught TypeError: Cannot read property 'wakeup' of undefined"
 *        Seams to be when no image are available, not confirmed.
 */
jQuery(document).ready(function ($) {

  jQuery('#resortpro_form_checkout').submit(function(event){
    var found_errors = false;
    if(jQuery('#book_occupants').val()==''){
      found_errors = true;
      jQuery('#book_occupants_error').css('display','block');      
    }
    return !found_errors;
  });

    // Property slider
  var sliderHeight = jQuery('#masterslider2').data('slider-height'),
      sliderControls = $('#masterslider2').data('slider-controls');

  if(!jQuery.isNumeric(sliderHeight)){
    sliderHeight = 420;
  }

  var slider = new MasterSlider();
  slider.setup('masterslider2', {
    width: 780,
    height: sliderHeight,
    // autoHeight: true,
    space: 0,
    loop: true,
    view: 'fadeWave',
    layout: 'boxed'
  });

  slider.control('arrows');
  slider.control('lightbox');
  slider.control('circletimer', {color: "#FFFFFF", stroke: 9});
  
  if (sliderControls === 'bullets') {
    slider.control('bullets' , {autohide:false  , dir:"h", align:"bottom", margin:15});
  } else if (sliderControls === 'thumblist') {
    slider.control('thumblist' , {autohide: false , dir: 'h', arrows: false});
  }
  bulletsScrollTrigger(slider);


  var sliderHeight2 = jQuery('#masterslider').data('slider-height'),
      sliderControls2 = $('#masterslider').data('slider-controls');

  if(!jQuery.isNumeric(sliderHeight2)){
    sliderHeight2 = 420;
  }

  var slider2 = new MasterSlider();
  slider2.setup('masterslider', {
    width: 540,
    height: sliderHeight2,
    space: -5,
    start: 2,
    preload: 4,
    loop: true,
    view: 'fadeWave',
    layout: 'partialview'
  });

  slider2.control('arrows');
  slider2.control('lightbox');
  slider2.control('circletimer', {color: "#FFFFFF", stroke: 9});

  if (sliderControls2 === 'bullets') {
    slider2.control('bullets' , {autohide:false  , dir:"h", align:"bottom", margin:15});
  } else if (sliderControls2 === 'thumblist') {
    slider2.control('thumblist' , {autohide: false , dir: 'h', arrows: false});
  }
  bulletsScrollTrigger(slider2);


  var sliderHeight3 = jQuery('#masterslider3').data('slider-height'),
      sliderControls3 = $('#masterslider3').data('slider-controls');

  if(!jQuery.isNumeric(sliderHeight3)){
    sliderHeight3 = 420;
  }

  var slider3 = new MasterSlider();
  slider3.setup('masterslider3', {
    // autoplay: true,
    width: 860,
    height: sliderHeight3,
    // autoHeight:true,
    space: 2,
    start: 1,
    loop: true,
    preload: 4,
    view: 'basic',
    layout: 'partialview'
  });

  slider3.control('arrows', {autohide:false});
  slider3.control('lightbox');
  slider3.control('circletimer', {color: "#FFFFFF", stroke: 9});

  if (sliderControls3 === 'bullets') {
    slider3.control('bullets' , {autohide:false  , dir:"h", align:"bottom", margin:15});
  } else if (sliderControls3 === 'thumblist') {
    slider3.control('thumblist' , {autohide: false , dir: 'h', arrows: false});
  }
  bulletsScrollTrigger(slider3);



  var sliderHeight4 = $('#masterslider4').data('slider-height'),
      sliderControls4 = $('#masterslider4').data('slider-controls');

  if(!jQuery.isNumeric(sliderHeight4)){
    sliderHeight4 = 879;
  }

  var slider4 = new MasterSlider();
  slider4.setup('masterslider4', {
    // autoplay: true,
    width: 1920,
    height: sliderHeight4,
    // autoHeight:true,
    space: 2,
    speed: 40,
    start: 1,
    loop: true,
    preload: 4,
    view: 'basic',
    layout: 'fillwidth'
  });

  slider4.control('arrows', {autohide:false});
  slider4.control('lightbox');
  slider4.control('circletimer', {color: "#FFFFFF", stroke: 9});

  if (sliderControls4 === 'bullets') {
    slider4.control('bullets' , {autohide:false  , dir:"h", align:"bottom", margin:15});
  } else if (sliderControls4 === 'thumblist') {
    slider4.control('thumblist' , {autohide: false , dir: 'h', arrows: false});
  }
  bulletsScrollTrigger(slider4);


  
  // Property slider bullets scroll
  var sliderBulletsScroll = function(bulletContainer, bulletItems, bulletWidth, scrollSize, scrollOffset) {
    var selectedBullet = $('.ms-bullet-selected'),
        firstBulletIndex = bulletItems[0],
        lastBulletIndex = bulletItems[bulletItems.length - 1];

    switch(true) {
      case selectedBullet.position().left > scrollOffset:
        scrollSize.value += bulletWidth;
        bulletContainer.animate({
          scrollLeft: scrollSize.value
        }, 400);
        break;

      case selectedBullet.position().left < bulletWidth:
        scrollSize.value -= bulletWidth;
        bulletContainer.animate({
          scrollLeft: scrollSize.value
        }, 400);
        break;
    }

    switch(true) {
      case selectedBullet.index() === firstBulletIndex:
        scrollSize.value = 0;
        bulletContainer.animate({
          scrollLeft: scrollSize.value
        }, 400);
        break;

      case selectedBullet.index() === lastBulletIndex:
        scrollSize.value = bulletContainer[0].scrollWidth - bulletContainer[0].offsetWidth;
        
        bulletContainer.animate({
          scrollLeft: scrollSize.value
        }, 400);
        break;
    }
  }

  function bulletsScrollTrigger(sliderElement) {
    if (typeof sliderElement !== 'undefined' && typeof sliderElement.api !== 'undefined') {
      sliderElement.api.addEventListener(MSSliderEvent.INIT , function() {
        var sliderBulletContainer = $('div.ms-bullets-count'),
            bulletItems = [],
            sliderBullet = sliderBulletContainer.children('.ms-bullet'),
            bulletWidth = sliderBullet.outerWidth(true),
            bulletScroll = {value: 0},
            scrollOffset = sliderBulletContainer.width() - (bulletWidth + 5);
  
        sliderBullet.each(function() {
          bulletItems.push($(this).index());
        });
    
        sliderBulletContainer.scrollLeft(0);
        
        sliderElement.api.addEventListener(MSSliderEvent.CHANGE_START , function(){
          
          sliderBulletsScroll(sliderBulletContainer, bulletItems, bulletWidth, bulletScroll, scrollOffset);
        });
      });
    }
  }

  

  offset = 0;
  if( $('body.admin-bar').length > 0 ) offset = 32;
  var topSpacingVal = offset + parseInt(jQuery('.sticky').attr('data-top-spacing'));
  var bottomSpacingVal = parseInt(jQuery('.sticky').attr('data-bottom-spacing'));

  jQuery('.to_top_btn').on('click', function(){
    jQuery("html, body").animate({
      scrollTop: $('.breadcrumb_area').offset().top + 20
    }, "slow");
    return false;
  });
  // read more amenity
  jQuery(document).ready(function(){
    if(jQuery('.container_p_amenity .amenity_item:nth-child(11)').length > 0){
      jQuery('.r_more_amenity').on('click', function(){
        if(jQuery('.container_p_amenity .amenity_item:nth-child(11)').css('display') == 'block'){
          jQuery('.container_p_amenity .amenity_item').css('display', 'none');
          jQuery('.container_p_amenity .amenity_item:nth-child(-n+10)').css('display', 'block');
          jQuery(this).html('Read More &nbsp;&nbsp;<i class="fa fa-angle-down"></i>');
        }else{
          jQuery('.container_p_amenity .amenity_item').css('display', 'block');
          jQuery(this).html('Read Less &nbsp;&nbsp;<i class="fa fa-angle-up"></i>');
        }
      });
    }else{
      jQuery('.r_more_amenity').remove();
    }
  });

  // read more description detail page

  jQuery(document).ready(function(){

    // remove restriction message from premium detail page step 1
    jQuery('#book_start_date').on('click', function(){
      jQuery('.error .book_now_restrictions').text("").hide();
    });

    // alert(jQuery('.description_text').length);
    if(jQuery('.description_text').length > 0){
      var container_p_description = jQuery('.description_text').html();
      var wordsCount = container_p_description.split(' ').length;
      var full_text = jQuery('.description_text').html();
      // alert(wordsCount);
      if(wordsCount > 100){
        jQuery(".description_text").each(function () {
          var str =  jQuery('.description_text').html().substr(0,400);
          var wordIndex = str.lastIndexOf(" ");
          var split_text = str.substr(0, wordIndex) + '...';
          var length_desc =  jQuery('.description_text').html(split_text);

          jQuery('.r_more_description').on('click', function(){
            if(jQuery('.r_more_description').text().indexOf('More') > -1){
              length_desc = jQuery('.description_text').html(full_text);
              jQuery('.r_more_description').html('Read Less <i class="fa fa-angle-up"></i>');

            }else{
              jQuery('.description_text').html(split_text);
              jQuery('.r_more_description').html('Read More <i class="fa fa-angle-down"></i>');
            }
          });
        });
      }else{
        jQuery('.r_more_description').remove();
      }
    }
   
   // view more dates
    if(jQuery('.availability-calendar .ui-datepicker-group:nth-child(4)').length > 0){
      jQuery('.v_more_dates').on('click', function(){
        if(jQuery('.availability-calendar .ui-datepicker-group:nth-child(4)').css('display') == 'block'){
          jQuery('.availability-calendar .ui-datepicker-group').css('display', 'none');
          jQuery('.availability-calendar .ui-datepicker-group:nth-child(-n+3)').css('display', 'block');
            jQuery(this).html('View More Dates &nbsp;&nbsp;<i class="fa fa-angle-down">');
        }else{
          jQuery('.availability-calendar .ui-datepicker-group').css('display', 'block');
          jQuery(this).html('View Less Dates &nbsp;&nbsp;<i class="fa fa-angle-up"></i>');
        }
      });
    }else{
      jQuery('.v_more_dates').remove();
    }
  });



  jQuery(document).on('click', '.subtotal_expand i', function(){
    jQuery('.breakdown-days-hidden').slideToggle();
  });

  jQuery(document).on('click', '.taxes_expand i', function(){
    jQuery('.breakdown-taxes-hidden').slideToggle();
  });

  jQuery(document).ready(function(){
    // expand optional feel step 4 detail page
    // jQuery('#expand_extras i').on('click', function(){
    //   jQuery('.ad_extras_tx').slideToggle();
    // });
      jQuery(document).on('click', '#expand_extras i', function(){
        jQuery('.ad_extras_tx').slideToggle();
      });

  });
  
  jQuery('.sticky').sticky({
    topSpacing: topSpacingVal,
    bottomSpacing: bottomSpacingVal
  });



  jQuery('#btn-modal-book').click(function () {
    run_waitMe('#myModal .modal-content', 'bounce', 'Processing request...');
    jQuery("#modal_form").submit();
  });



   // Expandable text blocks
   var textBlockHeight,
      textBlockPosition = 'collapsed',
      reviewBlock = $('.js-expandableReview'),
      lightboxRevEmSize = 6,
      reviewExpandBtnMarkup = '<a href="#" class="c-expandable-text__link js-expandableLink">Show more</a>';

   var setTextHeight = function(textElement, textBlockInitialHeight, textEmSize, expandBtnMarkup, expandBtnText, collapseBtnText) {

     function emUnit(input) {
       var emSize = parseFloat(textElement.css('font-size'));
       return (emSize * input);
     }

     textBlockHeight = emUnit(textEmSize ? textEmSize : 6);

       if (textBlockInitialHeight > textBlockHeight && textBlockPosition === 'collapsed') {

         textElement
           .addClass('is-collapsed')
           .removeClass('is-expanded')
           .css('height', textBlockHeight);

         if (textElement.siblings('.js-expandableLink').length === 0) {
           textElement.after(expandBtnMarkup);
         }

       } else if (textBlockInitialHeight > textBlockHeight && textBlockPosition === 'expanded') {

         textElement
           .addClass('is-expanded')
           .removeClass('is-collapsed')
           .css('height', textBlockInitialHeight);

       } else {

         textElement
           .removeClass('is-collapsed')
           .removeClass('is-expanded')
           .next('.js-expandableLink').remove();
       }


       textElement.parent().unbind().on('click', '.js-expandableLink', function(event) {
       event.preventDefault();

       if (textBlockPosition === 'collapsed') {

         textElement
           .animate({
             height: textBlockInitialHeight
           }, 300)
           .addClass('is-expanded')
           .removeClass('is-collapsed');
         textBlockPosition = 'expanded';
         $(this).html(collapseBtnText ? collapseBtnText : 'Show less');

       } else {

         textElement
           .animate({
             height: textBlockHeight
           }, 300)
           .removeClass('is-expanded')
           .addClass('is-collapsed');
         textBlockPosition = 'collapsed';
         $(this).html(expandBtnText ? expandBtnText : 'Show more');

       }
     });
   };



   // Expandable blocks
   var blockExpand = function(toggleSelector, blockSelector, scrollContainer, scrollElem, callback) {

     toggleSelector.on('click', function(event) {
       event.preventDefault();

       $(this)
         .toggleClass('is-open');
       blockSelector.animate({
               height: 'toggle',
             }, 300, callback);

       if ($(this).hasClass('is-open')) {
         
         $(this).text('Hide reviews');
         
         if (scrollContainer !== undefined && scrollElem !== undefined) {
           var topScroll = scrollElem.position().top + 78;

           scrollContainer.animate({
             scrollTop: topScroll
           }, 300);
         }

       } else {

         $(this).text('Show reviews');
       }
     });
   };



   // If book from lightbox is enabled
   var bookFromLightbox  = $('#bookFromLightbox');
   
   if (bookFromLightbox.length) {

     // Add reviews to property lightbox modal (streamshare layout)
     var modalReviews,
     lightboxHeading,
     reviewsTitle,
     /*reviewsHtml = [
       '<div class="c-unit-lightbox__item c-unit-lightbox__item--reviews">',
       '<div class="c-unit-lightbox__reviews">',
       '<div class="c-unit-lightbox__expandable js-expandableBlock"></div>',
       '</div>',
       '</div>'
     ].join('\n'),
     reviewsBtns = [
       '<a class="btn btn-lg btn-block btn-primary c-unit-lightbox__btn js-lightboxBookBtn">Book now</a>',
       '<a class="btn btn-lg btn-block btn-info c-unit-lightbox__btn c-unit-lightbox__btn--expand">Show reviews</a>'
     ].join('\n'),*/
     lightboxHeader = [
      '<div class="c-unit-lightbox__header">',
      '</div>'
     ].join('\n');
    
     $(document).on('click', '[data-toggle="lightbox"]', function(event) {
       event.preventDefault();

       $(this).ekkoLightbox({
         onShow: function(elem) {
           modalReviews = $('#lightboxReviews').clone();
           reviewsTitle = $('.js-reviewsTitle').clone().addClass('reviews-heading');
           lightboxHeading = $('.js-lightboxTitle').clone();

           $(elem.currentTarget)
             .addClass('c-unit-lightbox')
             .find('.modal-body')
               .addClass('c-unit-lightbox__wrapper')
               .prepend(lightboxHeader)
               .find('.c-unit-lightbox__header')
                .prepend(lightboxHeading)
                .siblings('.ekko-lightbox-container')
                  .addClass('c-unit-lightbox__item c-unit-lightbox__item--img');

             if (modalReviews.children().length > 0) {
               /*this.modal_body
                 .append(reviewsHtml)
                 .find('.c-unit-lightbox__reviews')
                   .prepend(reviewsBtns)
                   .children('.js-expandableBlock')
                    .prepend(reviewsTitle, modalReviews)
                    .find('.c-review__body')
                      .addClass('c-expandable-text js-expandableReview');*/
                      
                this.modal_body
                  .find('.c-unit-lightbox__item--img')
                    .addClass('is-narrow');
             } else {
               this.modal_content
                .find('.c-unit-lightbox__header')
                  .append(reviewsBtns)
                  .find('.js-lightboxBookBtn')
                    .addClass('c-unit-lightbox__header-item');
             }            
             
         },
         onShown: function() {
           var expandableBlockBtn = $('a.c-unit-lightbox__btn--expand'),
               expandableBlock = $('div.js-expandableBlock'),
               lightboxModal = $('div.c-unit-lightbox'),
               scrollElem = $('.c-unit-lightbox__item--reviews');

           // invoke expandable text function when modal is opened
           reviewBlock = $('.js-expandableReview');
           
           reviewBlock.each(function() {
             var lightboxRevInitialHeight = $(this).css('height', 'auto').height();
             setTextHeight($(this), lightboxRevInitialHeight, lightboxRevEmSize, reviewExpandBtnMarkup);
           });

           // expand block function
           blockExpand(expandableBlockBtn, expandableBlock, lightboxModal, scrollElem, function() {
             reviewBlock = $('.js-expandableReview');

             // invoke expandable text function after animation is done
             reviewBlock.each(function() {
               var lightboxRevInitialHeight = $(this).css('height', 'auto').height();
               setTextHeight($(this), lightboxRevInitialHeight, lightboxRevEmSize, reviewExpandBtnMarkup);
             });

           });
         }
       });
     });



     // Lightbox book button action
     $(document).on('click', 'a.js-lightboxBookBtn', function() {
       var bookWidget = $('#resortpro-book-unit'),
           lightboxModal = $('div.ekko-lightbox');

       if($('#book_start_date').val()!= '' || $('#book_end_date').val()!= ''){
         lightboxModal.modal('hide');
         bookWidget.addClass('is-focused');

         $("html, body").animate({
           scrollTop: bookWidget.offset().top -100
         }, "slow");

         $("#resortpro_unit_submit").trigger("click");

       } else {
         lightboxModal.modal('hide');
         bookWidget.addClass('is-focused');
         $("html, body").animate({
           scrollTop: bookWidget.offset().top -100
         }, "slow");

       }
     });

   } else {

     // Trigger lightbox modal
     $(document).delegate('[data-toggle="lightbox"]', "click", function (event) {
       event.preventDefault();
       $(this).ekkoLightbox();
     });

   }


  // Expand text blocks
  var textBlock = $('.js-expandableText'),
      textBlockInitialHeight = textBlock.css('height', 'auto').height(),
      expandButtonMarkup = [
        '<div class="c-expandable-text__link-wrapper">',
        '<button type="button" class="c-expandable-text__link js-expandableLink btn btn-primary btn--ghost">View all <i class="fa fa-angle-down"></i></button>',
        '</div>'
      ].join('\n'),
      expandBtnText = 'View all <i class="fa fa-angle-down"></i>',
      collapseBtnText = 'View less <i class="fa fa-angle-up"></i>';;

   setTextHeight(textBlock, textBlockInitialHeight, 9, expandButtonMarkup, expandBtnText, collapseBtnText);


   // on window resized actions
   $(window).resize(function() {
     clearTimeout(window.resizeFinished);
     window.resizeFinished = setTimeout(function() {

       // run setTextHeight function
       textBlockInitialHeight = textBlock.css('height', 'auto').height();
       setTextHeight(textBlock, textBlockInitialHeight, textEmSize, expandButtonMarkup, expandBtnText, collapseBtnText);

     }, 200);
   });

});
