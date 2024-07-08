<section class="certificates-and-licenses">
    <div class="certificates-and-licenses__content content-popular">
        <div class="container">
            <h2 class="certificates-and-licenses__title title-popular">
                <?php the_field('certificates_zagolovok') ?>
            </h2>
            <?php

            // проверяем есть ли в повторителе данные
            if (have_rows('certificates_elementy')):
            ?>
                <div class="certificates-and-licenses__slider">
                    <div class="swiper-wrapper">
            <?
                // перебираем данные
                while (have_rows('certificates_elementy')) : the_row();
                       ?>
                    <div class="certificates-and-licenses__slide swiper-slide">
                        <img class="certificates-and-licenses__img"
                             src="<?php the_sub_field('certificates_kartinka'); ?>"
                             alt="alt">
                    </div>
                        <?

                endwhile;
                ?>
        </div>
        <div class="certificates-and-licenses__navigation">
            <div class="certificates-and-licenses__prev home-prev">

            </div>
            <div class="certificates-and-licenses__pagination home-pagination">

            </div>
            <div class="certificates-and-licenses__next home-next">

            </div>
        </div>
    </div>
            <?

            else :

                // вложенных полей не найдено

            endif;

            ?>
        </div>
    </div>
</section>