<?php /* Template Name: Home */

get_header();
?>

<div class="col-8">
    <section class="intro">
        <div class="gradient-bg owl-container">
            <div class="owl-carousel owl-theme" id="owl">
				<?php
				$args = array(
					'post_type' => 'slide'
				);

				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) :?>
					<?php while ( $the_query->have_posts() ) : ?>
                        <div>
							<?php $the_query->the_post(); ?>
                            <div class="flex-column">
								<?php the_post_thumbnail() ?>
                                <div class="dark-bg color-border-top balloon-up slider-header">
                                    <h2 class="light-text slider-headline margin"><?php the_title(); ?></h2>
                                    <div class="light-text slider-text margin"><?php the_excerpt(); ?></div>
                                </div>
                            </div>
                        </div>
					<?php endwhile; ?>
				<?php else : //no posts ?>
				<?php endif;
				wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <section class="posts">
        <h2 class="header-headline margin"><?php echo esc_html__( 'Latest Blog Post', 'blog_name' ) ?></h2>
		<?php

		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>

				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile; ?>
            <div class="col-12 text-right center-xs pag-wrap">
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

		endif; ?>
    </section>
</div>
<div class="col-4">
	<?php get_sidebar() ?>
</div>

<?php get_footer() ?>
