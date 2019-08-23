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

	// Custom Layout Options
	wp.customize( 'sagablog_layout', function( value ) {
		value.bind( function( to ) {
			$( '#page' ).removeClass( 'no-sidebar' );
                        $( '#page' ).removeClass( 'sidebar-left' );
                        $( '#page' ).removeClass( 'sidebar-right' );
			$( '#page' ).addClass( to );
		} );
	} );
        
        
} )( jQuery );
