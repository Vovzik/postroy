<section class="contacts">
    <div class="contacts__content">
        <div class="container">
            <h1 class="contacts__title">
                <?php the_field('zagolovok') ?>
            </h1>
            <?php

            // проверяем есть ли в повторителе данные
            if( have_rows('elementy') ):
                $count = '';
                ?>
            <div class="contacts__items">
            <?
                // перебираем данные
                while ( have_rows('elementy') ) : the_row();
                    $count++;

                    switch ($count) {
                        case 1 :
                            ?>
                            <div class="contacts__item">
                                <h3 class="contacts__subtitle">
                                    <?php  the_sub_field('pod_zagolovok'); ?>
                                </h3>
                                <a class="contacts__phone" href="tel:<?php the_field('ccylka') ?>">
                                    <?php the_field('telefon') ?>
                                </a>
                                <div class="contacts__text">
                                    <?php the_field('grafik') ?>
                                </div>
                            </div>
                            <?
                            break;
                        case 2 :
                            ?>
                            <div class="contacts__item">
                                <h3 class="contacts__subtitle">
                                    <?php  the_sub_field('pod_zagolovok'); ?>
                                </h3>
                                <div class="contacts__text">
                                   <?php the_field('vopros') ?>
                                </div>
                                <a class="contacts__link js__popup-link" href="#" data-modal="#popup">
                                    <?php the_field('knopka') ?>
                                </a>
                            </div>
                <?
                            break;
                        case 3 :
                            ?>
                            <div class="contacts__item">
                                <h3 class="contacts__subtitle">
                                    <?php  the_sub_field('pod_zagolovok'); ?>
                                </h3>
                                <div class="contacts__text">
                                    <?php the_field('tekst') ?>
                                </div>
                                <div class="contacts__requisites">
                                    <strong>
                                        ИНН:
                                    </strong>
                                    <?php the_field('inn') ?>
                                </div>
                                <div class="contacts__requisites">
                                    <strong>
                                        ОГРН:
                                    </strong>
                                    <?php the_field('ogrn') ?>
                                </div>
                            </div>
                <?
                            break;
                        default:
                            echo '4';
                    }

                ?>


                <?
                endwhile;
                ?>
            </div>
            <?

            else :

                // вложенных полей не найдено

            endif;

            ?>
            <?php the_field('karta')?>
        </div>
    </div>
</section>
