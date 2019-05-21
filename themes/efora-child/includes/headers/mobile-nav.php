<nav id="menu">
    <ul>
    	<a class="closemenu"><i class="icon icon-plus d-block"  aria-hidden="true" style="transform: rotate(45deg);"></i></a>
        <?php if ( has_nav_menu( 'mobile-menu' ) ) :
            wp_nav_menu( array( 'theme_location' => 'mobile-menu','container' => '','depth' => 3,'items_wrap' => '%3$s', 'walker' => new efora_Mobile_Nav_Menu()) );
        else:
            echo '<li><a>' . esc_html__( 'Define your mobile menu.', 'efora' ) . '</a></li>';
        endif; ?>
    </ul>
</nav>