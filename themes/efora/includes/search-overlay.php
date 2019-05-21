<div id="tg-search" class="tg-search">
    <button type="button" class="close"><i class="icon-cross"></i></button>
    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <fieldset>
            <div class="form-group">
                <input type="search" name="s" class="form-control" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e('search here','efora'); ?>">
                <button type="submit" class="tg-btn"><span class="icon-search2"></span></button>
            </div>
        </fieldset>
    </form>

    <ul class="tg-destinations">
        <?php if ( has_nav_menu( 'search-menu' ) ) {
            wp_nav_menu(array('theme_location' => 'search-menu', 'container' => '', 'depth' => 0, 'items_wrap' => '%3$s'));
        } ?>
    </ul>
</div>