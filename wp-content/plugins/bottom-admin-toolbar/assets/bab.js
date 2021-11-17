jQuery(document).ready(function ($) {

	let $WPAdminBar = $('#wpadminbar');
	let $body = $('body');

	// Stop execution if adminBar length === 0
	if ($WPAdminBar.length === 0) { return; }

	// Add custom class for compatibility with /dynamic-plugins
	$WPAdminBar.addClass('bottom-admin-toolbar');

	$body.keydown(function (event) {
		let ShiftKey = event.shiftKey;
		let EventWhich = event.which;
		let ArrowDown = 40;
		if (ShiftKey && EventWhich === ArrowDown) {
			$WPAdminBar.slideToggle('fast');
		}
	});

	// FIX - TinyMCE PopUp
	function resetBar() {
		$WPAdminBar.css('top', 0);
	}
	if (typeof (tinyMCE) != "undefined") {
		tinyMCE.init({
			oninit: resetBar()
		});
	}

});