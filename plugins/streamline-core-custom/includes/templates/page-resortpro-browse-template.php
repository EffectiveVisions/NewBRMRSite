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
<div id="primary" class="content-area" ng-controller="PropertyController as pCtrl">
    <div ng-init="<?php echo $scope_params; ?>;sortBy='<?php echo $sorted_by; ?>'">
        <main id="main" class="site-main" role="main" ng-init="availabilitySearch();">
          
          <div class="c-results-filters row">
              <?php if (is_active_sidebar('top_shortcode_widget')): ?>
                <div class="col-md-12">
                  <?php dynamic_sidebar('top_shortcode_widget'); ?>
                </div>
              <?php endif; ?>

              <div class="col-md-12">
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="loading" ng-show="loading">
                      <i class="fa fa-circle-o-notch fa-spin"></i> <?php _e('Loading...', 'streamline-core') ?>
                    </div>
                    <?php echo apply_filters('show-unit-count-top', '<div ng-if="!loading && total_units > 0"><p class="search-pagination">' . sprintf(__('Showing %s of %s properties', 'streamline-core'), '<span ng-bind="results.length"></span>', '<span ng-bind="total_units"></span>') . '</p></div>'); ?>
                  </div>
                  <div class="col-md-6 text-right">
                    <?php if($use_favorites): ?>
                      <div>
                        <p class="c-results-filters__favorites">
                          <i class="fa fa-heart"></i>
                          <a href="<?php echo get_permalink(get_page_by_slug('favorites')) ?>">
                            Favorites (<span ng-bind="wishlist.length"></span>)
                          </a>
                        </p>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>

                <div ng-if="results.length == 0" ng-cloak>
                    <div class="alert alert-danger">
                        <p><?php _e( 'Unable to find any listings.', 'streamline-core' ) ?></p>
                    </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="row" ng-init="sortBy='<?php echo $sorted_by; ?>'">

                <?php if($options['property_show_sorting_options']): ?>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12" ng-init="sortBy='<?php echo $sorted_by; ?>'">
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Sort by</span>
                        <?php $default = ($sorted_by == 'random' || $sorted_by == 'rotation') ? $sorted_by : 'default'; ?>
                        <div class="c-select-list form-control input-sm">
                          <select ng-model="sortBy" ng-change="checkSorting();">
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
            </div>
          </div>
          <!-- /.c-results-filters -->

          <div class="row">
            <div class="col-xs-12">
              <div class="c-property-listings listings_wrapper_box" ng-init="limit = 1000">
                <div class="resortpro-browse" ng-repeat="property in propertiesObj | orderBy: customSorting : sort | limitTo: limit as results">
                  <?php include $template; ?>
                </div>
                <div class="clearfix"></div>
              </div>             
            </div>
            <div class="col-md-12">
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
            </div>
          </div>
        </main>
        <!-- .site-main -->
        
        <?php do_action('streamline-insert-inquiry', '', 0, $max_occupants, $max_occupants_small, $max_pets, 1, 1, true, '', '', 1, 0, 0, 'Property Inquiry' ); ?>        
    </div>
</div>
<!-- /.content-area -->
