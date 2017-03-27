<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package blog_name
 */

if ( ! function_exists( 'blog_name_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */

	function blog_name_posted_on() {
		$sticky_mod = get_theme_mod( 'post_meta_settings' ) == '1' ? the_title() : '';

		$time_string = '<time class="d-block entry-date" datetime="%1$s%2$s">
			<span class="d-block text-center dark-text color-text-hover day">%3$s</span>
			<span class="d-block text-center dark-text color-text-hover month">%4$s</span>
		</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'd' ) ),
			esc_attr( get_the_date( 'F' ) ),
			esc_html( get_the_date( 'd' ) ),
			esc_html( get_the_date( 'F' ) )
		);

		$posted_on = sprintf(
			'<a href="' . esc_url( get_permalink() ) . '" class="d-block mid-tone-bg date-link" rel="bookmark">' . $time_string . $sticky_mod . '</a> '
		);

		echo $posted_on;
		// WPCS: XSS OK.
	}

endif;

if ( ! function_exists( 'blog_name_entry_info' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function blog_name_entry_info() {

		if ( ! is_single() ) {
			$posted_on = sprintf(
				'<a href="' . esc_url( get_permalink() ) . '" class="d-inline-block main-button date-link" rel="bookmark">Continue Reading</a>'
			);

			echo $posted_on;
		}
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function blog_name_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'blog_name_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'blog_name_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so blog_name_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so blog_name_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in blog_name_categorized_blog.
 */
function blog_name_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'blog_name_categories' );
}

add_action( 'edit_category', 'blog_name_category_transient_flusher' );
add_action( 'save_post', 'blog_name_category_transient_flusher' );
