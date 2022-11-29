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
// Social Icons Array
$social_icons = array(
	'facebook' 				=> 'Facebook 1',
	'facebook-official'		=> 'Facebook 2',
	'facebook-square' 		=> 'Facebook 3',
	'twitter' 				=> 'Twitter 1',
	'twitter-square' 		=> 'Twitter 2',
	'google' 				=> 'Google',
	'linkedin'				=> 'Linkedin 1',
	'linkedin-square' 		=> 'Linkedin 2',
	'pinterest' 			=> 'Pinterest 1',
	'pinterest-p' 			=> 'Pinterest 2',
	'pinterest-square'		=> 'Pinterest 3',
	'behance' 				=> 'Behance 1',
	'behance-square'		=> 'Behance 2',
	'tumblr' 				=> 'Tumblr 1',
	'tumblr-square' 		=> 'Tumblr 2',
	'reddit' 				=> 'Reddit 1',
	'reddit-alien' 			=> 'Reddit 2',
	'reddit-square' 		=> 'Reddit 3',
	'dribbble' 				=> 'Dribbble',
	'whatsapp' 				=> 'Whatsapp 1',
	'square-whatsapp' 		=> 'Whatsapp 2',
	'vk' 					=> 'vKontakte',
	'odnoklassniki' 		=> 'Odnoklassniki',
	'skype' 				=> 'Skype',
	'patreon' 				=> 'Patreon',
	'film' 					=> 'Film',
	'youtube-play' 			=> 'Youtube 1',
	'youtube-square' 		=> 'Youtube 2',
	'vimeo-square' 			=> 'Vimeo',
	'twitch' 				=> 'Twitch',
	'discord' 				=> 'Discord',
	'kickstarter' 			=> 'KickStarter 1',
	'kickstarter-k' 		=> 'KickStarter 2',
	'soundcloud' 			=> 'Soundcloud',
	'instagram' 			=> 'Instagram',
	'info' 					=> 'Info 1',
	'info-circle' 			=> 'Info 2',
	'flickr' 				=> 'Flickr',
	'rss' 					=> 'RSS 1',
	'rss-square' 			=> 'RSS 2',
	'heart' 				=> 'Heart 1',
	'heart-o' 				=> 'Heart 2',
	'github' 				=> 'Github 1',
	'github-alt' 			=> 'Github 2',
	'github-square' 		=> 'Github 3',
	'stack-overflow' 		=> 'Stack Overflow',
	'qq' 					=> 'QQ',
	'weibo' 				=> 'Weibo',
	'weixin' 				=> 'Weixin',
	'xing' 					=> 'Xing 1',
	'xing-square' 			=> 'Xing 2',
	'gamepad' 				=> 'Gamepad',
	'medium' 				=> 'Medium',
	'map-marker' 			=> 'Map Marker',
	'envelope' 				=> 'Envelope 1',
	'envelope-o' 			=> 'Envelope 2',
	'envelope-square ' 		=> 'Envelope 3',
	'etsy' 					=> 'Etsy',
	'snapchat' 				=> 'Snapchat 1',
	'snapchat-square'		=> 'Snapchat 2',
	'tiktok'				=> 'Tiktok',
	'spotify'				=> 'Spotify',
	'deviantart'			=> 'DeviantArt',
	'shopping-cart'			=> 'Cart',
	'meetup' 				=> 'Meetup',
	'cc-paypal' 			=> 'PayPal',
	'credit-card' 			=> 'Credit Card',
);

$wp_customize->add_section( 'shoper_social_links' , array(
	'title'      => __('Social Links', 'shoper'),
	'priority'   => 9,
) );

$wp_customize->add_setting( 'shoper_social_links_window' , array(
    'default'   => 'facebook',
    'transport' => 'refresh',
	//'type'		 => 'option',
	//'capability' => 'edit_theme_options',
	//'sanitize_callback' => 'ashe_sanitize_select'
) );

$wp_customize->add_control( 'shoper_social_links_window', array(
	'label'     => __('Label Social Links', 'shoper'),
	'section'   => 'shoper_social_links',
	//'settings'  => 'shoper_social_links_window',
	'type'		=> 'select',
	'choices' 	=> $social_icons,
	'priority'	=> 1,
) );

$wp_customize->add_setting( 'shoper_social_url_window' , array(
    'default'   => '',
    'transport' => 'refresh',
	//'type'		 => 'option',
) );



$wp_customize->add_control( 'shoper_social_url_window', array(
	'label'      => __('Url Social Links', 'shoper'),
	'section'    => 'shoper_social_links',
	//'settings'   => 'shoper_social_links_window',
	'type'			=> 'text',
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
