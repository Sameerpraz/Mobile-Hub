@component('mail::message')

#Thank You, {{$orders->name}}

Payment successfully made by **{{ $orders->name }}**.
<br>
Hope for further requests in future too.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
