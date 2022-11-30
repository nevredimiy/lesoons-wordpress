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

 $shoper_default = array(
	'shoper_social_media_icon_1' => '',
	'shoper_social_media_url_1' => '',
 );


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

// $social_icons = array(
// 	'facebook' 				=> 'Facebook 1',
// 	'facebook-official'		=> 'Facebook 2',
// 	'facebook-square' 		=> 'Facebook 3',
// 	'twitter' 				=> 'Twitter 1',
// 	'twitter-square' 		=> 'Twitter 2',
// 	'google' 				=> 'Google',
// 	'linkedin'				=> 'Linkedin 1',
// 	'linkedin-square' 		=> 'Linkedin 2',
// 	'pinterest' 			=> 'Pinterest 1',
// 	'pinterest-p' 			=> 'Pinterest 2',
// 	'pinterest-square'		=> 'Pinterest 3',
// 	'behance' 				=> 'Behance 1',
// 	'behance-square'		=> 'Behance 2',
// 	'tumblr' 				=> 'Tumblr 1',
// 	'tumblr-square' 		=> 'Tumblr 2',
// 	'reddit' 				=> 'Reddit 1',
// 	'reddit-alien' 			=> 'Reddit 2',
// 	'reddit-square' 		=> 'Reddit 3',
// 	'dribbble' 				=> 'Dribbble',
// 	'whatsapp' 				=> 'Whatsapp 1',
// 	'square-whatsapp' 		=> 'Whatsapp 2',
// 	'vk' 					=> 'vKontakte',
// 	'odnoklassniki' 		=> 'Odnoklassniki',
// 	'skype' 				=> 'Skype',
// 	'patreon' 				=> 'Patreon',
// 	'film' 					=> 'Film',
// 	'youtube-play' 			=> 'Youtube 1',
// 	'youtube-square' 		=> 'Youtube 2',
// 	'vimeo-square' 			=> 'Vimeo',
// 	'twitch' 				=> 'Twitch',
// 	'discord' 				=> 'Discord',
// 	'kickstarter' 			=> 'KickStarter 1',
// 	'kickstarter-k' 		=> 'KickStarter 2',
// 	'soundcloud' 			=> 'Soundcloud',
// 	'instagram' 			=> 'Instagram',
// 	'info' 					=> 'Info 1',
// 	'info-circle' 			=> 'Info 2',
// 	'flickr' 				=> 'Flickr',
// 	'rss' 					=> 'RSS 1',
// 	'rss-square' 			=> 'RSS 2',
// 	'heart' 				=> 'Heart 1',
// 	'heart-o' 				=> 'Heart 2',
// 	'github' 				=> 'Github 1',
// 	'github-alt' 			=> 'Github 2',
// 	'github-square' 		=> 'Github 3',
// 	'stack-overflow' 		=> 'Stack Overflow',
// 	'qq' 					=> 'QQ',
// 	'weibo' 				=> 'Weibo',
// 	'weixin' 				=> 'Weixin',
// 	'xing' 					=> 'Xing 1',
// 	'xing-square' 			=> 'Xing 2',
// 	'gamepad' 				=> 'Gamepad',
// 	'medium' 				=> 'Medium',
// 	'map-marker' 			=> 'Map Marker',
// 	'envelope' 				=> 'Envelope 1',
// 	'envelope-o' 			=> 'Envelope 2',
// 	'envelope-square ' 		=> 'Envelope 3',
// 	'etsy' 					=> 'Etsy',
// 	'snapchat' 				=> 'Snapchat 1',
// 	'snapchat-square'		=> 'Snapchat 2',
// 	'tiktok'				=> 'Tiktok',
// 	'spotify'				=> 'Spotify',
// 	'deviantart'			=> 'DeviantArt',
// 	'shopping-cart'			=> 'Cart',
// 	'meetup' 				=> 'Meetup',
// 	'cc-paypal' 			=> 'PayPal',
// 	'credit-card' 			=> 'Credit Card',
// );

$social_icons = array(
	'fa-brands fa-facebook-f' 			=> 'Facebook 1',
	'fa-brands fa-square-facebook'		=> 'Facebook 2',
	'fa-brands fa-facebook' 			=> 'Facebook 3',
	'fa-brands fa-twitter' 				=> 'Twitter 1',
	'fa-brands fa-twitter-square' 		=> 'Twitter 2',
	'fa-brands fa-google' 				=> 'Google',
	'fa-brands fa-linkedin-in'			=> 'Linkedin 1',
	'fa-brands fa-linkedin' 			=> 'Linkedin 2',
	'fa-brands fa-pinterest' 			=> 'Pinterest 1',
	'fa-brands fa-pinterest-p' 			=> 'Pinterest 2',
	'fa-brands fa-pinterest-square'		=> 'Pinterest 3',
	'fa-brands fa-behance' 				=> 'Behance 1',
	'fa-brands fa-behance-square'		=> 'Behance 2',
	'fa-brands fa-tumblr' 				=> 'Tumblr 1',
	'fa-brands fa-tumblr-square' 		=> 'Tumblr 2',
	'fa-brands fa-reddit' 				=> 'Reddit 1',
	'fa-brands fa-reddit-alien' 		=> 'Reddit 2',
	'fa-brands fa-reddit-square' 		=> 'Reddit 3',
	'fa-brands fa-dribbble' 			=> 'Dribbble',
	'fa-brands fa-whatsapp' 			=> 'Whatsapp 1',
	'fa-brands fa-square-whatsapp' 		=> 'Whatsapp 2',
	'fa-brands fa-vk' 					=> 'vKontakte',
	'fa-brands fa-odnoklassniki' 		=> 'Odnoklassniki',
	'fa-brands fa-skype' 				=> 'Skype',
	'fa-brands fa-patreon' 				=> 'Patreon',
	'fa-solid fa-film' 					=> 'Film',
	'fa-brands fa-youtube' 				=> 'Youtube 1',
	'fa-brands fa-square-youtube' 		=> 'Youtube 2',
	'fa-brands fa-vimeo-square' 		=> 'Vimeo',
	'fa-brands fa-twitch' 				=> 'Twitch',
	'fa-brands fa-discord' 				=> 'Discord',
	'fa-brands fa-kickstarter' 			=> 'KickStarter 1',
	'fa-brands fa-kickstarter-k' 		=> 'KickStarter 2',
	'fa-brands fa-soundcloud' 			=> 'Soundcloud',
	'fa-brands fa-instagram' 			=> 'Instagram',
	'fa-solid fa-info' 					=> 'Info 1',
	'fa-solid fa-circle-info' 			=> 'Info 2',
	'fa-brands fa-flickr' 				=> 'Flickr',
	'fa-solid fa-rss' 					=> 'RSS 1',
	'fa-solid fa-square-rss' 			=> 'RSS 2',
	'fa-solid fa-heart' 				=> 'Heart 1',
	'fa-regular fa-heart' 				=> 'Heart 2',
	'fa-brands fa-github' 				=> 'Github 1',
	'fa-brands fa-github-alt' 			=> 'Github 2',
	'fa-brands fa-github-square' 		=> 'Github 3',
	'fa-brands fa-stack-overflow' 		=> 'Stack Overflow',
	'fa-brands fa-qq' 					=> 'QQ',
	'fa-brands fa-weibo' 				=> 'Weibo',
	'fa-brands fa-weixin' 				=> 'Weixin',
	'fa-brands fa-xing' 				=> 'Xing 1',
	'fa-brands fa-xing-square' 			=> 'Xing 2',
	'fa-solid fa-gamepad' 				=> 'Gamepad',
	'fa-brands fa-medium' 				=> 'Medium',
	'fa-solid fa-location-dot' 			=> 'Map Marker',
	'fa-solid fa-envelope' 				=> 'Envelope 1',
	'fa-regular fa-envelope' 			=> 'Envelope 2',
	'fa-solid fa-square-envelope' 		=> 'Envelope 3',
	'fa-brands fa-etsy' 				=> 'Etsy',
	'fa-brands fa-snapchat' 			=> 'Snapchat 1',
	'fa-brands fa-square-snapchat'		=> 'Snapchat 2',
	'fa-brands fa-tiktok'				=> 'Tiktok',
	'fa-brands fa-spotify'				=> 'Spotify',
	'fa-brands fa-deviantart'			=> 'DeviantArt',
	'fa-solid fa-cart-shopping'			=> 'Cart',
	'fa-brands fa-meetup' 				=> 'Meetup',
	'fa-brands fa-cc-paypal' 			=> 'PayPal',
	'fa-regular fa-credit-card' 		=> 'Credit Card',
);

function shoper_add_select( $section, $id, $transport, $name, $choices, $priority ) {
	global $wp_customize;	
	$wp_customize->add_setting( $section . '_' . $id, array(
		'default' => '',
		'transport' => $transport,
	));

	$wp_customize->add_control( $section . '_' . $id, array(
		'label' => $name,
		'section' => $section,
		'priority' => 'select',
		'type' => 'select',
		'choices' => $choices
	) );
	
}

function shoper_add_url( $section, $id, $transport, $name, $priority ) {
	global $wp_customize;	
	$wp_customize->add_setting( $section . '_' . $id, array(
		'default' => '',
		'transport' => $transport,
	));

	$wp_customize->add_control( $section . '_' . $id, array(
		'label' => $name,
		'section' => $section,
		'priority' => 'select',
	) );
}

$wp_customize->add_section( 'shoper_social_media' , array(
	'title'      => __('Social Media', 'shoper'),
	'priority'   => 9,
) );

shoper_add_select( 'shoper_social_media', 'icon_1', 'postMessage', __('Select Social Icon #1', 'shoper'), $social_icons, 10 );
shoper_add_url( 'shoper_social_media', 'url_1', 'postMessage', __('URL #1 (required)', 'shoper'), 1 );	

shoper_add_select( 'shoper_social_media', 'icon_2', 'postMessage', __('Select Social Icon #2', 'shoper'), $social_icons, 20 );
shoper_add_url( 'shoper_social_media', 'url_2', 'postMessage', __('URL #2 (required)', 'shoper'), 1 );	

shoper_add_select( 'shoper_social_media', 'icon_3', 'postMessage', __('Select Social Icon #3', 'shoper'), $social_icons, 30 );
shoper_add_url( 'shoper_social_media', 'url_3', 'postMessage', __('URL #3 (required)', 'shoper'), 1 );	

shoper_add_select( 'shoper_social_media', 'icon_4', 'postMessageh', __('Select Social Icon #4', 'shoper'), $social_icons, 40 );
shoper_add_url( 'shoper_social_media', 'url_4', 'postMessage', __('URL #4 (required)', 'shoper'), 1 );	

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

function shoper_panels_js() {
	wp_enqueue_script( 'shoper-customize-controls', get_theme_file_uri( 'js/customize-makeup.js' ), array(), '1.3', true );
}
add_action( 'customize_controls_enqueue_scripts', 'shoper_panels_js' );