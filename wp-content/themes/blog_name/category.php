<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blog_name
 */

get_header(); ?>

    <div class="col-8">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
				<?php
				if ( have_posts() ) : ?>
                    <header class="page-header">
						<h2 class="header-headline margin"><?php single_cat_title() ?></h2>
                    </header><!-- .page-header -->
                    <ul class="row">
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'category' );

						endwhile; ?>
                    </ul>

                    <div class="col-12 center-xs text-right pag-wrap">
						<?php
						global $wp_query;

						$big = 999999999; // need an unlikely integer

						echo paginate_links(array(
							'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
							'format' => '?paged=%#%',
							'total' => $wp_query->max_num_pages,
							'prev_text' => '',
							'next_text' => ''
						));
						?>
                    </div>

				<?php else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div>

    <div class="col-4"><?php get_sidebar(); ?></div>
<?php

get_footer();
