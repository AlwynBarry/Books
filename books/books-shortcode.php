<?php


// No direct calls to this script
if ( strpos($_SERVER['PHP_SELF'], basename(__FILE__) )) {
  die('No direct calls allowed!');
}


/*
 * Shortcode to be used in the content. Displays the books simply in nested DIVs that can be styled.
 *
 * Parameters:
 *   - tax_query category slugs for the categories to be displayed
 *   - posts_per_page integer, default -1 (all posts).
 *
 * @since 0.1.0
 */
function books_shortcode( $atts ) {

  $shortcode_atts = shortcode_atts( array( 'posts_per_page' => -1 ), $atts );
  $posts_per_page = (int) $shortcode_atts['posts_per_page'];
  if ( $posts_per_page === -1 ) {
    $nopaging = true;
  } else {
    $nopaging = false;
  }

  $output = '';

  $tax_query = array();
  if ( ! empty( $atts['category'] ) ) {
    $cat_in = explode( ',', $atts['category'] );
    if ( ! empty( $cat_in ) ) {
      $tax_query['relation'] = 'OR';
      $tax_query[] = array(
        'taxonomy'         => 'book_category',
        'terms'            => $cat_in,
        'field'            => 'slug',
        'include_children' => true,
      );
    }
  }

  $args = array(
    'post_type'      => 'books',
    'post_status'    => 'publish',
    'posts_per_page' => $posts_per_page,
    'nopaging'       => $nopaging,
    'orderby'        => 'name',
    'order'          => 'ASC',
    'tax_query'      => $tax_query,
  );

  // The Query
  $the_query = new WP_Query( $args );

  // The Loop
  if ( $the_query->have_posts() ) {
    $output .= '
    <div class="books">
    ';

    while ( $the_query->have_posts() ) {
      $the_query->the_post();

      /* Output all the book details */
      $classes = books_get_term_classes( get_the_ID() );
      $output .= '
      <div class="book ' . $classes . '">
      ';
      /* Output the book image - first try the image URL, and if not available try the Thumbnail */
      $image_url = get_post_meta( get_the_ID(), 'book_image_link', true );
      if ( empty( $image_url ) ) {
        $image_url = get_the_post_thumbnail_url( get_the_ID() );
      }
      $output .= '      
        <div class="book-image-container"><img class="book-image" src="' . $image_url . '"></div><!-- book-image-container -->
      ';
      $output .= '      
        <div class="book-details-container">
      ';
      /* Output the book title, with the URL link if provided */
      $output .= '      
          <div class="book-title">';
      $url = get_post_meta( get_the_ID(), 'book_link', true );
      if ($url) {
        $output .= '<a href="' . $url . '" target="_blank">' . get_the_title() . '</a>';
      } else {
        $output .= get_the_title();
      }
      $output .= '</div><!-- book-title -->
      ';

      /* Output the book description */
      $output .= '
          <div class="book-description">
          ' . get_the_content() . '
          </div><!-- book-description -->
      ';

      /* Output the meta data for the book */
      $authors = get_the_terms( get_the_ID(), 'book_author' );
      $publishers = get_the_terms( get_the_ID(), 'book_publisher' );
      $isbn = get_post_meta( get_the_ID(), 'book_isbn', true );
      if ( ( !empty( $authors ) ) || ( !empty( $publishers ) ) || ( !empty( $isbn ) ) ) {
        $output .= '
          <div class="book-meta">
        ';

        /* Get the author terms related to post and output them */
        if ( !empty( $authors ) ) {
          $output .= '
              <div class="book-authors">
                <span class="author-label">' . esc_html__( 'Author', 'books' ) . ': </span>
          ';
          foreach ( $authors as $author ) {
            $output .= '<span class="book-author">' . $author->name . '</span>';
          }
          $output .= '
              </div><!-- book-authors -->
          ';
        }

        /* Get the publisher terms related to post and output them */
        if ( !empty( $publishers ) ) {
          $output .= '
            <div class="book-publishers">
              <span class="publisher-label">' . esc_html__( 'Publisher', 'books' ) . ': </span>
        ' ;
          foreach ( $publishers as $publisher ) {
            $output .= '<span class="book-publisher">' . $publisher->name . '</span>';
          }
          $output .= '
            </div><!-- book-publishers -->
          ';
        }
        
        /* Output the ISBN */
        if ( !empty( $isbn ) ) {
          $output .= '
            <div class="book-isbn">
              <span class="book-isbn-label">' . esc_html__( 'ISBN', 'books' ) . ': </span>
              <span class="book-isbn-number">' . $isbn . '</span>
            </div><!-- book-isbn -->
          ';
        }
        $output .= '
          </div><!-- book-meta -->
        ';
      }

      $output .= '
        </div><!-- book-details-container -->
      ';

      /* Output the edit link if the user is logged in */
      $postlink = '';
      if ( is_user_logged_in() ) {
        $postlink = get_edit_post_link( get_the_ID() );
        if ( strlen( $postlink ) > 0 ) {
          $output .= '
          <div class="book-edit-link">
            <a class="post-edit-link" href="' . esc_attr( $postlink ) . '">' . esc_html__('Edit', 'books') . '</a>
          </div><!-- book-edit-link -->
          ';
        }
      }

      $output .= '
      </div><!--book ' . $classes . ' -->
      ';

    }

    $output .= '
    </div><!-- books -->
    ';

  } else {
    // no posts found
    esc_html__( 'No books found', 'books' );
  }
  /* Restore original Post Data */
  wp_reset_postdata();

  return $output;

}
add_shortcode( 'books', 'books_shortcode' );

