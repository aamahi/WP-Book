
<div class="container">
    <div class="row">
        <div class="col-25">
            <label for="price"> <?php _e( "Price", 'wp-book' );  ?> </label>
        </div>
        <div class="col-75">
            <input type="number" id="price" name="subscription_price" value="" placeholder="Price">
        </div>
    </div>
</div>


<?php //if( isset( $subscription_price ) ) { echo esc_attr( $subscription_price ); } ?>