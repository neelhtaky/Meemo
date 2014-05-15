<?php
/****************************************************************
ADD THEME SUPPORT
***************************************************************/
if(function_exists('add_theme_support')) {
    add_theme_support( 'post-thumbnails' );
    add_theme_support('automatic-feed-links');
    add_theme_support( 'custom-header', $header_args );
    $formats = array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat', );
	add_theme_support( 'post-formats', $formats );
}
/* Register Sidebars */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Primary Sidebar',
		'id' => 'primary',
		'before_widget' => '<li id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer Sidebar',
		'id' => 'footer',
		'before_widget' => '<li id="%1$s" class="large-3 small-6 columns widget %2$s clearfix">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
    register_nav_menus( array(
		'nav_primary' => ( 'Primary Navigation'),
    'nav_footer' => ('Footer Navigation')
	) );
}
/******************************************************************
Custom Walker Navigation for Primary Menu DropDown
******************************************************************/
class GC_walker_nav_menu extends Walker_Nav_Menu {
  // add classes to ul sub-menus
  function start_lvl(&$output, $depth) {
    // depth dependent classes
    $indent = ( $depth > 0 ? str_repeat("\t", $depth) : '' ); // code indent
    // build html
    $output .= "\n" . $indent . '<ul class="dropdown">' . "\n";
  }
}
if (!function_exists('GC_menu_set_dropdown')) :
function GC_menu_set_dropdown($sorted_menu_items, $args) {
  $last_top = 0;
  foreach ($sorted_menu_items as $key => $obj) {
    // it is a top lv item?
    if (0 == $obj->menu_item_parent) {
      // set the key of the parent
      $last_top = $key;
    } else {
      $sorted_menu_items[$last_top]->classes['dropdown'] = 'has-dropdown';
    }
  }
  return $sorted_menu_items;
}
endif;
add_filter('wp_nav_menu_objects', 'GC_menu_set_dropdown', 10, 2);
function remove_sticky_class($classes) {
  $classes = array_diff($classes, array("sticky"));
  $classes[] = 'wordpress-sticky';
  return $classes;
}
add_filter('post_class','remove_sticky_class');
?>