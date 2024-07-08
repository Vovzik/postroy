<section class="type-oplata">
    <div class="type-oplata__content">
        <div class="container">
            <div class="type-oplata__inner">
                <h2 class="type-oplata__title">
                    <?php the_field('zagolovok') ?>
                </h2>
                <?php

                // проверяем есть ли в повторителе данные
                if (have_rows('elementy')):
                    ?>
                <div class="type-oplata__items">
                <?

                    // перебираем данные
                    while (have_rows('elementy')) : the_row();
                              ?>
                        <div class="type-oplata__item">
                            <img class="type-oplata__icon"
                                 src="<?php  the_sub_field('ikon'); ?>" alt="alt">
                            <?php  the_sub_field('opisanie'); ?>
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
               <?php the_field('kontakty') ?>
            </div>
        </div>
    </div>
</section>