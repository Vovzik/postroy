<section class="news">
    <div class="news__content content-popular">
        <div class="container">
            <h2 class="news__title title-popular">
                Новости и статьи
            </h2>
            <?php
            global $post;

            $myposts = get_posts();

            if( $myposts ){
                ?>
            <div class="news__slider">
                <div class="swiper-wrapper">
                <?
                foreach( $myposts as $post ){
                    setup_postdata( $post );
                    ?>
                    <article class="news__slide swiper-slide">



                        <a class="news__slide-link" href="<?php the_permalink() ?>" style="background-image: url('<?php echo has_post_thumbnail() ? the_post_thumbnail_url() : '#'?>')">
                            <span class="news__data">
                                <?php echo get_the_date() ?>
                            </span>
                            <h3 class="news__subtitle">
                                <?php the_title(); ?>
                            </h3>
                            <p class="news__text">
                               <?php  echo get_the_excerpt(); ?>
                            </p>
                            <span class="news__btn">
                                Читать далее
                            </span>
                        </a>
                    </article>
                    <!-- Вывод постов, функции цикла: the_title() и т.д. -->
                    <?php
                }
                ?>
                </div>
                <div class="news__navigation">
                    <div class="news__prev home-prev">

                    </div>
                    <div class="news__pagination home-pagination">

                    </div>
                    <div class="news__next home-next">

                    </div>
                </div>
            </div>
                    <?
            } else {
                ?>
                Нет новостей
            <?
            }

            wp_reset_postdata(); // Сбрасываем $post
            ?>
        </div>
    </div>
</section>