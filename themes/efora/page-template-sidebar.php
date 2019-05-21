<?php
/*
 * Template Name: Sidebar Page
 */
get_header();
while(have_posts()) : the_post(); ?>
    <main id="tg-main" class="tg-main tg-sectionspace tg-haslayout tg-bglight">
        <div class="container">
            <div class="row">
                <div id="tg-twocolumns" class="tg-twocolumns">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 pull-left">
                        <div id="tg-content" class="tg-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php endwhile;
get_footer(); ?>
