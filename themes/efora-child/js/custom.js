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
});
