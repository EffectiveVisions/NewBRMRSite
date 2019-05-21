<nav id="menu">
    <ul>
        <?php if ( has_nav_menu( 'mobile-menu' ) ) :
            wp_nav_menu( array( 'theme_location' => 'mobile-menu','container' => '','depth' => 3,'items_wrap' => '%3$s', 'walker' => new efora_Mobile_Nav_Menu()) );
        else:
            echo '<li><a>' . esc_html__( 'Define your mobile menu.', 'efora' ) . '</a></li>';
        endif; ?>
    </ul>
</nav>