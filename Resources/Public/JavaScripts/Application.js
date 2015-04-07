/**
 * Created by langeland on 10/03/15.
 */
$(function () {
	$('.has-clear input').on('change', function () {
		if ($(this).val() == '') {
			$(this).parents('.form-group').addClass('has-empty-value');
		} else {
			$(this).parents('.form-group').removeClass('has-empty-value');
		}
	}).trigger('change');

	$('.has-clear .form-control-clear').on('click', function () {
		var $input = $(this).parents('.form-group').find('input');

		$input.val('').trigger('change');

		// Trigger a "cleared" event on the input for extensibility purpose
		$input.trigger('cleared');
	});
});

$(function () {
	$("#message-search").on('cleared', function () {
		$(this).parents('form').submit();
	})

	$('[data-toggle="tooltip"]').tooltip();


	$('#messageModal').on('show.bs.modal', function (event) {
		var triggerElement = $(event.relatedTarget) // Button that triggered the modal
		var modal = $(this)

		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		$.getJSON(triggerElement.data('message-data'), function (messageData) {
			modal.find('.modal-title').text(messageData['subject']);
			modal.find('#message-date').text(messageData['date']);
			modal.find('#message-from').html(formatEmails(messageData['from']));
			modal.find('#message-to').html(formatEmails(messageData['to']));
			modal.find('#message-render').attr('src', messageData['messageUrl'])
			modal.find('#message-delete').attr('href', messageData['deleteUrl'])
		});

		function formatEmails(emails) {
			var labels = new Array();
			$.each(emails, function (email, name) {
				if (name) {
					labels.push('<span class="label label-primary" data-toggle="tooltip" data-placement="right" title="'+email+'">'+name+'</span>');
				} else {
					labels.push('<span class="label label-primary" data-toggle="tooltip" data-placement="right" title="'+email+'">'+email+'</span>');
				}
			});
			return labels.join(' ');
		}
	})

	$('#message-render').bind('load', function () {
		$(this).height($(this).contents().find("body").height());
		$('[data-toggle="tooltip"]').tooltip();
		$('#messageModal').modal('handleUpdate')
	})

})


