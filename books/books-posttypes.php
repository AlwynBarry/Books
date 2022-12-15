<?php


// No direct calls to this script
if ( strpos($_SERVER['PHP_SELF'], basename(__FILE__) )) {
	die('No direct calls allowed!');
}


/*
 * Add Custom Book Post Type with taxonomies for Author, Publisher and Category.
 *
 * @since 0.1.0
 */
function books_post_type() {

	$labels = array(
		'name'                          => esc_attr__('Category', 'books'),
		'singular_name'                 => esc_attr__('Category', 'books'),
		'search_items'                  => esc_attr__('Search Category', 'books'),
		'popular_items'                 => esc_attr__('Popular Category', 'books'),
		'all_items'                     => esc_attr__('All Categories', 'books'),
		'parent_item'                   => esc_attr__('Parent Category', 'books'),
		'edit_item'                     => esc_attr__('Edit Category', 'books'),
		'update_item'                   => esc_attr__('Update Category', 'books'),
		'add_new_item'                  => esc_attr__('Add new Category', 'books'),
		'new_item_name'                 => esc_attr__('New Category name', 'books'),
		'not_found'                     => esc_attr__('No Category found', 'books'),
		'separate_items_with_commas'    => esc_attr__('Separate Categories with commas', 'books'),
		'add_or_remove_items'           => esc_attr__('Add or remove Categories', 'books'),
		'choose_from_most_used'         => esc_attr__('Choose Category from most used', 'books'),
		);

	$args = array(
		'label'                         => esc_attr__('Category', 'books'),
		'labels'                        => $labels,
		'public'                        => true,
		'hierarchical'                  => true,
		'show_ui'                       => true,
		'show_in_nav_menus'             => true,
		'args'                          => array( 'orderby' => 'name' ),
		'rewrite'                       => true,
		'rewrite'                       => array(
		                                        'slug' => 'books/category',
		                                        'with_front' => true,
		                                   ),
		'query_var'                     => true,
	);
	register_taxonomy( 'book_category', 'books', $args );


	unset( $labels );
	$labels = array(
		'name'                          => esc_attr__('Author', 'books'),
		'singular_name'                 => esc_attr__('Author', 'books'),
		'search_items'                  => esc_attr__('Search Authors', 'books'),
		'popular_items'                 => esc_attr__('Popular Author', 'books'),
		'all_items'                     => esc_attr__('All Authors', 'books'),
		'edit_item'                     => esc_attr__('Edit Author', 'books'),
		'update_item'                   => esc_attr__('Update Author', 'books'),
		'add_new_item'                  => esc_attr__('Add new Author', 'books'),
		'new_item_name'                 => esc_attr__('New Author name', 'books'),
		'not_found'                     => esc_attr__('No Author found', 'books'),
		'separate_items_with_commas'    => esc_attr__('Separate Authors with commas', 'books'),
		'add_or_remove_items'           => esc_attr__('Add or remove Authors', 'books'),
		'choose_from_most_used'         => esc_attr__('Choose Author from most used', 'books'),
    'parent_item'                   => null,
		'parent_item_colon'             => null,
  );

	unset( $args );
  $args = array(
		'label'                         => esc_attr__('Author', 'books'),
		'labels'                        => $labels,
		'public'                        => true,
		'hierarchical'                  => false,
		'show_ui'                       => true,
		'show_in_nav_menus'             => true,
		'args'                          => array( 'orderby' => 'name' ),
		'rewrite'                       => true,
		'rewrite'                       => array(
		                                        'slug' => 'books/author',
		                                        'with_front' => true,
		                                   ),
		'query_var'                     => true,
	);
	register_taxonomy( 'book_author', 'books', $args );


	unset( $labels );
	$labels = array(
		'name'                          => esc_attr__('Publisher', 'books'),
		'singular_name'                 => esc_attr__('Publisher', 'books'),
		'search_items'                  => esc_attr__('Search Publisher', 'books'),
		'popular_items'                 => esc_attr__('Popular Publisher', 'books'),
		'all_items'                     => esc_attr__('All Publishers', 'books'),
		'edit_item'                     => esc_attr__('Edit Publisher', 'books'),
		'update_item'                   => esc_attr__('Update Publisher', 'books'),
		'add_new_item'                  => esc_attr__('Add new Publisher', 'books'),
		'new_item_name'                 => esc_attr__('New Publisher name', 'books'),
		'not_found'                     => esc_attr__('No Publisher found', 'books'),
		'separate_items_with_commas'    => esc_attr__('Separate Publishers with commas', 'books'),
		'add_or_remove_items'           => esc_attr__('Add or remove Publishers', 'books'),
		'choose_from_most_used'         => esc_attr__('Choose Publisher from most used', 'books'),
    'parent_item'                   => null,
		'parent_item_colon'             => null,
		);

	unset( $args );
	$args = array(
		'label'                         => esc_attr__('Publisher', 'books'),
		'labels'                        => $labels,
		'public'                        => true,
		'hierarchical'                  => false,
		'show_ui'                       => true,
		'show_in_nav_menus'             => true,
		'args'                          => array( 'orderby' => 'name' ),
		'rewrite'                       => true,
		'rewrite'                       => array(
		                                        'slug' => 'books/publisher',
		                                        'with_front' => true,
		                                   ),
		'query_var'                     => true,
	);
	register_taxonomy( 'book_publisher', 'books', $args );


	unset( $labels );
	$labels = array(
		'name'                          => esc_attr__('Books', 'books'),
		'singular_name'                 => esc_attr__('Book', 'books'),
		'menu_name'                     => esc_attr__('Books', 'books'),
    'all_items'                     => esc_attr__('All Books', 'books'),
		'add_new'                       => esc_attr__('New Book', 'books'),
		'add_new_item'                  => esc_attr__('Add new Book', 'books'),
		'edit_item'                     => esc_attr__('Edit Book', 'books'),
		'new_item'                      => esc_attr__('New Book', 'books'),
		'view_item'                     => esc_attr__('View Book', 'books'),
		'search_items'                  => esc_attr__('Search Book', 'books'),
		'not_found'                     => esc_attr__('No Book found', 'books'),
		'not_found_in_trash'            => esc_attr__('No Book found in trash', 'books'),
		'parent_item_colon'             => '',
	);

	unset( $args );
	$args = array(
		'public'                        => true,
		'show_in_menu'                  => true,
		'show_ui'                       => true,
		'labels'                        => $labels,
		'hierarchical'                  => false,
    'supports' => array( 'title', 'editor',	'thumbnail', 'revisions',	),
		'capability_type'               => 'page',
		'taxonomies'                    => array( 'book_category', 'book_author', 'book_publisher', ),
		'exclude_from_search'           => false,
		'rewrite'                       => true,
		'rewrite'                       => array(
		                                        'slug' => 'books',
		                                        'with_front' => true,
		                                   ),
    'has_archive'                   => true,
    'can_export'                    => true,
    'publicly_queryable'            => true,
    'show_in_rest'                  => false,
		'menu_icon'                     => 'dashicons-book-alt',
  );
  register_post_type('books', $args );

}
add_action('init', 'books_post_type');

