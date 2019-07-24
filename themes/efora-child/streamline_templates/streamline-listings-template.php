<section ng-controller="PropertyController as pCtrl" ng-cloak class="featureProperty py-md-5 py-4 bg-light">
    <button class="btn theme-btn filter-btn filter-tool d-md-block d-none" type="button">Filter</button>
    <div>
        <div class="container" ng-init="<?php echo apply_filters('streamline-search-results-params', $str_params); ?>;sortBy='<?php echo $sorted_by; ?>'; loadBtn = true;">
           <div ng-init="availabilitySearch();">

              <div class="row  align-items-center mx-0 border py-2 px-sm-3 px-2 bg-white my-2">
                <div class="order-xl-2 d-flex order-2 align-items-center">
                 <label ng-if="view == 'listview' || currentView == 'listview'" class="text-uppercase  text-black mb-0 font-13 font-weight-semi-bold d-none d-sm-block">List View</label>
                  <label ng-if="view == 'gridview' || currentView == 'gridview'" class="text-uppercase text-black  mb-0 font-13 font-weight-semi-bold d-none d-sm-block">Grid View</label>
                  <label ng-if="view == 'mapview' || currentView == 'mapview'" class="text-uppercase text-black  mb-0 font-13 font-weight-semi-bold d-none d-sm-block">Map View</label>
                    <div class="pr-3 divider-view  d-none d-sm-block">&nbsp;</div>
                    <div class="sorting search-icons d-flex ml-sm-3 mb-1 mb-sm-0" >
                       <a ng-class="{'selected_view': view == 'gridview'}" ng-if="searchSettings.enable_list_view > 0" class="grid_view sort-view  mr-1 rounded" ng-click="changeToGridView()" href="javascript:void(0)">
                          <div class="mb-0   short-icon icon-15 rounded  text-center active d-flex  align-items-center h-100 justify-content-center">
                              <i class="icon icon-grid text-white font-14"></i>
                          </div>
                        </a>
                        <a ng-class="{'selected_view': view == 'listview'}" ng-if="searchSettings.enable_list_view > 0" class="list_view sort-view  mr-1 rounded  d-md-block d-none" ng-click="changeToListView()" href="javascript:void(0)">
                            <div class="mb-0  short-icon  icon-15 rounded  text-center d-flex  align-items-center h-100 justify-content-center">
                                <i class="icon icon-list text-white font-14"></i>
                            </div>
                        </a>
                        <a ng-class="{'selected_view': view == 'mapview'}" ng-if="searchSettings.enable_map_view > 0" class="map_view sort-view  rounded" ng-click="changeToMapView()" href="javascript:void(0)">
                            <div class="mb-0 short-icon    icon-15 rounded  text-center d-flex  align-items-center h-100 justify-content-center">
                                <i class="icon icon-location-mark text-white font-14"></i>
                            </div>
                        </a>
                    </div>
                  </div>


                  <div class="sorting search-filter d-inline-flex ml-auto align-items-center order-3 order-xl-3  mb-1 mb-sm-0">
                      <?php if ($options['property_show_sorting_options']): ?>
                         <?php $default = ($sorted_by == 'random' || $sorted_by == 'rotation') ? $sorted_by : 'default'; ?>
                          <label class="text-uppercase mb-0 font-weight-semi-bold font-13 text-black text-nowrap">Sort By: &nbsp;</label>
                         <div ng-init="sortBy='<?php echo $sorted_by; ?>'" class="form-group mb-0">
                          <select ng-model="sortBy" ng-change="checkSorting()" class="form-control border-top-0 py-0  pl-2 pr-3 border-left-0 border-right-0 bg-transparent rounded-0 font-13 pl-1" id="">
                             <option value="<?php echo $default ?>"><?php _e( 'Sort By', 'streamline-core' ) ?></option>
                             <?php foreach($arr_sort_fields as $key => $value): ?>
                                <option value="<?php echo $value['value']; ?>"><?php _e( $value['label'], 'streamline-core' ) ?></option>
                             <?php endforeach; ?>
                          </select>
                        </div>
                       <?php endif; ?>
                       <a href="javascript:void(0)" class=" d-none">
                        <figure class="mb-0 icon-15 rounded ml-sm-3 ml-4 text-center theme-bg-color icon-25 filter-tool d-flex align-items-center justify-content-center">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="13px" height="13px" viewBox="0 0 402.577 402.577" style="enable-background:new 0 0 402.577 402.577;" xml:space="preserve"><g><g>
                            <path d="M400.858,11.427c-3.241-7.421-8.85-11.132-16.854-11.136H18.564c-7.993,0-13.61,3.715-16.846,11.136   c-3.234,7.801-1.903,14.467,3.999,19.985l140.757,140.753v138.755c0,4.955,1.809,9.232,5.424,12.854l73.085,73.083   c3.429,3.614,7.71,5.428,12.851,5.428c2.282,0,4.66-0.479,7.135-1.43c7.426-3.238,11.14-8.851,11.14-16.845V172.166L396.861,31.413   C402.765,25.895,404.093,19.231,400.858,11.427z" data-original="#000000" class="active-path" data-old_color="#ffffff" fill="#ffffff"/>
                          </g></g> </svg>
                        </figure>
                      </a>
                  </div>
              </div>

              <!-- filters -->

                    <div class="updated-content order-1 order-xl-1 mb-1 mb-sm-0 text-capitalize filtersec"> 
                      <span class="badge badge-primary custome-bage  font-weight-light-bold font-13  py-0 d-none">
                        <span class="checkindate"></span>&nbsp;&nbsp;<i class="d-none icon icon-plus position-relative font-12" style="transform: rotate(45deg); display: inline-block;"></i>
                      </span>
                      <span class="badge badge-primary custome-bage  font-weight-light-bold font-13 py-0 d-none">
                         <span class="checkoutdate"></span>&nbsp;&nbsp;<i class="d-none icon icon-plus position-relative font-12" style="transform: rotate(45deg); display: inline-block;"></i>
                      </span>
                      <span class="badge badge-primary custome-bage  font-weight-light-bold font-13  py-0 d-none">
                         <span class="adultsquant"></span>&nbsp;&nbsp;<i class="d-none icon icon-plus position-relative font-12" style="transform: rotate(45deg); display: inline-block;"></i>
                      </span>
                       <span class="badge badge-primary custome-bage  font-weight-light-bold font-13  py-0 d-none">
                         <span class="childrenquant"></span>&nbsp;&nbsp;<i class="d-none icon icon-plus position-relative font-12" style="transform: rotate(45deg); display: inline-block;"></i>
                      </span>
                      <span class="badge badge-primary custome-bage  font-weight-light-bold font-13 py-0 d-none">
                        <span class="bedsquant"></span>&nbsp;&nbsp;<i class="d-none icon icon-plus position-relative font-12" style="transform: rotate(45deg); display: inline-block;"></i>
                      </span>
                       <span class="badge badge-primary custome-bage  font-weight-light-bold font-13  py-0 d-none">
                         <span class="petsquant"></span>&nbsp;&nbsp;<i class="d-none icon icon-plus position-relative font-12" style="transform: rotate(45deg); display: inline-block;"></i>
                      </span>
                       <span class="badge badge-primary custome-bage  font-weight-light-bold font-13  py-0 d-none">
                         <span class="locationname"></span>&nbsp;&nbsp;<i class="d-none icon icon-plus position-relative font-12" style="transform: rotate(45deg); display: inline-block;"></i>
                      </span>
                      <span class="badge badge-primary custome-bage  font-weight-light-bold font-13  py-0 px-0 d-none">
                         <div class="dropdown">
                            <button style="color:#fff; text-decoration:none;" class="btn view-all-filters px-2 btn-link py-0  font-weight-light-bold font-13 text-white position-relative  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Amenities
                            </button>
                            <div class="dropdown-menu ammenties-item py-2 px-3" aria-labelledby="dropdownMenuButton">
                                
                            </div>
                          </div>
                      </span>
                      <span>
                          <button ng-if="showclearbtn" ng-click="clearFilter()" class="btn btn-link py-0 font-weight-light-bold font-15 px-md-2 pl-sm-0" type="button">
                          Clear
                      </button>
                      </span>
                    </div>
                    <!-- close here -->

              <!--Loader start -->
              <div  ng-if="loadingShow == 'true' && enabledlistview == 'true' && loadMoreShow=='false'" class="row loading pt-3">
                  <?php include('listviewloading.php'); ?>
              </div>
              <div ng-if="loadingShow == 'true' && enabledlistview == 'false' && currentView !='mapview' && loadMoreShow=='false'" class="row listings_wrapper_box loading">
                  <?php include('gridviewloading.php'); ?>
              </div>
              <!--Loader end -->


              <!-- No result message -->
              <div class="row no-message">
                <div ng-if="loadingShow != 'true' && currentView !='mapview'" class="col-lg-12 col-sm-12 p-sm-3 px-3 pt-3">
                    <div class="noresult" ng-if="noResults ||  filteredItems.length==0" ng-cloak>
                      <div class="alert alert-danger">
                        <p><?php echo $noinv_msg ?></p>
                      </div>
                    </div>
                </div>
              </div>
              <!-- End no result message -->

              <!--Grid View Start -->
              <div ng-if="isDataShow == 'true' && view == 'gridview'" class="row listings_wrapper_box" ng-init="limit = searchSettings.propertyPagination">
                 <div ng-if="filteredItems.length!=0" class="row mx-0">
                   <div ng-repeat="property in propertiesObj| orderBy: customSorting : sort | filter: priceRange | filter: amenityFilter | filter: amenityFilterOr | filter: bedroomFilter | filter: locationFilter | filter: neighborhoodFilter | filter: viewNameFilter  as filteredItems" class="col-lg-4 col-sm-6 p-sm-3 px-3 pt-3 propertydtl" data-aos="zoom-in-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000" >
                      <div>
                          <?php include($template); ?>
                      </div>
                   </div>

                </div>
              </div>
             <!--Grid View End -->
             
             <!--List View Start -->
            <?php if($search_layout == 5): ?>
             <div class="row list-container-wrapper" ng-init="limit = searchSettings.propertyPagination" style="display:none"> 
                  <div class="col-lg-12 col-sm-12 p-sm-3 px-3 pt-3 propertydtl" ng-repeat="property in propertiesObj | orderBy: customSorting : sort | filter: priceRange | filter: amenityFilter | filter: amenityFilterOr | filter: bedroomFilter | filter: locationFilter | filter: neighborhoodFilter | filter: viewNameFilter as filteredItems "  data-aos="fade-right" data-aos-anchor-placement="top-bottom" data-aos-duration="2000" >
                     <div>
                      <?php
                      include($listTemplate);
                      ?>
                     </div>
                  </div>
             </div>
           <?php endif ?>
           <!--List View End -->


           <!--Map View Start-->
           <div class="row map-container-wrapper px-0 pt-3" style="display:none"  >
              <div class="col-lg-12">
              <div class="d-inline-block w-100 shadow p-3 border">  
                <?php dynamic_sidebar('map_view_area'); ?>
              </div>     
            </div>
          </div>
            <?php include ($marker_template); ?>
           <!--Map View End-->


           <!--Pagination Start -->
           <?php if ($search_layout === '6') : ?>
             <div class="row">
                <div class="col-md-12 text-center">
                        <!-- <i ng-if="loadMoreShow == 'true'" class="fa fa-circle-o-notch fa-spin fa-2x fa-fw"></i> -->
                      <div ng-if="loadMoreShow == 'true'" class="cards-loader-cutome">
                          <div class="lds-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                          </div>
                      </div>    
                  </div>
                 <div ng-if="loadingShow != 'true'" class="col-md-12 text-center mt-md-5 my-4 pt-2 px-3">
                   <button   ng-if="loadBtn && total_units > 0 && !noResults && currentView !='mapview' && !propertiesObj.length>11 && filteredItems.length!=0 && filteredItems.length>11"
                          ng-click="loadMore();" type="button" class="btn btn-outline-primary text-uppercase font-13 load-more properties font-weight-light-bold d-none"><?php _e('Load More', 'streamline-core') ?>
                   </button>
                   <button  ng-click="showAll();" ng-if="loadBtn && total_units > 0 && !noResults && currentView !='mapview' && propertiesObj.length>11 && filteredItems.length!=0 && filteredItems.length>11" type="button" class="btn btn-outline-primary text-uppercase font-13 load-more properties font-weight-light-bold ml-md-3 mt-3 mt-md-0 showall d-none"><?php _e('Show All Results', 'streamline-core') ?></button>
                 </div>
             </div>
            <?php else: ?>
                <?php if($pagination_options == 0): ?>
                 <div class="row">
                    <div class="col-md-12 text-center">
                        <!-- <i ng-if="loadMoreShow == 'true'" class="fa fa-circle-o-notch fa-spin fa-2x fa-fw"></i> -->
                        <div ng-if="loadMoreShow == 'true'" class="cards-loader-cutome">
                            <div class="lds-ellipsis">
                              <div></div>
                              <div></div>
                              <div></div>
                              <div></div>
                            </div>
                        </div>
                          
                    </div>
                    <div ng-if="loadingShow != 'true'" class="col-md-12 text-center mt-md-5 my-4 px-3">
                        <button   ng-if="loadBtn && total_units > 0 && !noResults && currentView !='mapview' && propertiesObj.length>11 && filteredItems.length!=0 && filteredItems.length>11"
                          ng-click="loadMore();" type="button" class="btn btn-outline-primary text-uppercase font-13 load-more properties font-weight-light-bold d-none"><?php _e('Load More', 'streamline-core') ?>

                        </button>
                        <button  ng-click="showAll();" ng-if="loadBtn && total_units > 0 && !noResults && currentView !='mapview' && propertiesObj.length>11 && filteredItems.length!=0 && filteredItems.length>11" type="button" class="btn btn-outline-primary text-uppercase font-13 load-more properties font-weight-light-bold ml-md-3 mt-3 mt-md-0 showall d-none"><?php _e('Show All Results', 'streamline-core') ?>

                        </button>
                    </div>                   
                 </div>
                 
                <?php else: ?>
                 <div class="row">
                   <div class="col-md-12 text-center mt-md-5 my-4 pt-2 px-3">
                       <div infinite-scroll="loadMore();" infinite-scroll-distance='0' infinite-scroll-immediate-check="false"></div>
                   </div>
                 </div>
                <?php endif; ?>
           <?php endif ?>
           <!--Pagination End -->

           <!--Filter Start-->
            <div class="row mx-0 mt-md-0 pt-md-0  mt-3 pt-2 filter">
               <aside id="fiterbar-sidebar" class="fiterbar filter-menu-show bg-white border pt-sm-4 pt-3">
                  <div class="d-flex border-bottom pb-3 mt-sm-2 mb-3 mx-sm-4 mx-3">
                    <h6 class="mb-0">Your Travel Search</h6>
                    <div class="close-filter-sidebar ml-auto"><a href="javascript:void(0)" class="close-icon"><i class="icon icon-plus icon-c-close font-13"></i></a>
                    </div>
                  </div>
                  <div id="sidebar" class="fiterbar-sidebar-scrollable d-inline-block w-100 px-sm-4 px-3 pb-sm-4 pb-3 pt-1">
                    <input type="hidden" value="" name="checkin" id="chekinhidden">
                    <input type="hidden" value="" name="checkout" id="checkouthidden">
                    <input type="hidden" value="" name="adult" id="adulthidden">
                    <input type="hidden" value="" name="child" id="childhidden">
                    <input type="hidden" value="" name="bed" id="bedhidden">
                    <input type="hidden" value="" name="location" id="locationhidden">
                    <input type="hidden" value="" name="ammenties" id="ammentieshidden">
                    <input type="hidden" value="" name="pethidden" id="pethidden">
                    <?php if (is_active_sidebar('side_search_widget')): ?>
                       <?php dynamic_sidebar('side_search_widget'); ?>
                    <?php endif; ?>
                    <span id="updatesearch" ng-click="updateSearchparameter();"></span>
                  </div>
                </aside>
             </div>
           <!--Filter End -->

         </div>
       </div>
       <?php do_action('streamline-insert-inquiry', '', 0, $max_occupants, $max_occupants_small, $max_pets, 1, 1, true, '', '', 1, 0, 0, 'Property Inquiry' ); ?>
    </div>
     
</section>

<section ng-controller="PropertyController as pCtrl" ng-cloak class="fixed-checkin-out-sec position-fixed d-md-none theme-bg-color w-100">
    <div class="container-fluid">
        <div class="row py-3 align-items-center">
            <div class="col-7 col-sm-8 px-2 border-right">
                <div class="row mr-0 ml-1">
                  <div class="col-6 col-sm-5 px-0">
                    <label class="text-white font-12 mb-0"><span class="text-warning">Check In :</span><br class="d-sm-none"> 
                      <span class="checkinspan"></span>
                    
                    </label>
                  </div>
                   <div class="col-6 col-sm-7 px-0">
                    <label class="text-white font-12 mb-0"><span class="text-warning">Check Out :</span><br class="d-sm-none">
                      <span class="checkoutspan"></span> 
                      
                    </label>
                  </div>
                </div>
            </div>
            <div class="px-0 col-5  col-sm-4 justify-content-center d-flex">
                <a href="javascript:void(0);" ng-click="editSearch()" class="btn btn-primary text-uppercase font-12 rounded-0">Edit Search</a>
            </div>
        </div>
    </div>
</section>


<script>
  var backurl = document.referrer;
  var index = 0;
  jQuery(document).ready(function(){
    

     if (window.history && window.history.pushState) {

        jQuery(window).on('popstate', function() {
          var hashLocation = location.hash;
          var hashSplit = hashLocation.split("#!/");
          var hashName = hashSplit[1];

          if (hashName !== '') {
            var hash = window.location.hash;
            if (hash === '') {
              window.location.href= backurl;
            }
          }
        });

      }

     var checkin = "<?php //echo date("d/m/Y") ?>";
     var checkout = "<?php //echo date('d/m/Y', mktime(0, 0, 0, date('m'), date('d') + 2, date('Y'))); ?>"

     jQuery(".menu-item-home").addClass("current-menu-item");

     if(jQuery('#search_start_date_single').val()!=""){
        jQuery(".checkinspan").html(jQuery('#search_start_date_single').val());
     }else{
        jQuery(".checkinspan").html(checkin);
     }

     if(jQuery('#search_end_date_single').val()!=""){
        jQuery(".checkoutspan").html(jQuery('#search_end_date_single').val());
     }else{
        jQuery(".checkoutspan").html(checkout);
     }

     jQuery(document).on('click','.update_search',function(){
         if(jQuery('#search_start_date_single').val()!=""){
            jQuery(".checkinspan").html(jQuery('#search_start_date_single').val());
         }else{
            jQuery(".checkinspan").html(checkin);
         }

         if(jQuery('#search_end_date_single').val()!=""){
            jQuery(".checkoutspan").html(jQuery('#search_end_date_single').val());
         }else{
            jQuery(".checkoutspan").html(checkout);
         }
     });
    //jQuery('.data_bind').html("<strong font-size:18px;>Any</strong>");
    
    jQuery('.increasesingle').bind('touchend', function(e) {
      e.preventDefault(); 
      jQuery(this).click();
    })
    jQuery(".decreasesingle").bind('touchend', function(e) {
      e.preventDefault(); 
      jQuery(this).click();
    });
    jQuery('.datepicker').removeClass("d-sm-block");
    jQuery('.datepicker-single').removeClass("d-sm-none");
    var adultguest = "<?php echo $_REQUEST['oc']; ?>"
    var childguest = "<?php echo $_REQUEST['ch']; ?>"
    if(!adultguest){
      adultguest = 0
    }
    if(!childguest){
      childguest = 0;
    }
    var sd = "<?php echo $_REQUEST['sd']; ?>"
    var ed = "<?php echo $_REQUEST['ed']; ?>"
    var pets = "<?php echo $_REQUEST['pets']; ?>"
    var resort_area_id = "<?php echo $_REQUEST['resort_area_id'] ?>"
    var beds = "<?php echo $_REQUEST['beds'] ?>"
    var ammenties = "<?php echo $_REQUEST['amenities'] ?>"
    var allamenties = ammenties.split(",");
    /*if(allamenties.length>0){
      jQuery('.ammenties-item').html("");
      jQuery('.ammenties-item').parent().parent().removeClass("d-none");
      for(let i = 0; i<allamenties.length; i++){
          jQuery("input[value="+allamenties[i]+"]").prop('checked', true)
          var html = '<label class="font-13 font-weight-light-bold d-block" for="customCheck1">'+jQuery("input[value="+allamenties[i]+"]").next('label').html()+'</label>'
             jQuery('.ammenties-item').append(html)
      } 
    }else{
      jQuery('.ammenties-item').children().remove();
      jQuery('.ammenties-item').parent().parent().addClass("d-none");
    }*/
    beds = parseInt(beds);
    adultguest = parseInt(adultguest);
    childguest = parseInt(childguest);
    if(sd){
      jQuery("#search_start_date_single").trigger("change");
      //jQuery(".datepicker-single").datepicker("hide");
    }
    if(adultguest > 1){
      jQuery(".label-single-adult").html("Adults");
    }
    if(childguest > 1){
      jQuery(".label-single-child").html("Children");
    }
    if(beds > 1){
      jQuery(".label-single-bed").html("Beds");
    }
    if(adultguest!=0){
      jQuery(".count-single-adult").html(adultguest);
    }
    if(childguest!=0){
      jQuery(".count-single-child").html(childguest);
    }

    if(adultguest!=0 || childguest!=0 || sd || ed || pets || resort_area_id || beds || allamenties.length>0){
       jQuery("#updatesearch").click();
       //jQuery('.update_search').click();
    }

    if(pets){
      jQuery("input[value=121865]").prop('checked',true);
    }

    jQuery(".filter-menu-show").animate({right: "0px"});
    setTimeout(function(){
        jQuery('body').removeClass('headerfixed');
    })
     var sideMenu = true;
    jQuery(document).on('click','.btn-fav',function(){
        jQuery('.tooltip').remove();
     })

     jQuery(".close-filter-sidebar, .filter-tool").click(function() {
      if (!sideMenu) {
         jQuery(".filter-menu-show").animate({right: "0px"});
         jQuery("body").addClass("filter-active");
        sideMenu = true;
      }
      else {
         jQuery(".filter-menu-show").animate({right: "-390px"});
         jQuery("body").removeClass("filter-active");

        sideMenu = false;     
      }
    });

    jQuery(document).on('click','.makeanenquiry',function(){
          jQuery('#myModal2').modal("show");
          jQuery('#myModal2').on('shown.bs.modal', function() {
             //To relate the z-index make sure backdrop and modal are siblings
             jQuery(this).before(jQuery('.modal-backdrop'));
             //Now set z-index of modal greater than backdrop
             jQuery(this).css("z-index", parseInt(jQuery('.modal-backdrop').css('z-index')) + 1);
          }); 
    });

    jQuery('.reset_search').removeClass('.btn-primary').addClass(' btn-primary  text-uppercase w-100 font-13 mt-2 py-2')

    jQuery('.amenity_item').find('label').addClass('checkmark');

    jQuery('.amenity_item').each(function(){
          index = index + 1;
          if(jQuery(this).find('input').attr('checked')){
             var inputval = jQuery(this).find('input').val();
              var labelval = jQuery(this).find('.checkmark').html();
              var html ='<div class="custom-control custom-checkbox mr-auto"><input type="checkbox" checked name="resortpro_sw_amenities[]" value="'+inputval+'"class="custom-control-input" id="customCheck'+index+'"><label class="custom-control-label" for="customCheck'+index+'">'+labelval+'</label></div>'
             jQuery(this).remove();
             jQuery('.resortpro-search-amenities-block').append(html);
          }else{
              var inputval = jQuery(this).find('input').val();
              var labelval = jQuery(this).find('.checkmark').html();
              var html ='<div class="custom-control custom-checkbox mr-auto"><input type="checkbox" name="resortpro_sw_amenities[]" value="'+inputval+'"class="custom-control-input" id="customCheck'+index+'"><label class="custom-control-label" for="customCheck'+index+'">'+labelval+'</label></div>'
             jQuery(this).remove();
             jQuery('.resortpro-search-amenities-block').append(html);
          }
          
    })
    var html = '<div class="row textrange mt-4"><div class="col-sm-6 col-12 mb-sm-0 mb-3"><input readonly type="text" value="$100" class="minval form-control font-13 font-weight-semi-bold"/><small class="min-max-val">Min</small></div><div class="col-sm-6 col-12"><input readonly type="text" value="$1000" class="maxval form-control font-13 font-weight-semi-bold"/><small class="min-max-val">Max</small></div></div>'

    var html1 = '<div class="border-bottom pt-4 pb-3 d-inline-block w-100"><h6 class="mb-0">Nightly Rate Budget:</h6></div>'

    jQuery('.c-range-slider').removeClass('col-xs-12').addClass('col-12');

    jQuery('.c-range-slider__inner').prepend(html);

    jQuery('#resortpro_filter_widget-8').prepend(html1);
   
    jQuery('#amount').hide();
    jQuery('.resortpro-search-amenities-block').children('label').remove();
    jQuery('.resortpro-search-amenities-block').prepend('<div class="amentiessec"><a class="toggleamenties" href="javascript:void(0)"><span class="toggleiconminus"><i class="icon icon-Minus"></i></span></a><label for="amenities">Amenities:</label></div>')

    jQuery(document).on('click','.toggleamenties',function(){
        
        if(jQuery(this).children('span').children('i').hasClass('icon-Minus')){
             jQuery(this).children().remove();
             jQuery(this).append('<span class="toggleiconplus"><i class="icon icon-plus"></i></span>');
             jQuery('.custom-checkbox').hide();
             jQuery('.moreammenties').hide();
             jQuery('#resortpro-search-amenities-block-idclass-homeless').addClass('ammentiesmore');
             

        }else{
            jQuery(this).children().remove();
            jQuery(this).append('<span class="toggleiconplus"><i class="icon icon-Minus"></i></span>');
            jQuery('.custom-checkbox').show();
            jQuery('.moreammenties').show();
            jQuery('#resortpro-search-amenities-block-idclass-homeless').removeClass('ammentiesmore');
            
        }
    });

    jQuery('.resortpro-search-amenities-block').css({'max-height':'310px','overflow-y':'hidden'});

    jQuery('#resortpro-search-amenities-block-idclass-homeless').append('<div class="custom-checkbox-more d-inline-block w-100"><a class="moreammenties" href="javascript:void(0)">More...</a></div>');

    jQuery(document).on('click','.moreammenties',function(){
        if(jQuery(this).html() == 'More...'){
            jQuery('#resortpro-search-amenities-block-idclass-homeless').addClass('ammentiesmore');
            jQuery('.resortpro-search-amenities-block').removeAttr('style');
            jQuery(this).html('Less...')
        }else{
           jQuery('.resortpro-search-amenities-block').css({'max-height':'310px','overflow-y':'hidden'});
           jQuery(this).html('More...');
           jQuery('#resortpro-search-amenities-block-idclass-homeless').removeClass('ammentiesmore');
        }

    });

    jQuery(document).on('click','.arrow_box',function(){
        setTimeout(function(){
              jQuery('html, body').animate({
                  scrollTop: jQuery(".map-container-wrapper").offset().top-100
              });
        },1000);
    });

   jQuery('#resortpro-search-viewall-button-block-idclass-homeless').removeClass('col-lg-6 col-md-6 col-sm-6 col-xs-6');
   jQuery('#resortpro-search-viewall-button-block-idclass-homeless').addClass('col-12');

   jQuery('#resortpro-search-submit-button-block-idclass-homeless').removeClass('col-lg-6 col-md-6 col-sm-6 col-xs-6');
   jQuery('#resortpro-search-submit-button-block-idclass-homeless').addClass('col-12');

   jQuery('#resortpro-search-submit-button-block-not').addClass('mb-0');

   jQuery('.update_search').removeClass('btn btn-block theme-btn mt-2 text-uppercase w-100 font-13 py-2 mt-4 update_search').addClass('btn btn-block theme-btn text-uppercase w-100 font-13 py-2  update_search  mb-3');

   jQuery('.fiterbar').addClass("filter-menu-show");

  });

</script>

