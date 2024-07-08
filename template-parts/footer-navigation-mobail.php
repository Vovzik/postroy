<div class="footer-navigation-mobail">
    <a class="footer-navigation-mobail__item footer-navigation-mobail__item--home" href="<?php echo is_front_page() ? '#' : '/' ?>">
        Главная
    </a>
    <a class="footer-navigation-mobail__item footer-navigation-mobail__item--catalog" href="/katalog/">
        Каталог
    </a>
    <?php if(!is_cart()) : ?>
    <a href="<?php echo wc_get_cart_url(); ?>" class="footer-navigation-mobail__item footer-navigation-mobail__item--basket">
        Корзина

        <div class="footer-navigation-mobail__number header-number-hooks">
                <div>
                    <?php
                    $count = WC()->cart->get_cart_contents_count() == 0 ? '<span class="footer-navigation-mobail__hidden"></span>' : '<div> ' . WC()->cart->get_cart_contents_count() . '</div>';
                    echo $count;
                    ?>
                    <?php //echo count( WC()->cart->get_cart() ); ?>
                </div>
        </div>
    </a>
   <?php endif;?>
    <a href="#" class="footer-navigation-mobail__item footer-navigation-mobail__item--support">
        Поддержка
    </a>
    <a href="#" class="footer-navigation-mobail__item footer-navigation-mobail__item--search">
        Поиск
    </a>
</div>