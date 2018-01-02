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



	wp.customize( 'typography_h1_size', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('h1').css("font-size" , newval);
		});
	} );

	wp.customize( 'typography_h2_size', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('h2').css("font-size" , newval);
		});
	} );

	wp.customize( 'typography_h3_size', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('h3').css("font-size" , newval);
		});
	} );

	wp.customize( 'typography_h4_size', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('h4').css("font-size" , newval);
		});
	} );

	wp.customize( 'typography_h5_size', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('h5').css("font-size" , newval);
		});
	} );

	wp.customize( 'typography_h6_size', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('h6').css("font-size" , newval);
		});
	} );


	wp.customize( 'typography_h1', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('h1').css("font-family" , newval);
		});
	} );

	wp.customize( 'typography_h2', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('h2').css("font-family" , newval);
		});
	} );

	wp.customize( 'typography_h3', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('h3').css("font-family" , newval);
		});
	} );

	wp.customize( 'typography_h4', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('h4').css("font-family" , newval);
		});
	} );

	wp.customize( 'typography_h5', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('h5').css("font-family" , newval);
		});
	} );

	wp.customize( 'typography_h6', function( value ) {
		value.bind( function( newval ) {
			$('#customize-preview iframe').contents().find('h6').css("font-family" , newval);
		});
	} );
} )( jQuery );