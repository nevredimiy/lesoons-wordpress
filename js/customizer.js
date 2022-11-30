/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );

	function shoper_customizer_label( id, title ) {
			$( '#customize-control-shoper_'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
	}

	shoper_customizer_label( 'social_media_icon_1', 'Social Icon #1' );
	shoper_customizer_label( 'social_media_icon_2', 'Social Icon #2' );
	shoper_customizer_label( 'social_media_icon_3', 'Social Icon #3' );
	shoper_customizer_label( 'social_media_icon_4', 'Social Icon #4' );
}( jQuery ) );
