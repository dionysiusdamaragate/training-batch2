/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
require([
    "jquery",
    'mage/template',
    'jquery/ui'
], function(
        $,
        mage,
        ui
    ){
    "use strict";

    $.widget('mage.citykecamatancustomer', {
        options: {
            countryId : 'country_id',
            regionId : 'region_id',
            cityId : 'city',
            cityCopy : 'cityCopy',
            kecamatan : 'kecamatan',
            cityListCode : '',
            ajaxCity : '/citylist/ajax/citylist',
            ajaxKecamatan : '/citylist/ajax/kecamatanlist',
            ajaxCityCode : '/citylist/ajax/regionlist',
        },
        _create: function () {

            var checkInterval;
            var that = this;

            checkInterval = setInterval(function () {

                var loaderContainer = $('select[name="' + that.options.countryId + '"]');

                //Return if loader still load
                if (loaderContainer.length == 0) {
                    return;
                }

                //Remove loader and clear update interval if content loaded
                if (loaderContainer.length > 0 ) {
                    clearInterval(checkInterval);

                    //get city dropdown
                    that.getCityDropdown();

                    //get kecamatan dropdown
                    that.getKecamatanDropdown();
                    
                    that.getDefaultValueKecamatan();
                    
                    that.getSelectedKecamatan();
                }

            }, 100);

        },
        getCityDropdown:function(){
            var that = this;

            $('select[name="' + this.options.regionId + '"]').change(function(){
                window.shippingRegion = $(this).val();
				
                $.ajax({
                    method: "GET",
                    url: that.options.ajaxCity,
                    data: { region: $(this).val()}
                }).done(function( response ) {
                    $('select[name="cityCopy"]').html(response.message);
                });
            });

        },
        getKecamatanDropdown: function(){
            var that = this,
            	valueExistSTATE = $('input[name="region"]').val();
            
            $('input[name="' + this.options.cityId + '"]').hide();		
            $('input[name="' + this.options.cityId + '"]').parent().append('<select class="select" name="cityCopy" placeholder=""></select>');
            
            if(typeof valueExistSTATE === "undefined" || valueExistSTATE =="") {
				$('select[name="cityCopy"]').append($("<option></option").attr("value", "").text('Pilih Kota'));
			}

            $('select[name="' + this.options.cityCopy + '"]').change(function(){
                $('input[name="city"]').val($('select[name="cityCopy"]').val());
                $('input[name="city"]').trigger('keyup');
                window.shippingCity = $(this).val();
            });
        },
        getDefaultValueKecamatan:function(valueExistCITY) {
	        var checkInterval,
	        	getStateID,
	        	urlajaxCity = '/citylist/ajax/citylist',
	        	valueExistCITY = $('input[name="city"]').val();
			
			 checkInterval = setInterval(function () {
				 
				 var loaderContainer = $('select[name="region_id"] option');

                //Return if loader still load
                if (loaderContainer.length <= 1) {
                    return;
                }
                //Remove loader and clear update interval if content loaded
                if (loaderContainer.length > 1 ) {
	                clearInterval(checkInterval);
	                
	                var getStateID = $('select[name="region_id"]').val();
	                
					if(typeof getStateID !== "undefined") {
						window.shippingRegion = getStateID;
						
		                $.ajax({
		                    method: "GET",
		                    url: urlajaxCity,
		                    data: { region: getStateID}
		                }).done(function( response ) {
		                    $('select[name="cityCopy"]').html(response.message);
		                });						
		                
					}
                }
				 
			 }, 100);
        },
        getSelectedKecamatan:function(){
	       var checkInterval,
	        	valueExistCITY = $('input[name="city"]').val();
			
			 checkInterval = setInterval(function () {
				 
				 var loaderContainer = $('select[name="cityCopy"] option');

                //Return if loader still load
                if (loaderContainer.length <= 1) {
                    return;
                }
                //Remove loader and clear update interval if content loaded
                if (loaderContainer.length > 1 ) {
	                clearInterval(checkInterval);
					
			        $('select[name="cityCopy"] option').each(function() {
					  if($(this).val() == valueExistCITY) {
					    $(this).attr('selected', 'selected').trigger('change');            
					  }                        
					});
                }
				 
			 }, 100);
        },
        resetProvince:function(){
            $('select[name="cityCopy"]').html('<option value="">Please select a region, state or province.</option>');
        },
        resetCity:function(){
            $('select[name="cityCopy"]').html('<option value="">Pilih Kota</option>');
            $('input[name="city"]').val('');
        },
    });
    
    $(document).citykecamatancustomer();
});