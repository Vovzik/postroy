<?php if (!is_front_page()
    && !is_product()
    && !is_cart()
    && !is_checkout()
    && !is_page('Контакты')
    && !is_single()
    && !is_category('Новости и статьи')) : ?>
    <?php get_template_part('template-parts/consultation') ?>
<?php endif; ?>



<?php if (!is_product()
    && !is_cart()
    && !is_checkout()
    && !is_page('Контакты')
    && !is_single()
    && !is_category('Новости и статьи')) : ?>
    <?php get_template_part('template-parts/news') ?>
<?php endif; ?>

<?php if (!is_cart() && !is_checkout() && !is_page('Контакты')) : ?>
    <?php get_template_part('template-parts/map') ?>
<?php endif; ?>


</main>
<section class="footer">
    <div class="footer__content">
        <div class="container">
            <div class="footer__inner-top">
                <a class="footer__logo" href="<?php echo is_front_page() ? '#' : '/' ?>">
                    <img class="footer__img" src="<?php the_field('footer_logo', 8) ?>"
                         alt="Logo">
                </a>
                <div class="footer__box">
                    <p class="footer__box-text">
                        <?php the_field('footer_tekst', 8) ?>
                    </p>
                    <?php echo do_shortcode('[contact-form-7 id="941b067" title="Подписка на рассылку"]'); ?>
                </div>
                <?php

                // проверяем есть ли в повторителе данные
                if (have_rows('soczialnye_seti', 8)):
                    ?>
                    <div class="footer__socials">
                        <?

                        // перебираем данные
                        while (have_rows('soczialnye_seti', 8)) : the_row();
                            ?>
                            <a class="footer__social" href="<?php the_sub_field('footer_ssylka'); ?>">
                                <img class="footer__social-icon"
                                     src="<?php the_sub_field('footer_ikonka'); ?>" alt="alt">
                            </a>
                        <?


                        endwhile;
                        ?>
                    </div>
                <?
                else :

                    // вложенных полей не найдено

                endif;

                ?>
            </div>
            <div class="footer__inner-center">
                <div class="footer__catalog">
                    <h6 class="footer__title">
                        Каталог
                    </h6>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'bottom_menu_catalog',
                        'container' => '',
                        'menu_class' => 'footer__list',
                        'depth' => 3,
                    ));
                    ?>
                </div>
                <div class="footer__about">
                    <h6 class="footer__title">
                        О компании
                    </h6>
                    <div class="footer__about-box">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'bottom_menu',
                            'container' => '',
                            'menu_class' => 'footer__about-list',
                            'depth' => 3,
                        ));
                        ?>

                        <?php if (have_rows('informacziya', 8)): ?>
                            <div class="footer__address">
                                <?php while (have_rows('informacziya', 8)) : the_row(); ?>
                                    <?php if (get_sub_field('footer_info')) : ?>
                                        <p class="footer__address-text">
                                            <?php the_sub_field('footer_info'); ?>
                                        </p>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                        <?php else : ?>

                        <?php endif; ?>
                        <div class="footer__contacts">
                            <div class="footer__contacts-text">
                                Поддержка
                            </div>
                            <div class="footer__contacts-text">
                                <?php the_field('footer_telefon', 8) ?>
                            </div>
                            <a class="footer__contacts-btn js__popup-link" data-modal="#popup" href="#">
                                <?php the_field('footer_knopka', 8) ?>
                            </a>
                            <div class="footer__contacts-text">
                                <?php the_field('footer_grafik', 8) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__content-bottom">
        <div class="container">
            <div class="footer__content-inner">
                <div class="footer__bottom-text">
                    © OOO «ПОСТРОЙ» 2016-2024
                </div>
                <div class="footer__bottom-text">
                    Политика конфиденциальности
                </div>
            </div>
        </div>
    </div>
</section>
</div>


<?php get_template_part('template-parts/popup-form-send') ?>
<?php get_template_part('template-parts/popup-callback') ?>
<?php get_template_part('template-parts/footer-navigation-mobail') ?>
<?php wp_footer(); ?>
</body>
</html>
