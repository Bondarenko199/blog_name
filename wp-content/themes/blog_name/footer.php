<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blog_name
 */

?>

    </div><!-- #content -->
</div>

<footer class="main-footer">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <span class="d-block light-text rights"><?php esc_html_e( '&copy; Copyright 2012', 'blog_name' ) ?></span>
            <ul class="d-flex social-media">
                <li>
                    <a href="<?php echo get_theme_mod('facebook') ?>" class="fa fa-facebook-square social-container margin mid-tone-text dark-hover"></a>
                </li>
                <li>
                    <a href="<?php echo get_theme_mod('twitter') ?>" class="fa fa-twitter-square social-container margin mid-tone-text dark-hover">
                    </a>
                </li>
                <li>
                    <a href="<?php echo get_theme_mod('linkedin') ?>" class="fa fa-linkedin-square social-container margin mid-tone-text dark-hover"></a>
                </li>
            </ul>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
