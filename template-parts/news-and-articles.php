<section class="news-and-articles">
    <div class="news-and-articles__content">
        <div class="container">
            <h1 class="news-and-articles__title">
                НОВОСТИ И СТАТЬИ
            </h1>
            <div class="news-and-articles__items items-elements-js">
                <?php query_posts('posts_per_page=4');
                while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/post-element') ?>
                <?php endwhile; ?>
            </div>
            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $max_pages = $wp_query->max_num_pages;
            if ($paged < $max_pages) {
                echo '<a id="loadmore" class="news-and-articles__btn" href="#" data-max-pages="' . $max_pages . '" data-paged="' . $paged . '">Показать еще</a>';
            }
            wp_reset_query();
            ?>
        </div>
    </div>
</section>







