<?php if ( has_post_thumbnail() ) : ?>
    <li class="col-6 thumbnail margin">
        <div class="entry-content mid-tone-text">
            <header class="thumbnail-header color-bg">
                <h2 class="text-uppercase dark-text post-headline">
	                <?php echo wp_trim_words( get_the_title(), 5) ?>
                </h2>
            </header><!-- .entry-header -->
            <a href="<?php echo get_post_permalink() ?>" class="d-flex flex-column justify-content-end light-text thumbnail-hover" rel="bookmark">
                <p class="hover-text"><?php echo wp_trim_words( get_the_content(), 10 ); ?></p>
            </a>
			<?php the_post_thumbnail( 'medium', array(
					'class' => "img-responsive",
				)
			); ?>
        </div><!-- .entry-content -->
    </li>
<?php endif; ?>
