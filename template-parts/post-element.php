<article class="news news__slide swiper-slide">
    <a class="news__slide-link" href="<?php the_permalink() ?>"
       style="background-image: url('<?php echo has_post_thumbnail() ? the_post_thumbnail_url() : '#' ?>')">
                            <span class="news__data">
                                <?php echo get_the_date() ?>
                            </span>
        <h3 class="news__subtitle">
            <?php the_title(); ?>
        </h3>
        <p class="news__text">
            <?php echo get_the_excerpt(); ?>
        </p>
        <span class="news__btn">
                                Читать далее
                            </span>
    </a>
</article>