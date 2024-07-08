<section class="catalog <?php echo is_search() ? 'catalog-search' : '' ?>">
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



    <?php if (is_front_page()): ?>
        <div class="catalog__content">
            <div class="container">
                <div class="catalog__items">
                  <?php echo get_categories_product(); ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php
        if (woocommerce_product_loop()) {
            echo woocommerce_product_subcategories() ? '' : '<div class="products">';
            echo woocommerce_product_subcategories() ? '' : '<div class="products__content">';
            echo woocommerce_product_subcategories() ? '' : '<div class="container">';
            echo woocommerce_product_subcategories() ? '' : '<div class="products__inner">';
            echo woocommerce_product_subcategories() ? '' : get_sidebar();
            echo woocommerce_product_subcategories() ? '' : '<div class="products__column">';
            echo woocommerce_product_subcategories() ? '' : '
             <div class="products__box-kind"> 
                Вид: <div class="products__kind products__kind--plitka active" data-kind="tile">
       
                       </div>
                       <div class="products__kind products__kind--column" data-kind="column">
       
                       </div>
             </div>
             ';

            echo woocommerce_product_subcategories() ? '' : '<div class="products__items products__items--tile">';
            /**
             * Hook: woocommerce_before_shop_loop.
             *
             * @hooked woocommerce_output_all_notices - 10
             * @hooked woocommerce_result_count - 20
             * @hooked woocommerce_catalog_ordering - 30
             */
            do_action('woocommerce_before_shop_loop');

            woocommerce_product_loop_start();

            if (wc_get_loop_prop('total')) {
                while (have_posts()) {
                    the_post();

                    /**
                     * Hook: woocommerce_shop_loop.
                     */
                    do_action('woocommerce_shop_loop');

                    wc_get_template_part('content', 'product');
                }
            }

            woocommerce_product_loop_end();

            echo woocommerce_product_subcategories() ? '' : '</div>';
            /**
             * Hook: woocommerce_after_shop_loop.
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action('woocommerce_after_shop_loop');
            echo woocommerce_product_subcategories() ? '' : '</div>';
            echo woocommerce_product_subcategories() ? '' : '</div>';
            echo woocommerce_product_subcategories() ? '' : '</div>';
            echo woocommerce_product_subcategories() ? '' : '</div>';
            echo woocommerce_product_subcategories() ? '' : '</div>';

        } else {
            /**
             * Hook: woocommerce_no_products_found.
             *
             * @hooked wc_no_products_found - 10
             */
            do_action('woocommerce_no_products_found');
            echo woocommerce_product_subcategories() ? '' : '</div>';
            echo woocommerce_product_subcategories() ? '' : '</div>';
            echo woocommerce_product_subcategories() ? '' : '</div>';
            echo woocommerce_product_subcategories() ? '' : '</div>';
            echo woocommerce_product_subcategories() ? '' : '</div>';
        }

        ?>
    <?php endif; ?>
</section>