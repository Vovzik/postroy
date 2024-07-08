<section class="about-section">
    <div class="about-section__content">
        <div class="container">
            <div class="about-section__inner">
                <div class="about-section__info">
                    <h2 class="about-section__title">
                        <?php the_field('zagolovok') ?>
                    </h2>
                    <p>
                        <?php the_field('opisanie') ?>
                    </p>
                    <a class="about-section__link js__popup-link" data-modal="#popup" href="#">
                        <?php the_field('knopka') ?>
                    </a>
                </div>
                <?php

                // проверяем есть ли в повторителе данные
                if( have_rows('about_elementy') ):
                    ?>
                <div class="about-section__items">
                <?

                    // перебираем данные
                    while ( have_rows('about_elementy') ) : the_row();
                        ?>
                    <div class="about-section__item">
                            <img class="about-section__img"
                                 src="<?php the_sub_field('kartinka'); ?>" alt="alt">
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
</section>