(function($) {
	$.fn.ajax_display_download_box = function() {
		$('#download-box').fadeIn("slow").show();
	  };
	  
	Drupal.behaviors.users_credits =  {
			attach: function(context, settings) {
				$('.licence-link', context).click( function(e) {
					//alert(e.pageX+ ' , ' + e.pageY);
					$('#download-box').css('top', e.pageY);
					$('#download-box').css('left', e.pageX);
				});
				$('#close', context).click( function() {
					$('#download-box').fadeOut("slow").hide();
				});
				//test tooltip
				/*
				$('#image-box-wrapper', context).click( function(){
					$('#image-box-wrapper').tooltip({
						bodyHandler: function() { 
							return "BLA BLA BLA!!!!"; 
						}, 
						showURL: false 
					});
				});
				*/
			}
	};
	
})(jQuery);

/*
	$.fn.ajax_display_proba = function() {
	    setTimeout(function() {
	      //$('#ajax-display').fadeOut().html("").show();
	      $('#proba').fadeIn().show();
	    }, 500);
	  };
	  
	$.fn.ajax_display_msg = function(status, msg) {
		$('#msg').empty();
		if (status=='error') {
			$('#msg').addClass('my_error');
		}
		else {
			$('#msg').addClass('ok');
		}
		$('#msg').append(msg).show();
	};
	
	$.fn.ajax_refresh_lightbox_block = function(lightbox_all_display_form) {
		$('#display-all-lightbox').fadeOut('slow').html(lightbox_all_display_form).fadeIn("slow");
	};
	
	Drupal.behaviors.lightbox_album =  {
			attach: function(context, settings) {
				$('#close', context).click( function() {
					$('#proba').fadeOut().hide();
					//return false;
				});
				$('.save-link', context).click( function(e) {
					//alert(e.pageX+ ' , ' + e.pageY);
					$('#proba').css('top', e.pageY);
					$('#proba').css('left', e.pageX);
				});
				$('#lightbox-block-header-open', context).click( function() {
					$('#lightbox-block-content').fadeIn("slow").show();
				});
				$('#lightbox-block-header-close', context).click( function() {
					$('#lightbox-block-content').fadeOut("slow").hide();
				});
				
				//$('#lightbox-block-header-remove', context).click( function() {
				//	
				//});
				//return false;
			}
		};
*/