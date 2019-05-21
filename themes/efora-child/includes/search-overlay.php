<div id="tg-search" class="tg-search top-bar-serach shadow">
    <button type="button" class="close-search text-black close"><i class="icon icon-plus-circle close-popup"></i></button>
    <!--<form method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <fieldset>
            <div class="form-group">
                <input type="search" name="s" class="form-control" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e('search here','efora'); ?>">
                <button type="submit" class="tg-btn"><span class="icon-search2"></span></button>
            </div>
        </fieldset>
    </form>-->
    <div class="search">
        <div ng-controller='PlusMinusControler as pCtrl' class="input-group">
          <div class="input-group-text p-0 border-0 rounded-0">
            <span class="input-group-text border-0 cursor-pointer close-search-btn" style=" background-color: #efefef;" id="basic-addon1"><i class="icon icon-search font-20"></i></span>
          <input id="searchbox" type="text" class="form-control pr-3 font-Nunito font-weight-normal" ng-model='area' 
          uib-typeahead='area as area.name for area in locations | filter:$viewValue:stateComparator' 
          typeahead-on-select='onSearchSelect(area.id)' typeahead-focus-first="true" placeholder="Search Location" aria-label="Search" aria-describedby="basic-addon1">
          </div>
        </div>
    </div>

    <div class="selectsearch d-none">
     <?php if (is_active_sidebar('headersearch')): ?>
         <?php dynamic_sidebar('headersearch'); ?>
    <?php endif; ?>
    </div>
    <ul class="tg-destinations">
        <?php if ( has_nav_menu( 'search-menu' ) ) {
            wp_nav_menu(array('theme_location' => 'search-menu', 'container' => '', 'depth' => 0, 'items_wrap' => '%3$s'));
        } ?>
    </ul>
</div>

<script>
//   $scope.stateComparator = function (state, viewValue) {
//         return viewValue === secretEmptyKey || (''+state).toLowerCase().indexOf((''+viewValue).toLowerCase()) > -1;
//       };
      
</script>