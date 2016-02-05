<?php 

class Custom_Nav_Menu extends Walker
{
      public $tree_type = 'category';

   public $db_fields = array ('parent' => 'parent', 'id' => 'term_id');


   public function start_lvl( &$output, $depth = 0, $args = array() ) {
      $output .= "<ul class='children'>\n";
   }

   public function end_lvl( &$output, $depth = 0, $args = array() ) {
      $output .= "</ul>\n";
   }

   public function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
      static $count = 0;
  
      $itemTitle = $count;
      $idLi  = "idLi" . ($itemTitle);  
      $hrefA = "#href" . $itemTitle;
      $idA   = "idA" . $itemTitle;

      $output .= "<li id=\"$idLi\" style=\"display:none;\"><a href=\"$hrefA\" id=\"$idA\">" . $item->title . "\n";

      $count++;
   }

   public function end_el( &$output, $item, $depth = 0, $args = array() ) {
      $output .= "</a></li>\n";
   }
}


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
