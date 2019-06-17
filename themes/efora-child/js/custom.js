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
  	 		var myDate = new Date(jQuery("#start_date_popup").val());
            myDate.setDate(myDate.getDate() + 1);
  	 		jQuery(this).datepicker({
               minDate:myDate
  	 	    });
        jQuery("#end_date_popup").val("");
        jQuery( this).datepicker("refresh");
  	 	}else{
        jQuery("#end_date_popup").val("");
  	 		myDate = new Date();
  	 		myDate.setDate(myDate.getDate() + 1);
  	 		jQuery(this).datepicker({
               minDate:myDate
  	 	    });
        jQuery( this).datepicker("refresh");
  	 	}	
  	 }else{
       myDate = new Date();
       myDate.setDate(myDate.getDate() + 1);
  	 	jQuery(this).datepicker({
         minDate:myDate
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

  //jQuery(".closemenu").next().find("a").css({"color":"#fff"});
});
