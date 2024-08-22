<?php
//Отключение стилей WooCommerce
add_filter('woocommerce_enqueue_styles', '__return_false');


remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_main_content', 'WC_Structured_Data::generate_website_data()', 30);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);


//content-product-cat
remove_action('woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10);

add_action('woocommerce_before_subcategory', function ($category) {
    $category_term = get_term($category, 'product_cat');
    $category_name = (!$category_term || is_wp_error($category_term)) ? '' : $category_term->name;
    /* translators: %s: Category name */
    echo '<a class="catalog__item"  aria-label="' . sprintf(esc_attr__('Visit product category %1$s', 'woocommerce'), esc_attr($category_name)) . '" href="' . esc_url(get_term_link($category, 'product_cat')) . '">';
});


remove_action('woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10);

add_action('woocommerce_before_subcategory_title', function ($category) {
    $small_thumbnail_size = apply_filters('subcategory_archive_thumbnail_size', 'woocommerce_thumbnail');
    $dimensions = wc_get_image_size($small_thumbnail_size);
    $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);


    if ($thumbnail_id) {
        $image = wp_get_attachment_image_src($thumbnail_id, $small_thumbnail_size);
        $image = $image[0];
        $image_srcset = function_exists('wp_get_attachment_image_srcset') ? wp_get_attachment_image_srcset($thumbnail_id, $small_thumbnail_size) : false;
        $image_sizes = function_exists('wp_get_attachment_image_sizes') ? wp_get_attachment_image_sizes($thumbnail_id, $small_thumbnail_size) : false;
    } else {
        $image = '/wp-content/uploads/2024/06/woocommerce-placeholder-100x60-1.png';
        $image_srcset = false;
        $image_sizes = false;
    }

    if ($image) {
        // Prevent esc_url from breaking spaces in urls for image embeds.
        // Ref: https://core.trac.wordpress.org/ticket/23605.
        $image = str_replace(' ', '%20', $image);

        // Add responsive image markup if available.
        if ($image_srcset && $image_sizes) {
            echo '<img class="catalog__img" src="' . esc_url($image) . '" alt="' . esc_attr($category->name) . '" srcset="' . esc_attr($image_srcset) . '" sizes="' . esc_attr($image_sizes) . '" />';
        } else {
            echo '<img class="catalog__img" src="' . esc_url($image) . '" alt="' . esc_attr($category->name) . esc_attr($dimensions['height']) . '" />';
        }
    }
});


remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);

add_action('woocommerce_shop_loop_subcategory_title', function ($category) {
    ?>
    <h2 class="catalog__subtitle">
        <?php echo esc_html($category->name); ?>
    </h2>
    <p class="catalog__text">
        <?php
        $count = $category->count == 1 ? ' товар' : ' товара';
        if ($category->count > 0) {
            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo apply_filters('woocommerce_subcategory_count_html', esc_html($category->count), $category);
            echo $count;
        }

        ?>

    </p>
    <?php
});


//content-product
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

add_action('woocommerce_shop_loop_item_title', function () {
    global $product;
    echo '<h2 class="product__title ' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">' . '<a class="product__title-link" href="' . $product->get_permalink() . '">' . get_the_title() . '</a>' . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
});


add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    $count = WC()->cart->get_cart_contents_count() == 0 ? '<span class="footer-navigation-mobail__hidden"></span>' : '<div>' . WC()->cart->get_cart_contents_count() . ' </div>';
    $fragments['div.header-number-hooks>div'] =  $count;
    return $fragments;
});





/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter('loop_shop_per_page', 'new_loop_shop_per_page', 20);

function new_loop_shop_per_page($cols)
{
    // $cols contains the current number of products per page based on the value stored on Options –> Reading
    // Return the number of products you wanna show per page.
    $cols = 6;
    return $cols;
}


//single-product
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);


//content-single-product
add_action('woocommerce_single_product_summary', 'attributeName', 6);
//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);

function attributeName()
{
    global $product;
    return wc_display_product_attributes($product);
}


//variable
remove_action('woocommerce_single_variation', 'woocommerce_single_variation', 10);

add_action('woocommerce_single_variation', function () {
    echo '<div class="product-single__ed-price woocommerce-variation single_variation"></div>';
});


//content-single-product
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);


//корзина
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
remove_action('woocommerce_before_cart', 'woocommerce_output_all_notices', 10);


//страница оформление заказа
//Удаляем не нужные поля в оформление заказа
add_filter('woocommerce_default_address_fields', function ($fields) {
    unset($fields['company'], $fields['address_2'], $fields['postcode']);
    return $fields;
});


remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);
remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);


// Добавление чекбокса
add_action('woocommerce_review_order_before_submit', 'truemisha_privacy_checkbox', 25);

function truemisha_privacy_checkbox()
{

    woocommerce_form_field('privacy_policy_checkbox', array(
        'type' => 'checkbox',
        'class' => array('form-row'),
        'input_class' => array('woocommerce-form__input-checkbox', 'checkout__policy-input'),
        'label_class' => array('woocommerce-form__label-for-checkbox', 'checkout__policy-label'),
        'required' => true,
        'label' => 'Принимаю условия <a class="checkout__policy" href="' . get_privacy_policy_url() . '">Пользовательского соглашения</a>',
    ));

}

// Валидация
add_action('woocommerce_checkout_process', 'truemisha_privacy_checkbox_error', 25);

function truemisha_privacy_checkbox_error()
{

    if (empty($_POST['privacy_policy_checkbox'])) {
        wc_add_notice('Ваш нужно принять политику конфиденциальности.', 'error');
    }

}


//Изображения товаров на странице оформления заказа
add_filter('woocommerce_cart_item_name', 'true_checkout_product_images', 25, 2);

function true_checkout_product_images($name, $cart_item)
{

    // ничего не делаем, если находимся не на странице оформления заказа
    if (!is_checkout()) {
        return $name;
    }

    $product = $cart_item['data'];
    $image = $product->get_image(false, array('class' => 'alignleft'));

    // объединяем изображение с названием товара
    return '<div class="checkout__box-img">' . $image . '</div>' . $name;
}


function my_custom_shipping_table_update( $fragments ) {
    ob_start();
    ?>
    <div class="checkout__delivery my-custom-shipping-table">
        <?php wc_cart_totals_shipping_html(); ?>
    </div>
    <?php
    $woocommerce_shipping_methods = ob_get_clean();
    $fragments['.my-custom-shipping-table'] = $woocommerce_shipping_methods;
    return $fragments;
}
add_filter( 'woocommerce_update_order_review_fragments', 'my_custom_shipping_table_update');









//страница после успешного оформления заказа
add_filter( 'woocommerce_order_get_formatted_billing_address', 'wp_kama_woocommerce_order_get_formatted_billing_address_filter', 10, 3 );

/**
 * Function for `woocommerce_order_get_formatted_billing_address` filter-hook.
 *
 * @param string   $address     Formatted billing address string.
 * @param array    $raw_address Raw billing address.
 * @param WC_Order $order       Order data. @since 3.9.0
 *
 * @return string
 */
function wp_kama_woocommerce_order_get_formatted_billing_address_filter( $address, $raw_address, $order ){
    $elements = explode('<br/>', $address);


  foreach ($elements as $element) {
      ?>
      <li class="thank-you__item">
         <?php echo $element?>
      </li>
      <?php
  }

}


add_action( 'woocommerce_after_checkout_validation', 'misha_validate_fname_lname', 10, 2 );

function misha_validate_fname_lname( $fields, $errors ){

    if ( preg_match( '/\\d/', $fields[ 'billing_first_name' ] ) || preg_match( '/\\d/', $fields[ 'billing_last_name' ] ) ){
        $errors->add( 'validation', 'Your first or last name contains a number. Really?' );
    }

}


// Custom validation for Billing Phone checkout field
add_action('woocommerce_checkout_process', 'custom_validate_billing_phone');
function custom_validate_billing_phone() {
    $is_correct = preg_match('/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/', $_POST['billing_phone']);
    if ( $_POST['billing_phone'] && !$is_correct) {
        wc_add_notice( __( 'Ошибка пошел вон' ), 'error' );
    }
}





//Добавление постов по кнопке показать еще
add_action('wp_head', 'myplugin_ajaxurl');
add_action('wp_ajax_loadmore', 'true_loadmore');
add_action('wp_ajax_nopriv_loadmore', 'true_loadmore');

function myplugin_ajaxurl() {

    echo '<script type="text/javascript">var ajaxurl = "' . admin_url('admin-ajax.php') . '";</script>';
}

function true_loadmore() {
    $paged = !empty($_POST['paged']) ? $_POST['paged'] : 1;
    $paged++;
    $args = array('posts_per_page' => 4, 'paged' => $paged);
    query_posts($args);

    while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/post-element')?>
    <?php
    endwhile;
    die;
}



//wooCommerce loop header hooks
remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description');
remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description');

















