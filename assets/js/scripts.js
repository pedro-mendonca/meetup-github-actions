/* global alert, document, wp */
document.addEventListener( 'DOMContentLoaded', function() {
	console.log( 'Loaded scripts.js' );

	doSomeMagic();

	/**
	 * Do some magic.
	 *
	 * @since 1.0.0
	 */
	function doSomeMagic() {

		console.log( 'Mixing the ingredients...' );
		console.log( 'Casting the spell...' );

		alert( wp.i18n.__( 'Abracadabra! Your WordPress is now a frog! Kiss to cancel.', 'meetup-github-actions' ) );

		console.log( 'Croac croac croac...' );
	}
} );

