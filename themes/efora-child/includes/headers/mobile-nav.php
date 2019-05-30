<?php $class = get_body_class();  ?>

<nav id="menu">
    <ul>
    	<a class="closemenu"><i class="icon icon-plus d-block"  aria-hidden="true" style="transform: rotate(45deg);"></i></a>
    	<?php if($class[1] != "page-template-template-boone" && $class[1] != "page-template-template-blowing-rock" && $class[1] != "page-template-template-valle-crucis" && $class[1] != "page-template-template-townof-seven-devils" && $class[1] != "page-template-template-eagles-nest"&& $class[1] != "page-template-template-banner-elk"
                       ) {  ?>
        <?php if ( has_nav_menu( 'mobile-menu' ) ) :
            wp_nav_menu( array( 'theme_location' => 'mobile-menu','container' => '','depth' => 3,'items_wrap' => '%3$s', 'walker' => new efora_Mobile_Nav_Menu()) );
        else:
            echo '<li><a>' . esc_html__( 'Define your mobile menu.', 'efora' ) . '</a></li>';
        endif; ?>
       <?php } else {   ?>
         
         <?php if ( has_nav_menu( 'mobile-menu' ) ) :
            wp_nav_menu( array( 'theme_location' => 'community-menu','container' => '','depth' => 3,'items_wrap' => '%3$s', 'walker' => new efora_Mobile_Nav_Menu()) );

            echo '<li><a href="https://new.blueridgerentals.com/search-results/">' . esc_html__( 'Find your gateway', 'efora' ) . '</a></li>';
        else:
            echo '<li><a>' . esc_html__( 'Define your mobile menu.', 'efora' ) . '</a></li>';
        endif; ?>

       <?php } ?>
    </ul>
</nav>
