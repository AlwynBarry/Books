<div class="books_meta_box">
    <div class="meta-options book-field" style="margin-bottom: 0.7rem;">
        <label for="book_link">Book Link:</label>
        <input id="book_link"
            style="width: calc(100% - 6rem) !important;"
            type="text"
            name="book_link"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'book_link', true ) ); ?>">
    </div>
    <div class="meta-options book-field" style="margin-bottom: 0.7rem;">
        <label for="book_link">Book Cover Link:</label>
        <input id="book_image_link"
            style="width: calc(100% - 8rem) !important;"
            type="text"
            name="book_image_link"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'book_image_link', true ) ); ?>">
    </div>
    <div class="meta-options book-field">
        <label for="book_link">ISBN:</label>
        <input id="book_isbn"
            type="text"
            name="book_isbn"
            pattern="[1-9]{1}[0-9]{9}"
            maxlength="10"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'book_isbn', true ) ); ?>">
    </div>
</div>
