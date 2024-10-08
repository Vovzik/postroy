<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 6.1.0
 */

defined('ABSPATH') || exit;

global $product;

$attribute_keys = array_keys($attributes);
$variations_json = wp_json_encode($available_variations);
$variations_attr = function_exists('wc_esc_json') ? wc_esc_json($variations_json) : _wp_specialchars($variations_json, ENT_QUOTES, 'UTF-8', true);

do_action('woocommerce_before_add_to_cart_form'); ?>
    <form class="variations_form cart"
          action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
          method="post" enctype='multipart/form-data' data-product_id="<?php echo absint($product->get_id()); ?>"
          data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
        <?php do_action('woocommerce_before_variations_form'); ?>
        <?php if (empty($available_variations) && false !== $available_variations) : ?>
            <p class="stock out-of-stock"><?php echo esc_html(apply_filters('woocommerce_out_of_stock_message', __('This product is currently out of stock and unavailable.', 'woocommerce'))); ?></p>
        <?php else : ?>
            <div class="product-single__variations-inner">
                <div class="product-single__variations-column">
                    <div class="product-single__variations-sum">
                        Количество
                    </div>
                    <?php
                    do_action( 'woocommerce_before_add_to_cart_quantity' );

                    woocommerce_quantity_input(
                        array(
                            'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                            'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                            'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                        )
                    );

                    do_action( 'woocommerce_after_add_to_cart_quantity' );
                    ?>
                </div>
                <div class="product-single__variations variations">
                    <?php foreach ($attributes as $attribute_name => $options) : ?>
                    <div class="product-single__variations-ed">
                        <?php echo wc_attribute_label($attribute_name); // WPCS: XSS ok. ?>
                    </div>
                        <div class="select">
                            <div class="select__trigger">
                                <span>Выбрать опцию</span>
                            </div>
                             <?php
                             wc_dropdown_variation_attribute_options(
                            array(
                                'options' => $options,
                                'attribute' => $attribute_name,
                                'product' => $product,
                            )
                        );
                             echo end($attribute_keys) === $attribute_name ? wp_kses_post(apply_filters('woocommerce_reset_variations_link', '<a class="product-single__reset-variations reset_variations" href="#">' . esc_html__('Clear', 'woocommerce') . '</a>')) : '';
                             ?>
                          </div>
                    <?php endforeach; ?>
                    <?php do_action( 'woocommerce_after_variations_table' ); ?>
                </div>
            </div>
              <?php

            /**
             * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
             *
             * @since 2.4.0
             * @hooked woocommerce_single_variation - 10 Empty div for variation data.
             * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
             */
            do_action( 'woocommerce_single_variation' );
            ?>
        <?php endif; ?>

        <?php do_action('woocommerce_after_variations_form'); ?>
    </form>
<?php
do_action('woocommerce_after_add_to_cart_form');
