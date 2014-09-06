// Fix iPhone viewport scaling bug on orientation change
// By @mathias, @cheeaun and @jdalton
if (navigator.userAgent.match(/iPhone|iPad/i)) {
	(function(doc){
		var addEvent = 'addEventListener', type = 'gesturestart', qsa = 'querySelectorAll', scales = [1, 1], meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];
		function fix() {
			meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
			doc.removeEventListener(type, fix, true);
		}
		if (( meta = meta[meta.length - 1]) && addEvent in doc) {
			fix();
			scales = [.25, 1.6];
			doc[addEvent](type, fix, true);
		}
	}(document));
}

//////////////////////////////
// Test if touch event exists
//////////////////////////////
function is_touch_device() {
	try {
		document.createEvent("TouchEvent");
		return true;
	} catch(e) {
		return false;
	}
}
/////////////////////////////////////////////
// Page Width Calculation
/////////////////////////////////////////////
var ItemBoard = {
	init : function(config) {
		this.config = config;
		this.bindEvents();
	},
	columns : 0,
	itemMargin : 20,
	itemPadding : 0,
	sidebarGap : 30,
	bindEvents : function() {
		var _self = this;
		jQuery(document).ready(function() {
			_self.elementSetup()
		});
		jQuery(window).resize(function() {
			_self.elementSetup()
		});
	},

	elementSetup : function() {
		var item = jQuery(this.config.itemElement),
				viewport_width = this.viewportWidth(),
				fixwidth,
				maxWidth,
				content_w;

		this.itemWidthOuter = this.itemWidthInner() + this.itemMargin + this.itemPadding;
		this.columns = parseInt(viewport_width / this.itemWidthOuter);

		fixwidth = this.columns * this.itemWidthInner() + ((this.columns - 1) * this.itemMargin);
		maxWidth = '100%';

		// check if there sidebar
		if(jQuery('#sidebar').length > 0){
			content_w = fixwidth - jQuery('#sidebar').width() + 15;
			
			jQuery('#content').width(content_w);
			fixwidth = fixwidth + this.sidebarGap;

			if(viewport_width < 965){
				jQuery('#content').css({width : ''}); // reset width inline
				fixwidth = this.columns * this.itemWidthInner() + ((this.columns - 1) * this.itemMargin); // reset page width
			}
		}

		// make exception for width smaller than 480px then dont apply the inline width
		// assume 480 = 1 column item and apply to only viewport <= 505
		if ((this.columns <= 1 && viewport_width <= 505) || (jQuery('.list-post').length > 0)) {
			fixwidth = 978;
			maxWidth = '94%';
		}

		jQuery(this.config.appliedTo).each(function() {
			jQuery(this).css({
				'width' : fixwidth + 'px',
				'max-width' : maxWidth
			});
		});
	},

	itemWidthInner : function() {
		var innerwidth = jQuery(this.config.itemElement).width();
		return innerwidth;
	},

	viewportWidth : function() {
		return jQuery(window).width();
	}
};

(function($) {
$.fn.bindWithDelay = function( type, data, fn, timeout, throttle ) {

	if ( $.isFunction( data ) ) {
		throttle = timeout;
		timeout = fn;
		fn = data;
		data = undefined;
	}

	// Allow delayed function to be removed with fn in unbind function
	fn.guid = fn.guid || ($.guid && $.guid++);

	// Bind each separately so that each element has its own delay
	return this.each(function() {
        
        var wait = null;
        
        function cb() {
            var e = $.extend(true, { }, arguments[0]);
            var ctx = this;
            var throttler = function() {
            	wait = null;
            	fn.apply(ctx, [e]);
            };
            
            if (!throttle) { clearTimeout(wait); wait = null; }
            if (!wait) { wait = setTimeout(throttler, timeout); }
        }
        
        cb.guid = fn.guid;
        
        $(this).bind(type, data, cb);
	});


}
})(jQuery);

jQuery(document).ready(function($) {
	
	var isTyping = null,
		delayCheck = 500;
		
	if( is_touch_device() ){
		$('body').addClass('is-touch');
	}	
	
	// Check Site Path
	$('#blogname, #blog_title').on('keyup', function(){
		if( '' == $(this).val()) return;
		$sitenamecheck = $('#sitename_check');		
		$sitetitlecheck = $('#sitetitle_check');
		$('#sitename_check, #sitetitle_check, .signup-messages').text('');
		
		clearTimeout(isTyping);
		isTyping = setTimeout(
			function(){
				clearTimeout(isTyping);
				if( '' != $('#blogname').val() ){
					
					$sitenamecheck.html(themifyScript.checking);
					
					$.post(themifyScript.ajax_url, 
					{
						action: 'themify_check_site',
						nonce: themifyScript.ajax_nonce,
						blogname: $('#blogname').val(),
						blog_title: $('#blog_title').val()
					}
					, function(response, statusText) {
						if( 'success' != statusText ){
							$('.signup-messages').text(themifyScript.networkError);
							return;
						}
						json = jQuery.parseJSON(response);
						$sitetitlecheck.html('');
						$sitenamecheck.html('');
						
			    		if(json.errors){
			    			if(json.errors.blogname)
				    			for (var error in json.errors.blogname) {
									$sitenamecheck.append('<p class="error-check error-site_name">' + json.errors.blogname[error] + '</p>');
								}
								for (var error in json.errors.blog_title) {
									$sitetitlecheck.append('<p class="error-check error-site_title">' + json.errors.blog_title[error] + '</p>');
								}
			    		}
					});
				}
			}
			, delayCheck);
	});
	// Check User Name + Email
	$('#user_name, #user_email').on('keyup', function(){
		if( '' == $(this).val()) return;
		$usercheck = $('#username_check');		
		$emailcheck = $('#email_check');
		$('#username_check, #email_check, .signup-messages').text('');
		
		clearTimeout(isTyping);
		isTyping = setTimeout(
			function(){
				clearTimeout(isTyping);
				if( '' == $('#user_email').val() ){
					return;
				} else {
					var emailOkPattern = /^([\w-\+\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					if(!emailOkPattern.test($('#user_email').val())){
						$emailcheck.html('<p class="error-check error-user_email">' + themifyScript.invalidEmail + '</p>');
						return;
					}
				}
				if( '' != $('#user_name').val() ){
					$usercheck.html(themifyScript.checking);
					$emailcheck.html(themifyScript.checking);
					
					$.post(themifyScript.ajax_url, 
					{
						action: 'themify_check_user',
						nonce: themifyScript.ajax_nonce,
						user_name: $('#user_name').val(),
						user_email: $('#user_email').val()
					}
					,
					function(response, statusText) {
						if( 'success' != statusText ){
							$('.signup-messages').text(themifyScript.networkError);
							return;
						}
						json = jQuery.parseJSON(response);
						$usercheck.html('');
						$emailcheck.html('');
						
			    		if(json.errors){
			    			if(json.errors.user_name)
				    			for (var error in json.errors.user_name) {
									$usercheck.append('<p class="error-check error-user_name">' + json.errors.user_name[error] + '</p>');
								}
							if(json.errors.user_email)
				    			for (var error in json.errors.user_email) {
				    				$emailcheck.html('<p class="error-check error-user_email">' + json.errors.user_email[error] + '</p>');
								}
			    			if(json.errors.user_email_used)
				    			for (var error in json.errors.user_email_used) {
									$emailcheck.html('<p class="error-check error-user_email_used">' + json.errors.user_email_used[error] + '</p>');
								}
			    		}
					});
				}
			}
			, delayCheck);
	});
	// Send Form
	if( $('#themify_setupform').length > 0 ){
		$('#themify_setupform').ajaxForm({
		    data: {
				action: 'themify_add_user_and_site',
				nonce: themifyScript.ajax_nonce,
				url: themifyScript.ajax_url,
				dataType: 'json'
		    },
		    beforeSubmit: function(formData, jqForm, options) {
		    	if( '' == $('#user_name').val()  ||
		    		'' == $('#user_email').val() ||
		    		'' == $('#blogname').val()   ||
		    		'' == $('#blog_title').val()){
		    		$('.signup-messages').text(themifyScript.fillfields);
		    		return false;
		    	}
		    },
		    success : function(responseText, statusText, xhr, $form) {
		    	$msg = $('.signup-messages');
		    	$msg.text('');
		    	if( 'success' != statusText ){
		    		$msg.text(themifyScript.networkError);
		    		return;
		    	}
		    	
		    	$sitenamecheck = $('#sitename_check');
				$sitenamecheck.text('');
				
				$sitetitlecheck = $('#sitetitle_check');
				$sitetitlecheck.text('');
				
		    	$usercheck = $('#username_check');
				$usercheck.text('');
				
				$emailcheck = $('#email_check');
				$emailcheck.text('');
		    	
		    	json = jQuery.parseJSON(responseText);
		    	
		    	$sitenamecheck.html('');
				$sitetitlecheck.html('');
		    	$usercheck.html('');
				$emailcheck.html('');
				
		    	if(json.errors){
	    			if(json.errors.blogname)
		    			for (var error in json.errors.blogname) {
							$sitenamecheck.append('<p class="error-check error-site_name">' + json.errors.blogname[error] + '</p>');
						}
					if(json.errors.user_name)
		    			for (var error in json.errors.user_name) {
							$usercheck.append('<p class="error-check error-user_name">' + json.errors.user_name[error] + '</p>');
						}
					if(json.errors.user_email)
		    			for (var error in json.errors.user_email) {
							$emailcheck.html('<p class="error-check error-user_email">' + json.errors.user_email[error] + '</p>');
						}
	    			if(json.errors.user_email_used)
		    			for (var error in json.errors.user_email_used) {
							$emailcheck.html('<p class="error-check error-user_email_used">' + json.errors.user_email_used[error] + '</p>');
						}
	    		} else {
	    			$('#themify_setupform').slideUp();
	    			$msg.text(themifyScript.creationOk);
	    		}
		    }
		});
	}



	/////////////////////////////////////////////
	// Initialize prettyPhoto
	/////////////////////////////////////////////
	if (screen.width>=600) {
		if( $("a[rel^='prettyPhoto']").length > 0 && (typeof($.fn.prettyPhoto) !== 'undefined') )
			$("a[rel^='prettyPhoto']").prettyPhoto({
				social_tools : false,
				deeplinking: false, overlay_gallery: false,
				// To customize theme, use 'themify_overlay_gallery_theme' filter hook
				// Use light_rounded / pp_default / light_square / dark_rounded / dark_square / facebook
				theme : themifyScript.overlayTheme,
				show_title: false
		});
	}

	/////////////////////////////////////////////
	// HTML5 placeholder fallback
	/////////////////////////////////////////////
	$('[placeholder]').focus(function() {
		var input = $(this);
		if (input.val() == input.attr('placeholder')) {
			input.val('');
			input.removeClass('placeholder');
		}
	}).blur(function() {
		var input = $(this);
		if (input.val() == '' || input.val() == input.attr('placeholder')) {
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		}
	}).blur();
	$('[placeholder]').parents('form').submit(function() {
		$(this).find('[placeholder]').each(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
			}
		})
	});

	/////////////////////////////////////////////
	// Scroll to top
	/////////////////////////////////////////////
	$('.back-top a').click(function() {
		$('body,html').animate({
			scrollTop : 0
		}, 800);
		return false;
	});

	/////////////////////////////////////////////
	// Prepend zoom icon to prettyphoto
	/////////////////////////////////////////////
	$('.post-image .lightbox').prepend('<span class="zoom"></span>');

	/////////////////////////////////////////////
	// Toggle menu on mobile
	/////////////////////////////////////////////
	$("#menu-icon").click(function() {
		$("#headerwrap #main-nav").fadeToggle();
		$("#headerwrap #searchform").hide();
		$(this).toggleClass("active");
	});

	/////////////////////////////////////////////
	// Toggle searchform on mobile
	/////////////////////////////////////////////
	$("#search-icon").click(function() {
		$("#headerwrap #searchform").fadeToggle();
		$("#headerwrap #main-nav").hide();
		$('#headerwrap #s').focus();
		$(this).toggleClass("active");
	});

});

jQuery(window).load(function() {
	
	var $container = jQuery('.loops-wrapper');
	
	// auto width
	if( $container.length > 0 && jQuery('body.grid4, body.grid3, body.grid2').length > 0 ){
		ItemBoard.init({
			itemElement : '.AutoWidthElement .post',
			appliedTo   : '.pagewidth'
		});
	}
	
	// Add social buttons
	addSocialButtons('#content');

	// isotope init
	if (jQuery('.list-post').length == 0) {
		$container.isotope({
			itemSelector : '.post',
			transformsEnabled : false
		});
		jQuery(window).resize();
	}
	
	// Get max pages for regular category pages and home
	var scrollMaxPages = themifyScript.maxPages;
	// Get max pages for Query Category pages
	if( typeof qp_max_pages != 'undefined')
		scrollMaxPages = qp_max_pages;

	// infinite scroll
	$container.infinitescroll({
		navSelector  : '#load-more a', 		// selector for the paged navigation
		nextSelector : '#load-more a', 		// selector for the NEXT link (to page 2)
		itemSelector : '#content .post', 	// selector for all items you'll retrieve
		loadingText  : '',
		donetext     : '',
		loading 	 : { img: themifyScript.loadingImg },
		maxPage      : scrollMaxPages,
		behavior	 : 'auto' != themifyScript.autoInfinite? 'twitter' : '',
		pathParse 	 : function (path, nextPage) {
			return path.match(/^(.*?)\b2\b(?!.*\b2\b)(.*?$)/).slice(1);
		}
	}, function(newElements) {
		// call Isotope for new elements
		var $newElems = jQuery(newElements).wrap('<div class="new-items" />');
		$newElems.hide().imagesLoaded(function(){
			jQuery(this).show();
			jQuery('#infscr-loading').fadeOut('normal');
			if( 1 == scrollMaxPages ){
				jQuery('#load-more, #infscr-loading').remove();
			}
			$container.isotope('appended', $newElems );
			if( jQuery("a[rel^='prettyPhoto']", $newElems).length > 0 && screen.width>=600 && (typeof(jQuery.fn.prettyPhoto) !== 'undefined') ){
				jQuery("a[rel^='prettyPhoto']", $newElems).prettyPhoto({
					social_tools : false,
					deeplinking: false, overlay_gallery: false,
					// To customize theme, use 'themify_overlay_gallery_theme' filter hook
					// Use light_rounded / pp_default / light_square / dark_square / facebook
					theme : themifyScript.overlayTheme,
					show_title: false
				});
				jQuery('.post-image .lightbox', $newElems).prepend('<span class="zoom"></span>');
			}
			addSocialButtons($newElems);
		});
		//$container.isotope('insert', jQuery(newElements)).delay(400).isotope('reLayout');
		scrollMaxPages = scrollMaxPages - 1;
		if( 1 < scrollMaxPages && 'auto' != themifyScript.autoInfinite)
			jQuery('#load-more a').show();
	});

	// disable auto infinite scroll based on user selection
	if( 'auto' == themifyScript.autoInfinite ){
		jQuery('#load-more, #load-more a').hide();
	}
	
});

function addSocialButtons($context){
	if( typeof $context === 'undefined' ) $context = jQuery('#content'); 
	// Social share
	if( jQuery('.social-share', $context).length > 0 ){
		jQuery('.twitter-share', $context).sharrre({
			share : {
				twitter : true
			},
			template : themifyScript.sharehtml,
			enableHover : false,
			click : function(api, options) {
				api.simulateClick();
				api.openPopup('twitter');
			}
		});
		jQuery('.facebook-share', $context).sharrre({
			share : {
				facebook : true
			},
			template : themifyScript.sharehtml,
			enableHover : false,
			click : function(api, options) {
				api.simulateClick();
				api.openPopup('facebook');
			}
		});
		jQuery('.pinterest-share', $context).each(function(index, domElem){
			jQuery(this).sharrre({
				share : {
					pinterest : true
				},
				buttons: { 
				   pinterest: {
						url: jQuery(this).attr('data-url'),
						media: jQuery(this).attr('data-media'),
						description: jQuery(this).attr('data-description')
					}
				},
				template : themifyScript.sharehtml,
				enableHover : false,
				urlCurl: themifyScript.sharrrephp,
				click : function(api, options) {
					api.simulateClick();
					api.openPopup('pinterest');
				}
			});
		});
		jQuery('.googleplus-share', $context).sharrre({
			share: {
				googlePlus: true
			},
			template: themifyScript.sharehtml,
			enableHover: false,
			urlCurl: themifyScript.sharrrephp,
			click: function(api, options){
				api.simulateClick();
				api.openPopup('googlePlus');
			}
		});
	}
}