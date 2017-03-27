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
	    <?php
	    var_dump('LOL');
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

		    endwhile;

		    the_posts_navigation();

	    else :

		    get_template_part( 'template-parts/content', 'none' );

	    endif; ?>
    </section>
</div>
<div class="col-4">
	<?php get_sidebar() ?>
</div>

<section class="about-us">
    <div class="container">
        <!--	    --><?php
		//	    $the_slug = 'about-us';
		//	    $args = array(
		//		    'name'           => $the_slug,
		//		    'post_type'      => 'post',
		//		    'post_status'    => 'publish',
		//		    'posts_per_page' => 1
		//	    );
		//	    $query = new WP_Query( $args );
		//	    if ($query->have_posts()):?>
        <!--		    --><?php //while ( $query->have_posts() ) : $query->the_post(); ?>
        <!--                <div class="row d-flex">-->
        <!--                    <div class="col-md-5 section-header margin">-->
        <!--                        <h2 class="headline margin">-->
        <!--                            --><?php //the_title(); ?>
        <!--                        </h2>-->
        <!--                        <span class="refinement">-->
        <!--                            --><?php //foreach (get_post_custom_values('refinement') as $value) : echo $value?>
        <!--                            --><?php //endforeach; ?>
        <!--                        </span>-->
        <!--                    </div>-->
        <!--                    <div class="col-md-7">-->
        <!--                        <div class="main-text margin">--><?php //the_excerpt(); ?><!--</div>-->
        <!--                        <a href="--><?php //the_permalink(); ?><!--" class="main-button" data-text="Read more">Read more</a>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--		    --><?php //endwhile; ?>
        <!--	    --><?php //else : //no posts ?>
        <!--	    --><?php //endif; wp_reset_postdata(); ?>

        <div class="row d-flex">
            <div class="col-md-5 section-header margin">
                <h2 class="headline margin"><?php echo get_theme_mod( 'section_2_headline' ) ?></h2>
                <span class="refinement"><?php echo get_theme_mod( 'section_2_refinement' ) ?></span>
            </div>
            <div class="col-md-7">
                <p class="main-text margin"><?php echo get_theme_mod( 'section_2_text' ) ?></p>
                <a href="#" class="main-button" data-text="Read more">Read more</a>
            </div>
        </div>
    </div>
</section>
<section class="services">
    <div class="container">
        <div class="section-header margin">
            <h2 class="headline margin"><?php echo get_theme_mod( 'section_3_headline' ) ?></h2>
            <span class="refinement"><?php echo get_theme_mod( 'section_3_refinement' ) ?></span>
        </div>
    </div>
</section>

<?php get_footer() ?>
