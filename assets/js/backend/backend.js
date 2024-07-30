/* Wiselogix - Custom JavaScripts */
jQuery(document).ready($ => {
	
	/* _______________________ */

	const ajaxUrl = fbm_ajax.url;
	const nonce = fbm_ajax.nonce;
	const path = fbm_ajax.path;
	
	const cl = (...params) => console.log(...params); // Shortcut for console.log(), now use cl() instead in this file
	const a = (...params) => alert(...params); // Shortcut for alert(), now use a() instead in this file

	/* _______________________ */

	// Custom function for scrolling to specific element, first offset param is required, second is option with default value of 0
	const scrollTo = (offsetSelector, offsetToMinus = 0) => {
		$('html, body').animate({
			scrollTop: Math.floor($(offsetSelector).offset().top - offsetToMinus)
		}, 'slow', 'linear');
	};
	

});