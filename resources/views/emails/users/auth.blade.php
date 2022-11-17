@component('mail::message')
    {{-- # Introduction --}}
    welcome to {{$name}}
    @component('mail::button' , ['url' => ''])
    welcome to smartbackus
    @endcomponent
    Thanks,
    {{ config('app.name') }}
@endcomponent
