( function( $ ) {
	wp.customize( 'header_background', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('.site-header').css("background-color" , newval);
		});
	} );

	wp.customize( 'color_top_bar', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('.top-bar').css("color" , newval);
		});
	} );

	wp.customize( 'background_top_bar', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('.top-bar').css("background-color" , newval);
		});
	} );


	wp.customize( 'typography_body', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('body').css("font-family" , newval);
		});
	} );


	wp.customize( 'typography_body_color', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('body').css("color" , newval);
		});
	} );

	wp.customize( 'typography_body_size', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('body').css("font-size" , newval);
		});
	} );

	wp.customize( 'typography_body_weight', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('body').css("font-weight" , newval);
		});
	} );




	wp.customize( 'typography_menu', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('.primary-menu li a').css("font-family" , newval);
		});
	} );


	wp.customize( 'typography_menu_color', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('.primary-menu li a').css("color" , newval);
		});
	} );

	wp.customize( 'typography_menu_size', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('.primary-menu li a').css("font-size" , newval);
		});
	} );

	wp.customize( 'typography_menu_weight', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('.primary-menu li a').css("font-weight" , newval);
		});
	} );
} )( jQuery );