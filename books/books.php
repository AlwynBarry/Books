<?php
/*
Plugin Name: Books
Plugin URI: https://wordpress.org/plugins/books/
Description: A plugin to hold details of books (title, short description, cover image, author, publisher, isbn and purchase link) by category
Version: 0.1.0
Author: Alwyn Barry
Author URI: 
License: GPLv2 or later
Text Domain: books
Domain Path: /lang/


Copyright 2022 Alwyn Barry

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// Plugin Version
define('SBL_VER', '0.1.0');


/*
 * Todo List:
 *
 */


/*
 * Definitions
 */
define('BOOKS_PLUGIN_FOLDER', plugin_basename(dirname(__FILE__)));
define('BOOKS_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . BOOKS_PLUGIN_FOLDER);
define('BOOKS_PLUGIN_URL', plugins_url( '/', __FILE__ ));


require_once BOOKS_PLUGIN_DIR . '/books-hooks.php';
require_once BOOKS_PLUGIN_DIR . '/books-posttypes.php';
require_once BOOKS_PLUGIN_DIR . '/books-metadata.php';
require_once BOOKS_PLUGIN_DIR . '/books-shortcode.php';


/*
 * Add the CSS
 */
function add_books_css() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'books-styles',  $plugin_url . "css/books.css");
}
add_action( 'wp_enqueue_scripts', 'add_books_css' );


/*
 * Get the terms of each book post in the form of classes.
 *
 * @param int $postid instance of WP_Post
 * @return string text with term classes of this book post.
 * @since 0.1.0
 */
function books_get_term_classes( $postid ) {
	$postid = (int) $postid;
	$categories = get_the_terms( $postid, 'books_category' );
	$classes = array();

	if ( $categories && ! is_wp_error( $categories ) ) {
		$classes[] = 'books-category';
		foreach ( $categories as $category ) {
			if ( isset( $category->term_id ) ) {
				$class = sanitize_html_class( $category->slug, $category->term_id );
				$classes[] = 'books-category-' . $class;
				$classes[] = 'books-category-' . $category->term_id;
			}
		}
	}
	$classes = join( ' ', $classes );
	return $classes;
}
