<?php if(!is_search()): ?>
    <div class="products__sidebar">
        <ul>
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </ul>
        <?php do_action('woocommerce_shop_loop_header'); ?>
    </div>
<?php endif;?>



