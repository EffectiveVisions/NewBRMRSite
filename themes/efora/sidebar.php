<?php if ( ! is_active_sidebar( 'efora-page' ) ) {
    return;
} ?>
<aside id="tg-sidebar" class="tg-sidebar woocommerce">
    <?php dynamic_sidebar( 'efora-page' ); ?>
</aside>