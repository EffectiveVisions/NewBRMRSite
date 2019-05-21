<?php get_header();
global $woocommerce , $post , $product;
$thepostid = $post->ID;
if((function_exists('is_shop') && is_shop()) || (function_exists('is_product_category') && is_product_category()) || (function_exists('is_product_tag') && is_product_tag())){ ?>
    <main id="tg-main" class="tg-main tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="tg-content" class="tg-content">
                        <div class="tg-sectiontitle">
                            <h2><?php woocommerce_page_title(); ?></h2>
                        </div>
                        <div class="tg-listing tg-shopgrid">
                            <div class="row">
                                <?php woocommerce_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php } elseif(function_exists('is_product') && is_product()) {
    $product_object = $thepostid ? wc_get_product( $thepostid ) : new WC_Product;
    if($product_object->product_type == 'tour'){ ?>
        <!--************************************
				Inner Banner Start
		*************************************-->
        <div class="tg-parallax tg-innerbanner" data-appear-top-offset="600" data-parallax="scroll" data-image-src="<?php echo esc_url(efora_get_field('banner_image_tour')); ?>">
            <div class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--************************************
                Inner Banner End
        *************************************-->
        <!--************************************
                Main Start
        *************************************-->
        <main id="tg-main" class="tg-main tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="tg-content" class="tg-content">
                            <?php woocommerce_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $latest_art_cat = efora_option('latest_art_cat');
            if(!empty($latest_art_cat)){ ?>
            <!--************************************
                    Article Start
            *************************************-->
            <div class="tg-sectionspace tg-haslayout tg-bglight">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="tg-sectionhead tg-sectionheadvtwo">
                                <?php $latest_art_head = efora_option('latest_art_head');
                                if(!empty($latest_art_head)){ ?>
                                    <div class="tg-sectiontitle">
                                        <h2><?php echo esc_attr(efora_option('latest_art_head')); ?></h2>
                                    </div>
                                <?php } $latest_art_shead = efora_option('latest_art_shead');
                                if(!empty($latest_art_shead)){ ?>
                                    <div class="tg-description">
                                        <p><?php echo esc_attr(efora_option('latest_art_shead')); ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php $cat_id = efora_option('latest_art_cat');
                        echo do_shortcode('[blog_posts number="4" order="DESC" cat_id="'.$cat_id.'"]'); ?>
                    </div>
                </div>
            </div>
            <!--************************************
                    Article End
            *************************************-->
            <?php } ?>
        </main>
        <!--************************************
                Main End
        *************************************-->
    <?php } else{ ?>
    <!--************************************
                Main Start
        *************************************-->
    <main id="tg-main" class="tg-main tg-haslayout">
        <!--************************************
                Product Detail Start
        *************************************-->
        <div class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <?php woocommerce_content(); ?>
                </div>
            </div>
        </div>
        <!--************************************
                Product Detail End
        *************************************-->
    </main>
    <!--************************************
            Main End
    *************************************-->
<?php }
} elseif(is_tax('tour_category')){ ?>
    <!--************************************
				Main Start
		*************************************-->
    <main id="tg-main" class="tg-main  tg-haslayout tg-bglight">
        <div id="tg-content" class="tg-content">
            <div class="tg-listing tg-tourcatagory tg-sectionspace">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 adj-term">
                            <div class="tg-head">
                                <div class="tg-sectiontitle">
                                    <h2><?php woocommerce_page_title(); ?></h2>
                                    <div class="tg-description">
                                        <?php echo term_description(); ?>
                                    </div>
                                </div>
									<?php // Destinations Dropdown
                                    if(function_exists('efora_destination_list')){
                                        efora_destination_list();
                                    } ?>
                            </div>
                            <div class="clearfix clear"></div>
                            <?php woocommerce_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $latest_art_cat = efora_option('latest_art_cat');
            if(!empty($latest_art_cat)){ ?>
            <!--************************************
                    Article Start
            *************************************-->
            <section class="tg-sectionspace tg-haslayout tg-bgwhite">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="tg-sectionhead tg-sectionheadvtwo">
                                <?php $latest_art_head = efora_option('latest_art_head');
                                if(!empty($latest_art_head)){ ?>
                                    <div class="tg-sectiontitle">
                                        <h2><?php echo esc_attr(efora_option('latest_art_head')); ?></h2>
                                    </div>
                                <?php } $latest_art_shead = efora_option('latest_art_shead');
                                if(!empty($latest_art_shead)){ ?>
                                <div class="tg-description">
                                    <p><?php echo esc_attr(efora_option('latest_art_shead')); ?></p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php $cat_id = efora_option('latest_art_cat');
                        echo do_shortcode('[blog_posts number="4" order="DESC" cat_id="'.$cat_id.'"]'); ?>
                    </div>
                </div>
            </section>
            <!--************************************
                    Article End
            *************************************-->
            <?php } ?>
        </div>
    </main>
    <!--************************************
            Main End
    *************************************-->
<?php } elseif(is_tax('tour_destination')){
    $term_id = get_queried_object()->term_id;
    $term_children = get_term_children( $term_id, 'tour_destination' );
    if(is_array($term_children) && count($term_children) > 0){ ?>
        <!--************************************
                    Main Start
            *************************************-->
        <main id="tg-main" class="tg-main tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="tg-content" class="tg-content">
                            <div class="tg-topdestinations">
                                <div class="row">
                                    <?php $y = 1;
                                    $inner_terms = get_terms( array(
                                        'taxonomy' => 'tour_destination',
                                        'hide_empty' => false,
                                        'include' => $term_children
                                    ) );
                                    foreach($inner_terms as $term) {
                                        $term_link = get_term_link( $term );
                                        $destination_image = get_field('destination_image', 'tour_destination_'.$term->term_id);
                                        $small_info_destination = get_field('small_info_destination', 'tour_destination_'.$term->term_id); ?>
                                        <div class="col-xs-6 col-sm-6 col-md-4">
                                            <div class="tg-topdestination">
                                                <figure>
                                                    <a href="<?php echo esc_url($term_link); ?>" class="tg-btnviewall"><?php esc_attr_e('View All Tours','efora'); ?></a>
                                                    <a href="<?php echo esc_url($term_link); ?>">
                                                        <?php if(!empty($destination_image)){ ?>
                                                            <img src="<?php echo esc_url($destination_image); ?>" alt="">
                                                        <?php } else{ ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.png" alt="">
                                                        <?php } ?>
                                                    </a>
                                                    <figcaption>
                                                        <h2><a href="<?php echo esc_url($term_link); ?>"><?php echo esc_attr($term->name); ?></a></h2>
                                                        <span class="tg-totaltours"><?php echo esc_attr($term->count).' '.esc_html__('Tours','efora'); ?></span>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                        <?php if($y % 3 == 0){
                                            echo '<div class="hiddenLess992 clearfix"></div>';
                                        } elseif($y % 2 == 0){
                                            echo '<div class="hiddenLess568 clearfix"></div>';
                                        } $y++;
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!--************************************
                Main End
        *************************************-->
<?php } else{ ?>
        <!--************************************
				Main Start
		*************************************-->
        <main id="tg-main" class="tg-main tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="tg-content" class="tg-content">
                            <div class="tg-listing tg-listingvone">
                                <div class="tg-sectiontitle">
                                    <h2>
                                        <?php
                                        woocommerce_page_title();
                                        esc_attr_e(' Tours','efora');
                                        ?>
                                    </h2>
                                </div>
                                <div class="clearfix"></div>
                                <div class="row">
                                    <?php woocommerce_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!--************************************
                Main End
        *************************************-->
    <?php }
} get_footer(); ?>