window.localStorage;

$(window).on('load', function() {
	var bodyClass = document.getElementsByTagName('BODY')[0];
	var icon = document.getElementById('themeIcon');

	if (localStorage.getItem('theme') != null) {
		bodyClass.className = localStorage.getItem('theme');
		icon.className = localStorage.getItem('icon');
	}
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