<section class="catalog">
    <div class="catalog__content-top">
        <div class="container">
            <?php
            /**
             * Hook: woocommerce_shop_loop_header.
             *
             * @since 8.6.0
             *
             * @hooked woocommerce_product_taxonomy_archive_header - 10
             */
            do_action('woocommerce_shop_loop_header');
            ?>
        </div>
    </div>
    <div class="catalog__content">
        <div class="container">
            <div class="catalog__items">
                <?php echo get_categories_product(); ?>
            </div>
        </div>
    </div>
</section>