<?php get_header() ?>
    <main class="main">
    <section class="basket">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content() ?>

        <?php endwhile; else: ?>
            Записей нет.
        <?php endif; ?>
    </section>

<?php get_footer() ?>