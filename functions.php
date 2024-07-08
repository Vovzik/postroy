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
        'order' => 'ASC', // Направление сортировки
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
                'child_of' => $idElement,
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









































