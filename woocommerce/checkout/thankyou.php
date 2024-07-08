<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */

defined('ABSPATH') || exit;
?>


<?php
if ($order) :

    do_action('woocommerce_before_thankyou', $order->get_id());
    ?>

    <?php if ($order->has_status('failed')) : ?>

    <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>

    <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
        <a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>"
           class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
        <?php if (is_user_logged_in()) : ?>
            <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>"
               class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
        <?php endif; ?>
    </p>

<?php else : ?>
    <section class="thank-you">
      <div class="thank-you__content">
        <div class="container">
           <?php wc_get_template('checkout/order-received.php', array('order' => $order)); ?>
            <div class="thank-you__inner">
                <div class="thank-you__column">
        <ul class="thank-you__list woocommerce-order-overview woocommerce-thankyou-order-details order_details">

            <li class="thank-you__item woocommerce-order-overview__order order">
                <?php esc_html_e('Order number:', 'woocommerce'); ?>
                <strong class="thank-you__text"><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
            </li>

            <li class="thank-you__item woocommerce-order-overview__date date">
                <?php esc_html_e('Date:', 'woocommerce'); ?>
                <strong class="thank-you__text"><?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
            </li>

            <?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()) : ?>
                <li class="thank-you__item woocommerce-order-overview__email email">
                    <?php esc_html_e('Email:', 'woocommerce'); ?>
                    <strong class="thank-you__text"><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                </li>
            <?php endif; ?>

            <li class="thank-you__item woocommerce-order-overview__total total">
                <?php esc_html_e('Total:', 'woocommerce'); ?>
                <strong class="thank-you__text"><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
            </li>

            <?php if ($order->get_payment_method_title()) : ?>
                <li class="thank-you__item woocommerce-order-overview__payment-method method">
                    <?php esc_html_e('Payment method:', 'woocommerce'); ?>
                    <strong class="thank-you__text"><?php echo wp_kses_post($order->get_payment_method_title()); ?></strong>
                </li>
            <?php endif; ?>

        </ul>

        <?php
          wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
        ?>
    </div>
                <div class="thank-you__column">
               <?php do_action('woocommerce_thankyou', $order->get_id()); ?>
           </div>
            </div>
        </div>
     </div>
    </section>

<?php endif; ?>



<?php else : ?>

    <?php wc_get_template('checkout/order-received.php', array('order' => false)); ?>

<?php endif; ?>