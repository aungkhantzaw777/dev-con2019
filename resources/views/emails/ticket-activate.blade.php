@component('mail::message')
# Congratuation Your Ticket is successfully activate


Yout Ticket is being activate. Now you can login <a href="{{ url('login') }}">here</a>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
