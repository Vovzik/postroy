<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;
?>




<?php global $product; ?>

<?php
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>

<section id="product-<?php the_ID(); ?>" <?php wc_product_class('product-single', $product); ?>>
    <div class="product-single__content">
        <div class="container">
            <div class="product-single__inner">
                <div class="product-single__column">
                    <div class="product-single__slider">
                        <div class="swiper-wrapper">
                            <?php
                            $product_img_id = $product->get_image_id();

                            if ($product_img_id) {
                                $main_img = wp_get_attachment_url($product_img_id);
                            } else {
                                $main_img = wc_placeholder_img_src('woocommerce_thumbnail');
                            }
                            $product_img_ids = $product->get_gallery_image_ids();
                            ?>

                            <a class="product-single__slide swiper-slide" href="<?php echo $main_img ?>"
                               data-fancybox="gallery">
                                <img class="product-single__images" src="<?php echo $main_img ?>"
                                     alt="<?php echo $product->name ?>">
                            </a>

                            <?php if ($product_img_ids) : ?>
                                <?php foreach ($product_img_ids as $product_img_id) : ?>
                                    <a class="product-single__slide swiper-slide"
                                       href="<?php echo wp_get_attachment_url($product_img_id) ?>"
                                       data-fancybox="gallery">
                                        <img class="product-single__images"
                                             src="<?php echo wp_get_attachment_url($product_img_id) ?>"
                                             alt="<?php echo $product->name ?>">
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="product-single__box">
                        <div class="product-single__slider-miniatures">
                            <div class="swiper-wrapper">

                                <div class="product-single__miniature-slide swiper-slide">
                                    <img class="product-single__miniature-images"
                                         src="<?php echo $main_img ?>"
                                         alt="<?php echo $product->name ?>">
                                </div>

                                <?php if ($product_img_ids) : ?>
                                    <?php foreach ($product_img_ids as $product_img_id) : ?>
                                        <div class="product-single__miniature-slide swiper-slide">
                                            <img class="product-single__miniature-images"
                                                 src="<?php echo wp_get_attachment_url($product_img_id) ?>"
                                                 alt="<?php echo $product->name ?>">
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="product-single__prev product-single-prev">

                            </div>
                            <div class="product-single__next product-single-next">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-single__info">
                    <?php
                    /**
                     * Hook: woocommerce_single_product_summary.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     * @hooked WC_Structured_Data::generate_product_data() - 60
                     */
                    do_action('woocommerce_single_product_summary');
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
do_action( 'woocommerce_after_single_product_summary' );
?>


<?php do_action('woocommerce_after_single_product'); ?>

