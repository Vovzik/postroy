<?php
add_action('widgets_init', 'register_my_widgets');
function register_my_widgets()
{

    register_sidebar(array(
        'name' => __('Sidebar', 'Postroy'),
        'id' => "sidebar-1",
    ));
}


include 'incs/connecting-files.php';
include 'incs/registering-menu-types.php';
include 'incs/dorabotka-contactForm7.php';
include 'incs/woocommerce-hooks.php';


// https://woocommerce.com/document/woocommerce-theme-developer-handbook/#section-5
add_action('after_setup_theme', function () {
    add_theme_support('woocommerce');
});

function wooeshop_dump($data)
{
    echo "<pre>" . print_r($data, 1) . "</pre>";
}


function get_categories_product($categories_list = '')
{

    $get_categories_product = get_terms('product_cat', [
        'orderby' => 'name', // Поле для сортировки
        'order' => 'ASC', // Направление сортировки
        'hide_empty' => 1, // Скрывать пустые (1 - да, 0 - нет)
        'parent' => 0,
    ]);


    if (count($get_categories_product) > 0) {
        ?>
        <?php
        foreach ($get_categories_product as $categories_item) {
            $count = $categories_item->count == 1 ? ' товар' : ' товара';
            $thumbnail_id = get_term_meta($categories_item->term_id, "thumbnail_id", true); # для вывода изображений


            $img = $thumbnail_id > 0 ? wp_get_attachment_url($thumbnail_id) : '/wp-content/uploads/2024/06/woocommerce-placeholder-100x60-1.png';


            $categories_list .= '
				<a class="catalog__item" href="' . esc_url(get_term_link((int)$categories_item->term_id)) . '">
				  <img class="catalog__img" src="' . $img . '" alt="alt">
				  <h3 class="catalog__subtitle">
				   ' . esc_html($categories_item->name) . '
                  </h3>
                  <p class="catalog__text">
                     ' . $categories_item->count . $count . ' 
                  </p>
				</a>
			';

        }


    }

    return ($categories_list == '' ? '' : $categories_list);
    ?>
    <?php

}


function get_categories_product_header($categories_list = '')
{

    $get_categories_product = get_terms('product_cat', [
        'orderby' => 'name', // Поле для сортировки
        'order' => 'ASC', // Направление сортировки
        'hide_empty' => 1, // Скрывать пустые (1 - да, 0 - нет)
        'parent' => 0,
    ]);


    if (count($get_categories_product) > 0) {
        ?>
        <?php
        foreach ($get_categories_product as $categories_item) {

            $thumbnail_id = get_term_meta($categories_item->term_id, "thumbnail_id", true); # для вывода изображений

            $img = $thumbnail_id > 0 ? wp_get_attachment_url($thumbnail_id) : '/wp-content/uploads/2024/06/woocommerce-placeholder-100x60-1.png';
            $categories_list .= '
				<a class="header__slide swiper-slide" href="' . esc_url(get_term_link((int)$categories_item->term_id)) . '">
				  <img class="header__slide-img" src="' . $img . '" alt="alt">
				 ' . esc_html($categories_item->name) . '
				</a>
			';

        }
         ?>

            <?

    }

    return ($categories_list == '' ? '' : $categories_list);
    ?>
    <?php

}


function get_categories_product_home($categories_list = '')
{


    $get_categories_product = get_terms('product_cat', [
        'orderby' => 'name', // Поле для сортировки
        'order' => 'DESC', // Направление сортировки
        'hide_empty' => 1, // Скрывать пустые (1 - да, 0 - нет)
        'parent' => 0,
    ]);


    if (count($get_categories_product) > 0) {
        ?>
        <?php
        foreach ($get_categories_product as $categories_item) {

            $idElement = $categories_item->term_id;

            $categories = get_terms(array(
                'taxonomy' => 'product_cat',
                'hide_empty' => 1,
                'parent' => $idElement,
            ));




            $pre_response = '';
            $pre_images = '';
            $text = '';
            foreach ($categories as $categorie) {
                $term_fields = get_fields('term_' . $categorie->term_id);

                foreach ($term_fields as $term_field) {

                    if ($term_field) {
                        $pre_images .= '<img class="home__img" src="' . $term_field . '" alt="alt">';

                    } else {
                        $pre_images .= '<img class="home__img" src="/wp-content/uploads/woocommerce-placeholder.png" alt="alt">';
                    }
                }


                $pre_response .= '
                <li class="home__list-item"> 
                   <a class="home__list-link" href=" ' . esc_url(get_term_link((int)$categorie->term_id)) . ' ">
                    ' . $categorie->name . '
                  </a>
                </li>';
            }


            $noneCategoriesBox = $pre_response == '' ? 'home__none-categories-box' : '';


            if ($categories_item->description) {
                $text .= '<div class="redactor-wordpress">
                             ' . category_description($idElement) . '
                        </div>';
            }


            $thumbnail_id = get_term_meta($categories_item->term_id, "thumbnail_id", true); # для вывода изображений
            $img = $thumbnail_id > 0 ? wp_get_attachment_url($thumbnail_id) : '/wp-content/uploads/woocommerce-placeholder.png';

            $categories_list .= '
				 <div class="home__slide swiper-slide">
				    <div class="home__info">
				       <h2 class="home__title">
                           ' . esc_html($categories_item->name) . '
                       </h2>
                       ' . $text . '
				      <img class="home__decor" src="' . $img . '" alt="alt">
				        <a class="home__btn" href="' . esc_url(get_term_link((int)$categories_item->term_id)) . '">
                            Перейти
                        </a>
				    </div>
				    <div class="home__box ' . $noneCategoriesBox . '">
				       ' . $pre_images . '
				      <ul class="home__list">
				      ' . $pre_response . '
                       </ul>
                    </div>
				 </div>
			';

        }
    }

    return ($categories_list == '' ? '' : $categories_list);
    ?>
    <?php

}


// Return total sales number for a product category
function counts_total_sales_by_product_category( $term_id) {
    global $wpdb;



    $total_sales = $wpdb->get_var("
        SELECT sum(meta_value)
        FROM $wpdb->postmeta
        INNER JOIN {$wpdb->term_relationships} ON ( {$wpdb->term_relationships}.object_id = {$wpdb->postmeta}.post_id )
        WHERE ( {$wpdb->term_relationships}.term_taxonomy_id IN ($term_id) )
        AND {$wpdb->postmeta}.meta_key = 'total_sales'"
    );
    // Update cache value
    set_transient( 'total_sales_term_'.$term_id, $total_sales, 12 * HOUR_IN_SECONDS );
    return $total_sales;
}

function gets_best_selling_product_categories($limit) {
    $terms = array();
    $product_categories = get_terms( 'product_cat', [
        'hide_empty' => 1,
    ]);

        foreach ( $product_categories as $product_cat ) {
            // set total sales property
            $product_cat->sales = counts_total_sales_by_product_category( $product_cat->term_id );
            $terms[$product_cat->term_id] = $product_cat;
        }


    // filter out empty terms
    $terms = array_filter( $terms, fn($term) => $term->sales > 0 );

    // sort the terms by sales values in descending order
    usort($terms, fn($a, $b) => $a->sales <=> $b->sales);

    $best_product_categories = array_slice( $terms, 0, $limit, true );


        foreach ($best_product_categories as $best_product_categorie) {
            if ($best_product_categorie->count === 0) {
                continue;
            }

            $count = $best_product_categorie->count == 1 ? ' товар' : ' товара';
            $thumbnail_id = get_term_meta($best_product_categorie->term_id, "thumbnail_id", true); # для вывода изображений
            $img = $thumbnail_id > 0 ? wp_get_attachment_url($thumbnail_id) : '/wp-content/uploads/2024/06/woocommerce-placeholder-100x60-1.png';
            $categories_list .= '
				<a class="catalog__item" href="' . esc_url(get_term_link((int)$best_product_categorie->term_id)) . '">
				  <img class="catalog__img" src="' . $img . '" alt="alt">
				  <h3 class="catalog__subtitle">
				   ' . esc_html($best_product_categorie->name) . '
                  </h3>
                  <p class="catalog__text">
                     ' . $best_product_categorie->count . $count . ' 
                  </p>
				</a>
			';
        }




    return $categories_list;
}







































