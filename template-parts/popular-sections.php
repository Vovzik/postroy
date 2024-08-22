<section class="popular">
    <div class="popular__content content-popular">
        <div class="container">
            <h2 class="popular__title title-popular">Популярные разделы</h2>
            <div class="catalog catalog__items">
                <?php echo gets_best_selling_product_categories( 5 ); ?>
            </div>
        </div>
    </div>
</section>