<?php if(function_exists('is_shop') && is_shop()){
    $pge_id = get_option( 'woocommerce_shop_page_id' );
} elseif(is_category() || (function_exists('is_product_category') && is_product_category()) ||
    (function_exists('is_product_tag') && is_product_tag()) || is_tax('tour_category') ||
    is_tax('tour_destination')){
    $pge_id = get_queried_object();
} else {
    $pge_id = get_the_ID();
}
if(have_rows('add_slide_stwo',$pge_id)){ ?>
    <!--************************************
                    Home Slider Start
            *************************************-->
    <div id="tg-homebannerslider" class="tg-homebannerslider tg-haslayout">
        <div id="tg-homeslider" class="tg-homeslider tg-homeslidervtwo owl-carousel tg-haslayout">
            <?php while(have_rows('add_slide_stwo',$pge_id)) : the_row();
                $heading = get_sub_field('heading');
                $small_caption = get_sub_field('small_caption');
                $button_text = get_sub_field('button_text');
                $button_link = get_sub_field('button_link');
                $slide_image = get_sub_field('slide_image');
                ?>
                <figure class="item" data-vide-bg="poster: <?php echo esc_url($slide_image); ?>" data-vide-options="position: 0% 50%">
                    <figcaption>
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <div class="tg-slidercontent">
                                        <?php if(!empty($heading)){ ?>
                                            <h1><?php echo esc_attr($heading); ?></h1>
                                        <?php } if(!empty($small_caption)){ ?>
                                            <h2><?php echo esc_attr($small_caption); ?></h2>
                                        <?php } if(!empty($button_text)){ ?>
                                            <a class="tg-btn" href="<?php echo esc_url($button_link); ?>"><span><?php echo esc_attr($button_text); ?></span></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </figcaption>
                </figure>
            <?php endwhile; ?>
        </div>
        <?php if(efora_get_field('hide_listing_form') != 'yes'){ ?>
            <div class="tg-findtour">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php $listing_tours_page_url = efora_get_field('listing_tours_page_url');
                            if(!empty($listing_tours_page_url)){ ?>
                                <form method="get" class="tg-formtheme tg-formtrip" action="<?php echo esc_url(efora_get_field('listing_tours_page_url')); ?>">
                                    <fieldset>
                                        <div class="form-group">
                                            <div class="tg-select">
                                                <select name="tour-destination" class="selectpicker" data-live-search="true" data-width="100%">
                                                    <?php $terms = get_terms( 'tour_destination', array(
                                                        'hide_empty' => false,
                                                        'parent' => 0
                                                    ) );
                                                    if (!empty($terms) && !is_wp_error($terms)){ ?>
                                                        <option data-tokens="Destinations"><?php esc_attr_e('Destinations','efora'); ?></option>
                                                        <?php foreach($terms as $term){ ?>
                                                            <option data-tokens="<?php echo esc_attr($term->name); ?>"><?php echo esc_attr($term->name); ?></option>
                                                        <?php }
                                                    } else{ ?>
                                                        <option data-tokens="No Destinations"><?php esc_attr_e('No Destinations Added.','efora'); ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="tg-select">
                                                <select name="tour-category" class="selectpicker" data-live-search="true" data-width="100%">
                                                    <?php $terms = get_terms( 'tour_category', array(
                                                        'hide_empty' => false,
                                                        'parent' => 0
                                                    ) );
                                                    if (!empty($terms) && !is_wp_error($terms)){ ?>
                                                        <option data-tokens="Adventure Type"><?php esc_attr_e('Adventure Type','efora'); ?></option>
                                                        <?php foreach($terms as $term){ ?>
                                                            <option data-tokens="<?php echo esc_attr($term->name); ?>"><?php echo esc_attr($term->name); ?></option>
                                                        <?php }
                                                    } else{ ?>
                                                        <option data-tokens="No Category"><?php esc_attr_e('No Tour Category Added.','efora'); ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="tg-select">
                                                <select name="tour-month" class="selectpicker" data-live-search="true" data-width="100%">
                                                    <option data-tokens="<?php esc_attr_e('Travel Month','efora'); ?>"><?php esc_attr_e('Travel Month','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('January','efora'); ?>"><?php esc_attr_e('January','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('February','efora'); ?>"><?php esc_attr_e('February','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('March','efora'); ?>"><?php esc_attr_e('March','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('April','efora'); ?>"><?php esc_attr_e('April','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('May','efora'); ?>"><?php esc_attr_e('May','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('June','efora'); ?>"><?php esc_attr_e('June','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('July','efora'); ?>"><?php esc_attr_e('July','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('August','efora'); ?>"><?php esc_attr_e('August','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('September','efora'); ?>"><?php esc_attr_e('September','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('October','efora'); ?>"><?php esc_attr_e('October','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('November','efora'); ?>"><?php esc_attr_e('November','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('December','efora'); ?>"><?php esc_attr_e('December','efora'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="tg-select">
                                                <select name="tour-duration" class="selectpicker" data-live-search="true" data-width="100%">
                                                    <option data-tokens="<?php esc_attr_e('Tour Duration','efora'); ?>"><?php esc_attr_e('Tour Duration','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('1 Day','efora'); ?>"><?php esc_attr_e('1 Day','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('2 Days','efora'); ?>"><?php esc_attr_e('2 Days','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('3 Days','efora'); ?>"><?php esc_attr_e('3 Days','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('4 Days','efora'); ?>"><?php esc_attr_e('4 Days','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('5 Days','efora'); ?>"><?php esc_attr_e('5 Days','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('6 Days','efora'); ?>"><?php esc_attr_e('6 Days','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('1 Week','efora'); ?>"><?php esc_attr_e('1 Week','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('2 Weeks','efora'); ?>"><?php esc_attr_e('2 Weeks','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('3 Weeks','efora'); ?>"><?php esc_attr_e('3 Weeks','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('1 Month','efora'); ?>"><?php esc_attr_e('1 Month','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('1.5 Month','efora'); ?>"><?php esc_attr_e('1.5 Month','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('2 Months','efora'); ?>"><?php esc_attr_e('2 Months','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('2.5 Months','efora'); ?>"><?php esc_attr_e('2.5 Months','efora'); ?></option>
                                                    <option data-tokens="<?php esc_attr_e('3 Months','efora'); ?>"><?php esc_attr_e('3 Months','efora'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="search-tour" value="yes" />
                                            <button class="tg-btn" type="submit"><span><?php esc_attr_e('find tours','efora'); ?></span></button>
                                        </div>
                                    </fieldset>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!--************************************
            Home Slider End
    *************************************-->
<?php } ?>