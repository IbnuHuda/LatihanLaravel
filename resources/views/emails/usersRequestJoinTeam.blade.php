Hello!
<br />
Welcome to VeCo. Website
<br />
Users {{ $email_data['name'] }} wanna join your team, click the button to accept request. Otherwise, just ignore it.
<br />
{{-- <a href="http://localhost:8000/verify/reset-password?token={{ $email_data['token'] }}">Click Here</a> --}}

<a href="http://localhost:8000/users/team/joined?team_id={{ $email_data['team_id'] }}&id={{ $email_data['id'] }}">Click Here</a>

<br />
Thank You!
<br />
VeCo.
