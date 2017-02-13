(function ($) {
	$(document).ready(function () {
		$("body").on("submit", "form", function (e) {
			e.preventDefault();
			var $this = $(this),
				data = getFormData();

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

function clearData() {
	$("input[name='quantity']").val("");
}

function getFormData () {
	var quantity = $("input[name='quantity']").val(),
		from = $("select[name='from']").val(),
		to = $("select[name='to']").val();

	return {quantity: quantity, from: from, to: to};
}

function getItem(from, to, quantity, result){
	return "<li>"+ from + " " + quantity + " -> " + result + " " + to + "</li>";
}
