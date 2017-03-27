<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package deliver
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <header id="masthead" class="site-header margin" role="banner">
        <nav id="site-navigation" class="navbar navbar-toggleable-md navbar-inverse main-nav" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex flex-wrap justify-content-between logo-search-container">
                        <button class="navbar-toggler navbar-toggler-left collapsed toggle-button"
                                type="button"
                                data-toggle="collapse"
                                data-target="#navbarsExampleDefault"
                                aria-controls="navbarsExampleDefault"
                                aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon between"></span>
                        </button>
                        <div class="navbar-brand">
							<?php if ( function_exists( 'the_custom_logo' ) )  :the_custom_logo(); ?>
							<?php endif; ?>
                        </div>
                        <div class="form-inline search-container">
							<?php get_search_form() ?>
                        </div>
                    </div>
					<?php wp_nav_menu( array(
						'menu_class'      => 'd-flex justify-content-between navbar-nav light-text color-bg',
						'theme_location'  => 'menu-header',
						'menu_id'         => 'primary-menu',
						'container_class' => 'col-12 navbar-collapse collapse',
						'container_id'    => 'navbarsExampleDefault'
					) ); ?>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div id="content" class="row site-content">
