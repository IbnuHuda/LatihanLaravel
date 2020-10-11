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

$('#users-toggler').on('click', function() {
	var sidebarMenu = document.getElementById('sidebar');
	var navbarDashboard = document.getElementById('navbar');
	var veCoHeader = document.getElementById('VeCoHeader');
	var veCoLogo = document.getElementById('VeCoLogo');

	var iconDashboard = document.getElementById('iconDashboard');
	var dashboardTitle = document.getElementById('dashboardTitle');

	var iconTeam = document.getElementById('iconTeam');
	var teamTitle = document.getElementById('teamTitle');
	var teamChevron = document.getElementById('teamChevron');
	var teamMenus = document.getElementById('teamMenus');

	var iconActivity = document.getElementById('iconActivity');
	var activityTitle = document.getElementById('activityTitle');
	var activityChevron = document.getElementById('activityChevron');
	var activityMenus = document.getElementById('activityMenus');
		
	var cap = document.getElementById('reserved');
	var mainContent = document.getElementById('main-content');

	if (sidebarMenu.style.width == '20%') {
		sidebarMenu.style.width = '5%';
		navbarDashboard.style.width = '95%';
		cap.style.display = 'none';

		veCoHeader.style.display = 'none';
		veCoLogo.style.width = '70%';

		iconDashboard.style.fontSize = '25px';
		iconDashboard.style.marginLeft = '7px';
		dashboardTitle.style.display = 'none';

		iconTeam.style.fontSize = '25px';
		iconTeam.style.marginLeft = '5px';
		teamTitle.style.display = 'none';
		teamChevron.style.display = 'none';

		iconActivity.style.fontSize = '25px';
		iconActivity.style.marginLeft = '7px';
		activityTitle.style.display = 'none';
		activityChevron.style.display = 'none';

		mainContent.className = 'container';

		if (teamMenus.style.display == 'block') teamMenus.style.display = 'none';
		if (activityMenus.style.display == 'block') activityMenus.style.display = 'none';

	} else {
		sidebarMenu.style.width = '20%';
		navbarDashboard.style.width = '80%';
		cap.style.display = 'block';

		veCoHeader.style.display = 'block';
		veCoLogo.style.width = '20%';

		iconDashboard.style.fontSize = '20px';
		iconDashboard.style.marginLeft = '0px';
		dashboardTitle.style.display = 'inline-block';

		iconTeam.style.fontSize = '20px';
		iconTeam.style.marginLeft = '0px';
		teamTitle.style.display = 'inline-block';
		teamChevron.style.display = 'inline-block';

		iconActivity.style.fontSize = '20px';
		iconActivity.style.marginLeft = '0px';
		activityTitle.style.display = 'inline-block';
		activityChevron.style.display = 'inline-block';

		mainContent.className = 'container-fluid';

		if (teamChevron.style.transform == 'rotate(90deg)') teamMenus.style.display = 'block';
		if (activityChevron.style.transform == 'rotate(90deg)') activityMenus.style.display = 'block';
	}
});

$('#company-toggler').on('click', function() {
	var sidebarMenu = document.getElementById('sidebar');
	var navbarDashboard = document.getElementById('navbar');
	var veCoHeader = document.getElementById('VeCoHeader');
	var veCoLogo = document.getElementById('VeCoLogo');

	var iconDashboard = document.getElementById('iconDashboard');
	var dashboardTitle = document.getElementById('dashboardTitle');

	var iconCompanyProfile = document.getElementById('iconCompanyProfile');
	var companyProfileTitle = document.getElementById('companyProfileTitle');

	var iconJobs = document.getElementById('iconJobs');
	var jobsTitle = document.getElementById('jobsTitle');
	var jobsChevron = document.getElementById('jobsChevron');
	var jobsMenus = document.getElementById('jobsMenus');

	var iconActivity = document.getElementById('iconActivity');
	var activityTitle = document.getElementById('activityTitle');
	var activityChevron = document.getElementById('activityChevron');
	var activityMenus = document.getElementById('activityMenus');	

	var cap = document.getElementById('reserved');
	var mainContent = document.getElementById('main-content');

	if (sidebarMenu.style.width == '20%') {
		sidebarMenu.style.width = '5%';
		navbarDashboard.style.width = '95%';
		cap.style.display = 'none';

		veCoHeader.style.display = 'none';
		veCoLogo.style.width = '70%';

		iconDashboard.style.fontSize = '25px';
		iconDashboard.style.marginLeft = '7px';
		dashboardTitle.style.display = 'none';

		iconCompanyProfile.style.fontSize = '25px';
		iconCompanyProfile.style.marginLeft = '7px';
		companyProfileTitle.style.display = 'none';

		iconJobs.style.fontSize = '25px';
		iconJobs.style.marginLeft = '7px';
		jobsTitle.style.display = 'none';
		jobsChevron.style.display = 'none';

		iconActivity.style.fontSize = '25px';
		iconActivity.style.marginLeft = '7px';
		activityTitle.style.display = 'none';
		activityChevron.style.display = 'none';

		mainContent.className = 'container';

		if (jobsMenus.style.display == 'block') jobsMenus.style.display = 'none';
		if (activityMenus.style.display == 'block') activityMenus.style.display = 'none';

	} else {
		sidebarMenu.style.width = '20%';
		navbarDashboard.style.width = '80%';
		cap.style.display = 'block';

		veCoHeader.style.display = 'block';
		veCoLogo.style.width = '20%';

		iconDashboard.style.fontSize = '20px';
		iconDashboard.style.marginLeft = '0px';
		dashboardTitle.style.display = 'inline-block';
		
		iconCompanyProfile.style.fontSize = '20px';
		iconCompanyProfile.style.marginLeft = '0px';
		companyProfileTitle.style.display = 'inline-block';

		iconJobs.style.fontSize = '20px';
		iconJobs.style.marginLeft = '0px';
		jobsTitle.style.display = 'inline-block';
		jobsChevron.style.display = 'inline-block';

		iconActivity.style.fontSize = '20px';
		iconActivity.style.marginLeft = '0px';
		activityTitle.style.display = 'inline-block';
		activityChevron.style.display = 'inline-block';

		mainContent.className = 'container-fluid';

		if (jobsChevron.style.transform == 'rotate(90deg)') jobsMenus.style.display = 'block';
		if (activityChevron.style.transform == 'rotate(90deg)') activityMenus.style.display = 'block';
	}
});

$('#Team').on('click', function() {
	var sidebarMenu = document.getElementById('sidebar');
	var navbarDashboard = document.getElementById('navbar');
	var veCoHeader = document.getElementById('VeCoHeader');
	var veCoLogo = document.getElementById('VeCoLogo');

	var iconDashboard = document.getElementById('iconDashboard');
	var dashboardTitle = document.getElementById('dashboardTitle');

	var iconTeam = document.getElementById('iconTeam');
	var teamTitle = document.getElementById('teamTitle');
	var teamChevron = document.getElementById('teamChevron');

	var iconActivity = document.getElementById('iconActivity');
	var activityTitle = document.getElementById('activityTitle');
	var activityChevron = document.getElementById('activityChevron');

	var menu = document.getElementById('teamMenus');
	var chevronIcon = document.getElementById('teamChevron');

	var cap = document.getElementById('reserved');
	var mainContent = document.getElementById('main-content');

	if (sidebarMenu.style.width == '5%') {
		sidebarMenu.style.width = '20%';
		navbarDashboard.style.width = '80%';
		cap.style.display = 'block';

		veCoHeader.style.display = 'block';
		veCoLogo.style.width = '20%';

		iconDashboard.style.fontSize = '20px';
		iconDashboard.style.marginLeft = '0px';
		dashboardTitle.style.display = 'inline-block';

		iconTeam.style.fontSize = '20px';
		iconTeam.style.marginLeft = '0px';
		teamTitle.style.display = 'inline-block';
		teamChevron.style.display = 'inline-block';

		iconActivity.style.fontSize = '20px';
		iconActivity.style.marginLeft = '0px';
		activityTitle.style.display = 'inline-block';
		activityChevron.style.display = 'inline-block';

		mainContent.className = 'container-fluid';
	}

	if (menu.style.display == 'none') {
		menu.style.display = 'block';
		chevronIcon.style.transform = 'rotate(90deg)';
	} else {
		menu.style.display = 'none';
		chevronIcon.style.transform = 'rotate(0deg)';
	}
});

$('#Jobs').on('click', function() {
	var sidebarMenu = document.getElementById('sidebar');
	var navbarDashboard = document.getElementById('navbar');
	var veCoHeader = document.getElementById('VeCoHeader');
	var veCoLogo = document.getElementById('VeCoLogo');

	var iconDashboard = document.getElementById('iconDashboard');
	var dashboardTitle = document.getElementById('dashboardTitle');

	var iconCompanyProfile = document.getElementById('iconCompanyProfile');
	var companyProfileTitle = document.getElementById('companyProfileTitle');

	var iconJobs = document.getElementById('iconJobs');
	var jobsTitle = document.getElementById('jobsTitle');
	var jobsChevron = document.getElementById('jobsChevron');

	var iconActivity = document.getElementById('iconActivity');
	var activityTitle = document.getElementById('activityTitle');
	var activityChevron = document.getElementById('activityChevron');
	var activityMenus = document.getElementById('activityMenus');

	var menu = document.getElementById('jobsMenus');
	var chevronIcon = document.getElementById('jobsChevron');

	var cap = document.getElementById('reserved');
	var mainContent = document.getElementById('main-content');

	if (sidebarMenu.style.width == '5%') {
		sidebarMenu.style.width = '20%';
		navbarDashboard.style.width = '80%';
		cap.style.display = 'block';

		veCoHeader.style.display = 'block';
		veCoLogo.style.width = '20%';

		iconDashboard.style.fontSize = '20px';
		iconDashboard.style.marginLeft = '0px';
		dashboardTitle.style.display = 'inline-block';
		
		iconCompanyProfile.style.fontSize = '20px';
		iconCompanyProfile.style.marginLeft = '0px';
		companyProfileTitle.style.display = 'inline-block';

		iconJobs.style.fontSize = '20px';
		iconJobs.style.marginLeft = '0px';
		jobsTitle.style.display = 'inline-block';
		jobsChevron.style.display = 'inline-block';

		iconActivity.style.fontSize = '20px';
		iconActivity.style.marginLeft = '0px';
		activityTitle.style.display = 'inline-block';
		activityChevron.style.display = 'inline-block';

		mainContent.className = 'container-fluid';
	}

	if (menu.style.display == 'none') {
		menu.style.display = 'block';
		chevronIcon.style.transform = 'rotate(90deg)';
	} else {
		menu.style.display = 'none';
		chevronIcon.style.transform = 'rotate(0deg)';
	}
});

$('#Activity').on('click', function() {
	var sidebarMenu = document.getElementById('sidebar');
	var navbarDashboard = document.getElementById('navbar');
	var veCoHeader = document.getElementById('VeCoHeader');
	var veCoLogo = document.getElementById('VeCoLogo');

	var menu = document.getElementById('activityMenus');
	var chevronIcon = document.getElementById('activityChevron');

	var cap = document.getElementById('reserved');
	var mainContent = document.getElementById('main-content');

	if (document.getElementById('company-toggler')) {
		var iconDashboard = document.getElementById('iconDashboard');
		var dashboardTitle = document.getElementById('dashboardTitle');

		var iconCompanyProfile = document.getElementById('iconCompanyProfile');
		var companyProfileTitle = document.getElementById('companyProfileTitle');

		var iconJobs = document.getElementById('iconJobs');
		var jobsTitle = document.getElementById('jobsTitle');
		var jobsChevron = document.getElementById('jobsChevron');
		var jobsMenus = document.getElementById('jobsMenus');

		var iconActivity = document.getElementById('iconActivity');
		var activityTitle = document.getElementById('activityTitle');
		var activityChevron = document.getElementById('activityChevron');

		if (sidebarMenu.style.width == '5%') {
			sidebarMenu.style.width = '20%';
			navbarDashboard.style.width = '80%';
			cap.style.display = 'block';

			veCoHeader.style.display = 'block';
			veCoLogo.style.width = '20%';

			iconDashboard.style.fontSize = '20px';
			iconDashboard.style.marginLeft = '0px';
			dashboardTitle.style.display = 'inline-block';

			iconCompanyProfile.style.fontSize = '20px';
			iconCompanyProfile.style.marginLeft = '0px';
			companyProfileTitle.style.display = 'inline-block';

			iconJobs.style.fontSize = '20px';
			iconJobs.style.marginLeft = '0px';
			jobsTitle.style.display = 'inline-block';
			jobsChevron.style.display = 'inline-block';

			iconActivity.style.fontSize = '20px';
			iconActivity.style.marginLeft = '0px';
			activityTitle.style.display = 'inline-block';
			activityChevron.style.display = 'inline-block';

			mainContent.className = 'container-fluid';
		}

	}
	else {
		var iconDashboard = document.getElementById('iconDashboard');
		var dashboardTitle = document.getElementById('dashboardTitle');

		var iconTeam = document.getElementById('iconTeam');
		var teamTitle = document.getElementById('teamTitle');
		var teamChevron = document.getElementById('teamChevron');

		var iconActivity = document.getElementById('iconActivity');
		var activityTitle = document.getElementById('activityTitle');
		var activityChevron = document.getElementById('activityChevron');

		if (sidebarMenu.style.width == '5%') {
			sidebarMenu.style.width = '20%';
			navbarDashboard.style.width = '80%';
			cap.style.display = 'block';

			veCoHeader.style.display = 'block';
			veCoLogo.style.width = '20%';

			iconDashboard.style.fontSize = '20px';
			iconDashboard.style.marginLeft = '0px';
			dashboardTitle.style.display = 'inline-block';

			iconTeam.style.fontSize = '20px';
			iconTeam.style.marginLeft = '0px';
			teamTitle.style.display = 'inline-block';
			teamChevron.style.display = 'inline-block';

			iconActivity.style.fontSize = '20px';
			iconActivity.style.marginLeft = '0px';
			activityTitle.style.display = 'inline-block';
			activityChevron.style.display = 'inline-block';

			mainContent.className = 'container-fluid';
		}
	}	

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