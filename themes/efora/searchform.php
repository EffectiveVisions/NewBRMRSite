<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">	
	<input type="search" required class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'efora' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="tg-btn">
		<span>
			<?php esc_attr_e('Search','efora'); ?>
		</span>
	</button>
</form>
