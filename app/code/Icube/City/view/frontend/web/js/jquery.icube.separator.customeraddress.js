/*
	Author	: I.CUBE, inc.
    JQuery widget for Custom Address Separator
*/

require([
	"jquery",
  	'jquery/ui'
], function($,ui){
	"use strict"
	
	$.widget("icube.separatorcustomeraddress", {
		
		_create: function() {
			this.addressFormat();
		},

		addressFormat: function() {
			
			// replace city/kecamatan to city-kecamatan
			var addresses = $('.block-content address').html();
			$('.block-dashboard-addresses address, .block-addresses-default address').each(function(){
				$(this).hide();
				var addressText = $(this).html();
				if(addressText) {
					var newAddressText = addressText.replace('/', ' - ');
					$(this).closest('.box-content').html('<address>'+newAddressText+'</address>');
					$(this).show();
				}
				
			});
			$('.block-addresses-list address').each(function(){
				$(this).hide();
				var addressText = $(this).html();
				if(addressText) {
					var newAddressText = addressText.replace('/', ' - ');
					$(this).closest('.item').html('<address>'+newAddressText+'</address>');
					$(this).show();
				}
				
			});
		}
	});
	$(document).separatorcustomeraddress();
});