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
		} )
	});

	//Update site social media in real time...
	wp.customize( 'shoper_social_media_icon_1', function( value ) {
		value.bind( function( newval ) {
				$('#shoper_social_media_1 a i').removeClass().addClass( newval );
				if (newval == 'no-class'){
					$('#shoper_social_media_1').addClass('hide');
				}else{					
					$('#shoper_social_media_1').removeClass('hide');
				}
		} );
	} );

	//Update site social media in real time...
	wp.customize( 'shoper_social_media_url_1', function( value ) {
		value.bind( function( newval ) {
			$('#shoper_social_media_1 a').attr( 'href', newval );
		} );
	} );

	//Update site social media in real time...
	wp.customize( 'shoper_social_media_icon_2', function( value ) {
		value.bind( function( newval ) {
				$('#shoper_social_media_2 a i').removeClass().addClass( newval );
				if (newval == 'no-class'){
					$('#shoper_social_media_2').addClass('hide');
				}else{					
					$('#shoper_social_media_2').removeClass('hide');
				}
		} );
	} );


	//Update site social media in real time...
	wp.customize( 'shoper_social_media_url_2', function( value ) {
		value.bind( function( newval ) {
			$('#shoper_social_media_2 a').attr( 'href', newval );
		} );
	} );


	//Update site social media in real time...
	wp.customize( 'shoper_social_media_icon_3', function( value ) {
		value.bind( function( newval ) {
			console.log(newval);
			$('#shoper_social_media_3 a i').removeClass().addClass( newval );
			if (newval == 'no-class'){
				$('#shoper_social_media_3').addClass('hide');
			}else{					
				$('#shoper_social_media_3').removeClass('hide');
			}
		} );
	} );

	//Update site social media in real time...
	wp.customize( 'shoper_social_media_url_3', function( value ) {
		value.bind( function( newval ) {
			$('#shoper_social_media_3 a').attr( 'href', newval );
		} );
	} );

	//Update site social media in real time...
	wp.customize( 'shoper_social_media_icon_4', function( value ) {
		value.bind( function( newval ) {
			console.log(newval);
			$('#shoper_social_media_4 a i').removeClass().addClass( newval );
			if (newval == 'no-class'){
				$('#shoper_social_media_4').addClass('hide');
			}else{					
				$('#shoper_social_media_4').removeClass('hide');
			}
		} );
	} );

	
	wp.customize( 'shoper_social_media_url_4', function( value ) {
		value.bind( function( newval ) {
			$('#shoper_social_media_4 a').attr( 'href', newval );
		} );
	} );

}( jQuery ) );
