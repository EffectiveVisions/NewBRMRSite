/**
 * Admin script to be loaded on widgets page.
 */
function resortpro_configure_search_fields(divId, hiddenId) {
	jQuery("#" + divId + " .resortpro-switcher").unbind("click");
  	jQuery("#" + divId + " .resortpro-switcher").click(function(event) {
		var par = jQuery(this).closest('li');
		jQuery(".resortpro-switchable", par).toggle();
		var arrow = (jQuery(".resortpro-switchable", par).is(":visible") ? "&uArr;" : "&dArr;");
		jQuery(this).html(arrow)
	})

  jQuery(function() {	
		jQuery("#" + divId).dialog({
			dialogClass: "ui-dialog",
			title: "Configure Complete Search Widget",
			modal: true,
			autoOpen: false,
			closeOnEscape: true,
			autoOpen: false,
			width: 800,
			height: 600,
			show: "slideIn",
			buttons: {
				Done: function() {
					resortpro_save_search_fields(divId, hiddenId);
          jQuery(this).dialog("close");
				},
				Cancel: function() {
					jQuery(this).dialog("close");
				}
			},
			open: function() {
				jQuery(".ui-dialog-buttonpane").find('button:contains("Done")').addClass("resortpro-widget-button");
			}
		});
	});

  jQuery("#" + divId).dialog("open");

  jQuery("#" + divId + "-sortable1, #" + divId + "-sortable2").sortable({
		connectWith: ".connectedSortable",
		helper: "clone"
	}).disableSelection();

  // workaround for stupid firefox that doesn't set focus to fields inside sortable: http://stackoverflow.com/q/13898027
  jQuery(".connectedSortable input, .connectedSortable select, .connectedSortable textarea").on("click", function(e) {
		jQuery(this).trigger({
			type: "mousedown",
			which: 3
		});
	});
  jQuery(".connectedSortable input, .connectedSortable select, .connectedSortable textarea").on("mousedown", function(e) {
    if (e.which ==  3) {
      jQuery(this).focus();
    }
  });
  // end of workaround

	var selectedIds = jQuery("#" + hiddenId).val().split(",");
	for (fid in selectedIds) {
		var field = selectedIds[fid];
    if (jQuery('#' + divId + '-sortable2 li[field=' + field + ']').length == 0) {
      jQuery("#" + divId + "-sortable1 li[field=" + field + "]").appendTo("#" + divId + "-sortable2");
    }
	}

	jQuery("#" + divId + "-sortable2 li").addClass("ui-state-highlight");
  jQuery("#" + divId + "-sortable2 li").removeClass("ui-state-default");
}

function resortpro_save_search_fields(divId, hiddenId) {
  var selectedIds = [];
  var searchingBy = [];

	jQuery("#" + divId + "-sortable2 li").each(function() {
		selectedIds.push(jQuery(this).attr("field"));
    searchingBy.push(jQuery(".resortpro-filtername", this).html());
	});

  jQuery("#" + hiddenId).val(selectedIds.toString());
	var par = jQuery("#" + hiddenId).closest("div");
	jQuery(".resortpro-searching-by", par).html(searchingBy.toString().replace(/,/g, ", "));
  if (searchingBy.length > 0) {
    jQuery('.resortpro-searching-by-yes',par).show();
    jQuery('.resortpro-searching-by-no',par).hide();
  } else {
    jQuery('.resortpro-searching-by-yes',par).hide();
    jQuery('.resortpro-searching-by-no',par).show();
  }

  jQuery(".resortpro-var-container", par).each(function() {
		var id = jQuery(this).attr("id");
    if (jQuery("#" + id + "-tmp").is(":checkbox")) {
       jQuery("#" + id).val(0 + jQuery("#" + id + "-tmp").is(":checked"));
    } else {
      jQuery("#" + id).val(jQuery("#" + id + "-tmp").val());
    }
	});
}

jQuery(document).ready(function($) {
	
	jQuery('.resortpro-widget-filters select').change(function(){		
		jQuery('.dirty_data').trigger('change');
	});
	jQuery('.resortpro-widget-filters input').keypress(function(){		
		jQuery('.dirty_data').trigger('change');
	});
	jQuery('.resortpro-widget-filters input').click(function(){		
		jQuery('.dirty_data').trigger('change');
	});

	var dateFormat = "mm/dd/yy";
	var from = jQuery('.inquiry-from').datepicker({
		minDate: 0,
		changeMonth : true,
		dateFormat : dateFormat
	}).on("change", function(){
		to.datepicker( "option", "minDate", getDate( this ) );
	});


	var to = jQuery('.inquiry-to').datepicker({
		changeMonth : true,
		dateFormat : dateFormat
	}).on("change", function(){
		from.datepicker( "option", "maxDate", getDate( this ) );
		//from.datepicker("show");
	});;

	function getDate( element ) {
		var date;
		try {
			date = jQuery.datepicker.parseDate( dateFormat, element.value );
		} catch( error ) {
			date = null;
		}

		return date;
	}
	
	if($.isFunction('tooltip')) {
		$('.tooltips').tooltip();
  }
});
