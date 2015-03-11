/**
 * Created by langeland on 10/03/15.
 */


jQuery(document).ready(function($) {
	$(".clickable-row").click(function() {
		window.document.location = $(this).data("href");
	});
});

$(function () {
	$('[data-toggle="tooltip"]').tooltip()
})