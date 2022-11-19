@component('mail::message')
    {{$name}}
    <br>
    {{$body}}
{{-- # Introduction --}}

{{-- The body of your message. --}}

@component('mail::button', ['url' => ''])
    {{$title}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
