/**
 * Created by langeland on 10/03/15.
 */


$(function () {
	$(".clickable-row").click(function() {
		window.document.location = $(this).data("href");
	});

	$('[data-toggle="tooltip"]').tooltip()

	//$message = $("#message-code").val();
	//$('#message-render').contents().find('html').html($message);
	//$('#message-render').show();
})


