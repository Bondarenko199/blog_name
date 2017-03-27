<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <label class="search-label">
        <span class="screen-reader-text"><?php echo _x( '', 'label' ) ?></span>
        <input type="search" class="search-field mid-tone-text" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>" name="s"/>
    </label>
    <button type="submit" class="search-submit mid-tone-text fa fa-search" value="<?php echo esc_attr_x( '', 'submit button' ) ?>"></button>
</form>