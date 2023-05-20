@component('mail::message')
# Otp Send

The is your {{ config('app.name') }} verification code.

@component('mail::button', ['url' => ''])
{{$otp}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
