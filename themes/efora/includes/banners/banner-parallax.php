<?php
/*
 * Parallax Banner With Breadcrumb
 */
$background_image_bp = efora_get_field('background_image_bp');
if(!empty($background_image_bp)){
    ?>
    <section class="tg-parallax tg-innerbanner" data-appear-top-offset="600" data-parallax="scroll" data-image-src="<?php echo esc_url(efora_get_field('background_image_bp')); ?>">
        <div class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?php $heading_parallax = efora_get_field('heading_bparallax');
                        if(!empty($heading_parallax)){ ?>
                            <h1><?php echo esc_attr(efora_get_field('heading_bparallax')); ?></h1>
                        <?php } $small_caption_bp = efora_get_field('small_caption_bp');
                        if(!empty($small_caption_bp)){ ?>
                            <h2><?php echo esc_attr(efora_get_field('small_caption_bp')); ?></h2>
                        <?php } if(function_exists('efora_breadcrumbs')){ ?>
                            <ol class="tg-breadcrumb">
                                <?php efora_breadcrumbs(); ?>
                            </ol>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>