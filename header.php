<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">
    <header class="header">
        <div class="header__content header-content-js">
            <div class="container">
                <div class="header__top">
                    <?php if (get_field('logo_shapka', 8)) : ?>
                        <a class="header__logo" href="<?php echo is_front_page() ? '#' : '/' ?>">
                            <img class="header__logo-icon" src="<?php the_field('logo_shapka', 8) ?>" alt="Logo">
                        </a>
                    <?php endif ?>
                    <div class="header__btn js__header-burgerclick">
                        <div class='header__burger'>
                            <div class='header__burger-item js__header-burger header__burger--top'></div>
                            <div class='header__burger-item js__header-burger header__burger--middle'></div>
                            <div class='header__burger-item js__header-burger header__burger--bottom'></div>
                        </div>
                        <span>Каталог</span>
                    </div>
                    <div class="header__search">
                        <?php aws_get_search_form(true); ?>
                    </div>
                    <div class="header__contacts">
                        <?php if (get_field('gorod', 8)) : ?>
                            <div class="header__contacts-address">
                                <?php the_field('gorod', 8) ?>
                            </div>
                        <?php endif ?>
                        <?php if (get_field('telefon', 8)) : ?>
                            <a class="header__contacts-phone" href="tel:<?php the_field('telefon_ssylka', 8) ?>">
                                <?php the_field('telefon', 8) ?>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
                <div class="header__bottom">
                    <div class="header__text-catalog">
                        КАТАЛОГ
                    </div>
                    <nav class="header__nav">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'top_menu',
                            'container' => '',
                            'menu_class' => 'header__list',
                            'depth' => 3,
                        ));
                        ?>
                    </nav>
                    <?php if (!is_cart()) : ?>
                        <a class="header__basket" href="<?php echo wc_get_cart_url(); ?>">
                            <span>Корзина</span>
                            <div class="header__basket-number header-number-hooks">
                                <div>
                                    <?php
                                    $count = WC()->cart->get_cart_contents_count() == 0 ? '' : WC()->cart->get_cart_contents_count();
                                    echo $count;
                                    ?>
                                    <?php //echo count( WC()->cart->get_cart() ); ?>
                                </div>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="header__catalog">
                    <div class="container">
                        <div class="header__catalog-inner">
                            <div class="header__catalog-column">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'catalog_menu',
                                    'container' => '',
                                    'menu_class' => 'header__catalog-list',
                                    'depth' => 3,
                                ));
                                ?>


                                <?php if (get_field('telefon', 8)) : ?>
                                <a class="header__catalog-phone" href="tel:<?php the_field('telefon_ssylka', 8) ?>">
                                    <?php the_field('telefon', 8) ?>
                                </a>
                                <?php endif; ?>
                            </div>
                            <ul class="header__catalog-items">
                                <li>
                                    <a href="#">
                                        ТРУБЫ
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Кровля
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Ограждения
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Фасад
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Сортовой прокат
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Листовой прокат
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Водосток
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        О компании
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header__catalog-fon">

                </div>
                <div class="header__search header__search-mobail">
                    <?php aws_get_search_form(true); ?>
                </div>
            </div>
        </div>
        <div class="header__content-bottom">
            <div class="container">
                <div class="header__slider">
                    <div class="swiper-wrapper">
                        <?php echo get_categories_product_header() ?>
                    </div>
                </div>
            </div>
        </div>
    </header>




