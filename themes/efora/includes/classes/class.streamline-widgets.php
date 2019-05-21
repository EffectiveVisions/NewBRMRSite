<?php
if ( ! class_exists( 'Streamline_Widgets' ) ) {
  class Streamline_Widgets{
    // header social media area configuration
    static protected function _header_social_media_area_config() {
      return array(
        'name'          => __( 'Header Social Media Area', 'streamline-theme' ),
    		'id'            => 'header-social-media-widgets',
    		'description'   => __( 'Add SpiceMailer Social Icons widget here to appear in the header.', 'streamline-theme' ),
    		'before_widget' => '<div id="%1$s" class="%2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2 class="widget-title">',
    		'after_title'   => '</h2>'
      );
    }

    // register home hero area configuration
    static protected function _home_hero_area_config() {
      return array(
        'name'          => __( 'Home Hero Area', 'streamline-theme' ),
    		'id'            => 'home-hero-widgets',
    		'description'   => __( 'Add Master Slider or Hero Widget.  Also add a ResortPro search to appear over Master Slider/Hero.', 'streamline-theme' ),
    		'before_widget' => '<div id="%1$s" class="%2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2 class="widget-title">',
    		'after_title'   => '</h2>'
      );
    }

    // register home accreditations area configuration
    static protected function _home_accreditations_area_config() {
      return array(
        'name'          => __( 'Home Accreditations Area', 'streamline-theme' ),
    		'id'            => 'home-accreditations-widgets',
    		'description'   => __( 'Add Owl Carousel Widget here to appear on the home page under the hero area.', 'streamline-theme' ),
    		'before_widget' => '<div id="%1$s" class="%2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2 class="widget-title">',
    		'after_title'   => '</h2>'
      );
    }

    // register home featured area configuration
    static protected function _home_featured_area_config() {
      return array(
        'name'          => __( 'Home Featured Area', 'streamline-theme' ),
    		'id'            => 'home-featured-widgets',
    		'description'   => __( 'Add featured categories/locations/properties here to appear horizontally in your home page.', 'streamline-theme' ),
    		'before_widget' => '<div id="%1$s" class="%2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2 class="widget-title">',
    		'after_title'   => '</h2>'
      );
    }

    // register home discover the difference area configuration
    static protected function _home_discover_the_difference_area_config() {
      return array(
        'name'          => __( 'Home Discover the Difference Area', 'streamline-theme' ),
    		'id'            => 'home-discover-the-difference-widgets',
    		'description'   => __( 'Add widgets here to appear on the Home Page below the body content.', 'streamline-theme' ),
    		'before_widget' => '<div id="%1$s" class="col-md-12 text-center %2$s"></div>',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2 class="widget-title">',
    		'after_title'   => '</h2>'
      );
    }

    // register home testimonials area configuration
    static protected function _home_testimonials_area_config() {
      return array(
        'name'          => __( 'Home Testimonials Area', 'streamline-theme' ),
    		'id'            => 'home-testimonials-widgets',
    		'description'   => __( 'Add Testimonials to appear on the bottom of the home page.', 'streamline-theme' ),
    		'before_widget' => '<div id="%1$s" class="%2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2 class="widget-title">',
    		'after_title'   => '</h2>'
      );
    }

    // register sidebar area configuration
    static protected function _sidebar_area_config() {
      return array(
        'name'          => __( 'Sidebar Area', 'streamline-theme' ),
    		'id'            => 'sidebar-widgets',
    		'description'   => __( 'Add widgets here to appear in the sidebar on template pages.', 'streamline-theme' ),
    		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</aside>',
    		'before_title'  => '<h2 class="widget-title">',
    		'after_title'   => '</h2>'
      );
    }

    // register footer area configuration
    static protected function _footer_area_config() {
      return array(
        'name'          => __( 'Footer Area', 'streamline-theme' ),
    		'id'            => 'footer-widgets',
    		'description'   => __( 'Add widgets here to appear in your footer (col-md-4).', 'streamline-theme' ),
    		'before_widget' => '<div id="%1$s" class="col-md-4 col-sm-12 %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h3 class="widget-title">',
    		'after_title'   => '</h2>'
      );
    }

     // register footer area configuration
    static protected function _Header_Top_area_config() {
      return array(
        'name'          => __( 'Header Top Area', 'streamline-theme' ),
    		'id'            => 'header_top',
    		'description'   => __( 'Header Top Area.', 'streamline-theme' ),
    		'before_widget' => '<div id="%1$s" class="padding_part %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h3 class="widget-title">',
    		'after_title'   => '</h2>'
      );
    }

   // register footer area configuration
    static protected function _Footer1_area_config() {
      return array(
        'name'          => __( 'Footer1 Area', 'streamline-theme' ),
    		'id'            => 'footer1',
    		'description'   => __( 'Footer1 Area.', 'streamline-theme' ),
    		'before_widget' => '<div id="%1$s" class="%2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4 class="widget-title">',
    		'after_title'   => '</h4>'
      );
    }

   // register footer area configuration
    static protected function _Footer2_area_config() {
      return array(
        'name'          => __( 'Footer2 Area', 'streamline-theme' ),
    		'id'            => 'footer2',
    		'description'   => __( 'Footer2 Area.', 'streamline-theme' ),
    		'before_widget' => '<div id="%1$s" class="%2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4 class="widget-title">',
    		'after_title'   => '</h4>'
      );
    }

    // register footer area configuration
    static protected function _Footer3_area_config() {
      return array(
        'name'          => __( 'Footer3 Area', 'streamline-theme' ),
    		'id'            => 'footer3',
    		'description'   => __( 'Footer3 Area.', 'streamline-theme' ),
    		'before_widget' => '<div id="%1$s" class="%2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4 class="widget-title">',
    		'after_title'   => '</h4>'
      );
    }


   // register footer area configuration
    static protected function _Footer4_area_config() {
      return array(
        'name'          => __( 'Footer4 Area', 'streamline-theme' ),
    		'id'            => 'footer4',
    		'description'   => __( 'Footer4 Area.', 'streamline-theme' ),
    		'before_widget' => '<div id="%1$s" class="%2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4 class="widget-title">',
    		'after_title'   => '</h4>'
      );
    }

    // register footer area configuration
    static protected function _footer_copy_area_config() {
      return array(
        'name'          => __( 'Footer copy Area', 'streamline-theme' ),
    		'id'            => 'footer_copy',
    		'description'   => __( 'Footer copy Area.', 'streamline-theme' ),
    		'before_widget' => '<div id="%1$s" class="%2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4 class="widget-title">',
    		'after_title'   => '</h4>'
      );
    }

    // register footer area configuration
    static protected function _featured_listing_area_config() {
      return array(
        'name'          => __( 'Featured Listing Area', 'streamline-theme' ),
    		'id'            => 'gallery',
    		'description'   => __( 'Featured Listing.', 'streamline-theme' ),
    		'before_widget' => '<div id="%1$s" class="%2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4 class="widget-title">',
    		'after_title'   => '</h4>'
      );
    }

    // register footer area configuration
    static protected function _testimonial_area_config() {
      return array(
        'name'          => __( 'Testimonial Area', 'streamline-theme' ),
    		'id'            => 'testimonial_area',
    		'description'   => __( 'Testimonial Area.', 'streamline-theme' ),
    		'before_widget' => '<div id="%1$s" class="%2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2 class="testimonial-title">',
    		'after_title'   => '</h2>'
      );
    }

    // register sidebar
    static public function register_sidebar( $sidebar, $config_arr = array() ) {
      // load sidebar config
      $method= '_' . $sidebar . '_config';
      if ( ! method_exists( 'Streamline_Widgets', $method ) ) {
        return FALSE;
      }
      $sidebar_config_arr = self::$method();

      // register sidebar
      register_sidebar( array(
        'name'          => $sidebar_config_arr['name'],
    		'id'            => $sidebar_config_arr['id'],
    		'description'   => ( array_key_exists( 'description', $config_arr ) ? $config_arr['description'] : $sidebar_config_arr['description'] ),
    		'before_widget' => ( array_key_exists( 'before_widget', $config_arr ) ? $config_arr['before_widget'] : $sidebar_config_arr['before_widget'] ),
    		'after_widget'  => ( array_key_exists( 'after_widget', $config_arr ) ? $config_arr['after_widget'] : $sidebar_config_arr['after_widget'] ),
    		'before_title'  => ( array_key_exists( 'before_title', $config_arr ) ? $config_arr['before_title'] : $sidebar_config_arr['before_title'] ),
    		'after_title'   => ( array_key_exists( 'after_title', $config_arr ) ? $config_arr['after_title'] : $sidebar_config_arr['after_title'] )
      ) );

      return TRUE;
    }

    // unregister sidebar
    static public function unregister_sidebar( $sidebar ) {
      unregister_sidebar( $sidebar );
    }
  }
}
