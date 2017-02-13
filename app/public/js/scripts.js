(function ($) {
	$(document).ready(function () {
		$("body").on("submit", "form", function (e) {
			e.preventDefault();
			var $this = $(this),
				data = getFormData(),
				errorMessage = "Invalid quantity";

			if ($this.closest(".converter-form").find(".converter-error").length) {
				$this.closest(".converter-form").find(".converter-error").empty();
			}
			//Invalid quantity
			if (!numberVlidate(data.quantity)) {
				$this.closest(".converter-form").append("<div class='converter-error'>"+errorMessage+"</div>");
				console.error("Invalid quantity");
				return false;
			}

			if (data.quantity.length) {
				$this.ajaxSubmit({
					dataType: "json",
					success: function (result) {
						var $history = $("body .history-operation");

						$history.find("ul").prepend(getItem(data.from, data.to, data.quantity, result));
						if ($history.find("ul li").length > 5) {
							$history.find("ul li").last().remove();
						}
						clearData();
					}
				});
			}
		});
	});
})(jQuery);

/**
 * Clear form data
 */
function clearData() {
	$("input[name='quantity']").val("");
}

/**
 * @returns {{quantity: (*|jQuery), from: (*|jQuery), to: (*|jQuery)}}
 */
function getFormData () {
	var quantity = $("input[name='quantity']").val(),
		from = $("select[name='from']").val(),
		to = $("select[name='to']").val();

	return {quantity: quantity, from: from, to: to};
}

/**
 *
 * @param from
 * @param to
 * @param quantity
 * @param result
 * @returns {string}
 */
function getItem(from, to, quantity, result){
	return "<li>"+ from + " " + quantity + " -> " + result + " " + to + "</li>";
}

/**
 *
 * @param value
 * @returns {boolean}
 */
function numberVlidate(value) {
	if (0 == parseInt(value)) {
		return false;
	}

	return !isNaN(value);
}
