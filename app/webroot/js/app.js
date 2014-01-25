$(function() {

	$(document).on('click', '.client', function() {
		if ($(this).attr('data-state') === 'inactive') {
			$(this).attr('data-state', 'active');
			$('#sidebar li.active').removeClass('active');
			$('#sidebar ul.nav-list').hide();
			$(this).parent('li').addClass('active');
			$('i.fa.fa-minus').removeClass('fa-minus').addClass('fa-plus');
			$(this).children('i.fa.fa-plus').removeClass('fa-plus').addClass('fa-minus');
			$(this).next('ul.nav-list').show();
		} else {
			$('#sidebar a.client').attr('data-state', 'inactive');
			$('#sidebar li.active').removeClass('active');
			$('#sidebar ul.nav-list').hide();
			$('i.fa.fa-minus').removeClass('fa-minus').addClass('fa-plus');
			$(this).next('ul.nav-list').hide();
		}
	});

	$(document).on('click', '.project', function() {
		$.get('/data/project/' + $(this).attr('data-id'), function(data) {
			$("#data-container").html(data);
		});
	});

});