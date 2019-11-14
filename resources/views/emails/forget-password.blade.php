@component('mail::message')
# Reset Password

Hi , ko {{ $user->username }} your security code is : {{ $user->password_code }}
@component('mail::button', ['url' => url('/password/reset/'.$user->password_code)])
reset password
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
