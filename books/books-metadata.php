<?php


/**
 * Custom Meta box.
 */
function books_register_meta_boxes() {
    add_meta_box( 'books_meta', __( 'Additional Details', 'bp' ), 'books_display_callback', 'books' );
}
add_action( 'add_meta_boxes', 'books_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function books_display_callback( $post ) {
    include plugin_dir_path( __FILE__ ) . 'books-metabox.php';
}

function books_save_meta_box( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $fields = [
        'book_link', 'book_image_link', 'book_isbn',
    ];
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST  ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
}
add_action( 'save_post', 'books_save_meta_box' );
