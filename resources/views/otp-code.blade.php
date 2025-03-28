<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Kulisha OTP</title>
    </head>

    <body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
		<div style="width: 80%; background-color: rgba(0, 0, 0, 0.05); margin: 0.3rem auto; padding: 1rem 1.5rem;">
            <img src="{{ asset('assets/img/logo-text.png') }}" alt="Kulisha" width="200">

            <h1 style="color: #a4da22; margin-top: 3rem;">@lang('notifications.token_otp_title')</h1>
            <p style="font-size: 13px; margin-top: 0.5rem; margin-bottom: 0.3rem;">@lang('notifications.token_otp_label')</p>
            <h1 style="font-weight: 600; color: #03739c; background-color: rgba(5, 149, 190, 0.15); margin: 0; padding: 20px;">{{ $token }}</h1>
            <p style="font-size: 13px; margin-top: 1.5rem;">@lang('notifications.token_otp_note1')</p>
            <p style="font-size: 13px; font-weight: 700; margin-top: 0.7rem; margin-bottom: 0;">@lang('notifications.token_otp_note2')</p>
		</div>
		<div style="width: 80%; margin: 0.3rem auto; padding: 0">
			<p style="font-size: 12px; margin-bottom: 0.9rem;">@lang('notifications.token_otp_note3')</p>
			<p style="font-size: 12px; margin: 0;">&copy; {{ date('Y') }} <a href="https://xsamtech.com" target="_blank">Xsam Technologies</a></p>
		</div>
    </body>
</html>