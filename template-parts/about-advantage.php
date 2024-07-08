<?php

// проверяем есть ли в повторителе данные
if (have_rows('elementy')):
?>
<div class="about-advantage">
    <div class="about-advantage__content">
        <div class="container">
                <div class="about about__items">
            <?

                // перебираем данные
                while (have_rows('elementy')) : the_row();
                   ?>
                    <div class="about__item">
                        <div class="about__number">
                            <img class="about__icons"
                                 src="<?php  the_sub_field('icon'); ?>"
                                 alt="alt">
                            <?php  the_sub_field('chislo'); ?>
                        </div>
                        <?php  the_sub_field('opisanie'); ?>
                    </div>
                    <?
                endwhile;
             ?>
        </div>
        </div>
    </div>
</div>
<?
else :

    // вложенных полей не найдено

endif;

?>