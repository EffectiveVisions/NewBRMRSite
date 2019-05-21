<div class="search_widget">

        <?php do_action( 'streamline_widget_search_before_form' ); ?>

    <form ng-submit="updateSearch($event)" method="post" class="form searchform"

          action="<?php echo get_permalink( get_option('resortpro_listings_page_id') ) ?>">

        <input type="hidden" name="resortpro_search_nonce" value="<?php echo $nonce; ?>"/>
        
       
        <?php if($instance['number_bedrooms-plus'] == '1'): ?>

            <input type="hidden" name="plus" value="1"/>

        <?php endif; ?>

        <?php do_action( 'streamline_widget_search_before' ); ?>

        <?php if(!empty($widget_title)): ?>

        <div class="row">
            <div class="col-md-12">
                <?php echo $widget_title; ?>
            </div>
        </div>

        <?php endif; ?>

        <div class="row" id="search-widget-main-row<?php echo $args['widget_id']; ?>" style="">

            <?php echo $search_template; ?>

        </div>
          <input class="sortfilter" ng-model="sortbyvalue" type="hidden" name="resortpro_sw_filter" value=""/>

        <?php //do_action( 'streamline_widget_search_after' ); ?>

    </form>

	<?php if ($args['widget_id'] == "resortpro_search_widget-2") {?> <div style="DISPLAY: block;"><h4 style="font-size: 24px; text-align: center; font-family: 'EB Garamond', serif !important;">(All Selections are Optional. Just Click "Search" to browse all properties.)</h4></div><?php }?>

        <?php do_action( 'streamline_widget_search_after_form' ); ?>

</div>

