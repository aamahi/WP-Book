
<div class="container">
    <div class="row">
        <div class="col-25">
            <label for="author"> <?php _e( "Author Name", 'wp-book' );  ?> </label>
        </div>
        <div class="col-75">
            <input type="text" id="author" name="book_author" value="" placeholder="Book Author Name">
        </div>

        <div class="col-25">
            <label for="price"> <?php _e( "Price", 'wp-book' );  ?> </label>
        </div>
        <div class="col-75">
            <input type="number" id="price" name="book_price" value="" placeholder="Price">
        </div>

        <div class="col-25">
            <label for="publisher"> <?php _e( "Book Publisher", 'wp-book' );  ?> </label>
        </div>
        <div class="col-75">
            <input type="text" id="publisher" name="book_publisher" value="" placeholder="Book Publisher">
        </div>

        <div class="col-25">
            <label for="year"> <?php _e( "Year", 'wp-book' );  ?> </label>
        </div>
        <div class="col-75">
            <input type="number" id="year" name="book_year" value="" placeholder="Year">
        </div>

        <div class="col-25">
            <label for="edition"> <?php _e( "Edition", 'wp-book' );  ?> </label>
        </div>
        <div class="col-75">
            <input type="text" id="edition" name="book_edition" value="" placeholder="Book Edition">
        </div>

        <div class="col-25">
            <label for="url"> <?php _e( "URL", 'wp-book' );  ?> </label>
        </div>
        <div class="col-75">
            <input type="number" id="url" name="book_url" value="" placeholder="Book URL">
        </div>
    </div>
</div>


<?php //if( isset( $subscription_price ) ) { echo esc_attr( $subscription_price ); } ?>