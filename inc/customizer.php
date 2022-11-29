<?php
/**
 * E-shoper Theme Customizer
 *
 * @package E-shoper
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shoper_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'shoper_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'shoper_customize_partial_blogdescription',
			)
		);
	}
/*
** Social Media =====
*/

$wp_customize->add_section( 'shoper_social_links' , array(
	'title'      => __('Social Links', 'shoper'),
	'priority'   => 10,
) );

$wp_customize->add_setting( 'shoper_social_links_window' , array(
    'default'   => '#000000',
    'transport' => 'refresh',
) );

$wp_customize->add_control( 'shoper_social_links_window', array(
	'label'      => __('Label Social Links', 'shoper'),
	'section'    => 'shoper_social_links',
	'settings'   => 'shoper_social_links_window',
	'type'			=> 'select',
	'priority'	=> 1,
) );
	

}
add_action( 'customize_register', 'shoper_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function shoper_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function shoper_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function shoper_customize_preview_js() {
	wp_enqueue_script( 'shoper-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'shoper_customize_preview_js' );
