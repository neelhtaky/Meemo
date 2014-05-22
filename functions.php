<?php
/****************************************************************
ADD THEME SUPPORT
***************************************************************/
if(function_exists('add_theme_support')) {
    add_theme_support( 'post-thumbnails' );
    add_theme_support('automatic-feed-links');
    add_theme_support( 'html5', array( 'search-form' ) );
    $formats = array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat', );
	add_theme_support( 'post-formats', $formats );
}
/* Register Sidebars */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Primary Sidebar',
		'id' => 'primary',
    'description' => __('The main sidebar available on all devices. Sits on the right side of the screen.'),
		'before_widget' => '<li id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
  register_sidebar(array(
    'name' => 'Secondary Sidebar',
    'id' => 'secondary',
    'description' => __('The secondary sidebar. Available for large devices and up. Sits on the left side of the screen.'),
    'before_widget' => '<li id="%1$s" class="widget %2$s clearfix">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));
	register_sidebar(array(
		'name' => 'Footer Sidebar',
		'id' => 'footer',
    'description' => __('To add extra widgets to the footer, such as contact information.'),
		'before_widget' => '<li id="%1$s" class="large-3 small-6 columns widget %2$s clearfix">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
    register_nav_menus( array(
		'nav_primary' => ( 'Primary Navigation'),
    'nav_sidebar' => ( 'Sidebar Navigation'),
    'nav_footer' => ('Footer Navigation')
	) );
}
/******************************************************************
Excerpt Read More Button
******************************************************************/
//Puts link in excerpts more tag
function new_excerpt_more($more) {
  global $post;
  return '... <div class="read_more"><a href="'. get_permalink($post->ID) . '" class="button" rel="bookmark">Read More</a></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');
/******************************************************************
Add Del and Spam buttons to comments for easy author editing
******************************************************************/
function spam_delete_comment_link($id) {
  global $comment, $post;
  if ( $post->post_type == 'page' ) {
    if ( !current_user_can( 'edit_page', $post->ID ) )
      return;
  } else {
    if ( !current_user_can( 'edit_post', $post->ID ) )
      return;
  }
  $id = $comment->comment_ID;
  if ( null === $link )
    $link = __('Edit');
  $link = '<p><a class="comment-edit-link" href="' . get_edit_comment_link( $comment->comment_ID ) . '" title="' . __( 'Edit comment' ) . '">' . $link . '</a>';
  $link = $link . ' | <a href="'.admin_url("comment.php?action=cdc&c=$id").'">Delete</a> ';
  $link = $link . ' | <a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">Spam</a></p>';
  $link = $before . $link . $after;
  return $link;
}
add_filter('edit_comment_link', 'spam_delete_comment_link');
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
/******************************************************************
WooCommerce Support
******************************************************************/
add_theme_support( 'woocommerce' );
add_filter( 'use_default_gallery_style', '__return_false' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="entries wrap" class="small-12 medium-8  large-6 xlarge-7  xxlarge-7 columns ">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

/* customise to rename home to shop home */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_home_text' );
function jk_change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Appartment'
  $defaults['home'] = 'Shop Home';
  return $defaults;
}
/* customise the breadcrumb symbol */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_delimiter' );
function jk_change_breadcrumb_delimiter( $defaults ) {
  // Change the breadcrumb delimeter from '/' to '>'
  $defaults['delimiter'] = ' &gt; ';
  return $defaults;
}
/* customise the shop home url */
add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );
function woo_custom_breadrumb_home_url() {
    return 'http://quickneed.com';
}
add_action( 'wp', 'init' );

function init() {

  if ( is_shop() ) {
    // yipee, this works!
  }

}

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment( $fragments ) {
  global $woocommerce;
  ob_start();
  ?>
  <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
  <?php
  $fragments['a.cart-contents'] = ob_get_clean();
  return $fragments;
}
// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 2; // 3 products per row
  }
}
/******************************************************************
PAGINATION PAGE SUPPORT
******************************************************************/
function kriesi_pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }
     if(1 != $pages)
     {
         echo "<ul class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li class='current'><a href='".get_pagenum_link($i)."'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
         echo "</ul>\n";
     }
}
?>