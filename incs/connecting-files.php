<?php
add_action('wp_enqueue_scripts', 'my_wp_head_css' ); // хук автоматом сработает во время wp_head
function my_wp_head_css() {
    wp_enqueue_style( 'my_head_style', get_stylesheet_directory_uri() .'/assets/scss/main.css', array(), null );
}




add_action('wp_enqueue_scripts', 'my_wp_head_js' ); // хук автоматом сработает во время wp_head
function my_wp_head_js() {
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'fancybox', get_stylesheet_directory_uri() .'/assets/js/libs/jquery.fancybox.min.js', array(), null, true );
    wp_enqueue_script( 'maskphone', get_stylesheet_directory_uri() .'/assets/js/libs/mask.js', array(), null, true );
    wp_enqueue_script( 'swiper',  'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true );
    wp_enqueue_script( 'main', get_stylesheet_directory_uri() .'/assets/js/main.js', array(), null, true );

}