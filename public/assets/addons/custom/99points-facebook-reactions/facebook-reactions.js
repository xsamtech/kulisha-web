/*!
 @package Facebook-Reactions-JS - A jQuery Plugin to generate Facebook Style Reactions. 
 @version version: 1.0
 @developer github: https://github.com/99points/Facebook-Reactions-JS
 
 @developed by: Zeeshan Rasool. [Founder @ http://www.99points.info & http://wallscriptclone.com]
 @customized by: Xanders Samoth. http://team.xsamtech.com/xanderssamoth
 
 @license Licensed under the MIT licenses: http://www.opensource.org/licenses/mit-license.php
*/

(function ($) {
	$.fn.facebookReactions = async function (options) {
		var settings = $.extend({
			postUrl: false, // once user will select an emoji, lets save this selection via ajax to DB.
			defaultText: '' // default text for button
		}, options);
		var reactions = await $.ajax({
			headers: headers,
			method: 'GET',
			contentType: 'application/json',
			url: `${apiHost}/reaction/find_by_group/fr/Réaction sur post`
		});
		var emoji_value;
		var _react_html = '<div style="position:absolute; z-index: 999;" class="_bar" data-status="hidden"><div class="_inner">';
		var faces = '';

		reactions.data.map(function (reaction) {
			faces = faces + `<img src="${reaction.icon_font}" class="emoji ${reaction.alias}" data-emoji-value="${reaction.reaction_name}" data-emoji-image="${reaction.image_url}" style="" />`;
		});

		_react_html = _react_html + faces;
		_react_html = _react_html + '<br clear="all" /></div></div>';

		$(_react_html).appendTo($('body'));

		// on click emotions
		$('.emoji').each(function () {
			$(this).on("click", function (e) {
				if (e.target !== e.currentTarget) return;

				var move_emoji = $(this);

				// on complete reaction
				emoji_value = move_emoji.data('emoji-image');


				return false;
			});
		});
	};

})(jQuery);

