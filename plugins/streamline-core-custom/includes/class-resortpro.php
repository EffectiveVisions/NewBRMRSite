<?php

if (!defined('ABSPATH')) {
    exit;
}

class ResortPro{
    /**
     * The single instance of ResortPro.
     *
     * @var    object
     * @access   private
     * @since    1.0.0
     */
    private static $_instance = NULL;

    /**
     * The token.
     *
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $_token;

    /**
     * The main plugin file.
     *
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $file;

    /**
     * The main plugin directory.
     *
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $dir;

    /**
     * The plugin assets directory.
     *
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $assets_dir;

    /**
     * The plugin assets URL.
     *
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $assets_url;

    /**
     * The plugin ajax URL
     */
    public $ajax_url;

    /**
     * The plugin vendor URL
     */
    public $vendor_url;

    /**
     * The array of templates that this plugin tracks.
     *
     * @var      array
     */
    protected $templates;

    protected $js_params;

    /**
     * Constructor function.
     *
     * @access  public
     * @since   1.0.0
     * @return  void
     */
    public function __construct($file = '')
    {
      // settings
      $this->_token = 'resortpro';
      $this->file = $file;
      $this->dir = dirname( $this->file );
      $this->assets_dir = trailingslashit( $this->dir ) . 'assets';
      $this->assets_url = esc_url( trailingslashit( plugins_url( '/assets/', $this->file ) ) );
      $this->ajax_url = esc_url( trailingslashit( plugins_url( '/ajax/', $this->file ) ) );
      $this->vendor_url = esc_url( trailingslashit( plugins_url( '/vendor/', $this->file ) ) );

      // Load API for generic admin functions
      if (is_admin()) {
        $this->admin = new ResortPro_Admin_API();
      }

      // plugin activation/deactivation
      register_activation_hook( $this->file, array( &$this, 'activation' ) );
      register_deactivation_hook( $this->file, array( &$this, 'deactivation' ) );

      // frontend JS & CSS
      add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue_styles' ), 10, 1 );
      add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue_scripts' ), 10, 1 );
      // admin JS & CSS
      add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueue_scripts' ), 10, 1);
      add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueue_styles' ), 10, 1);

      // Handle localisation
      add_action( 'plugins_loaded', array( &$this, 'load_plugin_textdomain' ) );

      // Add a filter to the page attributes metabox to inject our template into the page template cache.
      add_filter( 'page_attributes_dropdown_pages_args', array( &$this, 'register_project_templates' ) );
      // Add a filter to the save post in order to inject out template into the page cache
      add_filter( 'wp_insert_post_data', array( &$this, 'register_project_templates' ) );
      // Add a filter to the template include in order to determine if the page has our template assigned and return it's path
      add_filter( 'template_include', array( &$this, 'view_project_template' ) );

      // [TODO] plugin_slug is not being set
      // Add your templates to this array.
      $this->templates = array(
          'page-resortpro-listings-template.php' =>       __( 'StreamlineCore Listings Template', 'streamline-core' ),
          'page-resortpro-listing-detail-template.php' => __( 'StreamlineCore Detail Template', 'streamline-core' ),
          'page-resortpro-checkout-template.php' =>       __( 'StreamlineCore Checkout Template', 'streamline-core' ),
          'page-resortpro-home-template.php' =>           __( 'StreamlineCore Home Template', 'streamline-core' )
      );

      // adding support for theme templates to be merged and shown in dropdown
      $templates = wp_get_theme()->get_page_templates();
      $templates = array_merge( $templates, $this->templates );

      // Add the handler for fetching resortpro properties from the API.
      add_action( 'init', array( &$this, 'resortpro_find_listings' ) );
      add_action( 'init', array( &$this, 'resortpro_listing_detail' ) );
      add_action( 'init', array( &$this, 'resortpro_checkout' ) );
      add_action( 'init', array( &$this, 'resortpro_book_unit' ) );

      // Add angular javascript for Api settings, etc.
      add_action('wp_footer', array( &$this, 'resortpro_angular_api_settings' ) );

      // plugin sidebars
      add_action( 'widgets_init', array( &$this, 'widgets_init' ) );

      $options = StreamlineCore_Settings::get_options();
      $use_slash = (isset($options['use_slash']) && $options['use_slash'] == 1) ? true : false;
      if($use_slash){
        add_filter( 'body_class',array( &$this, 'my_body_classes' ));
      }
    } // End __construct ()

    /**
     * get options - Deprecated use StreamlineCore_Settings::get_options()
     */
    public static function get_options($field = FALSE) {
      return StreamlineCore_Settings::get_options($field);
    }

    /**
     * Checks if the template is assigned to the page
     *
     * @version   2.0.3
     * @since    2.0.3
     */
    public function widgets_init() {
      register_sidebar( array(
        'id' => 'side_search_widget', // used to be side_search_widget
        'name' => __( 'StreamlineCore Side Search Area', 'streamline-core' ),
        'class' => 'e-widget',
        'before_widget' => '<div id="%1$s" class="%2$s side_search_widget">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => ''
      ) );

      register_sidebar( array(
        'id' => 'top_search_widget', // used to be top_search_widget
        'name' => __( 'StreamlineCore Top Search Area', 'streamline-core' ),
        'class' => 'e-widget',
        'before_widget' => '<div id="%1$s" class="%2$s top_search_widget">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => ''
      ) );

      register_sidebar( array(
        'id' => 'top_shortcode_widget', // used to be side_search_widget
        'name' => __( 'StreamlineCore Top Shortcode Area', 'streamline-core' ),
        'class' => 'e-widget',
        'before_widget' => '<div id="%1$s" class="%2$s top_shortocode_widget">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => ''
      ) );

      register_sidebar( array(
        'id' => 'map_view_area',
        'name' => __( 'StreamlineCore Map View Area', 'streamline-core' ),
        'description'   => __( 'Used only for premium template to enable map view area', 'streamline-core' ),
        'class' => 'e-widget',
        'before_widget' => '<div id="%1$s" class="%2$s top_premium_widget">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => ''
      ));
    } // end widget_init

    /**
     * Adds our template to the pages cache in order to trick WordPress
     * into thinking the template file exists where it doens't really exist.
     *
     * @param   array $atts The attributes for the page attributes dropdown
     * @return  array    $atts    The attributes for the page attributes dropdown
     * @verison    1.0.0
     * @since    1.0.0
     */
    public function register_project_templates($atts)
    {
        // Create the key used for the themes cache
        $cache_key = 'page_templates-' . md5(get_theme_root() . '/' . get_stylesheet());
        // Retrieve the cache list. If it doesn't exist, or it's empty prepare an array
        $templates = wp_cache_get($cache_key, 'themes');
        if (empty($templates)) {
            $templates = array();
        } // end if
        // Since we've updated the cache, we need to delete the old cache
        wp_cache_delete($cache_key, 'themes');
        // Now add our template to the list of templates by merging our templates
        // with the existing templates array from the cache.
        $templates = array_merge($templates, $this->templates);
        // Add the modified cache to allow WordPress to pick it up for listing
        // available templates
        wp_cache_add($cache_key, $templates, 'themes', 1800);
        return $atts;
    } // end register_project_templates

    /**
     * Checks if the template is assigned to the page
     *
     * @version    1.0.0
     * @since    1.0.0
     */
    public function view_project_template($template)
    {
        global $post;
        // If no posts found, return to

        // avoid "Trying to get property of non-object" error
        if (!isset($post)) {
            return $template;
        }

        if (!isset($this->templates[get_post_meta($post->ID, '_wp_page_template', true)])) {
            return $template;
        } // end if

        $file = plugin_dir_path(__FILE__) . 'templates/' . get_post_meta($post->ID, '_wp_page_template', true);

        // Just to be safe, we check if the file exist first
        if (file_exists($file)) {
            return $file;
        } // end if

        return $template;
    } // end view_project_template

    /*--------------------------------------------*
     * Delete Templates from Theme
    *---------------------------------------------*/

    public function delete_template($filename)
    {
        $theme_path = get_template_directory();
        $template_path = $theme_path . '/' . $filename;
        if (file_exists($template_path)) {
            unlink($template_path);
        }
        // we should probably delete the old cache
        wp_cache_delete($cache_key, 'themes');
    }

    /**
     * Retrieves and returns the slug of this plugin. This function should be called on an instance
     * of the plugin outside of this class.
     *
     * Deprecated: $this->plugin_slug holds no value as it's value is
     * never set, therefore this function will always return NULL.
     *
     * @return  string    The plugin's slug used in the locale.
     * @version    1.0.0
     * @since    1.0.0
     */
    public function get_locale() {
      //return $this->plugin_slug;
      return null;
    }

    function resortpro_angular_api_settings_init()
    {
        add_action('wp_head', 'resortpro_angular_api_settings');
    }

    function resortpro_angular_api_settings()
    {
        $options = StreamlineCore_Settings::get_options();

        $pagination = (!empty($options['property_pagination'])) ? $options['property_pagination'] : 5;
        $useAddOns = (!empty($options['checkout_use_addons'])) ? $options['checkout_use_addons'] : 0;
        $createStreamSign = (!empty($options['checkout_enable_streamsign'])) ? $options['checkout_enable_streamsign'] : 0;
        $createLeads = (!empty($options['checkout_create_leads'])) ? $options['checkout_create_leads'] : 0;
        $blockedRequest = (!empty($options['booking_blocked_requests'])) ? $options['booking_blocked_requests'] : 0;
        $roomTypeLogic = (!empty($options['use_room_type_logic']) && $options['use_room_type_logic'] == '1') ? 1 : 0;
        $yielding = (!empty($options['use_yielding']) && $options['use_yielding'] == '1') ? 1 : 0;
        $slash = (!empty($options['use_slash']) && $options['use_slash'] == '1') ? 1 : 0;
        $enforceOccupancy = (!empty($options['book_enforce_occupancy'])) ? $options['book_enforce_occupancy'] : 0;
        $searchMethod = (!empty($options['search_method'])) ? $options['search_method'] : 'GetPropertyAvailabilitySimple';
        $priceDisplay = (!empty($options['price_display'])) ? $options['price_display'] : 'total';
        $maxSearchDays = (!empty($options['max_days_search'])) ? $options['max_days_search'] : 30;
        $locationId =  (!empty($options['property_loc_id'])) ? $options['property_loc_id'] : 0;
        $resortAreaId =  (!empty($options['property_resort_area_id'])) ? $options['property_resort_area_id'] : 0;
        $neighborhoodId =  (!empty($options['property_neighborhood_id'])) ? $options['property_neighborhood_id'] : 0;
        $hearAboutId =  (!empty($options['heared_about_id'])) ? $options['heared_about_id'] : 0;
        $disableMinimalDays = (!empty($options['property_use_disable_minimal_days'])) ? $options['property_use_disable_minimal_days'] : 0; 
        $useDailyPricing =  (!empty($options['use_daily_pricing'])) ? $options['use_daily_pricing'] : 0;
        $useWeeklyPricing =  (!empty($options['use_weekly_pricing'])) ? $options['use_weekly_pricing'] : 0;
        $useMonthlyPricing =  (!empty($options['use_monthly_pricing'])) ? $options['use_monthly_pricing'] : 0;
        $dailyPrepend = (!empty($options['daily_pricing_prepend'])) ? $options['daily_pricing_prepend'] : '';
        $dailyAppend = (!empty($options['daily_pricing_append'])) ? $options['daily_pricing_append'] : '';
        $weeklyPrepend = (!empty($options['weekly_pricing_prepend'])) ? $options['weekly_pricing_prepend'] : '';
        $weeklyAppend = (!empty($options['weekly_pricing_append'])) ? $options['weekly_pricing_append'] : '';
        $monthlyPrepend = (!empty($options['monthly_pricing_prepend'])) ? $options['monthly_pricing_prepend'] : '';
        $monthlyAppend = (!empty($options['monthly_pricing_append'])) ? $options['monthly_pricing_append'] : '';
        $restrictionMsg = (!empty($options['message_restriction'])) ? $options['message_restriction'] : '';
        $groupExpectedCharges = (!empty($options['group_expected_charges'])) ? (int)$options['group_expected_charges'] : 0;

        $additionalVariables = (!empty($options['additional_variables'])) ? $options['additional_variables'] : 0;
        $clientSideAmenities = (!empty($options['client_side_amenities'])) ? $options['client_side_amenities'] : 0;
        $hideTooltip = (!empty($options['property_hide_tooltips'])) ? $options['property_hide_tooltips'] : 0;
        $doNotVerifyZip = (!empty($options['do_not_verify_zip_code'])) ? $options['do_not_verify_zip_code'] : 0;
        $enable_list_view = (!empty($options['enable_list_view'])) ? (int)$options['enable_list_view'] : 0;
        $enable_map_view = (!empty($options['enable_map_view'])) ? (int)$options['enable_map_view'] : 0;
        $enable_slider_image = (!empty($options['enable_slider_image'])) ? (int)$options['enable_slider_image'] : 0;

        $extraCharges = (!empty($options['extra_charges'])) ? $options['extra_charges'] : 0;
        $rateMarkup = (!empty($options['rate_markup'])) ? (int)$options['rate_markup'] : 0;
        $maxLengthStay = (!empty($options['max_length_stay'])) ? (int)$options['max_length_stay'] : 0;
        $select_nr_months_calendar = (!empty($options['select_nr_months_calendar'])) ? (int)$options['select_nr_months_calendar'] : 3;
        $includeEnabledOptionalFees = (!empty($options['include_enabled_optional_fees'])) ? (int)$options['include_enabled_optional_fees'] : 0;
        
        $inquiryOnlyFrom = (!empty($options['inquiry_only_from'])) ? $options['inquiry_only_from'] : '';
        $inquiryOnlyTo = (!empty($options['inquiry_only_to'])) ? $options['inquiry_only_to'] : '';

        $enable_gdpr = (!empty($options['enable_gdpr'])) ? (int)$options['enable_gdpr'] : 0;
        $gdpr_first_name = (!empty($options['gdpr_first_name'])) ? $options['gdpr_first_name'] : '';
        $gdpr_last_name = (!empty($options['gdpr_last_name'])) ? $options['gdpr_last_name'] : '';
        $gdpr_phone_number = (!empty($options['gdpr_phone_number'])) ? $options['gdpr_phone_number'] : '';
        $gdpr_email = (!empty($options['gdpr_email'])) ? $options['gdpr_email'] : '';
        $gdpr_address = (!empty($options['gdpr_address'])) ? $options['gdpr_address'] : '';
        $gdpr_country = (!empty($options['gdpr_country'])) ? $options['gdpr_country'] : '';
        $gdpr_city = (!empty($options['gdpr_city'])) ? $options['gdpr_city'] : '';
        $gdpr_state = (!empty($options['gdpr_state'])) ? $options['gdpr_state'] : '';
        $gdpr_postal_code = (!empty($options['gdpr_postal_code'])) ? $options['gdpr_postal_code'] : '';
        $enable_plus_minus = (!empty($options['enable_plus_minus'])) ? (int)$options['enable_plus_minus'] : 0;
        $enable_bedroom_range = (!empty($options['enable_bedroom_range'])) ? (int)$options['enable_bedroom_range'] : 0;
        $enable_adults_range = (!empty($options['enable_adults_range'])) ? (int)$options['enable_adults_range'] : 0;
        $checkout_layout_option = (!empty($options['checkout_layout'])) ? (int)$options['checkout_layout'] : 1;
        $enable_save_unit_place = (!empty($options['enable_save_unit_place'])) ? (int)$options['enable_save_unit_place'] : 0;
        // $checkout_layout_option = $options['checkout_layout'];
        $book_from_lightbox = (!empty($options['enable_book_from_lightbox'])) ? (int)$options['enable_book_from_lightbox'] : 0;

        $locations = array();
        foreach ($options['filter_location_areas'] as $key => $value) {
          $locations[] = $key;
        }

        $assetsUrl = esc_url($this->assets_url);

        $propertyLink = get_bloginfo("url")."/";
        if (!empty($options['prepend_property_page'])) {
            $propertyLink .= $options['prepend_property_page'] . "/";
        }
        //$skip_amenities = (!empty(get_option( 'streamline_skip_amenities' ))) ? 1 : 0;
        $amenities = get_option( 'streamline_skip_amenities' );

        $skip_amenities = (!empty($amenities) || $clientSideAmenities == 0) ? 1 : 0;
        $useHTML = $options['property_use_html'];
        $rootscope = apply_filters('streamline-rootscope', $output, $rootscope );
        
        if( function_exists('kickout') ) kickout( 'rootscope', $options, $output);
        $output = '<script type="text/javascript">
            (function () {
                var app = angular.module("resortpro");

                app.run(function($rootScope){'.$this->generate_rootscope( $rootscope ).'
                                        
                    $rootScope.propertyUrl = "'.$propertyLink.'";
                    $rootScope.useHTML = '.$useHTML.';
                    $rootScope.roomTypeLogic = ' . $roomTypeLogic . ';
                    $rootScope.yielding = ' . $yielding . ';
                    $rootScope.slash = ' . $slash . ';
                    $rootScope.enforceOccupancy = '.$enforceOccupancy.';
                    $rootScope.rateMarkup = '.$rateMarkup.';
                    $rootScope.hideTooltips = '.$hideTooltip.';
                    $rootScope.doNotVerifyZip = '.$doNotVerifyZip.';
                    $rootScope.includeEnabledOptional = ' . $includeEnabledOptionalFees . ';
                    $rootScope.enableGdpr = ' . $enable_gdpr . ';
                    $rootScope.checkout_layout_option = ' . $checkout_layout_option . ';
                    $rootScope.book_from_lightbox = ' . $book_from_lightbox . ';

                    $rootScope.checkoutSettings = {
                      showTaxBreakdown : "true",
                      useAddOns : '.$useAddOns.',
                      createLeads : '.$createLeads.',
                      groupExpectedCharges : '.$groupExpectedCharges.',
                      createStreamSign : '.$createStreamSign.'
                    };

                    $rootScope.searchSettings = {
                      maxOccupantsAdults : "2",
                      locationAreas : \'' . implode(',',$locations) . '\',
                      locationId : ' . $locationId . ',
                      resortAreaId : ' . $resortAreaId . ',
                      neighborhoodId : ' . $neighborhoodId . ',
                      searchMethod : \'' . $searchMethod . '\',
                      priceDisplay : \'' . $priceDisplay . '\',
                      maxSearchDays : ' . $maxSearchDays . ',
                      additionalVariables : ' . $additionalVariables . ',
                      extraCharges : ' . $extraCharges . ',
                      propertyPagination : ' . $pagination . ',
                      propertyDeleteUnits : \'' . $options['property_delete_units'] . '\',
                      defaultFilter : \'' . $options['resortpro_default_filter'] . '\',
                      skipAmenities : ' . $skip_amenities . ',
                      restrictionMsg : \''. $restrictionMsg . '\',
                      disableMinimalDays : ' . $disableMinimalDays . ',
                      useDailyPricing : ' . $useDailyPricing . ',
                      useWeeklyPricing : ' . $useWeeklyPricing . ',
                      useMonthlyPricing : ' . $useMonthlyPricing . ',
                      dailyAppend : \'' . $dailyAppend . '\',
                      dailyPrepend : \'' . $dailyPrepend . '\',
                      weeklyAppend : \'' . $weeklyAppend . '\',
                      weeklyPrepend : \'' . $weeklyPrepend . '\',
                      monthlyAppend : \'' . $monthlyAppend . '\',
                      monthlyPrepend : \'' . $monthlyPrepend . '\',
                      enable_list_view : \'' . $enable_list_view . '\',
                      enable_map_view : \'' . $enable_map_view . '\',
                      enable_slider_image : \'' . $enable_slider_image . '\',
                      enable_bedroom_range : \'' . $enable_bedroom_range . '\',
                      enable_adults_range : \'' . $enable_adults_range . '\',
                      enable_save_unit_place : \'' . $enable_save_unit_place . '\'
                    };

                    $rootScope.bookingSettings = {
                      hearedAboutId : '.$hearAboutId.',
                      blockedRequest : '.$blockedRequest.',
                      inquiryThankMsg : \''.$options['inquiry_thankyou_msg'].'\',
                      inquiryThankUrl : \''.$options['inquiry_thankyou_url'].'\',
                      inquiryOnlyFrom : \''.$inquiryOnlyFrom.'\',
                      inquiryOnlyTo : \''.$inquiryOnlyTo.'\',
                      maxLengthStay : '.$maxLengthStay.',
                      select_nr_months_calendar : '.$select_nr_months_calendar.'
                    };
                });
            })();
            var assetsUrl = "'.$assetsUrl.'";
        </script>';

        // echo $output;
        echo apply_filters( 'streamline_rootscope_function', $output, $rootscope );

    }

    private function generate_rootscope( $scope ){

      $output = '';
      foreach( $scope as $var => $value ):

        if( is_array( $value ) ) :
          $output .= '$rootScope.'.$var.' = {';
          $params = array();
          foreach( $value as $subvar => $subvalue ){
            $newval = addslashes( $subvalue );
            $string = $subvar . ' : ' . ( is_int( $subvalue ) ? $subvalue : "'{$newval}'" );
            $params[] = $string;
          }
          $output .= implode( ',', $params );
          $output .= '};';
        else :
          $newval = addslashes( $value );
          $output .= '$rootScope.'.$var.' = ';
          $output .= ( is_int( $value ) ? $value : "'{$newval}'" ).';';
        endif;

      endforeach;

      return $output;
    }

    // add_action( 'wp_head', 'resortpro_angular_api_settings' );

    /**
     * Load frontend CSS.
     *
     * @access  public
     * @since   1.0.0
     * @return void
     */
    public function enqueue_styles() {
      
      // jquery ui
      wp_enqueue_style( 'jquery-ui-css', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/css/jquery-ui.css' : 'dist/css/jquery-ui.min.css' ) );

      // waitMe
      wp_enqueue_style( 'waitme-css', $this->vendor_url . 'waitMe/' . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'waitMe.css' : 'waitMe.min.css' ) );

      // plugin styles
      $bootstrap_parent = array( 'bootstrap' ); // used to load plugin styles after parent theme bootstrap styles

      wp_enqueue_style( $this->_token . '-css', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/css/resortpro.css' : 'dist/css/resortpro.min.css' ), $bootstrap_parent );

      wp_enqueue_style( 'streamline-core', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/css/streamline-core.css' : 'dist/css/streamline-core.min.css' ) );

       wp_enqueue_style( $this->_token . '-css', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/css/slick-theme.css' : 'dist/css/slick-theme.css' ), $bootstrap_parent );
      // [TODO] this is incorrect however works for now
      if (defined( 'RESORTPRO_PROPERTY_ID' ) ) {
        // lightbox
        wp_enqueue_style( 'lightbox-css', 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/3.3.0/ekko-lightbox.min.css' );

        // tool tipster
        wp_enqueue_style( 'tooltipster-css', 'https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/css/tooltipster.min.css' );

        // master slider
        wp_enqueue_style( 'masterslider-css', $this->assets_url . 'masterslider/style/masterslider.css' );
        wp_enqueue_style( 'masterslider-skin-css', $this->assets_url . 'masterslider/skins/default/style.css' );
        wp_enqueue_style( 'masterslider-partial-css', $this->assets_url . 'masterslider/style/ms-partialview.css' );
      }
    } // End enqueue_styles ()

    /**
     * Load frontend Javascript.
     *
     * @access  public
     * @since   1.0.0
     * @return  void
     */
    public function enqueue_scripts() {
      // jquery
      wp_enqueue_script( 'jquery' );

      // jquery color
      wp_enqueue_script( 'jquery-color' );

      // jquery-ui
      wp_enqueue_script( 'jquery-ui-core' );
      wp_enqueue_script( 'jquery-ui-slider' );
      wp_enqueue_script( 'jquery-ui-datepicker' );

      // google maps api
      $options = StreamlineCore_Settings::get_options();

      $pagename = get_query_var('pagename');
      if($pagename == 'checkout' || $pagename == 'property-info'){
        $pbg_enabled = (isset($options['enable_paybygroup']) && $options['enable_paybygroup'] == 1) ? true : false;
        $pbg_merchant = $options['id'];
        if($pbg_enabled && !empty($pbg_merchant)){
          wp_enqueue_script( 'pbg-js', "https://cdn.paybygroup.com/snippet/v2/loader.js?agent_id={$pbg_merchant}&platform=streamline");
        }
      }
      
      $google_endpoint = 'https://maps.googleapis.com/maps/api/js';
      if(!empty($options['google-maps-api']))
        $google_endpoint .= "?key={$options['google-maps-api']}";

         if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false){

            if(is_page('4')) {

               wp_enqueue_script( 'googlemaps-js', $google_endpoint );
               
            }

            wp_enqueue_script( 'angularjs', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/js/commonangularfile.js' : 'dist/js/commonangularfile.js' ));
       }

      wp_enqueue_script( 'richMarker', $this->vendor_url . 'richMarker/' . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'richmarker.js' : 'richmarker.min.js' ), array( 'googlemaps-js' ) );

      // waitMe
      wp_enqueue_script( 'waitme-js', $this->vendor_url . 'waitMe/' . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'waitMe.js' : 'waitMe.min.js' ), array( 'jquery' ) );

      // dateFormat
      wp_enqueue_script( 'date-format-js', $this->vendor_url . 'dateFormat/' . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'dateFormat.js' : 'dateFormat.min.js' ) );

      // frontend js
      wp_enqueue_script( 'frontend-js', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/js/frontend.js' : 'dist/js/frontend.min.js' ), array( 'jquery' ) );

     
       // angular-cookies
      wp_enqueue_script( 'angularjs', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/js/commonangularfile.js' : 'dist/js/commonangularfile.js' ), array( 'jquery' ) );


       // angular-cookies
      wp_enqueue_script( 'angular-cookies', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/js/angular-cookies.min.js' : 'dist/js/angular-cookies.min.js' ), array( 'angularjs' ) );

        // angular-animate
      wp_enqueue_script( 'angular-animate', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/js/angular-animate.js' : 'dist/js/angular-animate.js' ), array( 'angularjs' ) );

        // angular-ui
      wp_enqueue_script( 'angular-ui', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/js/ui-bootstrap-tpls-0.14.3.js' : 'dist/js/ui-bootstrap-tpls-0.14.3.js' ), array( 'jquery' ) );

      
      // ng-map
      wp_enqueue_script( 'ng-map-js', $this->vendor_url . 'angular-payments/' . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'angular-payments.js' : 'angular-payments.min.js' ) );

      //ng-payments
      wp_enqueue_script( 'ng-payments-js', $this->vendor_url . 'ng-map/' . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'ng-map.js' : 'ng-map.min.js' ) );
      wp_register_script( 'ecommerce',  $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/js/ecommerce.js' : 'dist/js/ecommerce.min.js' ) );
      // App scripts
      if( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
          wp_enqueue_script( 'resortpro-services-js', $this->assets_url . 'app/services/services.js', array( 'angularjs' ) );
          wp_enqueue_script( 'resortpro-alerts-js', $this->assets_url . 'app/services/alerts.js', array( 'angularjs' ) );
          wp_enqueue_script( 'resortpro-api-js', $this->assets_url . 'app/services/rpapi.js', array( 'angularjs' ) );
        wp_enqueue_script( 'resortpro-directives-js', $this->assets_url . 'app/directives/directives.js', array( 'angularjs' ) );
          wp_enqueue_script( 'resortpro-filters-js', $this->assets_url . 'app/filters/filters.js', array( 'angularjs' ) );
          wp_enqueue_script( 'resortpro-property-js', $this->assets_url . 'app/property/property.js', array( 'angularjs' ) );
          wp_enqueue_script( 'resortpro-checkout-js', $this->assets_url . 'app/checkout/checkout.js', array( 'angularjs' ) );
          wp_enqueue_script( 'resortpro-app-js', $this->assets_url . 'app/app.js', array( 'angularjs' ) );
      } else {
        //wp_enqueue_script ( 'resortpro', $this->assets_url . 'dist/js/resortpro.min.js', array('angularjs') );
      }

      // wp_enqueue_script( 'angularjs-isotope', $this->vendor_url . 'angular-isotope/dist/' . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'angular-isotope.js' : 'angular-isotope.min.js' ), array( 'angularjs' ) );
      // [TODO] this is incorrect however works for now

      // jquery sticky
      wp_enqueue_script( 'jquery-sticky-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.3/jquery.sticky.min.js' );

      wp_enqueue_script( 'custom-quote-js', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/js/custom_quote.js' : 'dist/js/custom_quote.min.js' ), array( 'jquery' ) );


      if (defined( 'RESORTPRO_PROPERTY_ID' ) ) {
        // lightbox
        wp_enqueue_script( 'lightbox-js', 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/3.3.0/ekko-lightbox.min.js' );



        // master slider
        wp_enqueue_script( 'masterslider-js', $this->assets_url . 'masterslider/masterslider.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'masterslider-partial-js', $this->assets_url . 'masterslider/masterslider.partialview.js', array( 'jquery' ) );

        // tooltipster
        wp_enqueue_script( 'tooltipster-js', 'https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js' );

        // unit
        wp_enqueue_script( 'unit-js', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/js/unit.js' : 'dist/js/unit.min.js' ), array( 'jquery', 'masterslider-js', 'waitme-js' ) );

         wp_enqueue_script( 'slick-js', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/js/slick.min.js' : 'dist/js/slick.min.js' ), array( 'jquery', 'masterslider-js', 'waitme-js' ) );
      }

      wp_localize_script( 'frontend-js', 'streamlinecoreConfig', array( 'ajaxUrl' => admin_url( 'admin-ajax.php' ) ) );
    } // End enqueue_scripts ()

    /**
     * Load admin CSS.
     *
     * @access  public
     * @since   1.0.0
     * @return  void
     */
    public function admin_enqueue_styles( $hook = '' ) {
      // check what page we are on
      if ( $hook == 'widgets.php' ) {
        // plugin styles
        wp_enqueue_style( $this->_token . '-admin', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/css/admin.css' : 'dist/css/admin.min.css' ), array(), STREAMLINECORE_VERSION );
      } elseif ( $hook == 'settings_page_' . StreamlineCore_Settings::get_settings_page() ) {
        // bootstrap
        //wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' );
      }
      // jquery ui theme
      wp_enqueue_style( 'jqueryui-theme-css', 'https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css' );
    } // End admin_enqueue_styles ()

    /**
     * Load admin Javascript.
     *
     * @access  public
     * @since   1.0.0
     * @return  void
     */
    public function admin_enqueue_scripts( $hook = '' ) {
      // check that we are on the plugin's settings page or widgets page
      if ( in_array( $hook, array( 'settings_page_' . StreamlineCore_Settings::get_settings_page(), 'widgets.php' ) ) ) {
        wp_enqueue_script( 'jquery-ui-core' );
        wp_enqueue_script( 'jquery-ui-dialog' );
        wp_enqueue_script( 'jquery-ui-datepicker' );

        if ( $hook != 'widgets.php') {
          wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array( 'jquery' ), '3.3.5' );
        } 
        wp_enqueue_script( $this->_token . '-admin-js', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/js/admin.js' : 'dist/js/admin.min.js' ), array( 'jquery', 'jquery-ui-core', 'jquery-ui-dialog' ), STREAMLINECORE_VERSION, true );
      }
    } // End admin_enqueue_scripts ()

    /**
     * load plugin text domain
     *
     *@access public
     *@return void
     */
    public function load_plugin_textdomain() {
      load_plugin_textdomain( 'streamline-core', false, basename( dirname( $this->file ) ) . '/languages/' );
    }

    /**
     * Main ResortPro Instance
     *
     * Ensures only one instance of ResortPro is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @see   ResortPro()
     * @return Main ResortPro instance
     */
    public static function instance($file = '')
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self($file);
        }

        return self::$_instance;
    } // End instance ()

    /**
     * Cloning is forbidden.
     *
     * @since 1.0.0
     */
    public function __clone()
    {
        _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?'), STREAMLINECORE_VERSION);
    } // End __clone ()

    /**
     * Unserializing instances of this class is forbidden.
     *
     * @since 1.0.0
     */
    public function __wakeup()
    {
        _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?'), STREAMLINECORE_VERSION);
    } // End __wakeup ()

    /**
     * plugin activation
     *
     * @access  public
     * @since   1.0.0
     * @return void
     */
    public function activation() {

      // create plugin pages (listings, details, checkout, thankyou)
      $page_arr = array();
      $page_arr['listings'] = array(
        'title'    => __( 'Search Results', 'streamline-core' ),
        'name'     => 'search-results',
        'content'  => '[streamlinecore-search-results]',
        'template' => null
      );
      $page_arr['listing_detail'] = array(
        'title'    => __( 'Property Info', 'streamline-core' ),
        'name'     => 'property-info',
        'content'  => '[streamlinecore-property-info]',
        'template' => null
      );
      $page_arr['checkout'] = array(
        'title'    => __( 'Checkout', 'streamline-core' ),
        'name'     => 'checkout',
        'content'  => '[streamlinecore-checkout]',
        'template' => 'null'
      );
      $page_arr['thank_you'] = array(
        'title'    => __( 'Thank You', 'streamline-core' ),
        'name'     => 'thank-you',
        'content'  => '[streamlinecore-thankyou]',
        'template' => null
      );
      $page_arr['custom_quote'] = array(
        'title'    => __( 'Custom Quote', 'streamline-core' ),
        'name'     => 'custom-quote',
        'content'  => '[streamlinecore-quote]',
        'template' => null
      );
      $page_arr['terms-and-conditions'] = array(
        'title'    => __( 'Terms and conditions', 'streamline-core' ),
        'name'     => 'terms-and-conditions',
        'content'  => '[streamlinecore-terms]',
        'template' => null
      );
      $page_arr['add-payment'] = array(
        'title'    => __( 'Add Reservation Payment', 'streamline-core' ),
        'name'     => 'add-payment',
        'content'  => '[streamlinecore-payment]',
        'template' => null
      );
      $page_arr['favorites'] = array(
        'title'    => __( 'Payment Login', 'streamline-core' ),
        'name'     => 'payment-login',
        'content'  => '[streamlinecore-payment-login]',
        'template' => null
      );
      $page_arr['compare'] = array(
        'title'    => __( 'Unit Comparison', 'streamline-core' ),
        'name'     => 'compare',
        'content'  => '[streamlinecore-compare]',
        'template' => null
      );

      // loop through pages set above
      foreach ($page_arr as $slug => $p) {
        // try and get page
        $page = get_page_by_title( $p['title'] );

        if ( ! $page ) {
          // create page
          $page_id = wp_insert_post( array(
            'post_title'      => $p['title'],
            'post_name'       => $p['name'],
            'post_content'    => $p['content'],
            'page_template'   => ( is_null($p['template']) ? 'default' : $p['template']),
            'post_status'     => 'publish',
            'post_type'       => 'page',
            'ping_status'     => 'closed',
            'comment_status'  => 'closed'
          ) );

          // check that page is created
          if ( $page_id == 0 ) {
            exit('Unable to create ' . $p['title'] . ' page.');
          }
        } elseif ( $page->post_status != 'publish' ) {
          // publish page
          $page->post_status = 'publish';
          $page_id = wp_update_post($page);

          // check that page was published
          if ( $page_id == 0 ) {
            exit('Unable to publish ' . $p['title'] . ' page.');
          }
        } else {
          // all good to go, just set the page id
          $page_id = $page->ID;
        }

        if( 0 != $page_id ) :
            // update options (I think only the id is actually being used)
            update_option( 'resortpro_' . $slug . '_page_title', $p['title'] );
            update_option( 'resortpro_' . $slug . '_page_name', $p['name'] );
            update_option( 'resortpro_' . $slug . '_page_id', $page_id );
        endif;
      }

      // resortpro nonce
      update_option( 'wpt_resortpro_api_nonce', 'resortpro_nonce' );
    }

    /**
     * plugin deactivation
     *
     * @access  public
     * @since   1.0.0
     * @return void
     */
    public function deactivation( $network_wide ) {
      // delete resorpro_testdata table (if exists)
      // note this table is no longer created
      global $wpdb;
      $wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "resortpro_testdata" );
    } // end deactivation

    /**
     * When submitting a filter request for properties, redirect to the listings page
     * (resortpro-listings) and populate the querystring with the filter params.
     */
    public function resortpro_find_listings()
    {
      
      if (isset($_POST['resortpro_search_nonce'])) {

        global $wpdb;

        $amenities = '';

        if(isset($_POST['resortpro_sw_amenities'])){
            $amenities = implode(',', $_POST['resortpro_sw_amenities']);
           
        }

        $occupants = (isset($_POST['resortpro_sw_adults']) && $_POST['resortpro_sw_adults'] > 0) ? $_POST['resortpro_sw_adults'] : null;
        $occupants_small = (isset($_POST['resortpro_sw_children']) && $_POST['resortpro_sw_children'] > 0) ? $_POST['resortpro_sw_children'] : null;

        $raw_start_date = isset($_POST['start_date']) ? $_POST['start_date'] : null;
        $raw_end_date = isset($_POST['end_date']) ? $_POST['end_date'] : null;

        $unit_id = isset($_POST['resortpro_sw_bed']) ? $_POST['resortpro_sw_bed'] : null;

        $params = array();
        if (!empty($raw_start_date) && !empty($raw_end_date)) {
            if( version_compare ( '5.3', PHP_VERSION, '<' ) ){
              $start = new \DateTime($raw_start_date);
              $start_date = $start->format('m/d/Y');

              $end = new \DateTime($raw_end_date);
              $end_date = $end->format('m/d/Y');
            } else {
              $start_date = date('Y-m-d', strtotime($raw_start_date)); // now
              $end_date = date('Y-m-d', strtotime($raw_end_date)); // two days from now
            }

            $params = array(
                'sd' => $start_date,
                'ed' => $end_date
            );
        }

        if(!empty($unit_id)){
            $params['unit_id'] = $unit_id;

            $results = StreamlineCore_Wrapper::search( array(
              'startdate'     => $start_date,
              'enddate'       => $end_date,
              'min_occupants' => $occupants,
              'condo_type_id' => $unit_id
            ) );

            if($results['data']['available_properties']['pagination']['total_units'] == "1"){
              $seo_page_name =  $results['data']['property']['seo_page_name'];

              if(!empty($seo_page_name)){

                $destination_url = StreamlineCore_Wrapper::get_unit_permalink( $seo_page_name );
                header("location: $destination_url");
                exit;
              }
            }
        }

        if (is_numeric($occupants) && $occupants > 0)
            $params['oc'] = $occupants;

        if (isset($_POST['occ_adults']) && $_POST['occ_adults'] > 0)
          $params['oc'] = filter_var($_POST['occ_adults'], FILTER_SANITIZE_NUMBER_INT);

        if (is_numeric($occupants_small) & $occupants_small > 0)
            $params['ch'] = $occupants_small;

        if (isset($_POST['occ_children']) && $_POST['occ_children'] > 0)
          $params['ch'] = filter_var($_POST['occ_children'], FILTER_SANITIZE_NUMBER_INT);

        if (isset($_POST['resortpro_sw_pets']) && $_POST['resortpro_sw_pets'] > 0)
          $params['pets'] = filter_var($_POST['resortpro_sw_pets'], FILTER_SANITIZE_NUMBER_INT);

        if (isset($_POST['occ_pets']) && $_POST['occ_pets'] > 0)
          $params['pets'] = filter_var($_POST['occ_pets'], FILTER_SANITIZE_NUMBER_INT);

        if (isset($_POST['resortpro_sw_bedrooms_number']) && is_numeric($_POST['resortpro_sw_bedrooms_number']))
          $params['beds'] = filter_var($_POST['resortpro_sw_bedrooms_number'], FILTER_SANITIZE_NUMBER_INT);

        if (isset($_POST['occ_beds']) && $_POST['occ_beds'] > 0)
          $params['beds'] = filter_var($_POST['occ_beds'], FILTER_SANITIZE_NUMBER_INT);

        if (isset($_POST['resortpro_sw_area']) && $_POST['resortpro_sw_area'] > 0)
          $params['location_area_id'] = filter_var($_POST['resortpro_sw_area'], FILTER_SANITIZE_NUMBER_INT);

        if (isset($_POST['resortpro_sw_lodging_type_id']) && $_POST['resortpro_sw_lodging_type_id'] > 0)
          $params['lodging_type_id'] = filter_var($_POST['resortpro_sw_lodging_type_id'], FILTER_SANITIZE_NUMBER_INT);

        if (isset($_POST['resortpro_sw_ra_id']) && $_POST['resortpro_sw_ra_id'] > 0)
          $params['resort_area_id'] =  filter_var($_POST['resortpro_sw_ra_id'], FILTER_SANITIZE_NUMBER_INT);

        if (isset($_POST['resortpro_sw_view_name']) && !empty($_POST['resortpro_sw_view_name']))
          $params['view_name'] = filter_var ( $_POST['resortpro_sw_view_name'], FILTER_SANITIZE_STRING);

        if (isset($_POST['resortpro_sw_lodging_unit']) && !empty($_POST['resortpro_sw_lodging_unit']))
          $params['unit_name'] = filter_var ( $_POST['resortpro_sw_lodging_unit'], FILTER_SANITIZE_STRING);

        if (isset($_POST['resortpro_sw_lodging_code']) && !empty($_POST['resortpro_sw_lodging_code']))
          $params['unit_name'] = filter_var ( $_POST['resortpro_sw_lodging_code'], FILTER_SANITIZE_STRING);

        if (isset($_POST['resortpro_sw_filter']) && !empty($_POST['resortpro_sw_filter']))
          $params['sort_by'] = filter_var ( $_POST['resortpro_sw_filter'], FILTER_SANITIZE_STRING);

        if (isset($_POST['resortpro_sw_neighborhood_id']) && !empty($_POST['resortpro_sw_neighborhood_id']))
          $params['neighborhood_area_id'] = filter_var ( $_POST['resortpro_sw_neighborhood_id'], FILTER_SANITIZE_STRING);

        if (isset($_POST['resortpro_sw_loc']) && !empty($_POST['resortpro_sw_loc']))
          $params['location_id'] = filter_var ( $_POST['resortpro_sw_loc'], FILTER_SANITIZE_STRING);

        if (isset($_POST['resortpro_sw_grp']) && !empty($_POST['resortpro_sw_grp']))
          $params['group_id'] = filter_var ( $_POST['resortpro_sw_grp'], FILTER_SANITIZE_STRING);

        if(isset($_POST['plus']) && is_numeric($_POST['plus']))
          $params['plus'] = filter_var ( $_POST['plus'], FILTER_SANITIZE_STRING);

        if(isset($_POST['resortpro_sw_home_type_id']) && !empty($_POST['resortpro_sw_home_type_id']))
          $params['home_type_id'] = filter_var($_POST['resortpro_sw_home_type_id'], FILTER_SANITIZE_NUMBER_INT);

        if(!empty($amenities))
          $params['amenities'] = $amenities;

        $permalink = get_permalink(get_page_by_slug('search-results'));


        if (isset($url['query'])) {
            $redirect_url = sprintf('%s&%s', $permalink, http_build_query($params));
        } else {
            $redirect_url = sprintf('%s?%s', $permalink, http_build_query($params));
        }

        header('location: ' . $redirect_url);
        exit;
      }
    }

    public function resortpro_book_unit()
    {
      if (isset($_POST['resortpro_book_unit'])) {
        global $wpdb;

        $unit = isset($_POST['book_unit']) ? $_POST['book_unit'] : null;
        $occupants = isset($_POST['book_occupants']) ? $_POST['book_occupants'] : null;
        $raw_start_date = isset($_POST['book_start_date']) ? $_POST['book_start_date'] : null;
        $raw_end_date = isset($_POST['book_end_date']) ? $_POST['book_end_date'] : null;

        if( version_compare ( '5.3', PHP_VERSION, '<' ) ){

          $start = new \DateTime($raw_start_date);
          $start_date = $start->format('Y-m-d');

          $end = new \DateTime($raw_end_date);
          $end_date = $end->format('Y-m-d');
        } else {
          $start_date = date('Y-m-d', strtotime($raw_start_date));
          $end_date = date('Y-m-d', strtotime($raw_end_date));
        }

        $params = array(
            'unit' => $unit,
            'oc' => $occupants,
            'sd' => $start_date,
            'ed' => $end_date
        );

        if(isset($_POST['book_occupants_small']) && is_numeric($_POST['book_occupants_small']))
          $params['os'] = $_POST['book_occupants_small'];

        if(isset($_POST['book_pets']) && is_numeric($_POST['book_pets']))
          $params['pets'] = $_POST['book_pets'];

        if(isset($_POST['book_coupon_code']) && !empty($_POST['book_coupon_code']))
          $params['coupon_code'] = filter_var ( $_POST['book_coupon_code'], FILTER_SANITIZE_STRING);

        if(isset($_POST['hash']) && !empty($_POST['hash']))
          $params['hash'] = filter_var ( $_POST['hash'], FILTER_SANITIZE_STRING);

        $permalink = get_permalink(get_page_by_slug('resortpro-checkout'));

        $url = parse_url($permalink);

        if (isset($url['query'])) {
            $redirect_url = sprintf('%s&%s', $permalink, http_build_query($params));
        } else {
            $redirect_url = sprintf('%s?%s', $permalink, http_build_query($params));
        }

        header('location: ' . $redirect_url);
        exit;
      }
    }

    /**
     * Fetch a single resortpro listing.
     */
    public function resortpro_listing_detail()
    {
        $rpid = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($rpid) {
            /**
             * Fetch the record from ResortPro API
             * Handeled by Angular
             */
            $property = StreamlineCore_Wrapper::get_property_info( (int)$_GET['id'] );

            return (array)$property['data'];
        }
    }


    public function favorites(){
      $options = StreamlineCore_Settings::get_options();
      $search_layout = $options['search_layout'];
      $use_favorites = ($options['use_favorites'] == '1') ? true : false;
      $use_compare = ($options['use_compare'] == '1') ? true : false;
      $fav_units = ($_COOKIE['streamline-favorites']);

      $max_occupants = (isset($options['inquiry_adults_max']) && $options['inquiry_adults_max'] > 0) ? $options['inquiry_adults_max'] : 1;
      $max_occupants_small = (isset($options['inquiry_children_max']) && $options['inquiry_children_max'] > 0) ? $options['inquiry_children_max'] : 1;
      $pets = (isset($options['inquiry_pets_max']) && $options['inquiry_pets_max'] > 0) ? $options['inquiry_pets_max'] : 1;

      $template = ResortPro::locate_template( 'listing-search-template.php' );
      if ( empty( $template ) ) {
        // default template
        $template = trailingslashit( $this->dir ) . 'includes/templates/search/listing-search-template' . $search_layout . '.php';
      }

      $container = ResortPro::locate_template( 'favorites.php' );
      if(empty($container)){
        $container = trailingslashit($this->dir) . 'includes/templates/favorites.php';
      }

      ob_start();
      include($container);
      $output = ob_get_clean();

      return $output;
    }

    /*Compare Units Page*/
    public function compare(){
      $options = StreamlineCore_Settings::get_options();
      $search_layout = $options['search_layout'];
      $use_favorites = ($options['use_favorites'] == '1') ? true : false;
      $use_compare = ($options['use_compare'] == '1') ? true : false;
      $units_cmp = ($_COOKIE['streamline-compare']);


      $max_occupants = (isset($options['inquiry_adults_max']) && $options['inquiry_adults_max'] > 0) ? $options['inquiry_adults_max'] : 1;
      $max_occupants_small = (isset($options['inquiry_children_max']) && $options['inquiry_children_max'] > 0) ? $options['inquiry_children_max'] : 1;
      $max_pets = (isset($options['inquiry_pets_max']) && $options['inquiry_pets_max'] > 0) ? $options['inquiry_pets_max'] : 1;

      $template = ResortPro::locate_template( 'listing-search-template.php' );
      if ( empty( $template ) ) {
        // default template
        $template = trailingslashit( $this->dir ) . 'includes/templates/search/listing-search-template' . $search_layout . '.php';
      }

      $container = ResortPro::locate_template( 'compare.php' );
      if(empty($container)){
        $container = trailingslashit($this->dir) . 'includes/templates/compare.php';
      }

      ob_start();
      include($container);
      $output = ob_get_clean();

      return $output;
    }

    /**
     * Handle the checkout page.
     */
    public function resortpro_checkout()
    {
        /**
         * @TODO: maybe something here, if not angular will handle it..
         */
    }

    public function browse_results($params = array(), $return_units = false){

      $options = StreamlineCore_Settings::get_options();
      if (isset($params['location_area_name']) && strpos($params['location_area_name'], ',') !== false) {
        $params['location_area_name'] = explode(',', $params['location_area_name']);
      }

      if (isset($params['view_name']) && strpos($params['view_name'], ',') !== false) {
        $params['view_name'] = explode(',', $params['view_name']);
      }

      if (isset($params['condo_type_group_id']) && strpos($params['condo_type_group_id'], ',') !== false) {
        $params['condo_type_group_id'] = explode(',', $params['condo_type_group_id']);
      }

      if (isset($params['resort_area_id']) && strpos($params['resort_area_id'], ',') !== false) {
        $params['resort_area_id_filter'] = $params['resort_area_id'];
        unset($params['resort_area_id']);
      }

      $search_layout = $options['search_layout'];

      $json_params = str_replace('"', '\'', json_encode($params));

      $scope_params = "";
      foreach($params as $key => $value){
        if(is_array($value)){
          $new_value = str_replace('"', '\'', json_encode($value));
        }else{
          $new_value = "'{$value}'";
        }
        if(empty($scope_params)){
          $scope_params = "search.{$key}={$new_value}";
        }else{
          $scope_params .= ";search.{$key}={$new_value}";
        }
      }

      $method = "requestPropertyList('GetPropertyListWordPress', {$json_params});";

      // look for template in theme
      $template = ResortPro::locate_template( 'listing-search-template.php' );
      if ( empty( $template ) ) {
        // default template
        $template = trailingslashit( $this->dir ) . 'includes/templates/search/listing-search-template' . $search_layout . '.php';
      }

      $property_link = get_bloginfo("url");
      if (!empty($options['prepend_property_page'])) {
        $property_link .= "/" . $options['prepend_property_page'];
      }

      $arr_available_fields = array(
        "max_occupants",
        "bedrooms_number_low",
        "name",
        "area",
        "view",
        "pets",
        "rotation",
        "random",
        "price_low"
      );

      $max_occupants = (isset($options['inquiry_adults_max']) && $options['inquiry_adults_max'] > 0) ? $options['inquiry_adults_max'] : 1;
      $max_occupants_small = (isset($options['inquiry_children_max']) && $options['inquiry_children_max'] > 0) ? $options['inquiry_children_max'] : 1;
      $pets = (isset($options['inquiry_pets_max']) && $options['inquiry_pets_max'] > 0) ? $options['inquiry_pets_max'] : 1;

      $sorted_by = isset($_GET['sort_by']) ? filter_var ( $_GET['sort_by'], FILTER_SANITIZE_STRING) : $options['resortpro_default_filter'];
      $use_favorites = ($options['use_favorites'] == '1') ? true : false;

      if(!in_array($sorted_by, $arr_available_fields)){
        $sorted_by = 'default';
      }

      $arr_sort_fields = $this->get_sort_fields($options);

      $container = ResortPro::locate_template( 'streamline-browse-template.php' );
      if(empty($container)){
        $container = trailingslashit($this->dir) . 'includes/templates/page-resortpro-browse-template.php';
      }

      ob_start();
      include($container);
      $output = ob_get_clean();

      return $output;
    }

    public function search_filter($attr = array())
    {
        $options = StreamlineCore_Settings::get_options();

        $scope_params = "";
        foreach($attr as $key => $value){
          if(empty($scope_params)){
            $scope_params = "search.{$key}='{$value}'";
          }else{
            $scope_params .= ";search.{$key}='{$value}'";
          }
        }

        if ($options['property_description'] == 1) {
            $attr['use_description'] = 'yes';
        }
        if ($attr['sale_enabled'] == 'yes') {
            $sales = TRUE;
        }
        if ($attr['longterm_sale_template'] == "yes") {
            $longterm_sale_template = TRUE;
        }
        if ($attr['change_price']) {
            $change_price = $attr['change_price'];
        }
        $attr['page_results_number'] = $options['property_pagination'] ? $options['property_pagination'] : '1000';
        $attr['page_number'] = $_GET['page_number'] ? $_GET['page_number'] : '1';
        if ($_REQUEST['all_page'] == 'yes') {
            $attr['page_results_number'] = '10000';
            $attr['page_number'] = '1';
        }
        $attr['sort_by'] = $_REQUEST['resortpro_sw_filter'] ? $_REQUEST['resortpro_sw_filter'] : $options['resortpro_default_filter'];
        $attr['skip_units'] = $options['property_delete_units'];
        if (empty($_REQUEST['resortpro_sw_loc']) && !empty($options['property_loc_id'])) {
            $attr['location_id'] = $options['property_loc_id'];
        } else {
            $attr['location_id'] = ($_REQUEST['resortpro_sw_loc']) ? $_REQUEST['resortpro_sw_loc'] : false;
        }

        $search_layout = $options['search_layout'];

        $params = str_replace('"', '\'', json_encode($attr));

        $method = "requestPropertyList('GetPropertyListWordPress', {$params});";
        if (empty($search_layout)) {
            $search_layout = 1;
        }

        $arr_available_fields = array(
          "max_occupants",
          "min_occupants",
          "bedrooms_number",
          "bedrooms_number_low",
          "name",
          "area",
          "view",
          "pets",
          "rotation",
          "random",
          "price",
          "price_low"
        );

        $sorted_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : $options['resortpro_default_filter'];
        $use_favorites = ($options['use_favorites'] == '1') ? true : false;

        if(!in_array($sorted_by, $arr_available_fields))
          $sorted_by = 'default';

        $arr_sort_fields = $this->get_sort_fields($options);

        $max_occupants = (isset($options['inquiry_adults_max']) && $options['inquiry_adults_max'] > 0) ? $options['inquiry_adults_max'] : 1;
        $max_occupants_small = (isset($options['inquiry_children_max']) && $options['inquiry_children_max'] > 0) ? $options['inquiry_children_max'] : 1;
        $pets = (isset($options['inquiry_pets_max']) && $options['inquiry_pets_max'] > 0) ? $options['inquiry_pets_max'] : 1;

        // look for template in theme
        $template = ResortPro::locate_template( 'listing-search-template.php' );
        if ( empty( $template ) ) {
          // default template
          $template = trailingslashit( $this->dir ) . 'includes/templates/search/listing-search-template' . $search_layout . '.php';
        }

        $property_link = get_bloginfo("url") . "/";
        if (!empty($options['prepend_property_page'])) {
            $property_link .= $options['prepend_property_page'];
        }

        ob_start();
        include(trailingslashit($this->dir) . 'includes/templates/page-resortpro-browse-template.php');
        $output = ob_get_clean();

        return $output;
    }

    public function get_sort_fields($options){
      $arr_sort_fields = array();
      if ((int)$options['sort_filter_occupants'] === 1 )
        $arr_sort_fields[] = array('value' => 'occupants', 'label' => 'Occupants (high to low)');

      if (isset($options['sort_filter_occupants_min']) && (int)$options['sort_filter_occupants_min'] === 1 )
        $arr_sort_fields[] = array('value' => 'occupants_low', 'label' => 'Occupants (low to high)');

      if (isset($options['sort_filter_bedrooms_number']) && (int)$options['sort_filter_bedrooms_number'] === 1 )
        $arr_sort_fields[] = array('value' => 'bedrooms_number', 'label' => 'Bedrooms Number (high to low)');

      if (isset($options['sort_filter_bedrooms_number_min']) && (int)$options['sort_filter_bedrooms_number_min'] === 1 )
        $arr_sort_fields[] = array('value' => 'bedrooms_number_low', 'label' => 'Bedrooms Number (low to high)');

      if (isset($options['sort_filter_bedrooms_number']) && (int)$options['sort_filter_bathrooms_number'] === 1 )
        $arr_sort_fields[] = array('value' => 'bathrooms_number', 'label' => 'Bathrooms Number');

      if (isset($options['sort_filter_name']) && (int)$options['sort_filter_name'] === 1 )
        $arr_sort_fields[] = array('value' => 'name', 'label' => 'Unit Name');

      if (isset($options['sort_filter_area']) && (int)$options['sort_filter_area'] === 1 )
        $arr_sort_fields[] = array('value' => 'square_foots', 'label' => 'Square feet');

      if (isset($options['sort_filter_price']) && (int)$options['sort_filter_price'] === 1 )
        $arr_sort_fields[] = array('value' => 'price', 'label' => 'Price (high to low)');

      if (isset($options['sort_filter_price_low']) && (int)$options['sort_filter_price_low'] === 1 )
        $arr_sort_fields[] = array('value' => 'price_low', 'label' => 'Price (low to high)');

      if (isset($options['sort_filter_view']) && (int)$options['sort_filter_view'] === 1 )
        $arr_sort_fields[] = array('value' => 'view_name', 'label' => 'View');

      if (isset($options['sort_filter_pets']) && (int)$options['sort_filter_pets'] === 1 )
        $arr_sort_fields[] = array('value' => 'pets', 'label' => 'Pets');

      return $arr_sort_fields;
    }

    public function search_results($params = array(), $return_units = false){
      $options = StreamlineCore_Settings::get_options();

      $str_bs_class = apply_filters('streamline-search-results-default-col', (is_active_sidebar('side_search_widget')) ? '8' : '12' );

      $search_layout = $options['search_layout'];

      $pagination_options =  $options['select_load_units'];
      
      if (empty($search_layout)) {
        $search_layout = 1;
      }elseif ($search_layout == 5) { // premium template logic
        $pull_class = 'pull-right premium';
        $str_bs_class = apply_filters('streamline-search-results-default-col', (is_active_sidebar('side_search_widget')) ? '9' : '12' );
      }

      $page_name = 'Search Results';
      if (isset($_GET['location_area_id'])) {
        $areas = StreamlineCore_Wrapper::get_location_areas();

        foreach ($areas as $area) {
          if ($area->id == $_GET['location_area_id']) {
            $page_name = $area->name;
          }
        }
      }

      $search_sticky_class = (isset($options['sidebar_sticky']) && $options['sidebar_sticky'] == '1') ? "map_sticky" : "";
      $search_sticky_spacing = (isset($options['sidebar_top_spacing']) && !empty($options['sidebar_top_spacing'])) ? 'data-top-spacing="'.$options['sidebar_top_spacing'].'"' : "";
      $search_sticky_spacing .= (isset($options['sidebar_bottom_spacing']) && !empty($options['sidebar_bottom_spacing'])) ? 'data-bottom-spacing="'.$options['sidebar_bottom_spacing'].'"' : "";

      $noinv_msg = (!empty($options['message_no_inventory'])) ? $options['message_no_inventory'] : __( 'Sorry, We have no inventory available for the selected dates and/or filters.', 'streamline-core' );

      // look for template in theme
      $template = ResortPro::locate_template( 'listing-search-template.php' );
      if ( empty( $template ) ) {
        // default template
        $template = trailingslashit( $this->dir ) . 'includes/templates/search/listing-search-template' . $search_layout . '.php';
      }
      if ($search_layout == 5) {
        $listTemplate = ResortPro::locate_template( 'listing-search-template-list.php' );
         if ( empty( $listTemplate ) ) {
            $listTemplate = trailingslashit( $this->dir ) . 'includes/templates/search/listing-search-template-list.php';
         }
      }

      $property_link = get_bloginfo("url");
      if (!empty($options['prepend_property_page'])) {
        $property_link .= "/" . $options['prepend_property_page'];
      }

      $arr_query = array();
      if(isset($_GET['sd']))
        $arr_query['sd'] = urlencode($_GET['sd']);

      if(isset($_GET['ed']))
        $arr_query['ed'] = urlencode($_GET['ed']);

      if(isset($_GET['oc']) && is_numeric($_GET['oc']) && $_GET['oc'] > 0)
        $arr_query['oc'] = $_GET['oc'];

      if(isset($_GET['ch']) && is_numeric($_GET['ch']) && $_GET['ch'] > 0)
        $arr_query['ch'] = $_GET['ch'];

      if(isset($_GET['pets']) && is_numeric($_GET['pets']) && $_GET['pets'] > 0)
        $arr_query['pets'] = $_GET['pets'];

      $query_string = ''; //why is this used?
      if(count($arr_query) > 0)
        $query_string = '?'.http_build_query($arr_query);

      $arr_available_fields = array(
        "occupants",
        "occupants_low",
        "bedrooms_number",
        "bedrooms_number_low",
        "name",
        "area",
        "view",
        "pets",
        "rotation",
        "random",
        "price",
        "price_low"
      );

      $sorted_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : $options['resortpro_default_filter'];
      $use_favorites = ($options['use_favorites'] == '1') ? true : false;
      $use_compare = ($options['use_compare'] == '1') ? true : false;

      if(!in_array($sorted_by, $arr_available_fields))
        $sorted_by = 'default';

      $arr_sort_fields = $this->get_sort_fields($options);

      /*get query string values to initialize angular params */
      $str_params = '';
      $method = 'GetPropertyListWordPress';

      if (isset($_GET['sd'])) {
        $sd = filter_var ( $_REQUEST['sd'], FILTER_SANITIZE_STRING);
        $ed = filter_var ( $_REQUEST['ed'], FILTER_SANITIZE_STRING);
        $str_params .= "search.start_date='{$sd}';search.end_date='{$ed}';";
        $method = $options['search_method'];
      }

      if (isset($_GET['oc']) && is_numeric($_GET['oc'])) {
        $oc = filter_var ( $_REQUEST['oc'], FILTER_SANITIZE_STRING);
        $str_params .= "search.occupants='{$oc}';";
      }
      if (isset($_GET['ch']) && is_numeric($_GET['ch'])) {
        $ch = filter_var ( $_REQUEST['ch'], FILTER_SANITIZE_STRING);
        $str_params .= "search.occupants_small='{$ch}';";
      }
      if (isset($_GET['pets']) && is_numeric($_GET['pets'])) {
        $pets = filter_var ( $_REQUEST['pets'], FILTER_SANITIZE_STRING);
        $str_params .= "search.pets='{$pets}';";
      }

      if (isset($_GET['beds']) && is_numeric($_GET['beds'])) {
        $beds = filter_var ( $_REQUEST['beds'], FILTER_SANITIZE_STRING);
        $str_params .= "search.num_bedrooms='{$beds}';";
      }

      if (isset($_GET['unit_id']) && is_numeric($_GET['unit_id'])) {
        $unit_id = filter_var ( $_REQUEST['unit_id'], FILTER_SANITIZE_STRING);
        $str_params .= "search.unit_id='{$unit_id}';";
      }

      if (isset($_GET['location_area_id']) && is_numeric($_GET['location_area_id'])) {
        $area_id = filter_var ( $_REQUEST['location_area_id'], FILTER_SANITIZE_STRING);
        $str_params .= "search.location_area_id='{$area_id}';";
      }

      if (isset($_GET['lodging_type_id']) && is_numeric($_GET['lodging_type_id'])) {
        $lodging_type_id = filter_var ( $_REQUEST['lodging_type_id'], FILTER_SANITIZE_STRING);
        $str_params .= "search.lodging_type_id='{$lodging_type_id}';";
      }

      if (isset($_GET['home_type_id']) && is_numeric($_GET['home_type_id'])) {
        $home_type_id = filter_var ( $_REQUEST['home_type_id'], FILTER_SANITIZE_STRING);
        $str_params .= "search.home_type_id='{$home_type_id}';";
      }

      if (isset($_GET['condo_type_id']) && is_numeric($_GET['condo_type_id'])) {
        $condo_type_id = filter_var ( $_REQUEST['condo_type_id'], FILTER_SANITIZE_STRING);
        $str_params .= "search.condo_type_id='{$condo_type_id}';";
      }

      // if (isset($_GET['location_resort_id']) && is_numeric($_GET['location_resort_id'])) {
      //   $location_resort_id = filter_var ( $_REQUEST['location_resort_id'], FILTER_SANITIZE_STRING);
      //   $str_params .= "search.location_resort_id={$location_resort_id};";
      // }

      if (isset($_GET['location_id']) && is_numeric($_GET['location_id'])) {
        $location_id = filter_var ( $_REQUEST['location_id'], FILTER_SANITIZE_STRING);
        $str_params .= "search.location_id='{$location_id}';";
      }

      if (isset($_GET['resort_area_id']) && is_numeric($_GET['resort_area_id'])) {
        $resort_area_id = filter_var ( $_REQUEST['resort_area_id'], FILTER_SANITIZE_STRING);
        $str_params .= "search.resort_area_id='{$resort_area_id}';";
      }

      if (isset($_GET['unit_name'])) {
        $unit_name = filter_var ( $_REQUEST['unit_name'], FILTER_SANITIZE_STRING);
        $str_params .= "search.unit_name='{$unit_name}';";
      }

      if (isset($_GET['view_name'])) {
        $view_name = filter_var ( $_REQUEST['view_name'], FILTER_SANITIZE_STRING);
        $str_params .= "search.view_name='{$view_name}';";
      }
      if (isset($_GET['amenities'])) {
        $amenities = urldecode(filter_var ( $_REQUEST['amenities'], FILTER_SANITIZE_STRING));
        $str_params .= "search.amenities='{$amenities}';";
      }
      if (isset($_GET['neighborhood_area_id']) && is_numeric($_GET['neighborhood_area_id'])) {
        $neighborhood_id = filter_var ( $_REQUEST['neighborhood_area_id'], FILTER_SANITIZE_STRING);
        $str_params .= "search.neighborhood_area_id='{$neighborhood_id}';";
      }
      if (isset($_GET['group_id'])) {
        $group_id = filter_var ( $_REQUEST['group_id'], FILTER_SANITIZE_STRING);
        $str_params .= "search.group_id='{$group_id}';";
      }
      if (isset($_GET['plus']) && is_numeric($_GET['plus'])) {
        $plus = filter_var ( $_REQUEST['plus'], FILTER_SANITIZE_STRING);
        $str_params .= "plusLogic=1;";
      }

      $str_params .= "sortBy='{$sorted_by}'";
      /* end query string initialization for angular params */

      $max_occupants = (isset($options['inquiry_adults_max']) && $options['inquiry_adults_max'] > 0) ? $options['inquiry_adults_max'] : 1;
      $max_occupants_small = (isset($options['inquiry_children_max']) && $options['inquiry_children_max'] > 0) ? $options['inquiry_children_max'] : 1;
      $max_pets = (isset($options['inquiry_pets_max']) && $options['inquiry_pets_max'] > 0) ? $options['inquiry_pets_max'] : 1;

      $container = ResortPro::locate_template( 'streamline-listings-template.php' );
      if(empty($container)){
        $container = trailingslashit($this->dir) . 'includes/templates/page-resortpro-listings-template.php';
      }

      $marker_template = ResortPro::locate_template( 'marker.php' );
      if(empty($marker_template)){
        $marker_template = trailingslashit($this->dir) . 'includes/templates/marker.php';
      }
      
      $recents_template = ResortPro::locate_template( 'recents.php' );
      if(empty($recents_template)){
        $recents_template = trailingslashit($this->dir) . 'includes/templates/recents.php';
      }

      ob_start();
      include($container);
      $output = ob_get_clean();
      return $output;
    }

    function my_body_classes( $classes ) {
      $classes[] = 'slash_logic';
      return $classes;
    }

    function google_schema($property){

      $phone = preg_replace( '/[^0-9]/', '', StreamlineCore_Settings::get_options( 'phone' ) );

      //var_dump($property);
      $url = get_bloginfo("url");
      $property_url = StreamlineCore_Wrapper::get_unit_permalink($property['seo_page_name']);
      $zip = !empty($property['zip']) ? $property['zip'] : '';

      $geo = '';
      if(!empty($property['location_latitude'])){
        $geo = '"geo":{
        "@type":"GeoCoordinates",
        "latitude":'.$property['location_latitude'].',
        "longitude":'.$property['location_longitude'].'
     },';
      }
      $output = '<script type="application/ld+json">
    {
       "@context":"http://schema.org",
       "@type":"Hotel",
       "@id":"'.$url.'",
       "name":"'.htmlspecialchars($property['location_name'],ENT_QUOTES).'",
       "address":{
         "@type":"PostalAddress",
         "addressLocality": "'.htmlspecialchars($property['city'],ENT_QUOTES).'",
         "addressRegion": "'.htmlspecialchars($property['location_area_name'],ENT_QUOTES).'",
         "postalCode": "'.$zip.'",
         "streetAddress": "'.htmlspecialchars($property['address'],ENT_QUOTES).'",
         "addressCountry": "'.htmlspecialchars($property['country_name'],ENT_QUOTES).'"
    },
       '.$geo.'
       "telephone":"+'.$phone.'",
       "potentialAction":{
       "@type":"ReserveAction",
       "target":{
       "@type":"EntryPoint",
       "urlTemplate":"'.$property_url.'",
       "inLanguage":"en-US",
       "actionPlatform" : [
            "http://schema.org/DesktopWebPlatform"
        ]
    },
       "result":{
       "@type":"LodgingReservation",
       "name":"Book Room"
      }
     }
    }
    </script>';
      return $output;
    }
    
    public function property_info()
    {

      if (defined("RESORTPRO_PROPERTY_ID")) :
        $site_id = (empty($options['site_id'])) ? FALSE : $options['site_id'];
        $sale = (isset($_GET['sale']) && $_GET['sale']) ? $_GET['sale'] : 0;
        $long_term_enabled = (isset($_GET['longterm_sale_template']) && $_GET['longterm_sale_template']) ? $_GET['longterm_sale_template'] : 0;

        $nonce = wp_create_nonce('property_info');

        $property_data = StreamlineCore_Wrapper::get_property_info_by_seo_name( RESORTPRO_PROPERTY_SEO_PAGE_NAME );
        $property1 = $property_data['data'];

        $property_data = StreamlineCore_Wrapper::get_property_info( RESORTPRO_PROPERTY_ID );
        $property2 = $property_data['data'];

        $property = array_merge($property2, $property1);

        $room_detail_data = StreamlineCore_Wrapper::get_room_details( RESORTPRO_PROPERTY_ID );
        
        $room_detail = array();
        if(isset($room_detail_data['data']['roomsdetails']['name'])){
          $room_detail['roomsdetails'][] = $room_detail_data['data']['roomsdetails'];
        }else{
          $room_detail = $room_detail_data['data'];
        }

        $country_list_obj = StreamlineCore_Wrapper::get_countries();
        $country_list = $country_list_obj['data']['countries'];

        $default_country = 'US';

        $gdpr_enabled = (isset($options['enable_gdpr']) && $options['enable_gdpr'] == 1) ? true : false;

        if(isset($property['gallery']['image']['id'])){
          $property_gallery[] = $property['gallery']['image'];
        }else{
          $property_gallery = $property['gallery']['image'];
        }
        foreach($property_gallery as $key => $image){
          if(!is_string($image['description'])){            
            $property_gallery[$key]['description'] = '';
          }
          $property_gallery[$key]['miniature_path'] = str_replace('thumbnail', 'miniature', $image['thumbnail_path']);
        }

        $layout = StreamlineCore_Settings::get_options( 'unit_layout' );

        $unit_tab_availability = StreamlineCore_Settings::get_options( 'unit_tab_availability' );

        if($unit_tab_availability == 1){
            $enabled_availability = 'enabled_availability';
        }

        // look for template in theme
        $template = '';
        if($sale){
          $template = ResortPro::locate_template( 'listing-detail-sale-template.php' );
        }

        $step_1 = ResortPro::locate_template( 'step_1.php' );
        if ( empty( $step_1 ) ) {
          $step_1 = trailingslashit( $this->dir ) . 'includes/templates/details/premium_layout_steps/step_1.php';
        }

        $step_2 = ResortPro::locate_template( 'step_2.php' );
        if ( empty( $step_2 ) ) {
          $step_2 = trailingslashit( $this->dir ) . 'includes/templates/details/premium_layout_steps/step_2.php';
        }

        $step_3 = ResortPro::locate_template( 'step_3.php' );
        if ( empty( $step_3 ) ) {
          $step_3 = trailingslashit( $this->dir ) . 'includes/templates/details/premium_layout_steps/step_3.php';
        }

        $step_4 = ResortPro::locate_template( 'step_4.php' );
        if ( empty( $step_4 ) ) {
          $step_4 = trailingslashit( $this->dir ) . 'includes/templates/details/premium_layout_steps/step_4.php';
        }

        $full_width_sider = ResortPro::locate_template( 'full-width-slider.php' );
        if ( empty( $full_width_sider ) ) {
          $full_width_sider = trailingslashit( $this->dir ) . 'includes/templates/details/full-width-slider.php';
        }

        if(empty($template)){
          $template = ResortPro::locate_template( 'listing-detail-template.php' );
          if ( empty( $template ) ) {
            // default template
            if ( (int)$layout == 2 || (int)$layout == 3 || (int)$layout == 4 || (int)$layout == 5 || (int)$layout == 6) {
              $template = trailingslashit( $this->dir ) . 'includes/templates/details/page-resortpro-listing-detail-template' . $layout . '.php';
            } else {
              $template = trailingslashit( $this->dir ) . 'includes/templates/details/page-resortpro-listing-detail-template1.php';
            }
          }
        }

        $options = StreamlineCore_Settings::get_options();

        $ssl_enabled = (isset($options['checkout_use_ssl']) && $options['checkout_use_ssl'] == 1) ? true : false;
        $pbg_enabled = (isset($options['enable_paybygroup']) && $options['enable_paybygroup'] == 1) ? true : false;
        $use_promo = (isset($options['property_use_promocode']) && $options['property_use_promocode'] == 1) ? true : false;
        $use_room_type_logic = (!empty($options['use_room_type_logic']) && $options['use_room_type_logic'] == '1') ? 'yes' : 'no';

        $checkout_url = ($ssl_enabled) ? str_replace('http://','https://', get_permalink(get_page_by_slug('checkout'))) : get_permalink(get_page_by_slug('checkout'));

        $start_date = (isset($_GET['sd']) && !empty($_GET['sd'])) ? urldecode($_GET['sd']) : '';
        $end_date = (isset($_GET['ed']) && !empty($_GET['ed'])) ? urldecode($_GET['ed']) : '';
        $occupants = (isset($_GET['oc']) && !empty($_GET['oc'])) ? $_GET['oc'] : '1';
        $occupants_small = (isset($_GET['ch']) && !empty($_GET['ch'])) ? $_GET['ch'] : '0';
        $pets = (isset($_GET['pets']) && !empty($_GET['pets'])) ? $_GET['pets'] : '0';

        $hash = (isset($_REQUEST['hash']) && !empty($_REQUEST['hash'])) ? filter_var ( $_REQUEST['hash'], FILTER_SANITIZE_STRING) : '';

        $res = (isset($_GET['ed']) && !empty($_GET['ed'])) ? 1 : 0;
        $min_stay = (isset($options['unit_book_default_stay']) && $options['unit_book_default_stay'] > 0) ? $options['unit_book_default_stay'] : 2;
        $checkin_days = (isset($options['unit_book_checkin_date']) && $options['unit_book_checkin_date'] > 0) ? $options['unit_book_checkin_date'] : 0;

        $max_adults = $property['max_adults'];
        
        $max_children = $property['max_occupants'];
        $max_pets = $property['max_pets'];

        $booknow_title = (isset($options['unit_book_title']) && !empty($options['unit_book_title'])) ? $options['unit_book_title'] : "";
        $inquiry_title = (isset($options['inquiry_title']) && !empty($options['inquiry_title'])) ? $options['inquiry_title'] : "Property Inquiry";

        $arrive_label = (isset($options['unit_book_checkin_label']) && !empty($options['unit_book_checkin_label'])) ? $options['unit_book_checkin_label'] : "Arrive";
        $depart_label = (isset($options['unit_book_checkout_label']) && !empty($options['unit_book_checkout_label'])) ? $options['unit_book_checkout_label'] : "Depart";
        $adults_label = (isset($options['unit_book_adults_label']) && !empty($options['unit_book_adults_label'])) ? $options['unit_book_adults_label'] : "Adults";
        $children_label = (isset($options['unit_book_children_label']) && !empty($options['unit_book_children_label'])) ? $options['unit_book_children_label'] : "Children";
        $pets_label = (isset($options['unit_book_pets_label']) && !empty($options['unit_book_pets_label'])) ? $options['unit_book_pets_label'] : "Pets";

        $show_captions = (isset($options['property_use_captions']) && $options['property_use_captions'] == '1') ? true : false;

        $slider_height = (isset($options['property_slider_height']) && is_numeric($options['property_slider_height'])) ? $options['property_slider_height'] : 420;

        $sticky_class = (isset($options['book_sticky']) && $options['book_sticky'] == '1') ? "sticky" : "";
        $sticky_spacing = (isset($options['top_spacing']) && !empty($options['top_spacing'])) ? 'data-top-spacing="'.$options['top_spacing'].'"' : "";
        $sticky_spacing .= (isset($options['bottom_spacing']) && !empty($options['bottom_spacing'])) ? 'data-bottom-spacing="'.$options['bottom_spacing'].'"' : "";

        if($use_room_type_logic == 'yes'){
          $property['name'] = $property['condo_type_name'];
        }else{
          if(isset($property['web_name']) && !empty($property['web_name'])){
            $property['name'] = $property['web_name'];
          }else if (empty($property['name']) || $property['name'] == 'Home') {          
            $property['name'] = $property['location_name'];
          }
        }
        
        if(isset($property['unit_amenities']['amenity']['amenity_name']) && !empty($property['unit_amenities']['amenity']['amenity_name'])){
          $property['unit_amenities']['amenity'] = array();
          $property['unit_amenities']['amenity'][] = $property['unit_amenities']['amenity'];
        }

        $price_data = 0;
        if(isset($property['price_data']['daily'])){
          $price_data = $property['price_data']['daily'];
        }else if(isset($property['price_data']['weekly'])){
          $price_data = $property['price_data']['weekly']/7;
        }

        $google_maps_api = $options['google-maps-api'];
        $iframe_url = "https://www.google.com/maps/embed/v1/place?key={$google_maps_api}&q={$property['location_latitude']},{$property['location_longitude']}";

        ob_start();
        include($template);
        $output = ob_get_clean();

        return $output;

      endif;
    }

    public function add_payment(){      
      $reservation_hash = filter_var ( $_REQUEST['hash'], FILTER_SANITIZE_STRING);
      $options = StreamlineCore_Settings::get_options();

      $reservation_price = StreamlineCore_Wrapper::get_reservation_price( 0, $reservation_hash );
      $reservation_info = StreamlineCore_Wrapper::get_reservation_info( $reservation_hash, '' );

      $total_fees = 0;
      $total_taxes = 0;

      if(isset($reservation_price['data'])){
        $reservation_price = $reservation_price['data'];
        
        if(isset($reservation_price['required_fees']['value'])){
          $reservation_price['required_fees'] = array($reservation_price['required_fees']);
        }

        foreach($reservation_price['required_fees'] as $req_fee){
          $taxes_fees += $req_fee['value'];
        }
        
        if(isset($reservation_price['optional_fees']['value'])){
          $reservation_price['optional_fees'] = array($reservation_price['optional_fees']);
        }
        foreach($reservation_price['optional_fees'] as $opt_fee){
          if($opt_fee['active'] == 1){
            $taxes_fees += $opt_fee['value'];
          }          
        }

        if(isset($reservation_price['taxes_details']['value'])){
          $reservation_price['taxes_details'] = array($reservation_price['taxes_details']);
        }
        foreach($reservation_price['taxes_details'] as $tax_detail){
          $total_taxes += $tax_detail['value'];
        }
      }

      if(isset($reservation_info['data']['reservation'])){
        $reservation_info = $reservation_info['data']['reservation'];
      }
            
      $template = ResortPro::locate_template( 'add_payment.php' );
      if ( empty( $template ) ) {
        $template = trailingslashit($this->dir) . 'includes/templates/add_payment.php';
      }

      ob_start();
      include($template);
      $output = ob_get_clean();

      return $output;

    }

    public function payment_login(){
      $template = ResortPro::locate_template( 'payment-login.php' );
      if ( empty( $template ) ) {
        $template = trailingslashit($this->dir) . 'includes/templates/payment-login.php';
      }

      $payment_url = ($ssl_enabled) ? str_replace('http://','https://', get_permalink(get_page_by_slug('add-payment'))) : get_permalink(get_page_by_slug('add-payment'));

      ob_start();
      include($template);
      $output = ob_get_clean();

      return $output;
    }

    public function custom_quote(){

      $reservation_qhash = filter_var ( $_REQUEST['qhash'], FILTER_SANITIZE_STRING);
      $reservation_hash = filter_var ( $_REQUEST['hash'], FILTER_SANITIZE_STRING);

      $options = StreamlineCore_Settings::get_options();

      $ssl_enabled = (isset($options['checkout_use_ssl']) && $options['checkout_use_ssl'] == 1) ? true : false;

      $checkout_url = ($ssl_enabled) ? str_replace('http://','https://', get_permalink(get_page_by_slug('checkout'))) : get_permalink(get_page_by_slug('checkout'));

      $checkout_url2 = $checkout_url;

      $checkout_url = add_query_arg('hash', $reservation_hash, $checkout_url);

      if (empty($reservation_hash) && empty($reservation_qhash)) {
          $message .= '<div class="alert alert-danger">' . __( 'You are attempting to load information on a quote that does not exist.', 'streamline-core' ) . '</div>';
          return $message;
      }

      if (!empty($reservation_hash)) {

        $reservations_quote = StreamlineCore_Wrapper::get_custom_vacation_quote( $reservation_hash );

        if(isset($reservations_quote['data']['reservations']['resrvation']['id'])){
          $reservations['resrvation'][] = $reservations_quote['data']['reservations']['resrvation'];
        }else{
          $reservations = $reservations_quote['data']['reservations'];
        }

        $property_link = get_bloginfo("url");
        if (!empty($options['prepend_property_page'])) {
            $property_link .= "/" . $options['prepend_property_page'];
        }

        if( isset( $reservations_quote['status']['code'] ) ){
        // Error retrieving quote.
          $template = ResortPro::locate_template( 'quote-error.php' );
          if ( empty( $template ) ) {
            $template = trailingslashit($this->dir) . 'includes/templates/quote-error.php';
          }
            } else {

          $template = ResortPro::locate_template( 'quote.php' );
          if ( empty( $template ) ) {
            $template = trailingslashit($this->dir) . 'includes/templates/quote.php';
          }
        }

        ob_start();
        include($template);
        $output = ob_get_clean();

        return $output;
      }
    }

    public function property_checkout()
    {
        $options = StreamlineCore_Settings::get_options();
        $min_days_error = false;
        $future_days_error = false;
        $difference = 0;
        $differenceFuture = 0;

        $checkout_title = (!empty($options['checkout_title'])) ? $options['checkout_title'] : __( 'Pricing, Optional Additional Services, and Booking', 'streamline-core' );
        $checkout_description = $options['checkout_description'];

        $has_coupon = $options['property_show_coupon_code'];

        $notes_enabled = $options['checkout_notes'];

        $country_list_obj = StreamlineCore_Wrapper::get_countries();
        $country_list = $country_list_obj['data']['countries'];

        $default_country = 'US';

        $online_bookings = 0;

        if(isset($_REQUEST['hash'])){
          $hash = filter_var ( $_REQUEST['hash'], FILTER_SANITIZE_STRING);

          $reservation_data = StreamlineCore_Wrapper::get_reservation_info( $hash );

          $str_checkin = $reservation_data['data']['reservation']['startdate'];
          $str_checkout = $reservation_data['data']['reservation']['enddate'];

          $property_data = StreamlineCore_Wrapper::get_property_info( $reservation_data['data']['reservation']['unit_id'] );
          if(isset($property_data['data']))
            $online_bookings = $property_data['data']['online_bookings'];

        }else{
          $hash = '';
          $property_data = StreamlineCore_Wrapper::get_property_info( absint( $_REQUEST['unit'] ) );
          if(isset($property_data['data']))
            $online_bookings = $property_data['data']['online_bookings'];

          $str_checkin = filter_var ( $_REQUEST['sd'], FILTER_SANITIZE_STRING);
          $str_checkout = filter_var ( $_REQUEST['ed'], FILTER_SANITIZE_STRING);
          $unit_id = filter_var ( $_REQUEST['unit'], FILTER_SANITIZE_STRING);
          $property_data = StreamlineCore_Wrapper::get_property_info( $unit_id );
        }

        $unit_id = $property_data['data']['id'];
        $location_id = $property_data['data']['location_id'];
        $condo_type_id = $property_data['data']['condo_type_id'];
        $thumbnail = $property_data['data']['default_thumbnail_path'];
        $unit_name = ($property_data['data']['name'] != 'Home') ? $property_data['data']['name'] : $property_data['data']['location_name'];
        $inquiry_only = false;
        if(!empty($options['inquiry_only_from']) && !empty($options['inquiry_only_to'])){
          $checkin = strtotime($str_checkin);
          $checkout = strtotime($str_checkout);

          $inquiry_from = strtotime($options['inquiry_only_from']);
          $inquiry_to = strtotime($options['inquiry_only_to']);

          if(!($checkout <= $inquiry_from || $checkin >= $inquiry_to)){
            $inquiry_only = true;
          }
        }

        if( version_compare ( '5.3', PHP_VERSION, '<' ) ){
          $checkin = new DateTime($str_checkin);
          $checkout = new DateTime($str_checkout);
          $currentDate = new DateTime(date('Y/m/d'));
          $difference = $currentDate->diff($checkin);
          $difference = $difference->format('%a');

          if(isset($options['lm_booking_future_days']) && $options['lm_booking_future_days'] > 0){
            $future = $currentDate->modify('+'.$options['lm_booking_future_days'] . ' day');

            $differenceFuture = $future->diff($checkout);
            $differenceFuture = $differenceFuture->format('%r%a');
          }

        }else{

          $currentDate = strtotime(date('Y-m-d'));

          $checkin = strtotime($str_checkin);
          $checkout = strtotime($str_checkout);

          $seconds = abs($checkin - $currentDate);

          $years = floor($seconds / (365*60*60*24));
          $months = floor(($seconds - $years * 365*60*60*24) / (30*60*60*24));
          $difference = floor(($seconds - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

          if(isset($options['lm_booking_future_days']) && $options['lm_booking_future_days'] > 0){
            $future = strtotime('+'.$options['lm_booking_future_days'] . ' day');

            if($checkout > $future){
              $differenceFuture = 1;
            }
          }
        }
        if(isset($options['lm_booking_check']) && $options['lm_booking_check'] == 1) {

          if($difference <= $options['lm_booking_days']) {
            $min_days_error = true;
          }
        }
        if(isset($options['lm_booking_future_check']) && $options['lm_booking_future_check'] == 1) {

          if($differenceFuture > 0) {
            $future_days_error = true;
          }
        }

        $terms_and_conditions = StreamlineCore_Wrapper::get_terms_and_conditions($unit_id);
        $privacy_policy = StreamlineCore_Wrapper::get_privacy_policy();

        $ssl_enabled = (isset($options['checkout_use_ssl']) && $options['checkout_use_ssl'] == 1) ? true : false;
        $pbg_enabled = (isset($options['enable_paybygroup']) && $options['enable_paybygroup'] == 1) ? true : false;

        $checkout_url = ($ssl_enabled) ? str_replace('http://','https://', get_permalink(get_page_by_slug('checkout'))) : get_permalink(get_page_by_slug('checkout'));

        $gdpr_enabled = (isset($options['enable_gdpr']) && $options['enable_gdpr'] == 1) ? true : false;

        $checkout_layout = $options['checkout_layout'];

        // echo '+++++++';
        // print_r($checkout_layout);
        // echo "------";
        // look for template in theme
        $template = ResortPro::locate_template( 'checkout-template.php' );
        if ( empty( $template ) ) {
          // default template
          $template = trailingslashit( $this->dir ) . 'includes/templates/checkout/page-resortpro-checkout-template'. $checkout_layout .'.php';
        }

        ob_start();
        include($template);
        $output = ob_get_clean();

        return $output;
    }

    public function property_thankyou() {
      $confirmation_id  = filter_var ( $_REQUEST['confirmation_id'], FILTER_SANITIZE_STRING);
      $reservation_price = StreamlineCore_Wrapper::get_reservation_price( $confirmation_id );
      $reservation_info = StreamlineCore_Wrapper::get_reservation_info( null, $confirmation_id );

      $content = StreamlineCore_Settings::get_options( 'thankyou_content' );
      if(isset($_GET['confirmation_id'])){
        $content = str_replace("%confirmation_id%", $_REQUEST['confirmation_id'], $content);
        $content = str_replace("%location_name%", $reservation_info['data']['reservation']['location_name'], $content);
        $content = str_replace("%condo_type_name%", $reservation_info['data']['reservation']['condo_type_name'], $content);
        $content = str_replace("%unit_name%", $reservation_info['data']['reservation']['unit_name'], $content);
        $content = str_replace("%startdate%", $reservation_info['data']['reservation']['startdate'], $content);
        $content = str_replace("%enddate%", $reservation_info['data']['reservation']['enddate'], $content);
        $content = str_replace("%occupants%", $reservation_info['data']['reservation']['occupants'], $content);
        $content = str_replace("%occupants_small%", $reservation_info['data']['reservation']['occupants_small'], $content);
        $content = str_replace("%pets%", $reservation_info['data']['reservation']['pets'], $content);
        $content = str_replace("%price_common%", "$"." ".number_format($reservation_info['data']['reservation']['price_common'],2, '.', ','), $content);
        $content = str_replace("%price_balance%", "$"." ".number_format($reservation_info['data']['reservation']['price_balance'],2,'.',','), $content);
        $content = str_replace("%travelagent_name%", $reservation_info['data']['reservation']['travelagent_name'], $content);
        $content = str_replace("%email%", $reservation_info['data']['reservation']['email'], $content);
        $content = str_replace("%fname%", $reservation_info['data']['reservation']['fname'], $content);
        $content = str_replace("%lname%", $reservation_info['data']['reservation']['lname'], $content);
        $content = str_replace("%unit_id%", $reservation_info['data']['reservation']['unit_id'], $content);
      }else{
        $content = str_replace("%confirmation_id%", $_REQUEST['confirmation_id'], $content);
        $content = str_replace("%location_name%", $_REQUEST['location_name'], $content);
        $content = str_replace("%condo_type_name%", $_REQUEST['condo_type_name'], $content);
        $content = str_replace("%unit_name%", $_REQUEST['unit_name'], $content);
        $content = str_replace("%startdate%", $_REQUEST['startdate'], $content);
        $content = str_replace("%enddate%", $_REQUEST['enddate'], $content);
        $content = str_replace("%occupants%", $_REQUEST['occupants'], $content);
        $content = str_replace("%occupants_small%", $_REQUEST['occupants_small'], $content);
        $content = str_replace("%pets%", $_REQUEST['pets'], $content);
        $content = str_replace("%price_common%", "$"." ".number_format($_REQUEST['price_common'],2, '.', ','), $content);
        $content = str_replace("%price_balance%", "$"." ".number_format($_REQUEST['price_balance'],2,'.',','), $content);
        $content = str_replace("%travelagent_name%", $_REQUEST['travelagent_name'], $content);
        $content = str_replace("%email%", $_REQUEST['email'], $content);
        $content = str_replace("%fname%", $_REQUEST['fname'], $content);
        $content = str_replace("%lname%", $_REQUEST['lname'], $content);
        $content = str_replace("%unit_id%", $_REQUEST['unit_id'], $content);
      }

        $sitename = get_bloginfo('name');

        if(empty($sitename)){
          $sitename = 'Website';
        }

        $property_data = StreamlineCore_Wrapper::get_property_info( absint( $_REQUEST['unit_id'] ) );
        $thumbnail = $property_data['data']['default_thumbnail_path'];
        $content = str_replace("%thumbnail%", $thumbnail, $content);
        $revenue = $reservation_price['data']['price'];
        $total = $reservation_price['data']['total'];

        if(isset($reservation_price['data']['optional_fees']['id'])){
          if(isset($reservation_price['data']['optional_fees']["active"]) && $reservation_price['data']['optional_fees']["active"] == 1){
            $revenue += $reservation_price['data']['optional_fees']['value'];
          }
        }

        if(count($reservation_price['data']['optional_fees']) > 0){
          foreach ($reservation_price['data']['optional_fees'] as $key => $value) {
            if(isset($value['active']) && $value['active'] == 1){
              $revenue += $value['value'];
            }
          }
        }

        // Localize the script with new data
        $arr_transaction = array(
          'id' => $confirmation_id,
          'affiliation' => $sitename,
          'revenue' => $revenue,
          'rent' => $reservation_price['data']['price'],
          'shipping' => '0',
          'tax' => $reservation_price['data']['taxes'],
          'unit_name' => $reservation_price['data']['unit_name'],
          'optional_fees' => $reservation_price['data']['optional_fees'],
          'total' => $reservation_price['data']['total'],
          'unit_id' => $_REQUEST['unit_id'],
          'nights' => $reservation_info['data']['reservation']['days_number'],
          'state' => $reservation_info['data']['reservation']['state_name'],
          'timestamp' => $reservation_info['data']['reservation']['creation_date']
        );

        // Enqueued script with localized data.
        wp_enqueue_script( 'ecommerce' );

        wp_localize_script( 'ecommerce', 'streamline_transaction', $arr_transaction );

        $template = ResortPro::locate_template( 'checkout-thankyou.php' );

        if ( empty( $template ) ) {
          return $content;
        }

        ob_start();
        include($template);
        $output = ob_get_clean();

        return $output;
    }

    function featured_properties($params = array(), $return_units = false){

        $units = StreamlineCore_Wrapper::get_random_units( $params['number'], $params['ids'] );

        // look for template in theme
        $template = ResortPro::locate_template( 'featured-property-template.php' );
        if ( empty( $template ) ) {
          // default template
          $template = trailingslashit( $this->dir ) . 'includes/templates/featured-property-template.php';
        }

        ob_start();
        foreach ($units as $unit) {
          $property_link = get_bloginfo("url");
          if (!empty($options['prepend_property_page'])) {
              $property_link .= "/" . $options['prepend_property_page'];
          }
          $property_link .= "/{$unit['seo_page_name']}";
          include($template);
        }
        $template_content = ob_get_clean();

        return $template_content;
    }

    function testimonials($params = array()){
      $feedbacks = apply_filters( 'streamline-feedbacks', StreamlineCore_Wrapper::get_feedback( array( 'limit' => $params['number'], 'min_points' => $params['min_points'] ) ), $params );

      //var_dump($feedbacks);

      // look for template in theme
      $template = ResortPro::locate_template( 'testimonials.php' );
      if ( empty( $template ) ) {
        // default template
        $template = trailingslashit( $this->dir ) . 'includes/templates/testimonials-template.php';
      }


        ob_start();
        foreach ($feedbacks as $key => $feedback) {
          # code...
          $divider = ($feedback['points'] > 5) ? 20 : 1;
          include($template);
        }

        $output = ob_get_clean();
        return $output;

    }

    function parse_featured_template($template, $unit){
        foreach ($unit as $key=>$value){
            $template = str_replace("%$key%",$value,$template);
        }

        return $template;
    }

    function terms_and_conditions(){
        $content = StreamlineCore_Wrapper::get_company_policies();

        $html = '';
        if(isset($content['data']['document_html_code']) && is_string($content['data']['document_html_code']))
          $html = $content['data']['document_html_code'];

        return $html;
    }

    function prefix_url_rewrite_templates()
    {
      global $wp_query;

      if (isset($wp_query->query_vars['property']) && !empty($wp_query->query_vars['property'])) {
        $seo_name = $wp_query->query_vars['property'];

        $options = StreamlineCore_Settings::get_options();

        if (!empty($options['property_use_html'])) //.html must be in the end
            $seo_name = substr($seo_name, 0, -5);

        $result = StreamlineCore_Wrapper::verify_seo_page_name( $seo_name );

        $property_info = $result['data'];

        $property_data = StreamlineCore_Wrapper::get_property_info_by_seo_name( $seo_name );
        $property_data = $property_data['data'];

        if (!isset($property_info) || !array_key_exists('id', $property_info)) {
            $wp_query->set_404();
            status_header(404);
        } else {

          define("RESORTPRO_PROPERTY_SEO_PAGE_NAME", $seo_name);
          define("RESORTPRO_PROPERTY_ID", $property_info['id']);

          if (!empty($options['property_seo_put_canonical'])){
            add_filter( 'wpseo_canonical', '__return_false' );
            $canonical = StreamlineCore_Wrapper::get_unit_permalink( $seo_name );
            define("RESORTPRO_CANONICAL", $canonical);
            add_action('wp_head', 'streaminecore_canonical');
          }          

          if (!empty($options['property_seo_put_title']) && !empty($property_info['seo_title'])){
            $seo_title = htmlspecialchars($property_info['seo_title'],ENT_QUOTES);
          }else{
            if(isset($property['web_name']) && !empty($property['web_name'])){
              $seo_title = htmlspecialchars($property_data['web_name'],ENT_QUOTES);
            }else if (empty($property['name']) || $property['name'] == 'Home') {          
              $seo_title = htmlspecialchars($property_data['location_name'],ENT_QUOTES);
            }else{
              $seo_title = htmlspecialchars($property_data['name'],ENT_QUOTES);
            }
          }

          define('RESORTPRO_PROPERTY_SEO_TITLE', $seo_title);
          add_filter( 'wp_title', array($this, 'sl_the_title'), 20, 3);
          add_filter('document_title_parts', array($this,'sl_title_parts'));          
          add_action('wp_head', 'streaminecore_seo_title');

          if (!empty($options['property_seo_put_description']) && !empty($property_info['seo_description'])){
            $description = htmlspecialchars($property_info['seo_description'],ENT_QUOTES);
            define("RESORTPRO_SEO_DESCRIPTION", $description);
            add_action('wp_head', 'streaminecore_seo_description');
          }

          if (!empty($options['property_seo_put_keywords']) && !empty($property_info['seo_keywords'])){
            $keywords = htmlspecialchars($property_info['seo_keywords'],ENT_QUOTES);
            define('RESORTPRO_KEYWORDS', $keywords);
            add_action('wp_head', 'streamlinecore_keywords');
          }

          if (!empty($property_info['additional_seo']) && !empty($property_info['additional_seo']) && (substr(trim($property_info['additional_seo']),0,1) == "<") ){   //must be a tag
            $additional_seo = addcslashes($property_info['additional_seo'],"'");
            define('RESORTPRO_ADDITIONAL_SEO', $additional_seo);
            add_action('wp_head', 'streamlinecore_additional_seo');
          }

          $output = ResortPro::google_schema($property_data);
          define("RESORTPRO_GOOGLE_SCHEMA", $output);
          add_action('wp_head', 'streaminecore_google_schema');
          
          define("RESORTPRO_PROPERTY_DEFAULT_IMAGE", $property_data['default_image_path']);
          add_action('wp_head', 'streaminecore_default_image');
        }
      }

      return true;
    }

    function handle_404($wp)
    {
      if (!is_404())
          return; //nothing to do because our page is non-existent

      $url = $this->get_relative_url($_SERVER["REQUEST_URI"]);

      $options = StreamlineCore_Settings::get_options();

        // strip the url down to just the unit seo name
        // strip out extra to find seo_name
      $url = str_replace( array( '.html', $options['prepend_property_page'] ), '', $wp->request );
      $url = trim( $url, ' /');

      $result = StreamlineCore_Wrapper::verify_seo_page_name( $url );

      $property_data = StreamlineCore_Wrapper::get_property_info_by_seo_name( $url );
      $property_data = $property_data['data'];

      $property_info = $result['data'];

      if (!is_array($property_info))
          return;

      if (!array_key_exists('id', $property_info))
          return;

      define("RESORTPRO_PROPERTY_SEO_PAGE_NAME", $url);
      define("RESORTPRO_PROPERTY_ID", $property_info['id']);

      if (!empty($options['property_seo_put_canonical'])){
        add_filter( 'wpseo_canonical', '__return_false' );
        $canonical = StreamlineCore_Wrapper::get_unit_permalink( $url );
        define("RESORTPRO_CANONICAL", $canonical);
        add_action('wp_head', 'streaminecore_canonical');        
      }

      if (!empty($options['property_seo_put_title']) && !empty($property_info['seo_title'])){
        $seo_title = htmlspecialchars($property_info['seo_title'],ENT_QUOTES);
      }else{
        if (!empty($options['property_seo_put_title']) && !empty($property_info['seo_title'])){
          $seo_title = htmlspecialchars($property_info['seo_title'],ENT_QUOTES);
        }else{
          if(isset($property['web_name']) && !empty($property['web_name'])){
            $seo_title = htmlspecialchars($property_data['web_name'],ENT_QUOTES);
          }else if (empty($property['name']) || $property['name'] == 'Home') {          
            $seo_title = htmlspecialchars($property_data['location_name'],ENT_QUOTES);
          }else{
            $seo_title = htmlspecialchars($property_data['name'],ENT_QUOTES);
          }
        }

        $seo_title = htmlspecialchars($property_data['name'],ENT_QUOTES);
      }

      define('RESORTPRO_PROPERTY_SEO_TITLE', $seo_title);
      add_filter( 'wp_title', array($this, 'sl_the_title'), 20, 3);
      add_filter('document_title_parts', array($this,'sl_title_parts'));      
      add_action('wp_head', 'streaminecore_seo_title');
      
      $output = ResortPro::google_schema($property_data);
      define("RESORTPRO_GOOGLE_SCHEMA", $output);
      add_action('wp_head', 'streaminecore_google_schema');

      if (!empty($options['property_seo_put_description']) && !empty($property_info['seo_description'])){
        $description = htmlspecialchars($property_info['seo_description'],ENT_QUOTES);
        define("RESORTPRO_SEO_DESCRIPTION", $description);
        add_action('wp_head', 'streaminecore_seo_description');
      }

      if (!empty($options['property_seo_put_keywords']) && !empty($property_info['seo_keywords'])){
        $keywords = htmlspecialchars($property_info['seo_keywords'],ENT_QUOTES);
        define('RESORTPRO_KEYWORDS', $keywords);
        add_action('wp_head', 'streamlinecore_keywords');
      }

      if (!empty($property_info['additional_seo']) && !empty($property_info['additional_seo']) && (substr(trim($property_info['additional_seo']),0,1) == "<") ){
        //must be a tag
        $additional_seo = addcslashes($property_info['additional_seo'],"'");        
        define('RESORTPRO_ADDITIONAL_SEO', $additional_seo);
        add_action('wp_head', 'streamlinecore_additional_seo');
      }
      
      define("RESORTPRO_PROPERTY_DEFAULT_IMAGE", $property_data['default_image_path']);
      add_action('wp_head', 'streaminecore_default_image');

      header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
      global $wp_query;
      $fake = new stdClass();
      $fake->ID = StreamlineCore_Settings::get_options( 'page_property_info' );
      $fake->post_title = get_the_title($fake->ID);
      $fake->post_content = "[resortpro-property-info]";
      $fake->post_type = 'page';
      $fake->post_parent = 0;
      $fake->post_status = 'publish';
      $fake->comment_status = 'closed';
      $fake->ping_status = 'closed';
      $wp_query->posts = array($fake);
      $wp_query->post = $fake;
      $wp_query->post_count = 1;
      $wp_query->is_page = true;
      $wp_query->is_404 = false;
      $wp_query->set('pagename', 'property-info');
      add_action('template_redirect', 'get_resortpro_page_template');
      remove_action('wp_head', 'feed_links_extra', 3);
    }

    function get_relative_url($url, $base = null)
    {
        if ($base === null)
            $base = get_option('siteurl');
        $url = parse_url($url, PHP_URL_PATH);
        $home = parse_url($base, PHP_URL_PATH);
        if (!$home)
            $home = "/";
        $url = substr($url, strlen($home));
        $url = trim($url, "/");
        return $url;
    }

    public static function file_url($filepath = '')
    {
        return plugins_url($filepath, __FILE__);
    }

    public static function file_path($file)
    {
        return ABSPATH . 'wp-content/plugins/' . str_replace(basename(__FILE__), "", plugin_basename(__FILE__)) . $file;
    }

    /**
     * assets_url
     *
     * Echoes the path to the assets folder within the StreamlineCore plugin.
     *
     * @since  2.0.1
     * @access  public
     *
     * @param  text  $path    relative path to be added to the assets url
     *
     * @uses  get_assets_url()            Gets the assets url
     */
    public static function assets_url( $path = null ){
        echo self::$_instance->get_assets_url( $path );
    }

    /**
     * get_assets_url
     *
     * Returns the path to the assets folder within the StreamlineCore plugin.
     *
     * @since  2.0.1
     * @access  public
     *
     * @param  text  $path    relative path to be added to the assets url
     * @return  text  url with trailing slash
     *
     * @uses  esc_url()            Safe the assets url
     */
    public function get_assets_url( $path = null ){
        return esc_url( $this->assets_url . $path ) ;
    }

    static function dropdown($name, $options, $cur_value, $zero_option = null, $ng_model = null, $plus = null)
    {
      $angular_str = (!empty($ng_model)) ? 'ng-model="' . $ng_model . '" ng-change="availabilitySearch(search)"' : '';
      
      $s = "<div class=\"c-select-list form-control\"><select name=\"$name\" id=\"$name\" {$angular_str}>";
      if (is_array($zero_option))
          $s .= "<option value=\"{$zero_option[0]}\">{$zero_option[1]}</option>";
      foreach ($options as $value => $label) {
          if($plus == 1){
            $label .= "+";
          }
          $selected = ((string)$value == (string)$cur_value) ? " selected=\"selected\"" : "";
          $s .= "<option value=\"$value\"$selected>$label</option>";
      }
      $s .= "</select></div>";

      return $s;
    }

    static function plusMinus($label_txt, $name, $options, $cur_value, $zero_option = null, $ng_model = null, $plus = null)
    {

      if($ng_model == "search.pets"){
       $angular_str = (!empty($ng_model)) ? 'ng-init="'.$ng_model.'=\''.$cur_value.'\'" ng-model="' . $ng_model . '" ng-change="availabilitySearch(search)"' : '';

      $bind_str = "ng-bind = '".$ng_model."'" ;

      if ($name == 'resortpro_sw_bedrooms_number') {
        $max = count($options) - 1;
        $min = 0;
      } else {
        $max = end($options);
        $min = $options[0];
        if($min === null){
          $min = 1;
        }
      }

      if (!empty($ng_model)) {
      if ($name == 'resortpro_sw_adults'){
        $cur_value = $_REQUEST['oc'];
      } elseif ($name == 'resortpro_sw_children') {
        $cur_value = $_REQUEST['ch'];
      } elseif ($name == 'resortpro_sw_pets') {
        $cur_value = $_REQUEST['pets'];
      } elseif ($name == 'resortpro_sw_bedrooms_number') {
        $cur_value = $_REQUEST['beds'];
      }
    }
      $s = "<div class='input-group' ng-controller='PlusMinusControler as pCtrl'><span ng-click='resetGuests()' id='resetbedsroom'></span>";
      $s .= "<div class='input-group-text-box w-100 d-flex align-items-center'><span {$bind_str} class='data_bind count-single-{$label_txt}'></span>&nbsp;<span class='text-capitalize font-14 font-weight-light-bold label-single-{$label_txt}'>$label_txt</span>";
      $s .= "<div class='btn-group-filter ml-auto'>";
      $s .= "<button type='button' class='decreasesingle btn btn-outline-secondary filter-count-btn p-0 rounded-circle mr-3' aria-label='Minus' ng-click='minuspets($min, \"$ng_model\")'><i class='icon icon-Minus font-12'></i></button>";
      $s .= "<input class='form-control pets_count' aria-label='Button Amounts' name=\"$name\" {$angular_str} placeholder='$zero_option[1]' readonly>";
       $s .= "<button type='button' class='increasesingle btn btn-outline-secondary filter-count-btn p-0 rounded-circle' aria-label='Plus' ng-click='pluspets($max, \"$ng_model\")'><i class='icon icon-plus font-12'></i></button>";
      $s .= "</div>";
      $s .= "</div>";
      $s .= "</div>";
      }else{
        $angular_str = (!empty($ng_model)) ? 'ng-init="'.$ng_model.'=\''.$cur_value.'\'" ng-model="' . $ng_model . '" ng-change="availabilitySearch(search)"' : '';

      $bind_str = "ng-bind = '".$ng_model."'" ;

      if ($name == 'resortpro_sw_bedrooms_number') {
        $max = count($options) - 1;
        $min = 0;
      } else {
        $max = end($options);
        $min = $options[0];
        if($min === null){
          $min = 1;
        }
      }

      if (!empty($ng_model)) {
      if ($name == 'resortpro_sw_adults'){
        $cur_value = $_REQUEST['oc'];
      } elseif ($name == 'resortpro_sw_children') {
        $cur_value = $_REQUEST['ch'];
      } elseif ($name == 'resortpro_sw_pets') {
        $cur_value = $_REQUEST['pets'];
      } elseif ($name == 'resortpro_sw_bedrooms_number') {
        $cur_value = $_REQUEST['beds'];
      }
    }
      $s = "<div class='input-group' ng-controller='PlusMinusControler as pCtrl'><span ng-click='resetGuests()' id='resetbedsroom'></span>";
      $s .= "<div class='input-group-text-box w-100 d-flex align-items-center'><span {$bind_str} class='data_bind count-single-{$label_txt}'></span>&nbsp;<span class='text-capitalize font-14 font-weight-light-bold label-single-{$label_txt}'>$label_txt</span>";
      $s .= "<div class='btn-group-filter ml-auto'>";
      $s .= "<button type='button' class='decreasesingle btn btn-outline-secondary filter-count-btn p-0 rounded-circle mr-3' aria-label='Minus' ng-click='minus($min, \"$ng_model\")'><i class='icon icon-Minus font-12'></i></button>";
      $s .= "<input class='form-control pets_count' aria-label='Button Amounts' name=\"$name\" {$angular_str} placeholder='$zero_option[1]' readonly>";
       $s .= "<button type='button' class='increasesingle btn btn-outline-secondary filter-count-btn p-0 rounded-circle' aria-label='Plus' ng-click='plus($max, \"$ng_model\")'><i class='icon icon-plus font-12'></i></button>";
      $s .= "</div>";
      $s .= "</div>";
      $s .= "</div>";
      }
      

      return $s;
    }

    static function autocomplete($options){
        $value_options = html_entity_decode(json_encode($options));
        $s = "<div class='c-guests-dropdown dropdown z-index location-area-c-search icon icon-location-mark
' ng-controller='PlusMinusControler as pCtrl'>";
        $s .= "<input type='hidden' name='resortpro_sw_ra_id' id='area_id' value=''/>";
        $s .= "<input autocomplete='off' id='vacationarea' placeholder='Area' type='text' ng-model='area' uib-typeahead='area as area.name for area in areas | filter:area' typeahead-focus-first='true' typeahead-on-select='onLocationSelect(area.id)' class='form-control pl-4'>";
        $s .= "</div>";
        return $s;
    }


    static function plusMinusDropDown($adults, $label, $a_label, $children, $c_label, $pets, $p_label, $beds, $beds_label, $childrenTrue, $petsTrue, $bedsTrue){
            $max_adults = $adults;
            $max_children = $children;
            $max_pets = $pets;
            $max_beds = $beds;

            $label = $label;
            $label_adults = $a_label;
            $label_children = $c_label;
            $label_pets = $p_label;
            $label_beds = $beds_label;

            if($_REQUEST['oc'])
            $a_cur_value = $_REQUEST['oc'];

            if($_REQUEST['ch'])
            $c_cur_value = $_REQUEST['ch'];

            if($_REQUEST['pets'])
            $p_cur_value = $_REQUEST['pets'];

            if($_REQUEST['beds'])
            $beds_cur_value = $_REQUEST['beds'];

            $a_ng_model = 'search.occupants';
            $c_ng_model = 'search.occupants_small';
            $p_ng_model = 'search.pets';
            $beds_ng_model = 'search.num_bedrooms';

            $a_angular_str = 'ng-init="'.$a_ng_model.'=\''.$a_cur_value.'\'" ng-model="' . $a_ng_model . '"';
            $c_angular_str = 'ng-init="'.$c_ng_model.'=\''.$c_cur_value.'\'" ng-model="' . $c_ng_model . '"';
            $p_angular_str = 'ng-init="'.$p_ng_model.'=\''.$p_cur_value.'\'" ng-model="' . $p_ng_model . '"';
            $beds_angular_str = 'ng-init="'.$beds_ng_model.'=\''.$beds_cur_value.'\'" ng-model="' . $beds_ng_model . '"';

            $a_bind_str = "ng-bind = '".$a_ng_model."'" ;
            $c_bind_str = "ng-bind = '".$c_ng_model."'" ;
            $p_bind_str = "ng-bind = '".$p_ng_model."'" ;
            $beds_bind_str = "ng-bind = '".$beds_ng_model."'";



            if ($a_cur_value || $c_cur_value) {
              $guestsSum = $a_cur_value + $c_cur_value;
            } else {
              $guestsSum = 0;
            }

            if ($beds_cur_value) {
              $guestsBedsSum = $beds_cur_value;
            } else {
              $guestsBedsSum = 0;
            }

            $name_adults = "search.occupants='$a_cur_value'";
            $name_children = "search.occupants_small='$c_cur_value'";
            $name_pets = "search.pets='$p_cur_value'";


              $s = "<div class='c-guests-dropdown dropdown' ng-controller='PlusMinusControler as pCtrl'>";
              $s .= "<a class='c-guests-dropdown__btn btn  dropdown-toggle form-control' id='guestsDropdownBtn' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
              $s .= "<div class='d-flex align-items-center'>";
              $s .= "<div class='c-guests-dropdown__btn-item c-guests-dropdown__btn-item--guests icon icon-user custome-search-user pl-0'>&nbsp;</div>";
              $s .= "<div class='js-guestsOccLabel pl-0'>&nbsp;</div>";
              $s .= "<span class='guests-sum position-relative font-Nunito font-14'></span><span class='c-guests-dropdown__btn-label guests-sum-label font-Nunito font-13 position-relative guest-top-label pl-2'>&nbsp;$label</span>";
              $s .= "</div>";
              $s .= "<div ng-if='search.pets == 1' class='c-guests-dropdown__btn-group mt-0'>";
              //$s .= "<span class='c-guests-dropdown__btn-item c-guests-dropdown__btn-item--room js-guestsBedsLabel'></span>";
              $s .= "<span class='petscount d-flex align-items-center font-Nunito font-13'><span class='font-16'>,&nbsp;</span> $label_pets</span>";
              $s .= "</div>";
              $s .= "</a>";
              $s .= "<div class='c-guests-dropdown__body dropdown-menu js-guestsDropdown' aria-labelledby='guestsDropdownBtn' >";
              $s .= "<div class='c-guests-dropdown__body-inner py-3 dropdown-menu-index'>";

              $s .= "<div class='c-guests-dropdown__row input-group-text-box w-100 d-flex align-items-center'>";

              $s .= "<span {$a_bind_str} class='font-14 font-weight-light-bold adultscount'></span>";
              $s .= "&nbsp;";
              $s .= "<span class='font-14 font-weight-light-bold text-capitalize font-14 font-weight-light-bold adults_label'>$label_adults</span>";
              $s .= "<div class='btn-group-filter ml-auto d-flex'>";
              $s .= "<div class='js-guestsOccBtn'>";
              $s .= "<button type='button' class='btn btn-outline-secondary filter-count-btn p-0 rounded-circle mr-3' aria-label='Minus' ng-click='minus(1, \"$a_ng_model\")'><i class='icon icon-Minus font-12' aria-hidden='true'></i></button>";
              $s .= "</div>";
              $s .= "<input class='form-control js-guestsOccupants pets_count' aria-label='Button Amounts' name='occ_adults' {$a_angular_str} placeholder='0' readonly>";
              $s .= "<div class='js-guestsOccBtn'>";
              $s .= "<button type='button' class='btn btn-outline-secondary filter-count-btn p-0 rounded-circle' aria-label='Plus' ng-click='plus($max_adults, \"$a_ng_model\")'><i class='icon icon-plus font-12' aria-hidden='true'></i></button>";
              $s .= "</div>";
              $s .= "</div>";
              $s .= "</div>";


               if ($childrenTrue) {
              $s .= "<div class='c-guests-dropdown__row input-group-text-box w-100 d-flex align-items-center'>";
              $s .= "<span {$c_bind_str} class='font-14 font-weight-light-bold children-count'></span>";
              $s .= "&nbsp;";
              $s .= "<span class='children-label font-14 font-weight-light-bold text-capitalize font-14 font-weight-light-bold'>$label_children</span>";
              $s .= "<div class='btn-group-filter ml-auto d-flex'>";
              $s .= "<div class='js-guestsOccBtn'>";
              $s .= "<button type='button' class='btn btn-outline-secondary filter-count-btn p-0 rounded-circle mr-3' aria-label='Minus' ng-click='minus(0, \"$c_ng_model\")'><i class='icon icon-Minus font-12' aria-hidden='true'></i></button>";
              $s .= "</div>";
              $s .= "<input class='form-control js-guestsOccupants pets_count' aria-label='Button Amounts' name='occ_children' {$c_angular_str} placeholder='0' readonly>";
              $s .= "<div class='js-guestsOccBtn'>";
              $s .= "<button type='button' class='btn btn-outline-secondary filter-count-btn p-0 rounded-circle' aria-label='Plus' ng-click='plus($max_children, \"$c_ng_model\")'><i class='icon icon-plus font-12' aria-hidden='true'></i></button>";
              $s .= "</div>";
              $s .= "</div>";
              $s .= "</div>";
              }

              if ($bedsTrue) {
              $s .= "<div class='c-guests-dropdown__row'>";
              $s .= "<span {$beds_bind_str} class='c-guests-dropdown__label dropdown-header beds-count'></span>";
              $s .= "<span class='c-guests-dropdown__label dropdown-header beds-label'>$label_beds</span>";
              $s .= "<div class='input-group'>";
              $s .= "<div class='input-group-btn js-guestsBedsBtn'>";
              $s .= "<button type='button' class='btn btn-default' aria-label='Minus' ng-click='minus(1, \"$beds_ng_model\")'><i class='fa fa-minus-circle' aria-hidden='true'></i></button>";
              $s .= "</div>";
              $s .= "<input class='form-control js-guestsBeds pets_count' aria-label='Button Amounts' name='occ_beds' {$beds_angular_str} placeholder='0' readonly>";
              $s .= "<div class='input-group-btn js-guestsBedsBtn'>";
              $s .= "<button type='button' class='btn btn-default' aria-label='Plus' ng-click='plus($max_beds, \"$beds_ng_model\")'><i class='icon icon-plus-circle'></i></button>";
              $s .= "</div>";
              $s .= "</div>";
              $s .= "</div>";
              }

              if ($petsTrue) {
                  $s .= "<div class='c-guests-dropdown__row  input-group-text-box w-100 d-flex align-items-center'>";
                  $s .= "&nbsp;";
                  $s .= "<span class='pets-label font-14 font-weight-light-bold text-capitalize'>$label_pets</span>";
                  $s .= "<div class='btn-group-filter ml-auto'>";
                  $s .= "<div class='custom-control custom-radio custom-control-inline align-items-center '>
                          <input type='radio'  id='r1'  class='custom-control-input' name='pets'  ng-click='minus(0, \"$p_ng_model\")'/>
                          <label class='custom-control-label yes font-13 font-weight-light-bold text-capitalize custome-size-radio-dot' for='r1'>No</label>
                        </div>";

 



                  $s .= "<input  class='form-control pets_count' aria-label='Button Amounts' name='occ_pets' {$p_angular_str} placeholder='0' readonly>";
                  $s .= "<div class='custom-control custom-radio custom-control-inline align-items-center mr-0'>
                         <input type='radio' id='r2' class='custom-control-input' name='pets'   ng-click='plus($max_pets, \"$p_ng_model\")'/>
                         <label class='custom-control-label no font-13 font-weight-light-bold text-capitalize custome-size-radio-dot' for='r2'>Yes</label></div>";
                  $s .= "</div>";
                  $s .= "</div>";
              }

              $s .= "<div class='c-guests-dropdown__row c-guests-dropdown__row--cta container-fluid mb-0'>";
              $s .= "<div class='row'>";
              $s .= "<div class='col-12'>";
              $s .= "<button id='guestsDropClearBtn' type='button' class='btn btn-primary themeBtn text-uppercase font-weight-bold font-Nunito float-right' aria-label='Reset' ng-click='resetGuests();'>Clear</button>";
              $s .= "</div>";
              $s .= "<div class='col-12'>";
              $s .= "<button type='button' id='guestsDropCloseBtn' class='btn btn-default btn-block d-none' aria-label='Close' ng-click='closeGuests()'>Apply</button>";
              $s .= "</div>";
              $s .= "</div>";
              $s .= "</div>";
              $s .= "</div>";
              $s .= "</div>";
              $s .= "</div>";

            return $s;
    }

    static function radio($name, $options, $cur_value, $zero_option = null, $ng_model = null, $plus = null)
    {
        $angular_str = (!empty($ng_model)) ? 'ng-init="' . $ng_model . '=\'' . $cur_value . '\'" ng-model="' . $ng_model . '" ng-click="availabilitySearch(search)"' : '';

        $s = "<div id=\"$name\" class=\"radio-list\">";
        foreach ($options as $value => $label) {
            if (empty($value)) {
                $label = 'All ' . $label;
            }
            if ($plus == 1) {
                $label .= "+";
            }
            $selected = ((string)$value == (string)$cur_value) ? " checked=\"checked\"" : "";
            $s .= "<label><input type=\"radio\" name=\"$name\" {$angular_str} value=\"$value\"$selected><span>&nbsp;</span>&nbsp;$label</label><br>";
        }
        $s .= "</div>";

        return $s;
    }

    static function range($min_value, $max_value)
    {
        return array_combine(range($min_value, $max_value), range($min_value, $max_value));
    }

    /**
     * look up template in theme, supports backwards combability for both template directory and name
     */
    public static function locate_template( $template_name, $load = FALSE, $require_once = TRUE ) {
      // directories to check, in order
      $directory_arr = array( 'streamline', 'streamline_templates', 'resortpro_templates', '' );

      // prefix template name with resortpro for backwards compatibility
      if ( stripos( $template_name, 'resortpro-' ) === FALSE ) {
        $template_name_arr = array( $template_name, 'resortpro-' . $template_name );
      } else {
        $template_name_arr = array( str_replace( 'resortpro-', '', $template_name ), $template_name);
      }

      // loop through directories and template names and try and locate template
      foreach ( $directory_arr as $directory ) {
        foreach ($template_name_arr as $template_name ) {
          $template = locate_template( $directory . DIRECTORY_SEPARATOR . $template_name, $load, $require_once );
          if ( ! empty( $template ) ) {
            return $template;
          }
        }
      }

      // nothing found
      return '';
    }

    public function geocoder($address, $latlng = null)
    {
      global $wpdb;
      static $geocoding = null;

            $table = "streamlinecore_geocoder";

      if (!is_array($geocoding))
      {
              $wpdb->query("CREATE TABLE IF NOT EXISTS `$table` (`address` varchar(255) NOT NULL,`latlng` varchar(255) DEFAULT NULL,PRIMARY KEY (`address`)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
        $raw = $wpdb->get_results("select * from `$table` order by `address`", ARRAY_A);
        $geocoding = array();
        foreach ($raw as $row)
          $geocoding[$row['address']] = $row['latlng'];
      }
      if (!array_key_exists($address,$geocoding) && !$latlng)
      {
              $_address = "'".addcslashes($address, "\n\"\'")."'";
              $wpdb->query("INSERT IGNORE into `$table` (`address`) values ($_address)");
        return null;
      }
      if ($latlng)
      {
              $_address = "'".addcslashes($address, "\n\"\'")."'";
              return $wpdb->query("UPDATE `$table` SET `latlng`='$latlng' where `address` = $_address");
      }
      return $geocoding[$address];
    }

    public function ajax_cache_geocoding()
    {
      $address = isset($_POST['vars']['address']) ? stripslashes($_POST['vars']['address']) : "";
      $latlng = isset($_POST['vars']['latlng']) ? stripslashes($_POST['vars']['latlng']) : "";

      $response = array();
      if (!$address)
        $response['result'] = -1;
      else
      {
        $latlng = trim($latlng,'()');
        if (!preg_match("#^(\-?\d+(\.\d+)?),\s*(\-?\d+(\.\d+)?)$#i",$latlng))
          $response['result'] = -2;
        else
        {
          $response['result'] = self::geocoder($address, $latlng);
        }
      }
      die(json_encode($response));
    }

    public function googlemap($params=array())
    {
      wp_enqueue_script( 'google_maps_marker', $this->assets_url . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'src/js/google_maps.js' : 'dist/js/google_maps.min.js' ), array( 'jquery' ) );

      $popup_height = isset($params['max_popup_height'])?$params['max_popup_height']."px":"auto";
      $map_width = intval($params['map_width']) ? intval($params['map_width']).'px' : '100%';
      $map_height = intval($params['map_height']) ? intval($params['map_height']).'px' : '400px';
      $map_id = ($params['map_id']) ? $params['map_id'] : 'resortpro_map';
      $map_icon = ($params['map_icon']) ? $params['map_icon'] : 'default';
      $map_cache = intval($params['map_cache']) ? intval($params['map_cache']) : 24;
      $wp_ajax_url = get_bloginfo('wpurl')."/wp-admin/admin-ajax.php?";

      $transient = array();

      foreach ($params as $k=>$v)
      {
        if (substr($k,0,4)!='map_')
          $transient[$k] = $v;
      }

      $units = array();

      $transient = 'resortpro-map-'.substr(md5(serialize($transient)),0,16);

      if ( false === ( $units = get_transient( $transient ) ) )
      {
        $options = StreamlineCore_Settings::get_options();

        if (isset($params['location_area_name']) && strpos($params['location_area_name'], ',') !== false) {
          $params['location_area_name'] = explode(',', $params['location_area_name']);
        }

        if (isset($params['view_name']) && strpos($params['view_name'], ',') !== false) {
          $params['view_name'] = explode(',', $params['view_name']);
        }

        if (isset($params['condo_type_group_id']) && strpos($params['condo_type_group_id'], ',') !== false) {
          $params['condo_type_group_id'] = explode(',', $params['condo_type_group_id']);
        }

        if (isset($params['resort_area_id']) && strpos($params['resort_area_id'], ',') !== false) {
          $params['resort_area_id_filter'] = $params['resort_area_id'];
          unset($params['resort_area_id']);
        }

        if(empty($params['page_results_number'])){
          $params['page_results_number'] = 100;
        }

        $params['use_amenities'] = 'no';
        $params['use_description'] = 'no';

        $use_room_type_logic = (!empty($options['use_room_type_logic']) && $options['use_room_type_logic'] == '1') ? 'yes' : 'no';
        $params['use_room_type_logic'] = $use_room_type_logic;

        $results = StreamlineCore_Wrapper::search($params);

        if($results['data']['available_properties']['pagination']['total_units'] > 0){
          if($results['data']['available_properties']['pagination']['total_units'] == 1){
            $units[] = $results['data']['property'];
          }else{
            $units = $results['data']['property'];
          }
        }

        set_transient( $transient, $units, $map_cache * 3600);
      }

      $places = array();
      foreach ($units as $unit)
      {
        $json = array();

        if(!empty($unit['location_latitude']) && !empty($unit['location_longitude'])){

          $json['latlng'] = array($unit['location_latitude'], $unit['location_longitude']);
          $json['key'] =  round($json['latlng'][0], 4).",".round($json['latlng'][1], 4);
        }
        $json['title'] = self::get_unit_name($unit);
        $json['address'] = $unit['address'] . ', ' . $unit['city'] . ', ' . $unit['state_description'] . ' ' . $unit['zip'] . ', ' . $unit['country_name'];

        $url = StreamlineCore_Wrapper::get_unit_permalink($unit['seo_page_name']);

        $thumbnail = '';
        if(!empty($unit['default_thumbnail_path'])){
          $thumbnail = '<img src="'.$unit['default_thumbnail_path'].'" style="width:100px;margin-right:4px;" align="left"/>';
        }

        $json['html'] = '<a href=\''.$url.'\'><strong>'.$unit['location_name'].'</strong><br />'.$thumbnail.'</a><br />';
        $json['html'] .= __( 'Bedrooms:', 'streamline-core' ) . ' ' . $unit['bedrooms_number'] . '<br />';
        $json['html'] .= __( 'Bathrooms:', 'streamline-core' ) . ' ' . $unit['bathrooms_number'] . '<br />';
        $json['html'] .= __( 'Max. Adults:', 'streamline-core' ) . ' ' . $unit['max_adults'];
        $json['html'] .= '<div style=\'clear:both;\'></div>';

        $places[] = $json;
      }

      foreach($places as $result_item){
          if(!empty($popup_height)){
              $result_item['html'] = "<div style='display:block ;max-height: $popup_height; overflow-y:auto;'>".$result_item['html']."</div>";
          }

          $places_update[]= $result_item;
      }

      wp_localize_script( 'google_maps_marker', 'streamline_gmap', array('map_id' => $map_id,
          'places' => $places_update,
         'icon'   => $map_icon,
         'ajax_url' => $wp_ajax_url ));

      $output = "<div id=\"{$map_id}\" style=\"width:{$map_width};height:{$map_height};\"></div>";

      return $output;
    }

  static function get_file() {
    if(self::$_instance){
        return self::$_instance->file;
    }else{
      return null;
    }

  }

  static function get_token() {
    return self::$_instance->_token;
  }

  static function get_vendor_url() {
    return self::$_instance->vendor_url;
  }

  static function get_unit_name(&$unit)
  {
    if ($unit['lodging_type_id'] == 3)
      return $unit['location_name'];
    else
      return $unit['name'];
  }

  function sl_title_parts($title){

    $seo_title = RESORTPRO_PROPERTY_SEO_TITLE;

    if(!empty($seo_title)){
      $title['title'] = $seo_title;
    }

    return $title;
  }

  function sl_the_title( $title, $sep, $seplocation){

    $seo_title = RESORTPRO_PROPERTY_SEO_TITLE;

    if($seplocation == 'right'){
      return sprintf("%s %s ", $seo_title, $sep);
    }else{
      return sprintf("%s %s ", $sep, $seo_title);
    }
  }  
}

function streaminecore_seo_title(){
  $title = RESORTPRO_PROPERTY_SEO_TITLE;
  echo "<meta property=\"og:title\" content=\"{$title}\" />\n";
}

function streaminecore_google_schema(){  
  echo RESORTPRO_GOOGLE_SCHEMA."\n";
}

function streaminecore_default_image(){
  $default_image =  RESORTPRO_PROPERTY_DEFAULT_IMAGE;
  echo "<meta property=\"og:image\" content=\"{$default_image}\" />\n";
}

function streaminecore_seo_description(){  
  $seo_description = RESORTPRO_SEO_DESCRIPTION;
  echo "<meta name=\"description\" content=\"{$seo_description}\" />\n";
  echo "<meta property=\"og:description\" content=\"{$seo_description}\" />\n";
}

function streaminecore_canonical(){    
  $canonical = RESORTPRO_CANONICAL;
  echo "<link rel=\"canonical\" href=\"{$canonical}\" />\n";
  echo "<meta property=\"og:url\" content=\"{$canonical}\" />\n";
}

function streamlinecore_keywords(){
  $keywords = RESORTPRO_KEYWORDS;
  echo "<meta name=\"keywords\" content=\"{$keywords}\" />\n";
}

function streamlinecore_additional_seo(){
  echo RESORTPRO_ADDITIONAL_SEO . "\n";  
}
