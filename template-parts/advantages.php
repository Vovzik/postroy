<?php

// проверяем есть ли в повторителе данные
if (have_rows('elementy')):
    ?>
    <section class="advantages">
        <div class="advantages__content">
            <div class="container">
                <div class="advantages__items">
                    <?
                    // перебираем данные
                    while (have_rows('elementy')) : the_row();

                        ?>
                        <div class="advantages__item">
                            <h3 class="advantages__subtitle"><?php the_sub_field('zagolovok'); ?></h3>
                            <p class="advantages__text">
                                <?php the_sub_field('opisanie'); ?>
                            </p>
                        </div>
                    <?


                    endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?
else :

    // вложенных полей не найдено

endif;

?>