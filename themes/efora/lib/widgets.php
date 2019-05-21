<?php // Creating Recent Products With Thumbnail Widget
class efora_recent_tours_widget2 extends WP_Widget {
    function __construct() {
        parent::__construct(
// Base ID of your widget
            'efora_recent_tours_widget',
// Widget name will appear in UI
            esc_html__('Recent Tours With Thumbnails', 'efora'),
// Widget description
            array( 'description' => esc_html__( 'Use this widget for recent tours with thumbnails.', 'efora' ), )
        );
    }
// Creating widget front-end
// This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $number_posts = apply_filters( 'number_posts', $instance['number_posts'] );
// before and after widget arguments are defined by themes
        echo ''.$args['before_widget'];
        if ( ! empty( $title ) )
            echo ''.$args['before_title'] . $title . $args['after_title'];
// This is where you run the code and display the output
        if(!empty ($number_posts))
            $argo = array(
                'post_type' => 'product',
                'posts_per_page'    => $number_posts,
                'order' => 'DESC',
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_type',
                        'field'    => 'slug',
                        'terms'    => 'tour',
                    ),
                ),
            );
        $query = new WP_Query( $argo );
        $rp_count = 50; ?>
        <div class="tg-widgetcontent">
            <ul>
                <?php while($query->have_posts()): $query->the_post();
                    global $product;
                    $price_html = $product->get_price_html(); ?>
                    <li>
                        <figure>
                            <a href="<?php the_permalink(); ?>" class="adj">
                                <?php echo woocommerce_get_product_thumbnail('efora-tour-63-63'); ?>
                            </a>
                        </figure>
                        <div class="tg-newcontent">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <div class="tg-reviewstararea">
                                <span class="woo-stars">
                                    <?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
                                </span>
                                <em>(<?php echo esc_attr($product->get_review_count()).' '.esc_html__('Review','efora'); ?>)</em>
                            </div>
                            <div class="tg-pricearea">
                                <span><?php esc_attr_e('from','efora'); ?></span>
                                <h4><?php echo wp_kses($price_html,array('del' => array (),'em' => array (),'ins' => array ())); ?></h4>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <?php wp_reset_postdata();
        echo ''.$args['after_widget'];
    }
// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = "Latest Tours";
        }
        if ( isset( $instance[ 'number_posts' ] ) ) {
            $number_posts = $instance[ 'number_posts' ];
        } else {
            $number_posts = 5;
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo ''.$this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','efora' ); ?></label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id( 'title' ); ?>" name="<?php echo ''.$this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id( 'number_posts' ); ?>"><?php esc_html_e( 'Number Of Posts:','efora' ); ?></label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id( 'number_posts' ); ?>" name="<?php echo ''.$this->get_field_name( 'number_posts' ); ?>" type="number" value="<?php echo esc_attr( $number_posts ); ?>" />
        </p>
        <?php
    }
// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['number_posts'] = ( ! empty( $new_instance['number_posts'] ) ) ? strip_tags( $new_instance['number_posts'] ) : '';
        return $instance;
    }
} // Class efora_recent_tours_widget ends here
// Register and load the widget
function rp_load_widget2() {
    register_widget( 'efora_recent_tours_widget2' );
}
add_action( 'widgets_init', 'rp_load_widget2' );
// Creating Popular Tours Widget
class efora_popular_tours_widget2 extends WP_Widget {
    function __construct() {
        parent::__construct(
// Base ID of your widget
            'efora_popular_tours_widget',
// Widget name will appear in UI
            esc_html__('Popular Tours Carousel', 'efora'),
// Widget description
            array( 'description' => esc_html__( 'Use this widget for popular tours carousel.', 'efora' ), )
        );
    }
// Creating widget front-end
// This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $number_posts = apply_filters( 'number_posts', $instance['number_posts'] );
// before and after widget arguments are defined by themes
        echo ''.$args['before_widget'];
        if ( ! empty( $title ) )
            echo ''.$args['before_title'] . $title . $args['after_title'];
// This is where you run the code and display the output
        if(!empty ($number_posts))
            $argo = array(
                'post_type' => 'product',
                'posts_per_page'    => $number_posts,
                'meta_key'       => '_wc_average_rating',
                'orderby'        => 'meta_value_num',
                'order' => 'DESC',
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_type',
                        'field'    => 'slug',
                        'terms'    => 'tour',
                    ),
                ),
            );
        $query = new WP_Query( $argo );
        $rp_count = 50; ?>
        <div class="tg-widgetcontent">
            <div id="tg-widgetpopulartourslider" class="tg-widgetpopulartourslider owl-carousel">
                <?php while($query->have_posts()): $query->the_post();
                    global $product;
                    $price_html = $product->get_price_html();
                    $terms_destinations = get_the_terms(get_the_ID(), 'tour_destination');
                    $destinations = '';
                    if(is_array($terms_destinations)){
                        $d_count = 1;
                        foreach ($terms_destinations as $ter){
                            if($d_count == 1){
                                $destinations .= esc_attr($ter->name);
                            } else {
                                $destinations .= ', '.esc_attr($ter->name);
                            }
                            $d_count++;
                        }
                    } ?>
                    <div class="tg-trendingtrip item">
                        <figure>
                            <?php echo woocommerce_get_product_thumbnail(); ?>
                            <figcaption>
                                <span class="woo-stars">
                                    <?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
                                </span>
                                <?php $tour_duration = efora_get_field('tour_duration');
                                if(!empty($tour_duration)){ ?>
                                    <span class="tg-tourduration"><?php echo esc_attr(efora_get_field('tour_duration')); ?></span>
                                <?php } if(!empty($destinations)){ ?>
                                    <span class="tg-locationname"><?php echo esc_attr($destinations); ?></span>
                                <?php } ?>
                                <div class="tg-pricearea">
                                    <span><?php esc_attr_e('from','efora'); ?></span>
                                    <h4><?php echo wp_kses($price_html,array('del' => array (),'em' => array (),'ins' => array ())); ?></h4>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php wp_reset_postdata();
        echo ''.$args['after_widget'];
    }
// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = "Popular Tours";
        }
        if ( isset( $instance[ 'number_posts' ] ) ) {
            $number_posts = $instance[ 'number_posts' ];
        } else {
            $number_posts = 5;
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo ''.$this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','efora' ); ?></label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id( 'title' ); ?>" name="<?php echo ''.$this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id( 'number_posts' ); ?>"><?php esc_html_e( 'Number Of Posts:','efora' ); ?></label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id( 'number_posts' ); ?>" name="<?php echo ''.$this->get_field_name( 'number_posts' ); ?>" type="number" value="<?php echo esc_attr( $number_posts ); ?>" />
        </p>
        <?php
    }
// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['number_posts'] = ( ! empty( $new_instance['number_posts'] ) ) ? strip_tags( $new_instance['number_posts'] ) : '';
        return $instance;
    }
} // Class efora_popular_tours_widget ends here
// Register and load the widget
function rp_load_widget3() {
    register_widget( 'efora_popular_tours_widget2' );
}
add_action( 'widgets_init', 'rp_load_widget3' );
?>