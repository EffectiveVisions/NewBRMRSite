<?php
get_header();
while(have_posts()) : the_post();
if(function_exists('is_cart') && is_cart()){ ?>
    <!--************************************
				Main Start
		*************************************-->
    <main id="tg-main" class="tg-main tg-sectionspace tg-haslayout tg-bglight">
        <div class="container">
            <div class="row">
                <div id="tg-twocolumns" class="tg-twocolumns">
                    <div class="tg-formtheme tg-formcart">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--************************************
            Main End
    *************************************-->
<?php } elseif(function_exists('is_account_page') && is_account_page()){ ?>
    <!--************************************
                    Main Start
            *************************************-->
    <main id="tg-main" class="tg-main tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div id="tg-twocolumns" class="tg-twocolumns">
                    <div class="tg-formtheme tg-formdashboard">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--************************************
            Main End
    *************************************-->
<?php } elseif(function_exists('is_checkout') && is_checkout()){ ?>
    <!--************************************
                    Main Start
            *************************************-->
    <main id="tg-main" class="tg-main tg-haslayout">
        <div class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="tg-content" class="tg-content">
                            <div class="tg-billingdetail">
                                <div class="tg-formtheme tg-formbillingdetail">
                                    <?php the_content(); ?>
                                </div>
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
<?php } else{
    if(efora_get_field('page_layout') == 'fullwidth'){ ?>
    <main id="tg-main" class="tg-main tg-haslayout">
        <?php the_content(); ?>
    </main>
    <?php } else{ ?>
    <main id="tg-main" class="tg-main tg-haslayout">
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <?php if(efora_get_field('hide_page_title') != 'yes'){ ?>
                <div class="tg-sectionhead">
                    <div class="tg-sectiontitle">
                        <h2><?php the_title(); ?></h2>
                    </div>
                </div>
                <?php } the_content(); ?>
                <!-- Comments -->
                <?php comments_template(); ?>
            </div>
        </section>
    </main>
<?php }
} endwhile;
get_footer(); ?>
