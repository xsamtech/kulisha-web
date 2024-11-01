
(function ($) {
	$.fn.kulishareactions = async function () {
		var reactions = await $.ajax({
			headers: headers,
			method: 'GET',
			contentType: 'application/json',
			url: `${apiHost}/reaction/find_by_group/fr/Réaction sur post`
		});
		var _react_html = '<div class="reaction-box">';
		var faces = '';

		reactions.data.map(function (reaction) {
			faces = faces + `<div class="reaction-icon ${reaction.alias}" data-reaction-id="${reaction.id}">
                                <label>${reaction.reaction_name}</label>
                            </div>`;
		});

		_react_html = _react_html + faces;
		_react_html = _react_html + '</div>';

		$(_react_html).appendTo($('body'));

		// on click emotions
		$(this).hover(function() {
            $(".reaction-icon").each(function(i, e) {
                setTimeout(function(){
                    $(e).addClass("show");
                }, i * 100);
            });
        }, function() {
            $(".reaction-icon").removeClass("show")
        });

		// Ajax
		function __ajax(post_id, reaction_id) {
			$.ajax({
				headers: headers,
				type: 'POST',
                contentType: 'application/json',
				url: settings.postUrl,
				data: JSON.stringify({ 'to_post_id': parseInt(post_id), 'reaction_id': reaction_id, 'user_id' : parseInt(currentUser) }),
				success: function (data) {
					console.log(data.message);
				},
                error: function (xhr, error, status_description) {
                    if (!$('#successMessageWrapper').hasClass('d-none')) {
                        $('#successMessageWrapper').addClass('d-none');
                    }

                    $('#errorMessageWrapper').removeClass('d-none');

                    console.log(xhr.responseJSON);
                    console.log(xhr.status);
                    console.log(error);
                    console.log(status_description);
                }
			});
		}

	};
})(jQuery);
