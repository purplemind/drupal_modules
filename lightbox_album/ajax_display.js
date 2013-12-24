(function($) {
	$.fn.ajax_hide_proba = function() {
	    //$('#proba').hide();
	    setTimeout(function() {
	      //$('#ajax-display').fadeOut().html("").show();
	      $('#proba').fadeOut().hide();
	    }, 1500);
	  };

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
				/*
				$('#lightbox-block-header-remove', context).click( function() {
					
				});*/
				//return false;
			}
		};
/*	
	Drupal.behaviors.lightbox_album = {
			attach: function (context, settings) {
				//alert("Proba!");
				$('.content img', context).click(function () {
					//$('#lightbox-display-all').fadeOut(100);
					//$('#lightbox-display-all').fadeIn(500);
					$('#proba').show();
					$('#proba').addClass('changed');
					//alert("Proba!");
				});
			}
	};
*/

})(jQuery);