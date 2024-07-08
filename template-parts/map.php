<section class="map">
    <div class="map__content">
        <div class="container">
            <div class="map__inner">
                <div class="map__info">
                    <h2 class="map__title">
                        <?php the_field('map_zagolovok', 8) ?>
                    </h2>
                    <p class="map__text">
                        <?php the_field('map_opisanie', 8) ?>
                    </p>
                    <?php echo do_shortcode('[contact-form-7 id="4b1aacf" title="Консультация"]'); ?>
                    <p class="map__politica">
                        <?php the_field('map_politika', 8) ?> <a href="<?php the_field('map_politika_link', 8) ?>">обработку
                            персональных данных</a>
                    </p>
                    <?php the_field('map_karta_mobajl', 8) ?>
                    <div class="map__contacts">
                        <div class="map__contact">
                            <h3 class="map__subtitle">
                                <?php the_field('map_pod_zagolovok', 8) ?>
                            </h3>
                            <a class="map__phone" href="tel:<?php the_field('map_telefon_ssylka', 8) ?>">
                                <?php the_field('map_telefon', 8) ?>
                            </a>
                            <p class="map__contacts-text">
                                <?php the_field('map_rabochij_grafik', 8) ?>
                            </p>
                            <p class="map__contacts-text">
                                <?php the_field('map_pochta', 8) ?>
                            </p>
                            <p class="map__contacts-text">
                                <?php the_field('map_gorod', 8) ?>
                            </p>
                        </div>
                        <?php

                        // проверяем есть ли в повторителе данные
                        if (have_rows('map_soczialnye_seti', 8)):
                            ?>
                            <div class="map__socials">
                                <?
                                // перебираем данные
                                while (have_rows('map_soczialnye_seti', 8)) : the_row();
                                    ?>
                                    <a class="map__social"
                                       href="<?php the_sub_field('map_ccylka_na_soczialnuyu_set'); ?>">
                                        <img class="map__icon" src="<?php the_sub_field('map_ikonka'); ?>"
                                             alt="alt">
                                        <?php the_sub_field('map_tekst'); ?>
                                    </a>
                                <?
                                    // отображаем вложенные поля


                                endwhile;
                                ?>

                            </div>
                        <?
                        else :

                            // вложенных полей не найдено

                        endif;

                        ?>
                    </div>
                </div>
                <?php the_field('map_karta', 8) ?>
            </div>
        </div>
    </div>
</section>
