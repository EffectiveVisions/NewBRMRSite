AOS.init();
jQuery(window).load(function() {

setTimeout(function(){
  if(navigator.userAgent.indexOf("Speed Insights") == -1) { 
      var js = ["/wp-content/themes/efora-child/js/tp.widget.bootstrap.min.js"];
      var $head = jQuery("head");
      for (var i = 0; i < js.length; i++) {
	      $head.append("<script defer='true' src=\"" + js[i] + "\"></scr" + "ipt>");
      }
  }
}, 6000)

if(jQuery('.frm_error_style')[0] || jQuery('.frm_message')[0]){
    setTimeout(function(){
       jQuery('html, body').animate({
          scrollTop: jQuery("#contactus").offset().top-150
       });        
     },500); 
   }            
});

jQuery(document).ready(function(){              
  jQuery('.custome-loader').fadeOut("slow");
  jQuery('.selectsearch').find('.c-select-list').removeClass('form-control'); 

  jQuery("body").delegate(".datepicker-popup", "focusin", function(){
  	 if(jQuery(this).attr("id")=="end_date_popup"){
  	 	if(jQuery("#start_date_popup").val()!=""){
         jQuery(this).datepicker('setDate', null);
  	 		 var myDate = new Date(jQuery("#start_date_popup").val());
         myDate.setDate(myDate.getDate() + 1);
  	 		 jQuery(this).datepicker({
               minDate:myDate,
               onSelect: function(selectedDate){
                  jQuery("#search_end_date_single").val("");
                  jQuery("#search_start_date_single").val("");

               }
  	 	   });
        jQuery("#end_date_popup").val("");
        
  	 	}else{
        jQuery(this).datepicker('setDate', null);
        jQuery("#end_date_popup").val("");
  	 		myDate = new Date();
  	 		myDate.setDate(myDate.getDate() + 1);
  	 		jQuery(this).datepicker({
               minDate:myDate,
               onSelect: function(selectedDate){
                  jQuery("#search_end_date_single").val("");
                  jQuery("#search_start_date_single").val("");
               }
  	 	    });
        jQuery( this).datepicker("refresh");
  	 	}	
  	 }else{
       var input = jQuery('#end_date_popup');
       input.val('');
       input.trigger('input'); 
       input.trigger('change'); 
       myDate = new Date();
       myDate.setDate(myDate.getDate() + 1);
  	 	 jQuery(this).datepicker({
         minDate:myDate,
         onSelect: function (selectedDate) {
            myDate = new Date(selectedDate);
            myDate.setDate(myDate.getDate() + 1);
            jQuery('#end_date_popup').datepicker('option', 'minDate', myDate);
            jQuery("#search_end_date_single").val("");
            jQuery("#search_start_date_single").val("");
         }
       });
       jQuery(this).datepicker("refresh");
  	 }  
  	 jQuery("body").append(jQuery("#ui-datepicker-div"));
   });

  jQuery(".mainmenu").css({"background":"#005a9a","margin-top":"15px"})
  jQuery(".mainmenu").css({"color":"#fff"})
  jQuery(".community").css({"padding-left":"20px"});
  jQuery(".community").css({"background":"rgb(237, 241, 243)"});
  jQuery(".mainmenu").children("a").css({"color":"#fff","font-weight":"bold"});

  jQuery(".increase-adult").on("click",function() {
    setTimeout(function(){
       jQuery(".homepagesearch").find(".guests-sum").html("");
       jQuery(".homepagesearch").find(".guests-sum-label").html("Guest");
       jQuery(".homepagesearch").find(".adults_label").html("Adult");
       jQuery(".homepagesearch").find(".children-label").html("Child");
       jQuery(".searchbyarea-banner").find(".guests-sum").html("");
       jQuery(".searchbyarea-banner").find(".guests-sum-label").html("Guest");
       jQuery(".searchbyarea-banner").find(".adults_label").html("Adult");
       jQuery(".searchbyarea-banner").find(".children-label").html("Child");
       jQuery(".homepagesearch").find(".adultscount").html("");
       jQuery(".homepagesearch").find(".children-count").html("");
       jQuery(".searchbyarea-banner").find(".adultscount").html("");
       jQuery(".searchbyarea-banner").find(".children-count").html("");
    },200)
      
      
  });

  jQuery(".decrease-adult").on("click",function() {
      setTimeout(function(){
         jQuery(".homepagesearch").find(".guests-sum").html("");
         jQuery(".homepagesearch").find(".guests-sum-label").html("Guest");
         jQuery(".homepagesearch").find(".adults_label").html("Adult");
         jQuery(".homepagesearch").find(".children-label").html("Child");
         jQuery(".searchbyarea-banner").find(".guests-sum").html("");
         jQuery(".searchbyarea-banner").find(".guests-sum-label").html("Guest");
          jQuery(".homepagesearch").find(".adultscount").html("");
         jQuery(".homepagesearch").find(".children-count").html("");
         jQuery(".searchbyarea-banner").find(".adultscount").html("");
         jQuery(".searchbyarea-banner").find(".children-count").html("");
         jQuery(".searchbyarea-banner").find(".adults_label").html("Adult");
         jQuery(".searchbyarea-banner").find(".children-label").html("Child");
       },200)
  });

  jQuery(".increase-child").on("click",function(){
       setTimeout(function(){
         jQuery(".homepagesearch").find(".guests-sum").html("");
         jQuery(".homepagesearch").find(".guests-sum-label").html("Guest");
         jQuery(".homepagesearch").find(".adults_label").html("Adult");
         jQuery(".homepagesearch").find(".children-label").html("Child");
         jQuery(".searchbyarea-banner").find(".guests-sum").html("");
         jQuery(".searchbyarea-banner").find(".guests-sum-label").html("Guest");
         jQuery(".searchbyarea-banner").find(".adults_label").html("Adult");
         jQuery(".searchbyarea-banner").find(".children-label").html("Child");
         jQuery(".homepagesearch").find(".adultscount").html("");
         jQuery(".homepagesearch").find(".children-count").html("");
         jQuery(".searchbyarea-banner").find(".adultscount").html("");
         jQuery(".searchbyarea-banner").find(".children-count").html("");
       },200)
  });

  jQuery(".decrease-child").on("click",function(){
      setTimeout(function(){
         jQuery(".homepagesearch").find(".guests-sum").html("");
         jQuery(".homepagesearch").find(".guests-sum-label").html("Guest");
         jQuery(".homepagesearch").find(".adults_label").html("Adult");
         jQuery(".homepagesearch").find(".children-label").html("Child");
         jQuery(".searchbyarea-banner").find(".guests-sum").html("");
         jQuery(".searchbyarea-banner").find(".guests-sum-label").html("Guest");
         jQuery(".homepagesearch").find(".adultscount").html("");
         jQuery(".homepagesearch").find(".children-count").html("");
         jQuery(".searchbyarea-banner").find(".adultscount").html("");
         jQuery(".searchbyarea-banner").find(".children-count").html("");
       },200)
  });

  jQuery(".rounded-circle").one("click", function(){
     if(jQuery(this).hasClass( "increase-adult") || jQuery(this).hasClass("decrease-adult") || jQuery(this).hasClass("decrease-child") || jQuery(this).hasClass("increase-child")){
       
       jQuery(".homepagesearch").find(".pets_count").val("");
       jQuery(".homepagesearch").find(".pets_count").trigger('input') ;// Use for Chrome/Firefox/Edge
       jQuery(".homepagesearch").find(".pets_count").trigger('change');
       jQuery(".homepagesearch").find("#guestsDropClearBtn").trigger("click");
       jQuery(".searchbyarea-banner").find("#guestsDropClearBtn").trigger("click");
       jQuery(".searchbyarea-banner").find(".pets_count").val("");
       jQuery(".searchbyarea-banner").find(".pets_count").trigger('input') ;// Use for Chrome/Firefox/Edge
       jQuery(".searchbyarea-banner").find(".pets_count").trigger('change');
     }else{
         jQuery(".mobile-nav-calender").find("#guestsDropClearBtn1").trigger("click");
         jQuery(".mobile-nav-calender").find(".pets_count").val("");
         jQuery(".mobile-nav-calender").find(".pets_count").trigger('input');
         jQuery(".mobile-nav-calender").find(".pets_count").trigger('change');
     }
  });

  jQuery(".rounded-circle").on("click",function(){

     if(jQuery(this).hasClass( "increase-adult") || jQuery(this).hasClass("decrease-adult") || jQuery(this).hasClass("decrease-child") || jQuery(this).hasClass("increase-child")){
          
     }else{
        setTimeout(function(){
            var homeadultscount   = parseInt(jQuery(".homepagesearch").find(".adultscount").html());
            var homechildrencount = parseInt(jQuery(".homepagesearch").find(".children-count").html());
            var searchadultscount = parseInt(jQuery(".searchbyarea-banner").find(".adultscount").html());
            var searchchildcount  = parseInt(jQuery(".searchbyarea-banner").find(".children-count").html());
            if(homeadultscount && homeadultscount>1){
                 jQuery(".homepagesearch").find(".adults_label").html("Adults");
            }else{
                 jQuery(".homepagesearch").find(".adults_label").html("Adult");
            }
            if(homechildrencount && homechildrencount>1){
                jQuery(".homepagesearch").find(".children-label").html("Children");
            }else{
                jQuery(".homepagesearch").find(".children-label").html("Child");
            }
            if(searchadultscount && searchadultscount>1){
                jQuery(".searchbyarea-banner").find(".adults_label").html("Adults");
            }else{
                jQuery(".searchbyarea-banner").find(".adults_label").html("Adult");
            }
            if(searchchildcount && searchchildcount>1){
                jQuery(".searchbyarea-banner").find(".children-label").html("Children");
            }else{
                jQuery(".searchbyarea-banner").find(".children-label").html("Child");
            }
            jQuery(".mobile-nav-calender").find(".guests-sum").html("");
            jQuery(".mobile-nav-calender").find(".guests-sum-label").html("Guest");
        },200)
     }
  });

});
