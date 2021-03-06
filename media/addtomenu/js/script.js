/**
 * Main JavaScript file
 *
 * @package         Add to Menu
 * @version         3.0.5
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2014 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

var addtomenu_delay = false;
(function($) {
	$(document).ready(function() {
		jQuery('<span/>', {
			id: 'addtomenu_msg',
			css: { 'opacity': 0 },
			click: function() { addtomenu_show_end() }
		}).appendTo('body');

		addtomenu_delay = false;
	});
})(jQuery);

var addtomenu_setMessage = function(msg, succes) {
	SqueezeBox.close();
	if (succes) {
		addtomenu_show_start(msg, 'success');
		addtomenu_show_end(2000);
	} else {
		addtomenu_show_start(msg, 'danger');
		addtomenu_show_end(5000);
	}
};

var addtomenu_show_start = function(msg, state) {
	(function($) {
		$('#addtomenu_msg')
			.html(msg)
			.removeClass('btn-success').removeClass('btn-danger')
			.addClass('btn-' + state).addClass('visible');

		clearInterval(addtomenu_delay);
		$('#addtomenu_msg').fadeTo('fast', 0.8);
	})(jQuery);
};

var addtomenu_show_end = function(delay) {
	(function($) {
		if (delay) {
			setTimeout(function() {
				addtomenu_show_end();
			}, delay);
		} else {
			clearInterval(addtomenu_delay);
			$('#addtomenu_msg').fadeOut();
		}
	})(jQuery);
};
