jQuery(document).ready(function() {

	var cartcount = jQuery('.notification-label').html();


	jQuery(".add_to_cart_button").click(function(e) {
		e.preventDefault();

		// console.log('clicked');	
		var cartcount = jQuery('.notification-label').html();
		cartcount++;
		jQuery('.notification-label.notification-label-red').html(cartcount);
	});

});


// **********************************************************************//
// Show and hide "Cart Resume"
// **********************************************************************//
jQuery(document).on( 'click', '.btn-float-cart', function(e) {
	e.preventDefault();

	jQuery('.floating-cart-resume').addClass('floating-cart-resume-show');
	jQuery('.btn-float-cart').addClass('close-floating-cart-resume');
});
jQuery(document).on( 'click', '.close-floating-cart-resume', function(e) {
	e.preventDefault();

	jQuery('.floating-cart-resume').removeClass('floating-cart-resume-show');
	jQuery('.btn-float-cart').removeClass('close-floating-cart-resume');
});


// **********************************************************************//
// Ajax remove from cart
// **********************************************************************//

jQuery(document).on( 'click', '.remove-item-btn', function(e) {
	e.preventDefault();

	var a                = jQuery( e.currentTarget );
	var div_product      = a.parents( 'div.product' );
	var cartcount        = jQuery('.notification-label.notification-label-red').html();
	var quantity         = jQuery(this).attr('data-quantity');
	
	var product_cart_key = jQuery(this).attr('data-key');

	div_product.addClass( 'removeble' );

	jQuery.ajax( {
		type:    'POST',
		url:     a.attr( 'href' ),
		success: function() {

			div_product.removeClass( 'removeble' );
			div_product.addClass( 'removed' );

			// Update qty count
			var cartcount_updated = cartcount - quantity;
			jQuery('.notification-label.notification-label-red').html(cartcount_updated);

		},
		complete: function() {
			// Use this trigger to refresh top cart after remove item
			jQuery( document.body ).trigger( 'updated_wc_div' );

			console.log(product_cart_key);

			jQuery.ajax ({
				url: mptheme_ajax_object.ajax_url,  
				type:'POST',
				data:'action=mptheme_remove_cart_single&product_cart_key=' + product_cart_key,

				success:function(results) {
					jQuery('.floating-cart-resume').empty();
					jQuery('.floating-cart-resume').append(results);
				}
			});

		}
	} );
	
});

// **********************************************************************//
// Ajax add to cart
// **********************************************************************//

jQuery(document).ready(function() {
	jQuery(".add_to_cart_button").click(function(e) {
		if (jQuery(this).hasClass('product_type_variable')) {
			var product_link = jQuery(this).attr( "href" );
			window.location.href=product_link;
		}else{
			e.preventDefault();

			jQuery(this).addClass('adding-cart');
			var product_id = jQuery(this).attr('data-product_id');

			var quantity = jQuery(this).attr('data-quantity');

			jQuery('.floating-cart-resume').empty();

			jQuery.ajax ({
				url: mptheme_ajax_object.ajax_url,  
				type:'POST',
				data:'action=mptheme_add_cart_single&product_id=' + product_id + '&quantity=' + quantity,

				success:function(results) {
					jQuery('.floating-cart-resume').append(results);
					jQuery('.floating-cart-resume').addClass('floating-cart-resume-show');
					jQuery('.btn-float-cart').addClass('close-floating-cart-resume');
				}
			});			
		}

	});
});