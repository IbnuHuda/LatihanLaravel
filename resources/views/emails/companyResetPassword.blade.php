Hello, {{ $email_data['email'] }}!
<br />
Welcome to VeCo. Website
<br />
Please click the below link to verify your email and activate your account!
<br />
<a href="http://localhost:8000/verify/reset-password?token={{ $email_data['token'] }}">Click Here</a>

<br />
Thank You!
<br />
VeCo.