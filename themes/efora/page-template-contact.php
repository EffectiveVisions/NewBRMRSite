<?php
/*
 * Template Name: Contact Page
 */
get_header();
while(have_posts()) : the_post();
    ?>
    <!--************************************
            Main Start
    *************************************-->
    <main id="tg-main" class="tg-main tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="tg-content" class="tg-content">
                        <ul class="tg-contactinfo">
                            <?php $get_in_touch_str = efora_get_field('get_in_touch_str');
                            if(!empty($get_in_touch_str)){ ?>
                                <li>
                                    <span class="tg-contactinfoicon"><i class="fa fa-commenting-o"></i></span>
                                    <h2><?php echo esc_attr(efora_get_field('get_in_touch_str')); ?></h2>
                                    <?php $telehpone_cstr = efora_get_field('telehpone_cstr');
                                    if(!empty($telehpone_cstr)){ ?>
                                        <span><?php echo esc_attr(efora_get_field('telehpone_cstr')); ?></span>
                                    <?php } $mobile_cstr = efora_get_field('mobile_cstr');
                                    if(!empty($mobile_cstr)){ ?>
                                        <span><?php echo esc_attr(efora_get_field('mobile_cstr')); ?></span>
                                    <?php } $email_cstr = efora_get_field('email_cstr');
                                    if(!empty($email_cstr)){ ?>
                                        <strong><a href="mailto:<?php echo esc_attr(efora_get_field('email_cstr')); ?>"><?php echo esc_attr(efora_get_field('email_cstr')); ?></a></strong>
                                    <?php } ?>
                                </li>
                            <?php } $visit_our_location_str = efora_get_field('visit_our_location_str');
                            if(!empty($visit_our_location_str)){ ?>
                                <li>
                                    <span class="tg-contactinfoicon"><i class="icon-map-marker"></i></span>
                                    <h2><?php echo esc_attr(efora_get_field('visit_our_location_str')); ?></h2>
                                    <?php $address_cstr = efora_get_field('address_cstr');
                                    if(!empty($address_cstr)){ ?>
                                        <address><?php echo esc_attr(efora_get_field('address_cstr')); ?></address>
                                    <?php } $get_directions_cstr = efora_get_field('get_directions_cstr');
                                    if(!empty($get_directions_cstr)){ ?>
                                        <strong>
                                            <a href="https://www.google.com/maps"><?php echo esc_attr(efora_get_field('get_directions_cstr')); ?></a>
                                        </strong>
                                    <?php } ?>
                                </li>
                            <?php } $looking_for_a_career_cstr = efora_get_field('looking_for_a_career_cstr');
                            if(!empty($looking_for_a_career_cstr)){ ?>
                                <li>
                                    <span class="tg-contactinfoicon"><i class="icon-briefcase"></i></span>
                                    <h2><?php echo esc_attr(efora_get_field('looking_for_a_career_cstr')); ?></h2>
                                    <?php $text_desctr = efora_get_field('text_desctr');
                                    if(!empty($text_desctr)){ ?>
                                        <div class="tg-description">
                                            <p>
                                                <?php echo esc_attr(efora_get_field('text_desctr')); ?>
                                            </p>
                                        </div>
                                    <?php } $email_c_cstr = efora_get_field('email_c_cstr');
                                    if(!empty($email_c_cstr)){ ?>
                                        <strong><a href="mailto:<?php echo esc_attr(efora_get_field('email_c_cstr')); ?>"><?php echo esc_attr(efora_get_field('email_c_cstr')); ?></a></strong>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Visual Editor Content -->
        <?php the_content(); ?>
    </main>
    <!--************************************
            Main End
    *************************************-->
<?php endwhile;
get_footer(); ?>