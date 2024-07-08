<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
    exit;
}

?>
<?php get_template_part('template-parts/breadcrumbs') ?>
<section class="checkout">
    <div class="checkout__content">
        <div class="container">
            <?php

            do_action('woocommerce_before_checkout_form', $checkout);

            // If checkout registration is disabled and not logged in, the user cannot checkout.
            if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
                echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
                return;
            }

            ?>


            <form name="checkout" method="post" class="checkout woocommerce-checkout"
                  action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

                <?php if ($checkout->get_checkout_fields()) : ?>

                    <?php do_action('woocommerce_checkout_before_customer_details'); ?>

                    <div class="checkout__inner">
                        <div class="checkout__column-left">
                            <!-- способы доставки  -->
                            <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
                                <h3 class="checkout__title">
                                    СПОСОБ ПОЛУЧЕНИЯ
                                </h3>
                            <?php endif; ?>
                            <div class="checkout__delivery my-custom-shipping-table">
                                <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
                                    <?php do_action('woocommerce_review_order_before_shipping'); ?>

                                    <?php wc_cart_totals_shipping_html(); ?>

                                    <?php do_action('woocommerce_review_order_after_shipping'); ?>

                                <?php endif; ?>
                            </div>

                            <h3 class="checkout__title">
                                СПОСОБ ОПЛАТЫ
                            </h3>
                            <!-- способы оплаты доставки  -->
                            <?php woocommerce_checkout_payment() ?>
                            <?php do_action('woocommerce_checkout_billing'); ?>
                        </div>
                        <div class="checkout__column-right">
                            <?php do_action('woocommerce_checkout_before_order_review'); ?>

                            <div id="order_review" class="woocommerce-checkout-review-order">
                                <?php do_action('woocommerce_checkout_order_review'); ?>
                            </div>

                            <?php do_action('woocommerce_checkout_after_order_review'); ?>
                        </div>
                    </div>
                    <div class="checkout__place-order form-row place-order">
                        <?php do_action('woocommerce_review_order_before_submit'); ?>

                        <?php echo apply_filters('woocommerce_order_button_html', '<button type="submit" class="checkout__btn button alt" . name="woocommerce_checkout_place_order" id="place_order" >' . 'Оформить заказ' . '</button>'); // @codingStandardsIgnoreLine ?>

                        <?php do_action('woocommerce_review_order_after_submit'); ?>

                        <?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
                    </div>

                    <?php do_action('woocommerce_checkout_after_customer_details'); ?>

                <?php endif; ?>


            </form>

            <?php do_action('woocommerce_after_checkout_form', $checkout); ?>
        </div>
    </div>
</section>
