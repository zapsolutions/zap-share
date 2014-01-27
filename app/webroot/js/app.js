$(function() {

	$(document).on('click', '.client', function() {
		if ($(this).attr('data-state') === 'inactive') {
			$(this).attr('data-state', 'active');
			$('#sidebar li.active').removeClass('active');
			$(this).parent('li').addClass('active');
			$('i.fa.fa-minus').removeClass('fa-minus').addClass('fa-plus');
			$(this).children('i.fa.fa-plus').removeClass('fa-plus').addClass('fa-minus');
			$.ajax({
				type: 'POST',
				url: '/session/set_active_menu/' + $(this).attr('data-id'),
			});
		} else {
			$('#sidebar a.client').attr('data-state', 'inactive');
			$('#sidebar li.active').removeClass('active');
			$('i.fa.fa-minus').removeClass('fa-minus').addClass('fa-plus');
			$.ajax({
				type: 'POST',
				url: '/session/set_active_menu/null',
			});
		}
	});

});