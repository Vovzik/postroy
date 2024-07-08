<div data-popup="#popup" class="popup js__popup-open">
    <div class="popup__body">
        <div class="popup__content js__popup-content">
                <span class="popup__close js__popup-close">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/popup/close.svg" alt="alt">
                </span>
              <h6 class="popup__title">
                  Связаться с нами
              </h6>
            <p class="popup__text">
                Мы поможем вам избавиться от лишних хлопот и произведем расчеты со всеми подробностями
            </p>
           <?php echo do_shortcode('[contact-form-7 id="e0e6334" title="Связаться с нами"]'); ?>
            <p class="popup__text-policy">
                Заполняя форму вы соглашаетесь на <a href="#">обработку персональных данных</a>
            </p>
        </div>
    </div>
</div>