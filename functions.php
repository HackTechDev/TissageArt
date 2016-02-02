<?php 
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
}

function bbx_enqueue_scripts() {
  wp_enqueue_script( 'jquery' );
  wp_register_script( 'jscrollpane', '/wp-content/themes/tissageart/js/jquery.jscrollpane.min.js', 'jquery', '1.0.0' );
  wp_enqueue_script( 'jscrollpane');
  wp_register_script( 'jmousewheel', '/wp-content/themes/tissageart/js/jquery.mousewheel.js', 'jquery', '1.0.0' );
  wp_enqueue_script( 'jmousewheel' );
}
add_action( 'wp_enqueue_scripts', 'bbx_enqueue_scripts' );
