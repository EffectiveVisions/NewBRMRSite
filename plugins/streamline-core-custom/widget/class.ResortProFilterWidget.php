<?php

class ResortProFilterWidget extends WP_Widget
{
    var $criteria = array();

    /**
     * Register widget with WordPress.
     */
    function __construct() {
      $this->criteria = array(
        'booking_dates'     => __( 'Booking Dates', 'streamline-core' ),
        'guests_adults'     => __( 'Number of Adult Guests', 'streamline-core' ),
        'guests_children'   => __( 'Number of Children Guests', 'streamline-core' ),
        'price_range'       => __( 'Price Range', 'streamline-core' ),
        'guests_pets'       => __( 'Number of Pets', 'streamline-core' ),
        'number_bedrooms'   => __( 'Number of Bedrooms', 'streamline-core' ),
        'lodging_type'      => __( 'Lodging Type', 'streamline-core' ),
        'area'              => __( 'Area', 'streamline-core' ),
        'location'          => __( 'Location', 'streamline-core' ),
        'location_resort'   => __( 'Location/Resort', 'streamline-core' ),
        'neighborhood'      => __( 'Neighborhood', 'streamline-core' ),
        'view_name'         => __( 'View', 'streamline-core' ),
        'bedroom_type'      => __( 'Bedroom Type', 'streamline-core' ),
        'group_type'        => __( 'Group Type', 'streamline-core' ),
        'home_type'         => __( 'Home Type', 'streamline-core' ),
        'amenities'         => __( 'Amenities', 'streamline-core' )
        //'customgroup'     => __( 'Custom Group', 'streamline-core' )
      );
      parent::__construct( 'resortpro_filter_widget', __('StreamlineCore Filter Widget', 'streamline-core'), array(
        'description' => __('Search available properties via integrated StreamlineCore API.', 'streamline-core')
      ) );
    }

    private function options($field)
    {
        $labels = array(
            'guests_adults'   => __( 'Adults:', 'streamline-core' ),
            'guests_children' => __( 'Children:', 'streamline-core' ),
            'guests_pets'     => __( 'Pets:', 'streamline-core' ),
            'number_bedrooms' => __( 'Bedrooms:', 'streamline-core' ),
            'lodging_type'    => __( 'Lodging Type:', 'streamline-core' ),
            'area'            => __( 'Area:', 'streamline-core' ),
            'neighborhood'    => __( 'Neighborhood:', 'streamline-core' ),
            'view_name'       => __( 'View:', 'streamline-core' ),
            'location'        => __( 'Location:', 'streamline-core' ),
            'location_resort' => __( 'Location/Resort:', 'streamline-core' ),
            'amenities'       => __( 'Amenities:', 'streamline-core' ),
            'bedroom_type'    => __( 'Bedroom Type:', 'streamline-core' ),
            'group_type'      => __( 'Group Type:', 'streamline-core' ),
            'home_type'       => __( 'Home Type:', 'streamline-core' )
        );

        if (($field == 'customgroup') && array_key_exists('customgroup', $this->criteria))
            $labels['customgroup'] = $this->criteria['customgroup'] . ':';
        if(StreamlineCore_Settings::get_options( 'enable_bedroom_range' ) == 1 || StreamlineCore_Settings::get_options( 'enable_adults_range' ) == 1){
            $type = array(
                "Dropdown"  => __( 'Dropdown', 'streamline-core' ),
                "Radio"   => __( 'Radio', 'streamline-core' ),
                "Slide Range"   => __( 'Slide Range', 'streamline-core' ),
            );
        }else{
            $type = array(
                "Dropdown"  => __( 'Dropdown', 'streamline-core' ),
                "Radio"   => __( 'Radio', 'streamline-core' ),
            );
        }
        $result = array();
        if (array_key_exists($field, $labels)) {
            $result['label'] = array('text', "Label", $labels[$field]);
            $result['col_lg'] = array('integer', 'Bootstrap col-lg', 1, 12);
            $result['col_md'] = array('integer', 'Bootstrap col-md', 1, 12);
            $result['col_sm'] = array('integer', 'Bootstrap col-sm', 1, 12);
            $result['col_xs'] = array('integer', 'Bootstrap col-xs', 1, 12);
            $result['type'] = array('dropdown', 'Type', $type);
        }
        switch ($field) {
            case 'booking_dates':
                $result['label_checkin'] = array('text', "Check-in Label", __( 'Arrival', 'streamline-core' ) );
                $result['label_checkout'] = array('text', "Check-out Label", __( 'Departure', 'streamline-core' ) );
                $result['checkin_date'] = array('integer', "Check-in Today + Days" , __( 'Check-in Today + Days', 'streamline-core' ));;
                $result['booking_nights'] = array('integer', __( 'Default Stay', 'streamline-core' ), 2, 90);

                $result['turn_monday'] = array('checkbox', __( 'Turnday Monday', 'streamline-core' ), 0, 1);
                $result['turn_tuesday'] = array('checkbox', __( 'Turnday Tuesday', 'streamline-core' ), 0, 1);
                $result['turn_wednesday'] = array('checkbox', __( 'Turnday Wednesday', 'streamline-core' ), 0, 1);
                $result['turn_thursday'] = array('checkbox', __( 'Turnday Thursday', 'streamline-core' ), 0, 1);
                $result['turn_friday'] = array('checkbox', __( 'Turnday Friday', 'streamline-core' ), 0, 1);
                $result['turn_saturday'] = array('checkbox', __( 'Turnday Saturday', 'streamline-core' ), 0, 1);
                $result['turn_sunday'] = array('checkbox', __( 'Turnday Sunday', 'streamline-core' ), 0, 1);

                $result['col_lg'] = array('integer', 'Bootstrap col-lg', 1, 12);
                $result['col_md'] = array('integer', 'Bootstrap col-md', 1, 12);
                $result['col_sm'] = array('integer', 'Bootstrap col-sm', 1, 12);
                $result['col_xs'] = array('integer', 'Bootstrap col-xs', 1, 12);

                break;
            case 'price_range':

                $result['min'] = array('text', __( 'Minimum Price', 'streamline-core' ), 100, 10, 0);
                $result['max'] = array('text', __( 'Maximum Price', 'streamline-core' ), 1000, 10, 1);

                break;
            case 'guests_adults':
                $result['min'] = array('integer', __( 'Minimum number', 'streamline-core' ), 1, 100, 0);
                $result['max'] = array('integer', __( 'Maximum number', 'streamline-core' ), 10, 100, 1);
                break;
            case 'guests_children':
                $result['max'] = array('integer', __( 'Maximum number', 'streamline-core' ), 0, 100, 0);
                break;
            case 'guests_pets':
                $result['max'] = array('integer', __( 'Maximum number', 'streamline-core' ), 0, 2, 0);
                break;
            case 'number_bedrooms':
                $result['min'] = array('integer', __( 'Minimum number', 'streamline-core' ), 1, 10, 0);
                $result['max'] = array('integer', __( 'Maximum number', 'streamline-core' ), 4, 10, 1);
                $result['plus'] = array('checkbox', __( 'Use plus logic', 'streamline-core' ), 0, 1);
                break;
            case 'amenities':
                $result['group'] = array('checkbox', __( 'Organize by group', 'streamline-core' ), 1, 1);
                break;
            case 'sorting_order':
                $options = array(
                    "max_occupants_desc"  => __( 'Max occupants', 'streamline-core' ),
                    "max_occupants_asc"   => __( 'Min occupants', 'streamline-core' ),
                    "bedrooms_number"     => __( 'Bedrooms number', 'streamline-core' ),
                    "min_bedrooms_number" => __( 'Min bedrooms number', 'streamline-core' ),
                    "area"                => __( 'Square feet', 'streamline-core' ),
                    "area_low"            => __( 'Square feet low', 'streamline-core' ),
                    "view"                => __( 'View order', 'streamline-core' ),
                    "price"               => __( 'Price descending', 'streamline-core' ),
                    "price_low"           => __( 'Price Ascending', 'streamline-core' ),
                    "pets"                => __( 'Pets', 'streamline-core' ),
                    "rotation"            => __( 'StreamlineCore Unit Rotate', 'streamline-core' ),
                    "random"              => __( 'Random', 'streamline-core' )
                  );
                $result['by'] = array('dropdown', __( 'Sort units by', 'streamline-core' ), $options);
                break;
        };
        return $result;
    }

    private function filters_options()
    {
        $result = array('template', 'submit_id', 'submit_url');
        foreach (array_keys($this->criteria) as $fid) {
            $options = array_keys($this->options($fid));
            foreach ($options as $oid)
                $result[] = "$fid-$oid";
        }
        return $result;
    }

    private function show_option_checkbox($id, $label, $default, $checked)
    {

        $checked = ($checked === null) ? $default : $checked;
        $_checked = ($checked) ? " checked=\"checked\"" : "";
        return "<label for='$id-tmp'><input id=\"$id-tmp\" name=\"$id-tmp\" type=\"checkbox\" style=\"width:auto\" value=\"1\" $_checked /> $label </label>";
    }

    private function show_option_text($id, $label, $value, $default)
    {
        $value = ($value === null) ? $default : $value;
        return "<label for='$id-tmp'>$label:</label><input id=\"$id-tmp\" name=\"$id-tmp\" type=\"text\" value=\"" . htmlspecialchars($value) . "\" />";
    }

    private function show_option_integer($id, $label, $value, $default, $max_value, $min_value = 1)
    {
        $value = ($value === null) ? $default : $value;
        return "<label for='$id-tmp'>$label:</label>" . ResortPro::dropdown("$id-tmp", array_combine(range($min_value, $max_value), range($min_value, $max_value)), $value);
    }

    private function show_option_dropdown($id, $label, $values, $selected)
    {
        return "<label for='$id-tmp'>$label:</label>" . ResortPro::dropdown("$id-tmp", $values, $selected);
    }

    private function show_options($fid, $options, &$instance)
    {        
        $result = "";
        foreach ($options as $oid => $option) {            
            $type = $option[0];
            $label = $option[1];
            $default = $option[2];
            $internal = "{$fid}-{$oid}";            
            $value = (isset($instance[$internal])) ? $instance[$internal] : '';
            
            $id = $this->get_field_id($internal);
            switch ($type) {
                case "text":
                    $result .= $this->show_option_text($id, $label, $value, $default);
                    break;
                case "integer":
                    $min_value = array_key_exists(4, $option) ? $option[4] : 1;
                    $max_value = array_key_exists(3, $option) ? $option[3] : 10;
                    $result .= $this->show_option_integer($id, $label, $value, $default, $max_value, $min_value);
                    break;
                case "checkbox":
                    $result .= $this->show_option_checkbox($id, $label, $default, $value);
                    break;
                case "dropdown":
                    $result .= $this->show_option_dropdown($id, $label, $option[2], $value);
                    break;
            }
            $result .= "<br />";
        }
        return $result;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        $widget_title = '';
        if (!empty($instance['title'])) {
            $widget_title = $args['before_title'] . apply_filters('widget_title', $instance['title'], 'streamline-filter-widget' ) . $args['after_title'];
        }

        // use a template for the output so that it can easily be overridden by theme

        // check for template in active theme
        $templ = ($instance['template']) ? $instance['template'] : $this->default_template($instance);


        $search_template = $this->parse_template( apply_filters( 'streamline-filter-widget-template', $templ, $instance ), $instance);

        
        
        

        // look for template in theme
        $template = ResortPro::locate_template( 'filter-widget.tpl.php' );

        if( version_compare ( '5.3', PHP_VERSION, '<' ) ){
            $start = new \DateTime();
            $start_date = $start->format('Y-m-d');

            $end = $start;
            $end->add(new \DateInterval('P2D'));
            $end_date = $end->format('Y-m-d');
        } else {
            $start_date = date('Y-m-d'); // now
            $end_date = date('Y-m-d', time()+ (2 * SECONDS_PER_DAY ) ); // two days from now
        }

        //$endpoint = get_option('wpt_resortpro_api_endpoint', null);
        $endpoint = StreamlineCore_Settings::get_options( 'endpoint' );
        $areas = StreamlineCore_Wrapper::get_location_areas();
        $amenities = StreamlineCore_Wrapper::get_amenity_filters();


        /**
         * @TODO: make this a dynamically generated field from the source Api connection.
         */
        $nonce = wp_create_nonce('resortpro_nonce');

        if (!filter_var($endpoint, FILTER_VALIDATE_URL) === false) {

            if ($template == '') {
                $template = 'resortpro-filter-widget.tpl.php';
            }

            include($template);

        } else {
            ?>
            <div class="alert alert-danger">
              <i class="fa fa-fw fa-warning"></i>
              <?php _e( 'You must define the StreamlineCore API Endpoint to use this widget!', 'streamline-core' ) ?>
            </div>
            <?php
        }

        echo $args['after_widget'];

    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        if ($instance) {
            $title = esc_attr($instance['title']);
            $fields = ($instance['fields']) ? explode(",", $instance['fields']) : array();
        } else {
            $title = __('New title for Complete Search', 'streamline-core');
            $fields = array("booking_dates", "guests_adults");
        }

        $hidden_field_id = $this->get_field_id('fields');
        $modal_div_id = $this->get_field_id('modal');

        $title = !empty($instance['title']) ? $instance['title'] : '';
        $per_page = !empty($instance['per_page']) ? $instance['per_page'] : 5;   
        $custom_template = (!empty($instance['template'])) ? $instance['template'] : '';          
        ?>
        <input type="hidden" name="dirty_data" value="" class="dirty_data" />
        <div class="resortpro-widget-dialog wp-dialog" id="<?php echo $modal_div_id ?>">
            <div class="resortpro-widget-selected-filters"><?php _e( 'Selected Filters', 'streamline-core' ) ?></div>
            <div class="resortpro-widget-available-filters"><?php _e( 'Available Filters', 'streamline-core' ) ?></div>
            <div class="resortpro-widget-filters">
              <ul id="<?php echo $modal_div_id ?>-sortable2" class="connectedSortable connectedSortable-right"></ul>
              <ul id="<?php echo $modal_div_id ?>-sortable1" class="connectedSortable connectedSortable-left">
                <?php
                foreach ($this->criteria as $id => $name) {                    
                    echo "<li class=\"ui-state-default\" field=\"$id\">
                        <div class='resortpro-switcher'>&dArr;</div>
                        <span class='resortpro-filtername'>$name</span>
                        <div class='resortpro-switchable'>" . $this->show_options($id, $this->options($id), $instance) . "</div></li>";
                }
                ?>
              </ul>
              <div class="clearfix" style="clear:both;display:none"></div>
            </div>
            
            <div align="center">                
                <textarea id="<?php echo $this->get_field_id('template') ?>-tmp" rows="6" cols="20" class="widefat"><?php echo $custom_template ?></textarea>
                <small><?php _e( 'put custom template for this widget in the area above', 'streamline-core' ) ?></small>
            </div>
        </div>

        <p>
            <input type="hidden" id="<?php echo $hidden_field_id ?>"
                   name="<?php echo $this->get_field_name('fields'); ?>" type="text"
                   value="<?php echo implode(",", $fields); ?>"/>
            <?php
            foreach ($this->filters_options() as $fid_oid) {
                $value = (isset($instance[$fid_oid])) ? htmlspecialchars($instance[$fid_oid]) : '';
                ?>
                <input class="resortpro-var-container" type="hidden" id="<?php echo $this->get_field_id($fid_oid); ?>"
                       name="<?php echo $this->get_field_name($fid_oid); ?>"
                       value="<?php echo $value ?>"/>
                <?php
            }
            ?>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/>
        </p>

        <?php
        $no = (empty($fields)) ? "block" : "none";
        $yes = (empty($fields)) ? "none" : "block";
        echo "<p class='resortpro-searching-by-no' style='display:$no;color:white;background-color:red;padding:2px'><strong>" . __( 'This widget won\'t work, because it has no search fields selected.', 'streamline-core' ) . "</strong></p>";
        $by = array();
        foreach ($fields as $field)
            $by[] = $this->criteria[$field];
        echo "<p class='resortpro-searching-by-yes' style='display:$yes;'>" . __( 'Searching by:', 'streamline-core' ) . " <span class='resortpro-searching-by'>" . implode(", ", $by) . "</span></p>";
        ?>

        <p align="center"><input type="button" value="<?php _e( 'Configure Search Fields', 'streamline-core' ) ?>"
                                 onclick="resortpro_configure_search_fields('<?php echo $modal_div_id ?>','<?php echo $hidden_field_id ?>')"
                                 class="button-primary"/></p>

        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['fields'] = strip_tags($new_instance['fields']);
        foreach ($this->filters_options() as $fid_oid) {
            $instance[$fid_oid] = $new_instance[$fid_oid];
        }

        $arr_fields = explode(',', $new_instance['fields']);
        $amenities = true;
        foreach ($arr_fields as $value) {
            if($value == 'amenities'){
                $amenities = false;
            }
        }

		update_option( 'streamline_skip_amenities', $amenities );

        return $instance;
    }

    private function default_template($instance)
    {

        if (!$instance['fields'])
            return "";
        $fields = explode(",", $instance['fields']);
        $result = "";
        for ($i = 0; $i < count($fields); $i++) {
            $field = $fields[$i];
            if (!($field == "viewall_button" || $field == 'price_range')) {
                if ($field == 'booking_dates') {
                    if (strpos($result, 'resortpro-search-checkin') !== false)
                        $field = 'checkout';
                    else {
                        $field = 'checkin';
                        $i--;
                    }


                    $bs_class = "col-lg-{$instance['booking_dates-col_lg']} col-md-{$instance['booking_dates-col_md']} col-sm-{$instance['booking_dates-col_sm']} col-xs-{$instance['booking_dates-col_xs']}";
                } else if ($field == 'amenities') {
                    $bs_class = "col-md-12";
                } else {
                    $bs_class = "col-lg-{$instance[$field.'-col_lg']} col-md-{$instance[$field.'-col_md']} col-sm-{$instance[$field.'-col_sm']} col-xs-{$instance[$field.'-col_xs']}";
                }
                $classname = "resortpro-search-" . str_replace("_", "-", $field);

                $result .= "<div class='$bs_class'>";
                $result .= "<div class='form-group
                $classname-block'>";
                //$result .= "<label for=\"{$field}\">%{$field}_label%</label>";

                if(!($field == 'submit_button' || $field == 'sorting_order'))
                    $result .= "<label for=\"{$field}\">%{$field}_label%</label>";

                $result .= "%{$field}_field%";

                $result .= "</div>";
                $result .= "</div>";
            }
        }

        if (in_array("price_range", $fields)) {

            $result .= "<div class=\"c-range-slider col-xs-12\">
                <div class=\"c-range-slider__inner resortpro-search-price\">
                <p>
                    <label for=\"amount\">Nightly Rate Budget:</label>
                    
                </p>

                <div class=\"c-range-slider__body\">
                    <div sliderange ng-model=\"pricerange\" min-price={$instance['price_range-min']} max-price={$instance['price_range-max']} show-availability=\"filterByPrice(minPrice, maxPrice)\"></div>
                    <input type=\"text\" id=\"amount\" readonly style=\"border:0; color:#529000; font-weight:bold;\" value=\"{$instance['price_range-min']} - {$instance['price_range-max']}\">
                    
                    <input type=\"hidden\" ng-model=\"minPrice\"/>
                    <input type=\"hidden\" ng-model=\"maxPrice\"/>

                    </div></div>
                </div>";
        }

        return $result;
    }
    private function parse_template($template, $instance)
    {
        if (!$instance['fields'])
            return $template;
        $replacements = array();
        $fields = explode(",", $instance['fields']);
        foreach ($fields as $field) {
            if ($field != 'booking_dates')
                $replacements[$field . '_label'] = ltrim($instance["$field-label"], "!");
            else {
                $replacements['checkin_label'] = $instance["booking_dates-label_checkin"];
                $replacements['checkout_label'] = $instance["booking_dates-label_checkout"];
            }
        }

        if (strpos($template, "%checkin_field%") !== false) {
            $checkin_ts = time() + 86400 * $instance['booking_dates-checkin_date'];
            $checkin = ($instance['booking_dates-checkin_date'] == -1) ? '' : date("m/d/Y", $checkin_ts);
            $checkin_date = array_key_exists('streamlinecore_fw_checkin', $_REQUEST) ? $_REQUEST['streamlinecore_fw_checkin'] : $checkin;

            $min_stay = '';
            $checkin_days = '';
            if($instance['booking_dates-booking_nights'] > 0){
                $min_stay = 'data-min-stay="'.$instance['booking_dates-booking_nights'].'"';
            }

            if($instance['booking_dates-checkin_date'] > 0){
                $checkin_days = 'data-checkin-days="'.$instance['booking_dates-checkin_date'].'"';
            }
            
            $arr_turn_days = array();
            if(isset($instance['booking_dates-turn_monday']) && $instance['booking_dates-turn_monday'] == '1'){
                $arr_turn_days[] = 1;
            }
            if(isset($instance['booking_dates-turn_tuesday']) && $instance['booking_dates-turn_tuesday'] == '1'){
                $arr_turn_days[] = 2;
            }
            if(isset($instance['booking_dates-turn_wednesday']) && $instance['booking_dates-turn_wednesday'] == '1'){
                $arr_turn_days[] = 3;
            }
            if(isset($instance['booking_dates-turn_thursday']) && $instance['booking_dates-turn_thursday'] == '1'){
                $arr_turn_days[] = 4;
            }
            if(isset($instance['booking_dates-turn_friday']) && $instance['booking_dates-turn_friday'] == '1'){
                $arr_turn_days[] = 5;
            }
            if(isset($instance['booking_dates-turn_saturday']) && $instance['booking_dates-turn_saturday'] == '1'){
                $arr_turn_days[] = 6;
            }
            if(isset($instance['booking_dates-turn_sunday']) && $instance['booking_dates-turn_sunday'] == '1'){
                $arr_turn_days[] = 0;
            }

            $replacements['checkin_field'] = '<div class="c-input-group input-group"><input id="filter_start_date" '.$min_stay.' '.$checkin_days.' class="form-control" data-filterturndates="'.implode(',', $arr_turn_days).'" type="text" sdpicker="" ng-model="search.start_date" name="start_date" readonly="readonly" placeholder="'.$instance["booking_dates-label_checkin"].'" /><span class="c-input-group__btn input-group-btn"><a class="btn btn-default btn-calendar-in js-calendarBtn" href="#"><i class="glyphicon glyphicon-calendar"></i></a></span></div>';

            if ($label = $this->_label($instance['booking_dates-label_checkin'])){
                $replacements['checkin_field'] = "<label class='resortpro-input'><span>$label</span>{$replacements['checkin_field']}</label>";
            }

            $checkout = ($instance['booking_dates-checkin_date'] == -1) ? '' : date("m/d/Y", $checkin_ts + 86400 * $instance['booking_dates-booking_nights']);
            $checkout_date = array_key_exists('streamlinecore_fw_checkout', $_REQUEST) ? $_REQUEST['streamlinecore_fw_checkout'] : $checkout;

            $replacements['checkout_field'] = '<div class="c-input-group input-group"><input id="filter_end_date" class="form-control" data-filterturndates="'.implode(',', $arr_turn_days).'" type="text" edpicker="" ng-model="search.end_date" name="end_date" readonly="readonly" placeholder="'.$instance["booking_dates-label_checkout"].'" /><span class="c-input-group__btn input-group-btn"><a class="btn btn-default btn-calendar-in js-calendarBtn" href="#"><i class="glyphicon glyphicon-calendar"></i></a></span></div>';

            if ($label = $this->_label($instance['booking_dates-label_checkout'])){
                $replacements['checkout_field'] = "<label class='resortpro-input'><span>$label</span>{$replacements['checkout_field']}</label>";
            }                           
        }
        if (strpos($template, "%guests_adults_field%") !== false) {
            $max_value = $instance['guests_adults-max'];
           
            $label = $instance['guests_adults-label'];
            if(!empty($label))
                $zero_option = array("", $label);

            if($instance['guests_adults-type']=='Radio'){
                $replacements['guests_adults_field'] = ResortPro::radio("streamlinecore_fw_adults", ResortPro::range(1, $max_value), $this->is_var_set('oc', 'intval'), $zero_option, 'search.occupants', 'availabilitySearch(search);');
            }else if($instance['guests_adults-type']=='Dropdown'){
                $replacements['guests_adults_field'] = ResortPro::dropdown("streamlinecore_fw_adults", ResortPro::range(1, $max_value), $this->is_var_set('oc', 'intval'), $zero_option, 'search.occupants', 'availabilitySearch(search);').'<i class="fa fa-user"></i>';
            }else if(StreamlineCore_Settings::get_options( 'enable_adults_range') == 1 && $instance['guests_adults-type']=='Slide Range'){
                $replacements['guests_adults_field'] .= "<div class=\"col-md-12\">
                <div class=\"occupants_range row\" ng-init=\"minAdultsNumber={$instance['guests_adults-min']};maxAdultsNumber={$instance['guests_adults-max']}\">
                <p>
                    <label for=\"streamlinecore_fw_adults\">Adults Range:</label>
                    <input type=\"text\" id=\"streamlinecore_fw_adults\" name=\"streamlinecore_fw_adults\" readonly style=\"border:0; color:#f6931f; font-weight:bold;\" value=\"{$instance['guests_adults-min']} - {$instance['guests_adults-max']}\">
                </p>
                <div adultsrange min-adults-number=\"{$instance['guests_adults-min']}\" max-adults-number=\"{$instance['guests_adults-max']}\" show-availability=\"search.min_occupants=minAdultsNumber;search.max_occupants=maxAdultsNumber;availabilitySearch(search);\"></div>
                <input type=\"hidden\" ng-model=\"minAdultsNumber\"/>
                <input type=\"hidden\" ng-model=\"maxAdultsNumber\"/>
                </div></div>";
            }else{
                $replacements['guests_adults_field'] = ResortPro::dropdown("streamlinecore_fw_adults", ResortPro::range(1, $max_value), $this->is_var_set('oc', 'intval'), $zero_option, 'search.occupants', 'availabilitySearch(search);');
            }

        }

        if (strpos($template, "%guests_children_field%") !== false) {
            $max_value = $instance['guests_children-max'];

            $label = $instance['guests_children-label'];
            if(!empty($label))
                $zero_option = array("", $label);

            if($instance['guests_children-type']=='Radio'){
                $replacements['guests_children_field'] = ResortPro::radio("streamlinecore_fw_children", ResortPro::range(1, $max_value), $this->is_var_set('ch', 'intval'), $zero_option, 'search.occupants_small', 'availabilitySearch(search);');
            }else{
                $replacements['guests_children_field'] = ResortPro::dropdown("streamlinecore_fw_children", ResortPro::range(0, $max_value), $this->is_var_set('ch', 'intval'), $zero_option, 'search.occupants_small');
            }
        }
        if (strpos($template, "%guests_pets_field%") !== false) {
            $max_value = $instance['guests_pets-max'];
           
            $label = $instance['guests_pets-label'];
            if(!empty($label))
                $zero_option = array("", $label);

            if($instance['guests_pets-type']=='Radio'){
                $replacements['guests_pets_field'] = ResortPro::radio("streamlinecore_fw_pets", ResortPro::range(0, $max_value), $this->is_var_set('pets', 'intval'), $zero_option, 'search.pets', 'availabilitySearch(search);');
            }else{
                $replacements['guests_pets_field'] = ResortPro::dropdown("streamlinecore_fw_pets", ResortPro::range(0, $max_value), $this->is_var_set('pets', 'intval'), $zero_option, 'search.pets', 'availabilitySearch(search);');
            }
        }
        if (strpos($template, "%number_bedrooms_field%") !== false) {

            $label = $instance['number_bedrooms-label'];
            if(!empty($label))
                $zero_option = array("", $label);

            $bedrooms = StreamlineCore_Wrapper::get_bedrooms();

            if(!empty($label)){
              $options = array("" => $label);
            }

            if(!empty($bedrooms)){
              foreach ($bedrooms as $bedroom){
                if(strpos($bedroom->name, 'N/A') !== false){
                  $options[(int)$bedroom->value] = 'Studio';
                }else{
                  $options[(int)$bedroom->value] = (string)$bedroom->name;
                }
              }
            }
            
            if($instance['number_bedrooms-type']=='Radio'){
                $replacements['number_bedrooms_field'] = ResortPro::radio("streamlinecore_fw_bedrooms_number", $options,  $_REQUEST['beds'], null, 'search.num_bedrooms');
            }else if($instance['number_bedrooms-type']=='Dropdown'){
                $replacements['number_bedrooms_field'] = ResortPro::dropdown("streamlinecore_fw_bedrooms_number", $options,  $_REQUEST['beds'], null, 'search.num_bedrooms').'<i class="fa fa-bed"></i>';
            }else if(StreamlineCore_Settings::get_options( 'enable_bedroom_range') == 1 && $instance['number_bedrooms-type']=='Slide Range') {
                $replacements['number_bedrooms_field'] .= "<div class=\"col-md-12\">
                <div class=\"bedroom_range row\" ng-init=\"minBedroom={$instance['number_bedrooms-min']};maxBedroom={$instance['number_bedrooms-max']}\">
                <p>
                    <label for=\"streamlinecore_fw_bedrooms_number\">Bedroom Range:</label>
                    <input type=\"text\" id=\"streamlinecore_fw_bedrooms_number\" name=\"streamlinecore_fw_bedrooms_number\" readonly style=\"border:0; color:#f6931f; font-weight:bold;\" value=\"{$instance['number_bedrooms-min']} - {$instance['number_bedrooms-max']}\">
                </p>
                <div bedroomrange min-bedrooms-number=\"{$instance['number_bedrooms-min']}\" max-bedrooms-number=\"{$instance['number_bedrooms-max']}\" show-availability=\"search.min_bedrooms_number=minBedroomsNumber;search.max_bedrooms_number=maxBedroomsNumber;availabilitySearch(search);\"></div>
                <input type=\"hidden\" ng-model=\"minBedroomsNumber\"/>
                <input type=\"hidden\" ng-model=\"maxBedroomsNumber\"/>
                </div></div>";
            }else {
                $replacements['number_bedrooms_field'] = ResortPro::dropdown("streamlinecore_fw_bedrooms_number", $options,  $_REQUEST['beds'], null, 'search.num_bedrooms');
            }

        }
        if (strpos($template, "%unit_field%") !== false) {
            $replacements['unit_field'] = '<input type="text" placeholder="'.$instance['unit-label'].'" id="streamlinecore_fw_lodging_unit" name="streamlinecore_fw_lodging_unit" class="streamlinecore_fw-date form-control" value="' . $this->is_var_set('streamlinecore_fw_lodging_unit', 'htmlspecialchars' ) . '">';
            if ($label = $this->_label($instance['unit-label']))
                $replacements['unit_field'] = "<label class='resortpro-input'><span>$label</span>{$replacements['unit_field']}</label>";
        }
        if (strpos($template, "%code_field%") !== false) {
            $replacements['code_field'] = '<input type="text" placeholder="'.$instance['code-label'].'" id="streamlinecore_fw_lodging_code" name="streamlinecore_fw_lodging_code" class="streamlinecore_fw-date form-control" value="' . $this->is_var_set('streamlinecore_fw_lodging_code', 'htmlspecialchars' ) . '">';
            if ($label = $this->_label($instance['code-label']))
                $replacements['code_field'] = "<label class='resortpro-input'><span>$label</span>{$replacements['code_field']}</label>";
        }
        if (strpos($template, "%sorting_order_field%") !== false) {
            $replacements['sorting_order_field'] = "<input type='hidden' name='streamlinecore_fw_filter' value='{$instance['sorting_order-by']}' />";
        }
        if (strpos($template, "%lodging_type_field%") !== false) {
            $options = array('' => __( 'Lodging Types', 'streamline-core' ), 3 => __( 'Homes', 'streamline-core' ), "1" => __( 'Resorts', 'streamline-core' ) );

            if($instance['view_name-type']=='Radio'){
                $replacements['lodging_type_field'] = ResortPro::radio("streamlinecore_fw_lodging_type_id", $options, $this->is_var_set( 'lodging_type_id', 'intval'), null, 'search.lodging_type');
            }else{
                 $replacements['lodging_type_field'] = ResortPro::dropdown("streamlinecore_fw_lodging_type_id", $options, $this->is_var_set( 'lodging_type_id', 'intval'), null, 'search.lodging_type_id');
            }
        }
        if (strpos($template, "%bedroom_type_field%") !== false) {
            $beds = StreamlineCore_Wrapper::get_bedroom_types(array());            
            $options = array('' => __( 'Bedroom Types', 'streamline-core' ) );
            if(!empty($beds)){
              foreach ($beds as $bed){
                $options[(int)$bed->id] = (string)$bed->property_name;
              }
            }

            $replacements['bedroom_type_field'] = ResortPro::dropdown("streamlinecore_fw_bed", $options, $this->is_var_set('condo_type_id', 'intval'), null, 'search.condo_type_id');
        }
        if (strpos($template, "%area_field%") !== false) {
          $areas = StreamlineCore_Wrapper::get_location_areas();
          $options = array();

          $label = $instance['area-label'];

          if(!empty($label)){
            $options = array("" => $label);
          }

          if(!empty($areas)){
            foreach ($areas as $area){
              $options[(int)$area->id] = (string)$area->name;
            }
          }
          if($instance['area-type']=='Radio'){
                $replacements['area_field'] = ResortPro::radio("streamlinecore_fw_area", $options, $this->is_var_set('location_area_id', 'intval'), null, 'search.location_area_id');
            }else{
                $replacements['area_field'] = ResortPro::dropdown("streamlinecore_fw_area", $options, $this->is_var_set('location_area_id', 'intval'), null, 'search.location_area_id');
            }
          
        }
        if (strpos($template, "%neighborhood_field%") !== false) {
          $neighborhoods = StreamlineCore_Wrapper::get_neighborhoods();
          $options = array();

          $label = $instance['neighborhood-label'];

          if(!empty($label)){
            $options = array("" => $label);
          }

          if(!empty($neighborhoods)){
            foreach ($neighborhoods as $neighborhood){
              $options[(int)$neighborhood->id] = (string)$neighborhood->name;
            }
          }

          if($instance['neighborhood-type']=='Radio'){
                $replacements['neighborhood_field'] = ResortPro::radio("streamlinecore_fw_neighborhood_id", $options, $this->is_var_set('neighborhood_area_id', 'intval'), null, 'search.neighborhood_area_id');
            }else{
                $replacements['neighborhood_field'] = ResortPro::dropdown("streamlinecore_fw_neighborhood_id", $options, $this->is_var_set('neighborhood_area_id', 'intval'), null, 'search.neighborhood_area_id');
            }
          
        }
        if (strpos($template, "%view_name_field%") !== false) {
          $viewnames = StreamlineCore_Wrapper::get_view_names();
          $options = array();

          $label = $instance['view_name-label'];

          if(!empty($label)){
            $options = array("" => $label);
          }

          if(!empty($viewnames)){
            foreach ($viewnames as $viewname){
              $options[(string)$viewname->name] = (string)$viewname->name;
            }
          }
          if($instance['view_name-type']=='Radio'){
            $replacements['view_name_field'] = ResortPro::radio("streamlinecore_fw_view_name", $options, $this->is_var_set('view_name', 'htmlspecialchars' ), null, 'search.view_name');
          }else{
            $replacements['view_name_field'] = ResortPro::dropdown("streamlinecore_fw_view_name", $options, $this->is_var_set('view_name', 'htmlspecialchars' ), null, 'search.view_name');
          }
          
        }
        if (strpos($template, "%group_type_field%") !== false) {
          $groups = StreamlineCore_Wrapper::get_group_types();
          $options = array();

          $label = $instance['group_type-label'];

          if(!empty($label)){
            $options = array("" => $label);
          }

          if(!empty($groups)){
            foreach ($groups as $group){
              $options[(int)$group->id] = (string)$group->name;
            }
          }

          if (function_exists("resortpro_filter_group_types"))
          {
            $options = resortpro_filter_group_types($options);
          }
          if($instance['group_type-type']=='Radio'){
                $replacements['group_type_field'] = ResortPro::radio("streamlinecore_fw_grp", $options, $this->is_var_set('group_id', 'intval'), null, 'search.group_type');
            }else{
                $replacements['group_type_field'] = ResortPro::dropdown("streamlinecore_fw_grp", $options, $this->is_var_set('group_id', 'intval'), null, 'search.group_type');
            }
        }
        if (strpos($template, "%home_type_field%") !== false) {
          $types = StreamlineCore_Wrapper::get_home_types();
          $options = array("" => "Home Types");
          if(!empty($types)){
            foreach ($types as $type){
              $options[(int)$type->id] = (string)$type->name;
            }
          }
          if($instance['home_type-type']=='Radio'){
                $replacements['home_type_field'] = ResortPro::radio("streamlinecore_fw_home_type_id", $options, $this->is_var_set('home_type_id', 'intval'), null, 'search.home_type_id');
            }else{
                $replacements['home_type_field'] = ResortPro::dropdown("streamlinecore_fw_home_type_id", $options, $this->is_var_set('home_type_id', 'intval'), null, 'search.home_type_id');
            }
        }
        if (strpos($template, "%location_field%") !== false) {
          $locations = StreamlineCore_Wrapper::get_locations();
          $options = array();
          $label = $instance['location-label'];
          if(!empty($label)){
            $options = array("" => $label);
          }

          if(!empty($locations)){
            foreach ($locations as $location){
              $options[(int)$location->id] = (string)$location->name;
            }
          }
          if($instance['location-type']=='Radio'){
                $replacements['location_field'] = ResortPro::radio("streamlinecore_fw_loc", $options, $this->is_var_set('location_id', 'intval'), null, 'search.location');
            }else{
                $replacements['location_field'] = ResortPro::dropdown("streamlinecore_fw_loc", $options, $this->is_var_set('location_id', 'intval'), null, 'search.location');
            }
        }
        if (strpos($template, "%location_resort_field%") !== false) {
          $locationresorts = StreamlineCore_Wrapper::get_location_resorts();
          $options = array();
          $label = $instance['location_resort-label'];
          if(!empty($label)){
            $options = array("" => $label);
          }

          if(!empty($locationresorts)){
            foreach ($locationresorts as $locationresort){
              $options[(int)$locationresort->id] = (string)$locationresort->name;
            }
          }
          if($instance['location_resort-type']=='Radio'){
                $replacements['location_resort_field'] = ResortPro::radio("streamlinecore_fw_ra_id", $options, $this->is_var_set('resort_area_id', 'intval'), null, 'search.resort_area_id');
            }else{
                $replacements['location_resort_field'] = ResortPro::dropdown("streamlinecore_fw_ra_id", $options, $this->is_var_set('resort_area_id', 'intval'), null, 'search.resort_area_id');
            }
        }

        if (strpos($template, "%amenities_field%") !== false) {
            $amenities = StreamlineCore_Wrapper::get_amenity_filters();


            $use_client_side = (StreamlineCore_Settings::get_options( 'client_side_amenities' ) == '1') ? true : false;
            $html = '';
            if (is_array($amenities) && count($amenities)):

                $a_groups = array();
                foreach ($amenities as $amenity) {

                    if (isset($amenity['group_name']) && !in_array($amenity['group_name'], $a_groups)) {
                        $a_groups[] = $amenity['group_name'];
                    }
                }

                $html .= "<div class=\"row\">";
                foreach ($a_groups as $group) {

                    $html .= "<div class=\"col-lg-" . $instance['amenities-col_lg'] . " col-md-" . $instance['amenities-col_md'] . " col-sm-" . $instance['amenities-col_sm'] . " col-xs-" . $instance['amenities-col_xs'] . " amenity_group\" style=\"margin-bottom:24px\">
                        <label>$group</label><br/>";

                    foreach ($amenities as $amenity) {

                        if ($group == $amenity['group_name']) {

                            if(!$use_client_side){
                                $html .= '<input type="checkbox" name="amenity_' . $amenity['id'] . '" ng-model="selectedAmenities[' . $amenity['id'] . ']" ng-true-value="' . $amenity['id'] . '" ng-click="availabilitySearch(search)" /> ' . $amenity['name'] . '<br />';
                            }else{
                                if($amenity['use_with_and_logic'] == '1'){
                                    $method = 'setAmenityFilter';
                                    $model = 'amenity';
                                }else{
                                    $method = 'setAmenityFilterOr';
                                    $model = 'amenityOr';
                                }

                                $html .= '<input type="checkbox" name="amenity_' . $amenity['id'] . '" ng-model="'.$model.'[' . $amenity['id'] . ']" ng-true-value="' . $amenity['id'] . '" ng-change="'.$method.'('.$amenity['id'].',\''.$amenity['group_name'].'\')" /> ' . $amenity['name'] . '<br />';
                            }

                        }
                    }

                    $html .= "</div>";
                }

                $html .= "</div>";

            endif;

            $replacements['amenities_field'] = $html;
        }

        if (strpos($template, "%price_range_field%") !== false) {

            $html = "<div class=\"c-range-slider col-md-12\">
                <div class=\"c-range-slider__inner\" ng-init=\"minPrice={$instance['price_range-min']};maxPrice={$instance['price_range-max']}\">
                <p class=\"c-range-slider__label\">
                    <label for=\"amount\">Price range:</label>
                    <input type=\"text\" id=\"amount\" readonly style=\"border:0; color:#f6931f; font-weight:bold;\">
                </p>
                <div class=\"c-range-slider__body\">
                    <div sliderange ng-model=\"pricerange\" min-price=\"{$instance['price_range-min']}\" max-price=\"{$instance['price_range-max']}\" show-availability=\"filterByPrice(minPrice, maxPrice)\"></div>
                    <input type=\"hidden\" ng-model=\"minPrice\"/>
                    <input type=\"hidden\" ng-model=\"maxPrice\"/>
                    </div></div>
                </div>";

            $replacements['price_range_field'] = $html;
        }

        foreach ($replacements as $key => $value)
            $template = str_replace("%$key%", $value, $template);
        return $template;
    }

    private function _label($label, $default = '')
    {
      return (substr($label, 0, 1) == '!') ? substr($label, 1) : $default;
    }

    private function is_var_set( $var = '', $sanitize_callback = '' ){

      if( isset( $_REQUEST ) && isset( $_REQUEST[ $var ] ) ){
    		if( function_exists( $sanitize_callback ) )
    			return call_user_func ( $sanitize_callback, $_REQUEST[ $var ] );

    		return $_REQUEST[ $var ];
    	}
    	return '';
    }
}
