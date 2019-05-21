<?php
/*
  * Category Page Template
  */
get_header(); ?>
    <!--************************************
            Main Start
    *************************************-->
    <main id="tg-main" class="tg-main tg-sectionspace tg-haslayout">
        <div class="container-fluid">
            <div class="row">
                <div class="tg-posts tg-blogposts">
                    <?php while(have_posts()) : the_post(); ?>
                    <article <?php post_class('tg-post tg-verticaltop'); ?>>
                        <?php if(has_post_thumbnail()){ ?>
                            <figure>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            </figure>
                        <?php } ?>
                        <div class="tg-postcontent">
                            <div class="tg-postcontenthead">
                                <div class="tg-author">
                                    <a href="javascript:void(0);">
                                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 35 ); ?>
                                    </a>
                                    <span><?php the_author(); ?></span>
                                </div>
                                <time class="tg-date" datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time>
                            </div>
                            <div class="tg-posttitle">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                            <div class="tg-description">
                                <p><?php echo efora_trim_words(25); ?></p>
                            </div>
                            <a class="tg-btnreadmore" href="<?php the_permalink(); ?>"><?php esc_attr_e('Read More','efora'); ?></a>
                        </div>
                    </article>
                    <?php endwhile; ?>
                    <!-- Pagination -->
                    <?php efora_pagination($pages = '', $range = 2); ?>
                </div>
            </div>
        </div>
    </main>
    <!--************************************
            Main End
    *************************************-->
<?php get_footer(); ?>