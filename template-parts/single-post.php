<section class="single-post-news">
    <div class="single-post-news__content">
        <div class="container">
            <div class="single-post-news__inner">
                <div class="single-post-news__data">
                    <?php echo get_the_date() ?>
                </div>
                <h1 class="single-post-news__title">
                    <?php the_title(); ?>
                </h1>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="single-post-news__box">
                        <img class="single-post-news__img" src="<?php the_post_thumbnail_url() ?>" alt="alt">
                    </div>
                <?php endif; ?>
                <?php the_content() ?>
            </div>
        </div>
    </div>
</section>
