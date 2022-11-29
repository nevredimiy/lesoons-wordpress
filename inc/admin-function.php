<?php

add_action( 'admin_menu', 'shoper_add_admin_page' );

function shoper_add_admin_page() {
    $hook_suffix = add_menu_page( __('Shoper Theme Options', 'shoper'), __('ShoperTheme', 'shoper'), 'manage_options', 'shoper-options', 'shoper_create_page', 'dashicons-visibility', 45 );

    add_action( "admin_print_scripts-{$hook_suffix}", 'shoper_admin_scripts'); 
    add_action( 'admin_init', 'shoper_custom_settings' );
}

function shoper_custom_settings() {
    register_setting( 'shoper_general_group', 'main_post' );

    register_setting( 'shoper_general_group', 'main_post_cnt', function($input) {
        $input = abs( (int) $input );

        return ( $input < 5 ) ? $input : 4;
    } );

    add_settings_section( 'shoper_general_section', __('Home page setting', 'shoper'), '', 'shoper-options' );

    add_settings_field( 'main_post', __('Home article', 'shoper'), 'shoper_general_main_post', 'shoper-options', 'shoper_general_section' );

    add_settings_field( 'main_post_cnt', __('Quontity posts in block', 'shoper'), 'shoper_general_main_post_cnt', 'shoper-options', 'shoper_general_section', array( 'label_for' => 'main_post_cnt' ) );
}

function shoper_general_main_post_cnt() {
    $main_post_cnt = abs( ( int ) get_option( 'main_post_cnt' ) );
    echo '<input type="number" min="0" max="4" name="main_post_cnt" class="regular-text" id="main_post_cnt" value="' . $main_post_cnt . '">';
}

function shoper_general_main_post() {
    $main_post_id = esc_attr( get_option( 'main_post' ) );

    if ( $main_post_id ) {
        $main_post = get_post( $main_post_id );
    }
    $main_post_title = ! empty( $main_post ) ? $main_post->post_title : '';
    
    echo '<input type="text" id="main_post" class="regular-text">';
    
    echo '<p class="description" id="main_post_title">';
    if ( $main_post_title ) {
		echo '<strong>' . __( 'Post selected: ', 'mundana' ) . '</strong>' . $main_post_title . ' <button class="button delete-main-post"><span class="dashicons dashicons-trash"></span></button>';
	}
	echo '</p>';

	echo '<input type="hidden" id="main_post_id" name="main_post" value="' . $main_post_id . '">';
   
}

function shoper_create_page() {
    require get_template_directory() . '/inc/templates/shoper-options.php';
}

function shoper_admin_scripts() {
    wp_enqueue_style( 'shoper-jquery-ui-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.1/themes/base/jquery-ui.css' );
    wp_enqueue_style( 'shoper-admin-style', get_template_directory_uri() .'/assets/css/admin-main.css' );    
    wp_register_script( 'shoper-admin-js', get_template_directory_uri() .'/assets/js/admin-main.js', array( 'jquery', 'jquery-ui-autocomplete' ), false, true );
    wp_localize_script( 'shoper-admin-js', 'shoperObject', array(
        'nonce' => wp_create_nonce( 'shoper-nonce' ),
        'post_selected' => __( 'Post selected: ', 'shoper' ),
    ) );
    wp_enqueue_script( 'shoper-admin-js' );
}



/*
*   Ajax function
*/
add_action('wp_ajax_main_post_action', function() {
    check_ajax_referer( 'shoper-nonce' );
    $main_post_s = $_GET['term'];

    $main_post_s = $_GET['term'];

	$main_posts = get_posts( array(
		's'              => $main_post_s,
		'posts_per_page' => 10,
	) );

	$result = [];
	if ( $main_posts ) {
		foreach ( $main_posts as $main_post ) {
			$res['label'] = $main_post->post_title;
			$res['id'] = $main_post->ID;
			$result[] = $res;
		}
	}

	echo json_encode( $result );
	wp_die();

} );
