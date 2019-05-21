<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all resortpro listings by default.
 * You can override this template by creating your own "my_theme/template/page-resortpro-listings.php" file
 *
 * @package    ResortPro
 * @since      v1.0
 */
?>

<div id="primary" class="content-area" ng-controller="PropertyController as pCtrl" ng-cloak>
  <div ng-init="<?php echo apply_filters('streamline-search-results-params', $str_params); ?>;sortBy='<?php echo $sorted_by; ?>'">
    <main id="main" class="site-main" role="main" ng-init="availabilitySearch();">

      <?php if($search_layout == 5): ?>
        <div class="search_breadcrumb breadcrumb_area">
          <div class="col-md-12">
            <div class="row">
              <ol class="breadcrumb col-md-7">
                <li><a href="/"><?php _e('Home', 'streamline-core') ?></a></li>
                <li class="active"><?php _e('All Vacation Homes', 'streamline-core') ?></li>
                <li class="last_itm"><?php _e('All Vacation Homes', 'streamline-core') ?></li>
              </ol>
              <ol class="view_type_menu breadcrumb col-md-5">
                <span ng-if="searchSettings.enable_list_view > 0" class="show_list_name" style="display:none">List View</span>
                <span ng-if="searchSettings.enable_map_view > 0 || searchSettings.enable_list_view > 0" class="show_grid_name">Grid View</span>
                <span ng-if="searchSettings.enable_map_view > 0" class="show_map_name" style="display:none">Map View</span>
                <li></li>
                <li ng-if="searchSettings.enable_map_view > 0 || searchSettings.enable_list_view > 0" class="selected_view grid_view" ng-click="changeToGridView()" title="Grid View">
                    <i class="fa fa-th-large"></i>
                </li>
                <li ng-if="searchSettings.enable_list_view > 0" class="list_view" ng-click="changeToListView()" title="List View">
                    <i class="fa fa-th-list"></i>
                </li>
                <li ng-if="searchSettings.enable_map_view > 0" class="map_view" ng-click="changeToMapView()" title="Map View">
                    <i class="fa fa-map-marker"></i>
                </li>
              </ol>
            </div>
          </div>
        </div>
      <?php endif; ?>
      
      <?php do_action('streamline-search-results-start'); ?>
      <div class="row">
        <?php if ($search_layout === '6') : ?>
          <div class="col-xs-12">
            <div class="c-results-filters c-results-filters--bordered row">

              <?php if($use_compare): ?>
                <div class="col-xs-12 text-right compare">
                    <a class="start-cmp" ng-click="showCompare=!showCompare" ng-show="!showCompare">Click <i class="fa fa-balance-scale"></i> to Compare units </a>
                    <div ng-show="showCompare" >
                      <p>
                        <i class="fa fa-balance-scale"></i>
                        <span class ="w" ng-if="readyToCompare() > 1" ng-bind="' Add ' + readyToCompare() + ' more to Compare'"></span>
                        <a href="<?php echo get_permalink(get_page_by_slug('compare')) ?>" ng-if="readyToCompare() <=1">
                          Compare Now
                        </a>
                      </p>
                    </div>
                </div>
              <?php endif; ?>

              <?php if($use_favorites): ?>
                <div class="col-xs-12 text-right">
                  <p class="c-results-filters__favorites">
                    <i class="fa fa-heart-o"></i>
                    <a href="<?php echo get_permalink(get_page_by_slug('favorites')) ?>">
                      Favorites <span class="bg-primary" ng-bind="wishlist.length"></span>
                    </a>
                  </p>
                </div>
              <?php endif; ?>

              <?php if (is_active_sidebar('top_search_widget')): ?>
                <div class="col-xs-12">
                  <?php dynamic_sidebar('top_search_widget'); ?>
                </div>
              <?php endif; ?>

              <div class="col-xs-12">
                <div ng-if="noResults" ng-cloak>
                  <div class="alert alert-danger">
                    <p><?php echo $noinv_msg ?></p>
                    <span ng-if="mapEnabled && mapSearch">
                      <?php _e('Please click', 'streamline-core') ?>
                      <a href="#" ng-click="disableMapSearch();"><?php _e('here', 'streamline-core') ?></a>
                      <?php _e('to disable map search and reload all the units.', 'streamline-core') ?>
                    </span>
                  </div>
                </div>
              </div>

              <?php if ($options['property_show_sorting_options']): ?>
                <div class="col-xs-12" ng-show="propertiesObj.length > 0">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-10 col-xs-12" ng-init="sortBy='<?php echo $sorted_by; ?>'">
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><?php _e('Sort by', 'streamline-core') ?></span>
                        <?php $default = ($sorted_by == 'random' || $sorted_by == 'rotation') ? $sorted_by : 'default'; ?>
                        <div class="c-select-list form-control input-sm">
                          <select ng-model="sortBy" ng-change="checkSorting()">
                            <option value="<?php echo $default ?>"><?php _e( 'Select', 'streamline-core' ) ?></option>
                            <?php foreach($arr_sort_fields as $key => $value): ?>
                            <option value="<?php echo $value['value']; ?>"><?php _e( $value['label'], 'streamline-core' ) ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <!-- /.c-results-filters -->
          </div>

          <div class="col-md-<?php echo $str_bs_class ?>">
        <?php else : ?>
          
        <div class="col-md-<?php echo $str_bs_class ?> <?php echo $pull_class ?>">
          <div class="c-results-filters row">

            <?php if (is_active_sidebar('top_search_widget') && $search_layout != 5): ?>
              <div class="col-md-12">
                <?php dynamic_sidebar('top_search_widget'); ?>
              </div>
            <?php endif; ?>

            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6">
                  <?php echo apply_filters('show-unit-count-top', '<div ng-if="total_units > 0"><p class="search-pagination">' . sprintf(__('Showing %s of %s properties', 'streamline-core'), '<span ng-bind="results.length"></span>', '<span ng-bind="total_units"></span>') . '</p></div>'); ?>
                </div>
                <div class="col-md-6 text-right">
                  <?php if($use_compare): ?>
                    <div class="compare">
                        <a class="start-cmp" ng-click="showCompare=!showCompare" ng-show="!showCompare">Click <i class="fa fa-balance-scale"></i> to Compare units </a>
                        <div ng-show="showCompare" >
                          <p>
                            <i class="fa fa-balance-scale"></i>
                            <span class ="w" ng-if="readyToCompare() > 1" ng-bind="' Add ' + readyToCompare() + ' more to Compare'"></span>
                            <a href="<?php echo get_permalink(get_page_by_slug('compare')) ?>" ng-if="readyToCompare() <=1">
                              Compare Now
                            </a>
                          </p>
                        </div>
                    </div>
                  <?php endif; ?>

                  <?php if($use_favorites): ?>
                      <p class="c-results-filters__favorites">
                        <i class="fa fa-heart"></i>
                        <a href="<?php echo get_permalink(get_page_by_slug('favorites')) ?>">
                          Favorites (<span ng-bind="wishlist.length"></span>)
                        </a>
                      </p>
                  <?php endif; ?>
                </div>
              </div>

              <div ng-if="noResults" ng-cloak>
                <div class="alert alert-danger">
                  <p><?php echo $noinv_msg ?></p>
                  <span ng-if="mapEnabled && mapSearch">
                    <?php _e('Please click', 'streamline-core') ?>
                    <a href="#" ng-click="disableMapSearch();"><?php _e('here', 'streamline-core') ?></a>
                    <?php _e('to disable map search and reload all the units.', 'streamline-core') ?>
                  </span>
                </div>
              </div>
            </div>

            <?php if ($options['property_show_sorting_options']): ?>
              <div class="col-md-12" ng-show="propertiesObj.length > 0">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><?php _e('Sort by', 'streamline-core') ?></span>
                      <?php $default = ($sorted_by == 'random' || $sorted_by == 'rotation') ? $sorted_by : 'default'; ?>
                      <div class="c-select-list form-control input-sm" ng-init="sortBy='<?php echo $sorted_by; ?>'">
                        <select ng-model="sortBy" ng-change="checkSorting()">
                          <option value="<?php echo $default ?>"><?php _e( 'Select', 'streamline-core' ) ?></option>
                          <?php foreach($arr_sort_fields as $key => $value): ?>
                          <option value="<?php echo $value['value']; ?>"><?php _e( $value['label'], 'streamline-core' ) ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <!-- /.c-results-filters -->
          <?php endif; ?>

          <div class="row">
            <div class="col-md-12">
              <div class="c-property-listings listings_wrapper_box row" ng-init="limit = searchSettings.propertyPagination">
                <div ng-repeat="property in propertiesObj| orderBy: customSorting : sort | filter: priceRange | filter: amenityFilter | filter: amenityFilterOr | filter: bedroomFilter | filter: locationFilter | filter: neighborhoodFilter | filter: viewNameFilter | limitTo: limit as results">
                  <?php include($template); ?>
                </div>
                <div class="clearfix"></div>
              </div>
              <?php if($search_layout == 5): ?>
                <div class="row list-container-wrapper" ng-init="limit = searchSettings.propertyPagination" style="display:none">
                    <div ng-repeat="property in propertiesObj | orderBy: customSorting : sort | filter: priceRange | filter: amenityFilter | filter: amenityFilterOr | filter: bedroomFilter | filter: locationFilter | filter: neighborhoodFilter | filter: viewNameFilter | limitTo: limit as results">
                        <?php
                        include($listTemplate);
                        ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="row map-container-wrapper" style="display:none">
                    <div class="clearfix"></div>
                      <?php dynamic_sidebar('map_view_area'); ?>
                    <div class="clearfix"></div>
                </div>
              <?php endif ?>
            </div>
            
            <div class="col-md-12">
              <?php if ($search_layout === '6') : ?>
                <div class="c-search-pagination c-search-pagination--light text-center" ng-show="!loading">
                  <button class="c-search-pagination__btn btn btn-primary btn--ghost"
                          ng-if="total_units > 0"
                          ng-hide="limit > results.length"
                          ng-click="loadMore();"><?php _e('Show More', 'streamline-core') ?> <i class="fa fa-angle-down"></i></button><br />
                  <?php echo apply_filters('show-unit-count-bottom', '<p class="c-search-pagination__text text-muted" ng-if="!loading && total_units > 0">' . sprintf(__('Showing %s of %s properties', 'streamline-core'), '<span ng-bind="results.length"></span>', '<span ng-bind="total_units"></span>') . '</p>'); ?>
                </div>
              <?php else: ?>
                <div class="c-search-pagination  text-center" ng-show="!loading">
                <?php if($pagination_options == 0): ?>
                  <button class="btn btn-primary"
                          ng-if="total_units > 0"
                          ng-hide="limit > results.length"
                          ng-click="loadMore();"><?php _e('Show More', 'streamline-core') ?></button>
                <?php else: ?>
                  <div infinite-scroll="loadMore();" infinite-scroll-distance='0' infinite-scroll-immediate-check="false"></div>
                <?php endif; ?>
                <?php echo apply_filters('show-unit-count-bottom', '<p class="search-pagination" ng-if="!loading && total_units > 0">' . sprintf(__('Showing %s of %s properties', 'streamline-core'), '<span ng-bind="results.length"></span>', '<span ng-bind="total_units"></span>') . '</p>'); ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <?php if ($str_bs_class == '8' && $search_layout != 5): ?>
          <div class="col-md-4 search-sidebar">
             <div class="<?php echo $search_sticky_class ?>" <?php echo $search_sticky_spacing ?>>
              <?php dynamic_sidebar('side_search_widget'); ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($str_bs_class == '9' && $search_layout == 5): ?>
          <div class="col-md-3 search-sidebar premium_sidebar">
            <?php dynamic_sidebar('side_search_widget'); ?>
          </div>
        <?php endif; ?>

        <div class="clearfix"></div>
      </div>
      <?php include ($marker_template); ?>
    </main>
  </div>
  <!-- .site-main -->
  <?php
  $options = StreamlineCore_Settings::get_options();
  $use_recent_units = ($options['use_recent_units'] == '1') ? true : false;
  if ($use_recent_units) {
   include ($recents_template);
   }
   ?>
   <?php do_action('streamline-insert-inquiry', '', 0, $max_occupants, $max_occupants_small, $max_pets, 1, 1, true, '', '', 1, 0, 0, 'Property Inquiry' ); ?>
</div>
<!-- .content-area -->

<script type="text/javascript">
  jQuery('.show_hide_filter').on('click', function () {
    jQuery('.row.row-price-range').slideToggle();
    jQuery('.row.row-amenities').slideToggle();
    jQuery('.filter_s').toggle();
    jQuery('.filter_h').toggle();
  });
</script>
