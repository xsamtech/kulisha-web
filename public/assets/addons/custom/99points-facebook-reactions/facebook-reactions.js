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
			faces = faces + `<img src="${reaction.icon_font}" class="emoji ${reaction.alias}" data-emoji-id="${reaction.id}" data-emoji-value="${reaction.reaction_name}" data-emoji-image="${reaction.image_url}" style="" />`;
		});

		_react_html = _react_html + faces;
		_react_html = _react_html + '<br clear="all" /></div></div>';

		$(_react_html).appendTo($('body'));

		var _bar = $('._bar');
		var _inner = $('._inner');

		// on click emotions
		$('.emoji').each(function (index, element) {
			$(this).on('click', function (e) {
				if (e.target !== e.currentTarget) {
					return;
				}

				var base = $(this).parent().parent().parent();
				var move_emoji = $(this);
				// on complete reaction
				emoji_id = move_emoji.data('emoji-id');
				emoji_value = move_emoji.data('emoji-value');

				if (move_emoji) {
					var cloneemoji = move_emoji.clone().offset({
						top: move_emoji.offset().top,
						left: move_emoji.offset().left

					}).css({
						'height': '40px',
						'width': '40px',
						'opacity': '0.9',
						'position': 'absolute',
						'z-index': '99'

					}).appendTo($('body')).animate({
						'top': base.offset().top + 5,
						'left': base.offset().left + 10,
						'width': 30,
						'height': 30

					}, 300, 'easeInBack');

					cloneemoji.animate({
						'width': 27,
						'height': 27

					}, 100, function () {
						var _imgicon = $(this);

						_imgicon.fadeOut(100, function () {
							_imgicon.detach();
							// add icon class
							base.attr('data-emoji-class', emoji_value);
							// change text
							base.find('span').html(emoji_value);

							if (settings.postUrl) {
								__ajax(base.attr('data-unique-id'), emoji_id);
							}
						});
					});
				}

				return false;
			});
		});

		// Ajax
		function __ajax(post_id, reaction_id) {
			$.ajax({
				headers: headers,
				type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url: settings.postUrl, // the url where we want to POST
				data: formData, // our data object
				success: function (data) {
					// nothing requires here but you can add something here. 
					console.log(data);
				},
				error: function () {
					alert('<p>An error has occurred</p>');
				}
			});
		}

		return this.each(function () {
			var _this = $(this);
			window.tmr;
			window.selector = _this.get(0).className;

			$(this).find('span').click(function (e) {
				if (e.target !== e.currentTarget) return;
				var isLiked = $(this).parent().attr('data-emoji-class');
				var control_id = $(this).parent().attr('data-unique-id');

				$(this).html(settings.defaultText);

				if (isLiked) {
					$(this).parent().attr('data-emoji-class', '');

					if (settings.postUrl) {
						__ajax(control_id, null);
					}

				} else {
					$(this).parent().attr('data-emoji-class', 'i_like_post');

					if (settings.postUrl) {
						__ajax(control_id, 'i_like_post');
					}
				}
			});

			// Event handler for hover
			$(this).hover(function () {
				if ($(this).hasClass('emoji')) {
					return false;
				}

				if ($(this).hasClass('open') === true) {
					clearTimeout(window.tmr);

					return false;
				}

				$('.' + window.selector).each(function () {
					__hide(this);
				});

				if (_bar.attr('data-status') != 'active') {
					__show(this);
				}

			}, function () {
				var _this = this;
				window.tmr = setTimeout(function () {
					__hide(_this);
				}, 1000);
			});

			// Event handler for click
			$(this).on('click', function () {
				if ($(this).hasClass('emoji')) {
					return false;
				}

				// If the item is already open, you can decide to close it or do another action.
				if ($(this).hasClass("open")) {
					// Action to close
					__hide(this);

				} else {
					// Action to open
					$('.' + window.selector).each(function () {
						__hide(this);
					});

					if (_bar.attr('data-status') != 'active') {
						__show(this);
					}
				}
			});

			// functions
			function __hide(_this) {
				_bar.attr('data-status', 'hidden');
				_bar.hide();

				$('.open').removeClass('open');

				_inner.removeClass('ov_visi');
			}

			function __show(_this) {
				clearTimeout(window.tmr);

				$(_this).append(_bar.fadeIn());

				_bar.attr('data-status', 'active');
				_inner.addClass('ov_visi');

				$(_this).addClass('open');

				// vertical or horizontal
				var position = $(_this).data('reactions-type');

				if (position == 'horizontal') {
					_inner.css('width', '240px');
					// Set main bar position top: -50px; left:0px;
					_bar.css({ 'top': '-50px', 'left': '0px', 'right': 'auto' });
				}
				else {
					_inner.css('width', '41px');
					_bar.css({ 'top': '-6px', 'right': '-48px', 'left': 'auto' });
				}
			}
		});
	};
})(jQuery);

