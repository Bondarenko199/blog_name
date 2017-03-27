<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blog_name
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
		<?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta col-2">
				<?php blog_name_posted_on(); ?>
            </div><!-- .entry-meta -->
		<?php endif; ?>
        <div class="col-10 post">
            <header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title dark-text">', '</h1>' );
				else :
					the_title( '<h2 class="post-headline margin"><a href="' . esc_url( get_permalink() ) . '" class="dark-text" rel="bookmark">', '</a></h2>' );
				endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-content mid-tone-text">
				<?php
				the_content( sprintf(
				/* translators: %s: Name of current post. */
					wp_kses( __( '<span class="meta-nav">&rarr;</span>', 'blog_name' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blog_name' ),
					'after'  => '</div>',
				) );
				?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
				<?php blog_name_entry_info(); ?>
            </footer><!-- .entry-footer -->
        </div>
    </div>
</article><!-- #post-## -->
