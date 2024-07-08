<section class="about">
    <div class="about__content">
        <div class="container">
            <div class="about__inner">
                <h2 class="about__title about__media">
                    <?php the_field('about_zagolovok') ?>
                </h2>
                <h3 class="about__subtitle about__media">
                    <?php the_field('about_pod_zagolovok') ?>
                </h3>
                <div class="about__box">
                    <img class="about__img" src="<?php the_field('about_kartinka') ?>"
                         alt="alt">
                </div>
                <div class="about__info">
                    <h2 class="about__title">
                        <?php the_field('about_zagolovok') ?>
                    </h2>
                    <h3 class="about__subtitle">
                        <?php the_field('about_pod_zagolovok') ?>
                    </h3>
                    <?php the_field('about_opisanie') ?>
                    <a class="about__btn" href="<?php the_field('about_knopka_link') ?>">
                        <?php the_field('about_knopka') ?>
                    </a>
                    <?php

                    // проверяем есть ли в повторителе данные
                    if (have_rows('about_elementy')):
                        ?>
                        <div class="about__items">
                            <?
                            // перебираем данные
                            while (have_rows('about_elementy')) : the_row();
                                ?>
                                <div class="about__item">
                                    <div class="about__number">
                                        <img class="about__icons"
                                             src="<?php the_sub_field('about_ikonka'); ?>" alt="alt">
                                        <?php the_sub_field('about_chislo'); ?>
                                    </div>
                                    <?php the_sub_field('about_opisanie'); ?>
                                </div>
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
            </div>
        </div>
    </div>
</section>