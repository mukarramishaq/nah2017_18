<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Welcome to NUST Alumni Homecoming</h2>

        <div>
            Thank you for creating an account. To get you started we need you to verify your email address by clicking the link below
            {{ URL::to('register/verify/'.$user->email.'/'.$user->verification_code) }}.<br/>
        </div>
	<div>&nbsp;</div>
        <div>
            We are available 24*7 to help with any issues you have. If you have any problems please contact us by emailing <a href="mailto:web.nust.alumni.homecoming@gmail.com">support@alumni.nust.com</a>.
        </div>
	       <div>&nbsp;</div>
        <div>
		Sincerely<br/>
                Team Web & IT NUST Alumni Homecoming
	</div>
    </body>
</html>