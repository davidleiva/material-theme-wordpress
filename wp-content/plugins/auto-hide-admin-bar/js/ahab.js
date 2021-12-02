jQuery(document).ready(function ($) {

	function ahadMain() {

		// doNothing function is for enabling hoverIntent to work with two layers.
		function doNothing() {
		}

		// Show the Admin Bar
		function adminBarIn() {
			$('#wpadminbar').animate({'top': '0px'}, ahab['ahab_anim_speed']);
			$('body').animate({'margin-top': '0px'}, ahab['ahab_anim_speed']);
			$('body').animate({'background-position-y': '0px'}, ahab['ahab_anim_speed']);
			if ('twentyfourteen' == themeName) {
				$('.admin-bar.masthead-fixed .site-header').animate({'top': '32px'}, ahab['ahab_anim_speed'])
			}
		}

		// Hide the Admin Bar
		function adminBarOut() {
			if (windowSize > 782) {
				$('#wpadminbar').animate({'top': '-32px'}, ahab['ahab_anim_speed']);
				$('body').animate({'margin-top': '-32px'}, ahab['ahab_anim_speed']);
				$('body').animate({'background-position-y': '-32px'}, ahab['ahab_anim_speed']);
				if ('twentyfourteen' == themeName) {
					$('.admin-bar.masthead-fixed .site-header').animate({'top': '0px'}, ahab['ahab_anim_speed'])
				}
			} else {
				if (1 == ahabMobile) {
					$('#wpadminbar').animate({'top': '-46px'}, ahab['ahab_anim_speed']);
					$('body').animate({'margin-top': '-46px'}, ahab['ahab_anim_speed']);
					$('body').animate({'background-position-y': '-46px'}, ahab['ahab_anim_speed']);
					if ('twentyfourteen' == themeName) {
						$('.admin-bar.masthead-fixed .site-header').animate({'top': '-46px'}, ahab['ahab_anim_speed'])
					}
				}
			}
		}

		// check if page is in iframe & user is logged in - if so, customizer is active
		var isInIframe = (window.location != window.parent.location) ? true : false;

		var beaverBuilderActive = $('html').hasClass("fl-builder-edit");

		/** Start a MutationObserver to keep an eye on the change of the body classes,
		 *  which indicates Beaver Builder editor is closed.
		 */
		if (beaverBuilderActive) {
			// element to watch
			var element, observerConfig, bodyObserver;
			element = $('html');
			// only look for attribute changes
			observerConfig = {attributes: true};
			bodyObserver = new MutationObserver(function (mutations) {
				mutations.forEach(function (mutation) {
					var newVal = $(mutation.target).prop(mutation.attributeName);
					if (mutation.attributeName === "class") {
						// check if  html class has changed, check if fl-builder-edit is in it
						if (!$('html').hasClass("fl-builder-edit")) {
							console.log("MutationObserver class changed to", newVal);
							ahadMain();
						}
					}
				})
			})
			// Observe. And protect.
			bodyObserver.observe(element[0], observerConfig);

		}

		if (!isInIframe && ($('#wpadminbar').length === 1) && !beaverBuilderActive) {

			var themeName = ahab['theme_name'];
			var windowSize = $(window).width();
			var ahabMobile = parseInt(ahab['ahab_mobile'], 10);
			var ahabArrow = parseInt(ahab['ahab_arrow'], 10);
			var ahabArrowPos = ahab['ahab_arrow_pos'];
			var ArrowPosStyle = '';

			if (windowSize > 782) {
				$('#wpadminbar').css('top', '-32px');
				$('body').css('margin-top', '-32px');
				if ('twentyfourteen' == themeName) {
					$('.admin-bar.masthead-fixed .site-header').css('top', '0px');
				}

			} else {
				if (1 == ahabMobile) {
					$('#wpadminbar').css('z-index', '99999 !important');
					$('#wpadminbar').css('cssText', 'z-index: 99999 !important; top: -46px;');
					$('body').css('margin-top', '-46px');
				} else {
					$('#wpadminbar').css('top', '0px');
					$('body').css('margin-top', '0px');
				}
			}
			// add arrow div

			if (($('div#arrow').length === 0) && (2 == ahabArrow)) {

				if (ahabArrowPos) {
					if ('left' == ahabArrowPos) {
						console.log(ahabArrowPos);
						ArrowPosStyle = 'left: 0';
					}
					if ('right' == ahabArrowPos) {
						ArrowPosStyle = 'right: 0';
					}
				}
				$('body').append('<div style="padding: 4px; position:fixed; top:0; ' + ArrowPosStyle + '" id="arrow"><span style="text-shadow: 0 0 4px white;" class="dashicons dashicons-arrow-down-alt"></span></div>');
			}

			if ($('#hiddendiv').length === 0) {
				$('body').append('<div id=\'hiddendiv\'></div>');
			}

			// hiddendiv should exist now so let's do some magic with it.

			autohide = $('#hiddendiv');

			autohide.css('width', '100%');
			if ((windowSize < 782) && (1 == ahabMobile)) {
				autohide.css('min-height', '46px');
			} else {
				autohide.css('min-height', '32px');
			}
			autohide.css('z-index', '99998'); // admin bar is at z-index: 99999;
			autohide.css('position', 'fixed');
			autohide.css('top', '0px');
			var configIn = {
				over       : adminBarIn, // function = onMouseOver callback (REQUIRED)
				sensitivity: 6,
				out        : doNothing // function = onMouseOut callback (REQUIRED)
			};
			var configOut = {
				over    : doNothing, // function = onMouseOver callback (REQUIRED)
				timeout : ahab['ahab_delay'], // number = milliseconds delay before onMouseOut
				interval: ahab['ahab_interval'], // number = millseconds interval for mouse polling
				out     : adminBarOut // function = onMouseOut callback (REQUIRED)
			};

			autohide.hoverIntent(configIn);
			$('#wpadminbar').hoverIntent(configOut);
		}

		// do something when key pressed - using jquery.hotkeys.js library
		// https://github.com/jeresig/jquery.hotkeys
		// and it's included in WordPress :)

		// build string for hotkey to add
		var hotKey = new Array();

		if (ahab['ahab_keyboard_alt'] == 'Alt') {
			hotKey.push('alt')
		}

		if (ahab['ahab_keyboard_ctrl'] == 'Ctrl') {
			hotKey.push('ctrl')
		}

		if (ahab['ahab_keyboard_shift'] == 'Shift') {
			hotKey.push('shift')
		}

		if (ahab['ahab_keyboard_char']) {
			hotKey.push(ahab['ahab_keyboard_char'])
		}

		$.hotkeys.add(hotKey.join('+'), function () {

			if ($('#wpadminbar').css('top') == '0px') {
				adminBarOut()
			} else {
				adminBarIn();
			}
		});
	}

	$(document).ready(ahadMain);
	$(window).on('resize', ahadMain);
});
