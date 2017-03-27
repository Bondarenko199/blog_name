<?php
/**
 * blog_name Theme Customizer
 *
 * @package blog_name
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blog_name_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//Posts

	$wp_customize->add_section( 'post_meta_section', array(
		'title'    => __( 'Post meta options', 'blog_name' ),
		'priority' => 10
	) );
	$wp_customize->add_setting( 'post_meta_settings', array(
		'default'   => '',
//		'type'      => 'option',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_meta_settings', array(
		'label'   => __( 'Form Security', 'blog_name' ),
		'section' => 'post_meta_section',
		'type'    => 'checkbox',
		'priority' => 2,
	) ) );


	//Footer
	$wp_customize->add_setting( 'facebook', array(
		'default'   => '',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook', array(
		'label'    => __( 'Facebook URL', 'deliver' ),
		'section'  => 'title_tagline',
		'settings' => 'facebook',
		'priority' => 30
	) ) );


	$wp_customize->add_setting( 'twitter', array(
		'default'   => '',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter', array(
		'label'    => __( 'Twitter URL', 'deliver' ),
		'section'  => 'title_tagline',
		'settings' => 'twitter',
		'priority' => 30
	) ) );


	$wp_customize->add_setting( 'linkedin', array(
		'default'   => '',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin', array(
		'label'    => __( 'LinkedIn URL', 'deliver' ),
		'section'  => 'title_tagline',
		'settings' => 'linkedin',
		'priority' => 30
	) ) );





}

add_action( 'customize_register', 'blog_name_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blog_name_customize_preview_js() {
	wp_enqueue_script( 'blog_name_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'blog_name_customize_preview_js' );
