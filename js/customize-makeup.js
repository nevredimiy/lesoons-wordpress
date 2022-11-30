/* 
 *	Приводим в порядок внешний вид костомайзер меню - "Соц сети"
 *	Decorate the appearance of the menu customizer - "Social Media"
 */
 

( function( $ ) {
	function shoper_customizer_label( id, title ) {
			$( '#customize-control-shoper_'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
	}

	shoper_customizer_label( 'social_media_icon_1', 'Social Icon #1' );
	shoper_customizer_label( 'social_media_icon_2', 'Social Icon #2' );
	shoper_customizer_label( 'social_media_icon_3', 'Social Icon #3' );
	shoper_customizer_label( 'social_media_icon_4', 'Social Icon #4' );
} ) ( jQuery );
