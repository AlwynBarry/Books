<?php

/*
 * WordPress Actions and Filters.
 * See the Plugin API in the Codex:
 * http://codex.wordpress.org/Plugin_API
 */


// No direct calls to this script
if ( strpos($_SERVER['PHP_SELF'], basename(__FILE__) )) {
  die('No direct calls allowed!');
}


/*
 * Add link to the main plugin page.
 *
 * @since 0.1.0
 */
function books_links( $links, $file ) {
  if ( $file === plugin_basename( dirname(__FILE__) . '/books.php' ) ) {
    $links[] = '<a href="' . admin_url( 'edit.php?post_type=book' ) . '">' . esc_html__( 'Books', 'books' ) . '</a>';
  }
  return $links;
}
add_filter( 'plugin_action_links', 'books_links', 10, 2 );


/*
 * Load Language files for frontend and backend.
 *
 * @since 0.1.0
 */
function books_load_lang() {
  load_plugin_textdomain( 'books', false, BOOKS_PLUGIN_FOLDER . '/lang' );
}
add_action('plugins_loaded', 'books_load_lang');
