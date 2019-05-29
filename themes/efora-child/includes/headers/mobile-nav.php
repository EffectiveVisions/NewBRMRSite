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
<div class="row">
                  <div class="col-md-12 col-lg-11 m-auto">
                    <div class="row">
                        <div class="col-12">
                          <a href="#" class="custom-tooltip-info">
                            <i class="icon icon-information-circle text-white font-24"></i>
                            <div class="custom-tooltip theme-bg-color text-white font-13 position-absolute px-3 py-2 z-index">All selections are optional. Just Click Search to browse all properties.</div>
                          </a>
                           <ul class="list-unstyled mb-0 pl-md-4 pr-md-4 mt-sm-3 text-center text-sm-left vacation-listing mb-4 mb-sm-0">
                              <li class="list-inline-item mr-sm-4 mr-0 active-item d-block d-sm-inline-block vacation-listing-item">
                               <a href="/" class="f-600 tabby text-uppercase font-13 text-white position-relative"> Vacation homes by date</a> 
                               </li>
                               <li class="list-inline-item d-block d-sm-inline-block vacation-listing-item">
                                  <a href="/vacation-homes-by-area" class="f-600 tabby text-uppercase font-13 text-white position-relative">Vacation homes by Area</a>
                               </li> 
                           </ul>
                        </div>
                        <div class="col-12 mt-2  propertyBanner py-3 rounded">
                            
                           <?php if ( is_active_sidebar( 'home-hero-widgets' ) ) { ?>
                                   <?php dynamic_sidebar( 'home-hero-widgets' ); ?>
                            <?php } ?>
                            
                        </div>
                      </div> 
                  </div>
               </div>