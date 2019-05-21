<?php
/*
  * Category Single Page Template
  */
get_header();
while(have_posts()) : the_post();
    if(efora_option('hide_cHeader') != 1){ ?>
        <!--************************************
                    Inner Banner Start
            *************************************-->
        <?php $parallax_img = '';
        $singleParallax = efora_option('singleParallax');
        if(!empty($singleParallax)){
            $parallax_img = efora_option('singleParallax');
        } else {
            $parallax_img = efora_feature_image_url(get_the_ID());
        } if(!empty($parallax_img)){ ?>
        <section class="tg-parallax tg-innerbanner tg-innerbannervtwo" data-appear-top-offset="600" data-parallax="scroll" data-image-src="<?php echo esc_url($parallax_img); ?>">
            <div class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php if(efora_option('hide_meta_data') != 1){ ?>
                                <ul class="tg-postmaradata">
                                    <li>
                                        <div class="tg-author">
                                            <a href="javascript:void(0);">
                                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 35 ); ?>
                                            </a>
                                            <span><?php the_author(); ?></span>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="icon-clock"></i>
                                        <span><?php echo get_the_date(); ?></span>
                                    </li>
                                    <li>
                                        <i class=" fa fa-commenting-o"></i>
                                        <span><?php comments_number( '0 ', '1 ', '% ' ); esc_attr_e('Comments','efora'); ?> </span>
                                    </li>
                                    <?php if(efora_option('hide_socialshare') != 1){ ?>
                                    <li>
                                        <ul class="tg-likeshare adj">
                                            <li class="tg-shareicon">
                                                <a href="javascript:void(0);">
                                                    <i class="icon-share2"></i>
                                                    <span><?php esc_attr_e('Share','efora'); ?></span>
                                                </a>
                                                <ul class="tg-share">
                                                    <li><a href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&tw_p=tweetbutton&url=<?php the_permalink(); ?>&via=<?php bloginfo( 'name' ); ?>"><i class="icon-twitter"></i></a></li>
                                                    <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"><i class="icon-facebook"></i></a></li>
                                                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>&amp;title=<?php the_title(); ?>&amp;source=<?php bloginfo( 'name' ); ?>"><i class="icon-linkedin"></i></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                            <h1><?php the_title(); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                Inner Banner End
        *************************************-->
    <?php } else{ ?>
            <div class="space50"></div>
        <?php }
    } ?>
    <!--************************************
            Main Start
    *************************************-->
    <main id="tg-main" class="tg-main tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-push-1 col-lg-10 col-lg-push-1">
                    <div id="tg-content" class="tg-content">
                        <div class="tg-blogdetail">
                            <div class="tg-detailbox">
                                <?php if(efora_option('hide_secondary_title') != 1){ ?>
                                    <div class="tg-sectionhead">
                                        <div class="tg-sectiontitle zero-zig">
                                            <h2><?php the_title(); ?></h2>
                                        </div>
                                    </div>
                                <?php }
                                the_content(); ?>
                                <div class="clear"></div>
                                <?php posts_nav_link(); ?>
                                <?php wp_link_pages( array( 'before' => '<div class="page-link">' . esc_html__( 'Pages:', 'efora' ), 'after' => '</div>' ) ); ?>
                            </div>
                            <?php if(efora_option('hide_next_prev') != 1){ ?>
                                <div class="tg-nextprevposts">
                                    <div class="tg-prevpost">
                                        <?php $nepo = get_next_post();
                                        if(!empty($nepo)){
                                            $next_post_url = get_permalink($nepo->ID); ?>
                                            <a href="<?php echo esc_url($next_post_url); ?>">
                                                <i class="fa fa-angle-left"></i><span><?php esc_attr_e('Previous Reading','efora'); ?></span>
                                                <h2><?php echo get_the_title($nepo->ID); ?></h2>
                                            </a>
                                        <?php } ?>
                                    </div>
                                    <div class="tg-nextpost">
                                        <?php $prpo = get_previous_post();
                                        if(!empty($prpo)){
                                            $prev_post_url = get_permalink($prpo->ID); ?>
                                            <a href="<?php echo esc_url($prev_post_url); ?>">
                                                <span><?php esc_attr_e('Next Reading','efora'); ?></span><i class="fa fa-angle-right"></i>
                                                <h2><?php echo get_the_title($prpo->ID); ?></h2>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="none-tags"><?php the_tags(); ?></div>
                            <!-- Comments -->
                            <?php comments_template(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--************************************
            Main End
    *************************************-->
<?php endwhile;
get_footer(); ?>