window.localStorage;

$(window).on('load', function() {
	var bodyClass = document.getElementsByTagName('BODY')[0];
	var icon = document.getElementById('themeIcon');

	if (localStorage.getItem('theme') != null) {
		bodyClass.className = localStorage.getItem('theme');
		icon.className = localStorage.getItem('icon');
	}
});

$(window).on('click', function () {
	$('#listUsers').empty();
});

$('#theme-toggler').on('click', function() {
	var bodyClass = document.getElementsByTagName('BODY')[0];
	var icon = document.getElementById('themeIcon');

	if (bodyClass.className == 'default-theme') {
		bodyClass.className = 'dark-theme';
		icon.className = 'fa fa-sun-o';
	} else {
		bodyClass.className = 'default-theme';
		icon.className = 'fa fa-moon-o';
	}

	localStorage.setItem('theme', bodyClass.className);
	localStorage.setItem('icon', icon.className);
});

$('#sidebar-toggler').on('click', function() {
	var sidebarMenu = document.getElementById('sidebar');
	var cap = document.getElementById('reserved');

	if (sidebarMenu.style.marginLeft == '0px') {
		sidebarMenu.style.marginLeft = '-275px';
		cap.style.left = '-275px';
	}
	else {
		sidebarMenu.style.marginLeft = '0';
		cap.style.left = '17.5px';
	}
});

$('#Team').on('click', function() {
	var menu = document.getElementById('teamMenus');
	var chevronIcon = document.getElementById('teamChevron');

	if (menu.style.display == 'none') {
		menu.style.display = 'block';
		chevronIcon.style.transform = 'rotate(90deg)';
	} else {
		menu.style.display = 'none';
		chevronIcon.style.transform = 'rotate(0deg)';
	}
});

$('#Jobs').on('click', function() {
	var menu = document.getElementById('jobsMenus');
	var chevronIcon = document.getElementById('jobsChevron');

	if (menu.style.display == 'none') {
		menu.style.display = 'block';
		chevronIcon.style.transform = 'rotate(90deg)';
	} else {
		menu.style.display = 'none';
		chevronIcon.style.transform = 'rotate(0deg)';
	}
});

$('#Vendor').on('click', function() {
	var menu = document.getElementById('vendorMenus');
	var chevronIcon = document.getElementById('vendorChevron');

	if (menu.style.display == 'none') {
		menu.style.display = 'block';
		chevronIcon.style.transform = 'rotate(90deg)';
	} else {
		menu.style.display = 'none';
		chevronIcon.style.transform = 'rotate(0deg)';
	}
});

$('#photo').on('click', function() {
	var profileBox = document.getElementById('profileBox');

	if (profileBox.style.display == 'block') profileBox.style.display = 'none';
	else profileBox.style.display = 'block';
});

$('#searchUsers').keyup(function() {
	var context = $('#searchUsers');
	var textInput = document.getElementById('searchUsers');

	if (context.val() != null) {
		
		$.ajax({
			url: '/search/users',
			type: 'POST',
			dataType: 'json',
			data: { _token: $('#tokenUsers').val(), name: context.val() },
		})
		.done(function(res) {

			$('#listUsers').empty();

			textInput.style.borderBottom = '1px solid #888888';

			if (res.length == 0) $('#listUsers').append('<p class="list-group-item list-group-item-action flex-column align-items-start"><strong>Users not found!</strong></p>');
			else $.each(res, function(index, value) {
				$('#listUsers').append('<a href="#" class="list-group-item list-group-item-action flex-column align-items-start"><strong>' + value.name + '</strong><br><small>' + value.email + '</small></a>');
			});
		});
	}
});
